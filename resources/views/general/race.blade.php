@extends('layouts.app')

@section('content')


<section class="py-5">
  <div class="container px-4 px-lg-5 my-5">
      <div class="row gx-4 gx-lg-5 align-items-center">
          <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="{{ asset('storage/' .$race->promotional_poster) }}" alt="..."></div>
          <div class="col-md-6">
              <h1 class="display-5 fw-bolder">{{$race->name}}</h1>
              <div class="fs-5 mb-5">
                  <h3 class="card-title">Precio Seguro: </h3<span>{{$race->price}} €</span>
                  <br>
                  <h3 class="card-title">Longitud: </h3><span>{{$race->length}}</span>
              </div>
              <h3 class="card-title">Descripción: </h3><p class="lead">{{$race->description}}</p>
              <a href="{{ route('race.register', $race) }}" class="btn btn-primary">Apuntarse</a>
          </div>
      </div>
      <br>
      <div>
        <h2 class="card-title fw-bolder">INFORMACIÓN</h2> 
        <p class="card-title">Desnivel: {{$race->unevenness}}</p>
        <p class="card-title">Nº ciclistas: {{$race->number_of_competitors}}</p>
        <p class="card-title">Fecha celebración: {{date('d/m/Y' ,strtotime($race->start_date))}}</p>
        <p class="card-title">Hora inicio: {{$race->start_time}}</p>
        <p class="card-title">hora llegada: {{$race->start_point}}</p>
      </div>
  </div>
</section>

@endsection