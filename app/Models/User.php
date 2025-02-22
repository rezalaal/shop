<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory;
    use Notifiable;
    use HasUuids;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function ticket()
    {
        return $this->hasMany(Ticket::class);
    }

    public function category()
    {
        return $this->morphToMany(Category::class, 'categorizable');
    }

    public function tag()
    {
        return $this->morphToMany(Category::class, 'taggable');
    }

    public function gallery()
    {
        return $this->hasMany(Gallery::class);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
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

    public function cart()
    {
        return $this->hasMany(Cart::class);
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

    public function userMeta()
    {
        return $this->morphToMany(UserMeta::class , 'user_metasables');
    }

    public function report()
    {
        return $this->hasMany(Report::class);
    }

    public function guarantee()
    {
        return $this->morphToMany(Guarantee::class, 'guarantables');
    }

    public function notification()
    {
        return $this->hasMany(Notification::class);
    }

    public function event()
    {
        return $this->hasMany(Event::class);
    }

    public function news()
    {
        return $this->hasMany(News::class);
    }


    public function document()
    {
        return $this->hasMany(Document::class);
    }

    public function checkout()
    {
        return $this->hasMany(Checkout::class);
    }

    public function time()
    {
        return $this->morphToMany(Time::class, 'timables');
    }

    public function pay()
    {
        return $this->hasMany(Pay::class);
    }

    public function payMeta()
    {
        return $this->hasMany(PayMeta::class);
    }

    public function address()
    {
        return $this->morphToMany(Address::class, 'addressables');
    }

    public function charge()
    {
        return $this->hasMany(Charge::class);
    }
}
