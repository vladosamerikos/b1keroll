@extends('layouts.app')

@push('styles')
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('../css/style.css') }}">

@endpush

@push('scripts')
    <script type="text/javascript" src="{{ asset('js/script.js') }}"></script>
@endpush

@section('content')
<section>
    <div class="container">
    <h2>Carreras</h2>
        <div class="flex justify-center grid-carreras">
                    @foreach($races as $race)
                    <div class="card tarjeta-color" style="text-align: center; width: 18rem; border: 1px solid black; margin: 10px 10px; height: 400px; margin-bottom: 5%; margin-top: 5%;" >
                        <div style="margin: auto; ">
                            <img src="{{ asset('storage/' .$race->promotional_poster) }}" class="imagen-tarjeta" alt="...">
                            <div class="body-tarjeta ">
                                <h5 class="card-title">{{$race->name}}</h5>
                                <p class="card-text">{{$race->description}}</p>
                                <p class="boton-detalle"><a href="{{ route('race.details', $race) }}" class="btn-primary btn ">Ver detalles</a></p>
                            </div>
                        </div>
                    </div>
                @endforeach 
        </div>
    </div>
</section>

@endsection