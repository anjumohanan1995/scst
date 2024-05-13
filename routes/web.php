<?php
use App\Http\Controllers\ClerkController;
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
use App\Http\Controllers\AnemiaFinanceController;
use App\Http\Controllers\ApoTdoController;
use App\Http\Controllers\InstitutionController;
use App\Http\Controllers\MedEngStudentFundController;
use App\Http\Controllers\PoTdoController;
use App\Http\Controllers\TDOMasterController;
use App\Http\Controllers\TuitionFeeController;
use App\Models\MedEngStudentFund;
use App\Http\Controllers\JsSeoController;
use App\Http\Controllers\DirectorateController;
use App\Http\Controllers\SecretariatController;
use App\Http\Controllers\MinisterOfficeController;

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
Route::post('/userData', [App\Http\Controllers\HomeController::class, 'userData'])->name('userData.status');
Route::post('/bankDetailsUpdate', [App\Http\Controllers\HomeController::class, 'bankDetailsUpdate'])->name('userBankDetails.update');


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
Route::post('/financial-teo/approve', [App\Http\Controllers\TeoController::class, 'coupleApplicationApprove'])->name('financial-teo.approve');
Route::post('/financial-teo/reject', [App\Http\Controllers\TeoController::class, 'coupleApplicationReject'])->name('financial-teo.reject');


Route::get('/getCoupleReturnList', [App\Http\Controllers\ApplicationController::class, 'getCoupleReturnList'])->name('getCoupleReturnList');
Route::get('/couple-application-edit/{id}', [App\Http\Controllers\ApplicationController::class, 'coupleApplicationEdit'])->name('coupleApplicationEdit');
Route::post('/financialHelpUpdate', [App\Http\Controllers\ApplicationController::class, 'financialHelpUpdate'])->name('financialHelpUpdate');



//exam application routes starts here.
Route::get('/getExamListReturned', [App\Http\Controllers\ApplicationController::class, 'getExamListReturned'])->name('getExamListReturned');
Route::get('/exam-application', [App\Http\Controllers\ApplicationController::class, 'examApplication'])->name('exam-application');
Route::post('/examApplicationPreview', [App\Http\Controllers\ApplicationController::class, 'examApplicationPreview'])->name('examApplicationPreview');
Route::post('/examApplicationStore', [App\Http\Controllers\ApplicationController::class, 'examApplicationStore'])->name('examApplicationStore');
Route::get('/examApplicationList', [App\Http\Controllers\ApplicationController::class, 'examApplicationList'])->name('examApplicationList');
Route::get('/getExamList', [App\Http\Controllers\ApplicationController::class, 'getExamList'])->name('getExamList');
Route::get('/exam-application/{id}', [App\Http\Controllers\ApplicationController::class, 'examApplicationView'])->name('examApplicationView');
Route::post('/exam-application/teoApprove', [ApplicationController::class, 'teoApprove'])->name('exam-application-teo.approve');
Route::post('/exam-application/teoReject', [ApplicationController::class, 'teoReject'])->name('exam-application-teo.reject');

Route::get('/getExamListReturned', [App\Http\Controllers\ApplicationController::class, 'getExamListReturned'])->name('getExamListReturned');
Route::get('/exam-application-edit/{id}', [App\Http\Controllers\ApplicationController::class, 'examApplicationEdit'])->name('examApplicationEdit');
Route::post('/examApplicationUpdate', [App\Http\Controllers\ApplicationController::class, 'examApplicationUpdate'])->name('examApplicationUpdate');
//exam application routes ends here.

//CHILD FINANCE START 
Route::get('/childFinancialAssistanceForm', [App\Http\Controllers\ChildFinanceController::class, 'childFinancialAssistanceForm'])->name('childFinancialAssistanceForm');
Route::post('/childFinancialAssistanceStore', [App\Http\Controllers\ChildFinanceController::class, 'childFinancialAssistanceStore'])->name('childFinancialAssistanceStore');
Route::post('/childFinancialStoreDetails', [App\Http\Controllers\ChildFinanceController::class, 'childFinancialStoreDetails'])->name('childFinancialStoreDetails');
Route::get('/ChildFinanceList', [App\Http\Controllers\ChildFinanceController::class, 'ChildFinanceList'])->name('ChildFinanceList');
Route::get('/getchildFinanceList', [App\Http\Controllers\ChildFinanceController::class, 'getchildFinanceList'])->name('getchildFinanceList');
Route::get('/childFinance/{id}/view', [App\Http\Controllers\ChildFinanceController::class, 'childFinanceView'])->name('childFinanceView');

Route::get('/childFinance-edit/{id}', [App\Http\Controllers\ChildFinanceController::class, 'childFinanceEdit'])->name('childFinanceEdit');
Route::post('/childFinanceUpdate', [App\Http\Controllers\ChildFinanceController::class, 'childFinanceUpdate'])->name('childFinanceUpdate');

Route::get('/getchildFinanceReturnList', [App\Http\Controllers\ChildFinanceController::class, 'getchildFinanceReturnList'])->name('getchildFinanceReturnList');
//CHILD FINANCE END

Route::get('/userchildFinanceList', [App\Http\Controllers\ChildFinanceController::class, 'userchildFinanceList'])->name('userchildFinanceList');
Route::get('/getUserchildFinanceList', [App\Http\Controllers\ChildFinanceController::class, 'getUserchildFinanceList'])->name('getUserchildFinanceList');
Route::get('/userchildFinance/{id}/view', [App\Http\Controllers\ChildFinanceController::class, 'userchildFinanceView'])->name('userchildFinanceView');

Route::get('/iti-scholarship', [App\Http\Controllers\ItiScholarshipController::class, 'itiScholarshipForm'])->name('iti-scholarship');
Route::Post('/iti-scholarship', [App\Http\Controllers\ItiScholarshipController::class, 'store'])->name('iti-scholarship.store');
Route::Post('/iti-fund-scholarship', [App\Http\Controllers\ItiScholarshipController::class, 'itiFundStore'])->name('itiFundStore');
Route::get('/userItiFundList', [App\Http\Controllers\ItiScholarshipController::class, 'userItiFundList'])->name('userItiFundList');
Route::get('/getUserItiFundList', [App\Http\Controllers\ItiScholarshipController::class, 'getUserItiFundList'])->name('getUserItiFundList');
Route::get('/getUserItiFundList/{id}', [App\Http\Controllers\ItiScholarshipController::class, 'show'])->name('userItiFundList.show');
Route::post('/iti-scholarship/teoApprove', [App\Http\Controllers\ItiScholarshipController::class, 'teoApprove'])->name('itiScholarship-teo.approve');
Route::post('/iti-scholarship/teoReject', [App\Http\Controllers\ItiScholarshipController::class, 'teoReject'])->name('itiScholarship-teo.reject');


Route::get('/adminItiFundList', [App\Http\Controllers\ItiScholarshipController::class, 'adminItiFundList'])->name('adminItiFundList');
Route::get('/getAdminItiFundList', [App\Http\Controllers\ItiScholarshipController::class, 'getAdminItiFundList'])->name('getAdminItiFundList');
Route::get('/itiAdminFeeView/{id}', [App\Http\Controllers\ItiScholarshipController::class, 'itiAdminFeeView'])->name('adminItiFundList.show');

Route::get('/getItiFundReturnList', [App\Http\Controllers\ItiScholarshipController::class, 'getItiFundReturnList'])->name('getItiFundReturnList');
Route::get('/iti-fund-application-edit/{id}', [App\Http\Controllers\ItiScholarshipController::class, 'itiFundApplicationEdit'])->name('itiFundApplicationEdit');
Route::post('/itiFundUpdate', [App\Http\Controllers\ItiScholarshipController::class, 'itiFundUpdate'])->name('iti-scholarship.update');








Route::get('/motherChild-Scheme-edit/{id}', [App\Http\Controllers\ApplicationController::class, 'motherChildSchemeEdit'])->name('motherChildSchemeEdit');
Route::post('/motherChildSchemeUpdate', [App\Http\Controllers\ApplicationController::class, 'motherChildSchemeUpdate'])->name('motherChildSchemeUpdate');



Route::get('/getMotherChildReturnList', [App\Http\Controllers\ApplicationController::class, 'getMotherChildReturnList'])->name('getMotherChildReturnList');
Route::get('/motherChildSchemeList', [App\Http\Controllers\ApplicationController::class, 'motherChildSchemeList'])->name('motherChildSchemeList');
Route::get('/getMotherChildList', [App\Http\Controllers\ApplicationController::class, 'getMotherChildList'])->name('getMotherChildList');
Route::get('/motherChildScheme/{id}/view', [App\Http\Controllers\ApplicationController::class, 'motherChildSchemeView'])->name('motherChildSchemeView');
Route::post('/motherChildScheme/approve', [App\Http\Controllers\ApplicationController::class, 'motherChildSchemeApprove'])->name('mother-child.approve');
Route::post('/motherChildScheme/Reject', [App\Http\Controllers\ApplicationController::class, 'motherChildSchemeReject'])->name('mother-child.reject');


Route::get('/marriageGrantForm', [App\Http\Controllers\ApplicationController::class, 'marriageGrantForm'])->name('marriageGrantForm');
Route::post('/marriageGrantFormStore', [App\Http\Controllers\ApplicationController::class, 'marriageGrantFormStore'])->name('marriageGrantFormStore');
Route::post('/marriageGrantStoreDetails', [App\Http\Controllers\ApplicationController::class, 'marriageGrantStoreDetails'])->name('marriageGrantStoreDetails');
Route::get('/marriageGrantList', [App\Http\Controllers\ApplicationController::class, 'marriageGrantList'])->name('marriageGrantList');
Route::get('/getmarriageGrantList', [App\Http\Controllers\ApplicationController::class, 'getmarriageGrantList'])->name('getmarriageGrantList');
Route::get('/marriageGrant/{id}/view', [App\Http\Controllers\ApplicationController::class, 'marriageGrantView'])->name('marriageGrantView');
Route::post('/marriageGrant-teo/approve', [App\Http\Controllers\TeoController::class, 'marriageGrantApprove'])->name('marriageGrant-teo.approve');
Route::post('/marriageGrant-teo/reject', [App\Http\Controllers\TeoController::class, 'marriageGrantReject'])->name('marriageGrant-teo.reject');

Route::get('/getmarriageGrantReturnList', [App\Http\Controllers\ApplicationController::class, 'getmarriageGrantReturnList'])->name('getmarriageGrantReturnList');
Route::get('/marriageGrant-edit/{id}', [App\Http\Controllers\ApplicationController::class, 'marriageGrantEdit'])->name('marriageGrantEdit');
Route::post('/marriageGrantUpdate', [App\Http\Controllers\ApplicationController::class, 'marriageGrantUpdate'])->name('marriageGrantUpdate');

Route::get('/singleEarnerList', [App\Http\Controllers\SingleIncomeEarnerController::class, 'singleEarnerList'])->name('singleEarnerList');
Route::get('/getSingleEarnerList', [App\Http\Controllers\SingleIncomeEarnerController::class, 'getSingleEarnerList'])->name('getSingleEarnerList');
Route::get('/singleEarner/{id}/view', [App\Http\Controllers\SingleIncomeEarnerController::class, 'singleEarnerView'])->name('singleEarnerView');
Route::post('/singleEarner/teoApprove', [App\Http\Controllers\SingleIncomeEarnerController::class, 'singleEarnerTeoApprove'])->name('singleEarner-teo.approve');
Route::post('/singleEarner/teoReject', [App\Http\Controllers\SingleIncomeEarnerController::class, 'singleEarnerTeoReject'])->name('singleEarner-teo.reject');

Route::get('/anemiaFinanceList', [App\Http\Controllers\AnemiaFinanceController::class, 'anemiaFinanceList'])->name('anemiaFinanceList');
Route::get('/getAnemiaFinanceList', [App\Http\Controllers\AnemiaFinanceController::class, 'getAnemiaFinanceList'])->name('getAnemiaFinanceList');
Route::get('/anemiaFinance/{id}/view', [App\Http\Controllers\AnemiaFinanceController::class, 'anemiaFinanceView'])->name('anemiaFinanceView');
Route::post('/anemiaFinance/teoApprove', [App\Http\Controllers\AnemiaFinanceController::class, 'anemiaFinanceTeoApprove'])->name('anemiaFinance-teo.approve');
Route::post('/anemiaFinance/teoReject', [App\Http\Controllers\AnemiaFinanceController::class, 'anemiaFinanceTeoReject'])->name('anemiaFinance-teo.reject');

Route::get('/studentAwardList', [App\Http\Controllers\StudentAwardController::class, 'studentAwardList'])->name('studentAwardList');
Route::get('/getStudentAwardList', [App\Http\Controllers\StudentAwardController::class, 'getStudentAwardList'])->name('getStudentAwardList');
Route::get('/studentAward/{id}/view', [App\Http\Controllers\StudentAwardController::class, 'studentAwardView'])->name('studentAwardView');
Route::post('/studentAward/teoApprove', [App\Http\Controllers\StudentAwardController::class, 'studentAwardTeoApprove'])->name('studentAward-teo.approve');
Route::post('/studentAward/teoReject', [App\Http\Controllers\StudentAwardController::class, 'studentAwardTeoReject'])->name('studentAward-teo.reject');


Route::get('/anemia-financial-assistance', [App\Http\Controllers\AnemiaFinanceController::class, 'anemiaFinancialAssistance'])->name('anemia-financial-assistance');
Route::post('/anemiaFinancePreview', [App\Http\Controllers\AnemiaFinanceController::class, 'anemiaFinancePreview'])->name('anemiaFinancePreview');
Route::post('/anemiaFinanceStore', [App\Http\Controllers\AnemiaFinanceController::class, 'anemiaFinanceStore'])->name('anemiaFinanceStore');


Route::get('/student-award', [App\Http\Controllers\StudentAwardController::class, 'studentAward'])->name('studentAward');
Route::post('/studentAwardPreview', [App\Http\Controllers\StudentAwardController::class, 'studentAwardPreview'])->name('studentAwardPreview');
Route::post('/studentAwardStore', [App\Http\Controllers\StudentAwardController::class, 'studentAwardStore'])->name('studentAwardStore');


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

Route::get('/userStudentAwardList', [App\Http\Controllers\UserHomeController::class, 'userStudentAwardList'])->name('userStudentAwardList');
Route::get('/getUserStudentAwardList', [App\Http\Controllers\UserHomeController::class, 'getUserStudentAwardList'])->name('getUserStudentAwardList');
Route::get('/userStudentAward/{id}/view', [App\Http\Controllers\UserHomeController::class, 'userStudentAwardView'])->name('userStudentAwardView');

Route::get('/userAnemiaFinanceList', [App\Http\Controllers\UserHomeController::class, 'userAnemiaFinanceList'])->name('userAnemiaFinanceList');
Route::get('/getUserAnemiaFinanceList', [App\Http\Controllers\UserHomeController::class, 'getUserAnemiaFinanceList'])->name('getUserAnemiaFinanceList');
Route::get('/userAnemiaFinance/{id}/view', [App\Http\Controllers\UserHomeController::class, 'userAnemiaFinanceView'])->name('userAnemiaFinanceView');

Route::get('/userSingleEarnerList', [App\Http\Controllers\UserHomeController::class, 'userSingleEarnerList'])->name('userSingleEarnerList');
Route::get('/getUserSingleEarnerList', [App\Http\Controllers\UserHomeController::class, 'getUserSingleEarnerList'])->name('getUserSingleEarnerList');
Route::get('/userSingleEarner/{id}/view', [App\Http\Controllers\UserHomeController::class, 'userSingleEarnerView'])->name('userSingleEarnerView');



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
Route::post('/district/fetch-office', [UserController::class, 'fetchOffice'])->name('fetch-fetchOffice');


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
Route::post('/singleIncomeEarnerPreview', [App\Http\Controllers\SingleIncomeEarnerController::class, 'singleIncomeEarnerPreview'])->name('singleIncomeEarnerPreview');
Route::post('/singleEarnerStore', [App\Http\Controllers\SingleIncomeEarnerController::class, 'singleEarnerStore'])->name('singleEarnerStore');

//single income earner controller ends  here .MedicalEngineeringStudentFund


//house Grant Scheme 
    Route::resource('houseGrant', HouseManagementController::class);
    Route::get('/userHouseGrantList', [HouseManagementController::class, 'userHouseGrantList'])->name('userHouseGrantList');
    Route::get('/getUserHouseGrantList', [HouseManagementController::class, 'getUserHouseGrantList'])->name('getUserHouseGrantList');
    Route::post('/HouseGrantStoreDetails', [HouseManagementController::class, 'HouseGrantStoreDetails'])->name('HouseGrantStoreDetails');
    Route::get('/houseGrantApplications', [HouseManagementController::class, 'adminHouseGrantList'])->name('adminHouseGrantList');
    Route::get('/getAdminHouseGrantList', [HouseManagementController::class, 'getAdminHouseGrantList'])->name('getAdminHouseGrantList');
    Route::get('/HouseGrantDetails/{id}', [HouseManagementController::class, 'getAdminHouseGrantDetails'])->name('getAdminHouseGrantDetails');
    Route::get('/redirect/back', [HouseManagementController::class, 'redirectBack'])->name('redirectBack');
    Route::post('/HouseGrant/teoApprove', [HouseManagementController::class, 'teoApprove'])->name('housegrant-teo.approve');
    Route::post('/HouseGrant/teoReject', [HouseManagementController::class, 'teoReject'])->name('housegrant-teo.reject');
    
    //Medical / Engineering student fund scheme
Route::resource('/MedicalEngineeringStudentFund', MedEngStudentFundController::class);
Route::get('/getStudentFundList', [MedEngStudentFundController::class, 'getStudentFundList'])->name('getStudentFundList');
Route::post('/Medical/Engineering/StudentFundStore', [MedEngStudentFundController::class, 'StudentFundStore'])->name('StudentFundStore');
Route::get('/Medical/Engineering/StudentFundList', [MedEngStudentFundController::class, 'adminStudentFundList'])->name('adminStudentFundList');
Route::get('/getAdminStudentFundList', [MedEngStudentFundController::class, 'getAdminStudentFundList'])->name('getAdminStudentFundList');
Route::get('/getAdminStudentFundListReturn', [MedEngStudentFundController::class, 'getAdminStudentFundListReturn'])->name('getAdminStudentFundListReturn');
Route::get('/Medical/Engineering/StudentFundDetails/{id}', [MedEngStudentFundController::class, 'adminStudentFundDetails'])->name('adminStudentFundDetails');
Route::post('/Medical/Engineering/teoApprove', [MedEngStudentFundController::class, 'teoApprove'])->name('studentFund-teo.approve');
Route::post('/Medical/Engineering/teoReject', [MedEngStudentFundController::class, 'teoReject'])->name('studentFund-teo.reject');
Route::get('/medical-engineering/{id}', [MedEngStudentFundController::class, 'medicalEngineeringEdit'])->name('medical-engineering-edit');
Route::put('/MedicalEngineeringStudentFundupdate/{id}',[MedEngStudentFundController::class,'MedicalEngineeringStudentFundupdate'])->name('MedicalEngineeringStudentFundupdate');
//Tuition fee
Route::resource('/TuitionFee', TuitionFeeController::class);

Route::post('/TuitionFeeStore', [TuitionFeeController::class, 'TuitionFeeStore'])->name('TuitionFeeStore');
Route::get('/userTuitionFeeList', [TuitionFeeController::class, 'userTuitionFeeList'])->name('userTuitionFeeList');

Route::get('/getUserTuitionFeeList', [TuitionFeeController::class, 'getUserTuitionFeeList'])->name('getUserTuitionFeeList');
Route::get('/tuitionUserFeeView/{id}/view', [TuitionFeeController::class, 'tuitionUserFeeView'])->name('tuitionUserFeeView');
Route::get('/adminTuitionFeeList', [TuitionFeeController::class, 'adminTuitionFeeList'])->name('adminTuitionFeeList');
Route::get('/getTuitionFeeList', [TuitionFeeController::class, 'getTuitionFeeList'])->name('getTuitionFeeList');
Route::get('/tuitionAdminFeeView/{id}/view', [TuitionFeeController::class, 'tuitionAdminFeeView'])->name('tuitionAdminFeeView');
Route::post('/tuitionFee/teoApprove', [App\Http\Controllers\TuitionFeeController::class, 'tuitionFeeTeoApprove'])->name('tuitionFee-teo.approve');
Route::post('/tuitionFee/teoReject', [App\Http\Controllers\TuitionFeeController::class, 'tuitionFeeTeoReject'])->name('tuitionFee-teo.reject');



//Institution
Route::resource('/institution', InstitutionController::class);
Route::get('/getInstitution', [InstitutionController::class, 'getInstitution'])->name('getInstitution');
Route::get('/adminInstitutionList', [InstitutionController::class, 'adminInstitutionList'])->name('adminInstitutionList');
Route::get('/getAdminInstitutionList', [InstitutionController::class, 'getAdminInstitutionList'])->name('getAdminInstitutionList');
Route::post('/updateItiDetails/{id}', [InstitutionController::class, 'updateItiDetails'])->name('updateItiDetails');
Route::get('/child_finance/approve/{id}', [App\Http\Controllers\ChildFinanceController::class, 'approve'])->name('approve-verify');
Route::get('/child_finance/reject/{id}', [App\Http\Controllers\ChildFinanceController::class, 'reject'])->name('reject-verify');



Route::resource('/po-tdo', TDOMasterController::class);
Route::post('/district/fetchTDO', [TDOMasterController::class, 'fetchTDO'])->name('district.fetch-po-tdo');
Route::get('/getTdo', [TDOMasterController::class, 'getTdo'])->name('getTdo');
Route::post('/po-tdo/update/{id}', [TDOMasterController::class, 'update'])->name('update-tdo');
Route::post('/po-tdo/delete/{id}', [TDOMasterController::class, 'destroy'])->name('delete-tdo');


//Clerk Section
Route::controller(ClerkController::class)->group(function(){

	Route::get('/ChildFinanceListClerk','ChildFinanceListClerk')->name('ChildFinanceListClerk');
    Route::get('/getchildFinanceListClerk','getchildFinanceListClerk')->name('getchildFinanceListClerk');
    Route::get('/childFinancialDetails/{id}','childFinancialClerkDetails')->name('childFinancialClerkDetails');
    Route::post('/childFinanceApprove','childFinanceApprove')->name('childFinance.approve');
    Route::post('/childFinanceReject','childFinanceReject')->name('childFinance.reject');
    
    Route::get('/getchildFinanceReturnListClerk','getchildFinanceReturnListClerk')->name('getchildFinanceReturnListClerk');

    Route::get('/examApplicationListClerk','examApplicationListClerk')->name('examApplicationListClerk');
    Route::get('/getexamApplicationListClerk','getexamApplicationListClerk')->name('getexamApplicationListClerk');
    Route::get('/getexamApplicationListClerkReturned','getexamApplicationListClerkReturned')->name('getexamApplicationListClerkReturned');
    Route::get('/examApplicationDetails/{id}','examApplicationDetails')->name('examApplicationDetails');
    Route::post('/examApplicationApprove','examApplicationApprove')->name('examApplication.approve');
    Route::post('/examApplicationReject','examApplicationReject')->name('examApplication.reject');
   
    Route::get('/couplefinancialListClerk','couplefinancialListClerk')->name('couplefinancialListClerk');
    Route::get('/getcouplefinancialListClerk','getcouplefinancialListClerk')->name('getcouplefinancialListClerk');
    Route::get('/couplefinancialDetails/{id}','couplefinancialDetails')->name('couplefinancialDetails');
    Route::post('/couplefinancialApprove','couplefinancialApprove')->name('couplefinancial.approve');
    Route::post('/couplefinancialReject','couplefinancialReject')->name('couplefinancial.reject');
   
    Route::get('/getcouplefinancialListClerkReturned','getcouplefinancialListClerkReturned')->name('getcouplefinancialListClerkReturned');

    
	Route::get('/motherChildSchemeListClerk','motherChildSchemeListClerk')->name('motherChildSchemeListClerk');
    Route::get('/getmotherChildSchemeListClerk','getmotherChildSchemeListClerk')->name('getmotherChildSchemeListClerk');
    Route::get('/motherChildSchemeDetails/{id}','motherChildSchemeDetails')->name('motherChildSchemeDetails');
    Route::post('/motherChildSchemeApprove','motherChildSchemeApprove')->name('motherChildScheme.approve');
    Route::post('/motherChildSchemeReject','motherChildSchemeReject')->name('motherChildScheme.reject');
   
    
    Route::get('/getmotherChildSchemeReturnListClerk','getmotherChildSchemeReturnListClerk')->name('getmotherChildSchemeReturnListClerk');
      
    
	Route::get('/marriageGrantListClerk','marriageGrantListClerk')->name('marriageGrantListClerk');
    Route::get('/getmarriageGrantListClerk','getmarriageGrantListClerk')->name('getmarriageGrantListClerk');
    Route::get('/marriageGrantDetails/{id}','marriageGrantDetails')->name('marriageGrantDetails');
    Route::post('/marriageGrantClerkApprove','marriageGrantClerkApprove')->name('marriageGrantClerk.approve');
    Route::post('/marriageGrantClerkReject','marriageGrantClerkReject')->name('marriageGrantClerk.reject');

    Route::get('/getmarriageGrantReturnListClerk','getmarriageGrantReturnListClerk')->name('getmarriageGrantReturnListClerk');

    Route::get('/houseGrantListClerk','houseGrantListClerk')->name('houseGrantListClerk');
    Route::get('/gethouseGrantListClerk','gethouseGrantListClerk')->name('gethouseGrantListClerk');
    Route::get('/houseGrantDetails/{id}','houseGrantClerkDetails')->name('houseGrantClerkDetails');
    Route::post('/houseGrantClerkApprove','houseGrantClerkApprove')->name('houseGrant.clerk.approve');
    Route::post('/houseGrantClerkReject','houseGrantClerkReject')->name('houseGrant.clerk.reject');


    Route::get('/tuitionFeeListClerk','tuitionFeeListClerk')->name('tuitionFeeListClerk');
    Route::get('/gettuitionFeeClerk','gettuitionFeeClerk')->name('gettuitionFeeClerk');
    Route::get('/tuitionFeeDetails/{id}','tuitionFeeClerkDetails')->name('tuitionFeeClerkDetails');
    Route::post('/tuitionFeeClerkApprove','tuitionFeeClerkApprove')->name('tuitionFee.clerk.approve');
    Route::post('/tuitionFeeClerkReject','tuitionFeeClerkReject')->name('tuitionFee.clerk.reject');









    Route::get('/clerkItiFundList', 'clerkItiFundList')->name('clerkItiFundList');
    Route::get('/getClerkItiFundList', 'getClerkItiFundList')->name('getClerkItiFundList');
    Route::get('/itiFeeClerkView/{id}', 'itiFeeClerkView')->name('clerkItiFundList.show');
    Route::post('/itiScholarshipClerkApprove','itiScholarshipClerkApprove')->name('itiScholarshipClerk.approve');
    Route::post('/itiScholarshipClerkReject','itiScholarshipClerkReject')->name('itiScholarshipClerk.reject');
    
    Route::get('/getItiFundListClerkReturned','getItiFundListClerkReturned')->name('getItiFundListClerkReturned');


    Route::get('/studentAwardListClerk', 'studentAwardListClerk')->name('studentAwardListClerk');
    Route::get('/getStudentAwardListClerk', 'getStudentAwardListClerk')->name('getStudentAwardListClerk');
    Route::get('/studentAward/{id}/Clerkview', 'studentAwardClerkView')->name('studentAwardClerkView');
    Route::post('/studentAward/clerkApprove', 'studentAwardClerkApprove')->name('studentAward-clerk.approve');
    Route::post('/studentAward/clerkReject', 'studentAwardClerkReject')->name('studentAward-clerk.reject');
    
    Route::get('/anemiaFinanceListClerk', 'anemiaFinanceListClerk')->name('anemiaFinanceListClerk');
    Route::get('/getAnemiaFinanceListClerk', 'getAnemiaFinanceListClerk')->name('getAnemiaFinanceListClerk');
    Route::get('/anemiaFinance/{id}/Clerkview', 'anemiaFinanceClerkView')->name('anemiaFinanceClerkView');
    Route::post('/anemiaFinance/clerkApprove', 'anemiaFinanceClerkApprove')->name('anemiaFinance-clerk.approve');
    Route::post('/anemiaFinance/clerkReject', 'anemiaFinanceClerkReject')->name('anemiaFinance-clerk.reject');

    Route::get('/singleEarnerListClerk', 'singleEarnerListClerk')->name('singleEarnerListClerk');
    Route::get('/getSingleEarnerListClerk', 'getSingleEarnerListClerk')->name('getSingleEarnerListClerk');
    Route::get('/singleEarner/{id}/clerkview', 'singleEarnerClerkView')->name('singleEarnerClerkView');
    Route::post('/singleEarner/clerkApprove', 'singleEarnerClerkApprove')->name('singleEarner-clerk.approve');
    Route::post('/singleEarner/clerkReject', 'singleEarnerClerkReject')->name('singleEarner-clerk.reject');

    Route::get('/StudentFundListClerk', 'studentFundListClerk')->name('studentFundListClerk');
    Route::get('/getStudentFundListClerk', 'getStudentFundListClerk')->name('getStudentFundListClerk');
    Route::get('/StudentFund/{id}/clerkview', 'studentFundClerkView')->name('studentFundClerkView');
    Route::post('/StudentFund/clerkApprove', 'studentFundClerkApprove')->name('studentFund-clerk.approve');
    Route::post('/StudentFund/clerkReject', 'studentFundClerkReject')->name('studentFund-clerk.reject');
    Route::get('/getStudentFundListClerkReturn', 'getStudentFundListClerkReturn')->name('getStudentFundListClerkReturn');

   


});



//Clerk Section
Route::controller(ApoTdoController::class)->group(function(){

	Route::get('/ChildFinanceListAssistant','ChildFinanceListAssistant')->name('ChildFinanceListAssistant');
    Route::get('/getchildFinanceListAssistant','getchildFinanceListAssistant')->name('getchildFinanceListAssistant');
    Route::get('/childFinancialDetailsAssistant/{id}','childFinancialDetailsAssistant')->name('childFinancialDetailsAssistant');
    Route::post('/childFinanceApproveAssistant','childFinanceApproveAssistant')->name('childFinance.assistant.approve');
    Route::post('/childFinanceRejectAssistant','childFinanceRejectAssistant')->name('childFinance.assistant.reject');
    
    Route::get('/getchildFinanceListAssistantReturned','getchildFinanceListAssistantReturned')->name('getchildFinanceListAssistantReturned');

    Route::get('/examApplicationListAssistant','examApplicationListAssistant')->name('examApplicationListAssistant');
    Route::get('/getexamApplicationListAssistant','getexamApplicationListAssistant')->name('getexamApplicationListAssistant');
    Route::get('/getexamApplicationListAssistantReturned','getexamApplicationListAssistantReturned')->name('getexamApplicationListAssistantReturned');
    Route::get('/examApplicationDetailsAssistant/{id}','examApplicationDetailsAssistant')->name('examApplicationDetailsAssistant');
    Route::post('/examApplicationApproveAssistant','examApplicationApproveAssistant')->name('examApplication.assistant.approve');
    Route::post('/examApplicationRejectAssistant','examApplicationRejectAssistant')->name('examApplication.assistant.reject');
   
    Route::get('/couplefinancialListAssistant','couplefinancialListAssistant')->name('couplefinancialListAssistant');
    Route::get('/getcouplefinancialListAssistant','getcouplefinancialListAssistant')->name('getcouplefinancialListAssistant');
    Route::get('/couplefinancialDetailsAssistant/{id}','couplefinancialDetailsAssistant')->name('couplefinancialDetailsAssistant');
    Route::post('/couplefinancialApproveAssistant','couplefinancialApproveAssistant')->name('couplefinancial.assistant.approve');
    Route::post('/couplefinancialRejectAssistant','couplefinancialRejectAssistant')->name('couplefinancial.assistant.reject');
   
    Route::get('/getcouplefinancialListAssistantReturn','getcouplefinancialListAssistantReturn')->name('getcouplefinancialListAssistantReturn');

    
	Route::get('/motherChildSchemeListAssistant','motherChildSchemeListAssistant')->name('motherChildSchemeListAssistant');
    Route::get('/getmotherChildSchemeListAssistant','getmotherChildSchemeListAssistant')->name('getmotherChildSchemeListAssistant');
    Route::get('/getmotherChildSchemeListAssistantReturned','getmotherChildSchemeListAssistantReturned')->name('getmotherChildSchemeListAssistantReturned');
    Route::get('/motherChildSchemeDetailsAssistant/{id}','motherChildSchemeDetailsAssistant')->name('motherChildSchemeDetailsAssistant');
    Route::post('/motherChildSchemeApproveAssistant','motherChildSchemeApproveAssistant')->name('motherChildScheme.assistant.approve');
    Route::post('/motherChildSchemeReturnAssistant','motherChildSchemeReturnAssistant')->name('motherChildScheme.assistant.return');
   
    Route::get('/getmotherChildSchemeListAssistantReturned','getmotherChildSchemeListAssistantReturned')->name('getmotherChildSchemeListAssistantReturned');
    
    Route::get('/marriageGrantListAssistant','marriageGrantListAssistant')->name('marriageGrantListAssistant');
    Route::get('/getmarriageGrantListAssistant','getmarriageGrantListAssistant')->name('getmarriageGrantListAssistant');
    Route::get('/marriageGrantDetailsAssistant/{id}','marriageGrantDetailsAssistant')->name('marriageGrantDetailsAssistant');
    Route::post('/marriageGrantApproveAssistant','marriageGrantApproveAssistant')->name('marriageGrant.assistant.approve');
    Route::post('/marriageGrantRejectAssistant','marriageGrantRejectAssistant')->name('marriageGrant.assistant.reject');
   
    Route::get('/getmarriageGrantListAssistantReturned','getmarriageGrantListAssistantReturned')->name('getmarriageGrantListAssistantReturned');

    Route::get('/houseGrantListAssistant','houseGrantListAssistant')->name('houseGrantListAssistant');
    Route::get('/gethouseGrantListAssistant','gethouseGrantListAssistant')->name('gethouseGrantListAssistant');
    Route::get('/houseGrantDetailsAssistant/{id}','houseGrantDetailsAssistant')->name('houseGrantDetailsAssistant');
    Route::post('/houseGrantApproveAssistant','houseGrantApproveAssistant')->name('houseGrant.assistant.approve');
    Route::post('/houseGrantRejectAssistant','houseGrantRejectAssistant')->name('houseGrant.assistant.reject');
   

    Route::get('/tuitionFeeListAssistant','tuitionFeeListAssistant')->name('tuitionFeeListAssistant');
    Route::get('/gettuitionFeeListAssistant','gettuitionFeeListAssistant')->name('gettuitionFeeListAssistant');
    Route::get('/tuitionFeeDetailsAssistant/{id}','tuitionFeeDetailsAssistant')->name('tuitionFeeDetailsAssistant');
    Route::post('/tuitionFeeApproveAssistant','tuitionFeeApproveAssistant')->name('tuitionFee.assistant.approve');
    Route::post('/tuitionFeeRejectAssistant','tuitionFeeRejectAssistant')->name('tuitionFee.assistant.reject');
   
    Route::get('/StudentFundListAssistant', 'StudentFundListAssistant')->name('StudentFundListAssistant');
    Route::get('/getStudentFundListAssistant', 'getStudentFundListAssistant')->name('getStudentFundListAssistant');
    Route::get('/StudentFund/{id}/assistantview', 'studentFundAssistantView')->name('studentFundAssistantView');
    Route::post('/StudentFund/assistantApprove', 'studentFundAssistantApprove')->name('studentFund-assistant.approve');
    Route::post('/StudentFund/assistantReject', 'studentFundAssistantReject')->name('studentFund-assistant.reject');
    
    

    Route::get('/singleEarnerListAssistant', 'singleEarnerListAssistant')->name('singleEarnerListAssistant');
    Route::get('/getSingleEarnerListAssistant', 'getSingleEarnerListAssistant')->name('getSingleEarnerListAssistant');
    Route::get('/singleEarner/{id}/assistantview', 'singleEarnerAssistantView')->name('singleEarnerAssistantView');
    Route::post('/singleEarner/assistantApprove', 'singleEarnerAssistantApprove')->name('singleEarner-assistant.approve');
    Route::post('/singleEarner/assistantReject', 'singleEarnerAssistantReject')->name('singleEarner-assistant.reject');

    Route::get('/anemiaFinanceListAssistant', 'anemiaFinanceListAssistant')->name('anemiaFinanceListAssistant');
    Route::get('/getAnemiaFinanceListAssistant', 'getAnemiaFinanceListAssistant')->name('getAnemiaFinanceListAssistant');
    Route::get('/anemiaFinance/{id}/Assistantview', 'anemiaFinanceAssistantView')->name('anemiaFinanceAssistantView');
    Route::post('/anemiaFinance/AssistantApprove', 'anemiaFinanceAssistantApprove')->name('anemiaFinance-assistant.approve');
    Route::post('/anemiaFinance/assistantReject', 'anemiaFinanceAssistantReject')->name('anemiaFinance-assistant.reject');

    Route::get('/assistantItiFundList', 'assistantItiFundList')->name('assistantItiFundList');
    Route::get('/getAssistantItiFundList', 'getAssistantItiFundList')->name('getAssistantItiFundList');
    Route::get('/itiFeeAssistantView/{id}', 'itiFeeAssistantView')->name('itiFeeAssistantView');
    Route::post('/itiScholarshipAssistantApprove','itiScholarshipAssistantApprove')->name('itiScholarshipAssistant.approve');
    Route::post('/itiScholarshipAssistantReject','itiScholarshipAssistantReject')->name('itiScholarshipAssistant.reject');
   
    Route::get('/getAssistantItiFundListReturn','getAssistantItiFundListReturn')->name('getAssistantItiFundListReturn');

    Route::get('/studentAwardListAssistant', 'studentAwardListAssistant')->name('studentAwardListAssistant');
    Route::get('/getStudentAwardListAssistant', 'getStudentAwardListAssistant')->name('getStudentAwardListAssistant');
    Route::get('/studentAward/{id}/assistantview', 'studentAwardAssistantView')->name('studentAwardAssistantView');
    Route::post('/studentAward/assistantApprove', 'studentAwardAssistantApprove')->name('studentAward-assistant.approve');
    Route::post('/studentAward/assistantReject', 'studentAwardAssistantReject')->name('studentAward-assistant.reject');
    Route::get('/getStudentFundListAssistantReturn', 'getStudentFundListAssistantReturn')->name('getStudentFundListAssistantReturn');

});



Route::controller(PoTdoController::class)->group(function(){

	Route::get('/ChildFinanceListOfficer','ChildFinanceListOfficer')->name('ChildFinanceListOfficer');
    Route::get('/getchildFinanceListOfficer','getchildFinanceListOfficer')->name('getchildFinanceListOfficer');
    Route::get('/childFinancialDetailsOfficer/{id}','childFinancialDetailsOfficer')->name('childFinancialDetailsOfficer');
    Route::post('/childFinanceApproveOfficer','childFinanceApproveOfficer')->name('childFinance.officer.approve');
    Route::post('/childFinanceRejectOfficer','childFinanceRejectOfficer')->name('childFinance.officer.reject');

    Route::get('/getchildFinanceListOfficerReturned','getchildFinanceListOfficerReturned')->name('getchildFinanceListOfficerReturned');
    Route::post('/childFinanceRemoveOfficer','childFinanceRemoveOfficer')->name('childFinance.officer.remove');
   

    Route::get('/examApplicationListOfficer','examApplicationListOfficer')->name('examApplicationListOfficer');
    Route::get('/getexamApplicationListOfficer','getexamApplicationListOfficer')->name('getexamApplicationListOfficer');
    Route::get('/getexamApplicationListOfficerReturned','getexamApplicationListOfficerReturned')->name('getexamApplicationListOfficerReturned');
    Route::get('/examApplicationDetailsOfficer/{id}','examApplicationDetailsOfficer')->name('examApplicationDetailsOfficer');
    Route::post('/examApplicationApproveOfficer','examApplicationApproveOfficer')->name('examApplication.officer.approve');
    Route::post('/examApplicationRejectOfficer','examApplicationRejectOfficer')->name('examApplication.officer.reject');
    Route::post('/examApplicationRemoveOfficer','examApplicationRemoveOfficer')->name('examApplication.officer.remove');
   
    Route::get('/couplefinancialListOfficer','couplefinancialListOfficer')->name('couplefinancialListOfficer');
    Route::get('/getcouplefinancialListOfficer','getcouplefinancialListOfficer')->name('getcouplefinancialListOfficer');
    Route::get('/couplefinancialDetailsOfficer/{id}','couplefinancialDetailsOfficer')->name('couplefinancialDetailsOfficer');
    Route::post('/couplefinancialApproveOfficer','couplefinancialApproveOfficer')->name('couplefinancial.officer.approve');
    Route::post('/couplefinancialRejectOfficer','couplefinancialRejectOfficer')->name('couplefinancial.officer.reject');
   
    Route::get('/getcouplefinancialListOfficerReturn','getcouplefinancialListOfficerReturn')->name('getcouplefinancialListOfficerReturn');
    Route::post('/couplefinancialRemoveOfficer','couplefinancialRemoveOfficer')->name('couplefinancial.officer.remove');
    
	Route::get('/motherChildSchemeListOfficer','motherChildSchemeListOfficer')->name('motherChildSchemeListOfficer');
    Route::get('/getmotherChildSchemeListOfficer','getmotherChildSchemeListOfficer')->name('getmotherChildSchemeListOfficer');
    Route::get('/motherChildSchemeDetailsOfficer/{id}','motherChildSchemeDetailsOfficer')->name('motherChildSchemeDetailsOfficer');
    Route::post('/motherChildSchemeApproveOfficer','motherChildSchemeApproveOfficer')->name('motherChildScheme.officer.approve');
    Route::post('/motherChildSchemeRejectOfficer','motherChildSchemeRejectOfficer')->name('motherChildScheme.officer.reject');
    Route::post('/motherChildSchemeRemoveOfficer','motherChildSchemeRemoveOfficer')->name('motherChildScheme.officer.remove');
   
    Route::get('/getmotherChildSchemeListOfficerReturned','getmotherChildSchemeListOfficerReturned')->name('getmotherChildSchemeListOfficerReturned');

    Route::get('/marriageGrantListOfficer','marriageGrantListOfficer')->name('marriageGrantListOfficer');
    Route::get('/getmarriageGrantListOfficer','getmarriageGrantListOfficer')->name('getmarriageGrantListOfficer');
    Route::get('/marriageGrantDetailsOfficer/{id}','marriageGrantDetailsOfficer')->name('marriageGrantDetailsOfficer');
    Route::post('/marriageGrantApproveOfficer','marriageGrantApproveOfficer')->name('marriageGrant.officer.approve');
    Route::post('/marriageGrantRejectOfficer','marriageGrantRejectOfficer')->name('marriageGrant.officer.reject');

    Route::post('/marriageGrantRemoveOfficer','marriageGrantRemoveOfficer')->name('marriageGrant.officer.remove');
    Route::get('/getmarriageGrantListOfficerReturned','getmarriageGrantListOfficerReturned')->name('getmarriageGrantListOfficerReturned');
    

    Route::get('/houseGrantListOfficer','houseGrantListOfficer')->name('houseGrantListOfficer');
    Route::get('/gethouseGrantListOfficer','gethouseGrantListOfficer')->name('gethouseGrantListOfficer');
    Route::get('/houseGrantDetailsOfficer/{id}','houseGrantDetailsOfficer')->name('houseGrantDetailsOfficer');
    Route::post('/houseGrantApproveOfficer','houseGrantApproveOfficer')->name('houseGrant.officer.approve');
    Route::post('/houseGrantRejectOfficer','houseGrantRejectOfficer')->name('houseGrant.officer.reject');
   

    Route::get('/tuitionFeeListOfficer','tuitionFeeListOfficer')->name('tuitionFeeListOfficer');
    Route::get('/gettuitionFeeListOfficer','gettuitionFeeListOfficer')->name('gettuitionFeeListOfficer');
    Route::get('/tuitionFeeDetailsOfficer/{id}','tuitionFeeDetailsOfficer')->name('tuitionFeeDetailsOfficer');
    Route::post('/tuitionFeeApproveOfficer','tuitionFeeApproveOfficer')->name('tuitionFee.officer.approve');
    Route::post('/tuitionFeeRejectOfficer','tuitionFeeRejectOfficer')->name('tuitionFee.officer.reject');


    Route::get('/StudentFundListOfficer', 'StudentFundListOfficer')->name('StudentFundListOfficer');
    Route::get('/getStudentFundListOfficer', 'getStudentFundListOfficer')->name('getStudentFundListOfficer');
    Route::get('/getStudentFundListOfficerReturn', 'getStudentFundListOfficerReturn')->name('getStudentFundListOfficerReturn');
    Route::get('/StudentFund/{id}/officerview', 'studentFundOfficerView')->name('studentFundOfficerView');
    Route::post('/StudentFund/officerApprove', 'studentFundOfficerApprove')->name('studentFund-officer.approve');
    Route::post('/StudentFund/officerReject', 'studentFundOfficerReject')->name('studentFund-officer.reject');
    Route::post('/studentFund/officer-Remove','studentfundRemoveOfficer')->name('studentFund-officer.remove');

    Route::get('/singleEarnerListOfficer', 'singleEarnerListOfficer')->name('singleEarnerListOfficer');
    Route::get('/getSingleEarnerListOfficer', 'getSingleEarnerListOfficer')->name('getSingleEarnerListOfficer');
    Route::get('/singleEarner/{id}/officerview', 'singleEarnerOfficerView')->name('singleEarnerOfficerView');
    Route::post('/singleEarner/officerApprove', 'singleEarnerOfficerApprove')->name('singleEarner-officer.approve');
    Route::post('/singleEarner/officerReject', 'singleEarnerOfficerReject')->name('singleEarner-officer.reject');

    Route::get('/anemiaFinanceListOfficer', 'anemiaFinanceListOfficer')->name('anemiaFinanceListOfficer');
    Route::get('/getAnemiaFinanceListOfficer', 'getAnemiaFinanceListOfficer')->name('getAnemiaFinanceListOfficer');
    Route::get('/anemiaFinance/{id}/officerview', 'anemiaFinanceOfficerView')->name('anemiaFinanceOfficerView');
    Route::post('/anemiaFinance/officerApprove', 'anemiaFinanceOfficerApprove')->name('anemiaFinance-officer.approve');
    Route::post('/anemiaFinance/officerReject', 'anemiaFinanceOfficerReject')->name('anemiaFinance-officer.reject');

    Route::get('/officerItiFundList', 'officerItiFundList')->name('officerItiFundList');
    Route::get('/getOfficerItiFundList', 'getOfficerItiFundList')->name('getOfficerItiFundList');
    Route::get('/itiFeeOfficerView/{id}', 'itiFeeOfficerView')->name('itiFeeOfficerView');
    Route::post('/itiScholarshipOfficerApprove','itiScholarshipOfficerApprove')->name('itiScholarshipOfficer.approve');
    Route::post('/itiScholarshipOfficerReject','itiScholarshipOfficerReject')->name('itiScholarshipOfficer.reject');
   
    Route::get('/getOfficerItiFundListReturn', 'getOfficerItiFundListReturn')->name('getOfficerItiFundListReturn');
    Route::post('/itiScholarshipOfficerRemove','itiScholarshipOfficerRemove')->name('itiScholarshipOfficer.remove');


    Route::get('/studentAwardListOfficer', 'studentAwardListOfficer')->name('studentAwardListOfficer');
    Route::get('/getStudentAwardListOfficer', 'getStudentAwardListOfficer')->name('getStudentAwardListOfficer');
    Route::get('/studentAward/{id}/officerview', 'studentAwardOfficerView')->name('studentAwardOfficerView');
    Route::post('/studentAward/officerApprove', 'studentAwardOfficerApprove')->name('studentAward-officer.approve');
    Route::post('/studentAward/officerReject', 'studentAwardOfficerReject')->name('studentAward-officer.reject');
    

});


//JS/SEO Section

Route::controller(JsSeoController::class)->group(function(){

	Route::get('/childFinanceListJsSeo','childFinanceListJsSeo')->name('childFinanceListJsSeo');
    Route::get('/getchildFinanceListJsSeo','getchildFinanceListJsSeo')->name('getchildFinanceListJsSeo');
    Route::get('/childFinancialJsSeoDetails/{id}','childFinancialJsSeoDetails')->name('childFinancialJsSeoDetails');
    Route::post('/childFinanceJsSeoApprove','childFinanceJsSeoApprove')->name('childFinance.JsSeo.approve');
    Route::post('/childFinanceJsSeoReject','childFinanceJsSeoReject')->name('childFinance.JsSeo.reject');
  
    Route::get('/getchildFinanceListJsSeoReturn','getchildFinanceListJsSeoReturn')->name('getchildFinanceListJsSeoReturn');

    Route::get('/examApplicationListJsSeo','examApplicationListJsSeo')->name('examApplicationListJsSeo');
    Route::get('/getexamApplicationListJsSeo','getexamApplicationListJsSeo')->name('getexamApplicationListJsSeo');
    Route::get('/getexamApplicationListJsSeoReturned','getexamApplicationListJsSeoReturned')->name('getexamApplicationListJsSeoReturned');
    Route::get('/examApplicationJsSeoDetails/{id}','examApplicationJsSeoDetails')->name('examApplicationJsSeoDetails');
    Route::post('/examApplicationJsSeoApprove','examApplicationJsSeoApprove')->name('examApplication.JsSeo.approve');
    Route::post('/examApplicationJsSeoReject','examApplicationJsSeoReject')->name('examApplication.JsSeo.reject');
   
    Route::get('/couplefinancialListJsSeo','couplefinancialListJsSeo')->name('couplefinancialListJsSeo');
    Route::get('/getcouplefinancialListJsSeo','getcouplefinancialListJsSeo')->name('getcouplefinancialListJsSeo');
    Route::get('/couplefinancialJsSeoDetails/{id}','couplefinancialJsSeoDetails')->name('couplefinancialJsSeoDetails');
    Route::post('/couplefinancialJsSeoApprove','couplefinancialJsSeoApprove')->name('couplefinancial.JsSeo.approve');
    Route::post('/couplefinancialJsSeoReject','couplefinancialJsSeoReject')->name('couplefinancial.JsSeo.reject');
   
    Route::get('/getcouplefinancialListJsSeoReturn','getcouplefinancialListJsSeoReturn')->name('getcouplefinancialListJsSeoReturn');


	Route::get('/motherChildSchemeListJsSeo','motherChildSchemeListJsSeo')->name('motherChildSchemeListJsSeo');
    Route::get('/getmotherChildSchemeListJsSeo','getmotherChildSchemeListJsSeo')->name('getmotherChildSchemeListJsSeo');
    Route::get('/motherChildSchemeJsSeoDetails/{id}','motherChildSchemeJsSeoDetails')->name('motherChildSchemeJsSeoDetails');
    Route::post('/motherChildSchemeJsSeoApprove','motherChildSchemeJsSeoApprove')->name('motherChildScheme.JsSeo.approve');
    Route::post('/motherChildSchemeJsSeoReject','motherChildSchemeJsSeoReject')->name('motherChildScheme.JsSeo.reject');
    
    Route::get('/getmotherChildSchemeListJsSeoReturn','getmotherChildSchemeListJsSeoReturn')->name('getmotherChildSchemeListJsSeoReturn');
    
	Route::get('/marriageGrantListJsSeo','marriageGrantListJsSeo')->name('marriageGrantListJsSeo');
    Route::get('/getmarriageGrantListJsSeo','getmarriageGrantListJsSeo')->name('getmarriageGrantListJsSeo');
    Route::get('/marriageGrantJsSeoDetails/{id}','marriageGrantJsSeoDetails')->name('marriageGrantJsSeoDetails');
    Route::post('/marriageGrantJsSeoApprove','marriageGrantJsSeoApprove')->name('marriageGrantJsSeo.approve');
    Route::post('/marriageGrantJsSeoReject','marriageGrantJsSeoReject')->name('marriageGrantJsSeo.reject');

    Route::get('/getmarriageGrantListJsSeoReturn','getmarriageGrantListJsSeoReturn')->name('getmarriageGrantListJsSeoReturn');

    Route::get('/houseGrantListJsSeo','houseGrantListClerk')->name('houseGrantListJsSeo');
    Route::get('/gethouseGrantListJsSeo','gethouseGrantListJsSeo')->name('gethouseGrantListJsSeo');
    Route::get('/houseGrantJsSeoDetails/{id}','houseGrantJsSeoDetails')->name('houseGrantJsSeoDetails');
    Route::post('/houseGrantJsSeoApprove','houseGrantJsSeoApprove')->name('houseGrant.JsSeo.approve');
    Route::post('/houseGrantJsSeoReject','houseGrantJsSeoReject')->name('houseGrant.JsSeo.reject');

    Route::get('/tuitionFeeListJsSeo','tuitionFeeListJsSeo')->name('tuitionFeeListJsSeo');
    Route::get('/gettuitionFeeJsSeo','gettuitionFeeJsSeo')->name('gettuitionFeeJsSeo');
    Route::get('/tuitionFeeJsSeoDetails/{id}','tuitionFeeJsSeoDetails')->name('tuitionFeeJsSeoDetails');
    Route::post('/tuitionFeeJsSeoApprove','tuitionFeeJsSeoApprove')->name('tuitionFee.JsSeo.approve');
    Route::post('/tuitionFeeJsSeoReject','tuitionFeeJsSeoReject')->name('tuitionFee.JsSeo.reject');

    Route::get('/JsSeoItiFundList', 'JsSeoItiFundList')->name('JsSeoItiFundList');
    Route::get('/getJsSeoItiFundList', 'getJsSeoItiFundList')->name('getJsSeoItiFundList');
    Route::get('/itiFeeJsSeoView/{id}', 'itiFeeJsSeoView')->name('JsSeoItiFundList.show');
    Route::post('/itiScholarshipJsSeoApprove','itiScholarshipJsSeoApprove')->name('itiScholarshipJsSeo.approve');
    Route::post('/itiScholarshipJsSeoReject','itiScholarshipJsSeoReject')->name('itiScholarshipJsSeo.reject');
    Route::get('/getItiFundListJsSeoReturn','getItiFundListJsSeoReturn')->name('getItiFundListJsSeoReturn');


    Route::get('/studentAwardListJsSeo', 'studentAwardListJsSeo')->name('studentAwardListJsSeo');
    Route::get('/getStudentAwardListJsSeo', 'getStudentAwardListJsSeo')->name('getStudentAwardListJsSeo');
    Route::get('/studentAward/{id}/JsSeoview', 'studentAwardJsSeoView')->name('studentAwardJsSeoView');
    Route::post('/studentAward/JsSeoApprove', 'studentAwardJsSeoApprove')->name('studentAward-JsSeo.approve');
    Route::post('/studentAward/JsSeoReject', 'studentAwardJsSeoReject')->name('studentAward-JsSeo.reject');
    
    Route::get('/anemiaFinanceListJsSeo', 'anemiaFinanceListJsSeo')->name('anemiaFinanceListJsSeo');
    Route::get('/getAnemiaFinanceListJsSeo', 'getAnemiaFinanceListJsSeo')->name('getAnemiaFinanceListJsSeo');
    Route::get('/anemiaFinance/{id}/JsSeoview', 'anemiaFinanceJsSeoView')->name('anemiaFinanceJsSeoView');
    Route::post('/anemiaFinance/JsSeoApprove', 'anemiaFinanceJsSeoApprove')->name('anemiaFinance-JsSeo.approve');
    Route::post('/anemiaFinance/JsSeoReject', 'anemiaFinanceJsSeoReject')->name('anemiaFinance-JsSeo.reject');

    Route::get('/singleEarnerListJsSeo', 'singleEarnerListJsSeo')->name('singleEarnerListJsSeo');
    Route::get('/getSingleEarnerListJsSeo', 'getSingleEarnerListJsSeo')->name('getSingleEarnerListJsSeo');
    Route::get('/singleEarner/{id}/JsSeoview', 'singleEarnerJsSeoView')->name('singleEarnerJsSeoView');
    Route::post('/singleEarner/JsSeoApprove', 'singleEarnerJsSeoApprove')->name('singleEarner-JsSeo.approve');
    Route::post('/singleEarner/JsSeoReject', 'singleEarnerJsSeoReject')->name('singleEarner-JsSeo.reject');

    Route::get('/StudentFundListJsSeo', 'studentFundListJsSeo')->name('studentFundListJsSeo');
    Route::get('/getStudentFundListJsSeo', 'getStudentFundListJsSeo')->name('getStudentFundListJsSeo');
    Route::get('/StudentFund/{id}/JsSeoview', 'studentFundJsSeoView')->name('studentFundJsSeoView');
    Route::post('/StudentFund/JsSeoApprove', 'studentFundJsSeoApprove')->name('studentFund-JsSeo.approve');
    Route::post('/StudentFund/JsSeoReject', 'studentFundJsSeoReject')->name('studentFund-JsSeo.reject');
    Route::get('/getStudentFundListJsSeoReturn', 'getStudentFundListJsSeoReturn')->name('getStudentFundListJsSeoReturn');

});


Route::controller(DirectorateController::class)->group(function(){

    Route::get('/singleEarnerListDc', 'singleEarnerListDc')->name('singleEarnerListDc');
    Route::get('/getSingleEarnerListDc', 'getSingleEarnerListDc')->name('getSingleEarnerListDc');
    Route::get('/singleEarner/{id}/Dcview', 'singleEarnerDcView')->name('singleEarnerDcView');
    Route::post('/singleEarner/DcApprove', 'singleEarnerDcApprove')->name('singleEarner-Dc.approve');
    Route::post('/singleEarner/DcReject', 'singleEarnerDcReject')->name('singleEarner-Dc.reject');

    Route::get('/singleEarnerListD_JsSeo', 'singleEarnerListD_JsSeo')->name('singleEarnerListD_JsSeo');
    Route::get('/getSingleEarnerListD_JsSeo', 'getSingleEarnerListD_JsSeo')->name('getSingleEarnerListD_JsSeo');
    Route::get('/singleEarner/{id}/D_JsSeoview', 'singleEarnerD_JsSeoView')->name('singleEarnerD_JsSeoView');
    Route::post('/singleEarner/D_JsSeoApprove', 'singleEarnerD_JsSeoApprove')->name('singleEarner-D_JsSeo.approve');
    Route::post('/singleEarner/D_JsSeoReject', 'singleEarnerD_JsSeoReject')->name('singleEarner-D_JsSeo.reject');

    Route::get('/singleEarnerListD_ad', 'singleEarnerListD_ad')->name('singleEarnerListD_ad');
    Route::get('/getSingleEarnerListD_ad', 'getSingleEarnerListD_ad')->name('getSingleEarnerListD_ad');
    Route::get('/singleEarner/{id}/D_adview', 'singleEarnerD_adView')->name('singleEarnerD_adView');
    Route::post('/singleEarner/D_adApprove', 'singleEarnerD_adApprove')->name('singleEarner-D_ad.approve');
    Route::post('/singleEarner/D_adReject', 'singleEarnerD_adReject')->name('singleEarner-D_ad.reject');

    Route::get('/singleEarnerListD_jd', 'singleEarnerListD_jd')->name('singleEarnerListD_jd');
    Route::get('/getSingleEarnerListD_jd', 'getSingleEarnerListD_jd')->name('getSingleEarnerListD_jd');
    Route::get('/singleEarner/{id}/D_jdview', 'singleEarnerD_jdView')->name('singleEarnerD_jdView');
    Route::post('/singleEarner/D_jdApprove', 'singleEarnerD_jdApprove')->name('singleEarner-D_jd.approve');
    Route::post('/singleEarner/D_jdReject', 'singleEarnerD_jdReject')->name('singleEarner-D_jd.reject');


});


Route::controller(SecretariatController::class)->group(function(){

    Route::get('/singleEarnerListSa', 'singleEarnerListSa')->name('singleEarnerListSa');
    Route::get('/getSingleEarnerListSa', 'getSingleEarnerListSa')->name('getSingleEarnerListSa');
    Route::get('/singleEarner/{id}/Saview', 'singleEarnerSaView')->name('singleEarnerSaView');
    Route::post('/singleEarner/SaApprove', 'singleEarnerSaApprove')->name('singleEarner-Sa.approve');
    Route::post('/singleEarner/SaReject', 'singleEarnerSaReject')->name('singleEarner-Sa.reject');

    Route::get('/singleEarnerListS_so', 'singleEarnerListS_so')->name('singleEarnerListS_so');
    Route::get('/getSingleEarnerListS_so', 'getSingleEarnerListS_so')->name('getSingleEarnerListS_so');
    Route::get('/singleEarner/{id}/S_soview', 'singleEarnerS_soView')->name('singleEarnerS_soView');
    Route::post('/singleEarner/S_soApprove', 'singleEarnerS_soApprove')->name('singleEarner-S_so.approve');
    Route::post('/singleEarner/S_soReject', 'singleEarnerS_soReject')->name('singleEarner-S_so.reject');

    Route::get('/singleEarnerListS_us', 'singleEarnerListS_us')->name('singleEarnerListS_us');
    Route::get('/getSingleEarnerListS_us', 'getSingleEarnerListS_us')->name('getSingleEarnerListS_us');
    Route::get('/singleEarner/{id}/S_usview', 'singleEarnerS_usView')->name('singleEarnerS_usView');
    Route::post('/singleEarner/S_usApprove', 'singleEarnerS_usApprove')->name('singleEarner-S_us.approve');
    Route::post('/singleEarner/S_usReject', 'singleEarnerS_usReject')->name('singleEarner-S_us.reject');

    Route::get('/singleEarnerListS_as', 'singleEarnerListS_as')->name('singleEarnerListS_as');
    Route::get('/getSingleEarnerListS_as', 'getSingleEarnerListS_as')->name('getSingleEarnerListS_as');
    Route::get('/singleEarner/{id}/S_asview', 'singleEarnerS_asView')->name('singleEarnerS_asView');
    Route::post('/singleEarner/S_asApprove', 'singleEarnerS_asApprove')->name('singleEarner-S_as.approve');
    Route::post('/singleEarner/S_asReject', 'singleEarnerS_asReject')->name('singleEarner-S_as.reject');

    Route::get('/singleEarnerListS_acs', 'singleEarnerListS_acs')->name('singleEarnerListS_acs');
    Route::get('/getSingleEarnerListS_acs', 'getSingleEarnerListS_acs')->name('getSingleEarnerListS_acs');
    Route::get('/singleEarner/{id}/S_acsview', 'singleEarnerS_acsView')->name('singleEarnerS_acsView');
    Route::post('/singleEarner/S_acsApprove', 'singleEarnerS_acsApprove')->name('singleEarner-S_acs.approve');
    Route::post('/singleEarner/S_acsReject', 'singleEarnerS_acsReject')->name('singleEarner-S_acs.reject');

});

Route::controller(MinisterOfficeController::class)->group(function(){

    Route::get('/singleEarnerListMo', 'singleEarnerListMo')->name('singleEarnerListMo');
    Route::get('/getSingleEarnerListMo', 'getSingleEarnerListMo')->name('getSingleEarnerListMo');
    Route::get('/singleEarner/{id}/Moview', 'singleEarnerMoView')->name('singleEarnerMoView');
    Route::post('/singleEarner/MoApprove', 'singleEarnerMoApprove')->name('singleEarner-Mo.approve');
    Route::post('/singleEarner/MoReject', 'singleEarnerMoReject')->name('singleEarner-Mo.reject');
});