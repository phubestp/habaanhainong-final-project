<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BannedUser extends Model
{
    use HasFactory;

    // Define a many-to-one relationship with Users (a banned user record belongs to a banned user)
    public function bannedUser() : BelongsTo
    {
        return $this->belongsTo(User::class, 'banned_user', 'username');
    }

    // Define a many-to-one relationship with Reports (a banned user record belongs to a report)
    public function report() : BelongsTo
    {
        return $this->belongsTo(Report::class, 'from_report', 'report_id');
    }

    // Define a many-to-one relationship with Users (a banned user record belongs to a user who banned)
    public function banningUser(): BelongsTo
    {
        return $this->belongsTo(User::class, 'by_user', 'username');
    }
}
