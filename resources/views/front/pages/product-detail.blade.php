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
<section id="canje-producto-1" class="py-5 mt-5">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-10">
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <img src="{{ asset(config('app.rest_api.base_image').$product->image) }}" class="img-fluid justify-content-center" width="400" alt="">
              </div>
              <div class="col-md-6">
                <p class="mb-0">{{ ($product->manufacturer <> null) ? $product->manufacturer : $product->meta_title }}</p>
                <h4 class="text-title font-weight-bold">{{ $product->name }}</h4>
                <hr>
                <div class="row">
                  <div class="col-6">
                    <h6 class="color-primary font-weight-bold">{{ ($product->special <> null) ? $product->special : $product->price | price }}</h6>
                  </div>
                  <div class="col-6 color-primary {{ ($product->special <> null) ? '' : 'd-none' }}"><del>{{ $product->price | price:false }} Precio mercado</del></div>
                </div>
                <p class="text-producto">{!! strip_tags(html_entity_decode($product->description)) !!}</p>
                <hr>
                <div class="row contenedorstock">
                    <div class="col-6 col-md-6 d-flex justify-content-end">
                      <div class="caja1">{{ $product->quantity.' Stock' }}</div>
                    </div>
                    <div class="col-6 col-md-6">
                      <div class="caja1">2 Canjeados</div>
                    </div>
                  </div>
                <hr>
                <!-- retiro -->
                
                <a class="btn btn-secondary btn-block mt-2"  data-toggle="modal" data-target="#confirmacionModal">Canjear ahora</a>
                <a href="{{ route('home') }}" class="btn btn-outline-primary btn-block mt-2">Volver</a>

                <!-- confirmacion -->

                <!-- Modal -->
                <div class="modal fade" id="confirmacionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        Estás a punto de realizar un canje ¿Deseas continuar?
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <form method="get" action="{{ route('catalogo.order-add', [ Str::slug($product->name), $product->product_id ]) }}">
                        <button type="submit" class="btn btn-primary">Canjear Ahora</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
                
                  
                  <div class="modal fade" id="confirmacionModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Mensaje</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div id="mensaje-resultado" class="modal-body">
                          Datos actualizados con exito
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          
                        </div>
                      </div>
                    </div>
                  </div>

                <!-- end confirmación -->
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