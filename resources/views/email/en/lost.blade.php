@extends('email.template')

@section('contents')
    Hello {{ $userLogin }},<br /><br />

    Use this link for update your personal password:<br />
    <a href="{{ env('APP_URL') }}/email/{{ $mailEncrypt }}">{{ env('APP_URL') }}/email/{{ $mailEncrypt }}</a><br /><br />

    Best Regards,<br />
    The {{ env('APP_NAME') }} team.
@stop
