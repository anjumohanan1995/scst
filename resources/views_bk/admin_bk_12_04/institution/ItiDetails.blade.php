@extends('layouts.app')

@section('content')
<!-- main-content -->
<div class="main-content app-content">
	<!-- container -->
	<div class="main-container container-fluid">
		<!-- breadcrumb -->
		<div class="breadcrumb-header justify-content-between row me-0 ms-0" >
			
				<h4 class="content-title mb-2"> ഐ .റ്റി.ഐ /ട്രൈനിംഗ് സെന്ററുകളിലെ പഠിതാക്കൾക്കുള്ള സ്കോളർഷിപ്പ്


</h4>
				

            @if ($message = Session::get('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><i class="fa fa-window-close"></i></button> {{ $message }}
                </div>
            @endif
		</div>
		<!-- /breadcrumb -->

	</div>
<div class="main-content-body">
    <div class="row row-sm mt-4">
        <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12 ">
            <div class="card">
                <div class="card-body">
                   
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3 mb-3">
                                    <label class="form-label">അപേക്ഷകന്റെ പേര് :</label>
                                </div>
                                <div class="col-md-8 mb-8">
                                    <input type="text" class="form-control"  name="name" id="name" value="{{ @$itiFund->name }}" placeholder="" readonly/>
                                 
                                </div>
                            </div><br>
                            <div class="row">
                                <div class="col-md-3 mb-3">
                                    <label class="form-label">മേൽവിലാസം:</label>                                    
                                </div>
                                <div class="col-md-8 mb-8">
                                    <input type="text" class="form-control"  name="address" id="address" value="{{ @$itiFund['address'] }}" placeholder=""  readonly/>
                                </div>
                            </div><br>
                            <div class="row">
                                <div class="col-md-3 mb-3">
                                    <label class="form-label">കോഴ്‌സിന്റെ പേര് 
                                        :</label>
                                    
                                        </div>
                                        <div class="col-md-8 mb-8">
                                            <input type="text" class="form-control"  name="age" id="age" value="{{ @$itiFund['course_name'] }}" placeholder="" readonly />
                                         
                                        </div>
                                        

                                    </div><br>
                                <div class="row">
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label"> നടപ്പ് അദ്ധ്യയന വർഷം ക്ലാസ് ആരംഭിച്ച തീയതി 
                                            :</label>
                                        
                                            </div>
                                            <div class="col-md-8 mb-8">
                                                <input type="text" class="form-control"  name="class_start_date" id="class_start_date" value="{{ @$itiFund['class_start_date'] }}" placeholder="" readonly/>
                                              
                                            </div>
                                            
    
                                        </div><br>
                                <div class="row">
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label">അപേക്ഷകനെ പ്രവേശനം ലഭിച്ചത് 
 
                                            :</label>
                                        
                                            </div>
                                            <div class="col-md-8 mb-8">
                                                <input type="text" class="form-control" value="{{ isset($itiFund['admission_type']) ? (
                                                    $itiFund['admission_type'] == 'merit' ? 'മെരിറ്റ്' : (
                                                        $itiFund['admission_type'] == 'innovation' ? 'സംവരണം' : (
                                                            $itiFund['admission_type'] == 'management' ? 'മാനേജ്‌മന്റ്' : (
                                                                $itiFund['admission_type'] == 'others' ? 'മറ്റുള്ളവ' : ''
                                                            )
                                                        )
                                                    )
                                                ) : '' }}" name="admission_type" id="admission_type" readonly="">
                                                
                                            </div>
                                            
    
                                        </div><br>
                                <div class="row">
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label">അപേക്ഷകന്റെ ജാതി/ മതം   :</label>
                                        
                                            </div>
                                            <div class="col-md-8 mb-8">
                                                <input type="text" class="form-control"  name="caste" id="caste" value="{{ @$itiFund['caste'] }}" placeholder="" readonly />
                                                
                                            </div>
                                            
    
                                        </div><br>
                                <div class="row">
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label">ജാതി/ മതം സർട്ടിഫിക്കറ്റ്
                                            :</label>
                                        
                                            </div>
                                            <div class="col-md-8 mb-8">
                                                @if(@$itiFund['caste_certificate'])
                                                                <iframe src="{{ asset('itiStudentFund/' . @$itiFund['caste_certificate']) }}" width="400" height="200"></iframe>
                                                                @endif
                                            </div>
                                            

                                        </div><br>
                                        <div class="row">
                                            <div class="col-md-3 mb-3">
                                                <label class="form-label">അപേക്ഷകന്റെ വരുമാനം :</label>
                                                
                                                    </div>
                                                    <div class="col-md-8 mb-8">
                                                        <input type="text" class="form-control"  name="income" id="income" value="{{ @$itiFund['income'] }}" placeholder="" readonly />
                                               
                                                    </div>
                                                    
            
                                                </div><br>
                                <div class="row">
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label">വരുമാന സർട്ടിഫിക്കറ്റ് :</label>
                                        
                                            </div>
                                            <div class="col-md-8 mb-8">
                                                @if(@$itiFund['income_certificate'])
                                                <iframe src="{{ asset('itiStudentFund/' . @$itiFund['income_certificate']) }}" width="400" height="200"></iframe>
                                                @endif
                                            </div>
                                            
    
                                        </div><br>
                                <div class="row">
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label">വിദ്യാർത്ഥികൾക്ക് ഇ-ഗ്രാൻഡ് അകൗണ്ട് നമ്പർ ഉണ്ടെങ്കിൽ ബാങ്ക് ശാഖ /ഇ -ഗ്രാൻഡ് അകൗണ്ട് നം
                                             :</label>
                                        
                                            </div>
                                            <div class="col-md-8 mb-8">
                                                <input type="text" class="form-control"  name="account_details" id="account_details" value="{{ @$itiFund['account_details'] }}" placeholder="" readonly />
                                               
                                            </div>
                                            
    
                                        </div><br>
                             
                                        @php
                                        use Carbon\Carbon;
                                    @endphp
                                                 
                                <div class="row">
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label">തീയതി :</label>
                                        
                                            </div>
                                            <div class="col-md-8 mb-8">
                                                <input type="text" class="form-control" name="date" id="date" value="{{ @$itiFund['date'] ? Carbon::parse($itiFund['date'])->format('d-m-Y') : '' }}" placeholder="" readonly />
 
                                            </div>
                                            
    
                                        </div><br>
                                        <div class="row">
                                            <div class="col-md-3 mb-3">
                                                <label class="form-label">അപേക്ഷകന്റെ ഒപ്പ്  :</label>
                                                
                                                    </div>
                                                    <div class="col-md-8 mb-8">
                                                        @if(@$itiFund['signature'] !="")
                                                       <img src="{{ url('/') }}/itiStudentFund/{{ @$itiFund['signature'] }}" alt="Preview" width="300" height="200">

                                                       @endif
                                                    </div>
                                                    
            
                                                </div><br>
                                                <div class="row">
                                                    <div class="col-md-3 mb-3">
                                                        <label class="form-label">രക്ഷാകർത്താവിന്റെ  പേര്   :</label>
                                                        
                                                            </div>
                                                            <div class="col-md-8 mb-8">
                                                                <input type="text" class="form-control"  name="parent_name" id="parent_name" value="{{ @$itiFund['parent_name'] }}" placeholder="തീയതി" readonly />
                                                
                                                            </div>
                                                            
                    
                                                        </div><br>
                                                        <div class="row">
                                                            <div class="col-md-3 mb-3">
                                                                <label class="form-label">രക്ഷാകർത്താവിന്റെ  ഒപ്പ്  :</label>
                                                                
                                                                    </div>
                                                                    <div class="col-md-8 mb-8">
                                                                        @if(@$itiFund['signature'] !="")
                                                                       <img src="{{ url('/') }}/itiStudentFund/{{ @$itiFund['signature'] }}" alt="Preview" width="300" height="200">
                
                                                                       @endif
                                                                    </div>
                                                                    
                            
                                                                </div><br>
                                               
                                                    
                                                        <form method="post" action="{{ route('updateItiDetails',@$itiFund->id) }}">
                                                            @csrf
                                                            <div class="row">   
                                                                <div class="col-md-6 mb-6">
                                                                    <label class="form-label">ജില്ല  </label>
                                                                    <select id="submitted_district" name="submitted_district" class="form-control" >
                                                                        <option value="">Select</option>
                                                                            @foreach($districts as $district)
                                                                                <option value="{{$district->id}}" @if($district->id == @$itiFund->submitted_district) selected @endif>{{$district->name}}</option>
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
                                                            <div class="row">
                                                       
                                                                <div class="col-md-6 mb-6"><br>
                                                                    <input type="submit" name="submit" value="update" class="btn btn-warning waves-effect waves-light ">
                                                                    <a href="{{ route('adminInstitutionList') }}">  <input type="button" class="btn btn-primary" value="Back >>" >
                                                          
                                                                </div>
                                                                    </div>
                                                        
                                                        </form>
                                                     </a>  
                                                            
                                                            
                    
                                                        
                                      
                                  
                                 
                            </div>

                   
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<script>
   // alert("skhfj");
   var submittedTao = '';
    <?php if($itiFund->submitted_teo): ?>
        submittedTao = <?php echo json_encode($itiFund->submitted_teo); ?>;
    <?php else: ?>
        submittedTao = null;
    <?php endif; ?>

    console.log(submittedTao); // Check the value in the console

    if (submittedTao != null) {
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
                    if (submittedTao !== null && submittedTao == value._id) {
                        $opt.prop('selected', true);
                    }

                    $opt.appendTo('#submitted_teo');
                });
            }
        });
    }
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
