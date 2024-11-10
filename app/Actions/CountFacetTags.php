<?php

namespace App\Actions;

use App\Models\Tag;
use Illuminate\Support\Facades\Cache;

class CountFacetTags
{

    public function __invoke(string $tag)
    {
        $tags = Tag::query()
            ->where('name->en', $tag)
            ->select(['name->en as tagname', 'id'])
            ->withCount('technologies')
            ->get()->toArray();
        return $tags;
    }
}
