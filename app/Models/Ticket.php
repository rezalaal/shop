<?php

namespace App\Models;

use App\Models\Traits\HasFormattedCreatedAt;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    /** @use HasFactory<\Database\Factories\TicketFactory> */
    use HasFactory;
    use HasUuids;
    use HasFormattedCreatedAt;

    protected $fillable=[
        'body',
        'answer',
        'seen',
        'user_id',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
