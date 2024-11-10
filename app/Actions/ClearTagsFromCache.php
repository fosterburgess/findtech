<?php

namespace App\Actions;

use App\Models\Tag;
use Illuminate\Support\Facades\Cache;

class ClearTagsFromCache
{

    public function __invoke()
    {
        Cache::forget('allTags');
    }
}
