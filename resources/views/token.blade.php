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
        <div class="uk-box-shadow-medium uk-card uk-card-body uk-margin-top">
            <div class="uk-clearfix">
                <div class="uk-float-left">
                    <h4>{{{ $api["name"] }}}</h4>
                </div>

                <div class="uk-float-right">
                    <a href="#" uk-icon="icon: trash" uk-tooltip="{{ $shareData['remove'] }}" name="/token/{{ $api['id'] }}"  class="uk-icon-button ajaxTrash"></a>
                </div>
            </div>

            <table class="uk-table uk-table-hover uk-table-striped uk-table-divider">
                <tbody>
                    <tr>
                        <td class="uk-text-success"><small>{{ $data["tokenId"] }}</small></td>
                        <td><small>{{ $api["tokenId"] }}</small></td>
                    </tr>

                    <tr>
                        <td class="uk-text-success"><small>{{ $data["tokenKey"] }}</small></td>
                        <td><small>{{ $api["tokenKey"] }}</small></td>
                    </tr>
                </tbody>
            </table>
        </div>
    @endforeach
@stop
