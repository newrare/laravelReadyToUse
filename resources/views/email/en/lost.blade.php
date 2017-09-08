@extends('email.template')

@section('contents')
    Hello{{ $userLogin }},<br /><br />

    Here is your new login password:<br />
    {{ $newCode }}<br /><br />

    Best Regards,<br />
    The CollectFull team.
@stop
