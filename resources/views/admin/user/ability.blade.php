@extends('layouts.master')
@section('title')
    {{ __('Role Ability') }}
@endsection

@section('btn')
    @component('components.head-btn')
        <button id="selectAll" class="btn btn-primary" type="button">{{ __('Mark All') }}</button>
        <button id="unSelectAll" class="btn btn-info" type="button">{{ __('Unmark All') }}</button>
        <button class="btn btn-icon btn-success" id="submitForm" type="button">
            <span class="btn-inner--icon"><i class="ni ni-atom"></i></span>
            <span class="btn-inner--text">{{ __('Update') }}</span>
        </button>
    @endcomponent
@endsection


@section('content')

    <div class="row">
        <div class="col">
            @component('components.card')
                @slot('title')
                    {{$role->title}}
                @endslot

                <form id="abForm" action="{{route('user.ability',['id' => $role->id])}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">

                        @foreach($table as $row)
                            @php
                                $isAbility = $role->can($row->name);
                            @endphp
                            <div class="col-md-4 mb-3">
                                <div class="custom-control custom-checkbox">
                                    <input name="role[]" type="checkbox" value="{{$row->id}}" class="custom-control-input" id="checkID{{$row->id}}" {{$isAbility ? 'checked':''}}>
                                    <label class="custom-control-label" for="checkID{{$row->id}}">{{$row->title}}</label>
                                </div>
                            </div>
                        @endforeach

                    </div>

                </form>

            @endcomponent
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript">
        $(function () {

            $('#selectAll').click(function () {
                $('#abForm input:checkbox').prop('checked',true);
            });

            $('#unSelectAll').click(function () {
                $('#abForm input:checkbox').prop('checked',false);
            });

            $('#submitForm').click(function () {
                $('#abForm').submit();
            });


        });

    </script>
@endsection