@extends('layouts.app')
@section('content')
<!-- main-content -->
<div class="main-content app-content">
   <!-- container -->
   <div class="main-container container-fluid">
      <!-- breadcrumb -->
      <div class="breadcrumb-header justify-content-between row me-0 ms-0" >
         <div class="col-xl-9">
            <h4 class="content-title mb-2">അനാധകർക്ക്പ്രതിമാസം 2000 രൂപ ധനസഹായം നൽകുന്ന പദ്ധതി കൈത്താങ്ങ് </h4>
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
                        <h4 class="medical__form--h1 text-center m-3">
                           <u><b>കൈത്താങ്ങ് <br>അർഹരാരായ പട്ടികവർഗ്ഗ കുട്ടികൾക്ക് ധനസഹായം ലഭിക്കുന്നതിനുള്ള
                           അപേക്ഷ ഫോറം </b></u>
                           </b>
                        </h4>
                        <p class="text-center">(ഓരോ കുട്ടിയ്ക്കും പ്രത്യേകം അപേക്ഷ സമർപ്പിക്കണം )
                        <div class="paper-1">
                           <div class="w-100">
                              <div class="row w-100">
                                 <div class="col-5">
                                    <label>1. കുട്ടിയുടെ പേര്</label><br>
                                 </div>
                                 <div class="col-1 w-100">
                                    <label> :  
                                    </label>
                                 </div>
                                 <div class="col-6">
                                    <label>  {{ @$formData['name'] }} <br>
                                    </label>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="paper-1">
                           <div class="w-100">
                              <div class="row w-100">
                                 <div class="col-5">
                                    <label>2. കുട്ടിയുടെ വയസ്സ്</label><br>
                                 </div>
                                 <div class="col-1 w-100">
                                    <label> :  
                                    </label>
                                 </div>
                                 <div class="col-6">
                                    <label>  {{ @$formData['age'] }} <br>
                                    </label>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="paper-1">
                           <div class="w-100">
                              <div class="row w-100">
                                 <div class="col-5">
                                    <label>3.കുട്ടിയുടെ ജനന തിയതി (സർട്ടിഫിക്കറ്റ് ഉണ്ടെങ്കിൽ മാത്രം എഴുതുക )</label><br>
                                 </div>
                                 <div class="col-1 w-100">
                                    <label> :  
                                    </label>
                                 </div>
                                 <div class="col-6">
                                    <label>  {{ @$formData['dob'] }} <br>
                                    </label>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="paper-1">
                           <div class="w-100">
                              <div class="row w-100">
                                 <div class="col-5">
                                    <label>4.കുട്ടിയുടെ ജനന സർട്ടിഫിക്കറ്റ്</label><br>
                                 </div>
                                 <div class="col-1 w-100">
                                    <label> :  
                                    </label>
                                 </div>
                                 <div class="col-6">
                                    <label> 
                                    @if($formData['birth_certificate'])
                                    <a href="{{ asset('/child/birth_certificate/' . @$formData['birth_certificate']) }}" target="_blank">View</a>
                                    {{-- <iframe src="{{ asset('marriage_certificate/' . @$formData['marriage_certificate']) }}" width="400" height="200"></iframe> --}}
                                    @endif 
                                    {{-- @if($formData['birth_certificate'])
                                    <iframe src="{{ asset('birth_certificate/' . @$formData['birth_certificate']) }}" width="400" height="200"></iframe>
                                    @endif  --}}
                                    </label>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="paper-1">
                           <div class="w-100">
                              <div class="row w-100">
                                 <div class="col-5">
                                    <label>5. അച്ഛന്റെ പേര് </label><br>
                                 </div>
                                 <div class="col-1 w-100">
                                    <label> :  
                                    </label>
                                 </div>
                                 <div class="col-6">
                                    <label>  {{ @$formData['father_name'] }} <br>
                                    </label>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="paper-1">
                           <div class="w-100">
                              <div class="row w-100">
                                 <div class="col-5">
                                    <label>6.അമ്മയുടെ പേര്</label><br>
                                 </div>
                                 <div class="col-1 w-100">
                                    <label> :  
                                    </label>
                                 </div>
                                 <div class="col-6">
                                    <label>  {{ @$formData['mother_name'] }} <br>
                                    </label>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="paper-1">
                           <div class="w-100">
                              <div class="row w-100">
                                 <div class="col-5">
                                    <label>7.കുട്ടിയെ നിലവിൽ സംരക്ഷിക്കുന്ന രക്ഷിതാവിന്റെ പേര്</label><br>
                                 </div>
                                 <div class="col-1 w-100">
                                    <label> :  
                                    </label>
                                 </div>
                                 <div class="col-6">
                                    <label>  {{ @$formData['guardian_name'] }} <br>
                                    </label>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="paper-1">
                           <div class="w-100">
                              <div class="row w-100">
                                 <div class="col-5">
                                    <label>8.രക്ഷിതാവിന്റെ മേൽവിലാസം</label><br>
                                 </div>
                                 <div class="col-1 w-100">
                                    <label> :  
                                    </label>
                                 </div>
                                 <div class="col-6">
                                    <label>  {{ @$formData['address'] }} <br>
                                    {{ @$formData['current_district_name'] }} {{ @$formData['current_taluk_name'] }} {{ @$formData['current_pincode'] }}
                                    </label>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="paper-1">
                           <div class="w-100">
                              <div class="row w-100">
                                 <div class="col-5">
                                    <label>9. രക്ഷിതാവിന്റെ സമുദായം</label><br>
                                 </div>
                                 <div class="col-1 w-100">
                                    <label> :  
                                    </label>
                                 </div>
                                 <div class="col-6">
                                    <label>  {{ @$formData['caste'] }} </label>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="paper-1">
                           <div class="w-100">
                              <div class="row w-100">
                                 <div class="col-5">
                                    <label>10.ഇമെയിൽ</label><br>
                                 </div>
                                 <div class="col-1 w-100">
                                    <label> :      </label>
                                 </div>
                                 <div class="col-6">
                                    <label>  {{ @$formData['email'] }} <br>
                                    </label>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="paper-1">
                           <div class="w-100">
                              <div class="row w-100">
                                 <div class="col-5">
                                    <label>11. ഫോൺ നമ്പർ</label><br>
                                 </div>
                                 <div class="col-1 w-100">
                                    <label> :  
                                    </label>
                                 </div>
                                 <div class="col-6">
                                    <label>  {{ @$formData['mobile'] }} </label>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="paper-1">
                           <div class="w-100">
                              <div class="row w-100">
                                 <div class="col-5">
                                    <label>12. രക്ഷിതാവിന്റെ ബാങ്ക് അക്കൗണ്ട് നമ്പർ </label><br>
                                 </div>
                                 <div class="col-1 w-100">
                                    <label> :  
                                    </label>
                                 </div>
                                 <div class="col-6">
                                    <label>  {{ @$formData['account_number'] }} </label>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="paper-1">
                           <div class="w-100">
                              <div class="row w-100">
                                 <div class="col-5">
                                    <label>13. ആധാർ ഉണ്ടെങ്കിൽ ആയതിന്റെ നമ്പർ</label><br>
                                 </div>
                                 <div class="col-1 w-100">
                                    <label> :  
                                    </label>
                                 </div>
                                 <div class="col-6">
                                    <label>  {{ @$formData['aadhar_number'] }} </label>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="paper-1">
                           <div class="w-100">
                              <div class="row w-100">
                                 <div class="col-5">
                                    <label>14.വോട്ടർ ഐ.ഡി. കാർഡ് ഉണ്ടെങ്കിൽ ആയതിന്റെ നമ്പർ </label><br>
                                 </div>
                                 <div class="col-1 w-100">
                                    <label> :  
                                    </label>
                                 </div>
                                 <div class="col-6">
                                    <label>  {{ @$formData['voter_id'] }} </label>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="paper-1">
                           <div class="w-100">
                              <div class="row w-100">
                                 <div class="col-5">
                                    <label>15. റേഷൻ കാർഡ് ഉണ്ടെങ്കിൽ ആയതിന്റെ നമ്പർ  </label><br>
                                 </div>
                                 <div class="col-1 w-100">
                                    <label> :  
                                    </label>
                                 </div>
                                 <div class="col-6">
                                    <label>  {{ @$formData['ration_card_number'] }} </label>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="paper-1">
                           <div class="w-100">
                              <div class="row w-100">
                                 <div class="col-5">
                                    <label>16. അനാഥനാകാനുള്ള കാരണം   </label><br>
                                 </div>
                                 <div class="col-1 w-100">
                                    <label> :     </label>
                                 </div>
                                 <div class="col-6">
                                    <label>  {{ @$formData['reason_for_orphan'] }} / <br>
                                    @if(@$formData['reason_for_orphan'] == 'Other reason')
                                    {{ @$formData['reason'] }}
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
                                    <label>17. മരണ സർട്ടിഫിക്കറ്റ്    </label><br>
                                 </div>
                                 <div class="col-1 w-100">
                                    <label> :     </label>
                                 </div>
                                 <div class="col-6">
                                    <label> 
                                    <a href="{{ asset('/child/death_certificate/' . @$formData['death_certificate'] ?? '') }}"
                                       target="_blank" rel="noopener noreferrer">View</a> 
                                    </label>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="paper-1">
                           <div class="w-100">
                              <div class="row w-100">
                                 <div class="col-5">
                                    <label>18.  ട്രൈബൽ എക്സ്റ്റൻഷൻ ഓഫിസറുടെ സർട്ടിഫിക്കറ്റ്    </label><br>
                                 </div>
                                 <div class="col-1 w-100">
                                    <label> :     </label>
                                 </div>
                                 <div class="col-6">
                                    <label> 
                                    <a href="{{ asset('/child/tribal_extension_certificate/' . @$formData['tribal_extension_certificate'] ?? '') }}"
                                       target="_blank" rel="noopener noreferrer">View</a> 
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
                        <div class="text">
                           <div>
                              <label>സ്ഥലം </label>  : {{ @$formData['place'] }}
                           </div>
                           <div>
                              <label> അപേക്ഷകന്റെ ഒപ്പ്(വിരലടയാളം) </label> :  
                              @if($formData['signature'])
                              {{-- <iframe src="{{ asset('sign/huband/' . @$formData['husband_sign']) }}" width="400" height="200"></iframe> --}}
                              <img src="{{ asset('/child/signature/' . @$formData['signature']) }}" width="120px" height="60px">
                              @endif
                           </div>
                        </div>
                        <br>
                        <div class="text">
                           <div>
                              <label>തീയതി </label> : {{ date("d-m-Y") }}
                           </div>
                           <div class="text">
                              <div>
                                 <label>കുട്ടിയുടെ ഫോട്ടോ </label>:  
                                 @if($formData['child_signature'])
                                 <img src="{{ asset('/child/child_signature/' . @$formData['child_signature']) }}" width="120px" height="60px">
                                 {{-- <a href="{{ asset('/child/child_signature/' . @$formData['child_signature']) }}" target="_blank">View</a> --}}
                                 {{-- <iframe src="{{ asset('marriage_certificate/' . @$formData['marriage_certificate']) }}" width="400" height="200"></iframe> --}}
                                 @endif 
                              </div>
                           </div>
                        </div>
                        <div class="col-md-6 mb-6">
                           <a href="{{ route('userchildFinanceList') }}">  <input type="button" class="btn btn-primary" value="Back >>" >
                           </a>  
                        </div>
                        {{-- 
                        <div class="m-5">
                           <h6 class="text-center"><u><b>രക്ഷിതാവിന്റെ സമ്മതപത്രം</b>
                              </u>
                           </h6>
                        </div>
                        <div>
                           <p>ഞാൻ ശ്രീ ....................ന്റെ മകൻ/മകൾ ആയ കുമാരി/കുമാരൻ
                              ..............................എന്റെ സംരക്ഷണയിൽ കഴിഞ്ഞു വരുന്നതിനാൽ ഈ
                              പദ്ധതി പ്രകാരം അനുവദിക്കുന്ന തുക ഈ കുട്ടിയുടെ സംരക്ഷണത്തിനായി
                              ചിലവാകുന്നതാണെന്നും
                              ഇതിനാൽ ഉറപ്പു നൽകുന്നു.
                           </p>
                        </div>
                        <div class="row d-flex justify-content-end">
                           <div class="col-6 d-flex ">
                              <span class="col-6">രക്ഷാകർത്താവിന്റെ പേര്</span>
                              <span class="col-1"> :</span>
                              <span class="col-5"> </span>
                           </div>
                        </div>
                        <br>
                        <div class="m-5">
                           <h6 class="text-center">
                              <u><b>ട്രൈബൽ എക്സ്റ്റൻഷൻ ഓഫിസറുടെ സർട്ടിഫിക്കറ്റ് </b></u>
                           </h6>
                        </div>
                        <div>
                           <p>എന്റെ അന്വേഷണത്തിൽ ശ്രീ ......................എന്ന കുട്ടി ശ്രീ
                              ...........................ന്റെ സംരക്ഷണയിലാണ് കഴിഞ്ഞു വരുന്നതെന്നും
                              ,ബാങ്ക് അക്കൗണ്ട് നമ്പർ കുട്ടിയുടെ രക്ഷിതാവിന്റെതാണെന്ന്
                              സാക്ഷ്യപ്പെടുത്തുന്നു.
                           </p>
                        </div>
                        <div class="row d-flex justify-content-end">
                           <div class="col-6 d-flex ">
                              <span class="col-6"> ട്രൈബൽ എക്സ്റ്റൻഷൻ ഓഫിസർ
                              </span>
                              <span class="col-1"> :</span>
                              <span class="col-5"> </span>
                           </div>
                        </div>
                        --}}
                        </form>
                        {{-- 
                        <form action="{{ url('childFinancialStoreDetails') }}" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
                           @csrf
                           <div class="row">
                              <div class="col-md-3">
                                 <input type="hidden" name="formData" value="{{ json_encode($formData) }}">
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
               <!-- /row -->
               <!-- row -->
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
                              <a href="#!" class="float-end"><i class="fa fa-eye"></i>  {{ @$formData['officer_view_date'] }}</a>
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
                   
                         @if( @$formData->teo_status == null)
            
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
                                  <div class="settings-icon">
                                    <a class="approveItem" data-id="{{ @$formData->id }}"><i class="fa fa-check bg-success me-1"></i></a>
                                    &nbsp;&nbsp;<a class="rejectItem" data-id="{{ @$formData->id }}"><i class="fa fa-ban bg-danger "></i></a>
                                    &nbsp;&nbsp;<a class="remove" data-id="{{ @$formData->id }}"><i class="fa fa-times bg-danger "></i></a>
                                    
                                 </div>
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
            <!-- /row -->
         </div>
      </div>
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