<?php

namespace App\Models;

use App\Models\Cateogry;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Comment;


class Blog extends Model
{
    use HasFactory;

    public $fillable = ['title','intro','body'];
    public $guarded = ['id'];
    public $with = ['category','author'];

    public function scopeFilter($query,$filter){ // $query = Blog::latest()
        
        $query->when($filter['search']??null,function($query,$search){
            $query->where(function($query) use($search){
                $query->where('title','LIKE','%'.$search.'%')
                  ->orWhere('body','LIKE','%'.$search.'%');
            });
        });
        $query->when($filter['category']??null,function($query,$category){
            $query->where(function($query) use($category){
                $query->whereHas('category',function($categoryQuery) use ($category){
                    $categoryQuery->where('slug',$category);
                });
            });
            
        });
        $query->when($filter['author']??null,function($query,$author){
            $query->where(function($query) use($author){
                $query->whereHas('author',function($authorQuery) use ($author){
                        $authorQuery->where('username',$author);
                });
                
            });       
        });
        return $query;
    }
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function author(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function comments(){
        return $this->hasMany(Comment::class);
    }
    public function subscribers(){
        return $this->belongsToMany(User::class,'blog_user');// many to many relation
    }
    public function unSubscribe(){
        $this->subscribers()->detach(auth()->id());
    }
    public function subscribe(){
        $this->subscribers()->attach(auth()->id());
    }
}
