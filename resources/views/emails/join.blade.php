@component('mail::message')
# KAWAII EVENTS

Hello!

You were invited to {{$event->name}}

<div class="">
    <form style="text-align: center;" action="{{route('join.guest.accept', $data)}}" method="get">
        <input style="font-size: 20px; cursor: pointer;" class="button button-primary mx-auto" type="submit" value="Confirm">
    </form>
</div>
Thanks,<br>
{{ config('app.name') }}
@endcomponent
