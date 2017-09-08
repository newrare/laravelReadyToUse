@extends("template")

@section("content")
    @if(!session()->has("userLogin"))
        <div class="uk-width-1-1 uk-text-center uk-margin-large-bottom uk-height-viewport myHomeView">
            <br />

            <h1>{{ $data["titleMessage"] }}</h1>

            {{ $data["textCollectFull"] }}

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

            <ul class="uk-grid uk-grid-width-1-1 uk-grid-width-medium-1-1 uk-grid-width-large-1-3">
                <li class="uk-hidden-small uk-hidden-medium"></li>

                <li>
                    <a id="buttonLink" href="/CollectFullV1.2.apk" class="uk-button uk-button-large uk-button-success uk-width-1-1">
                        <i class="uk-icon-android"></i> {{ $data['buttonDownload'] }}
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

                        <div class="uk-panel-title">{{ $data["subCollection"] }}</div>

                        {{ $data["textCollection"] }}
                    </div>
                </li>

                <li>
                    <div class="uk-panel uk-panel-box-primary uk-animation-hover uk-animation-fade myPadding">
                        <div class="uk-panel-badge"></div>

                        <h1 class="myFirstColor"><i class="uk-icon-large uk-icon-gift"></i></h1>

                        <div class="uk-panel-title">{{ $data["subWishList"] }}</div>

                        {{ $data["textWishList"] }}
                    </div>
                </li>

                <li>
                    <div class="uk-panel uk-panel-box-primary uk-animation-hover uk-animation-fade myPadding">
                        <div class="uk-panel-badge"></div>

                        <h1 class="myFirstColor"><i class="uk-icon-large uk-icon-share-alt"></i></h1>

                        <div class="uk-panel-title">{{ $data["subShare"] }}</div>

                        {{ $data["textShare"] }}
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

                        <h1 class="myFirstColor"><i class="uk-icon-large uk-icon-pie-chart"></i></h1>

                        <div class="uk-panel-title">{{ $data["subStats"] }}</div>

                        {{ $data["textStats"] }}
                    </div>
                </li>

                <li>
                    <div class="uk-panel uk-panel-box-secondary uk-animation-hover uk-animation-fade myPadding">
                        <div class="uk-panel-badge uk-badge uk-badge-success">{{ $data["soon"] }}</div>

                        <h1 class="myBlackColor"><i class="uk-icon-large uk-icon-filter"></i></h1>

                        <div class="uk-panel-title">{{ $data["subFilter"] }}</div>

                        {{ $data["textFilter"] }}
                    </div>
                </li>

                <li>
                    <div class="uk-panel uk-panel-box-primary uk-animation-hover uk-animation-fade myPadding">
                        <div class="uk-panel-badge"></div>

                        <h1 class="myFirstColor"><i class="uk-icon-large uk-icon-bar-chart"></i></h1>

                        <div class="uk-panel-title">{{ $data["subRanking"] }}</div>

                        {{ $data["textRanking"] }}
                    </div>
                </li>

                <li>
                    <div class="uk-panel uk-panel-box-secondary uk-animation-hover uk-animation-fade myPadding">
                        <div class="uk-panel-badge uk-badge uk-badge-success">{{ $data["soon"] }}</div>

                        <h1 class="myBlackColor"><i class="uk-icon-large uk-icon-trophy"></i></h1>

                        <div class="uk-panel-title">{{ $data["subTrophy"] }}</div>

                        {{ $data["textTrophy"] }}
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
                    <div class="uk-panel uk-panel-box-primary uk-animation-hover uk-animation-fade myPadding">
                        <div class="uk-panel-badge"></div>

                        <h1 class="myFirstColor"><i class="uk-icon-large uk-icon-plus-circle"></i></h1>

                        <div class="uk-panel-title">{{ $data["subCreate"] }}</div>

                        {{ $data["textCreate"] }}
                    </div>
                </li>

                <li>
                    <div class="uk-panel uk-panel-box-primary uk-animation-hover uk-animation-fade myPadding">
                        <div class="uk-panel-badge"></div>

                        <h1 class="myFirstColor"><i class="uk-icon-large uk-icon-pencil-square-o"></i></h1>

                        <div class="uk-panel-title">{{ $data["subChange"] }}</div>

                        {{ $data["textChange"] }}
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
                    <div class="uk-panel">
                        <h1>{{ $data["subSlide"] }}</h1>

                        <ul class="uk-slideshow" data-uk-slideshow="{autoplay:true, kenburns:true, autoplayInterval:4000}">
                            <li><img src="/image/screen01.jpg"></li>
                            <li><img src="/image/screen02.jpg"></li>
                            <li><img src="/image/screen03.jpg"></li>
                            <li><img src="/image/screen04.jpg"></li>
                            <li><img src="/image/screen05.jpg"></li>
                            <li><img src="/image/screen06.jpg"></li>
                        </ul>
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
                            <hr />

                            <h4><i class="uk-icon-comments-o"></i> {{ $data["faqQ3"] }}</h4>
                            {{ $data["faqR3"] }}
                            <hr />

                            <h4><i class="uk-icon-comments-o"></i> {{ $data["faqQ4"] }}</h4>
                            {{ $data["faqR4"] }}
                            <hr />

                            <h4><i class="uk-icon-comments-o"></i> {{ $data["faqQ5"] }}</h4>
                            {{ $data["faqR5"] }}
                            <hr />

                            <h4><i class="uk-icon-comments-o"></i> {{ $data["faqQ6"] }}</h4>
                            {{ $data["faqR6"] }}
                            <hr />

                            <h4><i class="uk-icon-comments-o"></i> {{ $data["faqQ7"] }}</h4>
                            {{ $data["faqR7"] }}
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
