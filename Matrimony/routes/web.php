<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\RouteController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Admin\AssociationController;
use App\Http\Controllers\Admin\AdminController;

use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\MatrimonyProfileController;
use App\Http\Controllers\Admin\RequestListController;

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
// Route::middleware(['throttle:global'])->group(function () {

// Route::get('/', [AuthController::class, 'landing_page'])->name('landing');

// Route::prefix('admin')->group(function () {


//     Route::get('/login', [AdminController::class, 'dashboard'])
//         ->name('admin.dashboard');


//     Route::get('/dashboard', [AdminController::class, 'dashboard'])
//         ->name('admin.dashboard');


// Route::get('/association', [AssociationController::class, 'association_form'])->name('association_form');
// Route::post('/associations', [AssociationController::class, 'insert']);
// Route::get('association_view', [AssociationController::class, 'view'])->name('association_view');
// Route::get('/association/{id}/delete',[AssociationController::class,'delete']);
// Route::get('/association/update/{id}', [AssociationController::class, 'update'])->name('association.update');
// Route::put('/association/{id}', [AssociationController::class, 'submit'])->name('association.submit');
// Route::get('activity_report',[AssociationController::class,'member_report_view'])->name('activity_report');
// Route::get('mobile_request_report',[AssociationController::class,'mobile_request_view'])->name('mobile_request');
// Route::get('photo_request_view',[AssociationController::class,'photo_request'])->name('photo_request');
// Route::get('/fetchdetails',[AssociationController::class,'fetchdetails']);
// Route::get('/member-registration', [AssociationController::class, 'registration'])->name('member-registration');
// Route::get('/otp-verification', [AssociationController::class, 'otp'])->name('otp-verification');
// Route::post('/verify-otp', [AssociationController::class, 'verifyOtp'])->name('verify-otp');


// });



Route::prefix('admin')->group(function () {

    Route::get('/', [LoginController::class, 'showLoginForm'])
        ->name('admin.login');

    Route::post('/login', [LoginController::class, 'login'])
        ->name('admin.login.submit');

    Route::post('/logout', [LoginController::class, 'logout'])
        ->name('admin.logout');
        Route::get('/register', [LoginController::class, 'register'])->name('admin.register');
      Route::post('/admin/register-submit', [LoginController::class, 'submit'])
    ->name('admin.register.submit');

    Route::post('/check-email', [LoginController::class, 'checkEmail'])->name('check.email');

       Route::get('/dashboard', [LoginController::class, 'dashboard'])->name('admin.dashboard');



});


Route::prefix('admin')->middleware('auth:admin')->group(function () {



  Route::get('/dashboard', [LoginController::class, 'dashboard'])->name('admin.dashboard');

    Route::get('/matrimony', [MatrimonyProfileController::class, 'index'])
        ->name('admin.matrimony.index');

    Route::get('/matrimony/create', [MatrimonyProfileController::class, 'create'])
        ->name('admin.matrimony.create');

    Route::post('/matrimony/store', [MatrimonyProfileController::class, 'store'])
        ->name('admin.matrimony.store');

    Route::get('/matrimony/{id}', [MatrimonyProfileController::class, 'show'])
        ->name('admin.matrimony.show');

    Route::get('/matrimony/{id}/edit', [MatrimonyProfileController::class, 'edit'])
        ->name('admin.matrimony.edit');

    Route::post('/matrimony/{id}/update', [MatrimonyProfileController::class, 'update'])
        ->name('admin.matrimony.update');

    Route::delete('/matrimony/{id}', [MatrimonyProfileController::class, 'delete'])
        ->name('admin.matrimony.delete');

    Route::get('/requests/contact', [RequestListController::class, 'contactRequests'])
        ->name('admin.requests.contact');
    Route::get('/requests/photo', [RequestListController::class, 'photoRequests'])
        ->name('admin.requests.photo');
    Route::get('/requests/liked', [RequestListController::class, 'likedProfiles'])
        ->name('admin.requests.liked');
    Route::get('/requests/profile/{profileId}', [RequestListController::class, 'profileDetails'])
        ->name('admin.requests.profile_details');
});




    Route::get('/', [PageController::class, 'loginPage'])->name('landing');
    Route::get('/landing', [AuthController::class, 'landing_page'])->name('app.v2.landing_page');

    Route::get('/matrimony/register', [AuthController::class, 'register_page'])->name('register');
    Route::post('/matrimony/register', [AuthController::class, 'register']);

    Route::get('/login', [PageController::class, 'loginPage'])->name('app.v2.loginPage_page');
    Route::post('/login', [HomeController::class, 'userLogin'])->name('app.v2.loginForm'); // Login form

    Route::get('/matrimony/login', [AuthController::class, 'login_page'])->name('login');
    Route::post('/matrimony/login', [AuthController::class, 'login']);

    Route::get('/matrimony/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/matrimony/forgot-password', [AuthController::class, 'forgotPassword'])->name('forgotPassword');
    Route::post('/matrimony/forgot-password', [AuthController::class, 'forgotPasswordMailSend'])->name('reset.resetlink');
    Route::get('/matrimony/send-otp/{id}', [AuthController::class, 'sendOtp'])->name('sendOtp');
    Route::get('/matrimony/otp-verify/{id}', [AuthController::class, 'otpVerify'])->name('otpVerify');
    Route::post('/matrimony/verify-otp', [AuthController::class, 'verifyOtp'])->name('verifyOtp');
    Route::get('/matrimony/resend-otp/{id}', [AuthController::class, 'resendOtp'])->name('resendOtp');
    Route::get('/matrimony/reset-password/{id}/{token}', [AuthController::class, 'resetPassword'])->name('resetPassword');
    Route::get('/matrimony/submit-reset-password', [AuthController::class, 'submitResetPasswordForm'])->name('resetPasswordSubmit');


    // Outside Pages
    Route::get('/contact',[PageController::class,'contactPage'])->name('app.v2.contact_page');
    Route::get('/about', [PageController::class, 'aboutPage'])->name('app.v2.about_page');
    Route::get('/home', [PageController::class, 'homePage'])->name('app.v2.home_page');
    Route::get('/verification/{id}', [PageController::class, 'verificationPage'])->name('app.v2.verificationPage_page');
    Route::get('/about_us', [PageController::class, 'aboutUsPage'])->name('app.v2.aboutUsPage_page');
    Route::get('/gallery', [PageController::class, 'galleryPage'])->name('app.v2.galleryPage_page');
    Route::get('/contact_us', [PageController::class, 'contactusPage'])->name('app.v2.contactusPage_page');

    Route::post('/city', [PageController::class, 'get_city'])->name('get_sub_city');
    Route::post('/taulk', [PageController::class, 'get_taulk'])->name('get_taluk_category');
    Route::get('/members', [PageController::class, 'memberPage'])->name('app.v2.members_page');
    Route::post('/star', [PageController::class, 'get_star'])->name('get_star_value');
    Route::post('/starsValue', [PageController::class, 'getStarValue'])->name('get_starsValue');
     //HomePage

     // Prevent 404 on refresh / back
Route::get('/member-add', function () {
    return redirect()->route('app.v2.home_page');
});

    Route::post('/member-add', [HomeController::class, 'saveMember'])->name('app.home_member.save');
    Route::post('/verify-otp', [HomeController::class, 'verifyOtp'])->name('app.otp_verify.member');
    Route::post('/checkEmailExists', [HomeController::class, 'checkEmail'])->name('check.email.exists');
   
    Route::group(['middleware' => ['no-cache','auth']], function () {
        // After login
        Route::get('/logout', [HomeController::class, 'logoutv2'])->name('logoutv2');

        Route::get('/basic', [PageController::class, 'basicformPage'])->name('app.v2.basic_information');
        Route::get('/ethinicity', [PageController::class, 'ethinicityPage'])->name('app.v2.ethinicity_page');
        Route::get('/horoscope', [PageController::class, 'horoscopePage'])->name('app.v2.horoscope_page');
        Route::get('/horoscopeDetails', [PageController::class, 'horoscopeDetailPage'])->name('app.v2.horoscopeDetail_page');
        Route::get('/profile', [PageController::class, 'profilePage'])->name('app.v2.profile_page');
        Route::get('/address', [PageController::class, 'addressPage'])->name('app.v2.address_page');
        Route::get('/personal', [PageController::class, 'personalPage'])->name('app.v2.personal_page');
        Route::get('/professional', [PageController::class, 'professionalPage'])->name('app.v2.professional_page');
        Route::get('/photo', [PageController::class, 'photoPage'])->name('app.v2.photo_page');
        Route::get('/hobbies', [PageController::class, 'hobbiesPage'])->name('app.v2.hobbies_page');
        Route::get('/relatives', [PageController::class, 'relativesPage'])->name('app.v2.relatives_page');
        Route::get('/aboutPartner', [PageController::class, 'aboutPartnerPage'])->name('app.v2.aboutPartner_page');
        Route::get('/members', [PageController::class, 'memberPage'])->name('app.v2.members_page');

        Route::get('/single_page', [PageController::class, 'single_pagepage'])->name('app.v2.single_pagepage');
        Route::get('/search', [PageController::class, 'searchpage'])->name('app.v2.searchpage');
        Route::get('/regular_search', [PageController::class, 'regular_searchpage'])->name('app.v2.regular_searchpage');
        Route::get('/my_profile', [PageController::class, 'my_profilepage'])->name('app.v2.my_profilepage');
        Route::get('/favorites', [PageController::class, 'favoritespage'])->name('app.v2.favoritespage');
    Route::get('/request_sent', [PageController::class, 'request_sent'])->name('app.v2.request_sent');

        Route::get('/request', [PageController::class, 'requestpage'])->name('app.v2.requestpage');
        Route::get('/forget_password', [PageController::class, 'forget_passwordpage'])->name('app.v2.forget_passwordpage_page');
        Route::get('/password_otp', [PageController::class, 'password_otppage'])->name('app.v2.password_otppage_page');
        Route::get('/change_password', [PageController::class, 'change_passwordpage'])->name('app.v2.change_passwordpage_page');
        Route::get('/matches',[PageController::class,'matchespage'])->name('app.v2.matches_page');
        Route::post('/add_interest_status', [PageController::class, 'add_interest'])->name('add_interest_status');

          Route::match(['get', 'post'],'/matches_filter', [PageController::class, 'show_matches'])->name('show_matches_filter');

        Route::get('/searchView',[PageController::class,'searchViewPage'])->name('app.v2.serachView_page');
        Route::get('/user/details/{id}',[PageController::class,'getUserDetails'])->name('app.v2.popupView_page'); //
 Route::get('/user_profile',[PageController::class,'user_profile'])->name('app.v2.user_profile_page');


        Route::post('/basic-information-add', [HomeController::class, 'basicInfoAdd'])->name('app.basic_info_add.member');
        Route::post('/ethinicity-information-add', [HomeController::class, 'ethinicityInfoAdd'])->name('app.ethinicity_add.member');
        Route::post('/horoscope-information-add', [HomeController::class, 'horoscopeInfoAdd'])->name('app.horoscope_add.member');
        Route::post('/profile-information-add', [HomeController::class, 'profileInfoAdd'])->name('app.profile_add.member');
        Route::post('/personal-information-add', [HomeController::class, 'personalInfoAdd'])->name('app.personal_add.member');
        Route::post('/address-information-add', [HomeController::class, 'addressInfoAdd'])->name('app.address_add.member');
        Route::post('/professional-information-add', [HomeController::class, 'professionalInfoAdd'])->name('app.professional_add.member');
        Route::post('/hobby-information-add', [HomeController::class, 'hobbiesInfoAdd'])->name('app.hobbies_add.member');
        Route::post('/partner-information-add', [HomeController::class, 'partnerInfoAdd'])->name('app.partnerInfo_add.member');
        Route::post('/relative-information-add', [HomeController::class, 'relativeInfoAdd'])->name('app.relativeInfo_add.member');

        Route::post('/basic-information-skip', [HomeController::class, 'basicInfoskip'])->name('app.basic_info_skip.member');
        Route::post('/ethinicity-information-skip', [HomeController::class, 'ethiniciyInfoskip'])->name('app.ethinicity_info_skip.member');
        Route::post('/ethinicity-information-previous', [HomeController::class, 'ethiniciyInfoprevious'])->name('app.ethinicity_info_previous.member');
        Route::post('/horoscope-information-skip', [HomeController::class, 'horoscopeInfoskip'])->name('app.horoscope_info_skip.member');
        Route::post('/horoscope-information-previous', [HomeController::class, 'horoscopeInfoprevious'])->name('app.horoscope_info_previous.member');
        Route::post('/profile-information-skip', [HomeController::class, 'profileInfoskip'])->name('app.profile_info_skip.member');
        Route::post('/profile-information-previous', [HomeController::class, 'profileInfoprevious'])->name('app.profile_info_previous.member');
        Route::post('/personal-information-skip', [HomeController::class, 'personalInfoskip'])->name('app.personal_info_skip.member');
        Route::post('/personal-information-previous', [HomeController::class, 'personalInfoprevious'])->name('app.personal_info_previous.member');
        Route::post('/address-information-skip', [HomeController::class, 'addressInfoskip'])->name('app.address_info_skip.member');
        Route::post('/address-information-previous', [HomeController::class, 'addressInfoprevious'])->name('app.address_info_previous.member');
        Route::post('/professional-information-skip', [HomeController::class, 'professionalInfoskip'])->name('app.professional_info_skip.member');
        Route::post('/professional-information-previous', [HomeController::class, 'professionalInfoprevious'])->name('app.professional_info_previous.member');
        Route::post('/hobby-information-skip', [HomeController::class, 'hobbyInfoskip'])->name('app.hobby_info_skip.member');
        Route::post('/hobby-information-previous', [HomeController::class, 'hobbyInfoprevious'])->name('app.hobby_info_previous.member');
        Route::post('/partner-information-skip', [HomeController::class, 'partnerInfoskip'])->name('app.partner_info_skip.member');
        Route::post('/partner-information-previous', [HomeController::class, 'partnerInfoprevious'])->name('app.partner_info_previous.member');
        Route::post('/relative-information-skip', [HomeController::class, 'relativeInfoskip'])->name('app.relative_info_skip.member');
        Route::post('/relative-information-previous', [HomeController::class, 'relativeInfoprevious'])->name('app.relative_info_previous.member');
        Route::post('/photo-information-add', [HomeController::class, 'photoInfoAdd'])->name('app.photo_info_add.member');
        Route::post('/photo-information-skip', [HomeController::class, 'photoInfoskip'])->name('app.photo_info_skip.member');
        Route::post('/photo-information-previous', [HomeController::class, 'photoInfoprevious'])->name('app.photo_info_previous.member');

        Route::post('/basic-information-update', [HomeController::class, 'basicInfoupdate'])->name('app.basic_info_update.member');
        Route::post('/ethinicity-information-update', [HomeController::class, 'ethinicityInfoupdate'])->name('app.ethinicity_update.member');
        Route::post('/horoscope-information-update', [HomeController::class, 'horoscopeInfoupdate'])->name('app.horoscope_update.member');
        Route::post('/profile-information-update', [HomeController::class, 'profileInfoupdate'])->name('app.profile_update.member');
        Route::post('/personal-information-update', [HomeController::class, 'personalInfoupdate'])->name('app.personal_update.member');
        Route::post('/relative-information-update', [HomeController::class, 'relativeInfoupdate'])->name('app.relative_update.member');
        Route::post('/partner-information-update', [HomeController::class, 'partnerInfoupdate'])->name('app.partner_update.member');
        Route::post('/photo-information-update', [HomeController::class, 'photoInfoupdate'])->name('app.photo_update.member');
        Route::post('/hobby-information-update', [HomeController::class, 'hobbyInfoupdate'])->name('app.hobby_update.member');
        Route::post('/address-information-update', [HomeController::class, 'addressInfoupdate'])->name('app.address_update.member');
        Route::post('/professional-information-update', [HomeController::class, 'professionalInfoupdate'])->name('app.professional_udate.member');

        Route::post('/horoscopeDetail-information-add', [HomeController::class, 'horoscopeDetailInfoAdd'])->name('app.horoscopeDetail_add.member');
        Route::post('/horoscopeDetail-information-skip', [HomeController::class, 'horoscopeDetailInfoskip'])->name('app.horoscopeDetail_info_skip.member');
        Route::post('/horoscopeDetail-information-previous', [HomeController::class, 'horoscopeDetailInfoprevious'])->name('app.horoscopeDetail_info_previous.member');

        Route::match(['GET', 'POST'],'searchInfoView', [PageController::class, 'searchInfo'])->name('app.v2.searchInfopage');
        Route::post('/idsearchView', [PageController::class, 'idSearchInfo'])->name('app.v2.idsearchInfopage');
        Route::match(['get', 'post'],'keywordsearchView', [PageController::class, 'keywordSearchInfo'])->name('app.v2.keywordsearchInfopage');
        Route::post('/request-mobilepage', [PageController::class, 'mobileRequest'])->name('app.v2.request_mobilepage');
        Route::post('/request-Viewpage', [PageController::class, 'viewRequest'])->name('app.v2.request_profile');
        Route::post('/uprove-mobile', [PageController::class, 'upprovepage'])->name('app.v2.upprove_mobilepage');
        Route::post('/request-profile', [PageController::class, 'profileRequest'])->name('app.v2.request_profileView');
        Route::get('/request_photo', [PageController::class, 'photoRequest'])->name('app.v2.request_photo');
        Route::post('/uprove-photo', [PageController::class, 'upprovephoto'])->name('app.v2.upprove_photo');
        Route::get('/header', [PageController::class, 'header'])->name('app.v2.header_page');
        Route::get('/nav_page', [PageController::class, 'nav_page'])->name('app.v2.nav_page');
        Route::get('/occupational',[PageController::class,'occupationalPage'])->name('app.v2.occupational_page');
        Route::post('/occupational-information-add',[HomeController::class,'occupationalInfoAdd'])->name('app.occupational_add.member');
        Route::post('/occupational-information-skip',[HomeController::class,'occupationalInfoSkip'])->name('app.occupational_skip.member');
        Route::post('/occupational-information-provious',[HomeController::class,'occupationalInfoProvious'])->name('app.occupational_provious.member');

        Route::post('/professional-add', [HomeController::class, 'professionalAdd'])->name('app.professional_add');

        Route::get('/user_nav', [PageController::class, 'userpage_navhead'])->name('app.v2.userpage_navhead');


        Route::post('/update-interest', [PageController::class, 'updateInterest'])
    ->name('app.v2.update_interest');

    });




    Route::group(['middleware' => ['auth', 'no-cache']], function () {

        Route::get('/matrimony/maintenance', [DashboardController::class, 'maintenance'])->name('app.main.maintenance');
        // Dashboard
        Route::get('/matrimony/dashboard', [DashboardController::class, 'dashboard'])->name('app.main.dashboard')->middleware('role:app.main.dashboard');

        //Users
        Route::get('/users/list', [UserController::class, 'list'])->name('app.users.list')->middleware('role:app.users.list');
        Route::get('/users/add', [UserController::class, 'add'])->name('app.users.add')->middleware('role:app.users.add');
        Route::post('/users/add', [UserController::class, 'save'])->name('app.users.save')->middleware('role:app.users.save');
        Route::get('/users/edit/{id}', [UserController::class, 'edit'])->name('app.users.edit')->middleware('role:app.users.edit');
        Route::post('/users/edit/{id}', [UserController::class, 'update'])->name('app.users.update')->middleware('role:app.users.update');
        Route::get('/users/status/{id}/{type}', [UserController::class, 'status'])->name('app.users.status')->middleware('role:app.users.status');

        //Users Activity
        Route::get('/users/activityList', [UserController::class, 'userActivityList'])->name('app.users.userActivityList')->middleware('role:app.users.userActivityList');
        Route::get('/users/activityList/view/{id}/{slug}', [UserController::class, 'userActivityView'])->name('app.users.userActivityView')->middleware('role:app.users.userActivityView');

        // Roles
        Route::get('/roles/list', [RoleController::class, 'list'])->name('app.roles.list')->middleware('role:app.roles.list');
        Route::get('/roles/add', [RoleController::class, 'add'])->name('app.roles.add')->middleware('role:app.roles.add');
        Route::post('/roles/add', [RoleController::class, 'save'])->name('app.roles.save')->middleware('role:app.roles.save');
        Route::get('/roles/edit/{id}', [RoleController::class, 'edit'])->name('app.roles.edit')->middleware('role:app.roles.edit');
        Route::post('/roles/edit/{id}', [RoleController::class, 'update'])->name('app.roles.update')->middleware('role:app.roles.update');
        Route::get('/roles/status/{id}/{type}', [RoleController::class, 'status'])->name('app.roles.status')->middleware('role:app.roles.status');


        // Routes
        Route::get('/routes/list', [RouteController::class, 'list'])->name('app.routes.list')->middleware('role:app.routes.list');
        Route::get('/routes/add', [RouteController::class, 'add'])->name('app.routes.add')->middleware('role:app.routes.add');
        Route::post('/routes/add', [RouteController::class, 'save'])->name('app.routes.save')->middleware('role:app.routes.save');
        Route::get('/routes/edit/{id}', [RouteController::class, 'edit'])->name('app.routes.edit')->middleware('role:app.routes.edit');
        Route::post('/routes/edit/{id}', [RouteController::class, 'update'])->name('app.routes.update')->middleware('role:app.routes.update');
        Route::get('/routes/status/{id}/{type}', [RouteController::class, 'status'])->name('app.routes.status')->middleware('role:app.routes.status');
        Route::get('/routes/migrate', [RouteController::class, 'routeMigrate'])->name('app.routes.migrate')->middleware('role:app.routes.migrate');

        // Settings
        Route::get('/settings/list', [SettingController::class, 'list'])->name('app.settings.list')->middleware('role:app.settings.list');
        Route::get('/settings/add', [SettingController::class, 'add'])->name('app.settings.add')->middleware('role:app.settings.add');
        Route::post('/settings/add', [SettingController::class, 'save'])->name('app.settings.save')->middleware('role:app.settings.save');
        Route::get('/settings/edit/{id}', [SettingController::class, 'edit'])->name('app.settings.edit')->middleware('role:app.settings.edit');
        Route::post('/settings/edit/{id}', [SettingController::class, 'update'])->name('app.settings.update')->middleware('role:app.settings.update');
        Route::get('/settings/status/{id}/{type}', [SettingController::class, 'status'])->name('app.settings.status')->middleware('role:app.settings.status');


    });
// });
