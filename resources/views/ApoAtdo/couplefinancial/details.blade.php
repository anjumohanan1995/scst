@extends('layouts.app')
@section('content')
<!-- main-content -->
<div class="main-content app-content">
<!-- container -->
<div class="main-container container-fluid">
   <!-- breadcrumb -->
   <div class="breadcrumb-header justify-content-between row me-0 ms-0" >
      <div class="col-xl-9">
         {{-- 
         <h4 class="content-title mb-2">  അയ്യങ്കാളി ടാലന്റ് സേർച്ച് &ഡെവലപ്പ്മെന്റ് സ്‌കീം പ്രവേശന പരീക്ഷക്കുള്ള അപേക്ഷ </h4>
         --}}
      </div>
      <div class="col-xl-3">
      </div>
   </div>
   <!-- /breadcrumb -->
   <!-- main-content-body -->
   <div class="main-content-body">
      @if (session('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
         {{ session('success') }}
         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
         <span aria-hidden="true">&times;</span>
         </button>
      </div>
      @endif  
      <!-- row -->
      <!-- row -->
      <div class="row row-sm">
         <div class="col-xl-8 col-lg-12 col-md-12 col-sm-12">
            <div class="card overflow-hidden" >
               <div class="card-body pd-y-5">
                  <div id="print_content">
                     <h1
                        style="text-align: center;color: rgb(0, 0, 0);font-size: medium;  padding: 20px;line-height: 32px;font-weight: 600;">
                        മിശ്ര വിവാഹം മൂലം ക്ലേശങ്ങൾ അനുഭവിക്കുന്ന പട്ടികവർഗ്ഗ ദമ്പതികൾക്ക് <br>
                        പട്ടികവർഗ്ഗ വികസന വകുപ്പിൽ നിന്നം സാമ്പത്തിക സഹായം<br>
                        അനുവദിക്കുന്നതിനുള്ള അപേക്ഷാഫോം
                     </h1>
                     <div class="paper-1">
                        <div class="row">
                           <div class="col-12">
                              <label>1. അപേക്ഷകന്റെ പേരും പൂർണ്ണ 
                              മേൽ വിലാസവും </label>
                           </div>
                        </div>
                     </div>
                     <div class="paper-1">
                        <div class="w-100">
                           <div class="row w-100">
                              <div class="col-5">
                                 <label> എ ) ഭർത്താവ് </label><br>
                              </div>
                              <div class="col-1 w-100">
                                 <label> :  
                                 </label>
                              </div>
                              <div class="col-6">
                                 <label>  {{ @$formData['husband_name'] }} <br>
                                 {{ @$formData['husband_address'] }}</label>
                              </div>
                           </div>
                           <div class="row w-100">
                              <div class="col-5">
                                 <label> ബി ) ഭാര്യ </label>
                              </div>
                              <div class="col-1">
                                 <label> :</label>
                              </div>
                              <div class="col-6">
                                 <label>{{ @$formData['wife_name'] }}  <br>
                                 {{ @$formData['wife_address'] }}
                                 </label>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="paper-1">
                        <div class="row">
                           <div class="col-12">
                              <label>2.വിവാഹത്തിനുമുമ്പുള്ള പൂർണ്ണ മേൽവിലാസം </label>
                           </div>
                        </div>
                     </div>
                     <div class="paper-1">
                        <div class="w-100">
                           <div class="row w-100">
                              <div class="col-5">
                                 <label> എ ) ഭർത്താവ് </label><br>
                              </div>
                              <div class="col-1 w-100">
                                 <label> :  
                                 </label>
                              </div>
                              <div class="col-6">
                                 <label> {{ @$formData['husband_address_old'] }} <br>
                                 {{ @$formData['hus_district_name'] }} {{ @$formData['hus_taluk_name'] }} {{ @$formData['hus_pincode'] }}</label>
                              </div>
                           </div>
                           <div class="row w-100">
                              <div class="col-5">
                                 <label> ബി ) ഭാര്യ </label>
                              </div>
                              <div class="col-1">
                                 <label> :</label>
                              </div>
                              <div class="col-6">
                                 <label>{{ @$formData['wife_address_old'] }}  <br>
                                 {{ @$formData['wife_district_name'] }} {{ @$formData['wife_taluk_name'] }} {{ @$formData['wife_pincode'] }}
                                 </label>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="paper-1">
                        <div class="row">
                           <div class="col-12">
                              <label>3.സമുദായം </label>
                           </div>
                        </div>
                     </div>
                     <div class="paper-1">
                        <div class="w-100">
                           <div class="row w-100">
                              <div class="col-5">
                                 <label> എ ) ഭർത്താവ് </label><br>
                              </div>
                              <div class="col-1 w-100">
                                 <label> :  
                                 </label>
                              </div>
                              <div class="col-6">
                                 <label> {{ @$formData['husband_caste'] }}</label>
                              </div>
                           </div>
                           <div class="row w-100">
                              <div class="col-5">
                                 <label> ബി ) ഭാര്യ </label>
                              </div>
                              <div class="col-1">
                                 <label> :</label>
                              </div>
                              <div class="col-6">
                                 <label>{{ @$formData['wife_caste'] }}
                                 </label>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="paper-1">
                        <div class="row">
                           <div class="col-12">
                              <label>4. പഞ്ചായത്തിൻ്റെ അല്ലെങ്കിൽ കോ-ഓർപ്പറേഷൻ്റെ പേര്  </label>
                           </div>
                        </div>
                     </div>
                     <div class="paper-1">
                        <div class="w-100">
                           <div class="row w-100">
                              <div class="col-5">
                                 <label> എ ) ഭർത്താവ് </label><br>
                              </div>
                              <div class="col-1 w-100">
                                 <label> :  
                                 </label>
                              </div>
                              <div class="col-6">
                                 <label> {{ @$formData['husband_panchayath'] }}</label>
                              </div>
                           </div>
                           <div class="row w-100">
                              <div class="col-5">
                                 <label> ബി ) ഭാര്യ </label>
                              </div>
                              <div class="col-1">
                                 <label> :</label>
                              </div>
                              <div class="col-6">
                                 <label>{{ @$formData['wife_panchayath'] }}
                                 </label>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="paper-1">
                        <div class="row">
                           <div class="col-12">
                              <label>5. വിവാഹത്തിനുമുമ്പുള്ള തൊഴിലും മാസ വരുമാനവും </label>
                           </div>
                        </div>
                     </div>
                     <div class="paper-1">
                        <div class="w-100">
                           <div class="row w-100">
                              <div class="col-5">
                                 <label> എ ) ഭർത്താവ് </label><br>
                              </div>
                              <div class="col-1 w-100">
                                 <label> :  
                                 </label>
                              </div>
                              <div class="col-6">
                                 <label>{{ @$formData['hus_work_before_marriage'] }}  / {{ @$formData['hus_income_before_marriage'] }} </label>
                              </div>
                           </div>
                           <div class="row w-100">
                              <div class="col-5">
                                 <label> ബി ) ഭാര്യ </label>
                              </div>
                              <div class="col-1">
                                 <label> :</label>
                              </div>
                              <div class="col-6">
                                 <label>{{ @$formData['wife_work_before_marriage'] }}  / {{ @$formData['wife_income_before_marriage'] }}
                                 </label>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="paper-1">
                        <div class="row">
                           <div class="col-12">
                              <label>6.അപേക്ഷ സമർപ്പിക്കുമ്പോഴത്തെ തൊഴിലും മാസവരമാനവും </label>
                           </div>
                        </div>
                     </div>
                     <div class="paper-1">
                        <div class="w-100">
                           <div class="row w-100">
                              <div class="col-5">
                                 <label> എ ) ഭർത്താവ് </label><br>
                              </div>
                              <div class="col-1 w-100">
                                 <label> :  
                                 </label>
                              </div>
                              <div class="col-6">
                                 <label>{{ @$formData['hus_work_after_marriage'] }}  / {{ @$formData['hus_income_after_marriage'] }} </label>
                              </div>
                           </div>
                           <div class="row w-100">
                              <div class="col-5">
                                 <label> ബി ) ഭാര്യ </label>
                              </div>
                              <div class="col-1">
                                 <label> :</label>
                              </div>
                              <div class="col-6">
                                 <label>{{ @$formData['wife_work_after_marriage'] }}  / {{ @$formData['wife_income_after_marriage'] }}
                                 </label>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="paper-1">
                        <div class="row">
                           <div class="col-12">
                              <label>7. വിവാഹത്തിന്റെ വിശദ വിവരങ്ങൾ<br>എ) വിവാഹ സമയത്തെ പ്രായം</label>
                           </div>
                        </div>
                     </div>
                     <div class="paper-1">
                        <div class="w-100">
                           <div class="row w-100">
                              <div class="col-5">
                                 <label> എ ) ഭർത്താവ് </label><br>
                              </div>
                              <div class="col-1 w-100">
                                 <label> :  
                                 </label>
                              </div>
                              <div class="col-6">
                                 <label>{{ @$formData['husband_age'] }}</label>
                              </div>
                           </div>
                           <div class="row w-100">
                              <div class="col-5">
                                 <label> ബി ) ഭാര്യ </label>
                              </div>
                              <div class="col-1">
                                 <label> :</label>
                              </div>
                              <div class="col-6">
                                 <label>{{ @$formData['wife_age'] }}
                                 </label>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="paper-1">
                        <div class="w-100">
                           <div class="row w-100">
                              <div class="col-5">
                                 <label>ബി) രജിസ്റ്റർ വിവാഹം ആയിരുന്നവാ എങ്കിൽ രെജിസ്ട്രേഷൻ നമ്പറും
                                 <br>തീയതിയും രജിസ്‌ട്രാറാഫീന്റെ പേരും</label><br>
                              </div>
                              <div class="col-1 w-100">
                                 <label> :  
                                 </label>
                              </div>
                              <div class="col-6">
                                 <label>{{ @$formData['register_marriage'] }} - {{ @$formData['register_details'] }}  {{ @$formData['register_date'] }}  {{ @$formData['register_office_name'] }} </label>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="paper-1">
                        <div class="w-100">
                           <div class="row w-100">
                              <div class="col-5">
                                 <label>സി) വിവാഹത്തിന്റെ സാധ്യത 
                                 തെളിയിക്കുന്നതിന് രേഖ ഹാജരാക്കിട്ടുണ്ടാങ്കിൽ അതിന്റെ വിവരം</label><br>
                              </div>
                              <div class="col-1 w-100">
                                 <label> :  
                                 </label>
                              </div>
                              <div class="col-6">
                                 <label> 
                                 @if($formData['marriage_certificate'])
                                 <a href="{{ asset('marriage_certificate/' . @$formData['marriage_certificate']) }}" target="_blank">View</a>
                                 {{-- <iframe src="{{ asset('marriage_certificate/' . @$formData['marriage_certificate']) }}" width="400" height="200"></iframe> --}}
                                 @endif 
                                 </label>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="paper-1">
                        <div class="w-100">
                           <div class="row w-100">
                              <div class="col-5">
                                 <label>8. വിവാഹത്തിനു ശേഷം ദമ്പതികൾ 
                                 ഏതെങ്കിലും കാലയളവിൽ വേർപിരിഞ്ഞു തമാശിച്ചിട്ടുണ്ടോ?
                                 ഉണ്ടങ്കിൽ </label><br>
                              </div>
                              <div class="col-1 w-100">
                                 <label> :  
                                 </label>
                              </div>
                              <div class="col-6">
                                 <label> 
                                 {{ @$formData['apart_for_any_period'] }}
                                 </label>
                              </div>
                           </div>
                        </div>
                     </div>
                     @if(@$formData['apart_for_any_period'] == 'Yes') 
                     <div class="paper-1">
                        <div class="w-100">
                           <div class="row w-100">
                              <div class="col-5">
                                 <label> എ) വേർപിരിഞ്ഞു താമസിച്ച കാലയളവ് </label><br>
                              </div>
                              <div class="col-1 w-100">
                                 <label> :  
                                 </label>
                              </div>
                              <div class="col-6">
                                 <label>{{ @$formData['duration'] }}</label>
                              </div>
                           </div>
                           <div class="row w-100">
                              <div class="col-5">
                                 <label>ബി) വേർപിരിഞ്ഞു താമസിക്കാൻ ഉണ്ടായ<br> കാരണം</label>
                              </div>
                              <div class="col-1">
                                 <label> :</label>
                              </div>
                              <div class="col-6">
                                 <label>{{ @$formData['reason'] }}
                                 </label>
                              </div>
                           </div>
                        </div>
                     </div>
                     @endif
                     <div class="paper-1">
                        <div class="w-100">
                           <div class="row w-100">
                              <div class="col-5">
                                 <label>9. ധനസഹായം ലഭിക്കുന്ന പക്ഷം എന്തു 
                                 കാര്യത്തിനു വേണ്ടി ചെലവഴിക്കാനാണ് 
                                 ഉദ്ദേശിക്കുന്നത് </label><br>
                              </div>
                              <div class="col-1 w-100">
                                 <label> :  
                                 </label>
                              </div>
                              <div class="col-6">
                                 <label> 
                                 {{ @$formData['financial_assistance'] }}
                                 </label>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="paper-1">
                        <div class="w-100">
                           <div class="row w-100">
                              <div class="col-5">
                                 <label>10. പ്രിൻസിപ്പലിൻ്റെ പ്രഖ്യാപനം (ഫയൽ) </label><br>
                              </div>
                              <div class="col-1 w-100">
                                 <label> :  
                                 </label>
                              </div>
                              <div class="col-6">
                                 <label> 
                                 {{ @$formData['difficulties'] }}
                                 </label>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="row mt-5">
                        <div class="col-12">
                           <h1
                              style="text-align: center;color: rgb(0, 0, 0);font-size: medium; text-decoration: underline; padding: 20px;line-height: 32px;font-weight: 600;">
                              അപേക്ഷ സമർപ്പിക്കുന്നത്
                           </h1>
                        </div>
                     </div>
                     <div class="row ">
                        <div class=" col-6 d-flex ">
                           <div class=" d-flex col-12">
                              <div class="col-3">
                                 <label>ജില്ല </label>
                              </div>
                              <div class="col-1">
                                 <label> : </label>
                              </div>
                              <div class="col-8">
                                 <label> {{ @$formData['dist_name'] }} </label>
                              </div>
                           </div>
                        </div>
                        <div class="col-6 d-flex">
                           <div class=" d-flex col-12">
                              <div class="col-3">
                                 <label>TEO</label>
                              </div>
                              <div class="col-1">
                                 <label> : </label>
                              </div>
                              <div class="col-8">
                                 <label> {{ @$formData['teo_name'] }} </label>
                              </div>
                           </div>
                        </div>
                     </div>
                     <br>
                     <div>
                        <p>ശ്രീമാൻ {{ @$formData['husband_name'] }} ശ്രീമതി {{ @$formData['wife_name'] }}
                           എന്നിവരായ ഞങ്ങൾ മുകളിൽ ചേർത്ത എല്ലാ വിവരങ്ങളും സത്യവും ശേരിയുമാണുന്ന
                           ഇതിനാൽ പ്രതിജ്ഞ ചെയ്ത്‌കൊള്ളുന്നു 
                        </p>
                     </div>
                     <div class="text">
                        <div>
                           <label>സ്ഥലം </label>  : {{ @$formData['place'] }}
                        </div>
                        <div>
                           <label> ഭർത്താവിന്റെ ഫോട്ടോ </label> :  @if($formData['husband_photo'])
                           {{-- <iframe src="{{ asset('sign/huband/' . @$formData['husband_photo']) }}" width="400" height="200"></iframe> --}}
                           <img src="{{ asset('sign/huband/' . @$formData['husband_photo']) }}" width="120px" height="60px">
                           @endif
                        </div>
                        <div>
                           <label> ഭർത്താവിന്റെ ഒപ്പ് </label> :  @if($formData['husband_sign'])
                           {{-- <iframe src="{{ asset('sign/huband/' . @$formData['husband_sign']) }}" width="400" height="200"></iframe> --}}
                           <img src="{{ asset('sign/huband/' . @$formData['husband_sign']) }}" width="120px" height="60px">
                           @endif
                        </div>
                     </div>
                     <br>
                     <div class="text">
                        <div>
                           <label>തീയതി </label> :  {{ @$formData['date'] }}
                        </div>
                        <div>
                           <label> ഭാര്യയുടെ ഫോട്ടോ </label> :  @if($formData['wife_photo'])
                           <img src="{{ asset('sign/wife/' . @$formData['wife_photo']) }}" width="120px" height="60px">
                           @endif
                        </div>
                        <div class="text">
                           <div>
                              <label> ഭാര്യയുടെ ഒപ്പ് </label>:  
                              @if($formData['wife_sign'])
                              {{-- <iframe src="{{ asset('sign/wife/' . @$formData['wife_sign']) }}" width="400" height="200"></iframe> --}}
                              <img src="{{ asset('sign/wife/' . @$formData['wife_sign']) }}" width="120px" height="60px">
                              @endif
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="modal fade" id="approve-popup" style="display: none">
                     <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content country-select-modal border-0">
                           <div class="modal-header offcanvas-header">
                              <h6 class="modal-title">Are you sure?</h6>
                              <button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button"><span aria-hidden="true">×</span></button>
                           </div>
                           <div class="modal-body p-5">
                              <div class="text-center">
                                 <h4>Are you sure to Approve this Application?</h4>
                              </div>
                              <form id="ownForm">
                                 @csrf
                                 <div class="text-center">
                                    <h5>Reason for Approved</h5>
                                    <textarea class="form-control" name="approve_reason" id="approve_reason" requred></textarea>
                                    <span id="rejection"></span>
                                 </div>
                                 <input type="hidden" id="requestId" name="requestId" value="" />
                                 <div class="text-center">
                                    <button type="button" onclick="approve()" class="btn btn-primary mt-4 mb-0 me-2">Yes</button>
                                    <button class="btn btn-default mt-4 mb-0" data-bs-dismiss="modal" type="button">No</button>
                                 </div>
                              </form>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="modal fade" id="rejection-popup">
                     <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content country-select-modal border-0">
                           <div class="modal-header offcanvas-header">
                              <h6 class="modal-title">Are you sure to reject this Application?</h6>
                              <button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button"><span aria-hidden="true">×</span></button>
                           </div>
                           <div class="modal-body p-5">
                              <form id="ownForm">
                                 @csrf
                                 <div class="text-center">
                                    <h5>Reason for Rejection</h5>
                                    <textarea class="form-control" name="reason" id="reason" requred></textarea>
                                    <span id="rejection"></span>
                                 </div>
                                 <input type="hidden" id="requestId2" name="requestId2" value="" />
                                 <div class="text-center">
                                    <button type="button" onclick="reject()" class="btn btn-primary mt-4 mb-0 me-2">Yes</button>
                                    <button class="btn btn-default mt-4 mb-0" data-bs-dismiss="modal" type="button">No</button>
                                 </div>
                              </form>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
            <div class="pt-2 card overflow-hidden">
               <div class="card-body">
                  <ul class="timeline-3">
                     <li class="ApproveTimeline">
                        <a href="#!">TEO</a>
                        <a href="#!" class="float-end">@if( @$formData['teo_view_date'] !='')<i class="fa fa-eye"></i>  {{ @$formData['teo_view_date'] }}@endif</a>
                        <br>
                        <p class="inputText badge bg-success" style="font-size: 12px">Approved </p>
                        <p class="mt-2"><span class= "spanclr">TEO  :  </span>{{ @$formData->teo->teo_name }}</p>
                        <p class="mt-2"><span class= "spanclr"> Name : </span>{{ @$formData->teoUser->name }}</p>
                        <p class="mt-2"><span class= "spanclr">District :  </span>{{ @$formData->district->name }}</p>
                        <p  class="mt-2"><span class= "spanclr"> Approved Date :   </span>@if(@$formData['teo_status_date']!=null) {{ \Carbon\Carbon::parse(@$formData['teo_status_date'])->format('d-m-Y h:i a') }}@endif</p>
                        <p  class="mt-2"><span class= "spanclr"> Approved Reason :   </span>{{ @$formData->teo_status_reason}}</p>
                     </li>
                     <li class="ApproveTimeline">
                        <a href="#!">Clerk</a>
                        <a href="#!" class="float-end"><i class="fa fa-eye"></i>  {{ @$formData['clerk_view_date'] }}</a>
                        <br>
                        <p class="inputText badge bg-success" style="font-size: 12px">Approved </p>
                        <p  class="mt-2"><span class= "spanclr"> Clerk Name :   </span>{{ @$formData->clerkUser->name }}</p>
                      
                        <p  class="mt-2"><span class= "spanclr"> Approved Date :   </span>@if(@$formData['clerk_status_date']!=null) {{ \Carbon\Carbon::parse(@$formData['clerk_status_date'])->format('d-m-Y h:i a') }}@endif</p>
                        <p  class="mt-2"><span class= "spanclr"> Approved Reason :   </span>{{ @$formData->clerk_status_reason}}</p>
                     </li>
                     @if( @$formData->assistant_status == null)
                     <li class="pendingTimeline">
                        <a href="#!">{{ auth::user()->name }}</a>
                        <a href="#!" class="float-end"><i class="fa fa-eye"></i>  {{ @$formData['assistant_view_date'] }}</a>
                        <br>
                        <p class="inputText badge bg-warning" style="font-size: 12px">Pending</p>
                        <div class="settings-icon">
                           <a class="approveItem" data-id="{{ @$formData->id }}"><i class="fa fa-check bg-success me-1"></i></a>
                           &nbsp;&nbsp;  <a class="rejectItem" data-id="{{ @$formData->id }}"><i class="fa fa-ban bg-danger "></i></a>
                        </div>
                     </li>
                     @elseif( @$formData->assistant_status == 1)
                     <li class="ApproveTimeline">
                        <a href="#!">{{ auth::user()->name }}</a>
                        <a href="#!" class="float-end"><i class="fa fa-eye"></i>  {{ @$formData['assistant_view_date'] }}</a>
                        <br>
                        <p class="inputText badge bg-success" style="font-size: 12px">Approved </p>
    
                        <p  class="mt-2"><span class= "spanclr"> Approved Date :   </span>@if(@$formData['assistant_status_date']!=null) {{ \Carbon\Carbon::parse(@$formData['assistant_status_date'])->format('d-m-Y h:i a') }}@endif</p>
                        <p  class="mt-2"><span class= "spanclr"> Approved Reason :   </span>{{ @$formData->assistant_status_reason}}</p>
                     </li>
                     @elseif( @$formData->assistant_status == 2)
                     <li class="rejectTimeline">
                        <a href="#!">{{ auth::user()->name }}</a>
                        <a href="#!" class="float-end"><i class="fa fa-eye"></i>  {{ @$formData['assistant_view_date'] }}</a>
                        <br>
                        <p class="inputText badge bg-danger" style="font-size: 12px">Rejected </p>
                        <p  class="mt-2"><span class= "spanclr"> Rejected Date :   </span>@if(@$formData['assistant_status_date']!=null) {{ \Carbon\Carbon::parse(@$formData['assistant_status_date'])->format('d-m-Y h:i a') }}@endif</p>
                        <p  class="mt-2"><span class= "spanclr"> Rejected Reason :   </span>{{ @$formData->assistant_status_reason}}</p>
                     </li>
                     @endif
                  </ul>
                  <!-- /row -->
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<link rel="stylesheet" href="{{ asset('css/timeline.css') }}">
<meta name="csrf_token" content="{{ csrf_token() }}" />
<link rel="stylesheet" href="{{ asset('css/toastr.min.css') }}">
<script src="{{ asset('js/toastr.js') }}"></script>
<script>
   $(document).on("click",".approveItem",function() {
     var id =$(this).attr('data-id');
     $('#requestId').val($(this).attr('data-id') );
     $('#approve-popup').modal('show');
    });
    $(document).on("click",".rejectItem",function() {
   
     var id =$(this).attr('data-id');
     $('#requestId2').val($(this).attr('data-id') );
     $('#rejection-popup').modal('show');
    });
   
    function approve() {
         var reason = $('#approve_reason').val();
         var reqId = $('#requestId').val();
   
         $.ajax({
             url: "{{ route('couplefinancial.assistant.approve') }}",
             type: "POST",
             data: {
                 "id": reqId,
                 "reason": reason,
                 "_token": "{{ csrf_token() }}"
             },
             success: function(response) {
                 toastr.success(response.success, 'Success!')
                 $('#success').show();
                 $('#approve-popup').modal('hide');
                 $('#success_message').fadeIn().html(response.success);
                 setTimeout(function() {
                     $('#success_message').fadeOut("slow");
                 }, 2000);
   
                 setTimeout(function() {
   window.location.reload();
   }, 2000);
   
             }
         });
     }
   
     function reject() {
         var reason = $('#reason').val();
   
         if ($('#reason').val() == "") {
             rejection.innerHTML = "<span style='color: red;'>" + "Please enter the reason for rejection</span>";
         } else {
             rejection.innerHTML = "";
             var reqId = $('#requestId2').val();
             console.log(reqId);
             $.ajax({
   
                 url: "{{ route('couplefinancial.assistant.reject') }}",
                 type: "POST",
                 data: {
                     "id": reqId,
                     "reason": reason,
                     "_token": "{{ csrf_token() }}"
                 },
                 success: function(response) {
                     console.log(response.success);
                     toastr.success(response.success, 'Success!')
                     $('#rejection-popup').modal('hide');
                     $('#success_message').fadeIn().html(response.success);
                     setTimeout(function() {
                         $('#success_message').fadeOut("slow");
                     }, 2000);
   
                     setTimeout(function() {
   window.location.reload();
   }, 2000);
   
                 }
             })
   
         }
     }
   function validateForm() {
     // Check if the required fields are filled
     var husbandSign = document.getElementsByName('husband_sign')[0].value;
     var wifeSign = document.getElementsByName('wife_sign')[0].value;
     var husbandName = document.getElementsByName('husband_name')[0].value;
     var wifeName = document.getElementsByName('wife_name')[0].value;
   
     if (husbandSign === '' || wifeSign === '' || husbandName === '' || wifeName === '') {
         alert('Please fill in all required fields.');
         return false; // Prevent form submission
     }
   
     return true; // Allow form submission
   }
</script>
<script>
   // edit button function
   function goback() {
       if (confirm('Are you sure ? Do you want to edit this form!. ')) {
   
            window.location.href = "{{ url()->previous() }}";
          // window.history.back();
       }
       return
   }
   function printDiv() {
       var printContents = document.getElementById('print_content').innerHTML;
       var originalContents = document.body.innerHTML;
   
       document.body.innerHTML = printContents;
   
       window.print();
   
       document.body.innerHTML = originalContents;
   }
</script>
@endsection