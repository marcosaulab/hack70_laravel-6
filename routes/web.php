<?php

use App\Http\Controllers\ComicController;
use App\Http\Controllers\PublicController;
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

Route::get('/', [PublicController::class, 'home'])->name('home');

Route::get('/comic/create', [ComicController::class, 'create'])->name('comic.create');

Route::post('/comic/store', [ComicController::class, 'store'])->name('comic.store');

Route::get('/comic/index', [ComicController::class, 'index'])->name('comic.index');

Route::get('/comic/show/{comic}', [ComicController::class, 'show'])->name('comic.show'); // ! model binding

Route::get('/comic/edit/{comic}', [ComicController::class, 'edit'])->name('comic.edit');

Route::put('/comic/update/{comic}', [ComicController::class, 'update'])->name('comic.update');

Route::delete('/comic/delete/{comic}', [ComicController::class, 'delete'])->name('comic.delete');
