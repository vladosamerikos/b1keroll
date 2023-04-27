@extends('layouts.app')

@section('content')



    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card text-center">
                    <div class="card-header">{{ __('Seguro para '.$race->name) }}</div>
    
                    <div class="card-body">
                        {{-- <form method="POST" action="{{route('race.prepayment', [$race, $user])}}"> --}}
                        <form method="POST" action="{{route('payment')}}">

                            @csrf
                            <input type="hidden" name="amount" value="200">
                            <div style="text-align:center;" class="form group mb-3">
                                <label for="insurances" class="col-form-label text-center">{{ __('Seleciona uno de los seguros disponibles') }}</label>
                                <select name="insurance_id" class="form-control">
                                    @foreach($insurances as $insurance)
                                        <option value="{{ $insurance->id }}">{{ $insurance->name." - ".$insurance->price_per_race." €"}}</option>
                                    @endforeach
                                </select>
                                <input type="hidden" name="user_id" value="{{ $user->id }}">
                                <input type="hidden" name="race_id" value="{{ $race->id }}">
                                @error('insurances')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror                            
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