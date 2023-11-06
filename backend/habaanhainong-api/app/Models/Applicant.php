<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Applicant extends Model
{
    use HasFactory;

    public function user() : belongsTo
    {
        return $this->belongsTo(User::class, 'username', 'username');
    }

    public function post() : belongsTo
    {
        return $this->belongsTo(Post::class, 'from_post', 'id');
    }
}
