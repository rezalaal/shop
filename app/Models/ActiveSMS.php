<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActiveSMS extends Model
{
    /** @use HasFactory<\Database\Factories\ActiveSMSFactory> */
    use HasFactory;
    protected $fillable=[
        'phone',
        'code',
        'expire',
    ];
    public function scopeBuildCode($query)
    {
        do {
            $code = random_int(111111, 999999);
        } while (self::where('code', $code)->exists());

        return $code;
    }
}
