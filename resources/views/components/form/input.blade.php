@props(['name','type'=>'text','value'=>''])

<x-form.input-wrapper>
    <x-form.label :name="$name" />
    <input name="{{$name}}" type="{{$type}}" class="form-control my-3" id="{{$name}}" value="{{old($name,$value)}}">
    <x-error :name="$name" />
</x-form.input-wrapper>
 