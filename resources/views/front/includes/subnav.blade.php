<div class="subnav d-flex align-items-center">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-8 ml-auto col-md-6 text-center">
          <span>Hola {{ Session::get('bupa.nickName') }}</span>
          <br>
          <span>Tus excedentes son:</span>
          <span style="font-size: 1rem;">{{ Session::get('bupa.montoExc') | price }}</span>
        </div>
        <div class="col-md-6">
          <h5 class="m-0">1 Excedente = $ 1CLP</h5>
        </div>
      </div>
    </div>
  </div>

<span class="cajaexcedentes btn-excedentes d-none d-sm-none d-md-block animated pulse slow infinite">{{ Session::get('bupa.nickName') }}, tus excedentes son <span id="totExcBase">{{ Session::get('bupa.montoExc') | price }}</span></span>
