@extends("template")

@section("content")
    <h1 class="uk-heading-bullet uk-margin-remove">{{ $data["titlePage"] }}</h1>
    <small>{{ $data["messageError"] }}</small>
@stop
