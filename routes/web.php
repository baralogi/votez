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

Route::get('/', function () {
    return view('vendor.datatables.print');
});

Route::resource('users', UserController::class);
Route::resource('votings', VotingController::class)->only(['index', 'create', 'store', 'edit', 'update', 'destroy']);

Route::prefix('votings')->group(function () {
    Route::get('/{voting}/candidates', [CandidateController::class, 'index'])->name('candidates.index');
});
