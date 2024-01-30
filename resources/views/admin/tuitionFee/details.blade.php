@extends('layouts.app')
@section('content')

<!-- main-content -->
<div class="main-content app-content">
	<!-- container -->
	<div class="main-container container-fluid">
		<!-- breadcrumb -->
		<div class="breadcrumb-header justify-content-between row me-0 ms-0" >
			<div class="col-xl-9">
				<h4 class="content-title mb-2">പട്ടിക വർഗ്ഗ വികസന വകുപ്പിൽ നിന്നും 8 ,9 ,10 ,11 ,12  ക്ലാസ്സുകളിൽ പഠിക്കുന്നു കുട്ടികൾക്ക് ട്യൂഷൻ ഫീസിനുള്ള അപേക്ഷ 
 
                </h4>
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

                                <div class="card-body pd-y-5">

                                    <div id="btnHide" class="row justify-content-end m-3">
                                        <a style="width: 50px" onclick="printDiv()"><img
                                                src="{{ asset('admin/uploads/icons/printer.png') }}" alt=""></a>
                                    </div>
                                    <div id="print_content">

                                    <h4 class="medical__form--h1 text-center m-5">
                                        <u><b>പട്ടിക വർഗ്ഗ വികസന വകുപ്പിൽ നിന്നും 8 ,9 ,10 ,11 ,12 ക്ലാസ്സുകളിൽ
                                                <br>പഠിക്കുന്നു കുട്ടികൾക്ക്ട്യൂഷൻ ഫീസിനുള്ള അപേക്ഷ
                                            </b></u>

                                        </b>
                                    </h4>




                                    <form action="#" method="post"
                                        style="font-weight: 500;font-size: 12px;padding: 90px;">

                                    <div class="paper-1">
                                        <div class="w-100">
                                            <div class="row w-100">
                                                <div class="col-5">

                                                    <label>1. അപേക്ഷകന്റെ പേര് </label><br>

                                                </div>


                                                <div class="col-1 w-100">
                                                    <label> :  
                                                    
                                                    </label>

                                                </div>

                                                <div class="col-6">
                                                    <label> {{ @$formData['name'] }} <br>
                                                             </label>

                                                </div>
                                            </div>
                                            

                                        </div>

                                    </div>


                                    <div class="paper-1">
                                        <div class="w-100">
                                            <div class="row w-100">
                                                <div class="col-5">

                                                    <label>2. മേൽവിലാസം </label><br>

                                                </div>


                                                <div class="col-1 w-100">
                                                    <label> :  
                                                    
                                                    </label>

                                                </div>

                                                <div class="col-6">
                                                    <label> {{ @$formData['address'] }} <br>
                                                    {{ @$formData['current_district_name'] }} {{ @$formData['current_taluk_name'] }} {{ @$formData['current_pincode'] }}
                                                             </label>

                                                </div>
                                            </div>
                                            

                                        </div>

                                    </div>

                                    <div class="paper-1">
                                        <div class="w-100">
                                            <div class="row w-100">
                                                <div class="col-5">

                                                    <label>3. ഫോൺ നമ്പർ</label><br>

                                                </div>


                                                <div class="col-1 w-100">
                                                    <label> :  
                                                    
                                                    </label>

                                                </div>

                                                <div class="col-6">
                                                    <label> {{ @$formData['mobile'] }} <br>
                                                             </label>

                                                </div>
                                            </div>
                                            

                                        </div>

                                    </div>

                                    <div class="paper-1">
                                        <div class="w-100">
                                            <div class="row w-100">
                                                <div class="col-5">

                                                    <label>4. ജാതി /മതം</label><br>

                                                </div>


                                                <div class="col-1 w-100">
                                                    <label> :  
                                                    
                                                    </label>

                                                </div>

                                                <div class="col-6">
                                                    <label> {{ @$formData['caste'] }} <br>
                                                             </label>

                                                </div>
                                            </div>
                                            

                                        </div>

                                    </div>


                                    <div class="paper-1">
                                        <div class="w-100">
                                            <div class="row w-100">
                                                <div class="col-5">

                                                    <label>5. വരുമാനം</label><br>

                                                </div>


                                                <div class="col-1 w-100">
                                                    <label> :  
                                                    
                                                    </label>

                                                </div>

                                                <div class="col-6">
                                                    <label> {{ @$formData['annual_income'] }} <br>
                                                             </label>

                                                </div>
                                            </div>
                                            

                                        </div>

                                    </div>

                                    <div class="paper-1">
                                        <div class="w-100">
                                            <div class="row w-100">
                                                <div class="col-5">

                                                    <label>6. വിദ്യാർത്ഥിയുടെ പേര്</label><br>

                                                </div>


                                                <div class="col-1 w-100">
                                                    <label> :  
                                                    
                                                    </label>

                                                </div>

                                                <div class="col-6">
                                                    <label> {{ @$formData['student_name'] }} <br>
                                                             </label>

                                                </div>
                                            </div>
                                            

                                        </div>

                                    </div>

                                    <div class="paper-1">
                                        <div class="w-100">
                                            <div class="row w-100">
                                                <div class="col-5">

                                                    <label>7. അപേക്ഷകനുമായുള്ള ബന്ധം</label><br>

                                                </div>


                                                <div class="col-1 w-100">
                                                    <label> :  
                                                    
                                                    </label>

                                                </div>

                                                <div class="col-6">
                                                    <label> {{ @$formData['relation'] }} <br>
                                                             </label>

                                                </div>
                                            </div>
                                            

                                        </div>

                                    </div>

                                    <div class="paper-1">
                                        <div class="w-100">
                                            <div class="row w-100">
                                                <div class="col-5">

                                                    <label>8. പഠിക്കുന്ന സ്‌കൂളിന്റെ പേര്</label><br>

                                                </div>


                                                <div class="col-1 w-100">
                                                    <label> :  
                                                    
                                                    </label>

                                                </div>

                                                <div class="col-6">
                                                    <label> {{ @$formData['school_name'] }} <br>
                                                             </label>

                                                </div>
                                            </div>
                                            

                                        </div>

                                    </div>

                                    <div class="paper-1">
                                        <div class="w-100">
                                            <div class="row w-100">
                                                <div class="col-5">

                                                    <label>9. ക്ലാസ്</label><br>

                                                </div>


                                                <div class="col-1 w-100">
                                                    <label> :  
                                                    
                                                    </label>

                                                </div>

                                                <div class="col-6">
                                                    <label> {{ @$formData['class_number'] }} <br>
                                                             </label>

                                                </div>
                                            </div>
                                            

                                        </div>

                                    </div>

                                    <div class="paper-1">
                                        <div class="w-100">
                                            <div class="row w-100">
                                                <div class="col-5">

                                                    <label>10. ട്യുഷൻ സെന്ററിന്റെ പേര്</label><br>

                                                </div>


                                                <div class="col-1 w-100">
                                                    <label> :  
                                                    
                                                    </label>

                                                </div>

                                                <div class="col-6">
                                                    <label> {{ @$formData['tuition_center'] }} <br>
                                                             </label>

                                                </div>
                                            </div>
                                            

                                        </div>

                                    </div>
                                    <div class="row mt-5">
                                        <div class="col-12">
                                            <h1 style="text-align: center;color: rgb(0, 0, 0);font-size: medium; text-decoration: underline; padding: 20px;line-height: 32px;font-weight: 600;">
                                                അപേക്ഷ സമർപ്പിക്കുന്നത്  </h1>
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
                                                    <label> {{ @$formData['dist_name'] }} </label>
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
                                                    <label> {{ @$formData['teo_name'] }} </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                        <div>
                                            <p>മേൽപറഞ്ഞിട്ടുള്ള  കാര്യങ്ങൾ എന്റെ അറിവിലും വിശ്വാസത്തിലും സത്യമാണെന്ന് <br> ബോധ്യപ്പെടുത്തിക്കൊള്ളുന്നു 

                                            </p>
                                        </div>

                                    <div class="paper-1">
                                        <div class="w-100">
                                            <div class="row w-100">
                                                <div class="col-5">

                                                    <label>സ്ഥലം </label><br>

                                                </div>


                                                <div class="col-1 w-100">
                                                    <label> :  
                                                    
                                                    </label>

                                                </div>

                                                <div class="col-6">
                                                    <label> {{ @$formData['place'] }} <br>
                                                             </label>

                                                </div>
                                            </div>
                                            

                                        </div>

                                    </div>


                                    <div class="paper-1">
                                        <div class="w-100">
                                            <div class="row w-100">
                                                <div class="col-5">

                                                    <label>തീയതി </label><br>

                                                </div>


                                                <div class="col-1 w-100">
                                                    <label> :  
                                                    
                                                    </label>

                                                </div>

                                                <div class="col-6">
                                                    <label> {{ @$formData['date'] }} <br>
                                                             </label>

                                                </div>
                                            </div>
                                            

                                        </div>

                                    </div>

                                    <div class="paper-1">
                                        <div class="w-100">
                                            <div class="row w-100">
                                                <div class="col-5">

                                                    <label> അപേക്ഷകന്റെ ഒപ്പ് </label><br>

                                                </div>


                                                <div class="col-1 w-100">
                                                    <label> :  
                                                    
                                                    </label>

                                                </div>

                                                <div class="col-6">

                                                   @if($formData['signature'])
                                            {{-- <iframe src="{{ asset('tuition/' . @$formData['signature']) }}" width="400" height="200"></iframe> --}}

                                            <img src="{{ asset('tuition/' . @$formData['signature']) }}" width="120px" height="60px">
                                            @endif 

                                                </div>
                                            </div>
                                            

                                        </div>

                                    </div>
                                    <div class="paper-1">
                                        <div class="w-100">
                                            <div class="row w-100">
                                                <div class="col-5">

                                                    <label> അപേക്ഷകന്റെ ഫോട്ടോ </label><br>

                                                </div>


                                                <div class="col-1 w-100">
                                                    <label> :  
                                                    
                                                    </label>

                                                </div>

                                                <div class="col-6">

                                                   @if($formData['photo'])
                                            {{-- <iframe src="{{ asset('tuition/' . @$formData['signature']) }}" width="400" height="200"></iframe> --}}

                                            <img src="{{ asset('photo/' . @$formData['photo']) }}" width="120px" height="60px">
                                            @endif 

                                                </div>
                                            </div>
                                            

                                        </div>

                                    </div>



                                        
                                        

                                       {{-- <br>
                                        <div>
                                            <p>പഠിക്കുന്ന സ്‌കൂളിന്റെ മേലധികാരിയുടെ ഒപ്പും സീലും 


                                            </p>
                                        </div>
                                        <br>
                                        <br>
                                        <br>
                                        <div>
                                            <p>ട്യൂഷൻ  സെന്ററിന്റെ മേലധികാരിയുടെ ഒപ്പും സീലും 

                                            </p>
                                        </div>
                                       --}}
                                    </form>
                                   

                                </div>
                                </div>

                                
                            </div>
                            <!-- /row -->
                            <!-- row -->
                            
                            <!-- /row -->
                            <!-- row -->
                           
                            <!-- /row -->
                            <!-- row -->
                               
                           
                        </div>
                        <!-- /row -->


                        @if(auth::user()->role=='TEO' && @$tuitionFee->teo_view_status==1)
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
                                             {{ @$tuitionFee['teo_view_date'] }}
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
                                     @if(@$tuitionFee->teo_status == null)
                                     <button class="btn btn-warning" >Pending</button>
                                     @elseif(@$tuitionFee->teo_status == 1)
                                     <button class="btn btn-success" >Approved</button>
                                     @elseif(@$tuitionFee->teo_status == 2)
                                     <button class="btn btn-danger" >Rejected</button> 
                                    @endif
                                    </div>
                           </div>
                        @if(@$tuitionFee->teo_status == 2)
                            <div class="pb-2 row ">
                              <div class="col-5">
                                 <label>Rejected Reason  </label><br>
                              </div>
                              <div class="col-1 w-100">
                                 <label> :  
                                 </label>
                              </div>
                              <div class="col-6">
                                    {{ @$tuitionFee->teo_status_reason }}
                           
                              </div>
                            </div>
                     @endif
                     @if(@$tuitionFee->teo_status != null)
                           <div class=" pb-2 row ">
                              <div class="col-5">
                                 @if(@$tuitionFee->teo_status == 1)
                                 <label>Approved Date  </label>
                                 @elseif(@$tuitionFee->teo_status == 2)
                                 <label>Rejected Date  </label>
                                @endif
                                 
                                 <br>
                              </div>
                              <div class="col-1 w-100">
                                 <label> :  
                                 </label>
                              </div>
                              <div class="col-6">
                                 @if(@$tuitionFee['teo_status_date']!=null) {{ \Carbon\Carbon::parse(@$tuitionFee['teo_status_date'])->format('d-m-Y h:i a') }}@endif
                             
                              
                              </div>
                           </div>
                     @endif
                     @endif
                    </div>
        </div>
    </div>
</div>
<script>
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
            //window.history.back();
             window.location.href = "{{ url()->previous() }}";

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