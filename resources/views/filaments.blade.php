@extends('layouts.app')
@section('content')
    <table border="1px solid black">
        <thead>
            @foreach($filaments['headers'] as $row)
                <tr>
                    @foreach($row as $header)
                
                    <th colspan="{{$header['span']}}">{{$header['text']}}</th>
                    @endforeach
                </tr>
            @endforeach
        </thead>
        <tbody>
            @foreach($filaments['data'] as $filament)
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
                        Yours: {{$filament['temps']['user']['retraction']}}<br>
                        Favorite: {{$filament['temps']['fav']['retraction']}}<br>
                        Averaged: {{$filament['temps']['averaged']['retraction']}}<br>
                        Brand: {{$filament['temps']['brand']['retraction']}}
                </td>
                <td>
                        Yours: {{$filament['temps']['user']['speed']}}<br>
                        Favorite: {{$filament['temps']['fav']['speed']}}<br>
                        Averaged: {{$filament['temps']['averaged']['speed']}}<br>
                        Brand: {{$filament['temps']['brand']['speed']}}
                </td>
                <td>
                    Yours: {{$filament['temps']['user']['head']}}<br>
                    Favorite: {{$filament['temps']['fav']['head']}}<br>
                    Averaged: {{$filament['temps']['averaged']['head']}}<br>
                    Brand: {{$filament['temps']['brand']['head']}}
                </td>
                <td>
                    Yours:   {{$filament['temps']['user']['bed']}}<br>
                    Favorite: {{$filament['temps']['fav']['bed']}}<br>
                    Averaged: {{$filament['temps']['averaged']['bed']}}<br>
                    Brand: {{$filament['temps']['brand']['bed']}}
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
                <td id="addFilament" colspan="{{count(end($filaments['headers']))}}">
                    <a id="createFilament" href="{{route('filamentCreateForm')}}"><i class="fas fa-plus"></i>Add a new filament</a>
                </td>
            </tr>
        </tbody>
    </table>
    </div>
</div>
@endsection