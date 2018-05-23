@extends('layouts.app')
@section('pageTitle','Update a temperature')
@section('content')
    @foreach($temperatures as $temperature)
        <div>
        <form action="{{action('Temperature@update', $temperature['id'])}}" method="POST">
            @method('PUT')
            @csrf
            <label for="name">Celsius:</label>
            <input type="textbox" name="name" id="name" value="{{$temperature['celsius']}}">
            <label for="name">User:</label>
            <input type="textbox" name="slug" id="slug" value="{{$temperature['user']}}">
            <label for="name">Printer:</label>
            <input type="textbox" name="name" id="name" value="{{$temperature['printer']}}">
            <label for="name">Filament:</label>
            <input type="textbox" name="slug" id="slug" value="{{$temperature['filament']}}">
            <button class="btn btn-warning" type="submit">Update</button>
        </form>
        </div>
    @endforeach
@endsection