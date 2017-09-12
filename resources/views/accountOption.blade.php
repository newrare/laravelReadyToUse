@extends("template")

@section("content")
    <article class="uk-article">
        <h1 class="uk-article-title"><i class="uk-icon-cog"></i> {{ $data["titlePage"] }}</h1>
        <p class="uk-article-meta">{{ $data["titleMessage"] }}</p>
    </article>

    <br />

    <div class="uk-bloc">
        <!-- avatar -->
            @if(isset($data["reply"]["userUrlAvatar"]))
                <img class="uk-border-circle" src="{{ $data['reply']['userUrlAvatar'] }}" alt="Avatar" onError="this.onerror=null; this.src='/image/96.png';" />
            @endif
        <!-- /avatar -->

        <hr />

        {!! Form::open(array("url" => $data["reply"]["urlUpdate"], "method" => "PUT", "class" => "uk-form uk-form-stacked")) !!}
            <!-- userEmailIsValid -->
                @if($data["reply"]["userEmailIsValid"] == 0)
                    <a class="uk-button uk-button-success uk-button-mini" href="/account/email/edit">{{ $data["clickForValidEmail"] }}</a>

                    <br /><br />
                @endif
            <!-- /userEmailIsValid -->

            <!-- userEmail -->
                <div class="uk-form-row">
                    {!! Form::label("userEmail", $data["reply"]["email"], array("class" => "uk-form-label", "id" => "userEmail")) !!}

                    {!! Form::text("userEmail", $data["reply"]["userEmail"], array("class" => $errors->has("userEmail") ? "uk-form-danger uk-width-1-1" : "uk-width-1-1", "id" => "userEmail")) !!}

                    @if($errors->has("userEmail"))
                        <div class="uk-badge uk-badge-danger"><i class="uk-icon-caret-up"></i> {{ $shareData["error"] }} : {{ $errors->first("userEmail") }}</div>
                    @endif
                </div>
            <!-- /userEmail -->

            <!-- userPass -->
                <div class="uk-form-row">
                    {!! Form::label("userPass", $data["connectionPass"], array("class" => "uk-form-label", "id" => "userPass")) !!}

                    {!! Form::password("userPass", array("placeholder" => "X X X X X X X X", "class" => $errors->has("userPass") ? "uk-form-danger uk-width-1-1" : "uk-width-1-1", "id" => "userPass")) !!}

                    @if($errors->has("userPass"))
                        <div class="uk-badge uk-badge-danger"><i class="uk-icon-caret-up"></i> {{ $shareData["error"] }} : {{ $errors->first("userPass") }}</div>
                    @endif
                </div>
            <!-- /userPass -->

            <!-- userUrlAvatar -->
                <div class="uk-form-row">
                    {!! Form::label("userUrlAvatar", $data["avatar"], array("class" => "uk-form-label", "id" => "userUrlAvatar")) !!}

                    {!! Form::text("userUrlAvatar", $data["reply"]["userUrlAvatar"], array("class" => $errors->has("userUrlAvatar") ? "uk-form-danger uk-width-1-1" : "uk-width-1-1", "id" => "userUrlAvatar")) !!}

                    @if($errors->has("userUrlAvatar"))
                        <div class="uk-badge uk-badge-danger"><i class="uk-icon-caret-up"></i> {{ $shareData["error"] }} : {{ $errors->first("userUrlAvatar") }}</div>
                    @endif
                </div>
            <!-- userUrlAvatar-->

            <!-- userLang -->
                <div class="uk-form-row">
                    {!! Form::label("userLang", $data["lang"], array("class" => "uk-form-label", "id" => "userLang")) !!}

                    {!! Form::select("userLang", array("fr" => "Français", "en" => "English"), $data["reply"]["userLang"], array("class" => $errors->has("userLang") ? "uk-form-danger uk-width-1-1 uk-form-select" : "uk-width-1-1 uk-form-select", "id" => "userLang")) !!}

                    @if($errors->has("userLang"))
                        <div class="uk-badge uk-badge-danger"><i class="uk-icon-caret-up"></i> {{ $shareData["error"] }} : {{ $errors->first("userLang") }}</div>
                    @endif
                </div>
            <!-- /userLang -->

            <br />

            <div class="uk-grid uk-text-center uk-grid-small" data-uk-grid-margin="">
                <li class="uk-width-small-1-1">
                    {!! Form::submit($shareData["save"], array("class" => "uk-button uk-button-large uk-width-1-1")) !!}
                </li>
            </div>
        {!! Form::close() !!}

        <hr />
    </div>
@stop
