<?php

namespace App\Http\Controllers;

use App\Models\Sto;
use Illuminate\Http\Request;

class StoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stos = Sto::all();
        return view('sto.index', compact('stos'));
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
        $stos = new Sto;
        $stos->kode = $request->kode;
        $stos->detail = $request->detail;
        $stos->ro_id = $request->ro_id;
        $stos->save();
        if ($stos) {
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
        $stos = sto::find($id);
        if (!$stos) {
            return back()->with('error', 'STO not Found');
        };
        $stos->update($request->all());
        return back()->with('info', 'STO Updated Successfully');
    }

    /**
     * Remove the specified resource fstom storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $stos = Sto::find($id);
        if (!$stos) {
            return back()->with('error', 'STO not Found');
        }
        $stos->delete();
        return back()->with('warning', 'STO Deleted Successfully');
    }
}
