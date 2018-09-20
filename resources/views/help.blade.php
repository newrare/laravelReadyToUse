@extends("template")

@section("content")
    <h1 class="uk-heading-bullet uk-margin-remove">{{ $data["titlePage"] }}</h1>
    <small>{{ $data["titleMessage"] }}</small>

    <div class="uk-card uk-card-default uk-card-body uk-box-shadow-medium uk-margin-top">
        <h3 class="uk-card-title">{{ $data["subFaq"] }}</h3>

        @include("templateFaq")
    </div>

    <div class="uk-card uk-card-default uk-card-body uk-box-shadow-medium uk-margin-top">
        <h3 class="uk-card-title">{{ $data["subApi"] }}</h3>

        <p>{{ $data["message"] }}</p>

        <ul uk-tab>
            <li class="uk-active">  <a href="#">{{ $data["call"] }}</a></li>
            <li>                    <a href="#">{{ $data["token"] }}</a></li>
            <li>                    <a href="#">{{ $data["header"] }}</a></li>
            <li>                    <a href="#">{{ $data["argument"] }}</a></li>
            <li>                    <a href="#">{{ $data["code"] }}</a></li>
            <li>                    <a href="#">{{ $data["result"] }}</a></li>
        </ul>

        <ul class="uk-switcher uk-margin">
            <li>
                <table class="uk-table uk-table-hover uk-table-striped uk-table-divider">
                    <thead>
                        <tr>
                            <th class="uk-text-success">{{ $data["method"] }}</th>
                            <th class="uk-text-success">{{ $data["uri"] }}</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($data["web"]["listApi"] as $api)
                            <tr>
                                <td><small>{{ $api["method"] }} </small></td>
                                <td><small>{{ $api["uri"] }}    </small></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </li>

            <li>
                <p>{!! $data["messageToken"] !!}<br /><br /><br /><br /><br /><br /><br /></p>
            </li>

            <li>
                <p>{!! $data["messageHeader"] !!}</p>

                <p>{{ $data["messageHeaderToken"] }}</p>
                <ul class="uk-list">
                    <li><span class="uk-label">ID</span> foo</li>
                    <li><span class="uk-label">KEY</span> bar</li>
                </ul>

                <p>{{ $data["messageHeaderBase"] }}</p>
                <ul class="uk-list">
                    <li><span class="uk-label">ID</span> Zm9v</li>
                    <li><span class="uk-label">KEY</span> YmFy</li>
                </ul>

                <p>{{ $data["messageHeaderCurl"] }}</p>
                <pre><code class="language-php">
curl -i -H "Authorization:Basic Zm9v:YmFy" -H "Accept: application/json" -H "Content-Type: application/json"
                </pre></code>

                <span class="uk-label">{{ $data["note"] }}</span>
                {!! $data["messageHeaderNote"] !!}
            </li>

            <li>
                <p>{!! $data["messageArgument"] !!}</p>

                <pre><code class="language-php">
Method : PUT
Uri    : /api/account/1
{
    "code": 400,
    "message": "Bad Request",
    "result": {
        "email": [
            "This input is necessary"
        ],
        "lang": [
            "This input is necessary"
        ],
        "pass": [
            "(Optional)"
        ],
        "urlAvatar": [
            "(Optional)"
        ]
    }
}
                </pre></code>
            </li>

            <li>
                <pre><code class="language-php">
//PHP example
$method     = "GET";                            //choose your Call method: GET, POST, PUT or DELETE
$url        = "";                               //url to call
$tokenId    = base64_encode("YOUR_TOKEN_ID");   //enter your token id
$tokenKey   = base64_encode("YOUR_TOKEN_KEY");  //enter your token key

//Set up curl
$ch = curl_init($url);

curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    "Content-Type: application/json; charset=UTF-8",
    "Accept: application/json; charset=UTF-8",
    "Authorization: Basic " . $tokenId . ":" . $tokenKey,
));

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HEADER, true);

//post method
if($method == "POST")
{
    $data = array(); //add your keys and values here

    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
}

//put method
if($method == "PUT")
{
    $data = array(); //add your keys and values here

    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
}

//delete method
if($method == "DELETE")
{
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
}

curl_exec($ch);
curl_close($ch);
                </pre></code>
            </li>

            <li>
                <pre><code class="language-php">
Method : GET
Uri    : /api/blog
{
    "code": 200,
    "message": "Done",
    "result": {
        "id": [
            1,
            2
        ]
    }
}
                </pre></code>
            </li>
        </ul>
    </div>
@stop
