@extends("template")

@section("content")
    <article class="uk-article">
        <h1 class="uk-article-title"><i class="uk-icon-book"></i> {{ $data["titlePage"] }}</h1>
        <p class="uk-article-meta">{{ $data["titleMessage"] }}</p>
    </article>

    <br />

    @if($data["reply"]["isAdmin"] == 1)
        <div class="uk-width-1-1 uk-text-center uk-margin-large-bottom">
            <a href="/blog/create" class="uk-icon-button uk-icon-plus" data-uk-tooltip="{pos:'bottom'}" title="{{ $shareData['add'] }}"></a>
        </div>
    @endif

    @foreach($data["reply"]["ListBlog"] as $blog)
        <div class="uk-panel uk-panel-box">
            @if(isset($blog["urlImage"]))
                <div class="uk-margin" style='height: 200px; background-image: url({{ $blog["urlImage"]  }}); background-repeat: no-repeat; background-color: black; background-position: center'></div>
            @endif

            <h1 class="uk-panel-title">{{{ $blog["messageTitle"] }}}</h3>

            <p class="uk-article-meta">{{ $blog["messageDate"] }} | {{{ $blog["user"] }}}</p>

            {{{ $blog["message"] }}}

            @if(isset($blog["urlVideo"]))
                <br /><br />

                <iframe src="{{ $blog['urlVideo'] }}" allowfullscreen width="" height="" frameborder="0" class="uk-responsive-width"></iframe>
            @endif

            @if($data["reply"]["isAdmin"] == 1)
                <hr />

                <div class="uk-float-left">
                    <a href="/blog/{{ $blog['id'] }}" class="uk-icon-button uk-icon-pencil" data-uk-tooltip="{pos:'bottom'}" title="{{ $shareData['edit'] }}"></a>

                    <a href="#" name="/blog/{{ $blog['id'] }}" class="uk-icon-button uk-icon-trash" data-uk-tooltip="{pos:'bottom'}" title="{{ $shareData['remove'] }}"></a>
                </div>
            @endif

        </div>

        <br /><br />
    @endforeach
@stop
