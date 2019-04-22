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
        <form class="form-info" action="{{route('subscriptions.store',['user'=>$user->id])}}" method="POST" enctype="multipart/form-data">
           <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
            <div class="ibox-body">
                <div class="row">
                    <div class="col-sm-6 form-group mb-6">
                        <label>Fecha inicio</label>
                        <input class="form-control" type="date"  name="subscription_start" required>
                    </div>
                    <div class="col-sm-6 form-group mb-6">
                      <label>Cantidad de gs</label>
                      <input class="form-control" type="number" name="monthly_quantity" required>
                    </div>
                    <div class="col-sm-6 form-group mb-6">
                        <label>Valor mensual</label>
                        <input class="form-control" type="number"  name="monthly_fee" required>
                    </div>
                    <div class="col-sm-6 form-group mb-6">
                      <label>Reseta medica</label>
                      <input type="file" name="file" class="form-control" >
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
