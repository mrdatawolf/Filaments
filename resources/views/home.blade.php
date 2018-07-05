@extends('layouts.app')
@section('pageTitle','Filaments')
@section('content')
<table class="table table-striped">
    <thead>
        <tr>
            <th colspan="5">Filament Details</th>
            <th colspan="9">Printer Settings</th>
        </tr>
        <tr>
            <th colspan="6">&nbsp;</th>
            <th colspan="4">Your's</th>
            <th colspan="4">The Average</th>
        </tr>
        <tr>
            <th>Brand</th>
            <th>Name</th>
            <th>Type</th>
            <th>Width</th>
            <th>Revision</th>
            <th>Printer</th>
            <th>Retract (mm)</th>
            <th>Speed (mm)</th>
            <th>Head temp</th>
            <th>Bed temp</th>
            <th>Retract (mm)</th>
            <th>Speed (mm)</th>
            <th>Head temp</th>
            <th>Bed temp</th>
        </tr>
    </thead>
    <tbody>
        @foreach($filaments as $filament)
            @foreach($filament->printers as $printer)
            <tr>
            <td>{{$filament->brand->slug}}
            <td>{{$filament->name}}</td>
            <td>{{$filament->type->slug}}</td>
            <td>{{$filament->width}}</td>
            <td>{{$filament->revision}}</td>
            <td>{{$printer->name}}&nbsp;{{$printer->version}}</td>
            <td>50</td>
            <td>40</td>
            <td><input class="tempInput" data-printerid="{{$printer->id}}" data-filamentid="{{$filament->id}}" data-temptype="head" type="text" value="{{$filament->temperature()->celsius ?? 0}}"></td>
            <td><input class="tempInput" data-printerid="{{$printer->id}}" data-filamentid="{{$filament->id}}" data-temptype="bed" type="text" value="{{$filament->temperature()->celsius ?? 0}}"></td>
            <td>65</td>
            <td>50</td>
            <td>200</td>
            <td>55</td>
            </tr>
            @endforeach
        @endforeach
    </tbody>
</table>
@endsection
@section('postscript')
<script>
    $('.tempInput').change(function () {
        var value = $(this).val();
        if($.isNumeric(value))
        {
            $(this).prop('readonly', true);
            var dataString = 'printerid='+$(this).data('printerid')+'&filamentid='+$(this).data('filamentid')+'&userid='+{{Auth::user()->id}}+'&tempType='+$(this).data('temptype')+'&temp='+value;
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "GET",
                url: "{{url('api/filament/temperature/update')}}",
                data: dataString,
                cache: false,
                success: function(data)
                {
                    console.log(data); // I get error and success function does not execute
                } 
            });
            console.log('changed');
            $(this).prop('readonly', false);
        }
        return false;
    });
</script>
@endsection