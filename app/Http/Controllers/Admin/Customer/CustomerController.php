<?php

namespace App\Http\Controllers\Admin\Customer;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $table = User::orderBy('id', 'DESC')->where('user_types', 'Customer')->get();
        return view('admin.customer.customer')->with(['table' => $table]);
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
            'email' => 'string|email|required|unique:users',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try{
            $table = new User();
            $table->name = $request->name;
            $table->email = $request->email;
            $table->phone = $request->phone;
            $table->zip_code = $request->zip_code;
            $table->address = $request->address;
            $table->password = bcrypt('12345678'); //Using for Bypass required password
            $table->save();

        }catch (\Exception $ex) {
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
        //
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
         //dd($request->all());
        $validator = Validator::make($request->all(), [
            'name' => 'string|required|min:3|max:191',
            'email' => 'required|email|unique:users,email,'.$id
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            $table = User::find($id);
            $table->name = $request->name;
            $table->email = $request->email;
            $table->phone = $request->phone;
            $table->zip_code = $request->zip_code;
            $table->address = $request->address;
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
        User::destroy($id);
        return redirect()->back()->with(config('notify.del'));
    }
}
