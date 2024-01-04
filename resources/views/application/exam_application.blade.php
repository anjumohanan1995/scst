@extends('layouts.app')

@section('content')
<!-- main-content -->
<div class="main-content app-content">
	<!-- container -->
	<div class="main-container container-fluid">
		<!-- breadcrumb -->
		<div class="breadcrumb-header justify-content-between row me-0 ms-0" >
			<div class="col-md-12">
				<h4 > Application Form</h4><br>
                <h2>അയ്യങ്കാളി ടാലന്റ് സേർച്ച് &ഡെവലപ്പ്മെന്റ്  സ്‌കീം  പ്രവേശന പരീക്ഷക്കുള്ള അപേക്ഷ  </h2>
				{{-- <nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item active" aria-current="page"><i class="side-menu__icon fe fe-box"> </i> - Dashboard
						</li>
					</ol>
				</nav> --}}
			</div>

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
				<div class="card">
					<div class="card-body">

                        <form name="userForm" id="userForm" method="post" action="{{route('examApplicationPreview')}}">
                            @csrf
                            {{-- <div class="mb-4 main-content-label">User Details</div> --}}
                            <div class="form-group">
                                <br>
                                <div class="row">
                                     
                                     
                                    <div class="col-md-6 mb-6">
                                        <label class="form-label">School Name / സ്ക്കൂളിന്റെ പേര്  </label>
                                        <input type="text" value="{{ old('school_name') }}"  class="form-control" placeholder="School Name" name="school_name" />
                                        @error('school_name')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-6">
                                        <label class="form-label">Student Name/വിദ്യാർത്ഥിയുടെ പേര്   </label>
                                        <input type="text" value="{{ old('student_name') }}" class="form-control" placeholder="Student Name" name="student_name" />
                                        
                                        @error('student_name')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>

                                    
                                </div><br>
                                <div class="row">
                                    <div class="col-md-6 mb-6">
                                        <label class="form-label">Gender / ആൺകുട്ടിയോ/ പെൺകുട്ടിയോ </label>
                                         <div class="col-md-6">
                                             <label class="form-label">Male</label>
                                            <input class="form-control" type="radio" name="gender" value="Male">

                                            <label class="form-label">Female</label>
                                            <input class="form-control" type="radio" name="gender" value="Female">
                                    </div>
                                        
                                    </div>

                                    <div class="col-md-6 mb-6">
                                        <label class="form-label">Parent Name & Address With Pincode / രക്ഷിതാവിന്റെ പേരും വിലാസവും (പിൻകോഡ് സഹിതം )  </label>
                                        <textarea  class="form-control" placeholder="Parent Name & Address With Pincode " name="address" ></textarea>
                                        <span id="nameError" class="text-danger"></span>
                                        @error('address')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    
                                </div><br>
                                <div class="row">
                                    <div class="col-md-6 mb-6">
                                        <label class="form-label">Relation / രക്ഷിതാവിനു കുട്ടിയുമായുള്ള ബന്ധം  </label>
                                        <input type="text" value="{{ old('relation') }}"  class="form-control" placeholder="Relation" name="relation" />
                                        @error('relation')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-6">
                                        <label class="form-label">Mother's Name / മാതാവിന്റെ പേര്   </label>
                                        <input type="text" value="{{ old('mother_name') }}" class="form-control" placeholder="Mothers's Name" name="mother_name" />
                                        <span id="nameError" class="text-danger"></span>
                                        @error('mother_name')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div><br>
                                <div class="row">
                                   <div class="col-md-6 mb-6">
                                        <label class="form-label">Annual Income / കുടുംബ വാർഷിക വരുമാനം </label>
                                        <input type="text" value="{{ old('annual_income') }}"  class="form-control" placeholder="Annual Income" name="annual_income" />
                                        @error('annual_income')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-6">
                                        <label class="form-label">Occupation of Parent  / രക്ഷിതാവിന്റെ തൊഴിൽ   </label>
                                        <input type="text" value="{{ old('occupation_parent') }}" class="form-control" placeholder="Occupation of Parent" name="occupation_parent" />
                                        <span id="nameError" class="text-danger"></span>
                                        @error('occupation_parent')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>

                                    
                                </div><br>
                                <div class="row">
                                   <div class="col-md-6 mb-6">
                                        <label class="form-label">Date of Birth & Age / വിദ്യാർത്ഥിയുടെ ജനനതിയതിയും പൂർത്തിയായ വയസ്സും  </label>
                                        <input type="text" value="{{ old('dob') }}"  class="form-control" placeholder="Date of Birth & Age" name="dob" />
                                        @error('dob')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-6">
                                        <label class="form-label">Religion & Caste / ജാതിയും മതവും   </label>
                                        <input type="text" value="{{ old('caste') }}" class="form-control" placeholder="Religion & Caste" name="caste" />
                                        <span id="nameError" class="text-danger"></span>
                                        @error('caste')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>

                                    
                                </div><br>
                                <div class="row">
                                   <div class="col-md-6 mb-6">
                                        <label class="form-label">പട്ടികജാതി/ പട്ടികവർഗ/ മറ്റിതര സമുദായം  ഇവയിൽ ഏത്  </label>
                                        <input type="text" value="{{ old('other') }}"  class="form-control" placeholder="പട്ടികജാതി/ പട്ടികവർഗ/ മറ്റിതര സമുദായം  ഇവയിൽ ഏത്" name="other" />
                                        @error('other')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-6">
                                        <label class="form-label">Class,School Name and Address  / പഠിക്കുന്ന ക്ലാസും ,സ്കൂളിന്റെ പേരും വിലാസവും   </label>
                                        <input type="text" value="{{ old('school_address') }}" class="form-control" placeholder="Class,School Name and Address" name="school_address" />
                                        <span id="nameError" class="text-danger"></span>
                                        @error('school_address')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>

                                    
                                </div><br>
                                <div class="row">
                                   <div class="col-md-6 mb-6">
                                        <label class="form-label">Birth Place and District /ജനനസ്ഥലവും ,ജില്ലയും </label>
                                        <input type="text" value="{{ old('birth_place') }}" class="form-control" placeholder="Birth Place and District" name="birth_place" />
                                       
                                        @error('birth_place')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-6">
                                        <label class="form-label">Mother Tounge/വിദ്യാർത്ഥിയുടെ മാതൃഭാഷ </label>
                                        <input type="text" value="{{ old('mother_tonge') }}" class="form-control" placeholder="Mother Tounge" name="mother_tonge" />
                                       
                                        @error('mother_tonge')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                       
                                    </div>
                                    
                                </div><br>

                                 <div class="row">
                                   <div class="col-md-6 mb-6">
                                        <label class="form-label">Place/സ്ഥലം </label>
                                        <input type="text" value="{{ old('place') }}" class="form-control" placeholder="Place" name="place" />
                                       
                                        @error('place')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-6">
                                        <label class="form-label">Date/തിയതി</label>
                                        <input type="date" value="{{ old('date') }}" class="form-control" placeholder="Date" name="date" />
                                       
                                        @error('date')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                       
                                    </div>
                                    
                                </div><br>
                            </div>
                            <br><br><br>
                            <button type="submit" id="submit" class="btn btn-warning waves-effect waves-light float-end">Save</button>
						</form>
                    </div>
                </div>
            </div>
        </div>
	</div>
</div>
<script>


	$(document).ready(function() {
     	$('input[name="apart_for_any_period"]').change(function() {
            if ($(this).val() === 'Yes') {
                $('#additionalDiv').show();
            } else {
                $('#additionalDiv').hide();
            }
        });
	});
  </script>
<!-- main-content-body -->
@endsection
