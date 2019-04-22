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
        <div class="ibox">
          <div class="ibox-head">
              <div class="ibox-title">Subscripcion</div>
          </div>
          <div class="ibox-body">
            <a class="btn btn-info" href="{{route('subscriptions.create',['user'=>$user->id])}}">Nueva subscripcion</a>
            @if($user->activeSubscription)
            <div class="row">
              <div class="col-sm-3">

                {{$user->activeSubscription->status}}
                <ul class="list-group list-group-divider list-group-full">
                    <li class="list-group-item flexbox">
                        <span class="flexbox"><i class="la la-calendar mr-3 font-40"></i>Periodo</span>
                        {{$user->activeSubscription->subscription_start}} / {{$user->activeSubscription->subscription_end}}
                    </li>
                    <li class="list-group-item flexbox">
                        <span class="flexbox"><i class="la la-calendar mr-3 font-40"></i>Fecha de pago</span>
                        Día {{$user->activeSubscription->subscription_start->format('d')}} de cada mes 
                    </li>
                    <li class="list-group-item flexbox">
                        <span class="flexbox"><i class="la la-firefox mr-3 font-40"></i>Cantidad de gramos</span>
                        <span class="badge badge-primary badge-pill">{{$user->activeSubscription->monthly_quantity}}</span>
                    </li>
                    <li class="list-group-item flexbox">
                        <span class="flexbox"><i class="la la-opera mr-3 font-40"></i>Opera</span>
                        <span class="badge badge-pink badge-pill">{{$user->activeSubscription->monthly_quantity}}</span>
                    </li>
                    <li class="list-group-item flexbox">
                        <span class="flexbox"><i class="la la-internet-explorer mr-3 font-40"></i>Internet Explorer</span>
                        <span class="badge badge-info badge-pill">34.7%</span>
                    </li>
                    <li class="list-group-item flexbox">
                        <span class="flexbox"><i class="la la-safari mr-3 font-40"></i>Safari</span>
                        <span class="badge badge-warning badge-pill">34.7%</span>
                    </li>
                </ul>
              </div>
              <div class="col-sm-6">

              </div>
            </div>
          @endif

            {{-- <table class="table">
                <thead>
                    <tr>
                        <th>Estado</th>
                        <th>Cantidad en g</th>
                        <th>Mensualidad</th>
                        <th>Inicio</th>
                        <th>Fin</th>
                        <th>  </th>
                    </tr>
                </thead>
                <tbody>
                  @foreach ($user->subscriptions as $subs)
                    <tr>
                        <td>{{$subs->status}}</td>
                        <td>{{$subs->monthly_quantity}}</td>
                        <td>${{number_format($subs->monthly_fee,0,',','.')}}</td>
                        <td>{{$subs->subscription_start}}</td>
                        <td>{{$subs->subscription_end}}</td>
                        <td></td>

                    </tr>
                  @endforeach


                </tbody>
            </table> --}}
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
