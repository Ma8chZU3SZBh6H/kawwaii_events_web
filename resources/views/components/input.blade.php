<div class="flex flex-col">
    <label class=" {{$color ?? 'text-text'}}" for="{{$name}}">{{$value}}</label>
    @error($name)
    <p class="text-red-500">{{$message}}</p>
    @enderror
    <input class="border-b bg-transparent {{$color ?? 'text-title border-text'}} " id="{{$name}}" name="{{$name}}" value="{{($data ?? '') != '' ? $data : old($name)}}" type="{{$type}}">
</div>
