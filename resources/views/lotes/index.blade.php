@extends('layouts.app')

@section('sidebar')
  @include('layouts.sidebar',['page'=>'lotes'])
@endsection


@section('content')
  <div class="page-content">
    <div class="row">
      <div class="col-xl-12">
        <div class="ibox">
            <div class="ibox-head">
                <div class="ibox-title">Lotes activos</div>
            </div>
            <div class="ibox-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Codigo</th>
                            <th>Variedad</th>
                            <th>Disponible</th>
                            <th>Fecha lote</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach ($lotes as $lote)
                        <tr>
                            <td>{{$lote->code}}</td>
                            <td>{{$lote->strain_id}}</td>
                            <td>{{($lote->quantity)-($lote->consumed)}}/{{$lote->quantity}}</td>
                            <td>{{$lote->storage_at}}</td>
                            <td>
                              <a href="{{route('lotes.show',['lote'=>$lote->id])}}" class="btn btn-primary btn-icon-only btn-sm btn-air"><i class="ti-eye"></i></a>
                              <a class="btn btn-info btn-icon-only btn-sm btn-air"><i class="ti-plus"></i></a>
                              <a class="btn btn-danger btn-icon-only btn-sm btn-air"><i class="ti-trash"></i></a>
                            </td>
                        </tr>
                      @endforeach


                    </tbody>
                </table>
            </div>
        </div>
      </div>

    </div>
</div>
@endsection
