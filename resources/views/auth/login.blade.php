@extends('layers.app')

@section('body')
<div class=" flex justify-center">
    <div class="shadow-md px-4 py-4">
        <div class="text-2xl text-title font-medium text-center">Login</div>
        <form class="mt-8 flex flex-col gap-4" action="{{route('login')}}" method="post">
            @csrf
            <x-input type="email" value="Email" name="email" />
            <x-input type="password" value="Password" name="password" />
            <div class="flex gap-3 flex-row ">
                <label class="text-text" for="remember">Remeber me</label>
                <input class="mt-1 border-b text-title border-text" id="remember" name="remember" value="{{old('remember')}}" type="checkbox">
            </div>

            <x-input-button value="Login" />
        </form>
    </div>
</div>
@endsection
