<?php

use App\Http\Controllers\Api\MajorController;
use App\Http\Controllers\Api\VotingController;
use App\Http\Controllers\Api\FacultyController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::prefix('organizations')->group(function () {
    Route::get('/{id}/votings', [VotingController::class, 'getByOrganization'])->name('organizations.voting');
});

Route::get('/faculties', [FacultyController::class, 'index'])->name('faculties.index');

Route::get('/faculties/{faculty}/majors', [MajorController::class, 'getByFacultyId'])->name('faculties.show.majors');
Route::get('/majors', [MajorController::class, 'index'])->name('majors.index');
