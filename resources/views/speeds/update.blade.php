@extends('layouts.app')
@section('pageTitle','Update a speed')
@section('content')
    @foreach($speeds as $speed)
        <div>
        <form action="{{action('Speed@update', $speed['id'])}}" method="POST">
            @method('PUT')
            @csrf
            stuff
            <button class="btn btn-warning" type="submit">Update</button>
        </form>
        </div>
    @endforeach
@endsection