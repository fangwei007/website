<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Validator;
use App\Instruments;
use App\Http\Requests;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware(['auth', 'admin']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        $users = User::all();
        $instruments = Instruments::all();
        return view('admin.dashboard', ['users' => $users, 'items' => $instruments]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request) {

        $validator = Validator::make($request->all(), [
                    'name' => 'required|max:255|unique:users',
                    'email' => 'required|email|max:255|unique:users',
                    'password' => 'required|min:6|confirmed',
                    'role' => 'required|size:1|alpha'
                        ], [
                    'name.required' => "请填写用户名。",
                    'name.unique' => "用户名已被使用，请重新选择。",
                    'email.required' => "请填写有效邮箱。",
                    'email.email' => "邮箱格式无效。",
                    'email.unique' => "邮箱已被占用，请重试。",
                    'password.required' => "请填写密码。",
                    'password.min' => "密码至少6位。",
                    'password.confirmed' => "密码输入有误，请重试。",
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            User::create([
                        'name' => $request->input('name'),
                        'email' => $request->input('email'),
                        'password' => bcrypt($request->input('password')),
                        'role' => $request->input('role')
            ]);
            return redirect('/admin');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id) {
        //
        $user = User::where('id', $id)->first();
        if ($user != NULL) {
            return view('admin.edit', ["user" => $user]);
        } else {
            return view('errors.404');
        }   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id) {
        
        $validator = Validator::make($request->all(), [
                    'name' => "required|max:255|unique:users,name, $id",
                    'email' => "required|email|max:255|unique:users,email,$id",
                    'password' => 'min:6|confirmed',
                    'role' => 'required|size:1|alpha'
                        ], [
                    'name.required' => "请填写用户名。",
                    'name.unique' => "用户名已被使用，请重新选择。",
                    'email.required' => "请填写有效邮箱。",
                    'email.email' => "邮箱格式无效。",
                    'email.unique' => "邮箱已被占用，请重试。",
                    'password.min' => "密码至少6位。",
                    'password.confirmed' => "密码输入有误，请重试。",
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        } else {
            $data = [
                'name' => $request->input('name'),
                'email' => $request->input("email"),
                'role' => $request->input("role"),
            ];
            
            if (!empty($request->input("password"))) $data['password'] = bcrypt($request->input("password"));

            User::where('id', $id)->update($data);
            // redirect
            Session::flash('message', "更新成功!");
            return redirect("/admin/$id/edit");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) {
        //
        $delete_user = User::where('id', $id)->first();
        if ($delete_user != NULL) {
            $delete_user->delete();
//            $delete_user->forceDelete();
            return redirect('/admin');
        }

        return view("errors.404");
    }

}
