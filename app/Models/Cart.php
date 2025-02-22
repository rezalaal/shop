<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    /** @use HasFactory<\Database\Factories\CartFactory> */
    use HasFactory;

    protected $fillable=[
        'post_id','count','user_id','guarantee_id','price','size','color','discount','delivery'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function time()
    {
        return $this->morphToMany(Time::class, 'timables');
    }
}
