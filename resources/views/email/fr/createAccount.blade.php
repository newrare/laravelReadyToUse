@extends('email.template')

@section('contents')
    Bonjour {{ $userLogin }},<br /><br />

    Pour valider définitivement votre adresse Email, cliquez simplement sur le lien suivant :<br />
    <a href="#/email/{{ $mailEncrypt }}">#/email/{{ $mailEncrypt }}</a><br /><br />

    Cordialement,<br />
    L'équipe laravelReadyToUse.
@stop
