<?php

use App\Http\Controllers\GuestController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ObraController;
use App\Http\Controllers\PortalAutorController;
use Illuminate\Support\Facades\Route;

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
Route::get('/',[GuestController::class, 'index'])->name('frontEnd.home');
Route::get('/autor/perfil/{id}',[GuestController::class, 'AutorProfile'])->name('guest.autor.profile');
Route::get('/guest/ler_obra/{id}', [ObraController::class, 'LerObra'])->name('ler.obra.guest');

Route::middleware('autor')->group(function () {
    /* Routas referentes ao Autor */
    Route::controller(PortalAutorController::class)->group(function () {
        Route::get('/portal',[PortalAutorController::class, 'index'])->name('frontEnd.home.portal');
        Route::get('/autor/logout', [PortalAutorController::class, 'destroy'])->name('autor.logout');
        Route::get('/autor/portal', [PortalAutorController::class, 'PortalAutor'])->name('autor.portal');
        Route::get('/autor/profile', [PortalAutorController::class, 'ProfileAutor'])->name('autor.profile');
        Route::get('/autor/edit/profile', [PortalAutorController::class, 'EditProfileAutor'])->name('autor.edit.profile');
        Route::post('/autor/atualizar/profile', [PortalAutorController::class, 'AtualizarProfile'])->name('atualizar.autor.profile');
        
        Route::get('/autor/change/password', [PortalAutorController::class, 'ChangePassword'])->name('autor.change.password');
        Route::post('/update/password', [PortalAutorController::class, 'UpdatePassword'])->name('update.password');
    });

    /* Routas Referentes as Obras */
    Route::controller(ObraController::class)->group(function () {
        Route::get('/autor/todas_obra', [ObraController::class, 'TodasObra'])->name('todas.obra');
        Route::get('/autor/nova_obra', [ObraController::class, 'NovaObra'])->name('nova.obra');
        Route::get('/autor/ler_obra/{id}', [ObraController::class, 'LerObra'])->name('ler.obra');
        Route::get('/autor/editar_obra/{id}', [ObraController::class, 'EditarObra'])->name('editar.obra');
        Route::get('/autor/eliminar_obra/{id}', [ObraController::class, 'EliminarObra'])->name('eliminar.obra');
        Route::post('/autor/actualizar_obra', [ObraController::class, 'ActualizarObra'])->name('actualizar.obra');
        Route::post('/autor/add_obra', [ObraController::class, 'AddObra'])->name('add.obra');
    });
});




Route::middleware('admin')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/* Todas as rotas do Admin */
Route::middleware('admin')->group(function(){
    Route::controller(AdminController::class)->group(function () {
        Route::get('/dashboard', function () {
            return view('admin.index');
           /*  return view('dashboard'); */
        })->middleware(['auth', 'verified'])->name('dashboard');
        Route::get('/admin/logout', [AdminController::class, 'destroy'])->name('admin.logout');
        Route::get('/admin/profile', [AdminController::class, 'Profile'])->name('admin.profile');
        Route::get('/edit/profile', [AdminController::class, 'EditProfile'])->name('edit.profile');
        Route::post('/store/profile', [AdminController::class, 'StoreProfile'])->name('store.profile');
        Route::get('/change/password', [AdminController::class, 'ChangePassword'])->name('change.password');
        Route::post('/update/password', [AdminController::class, 'UpdatePassword'])->name('update.password');
    });
});

require __DIR__ . '/auth.php';
