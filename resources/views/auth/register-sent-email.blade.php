@extends('layers.app')

@section('body')
<div class=" flex justify-center">
    <div class="shadow-md px-4 py-4 text-center flex flex-col gap-4 rounded">
        <div class="text-2xl text-title ">Email was sent to <span class="font-medium">{{$email}}</span>!</div>
        <div class="text-xl text-text ">To complete the registration, <br> you must confirm the mail!</div>
        <a class="text-text hover:underline" href="{{route('home')}}">Go back home</a>
    </div>
</div>
@endsection
