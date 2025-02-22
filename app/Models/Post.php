<?php

namespace App\Models;

use App\Traits\HasFormattedCreatedAt;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Post extends Model
{
    /** @use HasFactory<\Database\Factories\PostFactory> */
    use HasFactory;
    use HasSlug;
    use HasUuids;
    use HasFormattedCreatedAt;

    protected $fillable=[
        'title',
        'body',
        'type',
        'score',
        'status',
        'showcase',
        'used',
        'original',
        'suggest',
        'count',
        'variety',
        'slug',
        'price',
        'off',
        'offPrice',
        'user_id',
    ];

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug')
            ->usingLanguage('fa');
    }


    public function category()
    {
        return $this->morphToMany(Category::class, 'catables');
    }

    public function post()
    {
        return $this->morphedByMany(Post::class, 'postables');
    }

    public function tag()
    {
        return $this->morphToMany(Tag::class, 'taggables');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function review()
    {
        return $this->morphToMany(Review::class, 'reviewables');
    }

    public function brand()
    {
        return $this->morphToMany(Brand::class, 'brandables');
    }

    public function like()
    {
        return $this->hasMany(Like::class);
    }

    public function bookmark()
    {
        return $this->hasMany(Bookmark::class);
    }

    public function rate()
    {
        return $this->hasMany(Rate::class);
    }

    public function view()
    {
        return $this->morphToMany(View::class, 'viewables');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function report()
    {
        return $this->belongsTo(Report::class);
    }

    public function guarantee()
    {
        return $this->morphToMany(Guarantee::class, 'guarantables');
    }

    public function question()
    {
        return $this->hasMany(Question::class);
    }
    
    public function time()
    {
        return $this->morphToMany(Time::class, 'timables');
    }

    public function payMeta()
    {
        return $this->hasMany(PayMeta::class);
    }
}
