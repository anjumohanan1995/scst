<?php
use Illuminate\Support\Facades\Route;
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
use App\Http\Controllers\NewslistController;




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






Route::resource('/users', UserController::class);
Route::get('/getUsers', [UserController::class, 'getUsers'])->name('getUsers');
Route::post('/users/delete/{id}', [UserController::class, 'destroy'])->name('delete-user');
Route::post('/users/edit/{id}', [UserController::class, 'update'])->name('update-user');
Route::get('status/change', [App\Http\Controllers\HomeController::class, 'changeStatus'])->name('changeStatus');




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
