@component('mail::message')
# Hello {{ $contact['name'] }}!

This is to confirm that {{ $school['school_name'] }} has received your email.

Again, we would like to thank you for considering our school for an opportunity to be a part of your highly esteemed family.

Thanks,<br>
{{ \Illuminate\Support\Str::slug($school['school_name']) }} Team.
@endcomponent
