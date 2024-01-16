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
               
                <h4 class="content-title mb-2">Application form for grant of financial assistance from the Scheduled Tribes Development Department to Scheduled Tribe couples suffering hardships due to mixed marriages</h4>
			
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
                

                    <form name="userForm" id="userForm" method="post" action="{{route('financialHelpStore')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="card">
                            <div class="card-body">
                    

                                
                                <div class="row">
                                    
                                    
                                    <div class="col-md-6 mb-6">
                                        <label class="form-label">Applicant's Name/ അപേക്ഷകന്റെ പേര് (Husband / ഭർത്താവ്) </label>
                                        <input type="text" value="{{ old('husband_name') }}"  class="form-control" placeholder="അപേക്ഷകന്റെ പേര് (Husband / ഭർത്താവ്)" name="husband_name" id="husband_name" />
                                        @error('husband_name')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-6">
                                        <label class="form-label">Applicant's Name/ അപേക്ഷകന്റെ പേര് (Wife / ഭാര്യ ) </label>
                                        <input type="text" value="{{ old('wife_name') }}" class="form-control" placeholder="അപേക്ഷകന്റെ പേര് (Wife / ഭാര്യ )" name="wife_name" id="wife_name" />
                                        <span id="nameError" class="text-danger"></span>
                                        @error('wife_name')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>

                                    
                                </div><br>
                        
                                <div class="row">
                                    
                                    
                                    <div class="col-md-6 mb-6">
                                        <label class="form-label">Applicant's full Address/അപേക്ഷകന്റെ പൂർണ്ണമേൽവിലാസം (Husband / ഭർത്താവ്) </label>
                                        <textarea value="{{ old('husband_address') }}"  class="form-control" placeholder="Husband Address" name="husband_address" ></textarea>
                                        @error('husband_address')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-6">
                                        <label class="form-label">Applicant's full Address/അപേക്ഷകന്റെ പൂർണ്ണമേൽവിലാസം (Wife / ഭാര്യ)  </label>
                                        <textarea value="{{ old('wife_address') }}" class="form-control" placeholder="Wife Address" name="wife_address" ></textarea>
                                        <span id="nameError" class="text-danger"></span>
                                        @error('wife_address')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>

                                    
                                </div><br>
                                
                                <div class="row">
                                    <div class="col-md-6 mb-6">
                                        <label class="form-label">Full Address Before Marriage/വിവാഹത്തിനുമുമ്പുള്ള പൂർണ്ണ  മേൽവിലാസം (Husband / ഭർത്താവ് )</label>
                                        <textarea value="{{ old('husband_address_old') }}"  class="form-control" placeholder="Husband Address" name="husband_address_old"  ></textarea>
                                        @error('husband_address_old')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-6">
                                        <label class="form-label">Full Address Before Marriage/വിവാഹത്തിനുമുമ്പുള്ള പൂർണ്ണ  മേൽവിലാസം(Wife / ഭാര്യ) </label>
                                        <textarea value="{{ old('wife_address_old') }}" class="form-control" placeholder="Wife Address" name="wife_address_old" ></textarea>
                                        <span id="nameError" class="text-danger"></span>
                                        @error('wife_address_old')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    
                                </div><br>
                                <div class="row">   
                                    <div class="col-md-2 mb-2">
                                        <label class="form-label">District/ജില്ല  </label>
                                        <select id="hus_district" name="hus_district" class="form-control" >
                                            <option value="">Select</option>
                                                @foreach($districts as $district)
                                                    <option value="{{$district->id}}" @if(old('hus_district') == $district->id) selected @endif >{{$district->name}}</option>
                                                @endforeach
                                        </select>
                                        @error('hus_district')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                        <input type="hidden" name="hus_district_name" id="hus_district_name" value="{{ old('hus_district_name') }}">
                                    </div>
                                    <div class="col-md-2 mb-2">
                                        <label class="form-label">Taluk/താലൂക്ക്  </label>
                                        <select id="hus_taluk" name="hus_taluk" class="form-control">
                                            <option value="">Choose Taluk</option>
                                        </select>                                 
                                        @error('hus_taluk')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                        <input type="hidden" name="hus_taluk_name" id="hus_taluk_name" value="{{ old('hus_taluk_name') }}" >
                                    </div>
                                    <div class="col-md-2 mb-2">
                                        <label class="form-label">Pincode/പിൻകോഡ്  </label>
                                        <input type="text" value="{{ old('hus_pincode') }}"  class="form-control"  name="hus_pincode" />
                                        @error('hus_pincode')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-2 mb-2">
                                        <label class="form-label">District/ജില്ല  </label>
                                        <select id="wife_district" name="wife_district" class="form-control" >
                                            <option value="">Select</option>
                                                @foreach($districts as $district)
                                                    <option value="{{$district->id}}" @if(old('wife_district') == $district->id) selected @endif >{{$district->name}}</option>
                                                @endforeach
                                        </select>
                                        @error('wife_district')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                        <input type="hidden" name="wife_district_name" id="wife_district_name" value="{{ old('wife_district_name') }}">
                                    </div>
                                    <div class="col-md-2 mb-2">
                                        <label class="form-label">Taluk/താലൂക്ക്  </label>
                                        <select id="wife_taluk" name="wife_taluk" class="form-control">
                                            <option value="">Choose Taluk</option>
                                        </select>                                 
                                        @error('wife_taluk')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                        <input type="hidden" name="wife_taluk_name" id="wife_taluk_name"  value="{{ old('wife_taluk_name') }}">
                                    </div>
                                    <div class="col-md-2 mb-2">
                                        <label class="form-label">Pincode/പിൻകോഡ്  </label>
                                        <input type="text" value="{{ old('wife_pincode') }}"  class="form-control"  name="wife_pincode" />
                                        @error('wife_pincode')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div><br>
                            
                                <div class="row">
                                    <div class="col-md-6 mb-6">
                                        <label class="form-label">Community / സമുദായം(Husband / ഭർത്താവ്) </label>
                                        <input type="text" value="{{ old('husband_caste') }}"  class="form-control" placeholder="Husband Caste" name="husband_caste" />
                                        @error('husband_caste')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-6">
                                        <label class="form-label">Community / സമുദായം(Wife / ഭാര്യ)  </label>
                                        <input type="text" value="{{ old('wife_caste') }}" class="form-control" placeholder="Wife Caste" name="wife_caste" />
                                        <span id="nameError" class="text-danger"></span>
                                        @error('wife_caste')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div><br>
                                
                                <div class="row">
                                <div class="col-md-6 mb-6">
                                        <label class="form-label">വിവാഹത്തിനുമുമ്പുള്ള തൊഴിൽ /Employment before marriage (Husband / ഭർത്താവ് )</label>
                                        <input type="text" value="{{ old('hus_work_before_marriage') }}"  class="form-control" placeholder="വിവാഹത്തിനുമുമ്പുള്ള തൊഴിൽ" name="hus_work_before_marriage" />
                                        @error('hus_work_before_marriage')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-6">
                                        <label class="form-label">വിവാഹത്തിനുമുമ്പുള്ള  മാസവരുമാനം/Monthly income before marriage (Husband / ഭർത്താവ് )</label>
                                        <input type="number" value="{{ old('hus_income_before_marriage') }}"  class="form-control" placeholder="വിവാഹത്തിനുമുമ്പുള്ള  മാസവരുമാനം" name="hus_income_before_marriage" />
                                        @error('hus_income_before_marriage')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <br>
                                <div class="row">

                                    <div class="col-md-6 mb-6">
                                        <label class="form-label">Employment before marriage/വിവാഹത്തിനുമുമ്പുള്ള തൊഴിൽ  (Wife / ഭാര്യ) </label>
                                        <input type="text" value="{{ old('wife_work_before_marriage') }}" class="form-control" placeholder="വിവാഹത്തിനുമുമ്പുള്ള തൊഴിൽ " name="wife_work_before_marriage" />
                                        <span id="nameError" class="text-danger"></span>
                                        @error('wife_work_before_marriage')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-6">
                                        <label class="form-label">Monthly income before marriage/വിവാഹത്തിനുമുമ്പുള്ള മാസവരുമാനം(Wife / ഭാര്യ) </label>
                                        <input type="number" value="{{ old('wife_income_before_marriage') }}" class="form-control" placeholder="വിവാഹത്തിനുമുമ്പുള്ള മാസവരുമാനം " name="wife_income_before_marriage" />
                                        <span id="nameError" class="text-danger"></span>
                                        @error('wife_income_before_marriage')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>

                                    
                                </div><br>

                            
                                <div class="row">
                                <div class="col-md-6 mb-6">
                                        <label class="form-label"> Employment at the time of application/അപേക്ഷ സമർപ്പിക്കുമ്പോഴത്തെ തൊഴിൽ (Husband / ഭർത്താവ്) </label>
                                        <input type="text" value="{{ old('hus_work_after_marriage') }}"  class="form-control" placeholder="അപേക്ഷ സമർപ്പിക്കുമ്പോഴത്തെ തൊഴിൽ" name="hus_work_after_marriage" />
                                        @error('hus_work_after_marriage')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-6">
                                        <label class="form-label">Monthly income at the time of application/ അപേക്ഷ സമർപ്പിക്കുമ്പോഴത്തെ മാസവരുമാനം (Husband / ഭർത്താവ്) </label>
                                        <input type="number" value="{{ old('hus_income_after_marriage') }}"  class="form-control" placeholder="അപേക്ഷ സമർപ്പിക്കുമ്പോഴത്തെ മാസവരുമാനം " name="hus_income_after_marriage" />
                                        @error('hus_income_after_marriage')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>


                                </div><br>
                                <div class="row">

                                    <div class="col-md-6 mb-6">
                                        <label class="form-label">Employment at the time of application/അപേക്ഷ സമർപ്പിക്കുമ്പോഴത്തെ തൊഴിൽ (Wife / ഭാര്യ)  </label>
                                        <input type="text" value="{{ old('wife_work_after_marriage') }}" class="form-control" placeholder="അപേക്ഷ സമർപ്പിക്കുമ്പോഴത്തെ തൊഴിൽ " name="wife_work_after_marriage" />
                                        <span id="nameError" class="text-danger"></span>
                                        @error('wife_work_after_marriage')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-6">
                                        <label class="form-label">Monthly income at the time of application/അപേക്ഷ സമർപ്പിക്കുമ്പോഴത്തെ മാസവരുമാനം (Wife / ഭാര്യ)  </label>
                                        <input type="number" value="{{ old('wife_income_after_marriage') }}" class="form-control" placeholder="അപേക്ഷ സമർപ്പിക്കുമ്പോഴത്തെ മാസവരുമാനം " name="wife_income_after_marriage" />
                                        <span id="nameError" class="text-danger"></span>
                                        @error('wife_income_after_marriage')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>

                                    
                                </div><br>

                                Marriage Details / വിവാഹത്തിന്റെ വിശദ വിവരങ്ങൾ <br>
                                
                                <div class="row">
                                    <div class="col-md-6 mb-6">
                                            <label class="form-label">Age at Marriage/വിവാഹ സമയത്തെ പ്രായം (Husband / ഭർത്താവ് )</label>
                                            <input type="number" value="{{ old('husband_age') }}"  class="form-control" placeholder="വിവാഹ സമയത്തെ പ്രായം" name="husband_age" />
                                            @error('husband_age')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                    </div>

                                    <div class="col-md-6 mb-6">
                                        <label class="form-label">Age at Marriage/വിവാഹ സമയത്തെ പ്രായം (Wife / ഭാര്യ ) </label>
                                        <input type="number" value="{{ old('wife_age') }}" class="form-control" placeholder="വിവാഹ സമയത്തെ പ്രായം" name="wife_age" />
                                        <span id="nameError" class="text-danger"></span>
                                        @error('wife_age')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>

                                </div><br>

                                
                                Was it a registered marriage/രജിസ്റ്റർ വിവാഹം ആയിരുന്നുവോ?
                                <div class="row">
                                    <div class="col-md-6">
                                            <label class="form-label">Yes/അതെ</label>
                                            <input class="form-control" type="radio" name="register_marriage" value="Yes" {{ old('register_marriage') === 'Yes' ? 'checked' : '' }}>

                                            <label class="form-label">No/അല്ല</label>
                                            <input class="form-control" type="radio" name="register_marriage" value="No" {{ old('register_marriage') === 'No' ? 'checked' : '' }}>
                                    </div>
                                </div><br>
                                    

                                <div id="additionalDiv1" style="display:none;">
                                
                                    <div class="row">
                                        <div class="col-md-4">
                                                <label class="form-label"> Register Number/രെജിസ്റ്ററേഷൻ നമ്പർ </label>
                                                <input type="text" value="{{ old('register_details') }}" class="form-control" placeholder="Register Number" name="register_details" />
                                            
                                        </div>
                                        <div class="col-md-4">
                                                <label class="form-label">Date/തീയതി  </label>
                                                <input type="Date" value="{{ old('register_date') }}"  class="form-control" placeholder="Date" name="register_date" />
                                            
                                        </div>
                                        <div class="col-md-4">
                                                <label class="form-label">Name of the Registrar's Office/റെജിസ്റ്ററോഫീസിന്റെ പേര്</label>
                                                <input type="text" class="form-control" placeholder="Name of the Registrar's Office/റെജിസ്റ്ററോഫീസിന്റെ പേര്" name="register_office_name"  value="{{ old('register_office_name') }}"  />
                                            
                                        </div>
                                    
                                    </div><br>
                                
                                


                                </div>

                            

                            
                            
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Information on the document, if any, has been produced to prove the possibility of marriage/വിവാഹത്തിന്റെ സാധ്യത തെളിയിക്കുന്നതിന് രേഖ ഹാജരാക്കിയിട്ടുണ്ടെങ്കിൽ അതിന്റെ വിവരം</label>
                                        <textarea class="form-control" placeholder="Details" name="certificate_details" >{{ old('certificate_details') }}</textarea>
                                    
                                    </div>
                                    <div class="col-md-6 mb-6">
                                            <label class="form-label">Document to prove the possibility of marriage/വിവാഹത്തിന്റെ സാധ്യത തെളിയിക്കുന്നതിന് രേഖ</label>
                                            <label class="form-label">(File less than 2 mb. jpg & pdf only. / ഫയൽ: 2 എംബി കുറഞ്ഞത്, JPG/PDF
                                                മാത്രം.)</label>
                                            <input type="file" class="form-control"  name="marriage_certificate"  value="{{ old('marriage_certificate') }}" />
                                                @error('marriage_certificate')
                                                        <span class="text-danger">{{$message}}</span>
                                                @enderror
                                    </div>

                                </div><br>

                                Has the couple lived apart for any period after marriage?/
                                വിവാഹത്തിനുശേഷം ദമ്പതികൾ ഏതെങ്കിലും കാലയളവിൽ വേർപിരിഞ്ഞ് താമസിച്ചിട്ടുണ്ടോ? 
                                <div class="row">
                                    <div class="col-md-6">
                                            <label class="form-label">Yes/അതെ </label>
                                            <input class="form-control" type="radio" name="apart_for_any_period" value="Yes" {{ old('apart_for_any_period') === 'Yes' ? 'checked' : '' }}>


                                            <label class="form-label">No/അല്ല </label>
                                            <input class="form-control" type="radio" name="apart_for_any_period" value="No" {{ old('apart_for_any_period') === 'No' ? 'checked' : '' }}>
                                    </div>
                                </div><br>
                                <div id="additionalDiv" style="display:none;">
                                    
                                    <div class="row">
                                        <div class="col-md-6">
                                                <label class="form-label">Period of separation/വേർപിരിഞ്ഞ് താമസിച്ച കാലയളവ് </label>
                                                <input type="text" class="form-control" placeholder="Duration" name="duration"  value="{{ old('duration') }}"/>
                                            
                                        </div>
                                    
                                    
                                        <div class="col-md-6">
                                                <label class="form-label"> Reason for separation/വേർപിരിഞ്ഞ് താമസിക്കാനുണ്ടായ കാരണം</label>
                                                <input type="text" class="form-control" placeholder="Reason" name="reason"  value="{{ old('reason') }}"/>
                                            
                                        </div>
                                    
                                    </div>
                                    <br>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">If the financial assistance is received, for what purpose it is intended to be spent/
                                        ധനസഹായം ലഭിക്കുന്ന പക്ഷം എന്തു കാര്യത്തിനുവേണ്ടി ചെലവഴിക്കാനാണ് ഉദ്ദേശിക്കുന്നത് </label>
                                        <textarea class="form-control" placeholder="Details" name="financial_assistance" >{{ old('financial_assistance') }}</textarea>
                                    
                                    </div>
                                
                                    <div class="col-md-6">
                                    
                                        <label class="form-label"> What are the hardships and hardships couples have to face due to intermarriage/
                                    മിശ്രവിവാഹം മൂലം ദമ്പതികൾക്ക് അനുഭവിക്കേണ്ടി വന്നിട്ടുള്ള കഷ്ടതകളും പ്രയാസങ്ങളും എന്തെല്ലാം </label>
                                        <textarea class="form-control" placeholder="Details" name="difficulties" >{{ old('difficulties') }}</textarea>
                                    
                                    </div>
                                    
                                </div><br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label"> Place/സ്ഥലം</label>
                                        <input type="text" class="form-control" placeholder="Place" name="place"  value="{{ old('place') }}"/>
                                    </div>
                                </div><br>

                            
                                
                                <div class="row">
                                    <div class="col-md-6 mb-6">
                                        <label class="form-label">Husband's Sign/ഭർത്താവിന്റെ ഒപ്പ് </label>
                                        <label class="form-label">(File less than 2 mb. jpg & pdf only. / ഫയൽ: 2 എംബി കുറഞ്ഞത്, JPG/PDF
                                                മാത്രം.)</label>
                                        <input type="file" class="form-control"  name="husband_sign"  />
                                        @error('husband_sign')
                                                <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-6">
                                        <label class="form-label">Wife's Sign/ ഭാര്യയുടെ ഒപ്പ് </label>
                                        <label class="form-label">(File less than 2 mb. jpg & pdf only. / ഫയൽ: 2 എംബി കുറഞ്ഞത്, JPG/PDF
                                                മാത്രം.)</label>
                                        <input type="file" class="form-control"  name="wife_sign"  />
                                        @error('wife_sign')
                                                <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>

                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-1 mb-1">
                                        <input type="checkbox" id="wifeCheckbox" name="agree" value="Yes" required>
                                    </div>
                                    <div class="col-md-11 mb-11">
                                        {{-- ശ്രീമാൻ <input type="text" class="form-control"  id="husband_name_new" required   value="{{ old('husband_name_new') }}"/> 
                                        @error('husband_name_new')
                                                    <span class="text-danger">{{$message}}</span>
                                            @enderror
                                            ശ്രീമതി 
                                        <input type="text" class="form-control"  id="wife_name_new" required value="{{ old('wife_name_new') }}"/>
                                        @error('wife_name_new')
                                                    <span class="text-danger">{{$message}}</span>
                                            @enderror   എന്നിവരായ --}}
                                        ഞങ്ങൾ മുകളിൽ ചേർത്ത എല്ലാ വിവരങ്ങളും സത്യവും ശരിയുമാണെന്ന് ഇതിനാൽ പ്രതിജ്ഞ ചെയ്തുകൊള്ളുന്നു.
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="row">   
                                    <div class="col-md-6 mb-6">
                                        <label class="form-label">District/ജില്ല  </label>
                                        <select id="submitted_district" name="submitted_district" class="form-control" required>
                                            <option value="">Select</option>
                                                @foreach($districts as $district)
                                                   <option value="{{ $district->id }}" {{ (old('submitted_district') == $district->id) ? 'selected' : '' }}>
    {{ $district->name }}
</option>
                                                   
                                                    {{-- <option value="{{$district->id}}"  @if(old('submitted_district') == $district->id) selected @endif>{{$district->name}}</option> --}}
                                                @endforeach
                                        </select>
                                        @error('submitted_district')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                        <input type="hidden" name="dist_name" id="dist_name" value="{{ old('dist_name') }}">
                                    </div>
                                    <div class="col-md-6 mb-6">
                                        <label class="form-label">TEO /ടി.ഇ.ഒ </label>
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
<script type="text/javascript">





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
     	$('input[name="apart_for_any_period"]').change(function() {
            if ($(this).val() === 'Yes') {
                $('#additionalDiv').show();
            } else {
                $('#additionalDiv').hide();
            }
        });
	});

    $(document).ready(function() {
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
                        if ('{{ old('submitted_teo') }}' == value._id) {
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
                     if ('{{ old('hus_taluk') }}' == value._id) {
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
                     if ('{{ old('wife_taluk') }}' == value._id) {
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
