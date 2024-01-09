@extends('layouts.app')

@section('content')
<!-- main-content -->
<div class="main-content app-content">
	<!-- container -->
	<div class="main-container container-fluid">
		<!-- breadcrumb -->
		<div class="breadcrumb-header justify-content-between row me-0 ms-0" >
			<div class="col-md-12">
				
                <h2>മിശ്ര വിവാഹം മൂലം ക്ലേശങ്ങൾ അനുഭവിക്കുന്ന പട്ടികവർഗ്ഗ ദമ്പതികൾക്ക് പട്ടികവർഗ്ഗ വികസന വകുപ്പിൽ നിന്നും സാമ്പത്തിക സഹായം അനുവദിക്കുന്നതിനുള്ള അപേക്ഷഫോറം </h2>
			
			</div>

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
			

                        <form name="userForm" id="userForm" method="post" action="{{route('financialHelpStore')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="card">
                                <div class="card-body">
                            അപേക്ഷകന്റെ പേരും പൂർണ്ണ മേൽ വിലാസവും 
                            <br>
                                <div class="row">
                                     
                                     
                                    <div class="col-md-6 mb-6">
                                        <label class="form-label">Husband / ഭർത്താവ് </label>
                                        <input type="text" value="{{ old('husband_address') }}"  class="form-control" placeholder="Husband Address" name="husband_address" />
                                        @error('husband_address')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-6">
                                        <label class="form-label">Wife / ഭാര്യ  </label>
                                        <input type="text" value="{{ old('wife_address') }}" class="form-control" placeholder="Wife Address" name="wife_address" />
                                        <span id="nameError" class="text-danger"></span>
                                        @error('wife_address')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>

                                    
                                </div><br>
                                വിവാഹത്തിനുമുമ്പുള്ള പൂർണ്ണ  മേൽവിലാസം 
                                <div class="row">
                                    <div class="col-md-6 mb-6">
                                        <label class="form-label">Husband / ഭർത്താവ് </label>
                                        <input type="text" value="{{ old('husband_address_old') }}"  class="form-control" placeholder="Husband Address" name="husband_address_old" />
                                        @error('husband_address_old')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-6">
                                        <label class="form-label">Wife / ഭാര്യ  </label>
                                        <input type="text" value="{{ old('wife_address_old') }}" class="form-control" placeholder="Wife Address" name="wife_address_old" />
                                        <span id="nameError" class="text-danger"></span>
                                        @error('wife_address_old')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    
                                </div><br>
                                <div class="row">   
                                    <div class="col-md-2 mb-2">
                                        <label class="form-label">ജില്ല  </label>
                                        <select id="hus_district" name="hus_district" class="form-control" >
                                            <option value="">Select</option>
                                                @foreach($districts as $district)
                                                    <option value="{{$district->id}}"  >{{$district->name}}</option>
                                                @endforeach
                                        </select>
                                         @error('hus_district')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                        <input type="hidden" name="hus_district_name" id="hus_district_name" value="">
                                    </div>
                                    <div class="col-md-2 mb-2">
                                        <label class="form-label">താലൂക്ക്  </label>
                                        <select id="hus_taluk" name="hus_taluk" class="form-control">
                                            <option value="">Choose Taluk</option>
                                        </select>                                 
                                        @error('hus_taluk')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                        <input type="hidden" name="hus_taluk_name" id="hus_taluk_name" value="">
                                    </div>
                                    <div class="col-md-2 mb-2">
                                        <label class="form-label">പിൻകോഡ്  </label>
                                        <input type="text" value="{{ old('hus_pincode') }}"  class="form-control"  name="hus_pincode" />
                                        @error('hus_pincode')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-2 mb-2">
                                        <label class="form-label">ജില്ല  </label>
                                        <select id="wife_district" name="wife_district" class="form-control" >
                                            <option value="">Select</option>
                                                @foreach($districts as $district)
                                                    <option value="{{$district->id}}"  >{{$district->name}}</option>
                                                @endforeach
                                        </select>
                                         @error('wife_district')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                        <input type="hidden" name="wife_district_name" id="wife_district_name" value="">
                                    </div>
                                    <div class="col-md-2 mb-2">
                                        <label class="form-label">താലൂക്ക്  </label>
                                        <select id="wife_taluk" name="wife_taluk" class="form-control">
                                            <option value="">Choose Taluk</option>
                                        </select>                                 
                                        @error('wife_taluk')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                        <input type="hidden" name="wife_taluk_name" id="wife_taluk_name" value="">
                                    </div>
                                    <div class="col-md-2 mb-2">
                                        <label class="form-label">പിൻകോഡ്  </label>
                                        <input type="text" value="{{ old('wife_pincode') }}"  class="form-control"  name="wife_pincode" />
                                        @error('wife_pincode')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div><br>
                                സമുദായം
                                <div class="row">
                                    <div class="col-md-6 mb-6">
                                        <label class="form-label">Husband / ഭർത്താവ് </label>
                                        <input type="text" value="{{ old('husband_caste') }}"  class="form-control" placeholder="Husband Caste" name="husband_caste" />
                                        @error('husband_caste')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-6">
                                        <label class="form-label">Wife / ഭാര്യ  </label>
                                        <input type="text" value="{{ old('wife_caste') }}" class="form-control" placeholder="Wife Caste" name="wife_caste" />
                                        <span id="nameError" class="text-danger"></span>
                                        @error('wife_caste')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div><br>
                                വിവാഹത്തിനുമുമ്പുള്ള തൊഴിലും മാസ വരുമാനവും 
                                <div class="row">
                                   <div class="col-md-6 mb-6">
                                        <label class="form-label">Husband / ഭർത്താവ് </label>
                                        <input type="text" value="{{ old('hus_work_before_marriage') }}"  class="form-control" placeholder="വിവാഹത്തിനുമുമ്പുള്ള തൊഴിലും മാസ വരുമാനവും" name="hus_work_before_marriage" />
                                        @error('hus_work_before_marriage')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-6">
                                        <label class="form-label">Wife / ഭാര്യ  </label>
                                        <input type="text" value="{{ old('wife_work_before_marriage') }}" class="form-control" placeholder="വിവാഹത്തിനുമുമ്പുള്ള തൊഴിലും മാസ വരുമാനവും " name="wife_work_before_marriage" />
                                        <span id="nameError" class="text-danger"></span>
                                        @error('wife_work_before_marriage')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>

                                    
                                </div><br>

                                അപേക്ഷ സമർപ്പിക്കുമ്പോഴത്തെ തൊഴിലും മാസാവരുമാനവും 
                                <div class="row">
                                   <div class="col-md-6 mb-6">
                                        <label class="form-label">Husband / ഭർത്താവ് </label>
                                        <input type="text" value="{{ old('hus_work_after_marriage') }}"  class="form-control" placeholder="അപേക്ഷ സമർപ്പിക്കുമ്പോഴത്തെ തൊഴിലും മാസാവരുമാനവും" name="hus_work_after_marriage" />
                                        @error('hus_work_after_marriage')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-6">
                                        <label class="form-label">Wife / ഭാര്യ  </label>
                                        <input type="text" value="{{ old('wife_work_after_marriage') }}" class="form-control" placeholder="അപേക്ഷ സമർപ്പിക്കുമ്പോഴത്തെ തൊഴിലും മാസാവരുമാനവും" name="wife_work_after_marriage" />
                                        <span id="nameError" class="text-danger"></span>
                                        @error('wife_work_after_marriage')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>

                                    
                                </div><br>

                                വിവാഹത്തിന്റെ വിശദ വിവരങ്ങൾ <br>
                                എ)വിവാഹ സമയത്തെ പ്രായം 
                                <div class="row">
                                   <div class="col-md-6 mb-6">
                                        <label class="form-label">Husband / ഭർത്താവ് </label>
                                        <input type="text" value="{{ old('husband_age') }}"  class="form-control" placeholder="വിവാഹ സമയത്തെ പ്രായം" name="husband_age" />
                                        @error('husband_age')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-6">
                                        <label class="form-label">Wife / ഭാര്യ  </label>
                                        <input type="text" value="{{ old('wife_age') }}" class="form-control" placeholder="വിവാഹ സമയത്തെ പ്രായം" name="wife_age" />
                                        <span id="nameError" class="text-danger"></span>
                                        @error('wife_age')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>

                                    
                                </div><br>

                                ബി)രജിസ്റ്റർ വിവാഹം ആയിരുന്നുവോ എങ്കിൽ രെജിസ്റ്ററേഷൻ നമ്പരും തിയതിയും, റെജിസ്റ്ററോഫീസിന്റെ പേരും 

                                <div class="row">
                                   <div class="col-md-12">
                                        <label class="form-label">Details</label>
                                        <textarea class="form-control" placeholder="Details" name="register_details" >{{ old('register_details') }}</textarea>
                                       
                                    </div>
                                    
                                </div><br>
                                സി)വിവാഹത്തിന്റെ സാധ്യത തെളിയിക്കുന്നതിന് രേഖ ഹാജരാക്കിയിട്ടുണ്ടെങ്കിൽ അതിന്റെ വിവരം 
                                <div class="row">
                                   <div class="col-md-12">
                                        <label class="form-label">Details</label>
                                        <textarea class="form-control" placeholder="Details" name="certificate_details" >{{ old('certificate_details') }}</textarea>
                                       
                                    </div>
                                    
                                </div><br>
                                വിവാഹത്തിനുശേഷം ദമ്പതികൾ ഏതെങ്കിലും കാലയളവിൽ വേർപിരിഞ്ഞ് താമസിച്ചിട്ടുണ്ടോ? 
                                <div class="row">
                                    <div class="col-md-6">
                                             <label class="form-label">Yes</label>
                                            <input class="form-control" type="radio" name="apart_for_any_period" value="Yes">

                                            <label class="form-label">No</label>
                                            <input class="form-control" type="radio" name="apart_for_any_period" value="No">
                                    </div>
                                </div><br>
                                <div id="additionalDiv" style="display:none;">
                                    വേർപിരിഞ്ഞ് താമസിച്ച കാലയളവ് 
                                    <div class="row">
                                        <div class="col-md-12">
                                                <label class="form-label">Duration</label>
                                                <input type="text" class="form-control" placeholder="Duration" name="duration" />
                                            
                                            </div>
                                    
                                    </div><br>
                                    വേർപിരിഞ്ഞ് താമസിക്കാനുണ്ടായ കാരണം 
                                    <div class="row">
                                        <div class="col-md-12">
                                                <label class="form-label">Reason</label>
                                                <input type="text" class="form-control" placeholder="Reason" name="reason" />
                                            
                                            </div>
                                    
                                    </div><br>


                                </div>

                                ധനസഹായം ലഭിക്കുന്ന പക്ഷം എന്തു കാര്യത്തിനുവേണ്ടി ചെലവഴിക്കാനാണ് ഉദ്ദേശിക്കുന്നത് 
                                <div class="row">
                                   <div class="col-md-12">
                                        <label class="form-label">Details</label>
                                        <textarea class="form-control" placeholder="Details" name="financial_assistance" >{{ old('financial_assistance') }}</textarea>
                                       
                                    </div>
                                    
                                </div><br>

                                മിശ്രവിവാഹം മൂലം ദമ്പതികൾക്ക് അനുഭവിക്കേണ്ടി വന്നിട്ടുള്ള കഷ്ടതകളും പ്രയാസങ്ങളും എന്തെല്ലാം 
                                <div class="row">
                                   <div class="col-md-12">
                                        <label class="form-label">Details</label>
                                        <textarea class="form-control" placeholder="Details" name="difficulties" >{{ old('difficulties') }}</textarea>
                                       
                                    </div>
                                    
                                </div><br>
                                <div class="row">
                                    <div class="col-md-6 mb-6">
												<label class="form-label">Husband's Sign/ഭർത്താവിന്റെ ഒപ്പ് </label>
												<input type="file" class="form-control"  name="husband_sign" required />
												@error('husband_sign')
														<span class="text-danger">{{$message}}</span>
												@enderror
											</div>

											<div class="col-md-6 mb-6">
												<label class="form-label">Wife's Sign/ ഭാര്യയുടെ ഒപ്പ് </label>
												<input type="file" class="form-control"  name="wife_sign" required />
												@error('wife_sign')
														<span class="text-danger">{{$message}}</span>
												@enderror
											</div>

                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-1 mb-1">
                                             <input type="checkbox" id="wifeCheckbox" name="agree" value="Yes" required>
                                         </div>
                                         <div class="col-md-11 mb-11">
                                             ശ്രീമാൻ <input type="text" class="form-control"  name="husband_name" required />ശ്രീമതി 
                                              <input type="text" class="form-control"  name="wife_name" required />
                                             എന്നിവരായ ഞങ്ങൾ മുകളിൽ ചേർത്ത എല്ലാ വിവരങ്ങളും സത്യവും ശരിയുമാണെന്ന് ഇതിനാൽ പ്രതിജ്ഞ ചെയ്തുകൊള്ളുന്നു.
                                         </div>
                                     </div>
 
                            </div>
                        </div>
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">   
                                            <div class="col-md-6 mb-6">
                                                <label class="form-label">ജില്ല  </label>
                                                <select id="submitted_district" name="submitted_district" class="form-control" required>
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
                                                <select id="submitted_teo" name="submitted_teo" class="form-control" required>
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
                                
                            	</form>
                    </div>
                </div>
            </div>
        </div>
	</div>
</div>
<script>


	$(document).ready(function() {
     	$('input[name="apart_for_any_period"]').change(function() {
            if ($(this).val() === 'Yes') {
                $('#additionalDiv').show();
            } else {
                $('#additionalDiv').hide();
            }
        });
	});

    $('#hus_district').change(function(){
        var hus_district = this.options[this.selectedIndex].text;
    document.getElementById('hus_district_name').value = hus_district;
        var val = document.getElementById("hus_district").value;
      
        $.ajax({
                    url: "{{url('district/fetch-taluk')}}",
                    type: "POST",
                    data: {
                        district_id: val,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (result) {
                        $("#hus_taluk").find('option').remove();
                          $("#hus_taluk").append('<option value="" selected>Choose Taluk</option>');
                        $.each(result.taluks, function (key, value) {
                            var $opt = $('<option>');
                            $opt.val(value._id).text(value.taluk_name);
                            $opt.appendTo('#hus_taluk');
                          

                        });

                    }
                });

    });
    $('#hus_taluk').change(function(){
        var hus_taluk = this.options[this.selectedIndex].text;
    document.getElementById('hus_taluk_name').value = hus_taluk;
    });
    $('#wife_district').change(function(){
        var wife_district = this.options[this.selectedIndex].text;
    document.getElementById('wife_district_name').value = wife_district;
        var val = document.getElementById("wife_district").value;
      
        $.ajax({
                    url: "{{url('district/fetch-taluk')}}",
                    type: "POST",
                    data: {
                        district_id: val,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (result) {
                        $("#wife_taluk").find('option').remove();
                          $("#wife_taluk").append('<option value="" selected>Choose Taluk</option>');
                        $.each(result.taluks, function (key, value) {
                            var $opt = $('<option>');
                            $opt.val(value._id).text(value.taluk_name);
                            $opt.appendTo('#wife_taluk');
                          

                        });

                    }
                });

    });
    $('#wife_taluk').change(function(){
        var wife_taluk = this.options[this.selectedIndex].text;
    document.getElementById('wife_taluk_name').value = wife_taluk;
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
  </script>
<!-- main-content-body -->
@endsection
