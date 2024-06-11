<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarisController;

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

Route::get('/', function() {
    return view('tipos.index');
});

Route::get('/login', [UsuarisController::class, 'showLogin'])->name('login');
Route::post('/login', [UsuarisController::class, 'login']);
Route::post('/logout', [UsuarisController::class, 'logout']);

Route::middleware(['auth'])->group(function () {
    Route::get('/home', function(){
        $user = Auth::user();

        return view('home', compact('user'));
    });
});



Route::get('/admin', function() {
    return view('layouts.index');
});

Route::get('/cicles', function() {
    return view('dadesMestres.cicles.index');
});

Route::get('/usuaris', function() {
    return view('dadesMestres.usuaris.index');
});
