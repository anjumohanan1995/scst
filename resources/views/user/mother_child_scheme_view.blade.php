@extends('layouts.app')

@section('content')
    <!-- main-content -->
    <div class="main-content app-content">
        <!-- container -->
        <div class="main-container container-fluid">
            <!-- breadcrumb -->
            <div class="breadcrumb-header justify-content-between row me-0 ms-0">



                @if ($message = Session::get('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><i
                                class="fa fa-window-close"></i></button> {{ $message }}
                    </div>
                @endif
            </div>
            <!-- /breadcrumb -->


            <div class="main-content-body">
                <div class="row row-sm w-100">
                    <div class="col-sm-12 col-md-12 col-lg-8">



                        <div id="showPrint" class="card overflow-hidden" >

                            <div class="card-body pd-y-7">

                                <div id="btnHide" class="row justify-content-end m-3">
                                    <a style="width: 50px" onclick="printDiv()"><img
                                            src="{{ asset('admin/uploads/icons/printer.png') }}" alt=""></a>
                                </div>
                                <div id="print_content">
                                <h1
                                    style="text-align: center;color: rgb(0, 0, 0);font-size: medium; text-decoration: underline; padding: 20px;line-height: 32px;font-weight: 600;">
                                    ജനനി-ജനനി -ജന്മരക്ഷ <br> പ്രസവാനുകുല്യം - മാതൃശിശു സംരക്ഷണ പദ്ധതി <br> അപേക്ഷഫോറം
sdeasdsdsdsd
                                </h1>
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
                                            <label> {{ @$formData['age'] }} , @if (@$formData['dob'] != null)
                                                    {{ \Carbon\Carbon::parse(@$formData['dob'])->format('d-m-Y') }}
                                                @endif </label>
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
                                            <label>
                                                @if (@$formData['expected_date_of_delivery'] != null)
                                                    {{ \Carbon\Carbon::parse(@$formData['expected_date_of_delivery'])->format('d-m-Y') }}
                                                @endif
                                            </label>
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
                                                    @if ($formData['applicant_photo'])
                                                 
                                                        <img src="{{ asset('applications/mother_child_protection/' . @$formData['applicant_photo']) }}" width="120px" height="60px">
                                                @endif
                                                    <label>അപേക്ഷകന്റെ ഫോട്ടോ</label>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-4 d-flex">
                                            <div class="row d-flex col-12">
                                                <div class="col-8">
                                                    @if (@$formData['signature'] != null)
                                                        <img src="{{ asset('applications/mother_child_protection/' . @$formData['signature']) }}"
                                                            width="120px" height="60px">
                                                    @endif
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
                                        </div>
                                    </div>



                                </form>
                            </div>
                            </div>


                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
                        <div class="pt-2 card overflow-hidden">
                           <div class="card-body">
                              <ul class="timeline-3">
                                 @if(@$formData->teo_status == 1)
                                 <li class="ApproveTimeline">
                                    <a href="#!">TEO</a>
                                    <a href="#!" class="float-end"><i class="fa fa-eye"></i>  {{ @$formData['teo_view_date'] }}</a>
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
                                   <p  class="mt-2"><span class= "spanclr"> Approved Date :   </span>@if(@$formData['teo_status_date']!=null) {{ \Carbon\Carbon::parse(@$formData['teo_status_date'])->format('d-m-Y h:i a') }}@endif</p>
                                   <p  class="mt-2"><span class= "spanclr"> Approved Reason :   </span>{{ @$formData->teo_status_reason}}</p>
                                </li>
                                @elseif( @$formData->clerk_status == 2)
                
                                <li class="rejectTimeline">
                                  <a href="#!">Clerk</a>
                                  <a href="#!" class="float-end"><i class="fa fa-eye"></i>  {{ @$formData['clerk_view_date'] }}</a>
                                  <p></p>
                                  <p class="inputText badge bg-danger" style="font-size: 12px">Rejected </p>
                                  <p  class="mt-2"><span class= "spanclr"> Name :   </span>{{ @$formData->clerkUser->name }}</p>
                                   
                                  <p  class="mt-2"><span class= "spanclr"> Rejected Date :   </span>@if(@$formData['teo_status_date']!=null) {{ \Carbon\Carbon::parse(@$formData['teo_status_date'])->format('d-m-Y h:i a') }}@endif</p>
                                  <p  class="mt-2"><span class= "spanclr"> Rejected Reason :   </span>{{ @$formData->teo_status_reason}}</p>
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
                                 {{-- @endif  --}}
                              </ul>
                           </div>
                        </div>
                     </div>
                </div>
              
            </div>
        </div>
    </div>
    <link rel="stylesheet" href="{{ asset('css/timeline.css') }}">
    <style>
        @media print {
            body * {
                visibility: hidden;
            }

            #btnHide {
                display: none;
            }


            #showPrint * {
                visibility: visible;
            }

        }
    </style>
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
