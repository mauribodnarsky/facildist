<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\Authenticate;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
//RUTAS DE PRODUCTOS

Route::prefix('productos')->middleware(Authenticate::class)->group(function(){
    Route::post('/publicar', [App\Http\Controllers\ProductoController::class, 'publicar'])->name('productos.publicar');

    });