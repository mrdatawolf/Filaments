@extends('layouts.app')
@section('pageTitle','Create a speed')
@section('content')
<form method="post" action="{{url('speeds')}}" enctype="multipart/form-data">
    @csrf
    <table class="table table-striped">
        <thead>
            <tr>
                <th>stuff</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>stuff</td>
            </tr>
            <tr>
                <td colspan="2">
                    <button type="submit" id="create" class="btn btn-success">Create</button>
                </td>
            </tr>
        </tbody>
    </table>
</form>
@endsection