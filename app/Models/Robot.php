<?php

namespace App\Models;

use App\Models\Traits\HasFormattedCreatedAt;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Robot extends Model
{
    /** @use HasFactory<\Database\Factories\RobotFactory> */
    use HasFactory;
    use HasFormattedCreatedAt;
    
    protected $fillable=[
        'name',
        'body',
        'status',
        'token',
        'group',
        'data',
        'user_id',
    ];

}
