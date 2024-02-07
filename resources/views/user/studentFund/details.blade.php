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
                                                <img src="{{ asset('medEngStudentFund/' . @$studentFund['signature']) }}" width="150px" height="70px">
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
                                                <img src="{{ asset('medEngStudentFund/' . @$studentFund['parent_signature']) }}" width="150px" height="70px">
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
                                         <a href="{{ route('MedicalEngineeringStudentFund.index') }}">  <input type="button" class="btn btn-primary" value="Back >>" >
                                         </a>  </div>
                                                
                                                
        
                                            </div><br>
                                 
                            
                                
                                <br>

                        </div>
                    </div>
                </div>
                @if( @$studentFund->teo_view_status==1)
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
                   <div class="pt-2 card overflow-hidden">
                   
                      <div class="card-body">
                         
                               <div class="pb-2 row ">
                                  <div class="col-5">
                                     <label><i class="fas fa-eye" style="color: blue"></i>TEO Viewed Date  </label><br>
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
            </div>
        </div>

</div>
</div>
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
