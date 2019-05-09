@extends('layouts.app')

@section('sidebar')
  @include('layouts.sidebar',['page'=>'users'])
@endsection


@section('content')
  <div class="page-content">
    <div class="row">
      <div class="col-xl-12">
        <div class="ibox">
          <div class="ibox-body">
          {{$user->first_name}}

          </div>
        </div>
      </div>
      <div class="col-xl-4">
        <div class="ibox">
          <div class="ibox-head">
              <div class="ibox-title">Subscripcion {{$user->activeSubscription->subscription_start->format('d-m-Y')}} al {{$user->activeSubscription->subscription_end->format('d-m-Y')}}</div>
              <div class="ibox-tools">
                  <a class="btn btn-primary btn-sm" href="{{route('subscriptions.create',['user'=>$user->id])}}">Nueva</a>
              </div>
          </div>
          <div class="ibox-body">

            @if($user->activeSubscription)

                <ul class="list-group list-group-divider list-group-full">
                    <li class="list-group-item flexbox">
                        <span class="flexbox"><i class="la la-calendar mr-3 font-40"></i>Fecha de pago</span>
                        Día {{$user->activeSubscription->subscription_start->format('d')}} de cada mes
                    </li>
                    <li class="list-group-item flexbox">
                        <span class="flexbox"><i class="la la-money mr-3 font-40"></i>Mensualidad</span>
                        {{$user->activeSubscription->monthly_fee}}
                    </li>
                    <li class="list-group-item flexbox">
                        <span class="flexbox"><i class="la la-balance-scale mr-3 font-40"></i>Gramos al mes</span>
                        {{$user->activeSubscription->monthly_quantity}}
                    </li>

                </ul>


          @else
            <div class="row">
              sin subscripcion activa
            </div>

          @endif
          @if($user->activeSubscription)
          <table class="table">
              <thead>
                  <tr>
                      <th>N cuota</th>
                      <th>Periodo</th>
                      <th>Estado</th>
                      <th>Consumido/total</th>
                  </tr>
              </thead>
              <tbody>
                @foreach ($user->activeSubscription->dues as $due)
                  <tr>
                      <td>{{$due->due}}</td>
                      <td>{{$due->start->format('d/m/Y')}} al {{$due->end->format('d/m/Y')}}</td>
                      <td>Pendiente</td>
                      <td>{{$due->consumed}}/{{$due->quantity}}</td>
                  </tr>
                @endforeach
              </tbody>
          </table>
          @endif
          </div>
        </div>
      </div>
      <div class="col-xl-8">
        <div class="ibox">
          <div class="ibox-head">
              <div class="ibox-title">Ordenes</div>
              <div class="ibox-tools">
                  <a class="btn btn-primary btn-sm" href="{{route('orders.create',['user'=>$user->id])}}">Nueva</a>
              </div>
          </div>
          <div class="ibox-body">
            {{-- @if($user->activeSubscription)
            <table class="table">
                <thead>
                    <tr>
                        <th>N cuota</th>
                        <th>Periodo</th>
                        <th>Estado</th>
                        <th>Consumido/total</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach ($user->activeSubscription->dues as $due)
                    <tr>
                        <td>{{$due->due}}</td>
                        <td>{{$due->start->format('d/m/Y')}} al {{$due->end->format('d/m/Y')}}</td>
                        <td>Pendiente</td>
                        <td>{{$due->consumed}}/{{$due->quantity}}</td>
                    </tr>
                  @endforeach
                </tbody>
            </table>
            @else
              <div class="row">
                sin subscripcion activa
              </div>

            @endif --}}
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
