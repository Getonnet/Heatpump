<?php

namespace App\Http\Controllers\User;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['store']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        return response()->json($user);
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
            'email' => 'string|email|required|unique:users|min:3||max:191',
            'password' => 'string|required|min:8|max:160|confirmed'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), config('naz.validation_error_status_code'));
        }

        try{
            $table = new User();
            $table->name = $request->name;
            $table->email = $request->email;
            $table->password = bcrypt($request->password);
            $table->save();

        }catch (\Exception $ex) {
            return response()->json([config('naz.db_error')], config('naz.query_error_status_code'));
        }

        $credentials = $request->only('email', 'password');

        if ($token = auth()->attempt($credentials)) {
            return $this->respondWithToken($token);
        }

        return response()->json(['error' => 'Unauthorized'], config('naz.unauthorized_status_code'));
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
            $table = User::find($id);
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
            $table = User::find($id);

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
            'name' => 'string|required|min:3|max:191',
            'email' => 'string|email|required|min:3|max:191|unique:users,email,'.$id,
            'password' => 'string|required|min:8|max:160|confirmed'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), config('naz.validation_error_status_code'));
        }

        try{
            $table = User::find($id);

            if($table == ''){
                return response()->json([config('naz.page_not_found')], config('naz.not_found_status_code'));
            }

            $table->name = $request->name;
            $table->email = $request->email;
            $table->password = bcrypt($request->password);
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
        if(User::destroy($id)){
            return response()->json(config('naz.del'));
        }else{
            return response()->json([config('naz.page_not_found')], config('naz.not_found_status_code'));
        }
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => $this->guard()->factory()->getTTL() * config('naz.jwt_expire')
        ]);
    }

    public function guard()
    {
        return Auth::guard('api');
    }
}
