<div class="uk-bloc">
    <hr />

    {!! Form::open(array("url" => $data["reply"]["formUrl"], "method" => $data["reply"]["formMethod"], "class" => "uk-form uk-form-stacked")) !!}
        <!-- elementForCreate -->
            @if($data["reply"]["formUrl"] == "/item")
                {!! Form::text("origin", "create", array("class" => "uk-hidden", "id" => "origin")) !!}

                {!! Form::text("idOrigin", $data["reply"]["originCollectFull"], array("class" => "uk-hidden", "id" => "idOrigin")) !!}

                {!! Form::text("type", "game", array("class" => "uk-hidden", "id" => "type")) !!}

                {!! Form::text("state", $data["reply"]["saveType"], array("class" => "uk-hidden", "id" => "state")) !!}
            @endif
        <!-- /elementForCreate -->

        <!-- infoTitle -->
            <div class="uk-form-row">
                {!! Form::label("infoTitle", $data["title"], array("class" => "uk-form-label", "id" => "infoTitle")) !!}

                {!! Form::text("infoTitle", $data["reply"]["infoTitle"], array("class" => $errors->has("infoTitle") ? "uk-form-danger uk-width-1-1" : "uk-width-1-1", "id" => "infoTitle")) !!}

                @if($errors->has("infoTitle"))
                    <div class="uk-badge uk-badge-danger"><i class="uk-icon-caret-up"></i> {{ $shareData["error"] }} : {{ $errors->first("infoTitle") }}</div>
                @endif
            </div>
        <!-- /infoTitle -->

        <!-- infoAuthor -->
            <div class="uk-form-row">
                {!! Form::label("infoAuthor", $data["author"], array("class" => "uk-form-label", "id" => "infoAuthor")) !!}

                {!! Form::text("infoAuthor", $data["reply"]["infoAuthor"], array("class" => $errors->has("infoAuthor") ? "uk-form-danger uk-width-1-1" : "uk-width-1-1", "id" => "infoAuthor")) !!}

                @if($errors->has("infoAuthor"))
                    <div class="uk-badge uk-badge-danger"><i class="uk-icon-caret-up"></i> {{ $shareData["error"] }} : {{ $errors->first("infoAuthor") }}</div>
                @endif
            </div>
        <!-- /infoAuthor -->

        <!-- infoMore -->
            <div class="uk-form-row">
                {!! Form::label("infoMore", $data["information"], array("class" => "uk-form-label", "id" => "infoMore")) !!}

                {!! Form::text("infoMore", $data["reply"]["infoMore"], array("class" => $errors->has("infoMore") ? "uk-form-danger uk-width-1-1" : "uk-width-1-1", "id" => "infoMore")) !!}

                @if($errors->has("infoMore"))
                    <div class="uk-badge uk-badge-danger"><i class="uk-icon-caret-up"></i> {{ $shareData["error"] }} : {{ $errors->first("infoMore") }}</div>
                @endif
            </div>
        <!-- /infoTitle -->

        <!-- infoDescription -->
            <div class="uk-form-row">
                {!! Form::label("infoDescription", $data["description"], array("class" => "uk-form-label", "id" => "infoDescription")) !!}

                 {!! Form::textarea("infoDescription", $data["reply"]["infoDescription"], array("class" => $errors->has("infoDescription") ? "uk-form-danger uk-width-1-1" : "uk-width-1-1", "id" => "infoDescription")) !!}

                 @if($errors->has("infoDescription"))
                    <div class="uk-badge uk-badge-danger"><i class="uk-icon-caret-up"></i> {{ $shareData["error"] }} : {{ $errors->first("infoDescription") }}</div>
                @endif
            </div>
        <!-- /infoDescription -->

        <!-- lang -->
            <div class="uk-form-row">
                {!! Form::label("lang", $data["lang"], array("class" => "uk-form-label", "id" => "lang")) !!}

                {!! Form::select("lang", array("" => "", "fr" => "Français", "en" => "English"), $data["reply"]["lang"], array("class" => $errors->has("lang") ? "uk-form-danger uk-width-1-1 uk-form-select" : "uk-width-1-1 uk-form-select", "id" => "lang")) !!}

                @if($errors->has("lang"))
                    <div class="uk-badge uk-badge-danger"><i class="uk-icon-caret-up"></i> {{ $shareData["error"] }} : {{ $errors->first("lang") }}</div>
                @endif
            </div>
        <!-- /lang -->

        <!-- dateOut -->
            <div class="uk-form-row">
                {!! Form::label("dateOut", $data["date"], array("class" => "uk-form-label", "id" => "dateOut")) !!}

                {!! Form::text("dateOut", $data["reply"]["dateOut"], array("class" => $errors->has("dateOut") ? "uk-form-danger uk-width-1-1 datepicker" : "uk-width-1-1 datepicker", "id" => "dateOut")) !!}

                 @if($errors->has("dateOut"))
                    <div class="uk-badge uk-badge-danger"><i class="uk-icon-caret-up"></i> {{ $shareData["error"] }} : {{ $errors->first("dateOut") }}</div>
                @endif

            </div>
        <!-- /dateOut -->

        <!-- urlImage -->
            <div class="uk-form-row">
                {!! Form::label("urlImage", $data["cover"], array("class" => "uk-form-label", "id" => "urlImage")) !!}

                {!! Form::text("urlImage", $data["reply"]["urlImage"], array("class" => $errors->has("urlImage") ? "uk-form-danger uk-width-1-1" : "uk-width-1-1", "id" => "urlImage")) !!}

                @if($errors->has("urlImage"))
                    <div class="uk-badge uk-badge-danger"><i class="uk-icon-caret-up"></i> {{ $shareData["error"] }} : {{ $errors->first("urlImage") }}</div>
                @endif
            </div>
        <!-- -->

        <br />

        <div class="uk-grid uk-text-center uk-grid-small" data-uk-grid-margin="">
            <li class="uk-width-small-1-1">
                {!! Form::submit($shareData["save"], array("class" => "uk-button uk-button-large uk-width-1-1")) !!}
            </li>
        </div>
    {!! Form::close() !!}

    <hr />
</div>
