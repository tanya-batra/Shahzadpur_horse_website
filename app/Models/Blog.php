<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'short_description',
        'description',
        'image', 
        'meta_title',
        'meta_description',
        'meta_keywords',
        'youtube_url',
    ];

    protected $casts = [
        'images' => 'array', 
    ];
}

