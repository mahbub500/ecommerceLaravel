@component('mail::message')
# Hello

{{ $message }}

@component('mail::button', ['url' => ''])
Almas
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
