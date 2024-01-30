@extends('layouts.app')
@section('content')
<!-- main-content -->
<div class="main-content app-content">
   <!-- container -->
   <div class="main-container container-fluid">
      <!-- breadcrumb -->
      <div class="breadcrumb-header justify-content-between row me-0 ms-0" >
         <h4 class="content-title mb-2">    Application for financial assistance from the Department of Scheduled Tribes Development for renovation and addition of facilities and completion of houses
            {{-- (  പട്ടികവർഗ്ഗ വികസന വകുപ്പിൽനിന്ന് വീടുകളുടെ നവീകരണത്തിനും അധികസൗകര്യങ്ങൾ ഏർപെടുത്തുന്നതിനും   പൂർത്തീകരിക്കുന്നതിനുമുള്ള 
            ധനസഹായത്തിനുള്ള അപേക്ഷ)   --}}
         </h4>
         @if ($message = Session::get('error'))
         <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><i class="fa fa-window-close"></i></button>                                {{ $message }}
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
                                 @if(@$houseManagement['applicant_image'])
                                    <img src="{{ asset('homeMng/' . @$houseManagement['applicant_image']) }}" width= "100mm" height= "100mm";>
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
                                 {{ @$houseManagement['name'] }}
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
                                 {{ @$houseManagement['address'] }} , {{ @$houseManagement['current_district_name'] }} , {{ @$houseManagement['current_taluk_name'] }} , {{ @$houseManagement['pincode'] }}
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
                                 {{ @$houseManagement['panchayath'] }} /  {{ @$houseManagement['ward_no'] }}
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
                                 {{ @$houseManagement['caste'] }} 
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
                                 {{ @$houseManagement['annual_income'] }} 
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
                                 {{ @$houseManagement['house_details'] }} 
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
                                 {{ @$houseManagement['agency'] }}
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
                                 {{ @$houseManagement['last_payment_year'] }} 
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
                                 {{ @$houseManagement['family_details'] }} 
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
                                 @if(@$houseManagement['nature_payment'] == 'innovation') 
                                 നവീകരണം
                                 @elseif(@$houseManagement['nature_payment'] == 'Additional convenience') 
                                 അധിക സൗകര്യം
                                 @elseif(@$houseManagement['nature_payment'] == 'Completion') 
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
                                 @if(@$houseManagement['payment_details'] =='yes')Yes ,
                                 @else 
                                 No 
                                 @endif 
                                 @if(@$houseManagement['payment_details'] =='yes')
                                 {{ @$houseManagement['payment_amount'] }} , @if(@$houseManagement['date_received']!=null) {{ \Carbon\Carbon::parse(@$houseManagement['date_received'])->format('d-m-Y') }}@endif
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
                                 {{ @$houseManagement['prove_eligibility'] }}    </label>
                                 <br>
                                 @if($houseManagement['prove_eligibility_file'])
                                 <a href="{{ asset('homeMng/' . @$houseManagement['prove_eligibility_file']) }}" target="_blank">View</a>
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
                                 </label>: {{ @$houseManagement['place'] }}<br>
                                 <label>
                                    തീയതി
                                 </label>: {{date('d-m-Y')}}
                              </div>
                              <div class="col-6">
                                 @if($houseManagement['signature'])
                                 <img src="{{ asset('homeMng/' . @$houseManagement['signature']) }}" width="150px" height="70px">
                                 @endif
                                 <label> അപേക്ഷകന്റെ ഒപ്പ് /
                                 </label>  
                              </div>
                           </div>
                        </div>
                     </div><br>
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
                            <span class="col-6"> {{ @$houseManagement['dist_name'] }}  </span>
   
                        </div>
   
                        <div class="col-6 d-flex">
                            <span class="col-5"> ടി .ഇ .ഓ</span>
                            <span class="col-1"> :</span>
                            <span class="col-6">{{ @$houseManagement['teo_name'] }} </span>
   
                        </div>
                       
   
                    </div>
                     <br>
                  </div>
                     <div class="row">
                        <div class="col-md-4 mb-4">
                        </div>
                        <div class="col-md-6 mb-6">
                           <a href="{{ route('adminHouseGrantList') }}">  <input type="button" class="btn btn-primary" value="Back >>" >
                           </a>  
                        </div>
                     </div>
                     <br>
                    
               </div>
            </div>
         </div>
         
    

      @if(auth::user()->role=='TEO' && @$houseManagement->teo_view_status==1)
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
                              {{ @$houseManagement['teo_view_date'] }}
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
                      @if(@$houseManagement->teo_status == null)
                      <button class="btn btn-warning" >Pending</button>
                      @elseif(@$houseManagement->teo_status == 1)
                      <button class="btn btn-success" >Approved</button>
                      @elseif(@$houseManagement->teo_status == 2)
                      <button class="btn btn-danger" >Rejected</button> 
                     @endif
                     </div>
            </div>
            @if(@$houseManagement->teo_status == null)
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
                 <a class="approveItem" data-id="{{ @$houseManagement->id }}"><i class="fa fa-check bg-success me-1"></i></a>
                 &nbsp;&nbsp;  <a class="rejectItem" data-id="{{ @$houseManagement->id }}"><i class="fa fa-ban bg-danger "></i></a>
           
             
             </div>
             </div>
          
    </div>
        @endif
            @if(@$houseManagement->teo_status == 2)
            <div class="pb-2 row ">
               <div class="col-5">
                  <label>Rejected Reason  </label><br>
               </div>
               <div class="col-1 w-100">
                  <label> :  
                  </label>
               </div>
               <div class="col-6">
            {{ @$houseManagement->teo_status_reason }}
            
               </div>
      </div>
      @endif
      @if(@$houseManagement->teo_status != null)
            <div class=" pb-2 row ">
               <div class="col-5">
                  @if(@$houseManagement->teo_status == 1)
                  <label>Approved Date  </label>
                  @elseif(@$houseManagement->teo_status == 2)
                  <label>Rejected Date  </label>
                 @endif
                  
                  <br>
               </div>
               <div class="col-1 w-100">
                  <label> :  
                  </label>
               </div>
               <div class="col-6">
                  @if(@$houseManagement['teo_status_date']!=null) {{ \Carbon\Carbon::parse(@$houseManagement['teo_status_date'])->format('d-m-Y h:i a') }}@endif
              
               
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
                    url: "{{ route('housegrant-teo.approve') }}",
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
              
                url: "{{ route('housegrant-teo.reject') }}",
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