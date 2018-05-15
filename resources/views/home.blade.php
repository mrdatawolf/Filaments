@extends('layouts.app')
@section('pageTitle','Filaments')
@section('content')
<table class="table table-striped">
    <thead>
        <tr>
        <th>Name</th>
        <th>Width</th>
        <th>Revision</th>
        </tr>
    </thead>
    <tbody>
        @foreach($filaments as $filament)
        @php dd($filament); @endphp
        <tr>
        <td>{{$filament['name']}}</td>
        <td>{{$filament['width']}}</td>
        <td>{{$filament['revision']}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection