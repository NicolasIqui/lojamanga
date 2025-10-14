

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MangaController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\usuarioControler;
use App\Http\Middleware\Authenticate;
/*
|--------------------------------------------------------------------------
| Web Routes----------------------------------------------------------------
|
| Here is wh
|----------ere you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', [MangaController::class, 'exibirManga']);

Route::get('/login', function () {
    return view('nivelUsuario.login');
})->name('login');

Route::get('/perfil', [usuarioControler::class, 'perfil'])
    ->middleware(Authenticate::class);


Route::post('/login', [UsuarioControler::class, 'fazerLogin'])->name('login.enviar');

Route::get('/cadastro', function () {
    return view('nivelUsuario.cadastro');
});
Route::post('/cadastro/inserir', [usuarioControler::class, 'store'])->name('cadastro.inserir');
Route::post('/logout', [UsuarioControler::class, 'fazerLogOut'])->name('logout');

// Rotas admin (nivelAcesso = 0)
Route::middleware([Authenticate::class, 'verificaNivel:0'])->group(function () {
    Route::get('/formcategoria', function () {
        return view('nivelAdmin.formcategoria');
    });  
    
Route::get('/formanga', [MangaController::class, 'exibirFormularioManga'])->name('formanga');

    Route::post('/manga/inserir', [MangaController::class, 'store'])->name('manga.inserir');
    Route::post('/categoria/inserir', [CategoriaController::class, 'store'])->name('categoria.inserir');
});

 Route::middleware([Authenticate::class, 'verificaNivel:1'])->group(function () {
Route::get('/perfil', [usuarioControler::class, 'perfil'])
    ->middleware(Authenticate::class);
    });


Route::post('/cadastro/inserir',[usuarioControler::class,'store'])->name('cadastro.inserir');





