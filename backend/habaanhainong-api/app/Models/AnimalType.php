<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Animal;

class AnimalType extends Model
{
    use HasFactory;

    public function animals(): HasMany
    {
        return $this->hasMany(Animal::class);
    }


}
