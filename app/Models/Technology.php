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

    public function searchableAs(): string
    {
        return 'technology';
    }
    public function toSearchableArray(): array
    {
        return [
            'title' => $this->title,
            'abstract' => $this->abstract,
            'applications' => $this->applications,
        ];
    }
}
