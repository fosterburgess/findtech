<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Tags\HasTags;

class Technology extends Model
{
    protected $guarded = ['id'];
    protected $casts = [
        'tags' => 'array',
    ];
}
