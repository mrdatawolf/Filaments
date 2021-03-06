@extends('layouts.app')
@section('pageTitle','view types')
@section('content')
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nickname</th>
                <th>Name</th>
                <th>Options</th>
            </tr>
        </thead>
        <tbody>
            
            @foreach($types as $type)
            <tr>
                <td>{{$type->slug}}</td>
                <td>{{$type->name}}</td>
                
                <td><a href="{{action('TypeController@edit', $type['id'])}}" class="btn btn-warning">Edit</a>
                    <form action="{{action('TypeController@destroy', $type['id'])}}" method="post">
                    @csrf
                    <input name="_method" type="hidden" value="DELETE">
                    <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
            <tr>
                <td>
                    <form action="{{action('TypeController@create')}}" method="get">
                        @csrf
                        <button type="submit" class="btn btn-primary"><i class="fas fa-plus"></i>&nbsp;New</button>
                    </form>
                </td>
            </tr>
        </tbody>
    </table>
@endsection