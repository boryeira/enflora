@extends('layouts.app')

@section('sidebar')
  @include('layouts.sidebar',['page'=>'lotes'])
@endsection


@section('content')
<div class="page-content ">
  <div class="ibox ibox-fullheight">
        <div class="ibox-head">
            <div class="ibox-title">Ingreso de lote</div>
        </div>
        <form class="form-info" action="{{route('lotes.store')}}" method="POST">
           <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
            <div class="ibox-body">
                <div class="row">
                    <div class="col-sm-6 form-group mb-6">
                        <label>Fecha</label>
                        <input class="form-control" type="date"  name="date">
                    </div>
                    <div class="col-sm-6 form-group mb-6">
                        <label>Codigo</label>
                        <input class="form-control" type="text" placeholder="00" name="code">
                    </div>
                    <div class="col-sm-6 form-group mb-6">
                      <label>Variedad</label>
                      <select class="form-control" name="strain">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                        </select>
                    </div>
                    <div class="col-sm-6 form-group mb-6">
                      <label>Cantidad en gramos</label>
                      <input class="form-control" type="text" placeholder="en gramos" name="quantiy">
                    </div>

                </div>

                {{-- <div class="form-group mb-0">
                    <label>Estado</label>
                    <div>
                        <label class="radio radio-inline radio-info">
                            <input type="radio" name="status" checked="" value="0">
                            <span class="input-span"></span>Activo</label>
                        <label class="radio radio-inline radio-info">
                            <input type="radio" name="consumed" value="1">
                            <span class="input-span"></span>Consumido</label>
                    </div>
                </div> --}}
            </div>
            <div class="ibox-footer">
                <button class="btn btn-info mr-2" type="submit">Agregar</button>
                <button class="btn btn-secondary" type="reset">Cancelar</button>
            </div>
        </form>
    </div>
</div>
@endsection
