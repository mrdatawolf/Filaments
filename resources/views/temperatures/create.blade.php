@extends('layouts.app')
@section('pageTitle','Create a temperature')
@section('content')
<h4>Todo: we really are going to need to make a brand->filament thing here...</h4>
<form method="post" action="{{url('temperatures')}}" enctype="multipart/form-data">
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
                <td><label for="celsius">celsius:</label><input type="text" id="celsius" name="celsius"></td>
                <td>
                    {{ Auth::user()->name }}
                    <input type='hidden' id='user_id' name='user_id' value='{{ Auth::user()->id }}'>
                </td>
                <td>
                    <label for="printer_id">printer:</label>
                    <select id="printer_id" name="printer_id">
                        @foreach($printers as $printer)
                            <option value="{{ $printer['id'] }}">{{ $printer['name'] }}
                        @endforeach    
                    </select>
                <td>
                    <label for="filament_id">filament_id:</label>
                    <select id="filament_id" name="filament_id">
                            @foreach($filaments as $filament)
                                <option value="{{ $filament['id'] }}">{{ $filament['name'] }}
                            @endforeach    
                        </select>
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