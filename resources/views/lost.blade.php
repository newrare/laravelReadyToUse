@extends("template")

@section("content")
    <article class="uk-article">
        <h1 class="uk-article-title"><i class="uk-icon-key"></i> {{ $data["titlePage"] }}</h1>
        <p class="uk-article-meta">{{ $data["titleMessage"] }}</p>
    </article>

    <br />

    <div class="uk-bloc">
        <hr />

        {!! Form::open(array("url" => "/lost", "method" => "POST", "class" => "uk-form uk-form-stacked")) !!}
            <!-- email -->
                <div class="uk-form-row">
                    {!! Form::label("email", $data["email"], array("class" => "uk-form-label", "id" => "email")) !!}

                    {!! Form::text("email", "", array("class" => $errors->has("email") ? "uk-form-danger uk-width-1-1" : "uk-width-1-1", "id" => "email")) !!}

                    @if($errors->has("email"))
                        <div class="uk-badge uk-badge-danger"><i class="uk-icon-caret-up"></i> {{ $shareData["error"] }} : {{ $errors->first("email") }}</div>
                    @endif
                </div>
            <!-- /userEmail -->

            <br />

            <div class="uk-grid uk-text-center uk-grid-small" data-uk-grid-margin="">
                <li class="uk-width-small-1-1">
                    {!! Form::submit($data["buttonSend"], array("class" => "uk-button uk-button-large uk-width-1-1")) !!}
                </li>
            </div>
        {!! Form::close() !!}

        <hr />
    </div>
@stop
