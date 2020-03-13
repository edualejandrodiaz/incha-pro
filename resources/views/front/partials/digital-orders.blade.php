<div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
    <div class="container" id="miscanjes">
        <h3 class="font-weight-bold text-title">Canjes digitales</h3>
        <div class="row pt-3">
            <div class="col-6 col-md-2">
                <div class="card mx-2 width-card-canjes shadow-sm my-1">
                    <div class="card-header py-2 bg-white text-center">
                        <img src="{{ asset('images/etiqueta.png') }}" class="w-50" alt="">
                    </div>
                    <div class="card-body px-3 py-2 d-flex justify-content-center align-items-center">
                        <img src="{{ asset('images/digital-change/logo-netflix.png') }}" class="w-75 py-3" alt="">
                    </div>
                    <div class="card-footer">
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-2">
                <div class="card mx-2 width-card-canjes shadow-sm my-1">
                    <div class="card-header py-2 bg-white text-center">
                        <img src="{{ asset('images/etiqueta.png') }}" class="w-50" alt="">
                    </div>
                    <div class="card-body px-3 py-2 d-flex justify-content-center align-items-center">
                        <img src="{{ asset('images/digital-change/logo-cabify.png') }}" class="w-75 py-3" alt="">
                    </div>
                    <div class="card-footer">
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-2">
                <div class="card mx-2 width-card-canjes shadow-sm my-1">
                    <div class="card-header py-2 bg-white text-center">
                        <img src="{{ asset('images/etiqueta.png') }}" class="w-50" alt="">
                    </div>
                    <div class="card-body px-3 py-2 d-flex justify-content-center align-items-center">
                        <img src="{{ asset('images/digital-change/logo-cerogrado.png') }}" class="w-75 py-3" alt="">
                    </div>
                    <div class="card-footer">
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-2">
                <div class="card mx-2 width-card-canjes shadow-sm my-1">
                    <div class="card-header py-2 bg-white text-center">
                        <img src="{{ asset('images/etiqueta.png') }}" class="w-50" alt="">
                    </div>
                    <div class="card-body px-3 py-2 d-flex justify-content-center align-items-center">
                        <img src="{{ asset('images/digital-change/logo-cinemark.png') }}" class="w-75 py-3" alt="">
                    </div>
                    <div class="card-footer">
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-2">
                <div class="card mx-2 width-card-canjes shadow-sm my-1">
                    <div class="card-header py-2 bg-white text-center">
                        <img src="{{ asset('images/etiqueta.png') }}" class="w-50" alt="">
                    </div>
                    <div class="card-body px-3 py-2 d-flex justify-content-center align-items-center">
                        <img src="{{ asset('images/digital-change/logo-hoyts.png') }}" class="w-75 py-3" alt="">
                    </div>
                    <div class="card-footer">
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-2">
                <div class="card mx-2 width-card-canjes shadow-sm my-1">
                    <div class="card-header py-2 bg-white text-center">
                        <img src="{{ asset('images/etiqueta.png') }}" class="w-50" alt="">
                    </div>
                    <div class="card-body px-3 py-2 d-flex justify-content-center align-items-center">
                        <img src="{{ asset('images/digital-change/logo-playstation.png') }}" class="w-75 py-3" alt="">
                    </div>
                    <div class="card-footer">
                    </div>
                </div>
            </div>
        </div>

        <h3 class="font-weight-bold text-title pt-4">Mi historial de canjes</h3>

        
        <div class="row pt-3">
            <div class="col-md-12">
                <table class="table text-center">
                    <thead class="bg-secondary white-text">
                        <tr>
                            <th scope="col">No. de Orden</th>
                            <th scope="col">No. de Productos</th>
                            <th scope="col">Estado</th>
                            <th scope="col">Precio</th>
                            <th scope="col">Fecha de Compra</th>
                            <th scope="col">Voucher</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($datosPerfil['orders'] as $order)
                        <tr>
                            <th scope="row">#{{ $order['order_id'] }}</th>
                            <td>{{ $order['products'] }}</td>
                            <td>{{ $order['status'] }}</td>
                            <td>{{ $order['total'] }}</td>
                            <td>{{ $order['date_added'] }}</td>
                            <td><a href="{{ route('order.detail', $order['order_id'] ) }}" class="btn btn-danger"><i class="far fa-file"></i> Ver Orden</a></td>
                            <!-- <td><button class="btn btn-primary btn-sm px-5">Detalles en PDF <i class="far fa-file-pdf pl-2"></i></button></td> -->
                        </tr>
                    @endforeach                       
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>