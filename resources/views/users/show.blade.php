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
          <div class="ibox-body">
            <a class="btn btn-info" href="{{route('users.subscription.create',['user'=>$user->id])}}">Nueva subscripcion</a>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
