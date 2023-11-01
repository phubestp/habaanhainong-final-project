<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\HasOne;
use App\Models\Animal;

class Post extends Model
{
    use HasFactory, HasUuids;

    public function animal(): HasOne
    {
        return $this->hasOne(Animal::class);
    }
}
