@props(['randomBlogs','comments'])
<x-layout>
    <!-- single blog section -->
    <div class="container">
      <div class="row">
        <div class="col-md-6 mx-auto text-center">
          <img
            src="/storage/{{$blog->thumbnails}}"
            class="card-img-top"
            alt="..."
          />
          <h3 class="my-3">{{$blog->title}}</h3>
          <!-- <h4>author - <a href="/?author={{$blog->author->username}}">{{$blog->author->name}}</h4></a> -->
          <a href="/?category={{$blog->category->slug}}"><div class="badge bg-primary">{{$blog->category->name}}</div></a>
          <div class='text-secondary'>{{$blog->created_at->diffForHumans()}}</div>
          <div class='text-secondary'>
          <form action="/blogs/{{$blog->slug}}/subscription" method="POST">
            @csrf
            @auth
            @if(auth()->user()->isSubscribed($blog))
            <button class="btn btn-danger">Unsubscribe</button>
            @else
            <button class="btn btn-warning">Subscribe</button>
            @endif
            @endauth
          </form>           
          </div>
          <p class="lh-md" style="margin-top:15px">
            {{$blog->body}}
          </p>
        </div>
      </div>
    </div>
    <!-- comment here -->
    @auth
    <section class="container">
      <div class="col-md-8 mx-auto">
      <x-card-wrapper>
      <x-comment-form :blog="$blog" />
      </x-card-wrapper>
    @else
        <p class="text-center">Pls <a href="/login">login</a> to participate in this discussion</p>
    @endauth
      </div> 
    </section>
    <!-- comment section -->
    
    @if($blog->comments->count())
      <x-comments :comments='$comments' />
    @endif
    {{$comments->links()}}
    <x-blogUML :randomBlogs='$randomBlogs' />
    <!-- footer -->
</x-layout>