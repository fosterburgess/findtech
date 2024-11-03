<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Tags\HasTags;

class Technology extends Model
{
    use HasTags, HasFactory;
    protected $guarded = ['id'];
    protected $casts = [
        'tags' => 'array',
    ];
}
