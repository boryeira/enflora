@extends('layouts.app')


@section('content')
  <div class="page-content">


    <form class="form" action="{{route('orders.store')}}" method="POST">
      <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
      @if ($errors->any())
        <div class="row">
          <div class="col-sm-12" >
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
          </div>
        </div>
      @endif
      @if (Auth::user()->role_id == 1)
        <div class="row">
          <div class="col-12">
            <div class="ibox">
              <div class="ibox-body">
                <label>seleccionar usuario</label>
                <select class="form-control" name="user">
                  @foreach (App\Models\User::all() as  $user)
                    <option value="{{$user->id}}">{{$user->full_name}}</option>
                  @endforeach
                </select>
              </div>
            </div>

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
                  <h4 class="card-title mb-1">{{$lote->strain->name}}</h4>
                  <div class="text-primary">Cosechada: {{$lote->harvested_at}}</div>
                  <div class="text-primary"><i class="ti-location-pin mr-2"></i>Curicó</div>
                  {{-- <p class="mt-4 mb-4">Some quick example text to build on the card title and make up the bulk of the card's content.</p> --}}
                  <br/>

                  <div class="card-footer text-muted">
                    <input class="form-control orderInput" name="{{$lote->code}}" style="heigth:50%" value="0" type="number" data-price="{{$lote->price}}">

                  </div>
              </div>
            </div>
          </div>
        @endforeach

      </div>
      <footer class="fixed-bottom text-center">
      <div class="bg-primary">
        <button class="btn btn-info btn-block btn-air" type="submit">ORDENAR: <span id="order_value">0</span> gs - TOTAL: $<span id="order_price">0</span></button>
      </div>

      </footer>

    </form>
  </div>

@endsection

@section('css')

@endsection

@section('js')
  <script src="{{ asset('js/jquery.bootstrap-touchspin.js') }}" defer></script>

  <script defer>
  window.onload = function() {

    $( document ).ready(function() {

      $('.orderInput').bind('input', function() {
        var totalPoints = 0;
        var totalPrice = 0;
        $('.orderInput').each(function(){
          if($(this).val()=='')$(this).val(0);

              totalPoints = parseFloat($(this).val()) + totalPoints;
              totalPrice = parseFloat($(this).val())*$(this).data('price') + totalPrice;
        });
        $('#order_value').text(totalPoints);
        $('#order_price').text(totalPrice);
      });

    });
  };

  </script>
@endsection
