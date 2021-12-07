<?php

use App\Http\Controllers\CandidateController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VotingController;
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

Route::prefix('committee')->group(function () {
    Route::resource('users', UserController::class);
    Route::prefix('votings')->group(function () {
        Route::get('/', [VotingController::class, 'index'])->name('votings.index');
        Route::get('/create', [VotingController::class, 'create'])->name('votings.create');
        Route::post('/', [VotingController::class, 'store'])->name('votings.store');
        Route::get('/{voting}/edit', [VotingController::class, 'edit'])->name('votings.edit');
        Route::put('/{voting}', [VotingController::class, 'update'])->name('votings.update');
        Route::delete('/{voting}', [VotingController::class, 'destroy'])->name('votings.destroy');
        Route::get('/{voting}/candidates', [CandidateController::class, 'index'])->name('candidates.index');
    });
});


// Route::resource('votings', VotingController::class)->only(['index', 'create', 'store', 'edit', 'update', 'destroy']);
