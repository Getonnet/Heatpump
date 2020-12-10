@section('box')

    @component('components.modal', ['id' => 'addModal', 'action' => route('product.store'), 'size' => 'lg', 'title' => __('Add new Product')])

        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="add-name">{{__('Product name')}}</label>
                    <input type="text" name="name" class="form-control" id="add-name" placeholder="{{__('Product name')}}" value="{{ old('name') }}" required />
                    @if ($errors->has('name'))
                        <small class="form-text text-danger">{{ $errors->first('name') }}</small>
                    @endif
                </div>

                <div class="form-group">
                    <label for="add-type">{{__('Product Type')}}</label>
                    <select name="product_types" class="form-control" id="add-type" required>
                        <option value="">{{__('Select Type')}}</option>
                        <option value="AC">{{__('AC')}}</option>
                        <option value="Heater">{{__('Heater')}}</option>
                        <option value="Accessories">{{__('Accessories')}}</option>
                    </select>
                    @if ($errors->has('product_types'))
                        <small class="form-text text-danger">{{ $errors->first('product_types') }}</small>
                    @endif
                </div>

                <div class="form-group">
                    <label for="add-category">{{__('Select Category')}}</label>
                    <select name="product_categories_id" class="form-control" id="add-category" required>
                        <option value="">{{__('Select Category')}}</option>
                        @foreach($categorys as $row)
                            <option value="{{$row->id}}">{{$row->name}}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('product_categories_id'))
                        <small class="form-text text-danger">{{ $errors->first('product_categories_id') }}</small>
                    @endif
                </div>

                <div class="form-group">
                    <label for="add-brand">{{__('Select Brand')}}</label>
                    <select name="product_brands_id" class="form-control" id="add-brand" required>
                        <option value="">{{__('Select Brand')}}</option>
                        @foreach($brands as $row)
                            <option value="{{$row->id}}">{{$row->name}}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('product_brands_id'))
                        <small class="form-text text-danger">{{ $errors->first('product_brands_id') }}</small>
                    @endif
                </div>


            </div>
            <div class="col">
                <div class="form-group">
                    <label for="add-capacity">{{__('Capacity')}}</label>
                    <input type="number" step="any" min="0" name="capacity" class="form-control" id="add-capacity" placeholder="{{__('Capacity')}}" value="{{ old('capacity') ?? 0 }}" required />
                    @if ($errors->has('capacity'))
                        <small class="form-text text-danger">{{ $errors->first('capacity') }}</small>
                    @endif
                </div>

                <div class="form-group">
                    <label for="add-noise">{{__('Noise Level')}}</label>
                    <input type="number" step="any" min="0" name="noise_level" class="form-control" id="add-noise" placeholder="{{__('Noise Level')}}" value="{{ old('noise_level') ?? 0 }}" required />
                    @if ($errors->has('noise_level'))
                        <small class="form-text text-danger">{{ $errors->first('noise_level') }}</small>
                    @endif
                </div>

                <div class="form-group">
                    <label for="add-name">{{__('Price')}}</label>
                    <input type="number" step="any" min="0" name="price" class="form-control" id="add-name" placeholder="{{__('Price')}}" value="{{ old('price') ?? 0 }}" required />
                    @if ($errors->has('price'))
                        <small class="form-text text-danger">{{ $errors->first('price') }}</small>
                    @endif
                </div>

                <div class="form-group">
                    <label for="add-photo">{{__('Photo')}}</label>
                    <input type="file" name="photo" class="form-control" id="add-photo" accept="image/x-png,image/gif,image/jpeg" />
                    @if ($errors->has('photo'))
                        <small class="form-text text-danger">{{ $errors->first('photo') }}</small>
                    @endif
                </div>

            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="add-descriptions">{{__('Descriptions')}}</label>
                    <textarea class="form-control" name="descriptions" id="add-descriptions" placeholder="{{__('Descriptions')}}" rows="3">{{ old('descriptions')}}</textarea>
                </div>
            </div>
        </div>


    @endcomponent

    <!-- ********************* -->

    @component('components.modal', ['id' => 'ediModal', 'size' => 'lg', 'title' => __('Edit Product')])
        @method('PUT')

        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="edi-name">{{__('Product name')}}</label>
                    <input type="text" name="name" class="form-control" id="edi-name" placeholder="{{__('Product name')}}" value="{{ old('name') }}" required />
                    @if ($errors->has('name'))
                        <small class="form-text text-danger">{{ $errors->first('name') }}</small>
                    @endif
                </div>

                <div class="form-group">
                    <label for="edi-type">{{__('Product Type')}}</label>
                    <select name="product_types" class="form-control" id="edi-type" required>
                        <option value="">{{__('Select Type')}}</option>
                        <option value="AC">{{__('AC')}}</option>
                        <option value="Heater">{{__('Heater')}}</option>
                        <option value="Accessories">{{__('Accessories')}}</option>
                    </select>
                    @if ($errors->has('product_types'))
                        <small class="form-text text-danger">{{ $errors->first('product_types') }}</small>
                    @endif
                </div>

                <div class="form-group">
                    <label for="edi-category">{{__('Select Category')}}</label>
                    <select name="product_categories_id" class="form-control" id="edi-category" required>
                        <option value="">{{__('Select Category')}}</option>
                        @foreach($categorys as $row)
                            <option value="{{$row->id}}">{{$row->name}}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('product_categories_id'))
                        <small class="form-text text-danger">{{ $errors->first('product_categories_id') }}</small>
                    @endif
                </div>

                <div class="form-group">
                    <label for="edi-brand">{{__('Select Brand')}}</label>
                    <select name="product_brands_id" class="form-control" id="edi-brand" required>
                        <option value="">{{__('Select Brand')}}</option>
                        @foreach($brands as $row)
                            <option value="{{$row->id}}">{{$row->name}}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('product_brands_id'))
                        <small class="form-text text-danger">{{ $errors->first('product_brands_id') }}</small>
                    @endif
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="edi-capacity">{{__('Capacity')}}</label>
                    <input type="number" step="any" min="0" name="capacity" class="form-control" id="edi-capacity" placeholder="{{__('Capacity')}}" value="{{ old('capacity') ?? 0 }}" required />
                    @if ($errors->has('capacity'))
                        <small class="form-text text-danger">{{ $errors->first('capacity') }}</small>
                    @endif
                </div>

                <div class="form-group">
                    <label for="edi-noise">{{__('Noise Level')}}</label>
                    <input type="number" step="any" min="0" name="noise_level" class="form-control" id="edi-noise" placeholder="{{__('Noise Level')}}" value="{{ old('noise_level') ?? 0 }}" required />
                    @if ($errors->has('noise_level'))
                        <small class="form-text text-danger">{{ $errors->first('noise_level') }}</small>
                    @endif
                </div>

                <div class="form-group">
                    <label for="edi-name">{{__('Price')}}</label>
                    <input type="number" step="any" min="0" name="price" class="form-control" id="edi-name" placeholder="{{__('Price')}}" value="{{ old('price') ?? 0 }}" required />
                    @if ($errors->has('price'))
                        <small class="form-text text-danger">{{ $errors->first('price') }}</small>
                    @endif
                </div>

                <div class="form-group">
                    <label for="edi-photo">{{__('Photo')}}</label>
                    <input type="file" name="photo" class="form-control" id="edi-photo" accept="image/x-png,image/gif,image/jpeg" />
                    @if ($errors->has('photo'))
                        <small class="form-text text-danger">{{ $errors->first('photo') }}</small>
                    @endif
                </div>

            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="edi-descriptions">{{__('Descriptions')}}</label>
                    <textarea class="form-control" name="descriptions" id="edi-descriptions" placeholder="{{__('Descriptions')}}" rows="3">{{ old('descriptions')}}</textarea>
                </div>
            </div>
        </div>

    @endcomponent


@endsection