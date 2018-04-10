<div class="uk-card uk-card-default uk-card-body uk-box-shadow-medium uk-margin-top">
    {!! Form::open(array("url" => "/contact", "method" => "POST", "class" => "uk-form uk-form-stacked")) !!}
        <!-- mail -->
            <div class="uk-margin">
                {!! Form::label("contactMail", $data["textContactMail"], array("class" => "uk-form-label", "id" => "infoTitle")) !!}

                {!! Form::text("contactMail", $data["reply"]["mailValue"], array("class" => $errors->has("contactMail") ? "uk-input uk-form-danger" : "uk-input", "id" => "contactMail")) !!}

                @if($errors->has("contactMail"))
                    <p class="uk-text-small uk-text-danger uk-margin-small-top">
                        <span uk-icon="icon: bolt; ratio: 0.7"></span> {{ $shareData["error"] }} : {{ $errors->first("contactMail") }}
                    </p>
                @endif
            </div>
        <!-- /mail -->

        <!-- subject -->
            <div class="uk-margin">
                {!! Form::label("contactSubject", $data["textContactSub"], array("class" => "uk-form-label", "id" => "contactSubject")) !!}

                {!! Form::text("contactSubject", "", array("class" => $errors->has("contactSubject") ? "uk-input uk-form-danger" : "uk-input", "id" => "contactSubject")) !!}

                @if($errors->has("contactSubject"))
                    <p class="uk-text-small uk-text-danger uk-margin-small-top">
                        <span uk-icon="icon: bolt; ratio: 0.7"></span> {{ $shareData["error"] }} : {{ $errors->first("contactSubject") }}
                    </p>
                @endif
            </div>
        <!-- /subject -->

        <!-- message -->
            <div class="uk-margin">
                {!! Form::label("contactMessage", $data["textContactMess"], array("class" => "uk-form-label", "id" => "contactMessage")) !!}

                {!! Form::textarea("contactMessage", "", array("class" => $errors->has("contactMessage") ? "uk-textarea uk-form-danger" : "uk-textarea", "id" => "contactMessage")) !!}

                @if($errors->has("contactMessage"))
                    <p class="uk-text-small uk-text-danger uk-margin-small-top">
                        <span uk-icon="icon: bolt; ratio: 0.7"></span> {{ $shareData["error"] }} : {{ $errors->first("contactMessage") }}
                    </p>
                @endif
            </div>
        <!-- /message -->

        <!-- formValidation -->
            <div class="uk-container uk-text-center uk-width-1-1">
                {!! Form::submit($data["buttonSend"], array("class" => "uk-button uk-button-primary")) !!}
            </div>
        <!-- /formValidation -->
    {!! Form::close() !!}
</div>
