@extends('layers.app')

@section('body')
<div class="">
    <div class="md:flex justify-between mb-6">
        <div class="flex items-center gap-3">
            <p class="text-title font-medium text-lg">Your events</p>
            <a class="text-text hover:underline" href="{{route('event')}}">Add new</a>
        </div>
        <div class="flex ">
            <p class="text-text text-lg">Sort By:</p>
            <select class="text-text cursor-pointer hover:underline" name="" id="">
                <option value="">Views</option>
                <option value="">Date</option>
            </select>
        </div>
    </div>
    <div class="flex flex-col gap-3">
        @if ($events[0] == null)
        <div class="text-text font-medium">You have no events added.</div>
        @else
        <x-event-card-list :events="$events" />
        @endif

    </div>
</div>
@endsection
