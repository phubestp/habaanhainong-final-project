<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Model
{
    use HasFactory, HasUuids;

    // Define a one-to-many relationship with Posts (a user has many posts)
    public function posts() : HasMany
    {
        return $this->hasMany(Post::class, 'author', 'id');
    }

    // Define a many-to-many relationship with Follows (a user can follow many posts)
    public function followedPosts() : BelongsToMany
    {
        return $this->belongsToMany(Post::class, 'follows', 'user', 'post');
    }

    public function follows(): HasMany
    {
        return $this->hasMany(Follow::class, 'user', 'id');
    }

// Define a one-to-many relationship with Reports (a user can make many reports)
    public function reports(): HasMany
    {
        return $this->hasMany(Report::class, 'reporter', 'id');
    }

    // Define a one-to-many relationship with BannedUsers (a user can ban other users)
    public function bannedUsers(): HasMany
    {
        return $this->hasMany(BannedUser::class, 'by_user', 'id');
    }

    // Define a many-to-many relationship with Applicants (a user can apply to many posts)
    public function appliedPosts(): BelongsToMany
    {
        return $this->belongsToMany(Post::class, 'applicants', 'applicants', 'post');
    }

    public function applicants(): HasMany
    {
        return $this->hasMany(Applicant::class, 'applicant', 'id');
    }
}
