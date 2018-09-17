@extends("template")

@section("content")
    <h1 class="uk-heading-bullet uk-margin-remove">{{ $data["titlePage"] }}</h1>
    <small>{{ $data["addNews"] }}</small>

    <div class="uk-card uk-card-default uk-card-body uk-box-shadow-medium uk-margin-top">
        {!! Form::open(array("url" => $data["web"]["formUrl"], "method" => $data["web"]["formMethod"], "class" => "uk-form uk-form-stacked")) !!}
            <!-- messageTitle -->
                <div class="uk-margin">
                    {!! Form::label("messageTitle", $data["messageTitle"], array("class" => "uk-form-label", "id" => "messageTitle")) !!}

                    {!! Form::text("messageTitle", isset($data["api"]["messageTitle"]) ? $data["api"]["messageTitle"] : "", array("class" => $errors->has("messageTitle") ? "uk-input uk-form-danger" : "uk-input", "id" => "messageTitle")) !!}

                    @if($errors->has("messageTitle"))
                        <p class="uk-text-small uk-text-danger uk-margin-small-top">
                            <span uk-icon="icon: bolt; ratio: 0.7"></span> {{ $shareData["error"] }} : {{ $errors->first("messageTitle") }}
                        </p>
                    @endif
                </div>
            <!-- /messageTitle -->

            <!-- message -->
                <div class="uk-margin">
                    {!! Form::label("message", $data["message"], array("class" => "uk-form-label", "id" => "message")) !!}

                    {!! Form::textarea("message", isset($data["api"]["message"]) ? $data["api"]["message"] : "", array("class" => $errors->has("message") ? "uk-input uk-form-danger" : "uk-input", "id" => "message")) !!}

                    @if($errors->has("message"))
                        <p class="uk-text-small uk-text-danger uk-margin-small-top">
                            <span uk-icon="icon: bolt; ratio: 0.7"></span> {{ $shareData["error"] }} : {{ $errors->first("message") }}
                        </p>
                    @endif
                </div>
            <!-- /message -->

            <!-- lang -->
                <div class="uk-margin">
                    {!! Form::label("lang", $data["lang"], array("class" => "uk-form-label", "id" => "lang")) !!}

                    {!! Form::select("lang", array("" => "", "fr" => "Français", "en" => "English"), isset($data["api"]["lang"]) ? $data["api"]["lang"] : "", array("class" => $errors->has("lang") ? "uk-select uk-form-danger" : "uk-select", "id" => "lang")) !!}

                    @if($errors->has("lang"))
                        <p class="uk-text-small uk-text-danger uk-margin-small-top">
                            <span uk-icon="icon: bolt; ratio: 0.7"></span> {{ $shareData["error"] }} : {{ $errors->first("lang") }}
                        </p>
                    @endif
                </div>
            <!-- /lang -->

            <!-- urlImage -->
                <div class="uk-margin">
                    {!! Form::label("urlImage", $data["urlImage"], array("class" => "uk-form-label", "id" => "urlImage")) !!}

                    {!! Form::text("urlImage", isset($data["api"]["urlImage"]) ? $data["api"]["urlimage"] : "", array("class" => $errors->has("urlImage") ? "uk-input uk-form-danger" : "uk-input", "id" => "urlImage")) !!}

                    @if($errors->has("urlImage"))
                        <p class="uk-text-small uk-text-danger uk-margin-small-top">
                            <span uk-icon="icon: bolt; ratio: 0.7"></span> {{ $shareData["error"] }} : {{ $errors->first("urlImage") }}
                        </p>
                    @endif
                </div>
            <!-- /urlImage -->

            <!-- urlVideo -->
                <div class="uk-margin">
                    {!! Form::label("urlVideo", $data["urlVideo"], array("class" => "uk-form-label", "id" => "urlVideo")) !!}

                    {!! Form::text("urlVideo", isset($data["api"]["urlVideo"]) ? $data["api"]["urlVideo"] : "", array("class" => $errors->has("urlVideo") ? "uk-input uk-form-danger" : "uk-input", "id" => "urlVideo")) !!}

                    @if($errors->has("urlVideo"))
                        <p class="uk-text-small uk-text-danger uk-margin-small-top">
                            <span uk-icon="icon: bolt; ratio: 0.7"></span> {{ $shareData["error"] }} : {{ $errors->first("urlVideo") }}
                        </p>
                    @endif
                </div>
            <!-- /urlVideo -->

            <!-- formValidation -->
                <div class="uk-container uk-text-center uk-width-1-1">
                    {!! Form::submit($shareData["save"], array("class" => "uk-button uk-button-primary")) !!}
                </div>
            <!-- /formValidation -->
        {!! Form::close() !!}
    </div>
@stop
