@extends("template")

@section("content")
    <h1 class="uk-heading-bullet uk-margin-remove">{{ $data["titlePage"] }}</h1>
    <small>{{ $data["titleMessage"] }}</small>

    <div class="uk-card uk-card-default uk-card-body uk-box-shadow-medium uk-margin-top">
        {!! Form::open(array("url" => "/account", "class" => "uk-form uk-form-stacked")) !!}
            <!-- login -->
                <div class="uk-margin">
                    {!! Form::label("login", $data["connectionLogin"], array("class" => "uk-form-label", "id" => "login")) !!}

                    {!! Form::text("login", "", array("class" => $errors->has("login") ? "uk-input uk-form-danger" : "uk-input", "id" => "login")) !!}

                    @if($errors->has("login"))
                        <p class="uk-text-small uk-text-danger uk-margin-small-top">
                            <span uk-icon="icon: bolt; ratio: 0.7"></span> {{ $shareData["error"] }} : {{ $errors->first("login") }}
                        </p>
                    @endif
                </div>
            <!-- /login -->

            <!-- pass -->
                <div class="uk-margin">
                    {!! Form::label("pass", $data["connectionPass"], array("class" => "uk-form-label", "id" => "pass")) !!}

                    {!! Form::password("pass", array("class" => $errors->has("pass") ? "uk-input uk-form-danger" : "uk-input", "id" => "pass")) !!}

                    @if($errors->has("pass"))
                        <p class="uk-text-small uk-text-danger uk-margin-small-top">
                            <span uk-icon="icon: bolt; ratio: 0.7"></span> {{ $shareData["error"] }} : {{ $errors->first("pass") }}
                        </p>
                    @endif
                </div>
            <!-- /pass -->

            <!-- email -->
                <div class="uk-margin">
                    {!! Form::label("email", $data["registerEmail"], array("class" => "uk-form-label", "id" => "email")) !!}

                    {!! Form::text("email", "", array("class" => $errors->has("email") ? "uk-input uk-form-danger" : "uk-input", "id" => "email")) !!}

                    @if($errors->has("email"))
                        <p class="uk-text-small uk-text-danger uk-margin-small-top">
                            <span uk-icon="icon: bolt; ratio: 0.7"></span> {{ $shareData["error"] }} : {{ $errors->first("email") }}
                        </p>
                    @endif
                </div>
            <!-- /email -->

            <!-- formValidation -->
                <div class="uk-container uk-text-center uk-width-1-1">
                    {!! Form::submit($data["buttonRegister"], array("class" => "uk-button uk-button-primary")) !!}
                </div>
            <!-- /formValidation -->
        {!! Form::close() !!}
    </div>
@stop
