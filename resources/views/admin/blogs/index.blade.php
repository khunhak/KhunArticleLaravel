<x-admin-layout>
<h1>Blogs Index</h1>
<x-card-wrapper>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Title</th>
      <th scope="col">Intro</th>
      <th scope="col" colspan="2">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($blogs as $blog)
    <tr>
      <td>{{$blog->title}}</td>
      <td>{{$blog->intro}}</td>     
      <td><a href="/admin/blogs/{{$blog->slug}}/edit" class="btn btn-warning">Edit</a></td>
      <form action="/admin/blogs/{{$blog->slug}}/delete" method="POST">
        @csrf
        @method('DELETE')
      <td><button type="submit" class="btn btn-danger">Delete</button></td>
      </form>
    </tr>
    @endforeach
  </tbody>
</table>
{{$blogs->links()}}
</x-card-wrapper>
</x-admin-layout>