<?php

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
Route::get('/listings', [ApiListingController::class, 'index']);

Route::post('/listings',[ApiListingController::class, 'store']);

Route::get('listings/{listing}',[ApiListingController::class, 'show']);

Route::put('listings/{listing}',[ApiListingController::class, 'update']);

Route::delete('listings/{listing}', [ApiListingController::class, 'destroy']);

Route::get('listings/search/{name}', [ApiListingController::class, 'search']);





Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
