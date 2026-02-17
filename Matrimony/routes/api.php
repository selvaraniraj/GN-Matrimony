<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\RegisterController;
use App\Http\Controllers\Api\MemberFormController;
use App\Http\Controllers\Api\MemberSearchController;
use App\Http\Controllers\Api\MemberActionController;



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

Route::post('/login', [AuthController::class, 'login']);

/*
|--------------------------------------------------------------------------
| Registration & OTP
|--------------------------------------------------------------------------
*/
Route::prefix('register')->group(function () {
    Route::post('/', [RegisterController::class, 'register']);
    Route::post('/verify-otp', [RegisterController::class, 'verifyOtp']);
});

/*
|--------------------------------------------------------------------------
| Matrimony Form APIs (Add & Skip)
|--------------------------------------------------------------------------
*/
Route::middleware('auth:sanctum', 'verifyApiToken')->prefix('member')->group(function () {

    // ADD APIs
    Route::post('/basic-add', [MemberFormController::class, 'basicAdd']);
    Route::post('/ethinicity-add', [MemberFormController::class, 'ethinicityAdd']);
    Route::post('/horoscope-add', [MemberFormController::class, 'horoscopeAdd']);
    Route::post('/horoscope-detail-add', [MemberFormController::class, 'horoscopeDetailAdd']);
    Route::post('/profile-add', [MemberFormController::class, 'profileAdd']);
    Route::post('/personal-add', [MemberFormController::class, 'personalAdd']);
    Route::post('/address-add', [MemberFormController::class, 'addressAdd']);
    Route::post('/professional-add', [MemberFormController::class, 'professionalAdd']);
    Route::post('/occupational-add', [MemberFormController::class, 'occupationalAdd']);
    Route::post('/hobby-add', [MemberFormController::class, 'hobbiesAdd']);
    Route::post('/partner-add', [MemberFormController::class, 'partnerAdd']);
    Route::post('/relative-add', [MemberFormController::class, 'relativeAdd']);
    Route::post('/photo-add', [MemberFormController::class, 'photoAdd']);

    Route::post('/profile-update-all', [MemberFormController::class, 'updateAll']);

    // SKIP APIs
    Route::post('/basic-skip', [MemberFormController::class, 'basicSkip']);
    Route::post('/ethinicity-skip', [MemberFormController::class, 'ethinicitySkip']);
    Route::post('/horoscope-skip', [MemberFormController::class, 'horoscopeSkip']);
    Route::post('/horoscope-detail-skip', [MemberFormController::class, 'horoscopeDetailSkip']);
    Route::post('/profile-skip', [MemberFormController::class, 'profileSkip']);
    Route::post('/personal-skip', [MemberFormController::class, 'personalSkip']);
    Route::post('/address-skip', [MemberFormController::class, 'addressSkip']);
    Route::post('/professional-skip', [MemberFormController::class, 'professionalSkip']);
    Route::post('/occupational-skip', [MemberFormController::class, 'occupationalSkip']);
    Route::post('/hobby-skip', [MemberFormController::class, 'hobbySkip']);
    Route::post('/partner-skip', [MemberFormController::class, 'partnerSkip']);
    Route::post('/relative-skip', [MemberFormController::class, 'relativeSkip']);
    Route::post('/photo-skip', [MemberFormController::class, 'photoSkip']);

    // Search & Matches
    Route::get('/matches', [MemberSearchController::class, 'matches']);
    Route::get('/matches-filter', [MemberSearchController::class, 'matchesFilter']);
    Route::get('/featured-profiles', [MemberSearchController::class, 'featuredProfiles']);
    Route::get('/search', [MemberSearchController::class, 'search']);
    // User Actions
    Route::post('/interest', [MemberActionController::class, 'interest']);
    Route::get('/interest-list', [MemberActionController::class, 'interestList']);
    Route::post('/contact-request', [MemberActionController::class, 'contactRequest']);
    Route::post('/view-request', [MemberActionController::class, 'viewRequest']);
    Route::get('/contact-request-list', [MemberActionController::class, 'contactRequestList']);
    Route::post('/photo-request', [MemberActionController::class, 'photoRequest']);
    Route::get('/photo-request-list', [MemberActionController::class, 'photoRequestList']);
    Route::get('/user-details', [MemberActionController::class, 'userDetails']);
    Route::get('/my-details', [MemberActionController::class, 'myDetails']);
    Route::post('/approve-mobile', [MemberActionController::class, 'approveMobile']);
    Route::post('/approve-photo', [MemberActionController::class, 'approvePhoto']);
    Route::post('/update-interest', [MemberActionController::class, 'updateInterest']);
    Route::get('/request-sent', [MemberActionController::class, 'requestSent']);
    Route::get('/header-notifications', [MemberActionController::class, 'headerNotifications']);
    Route::post('/logout', [AuthController::class, 'logout']);

});
