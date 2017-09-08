@extends('email.template')

@section('contents')
    Bonjour {{ $userLogin }},<br /><br />

    Pour valider définitivement votre adresse Email, cliquez simplement sur le lien suivant :<br />
    <a href="http://www.collectFull.com/email/{{ $mailEncrypt }}">http://www.collectFull.com/email/{{ $mailEncrypt }}</a><br /><br />

    Cordialement,<br />
    L'équipe CollectFull.
@stop
