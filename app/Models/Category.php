<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Category extends Model
{
    /** @use HasFactory<\Database\Factories\CategoryFactory> */
    use HasFactory;
    use HasSlug;

    protected $fillable=[
        'name', 'slug'
    ];

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug')
            ->usingLanguage('fa');
    }

    public function posts()
    {
        return $this->morphedByMany(Post::class, 'categorizable');
    }

    public function news()
    {
        return $this->morphedByMany(News::class, 'catables');
    }
}