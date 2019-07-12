@extends('layouts.app')


@section('content')
  <div class="page-content">
    <div class="row">
      <div class="col-xl-12">
        <div class="alert alert-info">
            <h4>CyberWeed!  del 12 al 21 de Julio</h4>
            <p>Mientras esperamos las nuevas variedades del club, estarán en descuento nuestras cepas REMO CHEMO y 2046, para todos nuestros miembros.</p> 
            
            <p>Disfruten su medicina.</p>

        </div>
        <div class="ibox ">
          <div class="ibox-head">
              <div class="ibox-title">Orden activa</div>
              @if($activeOrder && ($activeOrder->status[2]==2))
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
                <div class="col-12 col-md-6">
                  <h5 class="font-strong">Variedades</h5>
                  <ul class="media-list media-list-divider">
                    @foreach ($activeOrder->items as  $item)
                      <li class="media">
                        <a class="media-img" href="javascript:;">
                            <img src="{{$item->batch->img}}" alt="image" width="80">
                        </a>

                          <div class="media-body d-flex row">
                              <div class="flex-1 col-md-12 ">
                                  <div class="media-heading">
                                    {{$item->batch->strain->name}}
                                  </div>

                                  <div class="text-mute">
                                      <span class="mr-4">Cosechada: {{$item->batch->strain->batchesActive->harvested_at}}

                                      </span>

                                  </div>
                                  <div class="text-mute">
                                    <span class="mr-4">Cantidad: {{$item->quantity}}

                                    </span>

                                  </div>


                              </div>

                          </div>
                      </li>
                    @endforeach
                  </ul>
                </div>
                <div class="col-12 col-md-6 well">
                  <h5 class="font-strong">Detalle</h5>
                  <h5>Estado pedido:  <span class="text-mute badge badge-{{$activeOrder->status[1]}} ">{{$activeOrder->status[0]}}</span></h5>
                  <h5>Gramos totales:   <span class=" badge badge-{{$activeOrder->status[1]}}">{{$activeOrder->quantity}}</span></h5>
                  <br />
                  <br />
                </div>
              </div>

              @if($activeOrder->status[2]==2)
              <div class="ibox-footer text-center" >
                <h4>Total a pagar:   <span class=" font-strong  ">{{number_format($activeOrder->amount,0, ',', '.')}}</span></h4>

                <a href="{{route('orders.payflow',[$activeOrder->id])}}" class="text-right btn btn-primary btn-lg m-6">PAGAR ORDEN</a><br />
                <div class="row " style="margin-top:20px;" >
                  <div class="col-4">
                    <img src="https://www.flow.cl/images/logos/webpay.png" class="logoWebpay" alt="logoWebpay" width="100">
                  </div>
                  <div class="col-4">
                    <img src="https://www.flow.cl/images/logos/servipag.png" class="logoWebpay" alt="logoServipag" width="100">
                  </div>
                  <div class="col-4">
                    <img src="https://www.flow.cl/images/medios-de-pago/onepay/onepay.png" class="logoWebpay" alt="logoOnepay" width="100">
                  </div>
                  <div class="col-4">
                    <img src="https://www.flow.cl/images/logos/multicaja.png" class="logoWebpay" alt="logoMulticaja" width="100">
                  </div>
                  <div class="col-4">
                    <img src="https://www.flow.cl/images/medios-de-pago/cryptocompra/cryptocompra.png" class="logoWebpay" alt="logoCryptocompra" width="100">
                  </div>
                </div>
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
