<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\belongsTo;
use Illuminate\Database\Eloquent\Model;
use App\Models\Post;
use App\Models\AnimalType;

class Animal extends Model
{
    use HasFactory, HasUuids;

    public function post(): belongsTo
    {
        return $this->belongsTo(Post::class);
    }

    public function animal_type(): belongsTo
    {
        return $this->belongsTo(AnimalType::class);
    }

}
