@extends("template")

@section("content")
    <h1 class="uk-heading-bullet uk-margin-remove">{{ $data["titlePage"] }}</h1>
    <small>{{ $data["titleMessage"] }}</small>

    <div class="uk-card uk-card-default uk-card-body uk-box-shadow-medium uk-margin-top">
        {!! Form::open(array("url" => "/token", "method" => "POST", "class" => "uk-form uk-form-horizontal")) !!}
            <!-- tokenName -->
                <div class="uk-margin">
                    {!! Form::label("email", $data["email"], array("class" => "uk-form-label", "id" => "email")) !!}

                    {!! Form::text("email", "", array("class" => $errors->has("email") ? "uk-input uk-form-danger" : "uk-input", "id" => "email")) !!}

                    @if($errors->has("email"))
                        <p class="uk-text-small uk-text-danger uk-margin-small-top">
                            <span uk-icon="icon: bolt; ratio: 0.7"></span> {{ $shareData["error"] }} : {{ $errors->first("email") }}
                        </p>
                    @endif
                </div>
            <!-- /tokenName -->

            <!-- formValidation -->
                <div class="uk-container uk-text-center uk-width-1-1">
                    {!! Form::submit($data["buttonSend"], array("class" => "uk-button uk-button-primary")) !!}
                </div>
            <!-- /formValidation -->
        {!! Form::close() !!}
    </div>
@stop
