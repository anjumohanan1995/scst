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

	</div>
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
                                    <label class="form-label">പേര്  </label>
                                    <input type="text" value="{{ old('name') }}"  class="form-control" placeholder="പേര്" name="name" />
                                    @error('name')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="col-md-4 mb-4">
                                    <label class="form-label">ജനനതീയതി   </label>
                                    <input type="date" class="form-control"  name="dob" id="dob" value=""  />
                                    @error('dob')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="col-md-4 mb-4">
                                    <label class="form-label">വയസ്  </label>
                                    <input type="number" value="{{ old('age') }}"  class="form-control"  name="age" />
                                    @error('age')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div> 
                              
                            </div>
                            <div class="row">  
                               
                                <div class="col-md-4 mb-4">
                                    <label class="form-label">ജാതി  </label>
                                    <input type="text" value="{{ old('caste') }}"  class="form-control"  name="caste" />
                                    @error('caste')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="col-md-4 mb-4">
                                    <label class="form-label">ജാതി സർട്ടിഫിക്കറ്റ്  </label>
                                    <input type="file" class="form-control"  name="caste_certificate" id="caste_certificate" value="" placeholder="" />
                                    @error('caste_certificate')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="col-md-4 mb-4">
                                    <label class="form-label">ഫോൺ നമ്പർ    </label>
                                    <input type="text" class="form-control"  name="phone" id="phone" value="" placeholder="" />                                    @error('phone')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>                               
                            </div>
                            <div class="row">
                                <div class="col-md-3 mb-3">
                                    <label class="form-label">മേൽവിലാസം  </label>
                                    <textarea type="text" value="{{ old('address') }}" class="form-control" name="address" ></textarea>
                                    @error('address')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>  
                                <div class="col-md-3 mb-3">
                                    <label class="form-label">ജില്ല  </label>
                                    <select id="district" name="district" class="form-control" >
                                        <option value="">Select</option>
                                            @foreach($districts as $district)
                                                <option value="{{$district->id}}"  >{{$district->name}}</option>
                                            @endforeach
                                    </select>
                                     @error('district')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                    <input type="hidden" name="district_name" id="district_name" value="">
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label class="form-label">താലൂക്ക്  </label>
                                    <select id="taluk" name="taluk" class="form-control">
                                        <option value="">Choose Taluk</option>
                                    </select>                                 
                                    @error('taluk')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                    <input type="hidden" name="taluk_name" id="taluk_name" value="">
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label class="form-label">പിൻകോഡ്  </label>
                                    <input type="text" value="{{ old('pincode') }}"  class="form-control"  name="pincode" />
                                    @error('pincode')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">   
                                <div class="col-md-6 mb-6">
                                    <label class="form-label">ആധാർ നമ്പർ   </label>
                                    <input type="text" class="form-control"  name="adhaar_number" id="adhaar_number" value="" placeholder="" />
                                    @error('adhaar_number')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-6">
                                    <label class="form-label">ആധാർ പകർപ്പ് ഹാജരാക്കണം  </label>
                                    <input type="file" class="form-control"  name="adhaar_copy" id="adhaar_copy" value="" placeholder="" />
                                    @error('adhaar_copy')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div><br>
                            <div class="row">   
                                <div class="col-md-6 mb-6">
                                    <label class="form-label">ബാങ്ക് അക്കൗണ്ട് വിശദംശങ്ങൾ   </label>
                                    <textarea type="text" class="form-control"  name="bank_account_details" id="bank_account_details" value="" placeholder="" ></textarea>
                                    @error('bank_account_details')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-6">
                                    <label class="form-label">ബാങ്ക് അക്കൗണ്ട് പാസ്സ് ബുക്കിന്റെ പകർപ്പ്   </label>
                                    <input type="file" class="form-control"  name="passbook_copy" id="passbook_copy" value="" placeholder="" />
                                    @error('passbook_copy')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div><br>
                            <div class="row">   
                                <div class="col-md-6 mb-6">
                                    <label class="form-label">റേഷൻ കാർഡ് </label>
                                    <div>
                                        <input type="radio" id="apl" name="ration_card_type" value="APL">
                                        <label for="apl">APL</label>
                                    </div>
                                    <div>
                                        <input type="radio" id="bpl" name="ration_card_type" value="BPL">
                                        <label for="bpl">BPL</label>
                                    </div>
                                    @error('ration_card_type')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-6">
                                    <label class="form-label">റേഷൻ  കാർഡ് പകർപ്പ്   </label>
                                    <input type="file" class="form-control"  name="ration_card" id="ration_card" value="" placeholder="" />
                                    @error('ration_card')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div><br>
                            <div class="row">   
                                <div class="col-md-6 mb-6">
                                    <label class="form-label">മെഡിക്കൽ സർട്ടിഫിക്കറ്റ് ഹാജരാക്കിയിട്ടുണ്ടോ? </label>
                                    <div>
                                        <input type="radio" id="yes" name="is_medical_certificate_submitted" value="Yes">
                                        <label for="yes">Yes</label>
                                    </div>
                                    <div>
                                        <input type="radio" id="no" name="is_medical_certificate_submitted" value="No">
                                        <label for="no">No</label>
                                    </div>
                                    @error('is_medical_certificate_submitted')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-6">
                                    <label class="form-label">മെഡിക്കൽ സർട്ടിഫിക്കറ്റ്   </label>
                                    <input type="file" class="form-control"  name="medical_certificate" id="medical_certificate" value="" placeholder="" />
                                    @error('medical_certificate')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div><br>
                            {{--  <h3 style="text-align: center;"><u>സത്യപ്രസ്താവന</u></h3>
                            <p style="text-align: center;">മേൽ പ്രസ്താവിച്ച വിവരങ്ങൾ പൂർണമായും സത്യമാണെന്ന് ബോധിപ്പിക്കുന്നു</p>  --}}
                            <div class="row">   
                                <div class="col-md-6 mb-6">
                                    <label class="form-label">സ്ഥലം  </label>
                                    <input type="text" class="form-control"  name="place" id="place" value="" placeholder="" />
                                    @error('place')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-6">
                                    <label class="form-label">ഒപ്പ്</label>
                                    <input type="file" class="form-control"  name="signature" id="signature" value="" placeholder="" />
                                    @error('signature')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div><br>
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
     	$('#example').DataTable();
	});
  </script>
<!-- main-content-body -->
@endsection
