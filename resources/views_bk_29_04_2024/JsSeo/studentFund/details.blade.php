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
					<div class="card">
						<div class="card-body  p-5">
                            <div id="btnHide" class="row justify-content-end m-3">
                                <a style="width: 50px" onclick="printDiv()"><img
                                        src="{{ asset('admin/uploads/icons/printer.png') }}" alt=""></a>
                            </div>
                             <div id="print_content">
							    <div id="success_message" class="ajax_response" style="display: none;"></div>
								<div class="mb-4 main-content-label">
                                    <h4 class="medical__form--h1 text-center m-3">
                                        <b><u>മെഡിക്കൽ / എഞ്ചിനിയറിംഗ് കോഴ്‌സുകളിലെ പട്ടികജാതി വിദ്യാർത്ഥികൾക്ക്
                                            പ്രാരംഭചെലവുകൾക്ക് ധനസഹായം അനുവദിക്കുന്നതിനുള്ള അപേക്ഷ</u></b>
                                    </h4>
                                    </div>
                                    <div class="paper-1 pt-4">
                                        <div class="w-100">
                                           <div class="row w-100">
                                              <div class="col-12" style="text-align: right;">
                                                 @if(@$studentFund['applicant_image'])
                                                    <img src="{{ asset('medEngStudentFund/' . @$studentFund['applicant_image']) }}" width= "100mm" height= "100mm";>
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
                                                    , {{ @$studentFund['current_district_name'] }}  , {{ @$studentFund['current_pincode'] }} </td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>പഞ്ചായത്തിൻ്റെ പേര്

                                                </td>
                                                <td>{{ @$studentFund['panchayath'] }} </td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>കോഴ്‌സിന്റെ പേര്

                                                </td>
                                                <td>{{ @$studentFund['course_name'] }} </td>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td>സ്ഥാപനത്തിൻ്റെ തരം

                                                </td>
                                                <td>{{ @$studentFund['institution_type'] }} </td>
                                            </tr>
                                            <tr>
                                                <td>5</td>
                                                <td>നടപ്പ് അദ്ധ്യയന വർഷം <br>ക്ലാസ് ആരംഭിച്ച തീയതി
                                                </td>
                                                <td> @if(@$studentFund['class_start_date']!=null){{ \Carbon\Carbon::parse(@$studentFund['class_start_date'])->format('d-m-Y') }}@endif</td>
                                            </tr>
                                            <tr>
                                                <td>6</td>
                                                <td>അപേക്ഷകനെ പ്രവേശനം ലഭിച്ചത്
                                                </td>
                                                <td> @if(@$studentFund['admission_type'] == 'merit') 
                        
                                                    മെരിറ്റ്
                                                    @elseif(@$studentFund['admission_type'] == 'innovation') 
                                                    സംവരണം
                                                    @elseif(@$studentFund['admission_type'] == 'management') 
                                                    മാനേജ്‌മന്റ്
                                                    @elseif(@$studentFund['admission_type'] == 'others') 
                                                    മറ്റുള്ളവ ,  {{ @$studentFund['other_details'] }}
                                                    @endif
                                                 </td>
                                            </tr>
                                            <tr>
                                                <td>7</td>
                                                <td>അലോട്ട്മെൻ്റ് മെമ്മോ

                                                </td>
                                                <td> @if(@$studentFund['allotment_memo'])
                                                    <a href="{{ asset('medEngStudentFund/' . @$studentFund['allotment_memo']) }}" target="_blank">View</a>
                                                    @endif</td>
                                            </tr>
                                            <tr>
                                                <td>8</td>
                                                <td>അപേക്ഷകന്റെ ജാതി/ മതം <br>
                                                    (സർട്ടിഫിക്കറ്റ് ഹാജരാക്കണം )

                                                </td>
                                                <td>{{ @$studentFund['caste'] }} <br> @if($studentFund['caste_certificate'])
                                                    <a href="{{ asset('medEngStudentFund/' . @$studentFund['caste_certificate']) }}" target="_blank">View</a>
                                                    @endif</td>
                                            </tr>
                                            <tr>
                                                <td>9</td>
                                                <td>അപേക്ഷകന്റെ വരുമാനം <br>
                                                    (സർട്ടിഫിക്കറ്റ് ഹാജരാക്കണം )

                                                </td>
                                                <td> {{ @$studentFund['income'] }} <br> @if($studentFund['income_certificate'])
                                                    <a href="{{ asset('medEngStudentFund/' . @$studentFund['income_certificate']) }}" target="_blank">View</a>
                                                    @endif</td>
                                            </tr>
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

                                        </tbody>
                                    </table>
                                   
                                   <br><br>
                                    <div class="row ">

                                        <div class="col-6 d-flex">
                                            <span class="col-5"> അപേക്ഷന്റെ ഒപ്പ്
                                            </span>
                                            <span class="col-1"> :</span>
                                            <span class="col-6"> @if($studentFund['signature'])
                                                <img src="{{ asset('medEngStudentFund/' . @$studentFund['signature']) }}" width="120px" height="60px">
                                                @endif </span>

                                        </div>

                                        <div class="col-6 d-flex">
                                            <span class="col-5"> അപേക്ഷന്റെ  പേര്</span>
                                            <span class="col-1"> :</span>
                                            <span class="col-6">{{@$studentFund['name']}} </span>

                                        </div>

                                    </div>
                                  <br>
                                    <div class="row ">

                                        {{-- <div class="col-6 d-flex">
                                            <span class="col-5"> രക്ഷാകർത്താവിന്റെ ഒപ്പ്
                                            </span>
                                            <span class="col-1"> :</span>
                                            <span class="col-6"> @if($studentFund['parent_signature'])
                                                <img src="{{ asset('medEngStudentFund/' . @$studentFund['parent_signature']) }}" width="120px" height="60px">
                                                @endif </span>

                                        </div> --}}

                                        <div class="col-6 d-flex">
                                            <span class="col-5"> രക്ഷാകർത്താവിന്റെ  പേര്</span>
                                            <span class="col-1"> :</span>
                                            <span class="col-6">{{@$studentFund['parent_name']}} </span>

                                        </div>

                                    </div>   <br><br>
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
                                            <span class="col-6"> {{ @$studentFund['dist_name'] }}  </span>
    
                                        </div>
    
                                        <div class="col-6 d-flex">
                                            <span class="col-5"> ടി .ഇ .ഓ</span>
                                            <span class="col-1"> :</span>
                                            <span class="col-6">{{ @$studentFund['teo_name'] }} </span>
    
                                        </div>
                                     
    
                                    </div>
                                  
                                    <br><br>
                        </div>
                                    <div class="row">
                                        <div class="col-md-4 mb-4">
                                          
                                             
                                                 </div>
                                        <div class="col-md-6 mb-6">
                                         <a href="{{ route('studentFundListJsSeo') }}">  <input type="button" class="btn btn-primary" value="Back >>" >
                                         </a>  </div>
                                                
                                                
        
                                            </div><br>
                                 
                            
                                
                                <br>

                        </div>
                    </div>
                </div>
        

                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
                    <div class="pt-2 card overflow-hidden">
                    
                       <div class="card-body">
                         <ul class="timeline-3">
                          
                             <li class="ApproveTimeline">
                               <a href="#!">TEO</a>
                               <a href="#!" class="float-end">@if( @$studentFund['teo_view_date'] !='')<i class="fa fa-eye"></i>  {{ @$studentFund['teo_view_date'] }}@endif</a>
                               <br>
                               <p class="inputText badge bg-success" style="font-size: 12px">Approved </p>
                               <p class="mt-2"><span class= "spanclr">TEO  :  </span>{{ @$studentFund->teo->teo_name }}</p>
                               <p class="mt-2"><span class= "spanclr"> Name : </span>{{ @$studentFund->teoUser->name }}</p>
                               <p class="mt-2"><span class= "spanclr">District :  </span>{{ @$studentFund->district->name }}</p>
                               <p  class="mt-2"><span class= "spanclr"> Approved Date :   </span>@if(@$studentFund['teo_status_date']!=null) {{ \Carbon\Carbon::parse(@$studentFund['teo_status_date'])->format('d-m-Y h:i a') }}@endif</p>
                               <p  class="mt-2"><span class= "spanclr"> Approved Reason :   </span>{{ @$studentFund->teo_status_reason}}</p>
                             
                             </li>
                             @if( @$studentFund->clerk_status == null)
    
                             <li class="pendingTimeline">
                              <a href="#!">{{ auth::user()->name }}</a>
                              <a href="#!" class="float-end"><i class="fa fa-eye"></i>  {{ @$studentFund['clerk_view_date'] }}</a>
                              <br>       
                              <p class="inputText badge bg-warning" style="font-size: 12px">Pending</p>
                                     <div class="settings-icon">
                                         <a class="approveItem" data-id="{{ @$studentFund->id }}"><i class="fa fa-check bg-success me-1"></i></a>
                                         &nbsp;&nbsp;  <a class="rejectItem" data-id="{{ @$studentFund->id }}"><i class="fa fa-ban bg-danger "></i></a>
                                      </div>
                                    
                                 </li>
                               
                                 @elseif( @$studentFund->clerk_status == 1)
    
                                 <li class="ApproveTimeline">
                                  <a href="#!">{{ auth::user()->name }}</a>
                                  <a href="#!" class="float-end"><i class="fa fa-eye"></i>  {{ @$studentFund['clerk_view_date'] }}</a>
                                  <br>
                                  <p class="inputText badge bg-success" style="font-size: 12px">Approved </p>
                             
                                  <p  class="mt-2"><span class= "spanclr"> Approved Date :   </span>@if(@$studentFund['clerk_status_date']!=null) {{ \Carbon\Carbon::parse(@$studentFund['clerk_status_date'])->format('d-m-Y h:i a') }}@endif</p>
                                  <p  class="mt-2"><span class= "spanclr"> Approved Reason :   </span>{{ @$studentFund->clerk_status_reason}}</p>
                                
                                     </li>
                                     @elseif( @$studentFund->clerk_status == 2)
    
                                     <li class="rejectTimeline">
                                      <a href="#!">{{ auth::user()->name }}</a>
                                      <a href="#!" class="float-end"><i class="fa fa-eye"></i>  {{ @$studentFund['clerk_view_date'] }}</a>
                                      <br>
                                      <p class="inputText badge bg-danger" style="font-size: 12px">Rejected </p>
                                 
                                      <p  class="mt-2"><span class= "spanclr"> Rejected Date :   </span>@if(@$studentFund['clerk_status_date']!=null) {{ \Carbon\Carbon::parse(@$studentFund['clerk_status_date'])->format('d-m-Y h:i a') }}@endif</p>
                                      <p  class="mt-2"><span class= "spanclr"> Rejected Reason :   </span>{{ @$studentFund->clerk_status_reason}}</p>
                                    
                                         </li>
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
                         </ul>
             
                 <!-- /row -->
             </div>
             
    </div>
    </div>


                 <div class="modal fade" id="approve-popup" style="display: none">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content country-select-modal border-0">
                            <div class="modal-header offcanvas-header">
                                <h6 class="modal-title">Are you sure?</h6><button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button"><span aria-hidden="true">×</span></button>
                            </div>
                            <div class="modal-body p-5">
                                <div class="text-center">
                                    <h4>Are you sure to Approve this Application?</h4>
                                </div>
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
                                <h6 class="modal-title">Are you sure to reject this Application?</h6><button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button"><span aria-hidden="true">×</span></button>
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
<meta name="csrf_token" content="{{ csrf_token() }}" />
<link rel="stylesheet" href="{{ asset('css/timeline.css') }}">

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
                var reason = $('#approved_reason').val();
            var reqId = $('#requestId').val();
    
        $.ajax({
                    url: "{{ route('studentFund-JsSeo.approve') }}",
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
                rejection.innerHTML = "<span style='color: red;'>"+"Please enter the reason for rejection</span>";
            }
            else{
                rejection.innerHTML ="";
                var reqId = $('#requestId2').val();
            console.log(reqId);
            $.ajax({
              
                url: "{{ route('studentFund-JsSeo.reject') }}",
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
