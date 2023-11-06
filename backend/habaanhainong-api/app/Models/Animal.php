<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Animal extends Model
{
    use HasFactory, HasUuids;

    protected $keyType = 'uuid';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string, string>
     */
    public $fillable = [
        'id',
        'name',
        'sex',
        'breed',
        'animal_type_id',
        'age',
    ];

    // Define a many-to-one relationship with AnimalType (an animal belongs to an animal type)
    public function animalType()
    {
        return $this->belongsTo(AnimalType::class, "animal_type_id");
    }

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
