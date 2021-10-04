@extends('layers.app')

@section('body')
<div class="">
    <div class="md:flex justify-between mb-6">
        <p class="text-title font-medium text-lg">Events</p>
        <div class="flex ">
            <p class="text-text text-lg">Sort By:</p>
            <select id="sort_button" class="text-text cursor-pointer hover:underline" name="" id="">

                <option {{ $sort == "title" ? 'selected' : ''}} value="title">Names</option>
                <option {{ $sort == "starts" ? 'selected' : ''}} value="starts">Date</option>
            </select>
        </div>
    </div>
    @if ($events[0] == null)
    <div class="text-text font-medium">No events found.</div>
    @else
    <x-event-card-list :events="$events" />
    @endif
</div>
@endsection
