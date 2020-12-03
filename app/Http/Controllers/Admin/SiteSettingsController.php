<?php

namespace App\Http\Controllers\Admin;

use App\SiteConfig;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SiteSettingsController extends Controller
{
    public function index(){
        $table = SiteConfig::orderBy('id', 'DESC')->first();

        return view('admin.settings')->with(['table' => $table]);
    }
}
