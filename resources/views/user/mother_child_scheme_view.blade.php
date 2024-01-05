@extends('layouts.app')

@section('content')
<!-- main-content -->
<div class="main-content app-content">
	<!-- container -->
	<div class="main-container container-fluid">
		<!-- breadcrumb -->
		<div class="breadcrumb-header justify-content-between row me-0 ms-0" >
			
				<h4 class="content-title mb-2"> ജനനി-ജനനി -ജന്മരക്ഷ  പ്രസവാനുകുല്യം - മാതൃശിശു  സംരക്ഷണ പദ്ധതി  അപേക്ഷഫോറം</h4>
				

            @if ($message = Session::get('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><i class="fa fa-window-close"></i></button>                                {{ $message }}
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
                                    <label class="form-label">പേര് :</label>
                                </div>
                                <div class="col-md-8 mb-8">
                                    <input type="text" class="form-control"  name="name" id="name" value="{{ $formData['name'] }}" placeholder="പേര്" readonly/>
                                 
                                </div>
                            </div><br>
                            <div class="row">
                                <div class="col-md-3 mb-3">
                                    <label class="form-label">മേൽവിലാസം (പിൻകോഡ് സഹിതം) :</label>                                    
                                </div>
                                <div class="col-md-8 mb-8">
                                    <input type="text" class="form-control"  name="address" id="address" value="{{ $formData['address'] }}" placeholder="മേൽവിലാസം (പിൻകോഡ് സഹിതം)"  readonly/>
                                </div>
                            </div><br>
                            <div class="row">
                                <div class="col-md-3 mb-3">
                                    <label class="form-label">വയസ് :</label>
                                    
                                        </div>
                                        <div class="col-md-8 mb-8">
                                            <input type="text" class="form-control"  name="age" id="age" value="{{ $formData['age'] }}" placeholder="മേൽവിലാസം (പിൻകോഡ് സഹിതം)" readonly />
                                         
                                        </div>
                                        

                                    </div><br>
                                <div class="row">
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label"> ജനനതീയതി :</label>
                                        
                                            </div>
                                            <div class="col-md-8 mb-8">
                                                <input type="date" class="form-control"  name="dob" id="dob" value="{{ $formData['dob'] }}" placeholder="വയസ്, ജനനതീയതി" readonly/>
                                              
                                            </div>
                                            
    
                                        </div><br>
                                <div class="row">
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label">ഭർത്താവിന്റെ പേര്  :</label>
                                        
                                            </div>
                                            <div class="col-md-8 mb-8">
                                                <input type="text" class="form-control"  name="hus_name" id="hus_name" value="{{ $formData['hus_name'] }}" placeholder="ഭർത്താവിന്റെ പേര് " readonly />
                                                
                                            </div>
                                            
    
                                        </div><br>
                                <div class="row">
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label">സമുദായം / ജാതി  :</label>
                                        
                                            </div>
                                            <div class="col-md-8 mb-8">
                                                <input type="text" class="form-control"  name="caste" id="caste" value="{{ $formData['caste'] }}" placeholder="സമുദായം / ജാതി " readonly />
                                                
                                            </div>
                                            
    
                                        </div><br>
                                <div class="row">
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label">വില്ലേജ് :</label>
                                        
                                            </div>
                                            <div class="col-md-8 mb-8">
                                                <input type="text" class="form-control"  name="village" id="village" value="{{ $formData['village'] }}" placeholder="വില്ലേജ്" readonly/>
                                              
                                            </div>
                                            

                                        </div><br>
                                <div class="row">
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label">എത്രാമത്തെ പ്രസവം :</label>
                                        
                                            </div>
                                            <div class="col-md-8 mb-8">
                                                <input type="text" class="form-control"  name="births" id="births" value="{{ $formData['births'] }}" placeholder="എത്രാമത്തെ പ്രസവം" readonly />
                                                
                                            </div>
                                            
    
                                        </div><br>
                                <div class="row">
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label">പ്രസവം നടക്കുമെന്ന് പ്രതീക്ഷിക്കുന്ന തിയതി :</label>
                                        
                                            </div>
                                            <div class="col-md-8 mb-8">
                                                <input type="text" class="form-control"  name="expected_date_of_delivery" id="expected_date_of_delivery" value="{{ $formData['expected_date_of_delivery'] }}" placeholder="പ്രസവം നടക്കുമെന്ന് പ്രതീക്ഷിക്കുന്ന തിയതി" readonly />
                                               
                                            </div>
                                            
    
                                        </div><br>
                                <div class="row">
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label">ഗർഭ /പ്രസവ ശുശ്രുഷക്ക് ആശ്രയിക്കുന്ന ആശുപത്രി /കുടുംബക്ഷേമ കേന്ദ്രം :</label>
                                        
                                            </div>
                                            <div class="col-md-8 mb-8">
                                                <input type="text" class="form-control" value="{{ $formData['dependent_hospital'] }}"  name="dependent_hospital" id="dependent_hospital" value="" placeholder="ഗർഭ /പ്രസവ ശുശ്രുഷക്ക് ആശ്രയിക്കുന്ന ആശുപത്രി /കുടുംബക്ഷേമ കേന്ദ്രം" readonly />
                                            
                                            </div>
                                            
    
                                        </div><br>
                                <div class="row">
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label">സ്ഥലം :</label>
                                        
                                            </div>
                                            <div class="col-md-8 mb-8">
                                                <input type="text" class="form-control"  name="place" id="place" value="{{ $formData['place'] }}" placeholder="സ്ഥലം" readonly />
                                                
                                            </div>
                                            

                                        </div><br>
                                <div class="row">
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label">തീയതി :</label>
                                        
                                            </div>
                                            <div class="col-md-8 mb-8">
                                                <input type="text" class="form-control"  name="date" id="date" value="{{ $formData['date'] }}" placeholder="തീയതി" readonly />
                                                
                                            </div>
                                            
    
                                        </div><br>
                                        <div class="row">
                                            <div class="col-md-3 mb-3">
                                                <label class="form-label">അപേക്ഷകന്റെ ഒപ്പ്  :</label>
                                                
                                                    </div>
                                                    <div class="col-md-8 mb-8">
                                                       @isset($formData['signature'])
                                                       <img src="{{ url('/') }}/applications/{{ $formData['signature'] }}" alt="Preview" width="300" height="200">

                                                       @endisset
                                                    </div>
                                                    
            
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
