@component('mail::message')
# Hello {{ $contact['name'] }}!

This is to confirm that {{ config('app.name') }} have received your email.

Again, we would like to thank you for considering our school for an opportunity to be a part of your highly esteemed family.

Thanks,<br>
{{ config('app.name') }} Team.
@endcomponent
