<?php

namespace App\Models;

use App\Models\Traits\HasFormattedCreatedAt;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    /** @use HasFactory<\Database\Factories\ScoreFactory> */
    use HasFactory;
    use HasFormattedCreatedAt;

    protected $fillable=[
        'name',
        'type',
        'user_id',
    ];


    public function user()
    {
        return $this->hasMany(User::class , 'id' ,'user_id');
    }
}
