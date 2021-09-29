@extends('layers.app')

@section('body')
<div class="mb-6">
    <p class="text-title font-medium text-lg">Profile</p>
</div>
<div class="flex flex-col gap-3">
    <div>
        <p class="text-text font-medium">Full name</p>
        <p class="text-text">{{Auth()->User()->name}}</p>
    </div>
    <div>
        <p class="text-text font-medium">Email</p>
        <p class="text-text">{{Auth()->User()->email}}</p>
    </div>
    <div>
        <p class="text-text font-medium">Account created</p>
        <p class="text-text">{{Auth()->User()->created_at}}</p>
    </div>
</div>
@endsection
