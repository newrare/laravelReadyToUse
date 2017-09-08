@extends('email.template')

@section('contents')
    Hello {{ $userLogin }},<br /><br />

    To validate your Email, click on this link:<br />
    <a href="http://www.collectFull.com/email/{{ $mailEncrypt }}">http://www.collectFull.com/email/{{ $mailEncrypt }}</a><br /><br />

    Best Regards,<br />
    The CollectFull team.
@stop
