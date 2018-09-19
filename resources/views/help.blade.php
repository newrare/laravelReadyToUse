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

        <p>You can use our API for manage your account and options</p>

        <p>If first step, create an <a href="/account">account</a> and go to top-right menu for create an <a href="/account">API Token</a>. Choose your personal name project and clik on add button. Copy the Token Id and Token Key in your code for use our API.</p>

        <p>Authorization and Call: we give us an example in PHP but you can use another language.</p>

<ul uk-tab>
    <li class="uk-active"><a href="#">Token</a>dsddsdd</li>
    <li><a href="#">Example</a>isd</li>
</ul>
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

        <p>Call list</p>

		<table class="uk-table uk-table-hover uk-table-striped uk-table-divider">
        	<tbody>
				@foreach($data["web"]["listApi"] as $api)
                	<tr>
						<td><small>{{ $api["method"] }}	</small></td>
						<td><small>{{ $api["uri"] }}	</small></td>
					</tr>
				@endforeach
            </tbody>
        </table>
    </div>
@stop
