@extends('layers.app')

@section('body')
<div class=" flex justify-center">

    <div class="shadow-md px-4 py-4">
        <div class="text-2xl text-title font-medium text-center">{{$title}}</div>
        <form class="mt-8 flex flex-col gap-4" action="{{$url}}" method="post" enctype="multipart/form-data">
            @csrf
            <x-input type="text" value="Event title" name="title" data="{{$event->title ?? ''}}" />
            <x-input type="date" value="Event start date" name="date" data="{{$event->starts ?? ''}}" />
            <div class="flex flex-col">
                <label class="text-text" for="description">Event Description</label>
                @error('description')
                <p class="text-red-500">{{$message}}</p>
                @enderror
                <textarea class="text-text" name="description" id="description" cols="30" rows="10">{{ $event->description ?? old('description')}}</textarea>
            </div>


            <x-input type="file" value="Event cover" name="cover" />
            <x-input-button value="Add" />
        </form>
    </div>
</div>
@endsection
