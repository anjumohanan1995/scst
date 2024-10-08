@extends('layouts.app')
@section('content')
<!-- main-content -->
<div class="main-content app-content">
<!-- container -->
<div class="main-container container-fluid">
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between row me-0 ms-0">
   <div class="col-xl-9">
      {{-- 
      <h4 class="content-title mb-2">Registration</h4>
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
         <div class="card overflow-hidden">
            <div class="card-body pd-y-7">
               <div id="btnHide" class="row justify-content-end m-3">
                  <a style="width: 50px" onclick="printDiv()"><img
                     src="{{ asset('admin/uploads/icons/printer.png') }}" alt=""></a>
               </div>
               <div id="print_content">
                  <h1
                     style="text-align: center;color: rgb(0, 0, 0);font-size: medium;  padding: 20px; font-weight: 600;">
                     മിശ്ര വിവാഹം മൂലം ക്ലേശങ്ങൾ അനുഭവിക്കുന്ന പട്ടികവർഗ്ഗ ദമ്പതികൾക്ക് <br>
                     പട്ടികവർഗ്ഗ വികസന വകുപ്പിൽ നിന്നം സാമ്പത്തിക സഹായം<br>
                     അനുവദിക്കുന്നതിനുള്ള അപേക്ഷാഫോം
                  </h1>
                  <h5 style="text-align: right;">
                     Case Number: <span style="color: red;">{{ @$formData['case_id'] }}</span>
                 </h5>
                 
                  <div class="paper-1">
                     <div class="row">
                        <div class="col-12">
                           <h4> അപേക്ഷകന്റെ പേരും പൂർണ്ണ 
                           മേൽ വിലാസവും </h4>
                        </div>
                    
                   
                     <div class="w-100">
                        <div class="row w-100">
                           <div class="col-5">
                              <label> ഭർത്താവ് </label><br>
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
                              <label> ഭാര്യ </label>
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
                  </div> </div>
                  <div class="paper-1">
                     <div class="row">
                        <div class="col-12">
                           <h4>വിവാഹത്തിനുമുമ്പുള്ള പൂർണ്ണ മേൽവിലാസം </h4>
                        </div>
                    
                     <div class="w-100">
                        <div class="row w-100">
                           <div class="col-5">
                              <label> ഭർത്താവ് </label><br>
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
                              <label>  ഭാര്യ </label>
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
                  </div> </div>
                 
                  <div class="paper-1">
                     <div class="row w-100">
                        <div class="col-12">
                           <h4>സമുദായം </h4>
                        </div>
                  
                 
                     <div class="w-100 ">
                        <div class="row w-100">
                           <div class="col-5">
                              <label>  ഭർത്താവ് </label><br>
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
                              <label>  ഭാര്യ </label>
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
               </div>
                  <div class="paper-1">
                     <div class="row">
                        <div class="col-12">
                           <h4> പഞ്ചായത്തിൻ്റെ അല്ലെങ്കിൽ കോ-ഓർപ്പറേഷൻ്റെ പേര്  </h4>
                        </div>
                    
                   
                     <div class="w-100">
                        <div class="row w-100">
                           <div class="col-5">
                              <label> ഭർത്താവ് </label><br>
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
                              <label>  ഭാര്യ </label>
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
                  </div> </div>
                  <div class="paper-1">
                     <div class="row">
                        <div class="col-12">
                           <h4> വിവാഹത്തിനുമുമ്പുള്ള തൊഴിലും മാസ വരുമാനവും </h4>
                        </div>
                     
                  
                     <div class="w-100">
                        <div class="row w-100">
                           <div class="col-5">
                              <label>  ഭർത്താവ് </label><br>
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
                              <label>  ഭാര്യ </label>
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
                  </div></div>
                  <div class="paper-1">
                     <div class="row">
                        <div class="col-12">
                           <h4>അപേക്ഷ സമർപ്പിക്കുമ്പോഴത്തെ തൊഴിലും മാസവരമാനവും </h4>
                        </div>
                    
                  
                     <div class="w-100">
                        <div class="row w-100">
                           <div class="col-5">
                              <label> ഭർത്താവ് </label><br>
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
                              <label>  ഭാര്യ </label>
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
                  </div> </div>
                  <div class="paper-1">
                     <div class="row">
                        <div class="col-12">
                           <h4> വിവാഹത്തിന്റെ വിശദ വിവരങ്ങൾ  വിവാഹ സമയത്തെ പ്രായം</h4>
                        </div>
                     
                  
                     <div class="w-100">
                        <div class="row w-100">
                           <div class="col-5">
                              <label>  ഭർത്താവ് </label><br>
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
                              <label>ഭാര്യ </label>
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
                  </div></div>
                  <div class="paper-1">
                     <div class="w-100">
                        <div class="row w-100">
                           <div class="col-5">
                              <label>രജിസ്റ്റർ വിവാഹം ആയിരുന്നവാ എങ്കിൽ രെജിസ്ട്രേഷൻ നമ്പറും
                              <br>തീയതിയും <br> രജിസ്‌ട്രാറാഫീന്റെ പേരും</label><br>
                           </div>
                           <div class="col-1 w-100">
                              <label> :  
                              </label>
                           </div>
                           <div class="col-6">
                              <label>{{ @$formData['register_marriage'] }} <br> {{ @$formData['register_details'] }} <br> {{ @$formData['register_date'] }}  <br> {{ @$formData['register_office_name'] }} </label>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="paper-1">
                     <div class="w-100">
                        <div class="row w-100">
                           <div class="col-5">
                              <label> വിവാഹത്തിന്റെ സാധ്യത 
                              തെളിയിക്കുന്നതിന് രേഖ ഹാജരാക്കിട്ടുണ്ടാങ്കിൽ അതിന്റെ വിവരം</label><br>
                           </div>
                           <div class="col-1 w-100">
                              <label> :  
                              </label>
                           </div>
                           <div class="col-6">
                              <label> 
                              @if(@$formData['marriage_certificate'])
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
                              <label> വിവാഹത്തിനു ശേഷം ദമ്പതികൾ 
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
                              <h4>  വേർപിരിഞ്ഞു താമസിച്ച കാലയളവ് </h4><br>
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
                              <label>വേർപിരിഞ്ഞു താമസിക്കാൻ ഉണ്ടായ<br> കാരണം</label>
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
                              <label> ധനസഹായം ലഭിക്കുന്ന പക്ഷം എന്തു 
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
                              <label>മിശ്രവിവാഹം മൂലം ദമ്പതികൾക്ക്
                              അനുഭവിക്കേണ്ടി വന്നിട്ടുള്ള കഷ്ടതകളം
                              പ്രയാസങ്ങളം എന്തെല്ലാം </label><br>
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
                     <p>ശ്രീമാൻ{{ @$formData['husband_name'] }} ശ്രീമതി {{ @$formData['wife_name'] }}
                        എന്നിവരായ ഞങ്ങൾ മുകളിൽ ചേർത്ത എല്ലാ വിവരങ്ങളും സത്യവും ശേരിയുമാണുന്ന
                        ഇതിനാൽ പ്രതിജ്ഞ ചെയ്ത്‌കൊള്ളുന്നു 
                     </p>
                  </div>
                  <div class="text">
                     <div>
                        <label>സ്ഥലം </label>  : {{ @$formData['place'] }}
                     </div>
                     <div>
                        <label> ഭർത്താവിന്റെ ഫോട്ടോ </label> :  @if(@$formData['husband_photo'])
                        {{-- <iframe src="{{ asset('sign/huband/' . @$formData['husband_photo']) }}" width="400" height="200"></iframe> --}}
                        <img src="{{ asset('sign/huband/' . @$formData['husband_photo']) }}" width="120px" height="60px">
                        @endif
                     </div>
                     <div>
                        <label> ഭർത്താവിന്റെ ഒപ്പ് </label> :  @if(@$formData['husband_sign'])
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
                        <label> ഭാര്യയുടെ ഫോട്ടോ </label> :  @if(@$formData['wife_photo'])
                        <img src="{{ asset('sign/wife/' . @$formData['wife_photo']) }}" width="120px" height="60px">
                        @endif
                     </div>
                     <div class="text">
                        <div>
                           <label> ഭാര്യയുടെ ഒപ്പ് </label>:  
                           @if(@$formData['wife_sign'])
                           {{-- <iframe src="{{ asset('sign/wife/' . @$formData['wife_sign']) }}" width="400" height="200"></iframe> --}}
                           <img src="{{ asset('sign/wife/' . @$formData['wife_sign']) }}" width="120px" height="60px">
                           @endif
                        </div>
                     </div>
                  </div>
               </div><br>
               <div class="row">
                  <div class="col-md-4 mb-4">
                  <div class="col-md-6 mb-6">
                   <a href="{{ route('userCoupleFinanceList') }}">  <input type="button" class="btn btn-primary" value="Back >>" >
                   </a>  </div>
                   </div><br>
               </div>
               {{-- 
               <form action="{{ url('financialHelpStoreDetails') }}" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
                  @csrf
                  <div class="row">
                     <div class="col-md-3">
                        <input type="hidden" name="formData" value="{{ json_encode(@$formData) }}">
                        <button type="submit" class="btn-block btn btn-success" onclick="return confirm('Do you want to continue?')">Submit</button>
                     </div>
                     <div class="col-md-3">
                        <div class="btn_wrapper">
                           <a href="javascript:void(0)" class="btn btn-primary w-100" onclick="goback()">Edit</a>
                        </div>
                     </div>
                  </div>
               </form>
               --}}
            </div>
         </div>
      </div>

      @if( Auth::user()->role == 'User') 
      <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
          <div class="pt-2 card overflow-hidden">                            
             <div class="card-body">
      
               @if( @$formData->return_status == 1)
               @php
               $role = DB::table('users')->where('_id', @$formData->return_userid)->value('role');
              
           @endphp
               <p class="inputText badge bg-danger" style="font-size: 12px">Returned Application - by {{ @$formData->returnUser->name }} ({{ @$role }})</p>
                  <ul class="timeline-3"> 
                     @if( @$formData->teo_return == null)
                     <li class="ApproveTimeline">
                        <a href="#!">TEO</a>
                        <a href="#!" class="float-end"><i class="fa fa-eye"></i>  {{ @$formData['teo_return_view_date'] }}</a>
                        <br>
                        <p class="inputText badge bg-success" style="font-size: 12px">Approved </p>
                   
                        <p  class="mt-2"><span class= "spanclr"> Approved Date :   </span>@if(@$formData['teo_status_date']!=null) {{ \Carbon\Carbon::parse(@$formData['teo_status_date'])->format('d-m-Y h:i a') }}@endif</p>
                      
                     </li>
                     @if(@$formData->teo_return == null)
                     @if( @$formData->clerk_return == null)
                     <li class="ApproveTimeline">
                        <a href="#!">Clerk</a>
                        <a href="#!" class="float-end"><i class="fa fa-eye"></i>  {{ @$formData['clerk_return_view_date'] }}</a>
                        <p></p>
                        <p class="inputText badge bg-success" style="font-size: 12px">Approved </p>
                        <p  class="mt-2"><span class= "spanclr"> Name :   </span>{{ @$formData->clerkUser->name }}</p>
                       
                        <p  class="mt-2"><span class= "spanclr"> Approved Date :   </span>@if(@$formData['clerk_status_date']!=null) {{ \Carbon\Carbon::parse(@$formData['clerk_status_date'])->format('d-m-Y h:i a') }}@endif</p>
                        <p  class="mt-2"><span class= "spanclr"> Approved Reason :   </span>{{ @$formData->clerk_status_reason}}</p>
                     </li>
      
                     @elseif( @$formData->clerk_return == 1)
                     <li class="ApproveTimeline">
                        <a href="#!">Clerk</a>
                        <p></p>
                        <p class="inputText badge bg-warning" style="font-size: 12px">Pending </p>
                       
                     </li>
      
                     @endif
                     @endif
      
                      @if(@$formData->clerk_return == null)
                     @if( @$formData->JsSeo_return == null)
                     <li class="ApproveTimeline">
                        <a href="#!">JS/ SEO</a>
                        <a href="#!" class="float-end"><i class="fa fa-eye"></i>  {{ @$formData['JsSeo_return_view_date'] }}</a>
                        <p></p>
                        <p class="inputText badge bg-success" style="font-size: 12px">Approved </p>
                        <p  class="mt-2"><span class= "spanclr"> Name :   </span>{{ @$formData->JsSeoUser->name }}</p>
                       
                        <p  class="mt-2"><span class= "spanclr"> Approved Date :   </span>@if(@$formData['JsSeo_status_date']!=null) {{ \Carbon\Carbon::parse(@$formData['JsSeo_status_date'])->format('d-m-Y h:i a') }}@endif</p>
                        <p  class="mt-2"><span class= "spanclr"> Approved Reason :   </span>{{ @$formData->JsSeo_status_reason}}</p>
                     </li>
      
                     @elseif( @$formData->JsSeo_return == 1)
                     <li class="ApproveTimeline">
                        <a href="#!">JS/ SEO</a>
                        <p></p>
                        <p class="inputText badge bg-warning" style="font-size: 12px">Pending </p>
                       
                     </li>
      
                     @endif
                     @endif 
      
                     @if(@$formData->JsSeo_return == null)
                     @if( @$formData->assistant_return == null)
                     <li class="ApproveTimeline">
                        <a href="#!">APO/ ATDO</a>
                        <a href="#!" class="float-end"><i class="fa fa-eye"></i>  {{ @$formData['assistant_return_view_date'] }}</a>
                        <p></p>
                        <p class="inputText badge bg-success" style="font-size: 12px">Approved </p>
                        <p  class="mt-2"><span class= "spanclr"> Name :   </span>{{ @$formData->JsSeoUser->name }}</p>
                       
                        <p  class="mt-2"><span class= "spanclr"> Approved Date :   </span>@if(@$formData['assistant_status_date']!=null) {{ \Carbon\Carbon::parse(@$formData['assistant_status_date'])->format('d-m-Y h:i a') }}@endif</p>
                        <p  class="mt-2"><span class= "spanclr"> Approved Reason :   </span>{{ @$formData->assistant_status_reason}}</p>
                     </li>
      
                     @elseif( @$formData->assistant_return == 1)
                     <li class="ApproveTimeline">
                        <a href="#!">APO/ ATDO</a>
                        <p></p>
                        <p class="inputText badge bg-warning" style="font-size: 12px">Pending </p>
                       
                     </li>
      
                     @endif
                     @endif 

                     @if(@$formData->rejection_status  == 1)
                     <li class="rejectTimeline">
                        <a href="#!">PO / TDO</a>
                        <a href="#!" class="float-end"><i class="fa fa-eye"></i>  {{ @$formData['officer_return_view_date'] }}</a>
                        <p></p>
                        <p class="inputText badge bg-danger" style="font-size: 12px">Rejected </p>
                        <p  class="mt-2"><span class= "spanclr"> Name :   </span>{{ @$formData->officerUser->name }}</p>
                        
                        <p  class="mt-2"><span class= "spanclr"> Rejection Date :   </span>@if(@$formData['officer_status_date']!=null) {{ \Carbon\Carbon::parse(@$formData['officer_status_date'])->format('d-m-Y h:i a') }}@endif</p>
                        <p  class="mt-2"><span class= "spanclr"> Rejection Reason :   </span>{{ @$formData->officer_status_reason}}</p>
                     </li>
                     @else
      
                     @if(@$formData->assistant_return == null)
                     @if( @$formData->officer_return == null)
                     <li class="ApproveTimeline">
                        <a href="#!">PO/ TDO</a>
                        <a href="#!" class="float-end"><i class="fa fa-eye"></i>  {{ @$formData['officer_return_view_date'] }}</a>
                        <p></p>
                        <p class="inputText badge bg-success" style="font-size: 12px">Approved </p>
                        <p  class="mt-2"><span class= "spanclr"> Name :   </span>{{ @$formData->JsSeoUser->name }}</p>
                       
                        <p  class="mt-2"><span class= "spanclr"> Approved Date :   </span>@if(@$formData['officer_status_date']!=null) {{ \Carbon\Carbon::parse(@$formData['JsSeo_status_date'])->format('d-m-Y h:i a') }}@endif</p>
                        <p  class="mt-2"><span class= "spanclr"> Approved Reason :   </span>{{ @$formData->officer_status_reason}}</p>
                     </li>

      
                     @elseif( @$formData->officer_return == 1)
                     <li class="ApproveTimeline">
                        <a href="#!">PO/ TDO</a>
                        <p></p>
                        <p class="inputText badge bg-warning" style="font-size: 12px">Pending </p>
                        {{-- <div class="settings-icon">
                           <a class="approveItem" data-id="{{ @$formData->id }}"><i class="fa fa-check bg-success me-1"></i></a>
                           &nbsp;&nbsp;<a class="rejectItem" data-id="{{ @$formData->id }}"><i class="fa fa-ban bg-danger "></i></a>
                           &nbsp;&nbsp;<a class="remove" data-id="{{ @$formData->id }}"><i class="fa fa-times bg-danger "></i></a>
                           
                        </div> --}}
                       
                     </li>
      
                     @endif
                     @endif 
                     @endif
                     @endif
                  </ul>
              @else

               <ul class="timeline-3"> 
                  @if(@$formData->teo_rejection_status == 1)
                  <li class="rejectTimeline">
                      <a href="#!">TEO</a>
                      <a href="#!" class="float-end"><i class="fa fa-eye"></i>
                          {{ @$formData['teo_view_date'] }}</a>
                      <br>
                      <p class="inputText badge bg-danger" style="font-size: 12px">Rejected
                      </p>

                      <p class="mt-2"><span class= "spanclr"> Rejected Date : </span>
                          @if (@$formData['teo_status_date'] != null)
                              {{ \Carbon\Carbon::parse(@$formData['teo_status_date'])->format('d-m-Y h:i a') }}
                          @endif
                      </p>
                      <p class="mt-2"><span class= "spanclr"> Rejected Reason :
                          </span>{{ @$formData->teo_status_reason }}</p>

                  </li>                                   
             
                   @elseif( @$formData->teo_status == null)
      
                   <li class="pendingTimeline">
                    <a href="#!">TEO</a>
                    <a href="#!" class="float-end"><i class="fa fa-eye"></i>  {{ @$formData['teo_view_date'] }}</a>
                    <br>       
                    <p class="inputText badge bg-warning" style="font-size: 12px">Pending</p>
                           {{-- <div class="settings-icon">
                               <a class="approveItem" data-id="{{ @$formData->id }}"><i class="fa fa-check bg-success me-1"></i></a>
                               &nbsp;&nbsp;  <a class="rejectItem" data-id="{{ @$formData->id }}"><i class="fa fa-ban bg-danger "></i></a>
                            </div>
                           --}}
                       </li>
                     
                       @elseif( @$formData->teo_status == 1)
      
                       <li class="ApproveTimeline">
                        <a href="#!">TEO</a>
                        <a href="#!" class="float-end"><i class="fa fa-eye"></i>  {{ @$formData['teo_view_date'] }}</a>
                        <br>
                        <p class="inputText badge bg-success" style="font-size: 12px">Approved </p>
                   
                        <p  class="mt-2"><span class= "spanclr"> Approved Date :   </span>@if(@$formData['teo_status_date']!=null) {{ \Carbon\Carbon::parse(@$formData['teo_status_date'])->format('d-m-Y h:i a') }}@endif</p>
                        <p  class="mt-2"><span class= "spanclr"> Approved Reason :   </span>{{ @$formData->teo_status_reason}}</p>
                      
                           </li>
                           @elseif( @$formData->teo_status == 2)
      
                           <li class="rejectTimeline">
                            <a href="#!">TEO</a>
                            <a href="#!" class="float-end"><i class="fa fa-eye"></i>  {{ @$formData['teo_view_date'] }}</a>
                            <br>
                            <p class="inputText badge bg-danger" style="font-size: 12px">Returned </p>
                       
                            <p  class="mt-2"><span class= "spanclr"> Returned Date :   </span>@if(@$formData['teo_status_date']!=null) {{ \Carbon\Carbon::parse(@$formData['teo_status_date'])->format('d-m-Y h:i a') }}@endif</p>
                            <p  class="mt-2"><span class= "spanclr"> Returned Reason :   </span>{{ @$formData->teo_status_reason}}</p>
                          
                               </li>
                           @endif
                           @if(@$formData->teo_status == 1)
                           @if( @$formData->clerk_status == 1)
          
                           <li class="ApproveTimeline">
                             <a href="#!">Clerk</a>
                             <a href="#!" class="float-end"><i class="fa fa-eye"></i>  {{ @$formData['clerk_view_date'] }}</a>
                             <p></p>
                             <p class="inputText badge bg-success" style="font-size: 12px">Approved </p>
                             <p  class="mt-2"><span class= "spanclr"> Name :   </span>{{ @$formData->clerkUser->name }}</p>
                            
                             <p  class="mt-2"><span class= "spanclr"> Approved Date :   </span>@if(@$formData['clerk_status_date']!=null) {{ \Carbon\Carbon::parse(@$formData['clerk_status_date'])->format('d-m-Y h:i a') }}@endif</p>
                             <p  class="mt-2"><span class= "spanclr"> Approved Reason :   </span>{{ @$formData->clerk_status_reason}}</p>
                          </li>
                          @elseif( @$formData->clerk_status == 2)
          
                          <li class="rejectTimeline">
                            <a href="#!">Clerk</a>
                            <a href="#!" class="float-end"><i class="fa fa-eye"></i>  {{ @$formData['clerk_view_date'] }}</a>
                            <p></p>
                            <p class="inputText badge bg-danger" style="font-size: 12px">Returned </p>
                            <p  class="mt-2"><span class= "spanclr"> Name :   </span>{{ @$formData->clerkUser->name }}</p>
                            
                            <p  class="mt-2"><span class= "spanclr"> Returned Date :   </span>@if(@$formData['clerk_status_date']!=null) {{ \Carbon\Carbon::parse(@$formData['clerk_status_date'])->format('d-m-Y h:i a') }}@endif</p>
                            <p  class="mt-2"><span class= "spanclr"> Returned Reason :   </span>{{ @$formData->clerk_status_reason}}</p>
                         </li>
                         @elseif( @$formData->clerk_status == null)
          
                         <li class="pendingTimeline">
                           <a href="#!">Clerk</a>
                           <a href="#!" class="float-end"><i class="fa fa-eye"></i>  {{ @$formData['clerk_view_date'] }}</a>
                          <p></p>
                           <p class="inputText badge bg-warning" style="font-size: 12px">Pending </p>
                           {{-- <div class="settings-icon">
                              <a class="approveItem" data-id="{{ @$formData->id }}"><i class="fa fa-check bg-success me-1"></i></a>
                              &nbsp;&nbsp;  <a class="rejectItem" data-id="{{ @$formData->id }}"><i class="fa fa-ban bg-danger "></i></a>
                           </div>
                          --}}
                            </li>
                            @endif
                            @endif
                            @if(@$formData->clerk_status == 1)
                         
                            @if( @$formData->JsSeo_status == 1)
           
                            <li class="ApproveTimeline">
                              <a href="#!">JS/ SEO</a>
                              <a href="#!" class="float-end"><i class="fa fa-eye"></i>  {{ @$formData['JsSeo_view_date'] }}</a>
                              <p></p>
                              <p class="inputText badge bg-success" style="font-size: 12px">Approved </p>
                              <p  class="mt-2"><span class= "spanclr"> Name :   </span>{{ @$formData->assistantUser->name }}</p>
                             
                              <p  class="mt-2"><span class= "spanclr"> Approved Date :   </span>@if(@$formData['JsSeo_status_date']!=null) {{ \Carbon\Carbon::parse(@$formData['JsSeo_status_date'])->format('d-m-Y h:i a') }}@endif</p>
                              <p  class="mt-2"><span class= "spanclr"> Approved Reason :   </span>{{ @$formData->JsSeo_status_reason}}</p>
                           </li>
                           @elseif( @$formData->JsSeo_status == 2)
           
                           <li class="rejectTimeline">
                             <a href="#!">JS/ SEO</a>
                             <a href="#!" class="float-end"><i class="fa fa-eye"></i>  {{ @$formData['JsSeo_view_date'] }}</a>
                             <p></p>
                             <p class="inputText badge bg-danger" style="font-size: 12px">Returned </p>
                             <p  class="mt-2"><span class= "spanclr"> Name :   </span>{{ @$formData->JsSeoUser->name }}</p>
                             
                             <p  class="mt-2"><span class= "spanclr"> Returned Date :   </span>@if(@$formData['JsSeo_status_date']!=null) {{ \Carbon\Carbon::parse(@$formData['JsSeo_status_date'])->format('d-m-Y h:i a') }}@endif</p>
                             <p  class="mt-2"><span class= "spanclr"> Returned Reason :   </span>{{ @$formData->JsSeo_status_reason}}</p>
                          </li>
                          @elseif( @$formData->JsSeo_status == null)
           
                          <li class="pendingTimeline">
                            <a href="#!">JS/ SEO</a>
                            <a href="#!" class="float-end"><i class="fa fa-eye"></i>  {{ @$formData['JsSeo_view_date'] }}</a>
                           <p></p>
                            <p class="inputText badge bg-warning" style="font-size: 12px">Pending </p>
                            {{-- <div class="settings-icon">
                              <a class="approveItem" data-id="{{ @$formData->id }}"><i class="fa fa-check bg-success me-1"></i></a>
                              &nbsp;&nbsp;  <a class="rejectItem" data-id="{{ @$formData->id }}"><i class="fa fa-ban bg-danger "></i></a>
                           </div> --}}
                         
                             </li>
                            
                             @endif
                             @endif
      
                           @if(@$formData->JsSeo_status == 1)     
                           @if( @$formData->assistant_status == 1)
          
                           <li class="ApproveTimeline">
                             <a href="#!">APO / ATDO</a>
                             <a href="#!" class="float-end"><i class="fa fa-eye"></i>  {{ @$formData['assistant_view_date'] }}</a>
                             <p></p>
                             <p class="inputText badge bg-success" style="font-size: 12px">Approved </p>
                             <p  class="mt-2"><span class= "spanclr"> Name :   </span>{{ @$formData->assistantUser->name }}</p>
                            
                             <p  class="mt-2"><span class= "spanclr"> Approved Date :   </span>@if(@$formData['assistant_status_date']!=null) {{ \Carbon\Carbon::parse(@$formData['assistant_status_date'])->format('d-m-Y h:i a') }}@endif</p>
                             <p  class="mt-2"><span class= "spanclr"> Approved Reason :   </span>{{ @$formData->assistant_status_reason}}</p>
                          </li>
                          @elseif( @$formData->assistant_status == 2)
          
                          <li class="rejectTimeline">
                            <a href="#!">APO / ATDO</a>
                            <a href="#!" class="float-end"><i class="fa fa-eye"></i>  {{ @$formData['assistant_view_date'] }}</a>
                            <p></p>
                            <p class="inputText badge bg-danger" style="font-size: 12px">Returned </p>
                            <p  class="mt-2"><span class= "spanclr"> Name :   </span>{{ @$formData->assistantUser->name }}</p>
                            
                            <p  class="mt-2"><span class= "spanclr"> Returned Date :   </span>@if(@$formData['assistant_status_date']!=null) {{ \Carbon\Carbon::parse(@$formData['assistant_status_date'])->format('d-m-Y h:i a') }}@endif</p>
                            <p  class="mt-2"><span class= "spanclr"> Returned Reason :   </span>{{ @$formData->assistant_status_reason}}</p>
                         </li>
                         
                         @elseif( @$formData->assistant_status == null)
          
                         <li class="pendingTimeline">
                           <a href="#!">APO / ATDO</a>
                           <a href="#!" class="float-end"><i class="fa fa-eye"></i>  {{ @$formData['assistant_view_date'] }}</a>
                          <p></p>
                           <p class="inputText badge bg-warning" style="font-size: 12px">Pending </p>
                           {{-- <div class="settings-icon">
                              <a class="approveItem" data-id="{{ @$formData->id }}"><i class="fa fa-check bg-success me-1"></i></a>
                              &nbsp;&nbsp;  <a class="rejectItem" data-id="{{ @$formData->id }}"><i class="fa fa-ban bg-danger "></i></a>
                           </div> --}}
                            </li>
                     
                            @endif
                            @endif

                            @if(@$formData->rejection_status  == 1)
                            <li class="rejectTimeline">
                               <a href="#!">PO / TDO</a>
                               <a href="#!" class="float-end"><i class="fa fa-eye"></i>  {{ @$formData['officer_view_date'] }}</a>
                               <p></p>
                               <p class="inputText badge bg-danger" style="font-size: 12px">Rejected </p>
                               <p  class="mt-2"><span class= "spanclr"> Name :   </span>{{ @$formData->officerUser->name }}</p>
                               
                               <p  class="mt-2"><span class= "spanclr"> Rejection Date :   </span>@if(@$formData['officer_status_date']!=null) {{ \Carbon\Carbon::parse(@$formData['officer_status_date'])->format('d-m-Y h:i a') }}@endif</p>
                               <p  class="mt-2"><span class= "spanclr"> Rejection Reason :   </span>{{ @$formData->officer_status_reason}}</p>
                            </li>
                            @else

                            @if(@$formData->assistant_status == 1)                    
                            @if( @$formData->officer_status == 1)
           
                            <li class="ApproveTimeline">
                              <a href="#!">PO / TDO</a>
                              <a href="#!" class="float-end"><i class="fa fa-eye"></i>  {{ @$formData['officer_view_date'] }}</a>
                              <p></p>
                              <p class="inputText badge bg-success" style="font-size: 12px">Approved </p>
                              <p  class="mt-2"><span class= "spanclr"> Name :   </span>{{ @$formData->officerUser->name }}</p>
                             
                              <p  class="mt-2"><span class= "spanclr"> Approved Date :   </span>@if(@$formData['officer_status_date']!=null) {{ \Carbon\Carbon::parse(@$formData['officer_status_date'])->format('d-m-Y h:i a') }}@endif</p>
                              <p  class="mt-2"><span class= "spanclr"> Approved Reason :   </span>{{ @$formData->officer_status_reason}}</p>
                           </li>
                           @elseif( @$formData->officer_status == 2)
           
                           <li class="rejectTimeline">
                             <a href="#!">PO / TDO</a>
                             <a href="#!" class="float-end"><i class="fa fa-eye"></i>  {{ @$formData['officer_view_date'] }}</a>
                             <p></p>
                             <p class="inputText badge bg-danger" style="font-size: 12px">Returned </p>
                             <p  class="mt-2"><span class= "spanclr"> Name :   </span>{{ @$formData->officerUser->name }}</p>
                             
                             <p  class="mt-2"><span class= "spanclr"> Returned Date :   </span>@if(@$formData['officer_status_date']!=null) {{ \Carbon\Carbon::parse(@$formData['officer_status_date'])->format('d-m-Y h:i a') }}@endif</p>
                             <p  class="mt-2"><span class= "spanclr"> Returned Reason :   </span>{{ @$formData->officer_status_reason}}</p>
                          </li>

                          @elseif( @$formData->officer_status == null)
           
                          <li class="pendingTimeline">
                            <a href="#!">PO / TDO</a>
                            <a href="#!" class="float-end"><i class="fa fa-eye"></i>  {{ @$formData['officer_view_date'] }}</a>
                           <p></p>
                            <p class="inputText badge bg-warning" style="font-size: 12px">Pending </p>
                            {{-- <div class="settings-icon">
                              <a class="approveItem" data-id="{{ @$formData->id }}"><i class="fa fa-check bg-success me-1"></i></a>
                              &nbsp;&nbsp;<a class="rejectItem" data-id="{{ @$formData->id }}"><i class="fa fa-ban bg-danger "></i></a>
                              &nbsp;&nbsp;<a class="remove" data-id="{{ @$formData->id }}"><i class="fa fa-times bg-danger "></i></a>
                              
                           </div> --}}
                             </li>
                             @endif
                             @endif
                             @endif
               </ul>  
               @endif
           </div>
       </div>
      </div>
      
      @endif

   </div>
</div>
<link rel="stylesheet" href="{{ asset('css/timeline.css') }}">
<script>
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
       if (confirm('Are you sure? Do you want to edit this form?')) {
           window.location.href = "{{ url()->previous() }}";
           //window.history.back();
          
       }
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