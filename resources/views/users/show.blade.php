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
        <div class="ibox">
          <div class="ibox-body">
              <div class="table-responsive row">
                  <table class="table table-bordered table-hover" id="datatable">
                      <thead class="thead-default thead-lg">
                          <tr>
                              <th>Order ID</th>
        
                              <th>Gramos</th>
                              <th>Total</th>
                              <th>Estado</th>
                              <th class="no-sort" width="5%"></th>
                          </tr>
                      </thead>
                      <tbody>
                        @foreach($user->orders as $order)
                          <tr>
                              <td>
                                <a href="javascript:;">#{{$order->id}}</a>
                              </td>
        
                              <td>
                                {{$order->quantity}}g
                              </td>
                              <td>
                                ${{$order->amount}}
                              </td>
                              <td>
                                  <span class="badge badge-{{$order->status[1]}} ">{{$order->status[0]}}</span>
                              </td>
                                  {{--
                              <td>{{$order->delivered_at || '--'}}</td> --}}
                              <td>
                                  <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal{{$order->id}}"><i class="fa fa-info"></i></button>
                              </td>
                          </tr>
                          <!-- The Modal -->
        
        
                        @endforeach
        
                      </tbody>
                  </table>
                  @foreach($user->orders  as $order)
                    <div class="modal" id="myModal{{$order->id}}">
                      <div class="modal-dialog">
                        <div class="modal-content">
        
                          <!-- Modal Header -->
                          <div class="modal-header">
                            <h4 class="modal-title">Detalle orden</strong> </h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                          </div>
        
                          <!-- Modal body -->
                          <div class="modal-body">
                            <table class="table table-bordered table-hover" id="datatable">
                                <thead class="thead-default thead-lg">
                                    <tr>
                                        <th>batch</th>
                                        <th>Variedad</th>
                                        <th>Gramos</th>
                                    </tr>
                                </thead>
                                <tbody >
                                  @foreach ($order->items as $key => $item)
                                    <tr>
                                      <td>
                                        {{$item->batch->code}}
                                      </td>
                                      <td>
                                        {{$item->batch->strain->name}}
                                      </td>
                                      <td>
                                        {{$item->quantity}}
                                      </td>
                                    </tr>
                                  @endforeach
        
                                </tbody>
                            </table>
        
                          </div>
        
                          <!-- Modal footer -->
                          <div class="modal-footer">
        
                            @if($order->status[2]==1)
                              <a type="button" class="btn btn-primary" href="{{route('order.paymail',['order'=>$order->id])}}" >Enviar mail de pago</a>
                              <form id="formeliminar{{$order->id}}" action="{{route('orders.destroy',['order'=>$order->id])}}" method="POST" >
                                {{ method_field('DELETE') }}
                                <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
                                  <button class="btn btn-danger orderdelete"   type="submit" ><i class="ti-trash"></i>Eliminar</button>
                              </form>
                            @endif
                            @if($order->status[2]==2)
                              <form id="formeliminar{{$order->id}}" action="{{route('orders.destroy',['order'=>$order->id])}}" method="POST" >
                                {{ method_field('DELETE') }}
                                <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
                                  <button class="btn btn-danger orderdelete"   type="submit" ><i class="ti-trash"></i>Eliminar</button>
                              </form>
                            @endif
                            @if($order->status[2]==3)
                              <a type="button" class="btn btn-success" href="{{route('order.status',['order'=>$order->id])}}?stage=4" >entregado</a>
                            @endif
        
                          </div>
        
                        </div>
                      </div>
                    </div>
                  @endforeach
        
                </div>
          </div>
        </div>


      </div>
  </div>
</div>
@endsection
