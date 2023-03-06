@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Seguros de la carrera '.$race->name) }}</div>

                <div class="card-body">
                    <form method="POST"  action=" {{ route('race.storeinsurances', $race) }}">
                        @csrf @method('PATCH')

                        <div style="text-align:center;" class="form group mb-3">
                            <label for="insurances" class="col-form-label text-center">{{ __('Seleciona los seguros disponibles') }}</label>
                            <select multiple name="insurances[]" class="form-control">
                                @foreach($insurances as $insurance)
                                    <option value="{{ $insurance->id }}" {{ (in_array($insurance->id, $selected)) ? 'selected' : '' }}>{{ $insurance->name." - ".$insurance->price_per_race." €"}}</option>
                                @endforeach
                            </select>

                            @error('insurances')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            
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