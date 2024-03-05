@extends('layouts.app')

@section('content')
<!-- main-content -->
<div class="main-content app-content">
	<!-- container -->
	<div class="main-container container-fluid">
		<!-- breadcrumb -->
		<div class="breadcrumb-header justify-content-between row me-0 ms-0" >
			
				{{-- <h4 class="content-title mb-2"> ഐ .റ്റി.ഐ /ട്രൈനിംഗ് സെന്ററുകളിലെ പഠിതാക്കൾക്കുള്ള സ്കോളർഷിപ്പ്

</h4> --}}
				

            @if ($message = Session::get('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><i class="fa fa-window-close"></i></button> {{ $message }}
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
                <div class=" card">
                    <div class="card-body  p-5">
                        <div id="btnHide" class="row justify-content-end m-3">
                            <a style="width: 50px" onclick="printDiv()"><img
                                    src="{{ asset('admin/uploads/icons/printer.png') }}" alt=""></a>
                        </div>
                        <div id="print_content">
                            <div id="success_message" class="ajax_response" style="display: none;"></div>
                            <div class="mb-4 main-content-label">
                                <h4 class="medical__form--h1 text-center m-3">
                                    <b><u>ഐ .റ്റി.ഐ /ട്രൈനിംഗ് സെന്ററുകളിലെ പഠിതാക്കൾക്കുള്ള സ്കോളർഷിപ്പ്</u></b>
                                </h4>
                                </div>
                                <div class="paper-1 pt-4">
                                    <div class="w-100">
                                       <div class="row w-100">
                                          <div class="col-12" style="text-align: right;">
                                             @if(@$studentFund['applicant_image'])
                                                <img src="{{ asset('itiStudentFund/' . @$studentFund['applicant_image']) }}" width= "100mm" height= "100mm";>
                                             @endif
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                            
                               <br>
                                <table id="preview_student_fund">
                                    <thead>

                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>അപേക്ഷകന്റെ പേര് <br>
                                                <br>
                                                മേൽവിലാസം
                                            </td>
                                            <td>{{ @$studentFund['name'] }} <br> <br>{{ @$studentFund['address'] }}, {{ @$studentFund['current_taluk_name'] }}
                                                , {{ @$studentFund['current_district_name'] }}  , {{ @$studentFund['current_pincode'] }}</td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>പഞ്ചായത്തിൻ്റെ പേര്

                                            </td>
                                            <td>{{ @$studentFund['panchayath'] }} </td>
                                        </tr>
                                        <tr>
                                        
                                        <tr>
                                            <td>3</td>
                                            <td>കോഴ്‌സിന്റെ പേര്

                                            </td>
                                            <td>{{ @$studentFund['course_name'] }} </td>
                                        </tr>
                                        <tr>
                                        <td>4</td>
                                        <td>മെട്രിക് അല്ലെങ്കിൽ നോൺ മെട്രിക് ?

                                        </td>
                                        <td>{{ @$studentFund['metric_type'] }} </td>
                                    </tr>
                                    <tr>
                                    <td>5</td>
                                    <td>കോഴ്‌സിൻ്റെ ദൈർഘ്യം 

                                    </td>
                                    <td>{{ @$studentFund['course_duration'] }} </td>
                                </tr>

                                <tr>
                                    <td>6</td>
                                    <td>പ്രവേശന തീയതി
                                    </td>
                                    <td>@if(@$studentFund['admission_date']!=null) {{ \Carbon\Carbon::parse(@$studentFund['admission_date'])->format('d-m-Y') }}@endif</td>
                                </tr>
                                

                                        <tr>
                                            <td>7</td>
                                            <td>നടപ്പ് അദ്ധ്യയന വർഷം <br>ക്ലാസ് ആരംഭിച്ച തീയതി
                                            </td>
                                            <td>@if(@$studentFund['class_start_date']!=null) {{ \Carbon\Carbon::parse(@$studentFund['class_start_date'])->format('d-m-Y') }}@endif</td>
                                        </tr>
                                        <tr>
                                            <td>8</td>
                                            <td>അപേക്ഷകനെ പ്രവേശനം ലഭിച്ചത്
                                            </td>
                                            <td> @if(@$studentFund['admission_type'] == 'merit') 
                    
                                                മെരിറ്റ്
                                                @elseif(@$studentFund['admission_type'] == 'innovation') 
                                                സംവരണം
                                                @elseif(@$studentFund['admission_type'] == 'management') 
                                                മാനേജ്‌മന്റ്
                                                @elseif(@$studentFund['admission_type'] == 'others') 
                                                മറ്റുള്ളവ
                                                @endif
                                             </td>
                                        </tr>
                                        <tr>
                                            <td>9</td>
                                            <td>അപേക്ഷകന്റെ ജാതി/ മതം <br>
                                                (സർട്ടിഫിക്കറ്റ് ഹാജരാക്കണം )

                                            </td>
                                            <td>{{ @$studentFund['caste'] }} <br> @if($studentFund['caste_certificate'])
                                                <a href="{{ asset('itiStudentFund/' . @$studentFund['caste_certificate']) }}" target="_blank">View</a>
                                                @endif</td>
                                        </tr>
                                        {{-- <tr>
                                            <td>6</td>
                                            <td>അപേക്ഷകന്റെ വരുമാനം <br>
                                                (സർട്ടിഫിക്കറ്റ് ഹാജരാക്കണം )

                                            </td>
                                            <td> {{ @$studentFund['income'] }} <br> @if($studentFund['income_certificate'])
                                                <a href="{{ asset('itiStudentFund/' . @$studentFund['income_certificate']) }}" target="_blank">View</a>
                                                @endif</td>
                                        </tr> --}}
                                        <tr>
                                            <td>10</td>
                                            <td>വിദ്യാർത്ഥികൾക്ക് ഇ-ഗ്രാൻഡ് അകൗണ്ട് <br>നമ്പർ ഉണ്ടെങ്കിൽ
                                                ബാങ്ക്
                                                ശാഖ<br> /ഇ -ഗ്രാൻഡ് അകൗണ്ട് നം
                                            </td>
                                            <td>
                                            
                                                @if(@$studentFund['account_details'] =='yes')Yes ,
                                                @else 
                                                No 
                                                @endif 
                                                @if(@$studentFund['account_details'] =='yes')
                                                <br>Bank Branch  : {{ @$studentFund['bank_branch']  }}
                                                <br>Account Number   : {{ @$studentFund['account_no']  }}
                                                <br>IFSC Code : {{ @$studentFund['ifsc_code']  }}
                                                @endif 
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>11</td>
                                            <td>മാതാപിതാക്കളുടെ അക്കൗണ്ട് വിശദാംശങ്ങൾ
                                            </td>
                                            <td>
                                            
                                              
                                                <br>Bank Branch  : {{ @$studentFund['parent_bank_branch']  }}
                                                <br>Account Number   : {{ @$studentFund['parent_account_no']  }}
                                                <br>IFSC Code : {{ @$studentFund['parent_ifsc_code']  }}
                                                
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>12</td>
                                            <td>പ്രിൻസിപ്പൽ  അക്കൗണ്ട് വിശദാംശങ്ങൾ
                                            </td>
                                            <td>
                                            
                                              
                                                <br>Bank Branch  : {{ @$studentFund['principal_bank_branch']  }}
                                                <br>Account Number   : {{ @$studentFund['principal_account_no']  }}
                                                <br>IFSC Code : {{ @$studentFund['principal_ifsc_code']  }}
                                                
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>13</td>
                                            <td>ഹാജർ വിശദാംശങ്ങൾ 
                                            </td>
                                            <td>
                                            
                                              
                                                @if($studentFund['attendance_doc'])
                                                <a href="{{ asset('itiStudentFund/' . @$studentFund['attendance_doc']) }}" target="_blank"> View </a>
                                                @endif 
                                                
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                                </table>
                                
                          

                          <br><br>
                          <div class="row ">

                            <div class="col-6 d-flex">
                                <span class="col-5"> അപേക്ഷന്റെ ഒപ്പ്
                                </span>
                                <span class="col-1"> :</span>
                                <span class="col-6"> @if($studentFund['signature'])
                                    <img src="{{ asset('itiStudentFund/' . @$studentFund['signature']) }}" width="150px" height="70px">
                                    @endif </span>

                            </div>

                            <div class="col-6 d-flex">
                                <span class="col-5"> അപേക്ഷന്റെ  പേര്</span>
                                <span class="col-1"> :</span>
                                <span class="col-6">{{@$studentFund['name']}} </span>

                            </div>

                        </div>
                        <br> <br>
                             
                                <div class="row ">

                                    <div class="col-6 d-flex">
                                        {{-- <span class="col-5"> രക്ഷാകർത്താവിന്റെ ഒപ്പ്
                                        </span>
                                        <span class="col-1"> :</span>
                                        <span class="col-6"> @if($studentFund['parent_signature'])
                                            <img src="{{ asset('itiStudentFund/' . @$studentFund['parent_signature']) }}" width="150px" height="70px">
                                            @endif </span>

                                    </div> --}}

                                    <div class="col-12 d-flex">
                                        <span class="col-5"> രക്ഷാകർത്താവിന്റെ  പേര്</span>
                                        <span class="col-1"> :</span>
                                        <span class="col-6">{{@$studentFund['parent_name']}} </span>

                                    </div>

                                </div>
                               
                                <br><br>
                                    
                             
                            
                              
                          
                               <div class="row mt-5">
                                <div class="col-12">
                                    <h1
                            style="text-align: center;color: rgb(0, 0, 0);font-size: medium; text-decoration: underline; padding: 20px;line-height: 32px;font-weight: 600;">
                            അപേക്ഷ സമർപ്പിക്കുന്നത് 

                        </h1>
                                </div>
                            </div>
                            <div class="row ">

                                <div class="col-4 d-flex">
                                    <span class="col-5"> ജില്ല
                                    </span>
                                    <span class="col-1"> :</span>
                                    <span class="col-6"> {{ @$studentFund['submitted_district_name'] }}  </span>

                                </div>

                                <div class="col-4 d-flex">
                                    <span class="col-5"> ടി .ഇ .ഓ</span>
                                    <span class="col-1"> :</span>
                                    <span class="col-6">{{ @$studentFund['submitted_teo_name'] }} </span>

                                </div>
                                <div class="col-4 d-flex">
                                    <span class="col-5"> സ്ഥാപനം</span>
                                    <span class="col-1"> :</span>
                                    <span class="col-6">{{ @$studentFund['institution_name'] }} </span>

                                </div>

                            </div>
                        </div>
                               <br><br>
                            <br>
                            <div class="row">
                                <div class="col-md-4 mb-4">
                                  
                                     
                                         </div>
                                <div class="col-md-6 mb-6">
                                 <a href="{{ route('userItiFundList') }}">  <input type="button" class="btn btn-primary" value="Back >>" >
                                 </a>  </div>
                                        
                                        

                                    </div><br>
                    </div>
                </div>
                </div>
            </div>
                
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
                    <div class="pt-2 card overflow-hidden">
                    
                       <div class="card-body">
                        <ul class="timeline-3">
                            @if(@$studentFund->teo_status == 1)
                            <li class="ApproveTimeline">
                               <a href="#!">TEO</a>
                               <a href="#!" class="float-end"><i class="fa fa-eye"></i>  {{ @$studentFund['teo_view_date'] }}</a>
                               <p></p>
                               <p class="inputText badge bg-success" style="font-size: 12px">Approved </p>
                               <p class="mt-2"><span class= "spanclr">TEO  :  </span>{{ @$studentFund->teo->teo_name }}</p>
                               <p class="mt-2"><span class= "spanclr">TEO Name : </span>{{ @$studentFund->teoUser->name }}</p>
                               <p class="mt-2"><span class= "spanclr">District :  </span>{{ @$studentFund->district->name }}</p>
                               <p  class="mt-2"><span class= "spanclr">TEO Approved Date :   </span>@if(@$studentFund['teo_status_date']!=null) {{ \Carbon\Carbon::parse(@$studentFund['teo_status_date'])->format('d-m-Y h:i a') }}@endif</p>
                               <p  class="mt-2"><span class= "spanclr"> Approved Reason :   </span>{{ @$studentFund->teo_status_reason}}</p>
                            </li>
                            @elseif(@$studentFund->teo_status == 2)
                            <li class="rejectTimeline">
                               <a href="#!">TEO</a>
                               <a href="#!" class="float-end"><i class="fa fa-eye"></i>  {{ @$studentFund['teo_view_date'] }}</a>
                               <p></p>
                               <p class="inputText badge bg-danger" style="font-size: 12px">Rejected</p>
                               <p class="mt-2"><span class= "spanclr">TEO  :  </span>{{ @$studentFund->teo->teo_name }}</p>
                               <p class="mt-2"><span class= "spanclr">TEO Name : </span>{{ @$studentFund->teoUser->name }}</p>
                               <p class="mt-2"><span class= "spanclr">District :  </span>{{ @$studentFund->district->name }}</p>
                               <p  class="mt-2"><span class= "spanclr">TEO Rejected Date :   </span>@if(@$studentFund['teo_status_date']!=null) {{ \Carbon\Carbon::parse(@$studentFund['teo_status_date'])->format('d-m-Y h:i a') }}@endif</p>
                               <p  class="mt-2"><span class= "spanclr"> Rejected Reason :   </span>{{ @$studentFund->teo_status_reason}}</p>
                            </li>
                            @elseif(@$studentFund->teo_status == null)
                            <li class="pendingTimeline">
                               <a href="#!">TEO</a>
                               <a href="#!" class="float-end"><i class="fa fa-eye"></i>  {{ @$studentFund['teo_view_date'] }}</a>
                               <p></p>
                               <p class="inputText badge bg-warning" style="font-size: 12px">Pending </p>
                               {{-- 
                               <p class="mt-2"><span class= "spanclr">TEO View Date :   </span> {{ @$studentFund['teo_view_date'] }}</p>
                               --}}
                            </li>
                            @endif
                            @if(@$studentFund->teo_status == 1)
                            @if( @$studentFund->clerk_status == 1)
           
                            <li class="ApproveTimeline">
                              <a href="#!">Clerk</a>
                              <a href="#!" class="float-end"><i class="fa fa-eye"></i>  {{ @$studentFund['clerk_view_date'] }}</a>
                              <p></p>
                              <p class="inputText badge bg-success" style="font-size: 12px">Approved </p>
                              <p  class="mt-2"><span class= "spanclr"> Name :   </span>{{ @$studentFund->clerkUser->name }}</p>
                              <p  class="mt-2"><span class= "spanclr"> Approved Date :   </span>@if(@$studentFund['clerk_status_date']!=null) {{ \Carbon\Carbon::parse(@$studentFund['clerk_status_date'])->format('d-m-Y h:i a') }}@endif</p>
                              <p  class="mt-2"><span class= "spanclr"> Approved Reason :   </span>{{ @$studentFund->clerk_status_reason}}</p>
                           </li>
                           @elseif( @$studentFund->clerk_status == 2)
           
                           <li class="rejectTimeline">
                             <a href="#!">Clerk</a>
                             <a href="#!" class="float-end"><i class="fa fa-eye"></i>  {{ @$studentFund['clerk_view_date'] }}</a>
                             <p></p>
                             <p class="inputText badge bg-danger" style="font-size: 12px">Rejected </p>
                             <p  class="mt-2"><span class= "spanclr"> Name :   </span>{{ @$studentFund->clerkUser->name }}</p>
                              
                             <p  class="mt-2"><span class= "spanclr"> Rejected Date :   </span>@if(@$studentFund['clerk_status_date']!=null) {{ \Carbon\Carbon::parse(@$studentFund['clerk_status_date'])->format('d-m-Y h:i a') }}@endif</p>
                             <p  class="mt-2"><span class= "spanclr"> Rejected Reason :   </span>{{ @$studentFund->clerk_status_reason}}</p>
                          </li>
                          @elseif( @$studentFund->clerk_status == null)
           
                          <li class="pendingTimeline">
                            <a href="#!">Clerk</a>
                            <a href="#!" class="float-end"><i class="fa fa-eye"></i>  {{ @$studentFund['clerk_view_date'] }}</a>
                            <p></p>
                            <p class="inputText badge bg-warning" style="font-size: 12px">Pending </p>
                             </li>
                             @endif
           
                             @endif 
                             @if(@$studentFund->clerk_status == 1)
                             @if( @$studentFund->assistant_status == 1)
            
                             <li class="ApproveTimeline">
                               <a href="#!">APO / ATDO</a>
                               <a href="#!" class="float-end"><i class="fa fa-eye"></i>  {{ @$studentFund['assistant_view_date'] }}</a>
                               <p></p>
                               <p class="inputText badge bg-success" style="font-size: 12px">Approved </p>
                               <p  class="mt-2"><span class= "spanclr"> Name :   </span>{{ @$studentFund->assistantUser->name }}</p>
                              
                               <p  class="mt-2"><span class= "spanclr"> Approved Date :   </span>@if(@$studentFund['assistant_status_date']!=null) {{ \Carbon\Carbon::parse(@$studentFund['assistant_status_date'])->format('d-m-Y h:i a') }}@endif</p>
                               <p  class="mt-2"><span class= "spanclr"> Approved Reason :   </span>{{ @$studentFund->teo_status_reason}}</p>
                            </li>
                            @elseif( @$studentFund->assistant_status == 2)
            
                            <li class="rejectTimeline">
                              <a href="#!">APO / ATDO</a>
                              <a href="#!" class="float-end"><i class="fa fa-eye"></i>  {{ @$studentFund['assistant_view_date'] }}</a>
                              <p></p>
                              <p class="inputText badge bg-danger" style="font-size: 12px">Rejected </p>
                              <p  class="mt-2"><span class= "spanclr"> Name :   </span>{{ @$studentFund->assistantUser->name }}</p>
                              
                              <p  class="mt-2"><span class= "spanclr"> Rejected Date :   </span>@if(@$studentFund['assistant_status_date']!=null) {{ \Carbon\Carbon::parse(@$studentFund['assistant_status_date'])->format('d-m-Y h:i a') }}@endif</p>
                              <p  class="mt-2"><span class= "spanclr"> Rejected Reason :   </span>{{ @$studentFund->assistant_status_reason}}</p>
                           </li>
                           @elseif( @$studentFund->assistant_status == null)
            
                           <li class="pendingTimeline">
                             <a href="#!">APO / ATDO</a>
                             <a href="#!" class="float-end"><i class="fa fa-eye"></i>  {{ @$studentFund['assistant_view_date'] }}</a>
                            <p></p>
                             <p class="inputText badge bg-warning" style="font-size: 12px">Pending </p>
                              </li>
                              @endif
                              @endif
                              @if(@$studentFund->assistant_status == 1)
                              @if( @$studentFund->officer_status == 1)
             
                              <li class="ApproveTimeline">
                                <a href="#!">PO / TDO</a>
                                <a href="#!" class="float-end"><i class="fa fa-eye"></i>  {{ @$studentFund['officer_view_date'] }}</a>
                                <p></p>
                                <p class="inputText badge bg-success" style="font-size: 12px">Approved </p>
                                <p  class="mt-2"><span class= "spanclr"> Name :   </span>{{ @$studentFund->officerUser->name }}</p>
                               
                                <p  class="mt-2"><span class= "spanclr"> Approved Date :   </span>@if(@$studentFund['officer_status_date']!=null) {{ \Carbon\Carbon::parse(@$studentFund['officer_status_date'])->format('d-m-Y h:i a') }}@endif</p>
                                <p  class="mt-2"><span class= "spanclr"> Approved Reason :   </span>{{ @$studentFund->officer_status_reason}}</p>
                             </li>
                             @elseif( @$studentFund->officer_status == 2)
             
                             <li class="rejectTimeline">
                               <a href="#!">PO / TDO</a>
                               <a href="#!" class="float-end"><i class="fa fa-eye"></i>  {{ @$studentFund['officer_view_date'] }}</a>
                               <p></p>
                               <p class="inputText badge bg-danger" style="font-size: 12px">Rejected </p>
                               <p  class="mt-2"><span class= "spanclr"> Name :   </span>{{ @$studentFund->officerUser->name }}</p>
                               
                               <p  class="mt-2"><span class= "spanclr"> Rejected Date :   </span>@if(@$studentFund['officer_status_date']!=null) {{ \Carbon\Carbon::parse(@$studentFund['assistant_status_date'])->format('d-m-Y h:i a') }}@endif</p>
                               <p  class="mt-2"><span class= "spanclr"> Rejected Reason :   </span>{{ @$studentFund->officer_status_reason}}</p>
                            </li>
                            @elseif( @$studentFund->officer_status == null)
             
                            <li class="pendingTimeline">
                              <a href="#!">PO / TDO</a>
                              <a href="#!" class="float-end"><i class="fa fa-eye"></i>  {{ @$studentFund['officer_view_date'] }}</a>
                             <p></p>
                              <p class="inputText badge bg-warning" style="font-size: 12px">Pending </p>
                               </li>
                               @endif
                               @endif
                            {{-- @if( @$studentFund->pjct_offcr_status == 1)
                            <li class="ApproveTimeline">
                               <a href="#!">Project Officer</a>
                               <a href="#!" class="float-end"><i class="fa fa-eye"></i>  {{ @$studentFund['pjct_offcr_view_date'] }}</a>
                               <p class="inputText badge bg-success" style="font-size: 12px">Approved</p>
                               <p class="mt-2"><span class= "spanclr">Project Officer Name  : </span>{{ @$studentFund->prjUser->name }}</p>
                               <p class="mt-2"><span class= "spanclr">District :  </span>{{ @$studentFund->district->name }}</p>
                               <p class="mt-2"><span class= "spanclr"> Approved Date :   </span>@if(@$studentFund['pjct_offcr_status_date']!=null) {{ \Carbon\Carbon::parse(@$studentFund['pjct_offcr_status_date'])->format('d-m-Y h:i a') }}@endif</p>
                            </li>
                            @elseif( @$studentFund->tdo_status == 1)
                            <li class="ApproveTimeline">
                               <a href="#!">TDO</a>
                               <a href="#!" class="float-end"><i class="fa fa-eye"></i>  {{ @$studentFund['tdo_view_date'] }}</a>
                               <p class="inputText badge bg-success" style="font-size: 12px">Approved</p>
                               <p class="mt-2"><span class= "spanclr">TDO Name  : </span>{{ @$studentFund->tdoUser->name }}</p>
                               <p class="mt-2"><span class= "spanclr">TEO  :  </span>{{ @$studentFund->teo->teo_name }}</p>
                               <p class="mt-2"><span class= "spanclr">District :  </span>{{ @$studentFund->district->name }}</p>
                               <p class="mt-2"><span class= "spanclr"> Approved Date :   </span>@if(@$studentFund['tdo_status_date']!=null) {{ \Carbon\Carbon::parse(@$studentFund['tdo_status_date'])->format('d-m-Y h:i a') }}@endif</p>
                            </li>
                            @endif
                            @if( @$studentFund->tdo_status == 2 )
                            <li class="rejectTimeline">
                               <a href="#!">TDO</a>
                               <a href="#!" class="float-end"><i class="fa fa-eye"></i>  {{ @$studentFund['tdo_view_date'] }}</a>
                               <p class="mt-2"><span class= "spanclr">TDO Name  : </span>{{ @$studentFund->tdoUser->name }}</p>
                               <p class="mt-2"><span class= "spanclr">TEO  :  </span>{{ @$studentFund->teo->teo_name }}</p>
                               <p class="mt-2"><span class= "spanclr">District :  </span>{{ @$studentFund->district->name }}</p>
                               <p class="mt-2"><span class= "spanclr"> Rejected Date :   </span>@if(@$studentFund['tdo_status_date']!=null) {{ \Carbon\Carbon::parse(@$studentFund['tdo_status_date'])->format('d-m-Y h:i a') }}@endif</p>
                               <p class="mt-2"><span class= "spanclr"> Rejected Reason :   </span>{{ @$studentFund->tdo_status_reason}}</p>
                            </li>
                            @elseif( @$studentFund->pjct_offcr_status == 2)
                            <li class="rejectTimeline">
                               <a href="#!">TDO</a>
                               <a href="#!" class="float-end"><i class="fa fa-eye"></i>  {{ @$studentFund['pjct_offcr_view_date'] }}</a>
                               <p class="inputText badge bg-danger" style="font-size: 12px">Rejected</p>
                               <p class="mt-2"><span class= "spanclr">Project Officer Name  : </span>{{ @$studentFund->prjUser->name }}</p>
                               <p class="mt-2"><span class= "spanclr">TEO  :  </span>{{ @$studentFund->teo->teo_name }}</p>
                               <p class="mt-2"><span class= "spanclr">District :  </span>{{ @$studentFund->district->name }}</p>
                               <p class="mt-2"><span class= "spanclr"> Rejected Date :   </span>@if(@$studentFund['pjct_offcr_status_date']!=null) {{ \Carbon\Carbon::parse(@$studentFund['pjct_offcr_status_date'])->format('d-m-Y h:i a') }}@endif</p>
                               <p class="mt-2"><span class= "spanclr"> Rejected Reason :   </span>{{ @$studentFund->pjct_offcr_status_reason}}</p>
                            </li>
                            @endif
                            @if(@$studentFund->tdo_status == null && @$studentFund->pjct_offcr_status == null)
                            <li class="pendingTimeline">
                               <a href="#!">PO / TDO</a>
                               <a href="#!" class="float-end"><i class="fa fa-eye"></i>
                               @if(@$studentFund->pjct_offcr_view_date != null)
                               PO :  {{ @$studentFund['pjct_offcr_view_date'] }}
                               @endif
                               @if(@$studentFund->tdo_view_date != null)
                               TDO :  {{ @$studentFund['teo_view_date'] }} 
                               @endif
                               </a>
                            </li>
                            @endif --}}
                           
                         </ul>
                 </div>
              </div>
           </div>




            </div>
        </div>
    </div>
</div>
</div>
<link rel="stylesheet" href="{{ asset('css/timeline.css') }}">
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
