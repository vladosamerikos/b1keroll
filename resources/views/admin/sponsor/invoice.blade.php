@extends('layouts.app')
@push('styles')
    <link href="{{ asset('css/pdf.css') }}" rel="stylesheet">
@endpush
@section('content')
<div class="container">
  <div class="row gutters">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
      <div class="card">
        <div class="card-body p-0">
          <div class="invoice-container">
            <div class="invoice-header">
  
              <!-- Row start -->
              <div class="row gutters">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                  <div class="custom-actions-btns mb-5">
                    <a href="{{route('sponsor.generateinvoicepdf', $sponsor)}}" class="btn btn-primary">
                      <i class="icon-download"></i> Descargar
                    </a>
                  </div>
                </div>
              </div>
              <!-- Row end -->
  
              <!-- Row start -->
              <div class="row gutters">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                    <img width='100' heigth='50' class="invoice-logo" src="{{ asset('storage/' .$sponsor['logo']) }}" alt="" srcset="">

                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                  <address class="text-right">
                    Bikeroll , 45 NorthWest Street.<br>
                    Badalona, Barcelona.<br>
                    00000 00000
                  </address>
                </div>
              </div>
              <!-- Row end -->
  
              <!-- Row start -->
              <div class="row gutters">
                <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
                  <div class="invoice-details">
                    <address>
                      {{$sponsor->name}}<br>
                      {{$sponsor->address}}
                    </address>
                  </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
                  <div class="invoice-details">
                    <div class="invoice-num">
                      <div>{{date('d/m/Y' ,strtotime( date('Y-m-d')))}}</div>
                    </div>
                  </div>													
                </div>
              </div>
              <!-- Row end -->
  
            </div>
  
            <div class="invoice-body">
  
              <!-- Row start -->
              <div class="row gutters">
                <div class="col-lg-12 col-md-12 col-sm-12">
                  <div class="table-responsive">
                    <table class="table custom-table m-0">
                      <thead>
                        <tr>
                          <th >Articulos</th>
                          <th></th>
                          <th >Precio</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($races as $race)
                        <tr>
                          <td >
                            Patrocionamiento de {{$race->name}}
                          </td>
                          <td></td>
                          <td >{{$race->price}} €</td>
                        </tr>
                        @endforeach
                        
                        @if ($sponsor['main_plain']==1)
                          <tr>
                            <td >
                              Logo en el plano principal 
                            </td>
                            <td></td>
                            <td >200 €</td>
                          </tr>
                        @endif

                        <tr>
                          <td>&nbsp;</td>
                          <td >
                            <p>
                              Sub total<br>
                              IVA<br>
                            </p>
                            <h5 class="text-success"><strong>Total</strong></h5>
                          </td>			
                          <td>
                            <p>
                              {{$subtotal}} €<br>
                              21 %<br>
                            </p>
                            <h5 class="text-success"><strong>{{$total}} €</strong></h5>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <!-- Row end -->
  
            </div>
  
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection