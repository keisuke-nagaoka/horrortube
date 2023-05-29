<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\PrefecturesController;
use App\Http\Controllers\SpotsController;
use App\Http\Controllers\CommentsController;

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

Route::get('/', [PrefecturesController::class, 'index']);
Route::get('/dashboard', [PrefecturesController::class, 'index']);
Route::resource('prefectures', PrefecturesController::class);

Route::get('prefecture/{id}/spots', [SpotsController::class, 'index'])->name('spots.index');
Route::resource('spots', SpotsController::class)->except(['index']);

Route::get('/thread', [CommentsController::class, 'index'])->name('thread');
Route::resource('comments', CommentsController::class)->except(['index']);


require __DIR__.'/auth.php';

Route::group(['middleware' => ['auth']], function () {
    Route::resource('users', UsersController::class);

    Route::group(['prefix' => 'spot/{id}'], function () {
        Route::get('create', [SpotsController::class, 'create'])->name('spots.create');
        Route::post('store', [SpotsController::class, 'store'])->name('spots.store');
    });
    
    Route::group(['prefix' => 'comment/{id}'], function () {
        Route::get('create', [CommentsController::class, 'create'])->name('comments.create');
        Route::post('store', [CommentsController::class, 'store'])->name('comments.store');
    });
});