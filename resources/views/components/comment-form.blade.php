@props(['blog'])

<form method="post" action="/blog/{{$blog->slug}}/comments">
          @csrf
            <div class="mb-3">
              <textarea name="body" id="" rows="5" cols="10" class="form-control border border-0" placeholder="say something"></textarea>
            <x-error name="body" />
            </div>
            <div class="d-flex justify-content-end">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
</form>