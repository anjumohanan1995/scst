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
        <div class="row row-sm mt-4 pl-10">
            <div class="col-lg-8 col-xl-12 col-md-12 col-sm-12 ">
                <div class=" card">
                    <div class="card-body  p-5">
                            <div id="success_message" class="ajax_response" style="display: none;"></div>
                            <div class="mb-4 main-content-label">
                                <h4 class="medical__form--h1 text-center m-3">
                                    <b><u>ഐ .റ്റി.ഐ /ട്രൈനിംഗ് സെന്ററുകളിലെ പഠിതാക്കൾക്കുള്ള സ്കോളർഷിപ്പ്</u></b>
                                </h4>
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
                                            <td> {{ @$studentFund['class_start_date'] }}</td>
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
                                                <iframe src="{{ asset('itiStudentFund/' . @$studentFund['caste_certificate']) }}" width="400" height="200"></iframe>
                                                @endif</td>
                                        </tr>
                                        <tr>
                                            <td>6</td>
                                            <td>അപേക്ഷകന്റെ വരുമാനം <br>
                                                (സർട്ടിഫിക്കറ്റ് ഹാജരാക്കണം )

                                            </td>
                                            <td> {{ @$studentFund['income'] }} <br> @if($studentFund['income_certificate'])
                                                <iframe src="{{ asset('itiStudentFund/' . @$studentFund['income_certificate']) }}" width="400" height="200"></iframe>
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
                                
                            </div>

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
                            <div class="row">
                                <div class="col-md-4 mb-4">
                                  
                                     
                                         </div>
                                <div class="col-md-6 mb-6">
                                 <a href="{{ route('userItiFundList') }}">  <input type="button" class="btn btn-primary" value="Back >>" >
                                 </a>  </div>
                                        
                                        

                                    </div><br>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<script>


	$(document).ready(function() {
     	$('#example').DataTable();
	});
  </script>
<!-- main-content-body -->
@endsection
