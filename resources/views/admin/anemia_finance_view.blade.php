@extends('layouts.app')
@section('content')
<style>
   table {
   width: 100%;
   border-collapse: collapse;
   margin-top: 20px;
   }
   th, td {
   border: 1px solid #ddd;
   padding: 8px;
   text-align: left;
   }
   th {
   background-color: #f2f2f2;
   }
</style>
<!-- main-content -->
<div class="main-content app-content">
   <!-- container -->
   <div class="main-container container-fluid">
      <!-- breadcrumb -->
      <div class="breadcrumb-header justify-content-between row me-0 ms-0" >
         <div class="col-xl-9">
            <h4 class="content-title mb-2">സിക്കിൾസെൽ അനീമിയരോഗികൾക്ക് പ്രതിമാസ ധനസഹായം നൽകുന്ന പദ്ധതി</h4>
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
               <div class="card">
                  <div class="card-body p-5">
                     <div id="btnHide" class="row justify-content-end m-3">
                        <a style="width: 50px" onclick="printDiv()">
                        <img src="{{ asset('admin/uploads/icons/printer.png') }}" alt="">
                        </a>
                     </div>
                     <div id="print_content">
                        <div id="success_message" class="ajax_response" style="display: none;"></div>
                        <div class="mb-4 main-content-label">
                           <h4 class="medical__form--h1 text-center m-3">
                              <b>പട്ടികവർഗ്ഗ വികസന വകുപ്പ്<br> സിക്കിൾസെൽ അനീമിയരോഗികൾക്ക് പ്രതിമാസ ധനസഹായം</b>
                           </h4>
                        </div>
                           <div class="m-5">
                              <h6 class="text-center"><u>അപേക്ഷ ഫോറം</u></h6>
                           </div>
                           <form action="#" method="post">
                              <table>
                                 <thead></thead>
                                 <tbody>
                                    <tr>
                                       <td>പേര്<br></td>
                                       <td>{{ @$formData['name'] }}</td>
                                    </tr>
                                    <tr>
                                       <td>ജനന തീയതി
                                       </td>
                                       <td>{{ @$formData['dob'] }}</td>
                                    </tr>
                                    <tr>
                                       <td>വയസ്സ്
                                       </td>
                                       <td>{{ @$formData['age'] }}</td>
                                    </tr>
                                    <tr>
                                       <td>ജാതി<br> (സർട്ടിഫിക്കറ്റ് ഹാജരാക്കണം )
                                       </td>
                                       <td>{{ @$formData['caste'] }} <br>
                                          @if($formData['caste_certificate'])
                                          <a href="{{ asset('applications/anemia_finance/' . @$formData['caste_certificate']) }}" target="_blank">View</a>
                                          @endif
                                       </td>
                                    </tr>
                                    <tr>
                                       <td>മേൽവിലാസം
                                       </td>
                                       <td> {{ @$formData['address'] }} 
                                          <br>
                                          @if (@$formData['districtRelation']['name'])
                                          {{ @$formData['districtRelation']['name'] }}
                                          @endif
                                          @if (@$formData['talukName']['taluk_name'])
                                          ,{{ @$formData['talukName']['taluk_name'] }}
                                          @endif
                                          @if (@$formData['pincode'])
                                          ,{{ @$formData['pincode'] }}
                                          @endif
                                       </td>
                                    </tr>
                                    <tr>
                                       <td>ആധാർ നമ്പർ <br>
                                          (പകർപ്പ് ഹാജരാക്കണം )
                                       </td>
                                       <td>{{ @$formData['adhaar_number'] }} <br>
                                          @if($formData['adhaar_copy'])
                                          <a href="{{ asset('applications/anemia_finance/' . @$formData['adhaar_copy']) }}" target="_blank">View</a>
                                          @endif
                                       </td>
                                    </tr>
                                    <tr>
                                       <td>ബാങ്ക് അക്കൗണ്ട് വിശദംശങ്ങൾ<br>
                                          (പാസ്സ് ബുക്കിന്റെ പകർപ്പ് ഹാജരാക്കണം )
                                       </td>
                                       <td>{{ @$formData['bank_account_details'] }} <br>
                                          @if($formData['passbook_copy'])
                                          <a href="{{ asset('applications/anemia_finance/' . @$formData['passbook_copy']) }}" target="_blank">View</a>
                                          @endif
                                       </td>
                                    </tr>
                                    <tr>
                                       <td>ഫോൺ നമ്പർ
                                       </td>
                                       <td> {{ @$formData['phone'] }}</td>
                                    </tr>
                                    <tr>
                                       <td>ഇ - മെയിൽ ഐഡി
                                       </td>
                                       <td> {{ @$formData['email'] }}</td>
                                    </tr>
                                    <tr>
                                       <td>റേഷൻ കാർഡ്
                                          (പകർപ്പ് ഹാജരാക്കണം )
                                       </td>
                                       <td>{{ @$formData['ration_card_type'] }} <br>
                                          @if($formData['ration_card'])
                                          <a href="{{ asset('applications/anemia_finance/' . @$formData['ration_card']) }}" target="_blank">View</a>
                                          @endif
                                       </td>
                                    </tr>
                                    <tr>
                                       <td>മെഡിക്കൽ സർട്ടിഫിക്കറ്റ് ഹാജരാക്കിയിട്ടുണ്ടോ<br>
                                          (മെഡിക്കൽ സർട്ടിഫിക്കറ്റ് ഹാജരാക്കണം )
                                       </td>
                                       <td>{{ @$formData['is_medical_certificate_submitted'] }} <br>
                                          @if($formData['medical_certificate'])
                                          <a href="{{ asset('applications/anemia_finance/' . @$formData['medical_certificate']) }}" target="_blank">View</a>
                                          @endif
                                       </td>
                                    </tr>
                                 </tbody>
                              </table>
                              <div class="m-5">
                                 <h6 class="text-center"><u>സത്യപ്രസ്താവന</u></h6>
                              </div>
                              <div class="m-5 ">
                                 <p class="text-center">മേൽ പ്രസ്താവിച്ച വിവരങ്ങൾ പൂർണമായും സത്യമാണെന്ന് ബോധിപ്പിക്കുന്നു</p>
                              </div>
                              <div class="d-flex row">
                                 <div class="col-4">
                                    <label>സ്ഥലം: {{ @$formData['place'] }} </label><br>
                                 </div>
                                 <div  class="col-4">
                                 </div>
                                 <div  class="col-4">
                                    <div>
                                       <label> പേര്: {{ @$formData['name'] }} 
                                       </label>
                                    </div>
                                 </div>
                              </div>
                              <div class="d-flex row">
                                 <div class="col-4">
                                    <label>തീയതി : {{ @date('d-m-Y') }}</label><br>
                                 </div>
                                 <div  class="col-4">
                                    <label>  ഫോട്ടോ
                                    :   
                                    @if($formData['applicant_photo'])
                                    <img src="{{ asset('applications/anemia_finance/' . @$formData['applicant_photo']) }}" width="120px" height="60px">
                                    @endif
                                    </label>
                                 </div>
                                 <div class="col-4">
                                    <label> ഒപ്പ്
                                    :   
                                    @if($formData['signature'])
                                    <img src="{{ asset('applications/anemia_finance/' . @$formData['signature']) }}" width="120px" height="60px">
                                    @endif
                                    </label>
                                 </div>
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
                                       <label>ജില്ല </label>
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
                              <br><br><br>
                              <div class="col-md-6 mb-6">
                                 <a href="{{ route('anemiaFinanceList') }}">
                                 <input type="button" class="btn btn-primary" value="Back >>">
                                 </a>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            @if(auth::user()->role=='TEO' && @$formData->teo_view_status==1)
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
               <div class="pt-2 card overflow-hidden">
                  <div class="card-body">
                     <ul class="timeline-3">
                        @if( @$formData->teo_status == null)
                        <li class="pendingTimeline">
                           <a href="#!">TEO</a>
                           <a href="#!" class="float-end"><i class="fa fa-eye"></i>  {{ @$formData['teo_view_date'] }}</a>
                           <br>       
                           <p class="inputText badge bg-warning" style="font-size: 12px">Pending</p>
                           <div class="settings-icon">
                              <a class="approveItem" data-id="{{ @$formData->id }}"><i class="fa fa-check bg-success me-1"></i></a>
                              &nbsp;&nbsp;  <a class="rejectItem" data-id="{{ @$formData->id }}"><i class="fa fa-ban bg-danger "></i></a>
                           </div>
                        </li>
                        @elseif( @$formData->teo_status == 1)
                        <li class="ApproveTimeline">
                           <a href="#!">TEO</a>
                           <a href="#!" class="float-end"><i class="fa fa-eye"></i>  {{ @$formData['teo_view_date'] }}</a>
                           <br>
                           <p class="inputText badge bg-success" style="font-size: 12px">Approved </p>
                           <p  class="mt-2"><span class= "spanclr"> Approved Date :   </span>@if(@$formData['teo_status_date']!=null) {{ \Carbon\Carbon::parse(@$formData['clerk_status_date'])->format('d-m-Y h:i a') }}@endif</p>
                           <p  class="mt-2"><span class= "spanclr"> Approved Reason :   </span>{{ @$formData->teo_status_reason}}</p>
                        </li>
                        @elseif( @$formData->teo_status == 2)
                        <li class="rejectTimeline">
                           <a href="#!">TEO</a>
                           <a href="#!" class="float-end"><i class="fa fa-eye"></i>  {{ @$formData['teo_view_date'] }}</a>
                           <br>
                           <p class="inputText badge bg-danger" style="font-size: 12px">Rejected </p>
                           <p  class="mt-2"><span class= "spanclr"> Rejected Date :   </span>@if(@$formData['teo_status_date']!=null) {{ \Carbon\Carbon::parse(@$formData['clerk_status_date'])->format('d-m-Y h:i a') }}@endif</p>
                           <p  class="mt-2"><span class= "spanclr"> Rejected Reason :   </span>{{ @$formData->teo_status_reason}}</p>
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
                           <p  class="mt-2"><span class= "spanclr"> Approved Date :   </span>@if(@$formData['clerk_status_date']!=null) {{ \Carbon\Carbon::parse(@$formData['assistant_status_date'])->format('d-m-Y h:i a') }}@endif</p>
                           <p  class="mt-2"><span class= "spanclr"> Approved Reason :   </span>{{ @$formData->clerk_status_reason}}</p>
                        </li>
                        @elseif( @$formData->clerk_status == 2)
                        <li class="rejectTimeline">
                           <a href="#!">Clerk</a>
                           <a href="#!" class="float-end"><i class="fa fa-eye"></i>  {{ @$formData['clerk_view_date'] }}</a>
                           <p></p>
                           <p class="inputText badge bg-danger" style="font-size: 12px">Rejected </p>
                           <p  class="mt-2"><span class= "spanclr"> Name :   </span>{{ @$formData->clerkUser->name }}</p>
                           <p  class="mt-2"><span class= "spanclr"> Rejected Date :   </span>@if(@$formData['clerk_status_date']!=null) {{ \Carbon\Carbon::parse(@$formData['assistant_status_date'])->format('d-m-Y h:i a') }}@endif</p>
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
                     </ul>
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
<link rel="stylesheet" href="{{ asset('css/toastr.min.css') }}">
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
           url: "{{ route('anemiaFinance-teo.approve') }}",
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
   
               $('#approve_reason').val('');     
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
     
       url: "{{ route('anemiaFinance-teo.reject') }}",
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
   
                   $('#reason').val('');    
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
   
   function printDiv() {
       var printContents = document.getElementById('print_content').innerHTML;
   var originalContents = document.body.innerHTML;
   
   document.body.innerHTML = printContents;
   
   window.print();
   
   document.body.innerHTML = originalContents;
           }
</script>
@endsection