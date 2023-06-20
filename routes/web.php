<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\LocalizationController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\DirectoryController;
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


//Etudiant

Route::get('List', [EtudiantController::class, 'index'])->name('list.index');
Route::get('etudiant/{etudiant}', [EtudiantController::class, 'show'])->name('etudiant.show');


Route::get('etudiant-create/{user}', [EtudiantController::class, 'create'])->name('etudiant.create');
Route::post('etudiant-create', [EtudiantController::class, 'store'])->name('etudiant.store');


Route::get('etudiant-edit/{etudiant}', [EtudiantController::class, 'edit'])->name('etudiant.edit');
Route::put('etudiant-edit/{etudiant}', [EtudiantController::class, 'update']);


Route::delete('etudiant/{etudiant}', [EtudiantController::class, 'destroy']);

//Registration

Route::get('registration', [CustomAuthController::class, 'create'])->name('registration');
Route::post('registration', [CustomAuthController::class, 'store']);

Route::get('login', [CustomAuthController::class, 'index'])->name('login');
Route::post('login', [CustomAuthController::class, 'authentication'])->name('login.authentication');
Route::get('logout', [CustomAuthController::class, 'logout'])->name('logout');

Route::get('user-list', [CustomAuthController::class, 'userList'])->name('user.list')->middleware('auth');

Route::get('lang/{locale}', [LocalizationController::class, 'index'])->name('lang');


// Article

Route::get('/article-List', [ArticleController::class, 'index'])->name('article.index');
Route::get('article/{article}', [ArticleController::class, 'show'])->name('article.show');

Route::get('article-create', [ArticleController::class, 'create'])->name('article.create');
Route::post('article-create', [ArticleController::class, 'store'])->name('article.store');

Route::get('article-edit/{article}', [ArticleController::class, 'edit'])->name('article.edit');
Route::put('article-edit/{article}', [ArticleController::class, 'update']);

Route::delete('article/{article}', [ArticleController::class, 'destroy']);


Route::get('article-pdf/{article}', [ArticleController::class, 'showPdf'])->name('article.showPdf');


// Directory

Route::get('/directory', [DirectoryController::class, 'index'])->name('directory.index');

Route::get('/directory-create', [DirectoryController::class, 'create'])->name('directory.create');
Route::post('/directory-create', [DirectoryController::class, 'store'])->name('directory.store');

Route::get('directory-edit/{directory}', [DirectoryController::class, 'edit'])->name('directory.edit');
Route::put('directory-edit/{directory}', [DirectoryController::class, 'update']);

Route::delete('directory/{directory}', [DirectoryController::class, 'destroy'])->name('directory.destroy');