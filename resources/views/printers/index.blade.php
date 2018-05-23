@extends('layouts.app')
@section('pageTitle','view Printers')
@section('content')
<table class="table table-striped">
    <thead>
        <tr>
            <th>Brand</th>
            <th>Name</th>
            <th>version</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($printers as $printer)
        <tr>
            <td>{{$printer->brand->slug}}</td>
            <td>{{$printer->name}}</td>
            <td>{{$printer->version}}</td>
            
            <td><a href="{{action('PrinterController@edit', $printer['id'])}}" class="btn btn-warning">Edit</a>
                <form action="{{action('PrinterController@destroy', $printer['id'])}}" method="post">
                @csrf
                <input name="_method" type="hidden" value="DELETE">
                <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
        <tr>
            <td>
                <form action="{{action('PrinterController@create')}}" method="get">
                    @csrf
                    <button type="submit" class="btn btn-primary"><i class="fas fa-plus"></i>&nbsp;New</button>
                </form>
            </td>
        </tr>
    </tbody>
</table>
@endsection