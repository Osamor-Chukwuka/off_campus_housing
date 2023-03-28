<?php

use App\Http\Controllers\HousesController;
use App\Http\Controllers\MessageController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// show create house page
Route::get('/show-create-house-page', [HousesController::class, 'showCreateHousePage'])->name('create_house_page');

// create houses
Route::post('/create-house', [HousesController::class, 'createHouse'])->name('create_house');

// display houses page
Route::get('/houses', [HousesController::class, 'show'])->name('houses');

// collect search query for houses
Route::post('houses/search', [HousesController::class, 'search'])->name('search');

// redirect from search when user clicks clear
Route::post('houses/search/redirect', [HousesController::class, 'searchRedirect'])->name('search-redirect');

// display building full page
Route::get('/houses/full-page/{house}', [HousesController::class, 'fullPage'])->name('full-details');

// Display Message page
// this is just a dummy route. when you're fully implementing the app, the route should end with message/landlordID, which will lead the user to the inbox of the Landlord. but there should be another general route in the pages header to link to the message section, not a particular landlord DM. You Get? young man
Route::get('/houses/full-page/message', [MessageController::class, 'displayMessagePage'])->name('message_page');
