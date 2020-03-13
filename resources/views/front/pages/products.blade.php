<!-- productos -->
<section id="catalogo" class="pt-5">
    <div class="container pt-4 pb-5">
        <div class="row justify-content-center align-items-center pb-3">
            <div class="col-2 col-md-1">
                <hr class="hr-title">
            </div>
            <div class="col-8 col-md-3 text-center">
                <h6 class="font-weight-lihter text-title mb-0">Catálogo de canje</h6>
            </div>
            <div class="col-2 col-md-1">
                <hr class="hr-title">
            </div>
        </div>
        <h3 class="font-weight-bold text-title text-center">¿Sabías que puedes canjear esto?</h3>
        <div class="row pl-2 pt-4">
            <div class="owl-carousel" id="carouselproductos">
                @foreach ($bestsellets as $item)
                @if ($loop->iteration <= 5) <div class="card mx-2 width-card-productos shadow-sm my-1">
                    <div class="card-header p-0">
                        <img class="card-img-top" src="{{ asset(config('app.rest_api.base_image').$item->image) }}" alt="">
                    </div>
                    <div class="card-body text-center px-2 py-2">
                        <p class="mb-1 text-truncate">{{ $item->name }}</p>
                        <h5 class="mb-0 pb-0 text-center color-primary">{{ $item->price | price }}</h5>
                    </div>
                    <div class="card-footer pt-0">
                        @if (Session::get('inchalam.user'))
                        <a href="{{ route('catalogo.show', [ Str::slug($item->name), $item->product_id ]) }}" class="btn btn-primary btn-block btn-sm">Lo Quiero</a>
                        @else
                        <a class="btn btn-primary btn-block btn-sm" data-toggle="modal" data-target="#modalLRForm">Lo Quiero</a>
                        @endif
                    </div>
            </div>
            @endif
            @endforeach
        </div>
    </div>
    <div class="row pt-4 justify-content-center">
        <a class="btn btn-secondary" href="{{ route('catalogo.index') }}">ver catálogo completo</a>
    </div>
    </div>
</section>
<!-- /productos -->