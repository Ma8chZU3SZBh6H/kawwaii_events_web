@extends('layers.app')

@section('body')
<div class="">
    <div class="md:flex justify-between">
        <p class="text-title font-medium text-lg">Events</p>
        <div class="flex mb-6">
            <p class="text-text text-lg">Sort By:</p>
            <select class="text-text" name="" id="">
                <option value="">Views</option>
                <option value="">Date</option>
            </select>
        </div>
    </div>
    <div class="flex flex-wrap gap-3 justify-center md:justify-start">
        <x-event-card />
        <x-event-card />
    </div>
</div>
@endsection
