<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\HousesController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\OrdersController;
use GuzzleHttp\Psr7\Request;
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

Route::get('/', [App\Http\Controllers\HousesController::class, 'welcome']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// show create house page
Route::get('/show-create-house-page', [HousesController::class, 'showCreateHousePage'])->name('create_house_page');

// Update Landlords account details for payment
Route::post('/update-payment', [HousesController::class, 'updateLandlordPayment'])->name('update_account_details');

// create houses
Route::post('/create-house', [HousesController::class, 'createHouse'])->name('create_house');

// display houses page
Route::get('/houses', [HousesController::class, 'show'])->name('houses');

// collect search query for houses
Route::post('houses/search', [HousesController::class, 'search'])->name('search');

// redirect from search when user clicks clear
Route::post('houses/search/redirect', [HousesController::class, 'searchRedirect'])->name('search-redirect');

// display building full page
Route::get('/houses/full-page/{house}', [HousesController::class, 'fullPage'])->name('full-details')->middleware('prevent-back-history');

// Add Comments
Route::post('house/comment/{house_id}/{landlord_id}', [CommentController::class, 'addComment']);

// make payment
Route::get('/house/pay/{houseId}', [OrdersController::class, 'makePayment'])->name('make_payment');

Route::get('/house/pay/verify-payment/{reference}/{productId}', [OrdersController::class, 'verifyCustomerPayment']);

// Display all houses that belongs to a Landlord
Route::get('/my-houses', [HousesController::class, 'myHouses'])->name('my_houses');

// Landlord Delete House 
Route::post('/my-houses/delete', [HousesController::class, 'deleteLandlordHouse'])->name('delete_house');

// Display all houses that belongs to a Landlord that has been rented/bought
Route::get('/my-houses/rented', [HousesController::class, 'showRentedHouses'])->name('landlord_rented_houses');

// Show receipt to Landlord
Route::get('/house/pay/receipt/{house_id}/{landlord_id}', [HousesController::class, 'landlordReceipt']);

// Show all student rented houses
Route::get('/student-ordered-houses', [HousesController::class, 'studentOwnedHouses'])->name('student_owned_houses');

// back button
// Route::get('/back', function(){
//     return Request::referrer();
// });

// Display Message page
// this is just a dummy route. when you're fully implementing the app, the route should end with message/landlordID, which will lead the user to the inbox of the Landlord. but there should be another general route in the pages header to link to the message section, not a particular landlord DM. You Get? young man
// Route::get('/houses/message/{landlord_id}/{user_id}', [MessageController::class, 'displayMessagePage'])->name('message_page');

// // Send message
// Route::post('/messages/send/{user_id}/{landlord_idd}', [MessageController::class, 'sendMessage']);

