@extends('email.template')

@section('contents')
    Hello {{ $userLogin }},<br /><br />

    To validate your Email, click on this link:<br />
    <a href="{{ env('APP_URL') }}/email/{{ $mailEncrypt }}">{{ env('APP_URL') }}/email/{{ $mailEncrypt }}</a><br /><br />

    Best Regards,<br />
    The {{ env('APP_NAME') }} team.
@stop
