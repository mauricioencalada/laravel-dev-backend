<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Cecy\AuthoritiesController;
use App\Http\Controllers\Cecy\InstitutionsController;
use App\Http\Controllers\Cecy\CatalogueController;
use App\Http\Controllers\Cecy\ScheduleContoller;
use App\Http\Controllers\Cecy\SchoolPeriodController;
use App\Http\Controllers\Cecy\ParticipantController;

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

Route::apiResource('authorities', AuthoritiesController::class);
Route::apiResource('institutions', InstitutionsController::class);
Route::apiResource('participant', ParticipantController::class);
Route::apiResource('schedule', ScheduleContoller::class);
Route::apiResource('schoolPeriod', SchoolPeriodController::class);


Route::apiResource('catalogue',CatalogueController::class);
