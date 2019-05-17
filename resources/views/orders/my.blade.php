@extends('layouts.app')


@section('content')
  <div class="page-content">
    <div class="row">
      <div class="col-xl-12">
        <div class="ibox ">
          <div class="ibox-head">
              <div class="ibox-title">Orden activa</div>
              <div class="ibox-tools">
                  <button class="btn btn-danger" data-toggle="dropdown"><i class="ti-trash"></i></button>
              </div>
          </div>
          <div class="ibox-body">
            @if($activeOrder)
              <div class="row">

                <div class="col-12 col-md-6 well">
                  <h5 class="font-strong">Detalles</h5>
                  Estado pedido :  <span class="badge badge-{{$activeOrder->status[1]}} ">{{$activeOrder->status[0]}}</span><br />
                  Gramos totales :  <span class=" ">{{$activeOrder->quantity}}</span><br />
                  Total a pagar :  <span class=" ">{{$activeOrder->quantity}}</span><br />
                  <br />
                  <br />
                </div>
                <div class="col-12 col-md-6">
                  <h5 class="font-strong">Variedades</h5>
                  <ul class="media-list media-list-divider">
                    @foreach ($activeOrder->items as  $item)
                      <li class="media">
                        <a class="media-img" href="javascript:;">
                            <img src="{{$item->lote->img}}" alt="image" width="100">
                        </a>

                          <div class="media-body d-flex row">
                              <div class="flex-1 col-md-6 ">
                                  <div class="media-heading">
                                    {{$item->lote->strain->name}}
                                  </div>

                                  <div class="text-mute">
                                      <span class="mr-4">Cosechada: {{$item->lote->strain->lotesActive->harvested_at}}

                                      </span>

                                  </div>
                              </div>
                              <div class="text-right col-md-6" >
                                <h4 class="font-strong float-right text-right">{{$item->quantity}}<sub>gs</sub></h4>
                              </div>
                          </div>
                      </li>
                    @endforeach
                  </ul>
                </div>
              </div>


            @else
              <div class="text-center">
                <p>Sin orden activa</p>
                <a class="btn btn-success" href="{{route('orders.create')}}">Hacer pedido</a>
              </div>

            @endif
          </div>
          @if($activeOrder->status[2]==1)
          <div class="ibox-footer bg-{{$activeOrder->status[1]}}">
            Orden pendiente en espera de aprobacion por parte del club. Al momento de ser aprovada sera informado via correo electronico.
          </div>
          @endif
          @if($activeOrder->status[2]==2)
          <div class="ibox-footer bg-{{$activeOrder->status[1]}}">
            <a href="{{route('order.payflow',['order'=>$activeOrder->id])}}" class="text-right btn btn-primary">Pagar orden</a><br /> <span class="mr-4" >
              Orden aceptada para realizar pago. Solo se aceptan pagos mediate la plataforma FLOW.CL
            </apan>
          </div>
          @endif
          @if($activeOrder->status[2]==3)
          <div class="ibox-footer bg-{{$activeOrder->status[1]}}">
            <span class="mr-4" >
              Pago realizado con exito. Uno de nuestros miembros se contactara con usted para coordinar la entrega.
            </apan>
          </div>
          @endif
        </div>
      </div>
      <div class="col-xl-12">
        <div class="ibox">
            <div class="ibox-body">
                <h5 class="font-strong mb-4">Ordenes antiguas</h5>
                <div class="table-responsive ">
                    <table class="table table-hover" id="datatable">
                        <thead class="thead-default ">
                            <tr>
                                <th>Order ID</th>
                                <th>Gramos</th>
                                <th>Total</th>
                                <th>Entregado</th>
                                <th class="no-sort"></th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach($oldOrders as $order)
                            <tr>
                                <td>
                                  <a href="javascript:;">{{$order->id}}</a>
                                </td>
                                <td>
                                  <a href="javascript:;">{{$order->id}}</a>
                                </td>
                                <td>
                                  {{$order->quantity}}
                                </td>
                                <td>
                                    <span class="badge badge-success badge-pill">{{$order->status}}</span>
                                </td>

                                <td>17.05.2018</td>
                                <td>
                                    <a class="text-muted font-16" href="javascript:;"><i class="ti-trash"></i></a>
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
</div>
@endsection

@section('js')
  <script>
    window.onload = function() {
      $(document).ready( function () {
        $('#datatable').DataTable({
            pageLength: 10,
            fixedHeader: true,
            responsive: true,
            "sDom": 'rtip',
            columnDefs: [{
                targets: 'no-sort',
                orderable: false
            }]
        });

        // var table = $('#datatable').DataTable();
        // $('#key-search').on('keyup', function() {
        //     table.search(this.value).draw();
        // });
        // $('#type-filter').on('change', function() {
        //     table.column(4).search($(this).val()).draw();
        // });

      });
    };

  </script>
@endsection
