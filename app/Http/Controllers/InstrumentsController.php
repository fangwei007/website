<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Instruments;
use App\Http\Requests;
use Validator;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;
use Illuminate\Support\Facades\Session;

class InstrumentsController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware(['auth', 'role']);

        $this->middleware('admin', ['except' => [ 'index']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        $instruments = Instruments::where('deleted_at', NULL)->paginate(6);
        return view('items', ['items' => $instruments]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        return view('instruments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
                    'item-name' => "required|unique:instruments,name",
                    'item-introduction' => "required",
                    'item-image' => "required|image"
                        ], [
                    'item-name.unique' => "器材型号重复，请重试。",
                    'item-name.required' => "请填写器材型号。",
                    'item-introduction.required' => "请填写器材简介。",
                    'item-image.required' => "请上传合适的图片。",
                    'item-image.image' => "非法图片格式，请重试。",
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        } else {
            $extension = $request->file("item-image")->getClientOriginalExtension();
            $filename = $request->input('item-name') . '.' . $extension;
            $request->file('item-image')->move(base_path() . "/public/uploads/" . $request->input('item-name'), $filename);
            
            $data = [
                'name' => $request->input('item-name'),
                'introduction' => $request->input('item-introduction'),
                'image' => "/uploads/" . $request->input('item-name') . '/' . $filename
            ];
            
            Instruments::create($data);
            Session::flash('messageItem', "添加新器材");
            Session::flash('newItem', $request->input('item-name'));
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
        $item = Instruments::where('id', $id)->first();
        return view('instruments.edit', ['item' => $item]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id) {
        $item = Instruments::where('id', $id)->first();
        
        if ($request->hasFile('item-image')) {
            $filename = $request->file("item-image")->getClientOriginalName();
            $request->file('item-image')->move(base_path() . "/public/uploads/$item->name", $filename);
        }

        $validator = Validator::make($request->all(), [
                    'item-name' => "required|unique:instruments,name,$id,id",
                    'item-introduction' => "required"
                        ], [
                    'item-name.unique' => "器材型号重复，请重试。",
                    'item-name.required' => "请填写器材型号。",
                    'item-introduction.required' => "请填写器材简介。",
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        } else {
            
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
    }

}
