<?php

namespace App\Models;

use App\Models\Traits\HasFormattedCreatedAt;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FAQ extends Model
{
    /** @use HasFactory<\Database\Factories\FAQFactory> */
    use HasFactory;
    use HasFormattedCreatedAt;

    protected $fillable = ['question', 'short_answer', 'complete_answer', 'category'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
