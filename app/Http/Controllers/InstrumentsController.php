<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Instruments;
use App\Http\Requests;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;

class InstrumentsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware(['auth', 'role']);
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id) {
        //
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
