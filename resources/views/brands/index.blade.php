@extends('layouts.app')
@section('pageTitle','view brands')
@section('content')
<table class="table table-striped">
        <thead>
            <tr>
            <th>Name</th>
            <th>Nickname</th>
            <th>Options</th>
            </tr>
        </thead>
        <tbody>
            @foreach($brands as $brand)
            <tr>
            <td>{{$brand['name']}}</td>
            <td>{{$brand['slug']}}</td>
            
            <td><a href="{{action('BrandController@edit', $brand['id'])}}" class="btn btn-warning">Edit</a>
                <form action="{{action('BrandController@destroy', $brand['id'])}}" method="post">
                @csrf
                <input name="_method" type="hidden" value="DELETE">
                <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
            </tr>
            @endforeach
            <tr>
                <td>
                    <form action="{{action('BrandController@create')}}" method="get">
                        @csrf
                        <button type="submit" class="btn btn-primary"><i class="fas fa-plus"></i>&nbsp;New</button>
                    </form>
                </td>
            </tr>
        </tbody>
    </table>
@endsection