<?php

namespace App\Models;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use Illuminate\Support\Facades\File;

use function PHPUnit\Framework\fileExists;

class Blog {

    public $title;
    public $intro;
    public $slug;
    public $body;
    public $id;
    public $date;

    public function __construct($title,$intro,$slug,$body,$id,$date)
    {
        $this->title = $title;
        $this->intro = $intro;
        $this->slug = $slug;
        $this->body = $body;
        $this->id = $id;
        $this->date = $date;
        
    }

    public static function all() 
    {
        
        $files = File::files(resource_path("./blogs"));
        return collect($files)->map(function($file){
            $obj = YamlFrontMatter::parse(file_get_contents($file));
            return new Blog($obj->title,$obj->intro,$obj->slug,$obj->body(),$obj->id,$obj->date);
        },$files)->sortBy('id');
        // dd($blogs);
        // foreach($files as $file)
        // {          
        //     $obj = YamlFrontMatter::parse(file_get_contents($file));
        //     $blogs[] = $obj;
        // }
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          
        // $files = File::files(resource_path('blogs'));
        // return $blogs = array_map(function($blog){
        //     return file_get_contents(resource_path("./blogs/{$blog->getFilename()}")) ;
        // },$files);

        // dd($blogs::orderBy('id'));
    }

    public static function find($slug) 
    {
    //     $blog = [];
    // $path = resource_path("./blogs/$slug.html");
    // if(!file_exists($path)){  
    //     return redirect('/');
    // }
    $blogs = static::all();
    
    return cache()->remember("blog2.$slug",5,function () use($blogs,$slug){
        return $blogs->firstWhere('slug',$slug);
    });
    }

    public static function findOrFail($slug) 
    {
    //     $blog = [];
    // $path = resource_path("./blogs/$slug.html");
    // if(!file_exists($path)){  
    //     return redirect('/');
    // }
    $blogs = static::all();
    $blog = $blogs->firstWhere('slug',$slug);
    if(!$blog){
        abort(404);
    } 
    return cache()->remember("blog2.$slug",5,function () use($blogs,$slug){
        
        return $blogs->firstWhere('slug',$slug);
    });
    }

}