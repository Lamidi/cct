<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Stevebauman\Location\Facades\Location;
use App\Models\Afi;
use App\Models\Dapros;
use Carbon\Carbon;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class HeroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $daproses = DB::table('daproses')

            ->join(
                'stos',
                'stos.kode',
                'daproses.sto'
            )
            ->join(
                'ros',
                'stos.ro_id',
                'ros.id'
            )
            // ->join(
            //     'users',
            //     'users.id',
            //     'daproses.agent_id'
            // )
            ->where('stos.ro_id', Auth::user()->ro_id)
            ->get();
        // $users = Dapros::all();
        $date = Carbon::now()->format('d-m-Y');
        // $namas = DB::table('daproses')->join('users', 'daproses.agent_id', 'users.id')->get();
        $users = DB::table('users')->where('role', '=', 'agent')->get();
        // $ip = request()->ip(); /*Dynamic IP address */
        $ip = '110.137.102.81'; /* Static IP address */
        $currentUserInfo = Location::get($ip);
        $afis = Afi::all();
        return view('hero.index', compact('daproses',  'users', 'afis', 'currentUserInfo', 'date'));
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
    public function edit(Dapros $dapros)
    {
        // dd($dapros);
        // $dapros = Dapros::findOrFail($dapros->id);
        $date = Carbon::now()->format('d-m-Y');
        $users = DB::table('users')->where('role', '=', 'agent')->get();
        return view('hero.edit', compact('dapros', 'date', 'users'));
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
        $daproses->tgl_dispacth = Carbon::now();
        $daproses->agent_id = $request->agent_id;
        $daproses->update();
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
