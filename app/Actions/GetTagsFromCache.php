<?php

namespace App\Actions;

use App\Models\Tag;
use Illuminate\Support\Facades\Cache;

class GetTagsFromCache
{

    public function __invoke()
    {
        $tags = Cache::get('allTags');
        if (!$tags) {
            $tags = Tag::query()
                ->select(['name->en as tagname', 'id'])
                ->withCount('technologies')
                ->get()->toArray();
            Cache::put('allTags', $tags, now()->addMinutes(5));
        }
        return $tags;
    }
}
