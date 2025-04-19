<?php
use App\Http\Controllers\SiteController; // Import the SiteController
use Illuminate\Support\Facades\Route;


Route::get('/',[SiteController::class, 'initLoginView'])-> name('login_page');
Route::get('/cadastro', [SiteController::class, 'initCadastroView']) -> name('cadastro_page'); 


//POST
Route::post('/login', [SiteController::class, 'fazerLogin'])->name('fazer.login');
Route::post('/logout', [SiteController::class, 'logout'])->name('logout');


//crud

Route::post('/cadastro', [SiteController::class, 'registrarUsuario'])->name('registrar.usuario');  
Route::get('/usuario/{id}/editar', [SiteController::class, 'editarUsuario'])->name('editar.usuario');
Route::put('/usuario/{id}', [SiteController::class, 'atualizarUsuario'])->name('atualizar.usuario');
Route::delete('/usuario/{id}', [SiteController::class, 'excluirUsuario'])->name('excluir.usuario');
