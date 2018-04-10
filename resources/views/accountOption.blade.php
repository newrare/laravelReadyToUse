@extends("template")

@section("content")
    <h1 class="uk-heading-bullet uk-margin-remove">{{ $data["titlePage"] }}</h1>
    <small>{{ $data["titleMessage"] }}</small>

    <!-- avatar -->
        @if(isset($data["reply"]["userUrlAvatar"]))
            <div class="uk-container uk-margin-top">
                <img class="uk-border-circle" src="{{ $data['reply']['userUrlAvatar'] }}" alt="Avatar" onError="this.src='/image/72.png';" />
            </div>
        @endif
    <!-- /avatar -->

    <div class="uk-card uk-card-default uk-card-body uk-box-shadow-medium uk-margin-top">
        {!! Form::open(array("url" => $data["reply"]["urlUpdate"], "method" => "PUT", "class" => "uk-form uk-form-stacked")) !!}
            <!-- userEmailIsValid -->
                @if($data["reply"]["userEmailIsValid"] == 0)
                    <a class="uk-button uk-button-link" href="/account/email/edit">{{ $data["clickForValidEmail"] }}</a>

                    <hr />
                @endif
            <!-- /userEmailIsValid -->

            <!-- userEmail -->
                <div class="uk-margin">
                    {!! Form::label("userEmail", $data["reply"]["email"], array("class" => "uk-form-label", "id" => "userEmail")) !!}

                    {!! Form::text("userEmail", $data["reply"]["userEmail"], array("class" => $errors->has("userEmail") ? "uk-input uk-form-danger" : "uk-input", "id" => "userEmail")) !!}

                    @if($errors->has("userEmail"))
                        <p class="uk-text-small uk-text-danger uk-margin-small-top uk-margin-small-bottom">
                            <span uk-icon="icon: bolt; ratio: 0.7"></span> {{ $shareData["error"] }} : {{ $errors->first("userEmail") }}
                        </p>
                    @endif
                </div>
            <!-- /userEmail -->

            <!-- userPass -->
                <div class="uk-margin">
                    {!! Form::label("userPass", $data["connectionPass"], array("class" => "uk-form-label", "id" => "userPass")) !!}

                    {!! Form::password("userPass", array("placeholder" => "X X X X X X X X", "class" => $errors->has("userPass") ? "uk-input uk-form-danger" : "uk-input", "id" => "userPass")) !!}

                    @if($errors->has("userPass"))
                        <p class="uk-text-small uk-text-danger uk-margin-small-top uk-margin-small-bottom">
                            <span uk-icon="icon: bolt; ratio: 0.7"></span> {{ $shareData["error"] }} : {{ $errors->first("userPass") }}
                        </p>
                    @endif
                </div>
            <!-- /userPass -->

            <!-- userUrlAvatar -->
                <div class="uk-margin">
                    {!! Form::label("userUrlAvatar", $data["avatar"], array("class" => "uk-form-label", "id" => "userUrlAvatar")) !!}

                    {!! Form::text("userUrlAvatar", $data["reply"]["userUrlAvatar"], array("class" => $errors->has("userUrlAvatar") ? "uk-input uk-form-danger" : "uk-input", "id" => "userUrlAvatar")) !!}

                    @if($errors->has("userUrlAvatar"))
                        <p class="uk-text-small uk-text-danger uk-margin-small-top uk-margin-small-bottom">
                            <span uk-icon="icon: bolt; ratio: 0.7"></span> {{ $shareData["error"] }} : {{ $errors->first("userUrlAvatar") }}
                        </p>
                    @endif
                </div>
            <!-- userUrlAvatar-->

            <!-- userLang -->
                <div class="uk-margin">
                    {!! Form::label("userLang", $data["lang"], array("class" => "uk-form-label", "id" => "userLang")) !!}

                    {!! Form::select("userLang", array("fr" => "Français", "en" => "English"), $data["reply"]["userLang"], array("class" => $errors->has("userLang") ? "uk-select uk-form-danger" : "uk-select", "id" => "userLang")) !!}

                    @if($errors->has("userLang"))
                        <p class="uk-text-small uk-text-danger uk-margin-small-top uk-margin-small-bottom">
                            <span uk-icon="icon: bolt; ratio: 0.7"></span> {{ $shareData["error"] }} : {{ $errors->first("userLang") }}
                        </p>
                    @endif
                </div>
            <!-- /userLang -->

            <!-- formValidation -->
                <div class="uk-container uk-text-center uk-width-1-1">
                    {!! Form::submit($shareData["save"], array("class" => "uk-button uk-button-primary")) !!}
                </div>
            <!-- /formValidation -->
        {!! Form::close() !!}
    </div>
@stop
