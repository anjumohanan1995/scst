@extends('layouts.app')

@section('content')
<!-- main-content -->
<div class="main-content app-content">
	<!-- container -->
	<div class="main-container container-fluid">
		<!-- breadcrumb -->
		<div class="breadcrumb-header justify-content-between row me-0 ms-0" >
			
				<h4 class="content-title mb-2"> മിടുക്കരായ വിദ്യാർത്ഥികൾക്കുള്ള പ്രത്യേക പ്രോത്സാഹനo</h4>
				<h4 class="content-title mb-2">APPLICATION FOR SSLC/PLUS TWO/ DEGREE/PG AWARD 2023-24</h4>

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
          
               
                    <form name="patientForm" id="patientForm" method="post" action="{{route('studentAwardPreview')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="card">
                        <div class="card-body">
                        <div class="form-group">
                            <div class="row">   
                                <div class="col-md-4 mb-4">
                                    <label class="form-label">പേര് / Name </label>
                                    <input type="text" value="{{ old('name') }}"  class="form-control" placeholder="" name="name" required />
                                    @error('name')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="col-md-4 mb-4">
                                    <label class="form-label">ജനനത്തീയതി / Date of Birth   </label>
                                    <input type="date" class="form-control"  name="dob" id="dob" value="{{ old('dob') }}"  />
                                    @error('dob')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="col-md-4 mb-4">
                                    <label class="form-label">മേൽവിലാസം / Address  </label>
                                    <textarea type="text" class="form-control" name="address" >{{ old('address') }}</textarea>
                                    @error('address')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div> 
                              
                            </div>
                          
                            <div class="row">                               
                                <div class="col-md-4 mb-4">
                                    <label class="form-label">ജില്ല / District  </label>
                                    <select id="district" name="district" class="form-control" >
                                        <option value="">Select</option>
                                            @foreach($districts as $district)
                                                <option value="{{$district->id}}" @if($district->id == old('district')) selected @endif >{{$district->name}}</option>
                                            @endforeach
                                    </select>
                                     @error('district')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                    <input type="hidden" name="district_name" id="district_name" value="{{ old('district_name') }}">
                                </div>
                                <div class="col-md-4 mb-4">
                                    <label class="form-label">താലൂക്ക് / Taluk  </label>
                                    <select id="taluk" name="taluk" class="form-control">
                                        <option value="">Choose Taluk</option>
                                    </select>                                 
                                    @error('taluk')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                    <input type="hidden" name="taluk_name" id="taluk_name" value="{{ old('taluk_name') }}">
                                </div>
                                <div class="col-md-4 mb-4">
                                    <label class="form-label">പിൻകോഡ് / Pincode  </label>
                                    <input type="text" value="{{ old('pincode') }}"  class="form-control"  name="pincode" id="pincode" />
                                    @error('pincode')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">   
                                <div class="col-md-4 mb-4">
                                    <label class="form-label">പാസ്സായ പരീക്ഷ  / Examination Passed </label>
                                    <div class="row">   
                                        <div class="col-md-6 mb-6">
                                            <div>
                                                <input type="radio" id="sslc" name="examination_passed" value="SSLC" {{ old('examination_passed') == 'SSLC' ? 'checked' : '' }} >
                                                <label for="sslc">SSLC</label>
                                            </div>
                                            <div>
                                                <input type="radio" id="plus_two" name="examination_passed" value="PLUS TWO" {{ old('examination_passed') == 'PLUS TWO' ? 'checked' : '' }} >
                                                <label for="plus_two">PLUS TWO</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-6">
                                            <div>
                                                <input type="radio" id="degree" name="examination_passed" value="DEGREE" {{ old('examination_passed') == 'DEGREE' ? 'checked' : '' }} >
                                                <label for="degree">DEGREE</label>
                                            </div>
                                            <div>
                                                <input type="radio" id="pg" name="examination_passed" value="PG" {{ old('examination_passed') == 'PG' ? 'checked' : '' }} >
                                                <label for="pg">PG</label>
                                            </div>
                                        </div>
                                    </div>
                                    @error('examination_passed')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                                </div>
                               
                                <div class="col-md-4 mb-4">
                                    <label class="form-label">സംരക്ഷകന്റെ പേര് / Name of the Guardian</label>
                                    <input type="text" class="form-control"  name="guardian_name" id="guardian_name" value="{{ old('guardian_name') }}" placeholder="" />
                                    @error('guardian_name')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="col-md-4 mb-4">
                                    <label class="form-label">സമുദായം / Community</label>
                                    <input type="text" class="form-control"  name="community" id="community" value="{{ old('community') }}" placeholder="" />
                                    @error('community')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">   
                                <div class="col-md-4 mb-4">
                                    <label class="form-label">പഞ്ചായത്തിന്റെ പേര് / Name of the Panchayath</label>
                                    <input type="text" class="form-control"  name="panchayath_name" id="panchayath_name" value="{{ old('panchayath_name') }}" placeholder="" />
                                    @error('panchayath_name')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="col-md-4 mb-4">
                                    <label class="form-label">സ്ഥാപനത്തിന്റെ പേര് / Name of the Institution</label>
                                    <input type="text" class="form-control"  name="institution_name" id="institution_name" value="{{ old('institution_name') }}" placeholder="" />
                                    @error('institution_name')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="col-md-2 mb-2">
                                    <label class="form-label">പാസ് ആയ മാസം / Month of Pass</label>
                                    <input type="text" class="form-control"  name="pass_month" id="pass_month" value="{{ old('pass_month') }}" placeholder="" />
                                    @error('pass_month')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="col-md-2 mb-2">
                                    <label class="form-label">പാസ് ആയ വര്ഷം / Year of Pass</label>
                                    <input type="number" class="form-control"  name="pass_year" id="pass_year" value="{{ old('pass_year') }}" placeholder="" />
                                    @error('pass_year')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div><br>
                            <div class="row">   
                                <div class="col-md-4 mb-4">
                                    <label class="form-label">ഫോൺ നമ്പർ / Phone No.</label>
                                    <input type="number" class="form-control"  name="phone" id="phone" value="{{ old('phone') }}" placeholder="" />
                                    @error('phone')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="col-md-4 mb-4">
                                    <label class="form-label">അക്കൗണ്ട് നമ്പർ / Account No.</label>
                                    <input type="number" class="form-control"  name="account_number" id="account_number" value="{{ old('account_number') }}" placeholder="" />
                                    @error('account_number')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="col-md-4 mb-4">
                                    <label class="form-label">IFSC കോഡ് / IFSC Code </label>
                                    <input type="text" class="form-control"  name="ifsc_code" id="ifsc_code" value="{{ old('ifsc_code') }}" placeholder="" />
                                    @error('ifsc_code')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div><br>
                            <div class="row">                                
                                <div class="col-md-6 mb-6">
                                    <label class="form-label">ആധാർ നമ്പർ / Aadhar No.	 </label>
                                    <input type="number" class="form-control"  name="aadhar_number" id="aadhar_number" value="{{ old('aadhar_number') }}" placeholder="" />
                                    @error('aadhar_number')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>                           
                            <div class="col-md-6 mb-6">
                                <label class="form-label">ഒപ്പ് / Signature</label>
                                <input type="file" onchange="validateSignature()" class="form-control"  name="signature" id="signature" value="" placeholder="" />
                                <p style="font-size: 11px;">Max. filesize: 2 MB • Format: JPG, PNG </p>

                                @error('signature')
                                    <span class="text-danger">{{$message}}</span>
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
                                        <label class="form-label">ജില്ല / District  </label>
                                        <select id="submitted_district" name="submitted_district" class="form-control" required />
                                            <option value="">Select</option>
                                                @foreach($districts as $district)
                                                    <option value="{{$district->id}}" @if($district->id == old('submitted_district')) selected @endif  >{{$district->name}}</option>
                                                @endforeach
                                        </select>
                                         @error('dist')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                        <input type="hidden" name="dist_name" id="dist_name" value="{{ old('dist_name') }}">
                                    </div>
                                    <div class="col-md-6 mb-6">
                                        <label class="form-label">ടി.ഇ.ഒ / TEO  </label>
                                        <select id="submitted_teo" name="submitted_teo" class="form-control" required />
                                            <option value="">Choose TEO</option>
                                        </select>                                 
                                        @error('teo')
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

        $('input[name="pincode"]').on('input', function() {
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
