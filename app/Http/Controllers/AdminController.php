<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Validator;
use App\Instruments;
use App\Http\Requests;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

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
        $users = User::where('created_at', '>=', Carbon::now()->startOfMonth())->get();
        $instruments = Instruments::where('created_at', '>=', Carbon::now()->startOfMonth())->get();
        $trash_u = User::onlyTrashed()->count();
        $trash_i = Instruments::onlyTrashed()->count();
        return view('admin.dashboard', ['users' => $users, 'items' => $instruments, 'trash' => $trash_u + $trash_i]);
    }
    
    public function userManage() {
        $users = User::all();
        return view('admin.user-manage', ['users' => $users]);
    }
    
    public function itemManage() {
        $instruments = Instruments::all();
        return view('admin.item-manage', ['items' => $instruments]);
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
            Session::flash('message', "创建新用户");
            Session::flash('userName', $request->input('name'));
            return redirect('/user-manage');
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
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) {
        $delete_user = User::where('id', $id)->first();
        if ($delete_user != NULL) {
            Session::flash('message', "已删除");
            Session::flash('userName', $delete_user->name);
            $delete_user->delete();
            if (isset($_GET['r']) && $_GET['r'] == 'user') return redirect('/user-manage');
            return redirect()->back();
        }

        return view("errors.404");
    }
    
    public function trash() {
        
        $removed_users = User::onlyTrashed()->get();
        $removed_items = Instruments::onlyTrashed()->get();
        
        return view('admin.trash', ['users' => $removed_users, 'items' => $removed_items]);
    }
    
    public function restore($id) {
        $removed_user = User::onlyTrashed()->where('id', $id)->first();
        if ($removed_user != NULL) {
            Session::flash('message', "已还原");
            Session::flash('userName', $removed_user->name);
            $removed_user->restore();
            return redirect()->back();
        }

        return view("errors.404");
    }
    
    public function permDestroy($id) {
        $removed_user = User::onlyTrashed()->where('id', $id)->first();
        if ($removed_user != NULL) {
            Session::flash('message', "永久删除");
            Session::flash('userName', $removed_user->name);
            $removed_user->forceDelete();
            return redirect()->back();
        }

        return view("errors.404");
    }

}
