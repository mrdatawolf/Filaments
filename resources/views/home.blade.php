@extends('layouts.app')
@section('pageTitle','Filaments')
@section('content')
<table class="table table-striped">
    <thead>
        <tr>
            <th colspan="5">Filament Details</th>
            <th colspan="8">Printer Settings</th>
        </tr>
        <tr>
            <th colspan="5">&nbsp;</th>
            <th colspan="4">Your</th>
            <th colspan="4">Average</th>
        </tr>
        <tr>
            <th>Brand</th>
            <th>Name</th>
            <th>Type</th>
            <th>Width</th>
            <th>Revision</th>
            <th>Retract (mm)</th>
            <th>Speed (mm)</th>
            <th>Head temp</th>
            <th>Bed temp</th>
            <th>Retract (mm)</th>
            <th>Speed (mm)</th>
            <th>Head temp</th>
            <th>Bed temp</th>
        </tr>
    </thead>
    <tbody>
        @foreach($filaments as $filament)
        <tr>
        <td>{{$filament->brand->slug}}
        <td>{{$filament->name}}</td>
        <td>{{$filament->type->slug}}</td>
        <td>{{$filament->width}}</td>
        <td>{{$filament->revision}}</td>
        <td>50</td>
        <td>40</td>
        <td>{{$filament->temperature()->temp}}</td>
        <td>50</td>
        <td>65</td>
        <td>50</td>
        <td>200</td>
        <td>55</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection