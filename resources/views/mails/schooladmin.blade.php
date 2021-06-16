@component('mail::message')
# Hello {{ $user['firstname'] }}

Welcome to {{ config('app.name') }} digital school management system.
You created a school on our platform and here are your credentials.

# username: {{ $user['email'] }}
# password: {{ $password }}

We look forward to being part of your family.

@component('mail::button', ['url' => url('//'.$school['alias'])])
Preview School
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
