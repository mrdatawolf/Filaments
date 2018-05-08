@extends('layouts.app')
@section('content')
<div class="title m-b-md">
    Filaments.guru
    </div>
    <table border="1px solid black">
        <thead>
        <tr>
            <th>
                Brand
            </th>
            <th>
                Model
            </th>
            <th>
                Version
            </th>
            <th>
                More Info
            </th>
        </tr>
        </thead>
        <tbody>
        @foreach($printers as $printer)
        <tr>
            <td class="brand">
                <img src="{{$printer['thumb']}}">
                {{$printer['brand']}}
            </td>
            <td>
                <a href="#">{{$printer['model']}} </a>
            </td>
            <td>
                    {{$printer['version']}} </a>
            </td>
            <td>
                {{$printer['other']['notes']}}
            </td>
        </tr>
            @endforeach
        </tbody>
    </table>
    </div>
</div>
@endsection
