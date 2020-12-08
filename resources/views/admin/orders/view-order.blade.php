@extends('layouts.master')
@section('title')
    View Order
@endsection

@section('btn')
    @component('components.head-btn')
        <a href="{{route('orders.index')}}" class="btn btn-icon btn-warning" type="button">
            <span class="btn-inner--icon"><i class="ni ni-bold-left"></i></span>
            <span class="btn-inner--text">Back to order list</span>
        </a>
    @endcomponent
@endsection

@section('content')
    <div class="row">
        <div class="col">
            @component('components.card')

                <div class="row">
                    <div class="col">
                        <p class="m-0"><b>S/N:</b> {{$table->id}}</p>
                        <p class="m-0"><b>Date:</b> {{$table->reg_date}}</p>
                        <p class="m-0"><b>Status:</b>
                            <form id="statusForm" action="{{route('orders.update', ['id' => $table->id])}}" method="post">
                                @csrf
                                @method('PUT')
                                <select name="status" id="status">
                                    <option value="Pending">Pending</option>
                                    <option value="Processing">Processing</option>
                                    <option value="Canceled">Canceled</option>
                                </select>
                            </form>

                        </p>
                    </div>
                    <div class="col">
                        <p class="m-0"><b>Name:</b> {{$table->name}}</p>
                        <p class="m-0"><b>Contact:</b> {{$table->contact}}</p>
                        <p class="m-0"><b>Email:</b> {{$table->email}}</p>
                        <p class="m-0"><b>Address:</b> {{$table->address}} - {{$table->zip_code}}</p>
                    </div>
                    <div class="col">
                        <p class="m-0"><b>Area Size:</b> {{$table->area_info}}</p>
                        <p class="m-0"><b>Insulation Condition:</b> {{$table->insulated}}</p>
                        <p class="m-0"><b>Wall Type:</b> {{$table->wall_type}}</p>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <hr />
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>{{__('Item Description')}}</th>
                                    <th>{{__('Price')}}</th>
                                    <th>{{__('Quantity')}}</th>
                                    <th class="text-right">{{__('Total')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $items = $table->orderItems()->get();
                                @endphp
                                @foreach($items as $row)
                                    <tr>
                                        <td>{{$row->product->name ?? ''}}</td>
                                        <td>{{$row->price}}</td>
                                        <td>{{$row->qty}}</td>
                                        <td class="text-right">{{$row->price * $row->qty}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr class="text-primary">
                                    <th class="text-right" colspan="3">{{__('Sub Total')}}</th>
                                    <th class="text-right">{{$table->totalAmount()}}</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>

            @endcomponent
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript">
        $(function () {
            $('#status').val("{{$table->status}}");

            $('#status').change(function () {
                $('#statusForm').submit();
            });
        });
    </script>
@endsection