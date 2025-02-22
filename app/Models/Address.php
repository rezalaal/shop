<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    /** @use HasFactory<\Database\Factories\AddressFactory> */
    use HasFactory;

    protected $fillable=[
        'address',
        'post',
        'name',
        'latitude',
        'longitude',
        'status',
        'city_id',
        'plaque',
        'unit',
        'number',
    ];

    protected $casts = [
        'latitude' => 'float',
        'longitude' => 'float',
        'status' => 'boolean',
        'plaque' => 'boolean',
    ];

    protected $attributes = [
        'status' => false,
        'plaque' => false,
    ];
    

    public function user()
    {
        return $this->morphToMany(User::class, 'addressable', 'addressables', 'address_id', 'addressable_id');
    }




    public function pay()
    {
        return $this->morphToMany(Pay::class, 'addressable');
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }
    
}
