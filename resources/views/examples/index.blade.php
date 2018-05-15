@extends('layouts.app')
@section('pageTitle','view examples')
@section('content')
<table class="table table-striped">
        <thead>
            <tr>
            <th>Name</th>
            <th>Slug</th>
            </tr>
        </thead>
        <tbody>
            @foreach($examples as $example)
            <tr>
            <td>{{$example['name']}}</td>
            <td>{{$example['slug']}}</td>
            
            <td><a href="{{action('ExamplesController@edit', $example['id'])}}" class="btn btn-warning">Edit</a></td>
            <td>
                <form action="{{action('ExamplesController@destroy', $example['id'])}}" method="post">
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