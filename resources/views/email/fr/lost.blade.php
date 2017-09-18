@extends('email.template')

@section('contents')
    Bonjour{{ $userLogin }},<br /><br />

    Voici votre nouveau mot de passe de connexion :<br />
    {{ $newCode }}<br /><br />

    Cordialement,<br />
    L'équipe {{ env('APP_NAME') }}.
@stop
