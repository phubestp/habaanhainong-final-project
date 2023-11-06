<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Ban extends Model
{
    use HasFactory;

    protected $table = 'banned_users';

    protected $fillable = [
        'banned_user',
        'from_report',
        'by_user',
        'ban_reason',
        'ban_at',
    ];

    // Define a many-to-one relationship with Users (a banned user record belongs to a banned user)
    public function bannedUser() : BelongsTo
    {
        return $this->belongsTo(User::class, 'banned_user', 'username');
    }

    // Define a many-to-one relationship with Reports (a banned user record belongs to a report)
    public function report() : BelongsTo
    {
        return $this->belongsTo(Report::class, 'from_report', 'id');
    }

    // Define a many-to-one relationship with Users (a banned user record belongs to a user who banned)
    public function banningUser(): BelongsTo
    {
        return $this->belongsTo(User::class, 'by_user', 'username');
    }
}
