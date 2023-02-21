@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h2>Seguros</h2>
        <div class="mb-3 d-flex justify-content-end">
          <a class="btn btn-dark btn-block" href="{{ route('insurance.create') }}">Crear seguro</a>
        </div>
        <table class="table">
            <thead>
                <tr>
                  <th scope="col">CIF</th>
                  <th scope="col">Nombre</th>
                  <th scope="col">Direccion</th>
                  <th scope="col">Precio</th>
                  <th scope="col">Editar</th>
                  <th scope="col">Estado</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($insurances as $insurance)
                    <tr class="align-middle">
                        <th>{{$insurance->cif}}</th>
                        <td>{{$insurance->name}}</td>
                        <td>{{$insurance->address}}</td>
                        <td>{{$insurance->price_per_race}} €</td>
                        <td><a href="{{route('insurance.edit', $insurance)}}"><img width="40" height="40" src="{{ asset('img/edit.svg') }}" alt="" srcset=""></a></td>
                        <td><?php if($insurance->active == 1){?>
                          <a href="{{route('insurance.storestatus', $insurance)}}"><img width="40" height="40" src="{{ asset('img/on.svg') }}" alt="" srcset=""></a>
                        <?php }
                        else{?>
                          <a href="{{route('insurance.storestatus', $insurance)}}"><img width="40" height="40" src="{{ asset('img/off.svg') }}" alt="" srcset=""></a>
                        <?php } ?>
                        </td>
                    </tr>
                @endforeach
              </tbody>
        </table>
        

    </div>
</div>
@endsection