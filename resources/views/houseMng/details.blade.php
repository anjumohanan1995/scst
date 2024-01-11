@extends('layouts.app')

@section('content')
<!-- main-content -->
<div class="main-content app-content">
	<!-- container -->
	<div class="main-container container-fluid">
		<!-- breadcrumb -->
		<div class="breadcrumb-header justify-content-between row me-0 ms-0" >
			
				<h4 class="content-title mb-2"> പട്ടികവർഗ്ഗ വികസന വകുപ്പിൽനിന്ന് വീടുകളുടെ നവീകരണത്തിനും അധികസൗകര്യങ്ങൾ                                     ഏർപെടുത്തുന്നതിനും   പൂർത്തീകരിക്കുന്നതിനുമുള്ള 
                    ധനസഹായത്തിനുള്ള അപേക്ഷ 
</h4>
				

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
                                    <input type="text" class="form-control"  name="name" id="name" value="{{ @$houseManagement->name }}" placeholder="പേര്" readonly/>
                                 
                                </div>
                            </div><br>
                            <div class="row">
                                <div class="col-md-3 mb-3">
                                    <label class="form-label">മേൽവിലാസം:</label>                                    
                                </div>
                                <div class="col-md-8 mb-8">
                                    <input type="text" class="form-control"  name="address" id="address" value="{{ @$houseManagement['address'] }}" placeholder="മേൽവിലാസം (പിൻകോഡ് സഹിതം)"  readonly/>
                                </div>
                            </div><br>
                            <div class="row">
                                <div class="col-md-3 mb-3">
                                    <label class="form-label">ഗ്രാമപഞ്ചായത്ത്‌/ വാർഡ് നമ്പർ  :</label>
                                    
                                        </div>
                                        <div class="col-md-8 mb-8">
                                            <input type="text" class="form-control"  name="age" id="age" value="{{ @$houseManagement['panchayath'] }}" placeholder="" readonly />
                                         
                                        </div>
                                        

                                    </div><br>
                                <div class="row">
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label"> ജാതി  :</label>
                                        
                                            </div>
                                            <div class="col-md-8 mb-8">
                                                <input type="text" class="form-control"  name="caste" id="caste" value="{{ @$houseManagement['caste'] }}" placeholder="വയസ്, ജനനതീയതി" readonly/>
                                              
                                            </div>
                                            
    
                                        </div><br>
                                <div class="row">
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label">വാർഷിക വരുമാനം 
                                            :</label>
                                        
                                            </div>
                                            <div class="col-md-8 mb-8">
                                                <input type="text" class="form-control"  name="annual_income" id="annual_income" value="{{ @$houseManagement['annual_income'] }}" placeholder=" " readonly />
                                                
                                            </div>
                                            
    
                                        </div><br>
                                <div class="row">
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label">ധനസഹായത്തിനപേക്ഷിക്കുന്ന  വീടിന്റ അവസ്ഥയും അനുവദിച്ച വർഷവും   :</label>
                                        
                                            </div>
                                            <div class="col-md-8 mb-8">
                                                <input type="text" class="form-control"  name="house_details" id="house_details" value="{{ @$houseManagement['house_details'] }}" placeholder="" readonly />
                                                
                                            </div>
                                            
    
                                        </div><br>
                                <div class="row">
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label">അനുവദിച്ച ഏജൻസി/ വകുപ്പ് 
                                            :</label>
                                        
                                            </div>
                                            <div class="col-md-8 mb-8">
                                                <input type="text" class="form-control"  name="agency" id="agency" value="{{ @$houseManagement['agency'] }}" placeholder="" readonly/>
                                              
                                            </div>
                                            

                                        </div><br>
                                <div class="row">
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label">വീടുപണി പൂർത്തിയായി അവസാന ഗഡു കൈപ്പറ്റിയ വർഷം :</label>
                                        
                                            </div>
                                            <div class="col-md-8 mb-8">
                                                <input type="text" class="form-control"  name="last_payment_year" id="last_payment_year" value="{{ @$houseManagement['last_payment_year'] }}" placeholder="" readonly />
                                                
                                            </div>
                                            
    
                                        </div><br>
                                <div class="row">
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label">കുടുംബത്തിന്റെ അവസ്ഥ  (അവിവാഹിതരായ :
                                            അമ്മ, വനിത നാഥയായ കുടുംബം , അകാലത്തിൽ
                                            വിധവയാകേണ്ടി വന്നവർ , ശാരീരിക മാനസിക
                                            വേല്ലുവിളി നേരിടുന്നവർ , തീരാവ്യാധി പിടിപ്പെട്ടവർ ,
                                            അതികർമങ്ങൾക്ക് ഇരയായ വനിതകൾ തുടങ്ങിയവ )
                                             :</label>
                                        
                                            </div>
                                            <div class="col-md-8 mb-8">
                                                <input type="text" class="form-control"  name="family_details" id="family_details" value="{{ @$houseManagement['family_details'] }}" placeholder="" readonly />
                                               
                                            </div>
                                            
    
                                        </div><br>
                                <div class="row">
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label">ധനസഹായം ആവശ്യപ്പെടുന്ന പ്രവർത്തിയുടെ സ്വഭാവം 
                                            (നവീകരണം ,അധിക സൗകര്യം / പൂർത്തീകരണം )
                                             :</label>
                                        
                                            </div>
                                            <div class="col-md-8 mb-8">
                                                <input type="text" class="form-control" value="{{ isset($houseManagement['nature_payment']) ? (
                                                    $houseManagement['nature_payment'] == 'innovation' ? 'നവീകരണം' : (
                                                        $houseManagement['nature_payment'] == 'Additional convenience' ? 'അധിക സൗകര്യം' : (
                                                            $houseManagement['nature_payment'] == 'Completion' ? 'പൂർത്തീകരണം' : ''
                                                        )
                                                    )
                                                ) : '' }}" name="nature_payment" id="nature_payment" readonly="">
                                            
                                            </div>
                                            
    
                                        </div><br>
                                        <div class="row">
                                            <div class="col-md-3 mb-3">
                                                <label class="form-label">നിർദിഷ്ട്ട ആവശ്യത്തിനും മറ്റ് സർക്കാർ വകുപ്പ് / 
                                                    ഏജൻസികളിൽനിന്നോ തദ്ദേശ സ്വയംഭരണാ സ്ഥാപനങ്ങളിൽ നിന്നോ 
                                                    ധനസഹായം ലഭിച്ചിട്ടുണ്ടോ എന്നുള്ള  വിവരം  
                                                    (ഉണ്ടെങ്കിൽ എത്ര തുക ,ലഭിച്ച തീയതി )
                                                    
                                                     :</label>
                                                
                                                    </div>
                                                    <div class="col-md-8 mb-8">
                                                        <input type="text" class="form-control" value="{{ @$houseManagement['payment_details']}}" name="payment_details" id="payment_details" readonly="">
                                                    
                                                    </div>
                                                    
            
                                                </div><br>
                                                 <div class="row">
                                                    <div class="col-md-3 mb-3">
                                                        <label class="form-label">മുൻഗണന ലഭിക്കുന്നതിനുള്ള അർഹത തെളിയിക്കുന്നതിനുമുള്ള 
                                                            മറ്റു സംഗതികൾ
                                                      
                                                            
                                                             :</label>
                                                        
                                                            </div>
                                                            <div class="col-md-4 mb-4">
                                                                <input type="text" class="form-control" value="{{ @$houseManagement['prove_eligibility']}}" name="prove_eligibility" id="prove_eligibility" readonly="">
                                                            
                                                            </div>
                                                            <div class="col-md-4 mb-4">
                                                                @if($houseManagement['prove_eligibility_file'])
                                                                <iframe src="{{ asset('homeMng/' . @$houseManagement['prove_eligibility_file']) }}" width="400" height="200"></iframe>
                                                                @endif
                                                          
                                                             </div>
                                                            
                    
                                                        </div><br>
                                <div class="row">
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label">സ്ഥലം :</label>
                                        
                                            </div>
                                            <div class="col-md-8 mb-8">
                                                <input type="text" class="form-control"  name="place" id="place" value="{{ @$houseManagement['place'] }}" placeholder="സ്ഥലം" readonly />
                                                
                                            </div>
                                            

                                        </div><br>
                                <div class="row">
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label">തീയതി :</label>
                                        
                                            </div>
                                            <div class="col-md-8 mb-8">
                                                <input type="text" class="form-control"  name="date" id="date" value="{{ @$houseManagement['date'] }}" placeholder="തീയതി" readonly />
                                                
                                            </div>
                                            
    
                                        </div><br>
                                        <div class="row">
                                            <div class="col-md-3 mb-3">
                                                <label class="form-label">അപേക്ഷകന്റെ ഒപ്പ്  :</label>
                                                
                                                    </div>
                                                    <div class="col-md-8 mb-8">
                                                        @if(@$houseManagement['signature'] !="")
                                                       <img src="{{ url('/') }}/homeMng/{{ @$houseManagement['signature'] }}" alt="Preview" width="300" height="200">

                                                       @endif
                                                    </div>
                                                    
            
                                                </div><br>
                                                <div class="row">
                                                    <div class="col-md-4 mb-4">
                                                      
                                                         
                                                             </div>
                                                    <div class="col-md-6 mb-6">
                                                     <a href="{{ route('userHouseGrantList') }}">  <input type="button" class="btn btn-primary" value="Back >>" >
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