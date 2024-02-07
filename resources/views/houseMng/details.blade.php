@extends('layouts.app')
@section('content')
<!-- main-content -->
<div class="main-content app-content">
   <!-- container -->
   <div class="main-container container-fluid">
      <!-- breadcrumb -->
      <div class="breadcrumb-header justify-content-between row me-0 ms-0" >
         <h4 class="content-title mb-2">    Application for financial assistance from the Department of Scheduled Tribes Development for renovation and addition of facilities and completion of houses
            {{-- (  പട്ടികവർഗ്ഗ വികസന വകുപ്പിൽനിന്ന് വീടുകളുടെ നവീകരണത്തിനും അധികസൗകര്യങ്ങൾ ഏർപെടുത്തുന്നതിനും   പൂർത്തീകരിക്കുന്നതിനുമുള്ള 
            ധനസഹായത്തിനുള്ള അപേക്ഷ)   --}}
         </h4>
         @if ($message = Session::get('error'))
         <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><i class="fa fa-window-close"></i></button>                                {{ $message }}
         </div>
         @endif
      </div>
      <!-- /breadcrumb -->
  
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
                  <div class="card-body p-5">
                     <div id="btnHide" class="row justify-content-end m-3">
                        <a style="width: 50px" onclick="printDiv()"><img
                                src="{{ asset('admin/uploads/icons/printer.png') }}" alt=""></a>
                    </div>
                     <div id="print_content">
                     <h1
                        style="text-align: center;color: rgb(0, 0, 0);font-size: medium;  padding: 20px;line-height: 32px;font-weight: 600;"><u>
                        പട്ടികവർഗ്ഗ വികസന വകുപ്പിൽനിന്ന് വീടുകളുടെ നവീകരണത്തിനും അധികസൗകര്യങ്ങൾ ഏർപെടുത്തുന്നതിനും   പൂർത്തീകരിക്കുന്നതിനുമുള്ള 
                        ധനസഹായത്തിനുള്ള അപേക്ഷ</u>
                     </h1>
                     <div class="paper-1 pt-4">
                        <div class="w-100">
                           <div class="row w-100">
                              <div class="col-12" style="text-align: right;">
                                 @if(@$houseManagement['applicant_image'])
                                    <img src="{{ asset('homeMng/' . @$houseManagement['applicant_image']) }}" width= "100mm" height= "100mm";>
                                 @endif
                              </div>
                           </div>
                        </div>
                     </div>
                     <br>
                     <br>
                     <div class="paper-1">
                        <div class="w-100">
                           <div class="row w-100">
                              <div class="col-5">
                                 <label>1. അപേക്ഷകന്റെ പേര്  </label><br>
                              </div>
                              <div class="col-1 w-100">
                                 <label> :  
                                 </label>
                              </div>
                              <div class="col-6">
                                 <label> 
                                 {{ @$houseManagement['name'] }}
                                 </label>
                              </div>
                           </div>
                        </div>
                     </div>
                     <br>
                     <div class="paper-1">
                        <div class="w-100">
                           <div class="row w-100">
                              <div class="col-5">
                                 <label>2. മേൽവിലാസം  </label><br>
                              </div>
                              <div class="col-1 w-100">
                                 <label> :  
                                 </label>
                              </div>
                              <div class="col-6">
                                 <label> 
                                 {{ @$houseManagement['address'] }} , {{ @$houseManagement['current_district_name'] }} , {{ @$houseManagement['current_taluk_name'] }} , {{ @$houseManagement['pincode'] }}
                                 </label>
                              </div>
                           </div>
                        </div>
                     </div>
                     <br>
                     <div class="paper-1">
                        <div class="w-100">
                           <div class="row w-100">
                              <div class="col-5">
                                 <label>3. ഗ്രാമപഞ്ചായത്ത്‌/ വാർഡ് നമ്പർ 
                                 </label><br>
                              </div>
                              <div class="col-1 w-100">
                                 <label> :  
                                 </label>
                              </div>
                              <div class="col-6">
                                 <label> 
                                 {{ @$houseManagement['panchayath'] }} /  {{ @$houseManagement['ward_no'] }}
                                 </label>
                              </div>
                           </div>
                        </div>
                     </div>
                     <br>
                     <div class="paper-1">
                        <div class="w-100">
                           <div class="row w-100">
                              <div class="col-5">
                                 <label>4. ജാതി 
                                 </label><br>
                              </div>
                              <div class="col-1 w-100">
                                 <label> :  
                                 </label>
                              </div>
                              <div class="col-6">
                                 <label> 
                                 {{ @$houseManagement['caste'] }} 
                                 </label>
                              </div>
                           </div>
                        </div>
                     </div>
                     <br>
                     <div class="paper-1">
                        <div class="w-100">
                           <div class="row w-100">
                              <div class="col-5">
                                 <label>5. വാർഷിക വരുമാനം 
                                 </label><br>
                              </div>
                              <div class="col-1 w-100">
                                 <label> :  
                                 </label>
                              </div>
                              <div class="col-6">
                                 <label> 
                                 {{ @$houseManagement['annual_income'] }} 
                                 </label>
                              </div>
                           </div>
                        </div>
                     </div>
                     <br>
                     <div class="paper-1">
                        <div class="w-100">
                           <div class="row w-100">
                              <div class="col-5">
                                 <label>6. 
                                 ധനസഹായത്തിനപേക്ഷിക്കുന്ന  വീടിന്റ അവസ്ഥയും അനുവദിച്ച വർഷവും 
                                 </label><br>
                              </div>
                              <div class="col-1 w-100">
                                 <label> :  
                                 </label>
                              </div>
                              <div class="col-6">
                                 <label> 
                                 {{ @$houseManagement['house_details'] }} 
                                 </label>
                              </div>
                           </div>
                        </div>
                     </div>
                     <br>
                     <div class="paper-1">
                        <div class="w-100">
                           <div class="row w-100">
                              <div class="col-5">
                                 <label>7. അനുവദിച്ച ഏജൻസി/ വകുപ്പ് 
                                 </label><br>
                              </div>
                              <div class="col-1 w-100">
                                 <label> :  
                                 </label>
                              </div>
                              <div class="col-6">
                                 <label> 
                                 {{ @$houseManagement['agency'] }}
                                 </label>
                              </div>
                           </div>
                        </div>
                     </div>
                     <br>
                     <div class="paper-1">
                        <div class="w-100">
                           <div class="row w-100">
                              <div class="col-5">
                                 <label>8. വീടുപണി പൂർത്തിയായി അവസാന ഗഡു കൈപ്പറ്റിയ വർഷം  
                                 </label><br>
                              </div>
                              <div class="col-1 w-100">
                                 <label> :  
                                 </label>
                              </div>
                              <div class="col-6">
                                 <label> 
                                 {{ @$houseManagement['last_payment_year'] }} 
                                 </label>
                              </div>
                           </div>
                        </div>
                     </div>
                     <br>
                     <div class="paper-1">
                        <div class="w-100">
                           <div class="row w-100">
                              <div class="col-5">
                                 <label>9. കുടുംബത്തിന്റെ അവസ്ഥ  (അവിവാഹിതരായ :
                                 അമ്മ, വനിത നാഥയായ കുടുംബം , അകാലത്തിൽ
                                 വിധവയാകേണ്ടി വന്നവർ , ശാരീരിക മാനസിക
                                 വേല്ലുവിളി നേരിടുന്നവർ , തീരാവ്യാധി പിടിപ്പെട്ടവർ ,
                                 അതികർമങ്ങൾക്ക് ഇരയായ വനിതകൾ തുടങ്ങിയവ)
                                 </label><br>
                              </div>
                              <div class="col-1 w-100">
                                 <label> :  
                                 </label>
                              </div>
                              <div class="col-6">
                                 <label> 
                                 {{ @$houseManagement['family_details'] }} 
                                 </label>
                              </div>
                           </div>
                        </div>
                     </div>
                     <br>
                     <div class="paper-1">
                        <div class="w-100">
                           <div class="row w-100">
                              <div class="col-5">
                                 <label>10. 
                                 ധനസഹായം ആവശ്യപ്പെടുന്ന പ്രവർത്തിയുടെ സ്വഭാവം 
                                 (നവീകരണം  / അധിക സൗകര്യം / പൂർത്തീകരണം )
                                 </label><br>
                              </div>
                              <div class="col-1 w-100">
                                 <label> :  
                                 </label>
                              </div>
                              <div class="col-6">
                                 <label> 
                                 @if(@$houseManagement['nature_payment'] == 'innovation') 
                                 നവീകരണം
                                 @elseif(@$houseManagement['nature_payment'] == 'Additional convenience') 
                                 അധിക സൗകര്യം
                                 @elseif(@$houseManagement['nature_payment'] == 'Completion') 
                                 പൂർത്തീകരണം
                                 @endif
                                 </label>
                              </div>
                           </div>
                        </div>
                     </div>
                     <br>
                     <div class="paper-1">
                        <div class="w-100">
                           <div class="row w-100">
                              <div class="col-5">
                                 <label>11. നിർദിഷ്ട്ട ആവശ്യത്തിനും മറ്റ് സർക്കാർ വകുപ്പ് / 
                                 ഏജൻസികളിൽനിന്നോ തദ്ദേശ സ്വയംഭരണാ സ്ഥാപനങ്ങളിൽ നിന്നോ 
                                 ധനസഹായം ലഭിച്ചിട്ടുണ്ടോ എന്നുള്ള  വിവരം  
                                 (ഉണ്ടെങ്കിൽ എത്ര തുക ,ലഭിച്ച തീയതി )
                                 </label><br>
                              </div>
                              <div class="col-1 w-100">
                                 <label> :  
                                 </label>
                              </div>
                              <div class="col-6">
                                 <label> 
                                 @if(@$houseManagement['payment_details'] =='yes')Yes ,
                                 @else 
                                 No 
                                 @endif 
                                 @if(@$houseManagement['payment_details'] =='yes')
                                 {{ @$houseManagement['payment_amount'] }} , @if(@$houseManagement['date_received']!=null) {{ \Carbon\Carbon::parse(@$houseManagement['date_received'])->format('d-m-Y') }}@endif
                                 @endif 
                                 </label>
                              </div>
                           </div>
                        </div>
                     </div>
                     <br> 
                     <div class="paper-1">
                        <div class="w-100">
                           <div class="row w-100">
                              <div class="col-5">
                                 <label>12. മുൻഗണന ലഭിക്കുന്നതിനുള്ള അർഹത തെളിയിക്കുന്നതിനുമുള്ള
                                 </label><br>
                              </div>
                              <div class="col-1 w-100">
                                 <label> :  
                                 </label>
                              </div>
                              <div class="col-6">
                                 <label> 
                                 {{ @$houseManagement['prove_eligibility'] }}    </label>
                                 <br>
                                 @if($houseManagement['prove_eligibility_file'])
                                 <a href="{{ asset('homeMng/' . @$houseManagement['prove_eligibility_file']) }}" target="_blank">View</a>
                                 @endif
                              </div>
                           </div>
                        </div>
                     </div>
                   
                     <br><br>
                     <div class="paper-1">
                        <div class="w-100">
                           <div class="row w-100">
                              <div class="col-5">
                                 <label>സ്ഥലം
                                 </label>: {{ @$houseManagement['place'] }}<br>
                                 <label>
                                    തീയതി
                                 </label>: {{date('d-m-Y')}}
                              </div>
                              <div class="col-6">
                                 @if($houseManagement['signature'])
                                 <img src="{{ asset('homeMng/' . @$houseManagement['signature']) }}" width="150px" height="70px">
                                 @endif
                                 <label> അപേക്ഷകന്റെ ഒപ്പ് /
                                 </label>  
                              </div>
                           </div>
                        </div>
                     </div><br>
                     <div class="row mt-5">
                        <div class="col-12">
                            <h1
                    style="text-align: center;color: rgb(0, 0, 0);font-size: medium; text-decoration: underline; padding: 20px;line-height: 32px;font-weight: 600;">
                    അപേക്ഷ സമർപ്പിക്കുന്നത് 
   
                </h1>
                        </div>
                    </div>
                    <div class="row ">
   
                        <div class="col-6 d-flex">
                            <span class="col-5"> ജില്ല
                            </span>
                            <span class="col-1"> :</span>
                            <span class="col-6"> {{ @$houseManagement['dist_name'] }}  </span>
   
                        </div>
   
                        <div class="col-6 d-flex">
                            <span class="col-5"> ടി .ഇ .ഓ</span>
                            <span class="col-1"> :</span>
                            <span class="col-6">{{ @$houseManagement['teo_name'] }} </span>
   
                        </div>
                       
   
                    </div>
                     <br>
                  </div>
                     <div class="row">
                        <div class="col-md-4 mb-4">
                        </div>
                        <div class="col-md-6 mb-6">
                           <a href="{{ route('adminHouseGrantList') }}">  <input type="button" class="btn btn-primary" value="Back >>" >
                           </a>  
                        </div>
                     </div>
                     <br>
                    
               </div>
            </div>
         </div>
         
    

      @if(@$houseManagement->teo_view_status==1)
         <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
            <div class="pt-2 card overflow-hidden">
            
               <div class="card-body">
                  
                        <div class="pb-2 row ">
                           <div class="col-5">
                              <label><i class="fas fa-eye" style="color: blue"></i>TEO Viewed Date  </label><br>
                           </div>
                           <div class="col-1 w-100">
                              <label> :  
                              </label>
                           </div>
                           <div class="col-6">
                              <label> 
                              {{ @$houseManagement['teo_view_date'] }}
                              </label>
                         
                     </div>
                  </div>
                  <hr>
                  <div class="pb-2 row ">
                     <div class="col-5">
                        <label>TEO Status  </label><br>
                     </div>
                     <div class="col-1 w-100">
                        <label> :  
                        </label>
                     </div>
                     <div class="col-6">
                      @if(@$houseManagement->teo_status == null)
                      <button class="btn btn-warning" >Pending</button>
                      @elseif(@$houseManagement->teo_status == 1)
                      <button class="btn btn-success" >Approved</button>
                      @elseif(@$houseManagement->teo_status == 2)
                      <button class="btn btn-danger" >Rejected</button> 
                     @endif
                     </div>
            </div>
            
            @if(@$houseManagement->teo_status == 2)
            <div class="pb-2 row ">
               <div class="col-5">
                  <label>TEO Rejected Reason  </label><br>
               </div>
               <div class="col-1 w-100">
                  <label> :  
                  </label>
               </div>
               <div class="col-6">
            {{ @$houseManagement->teo_status_reason }}
            
               </div>
      </div>
      @endif
      @if(@$houseManagement->teo_status != null)
            <div class=" pb-2 row ">
               <div class="col-5">
                  @if(@$houseManagement->teo_status == 1)
                  <label>TEO Approved Date  </label>
                  @elseif(@$houseManagement->teo_status == 2)
                  <label>TEO Rejected Date  </label>
                 @endif
                  
                  <br>
               </div>
               <div class="col-1 w-100">
                  <label> :  
                  </label>
               </div>
               <div class="col-6">
                  @if(@$houseManagement['teo_status_date']!=null) {{ \Carbon\Carbon::parse(@$houseManagement['teo_status_date'])->format('d-m-Y h:i a') }}@endif
              
               
               </div>
            </div>
      @endif
      
               </div>
            </div>
         </div>
          @endif


       

    </div>
    <div class="row row-sm">
      <div class="col-md-8">
         <div class="card overflow-hidden">
            <div class="card-body p-5">
              
        
               <div class="row">
                 
                      <div class="timeline-steps aos-init aos-animate" data-aos="fade-up">

                        @if(@$houseManagement->teo_status == 1)
                        <div class="timeline-step timeline-step2">
                            <div class="timeline-content timeline-content2" >
                                <div class="inner-circle"></div><br>
                                <p class="inputText badge bg-success" style="font-size: 12px">Approved </p>
                                <p class="h6 text-muted mb-0 mb-lg-2"><span class= "spanclr">TEO  :  </span>{{ @$houseManagement->teo->teo_name }}</p>
                                <p class="h6 text-muted mb-0 mb-lg-2"><span class= "spanclr">TEO Name : </span>{{ @$houseManagement->teoUser->name }}</p>
                                <p class="h6 text-muted mb-0 mb-lg-2"><span class= "spanclr">District :  </span>{{ @$houseManagement->district->name }}</p>
                                <p class="h6 text-muted mb-0 mb-lg-2"><span class= "spanclr">TEO View Date :   </span> {{ @$houseManagement['teo_view_date'] }}</p>
                                <p class="h6 text-muted mb-0 mb-lg-2"><span class= "spanclr">TEO Approved Date :   </span>@if(@$houseManagement['teo_status_date']!=null) {{ \Carbon\Carbon::parse(@$houseManagement['teo_status_date'])->format('d-m-Y h:i a') }}@endif</p>
                               
                            </div>
                        </div>
                        @elseif(@$houseManagement->teo_status == 2)
                        <div class="timeline-step timeline-step1 rej">
                           <div class="timeline-content timeline-content1" >
                               <div class="inner-circle"></div><br>
                               <p class="inputText badge bg-danger" style="font-size: 12px">Rejected</p>
                              
                               <p class="h6 text-muted mb-0 mb-lg-2"><span class= "spanclr">TEO  :  </span>{{ @$houseManagement->teo->teo_name }}</p>
                               <p class="h6 text-muted mb-0 mb-lg-2"><span class= "spanclr">TEO Name : </span>{{ @$houseManagement->teoUser->name }}</p>
                               <p class="h6 text-muted mb-0 mb-lg-2"><span class= "spanclr">District :  </span>{{ @$houseManagement->district->name }}</p>
                               <p class="h6 text-muted mb-0 mb-lg-2"><span class= "spanclr">TEO View Date :   </span> {{ @$houseManagement['teo_view_date'] }}</p>
                               <p class="h6 text-muted mb-0 mb-lg-2"><span class= "spanclr">TEO Rejected Date :   </span>@if(@$houseManagement['teo_status_date']!=null) {{ \Carbon\Carbon::parse(@$houseManagement['teo_status_date'])->format('d-m-Y h:i a') }}@endif</p>
                                 <p class="h6 text-muted mb-0 mb-lg-2"><span class= "spanclr"> Rejected Reason :   </span>{{ @$houseManagement->teo_status_reason}}</p>
                              
                           </div>
                       </div>
                       @elseif(@$houseManagement->teo_status == null)
                       <div class="timeline-step">
                        <div class="timeline-content" >
                            <div class="inner-circle"></div><br>
                           
                            <p class="inputText badge bg-warning" style="font-size: 12px">Pending </p>
                            <p class="h6 text-muted mb-0 mb-lg-2"><span class= "spanclr">TEO View Date :   </span> {{ @$houseManagement['teo_view_date'] }}</p>
                        
                        </div>
                    </div>
                        @endif

                         
                        @if(@$houseManagement->teo_status == 1)
                       @if( @$houseManagement->pjct_offcr_status == 1)
                        
                        <div class="timeline-step timeline-step2">
                           <div class="timeline-content timeline-content2" >
                               <div class="inner-circle"></div><br>
                               <p class="inputText badge bg-success" style="font-size: 12px">Approved</p>
                              
                               <p class="h6 text-muted mb-0 mb-lg-2"><span class= "spanclr">Project Officer Name  : </span>{{ @$houseManagement->prjUser->name }}</p>
                               <p class="h6 text-muted mb-0 mb-lg-2"><span class= "spanclr">TEO  :  </span>{{ @$houseManagement->teo->teo_name }}</p>
                               <p class="h6 text-muted mb-0 mb-lg-2"><span class= "spanclr">District :  </span>{{ @$houseManagement->district->name }}</p>
                               <p class="h6 text-muted mb-0 mb-lg-2"><span class= "spanclr"> View Date :   </span> {{ @$houseManagement->pjct_offcr_view_date}}</p>
                               <p class="h6 text-muted mb-0 mb-lg-2"><span class= "spanclr"> Approved Date :   </span>@if(@$houseManagement['pjct_offcr_status_date']!=null) {{ \Carbon\Carbon::parse(@$houseManagement['pjct_offcr_status_date'])->format('d-m-Y h:i a') }}@endif</p>
                              
                           </div>
                       </div>
                       @elseif( @$houseManagement->tdo_status == 1)
                        
                        <div class="timeline-step timeline-step2">
                           <div class="timeline-content timeline-content2" >
                               <div class="inner-circle"></div><br>
                               <p class="inputText badge bg-success" style="font-size: 12px">Approved</p>
                              
                               <p class="h6 text-muted mb-0 mb-lg-2"><span class= "spanclr">TDO Name  : </span>{{ @$houseManagement->tdoUser->name }}</p>
                               <p class="h6 text-muted mb-0 mb-lg-2"><span class= "spanclr">TEO  :  </span>{{ @$houseManagement->teo->teo_name }}</p>
                               <p class="h6 text-muted mb-0 mb-lg-2"><span class= "spanclr">District :  </span>{{ @$houseManagement->district->name }}</p>
                               <p class="h6 text-muted mb-0 mb-lg-2"><span class= "spanclr"> View Date :   </span> {{ @$houseManagement->tdo_view_date}}</p>
                               <p class="h6 text-muted mb-0 mb-lg-2"><span class= "spanclr"> Approved Date :   </span>@if(@$houseManagement['tdo_status_date']!=null) {{ \Carbon\Carbon::parse(@$houseManagement['tdo_status_date'])->format('d-m-Y h:i a') }}@endif</p>
                              
                           </div>
                       </div>
                       @endif
                       @if( @$houseManagement->tdo_status == 2 )
                        
                       <div class="timeline-step timeline-step1 rej">
                          <div class="timeline-content timeline-content1" >
                              <div class="inner-circle"></div><br>
                              <p class="inputText badge bg-danger" style="font-size: 12px">Rejected</p>
                             
                              <p class="h6 text-muted mb-0 mb-lg-2"><span class= "spanclr">TDO Name  : </span>{{ @$houseManagement->tdoUser->name }}</p>
                              <p class="h6 text-muted mb-0 mb-lg-2"><span class= "spanclr">TEO  :  </span>{{ @$houseManagement->teo->teo_name }}</p>
                              <p class="h6 text-muted mb-0 mb-lg-2"><span class= "spanclr">District :  </span>{{ @$houseManagement->district->name }}</p>
                              <p class="h6 text-muted mb-0 mb-lg-2"><span class= "spanclr"> View Date :   </span> {{ @$houseManagement->tdo_view_date}}</p>
                              <p class="h6 text-muted mb-0 mb-lg-2"><span class= "spanclr"> Rejected Date :   </span>@if(@$houseManagement['tdo_status_date']!=null) {{ \Carbon\Carbon::parse(@$houseManagement['tdo_status_date'])->format('d-m-Y h:i a') }}@endif</p>
                              <p class="h6 text-muted mb-0 mb-lg-2"><span class= "spanclr"> Rejected Reason :   </span>{{ @$houseManagement->tdo_status_reason}}</p>
                             
                          </div>
                      </div>
                       
                        
                        @elseif( @$houseManagement->pjct_offcr_status == 2)
                       
                        <div class="timeline-step timeline-step1 rej">
                           <div class="timeline-content timeline-content1" >
                               <div class="inner-circle"></div><br>
                               <p class="inputText badge bg-danger" style="font-size: 12px">Rejected</p>
                              
                               <p class="h6 text-muted mb-0 mb-lg-2"><span class= "spanclr">Project Officer Name  : </span>{{ @$houseManagement->prjUser->name }}</p>
                               <p class="h6 text-muted mb-0 mb-lg-2"><span class= "spanclr">TEO  :  </span>{{ @$houseManagement->teo->teo_name }}</p>
                               <p class="h6 text-muted mb-0 mb-lg-2"><span class= "spanclr">District :  </span>{{ @$houseManagement->district->name }}</p>
                               <p class="h6 text-muted mb-0 mb-lg-2"><span class= "spanclr"> View Date :   </span> {{ @$houseManagement->pjct_offcr_view_date}}</p>
                               <p class="h6 text-muted mb-0 mb-lg-2"><span class= "spanclr"> Rejected Date :   </span>@if(@$houseManagement['pjct_offcr_status_date']!=null) {{ \Carbon\Carbon::parse(@$houseManagement['pjct_offcr_status_date'])->format('d-m-Y h:i a') }}@endif</p>
                               <p class="h6 text-muted mb-0 mb-lg-2"><span class= "spanclr"> Rejected Reason :   </span>{{ @$houseManagement->pjct_offcr_status_reason}}</p>
                              
                           </div>
                       </div>
                       @endif
                       @if(@$houseManagement->tdo_status == null && @$houseManagement->pjct_offcr_status == null)
                       <div class="timeline-step">
                        <div class="timeline-content" >
                            <div class="inner-circle"></div><br>
                           
                            <p class="inputText badge bg-warning" style="font-size: 12px">Pending </p>
                            @if(@$houseManagement->pjct_offcr_view_date != null)
                            <p class="h6 text-muted mb-0 mb-lg-2"><span class= "spanclr">Project Officer View Date :   </span> {{ @$houseManagement->pjct_offcr_view_date}}</p>
                             @endif
                            @if(@$houseManagement->tdo_view_date != null)
                            <p class="h6 text-muted mb-0 mb-lg-2"><span class= "spanclr">TDO View Date :   </span> {{ @$houseManagement->tdo_view_date}}</p>
                          
                            @endif
                           
                        
                        </div>
                    </div>
                         @endif
                       
                         @endif
                
                 </div>
               </div>
               </div>
               <br>
              
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
   $(document).ready(function() {
       	$('#example').DataTable();
   });
   function printDiv() {
        var printContents = document.getElementById('print_content').innerHTML;
    var originalContents = document.body.innerHTML;

    document.body.innerHTML = printContents;

    window.print();

    document.body.innerHTML = originalContents;
            }
</script>
<!-- main-content-body -->
@endsection