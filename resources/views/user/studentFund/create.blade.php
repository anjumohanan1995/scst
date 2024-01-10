@extends('layouts.app')

@section('content')
<!-- main-content -->
<div class="main-content app-content">
	<!-- container -->
	<div class="main-container container-fluid">
		<!-- breadcrumb -->
		<div class="breadcrumb-header justify-content-between row me-0 ms-0" >
			
				<h4 class="content-title mb-2">മെഡിക്കൽ / എഞ്ചിനിയറിംഗ് കോഴ്‌സുകളിലെ പട്ടികജാതി വിദ്യാർത്ഥികൾക്ക് പ്രാരംഭചെലവുകൾക്ക് ധനസഹായം  അനുവദിക്കുന്നതിനുള്ള അപേക്ഷ 

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
           
                    <form name="patientForm" id="patientForm" method="post" action="{{route('MedicalEngineeringStudentFund.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="card">
                            <div class="card-body">
                        <div class="form-group">
                            <div class="row">   
                                <div class="col-md-6 mb-6">
                                    <label class="form-label">അപേക്ഷകന്റെ പേര് 
                                    </label>
                                    <input type="text" value="{{ old('name') }}"  class="form-control" placeholder="അപേക്ഷകന്റെ പേര് " name="name" />
                                    @error('name')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-6">
                                    <label class="form-label">മേൽവിലാസം 
                                    </label>
                                    <textarea type="text" value="{{ old('address') }}"  class="form-control" placeholder="മേൽവിലാസം" name="address" ></textarea>
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
                                    <label class="form-label">കോഴ്‌സിന്റെ പേര് 

                                    </label>
                                    <input type="text" value="{{ old('course_name') }}"  class="form-control" placeholder="കോഴ്‌സിന്റെ പേര് " name="course_name" />
                                   
                                    @error('course_name')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                               
                            </div><br>
                               <div class="row">   
                                <div class="col-md-6 mb-6">
                                    <label class="form-label">നടപ്പ് അദ്ധ്യയന വർഷം ക്ലാസ് ആരംഭിച്ച തീയതി  
                                    </label>
                                    <input type="date" value="{{ old('class_start_date') }}"  class="form-control" placeholder="നടപ്പ് അദ്ധ്യയന വർഷം ക്ലാസ് ആരംഭിച്ച തീയതി  " name="class_start_date" />
                               
                                    @error('class_start_date')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                      </div>
                                          <div class="col-md-6 mb-6">
                                        <label class="form-label">അപേക്ഷകനെ പ്രവേശനം ലഭിച്ചത് 

                                        </label>
                                        <div style="border: 1px solid black" class="form-control">

                                     
                                            <input type="radio" id="merit" name="admission_type" value="merit">
                                            <label for="merit">മെരിറ്റ് </label> &nbsp; &nbsp;
                                            <input type="radio" id="reservation" name="admission_type" value="innovation">
                                            <label for="innovation">സംവരണം </label> &nbsp; &nbsp;
                                            
                                            <input type="radio" id="management" name="admission_type" value="management">
                                            <label for="management">മാനേജ്‌മന്റ്</label>&nbsp; &nbsp;
                                          
                                            <input type="radio" id="option3" name="admission_type" value="others">
                                            <label for="others">മറ്റുള്ളവ</label>&nbsp; &nbsp;
                                        </div>
                                        @error('admission_type')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                       
                                    </div>
                                    
                                   
                                   
                                  
                                </div><br>
                            <div class="row">   
                               
                                <div class="col-md-3 mb-3">
                                    <label class="form-label">അപേക്ഷകന്റെ ജാതി/ മതം 
                                        (സർട്ടിഫിക്കറ്റ് ഹാജരാക്കണം )
                                        
                                    </label>
                                    <textarea type="text" value="{{ old('caste') }}"  class="form-control" placeholder="അപേക്ഷകന്റെ ജാതി/ മതം" name="caste" ></textarea>
                                 @error('caste')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label class="form-label">
                                    </label>
                                    <input type="file" class="form-control"   name="caste_certificate" id="caste_certificate" value="" placeholder=" സർട്ടിഫിക്കറ്റ്" />
                                @error('caste_certificate')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                                </div>
                              
                                <div class="col-md-3 mb-3">
                                    <label class="form-label">അപേക്ഷകന്റെ വരുമാനം 
                                        (സർട്ടിഫിക്കറ്റ് ഹാജരാക്കണം )
                                        
                                        
                                          </label>
                                          <textarea type="text" value="{{ old('income') }}"  class="form-control" placeholder="അപേക്ഷകന്റെ വരുമാനം " name="income" ></textarea>
                                    
                                    @error('income')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label class="form-label"> 
                                    </label>
                                    <input type="file" class="form-control"   name="income_certificate" id="income_certificate" value="" placeholder=" സർട്ടിഫിക്കറ്റ്" />
                                @error('caste_certificate')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                                </div>
                               
                            </div><br>   
                           
                            <div class="row">   
                                <div class="col-md-6 mb-6">
                                    <label class="form-label">വിദ്യാർത്ഥികൾക്ക് ഇ-ഗ്രാൻഡ് അകൗണ്ട് നമ്പർ ഉണ്ടെങ്കിൽ ബാങ്ക് ശാഖ /ഇ -ഗ്രാൻഡ് അകൗണ്ട് നം 
                                        </label>
                                        <input type="text" class="form-control"   name="account_details" id="account_details" value="" placeholder="വിദ്യാർത്ഥികൾക്ക് ഇ-ഗ്രാൻഡ് അകൗണ്ട് നമ്പർ ഉണ്ടെങ്കിൽ ബാങ്ക് ശാഖ /ഇ -ഗ്രാൻഡ് അകൗണ്ട് നം" />
                                    @error('account_details')
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
                            <div class="row">   
                              
                               
                                <div class="col-md-6 mb-6">
                                    <label class="form-label"> രക്ഷാകർത്താവിന്റെ പേര് 

                                        </label>
                                        <input type="text" class="form-control"   name="parent_name" id="parent_name" value="" placeholder="രക്ഷാകർത്താവിന്റെ പേര് " />
                                    @error('parent_name')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-6">
                                    <label class="form-label">രക്ഷാകർത്താവിന്റെ ഒപ്പ്  </label>
                                    <input type="file" class="form-control" accept="image/*"  name="parent_signature" id="parent_signature" value="" placeholder="രക്ഷാകർത്താവിന്റെ ഒപ്പ് " />
                                    @error('parent_signature')
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
