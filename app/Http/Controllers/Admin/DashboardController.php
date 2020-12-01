<?php

namespace App\Http\Controllers\Admin;

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
        return view('admin.dashboard');
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
