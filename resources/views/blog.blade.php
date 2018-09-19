@extends("template")

@section("content")
    <h1 class="uk-heading-bullet uk-margin-remove">{{ $data["titlePage"] }}</h1>
    <small>{{ $data["titleMessage"] }}</small>

    @if($data["web"]["isAdmin"] == 1)
        <div class="uk-container uk-text-center uk-width-1-1 uk-margin">
            <a href="/blog/create" class="uk-icon-button" uk-icon="plus" uk-tooltip="{{ $shareData['add'] }}"></a>
        </div>
    @endif

    @foreach($data["web"]["ListBlog"] as $blog)
        <div class="uk-box-shadow-medium uk-padding uk-article uk-margin-top">
            @if(isset($blog["urlImage"]))
                <div class="uk-margin" style='height: 200px; background-image: url({{ $blog["urlImage"]  }}); background-repeat: no-repeat; background-color: black; background-position: center'></div>
            @endif

            <h3 class="uk-margin-remove">{{{ $blog["messageTitle"] }}}</h3>

            <p class="uk-article-meta uk-margin-remove">{{ $blog["messageDate"] }} | {{{ $blog["user"] }}}</p>

            <p>{{{ $blog["message"] }}}</p>


            @if(isset($blog["urlVideo"]))
                <iframe src="{{ $blog['urlVideo'] }}" allowfullscreen width="" height="" frameborder="0" class="uk-responsive-width"></iframe>
            @endif

            @if($data["web"]["isAdmin"] == 1)
                <hr />

                {!! Form::open(array("url" => "/blog/" . $blog["id"], "method" => "DELETE", "class" => "uk-form", "id" => "remove" . $blog['id'])) !!}
                    <a href="/blog/{{ $blog['id'] }}" uk-icon="icon: pencil" uk-tooltip="{{ $shareData['edit'] }}" class="uk-icon-button"></a>

                    <a href="#" uk-icon="icon: trash" uk-tooltip="{{ $shareData['remove'] }}" name="{{ 'remove' . $blog['id'] }}" class="uk-icon-button submitTrash"></a>
                {!! Form::close() !!}
            @endif
        </div>
    @endforeach
@stop
