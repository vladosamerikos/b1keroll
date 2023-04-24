@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Editar carrera') }}</div>

                <div class="card-body">
                    <form method="POST" enctype="multipart/form-data" action="{{ route('race.storeedit', $race) }}">
                        @csrf @method('PATCH')

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Nombre') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $race['name']) }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="description" class="col-md-4 col-form-label text-md-end">{{ __('Descripción') }}</label>

                            <div class="col-md-6">
                                <textarea id="description"  class="form-control @error('description') is-invalid @enderror" name="description" required autocomplete="description" autofocus>{{$race['description']}}</textarea>

                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div>
                            <div class="mb-3 d-flex justify-content-center">
                                <img src="{{ asset('storage/' .$race['promotional_poster']) }}"
                                alt="old poster" style="width: 300px;" />
                            </div>
                            <div class="d-flex justify-content-center">
                                <div class="btn btn-primary btn-rounded">
                                    <label class="form-label text-white m-1" for="promotional_poster">Cambiar Poster</label>
                                    <input 
                                        type="file" 
                                        name="promotional_poster" 
                                        id="promotional_poster"
                                        class=" d-none form-control @error('image') is-invalid @enderror">
              
                            @error('image')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3 mt-3">
                            <label for="map_frame" class="col-md-4 col-form-label text-md-end">{{ __('Frame del Mapa') }}</label>

                            <div class="col-md-6">
                                <input id="map_frame" type="text" class="form-control @error('map_frame') is-invalid @enderror" name="map_frame" value="{{ old('map_frame', $race['map_frame']) }}" required autocomplete="map_frame" autofocus>

                                @error('map_frame')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <div class="mb-3 d-flex justify-content-center">
                                <img src="{{ asset('storage/image/' .$race->unevenness) }}"
                                alt="old unevenness" style="width: 300px;" />
                            </div>
                            <div class="d-flex justify-content-center">
                                <div class="btn btn-primary btn-rounded">
                                    <label class="form-label text-white m-1" for="unevenness">Cambiar unevenness</label>
                                    <input 
                                        type="file" 
                                        name="unevenness" 
                                        id="unevenness"
                                        class=" d-none form-control @error('image') is-invalid @enderror">
              
                            @error('image')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3 mt-3">
                            <label for="number_of_competitors" class="col-md-4 col-form-label text-md-end">{{ __('Número de participantes') }}</label>

                            <div class="col-md-6">
                                <input id="number_of_competitors" type="number" class="form-control @error('number_of_competitors') is-invalid @enderror" name="number_of_competitors" value="{{ old('number_of_competitors', $race['number_of_competitors']) }}" required autocomplete="number_of_competitors" autofocus>

                                @error('number_of_competitors')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <label for="length" class="col-md-4 col-form-label text-md-end">{{ __('Longitud') }}</label>

                            <div class="col-md-6">
                                <input id="length" type="number" step="0.01" class="form-control @error('length') is-invalid @enderror" name="length" value="{{ old('length', $race['length']) }}" required autocomplete="length" autofocus>

                                @error('length')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="start_date" class="col-md-4 col-form-label text-md-end">{{ __('Fecha') }}</label>

                            <div class="col-md-6">
                                <input id="start_date" type="date"  class="form-control @error('start_date') is-invalid @enderror" name="start_date" value="{{ old('start_date', $race['start_date']) }}" required autocomplete="start_date" autofocus>

                                @error('start_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="start_time" class="col-md-4 col-form-label text-md-end">{{ __('Hora') }}</label>

                            <div class="col-md-6">
                                <input id="start_time" type="time" class="form-control @error('start_time') is-invalid @enderror" name="start_time" value="{{ old('start_time', $race['start_time']) }}" required autocomplete="start_time" autofocus>

                                @error('start_time')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="start_point" class="col-md-4 col-form-label text-md-end">{{ __('Punto de salida') }}</label>

                            <div class="col-md-6">
                                <input id="start_point" type="text" class="form-control @error('start_point') is-invalid @enderror" name="start_point" value="{{ old('start_point', $race['start_point']) }}" required autocomplete="start_point" autofocus>

                                @error('start_point')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="sponsor_price" class="col-md-4 col-form-label text-md-end">{{ __('Precio de patrocionamiento') }}</label>

                            <div class="col-md-6">
                                <input id="sponsor_price" type="number" step="0.01" class="form-control @error('sponsor_price') is-invalid @enderror" name="sponsor_price" value="{{ old('sponsor_price', $race['sponsor_price']) }}" required autocomplete="sponsor_price" autofocus>

                                @error('sponsor_price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="price" class="col-md-4 col-form-label text-md-end">{{ __('Precio') }}</label>

                            <div class="col-md-6">
                                <input id="price" type="number" step="0.01" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price', $race['price']) }}" required autocomplete="price" autofocus>

                                @error('price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0 ">
                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Guardar') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection