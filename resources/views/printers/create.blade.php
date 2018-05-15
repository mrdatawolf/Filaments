@extends('layouts.app')
@section('pageTitle','Create a printer')
@section('content')
<form method="post" action="{{url('printers')}}" enctype="multipart/form-data">
    @csrf
    <table border="table table-striped">
        <thead>
            <tr>
                <th>brand</th>
                <th>name</th>
                <th>version</th>
                <th>type supported</th>
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
                <td><label for="version">Version:</label><input type="text" id="version" name="version"></td>
                <td><label for="type">Types:</label>
                    <select multiple="multiple" id="type_id" name="type_ids[]">
                    @foreach($types as $type)
                        <option value="{{ $type['id'] }}">{{ $type['slug'] }}
                    @endforeach    
                    </select>
                </td>
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