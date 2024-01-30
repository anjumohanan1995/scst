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
                                                <label>4. വിവാഹത്തിനുമുമ്പുള്ള തൊഴിലും മാസ വരുമാനവും </label>
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
                                                <label>5.അപേക്ഷ സമർപ്പിക്കുമ്പോഴത്തെ തൊഴിലും മാസവരമാനവും </label>
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
                                                <label>6. വിവാഹത്തിന്റെ വിശദ വിവരങ്ങൾ<br>എ) വിവാഹ സമയത്തെ പ്രായം</label>
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

                                                    <label>7. വിവാഹത്തിനു ശേഷം ദമ്പതികൾ 
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

                                                    <label>8. ധനസഹായം ലഭിക്കുന്ന പക്ഷം എന്തു 
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

                                                    <label>9. മിശ്രവിവാഹം മൂലം ദമ്പതികൾക്ക്
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
                                    </div><br>




                                   
                                    <div>
                                        <p>ശ്രീമാൻ {{ @$formData['husband_name'] }} ശ്രീമതി {{ @$formData['wife_name'] }}
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
                            </div>
                            
                    </div>
                </div>

                        


                    @if(auth::user()->role=='TEO' && @$financialHelp->teo_view_status==1)
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
                       <div class="pt-2 card overflow-hidden">
                       
                          <div class="card-body">
                             
                                   <div class="pb-2 row ">
                                      <div class="col-5">
                                         <label><i class="fas fa-eye" style="color: blue"></i> Viewed Date  </label><br>
                                      </div>
                                      <div class="col-1 w-100">
                                         <label> :  
                                         </label>
                                      </div>
                                      <div class="col-6">
                                         <label> 
                                         {{ @$financialHelp['teo_view_date'] }}
                                         </label>
                                    
                                </div>
                             </div>
                             <hr>
                             <div class="pb-2 row ">
                                <div class="col-5">
                                   <label>Status  </label><br>
                                </div>
                                <div class="col-1 w-100">
                                   <label> :  
                                   </label>
                                </div>
                                <div class="col-6">
                                 @if(@$financialHelp->teo_status == null)
                                 <button class="btn btn-warning" >Pending</button>
                                 @elseif(@$financialHelp->teo_status == 1)
                                 <button class="btn btn-success" >Approved</button>
                                 @elseif(@$financialHelp->teo_status == 2)
                                 <button class="btn btn-danger" >Rejected</button> 
                                @endif
                                </div>
                       </div>
                       @if(@$financialHelp->teo_status == 2)
                       <div class="pb-2 row ">
                          <div class="col-5">
                             <label>Rejected Reason  </label><br>
                          </div>
                          <div class="col-1 w-100">
                             <label> :  
                             </label>
                          </div>
                          <div class="col-6">
                       {{ @$financialHelp->teo_status_reason }}
                       
                          </div>
                 </div>
                 @endif
                 @if(@$financialHelp->teo_status != null)
                       <div class=" pb-2 row ">
                          <div class="col-5">
                             @if(@$financialHelp->teo_status == 1)
                             <label>Approved Date  </label>
                             @elseif(@$financialHelp->teo_status == 2)
                             <label>Rejected Date  </label>
                            @endif
                             
                             <br>
                          </div>
                          <div class="col-1 w-100">
                             <label> :  
                             </label>
                          </div>
                          <div class="col-6">
                             @if(@$financialHelp['teo_status_date']!=null) {{ \Carbon\Carbon::parse(@$financialHelp['teo_status_date'])->format('d-m-Y h:i a') }}@endif
                         
                          
                          </div>
                       </div>
                 @endif
                 @endif
              
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
        //print preview function.
             
    </script>
@endsection
