@extends('layouts.app')

@section('content')
<!-- main-content -->
<div class="main-content app-content">
	<!-- container -->
	<div class="main-container container-fluid">
		<!-- breadcrumb -->
		<div class="breadcrumb-header justify-content-between row me-0 ms-0" >
			<h4 class="content-title mb-2"> അനാധകർക്ക്പ്രതിമാസം 2000 രൂപ ധനസഹായം നൽകുന്ന പദ്ധതി കൈത്താങ്ങ്  </h4>
				<h4 class="content-title mb-2 small">Kaithang scheme to provide financial assistance of Rs 2000 per month to poor people</h4>
				

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
                
                            <form name="patientForm" id="patientForm" method="post" action="{{route('childFinancialAssistanceStore')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="card">
                                    <div class="card-body">
                                <div class="form-group">
                                    <div class="row">   
                                        <div class="col-md-6 mb-6">
                                            <label class="form-label">കുട്ടിയുടെ പേര്   <br> <span class="small"> Child's Name</span> </label>
                                            <input type="text" value="{{ old('name') }}"  class="form-control" placeholder="" name="name" />
                                            @error('name')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>

                                        <div class="col-md-6 mb-6">
                                            <label class="form-label">കുട്ടിയുടെ വയസ്സ് <br> <span class="small">   Age of the child </span></label>
                                            <input type="number" value="{{ old('age') }}" class="form-control" placeholder="" name="age" />
                                            
                                            @error('age')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div><br>
                                    <div class="row">   
                                        <div class="col-md-6 mb-6">
                                            <label class="form-label">കുട്ടിയുടെ ജനന തീയതി(സർട്ടിഫിക്കറ്റ് ഉണ്ടെങ്കിൽ മാത്രം എഴുതുക) <br> <span class="small"> Child's date of birth (write only if certificate is available)</span></label>
                                            <input type="date" value="{{ old('dob') }}" class="form-control" placeholder="" name="dob" max="{{ date('Y-m-d') }}" />
                                            @error('dob')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>

                                        <div class="col-md-6 mb-6">
                                            <label class="form-label"> കുട്ടിയുടെ ജനന സർട്ടിഫിക്കറ്റ് <br> <span class="small"> Child's birth certificate  </span><br>
                                           <small> (File less than 2 mb. jpg & pdf only. / ഫയൽ: 2 എംബി കുറഞ്ഞത്, JPG/PDF
                                                        മാത്രം.)</small></label>
                                            <input type="file" value="{{ old('birth_certificate') }}" class="form-control" id="birth_certificate" onchange="validateImage()"   name="birth_certificate" accept="image/*,application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document" />
                                            <div id="errorMessage" style="color:red;"></div>
                                        
                                        </div>
                                    </div><br>

                                    <div class="row">   
                                        <div class="col-md-6 mb-6">
                                            <label class="form-label">അച്ഛന്റെ പേര് <br> <span class="small">  Father's name </span></label>
                                            <input type="text" value="{{ old('father_name') }}"  class="form-control" placeholder="" name="father_name" />
                                            @error('father_name')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>

                                        <div class="col-md-6 mb-6">
                                            <label class="form-label">അമ്മയുടെ പേര്  <br> <span class="small"> Mother's name </span></label>
                                            <input type="text" value="{{ old('mother_name') }}"  class="form-control" placeholder="" name="mother_name" />
                                            @error('mother_name')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                            
                                        
                                        </div>
                                    </div><br>
                                    <div class="row">  

                                    
                                        <div class="col-md-6 mb-6">
                                            <label class="form-label"> കുട്ടിയെ നിലവിൽ സംരക്ഷിക്കുന്ന രക്ഷിതാവിന്റെ പേര് <br> <span class="small">  Name of the guardian who is currently protecting the child </span></label>
                                            <input type="text" value="{{ old('guardian_name') }}"  class="form-control" placeholder="" name="guardian_name" />
                                            @error('guardian_name')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                            
                                        
                                        </div>
                                        <div class="col-md-6 mb-6">
                                            <label class="form-label"> രക്ഷിതാവിന്റെ മേൽവിലാസം <br> <span class="small"> Guardian's Address </span></label>
                                            <textarea type="text" value="{{ old('address') }}"  class="form-control" placeholder="" name="address" ></textarea>
                                            @error('address')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    
                                    
                                    </div>
                                    <div class="row">   
                                        <div class="col-md-4 mb-4">
                                            <label class="form-label">ജില്ല <br> <span class="small">  District </span></label>
                                            <select id="current_district" name="current_district" class="form-control" >
                                                <option value="">Select</option>
                                                    @foreach($districts as $district)
                                                        {{-- <option value="{{$district->id}}"  >{{$district->name}}</option> --}}
                                                        <option value="{{ $district->id }}" {{ (old('current_district') == $district->id) ? 'selected' : '' }}>
                                                            {{ $district->name }}
                                                        </option>
                                                    @endforeach
                                            </select>
                                                @error('current_district')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                            <input type="hidden" name="current_district_name" id="current_district_name" value="{{ old('current_district_name') }}">
                                        </div>
                                        <div class="col-md-4 mb-4">
                                            <label class="form-label">താലൂക്ക് <br> <span class="small"> Taluk</span> </label>
                                            <select id="current_taluk" name="current_taluk" class="form-control">
                                                <option value="">Choose Taluk</option>
                                            </select>                                 
                                            @error('current_taluk')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                            <input type="hidden" name="current_taluk_name" id="current_taluk_name" value="{{ old('current_taluk_name') }}">
                                        </div>
                                        <div class="col-md-4 mb-4">
                                            <label class="form-label">പിൻകോഡ് <br> <span class="small">Pincode</span> </label>
                                            <input type="number" value="{{ old('current_pincode') }}"  class="form-control"  name="current_pincode" />
                                            @error('current_pincode')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">   
                                        <div class="col-md-4 mb-2">
                                            <label class="form-label">രക്ഷിതാവിന്റെ സമുദായം <br> <span class="small">  Guardian's Community </span></label>
                                                <input type="text" value="{{ old('caste') }}"  class="form-control" placeholder="" name="caste" />
                                                @error('caste')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            
                                        </div>
                                        <div class="col-md-4 mb-2">
                                            <label class="form-label">ഇമെയിൽ <br> <span class="small">  Email </span> </label>
                                            <input type="text" value="{{ old('email') }}"  class="form-control" placeholder="" name="email" />
                                                @error('email')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                        </div>
                                        <div class="col-md-4 mb-2">
                                            <label class="form-label">ഫോൺ നമ്പർ <br> <span class="small"> Mobile </span>  </label>
                                            <input type="number" value="{{ old('mobile') }}"  class="form-control" placeholder="" name="mobile" />
                                                @error('mobile')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                        </div>
                                        
                                    </div><br>

                                    <div class="row">  
                                    <div class="col-md-6 mb-2">
                                            <label class="form-label">രക്ഷിതാവിന്റെ ബാങ്ക് അക്കൗണ്ട് നമ്പർ <br> <span class="small"> Guardian's Bank Account No </span></label>
                                            <input type="text" value="{{ old('account_number') }}"  class="form-control" placeholder="" name="account_number" />
                                                @error('account_number')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                        </div> 
                                        <div class="col-md-6 mb-2">
                                            <label class="form-label">ആധാർ ഉണ്ടെങ്കിൽ ആയതിന്റെ നമ്പർ <br> <span class="small"> Aadhaar number if available </span></label>
                                                <input type="number" value="{{ old('aadhar_number') }}"  class="form-control" placeholder="" name="aadhar_number" />
                                                @error('aadhar_number')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            
                                        </div>
                                    
                                        
                                    </div><br>

                                    <div class="row">   
                                        <div class="col-md-6 mb-2">
                                            <label class="form-label">വോട്ടർ ഐ.ഡി. കാർഡ് ഉണ്ടെങ്കിൽ ആയതിന്റെ നമ്പർ <br> <span class="small"> Voter ID Card number if any </span></label>
                                            <input type="text" value="{{ old('voter_id') }}"  class="form-control" placeholder="" name="voter_id" />
                                                @error('voter_id')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label class="form-label">റേഷൻ കാർഡ് ഉണ്ടെങ്കിൽ ആയതിന്റെ നമ്പർ <br> <span class="small"> Ration card number if any </span></label>
                                                <input type="text" value="{{ old('ration_card_number') }}"  class="form-control" placeholder="" name="ration_card_number" />
                                                @error('ration_card_number')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            <select class="form-select" name="reason_for_orphan" id="reason_for_orphan">
                                                <option value="" disabled>Select</option>
                                                <option value="Death of father" @if (old('relation') == 'Death of father') selected @endif>
                                                    അച്ഛൻ്റെ മരണം <br> <span class="small">  Death of father </option>
                                                <option value="Death of mother" @if (old('relation') == 'Death of mother') selected @endif>
                                                  അമ്മയുടെ മരണം   <br> <span class="small">  Death of mother </option>
                                                <option value="Death of both father and mother"
                                                    @if (old('relation') == 'Death of both father and mother') selected @endif>
                                                    അച്ഛൻ്റെയും അമ്മയുടെയും മരണം <br> <span class="small"> Death of both father and mother </span></option>
                                                <option value="Other reason"
                                                    @if (old('relation') == 'Other reason') selected @endif>
                                                    മറ്റു കാരണങ്ങൾ <br> <span class="small"> Other reason</span> </option>                                               
                                            </select>
                                                @error('reason_for_orphan')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                        </div>
                                        <div class="col-md-6 mb-2" id="other">
                                            <label class="form-label"> കാരണം സൂചിപ്പിക്കുക <br> <span class="small">  Mention that reason </span></label>
                                                <input type="text" value="{{ old('reason') }}"  class="form-control" placeholder="" name="reason" />
                                                @error('reason')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            
                                        </div>
                                        
                                        
                                    </div><br>
                                    <div class="row">   
                                        <div class="col-md-6 mb-4">
                                            <label class="form-label"> മരണ സർട്ടിഫിക്കറ്റ് <br> <span class="small"> Death Certificate </span><br>

                                           <small>(File less than 2 mb. jpg only. / ഫയൽ: 2 എംബി കുറഞ്ഞത്, JPG മാത്രം.)</small></label>
                                            <input type="file" value="{{ old('death_certificate') }}"  class="form-control" name="death_certificate" id="death_certificate" onchange="validateImageOne()"  accept="image/*"  />
                                            @error('death_certificate')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                             <div id="errorMessageone" style="color:red ;"></div>
                                        </div>
                                        
                                        <div class="col-md-6 mb-4">
                                            <label class="form-label">ട്രൈബൽ എക്സ്റ്റൻഷൻ ഓഫിസറുടെ സർട്ടിഫിക്കറ്റ് <br> <span class="small">  Certificate of Tribal Extension Officer</span> <br>
                                            <small>(File less than 2 mb. jpg only. / ഫയൽ: 2 എംബി കുറഞ്ഞത്, JPG മാത്രം.)</small></label>
                                            <input type="file" value="{{ old('tribal_extension_certificate') }}"  class="form-control" name="tribal_extension_certificate" id="tribal_extension_certificate" onchange="validateImageOne()"  accept="image/*"  />
                                            @error('tribal_extension_certificate')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                             <div id="errorMessageone" style="color:red;"></div>
                                        </div>                                
                                    </div><br>  
                                    <div class="row">   
                                        <div class="col-md-6 mb-4">
                                            <label class="form-label">സ്ഥലം <br> <span class="small"> Place</span></label>
                                            <input type="text" value="{{ old('place') }}" class="form-control" placeholder="സ്ഥലം" name="place" />
                                            @error('place')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        
                                        <div class="col-md-6 mb-4">
                                            <label class="form-label">അപേക്ഷകന്റെ ഒപ്പ്(വിരലടയാളം)<br> <span class="small">  Applicant's Signature </span><br>
                                         <small>   (File less than 2 mb. jpg only. / ഫയൽ: 2 എംബി കുറഞ്ഞത്, JPG മാത്രം.)</small></label>
                                            <input type="file" value="{{ old('signature') }}"  class="form-control" placeholder="അപേക്ഷകന്റെ ഒപ്പ്/വിരലടയാളം" name="signature" id="signature" onchange="validateImageOne()"  accept="image/*"  />
                                            @error('signature')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                             <div id="errorMessageone" style="color:red;"></div>
                                        </div>                                
                                    </div><br>  
                                    <div class="row">   
                                        <div class="col-md-6 mb-4">
                                            <label class="form-label">കുട്ടിയുടെ ഫോട്ടോ <br> <span class="small"> Child's photo </span><br> <small>
                                            (File less than 2 mb. jpg  only. / ഫയൽ: 2 എംബി കുറഞ്ഞത്, JPG
                                                        മാത്രം.)</small></label>
                                            <input type="file" value="{{ old('child_signature') }}"  class="form-control" placeholder="കുട്ടിയുടെ ഫോട്ടോ" name="child_signature" id="child_signature" onchange="validateImageTwo()"    accept="image/*" />
                                            @error('child_signature')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                            <div id="errorMessagetwo" style="color:red;"></div>
                                            
                                        </div>     
                                    </div>

                                

                                
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="row">   
                                    <div class="col-md-6 mb-6">
                                        <label class="form-label">ജില്ല <br> <span class="small"> District </span></label>
                                        <select id="submitted_district" name="submitted_district" class="form-control" >
                                            <option value="">Select</option>
                                                @foreach($districts as $district)

                                                 <option value="{{ $district->id }}" {{ (old('submitted_district') == $district->id) ? 'selected' : '' }}>
    {{ $district->name }}
</option>
                                                    {{-- <option value="{{$district->id}}"  >{{$district->name}}</option> --}}
                                                @endforeach
                                        </select>
                                         @error('submitted_district')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                        <input type="hidden" name="dist_name" id="dist_name" value="{{ old('dist_name') }}">
                                    </div>
                                    <div class="col-md-6 mb-6">
                                        <label class="form-label">ടി.ഇ.ഒ <br> <span class="small"> TEO</span> </label>
                                        <select id="submitted_teo" name="submitted_teo" class="form-control">
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
                                    <div class="col-md-12 mb-12">
                                        <button type="submit" id="submit" class="btn btn-danger w-15 waves-effect waves-light text-center submit">Save</button>
                                    </div>
                                    

                                </div><br>
                                        
                                        
                                    
                        
                                </form>
                            </div>
                </div>
            </div>
        </div>
    <div>
</div>

<script type="text/javascript">

    $(document).ready(function() {
        $('#other').hide();
        $('#reason_for_orphan').change(function() {
            if ($(this).val() === 'Other reason') {
                $('#other').show();                
            } else {               
                $('#other').hide();
            }
        });
    });

$('input[name="current_pincode"]').on('input', function() {
            this.value = this.value.replace(/[^0-9]/g, '').substring(0, 6);
        });
function validateImage() {
        var input = document.getElementById('birth_certificate');
        var errorMessage = document.getElementById('errorMessage');

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
function validateImageOne() {
    var input = document.getElementById('signature');
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

function validateImageTwo() {
    var input = document.getElementById('child_signature');
    var errorMessage = document.getElementById('errorMessagetwo');

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

	


    // Call the function on page load
        $(document).ready(function() {
            
            fetchTeo();
            fetchDistrict();
            //fetchWifeDistrict();
        });

        function fetchTeo() {
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



        
        function fetchDistrict() {
         var val = document.getElementById("current_district").value;


         $.ajax({
            url: "{{url('district/fetch-taluk')}}",
             type: "POST",
             data: {
                 district_id: val,
                 _token: '{{ csrf_token() }}'
             },
             dataType: 'json',
             success: function(result) {
                 $("#current_taluk").find('option').remove();
                 $("#current_taluk").append('<option value="" selected>Choose Taluk</option>');

                 $.each(result.taluks, function(key, value) {
                     var $opt = $('<option>');
                     $opt.val(value._id).text(value.taluk_name);

                     // Set the selected attribute based on the old submitted value
                     if ('{{ old('current_taluk') }}' == value._id) {
                         $opt.attr('selected', 'selected');
                     }

                     $opt.appendTo('#current_taluk');
                 });
             }
         });
     }










  </script>
<!-- main-content-body -->
@endsection
