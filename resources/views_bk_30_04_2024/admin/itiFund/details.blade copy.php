@extends('layouts.app')

@section('content')
<!-- main-content -->
<div class="main-content app-content">
	<!-- container -->
	<div class="main-container container-fluid">
		<!-- breadcrumb -->
		<div class="breadcrumb-header justify-content-between row me-0 ms-0" >
			
				<h4 class="content-title mb-2"> ഐ .റ്റി.ഐ /ട്രൈനിംഗ് സെന്ററുകളിലെ പഠിതാക്കൾക്കുള്ള സ്കോളർഷിപ്പ്

</h4>
				

            @if ($message = Session::get('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><i class="fa fa-window-close"></i></button> {{ $message }}
                </div>
            @endif
		</div>
		<!-- /breadcrumb -->

	</div>
<div class="main-content-body">
    <div class="row row-sm mt-4">
        <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12 ">
            <div class="card">
                <div class="card-body">
                   
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3 mb-3">
                                    <label class="form-label">അപേക്ഷകന്റെ പേര് :</label>
                                </div>
                                <div class="col-md-8 mb-8">
                                    <input type="text" class="form-control"  name="name" id="name" value="{{ @$studentFund->name }}" placeholder="" readonly/>
                                 
                                </div>
                            </div><br>
                            <div class="row">
                                <div class="col-md-3 mb-3">
                                    <label class="form-label">മേൽവിലാസം:</label>                                    
                                </div>
                                <div class="col-md-8 mb-8">
                                    <input type="text" class="form-control"  name="address" id="address" value="{{ @$studentFund['address'] }}" placeholder=""  readonly/>
                                </div>
                            </div><br>
                            <div class="row">
                                <div class="col-md-3 mb-3">
                                    <label class="form-label">കോഴ്‌സിന്റെ പേര് 
                                        :</label>
                                    
                                        </div>
                                        <div class="col-md-8 mb-8">
                                            <input type="text" class="form-control"  name="age" id="age" value="{{ @$studentFund['course_name'] }}" placeholder="" readonly />
                                         
                                        </div>
                                        

                                    </div><br>
                                <div class="row">
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label"> നടപ്പ് അദ്ധ്യയന വർഷം ക്ലാസ് ആരംഭിച്ച തീയതി 
                                            :</label>
                                        
                                            </div>
                                            <div class="col-md-8 mb-8">
                                                <input type="text" class="form-control"  name="class_start_date" id="class_start_date" value="{{ @$studentFund['class_start_date'] }}" placeholder="" readonly/>
                                              
                                            </div>
                                            
    
                                        </div><br>
                                <div class="row">
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label">അപേക്ഷകനെ പ്രവേശനം ലഭിച്ചത് 
 
                                            :</label>
                                        
                                            </div>
                                            <div class="col-md-8 mb-8">
                                                <input type="text" class="form-control" value="{{ isset($studentFund['admission_type']) ? (
                                                    $studentFund['admission_type'] == 'merit' ? 'മെരിറ്റ്' : (
                                                        $studentFund['admission_type'] == 'innovation' ? 'സംവരണം' : (
                                                            $studentFund['admission_type'] == 'management' ? 'മാനേജ്‌മന്റ്' : (
                                                                $studentFund['admission_type'] == 'others' ? 'മറ്റുള്ളവ' : ''
                                                            )
                                                        )
                                                    )
                                                ) : '' }}" name="admission_type" id="admission_type" readonly="">
                                                
                                            </div>
                                            
    
                                        </div><br>
                                <div class="row">
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label">അപേക്ഷകന്റെ ജാതി/ മതം   :</label>
                                        
                                            </div>
                                            <div class="col-md-8 mb-8">
                                                <input type="text" class="form-control"  name="caste" id="caste" value="{{ @$studentFund['caste'] }}" placeholder="" readonly />
                                                
                                            </div>
                                            
    
                                        </div><br>
                                <div class="row">
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label">ജാതി/ മതം സർട്ടിഫിക്കറ്റ്
                                            :</label>
                                        
                                            </div>
                                            <div class="col-md-8 mb-8">
                                                @if($studentFund['caste_certificate'])
                                                                <iframe src="{{ asset('itiStudentFund/' . @$studentFund['caste_certificate']) }}" width="400" height="200"></iframe>
                                                                @endif
                                            </div>
                                            

                                        </div><br>
                                        <div class="row">
                                            <div class="col-md-3 mb-3">
                                                <label class="form-label">അപേക്ഷകന്റെ വരുമാനം :</label>
                                                
                                                    </div>
                                                    <div class="col-md-8 mb-8">
                                                        <input type="text" class="form-control"  name="income" id="income" value="{{ @$studentFund['income'] }}" placeholder="" readonly />
                                               
                                                    </div>
                                                    
            
                                                </div><br>
                                <div class="row">
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label">വരുമാന സർട്ടിഫിക്കറ്റ് :</label>
                                        
                                            </div>
                                            <div class="col-md-8 mb-8">
                                                @if($studentFund['income_certificate'])
                                                <iframe src="{{ asset('itiStudentFund/' . @$studentFund['income_certificate']) }}" width="400" height="200"></iframe>
                                                @endif
                                            </div>
                                            
    
                                        </div><br>
                                <div class="row">
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label">വിദ്യാർത്ഥികൾക്ക് ഇ-ഗ്രാൻഡ് അകൗണ്ട് നമ്പർ ഉണ്ടെങ്കിൽ ബാങ്ക് ശാഖ /ഇ -ഗ്രാൻഡ് അകൗണ്ട് നം
                                             :</label>
                                        
                                            </div>
                                            <div class="col-md-8 mb-8">
                                                <input type="text" class="form-control"  name="account_details" id="account_details" value="{{ @$studentFund['account_details'] }}" placeholder="" readonly />
                                               
                                            </div>
                                            
    
                                        </div><br>
                             
                                        @php
                                        use Carbon\Carbon;
                                    @endphp
                                                 
                                <div class="row">
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label">തീയതി :</label>
                                        
                                            </div>
                                            <div class="col-md-8 mb-8">
                                                <input type="text" class="form-control" name="date" id="date" value="{{ @$studentFund['date'] ? Carbon::parse($studentFund['date'])->format('d-m-Y') : '' }}" placeholder="" readonly />
 
                                            </div>
                                            
    
                                        </div><br>
                                        <div class="row">
                                            <div class="col-md-3 mb-3">
                                                <label class="form-label">അപേക്ഷകന്റെ ഒപ്പ്  :</label>
                                                
                                                    </div>
                                                    <div class="col-md-8 mb-8">
                                                        @if(@$studentFund['signature'] !="")
                                                       <img src="{{ url('/') }}/itiStudentFund/{{ @$studentFund['signature'] }}" alt="Preview" width="300" height="200">

                                                       @endif
                                                    </div>
                                                    
            
                                                </div><br>
                                                <div class="row">
                                                    <div class="col-md-3 mb-3">
                                                        <label class="form-label">രക്ഷാകർത്താവിന്റെ  പേര്   :</label>
                                                        
                                                            </div>
                                                            <div class="col-md-8 mb-8">
                                                                <input type="text" class="form-control"  name="parent_name" id="parent_name" value="{{ @$studentFund['parent_name'] }}" placeholder="തീയതി" readonly />
                                                
                                                            </div>
                                                            
                    
                                                        </div><br>
                                                        <div class="row">
                                                            <div class="col-md-3 mb-3">
                                                                <label class="form-label">രക്ഷാകർത്താവിന്റെ  ഒപ്പ്  :</label>
                                                                
                                                                    </div>
                                                                    <div class="col-md-8 mb-8">
                                                                        @if(@$studentFund['signature'] !="")
                                                                       <img src="{{ url('/') }}/itiStudentFund/{{ @$studentFund['signature'] }}" alt="Preview" width="300" height="200">
                
                                                                       @endif
                                                                    </div>
                                                                    
                            
                                                                </div><br>

                                                                   <div class="row">
                                                    <div class="col-md-3 mb-3">
                                                     <label class="form-label">Institution :</label>
                                                    </div>
                                                    <div class="col-md-8 mb-8">
                                                    <input type="text" class="form-control"  name="institution_name" id="institution_name" value="{{ @$studentFund['institution_name'] }}" placeholder="" readonly />

                                                    </div>
                                                </div>
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
s