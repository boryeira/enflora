@extends('layouts.app')


@section('content')
  <div class="page-content">
    <div class="row">
      <div class="col-xl-12">
        <div class="ibox ">
          <div class="ibox-body">
            activo
          </div>
        </div>
      </div>
      <div class="col-xl-12">
        <div class="ibox">
            <div class="ibox-body">
                <h5 class="font-strong mb-4">Ordenes antiguas</h5>
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
