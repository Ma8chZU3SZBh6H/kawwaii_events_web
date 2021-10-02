<div class="flex flex-wrap gap-3 justify-center md:justify-start">
    @foreach ($events as $event)
    <x-event-card :event="$event" />
    @endforeach
</div>
<div>
    @if (($no_pages ?? false) == true)
    {{$events->links()}}
    @endif
</div>
