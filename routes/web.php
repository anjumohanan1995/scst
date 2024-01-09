<?php
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DistrictController;
use App\Http\Controllers\TalukController;
use App\Http\Controllers\TeoController;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SlidercategoryController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\GalleryCategoryController;
use App\Http\Controllers\HouseManagementController;
use App\Http\Controllers\NewslistController;
use App\Http\Controllers\SingleIncomeEarnerController;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {

    return view('welcome');
});



Route::get('dashboard', [CustomAuthController::class, 'dashboard']);
Route::get('login', [CustomAuthController::class, 'index'])->name('login');
Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom');
Route::get('registration', [CustomAuthController::class, 'registration'])->name('register-user');
Route::post('custom-registration', [CustomAuthController::class, 'customRegistration'])->name('register.custom');
Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout');
//Route::resource('/books','BookController');



Auth::routes();
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/user-registration', [ApplicationController::class, 'userRegistration'])->name('userRegistration');
Route::post('/user-store', [ApplicationController::class, 'userStore'])->name('userStore');
Route::get('captcha', [ApplicationController::class, 'captcha'])->name('captcha');
Route::post('/check-aadhar-number', [ApplicationController::class, 'checkAadharNumber']);

Route::get('/user-profile', [ApplicationController::class, 'userProfile']);

Route::get('/reload-captcha', [ApplicationController::class, 'reloadCaptcha']);
Route::post('/user-registration/save', [ApplicationController::class, 'userRegisterSave']);


Route::get('/filter-words', [App\Http\Controllers\ApplicationController::class, 'filterAndCountWords']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/application-forms', [App\Http\Controllers\HomeController::class, 'applicationForms'])->name('applicationForms');
Route::get('/application-form2', [App\Http\Controllers\ApplicationController::class, 'applicationForm2'])->name('applicationForm2');
Route::post('/motherChildProtectionSchemeStore', [App\Http\Controllers\ApplicationController::class, 'motherChildProtectionSchemeStore'])->name('motherChildProtectionSchemeStore');
Route::post('/motherChildStoreDetails', [App\Http\Controllers\ApplicationController::class, 'motherChildStoreDetails'])->name('motherChildStoreDetails');

Route::get('/couples-financial-help', [App\Http\Controllers\ApplicationController::class, 'coupleFinancialHelp'])->name('coupleFinancialHelp');
Route::post('/financialHelpStore', [App\Http\Controllers\ApplicationController::class, 'financialHelpStore'])->name('financialHelpStore');
Route::post('/financialHelpStoreDetails', [App\Http\Controllers\ApplicationController::class, 'financialHelpStoreDetails'])->name('financialHelpStoreDetails');
Route::get('/couplefinancialList', [App\Http\Controllers\ApplicationController::class, 'couplefinancialList'])->name('couplefinancialList');
Route::get('/getCoupleList', [App\Http\Controllers\ApplicationController::class, 'getCoupleList'])->name('getCoupleList');
Route::get('/couple-application/{id}', [App\Http\Controllers\ApplicationController::class, 'coupleApplicationView'])->name('coupleApplicationView');

Route::get('/exam-application', [App\Http\Controllers\ApplicationController::class, 'examApplication'])->name('exam-application');
Route::post('/examApplicationPreview', [App\Http\Controllers\ApplicationController::class, 'examApplicationPreview'])->name('examApplicationPreview');
Route::post('/examApplicationStore', [App\Http\Controllers\ApplicationController::class, 'examApplicationStore'])->name('examApplicationStore');
Route::get('/examApplicationList', [App\Http\Controllers\ApplicationController::class, 'examApplicationList'])->name('examApplicationList');
Route::get('/getExamList', [App\Http\Controllers\ApplicationController::class, 'getExamList'])->name('getExamList');
Route::get('/exam-application/{id}', [App\Http\Controllers\ApplicationController::class, 'examApplicationView'])->name('examApplicationView');


Route::get('/childFinancialAssistanceForm', [App\Http\Controllers\ChildFinanceController::class, 'childFinancialAssistanceForm'])->name('childFinancialAssistanceForm');
Route::post('/childFinancialAssistanceStore', [App\Http\Controllers\ChildFinanceController::class, 'childFinancialAssistanceStore'])->name('childFinancialAssistanceStore');
Route::post('/childFinancialStoreDetails', [App\Http\Controllers\ChildFinanceController::class, 'childFinancialStoreDetails'])->name('childFinancialStoreDetails');







Route::get('/motherChildSchemeList', [App\Http\Controllers\ApplicationController::class, 'motherChildSchemeList'])->name('motherChildSchemeList');
Route::get('/getMotherChildList', [App\Http\Controllers\ApplicationController::class, 'getMotherChildList'])->name('getMotherChildList');
Route::get('/motherChildScheme/{id}/view', [App\Http\Controllers\ApplicationController::class, 'motherChildSchemeView'])->name('motherChildSchemeView');

Route::get('/marriageGrantForm', [App\Http\Controllers\ApplicationController::class, 'marriageGrantForm'])->name('marriageGrantForm');
Route::post('/marriageGrantFormStore', [App\Http\Controllers\ApplicationController::class, 'marriageGrantFormStore'])->name('marriageGrantFormStore');
Route::post('/marriageGrantStoreDetails', [App\Http\Controllers\ApplicationController::class, 'marriageGrantStoreDetails'])->name('marriageGrantStoreDetails');
Route::get('/marriageGrantList', [App\Http\Controllers\ApplicationController::class, 'marriageGrantList'])->name('marriageGrantList');
Route::get('/getmarriageGrantList', [App\Http\Controllers\ApplicationController::class, 'getmarriageGrantList'])->name('getmarriageGrantList');
Route::get('/marriageGrant/{id}/view', [App\Http\Controllers\ApplicationController::class, 'marriageGrantView'])->name('marriageGrantView');


Route::get('/userCoupleFinanceList', [App\Http\Controllers\UserHomeController::class, 'userCoupleFinanceList'])->name('userCoupleFinanceList');
Route::get('/getUserCoupleList', [App\Http\Controllers\UserHomeController::class, 'getUserCoupleList'])->name('getUserCoupleList');
Route::get('/user-couple-application/{id}', [App\Http\Controllers\UserHomeController::class, 'userCoupleApplicationView'])->name('userCoupleApplicationView');

Route::get('/userMotherChildList', [App\Http\Controllers\UserHomeController::class, 'userMotherChildList'])->name('userMotherChildList');
Route::get('/getUserMotherChildList', [App\Http\Controllers\UserHomeController::class, 'getUserMotherChildList'])->name('getUserMotherChildList');
Route::get('/userMotherChildScheme/{id}/view', [App\Http\Controllers\UserHomeController::class, 'userMotherChildSchemeView'])->name('userMotherChildSchemeView');

Route::get('/userExamList', [App\Http\Controllers\UserHomeController::class, 'userExamList'])->name('userExamList');
Route::get('/getUserExamList', [App\Http\Controllers\UserHomeController::class, 'getUserExamList'])->name('getUserExamList');
Route::get('/user-exam-application/{id}', [App\Http\Controllers\UserHomeController::class, 'userExamApplicationView'])->name('userExamApplicationView');

Route::get('/userMarriageGrantList', [App\Http\Controllers\UserHomeController::class, 'userMarriageGrantList'])->name('userMarriageGrantList');
Route::get('/getUserMarriageGrantList', [App\Http\Controllers\UserHomeController::class, 'getUserMarriageGrantList'])->name('getUserMarriageGrantList');
Route::get('/userMarriageGrant/{id}/view', [App\Http\Controllers\UserHomeController::class, 'userMarriageGrantView'])->name('userMarriageGrantView');


Route::resource('/users', UserController::class);
Route::get('/getUsers', [UserController::class, 'getUsers'])->name('getUsers');
Route::post('/users/delete/{id}', [UserController::class, 'destroy'])->name('delete-user');
Route::post('/users/edit/{id}', [UserController::class, 'update'])->name('update-user');
Route::get('status/change', [App\Http\Controllers\HomeController::class, 'changeStatus'])->name('changeStatus');

Route::resource('/districts', DistrictController::class);
Route::get('/getDistricts', [DistrictController::class, 'getDistricts'])->name('getDistricts');
Route::post('/districts/update/{id}', [DistrictController::class, 'update'])->name('update-district');
Route::post('/districts/delete/{id}', [DistrictController::class, 'destroy'])->name('delete-district');

Route::resource('/taluks', TalukController::class);
Route::get('/getTaluks', [TalukController::class, 'getTaluks'])->name('getTaluks');
Route::post('/taluks/update/{id}', [TalukController::class, 'update'])->name('update-taluk');
Route::post('/taluks/delete/{id}', [TalukController::class, 'destroy'])->name('delete-taluk');

Route::resource('/teo', TeoController::class);
Route::get('/getTeo', [TeoController::class, 'getTeo'])->name('getTeo');
Route::post('/teo/update/{id}', [TeoController::class, 'update'])->name('update-teo');
Route::post('/teo/delete/{id}', [TeoController::class, 'destroy'])->name('delete-teo');

Route::post('/district/fetch-taluk', [TalukController::class, 'fetchTaluk'])->name('fetch-taluk');
Route::post('/district/fetch-teo', [TeoController::class, 'fetchTeo'])->name('fetch-fetchTeo');


Route::get('/profile', [App\Http\Controllers\HomeController::class, 'profile'])->name('profile');
Route::get('/password', [App\Http\Controllers\HomeController::class, 'password'])->name('password');
Route::post('/change_password', [App\Http\Controllers\HomeController::class, 'changePassword'])->name('change_password');


Route::resource('/roles', RoleController::class);
Route::get('/getRoles', [RoleController::class, 'getRoles'])->name('getRoles');
Route::get('/roles/delete/{id}', [RoleController::class, 'destroy'])->name('delete-role');
Route::post('/roles/edit/{id}', [RoleController::class, 'update'])->name('update-role');


Route::resource('/settings', SettingsController::class);
Route::post('setting/store',[SettingsController::class,'store'])->name('setting.store');

Route::resource('/slidercategories', SlidercategoryController::class);

Route::resource('/sliders', SliderController::class);
Route::get('/slider/{id?}',[App\Http\Controllers\SliderController::class, 'createSlider'])->name('slider.createSlider');

Route::resource('/gallery_category', App\Http\Controllers\GalleryCategoryController::class);

Route::resource('/gallery', App\Http\Controllers\GalleryController::class);
Route::post('/gallery/{id}', [App\Http\Controllers\GalleryController::class, 'store'])->name('store');
Route::get('/galleries/{id}', [App\Http\Controllers\GalleryController::class, 'galleryList'])->name('gallery_list');

Route::resource('/newslist', NewslistController::class);
Route::get('/page/news', [App\Http\Controllers\NewslistController::class, 'newsdisplay'])->name('newsdisplay');
Route::get('/newsdetails/{slug}', [App\Http\Controllers\NewslistController::class, 'newsdetails'])->name('newsdetails');
Route::post('/featured_status', [App\Http\Controllers\NewslistController::class, 'changeNewsStatus'])->name('featured_status');
Route::get('/sharenewsmail/{id}', [App\Http\Controllers\NewslistController::class, 'shareNewsMail'])->name('share.news.mail');
Route::delete('/newslist/{id}', 'NewsListController@destroy')->name('newslist.destroy');



//single income earner controller starts here 

Route::resource('/single-income-earner', SingleIncomeEarnerController::class);

//single income earner controller ends  here 


//house Management 
    Route::resource('houseGrant', HouseManagementController::class);
    Route::get('/show/{id}', [HouseManagementController::class, 'show'])->name('examples.show');
    Route::get('/', [HouseManagementController::class, 'index'])->name('examples.index');
    Route::get('/show/{id}', [HouseManagementController::class, 'show'])->name('examples.show');
    Route::get('/userHouseGrantList', [HouseManagementController::class, 'userHouseGrantList'])->name('userHouseGrantList');
    Route::get('/getUserHouseGrantList', [HouseManagementController::class, 'getUserHouseGrantList'])->name('getUserHouseGrantList');
   
