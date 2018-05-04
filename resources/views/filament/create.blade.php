@extends('layouts.app')
@section('content')
<table>
<thead>
        <tr>
            <th colspan="6">Filament Info</th>
            <th colspan="2">Other Info</th>
        </tr>
        <tr>
            <th>
                Image Link
            </th>
            <th>
                Brand
            </th>
            <th>
                width (in mm)
            </th>
            <th>
                type
            </th>
            <th>
                Filament name
            </th>
            <th>
                Notes
            </th>
            <th>
                Youtube
            </th>
            <th>
                Links
            </th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>
                <input type="text">
            </td>
            <td>
                    <input type="text">
            </td>
            <td>
                    <input type="text">
            </td>
            <td>
                    <input type="text">
            </td>
            <td>
                    <input type="text">
            </td>
            <td>
                    <input type="text">
            </td>
            <td>
                    <input type="text">
            </td>
            <td>
                    <input type="text">
            </td>
        </tr>
        <tr>
            <td colspan="8">
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