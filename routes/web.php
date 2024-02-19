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





//exam application routes starts here.
Route::get('/exam-application', [App\Http\Controllers\ApplicationController::class, 'examApplication'])->name('exam-application');
Route::post('/examApplicationPreview', [App\Http\Controllers\ApplicationController::class, 'examApplicationPreview'])->name('examApplicationPreview');
Route::post('/examApplicationStore', [App\Http\Controllers\ApplicationController::class, 'examApplicationStore'])->name('examApplicationStore');
Route::get('/examApplicationList', [App\Http\Controllers\ApplicationController::class, 'examApplicationList'])->name('examApplicationList');
Route::get('/getExamList', [App\Http\Controllers\ApplicationController::class, 'getExamList'])->name('getExamList');
Route::get('/exam-application/{id}', [App\Http\Controllers\ApplicationController::class, 'examApplicationView'])->name('examApplicationView');
Route::post('/exam-application/teoApprove', [ApplicationController::class, 'teoApprove'])->name('exam-application-teo.approve');
Route::post('/exam-application/teoReject', [ApplicationController::class, 'teoReject'])->name('exam-application-teo.reject');
//exam application routes ends here.


Route::get('/childFinancialAssistanceForm', [App\Http\Controllers\ChildFinanceController::class, 'childFinancialAssistanceForm'])->name('childFinancialAssistanceForm');
Route::post('/childFinancialAssistanceStore', [App\Http\Controllers\ChildFinanceController::class, 'childFinancialAssistanceStore'])->name('childFinancialAssistanceStore');
Route::post('/childFinancialStoreDetails', [App\Http\Controllers\ChildFinanceController::class, 'childFinancialStoreDetails'])->name('childFinancialStoreDetails');
Route::get('/ChildFinanceList', [App\Http\Controllers\ChildFinanceController::class, 'ChildFinanceList'])->name('ChildFinanceList');
Route::get('/getchildFinanceList', [App\Http\Controllers\ChildFinanceController::class, 'getchildFinanceList'])->name('getchildFinanceList');
Route::get('/childFinance/{id}/view', [App\Http\Controllers\ChildFinanceController::class, 'childFinanceView'])->name('childFinanceView');

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

//single income earner controller ends  here .


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
Route::get('/Medical/Engineering/StudentFundDetails/{id}', [MedEngStudentFundController::class, 'adminStudentFundDetails'])->name('adminStudentFundDetails');
Route::post('/Medical/Engineering/teoApprove', [MedEngStudentFundController::class, 'teoApprove'])->name('studentFund-teo.approve');
Route::post('/Medical/Engineering/teoReject', [MedEngStudentFundController::class, 'teoReject'])->name('studentFund-teo.reject');

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
   

    Route::get('/examApplicationListClerk','examApplicationListClerk')->name('examApplicationListClerk');
    Route::get('/getexamApplicationListClerk','getexamApplicationListClerk')->name('getexamApplicationListClerk');
    Route::get('/examApplicationDetails/{id}','examApplicationDetails')->name('examApplicationDetails');
    Route::post('/examApplicationApprove','examApplicationApprove')->name('examApplication.approve');
    Route::post('/examApplicationReject','examApplicationReject')->name('examApplication.reject');
   
    Route::get('/couplefinancialListClerk','couplefinancialListClerk')->name('couplefinancialListClerk');
    Route::get('/getcouplefinancialListClerk','getcouplefinancialListClerk')->name('getcouplefinancialListClerk');
    Route::get('/couplefinancialDetails/{id}','couplefinancialDetails')->name('couplefinancialDetails');
    Route::post('/couplefinancialApprove','couplefinancialApprove')->name('couplefinancial.approve');
    Route::post('/couplefinancialReject','couplefinancialReject')->name('couplefinancial.reject');
   
    
	Route::get('/motherChildSchemeListClerk','motherChildSchemeListClerk')->name('motherChildSchemeListClerk');
    Route::get('/getmotherChildSchemeListClerk','getmotherChildSchemeListClerk')->name('getmotherChildSchemeListClerk');
    Route::get('/motherChildSchemeDetails/{id}','motherChildSchemeDetails')->name('motherChildSchemeDetails');
    Route::post('/motherChildSchemeApprove','motherChildSchemeApprove')->name('motherChildScheme.approve');
    Route::post('/motherChildSchemeReject','motherChildSchemeReject')->name('motherChildScheme.reject');
   
    
      
  
	Route::get('/marriageGrantListClerk','marriageGrantListClerk')->name('marriageGrantListClerk');
    Route::get('/getmarriageGrantListClerk','getmarriageGrantListClerk')->name('getmarriageGrantListClerk');
    Route::get('/marriageGrantDetails/{id}','marriageGrantDetails')->name('marriageGrantDetails');
    Route::post('/marriageGrantClerkApprove','marriageGrantClerkApprove')->name('marriageGrantClerk.approve');
    Route::post('/marriageGrantClerkReject','marriageGrantClerkReject')->name('marriageGrantClerk.reject');










    Route::get('/clerkItiFundList', 'clerkItiFundList')->name('clerkItiFundList');
    Route::get('/getClerkItiFundList', 'getClerkItiFundList')->name('getClerkItiFundList');
    Route::get('/itiFeeClerkView/{id}', 'itiFeeClerkView')->name('clerkItiFundList.show');
    Route::post('/itiScholarshipClerkApprove','itiScholarshipClerkApprove')->name('itiScholarshipClerk.approve');
    Route::post('/itiScholarshipClerkReject','itiScholarshipClerkReject')->name('itiScholarshipClerk.reject');
   
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

});

















//Clerk Section
Route::controller(ApoTdoController::class)->group(function(){

	Route::get('/ChildFinanceListAssistant','ChildFinanceListAssistant')->name('ChildFinanceListAssistant');
    Route::get('/getchildFinanceListAssistant','getchildFinanceListAssistant')->name('getchildFinanceListAssistant');
    Route::get('/childFinancialDetailsAssistant/{id}','childFinancialDetailsAssistant')->name('childFinancialDetailsAssistant');
    Route::post('/childFinanceApproveAssistant','childFinanceApproveAssistant')->name('childFinance.assistant.approve');
    Route::post('/childFinanceRejectAssistant','childFinanceRejectAssistant')->name('childFinance.assistant.reject');
   

    Route::get('/examApplicationListAssistant','examApplicationListAssistant')->name('examApplicationListAssistant');
    Route::get('/getexamApplicationListAssistant','getexamApplicationListAssistant')->name('getexamApplicationListAssistant');
    Route::get('/examApplicationDetailsAssistant/{id}','examApplicationDetailsAssistant')->name('examApplicationDetailsAssistant');
    Route::post('/examApplicationApproveAssistant','examApplicationApproveAssistant')->name('examApplication.assistant.approve');
    Route::post('/examApplicationRejectAssistant','examApplicationRejectAssistant')->name('examApplication.assistant.reject');
   
    Route::get('/couplefinancialListAssistant','couplefinancialListAssistant')->name('couplefinancialListAssistant');
    Route::get('/getcouplefinancialListAssistant','getcouplefinancialListAssistant')->name('getcouplefinancialListAssistant');
    Route::get('/couplefinancialDetailsAssistant/{id}','couplefinancialDetailsAssistant')->name('couplefinancialDetailsAssistant');
    Route::post('/couplefinancialApproveAssistant','couplefinancialApproveAssistant')->name('couplefinancial.assistant.approve');
    Route::post('/couplefinancialRejectAssistant','couplefinancialRejectAssistant')->name('couplefinancial.assistant.reject');
   
    
	Route::get('/motherChildSchemeListAssistant','motherChildSchemeListAssistant')->name('motherChildSchemeListAssistant');
    Route::get('/getmotherChildSchemeListAssistant','getmotherChildSchemeListAssistant')->name('getmotherChildSchemeListAssistant');
    Route::get('/motherChildSchemeDetailsAssistant/{id}','motherChildSchemeDetailsAssistant')->name('motherChildSchemeDetailsAssistant');
    Route::post('/motherChildSchemeApproveAssistant','motherChildSchemeApproveAssistant')->name('motherChildScheme.assistant.approve');
    Route::post('/motherChildSchemeRejectAssistant','motherChildSchemeRejectAssistant')->name('motherChildScheme.assistant.reject');
   

    Route::get('/marriageGrantListAssistant','marriageGrantListAssistant')->name('marriageGrantListAssistant');
    Route::get('/getmarriageGrantListAssistant','getmarriageGrantListAssistant')->name('getmarriageGrantListAssistant');
    Route::get('/marriageGrantDetailsAssistant/{id}','marriageGrantDetailsAssistant')->name('marriageGrantDetailsAssistant');
    Route::post('/marriageGrantApproveAssistant','marriageGrantApproveAssistant')->name('marriageGrant.assistant.approve');
    Route::post('/marriageGrantRejectAssistant','marriageGrantRejectAssistant')->name('marriageGrant.assistant.reject');
   


    



});



Route::controller(PoTdoController::class)->group(function(){

	Route::get('/ChildFinanceListOfficer','ChildFinanceListOfficer')->name('ChildFinanceListOfficer');
    Route::get('/getchildFinanceListOfficer','getchildFinanceListOfficer')->name('getchildFinanceListOfficer');
    Route::get('/childFinancialDetailsOfficer/{id}','childFinancialDetailsOfficer')->name('childFinancialDetailsOfficer');
    Route::post('/childFinanceApproveOfficer','childFinanceApproveOfficer')->name('childFinance.officer.approve');
    Route::post('/childFinanceRejectOfficer','childFinanceRejectOfficer')->name('childFinance.officer.reject');
   

    Route::get('/examApplicationListOfficer','examApplicationListOfficer')->name('examApplicationListOfficer');
    Route::get('/getexamApplicationListOfficer','getexamApplicationListOfficer')->name('getexamApplicationListOfficer');
    Route::get('/examApplicationDetailsOfficer/{id}','examApplicationDetailsOfficer')->name('examApplicationDetailsOfficer');
    Route::post('/examApplicationApproveOfficer','examApplicationApproveOfficer')->name('examApplication.officer.approve');
    Route::post('/examApplicationRejectOfficer','examApplicationRejectOfficer')->name('examApplication.officer.reject');
   
    Route::get('/couplefinancialListOfficer','couplefinancialListOfficer')->name('couplefinancialListOfficer');
    Route::get('/getcouplefinancialListOfficer','getcouplefinancialListOfficer')->name('getcouplefinancialListOfficer');
    Route::get('/couplefinancialDetailsOfficer/{id}','couplefinancialDetailsOfficer')->name('couplefinancialDetailsOfficer');
    Route::post('/couplefinancialApproveOfficer','couplefinancialApproveOfficer')->name('couplefinancial.officer.approve');
    Route::post('/couplefinancialRejectOfficer','couplefinancialRejectOfficer')->name('couplefinancial.officer.reject');
   
    
	Route::get('/motherChildSchemeListOfficer','motherChildSchemeListOfficer')->name('motherChildSchemeListOfficer');
    Route::get('/getmotherChildSchemeListOfficer','getmotherChildSchemeListOfficer')->name('getmotherChildSchemeListOfficer');
    Route::get('/motherChildSchemeDetailsOfficer/{id}','motherChildSchemeDetailsOfficer')->name('motherChildSchemeDetailsOfficer');
    Route::post('/motherChildSchemeApproveOfficer','motherChildSchemeApproveOfficer')->name('motherChildScheme.officer.approve');
    Route::post('/motherChildSchemeRejectOfficer','motherChildSchemeRejectOfficer')->name('motherChildScheme.officer.reject');
   

    Route::get('/marriageGrantListOfficer','marriageGrantListOfficer')->name('marriageGrantListOfficer');
    Route::get('/getmarriageGrantListOfficer','getmarriageGrantListOfficer')->name('getmarriageGrantListOfficer');
    Route::get('/marriageGrantDetailsOfficer/{id}','marriageGrantDetailsOfficer')->name('marriageGrantDetailsOfficer');
    Route::post('/marriageGrantApproveOfficer','marriageGrantApproveOfficer')->name('marriageGrant.officer.approve');
    Route::post('/marriageGrantRejectOfficer','marriageGrantRejectOfficer')->name('marriageGrant.officer.reject');
   


    



});