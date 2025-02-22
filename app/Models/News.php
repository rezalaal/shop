<?php

namespace App\Models;

use App\Models\Traits\HasFormattedCreatedAt;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class News extends Model
{
    /** @use HasFactory<\Database\Factories\NewsFactory> */
    use HasFactory;
    use HasSlug;
    use HasFormattedCreatedAt;

    protected $fillable=[
        'title',
        'accept',
        'time',
        'status',
        'suggest',
        'image',
        'body',
        'slug',
    ];


    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug')
            ->usingLanguage('fa');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tag()
    {
        return $this->morphToMany(Tag::class, 'taggables');
    }
    
    public function category()
    {
        return $this->morphToMany(Category::class, 'catables');
    }

}
