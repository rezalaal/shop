<?php

namespace App\Models;

use App\Models\Traits\HasFormattedCreatedAt;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    /** @use HasFactory<\Database\Factories\CommentFactory> */
    use HasFactory;
    use HasFormattedCreatedAt;
    
    protected $fillable=[
        'body','title','rate','good','bad','parent_id','seen','approved','post_id','email','name','user_id','status'
    ];
    protected $with = ['user'];

    public function comments()
    {
        return $this->hasMany(Comment::class , 'parent_id' , 'id');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
