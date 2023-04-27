@extends('layouts.app')

@section('content')



    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mt-5 mb-5 text-center">
                    <div class="card-header">
                        Estas federado ? 
                      </div>
                    <div class="card-body ">
                        <form method="POST" action="{{route('race.checkemail', $race)}}">
                            @csrf
    
                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email') }}</label>
    
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
    
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Siguiente') }}
                                    </button>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection