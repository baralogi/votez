<?php

use App\Http\Controllers\CandidateController;
use App\Http\Controllers\Committee\DashboardController;
use App\Http\Controllers\Committee\VotingController;
use App\Http\Controllers\Committee\UserController as CommitteUserController;
use App\Http\Controllers\Guest\CandidateController as AppCandidateController;
use App\Http\Controllers\Guest\HomeController;
use Illuminate\Support\Facades\Auth;
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



Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/candidates', [AppCandidateController::class, 'index'])->name('home.candidates');

Auth::routes();
Route::middleware('auth')->group(function () {
    Route::prefix('committee')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('committee.dashboard.index');
        /** User */
        Route::get('/users', [CommitteUserController::class, 'index'])->name('users.index');
        Route::get('/users/create', [CommitteUserController::class, 'create'])->name('users.create');
        Route::post('/users', [CommitteUserController::class, 'store'])->name('users.store');
        Route::get('/users/{user}', [CommitteUserController::class, 'show'])->name('users.show');
        Route::get('/users/{user}/edit', [CommitteUserController::class, 'edit'])->name('users.edit');
        Route::put('/users/{user}', [CommitteUserController::class, 'update'])->name('users.update');
        Route::resource('participants', ParticipantController::class);
        Route::resource('blogs', BlogController::class);
        Route::prefix('votings')->group(function () {
            Route::get('/', [VotingController::class, 'index'])->name('votings.index');
            Route::get('/create', [VotingController::class, 'create'])->name('votings.create');
            Route::post('/', [VotingController::class, 'store'])->name('votings.store');
            Route::get('/{voting}/edit', [VotingController::class, 'edit'])->name('votings.edit');
            Route::put('/{voting}', [VotingController::class, 'update'])->name('votings.update');
            Route::delete('/{voting}', [VotingController::class, 'destroy'])->name('votings.destroy');
            Route::get('/{voting}/candidates', [CandidateController::class, 'index'])->name('candidates.index');
            Route::get('/{voting}/candidates/{candidate}', [CandidateController::class, 'show'])->name('candidates.show');
        });
    });
});
