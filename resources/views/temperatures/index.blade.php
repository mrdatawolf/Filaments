@extends('layouts.app')
@section('pageTitle','view temperature')
@section('content')
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Celsius</th>
                <th>User</th>
                <th>Printer</th>
                <th>Filament</th>
            </tr>
        </thead>
        <tbody>
            
            @foreach($temperatures as $temperature)
            <tr>
                <td>{{$temperature->celsius}}</td>
                <td>{{$temperature->user}}</td>
                <td>{{$temperature->printer}}</td>
                <td>{{$temperature->filament}}</td>
                
                <td><a href="{{action('TemperatureController@edit', $temperature['id'])}}" class="btn btn-warning">Edit</a>
                    <form action="{{action('TemperatureController@destroy', $temperature['id'])}}" method="post">
                    @csrf
                    <input name="_method" type="hidden" value="DELETE">
                    <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
            <tr>
                <td>
                    <form action="{{action('TemperatureController@create')}}" method="get">
                        @csrf
                        <button type="submit" class="btn btn-primary"><i class="fas fa-plus"></i>&nbsp;New</button>
                    </form>
                </td>
            </tr>
        </tbody>
    </table>
@endsection