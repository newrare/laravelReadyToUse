@extends('email.template')

@section('contents')
    Bonjour {{ $userLogin }},<br /><br />

    Vous avez reçu un message d'un visiteur ({{ $mailFrom }}) :<br />
    {{ $mailMessage }}

    <br /><br />

    Cordialement,<br />
    L'équipe laravelreadyToUse.
@stop
