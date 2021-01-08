<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductBrand;
use App\ProductCategory;
use Illuminate\Http\Request;

class ProductRecommendationController extends Controller
{
    public function recommend(Request $request){

        /**
         * Using Condition in product query, if need. I am just using demo recommendation query without condition
         */
        $tbl = Product::orderBy('price');
        if(isset($request->types)){
            $tbl->where('product_types', $request->types); //AC, Heater, Accessories
        }
        if(isset($request->title)){
            $tbl->where('name', $request->title); //Product title search
        }
        $table = $tbl->get();


        $data = [];
        foreach ($table as $row){

           // $request->condition == Godt || Dårlig;

            $rowData['is_recommend'] = false;
            if(isset($request->size) && isset($request->condition)){

                if($request->types == 'Heater'){
                    if($request->condition == 'Godt'){
                        if($request->size <= 80){
                            if($row->name == 'Daikin Moskus 25' || $row->name == 'Daikin  Standard Gulv 25'){
                                $rowData['is_recommend'] = true;
                            }
                        }elseif ($request->size > 80 && $request->size <= 120){
                            if($row->name == 'Daikin Moskus 35' || $row->name == 'Daikin Synergi 30' ||  $row->name == 'Daikin Stylish' || $row->name == 'Daikin  Standard Gulv 35'){
                                $rowData['is_recommend'] = true;
                            }
                        }else{
                            if($row->name == 'Daikin Synergi 40'){
                                $rowData['is_recommend'] = true;
                            }
                        }
                    }else{
                        if($request->size <= 80){
                            if($row->name == 'Daikin Moskus 35' || $row->name == 'Daikin Synergi 30' ||  $row->name == 'Daikin Stylish' || $row->name == 'Daikin  Standard Gulv 35'){
                                $rowData['is_recommend'] = true;
                            }
                        }elseif ($request->size > 80){
                            if($row->name == 'Daikin Synergi 40'){
                                $rowData['is_recommend'] = true;
                            }
                        }
                    }
                }else{
                    if($request->size <= 20){
                        if($row->name == 'Sensira 25'){
                            $rowData['is_recommend'] = true;
                        }
                    }else{
                        if($row->name == 'Sensira 35'){
                            $rowData['is_recommend'] = true;
                        }
                    }
                }

            }

            $rowData['id'] = $row->id;
            $rowData['name'] = $row->name;
            $rowData['types'] = $row->product_types;
            $rowData['capacity'] = $row->capacity;
            $rowData['noise_level'] = $row->noise_level;
            $rowData['price'] = $row->price;
            $rowData['category'] = $row->productCategory->name ?? '';
            $rowData['brand'] = $row->productBrand->name ?? '';
            $rowData['descriptions'] = $row->descriptions;
            $rowData['photo'] = asset($row->photo);

            $attr = $row->productAttributes()->get();
            $attr_data = [];
            foreach ($attr as $attrRow){
                $attrData['attribute'] = $attrRow->attribute->name ?? '';
                $attrData['attr_value'] = $attrRow->attr_value;
                array_push($attr_data, $attrData);
            }

            $rowData['attributes'] = $attr_data;
            $rowData['recommended'] = json_decode($row->other_needs);
            array_push($data, $rowData);
        }

        return response()->json($data);
    }


    public function category(){
        $table = ProductCategory::select('id', 'name')->orderBy('name')->get();
        return response()->json($table);
    }

    public function brand(){
        $table = ProductBrand::select('id', 'name', 'photo')->orderBy('name')->get();

        $data = [];
        foreach ($table as $row){
            $rowData['id'] = $row->id;
            $rowData['name'] = $row->name;
            $rowData['photo'] = asset($row->photo);
            array_push($data, $rowData);
        }

        return response()->json($data);
    }


    public function product_show($id){
        $table = Product::find($id);

        $rowData['id'] = $table->id;
        $rowData['name'] = $table->name;
        $rowData['types'] = $table->product_types;
        $rowData['capacity'] = $table->capacity;
        $rowData['noise_level'] = $table->noise_level;
        $rowData['price'] = $table->price;
        $rowData['category'] = $table->productCategory->name ?? '';
        $rowData['brand'] = $table->productBrand->name ?? '';
        $rowData['descriptions'] = $table->descriptions;
        $rowData['photo'] = asset($table->photo);

        $attr = $table->productAttributes()->get();
        $attr_data = [];
        foreach ($attr as $attrRow){
            $attrData['attribute'] = $attrRow->attribute->name ?? '';
            $attrData['attr_value'] = $attrRow->attr_value;
            array_push($attr_data, $attrData);
        }
        $rowData['attributes'] = $attr_data;

        return response()->json($rowData);
    }

}
