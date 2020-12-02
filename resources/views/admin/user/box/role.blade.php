@section('box')

    @component('components.modal', ['id' => 'addModal', 'action' => route('user.role.store'), 'title' => __('Create new Role')])

        <div class="form-group">
            <label for="add-name">{{__('Role name')}}</label>
            <input type="text" name="name" class="form-control" id="add-name" placeholder="{{__('Role name')}}" value="{{ old('name') }}" required />
            <small class="form-text text-gray">{{ __('Name must be small latter & Space, spacial character not allow') }}</small>
            @if ($errors->has('name'))
                <small class="form-text text-danger">{{ $errors->first('name') }}</small>
            @endif
        </div>

        <div class="form-group">
            <label for="add-title">{{__('Readable Title')}}</label>
            <input type="text" name="title" class="form-control" id="add-title" placeholder="{{__('Readable Title')}}" value="{{ old('title') }}" required />
            @if ($errors->has('title'))
                <small class="form-text text-danger">{{ $errors->first('name') }}</small>
            @endif
        </div>

    @endcomponent

    <!-- ********************* -->

    @component('components.modal', ['id' => 'ediModal', 'title' => __('Edit Role')])
        @method('PUT')

        <div class="form-group">
            <label for="edi-name">{{__('Role name')}}</label>
            <input type="text" name="name" class="form-control" id="edi-name" placeholder="{{__('Role name')}}" value="{{ old('name') }}" required />
            <small class="form-text text-gray">{{ __('Name must be small latter & Space, spacial character not allow') }}</small>
            @if ($errors->has('name'))
                <small class="form-text text-danger">{{ $errors->first('name') }}</small>
            @endif
        </div>

        <div class="form-group">
            <label for="edi-title">{{__('Readable Title')}}</label>
            <input type="text" name="title" class="form-control" id="edi-title" placeholder="{{__('Readable Title')}}" value="{{ old('title') }}" required />
            @if ($errors->has('title'))
                <small class="form-text text-danger">{{ $errors->first('title') }}</small>
            @endif
        </div>
    @endcomponent


@endsection