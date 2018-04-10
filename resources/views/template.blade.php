<!doctype html>

<html lang="{{ $shareData['langValue'] }}">
    <head>
        <!-- info -->
            <meta http-equiv="content-type" content="text/html"; charset="UTF-8" />
        <!-- /info-->

        <!-- forCssSize -->
            <meta name="viewport" content="width=device-width, initial-scale=1" />
        <!-- /forCssSize-->

        <title>{{ env("APP_NAME") }}</title>

        <!-- favicon -->
            <link rel="shortcut icon" href="favicon.ico" />
            <link rel="shortcut icon" type="image/x-icon" href="/favicon.ico" />
            <link rel="icon" type="image/png" href="favicon.png" />
        <!-- /favicon -->

        <!-- css -->
            @if($shareData["active"] == "/" and !session()->has("userLogin"))
                {!! HTML::style("/css/area.css") !!}
            @endif

            {!! HTML::style("/css/uikit-3.0.0-beta.42.min.css") !!}
        <!-- /css -->

        <!-- ifjavascriptIsNotActived -->
            @if(!isset($noRedirectJavascript))
                <noscript><meta http-equiv="refresh" content="1; URL=/notJavascript"></noscript>
            @endif
        <!-- /ifjavascriptIsNotActived -->
    </head>

    <body style="min-width: 320px">
        <!-- homeIntroBackground -->
            @if($shareData["active"] == "/" and !session()->has("userLogin"))
                <div class="area" uk-height-viewport="offset-top: true">
                    <ul class="circles">
                        <li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li>
                    </ul>
                </div>
            @endif
        <!-- /homeIntroBackground -->

        <!-- titleBar -->
            <div class="uk-container">
                <nav class="uk-navbar" uk-navbar>
                    <!-- logoAndTitle -->
                        <div class="uk-navbar-left">
                            <a class="uk-navbar-item uk-logo uk-padding-remove-left" href="/"><img src="/image/72.png" alt="Logo"/></a>
                            <strong class="uk-text-primary uk-visible@s">{{ env("APP_NAME") }}</strong>
                        </div>
                    <!-- /logoAndTitle -->

                    <!-- loginOrLanguage -->
                        <div class="uk-navbar-right">
                            @if(session()->has("userLogin"))
                                <button class="uk-button uk-button-text uk-text-capitalize" type="button">
                                    <span uk-icon="triangle-down"></span> {{ session("userLogin") }}
                                </button>

                                <div uk-dropdown="mode: hover">
                                    <ul class="uk-nav uk-dropdown-nav">
                                        <li><a href="/"                     ><span uk-icon="home"       ></span> {{ $shareData["home"] }}</a></li>
                                        <li><a href="/account"              ><span uk-icon="cog"        ></span> {{ $shareData["accountOption"] }}</a></li>
                                        <li><a href="/connection/off/edit"  ><span uk-icon="sign-out"   ></span> {{ $shareData["logOut"] }}</a></li>
                                    </ul>
                                </div>
                            @else
                                <button class="uk-button uk-button-text uk-text-capitalize" type="button">
                                    <span uk-icon="triangle-down"></span> {{ $shareData["language"] }}
                                </button>

                                <div uk-dropdown="mode: hover">
                                    <ul class="uk-nav uk-dropdown-nav">
                                        <li><a href="/lang/en/edit"><span uk-icon="location"></span> English</a></li>
                                        <li><a href="/lang/fr/edit"><span uk-icon="location"></span> Français</a></li>
                                    </ul>
                                </div>
                            @endif
                        </div>
                    <!-- /loginOrLanguage -->
                </nav>
            </div>
        <!-- /titleBar -->

        <!-- navbar -->
            <div class="uk-navbar-container" data-uk-sticky><div data-uk-sticky>
                <div class="uk-container">
                    <nav class="uk-navbar" uk-navbar>
                        <! dynamicLeftMenuForSmallDevice >
                            <div class="uk-navbar-left uk-hidden@s">
                                <div class="uk-offcanvas-content">
                                    <a href="#offcanvas" uk-toggle><span uk-navbar-toggle-icon></span><span class="uk-margin-small-left">{{ $shareData["menu"] }}</span></a>

                                    <div id="offcanvas" uk-offcanvas>
                                        <div class="uk-offcanvas-bar">
                                            <button class="uk-offcanvas-close" type="button" uk-close></button>

                                            <ul class="uk-nav uk-nav-default">
                                                @include("templateNavbarList")
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <! /dynamicLeftMenuForSmallDevice >

                        <div class="uk-navbar-left uk-visible@s">
                            <ul class="uk-navbar-nav">
                                @include("templateNavbarList")
                            </ul>
                        </div>

                        <div class="uk-navbar-right">
                            <ul class="uk-navbar-nav">
                                <li><a                                  href="https://github.com/newrare/laravelReadyToUse"  target="_blank" uk-icon="github"    ></a></li>
                                <li><a                                  href="https://twitter.com/"                          target="_blank" uk-icon="twitter"   ></a></li>
                                <li><a class="uk-padding-remove-right"  href="https://fr-fr.facebook.com/"                   target="_blank" uk-icon="facebook"  ></a></li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div></div>
        <!-- /navbar -->

        <!-- content -->
            @if($shareData["active"] == "/")
                <div class="uk-container uk-margin-top">
            @else
                <div class="uk-container uk-margin-top uk-margin-large-bottom">
            @endif

            <!-- divInIf -->
                @yield("content")
            </div>
        <!-- /content -->

        <!-- messageAlert -->
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
        <!-- /messageAlert -->
    </body>

    <!-- js -->
        <!-- engineAndCss -->
            {!! HTML::script("/js/jquery-2.1.4.min.js") !!}

            {!! HTML::script("/js/uikit-3.0.0-beta.42.min.js") !!}
            {!! HTML::script("/js/uikit-icons-3.0.0-beta.42.min.js") !!}
        <!-- /engineAndCss -->

        <!-- mainJs -->
            {!! HTML::script("/js/main.js") !!}
        <!-- /mainJs -->

        <!-- ifMessageAlert -->
            @if (isset($data["messageError"]) || session("messageError") )
                <script>messageError();</script>
            @endif

            @if (isset($data["messageDone"]) || session("messageDone") )
                <script>messageDone();</script>
            @endif
        <!-- /ifMessageAlert -->
    <!-- /js -->
</html>
