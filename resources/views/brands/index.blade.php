@extends('layouts.app')
@section('pageTitle','view brands')
@section('content')
<table class="table table-striped">
        <thead>
            <tr>
            <th>Name</th>
            <th>Slug</th>
            </tr>
        </thead>
        <tbody>
            @foreach($brands as $brand)
            <tr>
            <td>{{$type['name']}}</td>
            <td>{{$type['slug']}}</td>
            
            <td><a href="{{action('BrandController@edit', $brand['id'])}}" class="btn btn-warning">Edit</a></td>
            <td>
                <form action="{{action('BrandController@destroy', $brand['id'])}}" method="post">
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