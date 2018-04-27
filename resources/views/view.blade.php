@extends("template")

@section("content")
    <h1 class="uk-heading-bullet uk-margin-remove">{{ $data["titlePage"] }}</h1>
    <small>{{ $data["titleMessage"] }}</small>

    <table class="uk-table uk-table-hover uk-table-striped uk-table-divider">
        <thead>
            <tr>
                <th>{{ $data["key"] }}</th>
                <th>{{ $data["value"] }}</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($data["reply"] as $key => $item)
                <tr>
                    <td>{{ $key }}</td>
                    <td>{{ $item }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@stop
