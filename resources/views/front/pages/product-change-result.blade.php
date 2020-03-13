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
<section id="canje-producto-2" class="py-5 mt-5">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card">
          <div class="card-body">
            <div class="row justify-content-center text-center">
              <div class="col-md-12 py-4">
                <img src="img/assets/check.png" class="img-fluid" width="100" alt="">
              </div>
              <div class="col-md-12">
                <h4 class="text-title">

                  @if( $message == 'Ok')
                    ¡Felicidades, canjeaste con éxito!
                  @elseif($message == 'NOPuntos')
                    ¡No tiene suficientes puntos!
                  @else
                    ¡Error al realizar el canje! 
                  @endif

                  
                  </h4>
              </div>
              <div class="col-md-12">
                <p class="{{ ($message == 'NOk') ? 'd-none' : '' }}"><!--{{ 'Ya canjeaste 1 '.$product->name.' por ' }}{{ $product->price | price  }}--></p>
                <p class="{{ ($message == 'Ok') ? 'd-none' : '' }}">Por favor intentalo nuevamente</p>
              </div>
              <div class="col-md-12">
                <a href="{{ route('catalogo.index') }}" class="btn btn-secondary">Volver a canjear</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
@section('footer')
@include('front.includes.footer')
@endsection