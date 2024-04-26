<?php


use App\Http\Controllers\Admin\Post\AdminCreateController;
use App\Http\Controllers\Admin\Post\AdminDestroyController;
use App\Http\Controllers\Admin\Post\AdminEditController;
use App\Http\Controllers\Admin\Post\AdminIndexController;
use App\Http\Controllers\Admin\Post\AdminShowController;
use App\Http\Controllers\Admin\Post\AdminStoreController;
use App\Http\Controllers\Admin\Post\AdminUpdateController;
use App\Http\Controllers\Post\IndexController;
use App\Http\Controllers\Post\ShowController;
use Illuminate\Support\Facades\Route;

//use App\Http\Controllers\Admin\Post\ShowController;

Route::get('/', function () {
    return view('welcome');
});

//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::group(['prefix' => '/posts'], function (){
        Route::get('/', IndexController::class)->name('posts.index');
        Route::get('/{post}', ShowController::class)->whereNumber('post')->name('posts.show');
    });

    Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function (){
        Route::group(['prefix' => 'posts'], function () {
            Route::get('/', AdminIndexController::class)->name('admin.posts.index');
            Route::get('/create', AdminCreateController::class)->name('admin.posts.create');
            Route::get('/{post}', AdminShowController::class)->whereNumber('post')->name('admin.posts.show');
            Route::get('/{post}/edit', AdminEditController::class)->name('admin.posts.edit');
            Route::post('/', AdminStoreController::class)->name('admin.posts.store');
            Route::patch('/{post}', AdminUpdateController::class)->name('admin.posts.update');
            Route::delete('/{post}', AdminDestroyController::class)->name('admin.posts.destroy');
        });
    });
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
