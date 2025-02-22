<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActiveSMS extends Model
{
    /** @use HasFactory<\Database\Factories\ActiveSMSFactory> */
    use HasFactory;

    protected $table = 'active_sms'; 
    protected $fillable=[
        'phone',
        'code',
        'expire',
    ];

    protected $casts = [
        'expire' => 'datetime',
    ];
    
    public function scopeBuildCode($query)
    {
        do {
            $code = (string) random_int(111111, 999999);
        } while (self::where('code', $code)->exists());

        return $code;
    }
}
