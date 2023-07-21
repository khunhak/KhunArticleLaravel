@props(['categories'])

<x-admin-layout>
    <h3 class='my-3 text-center'>Create Blog Here</h3>
        <x-card-wrapper>
            <form action="/admin/blogs/store" method="POST" enctype="multipart/form-data">
                @csrf 
                <x-form.input name="title" />
                <x-form.input name="slug" />
                <x-form.input name="intro" />
                <x-form.textarea name="body" />
                <x-form.input name="thumbnails" type="file"/>
                <x-form.input-wrapper >
                    <x-form.label name="category" />
                    <select name="category_id"  id="category" class="form-control">
                        @foreach($categories as $category)
                        <option {{$category->id==old('category_id') ? 'selected':''}} value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                    <x-error name="category_id" />
                </x-form.input-wrapper>
                <div class="d-flex justify-content-end">
                     <button class="btn btn-primary ">Submit</button>
                </div> 
            </form>
        </x-card-wrapper>
</x-admin-layout>