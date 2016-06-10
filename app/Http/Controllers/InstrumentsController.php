<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Instruments;
use App\Http\Requests;
use Validator;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;

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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request) {
        
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
                        ], [
                    'item-name.unique' => "This video name has been used.",
                    'item-name.required' => "Please enter video name.",
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
