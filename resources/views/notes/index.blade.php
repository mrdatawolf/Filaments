@extends('layouts.app')
@section('pageTitle','view notes')
@section('content')
<table class="table table-striped">
        <thead>
            <tr>
            <th>Name</th>
            <th>Slug</th>
            </tr>
        </thead>
        <tbody>
            @foreach($notes as $note)
            <tr>
            <td>{{$note['name']}}</td>
            <td>{{$note['slug']}}</td>
            
            <td><a href="{{action('NoteController@edit', $note['id'])}}" class="btn btn-warning">Edit</a></td>
            <td>
                <form action="{{action('NoteController@destroy', $note['id'])}}" method="post">
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