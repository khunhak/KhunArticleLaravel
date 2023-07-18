<?php

namespace App\Http\Controllers;
use App\Models\Blog;
use App\Models\User;
use App\Models\Category;
use Illuminate\Validation\Rule;


use Illuminate\Http\Request;

class BlogController extends Controller
{
    //
    public function index() {
    
 
        // $files = File::files(resource_path('./blogs'));
        // dd(files);
        
        // $blogs= file_get_contents(resource_path('/blogs/firstBlog.html'));
        // if(!file_exists($blog)){
        //     return redirect('/');
        // }
        
        return view('blogs.index',[
           // use $with at model instead  'blogs'=>Blog::with('category','author')->get()
           'blogs'=>Blog::latest()
                         ->filter(request(['search','category','author']))
                         ->paginate(6) // simplePaginate() only contain previous and next
                         ->withQueryString()
           
        ]);
    }

    public  function show (Blog $blog) {//Blog::findOrFail($id)

        return view('blogs.show',[
            'blog'=>$blog,
            'randomBlogs'=>Blog::inRandomOrder()->take(3)->get(),
            'comments' => $blog->comments()->latest()->paginate(3)
        ]);
        
    }
    protected function getBlogs(){
        $blogs = Blog::latest();
        // if(request('search')){
        //     $blogs = Blog::latest()->where('title', 'LIKE' , '%'. request('search'). '%')
        //                             ->orWhere('body', 'LIKE' , '%'. request('search'). '%');
        // }
        $blogs->when(request('search'),function($blogs,$search){
            $blogs->where('title','LIKE','%'.$search.'%')
                  ->orWhere('body','LIKE','%'.$search.'%');
        });
        return $blogs;
    }
    public function subscriptionHandler(Blog $blog){
        if(User::find(auth()->id())->isSubscribed($blog)){
            $blog->unSubscribe();
        }else{
            $blog->subscribe();
        }
        return back();
    }
    
    public function create()
    {
        return view('blogs.create',[
            'categories'=>Category::all()
        ]);
    }
    public function store()
    {
       
        $formDatas = request()->validate([
            "title"=>['required','min:1'],
            'intro'=>['required','min:1'],
            'slug'=>['required','min:1',Rule::unique('blogs','slug')],
            'body'=>['required','min:1'],
            'category_id'=>['required']
        ]);
        $formDatas['user_id'] = auth()->id();
        Blog::create($formDatas);
       
        return redirect ('/');
    }

}