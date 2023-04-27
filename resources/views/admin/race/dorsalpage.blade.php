@extends('layouts.app')

@section('content')
<div class="text-center" style="margin-top: 50px;">
    <h3>Codigo QR de {{$user->name}} en {{$race->name}} numero {{$number}}</h3>
    <div>
        <img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(300)->generate('http://192.168.17.53:8000/admin/race/stop-timer/'.$race->id.'/'.$user->id)) !!} ">
    </div>
   <div> <a href="{{ route('race.downloaduserqr', [$race, $user->id])  }}" >Descargar</a></div>
</div>

@endsection