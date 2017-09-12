@extends("template")

@section("content")
    <article class="uk-article">
        <h1 class="uk-article-title"><i class="uk-icon-th-list"></i> {{ $data["titlePage"] }}</h1>
        <p class="uk-article-meta">{{ $data["titleMessage"] }}</p>
    </article>
@stop
