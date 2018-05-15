@extends('layouts.app')
@section('pageTitle','Update a brand')
@section('content')
    @foreach($filaments as $filament)
        <div>
        <form action="{{action('FilamentController@update', $filament['id'])}}" method="POST">
            @method('PUT')
            @csrf
            <label for="name">Name:</label>
            <input type="textbox" name="name" id="name" value="{{$filament['name']}}">
            <label for="name">Width:</label>
            <input type="textbox" name="width" id="width" value="{{$filament['width']}}">
            <button class="btn btn-warning" type="submit">Update</button>
        </form>
        </div>
    @endforeach
@endsection