@props(['blog'])
  <div class="card">
            <img
              src="/storage/{{$blog->thumbnails}}"
              class="card-img-top"
              alt="..." height="300px"
            />
            <div class="card-body">
              <h3 class="card-title">{{$blog->title}}</h3>
              <p class="fs-6 text-secondary">
                 <a href="/?author={{$blog->author->username}}{{request('search')?'&search='.request('search'):''}}{{request('category')?'&category='.request('category'):''}}">{{$blog->author->name}}</a>
                <span> {{$blog->created_at}}</span>
              </p>
              <div class="tags my-3">
                <a href="/?category={{$blog->category->slug}}{{request('search')?'&search='.request('search'):''}}{{request('author')?'&author='.request('author'):''}}"><span class="badge bg-primary">{{$blog->category->name}}</span></a>
              </div>
              <p class="card-text">
              {{$blog->intro}}
              <!-- // $body = str_word_count(strip_tags($blog->body), 1); // Convert the body content to an array of words
              // $intro = implode(' ', array_slice($body, 0, 20));
              // echo ($intro); -->
             
              </p>
              <a href="/blog/{{$blog->slug}}" class="btn btn-primary">Read More</a>
            </div>
</div>

