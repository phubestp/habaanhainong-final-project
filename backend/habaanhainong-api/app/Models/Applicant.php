<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Applicant extends Model
{
    use HasFactory;

    protected $fillable = [
        'post',
        'applicant',
        'reason',
        'status'
    ];


    // Define a many-to-one relationship with Users (an applicant record belongs to a user)
    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class, 'applicants', 'id');
    }

    // Define a many-to-one relationship with Posts (an applicant record belongs to a post)
    public function post() : BelongsTo
    {
        return $this->belongsTo(Post::class, 'post', 'id');
    }

}
