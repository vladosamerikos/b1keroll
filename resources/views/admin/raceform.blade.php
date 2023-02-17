@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Crear cursa') }}</div>

                <div class="card-body">
                    <form method="POST" enctype="multipart/form-data" action="{{ route('race.store') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="description" class="col-md-4 col-form-label text-md-end">{{ __('description') }}</label>

                            <div class="col-md-6">
                                <textarea id="description"  class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" required autocomplete="description" autofocus></textarea>

                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <label class="form-label" for="promotional_poster">Poster promocional:</label>
                            <input 
                                type="file" 
                                name="promotional_poster" 
                                id="promotional_poster"
                                class="form-control @error('image') is-invalid @enderror">
              
                            @error('image')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="row mb-3">
                            <label for="map_frame" class="col-md-4 col-form-label text-md-end">{{ __('Enllace al frame') }}</label>

                            <div class="col-md-6">
                                <input id="map_frame" type="text" class="form-control @error('map_frame') is-invalid @enderror" name="map_frame" value="{{ old('map_frame') }}" required autocomplete="map_frame" autofocus>

                                @error('map_frame')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="unevenness" class="col-md-4 col-form-label text-md-end">{{ __('unevenness') }}</label>

                            <div class="col-md-6">
                                <input id="unevenness" type="text" class="form-control @error('unevenness') is-invalid @enderror" name="unevenness" value="{{ old('unevenness') }}" required autocomplete="unevenness" autofocus>

                                @error('unevenness')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="number_of_competitors" class="col-md-4 col-form-label text-md-end">{{ __('number_of_competitors') }}</label>

                            <div class="col-md-6">
                                <input id="number_of_competitors" type="number" class="form-control @error('number_of_competitors') is-invalid @enderror" name="number_of_competitors" value="{{ old('number_of_competitors') }}" required autocomplete="number_of_competitors" autofocus>

                                @error('number_of_competitors')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <label for="length" class="col-md-4 col-form-label text-md-end">{{ __('length') }}</label>

                            <div class="col-md-6">
                                <input id="length" type="number" step="0.01" class="form-control @error('length') is-invalid @enderror" name="length" value="{{ old('length') }}" required autocomplete="length" autofocus>

                                @error('length')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="start_date" class="col-md-4 col-form-label text-md-end">{{ __('start_date') }}</label>

                            <div class="col-md-6">
                                <input id="start_date" type="date"  class="form-control @error('start_date') is-invalid @enderror" name="start_date" value="{{ old('start_date') }}" required autocomplete="start_date" autofocus>

                                @error('start_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="start_time" class="col-md-4 col-form-label text-md-end">{{ __('start_time') }}</label>

                            <div class="col-md-6">
                                <input id="start_time" type="number" step="0.01" class="form-control @error('start_time') is-invalid @enderror" name="start_time" value="{{ old('start_time') }}" required autocomplete="start_time" autofocus>

                                @error('start_time')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="start_point" class="col-md-4 col-form-label text-md-end">{{ __('start_point') }}</label>

                            <div class="col-md-6">
                                <input id="start_point" type="text" class="form-control @error('start_point') is-invalid @enderror" name="start_point" value="{{ old('start_point') }}" required autocomplete="start_point" autofocus>

                                @error('start_point')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="price" class="col-md-4 col-form-label text-md-end">{{ __('price') }}</label>

                            <div class="col-md-6">
                                <input id="price" type="number" step="0.01" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price') }}" required autocomplete="price" autofocus>

                                @error('price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Crear') }}
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