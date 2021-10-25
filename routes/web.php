<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function () {

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::resource('users', App\Http\Controllers\UserController::class);

    Route::resource('permissions', App\Http\Controllers\PermissionController::class);

    Route::resource('roles', App\Http\Controllers\RoleController::class);

    Route::resource('votings', App\Http\Controllers\VotingController::class);

    Route::get('votings/{voting}/publish', [App\Http\Controllers\VotingController::class, 'publish'])
        ->name('votings.publish');

    Route::get('votings/{voting}/options', [App\Http\Controllers\OptionController::class, 'index'])
        ->name('options.index');

    Route::get('votings/{voting}/options/create', [App\Http\Controllers\OptionController::class, 'create'])
        ->name('options.create');

    Route::post('votings/{voting}/options/store', [App\Http\Controllers\OptionController::class, 'store'])
        ->name('options.store');

    Route::delete('votings/{voting}/options/{option}/destroy', [App\Http\Controllers\OptionController::class, 'destroy'])
        ->name('options.destroy');

    Route::get('votings/{voting}/options/{option}/edit', [App\Http\Controllers\OptionController::class, 'edit'])
        ->name('options.edit');

    Route::patch('votings/{voting}/options/{option}/update', [App\Http\Controllers\OptionController::class, 'update'])
        ->name('options.update');

    Route::get('votings/{voting}/choice', [App\Http\Controllers\VotingController::class, 'choice'])
        ->name('voting.choice');

    Route::post('votings/{voting}/chose', [App\Http\Controllers\VotingController::class, 'chose'])
        ->name('voting.chose');
});
