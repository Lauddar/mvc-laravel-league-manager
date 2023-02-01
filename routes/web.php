<?php

use App\Http\Controllers\LeagueController;
use App\Http\Controllers\FootballMatchController;
use App\Http\Controllers\ClubController;
use App\Http\Controllers\TeamController;
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
    return view('home');
});

Route::resource('leagues', LeagueController::class);

Route::resource('leagues/footballMatches', FootballMatchController::class);

Route::resource('clubs', ClubController::class);

Route::resource('clubs/teams', TeamController::class);