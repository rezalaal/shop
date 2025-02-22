<?php

namespace App\Models;

use App\Models\Traits\HasFormattedCreatedAt;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class View extends Model
{
    /** @use HasFactory<\Database\Factories\ViewFactory> */
    use HasFactory;
    use HasFormattedCreatedAt;

    protected $fillable=[
        'user_ip',
        'browser',
        'platform',
    ];

    public function post()
    {
        return $this->morphedByMany(Post::class, 'viewables');
    }
    public function user()
    {
        return $this->morphedByMany(User::class, 'viewables');
    }
}
