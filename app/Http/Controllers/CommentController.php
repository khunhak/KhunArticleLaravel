<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Blog;

class CommentController extends Controller
{
    
   public function store(Blog $blog){
    
     $comment = request()->validate([
        "body"=>['required','min:1']
     ]);
     $blog->comments()->create([
        "body"=>$comment['body'],
        "user_id"=>auth()->user()->id,
        "blog_id"=>$blog->id
     ]);

     return redirect('/blogs/'.$blog->slug);
   }
}
