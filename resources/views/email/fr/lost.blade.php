@extends('email.template')

@section('contents')
    Bonjour {{ $userLogin }},<br /><br />

    Utilisez ce lien pour mettre à jour votre mot de passe personnel :<br />
    <a href="{{ env('APP_URL') }}/email/{{ $mailEncrypt }}">{{ env('APP_URL') }}/email/{{ $mailEncrypt }}</a><br /><br />

    Cordialement,<br />
    L'équipe {{ env('APP_NAME') }}.
@stop
