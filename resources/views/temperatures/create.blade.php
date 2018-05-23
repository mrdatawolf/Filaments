@extends('layouts.app')
@section('pageTitle','Create a temperature')
@section('content')
<form method="post" action="{{url('temperature')}}" enctype="multipart/form-data">
    @csrf
    <table class="table table-striped">
        <thead>
            <tr>
                <th>celsius</th>
                <th>user</th>
                <th>printer</th>
                <th>filament</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><label for="name">celsius:</label><input type="text" id="name" name="name"></td>
                <td><label for="slug">user:</label><input type="text" id="slug" name="slug"></td>
                <td><label for="name">printer:</label><input type="text" id="name" name="name"></td>
                <td><label for="slug">filament:</label><input type="text" id="slug" name="slug"></td>
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