@extends('layouts.app')

@push('styles')
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endpush

@section('content')


<section class="py-5">
  <div class="container px-4 px-lg-5 my-5">
      <div class="row gx-4 gx-lg-5 align-items-center">
          <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="{{ asset('storage/' .$race->promotional_poster) }}" alt="..."></div>
          <div class="col-md-6">
              <h1 class="display-5 fw-bolder">{{$race->name}}</h1>
              <div>
                  <span><img class='table-icon' src="{{ asset('img/insurance.svg') }}" alt="" srcset="" width="30" height="30">  {{$race->price}} €</span>
                  <br>
                  <span><img class='table-icon' src="{{ asset('img/distance.svg') }}" alt="" srcset="" width="30" height="30">  {{$race->length}} KMs</span>
              </div>
              <p>{{$race->description}}</p>
              <a href="{{ route('race.register', $race) }}" class="btn btn-primary">Apuntarse</a>
          </div>
      </div>
      <br>
      <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
          <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Información</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Altimetría - Mapa</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact-tab-pane" type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false">Resultados</button>
        </li>
      </ul>
      <div class="tab-content pb-5" id="myTabContent">
        <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0"><div class="fs-5 mb-5">
          <p class="card-title mt-4">Desnivel: {{$race->unevenness}} metros</p>
          <p class="card-title mt-1">Nº ciclistas: {{$race->number_of_competitors}}</p>
          <p class="card-title mt-1">Fecha celebración: {{date('d/m/Y' ,strtotime($race->start_date))}}</p>
          <p class="card-title mt-1">Hora inicio: {{$race->start_time}}</p>
          <p class="card-title mt-1">Punto de salida: {{$race->start_point}}</p>
        </div>
      </div>
        <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
          <iframe src="{{$race->map_frame}}" style="border:0;" allowfullscreen="" loading="lazy" class=" mt-5 map-frame" referrerpolicy="no-referrer-when-downgrade"></iframe>
          <p class="card-title mt-1">{{$race->unevenness}}</p>
        </div>
        <div class="tab-pane fade " id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
          
        </div>

        <p class="pt-5 mt-5 fw-bolder display-5 text-center">PATROCINADORES</p>
    <div class="div-sponsors">
        <div title="Click to flip" class="sponsor">
            <div class="sponsorFlip">
                <img alt="More about bimbo" src="{{ asset('img/bimbo.png') }}" class="photo">
            </div>

            <div class="sponsorData">
                <div class="sponsorDescription">
                    The company that redefined web search.
                </div>
                <div class="sponsorURL">
                    <a href="http://www.bimbo.com/">http://www.bimbo.com/ </a>
                </div>
            </div>
        </div>

        <div title="Click to flip" class="sponsor">
            <div class="sponsorFlip ">
                <img alt="More about bergamont" src="{{ asset('img/bergamont.png') }}" class="photo">
            </div>

            <div class="sponsorData">
                <div class="sponsorDescription">
                    The company that redefined web search.
                </div>
                <div class="sponsorURL">
                    <a href="http://www.bergamont.com/">http://www.bergamont.com/ </a>
                </div>
            </div>
        </div>

        <div title="Click to flip" class="sponsor">
            <div class="sponsorFlip ">
                <img alt="More about Mini" src="{{ asset('img/hyundai.svg') }}" class="photo">
            </div>

            <div class="sponsorData">
                <div class="sponsorDescription">
                    The company that redefined web search.
                </div>
                <div class="sponsorURL">
                    <a href="http://www.hyundai.es/">http://www.hyundai.es/ </a>
                </div>
            </div>
        </div>
        <div title="Click to flip" class="sponsor">
            <div class="sponsorFlip ">
                <img alt="More about bridgestone" src="{{ asset('img/bridgestone.png') }}" class="photo">
            </div>

            <div class="sponsorData">
                <div class="sponsorDescription">
                    The company that redefined web search.
                </div>
                <div class="sponsorURL">
                    <a href="http://www.bridgestone.com/">http://www.bridgestone.com/ </a>
                </div>
            </div>
        </div>
        <div title="Click to flip" class="sponsor">
            <div class="sponsorFlip ">
                <img alt="More about decathlon" src="{{ asset('img/decathlon.svg') }}" class="photo">
            </div>

            <div class="sponsorData">
                <div class="sponsorDescription">
                    The company that redefined web search.
                </div>
                <div class="sponsorURL">
                    <a href="http://www.decathlon.com/">http://www.decathlon.com/ </a>
                </div>
            </div>
        </div>
        <div title="Click to flip" class="sponsor">
            <div class="sponsorFlip ">
                <img alt="More about citroen" src="{{ asset('img/citroen.png') }}" class="photo">
            </div>

            <div class="sponsorData">
                <div class="sponsorDescription">
                    The company that redefined web search.
                </div>
                <div class="sponsorURL">
                    <a href="http://www.citroen.com/">http://www.citroen.com/ </a>
                </div>
            </div>
        </div>
    </div>
    </div>
  </div>
</section>

@endsection