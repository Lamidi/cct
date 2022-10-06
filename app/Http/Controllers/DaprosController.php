<?php

namespace App\Http\Controllers;

use App\Models\Afi;
use App\Models\Dapros;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Stevebauman\Location\Facades\Location;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Auth;

class DaprosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $daproses = DB::table('daproses')
            ->where(
                'sto',
                '=',
                'BNL'
                // 'PSN',
            )
            // ->orWhere('sto', '=', 'BNL')
            // ->orWhere('sto', '=', 'PBL')
            // ->orWhere('sto', '=', 'KRZ')
            // ->orWhere('sto', '=', 'LMJ')
            ->get();
        $users = DB::table('users')->where('role', '=', 'agent')->get();
        // $ip = request()->ip(); /*Dynamic IP address */
        $ip = '110.137.102.81'; /* Static IP address */
        $currentUserInfo = Location::get($ip);
        // $afis = Afi::select('afis.nama', 'ofis.nama')->leftJoin('ofis', 'afis.ofi_id', 'ofis.id')->get();
        $afis = Afi::all();
        // join('ofis', 'afis.ofi_id', 'ofis.id')->get();
        // $ofis = DB::table('ofis')->get();
        return view('dapros.index', compact('daproses', 'users', 'afis', 'currentUserInfo'));
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
    public function edit(Request $request, $id)
    {
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
        $daproses = Dapros::find($id);
        $daproses->tgl_visit = $request->input('tgl_visit');
        $daproses->ofi_real = $request->input('ofi_real');
        $daproses->afi_id = $request->input('afi_id');
        $daproses->status_tmpt_tinggal = $request->input('status_tmpt_tinggal');
        $daproses->yg_ditemui = $request->input('yg_ditemui');
        $daproses->kemampuan_cust = $request->input('kemampuan_cust');
        $daproses->keterangan_bayar = $request->input('keterangan_bayar');
        $daproses->retensi = $request->input('retensi');
        $daproses->tagging_lokasi = $request->input('tagging_lokasi');
        $daproses->kompetitor = $request->input('kompetitor');

        // $daproses->save();
        if ($request->file('foto_rumah')) {
            $image = $request->file('foto_rumah');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            // Image::make($image)->resize(300, 300)->save(public_path('/uploads/foto/' . $filename));
            $image->move(public_path('public/uploads'), $filename);
            $daproses['foto_rumah'] = $filename;
        }
        $daproses->save();
        return back()->with('info', 'DAPROS Updated Successfully');
    }

    public function updateagent(Request $request, $id)
    {
        $daproses = Dapros::find($id);
        $daproses->agent_id = $request->input('agent_id');
        $daproses->save();
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
        $daproses = Dapros::find($id);
        if (!$daproses) {
            return back()->with('error', 'DAPROS not Found');
        }
        $daproses->delete();
        return back()->with('info', 'DAPROS Updated Successfully');
    }
}
