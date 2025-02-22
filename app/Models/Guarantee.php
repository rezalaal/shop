<?php

namespace App\Models;

use App\Models\Traits\HasFormattedCreatedAt;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Guarantee extends Model
{
    /** @use HasFactory<\Database\Factories\GuaranteeFactory> */
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


    public function user()
    {
        return $this->morphToMany(User::class, 'guarantables');
    }

    public function post()
    {
        return $this->morphedByMany(Post::class, 'guarantables');
    }

    public function guarantee()
    {
        return $this->morphedByMany(Guarantee::class, 'guarantables');
    }
}
