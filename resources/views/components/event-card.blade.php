<div class="shadow-md w-60  transition hover:shadow-xl relative evento overflow-hidden rounded">
    <div class="absolute opacity-0 z-10 bg-bgTrans bg-opacity-60 h-full w-full p-2 flex justify-between flex-col">
        <div>
            <p class="text-lightTitle font-medium text-2xl">{{$event->title}}</p>
            <p class="text-lightText text-xl font-medium">{{$event->date}}</p>
            <p class="text-lightText">{{$event->description}}</p>
        </div>
        <div class="text-center mb-4 flex flex-col">
            <a href="{{route('event.select', $event)}}" class="text-lightTitle text-xl px-2 py-1 rounded-md  font-medium  hover:underline">Read more</a>
        </div>
    </div>
    <div class=" bg-white filter transition p-2">
        <p class="text-title font-medium text-2xl">{{$event->title}}</p>
        <p class="text-text text-base">Starts in {{str_replace(" from now", "!", (new Carbon\Carbon($event->date))->diffForHumans() ) }}</p>
        <img class="w-full" src="{{Storage::url($event->cover)}}" alt="">
    </div>
</div>
