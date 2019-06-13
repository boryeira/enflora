@extends('layouts.app')


@section('content')

    <div class="row justify-content-center" >
        <div class="col-md-8 text-center">
          <a href="/"><img src="{{asset('img/enflora.png')}}" width="450" style="margin-bottom:50px;margin-top:50px;"/></a>
          <p class="text-light">Formulario de pre registro</p>
          <div class="alert alert-info">
          <p> IMPORTANTE: Este formulario es solo un pre-registro y no garantiza activación inmediata o membresía.
             Nuestro equipo validara la información y se comunicara con usted vía correo electrónico cuando existan cupos disponibles para su activación.   </p>
             <p>Importante que ingrese un correo electrónico valido. </p>
          </div>
         
          <div class="card" style="background-color: #fff0;">
            <iframe src="https://docs.google.com/forms/d/e/1FAIpQLSfYw_F-vQ2W7Kc4yviJOS2nuR0cfmEgNGv3HMN8r_6Hp_JXyw/viewform?embedded=true"  height="2089" frameborder="0" marginheight="0" marginwidth="0">Cargando...</iframe>
          </div>
        </div>
    </div>

@endsection

