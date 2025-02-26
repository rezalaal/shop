<?php

namespace App\Models;

use App\Traits\HasFormattedCreatedAt;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrier extends Model
{
    /** @use HasFactory<\Database\Factories\CarrierFactory> */
    use HasFactory;
    use HasFormattedCreatedAt;

    protected $keyType = 'string';
    public $incrementing = false;
    protected $fillable=[
        'name','price','city','limit'
    ];

    public function user()
    {
        return $this->morphToMany(User::class, 'carriables', 'carrierables', 'carrier_id', 'carriables_id');
    }

    public function post()
    {
        return $this->morphedByMany(Post::class, 'carriables', 'carrierables', 'carrier_id', 'carriables_id');
    }

    public function pay()
    {
        return $this->morphedByMany(Pay::class, 'carriables', 'carrierables', 'carrier_id', 'carriables_id');
    }

}
