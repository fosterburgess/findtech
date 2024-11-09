<?php

namespace App\Models;

use Laravel\Scout\Searchable;

class Tag extends \Spatie\Tags\Tag
{
    use  Searchable;
    protected $table = 'tags';
    protected $casts = [
        'tags' => 'array',
    ];

    public function searchableAs(): string
    {
        return 'tags_index';
    }
}