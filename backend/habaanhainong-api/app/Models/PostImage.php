<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PostImage extends Model
{
    use HasFactory, HasUuids;

    protected $keyType = 'uuid';
    protected $fillable = [
        'image_id',
        'from_post',
        'file_extension',
    ];

    public function images() : BelongsTo
    {
        return $this->belongsTo(Post::class);
    }
}
