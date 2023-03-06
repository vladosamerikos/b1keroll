@extends('layouts.app')

@section('content')



    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Formulario de inscripcion a la carrera '.$race->name) }}</div>
    
                    <div class="card-body">
                        <form method="POST" action="{{route('race.storeregister', $race)}}">
                            @csrf
    
                            <div style="text-align:center;" class="form group mb-3">
                                <label for="insurances" class="col-form-label text-center">{{ __('Seleciona uno de los seguros disponibles') }}</label>
                                <select name="insurance" class="form-control">
                                    @foreach($insurances as $insurance)
                                        <option value="{{ $insurance->id }}">{{ $insurance->name." - ".$insurance->price_per_race." €"}}</option>
                                    @endforeach
                                </select>
    
                                @error('insurances')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror                            
                            </div>
    
                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Siguiente') }}
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