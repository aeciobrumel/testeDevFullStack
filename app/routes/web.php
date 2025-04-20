<?php
use App\Http\Controllers\SiteController; // Import the SiteController
use Illuminate\Support\Facades\Route;

//rottas normais
Route::get('/',[SiteController::class, 'initLoginView'])-> name('login_page');
Route::get('/listar', [SiteController::class, 'initListarView']) -> name('listar_page');
Route::get('/cadastrarUsuario', [SiteController::class, 'initCadastrarUsuarioView']) -> name('cadastrar.usuario');

//login
Route::post('/login', [SiteController::class, 'fazerLogin'])->name('fazer.login');
Route::post('/logout', [SiteController::class, 'logout'])->name('logout');

//crud
Route::post('/cadastro', [SiteController::class, 'registrarUsuario'])->name('registrar.usuario');  
Route::get('/usuario/{id}/editar', [SiteController::class, 'editarUsuario'])->name('editar.usuario');
Route::put('/usuario/{id}', [SiteController::class, 'atualizarUsuario'])->name('atualizar.usuario');
Route::delete('/usuario/{id}', [SiteController::class, 'excluirUsuario'])->name('excluir.usuario');
