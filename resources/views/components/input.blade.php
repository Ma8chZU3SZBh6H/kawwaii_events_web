<div class="flex flex-col">
    <label class="text-text" for="{{$name}}">{{$value}}</label>
    @error($name)
    <p class="text-red-500">{{$message}}</p>
    @enderror
    <input class="border-b text-title border-text" id="{{$name}}" name="{{$name}}" value="{{old($name)}}" type="{{$type}}">
</div>
