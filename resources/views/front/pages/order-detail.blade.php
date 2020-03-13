
@extends('front.layouts.inchalam')
@section('customMdbStyle')
{{-- Material Design Bootstrap --}}
<link href="{{ asset('css/mdb.min.css') }}" rel="stylesheet">
@endsection
@section('head')
@include('front.includes.head')
@endsection
@section('navbar')
@include('front.includes.navbar')
@endsection
@section('content')
<div class="container">
  <ul class="breadcrumb">
        <li><a href="https://pagocoopeuch.lealtad360.com/index.php?route=common/home"><i class="fa fa-home"></i></a></li>
        <li><a href="https://pagocoopeuch.lealtad360.com/index.php?route=account/account">Cuenta</a></li>
        <li><a href="https://pagocoopeuch.lealtad360.com/index.php?route=account/order">Historial de Ordenes</a></li>
        <li><a href="https://pagocoopeuch.lealtad360.com/index.php?route=account/order/info&amp;order_id=707">Información de Ordenes</a></li>
      </ul>
      <div class="row">                <div id="content" class="col-sm-12">      <h2 class="section-title punto fixtitle">Información de Ordenes</h2>
      
      <a href="/perfil/" class="btn btn-primary boton-atras waves-effect waves-light">
            Volver      </a>

      <table class="table table-bordered table-hover">
        <thead>
          <tr>
            <td class="text-left" colspan="2">Detalle de la Orden</td>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="text-left" style="width: 50%;">              <b>ID de Orden:</b> #{{ $order['order_id'] }}<br>
            <?php
                $fecha_orden = new DateTime( $order['date_added'] );
                $cadena_fecha_orden = $fecha_orden->format("d/m/Y");
            ?>
              <b>Fecha registrada:</b> {{ $cadena_fecha_orden }}</td>
            <td class="text-left" style="width: 50%;">                
                          </td> 
             </tr>
                          
                <tr>
                  <td colspan="2" style="text-align: center;">
                  <div class="container-fluid" style="max-width: 600px;">
                  <div class="row text-center pt-4">
              <div class="col-sm-2">
                <img class="img-fluid mb-3 bw" src="{{ asset('images/order-detail/tracking1.png') }}">
                <h6 class="font-weight-bold grey-text">En origen</h6>
              </div>
              <div class="col-sm-2">
                <img class="img-fluid mb-3 bw" src="{{ asset('images/order-detail/tracking2.png') }}">
                <h6 class="font-weight-bold grey-text">Despachado</h6>
              </div>
              <div class="col-sm-2">
                <img class="img-fluid mb-3 bw" src="{{ asset('images/order-detail/tracking3.png') }}">
                <h6 class="font-weight-bold grey-text">En tránsito</h6>
              </div>
              <div class="col-sm-2">
                <img class="img-fluid mb-3 bw" src="{{ asset('images/order-detail/tracking4.png') }}">
                <h6 class="font-weight-bold grey-text">En destino</h6>
              </div>
              <div class="col-sm-2">
                <img class="img-fluid mb-3 bw" src="{{ asset('images/order-detail/tracking5.png') }}">
                <h6 class="font-weight-bold grey-text">En reparto</h6>
              </div>
              <div class="col-sm-2">
                <img class="img-fluid mb-3 bw" src="{{ asset('images/order-detail/tracking6.png') }}">
                <h6 class="font-weight-bold grey-text">Entregado</h6>
              </div>                                          
            </div>
          </div>
                         <br>
                         <b>Código tracking:</b>  <font>(Pendiente)</font>
                                                       
                          </td>
                </tr>
                         
      

        </tbody>
      </table>
      <table class="table table-bordered table-hover">
        <thead>
          <tr>
            <td class="text-left" style="width: 50%; vertical-align: top;">Dirección de Pago</td>
                        <td class="text-left" style="width: 50%; vertical-align: top;">Dirección de Envío</td>
                      </tr>
        </thead>
        <tbody>
          <tr>
            <td class="text-left"></td>
                        <td class="text-left">JORGE EDGARDO MORALES GALDAMES<br>dddd<br>LAS CONDES<br>Region Metropolitana<br>Chile</td>
                      </tr>
        </tbody>
      </table>
      <div class="table-responsive">
        <table class="table table-bordered table-hover">
          <thead>
            <tr>
              <td class="text-left">Nombre del Producto</td>
              <td class="text-left">Modelo</td>
              <td class="text-right">Cantidad</td>
              <td class="text-right">Precio</td>
              <td class="text-right">Total</td>
              
            </tr>
          </thead>
          <tbody>
                        <tr>
              <td class="text-left">Perfume Dolce &amp; Gabbana Light Blue Edt 100ml Mujer                </td>
              <td class="text-left">3042</td>
              <td class="text-right">1</td>
              <td class="text-right">Precio: 51.100Puntos/Pesos</td>
              <td class="text-right">Precio: 51.100Puntos/Pesos</td>
       
            </tr>
                                  </tbody>
          <tfoot>
                        <tr>
              <td colspan="3"></td>
              <td class="text-right"><b>Sub-Total</b></td>
              <td class="text-right">Precio: 51.100Puntos/Pesos</td>
           
            </tr>
                        <tr>
              <td colspan="3"></td>
              <td class="text-right"><b>Puntos (45500)</b></td>
              <td class="text-right">Precio: -45.500Puntos/Pesos</td>
           
            </tr>
                        <tr>
              <td colspan="3"></td>
              <td class="text-right"><b>Metodo pago COOPEUCH</b></td>
              <td class="text-right">Precio: -5.600Puntos/Pesos</td>
           
            </tr>
                        <tr>
              <td colspan="3"></td>
              <td class="text-right"><b>Total</b></td>
              <td class="text-right">Precio: 0Puntos/Pesos</td>
           
            </tr>
                      </tfoot>
        </table>
      </div>
                  <h3 style="font-size: 14px;margin-bottom: 23px !important;" class="section-title punto fixtitle">Historial de Orden</h3>
	   <div class="table-responsive">	  
      <table class="table table-bordered table-hover">
        <thead>
          <tr>
            <td class="text-left">Fecha registrada</td>
            <td class="text-left">Estado</td>
            <td class="text-left">Comentario</td>
          </tr>
        </thead>
        <tbody>
                              <tr>
            <td class="text-left">12/03/2020</td>
            <td class="text-left">Procesando Pago</td>
            <td class="text-left"></td>
          </tr>
                    <tr>
            <td class="text-left">12/03/2020</td>
            <td class="text-left">Confirmación de existencia</td>
            <td class="text-left"></td>
          </tr>
                            </tbody>
      </table>
	  </div>
            <div class="buttons clearfix">
        
        <div class="pull-right">
          
          <!-- <a href="https://pagocoopeuch.lealtad360.com/index.php?route=account/order" class="btn btn-primary">
            Continuar          </a> -->

        </div>
      </div>
      </div>
    <aside id="column-right" class="col-sm-3 hidden-xs">
    <div class="box">
  <div class="box-heading">Cuenta</div>
 
  
</div>
  </aside>
</div>
</div>
@endsection
@section('footer')
@include('front.includes.footer')
@endsection
<?php
//dd($order);
?>