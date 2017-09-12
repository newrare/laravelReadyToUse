@extends('email.template')

@section('contents')
    Hello {{ $userLogin }},<br /><br />

    You have received a message from a visitor ({{ $mailFrom }}):<br />
    {{ $mailMessage }}

    <br /><br />

    Best Regards,<br />
    The laravelReadyToUse team.
@stop
