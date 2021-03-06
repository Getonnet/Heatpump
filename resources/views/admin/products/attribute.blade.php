
@extends('layouts.master')
@extends('admin.products.box.attribute')
@section('title')
    {{ __('Product Attribute') }}
@endsection

@can('attr-create')
    @section('btn')
        @component('components.head-btn')
            <button class="btn btn-icon btn-primary" type="button" data-toggle="modal" data-target="#addModal">
                <span class="btn-inner--icon"><i class="ni ni-fat-add"></i></span>
                <span class="btn-inner--text">{{__('Create New Attribute')}}</span>
            </button>
        @endcomponent
    @endsection
@endcan
@section('content')

    <div class="row">
        <div class="col-md-6">
            @component('components.card-table')
                @slot('title')
                    {{ __('Product Attribute List') }}
                @endslot

                <table class="table table-flush datatable">
                    <thead class="thead-light">
                    <tr>
                        <th>{{__('Attribute Name')}}</th>
                        <th class="text-right"><i class="fas fa-ellipsis-v"></i></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($table as $row)
                        <tr>
                            <td>{{$row->name}}</td>
                            @component('components.action', ['del' => $row->id])
                                @can('attr-edit')
                                <a class="dropdown-item ediBtn" href="{{route('product.attribute.update', ['id' => $row->id])}}"
                                   data-name="{{$row->name}}"
                                   data-toggle="modal" data-target="#ediModal"><i class="fas fa-user-edit text-success"></i> {{ __('Edit') }}</a>
                                @endcan
                                @can('attr-del')
                                <a class="dropdown-item delBtn" href="{{route('product.attribute.destroy', ['id' => $row->id])}}" data-form="delFormID{{$row->id}}" ><i class="fas fa-trash text-danger"></i>  {{__('Delete')}}</a>
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

                $('#ediModal form').attr('action', url);
                $('#ediModal [name=name]').val(name);
            });


            $('.datatable').DataTable({
                columnDefs: [
                    { orderable: false, "targets": [1] }
                ]
            });

        });

    </script>
@endsection