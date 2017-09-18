@if(session()->has("userLogin"))
    @if($shareData["active"] == "/service")
        <li class="uk-active"><a href="/service"><i class="uk-icon-th-list"></i> {{ $shareData["service"] }}</a></li>
    @else
        <li><a href="/service"><i class="uk-icon-th-list"></i> {{ $shareData["service"] }}</a></li>
    @endif
@else
    @if($shareData["active"] == "/")
        <li class="uk-active"><a href="/"><i class="uk-icon-home"></i> {{ $shareData["home"] }}</a></li>
    @else
        <li><a href="/"><i class="uk-icon-home"></i> {{ $shareData["home"] }}</a></li>
    @endif
@endif

@if($shareData["active"] == "/contact")
    <li class="uk-active"><a href="/contact"><i class="uk-icon-envelope"></i> {{ $shareData["contact"] }}</a></li>
@else
    <li><a href="/contact"><i class="uk-icon-envelope"></i> {{ $shareData["contact"] }}</a></li>
@endif

@if(!session()->has("userLogin"))
    @if($shareData["active"] == "/connection")
         <li class="uk-active"><a href="/connection"><i class="uk-icon-check-circle"></i> {{ $shareData['buttonConnection'] }}</a></li>
    @else
        <li><a href="/connection"><i class="uk-icon-check-circle"></i> {{ $shareData['buttonConnection'] }}</a></li>
    @endif
@endif
