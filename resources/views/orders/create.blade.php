@extends('layouts.app')


@section('content')
  <div class="page-content">
    <form class="form" action="{{route('orders.store')}}" method="POST">
      <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
    <div class="row">
      <div class="col-lg-12">
        <div class="ibox ibox-fullheight">
            <div class="ibox-body">

                <ul class="media-list media-list-divider">
                  @foreach (App\Models\Strain::all() as $strain)
                    @if($strain->lotesActive)
                    <li class="media">
                        <a class="media-img pr-4" href="javascript:;">
                            <img src="{{$strain->lotesActive->img}}" alt="image" width="120">
                        </a>
                        <div class="media-body d-flex">
                            <div class="flex-1">
                                <h5 class="media-heading">
                                    <a href="article.html">{{$strain->name}}</a>
                                </h5>
                                <p class="font-13 text-light">Cillum in incididunt reprehenderit qui reprehenderit nulla ut sint</p>
                                <div class="font-13">
                                    <span class="mr-4">Cosechada:
                                        <a class="text-success" href="javascript:;">{{$strain->lotesActive->storage_at}}</a>
                                    </span>

                                </div>
                            </div>
                            <div class="text-right" style="width:100px;">

                                <div class="form-group">
                                  <input name="{{$strain->lotesActive->code}}" class="form-control mb-2 mr-sm-2" type="number" value="0"></input>
                                  <span class="mb-1 font-strong text-primary">gs</span>
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
