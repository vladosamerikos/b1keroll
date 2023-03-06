@extends('layouts.app')



@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Patrocionar carreras') }}</div>

                <div class="card-body">
                    <form method="POST"  action=" {{ route('sponsor.storesponsoring', $sponsor) }}">
                        @csrf @method('PATCH')

                        <div>
                            <div class="mb-3 d-flex justify-content-center">
                                <img src="{{ asset('storage/' .$sponsor['logo']) }}"
                                alt="old logo" style="width: 300px;" />
                            </div>
                        </div>

                        <div style="text-align:center;" class="form group mb-3">
                            <label for="races" class="col-form-label text-center">{{ __('Seleciona las carreras a las que quieres patrocionar') }}</label>
                            <select multiple name="races[]" class="form-control">

                                @foreach($races as $race)
                                    <option value="{{ $race->id }}" {{ (in_array($race->id, $selected)) ? 'selected' : '' }}>{{ $race->name." - ".$race->price." €"}}</option>
                                @endforeach
                            </select>

                            @error('races')
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