@if(session()->has("userLogin"))
    @if($shareData["active"] == "/service")
        <li class="uk-active"><a href="/service" class="uk-padding-remove-left"><span class="uk-icon uk-margin-small-right" uk-icon="icon: list"></span>{{ $shareData["service"] }}</a></li>
    @else
        <li><a href="/service" class="uk-padding-remove-left"><span class="uk-icon uk-margin-small-right" uk-icon="icon: list"></span>{{ $shareData["service"] }}</a></li>
    @endif
@else
    @if($shareData["active"] == "/")
        <li class="uk-active"><a href="/" class="uk-padding-remove-left"><span class="uk-icon uk-margin-small-right" uk-icon="icon: home"></span>{{ $shareData["home"] }}</a></li>
    @else
        <li><a href="/" class="uk-padding-remove-left"><span class="uk-icon uk-margin-small-right" uk-icon="icon: home"></span>{{ $shareData["home"] }}</a></li>
    @endif
@endif

@if($shareData["active"] == "/contact")
    <li class="uk-active"><a href="/contact"><span class="uk-icon uk-margin-small-right" uk-icon="icon: mail"></span>{{ $shareData["contact"] }}</a></li>
@else
    <li><a href="/contact"><span class="uk-icon uk-margin-small-right" uk-icon="icon: mail"></span>{{ $shareData["contact"] }}</a></li>
@endif

@if($shareData["active"] == "/blog")
    <li class="uk-active"><a href="/blog"><span class="uk-icon uk-margin-small-right" uk-icon="icon: calendar"></span>{{ $shareData['blog'] }}</a></li>
@else
    <li><a href="/blog"><span class="uk-icon uk-margin-small-right" uk-icon="icon: calendar"></span>{{ $shareData['blog'] }}</a></li>
@endif

@if(!session()->has("userLogin"))
    @if($shareData["active"] == "/connection")
         <li class="uk-active"><a href="/connection"><span class="uk-icon uk-margin-small-right" uk-icon="icon: sign-in"></span>{{ $shareData['buttonConnection'] }}</a></li>
    @else
        <li><a href="/connection"><span class="uk-icon uk-margin-small-right" uk-icon="icon: sign-in"></span>{{ $shareData['buttonConnection'] }}</a></li>
    @endif
@endif
