@extends('layouts.app')

@push('styles')
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
@endpush

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h2>Ciclistas</h2>
        
        <table class="table">
            <thead>
                <tr class="text-center">
                  <th scope="col">Ciclista</th>
                  <th scope="col">codigo QR</th>
                  <th scope="col">Numero Dorsal</th>
                  <th scope="col">Tiempo</th>
                  <th scope="col">Ha pagado?</th>
                  <th scope="col">Descargar QR</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($runners as $runner)
                    <tr  class="align-middle text-center">
                        <th>{{$runner->name}}</th>
                        <td>{!! QrCode::size(100)->backgroundColor(255,255,255)->generate('http://192.168.1.124:8000/admin/race/stop-timer/'.$race->id.'/'.$runner->id) !!}</td>
                        <td>{{$runner->pivot->runner_number}}</td>
                        <td>{{$runner->pivot->elapsed_time}}</td>
                        <td><?php if($runner->pivot->is_paid == 1){?>
                          si
                        <?php }
                        else{?>
                          no
                        <?php } ?> 
                        </td>
                        <td><a href="{{route('race.printuserqr', [$race, $runner->id])}}"><img class='table-icon' src="{{ asset('img/qrcode.svg') }}" alt="" srcset=""></a></td>

                        
                    </tr>
                @endforeach
              </tbody>
        </table>
        

    </div>
</div>
@endsection