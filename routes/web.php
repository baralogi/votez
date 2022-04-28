<?php

use App\Http\Controllers\Candidate\DashboardController as CandidateDashboardController;
use App\Http\Controllers\Candidate\PersonalController;
use App\Http\Controllers\Candidate\TeamController;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\Committee\DashboardController;
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


Route::get('logs', [\Rap2hpoutre\LaravelLogViewer\LogViewerController::class, 'index']);
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
        Route::delete('/users/{user}', [CommitteUserController::class, 'destroy'])->name('users.destroy');
        Route::resource('participants', ParticipantController::class);
        Route::resource('blogs', BlogController::class);

        Route::resource('votings', Committee\VotingController::class)->names('voting');
        Route::resource('votings/{voting}/candidates', Committee\CandidateController::class)->names('voting.candidate');


        // Route::prefix('votings')->group(function () {
        //     Route::get('/', [VotingController::class, 'index'])->name('votings.index');
        //     Route::get('/{voting}', [VotingController::class, 'show'])->name('votings.show');
        //     Route::get('/create', [VotingController::class, 'create'])->name('votings.create');
        //     Route::post('/', [VotingController::class, 'store'])->name('votings.store');
        //     Route::get('/{voting}/edit', [VotingController::class, 'edit'])->name('votings.edit');
        //     Route::put('/{voting}', [VotingController::class, 'update'])->name('votings.update');
        //     Route::delete('/{voting}', [VotingController::class, 'destroy'])->name('votings.destroy');
        //     Route::get('/{voting}/candidates', [CandidateController::class, 'index'])->name('candidates.index');
        //     Route::get('/{voting}/candidates/{candidate}', [CandidateController::class, 'show'])->name('candidates.show');
        // });
    });

    Route::prefix('candidates')->group(function () {
        Route::get('/dashboard', [CandidateDashboardController::class, 'index'])->name('candidate.dashboard.index');
        // Team Data
        Route::get('/teams', [TeamController::class, 'index'])->name('candidate.team.index');
        Route::get('/teams/{candidatePartner}', [TeamController::class, 'edit'])->name('candidate.team.edit');
        Route::put('/teams/{candidatePartner}', [TeamController::class, 'update'])->name('candidate.team.update');
        Route::get('/teams/{candidatePartner}/photo', [TeamController::class, 'editPhoto'])->name('candidate.team.edit.photo');
        Route::put('/teams/{candidatePartner}/photo', [TeamController::class, 'updatePhoto'])->name('candidate.team.update.photo');
        // Personal Data 
        Route::get('/personals', [PersonalController::class, 'index'])->name('candidate.personal.index');
        Route::get('/personals/create', [PersonalController::class, 'create'])->name('candidate.personal.create');
        Route::post('/personals', [PersonalController::class, 'store'])->name('candidate.personal.store');
        Route::get('/personals/{candidate}', [PersonalController::class, 'show'])->name('candidate.personal.show');
        Route::get('/personals/{candidate}/edit', [PersonalController::class, 'edit'])->name('candidate.personal.edit');
        Route::put('/personals/{candidate}', [PersonalController::class, 'update'])->name('candidate.personal.update');
        Route::delete('/personals/{candidate}', [PersonalController::class, 'destroy'])->name('candidate.personal.destroy');
        Route::get('/personals/{candidate}/files/create', [PersonalController::class, 'createFile'])->name('candidate.personal.file.create');
        Route::post('/personals/{candidate}/files', [PersonalController::class, 'storeFile'])->name('candidate.personal.file.store');
        Route::get('/personals/{candidate}/files/{candidateFile}/edit', [PersonalController::class, 'editFile'])->name('candidate.personal.file.edit');
        Route::put('/personals/{candidate}/files/{candidateFile}', [PersonalController::class, 'updateFile'])->name('candidate.personal.file.update');
    });
});
