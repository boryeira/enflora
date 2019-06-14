@extends('layouts.app')


@section('content')

   {{-- ordenes activas  --}}
    <div class="row">
      <div class="col-xl-12">
        <div class="ibox">
            <div class="ibox-body">
                <h5 class="font-strong mb-4">Ordenes activas</h5>

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
                          @foreach($activeOrder as $order)
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
                    @foreach($activeOrder as $order)
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
    {{-- ordenes pasadas  --}}
    {{-- ordenes activas  --}}
     <div class="row">
       <div class="col-xl-12">
         <div class="ibox">
             <div class="ibox-body">
                 <h5 class="font-strong mb-4">Ordenes entregadas</h5>

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
                           @foreach($oldOrders as $order)
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
                     @foreach($oldOrders as $order)
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
                                 <a type="button" class="btn btn-danger" href="{{route('order.paymail',['order'=>$order->id])}}" >Enviar mail de pago</a>
                               @endif
                               @if($order->status[2]==3)
                                 <a type="button" class="btn btn-success" href="{{route('order.status',['order'=>$order->id])}}?stage=4" >entregado</a>
                               @endif
                               <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
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

@section('js')
  <script>
    window.onload = function() {
      $(document).ready( function () {
        $('.orderdelete').click(function(e) {
          e.preventDefault();
          var form = $(this).parents('form');
          swal("Seguro desea eliminar la orden?")
          .then((value) => {
            if(value){
              form.submit();
            }
          });
        });



      });
    };

  </script>
@endsection
