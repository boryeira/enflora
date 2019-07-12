@extends('layouts.app')


@section('content')
<div class="row">
    <div class="col-xl-3">
        <div class="ibox ibox-fullheight">
            <div class="ibox-head">
                <div class="ibox-title">batch # {{$batch->id}}    </div>
                <div class="tools"><a class="btn btn-info" href="{{route('batches.edit',['batch'=>$batch->id])}}">Editar</a></div>
            </div>
            <div class="ibox-body">
                    <span class="badge badge-{{$batch->status[1]}}">{{$batch->status[0]}}</span>
                <ul class="media-list media-list-divider mr-2 scroller" data-height="580px" style="overflow: hidden; width: auto; height: 580px;">
                    <li class="media align-items-center">
                        <div class="media-body d-flex align-items-center">
                            <div class="flex-1">
                                <div class="media-heading">Codigo</div>
                                <div class="text-muted">{{$batch->code}} </div>
                            </div>
                           
                        </div>
                    </li>
                    <li class="media align-items-center">
                        <div class="media-body d-flex align-items-center">
                            <div class="flex-1">
                                <div class="media-heading">Variedad</div>
                                <div class="text-muted">{{$batch->strain->name}} </div>
                            </div>
                           
                        </div>
                    </li>
                    <li class="media align-items-center">
                        <div class="media-body d-flex align-items-center">
                            <div class="flex-1">
                                <div class="media-heading">Gramos</div>
                                <div class="text-muted">{{($batch->quantity)-($batch->consumed)}}/ {{$batch->quantity}}</div>
                            </div>
                           
                        </div>
                    </li>
                    <li class="media align-items-center">
                        <div class="media-body d-flex align-items-center">
                            <div class="flex-1">
                                <div class="media-heading">Total vendido</div>
                                <div class="text-muted">${{number_format($batch->orderItems()->sum('amount'),0, ',', '.')}} </div>
                            </div>
                           
                        </div>
                    </li>
                    <li class="media align-items-center">
                        <div class="media-body d-flex align-items-center">
                            <div class="flex-1">
                            <img src="{{$batch->img}}">
                            </div>
                           
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-xl-9">
        <div class="ibox ibox-fullheight">
            <div class="ibox-head">
                <div class="ibox-title">batch # {{$batch->id}} </div>
            </div>
            <div class="ibox-body">
                <div class="table-responsive row">
                    <table class="table table-bordered table-hover" id="datatable">
                        <thead class="thead-default thead-lg">
                            <tr>
                                <th>Usuario medicinal</th>
                                <th>Gramos</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach($batch->orderItems as $orderItem)
                            <tr>
                                <td>
                                  <a href="javascript:;">{{$orderItem->order->user->full_name}}</a>
                                </td>
                                <td>
                                  {{$orderItem->quantity}}g
                                </td>
                                <td>
                                  ${{$orderItem->amount}}
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
