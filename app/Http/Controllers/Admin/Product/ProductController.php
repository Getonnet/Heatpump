<?php

namespace App\Http\Controllers\Admin\Product;

use App\Attribute;
use App\Product;
use App\ProductAttribute;
use App\ProductBrand;
use App\ProductCategory;
use App\Traits\UploadTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    use UploadTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $table = Product::orderBy('id', 'DESC')->get();
        $categorys = ProductCategory::orderBy('name')->get();
        $brands = ProductBrand::orderBy('name')->get();
        return view('admin.products.product')->with([
            'table' => $table,
            'categorys' => $categorys,
            'brands' => $brands
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'string|required|min:3|max:191',
            'product_types' => 'string|required|max:15',
            'product_categories_id' => 'required|numeric',
            'product_brands_id' => 'required|numeric',
            'capacity' => 'required|numeric',
            'noise_level' => 'required|numeric',
            'price' => 'required|numeric',
            'details_link' => 'nullable|url',
            'photo' => 'sometimes|file'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        try{
            $table = new Product();
            $table->name = $request->name;
            $table->product_types = $request->product_types;
            $table->product_categories_id = $request->product_categories_id;
            $table->product_brands_id = $request->product_brands_id;
            $table->capacity = $request->capacity;
            $table->noise_level = $request->noise_level;
            $table->price = $request->price;
            $table->details_link = $request->details_link;
            $table->descriptions = $request->descriptions;
            if ($request->has('photo')) {
                // Get image file
                $image = $request->file('photo');
                // Make a image name based on user name and current timestamp
                $name = Str::slug($request->input('name')) . '_' . time();
                // Define folder path
                $folder = '/uploads/product/';
                // Make a file path where image will be stored [ folder path + file name + file extension]
                $filePath = $folder . $name . '.' . $image->getClientOriginalExtension();
                // Upload image
                $this->uploadOne($image, $folder, 'public', $name);
                // Set user profile image path in database to filePath
                $table->photo = $filePath;
            }
            $table->save();

        }catch (\Exception $ex) {
            //dd($ex);
            return redirect()->back()->with(config('notify.db'));
        }

        return redirect()->back()->with(config('notify.save'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $table = Product::find($id);
        $attr_id = $table->productAttributes()->select('attributes_id')->get()->toArray();
        $attr = Attribute::orderBy('name')->whereNotIn('id', $attr_id)->get();

        $products = Product::where('id','<>', $id)->orderBy('name')->get();

        $recommended = '';
        if(isset($table->other_needs)){
            $recommended = Product::whereIn('id', json_decode($table->other_needs))->orderBy('name')->get();
        }

        return view('admin.products.product-show')->with(['table' => $table, 'attr' => $attr, 'recommended' => $recommended, 'products' => $products]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'string|required|min:3|max:191',
            'product_types' => 'string|required|max:15',
            'product_categories_id' => 'required|numeric',
            'product_brands_id' => 'required|numeric',
            'capacity' => 'required|numeric',
            'noise_level' => 'required|numeric',
            'price' => 'required|numeric',
            'details_link' => 'nullable|url',
            'photo' => 'sometimes|file'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        try{
            $table = Product::find($id);
            $table->name = $request->name;
            $table->product_types = $request->product_types;
            $table->product_categories_id = $request->product_categories_id;
            $table->product_brands_id = $request->product_brands_id;
            $table->capacity = $request->capacity;
            $table->noise_level = $request->noise_level;
            $table->details_link = $request->details_link;
            $table->price = $request->price;
            $table->descriptions = $request->descriptions;
            if ($request->has('photo')) {
                // Get image file
                $image = $request->file('photo');
                // Make a image name based on user name and current timestamp
                $name = Str::slug($request->input('name')) . '_' . time();
                // Define folder path
                $folder = '/uploads/product/';
                // Make a file path where image will be stored [ folder path + file name + file extension]
                $filePath = $folder . $name . '.' . $image->getClientOriginalExtension();
                // Upload image
                $this->uploadOne($image, $folder, 'public', $name);
                // Set user profile image path in database to filePath
                $table->photo = $filePath;
            }
            $table->save();

        }catch (\Exception $ex) {
            return redirect()->back()->with(config('notify.db'));
        }

        return redirect()->back()->with(config('notify.edit'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::destroy($id);
        return redirect()->back()->with(config('notify.del'));
    }

    public function attribute_add(Request $request, $id){
        $validator = Validator::make($request->all(), [
            'attr_value' => 'string|required|max:191',
            'attributes_id' => 'required|numeric'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {

            $table = new ProductAttribute();
            $table->products_id = $id;
            $table->attributes_id = $request->attributes_id;
            $table->attr_value = $request->attr_value;
            $table->save();

        } catch (\Exception $ex) {
            return redirect()->back()->with(config('notify.db'));
        }

        return redirect()->back()->with(config('notify.save'));

    }

    public function attribute_del($id){
        ProductAttribute::destroy($id);
        return redirect()->back()->with(config('notify.del'));
    }


    public function product_recommend(Request $request, $id){
        //dd($request->all());
        $validator = Validator::make($request->all(), [
            'product_id' => 'required|array'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {

            $table = Product::find($id);
            $table->other_needs = json_encode($request->product_id);
            $table->save();

        } catch (\Exception $ex) {
            return redirect()->back()->with(config('notify.db'));
        }

        return redirect()->back()->with(config('notify.save'));

    }

}
