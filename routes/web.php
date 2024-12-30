<?php

use App\Http\Controllers\Home;
use App\Http\Controllers\HomeController;
use Filament\Resources\Resource;
use Illuminate\Support\Facades\Route;
use OpenSpout\Common\Entity\Row;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/mision', function () {
    return view('mision');
});


Route::get('/', [HomeController::class, 'index'])->name('index'); // Para mostrar la lista o la página principal

// Ruta para mostrar el formulario de creación
Route::get('/create', [HomeController::class, 'create'])->name('home.create'); // Para mostrar el formulario de creación

// Ruta para almacenar los datos enviados
Route::post('/store', [HomeController::class, 'store'])->name('home.store'); 