@extends('layouts.app')
@section('pageTitle','view filaments')
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
        <tr>
        <td>{{$filament['name']}}</td>
        <td>{{$filament['width']}}</td>
        <td>{{$filament['revision']}}</td>
        <td><a href="{{action('FilamentController@edit', $filament['id'])}}" class="btn btn-warning">Edit</a></td>
        <td>
            <form action="{{action('FilamentController@destroy', $filament['id'])}}" method="post">
            @csrf
            <input name="_method" type="hidden" value="DELETE">
            <button class="btn btn-danger" type="submit">Delete</button>
            </form>
        </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection