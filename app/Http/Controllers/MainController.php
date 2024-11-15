<?php

namespace App\Http\Controllers;

use App\Actions\CountFacetTags;
use App\Actions\GetTagsFromCache;
use App\Models\Technology;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Session;

class MainController extends Controller
{
    public function index()
    {
        $tags = $this->getTags();
        $selectedTags = Session::get('tags')?->toArray() ?? [];

        return view('main', ['tags' => $tags, 'selectedTags' => $selectedTags, 'results' => null, 'spent' => null]);
    }

    public function addTag(Request $request, string $tag)
    {
        $tags = Session::get('tags') ?? new Collection;
        $tags->push($tag);
        Session::put('tags', $tags?->unique());

        return $this->search($request);
    }

    public function removeTag(Request $request, string $tag)
    {
        $tags = Session::get('tags') ?? new Collection;
        $filteredTags = $tags->filter(function ($t) use ($tag) {
            return $t !== $tag;
        });
        Session::put('tags', $filteredTags);

        return $this->search($request);
    }

    public function search(Request $request)
    {
        $x = microtime(true);

        $search = $request->get('search') ?? $request->query('query');
        $results = Technology::search($search)
            ->query(function ($query) {
                return $query
                    ->whereHas('tags', function ($query) {
                        return $query->whereIn('tags.name->en', Session::get('tags')?->unique() ?? []);
                    }, '=', Session::get('tags')?->count() ?? 0);
            })
            ->paginate(12);
        $selectedTags = Session::get('tags')?->unique() ?? new Collection();
        $tags = $this->getTags($search, $selectedTags);

        $spent = microtime(true) - $x;

        return view('main', ['tags' => $tags, 'selectedTags' => Session::get('tags')?->unique()?->toArray() ?? [], 'term' => $search, 'results' => $results, 'spent' => $spent]);
    }

    public function getTags(?string $search = '', ?Collection $selectedTags = null)
    {
        // get from cache
        if (trim($search) === '' && (! $selectedTags || $selectedTags->count() === 0)) {
            $action = new GetTagsFromCache;

            return $action();
        }
        if ($search) {
            $builder = Technology::search($search);
            $all = $builder->query(function ($query) use ($selectedTags) {
                return $query
                    ->whereHas('tags', function ($query) use ($selectedTags) {
                        return $query->whereIn('tags.name->en', $selectedTags?->toArray() ?? []);
                    }, '=', $selectedTags?->count() ?? 0);
            })->get();
        } else {
            $all = Technology::query()
                ->whereHas('tags', function ($query) use ($selectedTags) {
                    return $query->whereIn('tags.name->en', $selectedTags?->unique() ?? []);
                }) // , '=', $selectedTags?->count() ?? 0)
                ->get();
        }

        $techIds = $all->pluck('id');
        $tags = $all->pluck('tags')->flatten()->unique();
        $tagIds = $tags->pluck('id');
        $cft = new CountFacetTags;
        $tags = $cft($tagIds->unique()->toArray(), $techIds->toArray());

        return $tags;
    }
}
