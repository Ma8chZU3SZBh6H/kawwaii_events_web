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
            <select id="sort_button" class="text-text cursor-pointer hover:underline" name="" id="">
                <option {{ $sort == "title" ? 'selected' : ''}} value="title">Names</option>
                <option {{ $sort == "starts" ? 'selected' : ''}} value="starts">Date</option>
            </select>
        </div>
    </div>
    <div class="flex flex-col gap-3">
        @if (!isset($events))
        <div class="text-text font-medium">No events found.</div>
        @else
        <x-event-card-list :events="$events" />
        @endif

    </div>
</div>
@endsection
