@extends('layouts.app')
@section('pageTitle','view filaments')
@section('content')
<table class="table table-striped">
    <thead>
        <tr>
        <th>Name</th>
        <th>email</th>
        <th>provider</th>
        <th>created</th>
        <th>updated</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
        <tr>
        <td>{{$user['name']}}</td>
        <td>{{$user['email']}}</td>
        <td>{{empty($user['provider']) ? 'Local' : $user['provider'] }}</td>
        <td>{{$user['created_at']}}</td>
        <td>{{$user['updated_at']}}</td>
        
        <td><a href="{{action('UserController@edit', $user['id'])}}" class="btn btn-warning">Edit</a></td>
        <td>
            <form action="{{action('UserController@destroy', $user['id'])}}" method="post">
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