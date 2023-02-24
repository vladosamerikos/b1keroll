@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h2>Patrocinadores</h2>
        <div class="mb-3 d-flex justify-content-end">
            <a class="btn btn-dark btn-block" href="{{ route('sponsor.create') }}">Crear patrocinador</a>
        </div>
        <table class="table">
            <thead>
                <tr>
                  <th scope="col">CIF</th>
                  <th scope="col">Logo</th>
                  <th scope="col">Nombre</th>
                  <th scope="col">Direccion</th>
                  <th scope="col">Plano principal</th>
                  <th scope="col">Patrocionar</th>
                  <th scope="col">Facturar</th>
                  <th scope="col">Editar</th>
                  <th scope="col">Estado</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($sponsors as $sponsor)
                    <tr class="align-middle">
                        <th>{{$sponsor->cif}}</th>
                        <th><img class="rounded" width="100" src="{{ asset('storage/' .$sponsor->logo) }}" /></th>
                        <td>{{$sponsor->name}}</td>
                        <td>{{$sponsor->address}}</td>
                        <td><?php if($sponsor->main_plain == 1){
                            echo"Si";
                        }else{
                           echo"No";
                        }?></td>
                        <td><a href="{{route('sponsor.sponsoring', $sponsor)}}"><img width="40" height="40" src="{{ asset('img/money.svg') }}" alt="" srcset=""></a></td>
                        <td><a href="{{route('sponsor.generateinvoice', $sponsor)}}"><img width="40" height="40" src="{{ asset('img/invoice.svg') }}" alt="" srcset=""></a></td>
                        <td><a href="{{route('sponsor.edit', $sponsor)}}"><img width="40" height="40" src="{{ asset('img/edit.svg') }}" alt="" srcset=""></a></td>
                        <td><?php if($sponsor->active == 1){?>
                          <a href="{{route('sponsor.storestatus', $sponsor)}}"><img width="40" height="40" src="{{ asset('img/on.svg') }}" alt="" srcset=""></a>
                        <?php }
                        else{?>
                          <a href="{{route('sponsor.storestatus', $sponsor)}}"><img width="40" height="40" src="{{ asset('img/off.svg') }}" alt="" srcset=""></a>
                        <?php } ?>
                        </td>
                    </tr>
                @endforeach
              </tbody>
        </table>
        

    </div>
</div>
@endsection