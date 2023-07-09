<?php

use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Models\Blog;
use App\Models\Category;
use App\Models\User;


Route::get('/', [BlogController::class,'index']);
Route::get('/blog/{blog:slug}',[BlogController::class,'show'])->where('wildcard','[A-z0-9_]+');
Route::get('/register', [AuthController::class,'create'])->middleware('guest');
Route::post('/register', [AuthController::class,'store'])->middleware('guest');
Route::post('/logout',[AuthController::class,'logout'])->middleware('auth');

Route::post('/blog/{blog:slug}/comments',[CommentController::class,'store']);
Route::get('/login',[AuthController::class,'login'])->middleware('guest');
Route::post('/post_login',[AuthController::class,'post_login'])->middleware('guest');






// Route::get('/categories/{category:slug}', function (Category $category) {//Blog::findOrFail($id)
    
//     $blogs = $category->blogs;
    
    
//     return view('blogs',[
//         'blogs'=>$blogs,
//         // 'categories'=>Category::all(),
//         // 'currentCategory'=>$category->name
//     ]);
    
// })->where('wildcard','[A-z0-9_]+');

// Route::get('/authors/{author:username}', function (User $author) {//Blog::findOrFail($id)
    
//     $blogs = $author->blogs;
    
    
//     return view('blogs',[
//         'blogs'=>$blogs,
//         'categories'=>Category::all()
//     ]);
    
// })->where('wildcard','[A-z0-9_]+');