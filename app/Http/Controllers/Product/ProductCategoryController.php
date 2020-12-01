<?php

namespace App\Http\Controllers\Product;

use App\ProductCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $table = ProductCategory::orderBy('id','DESC')->get();

        return response()->json($table);
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
            'name' => 'string|required|max:191'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), config('naz.validation_error_status_code'));
        }

        try{
            $table =new ProductCategory();
            $table->name = $request->name;
            $table->save();

        }catch (\Exception $ex) {
            return response()->json([config('naz.db_error')], config('naz.query_error_status_code'));
        }

        return response()->json($table);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try{
            $table = ProductCategory::find($id);
            if($table == '')
                return response()->json([config('naz.page_not_found')], config('naz.not_found_status_code'));

        }catch (\Exception $ex) {
            return response()->json([config('naz.db_error')], config('naz.query_error_status_code'));
        }

        return response()->json($table);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try{
            $table = ProductCategory::find($id);
            if($table == '')
                return response()->json([config('naz.page_not_found')], config('naz.not_found_status_code'));

        }catch (\Exception $ex) {
            return response()->json([config('naz.db_error')], config('naz.query_error_status_code'));
        }

        return response()->json($table);
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
            'name' => 'string|required|max:191'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), config('naz.validation_error_status_code'));
        }

        try{
            $table = ProductCategory::find($id);

            if($table == ''){
                return response()->json([config('naz.page_not_found')], config('naz.not_found_status_code'));
            }

            $table->name = $request->name;
            $table->save();

        }catch (\Exception $ex) {
            return response()->json([config('naz.db_error')], config('naz.query_error_status_code'));
        }

        return response()->json($table);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(ProductCategory::destroy($id)){
            return response()->json(config('naz.del'));
        }else{
            return response()->json([config('naz.page_not_found')], config('naz.not_found_status_code'));
        }
    }
}
