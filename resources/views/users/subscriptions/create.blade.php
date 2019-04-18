@extends('layouts.app')

@section('sidebar')
  @include('layouts.sidebar',['page'=>'usuarios'])
@endsection


@section('content')
<div class="page-content ">
  <div class="ibox ibox-fullheight">
        <div class="ibox-head">
            <div class="ibox-title">Ingreso Usuario</div>
        </div>
        <form class="form-info" action="{{route('users.subscription.store',['user'=>$user->id])}}" method="POST" enctype="multipart/form-data">
           <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
            <div class="ibox-body">
                <div class="row">
                    <div class="col-sm-6 form-group mb-6">
                        <label>Inicio</label>
                        <input class="form-control" type="date"  name="date">
                    </div>
                    <div class="col-sm-6 form-group mb-6">
                      <label>Cantidad de gs</label>
                      <input class="form-control" type="text" name="amount">
                    </div>
                    <div class="col-sm-6 form-group mb-6">
                        <label>Valor mensual</label>
                        <input class="form-control" type="email"  name="fee">
                    </div>
                    <div class="col-sm-6 form-group mb-6">
                      <label>Reseta medica</label>
                      <input type="file" name="file" class="form-control">
                    </div>

                </div>

            </div>
            <div class="ibox-footer">
                <button class="btn btn-info mr-2" type="submit">Agregar</button>
                <button class="btn btn-secondary" type="reset">Cancelar</button>
            </div>
        </form>
    </div>
</div>
@endsection
