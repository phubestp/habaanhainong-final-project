<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use App\Models\Animal;

class Post extends Model
{
    use HasFactory, HasUuids;

    public function animal(): HasOne
    {
        return $this->hasOne(Animal::class);
    }

    public function users(): BelongsToMany //follow
    {
        return $this->belongsToMany(User::class);
    }

    public function applicants(): BelongsToMany
    {
        return $this->belongsToMany(Applicant::class);
    }

    public function owner(): BelongsTo //has
    {
        return $this->belongsTo(User::class);
    }
}
