<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    Auth\LoginController
};

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
    return redirect()->route('login.index');
});

Route::namespace("Auth")->group(function () {
    Route::get("/login", [LoginController::class, 'index'])->name("login.index");
});

Route::get('/editar', function () {
    return view('pages.painel.editar');
});
Route::get('/deletar', function () {
    return view('pages.painel.deletar');
});
Route::get('/favoritos', function () {
    return view('pages.painel.favorito');
});
Route::get('/home', function () {
    return view('pages.painel.home');
});
Route::get('/inserir', function () {
    return view('pages.painel.inserir');
});
