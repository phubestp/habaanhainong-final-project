<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Post extends Model
{
    use HasFactory, HasUuids;

    public function images(): HasMany
    {
        return $this->hasMany(PostImage::class, 'from_post', 'id');
    }

    public function applicants(): HasMany
    {
        return $this->hasMany(Applicant::class, 'post', 'id');
    }

    public function follows(): HasMany
    {
        return $this->hasMany(Follow::class, 'post', 'id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author', 'username');
    }

    public function animal(): HasOne
    {
        return $this->HasOne(Animal::class, 'post', 'id');
    }
}
