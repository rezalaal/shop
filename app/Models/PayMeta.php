<?php

namespace App\Models;

use App\Models\Traits\HasFormattedCreatedAt;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PayMeta extends Model
{
    /** @use HasFactory<\Database\Factories\PayMetaFactory> */
    use HasFactory;
    use HasFormattedCreatedAt;

    protected $fillable=[
        'user_id',
        'post_id',
        'status',
        'pay_id',
        'price',
        'discount_id',
        'count',
        'color',
        'size',
    ];
    public function pay()
    {
        return $this->belongsTo(Pay::class);
    }
    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function guarantee()
    {
        return $this->morphToMany(Guarantee::class, 'guarantables');
    }

    public function address()
    {
        return $this->morphToMany(Address::class, 'addressables');
    }
}
