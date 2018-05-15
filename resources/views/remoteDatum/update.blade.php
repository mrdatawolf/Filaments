@extends('layouts.app')
@section('pageTitle','Update a remote connection')
@section('content')
    @foreach($datas as $data)
        <div>
        <form action="{{action('RemoteDatumController@update', $data['id'])}}" method="POST">
            @method('PUT')
            @csrf
            <label for="name">Name:</label>
            <input type="textbox" name="name" id="name" value="{{$data['name']}}">
            <label for="name">Slug:</label>
            <input type="textbox" name="slug" id="slug" value="{{$data['slug']}}">
            <button class="btn btn-warning" type="submit">Update</button>
        </form>
        </div>
    @endforeach
@endsection