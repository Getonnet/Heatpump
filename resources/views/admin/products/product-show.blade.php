@extends('layouts.master')
@extends('admin.products.box.product-attr')
@section('title')
    View Product
@endsection

@section('btn')
    @component('components.head-btn')
        <button class="btn btn-icon btn-primary" type="button" data-toggle="modal" data-target="#addModal">
            <span class="btn-inner--icon"><i class="ni ni-fat-add"></i></span>
            <span class="btn-inner--text">{{__('Add new attribute')}}</span>
        </button>
    @endcomponent
@endsection


@section('content')

    <div class="row">
        <div class="col">
            @component('components.card')
                @slot('title')
                    Product Details
                @endslot

                <div class="row">
                    <div class="col">
                        <div class="card">
                            <!-- Card image -->
                            <img class="card-img-top" src="{{asset($table->photo)}}" alt="Image placeholder">
                            <div class="card-body">
                                <h3 class="card-title mb-3">{{$table->name}}</h3>
                                <table class="table align-items-center table-flush">
                                    <tr>
                                        <th>{{__('Type')}}</th>
                                        <td>{{$table->product_types}}</td>
                                    </tr>
                                    <tr>
                                        <th>{{__('Category')}}</th>
                                        <td>{{$table->productCategory->name ?? ''}}</td>
                                    </tr>
                                    <tr>
                                        <th>{{__('Brand')}}</th>
                                        <td>{{$table->productBrand->name ?? ''}}</td>
                                    </tr>
                                    <tr>
                                        <th>{{__('Noise Level')}}</th>
                                        <td>{{$table->noise_level}}</td>
                                    </tr>
                                    <tr>
                                        <th>{{__('Capacity')}}</th>
                                        <td>{{$table->capacity}}</td>
                                    </tr>
                                    <tr>
                                        <th>{{__('Price')}}</th>
                                        <td>{{$table->price}}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <table class="table align-items-center table-flush">
                            <tr>
                                <th>{{__('Type')}}</th>
                                <td>{{$table->product_types}}</td>
                                <td class="text-right"><a href="#" class="btn btn-sm btn-instagram btn-icon-only">
                                        <span class="btn-inner--icon"><i class="fas fa-trash"></i></span>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <th>{{__('Category')}}</th>
                                <td>{{$table->productCategory->name ?? ''}}</td>
                                <td class="text-right"><a href="#" class="btn btn-sm btn-instagram btn-icon-only">
                                        <span class="btn-inner--icon"><i class="fas fa-trash"></i></span>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <th>{{__('Brand')}}</th>
                                <td>{{$table->productBrand->name ?? ''}}</td>
                                <td class="text-right"><a href="#" class="btn btn-sm btn-instagram btn-icon-only">
                                        <span class="btn-inner--icon"><i class="fas fa-trash"></i></span>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <th>{{__('Noise Level')}}</th>
                                <td>{{$table->noise_level}}</td>
                                <td class="text-right"><a href="#" class="btn btn-sm btn-instagram btn-icon-only">
                                        <span class="btn-inner--icon"><i class="fas fa-trash"></i></span>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <th>{{__('Capacity')}}</th>
                                <td>{{$table->capacity}}</td>
                                <td class="text-right"><a href="#" class="btn btn-sm btn-instagram btn-icon-only">
                                        <span class="btn-inner--icon"><i class="fas fa-trash"></i></span>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <th>{{__('Price')}}</th>
                                <td>{{$table->price}}</td>
                                <td class="text-right"><a href="#" class="btn btn-sm btn-instagram btn-icon-only">
                                        <span class="btn-inner--icon"><i class="fas fa-trash"></i></span>
                                    </a>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>

            @endcomponent
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript">

    </script>
@endsection