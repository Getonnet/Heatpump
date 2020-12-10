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


    @component('components.modal', ['id' => 'addModalRc', 'size' => 'lg', 'action' => route('product.add-recommend', ['id' =>$table->id]), 'title' => __('Update Recommended Products')])
        @method('PUT')

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>{{__('Photo')}}</th>
                    <th>{{__('Name')}}</th>
                    <th>{{__('Type')}}</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $row)
                    <tr>
                        <td>
                            <input name="product_id[]" type="checkbox" value="{{$row->id}}" />
                        </td>
                        <td>
                            <a href="#!" class="avatar avatar-xs">
                                <img alt="Admin Photo" src="{{asset($row->photo)}}">
                            </a>
                        </td>
                        <td>{{$row->name}}</td>
                        <td>{{$row->product_types}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    @endcomponent

@endsection