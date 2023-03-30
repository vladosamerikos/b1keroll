@extends('layouts.app')

@push('styles')
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endpush

@section('content')
<section>
    <div class="container">
        <div class="row justify-content-center">
            <h2>Carreras</h2>
            <div class="mb-3 d-flex justify-content-end">
        </div>
            <table class="table">
                <thead>
                    <tr class="text-center">
                    <th scope="col">Nombre</th>
                    <th scope="col">Descipcion</th>
                    <th scope="col">Desnivel</th>
                    <th scope="col">Poster</th>
                    <th scope="col">Mapa</th>
                    <th scope="col">Participantes</th>
                    <th scope="col">Longitud</th>
                    <th scope="col">Dia</th>
                    <th scope="col">Hora</th>
                    <th scope="col">Salida</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Participantes</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($races as $race)
                        <tr  class="align-middle text-center">
                            <th>{{$race->name}}</th>
                            <td>{{$race->description}}</td>
                            <td>{{$race->unevenness}}</td>
                            <td><img class="rounded" width="100" src="{{ asset('storage/' .$race->promotional_poster) }}" /></td>
                            <td><iframe src="{{$race->map_frame}}"
                            width="100" height="100" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </td>
                            <td>{{$race->number_of_competitors}}</td>
                            <td>{{$race->length}}</td>
                            <td>{{date('d/m/Y' ,strtotime($race->start_date))}}</td>
                            <td>{{$race->start_time}}</td>
                            <td>{{$race->start_point}}</td>
                            <td>{{$race->price}} €</td>
                            <td><a href="{{route('race.listrunners', $race)}}"><img class='table-icon' src="{{ asset('img/user-list.svg') }}" alt="" srcset=""></a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</section>

@endsection