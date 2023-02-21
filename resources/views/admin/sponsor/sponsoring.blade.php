@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Patrocionar carreras') }}</div>

                <div class="card-body">
                    <form method="POST"  action="">
                        @csrf @method('PATCH')

                        <div>
                            <div class="mb-3 d-flex justify-content-center">
                                <img src="{{ asset('storage/' .$sponsor['logo']) }}"
                                alt="old logo" style="width: 300px;" />
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="races" class="col-md-4 col-form-label text-md-end">{{ __('Seleciona las carreras a las que quieres patrocionar') }}</label>

                            <div class="col-md-6">
                                <select name="races" class="form-select" multiple>
                                    @foreach ($races as $race)
                                        <option value="{{$race['id'] }}">{{$race['name']}}</option>
                                    @endforeach
                                </select>

                                @error('races')
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