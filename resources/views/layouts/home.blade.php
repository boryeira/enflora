@extends('layouts.app')


@section('content')
<div class="" >
    <div class="row justify-content-center" >
        <div class="col-md-8 text-center" style="max-width:550px;">
          <a href="/"><img src="{{asset('img/enflora.png')}}" width="450" style="margin-bottom:50px;margin-top:50px;"/></a>
          <p class="text-light">Club privado de cannabis medicinal</p>
          <div class="card" style="margin:5px">
            <a class="btn btn-primary" href="{{route('login')}}">Ingresar</a>
            <br>
            <a class="btn btn-info" href="{{route('form')}}">Formulario Pre-registro</a>
          </div>

        </div>
    </div>
</div>
@endsection
