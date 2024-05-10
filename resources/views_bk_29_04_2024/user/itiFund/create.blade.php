@extends('layouts.app')

@section('content')
    <!-- main-content -->
    <div class="main-content app-content">
        <!-- container -->
        <div class="main-container container-fluid">
            <!-- breadcrumb -->
            <div class="breadcrumb-header justify-content-between row me-0 ms-0">

                <h4 class="content-title mb-2">  ഐ .റ്റി.ഐ /ട്രൈനിംഗ്
                    സെന്ററുകളിലെ പഠിതാക്കൾക്കുള്ള സ്കോളർഷിപ്പ് 
                </h4>
                <h4 class="content-title mb-2 small">   Scholarship for students in ITI/Training Centres

                </h4>



                @if ($message = Session::get('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><i
                                class="fa fa-window-close"></i></button> {{ $message }}
                    </div>
                @endif
            </div>
            <!-- /breadcrumb -->

      
        <div class="main-content-body">
            <div class="row row-sm mt-4">
                <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12 ">

                    <form name="patientForm" id="patientForm" method="post" action="{{ route('iti-scholarship.store') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6 mb-6">
                                            <label class="form-label"> അപേക്ഷകന്റെ പേര് <br><span class="small"> Applicant's Name </span>
                                            </label>
                                            <input type="text" value="{{ old('name') }}" class="form-control"
                                                placeholder="അപേക്ഷകന്റെ പേര് " name="name" />
                                            @error('name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="col-md-6 mb-6">
                                            <label class="form-label">മേൽവിലാസം <br><span class="small"> Address </span>
                                            </label>
                                            <textarea type="text" value="{{ old('address') }}" class="form-control" placeholder="മേൽവിലാസം" name="address">{{ old('address') }}</textarea>
                                            @error('address')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div><br>
                                    <div class="row">

                                        <div class="col-md-2 mb-2">
                                            <label class="form-label"> ജില്ല <br><span class="small">  District </span></label>
                                            <select id="current_district" name="current_district" class="form-control">
                                                <option value="">Select</option>
                                                @foreach ($districts as $district)
                                                    <option value="{{ $district->id }}"
                                                        {{ old('current_district') == $district->id ? 'selected' : '' }}>
                                                        {{ $district->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('current_district')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            <input type="hidden" name="district_name" id="district_name" value="">
                                        </div>
                                        <div class="col-md-2 mb-2">
                                            <label class="form-label"> താലൂക്ക്  <br><span class="small"> Taluk</span> </label>
                                            <select id="current_taluk" name="current_taluk" class="form-control">
                                                <option value="">Choose Taluk</option>
                                            </select>
                                            @error('current_taluk')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            <input type="hidden" name="taluk_name" id="taluk_name" value="">
                                        </div>
                                        <div class="col-md-2 mb-2">
                                            <label class="form-label"> പിൻകോഡ് <br><span class="small"> Pincode </span></label>
                                            <input type="number" value="{{ old('current_pincode') }}" class="form-control"
                                                name="current_pincode" placeholder="പിൻകോഡ്"  />


                                            @error('current_pincode')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mb-6">
                                            <label class="form-label">പഞ്ചായത്തിൻ്റെ പേര് <br><span class="small">  Name of panchayath </span>
        
                                            </label>
                                            <input type="text" value="{{ old('panchayath') }}"  class="form-control" placeholder="പഞ്ചായത്തിൻ്റെ പേര്" name="panchayath" />
                                           
                                            @error('panchayath')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                       

                                    </div><br>
                                    <div class="row">
                                        <div class="col-md-6 mb-6">
                                            <label class="form-label">കോഴ്‌സിൻ്റെ പേര് <br><span class="small"> Course Name </span>

                                            </label>
                                            <input type="text" value="{{ old('course_name') }}" class="form-control"
                                                placeholder="കോഴ്‌സിൻ്റെ പേര് " name="course_name" />

                                            @error('course_name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mb-6">
                                            <label class="form-label">
                                                 മെട്രിക് അല്ലെങ്കിൽ നോൺ മെട്രിക്?<br><span class="small">  Metric or Non Metric ? </span></label>
                                                <div style="border: 1px solid black" class="form-control">
                                                    <input type="radio" id="yes" name="metric_type" value="Metric"  {{ old('metric_type') == 'Metric' ? 'checked' : '' }}>&nbsp; &nbsp;
                                                    <label for="yes">മെട്രിക് / Metric </label> &nbsp; &nbsp;
                                                  
                                                    <input type="radio" id="no" name="metric_type" value="Non Metric" {{ old('metric_type') == 'Non Metric' ? 'checked' : '' }}>
                                                   
                                                    &nbsp; &nbsp;<label for="No">
                                                        നോൺ മെട്രിക് / Non Metric </label>
                                                  
        
                                                   
                                                </div>
                                        </div>
                                    </div><br>
                                    <div class="row">
                                        <div class="col-md-6 mb-6">
                                        <label class="form-label"> കോഴ്‌സിൻ്റെ  ദൈർഘ്യം <br><span class="small"> Duration Of Course </span>

                                        </label>
                                        <input type="text" value="{{ old('course_duration') }}" class="form-control"
                                            placeholder="കോഴ്‌സിൻ്റെ  ദൈർഘ്യം" name="course_duration" />

                                        @error('course_duration')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                        <div class="col-md-6 mb-6">
                                            <label class="form-label">സ്ഥാപനത്തിൻ്റെ തരം  <br><span class="small"> Type Of Institution </span>
        
                                            </label>
                                            
                                            <select class="form-select " id="institution_type" name="institution_type"
                                            aria-label="Floating label select example">
        
                                            <option value="">Select Type Of Institution</option>
                                            <option value="Government" {{ old('institution_type') == 'Government' ? 'selected' : '' }}>Government</option>
                                            <option value="Aided" {{ old('institution_type') == 'Aided' ? 'selected' : '' }}>Aided</option>
                                            <option value="Self-Financing" {{ old('institution_type') == 'Self-Financing' ? 'selected' : '' }}>Self-Financing</option>
                                            <option value="Private" {{ old('institution_type') == 'Private' ? 'selected' : '' }}>Private</option>
        
                                        </select>
                                            {{-- <input type="text" value="{{ old('institution_type') }}"  class="form-control" placeholder="സ്ഥാപനത്തിൻ്റെ തരം" name="institution_type" />
                                            --}}
                                            @error('institution_type')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div><br>
                                    <div class="row">
                                        <div class="col-md-6 mb-6">
                                            <label class="form-label">പ്രവേശന തീയതി <br><span class="small">  Date of Admission 
                                               </span>
                                            </label>
                                            <input type="date" value="{{ old('admission_date') }}"
                                                class="form-control"
                                                placeholder="പ്രവേശന തീയതി "
                                                name="admission_date" />

                                            @error('admission_date')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mb-6">
                                            <label class="form-label">ക്ലാസ് ആരംഭിക്കുന്ന തീയതി <br><span class="small"> Date of Commence of class </span>
                                            </label>
                                            <input type="date" value="{{ old('class_start_date') }}"
                                                class="form-control"
                                                placeholder="ക്ലാസ് ആരംഭിക്കുന്ന തീയതി"
                                                name="class_start_date" />

                                            @error('class_start_date')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                               




                                    </div><br>
                                    <div class="row">






                                        <div class="row d-flex">
                                            <div class="col-md-6 mb-6">
                                                <label class="form-label">അപേക്ഷകനെ പ്രവേശനം ലഭിച്ചത് <br><span class="small"> Applicants are admitted </span>
    
                                                </label>
                                                <div style="border: 1px solid black" class="form-control">
    
    
                                                    <input type="radio" id="merit" name="admission_type" value="merit" {{ old('admission_type') == 'merit' ? 'checked' : '' }}>
                                                    <label for="merit">merit / മെരിറ്റ് </label> &nbsp; &nbsp;
                                                    <input type="radio" id="reservation" name="admission_type"
                                                        value="reservation" {{ old('admission_type') == 'reservation' ? 'checked' : '' }}>
                                                    <label for="innovation">reservation / സംവരണം </label> &nbsp; &nbsp;
    
                                                    <input type="radio" id="management" name="admission_type"
                                                        value="management" {{ old('admission_type') == 'management' ? 'checked' : '' }}>
                                                    <label for="management">management / മാനേജ്‌മന്റ്</label>&nbsp; &nbsp;
    
                                                    <input type="radio" id="option3" name="admission_type"
                                                        value="others" {{ old('admission_type') == 'others' ? 'checked' : '' }}>
                                                    <label for="others">others / മറ്റുള്ളവ</label>&nbsp; &nbsp;
                                                </div>
                                                @error('admission_type')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
    
                                            </div>
                                            
                                            <div class="col-6 ">
                                                <label class="form-label">  അപേക്ഷകന്റെ ജാതി/ മതം (സർട്ടിഫിക്കറ്റ് ഹാജരാക്കണം ) <br><span class="small"> Caste/Religion of Applicant (Certificate to be
                                                    produced)</span>
                                                </label>
                                                <div class="d-flex">
                                                    <div class="col-6">
                                                        <textarea type="text" value="{{ old('caste') }}" class="form-control" placeholder="അപേക്ഷകന്റെ ജാതി/ മതം"
                                                            name="caste">{{ old('caste') }}</textarea>
                                                        @error('caste')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label">
                                                        </label>
                                                        <input type="file" class="form-control"
                                                            name="caste_certificate" id="caste_certificate"
                                                            value="" placeholder=" സർട്ടിഫിക്കറ്റ്" />
                                                        <span class="small"> (File less than 2 mb. jpg & pdf only. / ഫയൽ:
                                                            2 എംബി കുറഞ്ഞത്, JPG/PDF
                                                            മാത്രം.)</span>
                                                        @error('caste_certificate')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                        <br>
                                                        <span class="text-danger" id="errorcaste"></span>
                                                    </div>
                                                </div>
                                            </div>

                                            {{-- <div class="col-6">
                                                <label class="form-label">Applicant's Income (certificate to be produced) /
                                                    അപേക്ഷകന്റെ വരുമാനം
                                                    (സർട്ടിഫിക്കറ്റ് ഹാജരാക്കണം )

                                                </label>
                                                <div class="d-flex">
                                                    <div class="col-6">

                                                        <input type="number" value="{{ old('income') }}" class="form-control" placeholder="അപേക്ഷകന്റെ വരുമാനം "
                                                            name="income">

                                                        @error('income')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-6">
                                                        <label class="form-label">
                                                        </label>
                                                        <input type="file" class="form-control"
                                                            name="income_certificate" id="income_certificate"
                                                            value="{{ old('income_certificate') }}" placeholder=" സർട്ടിഫിക്കറ്റ്" />
                                                        <span class="small"> (File less than 2 mb. jpg & pdf only. / ഫയൽ:
                                                            2 എംബി കുറഞ്ഞത്, JPG/PDF
                                                            മാത്രം.)</span>
                                                        @error('income_certificate')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                        <br>
                                                        <span class="text-danger" id="errorincome"></span>
                                                    </div>
                                                </div>
                                            </div> --}}

                                        </div><br>

                                        <div class="row d-flex">
                                          <div class="col-md-6 mb-6">
                                    <label class="form-label">
                                      
                                        വിദ്യാർത്ഥികൾക്ക് ഇ-ഗ്രാൻഡ് അകൗണ്ട് നമ്പർ ഉണ്ടോ ? <br><span class="small">  Do students have an e-grand account number?</span></label>
                                        <div style="border: 1px solid black" class="form-control">
                                            <input type="radio" id="yes" name="account_details" value="yes"  {{ old('account_details') == 'yes' ? 'checked' : '' }}>&nbsp; &nbsp;
                                            <label for="yes">Yes ( അതെ)</label> &nbsp; &nbsp;
                                          
                                            <input type="radio" id="no" name="account_details" value="no" {{ old('account_details') == 'no' ? 'checked' : '' }}>
                                           
                                            &nbsp; &nbsp;<label for="No">No (ഇല്ല)</label>
                                          

                                           
                                        </div><br>
                                        <div class="row" style="display:none" id="accountDiv">
                                        <div class="col-md-4 mb-4">
                                             (ബാങ്ക് ശാഖ)  Bank Branch
                                        
                                            <input type="text" value="{{ old('bank_branch') }}"  class="form-control" placeholder="ബാങ്ക് ശാഖ" name="bank_branch" value="{{ old('bank_branch') }}">
                                           
                                        
                                          @error('bank_branch')
                                              <span class="text-danger">{{$message}}</span>
                                          @enderror
                                        </div>
                                        <div class="col-md-4 mb-4">
                                        (ഇ -ഗ്രാൻഡ് അകൗണ്ട് നം  )     E-Grand Account no
                                            
                                            
                                              
                                              <input type="number" value="{{ old('account_no') }}"  class="form-control" placeholder="ഇ -ഗ്രാൻഡ് അകൗണ്ട് നം " name="account_no" >
                                              @error('account_no')
                                              <span class="text-danger">{{$message}}</span>
                                          @enderror
                                            </div>
                                            <div class="col-md-4 mb-4">
                                            (IFSC കോഡ്  )     IFSC Code 
                                                
                                                
                                                  
                                                  <input type="text" value="{{ old('ifsc_code') }}"  class="form-control" placeholder="IFSC കോഡ്" name="ifsc_code" >
                                                  @error('ifsc_code')
                                                  <span class="text-danger">{{$message}}</span>
                                              @enderror
                                                </div>
                                        </div>

                                </div>

                                            <div class="col-md-6 mb-6">
                                                <label class="form-label">  അപേക്ഷകന്റെ ഒപ്പ് <br><span class="small">  Applicant's signature </span></label>
                                                <input type="file" class="form-control" accept="image/*"
                                                    name="signature" id="signature" 
                                                    placeholder="അപേക്ഷകന്റെ ഒപ്പ് " />
                                                <span class="small"> (File less than 2 mb. jpg & pdf only. / ഫയൽ: 2 എംബി
                                                    കുറഞ്ഞത്, JPG/PDF
                                                    മാത്രം.)</span>
                                                @error('signature')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                                <br>
                                                <span class="text-danger" id="errorsignature"></span>
                                            </div>
                                        </div>
                                        <br>
                                        <br>


                                        <div class="row">
                                            <div class="col-md-6 mb-6">
                                                <label class="form-label"> രക്ഷാകർത്താവിന്റെ പേര് <br><span class="small">  Parent's Name </span>

                                                </label>
                                                <input type="text" class="form-control" name="parent_name"
                                                    id="parent_name" value="{{old('parent_name')}}"
                                                    placeholder="രക്ഷാകർത്താവിന്റെ പേര് " />
                                                @error('parent_name')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            {{-- <div class="col-md-6 mb-6">
                                                <label class="form-label">Parent's signature / രക്ഷാകർത്താവിന്റെ ഒപ്പ്
                                                </label>
                                                <input type="file" class="form-control" accept="image/*"
                                                    name="parent_signature" id="parent_signature" value=""
                                                    placeholder="രക്ഷാകർത്താവിന്റെ ഒപ്പ് " />

                                                <span class="small"> (File less than 2 mb. jpg & pdf only. / ഫയൽ: 2 എംബി
                                                    കുറഞ്ഞത്, JPG/PDF
                                                    മാത്രം.)</span>

                                                @error('parent_signature')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                                <br>
                                                <span class="text-danger" id="errorParentSignature"></span>
                                            </div> --}}
                                            <div class="col-md-6 mb-6">
                                                <label class="form-label">ഹാജർ വിശദാംശങ്ങൾ അപ്‌ലോഡ് ചെയ്യുക <br><span class="small"> Attendance Details upload </span>
                                                </label>
                                                <input type="file" class="form-control" accept="image/*,.doc,.pdf"
                                                    name="attendance_doc" id="attendance_doc" value=""
                                                    placeholder="ഹാജർ വിശദാംശങ്ങൾ അപ്‌ലോഡ് ചെയ്യുക" />

                                                <span class="small"> (File less than 2 mb. jpg ,png,doc, pdf only. / ഫയൽ: 2 എംബി
                                                    കുറഞ്ഞത്, JPG/PDF
                                                    മാത്രം.)</span>

                                                @error('attendance_doc')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                                <br>
                                                <span class="text-danger" id="errorAttendanceDoc"></span>
                                            </div>
                                         

                                        </div>
                                    </div>

                                    <br>

                                    <div class="row">
                                        <div class="col-md-6 mb-6">
                                            <label class="form-label">
                                                (അപേക്ഷകന്റെ ഫോട്ടോ )<br><span class="small"> Applicant's Image( Max size: 2 MB)</span></label>
                                            <input type="file" class="form-control" accept="image/*"
                                                name="applicant_image" id="applicant_image" value=""
                                                placeholder="Applicant's Image "  />
                                            @error('applicant_image')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            <br>
                                            <span class="text-danger" id="errorimage"></span>
                                        </div>
                                        <div class="col-md-6 mb-6">
                                            <label class="form-label"> സ്ഥാപനം <br><span class="small">  Institution</span> </label>
                                            <select id="current_institution" name="current_institution"
                                                class="form-control">
                                                <option value="">Select</option>
                                                @foreach ($institutions as $institution)
                                                    <option value="{{ $institution->id }}"   {{ old('current_institution') == $institution->id ? 'selected' : '' }}>{{ $institution->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('current_institution')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            <input type="hidden" name="institution_name" id="institution_name">
                                        </div>
                                    </div><br>

                                    <hr>
                                    <label class="form-label"><b>മാതാപിതാക്കളുടെ അക്കൗണ്ട് വിശദാംശങ്ങൾ <br><span class="small"> Parent account Details </b></span</label>
                                        <br>
                                    <div class="row">
                                        <div class="col-md-4 mb-4">
                                          ബാങ്ക് ശാഖ  <br><span class="small"> Bank Branch</span>
                                        
                                            <input type="text" value="{{ old('parent_bank_branch') }}"  class="form-control" placeholder="ബാങ്ക് ശാഖ" name="parent_bank_branch" value="{{ old('parent_bank_branch') }}">
                                           
                                        
                                          @error('parent_bank_branch')
                                              <span class="text-danger">{{$message}}</span>
                                          @enderror
                                        </div>
                                        <div class="col-md-4 mb-4">
                                         അകൗണ്ട് നമ്പർ   <br><span class="small">     Account Number </span>
                                            
                                            
                                              
                                              <input type="number" value="{{ old('parent_account_no') }}"  class="form-control" placeholder="അകൗണ്ട് നമ്പർ " name="parent_account_no" >
                                              @error('parent_account_no')
                                              <span class="text-danger">{{$message}}</span>
                                          @enderror
                                            </div>
                                            <div class="col-md-4 mb-4">
                                                  IFSC കോഡ് <br><span class="small">  IFSC Code</span>
                                                
                                                
                                                  
                                                  <input type="text" value="{{ old('parent_ifsc_code') }}"  class="form-control" placeholder="IFSC കോഡ്" name="parent_ifsc_code" >
                                                  @error('parent_ifsc_code')
                                                  <span class="text-danger">{{$message}}</span>
                                              @enderror
                                                </div>
                                    </div>
                                    <hr>
                                    
                                    <label class="form-label"><b>പ്രിൻസിപ്പൽ അക്കൗണ്ട് വിശദാംശങ്ങൾ <br><span class="small"> Principal account details </span></b></label>
                                        <br>
                                    <div class="row">
                                        <div class="col-md-4 mb-4">
                                            ബാങ്ക് ശാഖ <br><span class="small">  Bank Branch </span>
                                        
                                            <input type="text" value="{{ old('principal_bank_branch') }}"  class="form-control" placeholder="ബാങ്ക് ശാഖ" name="principal_bank_branch" value="{{ old('principal_bank_branch') }}">
                                           
                                        
                                          @error('parent_bank_branch')
                                              <span class="text-danger">{{$message}}</span>
                                          @enderror
                                        </div>
                                        <div class="col-md-4 mb-4">
                                        അകൗണ്ട് നമ്പർ  <br><span class="small">   Account Number</span>
                                            
                                            
                                              
                                              <input type="number" value="{{ old('principal_account_no') }}"  class="form-control" placeholder="അകൗണ്ട് നമ്പർ " name="principal_account_no" >
                                              @error('principal_account_no')
                                              <span class="text-danger">{{$message}}</span>
                                          @enderror
                                            </div>
                                            <div class="col-md-4 mb-4">
                                               IFSC കോഡ്  <br><span class="small">  IFSC Code  </span>
                                                
                                                
                                                  
                                                  <input type="text" value="{{ old('principal_ifsc_code') }}"  class="form-control" placeholder="IFSC കോഡ്" name="principal_ifsc_code" >
                                                  @error('principal_ifsc_code')
                                                  <span class="text-danger">{{$message}}</span>
                                              @enderror
                                                </div>
                                    </div><br>
                                    <hr>
                                    <div class="row">
                                      <div class="col-md-1 mb-1">
                                           </div>
                                      <div class="col-md-1 mb-1">
                                          <input type="checkbox" id="agree" name="agree" value="Yes" required {{ old('agree') == 'Yes' ? 'checked' : '' }}>
                                      </div>
                                      <div class="col-md-9 mb-9">
                                         
                                        ഞങ്ങൾ മുകളിൽ ചേർത്ത എല്ലാ വിവരങ്ങളും സത്യവും ശരിയുമാണെന്ന് ഇതിനാൽ പ്രതിജ്ഞ ചെയ്തുകൊള്ളുന്നു.<br><br>
                                        We here by pledge that all the information we have added above is true and correct.
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
                                Submitting the application( അപേക്ഷ സമർപ്പിക്കുന്നത് )
               
                            </h1>
                                    </div>
                                </div>
                                <div class="row">   
                                    <div class="col-md-6 mb-6">
                                        <label class="form-label">ജില്ല <br><span class="small"> District</span>  </label>
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
                                        <label class="form-label">ടി .ഇ .ഓ <br><span class="small">TEO</span>  </label>
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
                            <div class="col-md-2 mb-2">
                                
                                    </div>
                                    <div class="col-md-12 mb-12">
                             
                                        <button type="reset" id="submit1" class="btn btn-primary waves-effect waves-light text-center submit">Reset</button>
                                        <button type="submit" id="submit" class="btn btn-danger waves-effect waves-light text-center submit">Save</button>
                                    </div>
                                    
        
                                </div><br>




                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">


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


</script>
    <script>
        $('#current_institution').change(function() {
            var current_institution = this.options[this.selectedIndex].text;
            document.getElementById('institution_name').value = current_institution;
        });

        // $('#current_district').change(function() {
        //     var current_district = this.options[this.selectedIndex].text;
        //     document.getElementById('current_district_name').value = current_district;
        //     var val = document.getElementById("current_district").value;

        //     $.ajax({
        //         url: "{{ url('district/fetch-taluk') }}",
        //         type: "POST",
        //         data: {
        //             district_id: val,
        //             _token: '{{ csrf_token() }}'
        //         },
        //         dataType: 'json',
        //         success: function(result) {
        //             $("#current_taluk").find('option').remove();
        //             $("#current_taluk").append('<option value="" selected>Choose Taluk</option>');
        //             $.each(result.taluks, function(key, value) {
        //                 var $opt = $('<option>');
        //                 $opt.val(value._id).text(value.taluk_name);
        //                 $opt.appendTo('#current_taluk');


        //             });

        //         }
        //     });

        // });



        // NEW CODE 
        $('#current_district').change(function() {
            var districtName = this.options[this.selectedIndex].text;
            document.getElementById('district_name').value = districtName;
            var val = document.getElementById("current_district").value;

            $.ajax({
                url: "{{ url('district/fetch-taluk') }}",
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
        });

        function fetchTaluk() {
            var val = document.getElementById("current_district").value;

        
            $.ajax({
                url: "{{ url('district/fetch-taluk') }}",
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
        $('#current_taluk').change(function() {
            var current_taluk = this.options[this.selectedIndex].text;
            document.getElementById('taluk_name').value = current_taluk;
        });

        //NEW CODE 




        $('#permanent_district').change(function() {
            var permanent_district = this.options[this.selectedIndex].text;
            document.getElementById('permanent_district_name').value = permanent_district;
            var val = document.getElementById("permanent_district").value;

            $.ajax({
                url: "{{ url('district/fetch-taluk') }}",
                type: "POST",
                data: {
                    district_id: val,
                    _token: '{{ csrf_token() }}'
                },
                dataType: 'json',
                success: function(result) {
                    $("#permanent_taluk").find('option').remove();
                    $("#permanent_taluk").append('<option value="" selected>Choose Taluk</option>');
                    $.each(result.taluks, function(key, value) {
                        var $opt = $('<option>');
                        $opt.val(value._id).text(value.taluk_name);
                        $opt.appendTo('#permanent_taluk');


                    });

                }
            });

        });
        $('#permanent_taluk').change(function() {
            var permanent_taluk = this.options[this.selectedIndex].text;
            document.getElementById('permanent_taluk_name').value = permanent_taluk;
        });




        $('#submitted_district').change(function() {
            var submitted_district = this.options[this.selectedIndex].text;
            document.getElementById('dist_name').value = submitted_district;
            var val = document.getElementById("submitted_district").value;

            $.ajax({
                url: "{{ url('district/fetch-teo') }}",
                type: "POST",
                data: {
                    district_id: val,
                    _token: '{{ csrf_token() }}'
                },
                dataType: 'json',
                success: function(result) {
                    $("#submitted_teo").find('option').remove();
                    $("#submitted_teo").append(
                        '<option value="" selected>Choose TEO</option>');
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
        });



        function fetchTeo() {
            var val = document.getElementById("submitted_district").value;

            $.ajax({
                url: "{{ url('district/fetch-teo') }}",
                type: "POST",
                data: {
                    district_id: val,
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



        $('#submitted_teo').change(function() {
            var submitted_teo = this.options[this.selectedIndex].text;
            document.getElementById('teo_name').value = submitted_teo;
        });
        $(document).ready(function() {

            $('#income_certificate').change(function () {
        var file = this.files[0];
        if (file) {
          var fileSize = file.size;

          // Convert fileSize to megabytes
          var fileSizeInMB = fileSize / (1024 * 1024);
          if (fileSizeInMB <= 2) {
            
            $('#submit').prop('disabled', false); 
            $('#errorincome').html('')
          } else {
            $('#errorincome').html('File size exceeds the limit of 2 MB. Please choose a smaller file.')
            // alert('');
            $('#submit').prop('disabled', true); 
            $('#income_certificate').val('');
          }
        }
      });
      
      $('#caste_certificate').change(function () {
        var file = this.files[0];
        if (file) {
          var fileSize = file.size;

          // Convert fileSize to megabytes
          var fileSizeInMB = fileSize / (1024 * 1024);
          if (fileSizeInMB <= 2) {
            
            $('#submit').prop('disabled', false); 
            $('#errorcaste').html('') 
          } else {
            $('#errorcaste').html('File size exceeds the limit of 2 MB. Please choose a smaller file.')
            // alert('');
            $('#submit').prop('disabled', true); 
            $('#caste_certificate').val('');
          }
        }
      });
      $('#applicant_image').change(function() {
                var file = this.files[0];
                if (file) {
                    var fileSize = file.size;

                    // Convert fileSize to megabytes
                    var fileSizeInMB = fileSize / (1024 * 1024);
                    if (fileSizeInMB <= 2) {

                        $('#submit').prop('disabled', false);
                        $('#errorimage').html('')
                    } else {
                        $('#errorimage').html(
                            'File size exceeds the limit of 2 MB. Please choose a smaller file.')
                        // alert('');
                        $('#submit').prop('disabled', true);
                        $('#errorimage').val('');
                    }
                }
            });
      $('#signature').change(function () {
        var file = this.files[0];
        if (file) {
          var fileSize = file.size;

          // Convert fileSize to megabytes
          var fileSizeInMB = fileSize / (1024 * 1024);
          if (fileSizeInMB <= 2) {
            
            $('#submit').prop('disabled', false); 
            $('#errorsignature').html('') 
          } else {
            $('#errorsignature').html('File size exceeds the limit of 2 MB. Please choose a smaller file.')
            // alert('');
            $('#submit').prop('disabled', true); 
            $('#signature').val('');
          }
        }
      });
      
      $('#attendance_doc').change(function () {
        var file = this.files[0];
        if (file) {
          var fileSize = file.size;

          // Convert fileSize to megabytes
          var fileSizeInMB = fileSize / (1024 * 1024);
          if (fileSizeInMB <= 2) {
            
            $('#submit').prop('disabled', false); 
            $('#errorAttendanceDoc').html('') 
          } else {
            $('#errorAttendanceDoc').html('File size exceeds the limit of 2 MB. Please choose a smaller file.')
            // alert('');
            $('#submit').prop('disabled', true); 
            $('#attendance_doc').val('');
          }
        }
      });
            fetchTaluk();
        $('input[name="account_details"]').change(function() {
      
      if ($(this).val() === 'yes') {
          $('#accountDiv').show();
      } else {
          $('#accountDiv').hide();
      }
  }).change();
  $('input[name="account_details"]:checked').change();
// Trigger the change event initially
$('input[name="current_pincode"]').on('input', function() {
            this.value = this.value.replace(/[^0-9]/g, '').substring(0, 6);
        });

     	$('#example').DataTable();
	});
       
    </script>
    <!-- main-content-body -->
@endsection
