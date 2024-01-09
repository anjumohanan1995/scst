@extends('layouts.app')

@section('content')
<!-- main-content -->
<div class="main-content app-content">
	<!-- container -->
	<div class="main-container container-fluid">
		<!-- breadcrumb -->
		<div class="breadcrumb-header justify-content-between row me-0 ms-0" >
			
				<h4 class="content-title mb-2">അനാധകർക്ക്പ്രതിമാസം 1500 രൂപ ധനസഹായം നൽകുന്ന പദ്ധതി കൈത്താങ്ങ്  </h4>
				

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
           
                    <form name="patientForm" id="patientForm" method="post" action="{{route('childFinancialAssistanceStore')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="card">
                            <div class="card-body">
                        <div class="form-group">
                            <div class="row">   
                                <div class="col-md-6 mb-6">
                                    <label class="form-label">കുട്ടിയുടെ പേര്  </label>
                                    <input type="text" value="{{ old('name') }}"  class="form-control" placeholder="" name="name" />
                                    @error('name')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-6">
                                    <label class="form-label">കുട്ടിയുടെ വയസ്സ്    </label>
                                    <input type="number" value="{{ old('age') }}" class="form-control" placeholder="" name="age" />
                                    
                                    @error('age')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div><br>
                            <div class="row">   
                                <div class="col-md-6 mb-6">
                                    <label class="form-label">കുട്ടിയുടെ ജനന തീയതി(സർട്ടിഫിക്കറ്റ് ഉണ്ടെങ്കിൽ മാത്രം എഴുതുക) </label>
                                    <input type="date" value="{{ old('dob') }}"  class="form-control" placeholder="" name="dob" />
                                    @error('dob')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-6">
                                    <label class="form-label">കുട്ടിയുടെ ജനന സർട്ടിഫിക്കറ്റ്   </label>
                                    <input type="file" value="{{ old('birth_certificate') }}" class="form-control" placeholder="" name="birth_certificate" />
                                    
                                  
                                </div>
                            </div><br>

                            <div class="row">   
                                <div class="col-md-6 mb-6">
                                    <label class="form-label">അച്ഛന്റെ പേര്   </label>
                                    <input type="text" value="{{ old('father_name') }}"  class="form-control" placeholder="" name="father_name" />
                                    @error('father_name')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-6">
                                    <label class="form-label">അമ്മയുടെ പേര്  </label>
                                     <input type="text" value="{{ old('mother_name') }}"  class="form-control" placeholder="" name="mother_name" />
                                    @error('mother_name')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                    
                                  
                                </div>
                            </div><br>
                            <div class="row">  

                             
                                <div class="col-md-6 mb-6">
                                    <label class="form-label">കുട്ടിയെ നിലവിൽ സംരക്ഷിക്കുന്ന രക്ഷിതാവിന്റെ പേര്  </label>
                                     <input type="text" value="{{ old('guardian_name') }}"  class="form-control" placeholder="" name="guardian_name" />
                                    @error('guardian_name')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                    
                                  
                                </div>
                                <div class="col-md-6 mb-6">
                                    <label class="form-label">രക്ഷിതാവിന്റെ മേൽവിലാസം  </label>
                                    <textarea type="text" value="{{ old('address') }}"  class="form-control" placeholder="" name="address" ></textarea>
                                    @error('address')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                             
                               
                            </div>
                            <div class="row">   
                                <div class="col-md-4 mb-4">
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
                                <div class="col-md-4 mb-4">
                                    <label class="form-label">താലൂക്ക്  </label>
                                    <select id="current_taluk" name="current_taluk" class="form-control">
                                        <option value="">Choose Taluk</option>
                                    </select>                                 
                                    @error('current_taluk')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                    <input type="hidden" name="current_taluk_name" id="current_taluk_name" value="">
                                </div>
                                <div class="col-md-4 mb-4">
                                    <label class="form-label">പിൻകോഡ്  </label>
                                    <input type="number" value="{{ old('current_pincode') }}"  class="form-control"  name="current_pincode" />
                                    @error('current_pincode')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">   
                                <div class="col-md-6 mb-2">
                                    <label class="form-label">രക്ഷിതാവിന്റെ സമുദായം  </label>
                                        <input type="text" value="{{ old('caste') }}"  class="form-control" placeholder="" name="caste" />
                                        @error('caste')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label class="form-label">ഫോൺ നമ്പർ   </label>
                                    <input type="text" value="{{ old('mobile') }}"  class="form-control" placeholder="" name="mobile" />
                                        @error('mobile')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                </div>
                                   
                            </div><br>

                            <div class="row">  
                             <div class="col-md-6 mb-2">
                                    <label class="form-label">രക്ഷിതാവിന്റെ ബാങ്ക് അക്കൗണ്ട് നമ്പർ  </label>
                                    <input type="text" value="{{ old('account_number') }}"  class="form-control" placeholder="" name="account_number" />
                                        @error('account_number')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                </div> 
                                <div class="col-md-6 mb-2">
                                    <label class="form-label">ആധാർ ഉണ്ടെങ്കിൽ ആയതിന്റെ നമ്പർ  </label>
                                        <input type="number" value="{{ old('aadhar_number') }}"  class="form-control" placeholder="" name="aadhar_number" />
                                        @error('aadhar_number')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    
                                </div>
                               
                                   
                            </div><br>

                            <div class="row">   
                                <div class="col-md-6 mb-2">
                                    <label class="form-label">വോട്ടർ ഐ.ഡി. കാർഡ് ഉണ്ടെങ്കിൽ ആയതിന്റെ നമ്പർ </label>
                                    <input type="text" value="{{ old('voter_id') }}"  class="form-control" placeholder="" name="voter_id" />
                                        @error('voter_id')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label class="form-label"> റേഷൻ കാർഡ് ഉണ്ടെങ്കിൽ ആയതിന്റെ നമ്പർ  </label>
                                        <input type="text" value="{{ old('ration_card_number') }}"  class="form-control" placeholder="" name="ration_card_number" />
                                        @error('ration_card_number')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    
                                </div>
                                
                                   
                            </div><br>
                            <div class="row">   
                                <div class="col-md-6 mb-4">
                                    <label class="form-label">സ്ഥലം</label>
                                    <input type="text" value="{{ old('place') }}" class="form-control" placeholder="സ്ഥലം" name="place" />
                                    @error('place')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                
                                <div class="col-md-6 mb-4">
                                    <label class="form-label">അപേക്ഷകന്റെ ഒപ്പ്/വിരലടയാളം </label>
                                    <input type="file" value="{{ old('signature') }}"  class="form-control" placeholder="അപേക്ഷകന്റെ ഒപ്പ്/വിരലടയാളം" name="signature" />
                                    @error('signature')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>                                
                            </div><br>  
                            <div class="row">   
                                <div class="col-md-6 mb-4">
                                    <label class="form-label">കുട്ടിയുടെ ഫോട്ടോ </label>
                                    <input type="file" value="{{ old('child_signature') }}"  class="form-control" placeholder="കുട്ടിയുടെ ഫോട്ടോ" name="child_signature" />
                                    @error('child_signature')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>     
                            </div>

                           

                           
                        </div>
                    </div>
                </div>
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
                                 @error('dist')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                                <input type="hidden" name="dist_name" id="dist_name" value="">
                            </div>
                            <div class="col-md-6 mb-6">
                                <label class="form-label">TEO  </label>
                                <select id="submitted_teo" name="submitted_teo" class="form-control">
                                    <option value="">Choose TEO</option>
                                </select>                                 
                                @error('teo')
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
