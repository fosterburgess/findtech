<?php

namespace App\Actions;

use Illuminate\Support\Facades\Cache;

class ClearTagsFromCache
{
    public function __invoke()
    {
        Cache::forget('allTags');
    }
}
