<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Report extends Model
{
    use HasFactory, HasUuids;

    protected $keyType = 'uuid';
    protected $fillable = [
        'report_id',
        'reporter',
        'reported',
        'from_post',
        'report_reason',
        'report_at',
    ];

    // Define a many-to-one relationship with Users (a report belongs to a reporter)
    public function reporter() : BelongsTo
    {
        return $this->belongsTo(User::class, 'reporter', 'username');
    }

    // Define a many-to-one relationship with Users (a report belongs to a reported user)
    public function reported(): BelongsTo
    {
        return $this->belongsTo(User::class, 'reported', 'username');
    }

    // Define a many-to-one relationship with Posts (a report belongs to a post)
    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class, 'from_post', 'id');
    }
}
