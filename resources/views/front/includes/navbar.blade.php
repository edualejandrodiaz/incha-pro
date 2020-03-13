<nav class="navbar navbar-expand-lg navbar-dark bg-secondary shadow-sm fixed-top" id="navbarinchalam">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{ asset('images/logo-white.png') }}" class="img-fluid w-75" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav" aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="basicExampleNav">
            <ul class="navbar-nav ml-auto nav-inchalam-movile-home">
                <li class="nav-item {{ Str::contains(request()->getRequestUri(), '/home') ? 'd-none' : '' }}">
                    <a class="nav-link" href="{{ route('home') }}"><em class="fas fa-home pr-2"></em>Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('catalogo.index') }}"><em class="fas fa-shopping-bag pr-2"></em>Catálogo</a>
                </li>
                <li class="nav-item {{ Str::contains(request()->getRequestUri(), '/perfil') ? 'd-none' : '' }}">
                    @if (Session::get('inchalam.user'))
                    <a class="nav-link" href="{{ route('perfil.index') }}"><em class="fas fa-user pr-2" aria-hidden="true"></em>Dashboard</a>
                    @else
                    <a class="nav-link" data-toggle="modal" data-target="#modalLRForm"><em class="fas fa-user pr-2" aria-hidden="true"></em>Perfil</a>
                    @endif
                </li>
                <li class="nav-item {{ Str::contains(request()->getRequestUri(), '/perfil') ? '' : 'd-none' }}">
                <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form6').submit();"><em class="fas fa-sign-out-alt pr-2" aria-hidden="true"></em>Cerrar Sesión</a>
                </li>
                @if (Session::get('inchalam.user'))
                <li class="nav-item">
                    <a class="nav-link" href="javascript: return false;"><em class="fas fa-cat pr-2" aria-hidden="true"></em>Hola {{ App\Http\Controllers\Controller::getFirstname(Session::get('inchalam.id')) }}</a>
                </li>
                @endif
                <form id="logout-form6" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
            </ul>
        </div>
    </div>
</nav>
<!--Modal: Login / Register Form-->
<div class="modal fade" id="modalLRForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog cascading-modal" role="document">
        <!--Content-->
        <div class="modal-content">
            <!--Modal cascading tabs-->
            <div class="modal-c-tabs">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs md-tabs tabs-2 bg-secondary darken-3" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#panel7" role="tab"><em class="fas fa-user mr-1"></em>
                            Iniciar sesión</a>
                    </li>
                </ul>
                <!-- Tab panels -->
                <div class="tab-content">
                
                    <!--Panel 7-->
                    <div class="tab-pane fade in show active" id="panel7" role="tabpanel">
                        <!--Body-->
                        <style>

                        </style>
                        <form method="post" action="{{ route('login-user') }}" id="modal-login-form" class="form-horizontal" action="" enctype="multipart/form-data">
                            @method('POST')
                            @csrf
                            <div class="modal-body mb-1">
                            <div class="alert alert-danger" role="alert" id="msgLogin" aria-hidden="true" style="display: none"></div>
                                <div class="md-form form-sm mb-5">
                                    <em class="fas fa-credit-card prefix"></em>
                                    <input type="text" name="rut" id="modalLRInput10" class="form-control form-control-sm validate">
                                    <label data-error="wrong" data-success="right" for="modalLRInput10">Su rut</label>
                                </div>
                                <div class="md-form form-sm mb-4">
                                    <em class="fas fa-lock prefix"></em>
                                    <input type="password" name="password" id="modalLRInput11" class="form-control form-control-sm validate">
                                    <label data-error="wrong" data-success="right" for="modalLRInput11">Su contraseña</label>
                                </div>
                                <div class="text-center mt-2">
                                    <button type="submit" class="btn btn-primary btn-sm" id="submitLogin">Iniciar <em class="fas fa-sign-in ml-1"></em></button>
                                </div>
                            </div>
                        </form>
                        <!--Footer-->
                        <div class="modal-footer">
                            <div class="options text-center text-md-right mt-1">
                                <p>¿Olvidó su <a href="#" class="color-primary">contraseña?</a></p>
                            </div>
                            <button type="button" class="btn btn-outline-info btn-sm waves-effect ml-auto" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                    <!--/.Panel 7-->
                </div>
            </div>
        </div>
        <!--/.Content-->
    </div>
</div>
<!--Modal: Login / Register Form-->

<!-- Modal: Prueba -->
<div class="modal fade" id="modalHola" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

    <div class="modal-dialog cascading-modal" role="document">
            <!--Content-->
            <div class="modal-content">
                <!--Modal cascading tabs-->
                <div class="modal-c-tabs">
                <form method="post" action="{{ route('login-user-cat') }}" id="modal-login-form-cat" class="form-horizontal" action="" enctype="multipart/form-data">
                @method('POST')
                @csrf
                    <p>Hola</p>
                    <div class="text-center mt-2">
                                    <button type="submit" class="btn btn-primary btn-sm" id="submitLoginCat">Iniciar <em class="fas fa-sign-in ml-1"></em></button>
                                </div>
                </form>
                </div>
            </div>
    </div>
</div>
