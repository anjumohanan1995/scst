@extends('layouts.app')

@section('content')
<!-- main-content -->
<div class="main-content app-content">
	<!-- container -->
	<div class="main-container container-fluid">
		<!-- breadcrumb -->
		<div class="breadcrumb-header justify-content-between row me-0 ms-0" >
			<div class="col-md-12">
				
                <h4 class="content-title mb-2">മിശ്ര വിവാഹം മൂലം ക്ലേശങ്ങൾ അനുഭവിക്കുന്ന പട്ടികവർഗ്ഗ ദമ്പതികൾക്ക് പട്ടികവർഗ്ഗ വികസന വകുപ്പിൽ നിന്നും സാമ്പത്തിക സഹായം അനുവദിക്കുന്നതിനുള്ള അപേക്ഷഫോറം </h4>
               
                <h4 class="content-title mb-2 small">Application form for grant of financial assistance from the Scheduled Tribes Development Department to Scheduled Tribe couples suffering hardships due to Inter caste marriages</h4>
			
			</div>

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
                

                    <form name="userForm" id="userForm" method="post" action="{{ route('financialHelpUpdate', ['id' => $datas->id]) }}" enctype="multipart/form-data">                        @csrf
                        <div class="card">
                            <div class="card-body">
                    

                                
                                <div class="row">
                                    
                                    
                                    <div class="col-md-6 mb-6">
                                        <label class="form-label"> അപേക്ഷകന്റെ പേര് <br><span class="small">Applicant's Name (Husband / ഭർത്താവ്)</span> </label>
                                        <input type="text"   class="form-control" placeholder="അപേക്ഷകന്റെ പേര് (Husband / ഭർത്താവ്)" name="husband_name" id="husband_name" value="{{ @$datas->husband_name }}" />
                                        @error('husband_name')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-6">
                                        <label class="form-label"> അപേക്ഷകന്റെ പേര് <br><span class="small">Applicant's Name(Wife / ഭാര്യ ) </span></label>
                                        <input type="text" class="form-control" placeholder="അപേക്ഷകന്റെ പേര് (Wife / ഭാര്യ )" name="wife_name" id="wife_name" value="{{ @$datas->wife_name }}" />
                                        <span id="nameError" class="text-danger"></span>
                                        @error('wife_name')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>

                                    
                                </div><br>
                        
                                <div class="row">
                                    
                                    
                                    <div class="col-md-6 mb-6">
                                        <label class="form-label">അപേക്ഷകന്റെ പൂർണ്ണമേൽവിലാസം<br><span class="small">Applicant's full Address (Husband / ഭർത്താവ്) </span></label>
                                        <textarea  class="form-control" placeholder="Husband Address" name="husband_address" >{{ @$datas->husband_address }}</textarea>
                                        @error('husband_address')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-6">
                                        <label class="form-label">അപേക്ഷകന്റെ പൂർണ്ണമേൽവിലാസം<br><span class="small">Applicant's full Address (Wife / ഭാര്യ) </span> </label>
                                        <textarea class="form-control" placeholder="Wife Address" name="wife_address" >{{ @$datas->wife_address }}</textarea>
                                        <span id="nameError" class="text-danger"></span>
                                        @error('wife_address')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>

                                    
                                </div><br>
                                
                                <div class="row">
                                    <div class="col-md-6 mb-6">
                                        <label class="form-label">വിവാഹത്തിനുമുമ്പുള്ള പൂർണ്ണ  മേൽവിലാസം <br><span class="small">Full Address Before Marriage/(Husband / ഭർത്താവ് )</span></label>
                                        <textarea  class="form-control" placeholder="Husband Address" name="husband_address_old"  >{{  @$datas->husband_address_old  }}</textarea>
                                        @error('husband_address_old')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-6">
                                        <label class="form-label"> വിവാഹത്തിനുമുമ്പുള്ള പൂർണ്ണ  മേൽവിലാസം <br><span class="small">Full Address Before Marriage (Wife / ഭാര്യ)</span> </label>
                                        <textarea class="form-control" placeholder="Wife Address" name="wife_address_old" >{{ @$datas->wife_address_old }}</textarea>
                                        <span id="nameError" class="text-danger"></span>
                                        @error('wife_address_old')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    
                                </div><br>
                                <div class="row">   
                                    <div class="col-md-2 mb-2">
                                        <label class="form-label">ജില്ല <br><span class="small"> District </span></label>
                                        <select id="hus_district" name="hus_district" class="form-control" >
                                            <option value="">Select</option>
                                                @foreach($districts as $district)
                                                    <option value="{{$district->id}}" @if(@$datas->hus_district == $district->id) selected @endif >{{$district->name}}</option>
                                                @endforeach
                                        </select>
                                        @error('hus_district')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                        <input type="hidden" name="hus_district_name" id="hus_district_name" value="{{ old('hus_district_name') }}">
                                    </div>
                                    <div class="col-md-2 mb-2">
                                        <label class="form-label"> താലൂക്ക് <br><span class="small"> Taluk </span></label>
                                        <select id="hus_taluk" name="hus_taluk" class="form-control">
                                            <option value="">Choose Taluk</option>
                                        </select>                                 
                                        @error('hus_taluk')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                        <input type="hidden" name="hus_taluk_name" id="hus_taluk_name" value="{{ old('hus_taluk_name') }}" >
                                    </div>
                                    <div class="col-md-2 mb-2">
                                        <label class="form-label"> പിൻകോഡ് <br><span class="small">Pincode</span> </label>
                                        <input type="text" value="{{ @$datas->hus_pincode }}"  class="form-control"  name="hus_pincode" />
                                        @error('hus_pincode')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-2 mb-2">
                                        <label class="form-label"> ജില്ല <br><span class="small"> District</span></label>
                                        <select id="wife_district" name="wife_district" class="form-control" >
                                            <option value="">Select</option>
                                                @foreach($districts as $district)
                                                    <option value="{{$district->id}}" @if(@$datas->wife_district == $district->id) selected @endif >{{$district->name}}</option>
                                                @endforeach
                                        </select>
                                        @error('wife_district')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                        <input type="hidden" name="wife_district_name" id="wife_district_name" value="{{ old('wife_district_name') }}">
                                    </div>
                                    <div class="col-md-2 mb-2">
                                        <label class="form-label"> താലൂക്ക് <br><span class="small">Taluk </span></label>
                                        <select id="wife_taluk" name="wife_taluk" class="form-control">
                                            <option value="">Choose Taluk</option>
                                        </select>                                 
                                        @error('wife_taluk')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                        <input type="hidden" name="wife_taluk_name" id="wife_taluk_name"  value="{{ @$datas->wife_taluk_name }}">
                                    </div>
                                    <div class="col-md-2 mb-2">
                                        <label class="form-label">പിൻകോഡ് <br><span class="small"> Pincode </span></label>
                                        <input type="text" value="{{ @$datas->wife_pincode }}"  class="form-control"  name="wife_pincode" />
                                        @error('wife_pincode')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div><br>
                            
                                <div class="row">
                                    <div class="col-md-6 mb-6">
                                        <label class="form-label">സമുദായം <br><span class="small">  Community  (Husband / ഭർത്താവ്) </span> </label>
                                        <input type="text" value="{{ @$datas->husband_caste }}"  class="form-control" placeholder="Husband Caste" name="husband_caste" />
                                        @error('husband_caste')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-6">
                                        <label class="form-label"> സമുദായം <br><span class="small">  Community  (Wife / ഭാര്യ)  </span> </label>
                                        <input type="text" value="{{ @$datas->wife_caste }}" class="form-control" placeholder="Wife Caste" name="wife_caste" />
                                        <span id="nameError" class="text-danger"></span>
                                        @error('wife_caste')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div><br>
                                <div class=" row">
                                    <div class="col-md-6 mb-6">
                                        <label class="form-label">പഞ്ചായത്തിൻ്റെ അല്ലെങ്കിൽ കോ-ഓർപ്പറേഷൻ്റെ പേര് <br><span class="small"> Name of Panchayath or Co-orporation  (Husband / ഭർത്താവ്)  </span> </label>
                                        <input type="text" value="{{ @$datas->husband_panchayath }}" class="form-control" placeholder="Name of Panchayath or Co-orporation" name="husband_panchayath" />
                                       
                                        @error('husband_panchayath')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-6">
                                        <label class="form-label"> പഞ്ചായത്തിൻ്റെ അല്ലെങ്കിൽ കോ-ഓർപ്പറേഷൻ്റെ പേര് <br><span class="small"> Name of Panchayath or Co-orporation  (Wife / ഭാര്യ) </span> </label>
                                        <input type="text" value="{{ @$datas->wife_panchayath }}" class="form-control" placeholder="Name of Panchayath or Co-orporation" name="wife_panchayath" />
                                       
                                        @error('wife_panchayath')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div><br>
                                <div class="row">
                                <div class="col-md-6 mb-6">
                                        <label class="form-label">വിവാഹത്തിനുമുമ്പുള്ള തൊഴിൽ  <br><span class="small">  Employment before marriage (Husband / ഭർത്താവ് ) </span></label>
                                        <input type="text" value="{{ @$datas->hus_work_before_marriage }}"  class="form-control" placeholder="വിവാഹത്തിനുമുമ്പുള്ള തൊഴിൽ" name="hus_work_before_marriage" />
                                        @error('hus_work_before_marriage')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-6">
                                        <label class="form-label">വിവാഹത്തിനുമുമ്പുള്ള തൊഴിൽ <br><span class="small">  Employment before marriage  (Wife / ഭാര്യ) </span> </label>
                                        <input type="text" value="{{ @$datas->wife_work_before_marriage }}" class="form-control" placeholder="വിവാഹത്തിനുമുമ്പുള്ള തൊഴിൽ " name="wife_work_before_marriage" />
                                        <span id="nameError" class="text-danger"></span>
                                        @error('wife_work_before_marriage')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                   
                                </div>
                                <br>
                                <div class="row">

                                    <div class="col-md-6 mb-6">
                                        <label class="form-label">വിവാഹത്തിനുമുമ്പുള്ള  മാസവരുമാനം <br><span class="small"> Monthly income before marriage (Husband / ഭർത്താവ് ) </span></label>
                                        <input type="number" value="{{ @$datas->hus_income_before_marriage }}"  class="form-control" placeholder="വിവാഹത്തിനുമുമ്പുള്ള  മാസവരുമാനം" name="hus_income_before_marriage" />
                                        @error('hus_income_before_marriage')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-6">
                                        <label class="form-label">വിവാഹത്തിനുമുമ്പുള്ള മാസവരുമാനം <br><span class="small"> Monthly income before marriage (Wife / ഭാര്യ)  </span></label>
                                        <input type="number" value="{{ @$datas->wife_income_before_marriage }}" class="form-control" placeholder="വിവാഹത്തിനുമുമ്പുള്ള മാസവരുമാനം " name="wife_income_before_marriage" />
                                        <span id="nameError" class="text-danger"></span>
                                        @error('wife_income_before_marriage')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>

                                    
                                </div><br>

                            
                                <div class="row">
                                <div class="col-md-6 mb-6">
                                        <label class="form-label"> അപേക്ഷ സമർപ്പിക്കുമ്പോഴത്തെ തൊഴിൽ <br><span class="small">  Employment at the time of application (Husband / ഭർത്താവ്)  </span></label>
                                        <input type="text" value="{{ @$datas->hus_work_after_marriage }}"  class="form-control" placeholder="അപേക്ഷ സമർപ്പിക്കുമ്പോഴത്തെ തൊഴിൽ" name="hus_work_after_marriage" />
                                        @error('hus_work_after_marriage')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-6">
                                        <label class="form-label">അപേക്ഷ സമർപ്പിക്കുമ്പോഴത്തെ തൊഴിൽ <br><span class="small">  Employment at the time of application (Wife / ഭാര്യ)  </span> </label>
                                        <input type="text" value="{{ @$datas->wife_work_after_marriage }}" class="form-control" placeholder="അപേക്ഷ സമർപ്പിക്കുമ്പോഴത്തെ തൊഴിൽ " name="wife_work_after_marriage" />
                                        <span id="nameError" class="text-danger"></span>
                                        @error('wife_work_after_marriage')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>


                                </div><br>
                                <div class="row">

                                    
                                    <div class="col-md-6 mb-6">
                                        <label class="form-label"> അപേക്ഷ സമർപ്പിക്കുമ്പോഴത്തെ മാസവരുമാനം <br><span class="small">  Monthly income at the time of application (Husband / ഭർത്താവ്) </span> </label>
                                        <input type="number" value="{{ @$datas->hus_income_after_marriage }}"  class="form-control" placeholder="അപേക്ഷ സമർപ്പിക്കുമ്പോഴത്തെ മാസവരുമാനം " name="hus_income_after_marriage" />
                                        @error('hus_income_after_marriage')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-6">
                                        <label class="form-label">അപേക്ഷ സമർപ്പിക്കുമ്പോഴത്തെ മാസവരുമാനം <br><span class="small">  Monthly income at the time of application (Wife / ഭാര്യ)  </span> </label>
                                        <input type="number" value="{{ @$datas->wife_income_after_marriage }}" class="form-control" placeholder="അപേക്ഷ സമർപ്പിക്കുമ്പോഴത്തെ മാസവരുമാനം " name="wife_income_after_marriage" />
                                        <span id="nameError" class="text-danger"></span>
                                        @error('wife_income_after_marriage')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>

                                    
                                </div><br>

                               <h5 class="heading"> Marriage Details / വിവാഹത്തിന്റെ വിശദ വിവരങ്ങൾ </h5>
                                
                                <div class="row">
                                    <div class="col-md-6 mb-6">
                                            <label class="form-label">വിവാഹ സമയത്തെ പ്രായം <br><span class="small">  Age at Marriage (Husband / ഭർത്താവ് ) </span></label>
                                            <input type="number" value="{{ @$datas->husband_age }}"  class="form-control" placeholder="വിവാഹ സമയത്തെ പ്രായം" name="husband_age" />
                                            @error('husband_age')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                    </div>

                                    <div class="col-md-6 mb-6">
                                        <label class="form-label"> വിവാഹ സമയത്തെ പ്രായം <br><span class="small">  Age at Marriage(Wife / ഭാര്യ ) </span></label>
                                        <input type="number" value="{{ @$datas->wife_age }}" class="form-control" placeholder="വിവാഹ സമയത്തെ പ്രായം" name="wife_age" />
                                        <span id="nameError" class="text-danger"></span>
                                        @error('wife_age')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>

                                </div><br>

                                
                              
                                <div class="row"> <div class="col-md-6"><span class="font-22"> രജിസ്റ്റർ വിവാഹം ആയിരുന്നുവോ?</span> <br><span class="small"> Was it a registered marriage  </span> </div>
                                    <div class="col-md-6">
                                         <label class="form-label w-25 float-left">   
                                            <input class="form-control  w-auto float-left" type="radio" name="register_marriage" value="Yes" {{ @$datas->register_marriage === 'Yes' ? 'checked' : '' }}>
 &nbsp; Yes/അതെ</label>
                                            
 <label class="form-label  w-25 float-left">            <input class="form-control  w-auto float-left" type="radio" name="register_marriage" value="No" {{ @$datas->register_marriage === 'No' ? 'checked' : '' }}> &nbsp; No/അല്ല</label>
                                    </div>
                                </div><br>
                                    

                                <div id="additionalDiv1" style="display:none;">
                                
                                    <div class="row">
                                        <div class="col-md-4">
                                                <label class="form-label">  രെജിസ്റ്ററേഷൻ നമ്പർ <br><span class="small"> Register Number</span></label>
                                                <input type="text" value="{{ @$datas->register_details }}" class="form-control" placeholder="Register Number" name="register_details" />
                                            
                                        </div>
                                        <div class="col-md-4">
                                                <label class="form-label"> തീയതി <br><span class="small">Date </span></label>
                                                <input type="Date" value="{{ @$datas->register_date }}"  class="form-control" placeholder="Date" name="register_date" />
                                            
                                        </div>
                                        <div class="col-md-4">
                                                <label class="form-label">റെജിസ്റ്ററോഫീസിന്റെ പേര് <br><span class="small"> Name of the Registrar's Office</span> </label>
                                                <input type="text" class="form-control" placeholder="Name of the Registrar's Office/റെജിസ്റ്ററോഫീസിന്റെ പേര്" name="register_office_name"  value="{{ @$datas->register_office_name }}"  />
                                            
                                        </div>
                                    
                                    </div><br>
                                
                                


                                </div>

                            

                            
                            
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">വിവാഹത്തിന്റെ സാധ്യത തെളിയിക്കുന്നതിന് രേഖ ഹാജരാക്കിയിട്ടുണ്ടെങ്കിൽ അതിന്റെ വിവരം <br><span class="small"> Information on the document, if any, has been produced to prove the possibility of marriage </span></label>
                                        <textarea class="form-control" placeholder="Details" name="certificate_details" >{{ @$datas->certificate_details }}</textarea>
                                    
                                    </div>
                                    <div class="col-md-6 mb-6">
                                            <label class="form-label">വിവാഹത്തിന്റെ സാധ്യത തെളിയിക്കുന്നതിന് രേഖ <br><span class="small"> Document to prove the possibility of marriage </span> <br><small>(File less than 2 mb. jpg & pdf only. / ഫയൽ: 2 എംബി കുറഞ്ഞത്, JPG/PDF
                                                മാത്രം.) </small></label>
                                            <input type="file" class="form-control" id="marriage_certificate" onchange="validateImagetwo()"  name="marriage_certificate"  value="{{ old('marriage_certificate') }}"  accept="image/*,application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document"/>
                                                @error('marriage_certificate')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror

                                                
                                            <div id="errorMessagetwo" style="color:red;"></div>
                                    </div>

                                </div><br>

                                
                                <div class="row"> <div class="col-md-6">  <span class="font-22"> വിവാഹത്തിനുശേഷം ദമ്പതികൾ ഏതെങ്കിലും കാലയളവിൽ വേർപിരിഞ്ഞ് താമസിച്ചിട്ടുണ്ടോ? 
                                </span> <br>  <span class="small"> Has the couple lived apart for any period after marriage? </span>
                              </div>
                                    <div class="col-md-6 pt-3">
                                            <label class="form-label w-25 float-left"> <input class="form-control  w-auto float-left" type="radio" name="apart_for_any_period" value="Yes" {{ @$datas->apart_for_any_period === 'Yes' ? 'checked' : '' }}>
                                             &nbsp;   Yes/അതെ </label>
                                           


                                            <label class="form-label w-25 float-left"><input class="form-control  w-auto float-left" type="radio" name="apart_for_any_period" value="No" {{ @$datas->apart_for_any_period === 'No' ? 'checked' : '' }}>    &nbsp; No/അല്ല </label>
                                            
                                    </div>
                                </div><br>
                                <div id="additionalDiv" style="display:none;">
                                    
                                    <div class="row">
                                        <div class="col-md-6">
                                                <label class="form-label"> വേർപിരിഞ്ഞ് താമസിച്ച കാലയളവ് <br> <span class="small">Period of separation</span></label>
                                                <input type="text" class="form-control" placeholder="Duration" name="duration"  value="{{ @$datas->duration }}"/>
                                            
                                        </div>
                                    
                                    
                                        <div class="col-md-6">
                                                <label class="form-label">  വേർപിരിഞ്ഞ് താമസിക്കാനുണ്ടായ കാരണം <br> <span class="small"> Reason for separation </span></label>
                                                <input type="text" class="form-control" placeholder="Reason" name="reason"  value="{{ @$datas->reason }}"/>
                                            
                                        </div>
                                    
                                    </div>
                                    <br>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">
                                        ധനസഹായം ലഭിക്കുന്ന പക്ഷം എന്തു കാര്യത്തിനുവേണ്ടി ചെലവഴിക്കാനാണ് ഉദ്ദേശിക്കുന്നത് <br><span class="small"> If the financial assistance is received, for what purpose it is intended to be spent </span></label>
                                        <textarea class="form-control" placeholder="Details" name="financial_assistance" >{{ @$datas->financial_assistance }}</textarea>
                                    
                                    </div>
                                
                                    <div class="col-md-6">
                                    
                                        <label class="form-label">  
                                    മിശ്രവിവാഹം മൂലം ദമ്പതികൾക്ക് അനുഭവിക്കേണ്ടി വന്നിട്ടുള്ള കഷ്ടതകളും പ്രയാസങ്ങളും എന്തെല്ലാം <br> <span class="small">What are the hardships and hardships couples have to face due to intermarriage</span></label>
                                        <textarea class="form-control" placeholder="Details" name="difficulties" >{{ @$datas->difficulties }}</textarea>
                                    
                                    </div>
                                    
                                </div><br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label"> സ്ഥലം <br> <span class="small"> Place </span></label>
                                        <input type="text" class="form-control" placeholder="Place" name="place"  value="{{ @$datas->place }}"/>
                                    </div>
                                </div><br>
                                <div class="row">
                                    <div class="col-md-6 mb-6">
                                        <label class="form-label">ഭർത്താവിന്റെ ഫോട്ടോ <br> <span class="small">Husband's Photo</span> </label>
                                        <label class="form-label"><small>(File less than 2 mb. jpg only. / ഫയൽ: 2 എംബി കുറഞ്ഞത്, JPG
                                                മാത്രം.)</small></label>
                                        <input type="file" class="form-control"  name="husband_photo"  id="husband_photo" onchange="validateHusbandPhoto()"  accept="image/*"  />
                                        @error('husband_sign')
                                                <span class="text-danger">{{$message}}</span>
                                        @enderror
                                        <div id="errorHusbandPhoto" style="color:red;"></div>
                                    </div>

                                    <div class="col-md-6 mb-6">
                                        <label class="form-label"> ഭാര്യയുടെ ഫോട്ടോ <br> <span class="small"> Wife's Photo</span> </label>
                                        <label class="form-label"><small>(File less than 2 mb. jpg  only. / ഫയൽ: 2 എംബി കുറഞ്ഞത്, JPG
                                                മാത്രം.)</small></label>
                                        <input type="file"   accept="image/*" class="form-control"  name="wife_photo"  id="wife_photo"  onchange="validateWifePhoto()"  />
                                        @error('wife_sign')
                                                <span class="text-danger">{{$message}}</span>
                                        @enderror
                                        <div id="errorWifePhoto" style="color:red;"></div>
                                    </div>

                                </div>
                                <br>
                            
                                
                                <div class="row">
                                    <div class="col-md-6 mb-6">
                                        <label class="form-label"> ഭർത്താവിന്റെ ഒപ്പ് <br> <span class="small"> Husband's Sign</span></label>
                                        <label class="form-label"><small>(File less than 2 mb. jpg only. / ഫയൽ: 2 എംബി കുറഞ്ഞത്, JPG
                                                മാത്രം.)</small></label>
                                        <input type="file" class="form-control"  name="husband_sign"  id="husband_sign" onchange="validateImage()"  accept="image/*"  />
                                        @error('husband_sign')
                                                <span class="text-danger">{{$message}}</span>
                                        @enderror
                                        <div id="errorMessage" style="color:red;"></div>
                                    </div>

                                    <div class="col-md-6 mb-6">
                                        <label class="form-label">  ഭാര്യയുടെ ഒപ്പ് <br> <span class="small">Wife's Sign</span></label>
                                        <label class="form-label"><small>(File less than 2 mb. jpg  only. / ഫയൽ: 2 എംബി കുറഞ്ഞത്, JPG
                                                മാത്രം.)</small></label>
                                        <input type="file"   accept="image/*" class="form-control"  name="wife_sign"  id="wife_sign"  onchange="validateImageOne()"  />
                                        @error('wife_sign')
                                                <span class="text-danger">{{$message}}</span>
                                        @enderror
                                        <div id="errorMessageone" style="color:red;"></div>
                                    </div>

                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-12 mb-12">
                                        <input type="checkbox" id="wifeCheckbox" name="agree" value="Yes" required  {{ @$datas->agree == 'Yes' ? 'checked' : '' }}>
                                    
                                        {{-- ശ്രീമാൻ <input type="text" class="form-control"  id="husband_name_new" required   value="{{ old('husband_name_new') }}"/> 
                                        @error('husband_name_new')
                                                    <span class="text-danger">{{$message}}</span>
                                            @enderror
                                            ശ്രീമതി 
                                        <input type="text" class="form-control"  id="wife_name_new" required value="{{ @$datas->wife_name_new }}"/>
                                        @error('wife_name_new')
                                                    <span class="text-danger">{{$message}}</span>
                                            @enderror   എന്നിവരായ --}}ഞങ്ങൾ മുകളിൽ ചേർത്ത എല്ലാ വിവരങ്ങളും സത്യവും ശരിയുമാണെന്ന് ഇതിനാൽ പ്രതിജ്ഞ ചെയ്തുകൊള്ളുന്നു.
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="row">   
                                <h1
                            style="text-align: center;color: rgb(0, 0, 0);font-size: medium; text-decoration: underline; padding: 20px;line-height: 32px;font-weight: 600;">
                            അപേക്ഷ സമർപ്പിക്കുന്നത് 
    
                        </h1>
                                    <div class="col-md-6 mb-6">
                                        <label class="form-label">ജില്ല  <br> <span class="small"> District </span></label>
                                        <select id="submitted_district" name="submitted_district" class="form-control" required>
                                            <option value="">Select</option>
                                                @foreach($districts as $district)
                                                   <option value="{{ $district->id }}" {{ (@$datas->submitted_district == $district->id) ? 'selected' : '' }}>
    {{ $district->name }}
</option>
                                                   
                                                    {{-- <option value="{{$district->id}}"  @if(old('submitted_district') == $district->id) selected @endif>{{$district->name}}</option> --}}
                                                @endforeach
                                        </select>
                                        @error('submitted_district')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                        <input type="hidden" name="dist_name" id="dist_name" value="{{ @$datas->dist_name }}">
                                    </div>
                                    <div class="col-md-6 mb-6">
                                        <label class="form-label">  ടി.ഇ.ഒ  <br> <span class="small"> TEO</span></label>
                                        <select id="submitted_teo" name="submitted_teo" class="form-control" required>
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
<script type="text/javascript">
$('input[name="hus_pincode"]').on('input', function() {
            this.value = this.value.replace(/[^0-9]/g, '').substring(0, 6);
        });
$('input[name="wife_pincode"]').on('input', function() {
            this.value = this.value.replace(/[^0-9]/g, '').substring(0, 6);
        });

function validateImage() {
        var input = document.getElementById('husband_sign');
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
        var input = document.getElementById('wife_sign');
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

     function validateImagetwo() {
        var input = document.getElementById('marriage_certificate');
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
    
    function validateHusbandPhoto() {
            var input = document.getElementById('husband_photo');
            var errorMessage = document.getElementById('errorHusbandPhoto');
    
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
        function validateWifePhoto() {
            var input = document.getElementById('wife_photo');
            var errorMessage = document.getElementById('errorWifePhoto');
    
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




$(document).ready(function() {
        // Attach an input event listener to the first textbox
        $('#husband_name').on('input', function() {
            // Get the value from the first textbox
            var inputValue = $(this).val();
            // Set the value to the second textbox
            $('#husband_name_new').val(inputValue);
        });

         $('#wife_name').on('input', function() {
            // Get the value from the first textbox
            var inputValue = $(this).val();
            // Set the value to the second textbox
            $('#wife_name_new').val(inputValue);
        });
    });


	$(document).ready(function() {

        var period = $('input[name="apart_for_any_period"]').val();
         if (period === 'Yes') {
                $('#additionalDiv').show();
            } else {
                $('#additionalDiv').hide();
            }

     	$('input[name="apart_for_any_period"]').change(function() {
            if ($(this).val() === 'Yes') {
                $('#additionalDiv').show();
            } else {
                $('#additionalDiv').hide();
            }
        });
	});

    $(document).ready(function() {

       var marr =  $('input[name="register_marriage"]').val();       
  if (marr === 'Yes') {
                $('#additionalDiv1').show();
            } else {
                $('#additionalDiv1').hide();
            }

     	$('input[name="register_marriage"]').change(function() {
            if ($(this).val() === 'Yes') {
                $('#additionalDiv1').show();
            } else {
                $('#additionalDiv1').hide();
            }
        });
	});







    $('#hus_district').change(function(){
        var hus_district = this.options[this.selectedIndex].text;
        document.getElementById('hus_district_name').value = hus_district;
        var val = document.getElementById("hus_district").value;
      
        $.ajax({
                    url: "{{url('district/fetch-taluk')}}",
                    type: "POST",
                    data: {
                        district_id: val,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (result) {
                        $("#hus_taluk").find('option').remove();
                          $("#hus_taluk").append('<option value="" selected>Choose Taluk</option>');
                        $.each(result.taluks, function (key, value) {
                            var $opt = $('<option>');
                            $opt.val(value._id).text(value.taluk_name);
                            $opt.appendTo('#hus_taluk');
                          

                        });

                    }
                });

    });
    $('#hus_taluk').change(function(){
        var hus_taluk = this.options[this.selectedIndex].text;
    document.getElementById('hus_taluk_name').value = hus_taluk;
    });
    $('#wife_district').change(function(){
        var wife_district = this.options[this.selectedIndex].text;
    document.getElementById('wife_district_name').value = wife_district;
        var val = document.getElementById("wife_district").value;
      
        $.ajax({
                    url: "{{url('district/fetch-taluk')}}",
                    type: "POST",
                    data: {
                        district_id: val,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (result) {
                        $("#wife_taluk").find('option').remove();
                          $("#wife_taluk").append('<option value="" selected>Choose Taluk</option>');
                        $.each(result.taluks, function (key, value) {
                            var $opt = $('<option>');
                            $opt.val(value._id).text(value.taluk_name);
                            $opt.appendTo('#wife_taluk');
                          

                        });

                    }
                });

    });
    $('#wife_taluk').change(function(){
        var wife_taluk = this.options[this.selectedIndex].text;
    document.getElementById('wife_taluk_name').value = wife_taluk;
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
            fetchHusbandDistrict();
            fetchWifeDistrict();
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
                        if ('{{ @$datas->submitted_teo }}' == value._id) {
                            $opt.attr('selected', 'selected');
                        }

                        $opt.appendTo('#submitted_teo');
                    });
                }
            });
        }



        
        function fetchHusbandDistrict() {
         var val = document.getElementById("hus_district").value;


         $.ajax({
            url: "{{url('district/fetch-taluk')}}",
             type: "POST",
             data: {
                 district_id: val,
                 _token: '{{ csrf_token() }}'
             },
             dataType: 'json',
             success: function(result) {
                 $("#hus_taluk").find('option').remove();
                 $("#hus_taluk").append('<option value="" selected>Choose Taluk</option>');

                 $.each(result.taluks, function(key, value) {
                     var $opt = $('<option>');
                     $opt.val(value._id).text(value.taluk_name);

                     // Set the selected attribute based on the old submitted value
                     if ('{{ @$datas->hus_taluk }}' == value._id) {
                         $opt.attr('selected', 'selected');
                     }

                     $opt.appendTo('#hus_taluk');
                 });
             }
         });
     }


    function fetchWifeDistrict() {
         var val = document.getElementById("wife_district").value;


         $.ajax({
            url: "{{url('district/fetch-taluk')}}",
             type: "POST",
             data: {
                 district_id: val,
                 _token: '{{ csrf_token() }}'
             },
             dataType: 'json',
             success: function(result) {
                 $("#wife_taluk").find('option').remove();
                 $("#wife_taluk").append('<option value="" selected>Choose Taluk</option>');

                 $.each(result.taluks, function(key, value) {
                     var $opt = $('<option>');
                     $opt.val(value._id).text(value.taluk_name);

                     // Set the selected attribute based on the old submitted value
                     if ('{{ @$datas->wife_taluk }}' == value._id) {
                         $opt.attr('selected', 'selected');
                     }

                     $opt.appendTo('#wife_taluk');
                 });
             }
         });
     }

        //$(document).ready(function() {
            // fetchTeo();
           // fetchHusbandDistrict();
        //});


      

       







  </script>
<!-- main-content-body -->
@endsection
