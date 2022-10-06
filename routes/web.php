<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\DaprosesImport;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);
Route::resource('/users', App\Http\Controllers\UserController::class);
Route::resource('/stos', App\Http\Controllers\StoController::class);
Route::resource('/ros', App\Http\Controllers\RoController::class);
Route::resource('/ofis', App\Http\Controllers\OfiController::class);
Route::resource('/afis', App\Http\Controllers\AfiController::class);
Route::resource('/daproses', App\Http\Controllers\DaprosController::class);
Route::resource('/agents', App\Http\Controllers\AgentController::class)->except('update');
Route::get('/heros', [App\Http\Controllers\HeroController::class, 'index']);
Route::get('edit-hero/{id}', [App\Http\Controllers\HeroController::class, 'edit'])->name('edit-hero');
Route::put('update-hero/{id}', [App\Http\Controllers\HeroController::class, 'update'])->name('update-hero');
Route::get('myprofiles', [App\Http\Controllers\UserController::class, 'myprofile']);
Route::post('profileupdate', [App\Http\Controllers\UserController::class, 'profileupdate']);
Route::post('import', function () {
    $fileName = time() . '_' . request()->file->getClientOriginalName();
    request()->file('file')->storeAs('reports', $fileName, 'public');
    Excel::import(new DaprosesImport, request()->file('file'));
    return redirect()->back()->with('success', 'Data Imported Successfully');
});
