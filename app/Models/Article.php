<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        // 'image',
        'title',
        'slug',
        'content',
        'category_id',
        'user_id',
        'published_at',
    ];
    
}
