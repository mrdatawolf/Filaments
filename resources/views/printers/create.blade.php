@extends('layouts.app')
@section('content')
<form method="post" action="{{route('printerCreate')}}" enctype="multipart/form-data">
    <table border="1px solid black">
        <thead>
            <tr>
            @foreach($headers as $header)
                <th colspan="{{ $header['span'] }}">{{$header['text']}}</th>
            @endforeach
            </tr>
        </thead>
        <tbody>
            <tr>
                @foreach($headers as $row)
                    <td><input type="text" id="{{ strtolower($row['text']) }}"></td>
                @endforeach
            </tr>
            <tr>
                <td colspan="{{count($headers)}}">
                    <button type="submit" id="createPrinter" class="btn btn-success">Create</button>
                </td>
            </tr>
        </tbody>
    </table>
</form>
@endsection
@section('postscript')
    <script>
        $('#createFilament').click( function() {
         
        });
    </script>
@endsection