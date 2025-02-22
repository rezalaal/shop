<?php

namespace App\Models;

use App\Models\Traits\HasFormattedCreatedAt;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Charge extends Model
{
    /** @use HasFactory<\Database\Factories\ChargeFactory> */
    use HasFactory;
    use HasFormattedCreatedAt;

    protected $fillable=[
        'price','status','user_id','refId','property','status','type'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
