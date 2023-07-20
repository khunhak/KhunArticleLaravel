@props(['name'])
<x-form.input-wrapper>
<div class="mb-3">
  <x-form.label :name="$name" />
  <textarea class="form-control my-3 editor" name="{{$name}}" id="{{$name}}" cols="30" rows="10" value="">{{old($name)}}</textarea>
  <x-error :name="$name" />
</div>
</x-form.input-wrapper> 