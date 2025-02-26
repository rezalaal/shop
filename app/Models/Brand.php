<?php

namespace App\Models;

use App\Traits\HasFormattedCreatedAt;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Brand extends Model
{
    use HasFactory;
    use HasSlug;    
    use HasFormattedCreatedAt;

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

    public function users()
    {
        return $this->morphToMany(User::class, 'brandable', 'brandables', 'brand_id', 'brandable_id');
    }

    public function posts()
    {
        return $this->morphToMany(Post::class, 'brandable', 'brandables', 'brand_id', 'brandable_id');
    }
}
