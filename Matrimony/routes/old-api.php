<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\RegisterController;
use App\Http\Controllers\Api\MemberController;
use App\Http\Controllers\Api\MemberFormController;
use App\Http\Controllers\Api\MemberSearchController;
use App\Http\Controllers\Api\MemberActionController;
use App\Http\Controllers\ApiController;



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

Route::prefix('auth')->group(function () {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/logout', [AuthController::class, 'logout'])->middleware('jwt.auth');
    Route::get('/user', [AuthController::class, 'user'])->middleware('jwt.auth');
});

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
| Member Profile (Step-by-Step)
|--------------------------------------------------------------------------
*/
    Route::middleware('jwt.auth')->prefix('member')->group(function () {

    Route::post('/basic-info', [MemberController::class, 'basicInfo']);
    Route::post('/ethinicity-info', [MemberController::class, 'ethinicityInfo']);
    Route::post('/horoscope-info', [MemberController::class, 'horoscopeInfo']);
    Route::post('/profile-info', [MemberController::class, 'profileInfo']);
    Route::post('/personal-info', [MemberController::class, 'personalInfo']);
    Route::post('/address-info', [MemberController::class, 'addressInfo']);
    Route::post('/professional-info', [MemberController::class, 'professionalInfo']);
});

/*
|--------------------------------------------------------------------------
| Matrimony Form APIs (Add & Skip)
|--------------------------------------------------------------------------
*/
Route::middleware('jwt.auth')->prefix('matrimony')->group(function () {

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
    Route::get('/search', [MemberSearchController::class, 'search']);
    // User Actions
    Route::post('/interest', [MemberActionController::class, 'interest']);
    Route::get('/interest-list', [MemberActionController::class, 'interestList']);
    Route::post('/contact-request', [MemberActionController::class, 'contactRequest']);
    Route::get('/contact-request-list', [MemberActionController::class, 'contactRequestList']);
    Route::post('/photo-request', [MemberActionController::class, 'photoRequest']);
    Route::get('/photo-request-list', [MemberActionController::class, 'photoRequestList']);
    Route::get('/user-details', [MemberActionController::class, 'userDetails']);


});

/*
|--------------------------------------------------------------------------
| External / V2 Matrimony APIs
|--------------------------------------------------------------------------
*/
Route::middleware('verifyApiToken')->prefix('v2/matrimony')->group(function () {

    Route::post('/bbps-session', [ApiController::class, 'getBbpsSessionRecordsApi']);
    Route::post('/mobile-search', [ApiController::class, 'mobileNumberFetchDataApi']);
    Route::post('/recent-lead', [ApiController::class, 'lastLeadData']);
    Route::post('/wip-count', [ApiController::class, 'getWipCount']);
    Route::post('/mobile-ticket', [ApiController::class, 'getMobileNoTickets']);
    Route::post('/wip-details', [ApiController::class, 'getWipdetails']);
    Route::post('/search-tag', [ApiController::class, 'getCmsListByTags']);
});
