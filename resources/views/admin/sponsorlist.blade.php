@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h2>Sponsores</h2>
        <table class="table">
            <thead>
                <tr>
                  <th scope="col">CIF</th>
                  <th scope="col">Nombre</th>
                  <th scope="col">Direccion</th>
                  <th scope="col">Plano principal</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($sponsors as $sponsor)
                    <tr>
                        <th>{{$sponsor->cif}}</th>
                        <td>{{$sponsor->name}}</td>
                        <td>{{$sponsor->address}}</td>
                        <td><?php if($sponsor->main_plain == 1){
                            echo"Si";
                        }else{
                           echo"No";
                        }?></td>
                    </tr>
                @endforeach
              </tbody>
        </table>
        

    </div>
</div>
@endsection