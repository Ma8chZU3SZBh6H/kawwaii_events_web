@extends('layers.app')

@section('body')
<div class=" flex justify-center">
    <div class="shadow-md px-4 py-4 text-center flex flex-col gap-4 rounded">
        <div class="text-2xl text-title ">Registration complete!</div>
        <div class="text-xl text-text ">Welcome <span class="font-medium">{{$name}}</span></div>
        <a class="text-text hover:underline" href="{{route('home')}}">Go back home</a>
    </div>
</div>
@endsection
