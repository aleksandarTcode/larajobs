<?php

use App\Http\Controllers\ApiAuthController;
use App\Models\Listing;
use App\Http\Controllers\ApiListingController;
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

Route::post('/register', [ApiAuthController::class, 'register']);
Route::post('/login', [ApiAuthController::class, 'login']);

Route::get('/listings', [ApiListingController::class, 'index']);
Route::get('listings/{listing}',[ApiListingController::class, 'show']);
Route::get('listings/search/{name}', [ApiListingController::class, 'search']);


// Protected routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/listings',[ApiListingController::class, 'store']);
    Route::put('listings/{id}',[ApiListingController::class, 'update']);
    Route::delete('listings/{listing}', [ApiListingController::class, 'destroy']);

    Route::post('/logout', [ApiAuthController::class,'logout']);
});


