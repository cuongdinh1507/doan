@component('mail::message')

# Thank you
{{ $data['name'] }}
{{ $data['email'] }}
{{ $data['organization'] }}
{{ $data['field'] }}
{{ $data['subject'] }}

{{ $data['message'] }}

@endcomponent
