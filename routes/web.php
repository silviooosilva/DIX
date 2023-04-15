<?php

use App\Http\Controllers\newsController;
use App\Http\Controllers\searchController;
use App\Http\Controllers\UserController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home')->middleware('auth');

Route::prefix('/users')->group(function () {
    Route::view('/', 'users.add')->name('users.add');
    Route::get('/edit/{id}', [UserController::class, 'editUser'])->name('users.edit');
    Route::post('/add', [UserController::class, 'addUser'])->name('users.create');
    Route::put('/update/{id}', [UserController::class, 'updateUser'])->name('users.update');
    Route::post('/delete/{id}', [UserController::class, 'deleteUser'])->name('users.delete');
});




Route::group(['middleware' => 'auth'], function () {
    Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
    Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
    Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
    Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
});

Route::prefix('/news')->group(function () {
    Route::get('/', [newsController::class, 'index'])->name('news.index');
    Route::get('/show/{id}', [newsController::class, 'show'])->name('news.show');
    Route::get('/create', [newsController::class, 'create'])->name('news.create');
    Route::post('/create', [newsController::class, 'createNews'])->name('news.store');
    Route::post('/update/{id}', [newsController::class, 'updateNews'])->name('update.news');
    Route::get('/update/{id}', [newsController::class, 'update'])->name('update.show');
    Route::post('/delete/{id}', [newsController::class, 'delete'])->name('news.delete');
});

Route::post('/search', [searchController::class, 'index'])->name('news.search');
