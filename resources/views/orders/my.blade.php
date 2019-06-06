@extends('layouts.app')


@section('content')
  <div class="page-content">
    <div class="row">
      <div class="col-xl-12">
        <div class="ibox ">
          <div class="ibox-head">
              <div class="ibox-title">Orden activa</div>
              @if($activeOrder)
              <div class="ibox-tools">

                  <form id="formeliminar" action="{{route('orders.destroy',['order'=>$activeOrder->id])}}" method="POST" >
                    {{ method_field('DELETE') }}
                    <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
                      <button class="btn btn-danger" id="eliminar"  type="submit" ><i class="ti-trash"></i></button>
                  </form>
              </div>
              @endif

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
              @if($activeOrder->status[2]==1)
              <div class="ibox-footer bg-{{$activeOrder->status[1]}}">
                Orden pendiente en espera de aprobacion por parte del club.<br /> Al momento de ser aprovada sera enviado un correo electronico de cobro.
              </div>
              @endif
              @if($activeOrder->status[2]==2)
              <div class="ibox-footer bg-{{$activeOrder->status[1]}}">
                <a href="{{Url($activeOrder->flow_url)}}" class="text-right btn btn-primary">Pagar orden</a><br /> <span class="mr-4" >
                  Orden aceptada para realizar pago. Solo se aceptan pago en linea.
                </apan>
              </div>
              @endif
              @if($activeOrder->status[2]==3)
              <div class="ibox-footer bg-{{$activeOrder->status[1]}}">
                <span class="mr-4" >
                  Orden pagada, uno de nuestros miembros se contactara con usted para coordinar la entrega.
                </apan>
              </div>
              @endif

            @else
              <div class="text-center">
                <p>Sin orden activa</p>
                <a class="btn btn-success" href="{{route('orders.create')}}">Hacer pedido</a>
              </div>

            @endif
          </div>

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

                                <th>Gramos</th>
                                <th>Total</th>
                                <th>Fecha entrega</th>

                            </tr>
                        </thead>
                        <tbody>
                          @foreach($oldOrders as $order)
                            <tr>

                                <td>
                                  {{$order->quantity}}
                                </td>
                                <td>
                                  {{$order->amount}}
                                </td>
                                <td>
                                    {{$order->delivery_date}}
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
        $('#eliminar').click(function(e) {
          e.preventDefault();
          swal("Seguro desea eliminar la orden?")
          .then((value) => {
            if(value){
              $( "#formeliminar" ).submit();
            }
          });
        });



      });
    };

  </script>
@endsection
