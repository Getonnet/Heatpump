@section('box')

    @component('components.modal', ['id' => 'addModal', 'action' => route('user.store'), 'title' => 'Create new user'])
        <div class="form-group">
            <label for="add-name">{{__('User name')}}</label>
            <input type="text" name="name" class="form-control" id="add-name" placeholder="{{__('User name')}}" value="{{ old('name') }}" required />
            @if ($errors->has('name'))
                <small class="form-text text-danger">{{ $errors->first('name') }}</small>
            @endif
        </div>

        <div class="form-group">
            <label for="add-email">{{__('Email address')}}</label>
            <input type="email" name="email" class="form-control" id="add-email" placeholder="{{__('Email address')}}" value="{{ old('email') }}" required />
            @if ($errors->has('email'))
                <small class="form-text text-danger">{{ $errors->first('email') }}</small>
            @endif
        </div>

        <div class="form-group">
            <label for="add-password">{{__('Password')}}</label>
            <input type="password" name="password" class="form-control" id="add-password" placeholder="{{__('Password')}}" required />
            @if ($errors->has('password'))
                <small class="form-text text-danger">{{ $errors->first('password') }}</small>
            @endif
        </div>

        <div class="form-group">
            <label for="add-repassword">{{__('Confirm Password')}}</label>
            <input type="password" name="password_confirmation" class="form-control" id="add-repassword" placeholder="{{__('Confirm Password')}}" required />
        </div>

        <div class="form-group">
            <label for="add-photo">{{__('Photo')}}</label>
            <input type="file" name="photo" class="form-control" id="add-photo" accept="image/x-png,image/gif,image/jpeg" />
            @if ($errors->has('photo'))
                <small class="form-text text-danger">{{ $errors->first('photo') }}</small>
            @endif
        </div>

    @endcomponent

<!-- ********************* -->

    @component('components.modal', ['id' => 'ediModal', 'title' => 'Edit user'])
        @method('PUT')
        <div class="form-group">
            <label for="edi-name">{{__('User name')}}</label>
            <input type="text" name="name" class="form-control" id="edi-name" placeholder="{{__('User name')}}" value="{{ old('name') }}" required />
            @if ($errors->has('name'))
                <small class="form-text text-danger">{{ $errors->first('name') }}</small>
            @endif
        </div>

        <div class="form-group">
            <label for="edi-email">{{__('Email address')}}</label>
            <input type="email" name="email" class="form-control" id="edi-email" placeholder="{{__('Email address')}}" value="{{ old('email') }}" required />
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
            <label for="edi-photo">{{__('Photo')}}</label>
            <input type="file" name="photo" class="form-control" id="edi-photo" accept="image/x-png,image/gif,image/jpeg" />
            @if ($errors->has('photo'))
                <small class="form-text text-danger">{{ $errors->first('photo') }}</small>
            @endif
        </div>

    @endcomponent


@endsection