@extends('layouts.app')
@section('pageTitle','Create a brand')
@section('content')
<form method="post" action="{{url('brands')}}" enctype="multipart/form-data">
    @csrf
    <table class="table table-striped">
        <thead>
            <tr>
                <th>name</th>
                <th>slug</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><label for="name">Name:</label><input type="text" id="name" name="name"></td>
                <td><label for="slug">Short Name:</label><input type="text" id="slug" name="slug"></td>
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