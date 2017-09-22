@extends('email.template')

@section('contents')
    Bonjour {{ $userLogin }},<br /><br />

    Pour valider définitivement votre adresse Email, cliquez simplement sur le lien suivant :<br />
    <a href="{{ env('APP_URL') }}email/{{ $mailEncrypt }}">{{ env('APP_URL') }}/email/{{ $mailEncrypt }}</a><br /><br />

    Cordialement,<br />
    L'équipe {{ env('APP_NAME') }}.
@stop
