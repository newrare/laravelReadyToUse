@extends("template")

@section("content")
    <article class="uk-article">
        <h1 class="uk-article-title"><i class="uk-icon-plus-circle"></i> {{ $data["titlePage"] }}</h1>
        <p class="uk-article-meta">{{ $data["addNews"] }}</p>
    </article>

    <br />

    <div class="uk-bloc">
        <hr />

        {!! Form::open(array("url" => $data["reply"]["formUrl"], "method" => $data["reply"]["formMethod"], "class" => "uk-form uk-form-stacked")) !!}
            <!-- messageTitle -->
                <div class="uk-form-row">
                    {!! Form::label("messageTitle", $data["messageTitle"], array("class" => "uk-form-label", "id" => "messageTitle")) !!}

                    {!! Form::text("messageTitle", $data["reply"]["messageTitle"], array("class" => $errors->has("messageTitle") ? "uk-form-danger uk-width-1-1" : "uk-width-1-1", "id" => "messageTitle")) !!}

                    @if($errors->has("messageTitle"))
                        <div class="uk-badge uk-badge-danger"><i class="uk-icon-caret-up"></i> {{ $shareData["error"] }} : {{ $errors->first("messageTitle") }}</div>
                    @endif
                </div>
            <!-- /messageTitle -->

            <!-- message -->
                <div class="uk-form-row">
                    {!! Form::label("message", $data["message"], array("class" => "uk-form-label", "id" => "message")) !!}

                    {!! Form::textarea("message", $data["reply"]["message"], array("class" => $errors->has("message") ? "uk-form-danger uk-width-1-1" : "uk-width-1-1", "id" => "message")) !!}

                    @if($errors->has("message"))
                        <div class="uk-badge uk-badge-danger"><i class="uk-icon-caret-up"></i> {{ $shareData["error"] }} : {{ $errors->first("message") }}</div>
                    @endif
                </div>
            <!-- /message -->

            <!-- lang -->
                <div class="uk-form-row">
                    {!! Form::label("lang", $data["lang"], array("class" => "uk-form-label", "id" => "lang")) !!}

                    {!! Form::select("lang", array("" => "", "fr" => "Français", "en" => "English"), $data["reply"]["lang"], array("class" => $errors->has("lang") ? "uk-form-danger uk-width-1-1 uk-form-select" : "uk-width-1-1 uk-form-select", "id" => "lang")) !!}

                    @if($errors->has("lang"))
                        <div class="uk-badge uk-badge-danger"><i class="uk-icon-caret-up"></i> {{ $shareData["error"] }} : {{ $errors->first("lang") }}</div>
                    @endif
                </div>
            <!-- /lang -->

            <!-- urlImage -->
                <div class="uk-form-row">
                    {!! Form::label("urlImage", $data["urlImage"], array("class" => "uk-form-label", "id" => "urlImage")) !!}

                    {!! Form::text("urlImage", $data["reply"]["urlImage"], array("class" => $errors->has("urlImage") ? "uk-form-danger uk-width-1-1" : "uk-width-1-1", "id" => "urlImage")) !!}

                    @if($errors->has("urlImage"))
                        <div class="uk-badge uk-badge-danger"><i class="uk-icon-caret-up"></i> {{ $shareData["error"] }} : {{ $errors->first("urlImage") }}</div>
                    @endif
                </div>
            <!-- urlImage -->

            <!-- urlVideo -->
                <div class="uk-form-row">
                    {!! Form::label("urlVideo", $data["urlVideo"], array("class" => "uk-form-label", "id" => "urlVideo")) !!}

                    {!! Form::text("urlVideo", $data["reply"]["urlVideo"], array("class" => $errors->has("urlVideo") ? "uk-form-danger uk-width-1-1" : "uk-width-1-1", "id" => "urlVideo")) !!}

                    @if($errors->has("urlVideo"))
                        <div class="uk-badge uk-badge-danger"><i class="uk-icon-caret-up"></i> {{ $shareData["error"] }} : {{ $errors->first("urlVideo") }}</div>
                    @endif
                </div>
            <!-- urlVideo -->

            <br />

            <div class="uk-grid uk-text-center uk-grid-small" data-uk-grid-margin="">
                <li class="uk-width-small-1-1">
                    {!! Form::submit($shareData["save"], array("class" => "uk-button uk-button-large uk-width-1-1")) !!}
                </li>
            </div>
        {!! Form::close() !!}

        <hr />
    </div>
@stop
