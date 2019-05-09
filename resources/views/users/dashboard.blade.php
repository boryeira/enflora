@extends('layouts.app')

{{-- @section('sidebar')
  @include('layouts.sidebar',['page'=>'dashboard'])
@endsection --}}


@section('content')
<div class="page-content">
  <div class="row">
    <div class="col-lg-4">

    </div>
    <div class="col-lg-8">
      <div class="row">
        @foreach ($lotes as $lote)
        <div class="col-sm-12 col-md-6 col-lx-4 ">
          <div class="card card-air text-center centered mb-4" style="max-width:320px;">
                <div class="card-body">
                    <div class="card-avatar mt-3 mb-4">
                        <img class="img-circle" src="{{$lote->img}}" alt="image">
                    </div>
                    <h4 class="card-title mb-1">{{$lote->strain->name}}</h4>
                    <div class="text-primary">Cosechada: {{$lote->harvested_at}}</div>
                    <div class="text-primary"><i class="ti-location-pin mr-2"></i>Curicó</div>
                    {{-- <p class="mt-4 mb-4">Some quick example text to build on the card title and make up the bulk of the card's content.</p> --}}

                    <div class="d-flex justify-content-around align-items-center">
                        <a class="btn btn-success btn-rounded mr-2" href="{{route('orders .create')}}">
                            <span class="btn-icon"><i class="la la-plus"></i>Ordenar</span>
                        </a>
                        <button class="btn btn-secondary btn-rounded">
                            <span class="btn-icon"><i class="la la-info"></i>Detalles</span>
                        </button>
                    </div>
                </div>
            </div>
          </div>
        @endforeach
      </div>

    </div>



  </div>
</div>
@endsection
