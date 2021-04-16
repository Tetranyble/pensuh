@component('mail::message')
    # Enquiry

    {{$contact['message']}}

    Thanks,
    {{$contact['name']}}
    {{ $contact['phone'] ? $contact['phone'] : ''}}

@endcomponent
