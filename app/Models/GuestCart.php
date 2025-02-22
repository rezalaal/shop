<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuestCart extends Model
{
    /** @use HasFactory<\Database\Factories\GuestCartFactory> */
    use HasFactory;

    protected $fillable=[
        'post_id','count','guest_id','guarantee_id','price','size','color','discount','delivery'
    ];
    public function guest()
    {
        return $this->belongsTo(Guest::class);
    }
    public function carrier()
    {
        return $this->morphToMany(Carrier::class, 'carriables');
    }
    public function guarantee()
    {
        return $this->belongsTo(Guarantee::class);
    }
}
