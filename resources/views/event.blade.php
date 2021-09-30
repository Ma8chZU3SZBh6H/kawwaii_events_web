@extends('layers.app')

@section('body')
<div class="">
    <div class="md:flex justify-between mb-6">
        <a href="{{url()->previous()}}" class="text-title font-medium text-lg ">Go back</a>
    </div>
    <div class="grid md:grid-cols-3 gap-6 relative bg-bgTrans md:bg-transparent rounded-md ">
        <div>
            <p class="text-lightTitle md:text-title  font-medium text-lg m-4 z-10 relative">{{$event->title}}</p>
            <img class="h-full w-full md:h-auto absolute md:relative z-0 filter blur md:blur-0 top-0" src="{{Storage::url($event->cover)}}" alt="">
        </div>
        <div class="flex flex-col gap-6 relative z-10 p-4">
            @guest()
            <div class="flex flex-col gap-3">
                <p class="text-lightTitle md:text-title  text-lg">Registration</p>
                <form class="flex flex-col gap-3" action="{{route('join.guest', $event)}}" method="post">
                    @csrf
                    <x-input color="text-lightText border-lightText md:text-text md:border-text" type="text" value="Enter your email" name="email" />
                    <div>
                        <input class="bg-transparent cursor-pointer text-lightText border-lightText md:text-text md:border-text border rounded py-1 px-4" type="submit" value="Join!">
                    </div>
                </form>
            </div>
            @endauth
            @auth()
            <div class="flex flex-col gap-3">
                <p class="text-lightTitle md:text-title  text-lg">Registration</p>
                @if ($joint != null)
                <p class="text-text">You joined this event!</p>
                @else
                <form class="flex flex-col gap-3" action="{{route('join.auth.accept', $event)}}" method="post">
                    @csrf
                    <div>
                        <input class="bg-transparent cursor-pointer text-lightText border-lightText md:text-text md:border-text border rounded py-1 px-4" type="submit" value="Join!">
                    </div>
                </form>
                @endif

            </div>
            @endauth
            <div>
                <p class="text-lightTitle md:text-title text-lg">Description</p>
                <p class="text-lightText md:text-text">{{$event->description}}</p>
            </div>
        </div>
        <div class="flex flex-col gap-3 relative z-10 p-4">
            <p class="text-lightTitle md:text-title font-medium text-lg">Details</p>
            @auth()
            <div>
                <p class="text-lightTitle md:text-title ">Controls</p>
                <div class="flex gap-1">
                    <a class="text-lightText border-lightText md:text-text md:border-text bg-transparent border  rounded px-2 py-1" href="{{route('event.edit', $event)}}">Edit</a>
                    <form action="{{route('event.delete', $event)}}" method="post">
                        @csrf
                        @method("DELETE")
                        <input class="text-lightText border-lightText md:text-text md:border-text bg-transparent border  rounded px-2 py-1" value="Delete" type="submit">
                    </form>
                </div>
            </div>
            @endauth
            <div>
                <p class="text-lightTitle md:text-title ">Event created</p>
                <p class="text-lightText md:text-text">{{$event->created_at}}</p>
            </div>
            <div>
                <p class="text-lightTitle md:text-title ">Event starts</p>
                <p class="text-lightText md:text-text">{{$event->starts}}</p>
            </div>
        </div>
    </div>
</div>
@endsection
