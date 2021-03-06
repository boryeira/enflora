@extends('layouts.app')


@section('content')

    {{-- <div class="row">

        @foreach ($batches as $batch)
        <div class="col-sm-12 col-md-6 col-lx-4 ">
          <div class="card card-air text-center centered mb-4">
                <div class="card-body">
                    <div class="card-avatar mt-3 mb-4">
                        <img class="img-circle" src="{{$batch->img}}" alt="image">
                    </div>
                    <h4 class="card-title mb-1">{{$batch->strain->name}}</h4>
                    <div class="text-primary"><i class="ti-location-pin mr-2"></i>Curicó</div>
                    <p class="mt-4 mb-4">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <div class="d-flex align-items-center justify-content-between mb-5">
                        <div class="text-center">
                            <h2 class="text-primary m-0">1200</h2>
                            <div class="text-muted">FOLLOWERS</div>
                        </div>
                        <div class="text-center">
                            <h2 class="text-primary m-0">480</h2>
                            <div class="text-muted">LIKES</div>
                        </div>
                        <div class="text-center">
                            <h2 class="text-primary m-0">14.2k</h2>
                            <div class="text-muted">VIEWS</div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-around align-items-center">
                        <button class="btn btn-primary btn-rounded mr-2">
                            <span class="btn-icon"><i class="la la-star"></i>Ordenar</span>
                        </button>
                         <button class="btn btn-secondary btn-rounded">
                            <span class="btn-icon"><i class="la la-envelope"></i>Message</span>
                        </button>
                    </div>
                </div>
            </div>
          </div>
        @endforeach
      </div> --}}

    <div class="row">
      <div class="col-xl-12">
        <div class="ibox">
            <div class="ibox-head">
                <div class="ibox-title">Lotes activos</div>
                <div class="ibox-tool"><a class="btn btn-primary" href="{{route('batches.create')}}">Nuevo batch</a></div>
            </div>
            <div class="ibox-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Codigo</th>
                            <th>Variedad</th>
                            <th>Disponible</th>
                            <th>Fecha batch</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach ($batches as $batch)
                        <tr>
                            <td>{{$batch->code}}</td>
                            <td>{{$batch->strain_id}}</td>
                            <td>{{($batch->quantity)-($batch->consumed)}}/{{$batch->quantity}}</td>
                            <td>{{$batch->storage_at}}</td>
                            <td>
                                <a href="{{route('batches.show',['batch'=>$batch->id])}}" class="btn btn-primary btn-icon-only btn-sm btn-air"><i class="ti-eye"></i></a>
                                <a class="btn btn-info btn-icon-only btn-sm btn-air" href="{{route('batches.edit',['batch'=>$batch->id])}}"><i class="ti-pencil"></i></a>
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

@endsection
