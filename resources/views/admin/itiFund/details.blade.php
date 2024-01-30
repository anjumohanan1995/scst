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
                                            <td>കോഴ്‌സിന്റെ പേര്

                                            </td>
                                            <td>{{ @$studentFund['course_name'] }} </td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>നടപ്പ് അദ്ധ്യയന വർഷം <br>ക്ലാസ് ആരംഭിച്ച തീയതി
                                            </td>
                                            <td>@if(@$studentFund['class_start_date']!=null){{ \Carbon\Carbon::parse(@$studentFund['class_start_date'])->format('d-m-Y') }}@endif</td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
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
                                            <td>5</td>
                                            <td>അപേക്ഷകന്റെ ജാതി/ മതം <br>
                                                (സർട്ടിഫിക്കറ്റ് ഹാജരാക്കണം )

                                            </td>
                                            <td>{{ @$studentFund['caste'] }} <br> @if($studentFund['caste_certificate'])
                                                <a href="{{ asset('itiStudentFund/' . @$studentFund['caste_certificate']) }}" target="_blank" >View</a>
                                                @endif</td>
                                        </tr>
                                        <tr>
                                            <td>6</td>
                                            <td>അപേക്ഷകന്റെ വരുമാനം <br>
                                                (സർട്ടിഫിക്കറ്റ് ഹാജരാക്കണം )

                                            </td>
                                            <td> {{ @$studentFund['income'] }} <br> @if($studentFund['income_certificate'])
                                                <a href="{{ asset('itiStudentFund/' . @$studentFund['income_certificate']) }}" target="_blank" >View</a>
                                                @endif</td>
                                        </tr>
                                        <tr>
                                            <td>7</td>
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
                                        <span class="col-5"> രക്ഷാകർത്താവിന്റെ ഒപ്പ്
                                        </span>
                                        <span class="col-1"> :</span>
                                        <span class="col-6"> @if($studentFund['parent_signature'])
                                            <img src="{{ asset('itiStudentFund/' . @$studentFund['parent_signature']) }}" width="150px" height="70px">
                                            @endif </span>

                                    </div>

                                    <div class="col-6 d-flex">
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
                               <br><br>
                            <br>
                        </div>
                            <div class="row">
                                <div class="col-md-4 mb-4">
                                  
                                     
                                         </div>
                                <div class="col-md-6 mb-6">
                                 <a href="{{ route('adminItiFundList') }}">  <input type="button" class="btn btn-primary" value="Back >>" >
                                 </a>  </div>
                                        
                                        

                                    </div><br>
                    </div>
                </div>
            </div>
            @if(auth::user()->role=='TEO' && @$studentFund->teo_view_status==1)
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
                                 {{ @$studentFund['teo_view_date'] }}
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
                         @if(@$studentFund->teo_status == null)
                         <button class="btn btn-warning" >Pending</button>
                         @elseif(@$studentFund->teo_status == 1)
                         <button class="btn btn-success" >Approved</button>
                         @elseif(@$studentFund->teo_status == 2)
                         <button class="btn btn-danger" >Rejected</button> 
                        @endif
                        </div>
               </div>
               @if(@$studentFund->teo_status == null)
               <div class="pb-2 row ">
                <div class="col-5">
                   <label>Action </label><br>
                </div>
                <div class="col-1 w-100">
                   <label> :  
                   </label>
                </div>
                <div class="col-6">
                    <div class="settings-main-icon">
                    <a class="approveItem" data-id="{{ @$studentFund->id }}"><i class="fa fa-check bg-success me-1"></i></a>
                    &nbsp;&nbsp;  <a class="rejectItem" data-id="{{ @$studentFund->id }}"><i class="fa fa-ban bg-danger "></i></a>
              
                
                </div>
                </div>
             
       </div>
           @endif
               @if(@$studentFund->teo_status == 2)
               <div class="pb-2 row ">
                  <div class="col-5">
                     <label>Rejected Reason  </label><br>
                  </div>
                  <div class="col-1 w-100">
                     <label> :  
                     </label>
                  </div>
                  <div class="col-6">
               {{ @$studentFund->teo_status_reason }}
               
                  </div>
         </div>
         @endif
               @if(@$studentFund->teo_status != null)
               <div class=" pb-2 row ">
                  <div class="col-5">
                     @if(@$studentFund->teo_status == 1)
                     <label>Approved Date  </label>
                     @elseif(@$studentFund->teo_status == 2)
                     <label>Rejected Date  </label>
                    @endif
                     
                     <br>
                  </div>
                  <div class="col-1 w-100">
                     <label> :  
                     </label>
                  </div>
                  <div class="col-6">
                     @if(@$studentFund['teo_status_date']!=null) {{ \Carbon\Carbon::parse(@$studentFund['teo_status_date'])->format('d-m-Y h:i a') }}@endif
                 
                  
                  </div>
         </div>
         @endif
                  </div>
               </div>
            </div>
             @endif

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
    
            var reqId = $('#requestId').val();
    
        $.ajax({
                    url: "{{ route('itiScholarship-teo.approve') }}",
                    type: "POST",
                    data: {
                        "id": reqId,
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
              
                url: "{{ route('itiScholarship-teo.reject') }}",
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
