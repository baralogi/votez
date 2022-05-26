<?php

use App\Http\Controllers\Api\VotingController;
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

Route::resource('/organizations/{organization}/votings', Api\VotingController::class)->names('votings')->only('index');
Route::resource('/faculties', Api\FacultyController::class)->names('faculties')->only('index');
Route::resource('/faculties/{faculty}/majors', Api\MajorController::class)->names('majors')->only('index');
