@extends('layouts.app')
@section('content')
<!-- main-content -->
<div class="main-content app-content">
   <!-- container -->
   <div class="main-container container-fluid">
      <!-- breadcrumb -->
      <div class="breadcrumb-header justify-content-between row me-0 ms-0" >
         <div class="col-xl-9">
            <h4 class="content-title mb-2"> മിടുക്കരായ വിദ്യാർത്ഥികൾക്കുള്ള പ്രത്യേക പ്രോത്സാഹനo</h4>
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
         <div class="row row-sm w-100">
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
                           <h1
                              style="text-align: center;color: rgb(0, 0, 0);font-size: medium;  padding: 20px;line-height: 32px;font-weight: 600;">
                              APPLICATION FOR SSLC/PLUS TWO/ DEGREE/PG AWARD 2023-24
                           </h1>
                        </div>
                        <form action="#" method="post"
                           style="font-weight: 500;font-size: 12px;">
                           <div class="col-12" style="text-align: right;">
                              @if(@$formData['applicant_image'])
                              <img src="{{ asset('applications/student_award/' . @$formData['applicant_image']) }}" width= "100mm" height= "100mm";>
                              @endif
                           </div>
                           <div class="paper-1">
                              <div class="col-6">
                                 <label>1.	Name and address of Applicant </label>
                              </div>
                              <div class="col-6">
                                 <label> : {{ @$formData['name'] }} <br> {{ @$formData['address'] }} <br>
                                 @if (@$formData['districtRelation']['name'])
                                 {{ @$formData['districtRelation']['name'] }}
                                 @endif
                                 @if (@$formData['talukName']['taluk_name'])
                                 ,{{ @$formData['talukName']['taluk_name'] }}
                                 @endif
                                 @if (@$formData['pincode'])
                                 ,{{ @$formData['pincode'] }}
                                 @endif
                                 </label>
                              </div>
                           </div>
                           <div class="paper-1">
                              <div class="col-6">
                                 <label>2.	Examination Passed </label>
                              </div>
                              <div class="col-6">
                                 <label> : {{ @$formData['examination_passed'] }} </label>
                              </div>
                           </div>
                           <div class="paper-1">
                              <div class="col-6">
                                 <label>3.	Name of the Guardian	</label>
                              </div>
                              <div class="col-6">
                                 <label> : {{ @$formData['guardian_name'] }}</label>
                              </div>
                           </div>
                           <div class="paper-1">
                              <div class="col-6">
                                 <label>4.	Date of Birth </label>
                              </div>
                              <div class="col-6">
                                 <label> : {{ @$formData['dob'] }}</label>
                              </div>
                           </div>
                           <div class="paper-1">
                              <div class="col-6">
                                 <label>5.	Community	 </label>
                              </div>
                              <div class="col-6">
                                 <label> : {{ @$formData['community'] }}</label>
                              </div>
                           </div>
                           <div class="paper-1">
                              <div class="col-6">
                                 <label>6.	Name of Panchayath </label>
                              </div>
                              <div class="col-6">
                                 <label> : {{ @$formData['panchayath_name'] }}</label>
                              </div>
                           </div>
                           <div class="paper-1">
                              <div class="col-6">
                                 <label>7.	Name of Institution </label>
                              </div>
                              <div class="col-6">
                                 <label> : {{ @$formData['institution_name'] }}</label>
                              </div>
                           </div>
                           <div class="paper-1">
                              <div class="col-6">
                                 <label>8.	Month & Year of Pass	</label>
                              </div>
                              <div class="col-6">
                                 <label> : {{ @$formData['pass_month'] }} {{ @$formData['pass_year'] }} </label>
                              </div>
                           </div>
                           <div class="paper-1">
                              <div class="col-6">
                                 <label>9.	Phone No.	 </label>
                              </div>
                              <div class="col-6">
                                 <label> : {{ @$formData['phone'] }}</label>
                              </div>
                           </div>
                           <div class="paper-1">
                              <div class="col-6">
                                 <label>10.	Account No.		 </label>
                              </div>
                              <div class="col-6">
                                 <label> : {{ @$formData['account_number'] }}</label>
                              </div>
                           </div>
                           <div class="paper-1">
                              <div class="col-6">
                                 <label>11.	IFSC Code </label>
                              </div>
                              <div class="col-6">
                                 <label> : {{ @$formData['ifsc_code'] }} </label>
                              </div>
                           </div>
                           <div class="paper-1">
                              <div class="col-6">
                                 <label>12.	Aadhar No</label>
                              </div>
                              <div class="col-6">
                                 <label> : {{ @$formData['aadhar_number'] }} </label>
                              </div>
                           </div>
                           <br><br>
                           <h2 style="text-align: center;">DECLARATION</h2>
                           <h5 style="text-align: center;">The above given Details are true according to my best knowledge </h5>
                           <div>
                              <label>
                              {{ @$formData['name'] }}
                              </label>
                              <label  style="float: right;">  
                              @if(@$formData['signature'])
                              <img src="{{ asset('applications/student_award/' . @$formData['signature']) }}" style="width: 145px;height: 40px;" />
                              @endif
                              <br>
                              (Name and Signature)
                              </label><br>
                           </div>
                        </form>
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
                                    <label>District </label>
                                 </div>
                                 <div class="col-1">
                                    <label> : </label>
                                 </div>
                                 <div class="col-8">
                                    <label> {{ @$formData['submittedDistrict']['name'] }} </label>
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
                                    <label> {{ @$formData['submittedTeo']['teo_name'] }} </label>
                                 </div>
                              </div>
                           </div>
                           <br>
                        </div>
                        <div class="col-md-6 mb-6">
                           <a href="{{ route('studentAwardList') }}">  <input type="button" class="btn btn-primary" value="Back >>" >
                           </a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            @if(auth::user()->role=='TEO' && @$formData->teo_view_status==1)
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
                                 <div class="settings-icon">
                                     <a class="approveItem" data-id="{{ @$formData->id }}"><i class="fa fa-check bg-success me-1"></i></a>
                                     {{-- &nbsp;&nbsp;  <a class="rejectItem" data-id="{{ @$formData->id }}"><i class="fa fa-ban bg-danger "></i></a> --}}
                                  </div>
                                
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
            <div class="modal fade" id="approve-popup" style="display: none">
               <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content country-select-modal border-0">
                     <div class="modal-header offcanvas-header">
                        <h6 class="modal-title">Are you sure to Approve this Application?</h6>
                        <button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button"><span aria-hidden="true">×</span></button>
                     </div>
                     <div class="modal-body p-5">
                        <form id="ownForm">
                           @csrf
                           <div class="text-center">
                              <h5>Reason for Approval</h5>
                              <textarea class="form-control" name="approved_reason" id="approved_reason" requred></textarea>
                              <span id="approval"></span>
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
</div>
<link rel="stylesheet" href="{{ asset('css/timeline.css') }}">
<script>
   $(document).on("click", ".approveItem", function() {
       var id =$(this).attr('data-id');
           $('#requestId').val($(this).attr('data-id') );
           $('#approve-popup').modal('show');
             
         
           });
           $(document).on("click", ".rejectItem", function() {
               $('#requestId2').val($(this).attr('data-id') );
           $('#rejection-popup').modal('show');
           });
   function approve() {
   
       var reqId = $('#requestId').val();
       var reason = $('#approved_reason').val();
   
   $.ajax({
               url: "{{ route('studentAward-teo.approve') }}",
               type: "POST",
               data: {
                   "id": reqId,
                   "reason" :reason,
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
   
                   $('#example').DataTable().ajax.reload();
   
               }
           });
   }
   function reject() {
       var reason = $('#reason').val();
     
       if($('#reason').val() == ""){
           rejection.innerHTML = "<span style='color: red;'>"+"Please enter the reason for rejection</span>";
       }
       else{
           rejection.innerHTML ="";
           var reqId = $('#requestId2').val();
       console.log(reqId);
       $.ajax({
         
           url: "{{ route('studentAward-teo.reject') }}",
           type: "POST",
               data: {
                   "id": reqId,
                   "reason" :reason,
                   "_token": "{{ csrf_token() }}"
               },
           success: function(response) {
               console.log(response.success);
               toastr.success(response.success, 'Success!')
                   $('#rejection-popup').modal('hide');
                   $('#success_message').fadeIn().html(response.success);
                       setTimeout(function() {
                           $('#success_message').fadeOut("slow");
                       }, 2000 );
   
                   $('#example').DataTable().ajax.reload();
   
           }
       })
   
       }
    }
   
   
   // edit button function
   function goback() {
       if (confirm('Are you sure ? Do you want to edit this form!. ')) {
           window.history.back();
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