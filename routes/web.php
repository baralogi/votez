<?php

use App\Http\Controllers\Candidate\DashboardController as CandidateDashboardController;
use App\Http\Controllers\Candidate\PersonalController;
use App\Http\Controllers\Candidate\TeamController;
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
    Route::name('committee.')->prefix('committee')->group(function () {
        Route::resource('dashboard', Committee\DashboardController::class)->names('dashboard')->only('index');
        Route::resource('user', Committee\UserController::class)->names('user');
        Route::resource('voting', Committee\VotingController::class)->names('voting');
        Route::resource('voting/{voting}/candidate-partner', Committee\CandidatePartnerController::class)->names('voting.candidate-partner')->only('show');
        Route::resource('voting/{voting}/candidate-partner/{candidate_partner}/candidate', Committee\CandidateController::class)->names('voting.candidate-partner.candidate')->only('show');
        Route::resource('participant', Committee\ParticipantController::class)->names('participant')->only('index');
        Route::resource('blog', Committee\BlogController::class)->names('blog')->only('index');

        Route::put(
            'voting/{voting}/candidate-partner/{candidate_partner}/approve',
            [App\Http\Controllers\Committee\CandidatePartnerController::class, 'approve']
        )
            ->name('voting.candidate-partner.approve')
            ->scopeBindings();
        Route::put(
            'voting/{voting}/candidate-partner/{candidate_partner}/decline',
            [App\Http\Controllers\Committee\CandidatePartnerController::class, 'decline']
        )
            ->name('voting.candidate-partner.decline')
            ->scopeBindings();
        Route::put(
            'voting/{voting}/candidate-partner/{candidate_partner}/sequence-number',
            [App\Http\Controllers\Committee\CandidatePartnerController::class, 'setSequenceNumber']
        )
            ->name('voting.candidate-partner.sequence-number')
            ->scopeBindings();
    });

    Route::name('candidate.')->prefix('candidates')->group(function () {
        Route::get('/dashboard', [CandidateDashboardController::class, 'index'])->name('dashboard.index');
        // Team Data
        Route::get('/teams', [TeamController::class, 'index'])->name('team.index');
        Route::get('/teams/{candidatePartner}', [TeamController::class, 'edit'])->name('team.edit');
        Route::put('/teams/{candidatePartner}', [TeamController::class, 'update'])->name('team.update');
        Route::get('/teams/{candidatePartner}/photo', [TeamController::class, 'editPhoto'])->name('team.edit.photo');
        Route::put('/teams/{candidatePartner}/photo', [TeamController::class, 'updatePhoto'])->name('team.update.photo');
        // Personal Data 
        // Route::get('/personals', [PersonalController::class, 'index'])->name('candidate.personal.index');
        Route::get('/personals/create', [PersonalController::class, 'create'])->name('personal.create');
        Route::post('/personals', [PersonalController::class, 'store'])->name('personal.store');
        // Route::get('/personals/{candidate}', [PersonalController::class, 'show'])->name('candidate.personal.show');
        Route::get('/personals/{candidate}/edit', [PersonalController::class, 'edit'])->name('personal.edit');
        Route::put('/personals/{candidate}', [PersonalController::class, 'update'])->name('personal.update');
        Route::delete('/personals/{candidate}', [PersonalController::class, 'destroy'])->name('personal.destroy');
        Route::get('/personals/{candidate}/files/create', [PersonalController::class, 'createFile'])->name('personal.file.create');
        Route::post('/personals/{candidate}/files', [PersonalController::class, 'storeFile'])->name('personal.file.store');
        Route::get('/personals/{candidate}/files/{candidateFile}/edit', [PersonalController::class, 'editFile'])->name('personal.file.edit');
        Route::put('/personals/{candidate}/files/{candidateFile}', [PersonalController::class, 'updateFile'])->name('personal.file.update');

        Route::resource('/personal', Candidate\PersonalController::class)->names('personal')->only('index', 'show');
    });
});
