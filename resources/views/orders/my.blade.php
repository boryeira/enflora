@extends('layouts.app')


@section('content')
  <div class="page-content">
    <div class="row">
      <div class="col-xl-12">
        <div class="ibox ">
          <div class="ibox-head">
              <div class="ibox-title">Orden activa</div>
          </div>
          <div class="ibox-body">
            @if(Auth::user()->activeOrder)
              <ul class="media-list media-list-divider">
                @foreach (Auth::user()->activeOrder->items as  $item)
                  <li class="media">
                      <div class="media-body d-flex row">
                          <div class="flex-1 col-md-6 ">
                              <h5 class="media-heading">
                                  <a href="article.html">{{$item->lote->strain->name}}</a>
                              </h5>
                              <p class="font-13 text-light">Cillum in incididunt reprehenderit qui reprehenderit nulla ut sint</p>
                              <div class="font-13">
                                  <span class="mr-4">Cosechada:
                                      <div class="text-success" >{{$item->lote->strain->lotesActive->harvested_at}}</div>
                                  </span>

                              </div>
                          </div>
                          <div class="text-right col-md-6" >

                              <div class="form-group">
                                <input name="{{$item->lote->strain->lotesActive->code}}" style="heigth:100%" value="0">
                                <span class="mb-1 font-strong text-primary">cuantos gs</span>
                              </div>

                          </div>
                      </div>
                  </li>
                @endforeach
              </ul>
            @else
              <p>Sin orden activa</p>
            @endif
          </div>
        </div>
      </div>
      <div class="col-xl-12">
        <div class="ibox">
            <div class="ibox-body">
                <h5 class="font-strong mb-4">Ordenes antiguas</h5>
                <div class="table-responsive row">
                    <table class="table table-bordered table-hover" id="datatable">
                        <thead class="thead-default thead-lg">
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
