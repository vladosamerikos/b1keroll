@extends('layouts.app')

@section('content')
<div class="text-center" style="margin-top: 50px;">
    <h3>Codigo QR de {{$user->name}} en {{$race->name}}</h3>
    <div>
        <img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(300)->generate('http://192.168.1.124:8000/admin/race/stop-timer/'.$race->id.'/'.$user->id)) !!} ">
    </div>
   <div> <a href="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(300)->generate('http://192.168.1.124:8000/admin/race/stop-timer/'.$race->id.'/'.$user->id)) !!} " download>Descargar</a></div>
</div>

@endsection