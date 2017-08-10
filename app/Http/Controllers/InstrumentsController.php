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
        $this->middleware(['auth', 'role'], ['except' => [ 'index', 'show']]);

        $this->middleware('admin', ['except' => [ 'index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        $query = request()->all();
        $prefix = request()->route()->getPrefix();
        $query['lang'] = $prefix == NULL ? 'cn' : 'en';
        if (key_exists('q', $query)) {
            $name = $query['q'];
            $instruments = Instruments::where('name', $name)->orWhere('name', 'like', '%' . $name . '%')->paginate(9)->appends(['q' => $name]);
        } else {
            unset($query['page']);
            $query['deleted_at'] = NULL;
            $instruments = Instruments::where($query)->paginate(9)->appends($query);
        } 
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
                    'item-image' => "required|image",
                    'item-company' => "required",
                    'item-type' => "required",
                    'item-lang' => "required",
                        ], [
                    'item-name.unique' => "器材型号重复，请重试。",
                    'item-name.required' => "请填写器材型号。",
                    'item-introduction.required' => "请填写器材简介。",
                    'item-image.required' => "请上传合适的图片。",
                    'item-image.image' => "非法图片格式，请重试。",
                    'item-company.required' => "请选择公司。",
                    'item-type.required' => "请选择类型。",
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $extension = $request->file("item-image")->getClientOriginalExtension();
            $filename = $request->input('item-name') . '.' . $extension;
            $request->file('item-image')->move(base_path() . "/public/uploads/" . $request->input('item-name'), $filename);

            $data = [
                'name' => $request->input('item-name'),
                'introduction' => $request->input('item-introduction'),
                'image' => "/uploads/" . $request->input('item-name') . '/' . $filename,
                'company' => $request->input('item-company'),
                'type' => $request->input('item-type'),
                'lang' => $request->input('item-lang'),
            ];

            Instruments::create($data);
            Session::flash('messageItem', "添加新器材");
            Session::flash('itemName', $request->input('item-name'));
            return redirect('/item-manage');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id) {
        $item = Instruments::where('id', $id)->first();
//        $total = Instruments::all()->where('type', $item->type)->except($id)->count();
//        if ($total < 4) $related_items = Instruments::all()->where('type', $item->type)->except($id)->random($total);
//        else $related_items = Instruments::all()->where('type', $item->type)->except($id)->random(4);
//        return view('instruments.show', ['item' => $item, 'related_items' => $related_items]);
        return view('instruments.show', ['item' => $item]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id) {
        $item = Instruments::where('id', $id)->first();
        if ($item == NULL)
            return view("errors.404");
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
        $validator = Validator::make($request->all(), [
                    'item-name' => "required|unique:instruments,name,$id,id",
                    'item-introduction' => "required",
                    'item-company' => "required",
                    'item-type' => "required",
                    'item-lang' => "required",
                        ], [
                    'item-name.unique' => "器材型号重复，请重试。",
                    'item-name.required' => "请填写器材型号。",
                    'item-introduction.required' => "请填写器材简介。",
                    'item-company.required' => "请选择公司。",
                    'item-type.required' => "请选择类型。",
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        } else {
            $data = [
                'name' => $request->input('item-name'),
                'introduction' => $request->input('item-introduction'),
                'company' => $request->input('item-company'),
                'type' => $request->input('item-type'),
                'lang' => $request->input('item-lang'),
            ];

            if ($request->hasFile('item-image')) {
                $extension = $request->file("item-image")->getClientOriginalExtension();
                $filename = $request->input('item-name') . '.' . $extension;
                $request->file('item-image')->move(base_path() . "/public/uploads/" . $request->input('item-name'), $filename);
                $data['image'] = "/uploads/" . $request->input('item-name') . '/' . $filename;
            }

            Instruments::where('id', $id)->update($data);
            // redirect
            Session::flash('message', "更新成功!");
            return redirect("/items/$id/edit");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) {
        $delete_item = Instruments::where('id', $id)->first();
        if ($delete_item != NULL) {
            Session::flash('messageItem', "已删除");
            Session::flash('itemName', $delete_item->name);
            $delete_item->delete();
            if (isset($_GET['r']) && $_GET['r'] == 'item')
                return redirect('/item-manage');
            return redirect()->back();
        }

        return view("errors.404");
    }

    public function restore($id) {
        $removed_item = Instruments::onlyTrashed()->where('id', $id)->first();
        if ($removed_item != NULL) {
            Session::flash('message', "已还原设备");
            Session::flash('name', $removed_item->name);
            $removed_item->restore();
            return redirect()->back();
        }

        return view("errors.404");
    }

    public function permDestroy($id) {
        $removed_item = Instruments::onlyTrashed()->where('id', $id)->first();
        if ($removed_item != NULL) {
            Session::flash('message', "永久删除设备");
            Session::flash('name', $removed_item->name);
            $removed_item->forceDelete();
            return redirect()->back();
        }

        return view("errors.404");
    }

}
