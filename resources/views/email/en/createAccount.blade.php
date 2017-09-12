@extends('email.template')

@section('contents')
    Hello {{ $userLogin }},<br /><br />

    To validate your Email, click on this link:<br />
    <a href="#/email/{{ $mailEncrypt }}">#/email/{{ $mailEncrypt }}</a><br /><br />

    Best Regards,<br />
    The laravelReadyToUse team.
@stop
