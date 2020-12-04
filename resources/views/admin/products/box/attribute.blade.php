@section('box')

    @component('components.modal', ['id' => 'addModal', 'action' => route('product.attribute.store'), 'title' => __('Create new Attribute')])

        <div class="form-group">
            <label for="add-name">{{__('Attribute name')}}</label>
            <input type="text" name="name" class="form-control" id="add-name" placeholder="{{__('Attribute name')}}" value="{{ old('name') }}" required />
            @if ($errors->has('name'))
                <small class="form-text text-danger">{{ $errors->first('name') }}</small>
            @endif
        </div>

    @endcomponent

    <!-- ********************* -->

    @component('components.modal', ['id' => 'ediModal', 'title' => __('Edit Attribute')])
        @method('PUT')

        <div class="form-group">
            <label for="edi-name">{{__('Attribute name')}}</label>
            <input type="text" name="name" class="form-control" id="edi-name" placeholder="{{__('Attribute name')}}" value="{{ old('name') }}" required />
            @if ($errors->has('name'))
                <small class="form-text text-danger">{{ $errors->first('name') }}</small>
            @endif
        </div>

    @endcomponent


@endsection