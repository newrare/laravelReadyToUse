@extends("template")

@section("content")
    <article class="uk-article">
        <h1 class="uk-article-title"><i class="uk-icon-sign-in"></i> {{ $data["titlePage"] }}</h1>
        <p class="uk-article-meta">{{ $data["titleMessage"] }}</p>
    </article>

    <br />

    @include("templateConnection")
@stop
