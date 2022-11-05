<?php

use App\Http\Controllers\AlunoController;
use App\Http\Controllers\CursosController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MatriculaController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');

Route::prefix('aluno')->group(function () {

    Route::get('/lista', [AlunoController::class, 'index'])->name('aluno.index');

    Route::get('/novo', [AlunoController::class, 'create'])->name('aluno.create');

    Route::post('/salvar', [AlunoController::class, 'store'])->name('aluno.store');

    Route::get('/alterar/{aluno}', [AlunoController::class, 'edit'])->name('aluno.edit');

    Route::put('/update/{aluno}', [AlunoController::class, 'update'])->name('aluno.update');

    Route::get('/delete/{aluno}', [AlunoController::class, 'destroy'])->name('aluno.destroy');
});

Route::prefix('curso')->group(function () {

    Route::get('/lista', [CursosController::class, 'index'])->name('curso.index');

    Route::get('/novo', [CursosController::class, 'create'])->name('curso.create');

    Route::post('/salvar', [CursosController::class, 'store'])->name('curso.store');

    Route::get('/alterar/{cursos}', [CursosController::class, 'edit'])->name('curso.edit');

    Route::put('/update/{cursos}', [CursosController::class, 'update'])->name('curso.update');

    Route::get('/delete/{cursos}', [CursosController::class, 'destroy'])->name('curso.destroy');
});

Route::prefix('matricula')->group(function () {

    Route::get('/lista', [MatriculaController::class, 'index'])->name('matricula.index');

    Route::get('/nova', [MatriculaController::class, 'create'])->name('matricula.create');

    Route::post('/salvar', [MatriculaController::class, 'store'])->name('matricula.store');

    Route::get('/alterar/{matricula}', [MatriculaController::class, 'edit'])->name('matricula.edit');

    Route::put('/update/{matricula}', [MatriculaController::class, 'update'])->name('matricula.update');

    Route::get('/delete/{matricula}', [MatriculaController::class, 'destroy'])->name('matricula.destroy');
});
