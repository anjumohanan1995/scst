@extends('layouts.app')

@section('content')
<!-- main-content -->
<div class="main-content app-content">
	<!-- container -->
	<div class="main-container container-fluid">
		<!-- breadcrumb -->
		<div class="breadcrumb-header justify-content-between row me-0 ms-0" >
			
				<h4 class="content-title mb-2"> സിക്കിൾസെൽ അനീമിയരോഗികൾക്ക് പ്രതിമാസ ധനസഹായം നൽകുന്ന പദ്ധതി</h4>
				

            @if ($message = Session::get('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><i class="fa fa-window-close"></i></button>                                {{ $message }}
                </div>
            @endif
		</div>
		<!-- /breadcrumb -->


<div class="main-content-body">
    <div class="row row-sm mt-4">
        <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12 ">
          
               
                    <form name="patientForm" id="patientForm" method="post" action="{{route('anemiaFinancePreview')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="card">
                        <div class="card-body">
                        <div class="form-group">
                            <div class="row">   
                                <div class="col-md-4 mb-4">
                                    <label class="form-label">പേര് / Name <span class="text-danger text-bold">*</span></label>
                                    <input type="text" value="{{ old('name') }}"  class="form-control" placeholder="പേര്" name="name"  />
                                    @error('name')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="col-md-4 mb-4">
                                    <label class="form-label">ജനനതീയതി / Date of Birth  </label>
                                    <input type="date" class="form-control"  name="dob" id="dob" value="{{ old('dob') }}"  />
                                    @error('dob')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="col-md-4 mb-4">
                                    <label class="form-label">വയസ് / Age <span class="text-danger text-bold">*</span> </label>
                                    <input type="number" value="{{ old('age') }}"  class="form-control"  name="age" />
                                    @error('age')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div> 
                              
                            </div>
                            <div class="row pb-4">  
                                <div class="col-md-6 mb-6">
                                    <label class="form-label">ഇ - മെയിൽ ഐഡി / Email Id   </label>
                                    <input type="text" class="form-control"  name="email" id="email" value="{{ old('email') }}" placeholder="" />                                   
                                     @error('email')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>      
                                <div class="col-md-6 mb-6">
                                    <label class="form-label">ഫോൺ നമ്പർ / Phone Number   <span class="text-danger text-bold">*</span></label>
                                    <input type="number" class="form-control"  name="phone" id="phone" value="{{ old('phone') }}" placeholder="" />                                  
                                      @error('phone')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>       
                            </div>
                            <div class="row">  
                               
                                <div class="col-md-6 mb-6">
                                    <label class="form-label">ജാതി / Caste <span class="text-danger text-bold">*</span></label>
                                    <input type="text" value="{{ old('caste') }}"  class="form-control"  name="caste" />
                                    @error('caste')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-6">
                                    <label class="form-label">ജാതി സർട്ടിഫിക്കറ്റ് / Caste Certificate  <span class="text-danger text-bold">*</span></label>
                                    <input type="file" class="form-control"  name="caste_certificate" id="caste_certificate" value="" placeholder="" onchange="validateCaste()" />
                                    <p style="font-size: 11px;">Max. filesize: 2 MB • Format: JPG, PNG, PDF </p>

                                    @error('caste_certificate')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                    <div id="errorMessageone" style="color:red;"></div>
                                </div>
                                                       
                            </div>
                            <div class="row">
                                <div class="col-md-3 mb-3">
                                    <label class="form-label">മേൽവിലാസം / Address <span class="text-danger text-bold">*</span></label>
                                    <textarea type="text" class="form-control" name="address" >{{ old('address') }}</textarea>
                                    @error('address')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>  
                                <div class="col-md-3 mb-3">
                                    <label class="form-label">ജില്ല / District </label>
                                    <select id="district" name="district" class="form-control" >
                                        <option value="">Select</option>
                                            @foreach($districts as $district)
                                                <option value="{{$district->id}}" @if($district->id == old('district')) selected @endif  >{{$district->name}}</option>
                                            @endforeach
                                    </select>
                                     @error('district')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                    <input type="hidden" name="district_name" id="district_name" value="{{ old('district_name') }}">
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label class="form-label">താലൂക്ക് / Taluk </label>
                                    <select id="taluk" name="taluk" class="form-control">
                                        <option value="">Choose Taluk</option>
                                    </select>                                 
                                    @error('taluk')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                    <input type="hidden" name="taluk_name" id="taluk_name" value="{{ old('taluk_name') }}">
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label class="form-label">പിൻകോഡ് / Pincode </label>
                                    <input type="text" value="{{ old('pincode') }}"  class="form-control"  name="pincode" />
                                    @error('pincode')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">   
                                <div class="col-md-6 mb-6">
                                    <label class="form-label">ആധാർ നമ്പർ / Aadhar Number  <span class="text-danger text-bold">*</span></label>
                                    <input type="text" pattern="[0-9]{12}" maxlength="12" class="form-control"  name="adhaar_number" id="adhaar_number" value="{{ old('adhaar_number') }}" placeholder="" inputmode="numeric"
                                                oninput="this.value = this.value.replace(/[^0-9]/g, '');" />
                                            
                                    @error('adhaar_number')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-6">
                                    <label class="form-label">ആധാർ പകർപ്പ് / Aadhaar copy  <span class="text-danger text-bold">*</span></label>
                                    <input type="file" class="form-control"  name="adhaar_copy" id="adhaar_copy" value="" placeholder="" onchange="validateAdhar()"/>
                                    <p style="font-size: 11px;">Max. filesize: 2 MB • Format: JPG, PNG, PDF </p>

                                    @error('adhaar_copy')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                    <div id="errorAdhar" style="color:red;"></div>
                                </div>
                            </div><br>
                            <div class="row">   
                                <div class="col-md-6 mb-6">
                                    <label class="form-label">ബാങ്ക് അക്കൗണ്ട് വിശദംശങ്ങൾ / Bank account details  <span class="text-danger text-bold">*</span> </label>
                                    <textarea type="text" class="form-control"  name="bank_account_details" id="bank_account_details" value="" placeholder="" >{{ old('bank_account_details') }}</textarea>
                                    @error('bank_account_details')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-6">
                                    <label class="form-label">ബാങ്ക് അക്കൗണ്ട് പാസ്സ് ബുക്കിന്റെ പകർപ്പ് / Copy of Bank Account Pass Book   <span class="text-danger text-bold">*</span></label>
                                    <input type="file" class="form-control"  name="passbook_copy" id="passbook_copy" value="" placeholder="" onchange="validatePassbook()" />
                                    @error('passbook_copy')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                    <div id="errorPassbook" style="color:red;"></div>
                                </div>
                            </div><br>
                            <div class="row">   
                                <div class="col-md-6 mb-6">
                                    <label class="form-label">റേഷൻ കാർഡ് / Ration card </label>
                                    <div>
                                        <input type="radio" id="apl" name="ration_card_type" value="APL" {{ old('ration_card_type') == 'APL' ? 'checked' : '' }}>
                                        <label for="apl">APL</label>
                                    </div>
                                    <div>
                                        <input type="radio" id="bpl" name="ration_card_type" value="BPL" {{ old('ration_card_type') == 'BPL' ? 'checked' : '' }}>
                                        <label for="bpl">BPL</label>
                                    </div>
                                    @error('ration_card_type')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-6">
                                    <label class="form-label">റേഷൻ  കാർഡ് പകർപ്പ് / Copy of Ration Card  </label>
                                    <input type="file" class="form-control"  name="ration_card" id="ration_card" value="" placeholder="" onchange="validateRationcard()" />
                                    <p style="font-size: 11px;">Max. filesize: 2 MB • Format: JPG, PNG, PDF </p>

                                    @error('ration_card')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                    <div id="errorRationcard" style="color:red;"></div>
                                </div>
                            </div><br>
                            <div class="row">   
                                <div class="col-md-6 mb-6">
                                    <label class="form-label">മെഡിക്കൽ സർട്ടിഫിക്കറ്റ് ഹാജരാക്കിയിട്ടുണ്ടോ? / Is the medical certificate submitted? </label>
                                    <div>
                                        <input type="radio" id="yes" name="is_medical_certificate_submitted" value="Yes" {{ old('is_medical_certificate_submitted') == 'Yes' ? 'checked' : '' }}>
                                        <label for="yes">Yes</label>
                                    </div>
                                    <div>
                                        <input type="radio" id="no" name="is_medical_certificate_submitted" value="No" {{ old('is_medical_certificate_submitted') == 'No' ? 'checked' : '' }}>
                                        <label for="no">No</label>
                                    </div>
                                    @error('is_medical_certificate_submitted')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-6">
                                    <label class="form-label">മെഡിക്കൽ സർട്ടിഫിക്കറ്റ് / Medical certificate  </label>
                                    <input type="file" class="form-control"  name="medical_certificate" id="medical_certificate" value="" placeholder="" onchange="validateMedical()" />
                                    <p style="font-size: 11px;">Max. filesize: 2 MB • Format: JPG, PNG, PDF </p>

                                    @error('medical_certificate')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                    <div id="errorMedical" style="color:red;"></div>
                                </div>
                            </div><br>
                            {{--  <h3 style="text-align: center;"><u>സത്യപ്രസ്താവന</u></h3>
                            <p style="text-align: center;">മേൽ പ്രസ്താവിച്ച വിവരങ്ങൾ പൂർണമായും സത്യമാണെന്ന് ബോധിപ്പിക്കുന്നു</p>  --}}
                             <div class="row">
                                        <div class="col-md-4 mb-4">
                                            <label class="form-label">സ്ഥലം / Place </label>
                                            <input type="text" class="form-control" name="place" id="place"
                                                value="{{ old('place') }}" placeholder="" />
                                            @error('place')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-4 mb-4">
                                            <label class="form-label">അപേക്ഷകന്റെ ഫോട്ടോ / Applicant's photo</label>
                                            <input type="file" class="form-control" name="applicant_photo" id="applicant_photo"
                                                value="" placeholder="" onchange="validatePhoto()" accept=".jpg, .jpeg, .png"  />
                                                <p style="font-size: 11px;">Max. filesize: 2 MB • Format: JPG, PNG </p>
                                            @error('signature')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            <div id="errorPhoto" style="color:red;"></div>
                                        </div>
                                        <div class="col-md-4 mb-4">
                                            <label class="form-label">അപേക്ഷകന്റെ ഒപ്പ് / Applicant's signature</label>
                                            <input type="file" class="form-control" name="signature" id="signature"
                                                value="" placeholder="" onchange="validateSignature()" accept=".jpg, .jpeg, .png"  />
                                                <p style="font-size: 11px;">Max. filesize: 2 MB • Format: JPG, PNG </p>
                                            @error('signature')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            <div id="errorSignature" style="color:red;"></div>
                                        </div>
                                    </div><br>
                        </div>
                    </div>
                </div>

                    <div class="card">
                            <div class="card-body">
                                <div class="row">   
                                    <div class="col-md-6 mb-6">
                                        <label class="form-label">ജില്ല / District </label>
                                        <select id="submitted_district" name="submitted_district" class="form-control"  />
                                            <option value="">Select</option>
                                                @foreach($districts as $district)
                                                    <option value="{{$district->id}}" @if($district->id == old('submitted_district')) selected @endif >{{$district->name}}</option>
                                                @endforeach
                                        </select>
                                         @error('submitted_district')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                        <input type="hidden" name="dist_name" id="dist_name" value="{{ old('dist_name') }}" >
                                    </div>
                                    <div class="col-md-6 mb-6">
                                        <label class="form-label">ടി.ഇ.ഒ / TEO</label>
                                        <select id="submitted_teo" name="submitted_teo" class="form-control"  />
                                            <option value="">Choose TEO</option>
                                        </select>                                 
                                        @error('submitted_teo')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                        <input type="hidden" name="teo_name" id="teo_name" value="{{ old('teo_name') }}">
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

<script>
    function validateCaste() {
        var input = document.getElementById('caste_certificate');
        var errorMessage = document.getElementById('errorMessageone');

        if (input.files.length > 0) {
            var fileSize = input.files[0].size; // in bytes
            var maxSize = 2 * 1024 * 1024; // 2MB

            if (fileSize > maxSize) {
                errorMessage.innerText = 'Error: Image size exceeds 2MB limit';
                input.value = ''; // Clear the file input
                $("#submit").prop("disabled", true);
            } else {
                errorMessage.innerText = '';
                 $("#submit").prop("disabled", false);
            }
        }

        
    }
    function validateAdhar() {
        var input = document.getElementById('adhaar_copy');
        var errorMessage = document.getElementById('errorAdhar');

        if (input.files.length > 0) {
            var fileSize = input.files[0].size; // in bytes
            var maxSize = 2 * 1024 * 1024; // 2MB

            if (fileSize > maxSize) {
                errorMessage.innerText = 'Error: Image size exceeds 2MB limit';
                input.value = ''; // Clear the file input
                $("#submit").prop("disabled", true);
            } else {
                errorMessage.innerText = '';
                 $("#submit").prop("disabled", false);
            }
        }

        
    }
    function validatePassbook() {
        var input = document.getElementById('passbook_copy');
        var errorMessage = document.getElementById('errorPassbook');

        if (input.files.length > 0) {
            var fileSize = input.files[0].size; // in bytes
            var maxSize = 2 * 1024 * 1024; // 2MB

            if (fileSize > maxSize) {
                errorMessage.innerText = 'Error: Image size exceeds 2MB limit';
                input.value = ''; // Clear the file input
                $("#submit").prop("disabled", true);
            } else {
                errorMessage.innerText = '';
                 $("#submit").prop("disabled", false);
            }
        }

        
    }
    function validateRationcard() {
        var input = document.getElementById('ration_card');
        var errorMessage = document.getElementById('errorRationcard');

        if (input.files.length > 0) {
            var fileSize = input.files[0].size; // in bytes
            var maxSize = 2 * 1024 * 1024; // 2MB

            if (fileSize > maxSize) {
                errorMessage.innerText = 'Error: Image size exceeds 2MB limit';
                input.value = ''; // Clear the file input
                $("#submit").prop("disabled", true);
            } else {
                errorMessage.innerText = '';
                 $("#submit").prop("disabled", false);
            }
        }

        
    }
    function validateMedical() {
        var input = document.getElementById('medical_certificate');
        var errorMessage = document.getElementById('errorMedical');

        if (input.files.length > 0) {
            var fileSize = input.files[0].size; // in bytes
            var maxSize = 2 * 1024 * 1024; // 2MB

            if (fileSize > maxSize) {
                errorMessage.innerText = 'Error: Image size exceeds 2MB limit';
                input.value = ''; // Clear the file input
                $("#submit").prop("disabled", true);
            } else {
                errorMessage.innerText = '';
                 $("#submit").prop("disabled", false);
            }
        }

        
    }
    function validateSignature() {
        var input = document.getElementById('signature');
        var errorMessage = document.getElementById('errorSignature');

        if (input.files.length > 0) {
            var fileSize = input.files[0].size; // in bytes
            var maxSize = 2 * 1024 * 1024; // 2MB

            if (fileSize > maxSize) {
                errorMessage.innerText = 'Error: Image size exceeds 2MB limit';
                input.value = ''; // Clear the file input
                $("#submit").prop("disabled", true);
            } else {
                errorMessage.innerText = '';
                 $("#submit").prop("disabled", false);
            }
        }

        
    }
    function validatePhoto() {
            var input = document.getElementById('applicant_photo');
            var errorMessage = document.getElementById('errorPhoto');
    
            if (input.files.length > 0) {
                var fileSize = input.files[0].size; // in bytes
                var maxSize = 2 * 1024 * 1024; // 2MB
    
                if (fileSize > maxSize) {
                    errorMessage.innerText = 'Error: Image size exceeds 2MB limit';
                    input.value = ''; // Clear the file input
                    $("#submit").prop("disabled", true);
                } else {
                    errorMessage.innerText = '';
                     $("#submit").prop("disabled", false);
                }
            }
    
            
        }
   
	$('#district').change(function(){
        var districtName = this.options[this.selectedIndex].text;
    document.getElementById('district_name').value = districtName;
        var val = document.getElementById("district").value;
      
        $.ajax({
                    url: "{{url('district/fetch-taluk')}}",
                    type: "POST",
                    data: {
                        district_id: val,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (result) {
                        $("#taluk").find('option').remove();
                          $("#taluk").append('<option value="" selected>Choose Taluk</option>');
                        $.each(result.taluks, function (key, value) {
                            var $opt = $('<option>');
                            $opt.val(value._id).text(value.taluk_name);
                            $opt.appendTo('#taluk');
                          

                        });

                    }
                });

    });
    $('#taluk').change(function(){
        var talukName = this.options[this.selectedIndex].text;
    document.getElementById('taluk_name').value = talukName;
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
        fetchTeo();
        fetchTaluk();

        $('input[name="current_pincode"]').on('input', function() {
            this.value = this.value.replace(/[^0-9]/g, '').substring(0, 6);
        });
	});
    function fetchTaluk() {    
      
        var val1 = $("#district").val();
    
        $.ajax({
             url: "{{ url('district/fetch-taluk') }}",
            type: "POST",
            data: {
                district_id: val1,
                _token: '{{ csrf_token() }}'
            },
            dataType: 'json',
            success: function(result) {
                $("#taluk").find('option').remove();
                $("#taluk").append('<option value="" selected>Choose Taluk</option>');
    
                $.each(result.taluks, function(key, value) {
                    var $opt = $('<option>');
                    $opt.val(value._id).text(value.taluk_name);
    
                    // Set the selected attribute based on the old submitted value
                    if ('{{ old('taluk') }}' == value._id) {
                        $opt.attr('selected', 'selected');
                    }
    
                    $opt.appendTo('#taluk');
                });
            }
        });
    }
    function fetchTeo() {    
        //alert("qqqqqqq");    
        var val1 = $("#submitted_district").val();
    
        $.ajax({
            url: "{{ url('district/fetch-teo') }}",
            type: "POST",
            data: {
                district_id: val1,
                _token: '{{ csrf_token() }}'
            },
            dataType: 'json',
            success: function(result) {
                $("#submitted_teo").find('option').remove();
                $("#submitted_teo").append('<option value="" selected>Choose TEO</option>');
    
                $.each(result.teos, function(key, value) {
                    var $opt = $('<option>');
                    $opt.val(value._id).text(value.teo_name);
    
                    // Set the selected attribute based on the old submitted value
                    if ('{{ old('submitted_teo') }}' == value._id) {
                        $opt.attr('selected', 'selected');
                    }
    
                    $opt.appendTo('#submitted_teo');
                });
            }
        });
    }
  </script>
<!-- main-content-body -->
@endsection
