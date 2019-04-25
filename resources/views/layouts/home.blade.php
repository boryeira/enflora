@extends('layouts.app')


@section('content')
<div class="" >
    <div class="row justify-content-center" >
        <div class="col-md-8 text-center" style="max-width:550px;">
          <a href="/"><img src="{{asset('img/enflora.png')}}" width="450" style="margin-bottom:50px;margin-top:50px;"/></a>
          <p class="text-light">Club privado de cannabis medicinal</p>

          <div class="ibox" style="margin:5px">
              <div class="ibox-body">
                  <ul class="timeline">
                      <li class="timeline-item"><i class="ti-desktop timeline-icon"></i> Sistema de suscripción y reserva en linea</li>
                      <li class="timeline-item"><i class="ti-gallery timeline-icon"></i> Trazabilidad completa del cultivo</li>
                      <li class="timeline-item"><i class="ti-world timeline-icon"></i>Cultivo orgánico bajo estándares internacionales</li>
                      <li class="timeline-item"><i class="ti-headphone-alt timeline-icon"></i>Comunicación segura y siempre encriptada</li>
                      <li class="timeline-item"><i class="ti-lock timeline-icon"></i>Servicio discreto</li>
                      <li class="timeline-item"><i class="ti-user timeline-icon"></i>Consulta medica y asesoría legal </li>
                      <li class="timeline-item"><i class="ti-mobile timeline-icon"></i>Pronto app ios y android... </li>
                  </ul>
              </div>
          </div>
          <div class="card" style="margin:5px">
            <a class="btn btn-primary" href="{{route('login')}}">Ingresar</a>
            <br>
            <a class="btn btn-info" href="{{route('form')}}">Formulario Pre-registro</a>

          </div>
          <div class="font-13" style="margin-bottom:50px;margin-top:50px;">2018 © Germinada por <b>Envolabs</b> - Cosechando datos</div>
        </div>
    </div>
</div>
@endsection
