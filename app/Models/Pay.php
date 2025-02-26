<?php

namespace App\Models;

use App\Traits\HasFormattedCreatedAt;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pay extends Model
{
    /** @use HasFactory<\Database\Factories\PayFactory> */
    use HasFactory;
    use HasFormattedCreatedAt;

    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable=[
        'auth',
        'refId',
        'user_id',
        'price',
        'discount_id',
        'deliver',
        'back',
        'time',
        'track',
        'property',
        'seen',
        'status',
        'card_pan',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function post()
    {
        return $this->hasMany(Post::class);
    }
    public function carrier()
    {
        return $this->morphToMany(Carrier::class, 'carriables');
    }

    public function payMeta()
    {
        return $this->hasMany(PayMeta::class);
    }

    public function address()
    {
        return $this->morphToMany(Address::class, 'addressables');
    }
    
}
