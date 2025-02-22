<?php

namespace App\Models;

use App\Models\Traits\HasFormattedCreatedAt;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Time extends Model
{
    /** @use HasFactory<\Database\Factories\TimeFactory> */
    use HasFactory;
    use HasFormattedCreatedAt;

    protected $fillable=[
        'user_id',
        'from',
        'name',
        'to',
        'day',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function cart()
    {
        return $this->morphedByMany(Cart::class, 'timables');
    }

    public function post()
    {
        return $this->morphedByMany(Post::class, 'timables');
    }
}
