@extends('layouts.app')



@section('content')

  <div class="ibox ibox-fullheight">
        <div class="ibox-head">
            <div class="ibox-title">Ingreso de Lote</div>
        </div>
        <form class="form-info" action="{{route('batches.store')}}" method="POST" enctype="multipart/form-data">
           <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
            <div class="ibox-body">
                <div class="row">
                    <div class="col-sm-6 form-group mb-6">
                        <label>Fecha cosecha</label>
                        <input class="form-control" type="date"  name="harvest">
                    </div>
                    <div class="col-sm-6 form-group mb-6">
                        <label>Fecha enfrascado</label>
                        <input class="form-control" type="date"  name="storage">
                    </div>
                    <div class="col-sm-6 form-group mb-6">
                        <label>Codigo</label>
                        <input class="form-control" type="text" placeholder="00" name="code">
                    </div>
                    <div class="col-sm-6 form-group mb-6">
                      <label>Variedad</label>
                      <select class="form-control" name="strain">
                        @foreach (App\Models\Strain::all() as $strain)
                          <option value="{{$strain->id}}">{{$strain->name}}</option>
                        @endforeach


                        </select>
                    </div>
                    <div class="col-sm-6 form-group mb-6">
                      <label>Cantidad en gramos</label>
                      <input class="form-control" type="number" placeholder="en gramos" name="quantity">
                    </div>
                    <div class="col-sm-6 form-group mb-6">
                      <label>Valor por gramos</label>
                      <input class="form-control" type="number" placeholder="en gramos" name="price">
                    </div>
                    <div class="col-sm-12 form-group mb-12">
                      <label>Descripcion</label>
                      <textarea class="form-control" name="details"></textarea>
                    </div>
                    <div class="col-sm-6 form-group mb-6">
                      <label>Imagen:</label>
                      <input type="file" name="img"   >
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

@endsection

@section('css')

@endsection

@section('js')

@endsection
