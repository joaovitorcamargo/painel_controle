<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    Auth\LoginController,
    Auth\RegisterController,
    PainelController
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
    Route::post("/login", [LoginController::class, 'auth'])->name("login.auth");
    Route::get("/register", [RegisterController::class, 'index'])->name("register.index");
    Route::post("/register", [RegisterController::class, 'register'])->name("register");
});


Route::middleware(['auth'])->group(function () {
    Route::get('/editar', function () {
        return view('pages.painel.editar');
    });
    Route::get('/deletar', function () {
        return view('pages.painel.deletar');
    });
    Route::get('/favoritos', function () {
        return view('pages.painel.favorito');
    });

    Route::get('/home', [PainelController::class, 'index'])->name('painel.home');

    Route::get('/registrar', [PainelController::class, 'register'])->name('painel.register');
    Route::post('/register-heroes', [PainelController::class, 'registerHeroes'])->name('painel.register.heroes');
    Route::get('/heroe/{id}', [PainelController::class, 'viewHeroe'])->name('painel.heroe');
    Route::get('/heroi/superheroe/{id}/edit', [PainelController::class, 'editHeroe'])->name('painel.edit');
    Route::put('/heroi/superheroe/{id}', [PainelController::class, 'editHeroeSend'])->name('painel.edit.send');
    Route::post('/deletar/heroi/{id}', [PainelController::class, 'destroy'])->name('painel.delete.send');
    Route::get('/logout', [PainelController::class, 'logout'])->name('painel.logout');
});
