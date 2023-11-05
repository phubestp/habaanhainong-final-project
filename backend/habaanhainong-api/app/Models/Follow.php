<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Follow extends Model
{
    use HasFactory;

    protected $fillable = [
        'post',
        'user',
    ];

    // Define a many-to-one relationship with Users (a follow record belongs to a user)
    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class, 'user', 'username');
    }

    // Define a many-to-one relationship with Posts (a follow record belongs to a post)
    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class, 'post', 'post_id');
    }
}
