<?php

namespace App\Http\Controllers;

use App\Models\Dapros;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Afi;
use Illuminate\Support\Facades\Auth;
use Stevebauman\Location\Facades\Location;

class AgentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $daproses = Dapros::find($id);
        $daproses = DB::table('daproses')
            ->where(
                'sto',
                '=',
                'BNL'
            )->join('users', 'users.id', 'daproses.agent_id')->where('agent_id', Auth::user()->id)
            ->get();
        $users = DB::table('users')->where('role', '=', 'agent')->get();
        // $ip = request()->ip(); /*Dynamic IP address */
        $ip = '110.137.102.81'; /* Static IP address */
        $currentUserInfo = Location::get($ip);
        // $afis = Afi::select('afis.nama', 'ofis.nama')->leftJoin('ofis', 'afis.ofi_id', 'ofis.id')->get();
        $afis = Afi::all();
        // join('ofis', 'afis.ofi_id', 'ofis.id')->get();
        // $ofis = DB::table('ofis')->get();
        return view('agent.index', compact('daproses', 'users', 'afis', 'currentUserInfo'));
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
        //
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
    public function update(Request $request, $agents)
    {
        // dd($request->all());
        // $daproses = Dapros::find($id);
        $agents->tgl_visit = $request->tgl_visit;
        $agents->ofi_real = $request->input('ofi_real');
        $agents->afi_id = $request->input('afi_id');
        $agents->status_tmpt_tinggal = $request->input('status_tmpt_tinggal');
        $agents->yg_ditemui = $request->input('yg_ditemui');
        $agents->kemampuan_cust = $request->input('kemampuan_cust');
        $agents->keterangan_bayar = $request->input('keterangan_bayar');
        $agents->retensi = $request->input('retensi');
        $agents->tagging_lokasi = $request->input('tagging_lokasi');
        $agents->kompetitor = $request->input('kompetitor');

        // $daproses->save();
        if ($request->file('foto_rumah')) {
            $image = $request->file('foto_rumah');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            // Image::make($image)->resize(300, 300)->save(public_path('/uploads/foto/' . $filename));
            $image->move(public_path('public/uploads'), $filename);
            $agents['foto_rumah'] = $filename;
        }
        $agents->save();
        return back()->with('info', 'DAPROS Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
