<?php

use App\Http\Middleware\Authenticate;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
 use Illuminate\Support\Facades\Auth;
use App\Models\User;
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

Route::get('/dashboard', function () {
    return view('welcome');
});

require __DIR__.'/auth.php';


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/google-auth/redirect', function () {
    return Socialite::driver('google')->redirect();
});
 
Route::get('/google-auth/callback', function () {
    $user_google = Socialite::driver('google')->user();
    $user=User::updateOrCreate([
            'google_id'=>$user_google->id,
        ],
        [
            'name'=>$user_google->name,
            'email'=>$user_google->email,

        ]);

Auth::login($user);
return redirect('/dashboard');
});

//RUTAS DE PRODUCTOS

Route::prefix('productos')->middleware(Authenticate::class)->group(function(){
    Route::get('/', [App\Http\Controllers\ProductoController::class, 'index'])->name('productos.index');
    Route::get('/show/{id}', [App\Http\Controllers\ProductoController::class, 'show'])->name('productos.show');

    Route::get('invitacion/{id}/{cantidad}', [ProductoController::class, 'updateConfirmados']);
    Route::get('invitacion/{evento}', [ProductoController::class, 'viewInvited']);
    Route::put('update/', [App\Http\Controllers\ProductoController::class, 'update'])->name('productos.update');

    Route::post('/create', [App\Http\Controllers\ProductoController::class, 'create'])->name('productos.create');

    Route::delete('/{id}', [App\Http\Controllers\ProductoController::class, 'delete'])->name('productos.destroy');

    });
    
        //RUTAS DE PEDIDOS

        Route::prefix('pedidos')->middleware(Authenticate::class)->group(function(){
            Route::get('/', [App\Http\Controllers\PedidosController::class, 'index'])->name('pedidos.index');
            Route::get('/show/{id}', [App\Http\Controllers\PedidosController::class, 'show'])->name('pedidos.show');
            Route::put('update/', [App\Http\Controllers\PedidosController::class, 'update'])->name('pedidos.update');
            Route::post('/', [App\Http\Controllers\PedidosController::class, 'create'])->name('pedidos.create');
            Route::delete('/{id}', [App\Http\Controllers\PedidosController::class, 'delete'])->name('pedidos.destroy');
        
            });
            
        //RUTAS DE DITRIBUIDORAS(PERFIL)

        Route::prefix('perfil')->middleware(Authenticate::class)->group(function(){
            Route::get('/', [App\Http\Controllers\DistribuidoraController::class, 'index'])->name('distribuidora.perfil');
            Route::get('/show/{id}', [App\Http\Controllers\DistribuidoraController::class, 'show'])->name('distribuidoras.show');
            Route::put('update/', [App\Http\Controllers\DistribuidoraController::class, 'update'])->name('distribuidoras.update');
            Route::post('/', [App\Http\Controllers\DistribuidoraController::class, 'create'])->name('distribuidoras.create');
        
            Route::delete('/{id}', [App\Http\Controllers\DistribuidoraController::class, 'delete'])->name('distribuidoras.destroy');
        
            });
            
        //RUTAS DE OFERTAS

        Route::prefix('ofertas')->middleware(Authenticate::class)->group(function(){
            Route::get('/', [App\Http\Controllers\OfertasController::class, 'index'])->name('ofertas.index');
            Route::get('/show/{id}', [App\Http\Controllers\OfertasController::class, 'show'])->name('ofertas.show');
            Route::put('update/', [App\Http\Controllers\OfertasController::class, 'update'])->name('ofertas.update');
            Route::post('/', [App\Http\Controllers\OfertasController::class, 'create'])->name('ofertas.create');
        
            Route::delete('/{id}', [App\Http\Controllers\OfertasController::class, 'delete'])->name('ofertas.destroy');
        
            });
            
        //RUTAS DE REVISTAS

        Route::prefix('revistas')->middleware(Authenticate::class)->group(function(){
            Route::get('/', [App\Http\Controllers\RevistaController::class, 'index'])->name('revistas.index');
            Route::get('/show/{id}', [App\Http\Controllers\RevistaController::class, 'show'])->name('revistas.show');
            Route::put('update/', [App\Http\Controllers\RevistaController::class, 'update'])->name('revistas.update');
            Route::post('/', [App\Http\Controllers\RevistaController::class, 'create'])->name('revistas.create');
        
            Route::delete('/{id}', [App\Http\Controllers\RevistaController::class, 'delete'])->name('revistas.destroy');
        
            });
        //RUTAS DE CLIENTES

        Route::prefix('clientes')->middleware(Authenticate::class)->group(function(){
            Route::get('/', [App\Http\Controllers\ClienteController::class, 'index'])->name('clientes.index');
            Route::get('/show/{id}', [App\Http\Controllers\ClienteController::class, 'show'])->name('clientes.show');
            Route::put('update/', [App\Http\Controllers\ClienteController::class, 'update'])->name('clientes.update');
            Route::post('/', [App\Http\Controllers\ClienteController::class, 'create'])->name('clientes.create');
        
            Route::delete('/{id}', [App\Http\Controllers\ClienteController::class, 'delete'])->name('clientes.destroy');
        
            });