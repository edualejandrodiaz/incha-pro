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
                      
                      <form id="addressForm" method="POST" action="{{ route('catalogo.order-add') }}">
                      {{ csrf_field() }}
                      
                      <!-- ruta antigua : route('catalogo.order-add', [ Str::slug($product->name), $product->product_id ]) -->
                      <!-- body modal -->
                      <div class="modal-body">
                        Estás a punto de realizar un canje ¿Deseas continuar?
 
                            <div class="form-group">
                              <label for="addAddress">Dirección</label>
                              <select id="addAddress" name="addAddress" class="form-control" style="display: block!important;" {{ empty($addresses) ? 'readonly' : '' }}>
                                  @if( empty($addresses) )
                                  <option value="0">No existen direcciones</option>
                                  @else
                                    @foreach( $addresses as $address)

                                      
                                      <option id="{{ $address->address_id }}">{{ $address->address_2 }}</option>

                                    @endforeach
                                  @endif
                                </select>
                            </div>
                            
                            
                            <a class="p-0 color-celeste" id="addAddress" 
                            data-toggle="collapse"  
                            href="#collapseAdress">Agregar dirección <em class="fas fa-plus-circle"></em>
                            </a>
                            
                            <div class="collapse" id="collapseAdress">


                              <!-- Direccion -->
                              <div class="form-group">
                                <label for="inputAddress2">Ingrese Dirección</label>
                                <input type="hidden" name="ruta-add-address" id="ruta-add-address" value="{{ route('catalogo.add-address') }}" />
                                <input type="text" class="form-control" id="inputAddress2" name="inputAddress2" placeholder="Calle, Número, Departamento">
                              </div>
     
 
                              <!-- Región y Ciudad -->
                              <div class="form-row">

                                <div class="form-group col-md-6">
                                  <label for="inputState">Región</label>
                                  <select id="inputState" class="form-control" style="display: block!important;">
                                  @foreach( $cities['regiones'] as $region_code => $region_value )
                                      <option value="{{ $region_code }}">{{ $region_value }}</option>
                                  @endforeach
                                  </select>
                                </div>
                                <div class="form-group col-md-6">
                                  <label for="inputCity">Ciudad</label>
                                  <select id="inputCity" class="form-control" style="display: block!important;">
                                  @foreach( $cities['ciudades'][4222] as $ciudad_code => $ciudad_value )
                                      <option value="{{ $ciudad_code }}">{{ $ciudad_value }}</option>
                                  @endforeach
                                  </select>
                                </div>
                              
                              </div>
                              <!-- End Región y Ciudad -->

                              
                          
                              <button type="button" id="addAddressAction" class="btn btn-primary">Agregar</button>
                            </div>

                            <div class="form-group">
                                <label for="comentario">Comentario</label>
                                <textarea class="form-control" id="comentario" name="comentario" rows="3"></textarea>
                              </div>
                      </div><!-- End Body Modal -->

                      <div class="modal-footer">
                        
                        <input type="hidden" name="producto_id" value="{{ $product->product_id }}" />
                        <input type="hidden" name="direccion" value="{{ empty($addresses) ? 0 : 1 }}" /> 
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        
                        <button type="submit" class="btn btn-primary">Canjear Ahora</button>
                        
                      </div>

                      </form>
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

</div>

</section>
@endsection
@section('footer')
@include('front.includes.footer')
<script type="text/javascript">

var ciudades = @json( $cities );


$( document ).ready(function(){

  $("#inputState").change(function () {

    $("#inputCity").find("option:gt(0)").remove();
    $("#inputCity").find("option:first").text("Loading...");

    var comunas = ciudades.ciudades[this.value];
    //console.log(comunas);

    $("#inputCity").find("option").remove();

    Object.keys(comunas).forEach(function(key) {
      console.log(key, comunas[key]);
      $("<option/>").attr("value", key).text(comunas[key]).appendTo($("#inputCity"));
    });


  });

  $('#addAddressAction').click(function(e){

      var calle = $('#inputAddress2').val();
      var calle_txt = $('#inputAddress2 option:selected').text();

      var region = $("#inputState").val();
      var region_txt = $("#inputState option:selected").text();

      var comuna = $("#inputCity").val();
      var comuna_txt = $("#inputCity option:selected").text();

      var ruta = $("#ruta-add-address").val();

      var validator = $( "#addressForm" ).validate();
      //validator.element( "#inputAddress2" );
      var address = calle+", "+comuna_txt+", "+region_txt;
      console.log(address);

      if( validator.element( "#inputAddress2" ) ){

          $.ajax({
                  
                  type       :'GET',
                  dataType   :'json',
                  url: ruta,
                  data: { street: calle, city:comuna, state: region, completa: address},
                  success: function (msg) {
                      console.log("TCL: msg", msg)
                      if (msg.result == 'success') {

                        if( $('#addAddress').prop("disabled") ){
                          $('#addAddress').prop("disabled", false);
                          $('#addAddress').find('option').get(0).remove();
                        } 

                        if( $("#addAddress").attr("readonly") ){

                          $("#addAddress").attr("readonly", false);
                          $('#addAddress').find('option').get(0).remove();

                        }
                        validator.element( "#addAddress" )
                        $('#addAddress').removeClass('error');
                        
                        //cambia a 1 direccion
                        

                        $('#inputAddress2').val('');

                        $('#collapseAdress').collapse('hide');

                        $('#addAddress').prepend(new Option(address, address, true, true));
                        console.log('exito de la consulta');

                      } else {
                          console.log('error en la consulta');
                          //$("#msgLogin").html(msg.result);
                          //$("#msgLogin").show();
                          //$("#submitLogin").prop("disabled", false);
                      }
                  }
          });

      }

  



  });

  $.validator.addMethod("noEsIgual", function(value, element, arg){
    console.log('argumento',arg);
    console.log('valor',value);
  return arg !== value;
 }, "Debe agregar una dirección.");


  $("#addressForm").validate({
        rules: {
            'addAddress': { noEsIgual: '0' },
            'comentario': 'required'
        },
        errorElement: "div",
        messages: {
          'addAddress': { noEsIgual: "Debe agregar una dirección" }
        }
        
    });



});



</script>
@endsection