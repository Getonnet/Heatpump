<?php

namespace App\Http\Controllers\Admin;

use App\CustomerOrder;
use App\Product;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customer = User::where('user_types', 'customer')->count();
        $user = User::where('user_types', '<>', 'customer')->count();
        $orders = CustomerOrder::count();
        $products = Product::count();
        return view('admin.dashboard')->with(['products' => $products, 'customer' => $customer, 'user' => $user, 'orders' => $orders]);
    }

    /*
     * Using for demo
     */
    public function demo_page()
    {
        return view('admin.demo-page');
    }

    public function demo_table()
    {
        return view('admin.demo-table');
    }
    /*
     * Using for demo
     */
}
