@extends('layouts.app')
@section('pageTitle','view My Filaments')
@section('content')
<table class="table table-striped">
    <thead>
        <tr>
            <th>Name</th>
            <th>Type</th>
            <th>Width</th>
            <th>Revision</th>
        </tr>
    </thead>
    <tbody>
        @foreach($filaments as $filament)
        <tr>
            <td>{{$filament->name}}</td>
            <td>{{$filament->type->slug}}</td>
            <td>{{$filament->width}}</td>
            <td>{{$filament->revision}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection