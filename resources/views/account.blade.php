@extends("template")

@section("content")
    <article class="uk-article">
        <h1 class="uk-article-title"><i class="uk-icon-user"></i> {{ $data["titlePage"] }}</h1>
        <p class="uk-article-meta">
            @if(isset($data["reply"]["isCreate"]))
                {{ $data["titleCreate"] }}
            @else
                {{ $data["titleMessage"] }}
            @endif
        </p>
    </article>

    <br />

    <div class="uk-panel">
        {!! Form::open(array("url" => "/account", "class" => "uk-form uk-form-stacked")) !!}
            <!-- login -->
                <div class="uk-form-row">
                    {!! Form::label("login", $data["connectionLogin"], array("class" => "uk-form-label", "id" => "login")) !!}

                    {!! Form::text("login", "", array("class" => $errors->has("login") ? "uk-form-danger uk-width-1-1" : "uk-width-1-1", "id" => "login")) !!}

                    @if($errors->has("login"))
                        <div class="uk-badge uk-badge-danger"><i class="uk-icon-caret-up"></i> {{ $shareData["error"] }} : {{ $errors->first("login") }}</div>
                    @endif
                </div>
            <!-- /login -->

            <!-- pass -->
                <div class="uk-form-row">
                    {!! Form::label("pass", $data["connectionPass"], array("class" => "uk-form-label", "id" => "pass")) !!}

                    {!! Form::password("pass", array("class" => $errors->has("pass") ? "uk-form-danger uk-width-1-1" : "uk-width-1-1", "id" => "pass")) !!}

                    @if($errors->has("pass"))
                        <div class="uk-badge uk-badge-danger"><i class="uk-icon-caret-up"></i> {{ $shareData["error"] }} : {{ $errors->first("pass") }}</div>
                    @endif
                </div>
            <!-- /pass -->

            <!-- email -->
                <div class="uk-form-row">
                    {!! Form::label("email", $data["registerEmail"], array("class" => "uk-form-label", "id" => "email")) !!}

                    {!! Form::text("email", "", array("class" => $errors->has("email") ? "uk-form-danger uk-width-1-1" : "uk-width-1-1", "id" => "email")) !!}

                    @if($errors->has("email"))
                        <div class="uk-badge uk-badge-danger"><i class="uk-icon-caret-up"></i> {{ $shareData["error"] }} : {{ $errors->first("email") }}</div>
                    @endif
                </div>
            <!-- /email -->

            <hr />

            <div class="uk-grid uk-text-center uk-grid-small" data-uk-grid-margin="">
                <li class="uk-width-small-1-1">
                    {!! Form::submit($data["buttonRegister"], array("class" => "uk-button uk-button-secondary uk-button-large uk-contrast uk-width-1-1")) !!}
                </li>
            </div>

        {!! Form::close() !!}
    </div>
@stop
