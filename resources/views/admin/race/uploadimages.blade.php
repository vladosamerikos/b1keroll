@extends('layouts.app')
@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/min/dropzone.min.js"></script>
    <script type="text/javascript" src="{{ asset('js/script.js') }}"></script>
@endpush
@push('styles')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/dropzone.min.css" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
@endpush


@section('content')

<div class="container text-center my-3">
    @if (count($photos)>0)
        <h2 class="font-weight-light">Fotos actuales</h2>
        <div class="row mx-auto my-auto justify-content-center">
            <div id="recipeCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner" role="listbox">
                    
                    @foreach ($photos as $photo)
                        @if ($loop->index==0)
                            <div class="carousel-item active">
                                <div class="col-md-3">
                                    <div class="card">
                                        <div class="card-img">
                                            <img src="{{asset('storage/image/'.$photo->photo)}}" class="img-fluid">
                                        </div>
                                        <div style="text-align: left;" class="card-img-overlay"><a href="{{route('race.delImage', [$race, $photo->id])}}"><img width="20" height="20" src="{{asset('img/delete.svg')}}"></a></div>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="carousel-item">
                                <div class="col-md-3">
                                    <div class="card">
                                        <div class="card-img">
                                            <img src="{{asset('storage/image/'.$photo->photo)}}" class="img-fluid">
                                        </div>
                                        <div style="text-align: left;" class="card-img-overlay"><a href="{{route('race.delImage', [$race, $photo->id])}}"><img width="20" height="20" src="{{asset('img/delete.svg')}}"></a></div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach

                </div>
                <a class="carousel-control-prev bg-transparent w-aut" href="#recipeCarousel" role="button" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                </a>
                <a class="carousel-control-next bg-transparent w-aut" href="#recipeCarousel" role="button" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                </a>
            </div>
        </div>
    @else
        <h2 class="font-weight-light">De momento no hay fotos subidas</h2>    
    @endif
</div>


<div id="dropzone">
    <form action="{{route('race.storeimages', $race)}}" class="dropzone" id="file-upload" enctype="multipart/form-data">
        @csrf
        <div class="dz-message">
            Arrastre y suelte imágenes individuales/múltiples aquí<br>
        </div>
    </form>
</div>
<script>
    let items = document.querySelectorAll('.carousel .carousel-item')
    items.forEach((el) => {
        const minPerSlide = 4
        let next = el.nextElementSibling
        for (var i=1; i<minPerSlide; i++) {
            if (!next) {
                // wrap carousel by using first child
                next = items[0]
            }
            let cloneChild = next.cloneNode(true)
            el.appendChild(cloneChild.children[0])
            next = next.nextElementSibling
        }
    })
</script>
@endsection