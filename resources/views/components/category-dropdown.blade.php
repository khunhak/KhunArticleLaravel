<div>
    <!-- The biggest battle is the war against ignorance. - Mustafa Kemal Atatürk -->
    <div class="dropdown">
        <button class="btn btn-outline-primary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
          {{isset($currentCategory)? $currentCategory->slug: "Select Category"}}
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
          <a  class="dropdown-item" href="/">All</a>
          @foreach($categories as $category)
          <a class="dropdown-item" href="/?category={{$category->slug}}{{request('search')?'&search='.request('search'):''}}{{request('author')?'&author='.request('author'):''}}"><li>{{$category->name}}</li></a>
          @endforeach
        </ul>
      </div>
</div>