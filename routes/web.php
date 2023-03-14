<?php

use App\Http\Controllers\ListingController;
use App\Http\Controllers\UserController;
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
Route::get('/listings/create', [ListingController::class, 'create'])->middleware('auth');

// Store Listing Data
Route::post('/listings', [ListingController::class, 'store'])->middleware('auth');

// Single Listing
Route::get('/listings/{listing}', [ListingController::class, 'show']);

// Show Edit Form
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit'])->middleware('auth');

// Update Listing Data
Route::put('/listings/{listing}', [ListingController::class, 'update'])->middleware('auth');

// Delete Listing
Route::delete('/listings/{listing}', [ListingController::class, 'destroy'])->middleware('auth');



// Show Register/Create Form
Route::get('/register', [UserController::class,'create'])->middleware('guest');

// Create New User
Route::post('/register', [UserController::class, 'store']);

// Log User Out
Route::post('/logout', [UserController::class, 'destroy'])->middleware('auth');

// Show Login Form
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

// Log In User
Route::post('/login', [UserController::class, 'authenticate']);









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


