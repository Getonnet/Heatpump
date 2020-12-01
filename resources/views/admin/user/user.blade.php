@extends('layouts.master')
@extends('admin.user.box.user')
@section('title')
    Users
@endsection

@section('btn')
    @component('components.head-btn')
        <button class="btn btn-icon btn-primary" type="button" data-toggle="modal" data-target="#addModal">
            <span class="btn-inner--icon"><i class="ni ni-fat-add"></i></span>
            <span class="btn-inner--text">Create New User</span>
        </button>
    @endcomponent
@endsection

@section('content')

    <div class="row">
        <div class="col">
            @component('components.card-table')
                @slot('title')
                    User List
                @endslot

                <table class="table table-flush datatable">
                    <thead class="thead-light">
                        <tr>
                            <th>Photo</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th class="text-right"><i class="fas fa-ellipsis-v"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($table as $row)
                        <tr>
                            <td>
                                <a href="#!" class="avatar avatar-xs rounded-circle">
                                    <img alt="Admin Photo" src="{{asset($row->photo)}}">
                                </a>
                            </td>
                            <td>{{$row->name}}</td>
                            <td>{{$row->email}}</td>
                            <td>{{$row->user_types}}</td>
                            @component('components.action', ['del' => $row->id])
                                <a class="dropdown-item ediBtn" href="{{route('user.update', ['id' => $row->id])}}"
                                    data-name="{{$row->name}}"
                                    data-email="{{$row->email}}"
                                    data-utype="{{$row->user_types}}"
                                   data-toggle="modal" data-target="#ediModal"><i class="fas fa-user-edit text-success"></i> Edit</a>

                                <a class="dropdown-item delBtn" href="{{route('user.destroy', ['id' => $row->id])}}" data-form="delFormID{{$row->id}}" ><i class="fas fa-trash text-danger"></i> Delete</a>
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

                $('#ediModal form').attr('action', url);
                $('#ediModal [name=name]').val(name);
                $('#ediModal [name=email]').val(email);

            });


           $('.datatable').DataTable({
               columnDefs: [
                   { orderable: false, "targets": [0,4] }
               ]
           });

        });

    </script>
@endsection