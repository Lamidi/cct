<?php

namespace App\Http\Controllers;

use App\Models\Afi;
use Illuminate\Http\Request;

class AfiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $afis = Afi::all();
        return view('afi.index', compact('afis'));
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
        $afis = new afi;
        $afis->nama = $request->nama;
        $afis->ofi_id = $request->ofi_id;
        $afis->save();
        if ($afis) {
            return redirect()->back()->with('success', 'afi Successfully Inserted');
        }
        return redirect()->back()->with('error', 'afi Failed To Inserted');
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
        $afis = Afi::find($id);
        if (!$afis) {
            return back()->with('error', 'AFI not Found');
        };
        $afis->update($request->all());
        return back()->with('info', 'AFI Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $afis = afi::find($id);
        if (!$afis) {
            return back()->with('error', 'AFI not Found');
        }
        $afis->delete();
        return back()->with('warning', 'AFI Deleted Successfully');
    }
}
