@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h2>Seguros</h2>
        <table class="table">
            <thead>
                <tr>
                  <th scope="col">CIF</th>
                  <th scope="col">Nombre</th>
                  <th scope="col">Direccion</th>
                  <th scope="col">Precio</th>
                  <th scope="col">Editar</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($insurances as $insurance)
                    <tr>
                        <th>{{$insurance->cif}}</th>
                        <td>{{$insurance->name}}</td>
                        <td>{{$insurance->address}}</td>
                        <td>{{$insurance->price_per_race}}</td>
                        <td><a href="{{route('insurance.edit',['id' => $insurance->id])}}"><input type=button name='button' value='Editar'></a></td>
                    </tr>
                @endforeach
              </tbody>
        </table>
        

    </div>
</div>
@endsection