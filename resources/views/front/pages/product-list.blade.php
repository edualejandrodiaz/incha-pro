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
<div id="product_div"></div>
<section id="catalogocompleto" class="pt-5 mt-5">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="row ml-1">
                    <h5 class="text-title">Categoría</h5>
                </div>
                <div class="row pt-3 ml-1">
                    <form method="post" id="fmrCategories" action="{{ route('catalogo.categories') }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-check categoria-estilo pl-0">
                            @if ($categories)
                            @foreach ($categories as $key => $value)
                            @if ($key == 'categories')
                            @foreach ($value as $key => $item)
                            <input type="checkbox" class="form-check-input chkCategory" name="categories[]" id="{{ $item->category_id }}" value="{{ $item->category_id }}" {{ (array_filter($data['category'], function($k) use ($item) { return $k == $item->category_id; })) ? 'checked' : '' }}>
                            <label class="form-check-label mb-2" for="{{ $item->category_id }}">{{ $item->name }}</label>
                            <br>
                            @endforeach
                            @endif
                            @endforeach
                            @else
                            <input type="checkbox" class="form-check-input" id="noCategories" checked disabled>
                            <label class="form-check-label mb-2" for="noCategories">Sin Categorias</label>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-6">
                        <h3 class="font-weight-bold text-title">Catálogo de productos</h3>
                    </div>
                    <div class="col-md-6">
                        <nav aria-label="Page navigation example">
                            @include('front.includes.paginate')
                        </nav>
                    </div>
                </div>
                <div class="row pt-3" id="product-list">
                    @if ($products)
                    @foreach ($products as $item)
                    <div class="col-md-3 mb-3">
                        <div class="card">
                            <img src="{{ asset(config('app.rest_api.base_image').$item->image) }}" class="card-img-top img-fluid" alt="">
                            <div class="card-body pb-0">
                                <h6 class="text-truncate mb-0">{{ $item->name }}</h6>
                                <p class="text-truncate mb-0">{!! strip_tags(html_entity_decode($item->description)) !!}</p>
                            </div>
                            <div class="card-footer">
                                <hr class="py-1 my-0">
                                <div class="row align-items-center">
                                    <div class="col-6">
                                        <span>{{ $item->price | price:false }}</span>
                                    </div>
                                    <div class="col-6">
                                        @if (Session::get('inchalam.user'))
                                        <a href="{{ route('catalogo.show', [ Str::slug($item->name), $item->product_id ]) }}" class="btn btn-primary btn-sm px-2 py-1 mx-0">Canjear</a>
                                        @else
                                        <a class="btn btn-primary btn-sm px-2 py-1 mx-0" data-toggle="modal" data-target="#modalLRForm">Canjear</a>
                                        @endif
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @else
                    <div class="col-md-12 col-6 mt-4 text-center">
                        <a href="#">No hay productos</a>
                    </div>
                    @endif
                </div>
                <div class="row pt-3">
                    <div class="col-md-12">
                        <nav aria-label="Page navigation example">
                            @include('front.includes.paginate')
                        </nav>
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