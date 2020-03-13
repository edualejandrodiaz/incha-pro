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

<section id="detalles-gifcard">
    <div class="container pt-5 pb-5 mt-5 mb-5">
        <div class="row mb-4">
            <div class="col-lg-2 col-xl-3"></div>
            <div class="col-sm-12 col-md-12 col-lg-8 col-xl-6 mt-3">
                <div class="cr-caja-progreso">
                    <div class="cr-progreso-number cr-progreso-active">
                        <p>1</p>
                    </div>
                    <p>Confirmación de datos</p>
                    <hr class="style1">
                    <div class="cr-progreso-number">
                        <p>2</p>
                    </div>
                    <p>Confirmación de pago</p>
                    <hr class="style1">
                    <div class="cr-progreso-number">
                        <p>3</p>
                    </div>
                    <p>Canje realizado</p>
                </div>
            </div>
            <div class="col-lg-2 col-xl-3"></div>
        </div>
        <div class="card">
            <div class="row">
                <aside class="col-sm-5 border-right pr-0">
                    <article class="gallery-wrap">
                        <div class="img-big-wrap">
                            <img src="{{ asset('images/digital-change/'.$giftcard['img']) }}" alt="">
                        </div>
                    </article> <!-- gallery-wrap .end// -->
                </aside>
                <aside class="col-sm-7">
                    <article class="card-body p-5">
                        <h3 class="title mb-3">{{ $giftcard['name'] }}</h3>
                        <dl class="item-property">
                            <dt>Descripción</dt>
                            <dd>
                                <p>Here goes description consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco </p>
                            </dd>
                        </dl>

                        <hr>
                        <div class="row">
                            <div class="col-sm-12">
                                <dl class="param param-inline">
                                    <dt>Monto: </dt>
                                    <dd>
                                        <ul class="montos">
                                            <li disabled="" class="tor" id="sel_5000" title="Giftcard agotada!" onclick="setvaluegf('5000','5000',this)">

                                                <div class="divimgtor" id="divimgtor5000" style="max-width: 1px; display: none;">

                                                </div>

                                                $5.000
                                            </li>

                                            <li disabled="" class="tor" id="sel_10000" title="Giftcard agotada!" onclick="setvaluegf('10000','10000',this)">

                                                <div class="divimgtor" id="divimgtor10000" style="max-width: 1px; display: none;">

                                                </div>

                                                $10.000
                                            </li>
                                            <li disabled="" class="tor" id="sel_20000" title="Giftcard agotada!" onclick="setvaluegf('20000','20000',this)">

                                                <div class="divimgtor" id="divimgtor20000" style="max-width: 1px; display: none;">

                                                </div>

                                                $20.000
                                            </li>

                                            <li disabled="" class="tor" id="sel_30000" title="Giftcard agotada!" onclick="setvaluegf('30000','30000',this)">

                                                <div class="divimgtor" id="divimgtor30000" style="max-width: 1px;">

                                                </div>

                                                $30.000
                                            </li>

                                            <li class="mlist" id="sel_50000" title="" onclick="setvaluegf('50000','50000',this)" style="cursor: pointer; background-color: rgb(255, 255, 255);">

                                                <div class="divimgtor" id="divimgtor50000" style="max-width: 1px;">

                                                </div>

                                                $50.000
                                            </li>

                                            <li class="mlist" id="sel_100000" title="" onclick="setvaluegf('100000','100000',this)" style="cursor: pointer; background-color: rgb(255, 255, 255);">

                                                <div class="divimgtor" id="divimgtor100000" style="max-width: 1px;">

                                                </div>

                                                $100.000
                                            </li>
                                        </ul>
                                    </dd>
                                </dl> <!-- item-property .// -->
                            </div> <!-- col.// -->
                        </div> <!-- row.// -->
                        <hr>
                        <div class="row mb-2">
                            <div class="col-md-6">
                                <input class="form-control small-input mb-2" type="text" name="Nombre" placeholder="Nombre" value="{{ $giftcard['user'] }}">
                            </div>
                            <div class="col-md-6">
                                <input class="form-control small-input mb-2" type="number" name="rut" placeholder="RUT" value="{{ $giftcard['rut'] }}">
                            </div>
                        </div>
                        <hr class="mb-4">
                        <a href="" class="btn btn-secondary btn-block mt-2">Canjear ahora</a>
                        <a href="{{ route('home') }}" class="btn btn-outline-primary btn-block mt-2">Volver</a>
                    </article> <!-- card-body.// -->
                </aside> <!-- col.// -->
            </div> <!-- row.// -->
        </div> <!-- card.// -->

    </div>
</section>

@endsection
@section('footer')
@include('front.includes.footer')
@endsection