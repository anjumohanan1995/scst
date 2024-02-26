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
                            <h1
                            style="text-align: center;color: rgb(0, 0, 0);font-size: medium;  padding: 20px;line-height: 32px;font-weight: 600;">
                            APPLICATION FOR SSLC/PLUS TWO/ DEGREE/PG AWARD 2023-24
                        </h1>

                        <div class="paper-1 pt-4">
                            <div class="w-100">
                               <div class="row w-100">
                                  <div class="col-12" style="text-align: right;">
                                     @if(@$formData['applicant_image'])
                                        <img src="{{ asset('applications/student_award/' . @$formData['applicant_image']) }}" width= "100mm" height= "100mm";>
                                     @endif
                                  </div>
                               </div>
                            </div>
                         </div>
                        
                                    <form action="#" method="post"
                                        style="font-weight: 500;font-size: 12px;padding: 90px;">
                                        
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

                    <h2 style="text-align: center;">DECLARATION</h2>
                    <h5 style="text-align: center;">The above given Details are true according to my best knowledge </h5>


                    

                   
                   
                        <div>
                            <label>
                                {{ @$formData['name'] }}
                            </label>
                            <label  style="float: right;">  
                                @if($formData['signature'])
                                <img src="{{ asset('applications/student_award/' . @$formData['signature']) }}" style="width: 145px;height: 40px;" />
                           @endif
                           <br>
                           (Name and Signature)
                        
                        </label><br>
                         
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
                        </div><br></br>

                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
                    <div class="pt-2 card overflow-hidden">
                    
                       <div class="card-body">
                         <ul class="timeline-3">
                          
                             <li class="ApproveTimeline">
                               <a href="#!">TEO</a>
                               <a href="#!" class="float-end">@if( @$formData['teo_view_date'] !='')<i class="fa fa-eye"></i>  {{ @$formData['teo_view_date'] }}@endif</a>
                               <br>
                               <p class="inputText badge bg-success" style="font-size: 12px">Approved </p>
                               <p class="mt-2"><span class= "spanclr">TEO  :  </span>{{ @$formData->submittedTeo->teo_name }}</p>
                               <p class="mt-2"><span class= "spanclr"> Name : </span>{{ @$formData->teoUser->name }}</p>
                               <p class="mt-2"><span class= "spanclr">District :  </span>{{ @$formData->submittedDistrict->name }}</p>
                               <p  class="mt-2"><span class= "spanclr"> Approved Date :   </span>@if(@$formData['teo_status_date']!=null) {{ \Carbon\Carbon::parse(@$formData['teo_status_date'])->format('d-m-Y h:i a') }}@endif</p>
                               <p  class="mt-2"><span class= "spanclr"> Approved Reason :   </span>{{ @$formData->teo_status_reason}}</p>
                             
                             </li>
                             <li class="ApproveTimeline">
                                <a href="#!">Clerk</a>
                                <a href="#!" class="float-end"><i class="fa fa-eye"></i>  {{ @$formData['clerk_view_date'] }}</a>
                                <br>
                                <p class="inputText badge bg-success" style="font-size: 12px">Approved </p>
                                <p  class="mt-2"><span class= "spanclr"> Clerk Name :   </span>{{ @$formData->clerkUser->name }}</p>
                              
                                <p  class="mt-2"><span class= "spanclr"> Approved Date :   </span>@if(@$formData['clerk_status_date']!=null) {{ \Carbon\Carbon::parse(@$formData['clerk_status_date'])->format('d-m-Y h:i a') }}@endif</p>
                                <p  class="mt-2"><span class= "spanclr"> Approved Reason :   </span>{{ @$formData->clerk_status_reason}}</p>
                             </li>
                             @if( @$formData->assistant_status == null)
                             <li class="pendingTimeline">
                                <a href="#!">{{ auth::user()->name }}</a>
                                <a href="#!" class="float-end"><i class="fa fa-eye"></i>  {{ @$formData['assistant_view_date'] }}</a>
                                <br>
                                <p class="inputText badge bg-warning" style="font-size: 12px">Pending</p>
                                <div class="settings-icon">
                                   <a class="approveItem" data-id="{{ @$formData->id }}"><i class="fa fa-check bg-success me-1"></i></a>
                                   &nbsp;&nbsp;  <a class="rejectItem" data-id="{{ @$formData->id }}"><i class="fa fa-ban bg-danger "></i></a>
                                </div>
                             </li>
                             @elseif( @$formData->assistant_status == 1)
                             <li class="ApproveTimeline">
                                <a href="#!">{{ auth::user()->name }}</a>
                                <a href="#!" class="float-end"><i class="fa fa-eye"></i>  {{ @$formData['assistant_view_date'] }}</a>
                                <br>
                                <p class="inputText badge bg-success" style="font-size: 12px">Approved </p>
            
                                <p  class="mt-2"><span class= "spanclr"> Approved Date :   </span>@if(@$formData['assistant_status_date']!=null) {{ \Carbon\Carbon::parse(@$formData['assistant_status_date'])->format('d-m-Y h:i a') }}@endif</p>
                                <p  class="mt-2"><span class= "spanclr"> Approved Reason :   </span>{{ @$formData->assistant_status_reason}}</p>
                             </li>
                             @elseif( @$formData->assistant_status == 2)
                             <li class="rejectTimeline">
                                <a href="#!">{{ auth::user()->name }}</a>
                                <a href="#!" class="float-end"><i class="fa fa-eye"></i>  {{ @$formData['assistant_view_date'] }}</a>
                                <br>
                                <p class="inputText badge bg-danger" style="font-size: 12px">Rejected </p>
                                <p  class="mt-2"><span class= "spanclr"> Rejected Date :   </span>@if(@$formData['assistant_status_date']!=null) {{ \Carbon\Carbon::parse(@$formData['assistant_status_date'])->format('d-m-Y h:i a') }}@endif</p>
                                <p  class="mt-2"><span class= "spanclr"> Rejected Reason :   </span>{{ @$formData->assistant_status_reason}}</p>
                             </li>
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
                            <h6 class="modal-title">Are you sure to Approve this Application?</h6><button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button"><span aria-hidden="true">×</span></button>
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
                url: "{{ route('studentAward-assistant.approve') }}",
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
          
            url: "{{ route('studentAward-assistant.reject') }}",
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


    // edit button function
    function goback() {
        if (confirm('Are you sure ? Do you want to edit this form!. ')) {
            window.history.back();
        }
        return
    }



</script>
@endsection