@extends('layouts.app')
@section('pageTitle','view My Printers')
@section('content')
<table class="table table-striped">
    <thead>
        <tr>
        <th>Brand</th>
        <th>Name</th>
        <th>version</th>
        </tr>
    </thead>
    <tbody>
        @foreach($printers as $printer)
        <tr>
            <td>{{$printer->brand->slug}}</td>
            <td>{{$printer->name}}</td>
            <td>{{$printer->version}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection