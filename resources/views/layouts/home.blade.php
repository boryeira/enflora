@extends('layouts.app')


@section('content')
<div class="" >
    <div class="row justify-content-center" >
        <div class="col-md-8 text-center" style="max-width:550px;">
          <a href="/"><img src="{{asset('img/enflora.png')}}" width="450" style="margin-bottom:50px;margin-top:50px;"/></a>
          <p class="text-light">Club privado de cannabis medicinal</p>

          {{-- <div class="card" style="margin:5px">
            <a class="btn btn-primary" href="{{route('login')}}">Ingresar</a>
            <br>
            <a class="btn btn-info" href="https://docs.google.com/forms/d/e/1FAIpQLSfYw_F-vQ2W7Kc4yviJOS2nuR0cfmEgNGv3HMN8r_6Hp_JXyw/viewform?embedded=true">Formulario Pre-registro</a>

          </div> --}}

          {{-- <div class="ibox" style="margin:5px">
              <div class="ibox-body">
                  <ul class="timeline text-left">
                      <li class="timeline-item"><i class="ti-desktop timeline-icon"></i>Plataforma de suscripción y reserva</li>
                      <li class="timeline-item"><i class="ti-money timeline-icon"></i>Pago en linea</li>
                      <li class="timeline-item"><i class="ti-world timeline-icon"></i>Cultivo orgánico bajo estándares internacionales</li>
                      <li class="timeline-item"><i class="ti-headphone-alt timeline-icon"></i>Comunicación segura y siempre encriptada</li>
                      <li class="timeline-item"><i class="ti-lock timeline-icon"></i>Servicio discreto</li>
                      <li class="timeline-item"><i class="ti-user timeline-icon"></i>Consulta medica y asesoría legal </li>
                      <li class="timeline-item"><i class="ti-mobile timeline-icon"></i>Pronto app ios y android... </li>
                  </ul>
              </div>
          </div>


          <div class="card" style="margin:5px">

            <div class="row">
              <div class="col-sm-4">
                <img src="https://www.flow.cl/images/logos/webpay.png" class="logoWebpay" alt="logoWebpay" width="100">
              </div>
              <div class="col-sm-4">
                <img src="https://www.flow.cl/images/logos/servipag.png" class="logoWebpay" alt="logoServipag" width="100">
              </div>
              <div class="col-sm-4">
                <img src="https://www.flow.cl/images/medios-de-pago/onepay/onepay.png" class="logoWebpay" alt="logoOnepay" width="100">
              </div>
              <div class="col-sm-4">
                <img src="https://www.flow.cl/images/logos/multicaja.png" class="logoWebpay" alt="logoMulticaja" width="100">
              </div>
              <div class="col-sm-4">
                <img src="https://www.flow.cl/images/medios-de-pago/cryptocompra/cryptocompra.png" class="logoWebpay" alt="logoCryptocompra" width="100">
              </div>
            </div>

          </div> --}}
          <div class="font-13" style="margin-bottom:50px;margin-top:50px;">2018 © Germinada por <b>enfloraLab</b></div>
        </div>
    </div>
</div>
@endsection
