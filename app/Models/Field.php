<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    protected $fillable = ['name']; // type: string

    /* relationship next, no business logic */
}
