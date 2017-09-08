<!doctype html>
<html lang="{{ $shareData['langValue'] }}">

<!-- resultIfHtml -->
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <title>laravelReadyToUse</title>

        <link rel="shortcut icon" type="image/x-icon" href="/favicon.ico" />

        <!-- css -->
            <!-- lessProd -->
                {!! HTML::style("/css/less.css") !!}
            <!-- /lessProd -->

            <!-- loadMoreCss -->
            @if(isset($data["reply"]["loadCss"]))
                {!! HTML::style($data["reply"]["loadCss"]) !!}
            @endif
            <!-- /loadMoreCss -->

            {!! HTML::style("/css/main.css") !!}
        <!-- /css -->

        @if(!isset($noRedirectJavascript))
            <noscript><meta http-equiv="refresh" content="1; URL=/notJavascript"></noscript>
        @endif
    </head>

    <body>
        <!-- titleBar -->
            <div class="uk-container uk-container-center uk-margin-small-top uk-margin-small-bottom">
                <div class="uk-clearfix">
                    <div class="uk-float-left">
                        <!-- logoAndTitle -->
                            <a href="/"><img class="uk-icon-spin" src="/image/72.png" alt="Logo" id="loadLogo" /></a>

                            <strong class="myFirstColor uk-hidden-small">laravelReadyToUse</strong><span class="uk-text-bold uk-text-primary uk-hidden-small">laravelReadyTouse</span>
                        <!-- /logoAndTitle -->
                    </div>

                    <div class="uk-float-right">
                        <div class="uk-vertical-align" style="height: 70px">
                            <div class="uk-vertical-align-middle">
                                <a class="uk-button uk-button-link "href="/blog"><i class="uk-icon-book"></i></a>

                                <!-- loginOrLanguage -->
                                    <div class="uk-button-dropdown" data-uk-dropdown="{pos:'top-right'}">
                                        @if(session()->has("userLogin"))
                                            <button class="uk-button uk-button-large uk-button-link uk-hidden-small" id="buttonLink">
                                                <i class="uk-icon-user"></i> {{ session("userLogin") }} <i class="uk-icon-caret-down"></i>
                                            </button>

                                            <button class="uk-button uk-button-large uk-button-link uk-visible-small" id="buttonLink">
                                                <i class="uk-icon-user"></i> <i class="uk-icon-caret-down"></i>
                                            </button>

                                            <div class="uk-dropdown uk-dropdown-small">
                                                <ul class="uk-nav uk-nav-dropdown">
                                                    <li><a href="/"><i class="uk-icon-home"></i> {{ $shareData["home"] }}</a></li>
                                                    <li><a href="/account"><i class="uk-icon-cog"></i> {{ $shareData["accountOption"] }}</a></li>
                                                    <li><a href="/connection/off/edit"><i class="uk-icon-sign-out"></i> {{ $shareData["logOut"] }}</a></li>
                                                </ul>
                                            </div>
                                        @else
                                            <button class="uk-button uk-button-large uk-button-link uk-hidden-small" id="buttonLink">
                                                {{ $shareData["language"] }} <i class="uk-icon-caret-down"></i>
                                            </button>

                                            <button class="uk-button uk-button-large uk-button-link uk-visible-small" id="buttonLink">
                                                <i class="uk-icon-flag"></i> <i class="uk-icon-caret-down"></i>
                                            </button>

                                            <div class="uk-dropdown uk-dropdown-small">
                                                <ul class="uk-nav uk-nav-dropdown">
                                                    <li><a href="/lang/en/edit"><i class="uk-icon-flag"></i> English</a></li>
                                                    <li><a href="/lang/fr/edit"><i class="uk-icon-flag"></i> Français</a></li>
                                                </ul>
                                            </div>
                                        @endif
                                    </div>
                                <!-- loginOrLanguage -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <!-- /titleBar -->

        <!-- navbar -->
            <div class="uk-grid">
                <div class="uk-width-1-1">
                    <div data-uk-sticky>
                        <nav class="uk-navbar uk-margin-remove">
                            <div class="uk-container uk-container-center">
                                <ul class="uk-navbar-nav uk-hidden-small">
                                    @include("templateNavbarList")
                                </ul>

                                <div class="uk-navbar-flip">
                                    <ul class="uk-navbar-nav">
                                        <li><a href="https://twitter.com/" target="_blank"><i class="uk-icon-twitter"></i></a></li>
                                        <li><a href="https://fr-fr.facebook.com/" target="_blank"><i class="uk-icon-facebook"></i></a></li>
                                    </ul>
                                </div>

                                <a id="buttonLink" href="#offcanvas" class="uk-navbar-toggle uk-visible-small" data-uk-offcanvas></a>

                                <div class="uk-navbar-brand uk-navbar-center uk-visible-small"><a id="buttonLink" href="#offcanvas" data-uk-offcanvas>{{ $shareData["menu"] }}</a></div>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>

            <div id="offcanvas" class="uk-offcanvas">
                <div class="uk-offcanvas-bar">
                    <ul class="uk-nav uk-nav-offcanvas">
                        @include("templateNavbarList")
                    </ul>
                </div>
            </div>
        <!-- /navbar -->

        <!-- content -->
            <div class="uk-container uk-container-center uk-margin-top uk-margin-large-bottom">
                @yield("content")
            </div>
        <!-- /content -->

        <!-- message -->
            <div class="uk-hidden" id="messageError">
                {{ $data["messageError"] or null }}

                @if (session("messageError"))
                    {{ session("messageError") }}
                @endif
            </div>

            <div class="uk-hidden" id="messageDone">
                {{ $data["messageDone"] or null }}

                @if (session("messageDone"))
                    {{ session("messageDone") }}
                @endif
            </div>
        <!-- /message -->
    </body>

    <!-- js -->
        <!-- engine and css -->
            {!! HTML::script("/js/jquery-2.1.4.min.js") !!}

            {!! HTML::script("/js/uikit.min.js") !!}
            {!! HTML::script("/js/sticky.min.js") !!}
            {!! HTML::script("/js/notify.min.js") !!}
            {!! HTML::script("/js/tooltip.min.js") !!}
            {!! HTML::script("/js/datepicker.min.js") !!}
            {!! HTML::script("/js/slideshow.min.js") !!}
            {!! HTML::script("/js/slideshow-fx.min.js") !!}
        <!-- /engine and css -->

        <!-- message -->
            @if( isset($data["messageError"]) || session("messageError") )
                {!! HTML::script("/js/messageError.js") !!}
            @endif

            @if( isset($data["messageDone"]) || session("messageDone") )
                {!! HTML::script("/js/messageDone.js") !!}
            @endif
        <!-- /message -->

        <!-- loadMoreJavascript -->
            @if(isset($data["reply"]["loadJavascript"]))
                {!! HTML::script($data["reply"]["loadJavascript"]) !!}
            @endif

            @if(isset($data["reply"]["loadMore"]))
                {!! HTML::script($data["reply"]["loadMore"]) !!}
            @endif
        <!-- /loadMoreJavascript -->

        {!! HTML::script("/js/main.js") !!}
    <!-- /js -->
</html>
