@extends("template")

@section("content")
    <!-- homeIntro -->
        @if(!session()->has("userLogin"))
            <div class="uk-container uk-text-center uk-flex uk-flex-middle" uk-height-viewport="offset-top: true; offset-bottom: true">
                <div class="uk-container">
                    <h1 class="uk-heading-primary uk-visible@s">{{ $data["titleMessage"] }}</h1>
                    <h2 class="uk-hidden@s">{{ $data["titleMessage"] }}</h1>

                    <p class="uk-text-lead uk-visible@s">{{ $data["textApplication"] }}</p>
                    <p class="uk-hidden@s">{{ $data["textApplication"] }}</p>

                        <div class="uk-child-width-1-2@s uk-grid-small uk-grid-match" uk-grid>
                            <div><a class="uk-button uk-button-large uk-button-primary uk-width-1-1" href="#modalConnection" uk-toggle>{{ $data['buttonConnection'] }}</a></div>
                            <div><a class="uk-button uk-button-large uk-button-default uk-width-1-1" href="/account"><span uk-icon="icon: plus-circle"></span> {{ $shareData["buttonAddAccount"] }}</a></div>
                        </div>
                </div>
            </div>

            <div class="uk-width-1-1 uk-text-center">
                <a href="#appAction" class="uk-icon-button uk-margin-top uk-margin-bottom" uk-icon="arrow-down" uk-scroll></a>
            </div>
        @endif
    <!-- /homeIntro -->
</div>

<div id="appAction">
    <div class="uk-container">
        <!-- information -->
            @if(session()->has("userLogin"))
                <h1 class="uk-heading-line uk-text-center"><span>{{ $data["titleAction"] }}</span></h1>
            @else
                <h1 class="uk-heading-line uk-text-center uk-margin-xlarge-top"><span>{{ $data["titleAction"] }}</span></h1>
            @endif

            <div class="uk-child-width-1-3@s uk-grid-small uk-grid-match" uk-grid>
                <div uk-scrollspy="cls: uk-animation-slide-left; repeat: true">
                    <div class="uk-card uk-card-default uk-card-body uk-text-center">
                        <span class="uk-icon uk-text-primary" uk-icon="icon: list; ratio: 3"></span>
                        <h3 class="uk-card-title uk-margin-remove-top">{{ $data["subService"] }}</h3>
                        <p>{{ $data["textService"] }}</p>
                    </div>
                </div>

                <div>
                    <div class="uk-card uk-card-default uk-card-body uk-text-center">
                        <span class="uk-icon uk-text-primary" uk-icon="icon: database; ratio: 3"></span>
                        <h3 class="uk-card-title uk-margin-remove-top">{{ $data["subDatabase"] }}</h3>
                        <p>{{ $data["textDatabase"] }}</p>
                    </div>
                </div>

                <div uk-scrollspy="cls: uk-animation-slide-right; repeat: true">
                    <div class="uk-card uk-card-default uk-card-body uk-text-center">
                        <span class="uk-icon uk-text-primary" uk-icon="icon: world; ratio: 3"></span>
                        <h3 class="uk-card-title uk-margin-remove-top">{{ $data["subLang"] }}</h3>
                        <p>{{ $data["textLang"] }}</p>
                    </div>
                </div>

                <div uk-scrollspy="cls: uk-animation-slide-left; repeat: true">
                    <div class="uk-card uk-card-default uk-card-body uk-text-center">
                        <span class="uk-icon uk-text-primary" uk-icon="icon: cloud-upload; ratio: 3"></span>
                        <h3 class="uk-card-title uk-margin-remove-top">{{ $data["subCloud"] }}</h3>
                        <p>{{ $data["textCloud"] }}</p>
                    </div>
                </div>

                <div>
                    <div class="uk-card uk-card-primary uk-card-body uk-text-center">
                        <span class="uk-icon" uk-icon="icon: code; ratio: 3"></span>
                        <h3 class="uk-card-title uk-margin-remove-top">{{ $data["subApi"] }}</h3>
                        <p>{{ $data["textApi"] }}</p>
                    </div>
                </div>

                <div uk-scrollspy="cls: uk-animation-slide-right; repeat: true">
                    <div class="uk-card uk-card-default uk-card-body uk-text-center">
                        <span class="uk-icon uk-text-primary" uk-icon="icon: phone; ratio: 3"></span>
                        <h3 class="uk-card-title uk-margin-remove-top">{{ $data["subResponsive"] }}</h3>
                        <p>{{ $data["textResponsive"] }}</p>
                    </div>
                </div>
            </div>
        <!-- /information -->

        <!-- faq -->
            <h1 class="uk-heading-line uk-text-right uk-margin-xlarge-top"><span>{{ $data["subFaq"] }}</span></h1>

            @include("templateFaq")
        <!-- /faq -->

        <!-- aboutUs -->
            <h1 class="uk-heading-line uk-text-center uk-margin-xlarge-top"><span>{{ $data["subAboutUs"] }}</span></h1>

            <div class="uk-box-shadow-bottom uk-box-shadow-small uk-width-1-1@s uk-text-center">
                <div class="uk-background-default uk-padding-large">
                    <img class="uk-border-circle" src="/image/team.jpg" alt="Team" />

                    <p>{{ $data["textAboutUs"] }}</p>
                </div>
            </div>
        <!-- /aboutUs -->

        <!-- contact -->
            <h1 class="uk-heading-line uk-text-left uk-margin-xlarge-top"><span>{{ $data["subContact"] }}</span></h1>

            @include("templateContact")
        <!-- /contact -->
    </div>
</div>

<!-- bottomLegal -->
    <div class="uk-background-secondary uk-margin-xlarge-top" uk-scrollspy="cls: uk-animation-fade; target: > div; delay: 300">
        <div class="uk-container uk-container-center">
            <h4 class="uk-margin-top uk-text-primary"><span uk-icon="nut"></span> {{ $data["subLegal"] }}</h4>

            <p class="uk-light uk-margin-bottom">{{ $data["textLegal"] }}</p>
        </div>
    </div>
<!-- /bottomLegal -->

<!-- modelConnection -->
    <div id="modalConnection" uk-modal>
        <div class="uk-modal-dialog uk-modal-body">
            <button class="uk-modal-close-default" type="button" uk-close></button>

            @include("templateConnection")
        </div>
    </div>
<!-- /modelConnection -->

<div>
@stop
