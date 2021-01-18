@extends('layouts.master')
@extends('admin.customer.box.customer')
@section('title')
    {{ __('Order Request List') }}
@endsection


@section('content')

    <div class="row">
        <div class="col">
            @component('components.card-table')
                @slot('title')
                    {{ __('Order Request List') }}
                @endslot

                <table class="table table-flush datatable">
                    <thead class="thead-light">
                    <tr>
                        <th>{{__('Date')}}</th>
                        <th>{{__('Name')}}</th>
                        <th>{{__('Email')}}</th>
                        <th>{{__('Phone')}}</th>
                        <th>{{__('Address')}}</th>
                        <th>{{__('Area')}}</th>
                        <th class="text-right"><i class="fas fa-ellipsis-v"></i></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($table as $row)
                        <tr>
                            <td>{{$row->reg_date}}</td>
                            <td>{{$row->name}}</td>
                            <td>{{$row->email}}</td>
                            <td>{{$row->contact}}</td>
                            <td>{{$row->address}}-{{$row->zip_code}}</td>
                            <td>{{$row->area_info}} m<sup>2</sup></td>
                            @component('components.action', ['del' => $row->id])
                                @can('order-del')
                                    <a class="dropdown-item delBtn" href="{{route('orders.destroy', ['id' => $row->id])}}" data-form="delFormID{{$row->id}}" ><i class="fas fa-trash text-danger"></i>  {{__('Delete')}}</a>
                                @endcan
                            @endcomponent
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endcomponent
        </div>
    </div>

@endsection

@section('script')
    <script type="text/javascript">
        $(function () {

            $('.ediBtn').click(function (e) {
                e.preventDefault();

                let url = $(this).attr('href');
                let name = $(this).data('name');
                let email = $(this).data('email');
                let phone = $(this).data('phone');
                let address = $(this).data('address');
                let zip_code = $(this).data('zip');

                $('#ediModal form').attr('action', url);
                $('#ediModal [name=name]').val(name);
                $('#ediModal [name=email]').val(email);
                $('#ediModal [name=phone]').val(phone);
                $('#ediModal [name=address]').val(address);
                $('#ediModal [name=zip_code]').val(zip_code);

            });

            $('.datatable').DataTable({
                columnDefs: [
                    { orderable: false, "targets": [6] }
                ]
            });

        });

    </script>
@endsection