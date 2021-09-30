<div class="flex flex-wrap gap-3 justify-center md:justify-start">
    @foreach ($events as $event)
    <x-event-card :event="$event" />
    @endforeach
</div>
<div>
    {{$events->links()}}
</div>
