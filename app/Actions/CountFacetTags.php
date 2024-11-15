<?php

namespace App\Actions;

use App\Models\Tag;
use App\Models\Technology;
use Illuminate\Support\Facades\DB;

class CountFacetTags
{
    public function __invoke(array $tagIds = [], array $technologyIds = [])
    {
        return Tag::query()
            ->leftJoin('taggables', 'tags.id', '=', 'taggables.tag_id')
            ->leftJoin('technologies', 'taggables.taggable_id', '=', 'technologies.id')
            ->where('taggables.taggable_type', Technology::class)
            ->when($technologyIds, function ($query) use ($technologyIds) {
                return $query->whereIn('taggables.taggable_id', $technologyIds);
            })
            ->when($tagIds, function ($query) use ($tagIds) {
                return $query->whereIn('tags.id', $tagIds);
            })
            ->select(['name->en as tagname', 'tags.id', DB::raw('count(technologies.id) as technologies_count')])
            ->groupBy('tags.id')
            ->get()->toArray();
    }
}
