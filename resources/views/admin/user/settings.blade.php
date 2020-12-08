@extends('layouts.master')
@section('title')
    {{__('Profile Settings')}}
@endsection



@section('content')

    <div class="row justify-content-md-center">
        <div class="col-md-5 col-xs-6">
            @component('components.card')

                <div class="card-body">
                    <a href="#!">
                        <img class="rounded-circle img-center img-fluid shadow shadow-lg--hover" style="width: 140px;" src="{{asset($table->photo)}}" alt="Admin Image">
                    </a>

                    <hr />

                    <form action="{{route('user.update', ['id' => $table->id])}}" method="post" class="needs-validation" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="edi-name">{{__('User name')}}</label>
                            <input type="text" name="name" class="form-control" id="edi-name" placeholder="{{__('User name')}}" value="{{ $table->name }}" required />
                            @if ($errors->has('name'))
                                <small class="form-text text-danger">{{ $errors->first('name') }}</small>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="edi-email">{{__('Email address')}}</label>
                            <input type="email" name="email" class="form-control" id="edi-email" placeholder="{{__('Email address')}}" value="{{ $table->email }}" required />
                            @if ($errors->has('email'))
                                <small class="form-text text-danger">{{ $errors->first('email') }}</small>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="edi-password">{{__('Password')}}</label>
                            <input type="password" name="password" class="form-control" id="edi-password" placeholder="{{__('Password')}}" />
                            @if ($errors->has('password'))
                                <small class="form-text text-danger">{{ $errors->first('password') }}</small>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="edi-repassword">{{__('Confirm Password')}}</label>
                            <input type="password" name="password_confirmation" class="form-control" id="edi-repassword" placeholder="{{__('Confirm Password')}}" />
                        </div>

                        <div class="form-group">
                            <label for="edi-role">{{__('Select Role')}}</label>
                            <select name="role" class="form-control" id="edi-role">
                                <option value="">{{__('Select Role')}}</option>
                                @foreach($roles as $row)
                                    <option value="{{$row->id}}">{{$row->title}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="edi-photo">{{__('Photo')}}</label>
                            <input type="file" name="photo" class="form-control" id="edi-photo" accept="image/x-png,image/gif,image/jpeg" />
                            @if ($errors->has('photo'))
                                <small class="form-text text-danger">{{ $errors->first('photo') }}</small>
                            @endif
                        </div>
                        <button class="btn btn-primary" type="submit">Submit form</button>
                    </form>
                </div>


            @endcomponent
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript">
        $(function () {
            $('#edi-role').val("{{$table->roles->id}}");
        });
    </script>
@endsection