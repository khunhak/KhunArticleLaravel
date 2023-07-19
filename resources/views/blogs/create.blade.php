@props(['categories'])

<x-layout>
    <h3 class='my-3 text-center'>Create Blog Here</h3>
    <div class="col-md-8 mx-auto">
        <x-card-wrapper>
            <form action="/admin/blogs/store" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">TItle</label>
                    <input name="title" type="text" class="form-control my-3" id="title" aria-describedby="emailHelp" required value="{{old('title')}}">
                    <x-error name="title" />
                </div>
                <div class="mb-3">
                    <label for="slug" class="form-label">Slug</label>
                    <input name="slug" type="text" class="form-control my-3" id="slug" aria-describedby="emailHelp" required value="{{old('slug')}}">
                    <x-error name="username" />
                </div>
                <div class="mb-3">
                    <label for="intro" class="form-label">intro</label>
                    <input name="intro" type="text" class="form-control my-3" id="intro" aria-describedby="emailHelp" required value="{{old('intro')}}">
                    <x-error name="intro" />
                </div>
                <div class="mb-3">
                    <label for="body" class="form-label">Body</label>
                    <textarea class="form-control my-3" name="body" id="body" cols="30" rows="10" value="{{old('body')}}"></textarea>
                    <x-error name="body" />
                </div>
                <div class="mb-3">
                    <label for="thumbnails" class="form-label">Upload Image</label>
                    <input type="file" name="thumbnails" id="thumbnails" class="form-control">
                    <x-error name="thumbnails" />
                </div>
                <div class="mb-3">
                    <label for="category" class="form-label">Category</label>
                    <select name="category_id"  id="category" class="form-control">
                        @foreach($categories as $category)
                        <option {{$category->id==old('category_id') ? 'selected':''}} value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                    <x-error name="category_id" />
                </div>
                <div class="d-flex justify-content-end">
                     <button class="btn btn-primary ">Submit</button>
                </div> 
            </form>
        </x-card-wrapper>
    </div>
</x-layout>