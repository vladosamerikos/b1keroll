@extends('layouts.app')

@push('styles')
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
@endpush

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h2>Carreras</h2>
        <div class="mb-3 d-flex justify-content-end">
          <a class="btn btn-dark btn-block" href="{{ route('race.create') }}">Crear carrera</a>
      </div>
        <table class="table">
            <thead>
                <tr class="text-center">
                  <th scope="col">Nombre</th>
                  <th scope="col">Descripción</th>
                  <th scope="col">Desnivel</th>
                  <th scope="col">Poster</th>
                  <th scope="col">Mapa</th>
                  <th scope="col">Participantes</th>
                  <th scope="col">Longitud</th>
                  <th scope="col">Día</th>
                  <th scope="col">Hora</th>
                  <th scope="col">Salida</th>
                  <th scope="col">Precio</th>
                  <th scope="col">Subir Imágenes</th>
                  <th scope="col">Participantes</th>
                  <th scope="col">Editar Seguros</th>
                  <th scope="col">Editar</th>
                  <th scope="col">Estado</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($races as $race)
                    <tr  class="align-middle text-center">
                        <th>{{$race->name}}</th>
                        <td>{{ Str::limit($race->description, 8, '...')}}</td>
                        <td><img class="rounded" width="100" src="{{ asset('storage/image/' .$race->unevenness) }}" /></td>
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
                        <td><a href="{{route('race.uploadimages', $race)}}"><img class='table-icon' src="{{ asset('img/add-image.svg') }}" alt="" srcset=""></a></td>
                        <td><a href="{{route('race.listrunners', $race)}}"><img class='table-icon' src="{{ asset('img/user-list.svg') }}" alt="" srcset=""></a></td>
                        <td><a href="{{route('race.editinsurances', $race)}}"><img class='table-icon' src="{{ asset('img/insurance.svg') }}" alt="" srcset=""></a></td>
                        <td><a href="{{route('race.edit', $race)}}"><img class='table-icon' src="{{ asset('img/edit.svg') }}" alt="" srcset=""></a></td>
                        <td><?php if($race->active == 1){?>
                          <a href="{{route('race.storestatus', $race)}}"><img class='table-icon' src="{{ asset('img/on.svg') }}" alt="" srcset=""></a>
                        <?php }
                        else{?>
                          <a href="{{route('race.storestatus', $race)}}"><img class='table-icon' src="{{ asset('img/off.svg') }}" alt="" srcset=""></a>
                        <?php } ?>
                        </td>
                    </tr>
                @endforeach
              </tbody>
        </table>
        

    </div>
</div>
@endsection