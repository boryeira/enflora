@extends('layouts.app')


@section('content')
  <div class="page-content">
    <div class="row">
      <div class="col-lg-3" >
        <div class="ibox">
          <div class="ibox-head">
            <div class="ibox-title">
              Miembro
            </div>
            <div class="ibox-tools">
                <a class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-ellipsis-h"></i></a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item"><i class="ti-pencil-alt mr-2"></i>Editar</a>
                    <a class="dropdown-item"><i class="ti-close mr-2"></i>Remover</a>
                </div>
            </div>
          </div>
          <div class="ibox-body">
            <ul class="media-list media-list-divider scroller" data-height="470px" style="overflow: hidden; width: auto; height: 470px;">
                <li class="media py-3">
                    <div class="media-img">
                        <span class="btn-icon-only btn-circle bg-primary-50 text-primary"><i class="fa fa-user"></i></span>
                    </div>
                    <div class="media-body">
                      <div class="font-13 text-light">Nombre</div>
                      <div class="media-heading">{{$user->full_name}}</div>
                    </div>
                </li>
                <li class="media py-3">
                    <div class="media-img">
                        <span class="btn-icon-only btn-circle bg-primary-50 text-primary"><i class="fa fa-address-card"></i></span>
                    </div>
                    <div class="media-body">
                      <div class="font-13 text-light">Rut</div>
                      <div class="media-heading">{{$user->rut}}</div>
                    </div>
                </li>
                <li class="media py-3">
                    <div class="media-img">
                        <span class="btn-icon-only btn-circle bg-primary-50 text-primary"><i class="fa fa-at"></i></span>
                    </div>
                    <div class="media-body">
                      <div class="font-13 text-light">Email</div>
                      <div class="media-heading">{{$user->email}}</div>
                    </div>
                </li>
                <li class="media py-3">
                    <div class="media-img">
                        <span class="btn-icon-only btn-circle bg-primary-50 text-primary"><i class="fa fa-phone"></i></span>
                    </div>
                    <div class="media-body">
                      <div class="font-13 text-light">Telefono</div>
                      <div class="media-heading">{{$user->phone}}</div>
                    </div>
                </li>
                <li class="media py-3">
                    <div class="media-img">
                        <span class="btn-icon-only btn-circle bg-primary-50 text-primary"><i class="fa fa-file"></i></span>
                    </div>
                    <div class="media-body">
                      <div class="font-13 text-light">Receta</div>
                      <small class="float-right text-muted ml-2"><a class="btn btn-primary btn-sm" href={{$user->recipe}}>ver receta</a></small>

                    </div>
                </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-md-9" >

      </div>
  </div>
</div>
@endsection
