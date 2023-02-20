@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h2>Patrocinadores</h2>
        <a href="{{ route('sponsor.create') }}">Crear patrocinador</a>
        <table class="table">
            <thead>
                <tr>
                  <th scope="col">CIF</th>
                  <th scope="col">Logo</th>
                  <th scope="col">Nombre</th>
                  <th scope="col">Direccion</th>
                  <th scope="col">Plano principal</th>
                  <th scope="col">Editar</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($sponsors as $sponsor)
                    <tr>
                        <th>{{$sponsor->cif}}</th>
                        <th><img class="rounded" width="100" src="{{ asset('storage/' .$sponsor->logo) }}" /></th>
                        <td>{{$sponsor->name}}</td>
                        <td>{{$sponsor->address}}</td>
                        <td><?php if($sponsor->main_plain == 1){
                            echo"Si";
                        }else{
                           echo"No";
                        }?></td>
                        <td><a href="{{route('sponsor.edit', $sponsor)}}"><img width="40" height="40" src="{{ asset('img/edit.svg') }}" alt="" srcset=""></a></td>
                    </tr>
                @endforeach
              </tbody>
        </table>
        

    </div>
</div>
@endsection