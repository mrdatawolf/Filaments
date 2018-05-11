@extends('layouts.app')
@section('pageTitle','view printers')
@section('content')
<table class="table table-striped">
    <thead>
        <tr>
        <th>Name</th>
        <th>Slug</th>
        </tr>
    </thead>
    <tbody>
        @foreach($printers as $printer)
        <tr>
        <td>{{$printer['name']}}</td>
        <td>{{$printer['width']}}</td>
        <td>{{$printer['revision']}}</td>
        
        <td><a href="{{action('PrinterController@edit', $printer['id'])}}" class="btn btn-warning">Edit</a></td>
        <td>
            <form action="{{action('PrinterController@destroy', $printer['id'])}}" method="post">
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