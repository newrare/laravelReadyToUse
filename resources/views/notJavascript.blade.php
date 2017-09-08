@extends("template")

@section("content")
    <article class="uk-article">
        <h1 class="uk-article-title"><i class="uk-icon-exclamation-triangle"></i> {{ $titlePage }}</h1>
        <p class="uk-article-meta">{{ $titleMessage }}</p>
    </article>
@stop
