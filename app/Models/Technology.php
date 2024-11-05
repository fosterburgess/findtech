<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use Spatie\Tags\HasTags;

class Technology extends Model
{
    use HasTags, HasFactory, Searchable;
    protected $guarded = ['id'];
//    protected $casts = [
//        'tags' => 'array',
//    ];

    public function searchableAs(): string
    {
        return 'tech_index2';
    }
    public function toSearchableArray(): array
    {
        dump($this->id);dump($this->tags);
        return [
            'id' => (int) $this->id,
            'title' => $this->title,
            'abstract' => $this->abstract,
            'tags' => $this->tags,
        ];
    }
}
