@extends('layouts.app')

@section('content')
<!-- main-content -->
<div class="main-content app-content">
	<!-- container -->
	<div class="main-container container-fluid">
		<!-- breadcrumb -->
		<div class="breadcrumb-header justify-content-between row me-0 ms-0" >
			
				<h4 class="content-title mb-2">പട്ടിക വർഗ്ഗ വികസന വകുപ്പിൽ നിന്നും 8 ,9 ,10 ,11 ,12  ക്ലാസ്സുകളിൽ പഠിക്കുന്നു കുട്ടികൾക്ക് ട്യൂഷൻ ഫീസിനുള്ള അപേക്ഷ

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
           
                    <form name="patientForm" id="patientForm" method="post" action="{{route('TuitionFee.store')}}" enctype="multipart/form-data">
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
                                    <label class="form-label">ഫോൺ നമ്പർ 


                                    </label>
                                    <input type="tel" value="{{ old('mobile') }}"  class="form-control" placeholder="ഫോൺ നമ്പർ " name="mobile" />
                                   
                                    @error('mobile')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                               
                            </div><br>
                               <div class="row">   
                                <div class="col-md-6 mb-6">
                                    <label class="form-label">ജാതി /മതം 
                                    </label>
                                    <input type="text" value="{{ old('caste') }}"  class="form-control" placeholder="ജാതി /മതം" name="caste" />
                               
                                    @error('caste')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                      </div>
                                          <div class="col-md-6 mb-6">
                                        <label class="form-label">വരുമാനം 


                                        </label>
                                        <input type="text" value="{{ old('annual_income') }}"  class="form-control" placeholder="വരുമാനം" name="annual_income" />
                               
                                        @error('annual_income')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                       
                                    </div>
                                    
                                   
                                   
                                  
                                </div><br>
                            <div class="row">   
                               
                                <div class="col-md-6 mb-6">
                                    <label class="form-label">വിദ്യാർത്ഥിയുടെ പേര് 

                                        
                                    </label>
                                    <input type="text" class="form-control" value="{{ old('student_name') }}"   name="student_name" id="student_name" value="" placeholder="വിദ്യാർത്ഥിയുടെ പേര് " />


                 
                                 @error('student_name')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                              
                              
                                <div class="col-md-6 mb-6">
                                    <label class="form-label">അപേക്ഷകനുമായുള്ള ബന്ധം 

                                        
                                        
                                          </label>
                                           <input type="text" class="form-control" value="{{ old('relation') }}"   name="relation" id="relation" value="" placeholder="അപേക്ഷകനുമായുള്ള ബന്ധം " />

                                    
                                    @error('relation')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                               
                               
                            </div><br>   
                           
                            <div class="row">   
                                <div class="col-md-6 mb-6">
                                    <label class="form-label">പഠിക്കുന്ന സ്‌കൂളിന്റെ പേര് 
 
                                        </label>

                                        
                                        <input type="text" class="form-control"   name="school_name" id="school_name" value="" placeholder="പഠിക്കുന്ന സ്‌കൂളിന്റെ പേര്" />
                                    @error('school_name')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-6">
                                    <label class="form-label">ക്ലാസ് 
 
                                        </label>
                                        <input type="text" class="form-control"   name="class_number" id="class_number" value="" placeholder="ക്ലാസ് " />
                                    @error('class_number')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                
                               
                             
                            </div><br> 

 


                           
                            <div class="row">   
                                <div class="col-md-6 mb-6">
                                    <label class="form-label">ട്യുഷൻ സെന്ററിന്റെ പേര്  
 
                                        </label>
                                        <input type="text" class="form-control"   name="tuition_center" id="tuition_center" value="" placeholder="ട്യുഷൻ സെന്ററിന്റെ പേര് " />
                                    @error('tuition_center')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-6">
                                    <label class="form-label">സ്ഥലം  
 
                                        </label>
                                        <input type="text" class="form-control"   name="place" id="place" value="" placeholder="സ്ഥലം " />
                                    @error('place')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                
                               
                             
                            </div><br> 
                            <div class="row"> 

                                 <div class="col-md-6 mb-4">
                                    <label class="form-label">അപേക്ഷകന്റെ ഒപ്പ്/വിരലടയാളം </label>
                                    <input type="file" value="{{ old('signature') }}"  class="form-control" placeholder="അപേക്ഷകന്റെ ഒപ്പ്/വിരലടയാളം" name="signature" />
                                    @error('signature')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>   
                            </div>  
                            
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
