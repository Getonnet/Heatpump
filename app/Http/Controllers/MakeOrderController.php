<?php

namespace App\Http\Controllers;

use App\CustomerOrder;
use App\OrderItem;
use App\Product;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MakeOrderController extends Controller
{
    public function make_order(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'string|required|min:3|max:191',
            'email' => 'required|email',
            'items' => 'required|array'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), config('naz.validation_error_status_code'));
        }

        try{

            $customer = User::firstOrCreate(
                ['email' => $request->email],
                [
                    'name' => $request->name,
                    'phone' => $request->contact,
                    'zip_code' =>  $request->zip_code,
                    'address' =>  $request->address,
                    'password' =>  bcrypt('12345678') //Using for Bypass required password
                ]
            );

            $customer_id = $customer->id;

            $orders = CustomerOrder::firstOrCreate(
                ['uniq_session' => $request->uniq_session],
                [
                    'name' => $request->name,
                    'email' => $request->email,
                    'zip_code' =>  $request->zip_code,
                    'address' =>  $request->address,
                    'contact' =>  $request->contact,
                    'area_info' =>  $request->area_info, //Area Size like how much square feet
                    'insulated' =>  $request->insulated, //Insulated condition, Ex: Good/Bad
                    'wall_type' =>  $request->wall_type, //Wall type like wood
                    'users_id' => $customer_id
                ]
            );

            $order_id = $orders->id;

            $items = $request->items;

            foreach ($items as $i => $row){
                $product = Product::find($i); //@ $i is a product ID And @ $row is a quantity
                $price = $product->price;

                OrderItem::firstOrCreate(
                    ['products_id' => $i, 'customer_orders_id' => $order_id],
                    ['price' => $price, 'qty' => $row]
                );
            }

        }catch (\Exception $ex) {
            return response()->json([config('naz.db_error')], config('naz.query_error_status_code'));
        }

        return response()->json(config('naz.save'));
    }
}
