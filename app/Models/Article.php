<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        // 'image',     // type: string,    constraint: nullable
        'title',        // type: string
        'slug',         // type: string,    constraint: unique
        'content',      // type: longText
        'field_id',     // type: foreignId, constraint: foreign key -> fields.id, onDelete: cascade
        'user_id',      // type: foreignId, constraint: foreign key -> users.id,  onDelete: cascade
        'published_at', // type: timestamp, constraint: nullable
    ];

}
