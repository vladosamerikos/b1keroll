@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edicion de Patrocinador') }}</div>

                <div class="card-body">
                    <form method="POST" enctype="multipart/form-data" action="{{ route('sponsor.storeedit', $sponsor) }}">
                        @csrf @method('PATCH')

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Nombre') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $sponsor['name']) }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <div class="mb-3 d-flex justify-content-center">
                                <img src="{{ asset('storage/' .$sponsor['logo']) }}"
                                alt="old logo" style="width: 300px;" />
                            </div>
                            <div class="d-flex justify-content-center">
                                <div class="btn btn-primary btn-rounded">
                                    <label class="form-label text-white m-1" for="inputImage">Cambiar Imagen</label>
                                    <input 
                                type="file" 
                                name="image" 
                                id="inputImage"
                                class="form-control d-none @error('image') is-invalid @enderror">
              
                            @error('image')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                                </div>
                            </div>
                        </div>


                        <div class="row mb-3 mt-3">
                            <label for="address" class="col-md-4 col-form-label text-md-end">{{ __('Dirección') }}</label>

                            <div class="col-md-6">
                                <textarea id="address"  class="form-control @error('address') is-invalid @enderror" name="address" required autocomplete="address" autofocus>{{ old('address' , $sponsor['address']) }}</textarea>

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
                                <input readonly id="cif" type="text" class="form-control @error('cif') is-invalid @enderror" name="cif" value="{{ old('cif', $sponsor['cif']) }}" required autocomplete="cif" autofocus>

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
                                    @if ($sponsor['main_plain']==1)
                                        <option selected value="1">Sí</option>
                                        <option value="0">No</option>
                                    @else
                                        <option value="1">Sí</option>
                                        <option selected  value="0">No</option>
                                    @endif
                                </select>

                                @error('main_plain')
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