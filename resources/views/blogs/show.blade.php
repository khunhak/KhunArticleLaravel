@props(['randomBlogs'])
<x-layout>
    <!-- single blog section -->
    <div class="container">
      <div class="row">
        <div class="col-md-6 mx-auto text-center">
          <img
            src="https://creativecoder.s3.ap-southeast-1.amazonaws.com/blogs/GOLwpsybfhxH0DW8O6tRvpm4jCR6MZvDtGOFgjq0.jpg"
            class="card-img-top"
            alt="..."
          />
          <h3 class="my-3">{{$blog->title}}</h3>
          <!-- <h4>author - <a href="/?author={{$blog->author->username}}">{{$blog->author->name}}</h4></a> -->
          <a href="/?category={{$blog->category->slug}}"><div class="badge bg-primary">{{$blog->category->name}}</div></a>
          <div class='text-secondary'>{{$blog->created_at->diffForHumans()}}</div>
          <p class="lh-md" style="margin-top:15px">
            {{$blog->body}}
          </p>
        </div>
      </div>
    </div>
    <!-- comment section -->
    <x-comments/>
    <!-- subscribe new blogs -->
    <x-subscribe/>
    <x-blogUML :randomBlogs='$randomBlogs' />
    <!-- footer -->
</x-layout>