<?php
// app/Http/Controllers/AdminController.php
namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Member;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Symfony\Component\HttpFoundation\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Grocery CRUD Example
     *
     * @return \Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $users = User::findOrFail(Auth::id());
        return view('layouts.admin', compact('users'));
    }
}
