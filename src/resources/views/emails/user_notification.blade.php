@component('mail::message')
# {{ $details['title'] }}

{{ $details['message'] }}

Thanks,<br>
{{ config('app.name') }}
@endcomponent