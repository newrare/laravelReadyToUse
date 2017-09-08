@extends("template")

@section("content")
    <article class="uk-article">
        <h1 class="uk-article-title"><i class="uk-icon-exclamation-triangle"></i> {{ $data["titlePage"] }}</h1>
        <p class="uk-article-meta">{{ $data["messageError"] }}</p>
    </article>
@stop
