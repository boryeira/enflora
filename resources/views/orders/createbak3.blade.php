@extends('layouts.app')


@section('content')
  <div class="page-content">
    <form class="form" action="{{route('orders.store')}}" method="POST">
      <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
    <div class="row">
      <div class="col-lg-12">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="ibox ibox-fullheight">
            <div class="ibox-body">

                <ul class="media-list media-list-divider">
                  @foreach (App\Models\Strain::all() as $strain)
                    @if($strain->batchesActive)
                    <li class="media">
                        <a class="media-img " >
                            <img src="{{$strain->batchesActive->img}}" alt="image" width="120">
                        </a>
                        <div class="media-body d-flex row">
                            <div class="flex-1 col-md-6 ">
                                <h5 class="media-heading">
                                    <a href="article.html">{{$strain->name}}</a>
                                </h5>
                                <p class="font-13 text-light">Cillum in incididunt reprehenderit qui reprehenderit nulla ut sint</p>
                                <div class="font-13">
                                    <span class="mr-4">Cosechada:
                                        <a class="text-success" href="javascript:;">{{$strain->batchesActive->harvested_at}}</a>
                                    </span>

                                </div>
                            </div>
                            <div class="text-right col-md-6" >

                                <div class="form-group">
                                  <input name="{{$strain->batchesActive->code}}" style="heigth:100%" value="0">
                                  <span class="mb-1 font-strong text-primary">cuantos gs</span>
                                </div>

                            </div>
                        </div>
                    </li>
                    @endif
                  @endforeach

                </ul>

            </div>
        </div>
      </div>
      <div class="col-lg-12 text-center">
        <button class="btn btn-success">Ordenar</button>
      </div>
    </div>
    </form>
  </div>
@endsection

@section('css')
  <link href="{{ asset('css/jquery.bootstrap-touchspin.css') }}" rel="stylesheet">
  <style>
    .bootstrap-touchspin input {
      height: 100% !important;
    }
  </style>
@endsection

@section('js')
  <script src="{{ asset('js/jquery.bootstrap-touchspin.js') }}" defer></script>

  <script defer>
  window.onload = function() {

    $( document ).ready(function() {
      @foreach (App\Models\Strain::all() as $strain)
        @if($strain->batchesActive)
        $("input[name='{!!$strain->batchesActive->code!!}']").TouchSpin({
            buttondown_class: 'btn btn-secondary ',
            buttonup_class: 'btn btn-secondary ',
            min: 0,
            max: 30,
        });
        @endif
      @endforeach

    });
  };

  </script>
@endsection
