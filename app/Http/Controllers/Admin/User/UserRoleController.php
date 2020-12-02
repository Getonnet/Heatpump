<?php

namespace App\Http\Controllers\Admin\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Bouncer;

class UserRoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $table = Bouncer::role()->orderBy('id', 'DESC')->get();
        return view('admin.user.role')->with(['table' => $table]);
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
        //dd($request->all());
        $validator = Validator::make($request->all(), [
            'name' => 'string|required|regex:/^[a-z]+$/u|min:3|max:191|unique:roles',
            'title' => 'string|required|min:2|max:191'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try{

            Bouncer::role()->firstOrCreate([
                'name' => $request->name,
                'title' => $request->title
            ]);

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
        $role = Bouncer::role()->where('id', $id)->first();
        $table = Bouncer::ability()->whereNotIn('name', ['*'])->orderBy('title')->get();
        //$permission =
        return view('admin.user.ability')->with(['role' => $role, 'table' => $table]);
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
            'name' => 'string|required|regex:/^[a-z]+$/u|min:3|max:191|unique:roles,name,'.$id,
            'title' => 'string|required|min:2|max:191'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try{

            Bouncer::role()->updateOrCreate(['id' => $id],[
                'name' => $request->name,
                'title' => $request->title
            ]);

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
        Bouncer::role()->where('id', $id)->delete();
        return redirect()->back()->with(config('notify.del'));
    }

    public function ability(Request $request, $id){
        //dd($request->all());
        $validator = Validator::make($request->all(), [
            'role' => 'required|array',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try{

            $roles = $request->role;

            $admin = Bouncer::role()->where('id', $id)->first();

            Bouncer::sync($admin)->abilities($roles);

        }catch (\Exception $ex) {
            return redirect()->back()->with(config('notify.db'));
        }

        return redirect()->back()->with(config('notify.edit'));
    }
}
