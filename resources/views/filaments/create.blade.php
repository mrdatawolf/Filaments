@extends('layouts.app')
@section('pageTitle','create a filament')
@section('content')

<form method="post" action="{{url('filaments')}}" enctype="multipart/form-data">
    @csrf
    <table border="table table-striped">
        <thead>
            <tr>
                <th>brand</th>
                <th>name</th>
                <th>type</th>
                <th>width</th>
                <th>revision</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><label for="brand">Brand:</label>
                    <select id="brand_id" name="brand_id">
                    @foreach($brands as $brand)
                        <option value="{{ $brand['id'] }}">{{ $brand['slug'] }}
                    @endforeach    
                    </select>
                </td>
                <td><label for="name">Name:</label><input type="text" id="name" name="name"></td>
                <td><label for="type">Type:</label>
                    <select id="type_id" name="type_id">
                    @foreach($types as $type)
                        <option value="{{ $type['id'] }}">{{ $type['slug'] }}
                    @endforeach    
                    </select>
                </td>
                <td><label for="width">Width (in mm):</label><input type="text" id="width" name="width"></td>
                <td><label for="revision">Revision:</label><input type="text" id="revision" name="revision"></td>
            </tr>
            <tr>
                <td colspan="4">
                    <button type="submit" id="create" class="btn btn-success">Create</button>
                </td>
            </tr>
        </tbody>
    </table>
</form>
@endsection