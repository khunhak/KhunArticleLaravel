<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    public function blog(){
        return $this->belongsTo(Blog::class);
    }
    public function author(){
        return $this->belongsTo(User::class,'user_id');
    }
}
