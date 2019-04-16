@extends('layouts.app')

@section('sidebar')
  @include('layouts.sidebar',['page'=>'dashboard'])
@endsection


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    hola
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
