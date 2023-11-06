<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Image extends Model
{
    use HasFactory, HasUuids;

    protected $keyType = 'uuid';
    protected $fillable = [
        'image_id',
        'from_post',
        'image_file',
        'file_extension',
    ];

// Define a one-to-many relationship with Images (a post has many images)
    public function images() : HasMany
    {
        return $this->hasMany(Image::class, 'from_post', 'id');
    }
}
