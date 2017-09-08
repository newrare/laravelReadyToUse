@extends("template")

@section("content")
    <article class="uk-article">
        <h1 class="uk-article-title"><i class="uk-icon-eye"></i> {{ $data["titlePage"] }}</h1>
        <p class="uk-article-meta">{{ $data["titleMessage"] }}</p>
    </article>

    <table class="uk-table uk-table-hover uk-table-striped">
        <thead>
            <tr>
                <th class="uk-text-bold">{{ $data["key"] }}</th>
                <th class="uk-text-bold">{{ $data["value"] }}</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($data["reply"] as $key => $item)
                <tr>
                    <th class="uk-text-muted">{{ $key }}</th>
                    <th class="uk-text-muted">{{ $item }}</th>
                </tr>
            @endforeach
        </tbody>
    </table>
@stop
