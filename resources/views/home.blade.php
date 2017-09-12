@extends("template")

@section("content")
    @if(!session()->has("userLogin"))
        <div class="uk-width-1-1 uk-text-center uk-margin-large-bottom uk-height-viewport myHomeView">
            <br />

            <h1>{{ $data["titleMessage"] }}</h1>

            {{ $data["textApplication"] }}

            <br /><br />

            {{ $data["textAndroid"] }}

            <ul class="uk-grid uk-grid-width-1-1 uk-grid-width-medium-1-1 uk-grid-width-large-1-4 uk-margin-large-top" data-uk-grid-margin>
                <li class="uk-hidden-small uk-hidden-medium"></li>

                <li>
                    <a id="buttonLink" href="#modalConnection" class="uk-button uk-button-large uk-button-secondary uk-width-1-1" data-uk-modal>
                        <i class="uk-icon-sign-in"></i> {{ $data['buttonConnection'] }}
                    </a>
                </li>

                <li>
                    <a id="buttonLink" href="/account" class="uk-button uk-button-large uk-button-primary uk-width-1-1">
                        <i class="uk-icon-plus-circle"></i> {{ $shareData["buttonAddAccount"] }}
                    </a>
                </li>

                <li class="uk-hidden-small uk-hidden-medium"></li>
            </ul>

            <div class="uk-margin-bottom uk-margin-large-top">
                <a id="buttonLink" href="#appAction" class="uk-icon-button uk-icon-arrow-down" data-uk-smooth-scroll></a>
            </div>
        </div>
    @endif
</div>

<div id="appAction" class="uk-width-1-1 myBackgroundColor">
    <div class="uk-container uk-container-center">
        <h1 class="uk-text-center uk-margin-large-top">{{ $data["titleAction"] }}</h1>

        <div class="uk-text-center uk-margin-large-bottom">
            <ul class="uk-grid uk-grid-width-1-1 uk-grid-width-medium-1-3 uk-grid-width-large-1-3 uk-grid-match" data-uk-grid-margin>
                <li>
                    <div class="uk-panel uk-panel-box-primary uk-animation-hover uk-animation-fade myPadding">
                        <div class="uk-panel-badge"></div>

                        <h1 class="myFirstColor"><i class="uk-icon-large uk-icon-th-list"></i></h1>

                        <div class="uk-panel-title">{{ $data["subService"] }}</div>

                        {{ $data["textService"] }}
                    </div>
                </li>

                <li>
                    <div class="uk-panel uk-panel-box-primary uk-animation-hover uk-animation-fade myPadding">
                        <div class="uk-panel-badge"></div>

                        <h1 class="myFirstColor"><i class="uk-icon-large uk-icon-cloud"></i></h1>

                        <div class="uk-panel-title">{{ $data["subCloud"] }}</div>

                        {{ $data["textCloud"] }}
                    </div>
                </li>

                <li>
                    <div class="uk-panel uk-panel-box-primary uk-animation-hover uk-animation-fade myPadding">
                        <div class="uk-panel-badge"></div>

                        <h1 class="myFirstColor"><i class="uk-icon-large uk-icon-flag"></i></h1>

                        <div class="uk-panel-title">{{ $data["subLang"] }}</div>

                        {{ $data["textLang"] }}
                    </div>
                </li>

                <li>
                    <div class="uk-panel uk-panel-box-primary uk-animation-hover uk-animation-fade myPadding">
                        <div class="uk-panel-badge"></div>

                        <h1 class="myFirstColor"><i class="uk-icon-large uk-icon-database"></i></h1>

                        <div class="uk-panel-title">{{ $data["subDatabase"] }}</div>

                        {{ $data["textDatabase"] }}
                    </div>
                </li>

                <li>
                    <div class="uk-panel uk-panel-box-secondary uk-animation-hover uk-animation-fade myPadding">
                        <div class="uk-panel-badge uk-badge uk-badge-success">{{ $data["soon"] }}</div>

                        <h1 class="myBlackColor"><i class="uk-icon-large uk-icon-code"></i></h1>

                        <div class="uk-panel-title">{{ $data["subApi"] }}</div>

                        {{ $data["textApi"] }}
                    </div>
                </li>

                <li>
                    <div class="uk-panel uk-panel-box-secondary uk-animation-hover uk-animation-fade myPadding">
                        <div class="uk-panel-badge uk-badge uk-badge-success">{{ $data["soon"] }}</div>

                        <h1 class="myBlackColor"><i class="uk-icon-large uk-icon-group"></i></h1>

                        <div class="uk-panel-title">{{ $data["subSocial"] }}</div>

                        {{ $data["textSocial"] }}
                    </div>
                </li>

                <li>
                    <div class="uk-panel uk-panel-box-primary uk-animation-hover uk-animation-fade myPadding">
                        <div class="uk-panel-badge"></div>

                        <h1 class="myFirstColor"><i class="uk-icon-large uk-icon-tablet"></i></h1>

                        <div class="uk-panel-title">{{ $data["subResponsive"] }}</div>

                        {{ $data["textResponsive"] }}
                    </div>
                </li>
            </ul>

            <ul class="uk-grid uk-grid-width-1-1 uk-margin-large-top uk-margin-large-bottom" data-uk-grid-margin>
                <li>
                    <div class="uk-panel uk-panel-box myPadding">
                        <h1>{{ $data["subFaq"] }}</h1>

                        <div class="uk-text-left uk-margin-large-top">
                            <h4><i class="uk-icon-comments-o"></i> {{ $data["faqQ1"] }}</h4>
                            {{ $data["faqR1"] }}
                            <hr />

                            <h4><i class="uk-icon-comments-o"></i> {{ $data["faqQ2"] }}</h4>
                            {{ $data["faqR2"] }}
                        </div>
                    </div>
                </li>
            </ul>

            <ul class="uk-grid uk-grid-width-1-1" data-uk-grid-margin>
                <li>
                    <div class="uk-panel">
                        <h1>{{ $data["subAboutUs"] }}</h1>

                        <img class="uk-border-circle" src="/image/team.jpg" alt="Team">

                        <br /><br />

                        <ul class="uk-grid uk-grid-width-1-1 uk-grid-width-medium-1-1 uk-grid-width-large-1-3">
                            <li class="uk-hidden-small uk-hidden-medium"></li>
                            <li>{{ $data["textAboutUs"] }}</li>
                            <li class="uk-hidden-small uk-hidden-medium"></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>

<div class="uk-panel uk-panel-box-secondary">
    <div class="uk-container uk-container-center uk-margin-top uk-margin-bottom">
        <h1 class="uk-text-center myBlackColor">{{ $data["subContact"] }}</h1>

        @include("templateContact")
    </div>
</div>

<div class="uk-panel uk-panel-box">
    <div class="uk-container uk-container-center uk-margin-top uk-margin-bottom">
        <h4><i class="uk-icon-gavel"></i> {{ $data["subLegal"] }}</h4>

        {{ $data["textLegal"] }}
    </div>
</div>

<div id="modalConnection" class="uk-modal">
    <div class="uk-modal-dialog">
        <a id="buttonLink" class="uk-modal-close uk-close"></a>

        <br />

        @include("templateConnection")
    </div>
</div>

<div>
@stop
