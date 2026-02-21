<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Upvote extends Model
{
    public const UPDATED_AT = null;

    protected $fillable = ['article_id', 'user_id'];
}