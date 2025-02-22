<?php

namespace App\Models;

use App\Models\Traits\HasFormattedCreatedAt;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrier extends Model
{
    /** @use HasFactory<\Database\Factories\CarrierFactory> */
    use HasFactory;
    use HasFormattedCreatedAt;

    protected $fillable=[
        'name','price','city','limit'
    ];

    public function user()
    {
        return $this->morphToMany(User::class, 'carriables');
    }
    public function post()
    {
        return $this->morphedByMany(Post::class, 'carriables');
    }

    public function pay()
    {
        return $this->morphedByMany(Pay::class, 'carriables');
    }
}
