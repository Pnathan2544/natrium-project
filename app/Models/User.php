<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */

    protected $fillable = [
        'name',     // type: string
        'username', // type: string, constraint: unique
        'image',    // type: string, constraint: nullable
        'bio',      // type: text,   constraint: nullable
        'email',    // type: string, constraint: unique
        'password', // type: string
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',       // type: string, constraint: hidden
        'remember_token', // type: string, constraint: hidden
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime', // type: datetime, constraint: nullable
            'password' => 'hashed',            // type: string,   constraint: hashed
        ];
    }

    /* relationship, and then business logic, then media rule */

}


