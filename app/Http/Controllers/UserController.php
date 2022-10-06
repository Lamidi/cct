<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\ImageManagerStatic as Image;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $users = User::all();
        return view('user.index', compact('users'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'nik' => $request['nik'],
            'gender' => $request['gender'],
            'ro_id' => $request['ro_id'],
            'phone' => $request['phone'],
            'password' => Hash::make($request['password']),
        ]);
        return redirect('users');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $User
     * @return \Illuminate\Http\Response
     */
    public function show(User $User)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $User
     * @return \Illuminate\Http\Response
     */
    public function edit(User $request)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $User
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = Auth::user();
        $user = User::find($id);
        if (!$user) {
            return back()->with('error', 'User not Found');
        }
        // $this->validate($request, [
        //     'name' => ['required', 'string', 'max:255'],
        //     'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        //     'ro_id' => ['required', 'string'],
        //     'phone' => ['required', 'string', 'min:10', 'max:13'],
        // ]);
        $user->update($request->all());
        return back()->with('success', 'User Updated Successfully');
    }
    public function myprofile()
    {
        $user = Auth::user();
        return view('admin.profile', compact('user'));
    }
    public function profileupdate(Request $request)
    {
        $user = Auth::user();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error", "Your current password does not matches with the password.");
        }
        if (strcmp($request->get('current-password'), $request->get('new-password')) == 0) {
            // Current password and new password same
            return redirect()->back()->with("error", "New Password cannot be same as your current password.");
        }
        request()->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:8|confirmed',
        ]);
        //Change Password
        $user->password = bcrypt($request->get('new-password'));
        $user->save();

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(300, 300)->save(public_path('/uploads/profile/' . $filename));
            $user = Auth::user();
            $user->image = $filename;
            $user->save();
        }
        return redirect()->back()->with('success', 'Profile Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $User
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        // $user = Auth::user();
        $user->delete();
        return redirect()->back()->withSuccess(__('User deleted successfully.'));
    }
}
