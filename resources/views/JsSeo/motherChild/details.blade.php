@extends('layouts.app')
@section('content')
<!-- main-content -->
<div class="main-content app-content">
<!-- container -->
<div class="main-container container-fluid">
   <!-- breadcrumb -->
   <div class="breadcrumb-header justify-content-between row me-0 ms-0" >
      @if ($message = Session::get('error'))
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><i class="fa fa-window-close"></i></button>                                {{ $message }}
      </div>
      @endif
   </div>
   <!-- /breadcrumb -->
   <div class="main-content-body">
      <div class="row row-sm">
         <div class="col-xl-8 col-lg-12 col-md-12 col-sm-12">
            <div class="card overflow-hidden" >
               <div class="card-body pd-y-7">
                  <div class="card-body pd-y-7">
                     <div id="btnHide" class="row justify-content-end m-3">
                        <a style="width: 50px" onclick="printDiv()"><img
                                src="{{ asset('admin/uploads/icons/printer.png') }}" alt=""></a>
                    </div>

                    <div id="print_content">
                        <div id="success_message" class="ajax_response" style="display: none;"></div>
                        <div class="mb-4 main-content-label">
                     <h1
                        style="text-align: center;color: rgb(0, 0, 0);font-size: medium; text-decoration: underline; padding: 20px;line-height: 32px;font-weight: 600;">
                        ജനനി-ജനനി -ജന്മരക്ഷ <br> പ്രസവാനുകുല്യം - മാതൃശിശു സംരക്ഷണ പദ്ധതി <br> അപേക്ഷഫോറം
                     </h1>
                        </div>
                     <form action="#" method="post" style="font-weight: 500;font-size: 12px;padding: 90px;">
                        <div class=" row paper-1">
                           <div class="col-5">
                              <label>1. പേര് </label>
                           </div>
                           <div class="col-1">
                              <label> : </label>
                           </div>
                           <div class="col-6">
                              <label> {{ @$formData['name'] }} </label>
                           </div>
                        </div>
                        <div class=" row paper-1">
                           <div class="col-5">
                              <label>1. മേൽവിലാസം (പിൻകോഡ് സഹിതം) </label>
                           </div>
                           <div class="col-1">
                              <label> : </label>
                           </div>
                           <div class="col-6">
                              <label> {{ @$formData['address'] }} </label>
                           </div>
                        </div>
                        <div class=" row paper-1">
                           <div class="col-5">
                              <label> ജില്ല </label>
                           </div>
                           <div class="col-1">
                              <label> : </label>
                           </div>
                           <div class="col-6">
                              <label> {{ @$formData['districtRelation']['name'] }} </label>
                           </div>
                        </div>
                        <div class=" row paper-1">
                           <div class="col-5">
                              <label> താലൂക്ക് </label>
                           </div>
                           <div class="col-1">
                              <label> : </label>
                           </div>
                           <div class="col-6">
                              <label> {{ @$formData['TalukName']['taluk_name'] }} </label>
                           </div>
                        </div>
                        <div class=" row paper-1">
                           <div class="col-5">
                              <label> പിൻകോഡ് </label>
                           </div>
                           <div class="col-1">
                              <label> : </label>
                           </div>
                           <div class="col-6">
                              <label> {{ @$formData['pincode'] }} </label>
                           </div>
                        </div>
                        <div class=" row paper-1">
                           <div class="col-5">
                              <label>3.വയസ്, ജനനതീയതി</label>
                           </div>
                           <div class="col-1">
                              <label> : </label>
                           </div>
                           <div class="col-6">
                              <label> {{ @$formData['age'] }} , {{ @$formData['dob'] }} </label>
                           </div>
                        </div>
                        <div class=" row paper-1">
                           <div class="col-5">
                              <label>4. .ഭർത്താവിന്റെ പേര് </label>
                           </div>
                           <div class="col-1">
                              <label> : </label>
                           </div>
                           <div class="col-6">
                              <label> {{ @$formData['hus_name'] }} </label>
                           </div>
                        </div>
                        <div class=" row paper-1">
                           <div class="col-5">
                              <label>5. സമുദായം / ജാതി</label>
                           </div>
                           <div class="col-1">
                              <label> : </label>
                           </div>
                           <div class="col-6">
                              <label> {{ @$formData['caste'] }} </label>
                           </div>
                        </div>
                        <div class=" row paper-1">
                           <div class="col-5">
                              <label>6.വില്ലേജ് </label>
                           </div>
                           <div class="col-1">
                              <label> : </label>
                           </div>
                           <div class="col-6">
                              <label> {{ @$formData['village'] }} </label>
                           </div>
                        </div>
                        <div class=" row paper-1">
                           <div class="col-5">
                              <label>7.എത്രാമത്തെ പ്രസവം </label>
                           </div>
                           <div class="col-1">
                              <label> : </label>
                           </div>
                           <div class="col-6">
                              <label> {{ @$formData['births'] }} </label>
                           </div>
                        </div>
                        <div class=" row paper-1">
                           <div class="col-5">
                              <label>8.പ്രസവം നടക്കുമെന്ന് പ്രതീക്ഷിക്കുന്ന തിയതി </label>
                           </div>
                           <div class="col-1">
                              <label> : </label>
                           </div>
                           <div class="col-6">
                              <label> {{ @$formData['expected_date_of_delivery'] }} </label>
                           </div>
                        </div>
                        <div class=" row paper-1">
                           <div class="col-5">
                              <label>9. ഗർഭ /പ്രസവ ശുശ്രുഷക്ക് ആശ്രയിക്കുന്ന ആശുപത്രി /കുടുംബക്ഷേമ
                              കേന്ദ്രം </label>
                           </div>
                           <div class="col-1">
                              <label> : </label>
                           </div>
                           <div class="col-6">
                              <label> {{ @$formData['dependent_hospital'] }} </label>
                           </div>
                        </div>
                        <div class="row mt-5">
                           <div class="row d-flex flex-direction-row col-4">
                              <div class="row col-12">
                                 <div class="col-3">
                                    <label>സ്ഥലം </label>
                                 </div>
                                 <div class="col-1">
                                    <label> : </label>
                                 </div>
                                 <div class="col-2">
                                    <label> {{ @$formData['place'] }} </label>
                                 </div>
                              </div>
                              <div class="row col-12">
                                 <div class="col-3">
                                    <label>തീയതി </label>
                                 </div>
                                 <div class="col-1">
                                    <label> : </label>
                                 </div>
                                 <div class="col-7">
                                    <label> {{ date('d-m-Y') }} </label>
                                 </div>
                              </div>
                           </div>
                           <div class="col-4 d-flex">
                              <div class="row d-flex col-12">
                                 <div class="col-8">
                                    @if (@$formData['applicant_photo'])
                                    <img src="{{ asset('applications/mother_child_protection/' . @$formData['applicant_photo']) }}" width="120px" height="60px">
                                    @endif
                                    <label>അപേക്ഷകന്റെ ഫോട്ടോ</label>
                                 </div>
                              </div>
                           </div>
                           <div class="col-4 d-flex">
                              <div class="row d-flex col-12" >
                                 <div class="col-8">
                                    <img src="{{ asset('applications/mother_child_protection/' . @$formData['signature']) }}" width="120px" height="60px">
                                    <label>അപേക്ഷകന്റെ ഒപ്പ്</label>
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
                           <div class="row d-flex flex-direction-row col-6">
                              <div class="row col-12">
                                 <div class="col-3">
                                    <label>ജില്ല </label>
                                 </div>
                                 <div class="col-1">
                                    <label> : </label>
                                 </div>
                                 <div class="col-2">
                                    <label> {{ @$formData['submittedDistrict']['name'] }} </label>
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
                                    <label> {{ @$formData['submittedTeo']['teo_name'] }} </label>
                                 </div>
                              </div>
                              </div><br>
                              <div class="row">
                                 <div class="col-md-4 mb-4">
                                 <div class="col-md-6 mb-6">
                                  <a href="{{ route('motherChildSchemeListJsSeo') }}">  <input type="button" class="btn btn-primary" value="Back >>" >
                                  </a>  </div>
                                  </div><br>
                           </div>
                        </div>
                     </form>
                  </div>
                  </div>
               </div>
            </div>
         </div>

         @if(Auth::user()->role == 'JS' || Auth::user()->role == 'SEO') 
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
                           <div class="settings-icon">
                              <a class="approveItem" data-id="{{ @$formData->id }}"><i class="fa fa-check bg-success me-1"></i></a>
                              &nbsp;&nbsp;  <a class="rejectItem" data-id="{{ @$formData->id }}"><i class="fa fa-ban bg-danger "></i></a>
                           </div>
                          
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
                              <div class="settings-icon">
                                 <a class="approveItem" data-id="{{ @$formData->id }}"><i class="fa fa-check bg-success me-1"></i></a>
                                 &nbsp;&nbsp;  <a class="rejectItem" data-id="{{ @$formData->id }}"><i class="fa fa-ban bg-danger "></i></a>
                              </div>
                            
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
                               <div class="settings-icon">
                                 <a class="approveItem" data-id="{{ @$formData->id }}"><i class="fa fa-check bg-success me-1"></i></a>
                                 &nbsp;&nbsp;  <a class="rejectItem" data-id="{{ @$formData->id }}"><i class="fa fa-ban bg-danger "></i></a>
                              </div>
                            
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
                           <h5>Reason for Approve</h5>
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
                     <h6 class="modal-title">Are you sure to return this Application?</h6>
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
<link rel="stylesheet" href="{{ asset('css/timeline.css') }}">
<meta name="csrf_token" content="{{ csrf_token() }}" />
<link rel="stylesheet" href="{{ asset('css/toastr.min.css') }}">
<script src="{{ asset('js/toastr.js') }}"></script>
<script type="text/javascript">
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
            var reason = $('#approve_reason').val();
           var reqId = $('#requestId').val();
   
       $.ajax({
                   url: "{{ route('motherChildScheme.JsSeo.approve') }}",
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
   
                       setTimeout(function() {
   window.location.reload();
   }, 2000);
   
                   }
               });
   }
   function reject() {
           var reason = $('#reason').val();
         
           if($('#reason').val() == ""){
               rejection.innerHTML = "<span style='color: red;'>"+"Please enter the reason for Return</span>";
           }
           else{
               rejection.innerHTML ="";
               var reqId = $('#requestId2').val();
           console.log(reqId);
           $.ajax({
             
               url: "{{ route('motherChildScheme.JsSeo.reject') }}",
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
   
                           setTimeout(function() {
   window.location.reload();
   }, 2000);
   
               }
           })
   
           }
        }
   
           
</script>    
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