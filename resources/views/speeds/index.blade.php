@extends('layouts.app')
@section('pageTitle','view speed')
@section('content')
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Retraction</th>
                <th>Speed</th>
                <th>User</th>
                <th>Printer</th>
                <th>Filament</th>
            </tr>
        </thead>
        <tbody>
            
            @foreach($speeds as $speed)
            <tr>
                <td>{{$speed->retraction}}</td>
                <td>{{$speed->speed}}</td>
                <td>{{$speed->user->name}}</td>
                <td>{{$speed->printer->name}}</td>
                <td>{{$speed->filament->name}}</td>
                
                <td><a href="{{action('SpeedController@edit', $speed['id'])}}" class="btn btn-warning">Edit</a>
                    <form action="{{action('SpeedController@destroy', $speed['id'])}}" method="post">
                    @csrf
                    <input name="_method" type="hidden" value="DELETE">
                    <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
            <tr>
                <td>
                    <form action="{{action('SpeedController@create')}}" method="get">
                        @csrf
                        <button type="submit" class="btn btn-primary"><i class="fas fa-plus"></i>&nbsp;New</button>
                    </form>
                </td>
            </tr>
        </tbody>
    </table>
@endsection