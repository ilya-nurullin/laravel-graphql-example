<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /** @use HasFactory<\Database\Factories\PostFactory> */
    use HasFactory;

    protected $casts = [
        'is_draft' => 'boolean'
    ];

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }
}
