<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MangaController;
use App\Http\Controllers\QuadrinhoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\HomeControler;
use App\Http\Controllers\UsuarioControler;
use App\Http\Controllers\usuarioControler as ControllersUsuarioControler;
use App\Http\Middleware\Authenticate;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Aqui você pode registrar as rotas web da aplicação.
*/

// Página inicial mostrando mangas
Route::get('/', [HomeControler::class, 'index']);
Route::get('/mangas', [MangaController::class, 'exibirManga'])->name('exibirManga.exibir');

// Login e cadastro
Route::get('/login', function () {
    return view('nivelUsuario.login');
})->name('login');

Route::post('/login', [UsuarioControler::class, 'fazerLogin'])->name('login.enviar');

Route::get('/cadastro', function () {
    return view('nivelUsuario.cadastro');
});
Route::post('/cadastro/inserir', [UsuarioControler::class, 'store'])->name('cadastro.inserir');



// Logout
Route::post('/logout', [UsuarioControler::class, 'fazerLogOut'])->name('logout');


Route::get('/quadrinhos', [QuadrinhoController::class, 'exibirQuadrinho'])->name('quadrinhos.exibir');
Route::get('/formquadrinho', [QuadrinhoController::class, 'exibirFormularioQuadrinho'])->name('formquadrinho');
Route::post('/quadrinho/inserir', [QuadrinhoController::class, 'store'])->name('quadrinho.inserir');

Route::get('/download-csv',[UsuarioControler::class,'download'])->name('download.csv');
Route::get('/downloadquadrinho-csv',[QuadrinhoController::class,'download'])->name('downloadquadrinho.csv');
Route::get('/downloadmanga-csv',[MangaController::class,'download'])->name('downloadmanga.csv');

Route::middleware('auth')->group(function () {
    Route::get('/perfil', [UsuarioControler::class, 'perfil'])->name('usuario.perfil');
    Route::put('/perfil', [UsuarioControler::class, 'update'])->name('usuario.update'); // sem {id}
});

// Rotas admin (nível 0)
Route::middleware([Authenticate::class, 'verificaNivel:0'])->group(function () {
Route::get('/dashboard', [UsuarioControler::class, 'dashboard'])->name('dashboard');


    // Formulários
    Route::get('/formcategoria', function () {
        return view('nivelAdmin.formcategoria');
    });

   
   
    Route::get('/formanga', [MangaController::class, 'exibirFormularioManga'])->name('formanga');

    // Inserções
    Route::post('/categoria/inserir', [CategoriaController::class, 'store'])->name('categoria.inserir');
    Route::post('/manga/inserir', [MangaController::class, 'store'])->name('manga.inserir');
});
