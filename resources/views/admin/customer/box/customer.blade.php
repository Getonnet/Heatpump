@section('box')

    @component('components.modal', ['id' => 'ediModal', 'title' => __('Edit user')])
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
            <input type="email" name="email" class="form-control" id="edi-email" placeholder="{{__('Email address')}}" value="{{ old('email') }}" readonly required />
            @if ($errors->has('email'))
                <small class="form-text text-danger">{{ $errors->first('email') }}</small>
            @endif
        </div>

        <div class="form-group">
            <label for="edi-phone">{{__('Phone Number')}}</label>
            <input type="text" name="phone" class="form-control" id="edi-phone" placeholder="{{__('Phone Number')}}" value="{{ old('phone') }}" />
            @if ($errors->has('phone'))
                <small class="form-text text-danger">{{ $errors->first('phone') }}</small>
            @endif
        </div>

        <div class="form-group">
            <label for="edi-address">{{__('Street Address')}}</label>
            <input type="text" name="address" class="form-control" id="edi-address" placeholder="{{__('Street Address')}}" value="{{ old('address') }}" />
            @if ($errors->has('address'))
                <small class="form-text text-danger">{{ $errors->first('address') }}</small>
            @endif
        </div>

        <div class="form-group">
            <label for="edi-zip">{{__('Zip Code')}}</label>
            <input type="text" name="zip_code" class="form-control" id="edi-zip" placeholder="{{__('Zip Code')}}" value="{{ old('zip_code') }}" />
            @if ($errors->has('zip_code'))
                <small class="form-text text-danger">{{ $errors->first('zip_code') }}</small>
            @endif
        </div>

    @endcomponent


@endsection