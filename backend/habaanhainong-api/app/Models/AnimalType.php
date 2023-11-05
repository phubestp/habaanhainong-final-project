<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AnimalType extends Model
{
    use HasFactory;
    protected $primaryKey = 'Type';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'Type',
    ];

    public function animals() : HasMany
    {
        return $this->hasMany(Animal::class);
    }
}
