@section('box')

    @component('components.modal', ['id' => 'addModal', 'action' => route('product.add-attribute', ['id' =>$table->id]), 'title' => __('Create new Attribute')])
        @method('PUT')
        <div class="form-group">
            <label for="add-attr">{{__('Select Attribute')}}</label>
            <select name="attributes_id" class="form-control" id="add-attr" required>
                <option value="">{{__('Select Attribute')}}</option>
                @foreach($attr as $row)
                    <option value="{{$row->id}}">{{$row->name}}</option>
                @endforeach
            </select>
            @if ($errors->has('attributes_id'))
                <small class="form-text text-danger">{{ $errors->first('attributes_id') }}</small>
            @endif
        </div>

        <div class="form-group">
            <label for="add-name">{{__('Attribute value')}}</label>
            <input type="text" name="attr_value" class="form-control" id="add-name" placeholder="{{__('Attribute value')}}" value="{{ old('attr_value') }}" required />
            @if ($errors->has('attr_value'))
                <small class="form-text text-danger">{{ $errors->first('attr_value') }}</small>
            @endif
        </div>

    @endcomponent

@endsection