@if($shareData["active"] == "/")
    <div class="uk-container">
@else
    <div class="uk-card uk-card-default uk-card-body uk-box-shadow-medium uk-margin-top">
@endif

<!-- divInIf -->
    {!! Form::open(array("url" => "/connection", "class" => "uk-form uk-form-stacked")) !!}
        <!-- accessName -->
            <div class="uk-margin">
                {!! Form::label("login", $data["connectionLogin"], array("class" => "uk-form-label", "id" => "login")) !!}

                {!! Form::text("login", "", array("class" => $errors->has("login") ? "uk-input uk-form-danger" : "uk-input", "id" => "login")) !!}

                @if($errors->has("login"))
                    <p class="uk-text-small uk-text-danger uk-margin-small-top">
                        <span uk-icon="icon: bolt; ratio: 0.7"></span> {{ $shareData["error"] }} : {{ $errors->first("login") }}
                    </p>
                @endif
            </div>
        <!-- /accessName -->

        <!-- accessPassword -->
            <div class="uk-margin">
                {!! Form::label("pass", $data["connectionPass"], array("class" => "uk-form-label", "id" => "pass")) !!}

                {!! Form::password("pass", array("class" => $errors->has("pass") ? "uk-input uk-form-danger" : "uk-input", "id" => "pass")) !!}

                @if($errors->has("pass"))
                     <p class="uk-text-small uk-text-danger uk-margin-small-top uk-margin-small-bottom">
                        <span uk-icon="icon: bolt; ratio: 0.7"></span> {{ $shareData["error"] }} : {{ $errors->first("pass") }}
                    </p>
                @endif

                <small class="uk-margin-small-top"><a href="/lost">{{ $shareData["lostPassword"] }}</a></small>
            </div>
        <!-- /accessPassword -->

        <!-- formValidationOrGoogle -->
            <div class="uk-grid-small uk-child-width-expand@s uk-text-center" uk-grid>
                <div>
                    {!! Form::submit($data["buttonConnection"], array("class" => "uk-button uk-button-primary uk-width-1-1")) !!}
                </div>

                <div>
                    <a href="/google" class="uk-button uk-button-danger uk-width-1 uk-text-nowrap">{{ $shareData["googleConnection"] }}</a>
                </div>
            </div>
        <!-- /formValidationOrGoogle -->
    {!! Form::close() !!}

    <!-- orCreateNewAccount -->
        <hr class="uk-divider-icon" />

        <div class="uk-container uk-text-center uk-width-1-1 uk-margin-small">
            <a href="/account" class="uk-button uk-button-default"><span uk-icon="icon: plus-circle"></span> {{ $shareData["buttonAddAccount"] }}</a>
        </div>
    <!-- /orCreateNewAccount -->
</div>
