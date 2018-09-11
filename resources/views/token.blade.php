@extends("template")

@section("content")
    <h1 class="uk-heading-bullet uk-margin-remove">{{ $data["titlePage"] }}</h1>
    <small>{{ $data["titleMessage"] }}</small>

    <div class="uk-card uk-card-default uk-card-body uk-box-shadow-medium uk-margin-top">
        {!! Form::open(array("url" => "/token", "method" => "POST", "class" => "uk-form uk-form-horizontal")) !!}
            <div class="uk-grid-small uk-child-width-expand@s" uk-grid>
                <!-- tokenNameInput -->
                    <div>
                        {!! Form::text("tokenName", "", array(
                            "class"         => $errors->has("tokenName") ? "uk-input uk-form-danger" : "uk-input",
                            "id"            => "tokenName",
                            "placeholder"   => $data["tokenName"]
                        )) !!}

                        @if($errors->has("tokenName"))
                            <p class="uk-text-small uk-text-danger uk-margin-small-top">
                                <span uk-icon="icon: bolt; ratio: 0.7"></span> {{ $shareData["error"] }} : {{ $errors->first("tokenName") }}
                            </p>
                        @endif
                    </div>
                <!-- /tokenNameInput -->

                <!-- formValidation -->
                    <div>
                        {!! Form::submit($shareData["add"], array("class" => "uk-button uk-button-primary uk-width-1-1")) !!}
                    </div>
                <!-- /formValidation -->
            </div>
        {!! Form::close() !!}
    </div>

	@foreach($data["reply"]["ListApi"] as $api)
        <div class="uk-box-shadow-medium uk-padding uk-article uk-margin-top">
            <h3 class="uk-margin-remove">{{{ $api["name"] }}}</h3>

            <p class="uk-article-meta uk-margin-remove">{{ $api["tokenId"] }}</p>

			<p class="uk-article-meta uk-margin-remove">{{ $api["tokenKey"] }}</p>
        </div>
    @endforeach
@stop
