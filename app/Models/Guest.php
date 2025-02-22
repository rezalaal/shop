<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    /** @use HasFactory<\Database\Factories\GuestFactory> */
    use HasFactory;

    protected $fillable = [
        'code'
    ];
    public function post()
    {
        return $this->hasMany(Post::class);
    }
    public function guestCart()
    {
        return $this->hasMany(GuestCart::class);
    }
}
