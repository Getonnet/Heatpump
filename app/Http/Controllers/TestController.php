<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class TestController extends Controller
{
    public function refresh(){
        Artisan::call('cache:clear');
        Artisan::call('config:cache');
        Artisan::call('view:cache');

        return response()->json(['message' => 'Page Refresh']);
    }
}
