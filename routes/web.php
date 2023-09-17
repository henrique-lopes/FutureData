<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExcelImportController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

Route::get('/dashboard', [ExcelImportController::class, 'index'])->middleware(['auth'])->name('dashboard');
//Route::get('/importacao', [ExcelImportController::class, ''])->middleware(['auth'])->name('dashboard');
Route::get('/dados', [ExcelImportController::class, 'dados'])->middleware(['auth'])->name('import.dados');

Route::post('/import', [ExcelImportController::class, 'import'])->name('import');
Route::get('/quantidadePessoa', [ExcelImportController::class, 'quantidadePessoa'])->name('quantidadePessoa');

Route::get('/clientesPropensos', [ExcelImportController::class, 'clientesPropensos'])->name('clientesPropensos');



require __DIR__.'/auth.php';
