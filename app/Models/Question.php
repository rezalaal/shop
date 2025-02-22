<?php

namespace App\Models;

use App\Models\Traits\HasFormattedCreatedAt;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    /** @use HasFactory<\Database\Factories\QuestionFactory> */
    use HasFactory;
    use HasFormattedCreatedAt;

    protected $fillable=[
        'title',
        'body',
        'approved',
        'user_id',
        'post_id',
        'parent_id',
    ];

    public function questions()
    {
        return $this->hasMany(Question::class , 'parent_id' , 'id');
    }
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
