
@extends('layouts.master')
@extends('admin.products.box.product')
@section('title')
    {{ __('Product List') }}
@endsection

@section('btn')
    @component('components.head-btn')
        <button class="btn btn-icon btn-primary" type="button" data-toggle="modal" data-target="#addModal">
            <span class="btn-inner--icon"><i class="ni ni-fat-add"></i></span>
            <span class="btn-inner--text">{{__('Add New Product')}}</span>
        </button>
    @endcomponent
@endsection

@section('content')

    <div class="row">
        <div class="col">
            @component('components.card-table')
                @slot('title')
                    {{ __('Product List') }}
                @endslot

                <table class="table table-flush datatable">
                    <thead class="thead-light">
                    <tr>
                        <th>{{__('Photo')}}</th>
                        <th>{{__('Name')}}</th>
                        <th>{{__('Type')}}</th>
                        <th>{{__('Category')}}</th>
                        <th>{{__('Brand')}}</th>
                        <th>{{__('Price')}}</th>
                        <th class="text-right"><i class="fas fa-ellipsis-v"></i></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($table as $row)
                        <tr>
                            <td>
                                <a href="#!" class="avatar avatar-xs">
                                    <img alt="Admin Photo" src="{{asset($row->photo)}}">
                                </a>
                            </td>
                            <td>{{$row->name}}</td>
                            <td>{{$row->product_types}}</td>
                            <td>{{$row->productCategory->name ?? ''}}</td>
                            <td>{{$row->productBrand->name ?? ''}}</td>
                            <td>{{$row->price}}</td>
                            @component('components.action', ['del' => $row->id])
                                <a class="dropdown-item ediBtn" href="{{route('product.update', ['id' => $row->id])}}"
                                   data-name="{{$row->name}}"
                                   data-ptypes="{{$row->product_types}}"
                                   data-category="{{$row->product_categories_id}}"
                                   data-brand="{{$row->product_brands_id}}"
                                   data-price="{{$row->price}}"
                                   data-noise="{{$row->noise_level}}"
                                   data-capacity="{{$row->capacity}}"
                                   data-toggle="modal" data-target="#ediModal"><i class="fas fa-user-edit text-success"></i> {{ __('Edit') }}</a>
                                <a class="dropdown-item" href="{{route('product.show', ['id' => $row->id])}}"><i class="fas fa-eye text-info"></i> {{ __('Add Attribute') }}</a>
                                <a class="dropdown-item delBtn" href="{{route('product.destroy', ['id' => $row->id])}}" data-form="delFormID{{$row->id}}" ><i class="fas fa-trash text-danger"></i>  {{__('Delete')}}</a>
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
                let product_types = $(this).data('ptypes');
                let product_categories_id = $(this).data('category');
                let product_brands_id = $(this).data('brand');
                let price = $(this).data('price');
                let noise_level = $(this).data('noise');
                let capacity = $(this).data('capacity');

                $('#ediModal form').attr('action', url);
                $('#ediModal [name=name]').val(name);
                $('#ediModal [name=product_types]').val(product_types);
                $('#ediModal [name=product_categories_id]').val(product_categories_id);
                $('#ediModal [name=product_brands_id]').val(product_brands_id);
                $('#ediModal [name=price]').val(price);
                $('#ediModal [name=noise_level]').val(noise_level);
                $('#ediModal [name=capacity]').val(capacity);
            });


            $('.datatable').DataTable({
                columnDefs: [
                    { orderable: false, "targets": [0,6] }
                ]
            });

        });

    </script>
@endsection