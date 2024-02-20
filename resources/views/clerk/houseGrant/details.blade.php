@extends('layouts.app')
@section('content')
<!-- main-content -->
<div class="main-content app-content">
<!-- container -->
<div class="main-container container-fluid">
   <!-- breadcrumb -->
   <div class="breadcrumb-header justify-content-between row me-0 ms-0" >
      <div class="col-xl-9">
         {{-- 
         <h4 class="content-title mb-2">  അയ്യങ്കാളി ടാലന്റ് സേർച്ച് &ഡെവലപ്പ്മെന്റ് സ്‌കീം പ്രവേശന പരീക്ഷക്കുള്ള അപേക്ഷ </h4>
         --}}
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
               <div class="card-body p-5">
                  <div id="btnHide" class="row justify-content-end m-3">
                     <a style="width: 50px" onclick="printDiv()"><img
                        src="{{ asset('admin/uploads/icons/printer.png') }}" alt=""></a>
                  </div>
                  <div id="print_content">
                     <h1
                        style="text-align: center;color: rgb(0, 0, 0);font-size: medium;  padding: 20px;line-height: 32px;font-weight: 600;"><u>
                        പട്ടികവർഗ്ഗ വികസന വകുപ്പിൽനിന്ന് വീടുകളുടെ നവീകരണത്തിനും അധികസൗകര്യങ്ങൾ ഏർപെടുത്തുന്നതിനും   പൂർത്തീകരിക്കുന്നതിനുമുള്ള 
                        ധനസഹായത്തിനുള്ള അപേക്ഷ</u>
                     </h1>
                     <div class="paper-1 pt-4">
                        <div class="w-100">
                           <div class="row w-100">
                              <div class="col-12" style="text-align: right;">
                                 @if(@$formData['applicant_image'])
                                 <img src="{{ asset('homeMng/' . @$formData['applicant_image']) }}" width= "100mm" height= "100mm";>
                                 @endif
                              </div>
                           </div>
                        </div>
                     </div>
                     <br>
                     <br>
                     <div class="paper-1">
                        <div class="w-100">
                           <div class="row w-100">
                              <div class="col-5">
                                 <label>1. അപേക്ഷകന്റെ പേര്  </label><br>
                              </div>
                              <div class="col-1 w-100">
                                 <label> :  
                                 </label>
                              </div>
                              <div class="col-6">
                                 <label> 
                                 {{ @$formData['name'] }}
                                 </label>
                              </div>
                           </div>
                        </div>
                     </div>
                     <br>
                     <div class="paper-1">
                        <div class="w-100">
                           <div class="row w-100">
                              <div class="col-5">
                                 <label>2. മേൽവിലാസം  </label><br>
                              </div>
                              <div class="col-1 w-100">
                                 <label> :  
                                 </label>
                              </div>
                              <div class="col-6">
                                 <label> 
                                 {{ @$formData['address'] }} , {{ @$formData['current_district_name'] }} , {{ @$formData['current_taluk_name'] }} , {{ @$formData['pincode'] }}
                                 </label>
                              </div>
                           </div>
                        </div>
                     </div>
                     <br>
                     <div class="paper-1">
                        <div class="w-100">
                           <div class="row w-100">
                              <div class="col-5">
                                 <label>3. ഗ്രാമപഞ്ചായത്ത്‌/ വാർഡ് നമ്പർ 
                                 </label><br>
                              </div>
                              <div class="col-1 w-100">
                                 <label> :  
                                 </label>
                              </div>
                              <div class="col-6">
                                 <label> 
                                 {{ @$formData['panchayath'] }} /  {{ @$formData['ward_no'] }}
                                 </label>
                              </div>
                           </div>
                        </div>
                     </div>
                     <br>
                     <div class="paper-1">
                        <div class="w-100">
                           <div class="row w-100">
                              <div class="col-5">
                                 <label>4. ജാതി 
                                 </label><br>
                              </div>
                              <div class="col-1 w-100">
                                 <label> :  
                                 </label>
                              </div>
                              <div class="col-6">
                                 <label> 
                                 {{ @$formData['caste'] }} 
                                 </label>
                              </div>
                           </div>
                        </div>
                     </div>
                     <br>
                     <div class="paper-1">
                        <div class="w-100">
                           <div class="row w-100">
                              <div class="col-5">
                                 <label>5. വാർഷിക വരുമാനം 
                                 </label><br>
                              </div>
                              <div class="col-1 w-100">
                                 <label> :  
                                 </label>
                              </div>
                              <div class="col-6">
                                 <label> 
                                 {{ @$formData['annual_income'] }} 
                                 </label>
                              </div>
                           </div>
                        </div>
                     </div>
                     <br>
                     <div class="paper-1">
                        <div class="w-100">
                           <div class="row w-100">
                              <div class="col-5">
                                 <label>6. 
                                 ധനസഹായത്തിനപേക്ഷിക്കുന്ന  വീടിന്റ അവസ്ഥയും അനുവദിച്ച വർഷവും 
                                 </label><br>
                              </div>
                              <div class="col-1 w-100">
                                 <label> :  
                                 </label>
                              </div>
                              <div class="col-6">
                                 <label> 
                                 {{ @$formData['house_details'] }} 
                                 </label>
                              </div>
                           </div>
                        </div>
                     </div>
                     <br>
                     <div class="paper-1">
                        <div class="w-100">
                           <div class="row w-100">
                              <div class="col-5">
                                 <label>7. അനുവദിച്ച ഏജൻസി/ വകുപ്പ് 
                                 </label><br>
                              </div>
                              <div class="col-1 w-100">
                                 <label> :  
                                 </label>
                              </div>
                              <div class="col-6">
                                 <label> 
                                 {{ @$formData['agency'] }}
                                 </label>
                              </div>
                           </div>
                        </div>
                     </div>
                     <br>
                     <div class="paper-1">
                        <div class="w-100">
                           <div class="row w-100">
                              <div class="col-5">
                                 <label>8. വീടുപണി പൂർത്തിയായി അവസാന ഗഡു കൈപ്പറ്റിയ വർഷം  
                                 </label><br>
                              </div>
                              <div class="col-1 w-100">
                                 <label> :  
                                 </label>
                              </div>
                              <div class="col-6">
                                 <label> 
                                 {{ @$formData['last_payment_year'] }} 
                                 </label>
                              </div>
                           </div>
                        </div>
                     </div>
                     <br>
                     <div class="paper-1">
                        <div class="w-100">
                           <div class="row w-100">
                              <div class="col-5">
                                 <label>9. കുടുംബത്തിന്റെ അവസ്ഥ  (അവിവാഹിതരായ :
                                 അമ്മ, വനിത നാഥയായ കുടുംബം , അകാലത്തിൽ
                                 വിധവയാകേണ്ടി വന്നവർ , ശാരീരിക മാനസിക
                                 വേല്ലുവിളി നേരിടുന്നവർ , തീരാവ്യാധി പിടിപ്പെട്ടവർ ,
                                 അതികർമങ്ങൾക്ക് ഇരയായ വനിതകൾ തുടങ്ങിയവ)
                                 </label><br>
                              </div>
                              <div class="col-1 w-100">
                                 <label> :  
                                 </label>
                              </div>
                              <div class="col-6">
                                 <label> 
                                 {{ @$formData['family_details'] }} 
                                 </label>
                              </div>
                           </div>
                        </div>
                     </div>
                     <br>
                     <div class="paper-1">
                        <div class="w-100">
                           <div class="row w-100">
                              <div class="col-5">
                                 <label>10. 
                                 ധനസഹായം ആവശ്യപ്പെടുന്ന പ്രവർത്തിയുടെ സ്വഭാവം 
                                 (നവീകരണം  / അധിക സൗകര്യം / പൂർത്തീകരണം )
                                 </label><br>
                              </div>
                              <div class="col-1 w-100">
                                 <label> :  
                                 </label>
                              </div>
                              <div class="col-6">
                                 <label> 
                                 @if(@$formData['nature_payment'] == 'innovation') 
                                 നവീകരണം
                                 @elseif(@$formData['nature_payment'] == 'Additional convenience') 
                                 അധിക സൗകര്യം
                                 @elseif(@$formData['nature_payment'] == 'Completion') 
                                 പൂർത്തീകരണം
                                 @endif
                                 </label>
                              </div>
                           </div>
                        </div>
                     </div>
                     <br>
                     <div class="paper-1">
                        <div class="w-100">
                           <div class="row w-100">
                              <div class="col-5">
                                 <label>11. നിർദിഷ്ട്ട ആവശ്യത്തിനും മറ്റ് സർക്കാർ വകുപ്പ് / 
                                 ഏജൻസികളിൽനിന്നോ തദ്ദേശ സ്വയംഭരണാ സ്ഥാപനങ്ങളിൽ നിന്നോ 
                                 ധനസഹായം ലഭിച്ചിട്ടുണ്ടോ എന്നുള്ള  വിവരം  
                                 (ഉണ്ടെങ്കിൽ എത്ര തുക ,ലഭിച്ച തീയതി )
                                 </label><br>
                              </div>
                              <div class="col-1 w-100">
                                 <label> :  
                                 </label>
                              </div>
                              <div class="col-6">
                                 <label> 
                                 @if(@$formData['payment_details'] =='yes')Yes ,
                                 @else 
                                 No 
                                 @endif 
                                 @if(@$formData['payment_details'] =='yes')
                                 {{ @$formData['payment_amount'] }} , @if(@$formData['date_received']!=null) {{ \Carbon\Carbon::parse(@$formData['date_received'])->format('d-m-Y') }}@endif
                                 @endif 
                                 </label>
                              </div>
                           </div>
                        </div>
                     </div>
                     <br> 
                     <div class="paper-1">
                        <div class="w-100">
                           <div class="row w-100">
                              <div class="col-5">
                                 <label>12. മുൻഗണന ലഭിക്കുന്നതിനുള്ള അർഹത തെളിയിക്കുന്നതിനുമുള്ള
                                 </label><br>
                              </div>
                              <div class="col-1 w-100">
                                 <label> :  
                                 </label>
                              </div>
                              <div class="col-6">
                                 <label> 
                                 {{ @$formData['prove_eligibility'] }}    </label>
                                 <br>
                                 @if($formData['prove_eligibility_file'])
                                 <a href="{{ asset('homeMng/' . @$formData['prove_eligibility_file']) }}" target="_blank">View</a>
                                 @endif
                              </div>
                           </div>
                        </div>
                     </div>
                     <br><br>
                     <div class="paper-1">
                        <div class="w-100">
                           <div class="row w-100">
                              <div class="col-5">
                                 <label>സ്ഥലം
                                 </label>: {{ @$formData['place'] }}<br>
                                 <label>
                                 തീയതി
                                 </label>: {{date('d-m-Y')}}
                              </div>
                              <div class="col-6">
                                 @if($formData['signature'])
                                 <img src="{{ asset('homeMng/' . @$formData['signature']) }}" width="150px" height="70px">
                                 @endif
                                 <label> അപേക്ഷകന്റെ ഒപ്പ് /
                                 </label>  
                              </div>
                           </div>
                        </div>
                     </div>
                     <br>
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
                           <span class="col-6"> {{ @$formData['dist_name'] }}  </span>
                        </div>
                        <div class="col-6 d-flex">
                           <span class="col-5"> ടി .ഇ .ഓ</span>
                           <span class="col-1"> :</span>
                           <span class="col-6">{{ @$formData['teo_name'] }} </span>
                        </div>
                     </div>
                     <br>
                  </div>
                  {{-- <div class="row">
                     <div class="col-md-4 mb-4">
                     </div>
                     <div class="col-md-6 mb-6">
                        <a href="{{ route('adminHouseGrantList') }}">  <input type="button" class="btn btn-primary" value="Back >>" >
                        </a>  
                     </div>
                  </div> --}}
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
                        <a href="#!" class="float-end">@if( @$formData['teo_view_date'] !='')<i class="fa fa-eye"></i>  {{ @$formData['teo_view_date'] }}@endif</a>
                        <br>
                        <p class="inputText badge bg-success" style="font-size: 12px">Approved </p>
                        <p class="mt-2"><span class= "spanclr">TEO  :  </span>{{ @$formData->teo->teo_name }}</p>
                        <p class="mt-2"><span class= "spanclr"> Name : </span>{{ @$formData->teoUser->name }}</p>
                        <p class="mt-2"><span class= "spanclr">District :  </span>{{ @$formData->district->name }}</p>
                        <p  class="mt-2"><span class= "spanclr"> Approved Date :   </span>@if(@$formData['teo_status_date']!=null) {{ \Carbon\Carbon::parse(@$formData['teo_status_date'])->format('d-m-Y h:i a') }}@endif</p>
                        <p  class="mt-2"><span class= "spanclr"> Approved Reason :   </span>{{ @$formData->teo_status_reason}}</p>
                     </li>
                     @if( @$formData->clerk_status == null)
                     <li class="pendingTimeline">
                        <a href="#!">{{ auth::user()->name }}</a>
                        <a href="#!" class="float-end"><i class="fa fa-eye"></i>  {{ @$formData['clerk_view_date'] }}</a>
                        <br>
                        <p class="inputText badge bg-warning" style="font-size: 12px">Pending</p>
                        <div class="settings-icon">
                           <a class="approveItem" data-id="{{ @$formData->id }}"><i class="fa fa-check bg-success me-1"></i></a>
                           &nbsp;&nbsp;  <a class="rejectItem" data-id="{{ @$formData->id }}"><i class="fa fa-ban bg-danger "></i></a>
                        </div>
                     </li>
                     @elseif( @$formData->clerk_status == 1)
                     <li class="ApproveTimeline">
                        <a href="#!">{{ auth::user()->name }}</a>
                        <a href="#!" class="float-end"><i class="fa fa-eye"></i>  {{ @$formData['clerk_view_date'] }}</a>
                        <br>
                        <p class="inputText badge bg-success" style="font-size: 12px">Approved </p>
                        <p  class="mt-2"><span class= "spanclr"> Approved Date :   </span>@if(@$formData['clerk_status_date']!=null) {{ \Carbon\Carbon::parse(@$formData['clerk_status_date'])->format('d-m-Y h:i a') }}@endif</p>
                        <p  class="mt-2"><span class= "spanclr"> Approved Reason :   </span>{{ @$formData->clerk_status_reason}}</p>
                     </li>
                     @elseif( @$formData->clerk_status == 2)
                     <li class="rejectTimeline">
                        <a href="#!">{{ auth::user()->name }}</a>
                        <a href="#!" class="float-end"><i class="fa fa-eye"></i>  {{ @$formData['clerk_view_date'] }}</a>
                        <br>
                        <p class="inputText badge bg-danger" style="font-size: 12px">Rejected </p>
                        <p  class="mt-2"><span class= "spanclr"> Rejected Date :   </span>@if(@$formData['clerk_status_date']!=null) {{ \Carbon\Carbon::parse(@$formData['clerk_status_date'])->format('d-m-Y h:i a') }}@endif</p>
                        <p  class="mt-2"><span class= "spanclr"> Rejected Reason :   </span>{{ @$formData->clerk_status_reason}}</p>
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
<link rel="stylesheet" href="{{ asset('css/timeline.css') }}">
<meta name="csrf_token" content="{{ csrf_token() }}" />
<link rel="stylesheet" href="{{ asset('css/toastr.min.css') }}">
<script src="{{ asset('js/toastr.js') }}"></script>
<script>
   $(document).on("click",".approveItem",function() {
     var id =$(this).attr('data-id');
     $('#requestId').val($(this).attr('data-id') );
     $('#approve-popup').modal('show');
    });
    $(document).on("click",".rejectItem",function() {
   
     var id =$(this).attr('data-id');
     $('#requestId2').val($(this).attr('data-id') );
     $('#rejection-popup').modal('show');
    });
   
    function approve() {
         var reason = $('#approve_reason').val();
         var reqId = $('#requestId').val();
   
         $.ajax({
             url: "{{ route('houseGrant.clerk.approve') }}",
             type: "POST",
             data: {
                 "id": reqId,
                 "reason": reason,
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
   
         if ($('#reason').val() == "") {
             rejection.innerHTML = "<span style='color: red;'>" + "Please enter the reason for rejection</span>";
         } else {
             rejection.innerHTML = "";
             var reqId = $('#requestId2').val();
             console.log(reqId);
             $.ajax({
   
                 url: "{{ route('houseGrant.clerk.reject') }}",
                 type: "POST",
                 data: {
                     "id": reqId,
                     "reason": reason,
                     "_token": "{{ csrf_token() }}"
                 },
                 success: function(response) {
                     console.log(response.success);
                     toastr.success(response.success, 'Success!')
                     $('#rejection-popup').modal('hide');
                     $('#success_message').fadeIn().html(response.success);
                     setTimeout(function() {
                         $('#success_message').fadeOut("slow");
                     }, 2000);
   
                     setTimeout(function() {
   window.location.reload();
   }, 2000);
   
                 }
             })
   
         }
     }
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