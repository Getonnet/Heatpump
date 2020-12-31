
@extends('layouts.master')
@extends('admin.user.box.role')
@section('title')
    {{ __('User Role') }}
@endsection

@can('role-create')
    @section('btn')
        @component('components.head-btn')
            <button class="btn btn-icon btn-primary" type="button" data-toggle="modal" data-target="#addModal">
                <span class="btn-inner--icon"><i class="ni ni-fat-add"></i></span>
                <span class="btn-inner--text">{{__('Create New Role')}}</span>
            </button>
        @endcomponent
    @endsection
@endcan

@section('content')

    <div class="row">
        <div class="col">
            @component('components.card-table')
                @slot('title')
                    {{ __('User Role List') }}
                @endslot

                <table class="table table-flush datatable">
                    <thead class="thead-light">
                    <tr>
                        <th>{{__('Role Name')}}</th>
                        <th>{{__('Readable Title')}}</th>
                        <th class="text-right"><i class="fas fa-ellipsis-v"></i></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($table as $row)
                        <tr>
                            <td>{{$row->name}}</td>
                            <td>{{$row->title}}</td>
                            @component('components.action', ['del' => $row->id])
                                @if($row->name == 'superadmin')
                                    <a class="dropdown-item" href="#">{{ __('Default Role') }}</a>
                                    <a class="dropdown-item" href="#">{{ __('Update Not Possible') }}</a>
                                    @else
                                    @can('role-edit')
                                    <a class="dropdown-item ediBtn" href="{{route('user.role.update', ['id' => $row->id])}}"
                                       data-name="{{$row->name}}"
                                       data-title="{{$row->title}}"
                                       data-toggle="modal" data-target="#ediModal"><i class="fas fa-user-edit text-success"></i> {{ __('Edit') }}</a>

                                    <a class="dropdown-item" href="{{route('user.role.show', ['id' => $row->id])}}"><i class="ni ni-check-bold text-info"></i>  {{__('Role Ability')}}</a>
                                    @endcan
                                    @can('role-del')
                                    <a class="dropdown-item delBtn" href="{{route('user.role.destroy', ['id' => $row->id])}}" data-form="delFormID{{$row->id}}" ><i class="fas fa-trash text-danger"></i>  {{__('Delete')}}</a>
                                    @endcan
                                @endif

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
                let title = $(this).data('title');

                $('#ediModal form').attr('action', url);
                $('#ediModal [name=name]').val(name);
                $('#ediModal [name=title]').val(title);

            });


            $('.datatable').DataTable({
                columnDefs: [
                    { orderable: false, "targets": [2] }
                ]
            });

        });

    </script>
@endsection