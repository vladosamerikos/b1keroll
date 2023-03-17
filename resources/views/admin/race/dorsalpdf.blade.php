@extends('layouts.pdf')

@section('content')
<div class="text-center" style="margin-top: 50px; text-align:center;display:flex; flex-direction:row">
    <h1 style="background-color: orange; font-family: Verdana, Geneva, Tahoma, sans-serif;transform: rotate(-90deg);">{{$race->name}}</h1>
    <div>
        <img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(250)->generate('http://192.168.1.124:8000/admin/race/stop-timer/'.$race->id.'/'.$user->id)) !!} ">
    </div>
    <h1 style="background-color: orange; font-family: Verdana, Geneva, Tahoma, sans-serif;transform: rotate(-90deg);">{{$number}}</h1>
   
</div>


@endsection