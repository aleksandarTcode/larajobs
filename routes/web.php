<?php

use App\Http\Controllers\ListingController;
use App\Models\Listing;
use Illuminate\Http\Request;
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

// All Listings
Route::get('/', [ListingController::class, 'index']);

// Show Create Form
Route::get('/listings/create', [ListingController::class, 'create']);

// Store Listing Data
Route::post('/listings', [ListingController::class, 'store']);


// Single Listing
Route::get('/listings/{listing}', [ListingController::class, 'show']);


//// All Listings
//Route::get('/', function () {
//    return view('listings', [
//        'listings' => Listing::all(),
//    ]);
//});
//
//// Single Listing
//Route::get('/listings/{listing}', function (Listing $listing) {
//    return view('listing', [
//        'listing' => $listing,
//    ]);
//});


