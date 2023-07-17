<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Blog;
use Illuminate\Support\Facades\Mail;
use App\Mail\SubscriberMail;

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
     $subscribers = $blog->subscribers->filter(fn ($subscriber) => $subscriber->id != auth()->id());

     $subscribers->each(function ($subscriber) use ($blog) {
         Mail::to($subscriber->email)->queue(new SubscriberMail($blog));
     });
     return redirect('/blog/'.$blog->slug);
   }
}
