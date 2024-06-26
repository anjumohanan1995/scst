@extends('layouts.app')
@section('content')

<!-- main-content -->
<div class="main-content app-content">
	<!-- container -->
	<div class="main-container container-fluid">
		<!-- breadcrumb -->
		<div class="breadcrumb-header justify-content-between row me-0 ms-0" >
			<div class="col-xl-9">
				<h4 class="content-title mb-2">പട്ടിക വർഗ്ഗ വികസന വകുപ്പിൽ നിന്നും 8 ,9 ,10 ,11 ,12  ക്ലാസ്സുകളിൽ പഠിക്കുന്നു കുട്ടികൾക്ക് ട്യൂഷൻ ഫീസിനുള്ള അപേക്ഷ 
 
                </h4>
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

                                <div class="card-body pd-y-5">

                                    <div id="btnHide" class="row justify-content-end m-3">
                                        <a style="width: 50px" onclick="printDiv()"><img
                                                src="{{ asset('admin/uploads/icons/printer.png') }}" alt=""></a>
                                    </div>
                                    <div id="print_content">



                                    <h4 class="medical__form--h1 text-center m-5">
                                        <u><b>പട്ടിക വർഗ്ഗ വികസന വകുപ്പിൽ നിന്നും 8 ,9 ,10 ,11 ,12 ക്ലാസ്സുകളിൽ
                                                <br>പഠിക്കുന്നു കുട്ടികൾക്ക്ട്യൂഷൻ ഫീസിനുള്ള അപേക്ഷ
                                            </b></u>

                                        </b>
                                    </h4>




                                    <form action="#" method="post"
                                        style="font-weight: 500;font-size: 12px;padding: 90px;">

                                    <div class="paper-1">
                                        <div class="w-100">
                                            <div class="row w-100">
                                                <div class="col-5">

                                                    <label>1. അപേക്ഷകന്റെ പേര് </label><br>

                                                </div>


                                                <div class="col-1 w-100">
                                                    <label> :  
                                                    
                                                    </label>

                                                </div>

                                                <div class="col-6">
                                                    <label> {{ @$formData['name'] }} <br>
                                                             </label>

                                                </div>
                                            </div>
                                            

                                        </div>

                                    </div>


                                    <div class="paper-1">
                                        <div class="w-100">
                                            <div class="row w-100">
                                                <div class="col-5">

                                                    <label>2. മേൽവിലാസം </label><br>

                                                </div>


                                                <div class="col-1 w-100">
                                                    <label> :  
                                                    
                                                    </label>

                                                </div>

                                                <div class="col-6">
                                                    <label> {{ @$formData['address'] }} <br>
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

                                                    <label>3. പഞ്ചായത്തിൻ്റെ പേര്   </label><br>

                                                </div>


                                                <div class="col-1 w-100">
                                                    <label> :  
                                                    
                                                    </label>

                                                </div>

                                                <div class="col-6">
                                                    <label> {{ @$formData['panchayath'] }} <br>
                                                             </label>

                                                </div>
                                            </div>
                                            

                                        </div>

                                    </div>
                                    <div class="paper-1">
                                        <div class="w-100">
                                            <div class="row w-100">
                                                <div class="col-5">

                                                    <label>4. ഫോൺ നമ്പർ</label><br>

                                                </div>


                                                <div class="col-1 w-100">
                                                    <label> :  
                                                    
                                                    </label>

                                                </div>

                                                <div class="col-6">
                                                    <label> {{ @$formData['mobile'] }} <br>
                                                             </label>

                                                </div>
                                            </div>
                                            

                                        </div>

                                    </div>

                                    <div class="paper-1">
                                        <div class="w-100">
                                            <div class="row w-100">
                                                <div class="col-5">

                                                    <label>5. ജാതി /മതം</label><br>

                                                </div>


                                                <div class="col-1 w-100">
                                                    <label> :  
                                                    
                                                    </label>

                                                </div>

                                                <div class="col-6">
                                                    <label> {{ @$formData['caste'] }} <br>
                                                             </label>

                                                </div>
                                            </div>
                                            

                                        </div>

                                    </div>


                                    <div class="paper-1">
                                        <div class="w-100">
                                            <div class="row w-100">
                                                <div class="col-5">

                                                    <label>6. വരുമാനം</label><br>

                                                </div>


                                                <div class="col-1 w-100">
                                                    <label> :  
                                                    
                                                    </label>

                                                </div>

                                                <div class="col-6">
                                                    <label> {{ @$formData['annual_income'] }} <br>
                                                             </label>

                                                </div>
                                            </div>
                                            

                                        </div>

                                    </div>

                                    <div class="paper-1">
                                        <div class="w-100">
                                            <div class="row w-100">
                                                <div class="col-5">

                                                    <label>7. വിദ്യാർത്ഥിയുടെ പേര്</label><br>

                                                </div>


                                                <div class="col-1 w-100">
                                                    <label> :  
                                                    
                                                    </label>

                                                </div>

                                                <div class="col-6">
                                                    <label> {{ @$formData['student_name'] }} <br>
                                                             </label>

                                                </div>
                                            </div>
                                            

                                        </div>

                                    </div>

                                    <div class="paper-1">
                                        <div class="w-100">
                                            <div class="row w-100">
                                                <div class="col-5">

                                                    <label>8. അപേക്ഷകനുമായുള്ള ബന്ധം</label><br>

                                                </div>


                                                <div class="col-1 w-100">
                                                    <label> :  
                                                    
                                                    </label>

                                                </div>

                                                <div class="col-6">
                                                    <label> {{ @$formData['relation'] }} <br>
                                                             </label>

                                                </div>
                                            </div>
                                            

                                        </div>

                                    </div>

                                    <div class="paper-1">
                                        <div class="w-100">
                                            <div class="row w-100">
                                                <div class="col-5">

                                                    <label>9. പഠിക്കുന്ന സ്‌കൂളിന്റെ പേര്</label><br>

                                                </div>


                                                <div class="col-1 w-100">
                                                    <label> :  
                                                    
                                                    </label>

                                                </div>

                                                <div class="col-6">
                                                    <label> {{ @$formData['school_name'] }} <br>
                                                             </label>

                                                </div>
                                            </div>
                                            

                                        </div>

                                    </div>

                                    <div class="paper-1">
                                        <div class="w-100">
                                            <div class="row w-100">
                                                <div class="col-5">

                                                    <label>10. ക്ലാസ്</label><br>

                                                </div>


                                                <div class="col-1 w-100">
                                                    <label> :  
                                                    
                                                    </label>

                                                </div>

                                                <div class="col-6">
                                                    <label> {{ @$formData['class_number'] }} <br>
                                                             </label>

                                                </div>
                                            </div>
                                            

                                        </div>

                                    </div>

                                    <div class="paper-1">
                                        <div class="w-100">
                                            <div class="row w-100">
                                                <div class="col-5">

                                                    <label>11. ട്യുഷൻ സെന്ററിന്റെ പേര്</label><br>

                                                </div>


                                                <div class="col-1 w-100">
                                                    <label> :  
                                                    
                                                    </label>

                                                </div>

                                                <div class="col-6">
                                                    <label> {{ @$formData['tuition_center'] }} <br>
                                                             </label>

                                                </div>
                                            </div>
                                            

                                        </div>

                                    </div>
                                    <div class="paper-1">
                                        <div class="w-100">
                                            <div class="row w-100">
                                                <div class="col-5">

                                                    <label>12. പ്രിൻസിപ്പലിൻ്റെ പ്രഖ്യാപനം (ഫയൽ)</label><br>

                                                </div>


                                                <div class="col-1 w-100">
                                                    <label> :  
                                                    
                                                    </label>

                                                </div>

                                                <div class="col-6">
                                                    <label> @if(@$formData['principal_declaration'] != '')
                                                        
                                                        <a href="{{ asset('tuition/' . @$formData['principal_declaration']) }}" target="_blank">View</a>
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

                                                    <label>13.മാതാപിതാക്കളുടെ അക്കൗണ്ട് വിശദാംശങ്ങൾ</label><br>

                                                </div>


                                                <div class="col-1 w-100">
                                                    <label> :  
                                                    
                                                    </label>

                                                </div>

                                                <div class="col-6">
                                                    <label> 
                                                      Bank Branch :   {{@$formData['parent_bank_branch']  }}<br>
                                                    Account Number :  {{@$formData['parent_account_no']  }}<br>
                                                    IFSC Code   :     {{@$formData['parent_ifsc_code']  }}
                                                         </label>

                                                </div>
                                            </div>
                                            

                                        </div>

                                    </div>
                                    <div class="row mt-5">
                                        <div class="col-12">
                                            <h1 style="text-align: center;color: rgb(0, 0, 0);font-size: medium; text-decoration: underline; padding: 20px;line-height: 32px;font-weight: 600;">
                                                അപേക്ഷ സമർപ്പിക്കുന്നത്  </h1>
                                        </div>
                                    </div>
                                    <div class="row ">
                                        <div class="row d-flex flex-direction-row col-6">
                                            <div class="row col-12">
                                                <div class="col-3">

                                                    <label>ജില്ല </label>
                                                </div>

                                                <div class="col-1">
                                                    <label> : </label>
                                                </div>
                                                <div class="col-2">
                                                    <label> {{ @$formData['dist_name'] }} </label>
                                                </div>
                                            </div>

                        
                                        </div>

                                        <div class="col-6 d-flex">
                                            <div class="row d-flex col-12">
                                                <div class="col-6">

                                                    <label>TEO</label>
                                                </div>

                                                <div class="col-1">
                                                    <label> : </label>
                                                </div>
                                                <div class="col-4">
                                                    <label> {{ @$formData['teo_name'] }} </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                        <div>
                                            <p>മേൽപറഞ്ഞിട്ടുള്ള  കാര്യങ്ങൾ എന്റെ അറിവിലും വിശ്വാസത്തിലും സത്യമാണെന്ന് <br> ബോധ്യപ്പെടുത്തിക്കൊള്ളുന്നു 

                                            </p>
                                        </div>

                                    <div class="paper-1">
                                        <div class="w-100">
                                            <div class="row w-100">
                                                <div class="col-5">

                                                    <label>സ്ഥലം </label><br>

                                                </div>


                                                <div class="col-1 w-100">
                                                    <label> :  
                                                    
                                                    </label>

                                                </div>

                                                <div class="col-6">
                                                    <label> {{ @$formData['place'] }} <br>
                                                             </label>

                                                </div>
                                            </div>
                                            

                                        </div>

                                    </div>


                                    <div class="paper-1">
                                        <div class="w-100">
                                            <div class="row w-100">
                                                <div class="col-5">

                                                    <label>തീയതി </label><br>

                                                </div>


                                                <div class="col-1 w-100">
                                                    <label> :  
                                                    
                                                    </label>

                                                </div>

                                                <div class="col-6">
                                                    <label>  {{ @$formData['date'] }} <br>
                                                             </label>

                                                </div>
                                            </div>
                                            

                                        </div>

                                    </div>

                                    <div class="paper-1">
                                        <div class="w-100">
                                            <div class="row w-100">
                                                <div class="col-5">

                                                    <label> അപേക്ഷകന്റെ ഒപ്പ് </label><br>

                                                </div>


                                                <div class="col-1 w-100">
                                                    <label> :  
                                                    
                                                    </label>

                                                </div>

                                                <div class="col-6">

                                                   @if($formData['signature'])
                                            {{-- <iframe src="{{ asset('tuition/' . @$formData['signature']) }}" width="400" height="200"></iframe> --}}

                                            <img src="{{ asset('tuition/' . @$formData['signature']) }}" width="120px" height="60px">
                                            @endif 

                                                </div>
                                            </div>
                                            

                                        </div>

                                    </div>

                                    <div class="paper-1">
                                        <div class="w-100">
                                            <div class="row w-100">
                                                <div class="col-5">

                                                    <label> അപേക്ഷകന്റെ ഫോട്ടോ </label><br>

                                                </div>


                                                <div class="col-1 w-100">
                                                    <label> :  
                                                    
                                                    </label>

                                                </div>

                                                <div class="col-6">

                                                   @if($formData['photo'])
                                            {{-- <iframe src="{{ asset('tuition/' . @$formData['signature']) }}" width="400" height="200"></iframe> --}}

                                            <img src="{{ asset('photo/' . @$formData['photo']) }}" width="120px" height="60px">
                                            @endif 

                                                </div>
                                            </div>
                                            

                                        </div>
                                                   

                                    </div><br>

                                    <div class="col-md-6 mb-6">
                                        <a href="{{ route('userTuitionFeeList') }}">  <input type="button" class="btn btn-primary" value="Back >>" >
                                        </a>  </div>
                                               


                            
                                       {{-- <br>
                                        <div>
                                            <p>പഠിക്കുന്ന സ്‌കൂളിന്റെ മേലധികാരിയുടെ ഒപ്പും സീലും 


                                            </p>
                                        </div>
                                        <br>
                                        <br>
                                        <br>
                                        <div>
                                            <p>ട്യൂഷൻ  സെന്ററിന്റെ മേലധികാരിയുടെ ഒപ്പും സീലും 

                                            </p>
                                        </div>
                                       --}}
                                    </form>
                                   

                                </div>
                                 </div>

                                
                            </div>

                            <!-- /row -->
                            <!-- row -->
                            
                            <!-- /row -->
                            <!-- row -->
                           
                            <!-- /row -->
                            <!-- row -->
                               
                           
                        </div>
                        <!-- /row -->
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
                            <div class="pt-2 card overflow-hidden">
                               <div class="card-body">
                                  <ul class="timeline-3">
                                     @if(@$formData->teo_status == 1)
                                     <li class="ApproveTimeline">
                                        <a href="#!">TEO</a>
                                        <a href="#!" class="float-end"><i class="fa fa-eye"></i>  {{ @$formData['teo_view_date'] }}</a>
                                        <p></p>
                                        <p class="inputText badge bg-success" style="font-size: 12px">Approved </p>
                                        <p class="mt-2"><span class= "spanclr">TEO  :  </span>{{ @$formData->teo->teo_name }}</p>
                                        <p class="mt-2"><span class= "spanclr">TEO Name : </span>{{ @$formData->teoUser->name }}</p>
                                        <p class="mt-2"><span class= "spanclr">District :  </span>{{ @$formData->district->name }}</p>
                                        <p  class="mt-2"><span class= "spanclr">TEO Approved Date :   </span>@if(@$formData['teo_status_date']!=null) {{ \Carbon\Carbon::parse(@$formData['teo_status_date'])->format('d-m-Y h:i a') }}@endif</p>
                                        <p  class="mt-2"><span class= "spanclr"> Approved Reason :   </span>{{ @$formData->teo_status_reason}}</p>
                                     </li>
                                     @elseif(@$formData->teo_status == 2)
                                     <li class="rejectTimeline">
                                        <a href="#!">TEO</a>
                                        <a href="#!" class="float-end"><i class="fa fa-eye"></i>  {{ @$formData['teo_view_date'] }}</a>
                                        <p></p>
                                        <p class="inputText badge bg-danger" style="font-size: 12px">Rejected</p>
                                        <p class="mt-2"><span class= "spanclr">TEO  :  </span>{{ @$formData->teo->teo_name }}</p>
                                        <p class="mt-2"><span class= "spanclr">TEO Name : </span>{{ @$formData->teoUser->name }}</p>
                                        <p class="mt-2"><span class= "spanclr">District :  </span>{{ @$formData->district->name }}</p>
                                        <p  class="mt-2"><span class= "spanclr">TEO Rejected Date :   </span>@if(@$formData['teo_status_date']!=null) {{ \Carbon\Carbon::parse(@$formData['teo_status_date'])->format('d-m-Y h:i a') }}@endif</p>
                                        <p  class="mt-2"><span class= "spanclr"> Rejected Reason :   </span>{{ @$formData->teo_status_reason}}</p>
                                     </li>
                                     @elseif(@$formData->teo_status == null)
                                     <li class="pendingTimeline">
                                        <a href="#!">TEO</a>
                                        <a href="#!" class="float-end"><i class="fa fa-eye"></i>  {{ @$formData['teo_view_date'] }}</a>
                                        <p></p>
                                        <p class="inputText badge bg-warning" style="font-size: 12px">Pending </p>
                                        {{-- 
                                        <p class="mt-2"><span class= "spanclr">TEO View Date :   </span> {{ @$formData['teo_view_date'] }}</p>
                                        --}}
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
                                      <p class="inputText badge bg-danger" style="font-size: 12px">Rejected </p>
                                      <p  class="mt-2"><span class= "spanclr"> Name :   </span>{{ @$formData->clerkUser->name }}</p>
                                       
                                      <p  class="mt-2"><span class= "spanclr"> Rejected Date :   </span>@if(@$formData['clerk_status_date']!=null) {{ \Carbon\Carbon::parse(@$formData['clerk_status_date'])->format('d-m-Y h:i a') }}@endif</p>
                                      <p  class="mt-2"><span class= "spanclr"> Rejected Reason :   </span>{{ @$formData->clerk_status_reason}}</p>
                                   </li>
                                   @elseif( @$formData->clerk_status == null)
                    
                                   <li class="pendingTimeline">
                                     <a href="#!">Clerk</a>
                                     <a href="#!" class="float-end"><i class="fa fa-eye"></i>  {{ @$formData['clerk_view_date'] }}</a>
                                     <p></p>
                                     <p class="inputText badge bg-warning" style="font-size: 12px">Pending </p>
                                      </li>
                                      @endif
                    
                                      @endif 
                                      @if(@$formData->clerk_status == 1)
                                      @if( @$formData->assistant_status == 1)
                     
                                      <li class="ApproveTimeline">
                                        <a href="#!">APO / ATDO</a>
                                        <a href="#!" class="float-end"><i class="fa fa-eye"></i>  {{ @$formData['assistant_view_date'] }}</a>
                                        <p></p>
                                        <p class="inputText badge bg-success" style="font-size: 12px">Approved </p>
                                        <p  class="mt-2"><span class= "spanclr"> Name :   </span>{{ @$formData->assistantUser->name }}</p>
                                       
                                        <p  class="mt-2"><span class= "spanclr"> Approved Date :   </span>@if(@$formData['assistant_status_date']!=null) {{ \Carbon\Carbon::parse(@$formData['assistant_status_date'])->format('d-m-Y h:i a') }}@endif</p>
                                        <p  class="mt-2"><span class= "spanclr"> Approved Reason :   </span>{{ @$formData->teo_status_reason}}</p>
                                     </li>
                                     @elseif( @$formData->assistant_status == 2)
                     
                                     <li class="rejectTimeline">
                                       <a href="#!">APO / ATDO</a>
                                       <a href="#!" class="float-end"><i class="fa fa-eye"></i>  {{ @$formData['assistant_view_date'] }}</a>
                                       <p></p>
                                       <p class="inputText badge bg-danger" style="font-size: 12px">Rejected </p>
                                       <p  class="mt-2"><span class= "spanclr"> Name :   </span>{{ @$formData->assistantUser->name }}</p>
                                       
                                       <p  class="mt-2"><span class= "spanclr"> Rejected Date :   </span>@if(@$formData['assistant_status_date']!=null) {{ \Carbon\Carbon::parse(@$formData['assistant_status_date'])->format('d-m-Y h:i a') }}@endif</p>
                                       <p  class="mt-2"><span class= "spanclr"> Rejected Reason :   </span>{{ @$formData->assistant_status_reason}}</p>
                                    </li>
                                    @elseif( @$formData->assistant_status == null)
                     
                                    <li class="pendingTimeline">
                                      <a href="#!">APO / ATDO</a>
                                      <a href="#!" class="float-end"><i class="fa fa-eye"></i>  {{ @$formData['assistant_view_date'] }}</a>
                                     <p></p>
                                      <p class="inputText badge bg-warning" style="font-size: 12px">Pending </p>
                                       </li>
                                       @endif
                                       @endif
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
                                        <p class="inputText badge bg-danger" style="font-size: 12px">Rejected </p>
                                        <p  class="mt-2"><span class= "spanclr"> Name :   </span>{{ @$formData->officerUser->name }}</p>
                                        
                                        <p  class="mt-2"><span class= "spanclr"> Rejected Date :   </span>@if(@$formData['officer_status_date']!=null) {{ \Carbon\Carbon::parse(@$formData['assistant_status_date'])->format('d-m-Y h:i a') }}@endif</p>
                                        <p  class="mt-2"><span class= "spanclr"> Rejected Reason :   </span>{{ @$formData->officer_status_reason}}</p>
                                     </li>
                                     @elseif( @$formData->officer_status == null)
                      
                                     <li class="pendingTimeline">
                                       <a href="#!">PO / TDO</a>
                                       <a href="#!" class="float-end"><i class="fa fa-eye"></i>  {{ @$formData['officer_view_date'] }}</a>
                                      <p></p>
                                       <p class="inputText badge bg-warning" style="font-size: 12px">Pending </p>
                                        </li>
                                        @endif
                                        @endif
                                     {{-- @if( @$formData->pjct_offcr_status == 1)
                                     <li class="ApproveTimeline">
                                        <a href="#!">Project Officer</a>
                                        <a href="#!" class="float-end"><i class="fa fa-eye"></i>  {{ @$formData['pjct_offcr_view_date'] }}</a>
                                        <p class="inputText badge bg-success" style="font-size: 12px">Approved</p>
                                        <p class="mt-2"><span class= "spanclr">Project Officer Name  : </span>{{ @$formData->prjUser->name }}</p>
                                        <p class="mt-2"><span class= "spanclr">District :  </span>{{ @$formData->district->name }}</p>
                                        <p class="mt-2"><span class= "spanclr"> Approved Date :   </span>@if(@$formData['pjct_offcr_status_date']!=null) {{ \Carbon\Carbon::parse(@$formData['pjct_offcr_status_date'])->format('d-m-Y h:i a') }}@endif</p>
                                     </li>
                                     @elseif( @$formData->tdo_status == 1)
                                     <li class="ApproveTimeline">
                                        <a href="#!">TDO</a>
                                        <a href="#!" class="float-end"><i class="fa fa-eye"></i>  {{ @$formData['tdo_view_date'] }}</a>
                                        <p class="inputText badge bg-success" style="font-size: 12px">Approved</p>
                                        <p class="mt-2"><span class= "spanclr">TDO Name  : </span>{{ @$formData->tdoUser->name }}</p>
                                        <p class="mt-2"><span class= "spanclr">TEO  :  </span>{{ @$formData->teo->teo_name }}</p>
                                        <p class="mt-2"><span class= "spanclr">District :  </span>{{ @$formData->district->name }}</p>
                                        <p class="mt-2"><span class= "spanclr"> Approved Date :   </span>@if(@$formData['tdo_status_date']!=null) {{ \Carbon\Carbon::parse(@$formData['tdo_status_date'])->format('d-m-Y h:i a') }}@endif</p>
                                     </li>
                                     @endif
                                     @if( @$formData->tdo_status == 2 )
                                     <li class="rejectTimeline">
                                        <a href="#!">TDO</a>
                                        <a href="#!" class="float-end"><i class="fa fa-eye"></i>  {{ @$formData['tdo_view_date'] }}</a>
                                        <p class="mt-2"><span class= "spanclr">TDO Name  : </span>{{ @$formData->tdoUser->name }}</p>
                                        <p class="mt-2"><span class= "spanclr">TEO  :  </span>{{ @$formData->teo->teo_name }}</p>
                                        <p class="mt-2"><span class= "spanclr">District :  </span>{{ @$formData->district->name }}</p>
                                        <p class="mt-2"><span class= "spanclr"> Rejected Date :   </span>@if(@$formData['tdo_status_date']!=null) {{ \Carbon\Carbon::parse(@$formData['tdo_status_date'])->format('d-m-Y h:i a') }}@endif</p>
                                        <p class="mt-2"><span class= "spanclr"> Rejected Reason :   </span>{{ @$formData->tdo_status_reason}}</p>
                                     </li>
                                     @elseif( @$formData->pjct_offcr_status == 2)
                                     <li class="rejectTimeline">
                                        <a href="#!">TDO</a>
                                        <a href="#!" class="float-end"><i class="fa fa-eye"></i>  {{ @$formData['pjct_offcr_view_date'] }}</a>
                                        <p class="inputText badge bg-danger" style="font-size: 12px">Rejected</p>
                                        <p class="mt-2"><span class= "spanclr">Project Officer Name  : </span>{{ @$formData->prjUser->name }}</p>
                                        <p class="mt-2"><span class= "spanclr">TEO  :  </span>{{ @$formData->teo->teo_name }}</p>
                                        <p class="mt-2"><span class= "spanclr">District :  </span>{{ @$formData->district->name }}</p>
                                        <p class="mt-2"><span class= "spanclr"> Rejected Date :   </span>@if(@$formData['pjct_offcr_status_date']!=null) {{ \Carbon\Carbon::parse(@$formData['pjct_offcr_status_date'])->format('d-m-Y h:i a') }}@endif</p>
                                        <p class="mt-2"><span class= "spanclr"> Rejected Reason :   </span>{{ @$formData->pjct_offcr_status_reason}}</p>
                                     </li>
                                     @endif
                                     @if(@$formData->tdo_status == null && @$formData->pjct_offcr_status == null)
                                     <li class="pendingTimeline">
                                        <a href="#!">PO / TDO</a>
                                        <a href="#!" class="float-end"><i class="fa fa-eye"></i>
                                        @if(@$formData->pjct_offcr_view_date != null)
                                        PO :  {{ @$formData['pjct_offcr_view_date'] }}
                                        @endif
                                        @if(@$formData->tdo_view_date != null)
                                        TDO :  {{ @$formData['teo_view_date'] }} 
                                        @endif
                                        </a>
                                     </li>
                                     @endif --}}
                                    
                                  </ul>
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
            //window.history.back();
             window.location.href = "{{ url()->previous() }}";

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