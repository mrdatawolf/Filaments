@extends('layouts.app')
@section('pageTitle','view issues')
@section('content')
<table class="table table-striped">
        <thead>
            <tr>
            <th>Name</th>
            <th>Slug</th>
            </tr>
        </thead>
        <tbody>
            @foreach($issues as $issue)
            <tr>
            <td>{{$issue['name']}}</td>
            <td>{{$issue['slug']}}</td>
            
            <td><a href="{{action('IssueController@edit', $issue['id'])}}" class="btn btn-warning">Edit</a></td>
            <td>
                <form action="{{action('IssueController@destroy', $issue['id'])}}" method="post">
                @csrf
                <input name="_method" type="hidden" value="DELETE">
                <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection