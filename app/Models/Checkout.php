<?php

namespace App\Models;

use App\Models\Traits\HasFormattedCreatedAt;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
    /** @use HasFactory<\Database\Factories\CheckoutFactory> */
    use HasFactory;
    use HasFormattedCreatedAt;
    
    protected $fillable=[
        'price','iban','user_id','status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
