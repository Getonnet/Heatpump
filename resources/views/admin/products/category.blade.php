
@extends('layouts.master')
@extends('admin.products.box.category')
@section('title')
    {{ __('Product Category') }}
@endsection

@section('btn')
    @component('components.head-btn')
        <button class="btn btn-icon btn-primary" type="button" data-toggle="modal" data-target="#addModal">
            <span class="btn-inner--icon"><i class="ni ni-fat-add"></i></span>
            <span class="btn-inner--text">{{__('Create New Category')}}</span>
        </button>
    @endcomponent
@endsection

@section('content')

    <div class="row">
        <div class="col-md-6">
            @component('components.card-table')
                @slot('title')
                    {{ __('Product Category List') }}
                @endslot

                <table class="table table-flush datatable">
                    <thead class="thead-light">
                    <tr>
                        <th>{{__('Category Name')}}</th>
                        <th class="text-right"><i class="fas fa-ellipsis-v"></i></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($table as $row)
                        <tr>
                            <td>{{$row->name}}</td>
                            @component('components.action', ['del' => $row->id])
                                <a class="dropdown-item ediBtn" href="{{route('product.category.update', ['id' => $row->id])}}"
                                   data-name="{{$row->name}}"
                                   data-toggle="modal" data-target="#ediModal"><i class="fas fa-user-edit text-success"></i> {{ __('Edit') }}</a>
                                <a class="dropdown-item delBtn" href="{{route('product.category.destroy', ['id' => $row->id])}}" data-form="delFormID{{$row->id}}" ><i class="fas fa-trash text-danger"></i>  {{__('Delete')}}</a>
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