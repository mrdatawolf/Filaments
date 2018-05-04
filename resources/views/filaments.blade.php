@extends('layouts.app')
@section('content')
    <table border="1px solid black">
        <thead>
            <tr>
                <th colspan="5">Filament Info</th>
                <th colspan="2">Temps</th>
                <th>Other Info</th>
            </tr>
            <tr>
                <th>
                    Image
                </th>
                <th>
                    Brand
                </th>
                <th>
                    width (in mm)
                </th>
                <th>
                    type
                </th>
                <th>
                    Filament
                </th>
                <th>
                    Print head
                </th>
                <th>
                    Bed
                </th>
                <th>
                    More Info
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($filaments as $filament)
            <tr>
                <td>
                    <img src="{{$filament['thumb']}}">
                </td>
                <td class="brand">
                    {{$filament['brand']}}
                </td>
                <td>
                    {{$filament['width']}}
                </td>
                <td>
                    {{$filament['type']}}
                </td>
                <td>
                    <a href="#">{{$filament['name']}} </a>
                </td>
                <td>
                    Averaged: {{$filament['temps']['averaged']['head']}}<br>
                    Yours: {{$filament['temps']['user']['head']}}<br>
                    Band: {{$filament['temps']['brand']['head']}}
                </td>
                <td>
                    Averaged: {{$filament['temps']['averaged']['bed']}}<br>
                    Yours:   {{$filament['temps']['user']['bed']}}<br>
                    Band: {{$filament['temps']['brand']['bed']}}
                </td>
                <td>
                    @foreach($filament['moreInformation'] as $type => $data)
                        @foreach($data as $subType => $subData)
                            @foreach($subData as $title => $video)
                                <a href="{{$video}}">{{$type}} - {{$title}}</a>
                            @endforeach
                        @endforeach
                    @endforeach
                </td>
            </tr>
            @endforeach
            <tr>
                <td id="addFilament">
                    <a id="createFilament" href="{{route('filamentCreateForm')}}"><i class="fas fa-plus"></i>Add a new filament</a>
                </td>
            </tr>
        </tbody>
    </table>
    </div>
</div>
@endsection