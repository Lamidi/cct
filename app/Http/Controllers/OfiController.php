<?php

namespace App\Http\Controllers;

use App\Models\Ofi;
use Illuminate\Http\Request;

class OfiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ofis = Ofi::all();
        return view('ofi.index', compact('ofis'));
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
     * ofire a newly created resource in ofirage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ofis = new ofi;
        $ofis->nama = $request->nama;
        $ofis->save();
        if ($ofis) {
            return redirect()->back()->with('success', 'ofi Successfully Inserted');
        }
        return redirect()->back()->with('erofir', 'ofi Failed To Inserted');
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
     * Update the specified resource in ofirage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $ofis = ofi::find($id);
        if (!$ofis) {
            return back()->with('error', 'ofi not Found');
        };
        $ofis->update($request->all());
        return back()->with('info', 'ofi Updated Successfully');
    }

    /**
     * Remove the specified resource from ofirage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ofis = ofi::find($id);
        if (!$ofis) {
            return back()->with('error', 'ofi not Found');
        }
        $ofis->delete();
        return back()->with('warning', 'ofi Deleted Successfully');
    }
}
