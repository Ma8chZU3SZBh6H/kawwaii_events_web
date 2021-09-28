@component('mail::message')
# KAWAII EVENTS

Hello {{$name}}

To complete the registration, you must click on the confirm button! ^^

<!-- @component('mail::button', ['url' => '{{$url}}'])
Confirm
@endcomponent -->
<div class="">
    <form style="text-align: center;" action="{{route('register.confirm', $data)}}" method="get">
        <input style="font-size: 20px; cursor: pointer;" class="button button-primary mx-auto" type="submit" value="Confirm">
    </form>
</div>
Thanks,<br>
{{ config('app.name') }}
@endcomponent
