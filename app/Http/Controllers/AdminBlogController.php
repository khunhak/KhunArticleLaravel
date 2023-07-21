<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Blog;
use Illuminate\Validation\Rule;

class AdminBlogController extends Controller


{
    public function index(){
        return view('admin.blogs.index',[
            'blogs'=>Blog::latest()->paginate(6)
        ]);
    }
    public function create()
    {
        return view('admin.blogs.create',[
            'categories'=>Category::all()
        ]);
    }
    public function store()
    {
       
        $formDatas = request()->validate([
            "title"=>['required'],
            'intro'=>['required'],
            'slug'=>['required',Rule::unique('blogs','slug')],
            'body'=>['required'],
            'category_id'=>['required',Rule::exists('categories','id')]
        ]);
        $formDatas['user_id'] = auth()->id();
        $formDatas['thumbnails'] = request()->file('thumbnails')->store('blog_thumbnails');
        Blog::create($formDatas);
       
        return redirect ('/');
    }
    public function destroy(Blog $blog){
        
        $blog->delete();
        return back();
    }
    public function edit(Blog $blog)
    {
        return view('admin.blogs.edit',[
            'blog'=>$blog,
            'categories'=>Category::all()
        ]);
    }
}
