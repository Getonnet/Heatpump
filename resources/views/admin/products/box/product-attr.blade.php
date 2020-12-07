@section('box')

    @component('components.modal', ['id' => 'addModal', 'action' => route('product.attribute.store'), 'title' => __('Create new Attribute')])
        @method('PUT')
        <div class="form-group">
            <label for="edi-category">{{__('Select Attribute')}}</label>
            <select name="product_categories_id" class="form-control" id="edi-category" required>
                <option value="">{{__('Select Attribute')}}</option>
                @foreach($attr as $row)
                    <option value="{{$row->id}}">{{$row->name}}</option>
                @endforeach
            </select>
            @if ($errors->has('product_categories_id'))
                <small class="form-text text-danger">{{ $errors->first('product_categories_id') }}</small>
            @endif
        </div>

    @endcomponent

@endsection