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

        $table = Product::orderBy('price')->get();

        $data = [];
        foreach ($table as $row){
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

        return response()->json($rowData);
    }

}
