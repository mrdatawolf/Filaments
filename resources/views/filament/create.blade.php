@extends('layouts.app')
@section('content')
<table>
<thead>
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
                @php dd($row) @endphp
                <td><input type="text" id="{{ $row['text'] }}"></td>
                @endforeach
            </tr>
        <tr>
            <td colspan="{{count($headers)}}">
                <a id="createFilament" href="{{ route('filamentCreate') }}"><i class="fas fa-plus"></i>Add</a>
            </td>
        </tr>
    </tbody>
</table>
@endsection
@section('postscript')
    <script>
        $('#createFilament').click( function() {
            alert('here');
            console.log('here');

            return false;
        });
    </script>
@endsection