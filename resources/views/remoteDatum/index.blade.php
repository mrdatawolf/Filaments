@extends('layouts.app')
@section('pageTitle','view remote connection')
@section('content')
<table class="table table-striped">
        <thead>
            <tr>
            <th>Name</th>
            <th>Slug</th>
            </tr>
        </thead>
        <tbody>
            @foreach($remoteDatum as $data)
            <tr>
            <td>{{$data['name']}}</td>
            <td>{{$data['slug']}}</td>
            
            <td><a href="{{action('RemoteDatumController@edit', $data['id'])}}" class="btn btn-warning">Edit</a></td>
            <td>
                <form action="{{action('RemoteDatumController@destroy', $data['id'])}}" method="post">
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