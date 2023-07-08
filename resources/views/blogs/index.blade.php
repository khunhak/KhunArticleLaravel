<x-layout>
@if(session('success'))    
     <div class="alert alert-success text-center">{{session('success')}}</div>
@endif
<x-hero/>
<x-blogSection :blogs='$blogs'  />
<x-subscribe/> 
</x-layout>













<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav>
        <ul>
            <li><a href="/">Home</a></li>
            <li><a href="">About</a></li>
            <li><a href="">Contact</a></li>
        </ul>
    </nav>
    <div class="blogContainer">
        <?php foreach ($blogs as $blog) :?>
            <h1><a href="/blog2/{{$blog->slug}}"><?= $blog->title ?></a></h1>
            <h4>author - <a href="/authors/{{$blog->author->username}}">{{$blog->author->name}}</a></h4>
            <h4><a href="./categories/{{$blog->category->name}}">{{$blog->category->name}}</a></h4>
            <div>published at <?= $blog->created_at->diffForHumans()?></div>
            <p>{{$blog->intro}}</p>

           
        <?php endforeach ; ?>
    </div>  
</body>
</html> -->


<!-- test for git July2 -->



