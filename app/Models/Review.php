<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    /** @use HasFactory<\Database\Factories\ReviewFactory> */
    use HasFactory;

    protected $fillable=[
        'body',
        'rate',
        'specifications',
        'ability',
        'colors',
        'size',
    ];

    public function post()
    {
        return $this->morphToMany(Post::class, 'reviewables');
    }
}
