<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Filaments.guru</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            .brand {
                font-weight: bold;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif

            <div class="content">
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
                            Filament
                        </th>
                        <th>
                            Average Print head temp
                        </th>
                        <th>
                            Average Bed temp
                        </th>
                        <th>
                            User Print head temp
                        </th>
                        <th>
                            User Bed temp
                        </th>
                        <th>
                            Recommended Print head temp
                        </th>
                        <th>
                            Recommended bed temp
                        </th>
                        <th>
                            More Info
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($filaments as $filament)
                    <tr>
                        <td class="brand">
                            <img src="{{$filament['thumb']}}">
                            {{$filament['brand']}}
                        </td>
                        <td>
                            <a href="#"><img href="{{$filament['thumb']}}">{{$filament['name']}} </a>
                        </td>
                        <td>
                            {{$filament['temps']['averaged']['head']}}
                        </td>
                        <td>
                            {{$filament['temps']['user']['bed']}}
                        </td>
                        <td>
                            {{$filament['temps']['user']['head']}}
                        </td>
                        <td>
                            {{$filament['temps']['user']['bed']}}
                        </td>
                        <td>
                            {{$filament['temps']['brand']['head']}}
                        </td>
                        <td>
                            {{$filament['temps']['brand']['bed']}}
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
                    </tbody>
                </table>
            </div>
        </div>
    </body>
</html>
