@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Crear sponsor') }}</div>

                <div class="card-body">
                    <form method="POST" enctype="multipart/form-data" action="{{ route('sponsor.store') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Nombre') }}</label>

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
                            <label class="form-label" for="inputImage">Selecciona Imagen:</label>
                            <input 
                                type="file" 
                                name="image" 
                                id="inputImage"
                                class="form-control @error('image') is-invalid @enderror">
              
                            @error('image')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="row mb-3">
                            <label for="address" class="col-md-4 col-form-label text-md-end">{{ __('Dirección') }}</label>

                            <div class="col-md-6">
                                <textarea id="address"  class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address" autofocus></textarea>

                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="cif" class="col-md-4 col-form-label text-md-end">{{ __('CIF') }}</label>

                            <div class="col-md-6">
                                <input id="cif" type="text" class="form-control @error('cif') is-invalid @enderror" name="cif" value="{{ old('cif') }}" required autocomplete="cif" autofocus>

                                @error('cif')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="main_plain" class="col-md-4 col-form-label text-md-end">{{ __('Plano Principal?') }}</label>

                            <div class="col-md-6">
                                <select name="main_plain" class="form-select">
                                    <option value="1">Sí</option>
                                    <option value="0">No</option>
                                </select>

                                @error('main_plain')
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