@extends('layouts.app')

@section('sidebar')
  @include('layouts.sidebar',['page'=>'usuarios'])
@endsection


@section('content')
  <div class="page-content">
   {{-- ordenes activas  --}}
    <div class="row">
      <div class="col-xl-12">
        activas
      </div>

    </div>
    {{-- ordenes pasadas  --}}

    <div class="row">
      <div class="col-xl-12">
        no activas

      </div>

    </div>
</div>
@endsection
