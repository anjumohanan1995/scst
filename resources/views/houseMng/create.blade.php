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
                                    <label class="form-label"> Applicant's Name ( അപേക്ഷകന്റെ പേര് )
                                    </label>
                                    <input type="text" value="{{ old('name') }}"  class="form-control" placeholder="Applicant's Name" name="name" />
                                    @error('name')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-6">
                                    <label class="form-label">
                                        Address (മേൽവിലാസം )
                                    </label>
                                    <textarea type="text" value="{{ old('address') }}"  class="form-control" placeholder="Address" name="address" >{{ old('address') }}</textarea>
                                    @error('address')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div><br>
                            <div class="row">   
                               
                                <div class="col-md-2 mb-2">
                                    <label class="form-label">District (ജില്ല ) </label>
                                    <select id="current_district" name="current_district" class="form-control" >
                                        <option value="">Select</option>
                                            @foreach($districts as $district)
                                                <option value="{{$district->id}}" {{ old('current_district') == $district->id ? 'selected' : '' }} >{{$district->name}}</option>
                                            @endforeach
                                    </select>
                                     @error('current_district')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                    <input type="hidden" name="current_district_name" id="current_district_name" value="{{ old('current_district_name') }}">
                                </div>
                                <div class="col-md-2 mb-2">
                                    <label class="form-label">Taluk (താലൂക്ക്)  </label>
                                    <select id="current_taluk" name="current_taluk" class="form-control">
                                        <option value="">Choose Taluk</option>
                                    </select>                                 
                                    @error('current_taluk')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                    <input type="hidden" name="current_taluk_name" id="current_taluk_name" value="{{ old('current_taluk_name') }}">
                                </div>
                                <div class="col-md-2 mb-2">
                                    <label class="form-label">Pincode ( പിൻകോഡ് ) </label>
                                    <input type="number" value="{{ old('current_pincode') }}"  class="form-control"  name="current_pincode" placeholder="Pincode"/>
                                    @error('current_pincode')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label class="form-label">Grama Panchayat (ഗ്രാമപഞ്ചായത്ത് )
                                    </label>
                                    <input type="text" value="{{ old('panchayath') }}"  class="form-control" placeholder="Grama Panchayat" name="panchayath" />
                                   
                                    @error('panchayath')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label class="form-label"> Ward No ( വാർഡ് നമ്പർ )
                                    </label>
                                    <input type="number" value="{{ old('ward_no') }}"  class="form-control" placeholder="Ward No" name="ward_no" />
                                   
                                    @error('ward_no')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div><br>
                               <div class="row">   
                                <div class="col-md-6 mb-6">
                                    <label class="form-label">
                                        Caste (ജാതി) 
                                    </label>
                                    <input type="text" value="{{ old('caste') }}"  class="form-control" placeholder="Caste" name="caste" />
                               
                                    @error('caste')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                      </div>
                                          <div class="col-md-6 mb-6">
                                        <label class="form-label">Annual Income (വാർഷിക വരുമാനം )
                                        </label>
                                        <input type="number" value="{{ old('annual_income') }}"  class="form-control" placeholder="Annual Income" name="annual_income" />
                                   
                                        @error('annual_income')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                       
                                    </div>
                                    
                                    
                                   
                                  
                                </div><br>
                            <div class="row">   
                                <div class="col-md-3 mb-3">
                                    <label class="form-label">ധനസഹായത്തിനപേക്ഷിക്കുന്ന  വീടിന്റ അവസ്ഥയും അനുവദിച്ച വർഷവും 
                                    </label>
                                    <textarea type="text" value="{{ old('house_details') }}"  class="form-control" placeholder="Condition of the house for which financing is applied for and the year of sanction" name="house_details" >{{ old('house_details') }}</textarea>
                                 @error('house_details')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label class="form-label">Allotting Agency/Department (അനുവദിച്ച ഏജൻസി/ വകുപ്പ് )
                                    </label>
                                    <input type="text" value="{{ old('agency') }}" class="form-control" placeholder="Allotting Agency/Department" name="agency" />
                                    @error('agency')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                                </div>
                               
                                <div class="col-md-6 mb-6">
                                    <label class="form-label">വീടുപണി പൂർത്തിയായി അവസാന ഗഡു കൈപ്പറ്റിയ വർഷം 
                                    </label>
                                    <input type="number" id="last_payment_year" class="form-control" name="last_payment_year" min="1000" max="9999" value="{{ old('last_payment_year') }}">
                              
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
                                          <textarea type="text" value="{{ old('family_details') }}"  class="form-control" placeholder="Family status (unmarried: mother, female headed family, premature widows, physically and mentally challenged, terminally ill, abused women, etc.)" name="family_details" >{{ old('family_details') }}</textarea>
                                    
                                    @error('family_details')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-6">
                                    <label class="form-label">
                                        Nature of work for which financial assistance is sought (Innovation / Additional convenience / Completion) 
                                        <br>ധനസഹായം ആവശ്യപ്പെടുന്ന പ്രവർത്തിയുടെ സ്വഭാവം 
                                        (നവീകരണം / അധിക സൗകര്യം / പൂർത്തീകരണം )
                                        </label>
                                        <div style="border: 1px solid black" class="form-control">

                                     
                                        <input type="radio" id="innovation" name="nature_payment" value="innovation" {{ old('nature_payment') == 'innovation' ? 'checked' : '' }}>
                                        <label for="innovation">Innovation (നവീകരണം)</label> &nbsp; &nbsp;
                                      
                                        <input type="radio" id="option2" name="nature_payment" value="Additional convenience" {{ old('nature_payment') == 'Additional convenience' ? 'checked' : '' }}>
                                        <label for="Additional convenience">Additional convenience (അധിക സൗകര്യം)</label>&nbsp; &nbsp;
                                      
                                        <input type="radio" id="option3" name="nature_payment" value="Completion" {{ old('nature_payment') == 'Completion' ? 'checked' : '' }}>>
                                        <label for="Completion">Completion (പൂർത്തീകരണം)</label>&nbsp; &nbsp;
                                    </div>
                                    @error('marriage_count')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                               
                              
                            </div><br> 
                            <div class="row">   
                                <div class="col-md-6 mb-6">
                                    <label class="form-label">
                                        Has funding been received from other government departments/agencies or local self-government bodies for the specified purpose ?<br>
                                        നിർദിഷ്ട്ട ആവശ്യത്തിനും മറ്റ് സർക്കാർ വകുപ്പ് / 
                                        ഏജൻസികളിൽനിന്നോ തദ്ദേശ സ്വയംഭരണാ സ്ഥാപനങ്ങളിൽ നിന്നോ 
                                        ധനസഹായം ലഭിച്ചിട്ടുണ്ടോ ?</label>
                                        <div style="border: 1px solid black" class="form-control">

                                            <label for="yes">Yes ( അതെ)</label> &nbsp; &nbsp;
                                          
                                            <input type="radio" id="innovation" name="payment_details" value="yes"  {{ old('payment_details') == 'yes' ? 'checked' : '' }}>&nbsp; &nbsp;
                                            <label for="No">No (ഇല്ല)</label>&nbsp; &nbsp;
                                          
                                            <input type="radio" id="option2" name="payment_details" value="no" {{ old('payment_details') == 'no' ? 'checked' : '' }}>
                                           
                                           
                                        </div><br>
                                        <div class="row" style="display:none" id="paymentDiv">
                                        <div class="col-md-6 mb-6">
                                            How much amount  ( എത്ര തുക)
                                        
                                        
                                          
                                          <textarea type="text" value="{{ old('payment_amount') }}"  class="form-control" placeholder="How much amount" name="payment_amount" >{{ old('payment_amount') }}</textarea>
                                          @error('payment_amount')
                                              <span class="text-danger">{{$message}}</span>
                                          @enderror
                                        </div>
                                        <div class="col-md-6 mb-6">
                                            Date received (ലഭിച്ച തീയതി )
                                            
                                            
                                              
                                              <input type="date" value="{{ old('date_received') }}"  class="form-control" placeholder="Date received" name="date_received" >
                                              @error('date_received')
                                              <span class="text-danger">{{$message}}</span>
                                          @enderror
                                            </div>
                                        </div>

                                </div>
                                <div class="col-md-3 mb-3">
                                    <label class="form-label">മുൻഗണന ലഭിക്കുന്നതിനുള്ള അർഹത തെളിയിക്കുന്നതിനുമുള്ള 
                                        മറ്റു സംഗതികൾ
                                  
                                        
                                        
                                          </label>
                                          <textarea type="text" value="{{ old('prove_eligibility ') }}"  class="form-control" placeholder="Other matters to prove eligibility for preference" name="prove_eligibility" >{{ old('prove_eligibility ') }}</textarea>
                                    
                                    @error('prove_eligibility')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label class="form-label">
                                  
                                        &nbsp;  &nbsp;  &nbsp;
                                        
                                          </label>
                                          <input type="file" class="form-control" accept="pdf/doc"  name="prove_eligibility_file" id="prove_eligibility_file" value="{{ old('prove_eligibility_file') }}" placeholder=" " />
                                          @if(old('prove_eligibility_file'))
                                          <p>Old File: {{ old('prove_eligibility_file') }}</p>
                                      @endif
                                    @error('prove_eligibility_file')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                               
                               
                              
                            </div><br> 
                           
                          <div class="row">
                            <div class="col-md-6 mb-6">
                                <label class="form-label">
                                  Place  (സ്ഥലം)
                                    
                              </label>
                              <input type="text" value="{{ old('place') }}" class="form-control" placeholder="Place" name="place" />
                              @error('place')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-6">
                                <label class="form-label">Applicant's signature (അപേക്ഷകന്റെ ഒപ്പ്  )</label>
                                <input type="file" class="form-control" accept="image/*"  name="signature" id="signature" value="" placeholder="Applicant's signature " />
                                @error('signature')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                          </div><br>
                          <br>
                         
                          <br>
                          <div class="card">
                            <div class="card-body">
                                <div class="row">   
                                    <div class="col-md-6 mb-6">
                                        <label class="form-label">District (ജില്ല)  </label>
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
                                        <label class="form-label">TEO  </label>
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
</div>
</div>
<script type="text/javascript">
 
 $(function() {
    
  
    //   $("#last_payment_year").datepicker({
    //     dateFormat: 'yy',
    //     changeMonth: false,
    //     changeYear: true,
    //     onSelect: function (dateText, inst) {
    //       var year = inst.selectedYear;
    //       $(this).val(year);
    //     }
    //   });
    });

    @if(!empty(old('current_district')))
    var val = document.getElementById("current_district").value;
    $.ajax({
        url: "{{url('district/fetch-taluk')}}",
        type: "POST",
        data: {
            district_id: val,
            _token: '{{csrf_token()}}'
        },
        success: function (data) {
            $("#current_taluk").find('option').remove();
            $("#current_taluk").append('<option value="" selected>Choose Taluk</option>');

            $.each(data.taluks, function (key, value) {
                var $opt = $('<option>');
                $opt.val(value._id).text(value.taluk_name);
                $opt.appendTo('#current_taluk');
            });

            // Set the selected value for permanent_taluk
            var permanentTalukValue = "{{ old('current_taluk') }}";
            if (permanentTalukValue) {
                $('#current_taluk').val(permanentTalukValue);
            }

            // Refresh the selectpicker (if you are using it)
           
            var currentTalukName = $("#current_taluk option:selected").text();
            console.log(currentTalukName); // Check if it prints the correct text
            $('#current_taluk_name').val(currentTalukName);
        }
    });
@endif

@if(!empty(old('submitted_district')))
    var val = document.getElementById("submitted_district").value;
    $.ajax({
        url: "{{url('district/fetch-teo')}}",
        type: "POST",
        data: {
            district_id: val,
            _token: '{{csrf_token()}}'
        },
        success: function (data) {
          
            $("#submitted_teo").find('option').remove();
            $("#submitted_teo").append('<option value="" selected>Choose Teo</option>');

            $.each(data.teos, function (key, value) {
                var $opt = $('<option>');
                $opt.val(value._id).text(value.teo_name);
                $opt.appendTo('#submitted_teo');
            });

            // Set the selected value for permanent_taluk
            var permanentTeoValue = "{{ old('submitted_teo') }}";
            if (permanentTeoValue) {
                $('#submitted_teo').val(permanentTeoValue);
            }

            // Refresh the selectpicker (if you are using it)
            
        }
    });
@endif


$(document).ready(function() {
   
    $('input[name="payment_details"]').change(function() {
      
        if ($(this).val() === 'yes') {
            $('#paymentDiv').show();
        } else {
            $('#paymentDiv').hide();
        }
    }).change();
    $('input[name="payment_details"]:checked').change();
 // Trigger the change event initially
});
</script>
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
                        var oldValue = "{{ old('current_taluk') }}";
                       $("#current_taluk").val(oldValue);
                    }
                });

    });
    $('#current_taluk').change(function(){
        var current_taluk = this.options[this.selectedIndex].text;
    document.getElementById('current_taluk_name').value = current_taluk;
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
