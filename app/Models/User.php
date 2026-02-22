<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class User extends Authenticatable implements MustVerifyEmail, HasMedia
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, InteractsWithMedia;

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
    
    /** Spatie related functions */
    public function registerMediaConversions(?Media $media = null): void
    {
        $this
            ->addMediaConversion('avatar')
            ->width(128)
            ->crop(128, 128);
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('avatar')
            ->singleFile();
    }

    public function imageUrl()
    {
        $media = $this->getFirstMedia('avatar');
        if (!$media) {
            return null;
        }
        if ($media->hasGeneratedConversion('avatar')) {
            return $media->getUrl('avatar');
        }
        return $media->getUrl();
    }

    public function articles()
    {
        return $this->hasMany(Article::class);
    }

     public function following()
    {
        return $this->belongsToMany(User::class, 'followers', 'follower_id', 'user_id');
    }

    public function followers()
    {
        return $this->belongsToMany(User::class, 'followers', 'user_id', 'follower_id');
    }

    public function isFollowedBy(?User $user)
    {
        if (!$user) {
            return false;
        }
        return $this->followers()->where('follower_id', $user->id)->exists();
    }

    public function hasUpvoted(Article $article)
    {
        return $article->upvotes()->where('user_id', $this->id)->exists();
    }

}


