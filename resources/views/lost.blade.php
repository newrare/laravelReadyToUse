@extends("template")

@section("content")
    <h1 class="uk-heading-bullet uk-margin-remove">{{ $data["titlePage"] }}</h1>
    <small>{{ $data["titleMessage"] }}</small>

    <div class="uk-card uk-card-default uk-card-body uk-box-shadow-medium uk-margin-top">
        {!! Form::open(array("url" => "/lost", "method" => "POST", "class" => "uk-form uk-form-horizontal")) !!}
            <div class="uk-grid-small uk-child-width-expand@s" uk-grid>
                <!-- emailInput -->
                    <div>
                        {!! Form::text("email", "", array(
                            "class"         => $errors->has("email") ? "uk-input uk-form-danger" : "uk-input",
                            "id"            => "tokenName",
                            "placeholder"   => $data["email"]
                        )) !!}

                        @if($errors->has("email"))
                            <p class="uk-text-small uk-text-danger uk-margin-small-top">
                                <span uk-icon="icon: bolt; ratio: 0.7"></span> {{ $shareData["error"] }} : {{ $errors->first("email") }}
                            </p>
                        @endif
                    </div>
                <!-- /emailInput -->

                <!-- formValidation -->
                    <div>
                        {!! Form::submit($data["buttonSend"], array("class" => "uk-button uk-button-primary uk-width-1-1")) !!}
                    </div>
                <!-- /formValidation -->
            </div>
        {!! Form::close() !!}
    </div>
@stop
