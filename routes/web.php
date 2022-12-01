<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\Admin\IndexController as AdminIndexController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\ProfileController;

use App\Http\Controllers\Admin\NewsController as asd;

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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::name('news.')
    ->prefix('news')
    ->group(function () {
        Route::get('/', [NewsController::class, 'index'])->name('index');
        Route::get('/one/{news}', [NewsController::class, 'show'])->name('show');
        Route::name('category.')
            ->group(function () {
                Route::get('categories', [CategoryController::class, 'index'])->name('index');
                Route::get('category/{slug}', [CategoryController::class, 'show'])->name('show');
            });
    });

Route::name('admin.')
    ->prefix('admin')
    ->middleware(['auth', 'is_admin'])
    ->group(function () {
        Route::match(['get', 'post'], '/profile', [ProfileController::class, 'update'])->name('updateProfile');
        //TODO перевести на Resource
        Route::resource('/news', AdminNewsController::class)->except(['show']);

        //CRUD
/*      Route::get('/news', [AdminNewsController::class, 'index'])->name('index');
        Route::match(['get', 'post'], '/news/create', [AdminNewsController::class, 'create'])->name('create');
        Route::get('/news/edit/{news}', [AdminNewsController::class, 'edit'])->name('edit');
        Route::post('/news/update/{news}', [AdminNewsController::class, 'update'])->name('update');
        Route::delete('/news/destroy/{news}', [AdminNewsController::class, 'destroy'])->name('destroy');*/


        Route::get('/test1', [AdminIndexController::class, 'test1'])->name('test1');
        Route::get('/test2', [AdminIndexController::class, 'test2'])->name('test2');
    });


Route::view('/about', 'about')->name('about');



Auth::routes();
//Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
//Route::post('login', 'Auth\LoginController@login');
//Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
