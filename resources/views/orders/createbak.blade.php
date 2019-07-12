@extends('layouts.app')

@section('sidebar')
  @include('layouts.sidebar',['page'=>'ordenes'])
@endsection


@section('content')
  <div class="page-content">
    <div class="row">
      <div class="col-xl-12">
        <div class="ibox ibox-fullheight">
              <div class="ibox-head">
                  <div class="ibox-title">Creando orden para usuario: {{$user->full_name}}</div>
              </div>
              <div class="ibox-body">
                <div class="row">
                    <div class="col-xl-4">
                      @if($user->activeSubscription)
                        <ul class="list-group list-group-divider list-group-full">
                            <li class="list-group-item flexbox">
                                <span class="flexbox"><i class="la la-calendar mr-3 font-40"></i>Periodo</span>
                                {{$user->activeSubscription->subscription_start->format('d/m/Y')}} al {{$user->activeSubscription->subscription_end->format('d/m/Y')}}
                            </li>
                            <li class="list-group-item flexbox">
                                <span class="flexbox"><i class="la la-money mr-3 font-40"></i>Fecha de pago</span>
                                Día {{$user->activeSubscription->subscription_start->format('d')}} de cada mes
                            </li>
                            <li class="list-group-item flexbox">
                                <span class="flexbox"><i class="la la-balance-scale mr-3 font-40"></i>Gramos al mes</span>
                                {{$user->activeSubscription->monthly_quantity}}
                            </li>

                        </ul>
                      @else
                        <div class="alert alert-warning">
                          Usuario sin plan activo
                        </div>
                      @endif
                    </div>
                    <div class="col-sm-8 form-group mb-8">
                      <div class="row">

                        <div class="col-sm-6 form-group mb-6">
                          <label>Variedad</label>
                          <select class="form-control" name="batch_id">
                            @foreach (App\Models\batch::where('status',1)->get() as $batch)
                              <option value="{{$batch->id}}">{{$batch->strain->name}}</option>
                            @endforeach
                          </select>
                        </div>

                        <div class="col-sm-6 form-group mb-6">
                          <label>Cantidad en gramos</label>
                          <input class="form-control" type="text" placeholder="En gramos" name="quantiy">
                        </div>

                        @if(!$user->activeSubscription)
                        <div class="col-sm-6 form-group mb-6">
                          <label>Total a pagar</label>
                          <input class="form-control" type="text" placeholder="En pesos" name="fee">
                        </div>
                        @endif


                      </div>

                    </div>

                </div>
              </div>
        </div>
      </div>

    </div>
</div>
@endsection
