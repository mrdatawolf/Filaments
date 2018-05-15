@extends('layouts.app')
@section('pageTitle','Update an example')
@section('content')
    @foreach($examples as $example)
        <div>
        <form action="{{action('ExampleController@update', $example['id'])}}" method="POST">
            @method('PUT')
            @csrf
            <label for="name">Name:</label>
            <input type="textbox" name="name" id="name" value="{{$example['name']}}">
            <label for="name">Slug:</label>
            <input type="textbox" name="slug" id="slug" value="{{$example['slug']}}">
            <button class="btn btn-warning" type="submit">Update</button>
        </form>
        </div>
    @endforeach
@endsection