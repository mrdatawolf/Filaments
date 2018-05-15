@extends('layouts.app')
@section('pageTitle','Update an issue')
@section('content')
    @foreach($issues as $issue)
        <div>
        <form action="{{action('IssueController@update', $issue['id'])}}" method="POST">
            @method('PUT')
            @csrf
            <label for="name">Name:</label>
            <input type="textbox" name="name" id="name" value="{{$issue['name']}}">
            <label for="name">Slug:</label>
            <input type="textbox" name="slug" id="slug" value="{{$issue['slug']}}">
            <button class="btn btn-warning" type="submit">Update</button>
        </form>
        </div>
    @endforeach
@endsection