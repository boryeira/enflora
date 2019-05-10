@extends('layouts.app')


@section('content')
  <div class="page-content">


    <form class="form" action="{{route('orders.store')}}" method="POST">
      <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
      @if ($errors->any())
        <div class="row">
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
        </div>
      @endif

      <div class="row">
        @foreach (App\Models\Lote::where('status',1)->get() as $lote)
          <div class="col-sm-12  col-md-6 	col-lg-4 	col-xl-3">
            <div class="card card-air text-center centered mb-4">
              <div class="rel">
                  <img class="card-img-top" src="{{$lote->img}}" alt="image">

              </div>

              <div class="card-body">
                  {{-- <div class="card-avatar mt-3 mb-4">
                      <img class="img-circle" src="{{$lote->img}}" alt="image">
                  </div> --}}
                  <h4 class="card-title mb-1">{{$lote->strain->name}}</h4>
                  <div class="text-primary">Cosechada: {{$lote->harvested_at}}</div>
                  <div class="text-primary"><i class="ti-location-pin mr-2"></i>Curicó</div>
                  {{-- <p class="mt-4 mb-4">Some quick example text to build on the card title and make up the bulk of the card's content.</p> --}}
                  <br/>

                  <div class="card-footer text-muted">
                    <input class="form-control" name="{{$lote->code}}" style="heigth:50%" value="0" type="number">
                  </div>
              </div>
            </div>
          </div>
        @endforeach

      </div>

    </form>
  </div>
  <footer class="fixed-bottom">
    hola
  </footer>
@endsection

@section('css')

@endsection

@section('js')
  <script src="{{ asset('js/jquery.bootstrap-touchspin.js') }}" defer></script>

  <script defer>
  window.onload = function() {

    $( document ).ready(function() {

    });
  };

  </script>
@endsection
