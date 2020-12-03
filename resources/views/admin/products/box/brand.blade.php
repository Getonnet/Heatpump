@section('box')

    @component('components.modal', ['id' => 'addModal', 'action' => route('product.brand.store'), 'title' => __('Create new Brand')])

        <div class="form-group">
            <label for="add-name">{{__('Brand name')}}</label>
            <input type="text" name="name" class="form-control" id="add-name" placeholder="{{__('Brand name')}}" value="{{ old('name') }}" required />
            @if ($errors->has('name'))
                <small class="form-text text-danger">{{ $errors->first('name') }}</small>
            @endif
        </div>

        <div class="form-group">
            <label for="edi-photo">{{__('Photo')}}</label>
            <input type="file" name="photo" class="form-control" id="edi-photo" accept="image/x-png,image/gif,image/jpeg" />
            @if ($errors->has('photo'))
                <small class="form-text text-danger">{{ $errors->first('photo') }}</small>
            @endif
        </div>

    @endcomponent

    <!-- ********************* -->

    @component('components.modal', ['id' => 'ediModal', 'title' => __('Edit Brand')])
        @method('PUT')

        <div class="form-group">
            <label for="edi-name">{{__('Brand name')}}</label>
            <input type="text" name="name" class="form-control" id="edi-name" placeholder="{{__('Brand name')}}" value="{{ old('name') }}" required />
            @if ($errors->has('name'))
                <small class="form-text text-danger">{{ $errors->first('name') }}</small>
            @endif
        </div>

        <div class="form-group">
            <label for="edi-photo">{{__('Brand Photo')}}</label>
            <input type="file" name="photo" class="form-control" id="edi-photo" accept="image/x-png,image/gif,image/jpeg" />
            @if ($errors->has('photo'))
                <small class="form-text text-danger">{{ $errors->first('photo') }}</small>
            @endif
        </div>
    @endcomponent


@endsection