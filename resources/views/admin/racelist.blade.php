@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h2>Seguros</h2>
        <table class="table">
            <thead>
                <tr>
                  <th scope="col">Nombre</th>
                  <th scope="col">Descipcion</th>
                  <th scope="col">Desnivel</th>
                  <th scope="col">Participantes</th>
                  <th scope="col">Longitud</th>
                  <th scope="col">Dia</th>
                  <th scope="col">Hora</th>
                  <th scope="col">Salida</th>
                  <th scope="col">Precio</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($races as $race)
                    <tr>
                        <th>{{$race->name}}</th>
                        <td>{{$race->description}}</td>
                        <td>{{$race->unevenness}}</td>
                        <td>{{$race->number_of_competitos}}</td>
                        <td>{{$race->length}}</td>
                        <td>{{$race->start_date}}</td>
                        <td>{{$race->start_time}}</td>
                        <td>{{$race->start_point}}</td>
                        <td>{{$race->price}}</td>
                    </tr>
                @endforeach
              </tbody>
        </table>
        

    </div>
</div>
@endsection