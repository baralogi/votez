<?php

use App\Http\Controllers\Api\CandidatePartnerController as ApiCandidatePartnerController;
use App\Http\Controllers\Api\ParticipantController as ApiParticipantController;
use App\Http\Controllers\Api\VotingController as ApiVotingController;
use App\Http\Controllers\Auth\Participant\LoginController as ParticipantLoginController;
use App\Http\Controllers\Candidate\DashboardController as CandidateDashboardController;
use App\Http\Controllers\Candidate\PersonalController;
use App\Http\Controllers\Candidate\TeamController;
use App\Http\Controllers\Committee\VotingController as CommitteeVotingController;
use App\Http\Controllers\Guest\HomeController;
use App\Http\Controllers\Participant\CheckParticipantController;
use App\Http\Controllers\Participant\VotingController;
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


Auth::routes();
Route::get('participant/login', [ParticipantLoginController::class, 'showLoginForm'])->name('participant.login.form');
Route::post('participant/login', [ParticipantLoginController::class, 'login'])->name('participant.login');
Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('participant/checks', [CheckParticipantController::class, 'index'])->name('participant.check.index');
Route::post('participant/checks', [CheckParticipantController::class, 'store'])->name('participant.check.store');


Route::middleware('auth')->group(function () {
    Route::name('committee.')->prefix('committee')->group(function () {
        Route::resource('dashboard', Committee\DashboardController::class)->names('dashboard')->only('index');
        Route::resource('user', Committee\UserController::class)->names('user');
        Route::resource('voting', Committee\VotingController::class)->names('voting');
        Route::resource('voting/{voting}/candidate-partner', Committee\CandidatePartnerController::class)->names('voting.candidate-partner')->only('show');
        Route::resource('voting/{voting}/candidate-partner/{candidate_partner}/candidate', Committee\CandidateController::class)->names('voting.candidate-partner.candidate')->only('show');
        Route::resource('participant', Committee\ParticipantController::class)->names('participant')->except('show');
        Route::resource('blog', Committee\BlogController::class)->names('blog');

        Route::put('voting/{voting}/active', [CommitteeVotingController::class, 'activated'])->name('voting.active');
        Route::put('voting/{voting}/nonactive', [CommitteeVotingController::class, 'nonactivated'])->name('voting.nonactive');

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

        Route::get('api/participant', [ApiParticipantController::class, 'groubByHaveVoted'])->name('participant.groubByHaveVoted');
        Route::get('api/voting', [ApiCandidatePartnerController::class, 'groubByVoting'])->name('voting');
    });

    Route::name('candidate.')->prefix('candidates')->group(function () {
        Route::get('/dashboard', [CandidateDashboardController::class, 'index'])->name('dashboard.index');
        // Team Data
        Route::get('/teams', [TeamController::class, 'index'])->name('team.index');
        Route::get('/teams/{candidatePartner}', [TeamController::class, 'edit'])->name('team.edit');
        Route::put('/teams/{candidatePartner}', [TeamController::class, 'update'])->name('team.update');
        Route::get('/teams/{candidatePartner}/photo', [TeamController::class, 'editPhoto'])->name('team.edit.photo');
        Route::put('/teams/{candidatePartner}/photo', [TeamController::class, 'updatePhoto'])->name('team.update.photo');

        Route::resource('/personals', Candidate\PersonalController::class)->names('personal');

        Route::get('/personals/{candidate}/files/create', [PersonalController::class, 'createFile'])->name('personal.file.create');
        Route::post('/personals/{candidate}/files', [PersonalController::class, 'storeFile'])->name('personal.file.store');
        Route::get('/personals/{candidate}/files/{candidateFile}/edit', [PersonalController::class, 'editFile'])->name('personal.file.edit');
        Route::put('/personals/{candidate}/files/{candidateFile}', [PersonalController::class, 'updateFile'])->name('personal.file.update');
    });
});

Route::group(['prefix' => 'participant', 'as' => 'participant.', 'middleware' => 'auth:participant'], function () {
    Route::get('/voting', [VotingController::class, 'index'])->name('voting.index');
    Route::get('/voting/{voting}/candidate-partner', [VotingController::class, 'show'])->name('voting.show');
    Route::get('/voting/{voting}/candidate-partner/{candidatePartner}', [VotingController::class, 'showCandidate'])->name('voting.candidate-partner.show')->scopeBindings();

    Route::post('/vote', [VotingController::class, 'vote'])->name('vote.candidate');
});





Route::get('logs', [\Rap2hpoutre\LaravelLogViewer\LogViewerController::class, 'index']);
