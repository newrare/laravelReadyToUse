@extends("template")

@section("content")
    <h1 class="uk-heading-bullet uk-margin-remove">{{ $data["titlePage"] }}</h1>
    <small>{{ $data["titleMessage"] }}</small>

    <!-- avatar -->
        @if(isset($data["api"]["urlAvatar"]))
            <div class="uk-container uk-margin-top">
                <img class="uk-border-circle" src="{{ $data['api']['urlAvatar'] }}" alt="Avatar" onError="this.src='/image/72.png';" />
            </div>
        @endif
    <!-- /avatar -->

    <div class="uk-card uk-card-default uk-card-body uk-box-shadow-medium uk-margin-top">
        {!! Form::open(array("url" => $data["web"]["urlUpdate"], "method" => "PUT", "class" => "uk-form uk-form-stacked")) !!}
            <!-- emailIsValid -->
                @if($data["api"]["emailIsValid"] == 0)
                    <a class="uk-button uk-button-link" href="/email/valid">{{ $data["clickForValidEmail"] }}</a>

                    <hr />
                @endif
            <!-- /emailIsValid -->

            <!-- email -->
                <div class="uk-margin">
                    {!! Form::label("email", $data["email"], array("class" => "uk-form-label", "id" => "email")) !!}

                    {!! Form::text("email", $data["api"]["email"], array("class" => $errors->has("email") ? "uk-input uk-form-danger" : "uk-input", "id" => "email")) !!}

                    @if($errors->has("email"))
                        <p class="uk-text-small uk-text-danger uk-margin-small-top uk-margin-small-bottom">
                            <span uk-icon="icon: bolt; ratio: 0.7"></span> {{ $shareData["error"] }} : {{ $errors->first("email") }}
                        </p>
                    @endif
                </div>
            <!-- /email -->

            <!-- pass -->
                <div class="uk-margin">
                    {!! Form::label("pass", $data["connectionPass"], array("class" => "uk-form-label", "id" => "pass")) !!}

                    {!! Form::password("pass", array("placeholder" => "X X X X X X X X", "class" => $errors->has("pass") ? "uk-input uk-form-danger" : "uk-input", "id" => "pass")) !!}

                    @if($errors->has("pass"))
                        <p class="uk-text-small uk-text-danger uk-margin-small-top uk-margin-small-bottom">
                            <span uk-icon="icon: bolt; ratio: 0.7"></span> {{ $shareData["error"] }} : {{ $errors->first("pass") }}
                        </p>
                    @endif
                </div>
            <!-- /pass -->

            <!-- urlAvatar -->
                <div class="uk-margin">
                    {!! Form::label("urlAvatar", $data["avatar"], array("class" => "uk-form-label", "id" => "urlAvatar")) !!}

                    {!! Form::text("urlAvatar", $data["api"]["urlAvatar"], array("class" => $errors->has("urlAvatar") ? "uk-input uk-form-danger" : "uk-input", "id" => "urlAvatar")) !!}

                    @if($errors->has("urlAvatar"))
                        <p class="uk-text-small uk-text-danger uk-margin-small-top uk-margin-small-bottom">
                            <span uk-icon="icon: bolt; ratio: 0.7"></span> {{ $shareData["error"] }} : {{ $errors->first("urlAvatar") }}
                        </p>
                    @endif
                </div>
            <!-- urlAvatar-->

            <!-- lang -->
                <div class="uk-margin">
                    {!! Form::label("lang", $data["lang"], array("class" => "uk-form-label", "id" => "lang")) !!}

                    {!! Form::select("lang", array("fr" => "Français", "en" => "English"), $data["api"]["lang"], array("class" => $errors->has("lang") ? "uk-select uk-form-danger" : "uk-select", "id" => "lang")) !!}

                    @if($errors->has("lang"))
                        <p class="uk-text-small uk-text-danger uk-margin-small-top uk-margin-small-bottom">
                            <span uk-icon="icon: bolt; ratio: 0.7"></span> {{ $shareData["error"] }} : {{ $errors->first("lang") }}
                        </p>
                    @endif
                </div>
            <!-- /lang -->

            <!-- formValidation -->
                <div class="uk-container uk-text-center uk-width-1-1">
                    {!! Form::submit($shareData["save"], array("class" => "uk-button uk-button-primary")) !!}
                </div>
            <!-- /formValidation -->
        {!! Form::close() !!}
    </div>
@stop
