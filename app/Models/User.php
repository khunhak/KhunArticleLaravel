<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
    //public $with = ['blogs','category'];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function blogs(){
        return $this->hasMany(Blog::class);
    }
    public function category(){
        return $this->hasMany(Category::class);
    }
    public function getNameAttribute($value){ // Accessor
        return ucwords($value); 
    }
    public function setPasswordAttribute($value){ // Mutator
        $this->attributes['password'] = bcrypt($value);
    }
    public function subscribedBlogs(){
        return $this->belongsToMany(Blog::class,'blog_user');
    }
}
