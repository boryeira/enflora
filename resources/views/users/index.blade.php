@extends('layouts.app')

@section('sidebar')
  @include('layouts.sidebar',['page'=>'dashboard'])
@endsection


@section('content')
  <div class="page-content">
    <div class="row">
      <div class="col-xl-12">
        <div class="ibox">
            <div class="ibox-head">
                <div class="ibox-title">Usuarios</div>
            </div>
            <div class="ibox-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Rut</th>
                            <th>Email</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach ($users as $user)
                        <tr>
                            <td>{{$user->first_name}}</td>
                            <td>{{$user->last_name}}</td>
                            <td>{{$user->rut}}</td>
                            <td>{{$user->email}}</td>
                            <td>
                              <a class="btn btn-primary btn-icon-only btn-sm btn-air" href="{{route('users.show',['user'=>$user->id])}}"><i class="ti-eye"></i></a>
                              <a class="btn btn-info btn-icon-only btn-sm btn-air"><i class="ti-pencil"></i></a>
                              <a class="btn btn-danger btn-icon-only btn-sm btn-air"><i class="ti-trash"></i></a>
                            </td>
                        </tr>
                      @endforeach


                    </tbody>
                </table>
            </div>
        </div>
      </div>

    </div>
</div>
@endsection
