<?php

namespace App\Models;

use App\Models\Traits\HasFormattedCreatedAt;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    /** @use HasFactory<\Database\Factories\DiscountFactory> */
    use HasFactory;
    use HasFormattedCreatedAt;

    protected $fillable=[
        'title',
        'code',
        'user_id',
        'post_id',
        'day',
        'percent',
        'status',
        'count',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function posts()
    {
        return $this->belongsToMany(Post::class, 'discount_post');
    }
    
    public function payMeta()
    {
        return $this->hasMany(PayMeta::class);
    }

}
