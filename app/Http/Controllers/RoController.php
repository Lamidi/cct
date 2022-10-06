<?php

namespace App\Http\Controllers;

use App\Models\Ro;
use Illuminate\Http\Request;

class RoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ros = Ro::all();
        return view('ro.index', compact('ros'));
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
        $ros = new Ro;
        $ros->ro = $request->ro;
        $ros->save();
        if ($ros) {
            return redirect()->back()->with('success', 'STO Successfully Inserted');
        }
        return redirect()->back()->with('erstor', 'STO Failed To Inserted');
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
        $ros = Ro::find($id);
        if (!$ros) {
            return back()->with('error', 'RO not Found');
        };
        $ros->update($request->all());
        return back()->with('info', 'RO Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ros = Ro::find($id);
        if (!$ros) {
            return back()->with('error', 'RO not Found');
        }
        $ros->delete();
        return back()->with('warning', 'RO Deleted Successfully');
    }
}
