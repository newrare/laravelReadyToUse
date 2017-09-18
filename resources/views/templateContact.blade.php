<div class="uk-bloc">
    {!! Form::open(array("url" => "/contact", "method" => "POST", "class" => "uk-form uk-form-stacked")) !!}
        <!-- mail -->
            <div class="uk-form-row">
                {!! Form::label("contactMail", $data["textContactMail"], array("class" => "uk-form-label", "id" => "infoTitle")) !!}

                {!! Form::text("contactMail", $data["reply"]["mailValue"], array("class" => $errors->has("contactMail") ? "uk-form-danger uk-width-1-1" : "uk-width-1-1", "id" => "contactMail")) !!}

                @if($errors->has("contactMail"))
                    <div class="uk-badge uk-badge-danger"><i class="uk-icon-caret-up"></i> {{ $shareData["error"] }} : {{ $errors->first("contactMail") }}</div>
                @endif
            </div>
        <!-- /mail -->

        <!-- subject -->
            <div class="uk-form-row">
                {!! Form::label("contactSubject", $data["textContactSub"], array("class" => "uk-form-label", "id" => "contactSubject")) !!}

                {!! Form::text("contactSubject", "", array("class" => $errors->has("contactSubject") ? "uk-form-danger uk-width-1-1" : "uk-width-1-1", "id" => "contactSubject")) !!}

                @if($errors->has("contactSubject"))
                    <div class="uk-badge uk-badge-danger"><i class="uk-icon-caret-up"></i> {{ $shareData["error"] }} : {{ $errors->first("contactSubject") }}</div>
                @endif
            </div>
        <!-- /subject -->

        <!-- message -->
            <div class="uk-form-row">
                {!! Form::label("contactMessage", $data["textContactMess"], array("class" => "uk-form-label", "id" => "contactMessage")) !!}

                 {!! Form::textarea("contactMessage", "", array("class" => $errors->has("contactMessage") ? "uk-form-danger uk-width-1-1" : "uk-width-1-1", "id" => "contactMessage")) !!}

                 @if($errors->has("contactMessage"))
                    <div class="uk-badge uk-badge-danger"><i class="uk-icon-caret-up"></i> {{ $shareData["error"] }} : {{ $errors->first("contactMessage") }}</div>
                @endif
            </div>
        <!-- /message -->
        <br />

        <div class="uk-grid uk-text-center uk-grid-small" data-uk-grid-margin="">
            <li class="uk-width-small-1-1">
                {!! Form::submit($data["buttonSend"], array("class" => "uk-button uk-button-large uk-width-1-1 mySecondColor")) !!}
            </li>
        </div>
    {!! Form::close() !!}
</div>
