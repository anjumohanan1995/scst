@extends('layouts.app')

@section('content')
<!-- main-content -->
<div class="main-content app-content">
	<!-- container -->
	<div class="main-container container-fluid">
		<!-- breadcrumb -->
		<div class="breadcrumb-header justify-content-between row me-0 ms-0" >
			
				<h4 class="content-title mb-2" >പട്ടിക വർഗ്ഗ വികസന വകുപ്പിൽ നിന്നും 8 ,9 ,10 ,11 ,12  ക്ലാസ്സുകളിൽ പഠിക്കുന്നു കുട്ടികൾക്ക് ട്യൂഷൻ ഫീസിനുള്ള അപേക്ഷ

</h4>
				

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
           
                    <form name="patientForm" id="patientForm" method="post" action="{{route('TuitionFee.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="card">
                            <div class="card-body">
                        <div class="form-group">
                            <div class="row">   
                                <div class="col-md-6 mb-6">
                                    <label class="form-label">അപേക്ഷകന്റെ പേര് <br><span class="small"> Applicant's Name</span>
                                    </label>
                                    <input type="text" value="{{ old('name') }}"  class="form-control" placeholder="അപേക്ഷകന്റെ പേര് " name="name" />
                                    @error('name')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-6">
                                    <label class="form-label">മേൽവിലാസം <br><span class="small">Address</span>
                                    </label>
                                    <textarea type="text"  class="form-control" placeholder="മേൽവിലാസം" name="address" >{{ old('address') }}</textarea>
                                    @error('address')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div><br>
                            <div class="row">   
                               
                                <div class="col-md-2 mb-2">
                                    <label class="form-label">ജില്ല <br><span class="small">District</span> </label>
                                    <select id="current_district" name="current_district" class="form-control" >
                                        <option value="">Select</option>
                                            @foreach($districts as $district)
                                                <option value="{{$district->id}}" {{ (old('current_district') == $district->id) ? 'selected' : '' }} >{{$district->name}}</option>
                                            @endforeach
                                    </select>
                                     @error('current_district')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                    <input type="hidden" name="current_district_name" id="current_district_name" value="{{ old('current_district_name') }}">
                                </div>
                                <div class="col-md-2 mb-2">
                                    <label class="form-label">താലൂക്ക് <br><span class="small">Taluk</span> </label>
                                    <select id="current_taluk" name="current_taluk" class="form-control">
                                        <option value="">Choose Taluk</option>
                                    </select>                                 
                                    @error('current_taluk')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                    <input type="hidden" name="current_taluk_name" id="current_taluk_name" value="{{ old('current_taluk_name') }}">
                                </div>
                                <div class="col-md-2 mb-2">
                                    <label class="form-label">പിൻകോഡ് <br><span class="small">Pincode</span> </label>
                                    <input type="text" value="{{ old('current_pincode') }}"  class="form-control"  name="current_pincode" />
                                    @error('current_pincode')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div> 
                                <div class="col-md-6 mb-6">
                                    <label class="form-label"> പഞ്ചായത്തിൻ്റെ പേര് <br><span class="small">Name of Panchayath </span>


                                    </label>
                                    <input type="tel" value="{{ old('panchayath') }}"  class="form-control" placeholder="പഞ്ചായത്തിൻ്റെ പേര് " name="panchayath" />
                                   
                                    @error('panchayath')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                               
                               
                            </div><br>
                               <div class="row">   
                                <div class="col-md-6 mb-6">
                                    <label class="form-label">ഫോൺ നമ്പർ <br><span class="small">Mobile No</span>


                                    </label>
                                    <input type="tel" value="{{ old('mobile') }}"  class="form-control" placeholder="ഫോൺ നമ്പർ " name="mobile" />
                                   
                                    @error('mobile')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-6">
                                    <label class="form-label">ജാതി /മതം <br><span class="small"> Caste/Religion</span>
                                    </label>
                                    <input type="text" value="{{ old('caste') }}"  class="form-control" placeholder="ജാതി /മതം" name="caste" />
                               
                                    @error('caste')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                      </div>
                                        
                                    
                                   
                                   
                                  
                                </div><br>
                            <div class="row">   
                                <div class="col-md-6 mb-6">
                                    <label class="form-label">വരുമാനം <br><span class="small">Income</span>


                                    </label>
                                    <input type="number" value="{{ old('annual_income') }}"  class="form-control" placeholder="വരുമാനം" name="annual_income" />
                           
                                    @error('annual_income')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                   
                                </div>
                                <div class="col-md-6 mb-6">
                                    <label class="form-label"> വിദ്യാർത്ഥിയുടെ പേര് <br><span class="small"> Name of the student </span>

                                        
                                    </label>
                                    <input type="text" class="form-control" value="{{ old('student_name') }}"   name="student_name" id="student_name" value="" placeholder="വിദ്യാർത്ഥിയുടെ പേര് " />


                 
                                 @error('student_name')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                              
                              
                             
                               
                               
                            </div><br>   
                           
                            <div class="row">   
                                <div class="col-md-6 mb-6">
                                    <label class="form-label">അപേക്ഷകനുമായുള്ള ബന്ധം <br><span class="small"> Relationship with the Applicant</span>

                                        
                                        
                                          </label>
                                          <select class="form-select" name="relation">
                                                <option value="" disabled>Select a relationship</option>
                                                <option value="father" @if (old('relation') == 'father') selected @endif>
                                                    Father / അച്ഛൻ</option>
                                                <option value="mother" @if (old('relation') == 'mother') selected @endif>
                                                    Mother / അമ്മ</option>
                                                <option value="grandfather"
                                                    @if (old('relation') == 'grandfather') selected @endif>Grandfather /
                                                    മുത്തച്ഛൻ</option>
                                                <option value="grandmother"
                                                    @if (old('relation') == 'grandmother') selected @endif>Grandmother /
                                                    മുത്തശ്ശി</option>
                                                <option value="uncle" @if (old('relation') == 'uncle') selected @endif>
                                                    Uncle / മാമൻ </option>
                                                <option value="aunt" @if (old('relation') == 'aunt') selected @endif>
                                                    Aunt / മാമി </option>
                                                <option value="cousin" @if (old('relation') == 'cousin') selected @endif>
                                                    Cousin / സഹോദര / സഹോദരി</option>
                                                <option value="siblings"
                                                    @if (old('relation') == 'siblings') selected @endif>Siblings / സഹോദര /
                                                    സഹോദരി</option>
                                                <option value="others" @if (old('relation') == 'others') selected @endif>
                                                    Others / മറ്റുള്ളവ </option>
                                            </select>




                                           

                                    
                                    @error('relation')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-6">
                                    <label class="form-label"> പഠിക്കുന്ന സ്‌കൂളിന്റെ പേര് <br><span class="small">Name of school Studying </span>
 
                                        </label>

                                        
                                        <input type="text" class="form-control"   name="school_name" id="school_name" value="{{ old('school_name') }}" placeholder="പഠിക്കുന്ന സ്‌കൂളിന്റെ പേര്" />
                                    @error('school_name')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                              
                                
                               
                             
                            </div><br> 

 


                           
                            <div class="row">   
                                <div class="col-md-6 mb-6">
                                    <label class="form-label">  ക്ലാസ് <br><span class="small">Class</span>
 
                                        </label>
                                        <input type="number" class="form-control"   name="class_number" id="class_number" value="{{ old('class_number') }}" placeholder="ക്ലാസ് " />
                                    @error('class_number')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-6">
                                    <label class="form-label">ട്യുഷൻ സെന്ററിന്റെ പേര് <br><span class="small"> Name of Tuition Centre</span>
 
                                        </label>
                                        <input type="text" class="form-control"   name="tuition_center" id="tuition_center" value="{{ old('tuition_center') }}" placeholder="ട്യുഷൻ സെന്ററിന്റെ പേര് " />
                                    @error('tuition_center')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            
                                
                               
                             
                            </div><br> 
                            <div class="row"> 
                                <div class="col-md-6 mb-6">
                                <label class="form-label">പ്രിൻസിപ്പലിൻ്റെ പ്രഖ്യാപനം (ഫയൽ അപ്‌ലോഡ്) <br><span class="small">Declaration of Principal(File Upload) </span> </label>
                                <input type="file" value="{{ old('principal_declaration') }}"  class="form-control" placeholder="പ്രിൻസിപ്പലിൻ്റെ പ്രഖ്യാപനം (ഫയൽ അപ്‌ലോഡ്)" name="principal_declaration"  id="principal_declaration" onchange="validatePrincipalFile()"    accept=".pdf,.docs" />
                                @error('principal_declaration')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                                <div id="errorMessagePrincipalFile" style="color:red;"></div>
                            </div>   
                                <div class="col-md-6 mb-6">
                                    <label class="form-label">സ്ഥലം <br><span class="small"> Place</span>
 
                                        </label>
                                        <input type="text" class="form-control"   name="place" id="place" value="{{ old('place') }}" placeholder="സ്ഥലം " />
                                    @error('place')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                              
                                
                            </div>  
                            
                            <br>
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <label class="form-label">അപേക്ഷകന്റെ ഒപ്പ്/വിരലടയാളം <br><span class="small">Applicant's Signature/Fingerprint</span></label>
                                    <input type="file" value="{{ old('signature') }}"  class="form-control" placeholder="അപേക്ഷകന്റെ ഒപ്പ്/വിരലടയാളം" name="signature"  id="signature" onchange="validateImage()"    accept="image/*" />
                                    @error('signature')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                    <div id="errorMessage" style="color:red;"></div>
                                </div>   
                                <div class="col-md-6 mb-4">
                                    <label class="form-label">അപേക്ഷകന്റെ ഫോട്ടോ <br><span class="small">Applicant's Photo</span></label>
                                    <input type="file" value="{{ old('photo') }}"  class="form-control" placeholder="അപേക്ഷകന്റെ ഫോട്ടോ" name="photo"  id="photo" onchange="validateImageOne()"    accept="image/*" />
                                    @error('photo')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                    <div id="errorMessageOne" style="color:red;"></div>
                                </div>   
                            </div>
                            <br>
                            <hr>
                            <label class="form-label"><b>മാതാപിതാക്കളുടെ അക്കൗണ്ട് വിശദാംശങ്ങൾ <br><span class="small">Parent account Details </b></span></label>
                                <br>
                            <div class="row">
                                <div class="col-md-4 mb-4">
                                      ബാങ്ക് ശാഖ Bank Branch
                                
                                    <input type="text" value="{{ old('parent_bank_branch') }}"  class="form-control" placeholder="ബാങ്ക് ശാഖ" name="parent_bank_branch" value="{{ old('parent_bank_branch') }}">
                                   
                                
                                  @error('parent_bank_branch')
                                      <span class="text-danger">{{$message}}</span>
                                  @enderror
                                </div>
                                <div class="col-md-4 mb-4">
                                  അകൗണ്ട് നമ്പർ     Account Number 
                                    
                                    
                                      
                                      <input type="number" value="{{ old('parent_account_no') }}"  class="form-control" placeholder="അകൗണ്ട് നമ്പർ " name="parent_account_no" >
                                      @error('parent_account_no')
                                      <span class="text-danger">{{$message}}</span>
                                  @enderror
                                    </div>
                                    <div class="col-md-4 mb-4">
                                        IFSC കോഡ്   IFSC Code 
                                        
                                        
                                          
                                          <input type="text" value="{{ old('parent_ifsc_code') }}"  class="form-control" placeholder="IFSC കോഡ്" name="parent_ifsc_code" >
                                          @error('parent_ifsc_code')
                                          <span class="text-danger">{{$message}}</span>
                                      @enderror
                                        </div>
                            </div>
                            <hr>
                            <div class="row">
                              <div class="col-md-1 mb-1">
                                   </div>
                              <div class="col-md-1 mb-1">
                                  <input type="checkbox" id="agree" name="agree" value="Yes" required {{ old('agree') == 'Yes' ? 'checked' : '' }}>
                              </div>
                              <div class="col-md-9 mb-9">
                                  
                                 ഞങ്ങൾ മുകളിൽ ചേർത്ത എല്ലാ വിവരങ്ങളും സത്യവും ശരിയുമാണെന്ന് ഇതിനാൽ പ്രതിജ്ഞ ചെയ്തുകൊള്ളുന്നു.<br>
                                We hereby pledge that all the information we have added above is true and correct.
                              </div>
                          </div>
                          
                         
                           
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="row mt-5">
                            <div class="col-12">
                                <h1
                        style="text-align: center;color: rgb(0, 0, 0);font-size: medium; text-decoration: underline; padding: 10px;line-height: 32px;font-weight: 600;">
                        അപേക്ഷ സമർപ്പിക്കുന്നത് <br>Submitting the application
       
                    </h1>
                            </div>
                        </div>
                        <div class="row">   
                            <div class="col-md-6 mb-6">
                                <label class="form-label"> ജില്ല <br> <span class="small"> District </span></label>
                                <select id="submitted_district" name="submitted_district" class="form-control" >
                                    <option value="">Select</option>
                                        @foreach($districts as $district)
                                            <option value="{{$district->id}}" {{ old('submitted_district') == $district->id ? 'selected' : '' }} >{{$district->name}}</option>
                                        @endforeach
                                </select>
                                 @error('submitted_district')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                                <input type="hidden" name="dist_name" id="dist_name" value="{{ old('dist_name') }}">
                            </div>
                            <div class="col-md-6 mb-6">
                                <label class="form-label"> ടി .ഇ .ഓ <br> <span class="small">TEO</span> </label>
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
</div>

<script>
$('input[name="current_pincode"]').on('input', function() {
            this.value = this.value.replace(/[^0-9]/g, '').substring(0, 6);
        });
function validateImage() {
    var input = document.getElementById('signature');
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


function validatePrincipalFile() {
    var input = document.getElementById('principal_declaration');
    var errorMessagePrincipalFile = document.getElementById('errorMessageOne');

    if (input.files.length > 0) {
        var fileSize = input.files[0].size; // in bytes
        var maxSize = 2 * 1024 * 1024; // 2MB

        if (fileSize > maxSize) {
            errorMessagePrincipalFile.innerText = 'Error: Image size exceeds 2MB limit';
            input.value = ''; // Clear the file input
                $("#submit").prop("disabled", true);
        } else {
            errorMessagePrincipalFile.innerText = '';
                $("#submit").prop("disabled", false);
        }
    }
}

function validateImageOne() {
    var input = document.getElementById('photo');
    var errorMessage = document.getElementById('errorMessageOne');

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
