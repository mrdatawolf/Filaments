@extends('layouts.app')
@section('pageTitle','Update a type')
@section('content')
    @foreach($types as $type)
        <div>
        <form action="{{action('TypeController@update', $type['id'])}}" method="POST">
            @method('PUT')
            @csrf
            <label for="name">Name:</label>
            <input type="textbox" name="name" id="name" value="{{$type['name']}}">
            <label for="name">Slug:</label>
            <input type="textbox" name="slug" id="slug" value="{{$type['slug']}}">
            <button class="btn btn-warning" type="submit">Update</button>
        </form>
        </div>
    @endforeach
@endsection