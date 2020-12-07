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

                            @php
                                $attrs = $table->productAttributes()->get();
                            @endphp

                            @foreach($attrs as $row)

                                <tr>
                                    <th>{{$row->attribute->name ?? ''}}</th>
                                    <td>{{$row->attr_value}}</td>
                                    <td class="text-right">
                                        <a href="{{route('product.del-attribute', ['id' => $row->id])}}" class="btn btn-sm btn-danger btn-icon-only" onclick="event.preventDefault();
                                                     document.getElementById('delFormID{{$row->id}}').submit();">
                                            <span class="btn-inner--icon"><i class="fas fa-trash"></i></span>
                                        </a>

                                        <form id="delFormID{{$row->id}}"  action="{{route('product.del-attribute', ['id' => $row->id])}}" method="POST" style="display: none;">
                                            @csrf
                                            @method('Delete')
                                        </form>
                                    </td>
                                </tr>

                            @endforeach

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