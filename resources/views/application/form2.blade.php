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
                    <form name="patientForm" id="patientForm" method="post" action="" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3 mb-3">
                                    <label class="form-label">പേര് :</label>
                                    
                                        </div>
                                        <div class="col-md-8 mb-8">
                                            <input type="text" class="form-control"  name="name" id="name" value="" placeholder="പേര്" required/>
                                            @error('name')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        

                                    </div><br>
                                    <div class="row">
                                        <div class="col-md-3 mb-3">
                                            <label class="form-label">മേൽവിലാസം (പിൻകോഡ് സഹിതം) :</label>
                                            
                                                </div>
                                                <div class="col-md-8 mb-8">
                                                    <input type="text" class="form-control"  name="address" id="address" value="" placeholder="മേൽവിലാസം (പിൻകോഡ് സഹിതം)" required/>
                                                    @error('address')
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                                
        
                                            </div><br>
                                            <div class="row">
                                                <div class="col-md-3 mb-3">
                                                    <label class="form-label">വയസ് :</label>
                                                    
                                                        </div>
                                                        <div class="col-md-8 mb-8">
                                                            <input type="text" class="form-control"  name="age" id="age" value="" placeholder="മേൽവിലാസം (പിൻകോഡ് സഹിതം)" required/>
                                                            @error('age')
                                                                <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                        
                
                                                    </div><br>
                                            <div class="row">
                                                <div class="col-md-3 mb-3">
                                                    <label class="form-label"> ജനനതീയതി :</label>
                                                    
                                                        </div>
                                                        <div class="col-md-8 mb-8">
                                                            <input type="date" class="form-control"  name="dob" id="dob" value="" placeholder="വയസ്, ജനനതീയതി" required/>
                                                            @error('dob')
                                                                <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                        
                
                                                    </div><br>
                                                    <div class="row">
                                                        <div class="col-md-3 mb-3">
                                                            <label class="form-label">ഭർത്താവിന്റെ പേര്  :</label>
                                                            
                                                                </div>
                                                                <div class="col-md-8 mb-8">
                                                                    <input type="text" class="form-control"  name="hus_name" id="hus_name" value="" placeholder="ഭർത്താവിന്റെ പേര് " required/>
                                                                    @error('hus_name')
                                                                        <span class="text-danger">{{$message}}</span>
                                                                    @enderror
                                                                </div>
                                                                
                        
                                                            </div><br>
                                                            <div class="row">
                                                                <div class="col-md-3 mb-3">
                                                                    <label class="form-label">സമുദായം / ജാതി  :</label>
                                                                    
                                                                        </div>
                                                                        <div class="col-md-8 mb-8">
                                                                            <input type="text" class="form-control"  name="caste" id="caste" value="" placeholder="സമുദായം / ജാതി " required/>
                                                                            @error('Caste')
                                                                                <span class="text-danger">{{$message}}</span>
                                                                            @enderror
                                                                        </div>
                                                                        
                                
                                                                    </div><br>
                                                                    <div class="row">
                                                                        <div class="col-md-3 mb-3">
                                                                            <label class="form-label">വില്ലേജ് :</label>
                                                                            
                                                                                </div>
                                                                                <div class="col-md-8 mb-8">
                                                                                    <input type="text" class="form-control"  name="village" id="village" value="" placeholder="വില്ലേജ്" required/>
                                                                                    @error('village')
                                                                                        <span class="text-danger">{{$message}}</span>
                                                                                    @enderror
                                                                                </div>
                                                                                
                                        
                                                                            </div><br>
                                                                            <div class="row">
                                                                                <div class="col-md-3 mb-3">
                                                                                    <label class="form-label">എത്രാമത്തെ പ്രസവം :</label>
                                                                                    
                                                                                        </div>
                                                                                        <div class="col-md-8 mb-8">
                                                                                            <input type="text" class="form-control"  name="births" id="births" value="" placeholder="എത്രാമത്തെ പ്രസവം" required/>
                                                                                            @error('births')
                                                                                                <span class="text-danger">{{$message}}</span>
                                                                                            @enderror
                                                                                        </div>
                                                                                        
                                                
                                                                                    </div><br>
                                                                                    <div class="row">
                                                                                        <div class="col-md-3 mb-3">
                                                                                            <label class="form-label">പ്രസവം നടക്കുമെന്ന് പ്രതീക്ഷിക്കുന്ന തിയതി :</label>
                                                                                            
                                                                                                </div>
                                                                                                <div class="col-md-8 mb-8">
                                                                                                    <input type="text" class="form-control"  name="expected_date_of_delivery" id="expected_date_of_delivery" value="" placeholder="പ്രസവം നടക്കുമെന്ന് പ്രതീക്ഷിക്കുന്ന തിയതി" required/>
                                                                                                    @error('expected_date_of_delivery')
                                                                                                        <span class="text-danger">{{$message}}</span>
                                                                                                    @enderror
                                                                                                </div>
                                                                                                
                                                        
                                                                                            </div><br>
                                                                                            <div class="row">
                                                                                                <div class="col-md-3 mb-3">
                                                                                                    <label class="form-label">ഗർഭ /പ്രസവ ശുശ്രുഷക്ക് ആശ്രയിക്കുന്ന ആശുപത്രി /കുടുംബക്ഷേമ കേന്ദ്രം :</label>
                                                                                                    
                                                                                                        </div>
                                                                                                        <div class="col-md-8 mb-8">
                                                                                                            <input type="text" class="form-control"  name="dependent_hospital" id="dependent_hospital" value="" placeholder="ഗർഭ /പ്രസവ ശുശ്രുഷക്ക് ആശ്രയിക്കുന്ന ആശുപത്രി /കുടുംബക്ഷേമ കേന്ദ്രം" required/>
                                                                                                            @error('dependent_hospital')
                                                                                                                <span class="text-danger">{{$message}}</span>
                                                                                                            @enderror
                                                                                                        </div>
                                                                                                        
                                                                
                                                                                                    </div><br>
                                                                                                    <div class="row">
                                                                                                        <div class="col-md-3 mb-3">
                                                                                                            <label class="form-label">സ്ഥലം :</label>
                                                                                                            
                                                                                                                </div>
                                                                                                                <div class="col-md-8 mb-8">
                                                                                                                    <input type="text" class="form-control"  name="place" id="place" value="" placeholder="സ്ഥലം" required/>
                                                                                                                    @error('place')
                                                                                                                        <span class="text-danger">{{$message}}</span>
                                                                                                                    @enderror
                                                                                                                </div>
                                                                                                                
                                                                        
                                                                                                            </div><br>
                                                                                                            <div class="row">
                                                                                                                <div class="col-md-3 mb-3">
                                                                                                                    <label class="form-label">തീയതി :</label>
                                                                                                                    
                                                                                                                        </div>
                                                                                                                        <div class="col-md-8 mb-8">
                                                                                                                            <input type="date" class="form-control"  name="date" id="date" value="" placeholder="തീയതി" required/>
                                                                                                                            @error('date')
                                                                                                                                <span class="text-danger">{{$message}}</span>
                                                                                                                            @enderror
                                                                                                                        </div>
                                                                                                                        
                                                                                
                                                                                                                    </div><br>
                                                                                                                    <div class="row">
                                                                                                                        <div class="col-md-3 mb-3">
                                                                                                                            <label class="form-label">അപേക്ഷകന്റെ ഒപ്പ്  :</label>
                                                                                                                            
                                                                                                                                </div>
                                                                                                                                <div class="col-md-8 mb-8">
                                                                                                                                    <input type="file" class="form-control"  name="signature" id="signature" value="" placeholder="അപേക്ഷകന്റെ ഒപ്പ് " required/>
                                                                                                                                    @error('signature')
                                                                                                                                        <span class="text-danger">{{$message}}</span>
                                                                                                                                    @enderror
                                                                                                                                </div>
                                                                                                                                
                                                                                        
                                                                                                                            </div><br>
                                                                                                                            <div class="row">
                                                                                                                                <div class="col-md-3 mb-3">
                                                                                                                                   
                                                                                                                                        </div>
                                                                                                                                        <div class="col-md-8 mb-8">
                                                                                                                                            <button type="submit" id="submit" class="btn btn-warning waves-effect waves-light text-start submit">Submit</button>
                                                                                                                                        </div>
                                                                                                                                        
                                                                                                
                                                                                                                                    </div><br>
                                  
                                 
                            </div>

                   
                        </form>
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
