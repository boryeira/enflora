@extends('layouts.app')


@section('content')

   {{-- ordenes activas  --}}
    <div class="row">
      <div class="col-xl-12">
        <div class="ibox">
            <div class="ibox-body">
                <h5 class="font-strong mb-4">Ordenes</h5>
                {{-- <div class="flexbox mb-4">
                    <div class="flexbox">
                        <label class="mb-0 mr-2">Type:</label>
                        <select class="selectpicker show-tick form-control" id="type-filter" title="Please select" data-style="btn-solid" data-width="150px">
                            <option value="">All</option>
                            <option>Shipped</option>
                            <option>Completed</option>
                            <option>Pending</option>
                            <option>Canceled</option>
                        </select>
                    </div>
                    <div class="input-group-icon input-group-icon-left mr-3">
                        <span class="input-icon input-icon-right font-16"><i class="ti-search"></i></span>
                        <input class="form-control form-control-rounded form-control-solid" id="key-search" type="text" placeholder="Search ...">
                    </div>
                </div> --}}
                <div class="table-responsive row">
                    <table class="table table-bordered table-hover" id="datatable">
                        <thead class="thead-default thead-lg">
                            <tr>
                                <th>Order ID</th>
                                <th>Usuario medicinal</th>
                                <th>Gramos</th>
                                <th>Total</th>
                                <th>Estado</th>
                                <th class="no-sort" width="5%"></th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach($orders->where('status','!=',4) as $order)
                            <tr>
                                <td>
                                  <a href="javascript:;">#{{$order->id}}</a>
                                </td>
                                <td>
                                  <a href="javascript:;">{{$order->user->full_name}}</a>
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
                    @foreach($orders->where('status','!=',4) as $order)
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
                                          <th>Lote</th>
                                          <th>Variedad</th>
                                          <th>Gramos</th>
                                      </tr>
                                  </thead>
                                  <tbody >
                                    @foreach ($order->items as $key => $item)
                                      <tr>
                                        <td>
                                          {{$item->lote->code}}
                                        </td>
                                        <td>
                                          {{$item->lote->strain->name}}
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
                                <a type="button" class="btn btn-danger" href="{{route('order.status',['order'=>$order->id])}}?stage=2" >Aceptar orden</a>
                              @endif
                              @if($order->status[2]==2)
                                <a type="button" class="btn btn-danger" href="{{route('order.paymail',['order'=>$order->id])}}" >Enviar mail de pago</a>
                              @endif
                              @if($order->status[2]==3)
                                <a type="button" class="btn btn-success" href="{{route('order.status',['order'=>$order->id])}}?stage=4" >entregado</a>
                              @endif
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
    {{-- ordenes pasadas  --}}


@endsection
