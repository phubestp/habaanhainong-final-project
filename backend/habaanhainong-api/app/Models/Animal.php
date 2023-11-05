<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Animal extends Model
{
    use HasFactory;

    protected $keyType = 'uuid';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string, string>
     */
    public $fillable = [
        'animal_id',
        'name',
        'sex',
        'breed',
        'animal_type',
    ];

    // Define a many-to-one relationship with AnimalType (an animal belongs to an animal type)
    public function animalType() : BelongsTo
    {
        return $this->belongsTo(AnimalType::class, 'animal_type', 'Type');
    }
}
