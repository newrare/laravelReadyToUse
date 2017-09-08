<div class="uk-bloc">
    <hr />

    {!! Form::open(array("url" => "/connection", "class" => "uk-form uk-form-stacked")) !!}
        <!-- accessName -->
            <div class="uk-form-row">
                {!! Form::label("login", $data["connectionLogin"], array("class" => "uk-form-label", "id" => "login")) !!}

                {!! Form::text("login", "", array("class" => $errors->has("login") ? "uk-form-danger uk-width-1-1" : "uk-width-1-1", "id" => "login")) !!}

                @if($errors->has("login"))
                    <div class="uk-badge uk-badge-danger"><i class="uk-icon-caret-up"></i> {{ $shareData["error"] }} : {{ $errors->first("login") }}</div>
                @endif
            </div>
        <!-- /accessName -->

        <!-- accessPassword -->
            <div class="uk-form-row">
                {!! Form::label("pass", $data["connectionPass"], array("class" => "uk-form-label", "id" => "pass")) !!}

                {!! Form::password("pass", array("class" => $errors->has("pass") ? "uk-form-danger uk-width-1-1" : "uk-width-1-1", "id" => "pass")) !!}

                @if($errors->has("pass"))
                    <div class="uk-badge uk-badge-danger"><i class="uk-icon-caret-up"></i> {{ $shareData["error"] }} : {{ $errors->first("pass") }}</div>
                @endif
            </div>
        <!-- /accessPassword -->

        <small><a href="/lost">{{ $shareData["lostPassword"] }}</a></small>

        <br /><br />

        <div class="uk-grid uk-text-center uk-grid-small" data-uk-grid-margin="">
            <li class="uk-width-small-1-2">
                {!! Form::submit($data["buttonConnection"], array("class" => "uk-button uk-button-large uk-width-1-1")) !!}
            </li>

            <li class="uk-width-small-1-2">
                <a href="/google" class="uk-button uk-button-large uk-button-danger uk-width-1-1">
                    {{ $shareData["googleConnection"] }}
                </a>
            </li>
        </div>
    {!! Form::close() !!}

    <br />

    <div class="uk-grid uk-text-center uk-grid-collapse" data-uk-grid-margin="">
        <li class="uk-width-4-10"><hr /></li>

        <li class="uk-width-2-10"><div class="uk-badge uk-badge-notification">{{ $shareData["or"] }}</div></li>

        <li class="uk-width-4-10"><hr /></li>
    </div>

    <br />

    <div class="uk-grid uk-text-center uk-grid-small" data-uk-grid-margin="">
        <li class="uk-width-small-1-1">
            <a href="/account" class="uk-button uk-button-large uk-button-primary uk-width-1-1">
                <i class="uk-icon-plus-circle"></i> {{ $shareData["buttonAddAccount"] }}
            </a>
        </li>
    </div>

    <hr />
</div>
