@extends('layouts.app')
@section('content')
    <!-- main-content -->
    <div class="main-content app-content">
        <!-- container -->
        <div class="main-container container-fluid">
            <!-- breadcrumb -->
            <div class="breadcrumb-header justify-content-between row me-0 ms-0">
                <div class="col-xl-9">
                    {{-- <h4 class="content-title mb-2">Registration</h4> --}}
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
                        <div class="card overflow-hidden" style="width: 113%;">
                            <div class="card-body pd-y-7">

                                <h1
                                    style="text-align: center;color: rgb(0, 0, 0);font-size: medium;  padding: 20px;line-height: 32px;font-weight: 600;">
                                    മിശ്ര വിവാഹം മൂലം ക്ലേശങ്ങൾ അനുഭവിക്കുന്ന പട്ടികവർഗ്ഗ ദമ്പതികൾക്ക് <br>
                                    പട്ടികവർഗ്ഗ വികസന വകുപ്പിൽ നിന്നം സാമ്പത്തിക സഹായം<br>
                                    അനുവദിക്കുന്നതിനുള്ള അപേക്ഷാഫോം

                                </h1>


                                

                                    <div class="paper-1">
                                        <div class="row w-100 ">
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
                                    </div>
                                    </div>

                                    <div class="paper-1">
                                        <div class="row w-100 ">
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
                                    </div>
                                    </div>



                                    <div class="paper-1">
                                        <div class="row w-100 ">
                                            <div class="col-12">
                                                <h4>സമുദായം </h4>
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
                                                    <label> {{ @$formData['husband_caste'] }}</label>

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
                                                    <label>{{ @$formData['wife_caste'] }}
                                                    
                                                    </label>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    </div>


                                    <div class="paper-1">
                                        <div class="row  w-100">
                                            <div class="col-12">
                                                <h4> പഞ്ചായത്തിൻ്റെ അല്ലെങ്കിൽ കോ-ഓർപ്പറേഷൻ്റെ പേര്  </h4>
                                            </div>

                                
                                      
                                    
                                       
                                            <div class="row w-100">
                                                <div class="col-5">

                                                    <label>  ഭർത്താവ് </label><br>

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
                                                    <label> ഭാര്യ </label>
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
                                        <div class="row w-100">
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

                                    </div> </div>



                                     <div class="paper-1">
                                        <div class="row w-100">
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

                                    </div>    </div>

                                    <div class="paper-1">
                                        <div class="row w-100">
                                            <div class="col-12">
                                                <h4>വിവാഹത്തിന്റെ വിശദ വിവരങ്ങൾ വിവാഹ സമയത്തെ പ്രായം</h4>
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
                                                    <label>  ഭാര്യ </label>
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
                                </div>

                                     

                                    <div class="paper-1">
                                        <div class="w-100 row">
                                            <div class="row w-100">
                                                <div class="col-5">

                                                    <label> രജിസ്റ്റർ വിവാഹം ആയിരുന്നവാ എങ്കിൽ രെജിസ്ട്രേഷൻ നമ്പറും
                                                <br>തീയതിയും <br> രജിസ്‌ട്രാറാഫീന്റെ പേരും</label><br>

                                                </div>


                                                <div class="col-1 w-100">
                                                    <label> :  
                                                    
                                                    </label>

                                                </div>

                                                <div class="col-6">
                                                    <label>{{ @$formData['register_marriage'] }} <br> {{ @$formData['register_details'] }} <br>  {{ @$formData['register_date'] }} <br>  {{ @$formData['register_office_name'] }} </label>

                                                </div>
                                            </div>
                                            

                                        </div>

                                    </div>

                                    <div class="paper-1">
                                        <div class="w-100 row">
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
                                        <div class="w-100 row">
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
                                            <div class="w-100 row">
                                                <div class="row w-100">
                                                    <div class="col-5">

                                                        <label>  വേർപിരിഞ്ഞു താമസിച്ച കാലയളവ് </label><br>

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
                                        <div class="w-100 row">
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
                                        <div class="w-100 row">
                                            <div class="row w-100">
                                                <div class="col-5">

                                                    <label> മിശ്രവിവാഹം മൂലം ദമ്പതികൾക്ക്
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

                                    <div class="paper-1">
                                        <div class="w-100 row">
                                            <!-- Bank Name -->
                                            <div class="row w-100">
                                                <div class="col-5">
                                                    <label>Bank Name</label><br>
                                                </div>
                                                <div class="col-1 w-100">
                                                    <label>: </label>
                                                </div>
                                                <div class="col-6">
                                                    <label>{{ $formData['bank_name'] }}</label>
                                                </div>
                                            </div>
                                    
                                            <!-- Account Number -->
                                            <div class="row w-100">
                                                <div class="col-5">
                                                    <label>Account Number</label><br>
                                                </div>
                                                <div class="col-1 w-100">
                                                    <label>: </label>
                                                </div>
                                                <div class="col-6">
                                                    <label>{{ $formData['account_no'] }}</label>
                                                </div>
                                            </div>
                                    
                                            <!-- IFSC Code -->
                                            <div class="row w-100">
                                                <div class="col-5">
                                                    <label>IFSC Code</label><br>
                                                </div>
                                                <div class="col-1 w-100">
                                                    <label>: </label>
                                                </div>
                                                <div class="col-6">
                                                    <label>{{ $formData['ifsc_code'] }}</label>
                                                </div>
                                            </div>
                                    
                                            <!-- Passbook -->
                                            @if($formData['passbook'])
                                            <div class="row w-100">
                                                <div class="col-5">
                                                    <label>Passbook</label><br>
                                                </div>
                                                <div class="col-1 w-100">
                                                    <label>: </label>
                                                </div>
                                                <div class="col-6">
                                                    <label><a href="{{ asset('passbooks/' . $formData['passbook']) }}" target="_blank">View Passbook</a></label>
                                                </div>
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                    
                                    {{-- <div class="paper-1">
                                        <div class="w-100">
                                            <div class="row w-100">
                                                <div class="col-5">

                                                    <label>10. ജില്ല </label><br>

                                                </div>


                                                <div class="col-1 w-100">
                                                    <label> :  
                                                    
                                                    </label>

                                                </div>

                                                <div class="col-6">
                                                    <label> 
                                                      {{ @$formData['dist_name'] }}
                                                    </label>

                                                </div>
                                            </div>
                                            

                                        </div>

                                    </div>

                                     <div class="paper-1">
                                        <div class="w-100">
                                            <div class="row w-100">
                                                <div class="col-5">

                                                    <label>11.ടി.ഇ.ഒ</label><br>

                                                </div>


                                                <div class="col-1 w-100">
                                                    <label> :  
                                                    
                                                    </label>

                                                </div>

                                                <div class="col-6">
                                                    <label> 
                                                      {{ @$formData['teo_name'] }}
                                                    </label>

                                                </div>
                                            </div>
                                            

                                        </div>

                                    </div>
                                    --}}
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
                                        </div><br>




                                   
                                    <div>
                                        <p>ശ്രീമാൻ{{ @$formData['husband_name'] }} ശ്രീമതി {{ @$formData['wife_name'] }}
                                            എന്നിവരായ ഞങ്ങൾ മുകളിൽ ചേർത്ത എല്ലാ വിവരങ്ങളും സത്യവും ശേരിയുമാണുന്ന
                                            ഇതിനാൽ പ്രതിജ്ഞ ചെയ്ത്‌കൊള്ളുന്നു </p>
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

                                            <label>തീയതി </label> : {{ date("d-m-Y") }}




                                        </div>

                                        <div>
                                            <label> ഭാര്യയുടെ ഫോട്ടോ </label> :  @if($formData['wife_photo'])
                                            <img src="{{ asset('sign/wife/' . @$formData['wife_photo']) }}" width="120px" height="60px">
                                            @endif
                                        </div>


                                      

                                            <div>
                                                <label> ഭാര്യയുടെ ഒപ്പ് </label>:  
                                                @if($formData['wife_sign'])
                                                    <img src="{{ asset('sign/wife/' . @$formData['wife_sign']) }}" width="120px" height="60px">
                                                @endif
                                            </div>


                                        </div>



                               


                            </div><br>
                            <form action="{{ url('financialHelpStoreDetails') }}" method="POST" enctype="multipart/form-data" >
                                    @csrf
                                   
                                    <br> <br>
                                    <div class="row justify-content-center">
                                        <div class="col-md-3">
                                            <input type="hidden" name="formData" value="{{ json_encode($formData) }}">
                                            <button type="submit" class="btn-block btn btn-danger" onclick="return confirm('Do you want to continue?')">Submit</button>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="btn_wrapper">
                                                <a href="javascript:void(0)" class="btn btn-primary w-100" onclick="goback()">Edit</a>
                                            </div>
                                        </div>
                                    </div>
                            </form> 
                            <br> <br>
                            {{-- <div class="bottom">
                                <p>മേൽപ്പറഞ്ഞ കാര്യങ്ങളെപ്പറ്റി അനേഷിച്ചതിൽ അവ സത്യമണ്ണുന്നും ഈ വ്യക്തികൾ
                                    <br>ബുദ്ധിമുട്ടനുഭവിക്കുന്നവരാണെന്നും ബോദ്ധ്യപ്പെട്ടിരിക്കുന്നതായി ഞാൻ
                                    സാക്ഷ്യപ്പെടുത്തുന്നു
                                </p>
                            </div>
                        </div>
                        <p class="end">ട്രൈബൽ ടെവേലോപ്മെന്റ് ഓഫീസർ പ്രോജെക്ട് ഓഫീസർ </p> --}}

                    </div>
                </div>

            </div>
        </div>
    </div>
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
    </script>
@endsection
