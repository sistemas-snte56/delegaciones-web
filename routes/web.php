<?php

use App\Http\Controllers\AsignarController;
use App\Livewire\SelectorDelegacion;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\MaestroController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DelegacionController;
use App\Http\Controllers\DelegacionCtController;
use App\Http\Controllers\PermisoController;
use App\Http\Controllers\RoleController;

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

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
        // Route::get('/dashboard', function () {
        //     return view('dashboard');
        // })->name('dashboard');
    Route::get('/dashboard',[DashboardController::class,'index']);
    Route::get('/profile',[ProfileController::class,'index']);
    Route::resource('/regiones', RegionController::class)->names('region');
    route::resource('/delegaciones', DelegacionController::class)->names('delegacion');
    Route::resource('/maestros', MaestroController::class)->names('maestro');
    Route::resource('/roles', RoleController::class)->names('roles');
    Route::resource('/permisos', PermisoController::class)->names('permisos');
    Route::resource('/asignar', AsignarController::class)->names('asignar');
    
    Route::get('/delegaciones/{delegacione}/print', [DelegacionController::class,'printHoja'])->name('delegacion.print');
    Route::get('/delegaciones/{delegacione}/hoja', [DelegacionController::class,'printHojaDatos'])->name('delegacion.date');

    Route::get('/delegacion-ct', [DelegacionCtController::class,'index']);
    Route::get('/delegaciones/get-nomenclatura/{TipoDelegacionId}', [DelegacionController::class,'getNomenclaturas']);
    Route::get('/delegaciones/selector-delegacion',[SelectorDelegacion::class]);
});
