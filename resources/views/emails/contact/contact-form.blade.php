@component('mail::message')

<div>From: <strong>{{ $data['email'] }}</strong></div>
<div>Name: <strong>{{ $data['name'] }}</strong></div>
<div>Organization: <strong>{{ $data['organization'] }}</strong></div>
<div>Field of interset: <strong>{{ $data['field'] }}</strong></div>
<div>Message:</div>
<div>{{$data['message']}}</div>

@endcomponent
