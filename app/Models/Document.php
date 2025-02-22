<?php

namespace App\Models;

use App\Models\Traits\HasFormattedCreatedAt;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    /** @use HasFactory<\Database\Factories\DocumentFactory> */
    use HasFactory;
    use HasFormattedCreatedAt;

    protected $fillable=[
        'frontNaturalId',
        'backNaturalId',
        'user_id',
        'status',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
