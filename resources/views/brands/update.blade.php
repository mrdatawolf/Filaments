@extends('layouts.app')
@section('pageTitle','Update a brand')
@section('content')
    @foreach($brands as $brand)
        <div>
        <form action="{{action('BrandController@update', $brand['id'])}}" method="POST">
            @method('PUT')
            @csrf
            <label for="name">Name:</label>
            <input type="textbox" name="name" id="name" value="{{$brand['name']}}">
            <label for="name">Slug:</label>
            <input type="textbox" name="slug" id="slug" value="{{$brand['slug']}}">
            <button class="btn btn-warning" type="submit">Update</button>
        </form>
        </div>
    @endforeach
@endsection