<!-- beneficios -->
<section id="canjesdijitales">
    <div class="bg-color py-5">
        <div class="container">
            <div class="row justify-content-center align-items-center pb-3">
                <div class="col-2 col-md-1">
                    <hr class="hr-title-white">
                </div>
                <div class="col-8 col-md-3 text-center">
                    <h6 class="font-weight-lihter white-text mb-0">Conócenos</h6>
                </div>
                <div class="col-2 col-md-1">
                    <hr class="hr-title-white">
                </div>
            </div>
            <h3 class="font-weight-bold white-text text-center">Algunos de nuestros canjes digitales</h3>
            <div class="row pl-2 pt-4">
                <div class="owl-carousel" id="carouselbeneficios">
                    <a href="{{ route('giftcard.show', [ 'logo-netflix' ]) }}">
                        <div class="card mx-2 width-card-beneficio shadow-sm my-1">
                            <div class="card-header py-2 bg-white">
                                <img src="{{ asset('images/etiqueta.png') }}" class="w-50 mx-auto" alt="">
                            </div>
                            <div class="card-body px-3 py-2 d-flex justify-content-center align-items-center">
                                <img src="{{ asset('images/digital-change/logo-netflix.png') }}" alt="">
                            </div>
                        </div>
                    </a>

                    <a href="{{ route('giftcard.show', [ 'logo-cinemark' ]) }}">
                        <div class="card mx-2 width-card-beneficio shadow-sm my-1">
                            <div class="card-header py-2 bg-white">
                                <img src="{{ asset('images/etiqueta.png') }}" class="w-50 mx-auto" alt="">
                            </div>
                            <div class="card-body px-3 py-2 d-flex justify-content-center align-items-center">
                                <img src="{{ asset('images/digital-change/logo-cinemark.png') }}" alt="">
                            </div>
                        </div>
                    </a>
                    <a href="{{ route('giftcard.show', [ 'logo-cabify' ]) }}">
                    <div class="card mx-2 width-card-beneficio shadow-sm my-1">
                        <div class="card-header py-2 bg-white">
                            <img src="{{ asset('images/etiqueta.png') }}" class="w-50 mx-auto" alt="">
                        </div>
                        <div class="card-body px-3 py-2 d-flex justify-content-center align-items-center">
                            <img src="{{ asset('images/digital-change/logo-cabify.png') }}" alt="">
                        </div>
                    </div>
                    </a>
                    <a href="{{ route('giftcard.show', [ 'logo-hoyts' ]) }}">
                    <div class="card mx-2 width-card-beneficio shadow-sm my-1">
                        <div class="card-header py-2 bg-white">
                            <img src="{{ asset('images/etiqueta.png') }}" class="w-50 mx-auto" alt="">
                        </div>
                        <div class="card-body px-3 py-2 d-flex justify-content-center align-items-center">
                            <img src="{{ asset('images/digital-change/logo-hoyts.png') }}" alt="">
                        </div>
                    </div>
                    </a>
                    <a href="{{ route('giftcard.show', [ 'logo-cerogrado' ]) }}">
                    <div class="card mx-2 width-card-beneficio shadow-sm my-1">
                        <div class="card-header py-2 bg-white">
                            <img src="{{ asset('images/etiqueta.png') }}" class="w-50 mx-auto" alt="">
                        </div>
                        <div class="card-body px-3 py-2 d-flex justify-content-center align-items-center">
                            <img src="{{ asset('images/digital-change/logo-cerogrado.png') }}" alt="">
                        </div>
                    </div>
                    </a>
                    <a href="{{ route('giftcard.show', [ 'logo-playstation' ]) }}">
                    <div class="card mx-2 width-card-beneficio shadow-sm my-1">
                        <div class="card-header py-2 bg-white">
                            <img src="{{ asset('images/etiqueta.png') }}" class="w-50 mx-auto" alt="">
                        </div>
                        <div class="card-body px-3 py-2 d-flex justify-content-center align-items-center">
                            <img src="{{ asset('images/digital-change/logo-playstation.png') }}" alt="">
                        </div>
                    </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /beneficios -->