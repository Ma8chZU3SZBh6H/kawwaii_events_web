@extends('layers.app')

@section('body')
<div class=" flex justify-center">
    <div class="shadow-md px-4 py-4">
        <div class="text-2xl text-title font-medium text-center">Registration</div>
        <form class="mt-8 flex flex-col gap-4" action="{{route('register')}}" method="post">
            @csrf
            <x-input type="text" value="Full name" name="name" />
            <x-input type="email" value="Email" name="email" />
            <x-input type="password" value="Password" name="password" />
            <x-input type="password" value="Password again" name="password_confirmation" />
            <x-input-button value="Register" />
        </form>
    </div>
</div>
@endsection
