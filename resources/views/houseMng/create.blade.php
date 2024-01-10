@extends('layouts.app')

@section('content')
<!-- main-content -->
<div class="main-content app-content">
	<!-- container -->
	<div class="main-container container-fluid">
		<!-- breadcrumb -->
		<div class="breadcrumb-header justify-content-between row me-0 ms-0" >
			
				<h4 class="content-title mb-2">പട്ടികവർഗ്ഗ വികസന വകുപ്പിൽനിന്ന് വീടുകളുടെ നവീകരണത്തിനും അധികസൗകര്യങ്ങൾ                                     ഏർപെടുത്തുന്നതിനും   പൂർത്തീകരിക്കുന്നതിനുമുള്ള 
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
           
                    <form name="patientForm" id="patientForm" method="post" action="{{route('houseGrant.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="card">
                            <div class="card-body">
                        <div class="form-group">
                            <div class="row">   
                                <div class="col-md-6 mb-6">
                                    <label class="form-label">അപേക്ഷകന്റെ പേര് 
                                    </label>
                                    <input type="text" value="{{ old('name') }}"  class="form-control" placeholder="" name="name" />
                                    @error('name')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-6">
                                    <label class="form-label">മേൽവിലാസം 
                                    </label>
                                    <textarea type="text" value="{{ old('address') }}"  class="form-control" placeholder="" name="address" ></textarea>
                                    @error('address')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div><br>
                            <div class="row">   
                               
                                <div class="col-md-2 mb-2">
                                    <label class="form-label">ജില്ല  </label>
                                    <select id="current_district" name="current_district" class="form-control" >
                                        <option value="">Select</option>
                                            @foreach($districts as $district)
                                                <option value="{{$district->id}}"  >{{$district->name}}</option>
                                            @endforeach
                                    </select>
                                     @error('current_district')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                    <input type="hidden" name="current_district_name" id="current_district_name" value="">
                                </div>
                                <div class="col-md-2 mb-2">
                                    <label class="form-label">താലൂക്ക്  </label>
                                    <select id="current_taluk" name="current_taluk" class="form-control">
                                        <option value="">Choose Taluk</option>
                                    </select>                                 
                                    @error('current_taluk')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                    <input type="hidden" name="current_taluk_name" id="current_taluk_name" value="">
                                </div>
                                <div class="col-md-2 mb-2">
                                    <label class="form-label">പിൻകോഡ്  </label>
                                    <input type="text" value="{{ old('current_pincode') }}"  class="form-control"  name="current_pincode" />
                                    @error('current_pincode')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-6">
                                    <label class="form-label">ഗ്രാമപഞ്ചായത്ത്‌/ വാർഡ് നമ്പർ 
                                    </label>
                                    <input type="text" value="{{ old('panchayath') }}"  class="form-control" placeholder="" name="panchayath" />
                                   
                                    @error('panchayath')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                               
                            </div><br>
                               <div class="row">   
                                <div class="col-md-6 mb-6">
                                    <label class="form-label">ജാതി 
                                    </label>
                                    <input type="text" value="{{ old('caste') }}"  class="form-control" placeholder="" name="caste" />
                               
                                    @error('caste')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                      </div>
                                          <div class="col-md-6 mb-6">
                                        <label class="form-label">വാർഷിക വരുമാനം 
                                        </label>
                                        <input type="number" value="{{ old('anual_income') }}"  class="form-control" placeholder="" name="anual_income" />
                                   
                                        @error('anual_income')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                       
                                    </div>
                                    
                                    
                                   
                                  
                                </div><br>
                            <div class="row">   
                                <div class="col-md-3 mb-3">
                                    <label class="form-label">ധനസഹായത്തിനപേക്ഷിക്കുന്ന  വീടിന്റ അവസ്ഥയും അനുവദിച്ച വർഷവും 
                                    </label>
                                    <textarea type="text" value="{{ old('house_details') }}"  class="form-control" placeholder="" name="house_details" ></textarea>
                                 @error('house_details')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label class="form-label">അനുവദിച്ച ഏജൻസി/ വകുപ്പ് 
                                    </label>
                                    <input type="text" value="{{ old('agency') }}" class="form-control" placeholder="" name="agency" />
                                    @error('agency')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                                </div>
                               
                                <div class="col-md-6 mb-6">
                                    <label class="form-label">വീടുപണി പൂർത്തിയായി അവസാന ഗഡു കൈപ്പറ്റിയ വർഷം 
                                    </label>
                                    <textarea type="text" value="{{ old('last_payment_year') }}"  class="form-control" placeholder="" name="last_payment_year" ></textarea>
                                    @error('last_payment_year')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            
                            </div><br>   
            
                            <div class="row">   
                                <div class="col-md-6 mb-6">
                                    <label class="form-label">കുടുംബത്തിന്റെ അവസ്ഥ  (അവിവാഹിതരായ :
                                        അമ്മ, വനിത നാഥയായ കുടുംബം , അകാലത്തിൽ
                                        വിധവയാകേണ്ടി വന്നവർ , ശാരീരിക മാനസിക
                                        വേല്ലുവിളി നേരിടുന്നവർ , തീരാവ്യാധി പിടിപ്പെട്ടവർ ,
                                        അതികർമങ്ങൾക്ക് ഇരയായ വനിതകൾ തുടങ്ങിയവ )
                                        
                                          </label>
                                          <textarea type="text" value="{{ old('family_details') }}"  class="form-control" placeholder="" name="family_details" ></textarea>
                                    
                                    @error('family_details')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-6">
                                    <label class="form-label">ധനസഹായം ആവശ്യപ്പെടുന്ന പ്രവർത്തിയുടെ സ്വഭാവം 
                                        (നവീകരണം ,അധിക സൗകര്യം / പൂർത്തീകരണം )
                                        </label>
                                        <div style="border: 1px solid black" class="form-control">

                                     
                                        <input type="radio" id="innovation" name="nature_payment" value="innovation">
                                        <label for="innovation">നവീകരണം</label> &nbsp; &nbsp;
                                      
                                        <input type="radio" id="option2" name="nature_payment" value="Additional convenience">
                                        <label for="Additional convenience">അധിക സൗകര്യം</label>&nbsp; &nbsp;
                                      
                                        <input type="radio" id="option3" name="nature_payment" value="Completion">
                                        <label for="Completion">പൂർത്തീകരണം</label>&nbsp; &nbsp;
                                    </div>
                                    @error('marriage_count')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                               
                              
                            </div><br> 
                            <div class="row">   
                                <div class="col-md-6 mb-6">
                                    <label class="form-label">നിർദിഷ്ട്ട ആവശ്യത്തിനും മറ്റ് സർക്കാർ വകുപ്പ് / 
                                        ഏജൻസികളിൽനിന്നോ തദ്ദേശ സ്വയംഭരണാ സ്ഥാപനങ്ങളിൽ നിന്നോ 
                                        ധനസഹായം ലഭിച്ചിട്ടുണ്ടോ എന്നുള്ള  വിവരം  
                                        (ഉണ്ടെങ്കിൽ എത്ര തുക ,ലഭിച്ച തീയതി )
                                        
                                        
                                          </label>
                                          <textarea type="text" value="{{ old('payment_details') }}"  class="form-control" placeholder="" name="payment_details" ></textarea>
                                    
                                    @error('payment_details')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label class="form-label">മുൻഗണന ലഭിക്കുന്നതിനുള്ള അർഹത തെളിയിക്കുന്നതിനുമുള്ള 
                                        മറ്റു സംഗതികൾ
                                  
                                        
                                        
                                          </label>
                                          <textarea type="text" value="{{ old('prove_eligibility ') }}"  class="form-control" placeholder="" name="prove_eligibility" ></textarea>
                                    
                                    @error('prove_eligibility')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label class="form-label">
                                  
                                        &nbsp;  &nbsp;  &nbsp;
                                        
                                          </label>
                                          <input type="file" class="form-control" accept="pdf/doc"  name="prove_eligibility_file" id="prove_eligibility_file" value="" placeholder=" " />
                                  
                                    @error('prove_eligibility_file')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                               
                               
                              
                            </div><br> 
                           
                          <div class="row">
                            <div class="col-md-6 mb-6">
                                <label class="form-label">
                                    സ്ഥലം
                                    
                              </label>
                              <input type="text" value="{{ old('place') }}" class="form-control" placeholder="" name="place" />
                              @error('place')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-6">
                                <label class="form-label">അപേക്ഷകന്റെ ഒപ്പ്  </label>
                                <input type="file" class="form-control" accept="image/*"  name="signature" id="signature" value="" placeholder="അപേക്ഷകന്റെ ഒപ്പ് " />
                                @error('signature')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                          </div><br>
                          <br>
                          <hr>
                          <br>
                          <div class="card">
                            <div class="card-body">
                                <div class="row">   
                                    <div class="col-md-6 mb-6">
                                        <label class="form-label">ജില്ല  </label>
                                        <select id="submitted_district" name="submitted_district" class="form-control" >
                                            <option value="">Select</option>
                                                @foreach($districts as $district)
                                                    <option value="{{$district->id}}"  >{{$district->name}}</option>
                                                @endforeach
                                        </select>
                                         @error('submitted_district')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                        <input type="hidden" name="dist_name" id="dist_name" value="">
                                    </div>
                                    <div class="col-md-6 mb-6">
                                        <label class="form-label">TEO  </label>
                                        <select id="submitted_teo" name="submitted_teo" class="form-control">
                                            <option value="">Choose TEO</option>
                                        </select>                                 
                                        @error('submitted_teo')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                        <input type="hidden" name="teo_name" id="teo_name" value="">
                                    </div>                                 
                                </div><br>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 mb-3">
                                
                                    </div>
                                    <div class="col-md-8 mb-8">
                                        <button type="submit" id="submit" class="btn btn-warning waves-effect waves-light text-start submit">Save</button>
                                    </div>
                                    
        
                                </div><br>
                           
                        </div>
                    </div>
                </div>

               
                                  
                                 
                            
                   
                        </form>
                    </div>
        </div>
    </div>
</div>

<script>
	$('#current_district').change(function(){
        var current_district = this.options[this.selectedIndex].text;
    document.getElementById('current_district_name').value = current_district;
        var val = document.getElementById("current_district").value;
      
        $.ajax({
                    url: "{{url('district/fetch-taluk')}}",
                    type: "POST",
                    data: {
                        district_id: val,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (result) {
                        $("#current_taluk").find('option').remove();
                          $("#current_taluk").append('<option value="" selected>Choose Taluk</option>');
                        $.each(result.taluks, function (key, value) {
                            var $opt = $('<option>');
                            $opt.val(value._id).text(value.taluk_name);
                            $opt.appendTo('#current_taluk');
                          

                        });

                    }
                });

    });
    $('#current_taluk').change(function(){
        var current_taluk = this.options[this.selectedIndex].text;
    document.getElementById('current_taluk_name').value = current_taluk;
    });
    $('#permanent_district').change(function(){
        var permanent_district = this.options[this.selectedIndex].text;
    document.getElementById('permanent_district_name').value = permanent_district;
        var val = document.getElementById("permanent_district").value;
      
        $.ajax({
                    url: "{{url('district/fetch-taluk')}}",
                    type: "POST",
                    data: {
                        district_id: val,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (result) {
                        $("#permanent_taluk").find('option').remove();
                          $("#permanent_taluk").append('<option value="" selected>Choose Taluk</option>');
                        $.each(result.taluks, function (key, value) {
                            var $opt = $('<option>');
                            $opt.val(value._id).text(value.taluk_name);
                            $opt.appendTo('#permanent_taluk');
                          

                        });

                    }
                });

    });
    $('#permanent_taluk').change(function(){
        var permanent_taluk = this.options[this.selectedIndex].text;
    document.getElementById('permanent_taluk_name').value = permanent_taluk;
    });

    $('#submitted_district').change(function(){
        var submitted_district = this.options[this.selectedIndex].text;
    document.getElementById('dist_name').value = submitted_district;
        var val = document.getElementById("submitted_district").value;
      
        $.ajax({
                    url: "{{url('district/fetch-teo')}}",
                    type: "POST",
                    data: {
                        district_id: val,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (result) {
                        $("#submitted_teo").find('option').remove();
                          $("#submitted_teo").append('<option value="" selected>Choose TEO</option>');
                        $.each(result.teos, function (key, value) {
                            var $opt = $('<option>');
                            $opt.val(value._id).text(value.teo_name);
                            $opt.appendTo('#submitted_teo');
                          

                        });

                    }
                });

    });
    $('#submitted_teo').change(function(){
        var submitted_teo = this.options[this.selectedIndex].text;
    document.getElementById('teo_name').value = submitted_teo;
    });

	$(document).ready(function() {
     	$('#example').DataTable();
	});
  </script>
<!-- main-content-body -->
@endsection
