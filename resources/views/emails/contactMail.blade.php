@component('mail::message')
Name: {{ $details['name'] }}<br>
Email: {{ $details['email'] }}<br>
Message: {{ $details['message'] }}

Thanks,<br>
{{ config('app.name') }}
@endcomponent