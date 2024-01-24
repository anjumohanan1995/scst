@extends('layouts.app')

@section('content')
<!-- main-content -->
<div class="main-content app-content">
	<!-- container -->
	<div class="main-container container-fluid">
		<!-- breadcrumb -->
		<div class="breadcrumb-header justify-content-between row me-0 ms-0" >
			
				<h4 class="content-title mb-2">പട്ടികവർഗ്ഗത്തിൽപ്പെട്ട  പാവപ്പെട്ട പെണ്കുട്ടികൾക്ക്  വിവാഹധനസഹായം  നൽകുന്നതിനുള്ള അപേക്ഷഫോറം <br>
                    Application form for marriage grant to poor girls belonging to Scheduled Tribes </h4>
				

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
           
                    <form name="patientForm" id="patientForm" method="post" action="{{route('marriageGrantFormStore')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="card">
                            <div class="card-body">
                        <div class="form-group">
                            <div class="row">   
                                <div class="col-md-6 mb-6">
                                    <label class="form-label">അപേക്ഷകന്റെ പൂർണ്ണമായ പേര് / Applicant's full name </label>
                                    <input type="text" value="{{ old('name') }}"  class="form-control" placeholder="" name="name" required />
                                    @error('name')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-6">
                                    <label class="form-label">വയസ് / Age  </label>
                                    <input type="number" value="{{ old('age') }}" class="form-control" placeholder="" name="age" />
                                    
                                    @error('age')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div><br>
                            <div class="row">   
                                <div class="col-md-6 mb-6">
                                    <label class="form-label">ഇപ്പോഴത്തെ മേൽവിലാസം / Current address  </label>
                                    <textarea type="text" id="current_address" value="{{ old('current_address') }}"  class="form-control" placeholder="" name="current_address" ></textarea>
                                    @error('current_address')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                             
                                <div class="col-md-6 mb-6"> 
                                    <label class="form-label">സ്ഥിരമായ മേൽവിലാസം / Permanent address &nbsp;&nbsp;  <input type="checkbox" id="copyAddress" onclick="copyCurrentAddress()" style="align:left;"> (നിലവിലെ ഇപ്പോഴത്തെ മേൽവിലാസം) </label>
                                   
                                    <textarea type="text" id="permanent_address" value="{{ old('permanent_address') }}" class="form-control" placeholder="" name="permanent_address" ></textarea>
                                    
                                    @error('permanent_address')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                               <div class="row">   
                                    <div class="col-md-2 mb-2">
                                        <label class="form-label">ജില്ല / District  </label>
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
                                        <label class="form-label">താലൂക്ക് / Taluk  </label>
                                        <select id="current_taluk" name="current_taluk" class="form-control">
                                            <option value="">Choose Taluk</option>
                                        </select>                                 
                                        @error('current_taluk')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                        <input type="hidden" name="current_taluk_name" id="current_taluk_name" value="">
                                    </div>
                                    <div class="col-md-2 mb-2">
                                        <label class="form-label">പിൻകോഡ് / Pincode  </label>
                                        <input type="text" value="{{ old('current_pincode') }}"  class="form-control"  name="current_pincode" />
                                        @error('current_pincode')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-2 mb-2">
                                        <label class="form-label">ജില്ല /District  </label>
                                        <select id="permanent_district" name="permanent_district" class="form-control" >
                                            <option value="">Select</option>
                                                @foreach($districts as $district)
                                                    <option value="{{$district->id}}"  >{{$district->name}}</option>
                                                @endforeach
                                        </select>
                                         @error('permanent_district')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                        <input type="hidden" name="permanent_district_name" id="permanent_district_name" value="">
                                    </div>
                                    <div class="col-md-2 mb-2">
                                        <label class="form-label">താലൂക്ക് /Taluk  </label>
                                        <select id="permanent_taluk" name="permanent_taluk" class="form-control">
                                            <option value="">Choose Taluk</option>
                                        </select>                                 
                                        @error('permanent_taluk')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                        <input type="hidden" name="permanent_taluk_name" id="permanent_taluk_name" value="">
                                    </div>
                                    <div class="col-md-2 mb-2">
                                        <label class="form-label">പിൻകോഡ് / Pincode </label>
                                        <input type="text" value="{{ old('permanent_pincode') }}"  class="form-control"  name="permanent_pincode" />
                                        @error('permanent_pincode')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div><br>
                            <div class="row">   
                                <div class="col-md-6 mb-6">
                                    <label class="form-label">കുടുംബങ്ങളെ സംബന്ധിച്ച വിശദവിവരങ്ങൾ (മരിച്ചുപോയവരുടേതുൾപ്പെടെ ) /Details of families (including deceased)  </label>
                                    <input type="text" value="{{ old('family_details') }}"  class="form-control" placeholder="" name="family_details" />
                                    @error('family_details')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-6">
                                    <label class="form-label">അപേക്ഷകന്റെ ജാതി  (തഹസിൽദാരിൽനിന്നും ജാതി തെളിയിക്കുന്ന സാക്ഷ്യപത്രം (അസൽ )ഹാജരാക്കണം ) /Caste of the applicant (Proof caste certificate (asal) from Tehsildar should be produced)   </label>
                                    <div class="row">
                                    <div class="col-md-6 mb-6">
                                    <input type="text" value="{{ old('caste') }}" class="form-control" placeholder="" name="caste" />
                                    @error('caste')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                    <div class="col-md-6 mb-6">
                                        <input type="file" onchange="validateCaste()" value="{{ old('caste_certificate') }}" class="form-control" placeholder="" name="caste_certificate" id="caste_certificate" />
                                        <p style="font-size: 11px;">Max. filesize: 2 MB • Format: JPG, PNG, PDF </p>
                                        @error('caste_certificate')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                    <div id="errorCaste" style="color:red;"></div>
                                    </div>  
                                    </div>                                 
                                    
                                </div>
                            </div><br>   
                            <div class="row">   
                                <div class="col-md-6 mb-6">
                                    <label class="form-label">വിവാഹം ഉറപ്പിച്ചിരിക്കുന്ന പെൺകുട്ടിയുടെ പേര് / Name of girl whose marriage is fixed </label>
                                    <input type="text" value="{{ old('fiancee_name') }}"  class="form-control" placeholder="" name="fiancee_name" />
                                    @error('fiancee_name')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-6">
                                    <label class="form-label">വിവാഹം ഉറപ്പിച്ചിരിക്കുന്ന പെൺകുട്ടിയുടെ മേൽവിലാസം / Address of girl whose marriage is fixed  </label>
                                    <textarea type="text" value="{{ old('fiancee_address') }}"  class="form-control" placeholder="" name="fiancee_address" ></textarea>
                                    @error('fiancee_address')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">   
                                <div class="col-md-6 mb-6">
                                    <label class="form-label">ആരുടെ വിവാഹമാണോ ഉറപ്പിച്ചിരിക്കുന്നത് ആ പെൺകുട്ടിക്ക് അപേക്ഷകനുമായുള്ള ബന്ധം /The relationship of the girl with the applicant whose marriage is fixed   </label>
                                    <input type="text" value="{{ old('relation_with_applicant') }}" class="form-control" placeholder="" name="relation_with_applicant" />
                                    
                                    @error('relation_with_applicant')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="col-md-2 mb-2">
                                    <label class="form-label">ജില്ല / District  </label>
                                    <select id="fiancee_district" name="fiancee_district" class="form-control" >
                                        <option value="">Select</option>
                                            @foreach($districts as $district)
                                                <option value="{{$district->id}}"  >{{$district->name}}</option>
                                            @endforeach
                                    </select>
                                     @error('fiancee_district')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                    <input type="hidden" name="fiancee_district_name" id="fiancee_district_name" value="">
                                </div>
                                <div class="col-md-2 mb-2">
                                    <label class="form-label">താലൂക്ക് / Taluk </label>
                                    <select id="fiancee_taluk" name="fiancee_taluk" class="form-control">
                                        <option value="">Choose Taluk</option>
                                    </select>                                 
                                    @error('fiancee_taluk')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                    <input type="hidden" name="fiancee_taluk_name" id="fiancee_taluk_name" value="">
                                </div>
                                <div class="col-md-2 mb-2">
                                    <label class="form-label">പിൻകോഡ് / Pincode </label>
                                    <input type="text" value="{{ old('fiancee_pincode') }}"  class="form-control"  name="fiancee_pincode" />
                                    @error('fiancee_pincode')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div><br> 
                            <div class="row">   
                                <div class="col-md-6 mb-6">
                                    <label class="form-label">പെൺകുട്ടിയുടെ ആദ്യവിവാഹമോ പുനർവിവാഹമോ? /Girl's first marriage or remarriage?  </label>
                                    <div>
                                        <input type="radio" id="firstMarriage" name="marriage_type" value="first">
                                        <label for="firstMarriage">ആദ്യവിവാഹം (First marriage)</label>
                                    </div>
                                    <div>
                                        <input type="radio" id="remarriage" name="marriage_type" value="remarriage">
                                        <label for="remarriage">പുനർവിവാഹം (Remarriage)</label>
                                    </div>
                                    {{--  <textarea type="text" value="{{ old('marriage_count') }}"  class="form-control" placeholder="" name="marriage_count" ></textarea>  --}}
                                    @error('marriage_type')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-6">
                                    <label class="form-label">ഗുണഭോക്താവ് വിധവയാണോ? /Is the beneficiary a widow?  </label>
                                    <div>
                                        <input type="radio" id="yes" name="is_widow" value="Yes">
                                        <label for="yes">അതെ/Yes</label>
                                    </div>
                                    <div>
                                        <input type="radio" id="no" name="is_widow" value="No">
                                        <label for="no">അല്ല/No</label>
                                    </div>
                                    @error('is_widow')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div><br> 
                            <div class="row">   
                                <div class="col-md-6 mb-6">
                                    <label class="form-label">അച്ഛൻ/അമ്മ/ രക്ഷാകർത്താവിന്റെ തൊഴിൽ /Occupation of Father/Mother/Guardian  </label>
                                    <textarea type="text" value="{{ old('parent_occupation') }}"  class="form-control" placeholder="" name="parent_occupation" ></textarea>
                                    @error('parent_occupation')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-6">
                                    <label class="form-label">കുടുംബത്തിൽ എല്ലാ മാർഗത്തിൽ നിന്നുമുള്ള ആകെ വാർഷിക വരുമാനം (വില്ലേജ് ആഫീസറിൽ നിന്നും ലഭിച്ച സർട്ടിഫിക്കറ്റ് (അസൽ) ഹാജരാക്കണം ) /Total annual income of the family from all sources (Certificate (Original) obtained from Village Officer should be produced)   </label>
                                    <div class="row">
                                    <div class="col-md-6 mb-6">
                                    <input type="text" value="{{ old('annual_income') }}" class="form-control" placeholder="" name="annual_income" />
                                    @error('annual_income')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                    <div class="col-md-6 mb-6">
                                        <input type="file" onchange="validateIncome()" value="{{ old('income_certificate') }}" class="form-control" placeholder="" name="income_certificate" id="income_certificate" />
                                        <p style="font-size: 11px;">Max. filesize: 2 MB • Format: JPG, PNG, PDF </p>
                                        @error('income_certificate')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                    <div id="errorIncome" style="color:red;"></div>
                                    </div>  
                                    </div>  
                                </div>
                            </div><br> 
                            <div class="row">   
                                <div class="col-md-6 mb-6">
                                    <label class="form-label">നിശ്ചയിച്ചിരിക്കുന്ന വിവഹ സ്ഥലവും തീയതിയും / Place and date of marriage fixed  </label>
                                    <div class="row">
                                        <div class="col-md-6 mb-6">
                                        <input type="text" value="{{ old('marriage_place') }}" class="form-control" placeholder="സ്ഥലം" name="marriage_place" />
                                        @error('marriage_place')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                        <div class="col-md-6 mb-6">
                                            <input type="date" value="{{ old('marriage_date') }}" class="form-control" placeholder="" name="marriage_date" />
                                            @error('marriage_date')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                        </div>  
                                        </div>  
                                </div>

                                <div class="col-md-6 mb-6">
                                    <label class="form-label">വിവാഹിതയാകാൻ പോകുന്ന പെൺകുട്ടിയുടെ മാതാവ് / പിതാവ് മരിച്ചുപോയിട്ടുടെങ്കിൽ ആയത് സംബന്ധിച്ച വിവരങ്ങൾ:/ Information regarding the deceased mother/father of the girl to be married: </label>
                                    <textarea type="text" value="{{ old('fiancee_family_details') }}" class="form-control" placeholder="" name="fiancee_family_details" ></textarea>
                                    
                                    @error('fiancee_family_details')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div><br> 
                            <div class="row">   
                                <div class="col-md-6 mb-6">
                                    <label class="form-label">മാതാപിതാക്കളിലാർക്കെങ്കിലും തൊഴിലിൽ ഏർപ്പെടാൻ  കഴിയാത്തവിധം അംഗവൈകല്യം സംഭവിച്ചിട്ടുണ്ടെങ്കിൽ ആയത് സംബന്ധിച്ച വിവരങ്ങൾ / Information about if either of the parents is disabled so that they are unable to engage in employment  </label>
                                    <textarea type="text" value="{{ old('disabled_parent_info') }}"  class="form-control" placeholder="" name="disabled_parent_info" ></textarea>
                                    @error('disabled_parent_info')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-6">
                                    <label class="form-label">വിവാഹം കഴിക്കുന്ന പെണ്കുട്ടിയോ മാതാപിതാക്കളോ അടിമപ്പണിയിൽ നിന്നും വിമുക്തരാക്കപ്പെട്ടവരാണെങ്കിൽ ആയതിന്റെ വിശദവിവരം / Details of whether the girl to be married or her parents are freedmen </label>
                                    <textarea type="text" value="{{ old('freedmen_parent_details') }}" class="form-control" placeholder="" name="freedmen_parent_details" ></textarea>
                                    @error('freedmen_parent_details')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div><br>  
                            <div class="row">   
                                <div class="col-md-6 mb-6">
                                    <label class="form-label">വിവാഹിതയാകുന്ന പെൺക്കുട്ടിയോ മാതാപിതാക്കളോ പട്ടികവർഗക്കാരല്ലാത്തവരുടെ അതിക്രമങ്ങൾക്കിരയായിട്ടുള്ളവരാണെങ്കിൽ ആയതിന്റെ വിവരങ്ങൾ / Information about whether the girl child getting married or her parents have been victims of violence by non-Scheduled Tribes</label>
                                    <textarea type="text" value="{{ old('violence_by_non_scheduled_tribes_info') }}" class="form-control" placeholder="" name="violence_by_non_scheduled_tribes_info" ></textarea>
                                    @error('violence_by_non_scheduled_tribes_info')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-6">
                                    <label class="form-label">വിവാഹിതയാകുന്ന പെൺകുട്ടിയുടെയോ ഭൂമി അന്യാധീനപ്പെട്ട് നിർദ്ധനരായിട്ടുള്ളപക്ഷം ആയതിന്റെ വിവരങ്ങൾ / Details of the girl getting married or if the land has been alienated and destitute  </label>
                                    <textarea type="text" value="{{ old('land_alienated_details') }}"  class="form-control" placeholder="" name="land_alienated_details" ></textarea>
                                    @error('land_alienated_details')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>                                
                            </div><br>   
                            <div class="row">   
                                <div class="col-md-6 mb-6">
                                    <label class="form-label">വിവാഹിതയാകുന്ന പെൺകുട്ടിയുടെ മാതാവോ  / പിതാവോ സമുദായഭ്രഷ്ടരാണെങ്കിൽ ആയതിന്റെ പൂർണവിവരം / Full details of the mother/father of the girl to be married if they are outcasts</label>
                                    <textarea type="text" value="{{ old('outcast_parent_details') }}" class="form-control" placeholder="" name="outcast_parent_details" ></textarea>
                                    @error('outcast_parent_details')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-6">
                                    <label class="form-label">വിവാഹിതയാകുന്ന പെൺകുട്ടിയുടെ മാതാവോ  / പിതാവോ പുനർവിവാഹം ചെയ്ത് ജീവിക്കുന്നുവെങ്കിൽ ആയതിന്റെ വിവരങ്ങൾ / Details of mother/father of the girl to be married if remarried and living  </label>
                                    <textarea type="text" value="{{ old('remarried_parent_details') }}"  class="form-control" placeholder="" name="remarried_parent_details" ></textarea>
                                    @error('remarried_parent_details')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>                                
                            </div><br> <hr>
                            <div class="row">   
                                <div class="col-md-3 mb-3">
                                    <label class="form-label">വരന്റെ പേര് / Groom's Name</label>
                                    <input type="text" value="{{ old('groom_name') }}" class="form-control" placeholder="" name="groom_name" />
                                    @error('groom_name')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label class="form-label">വരന്റെ മേൽവിലാസം / Groom's Address</label>
                                    <textarea type="text" value="{{ old('groom_address') }}" class="form-control" placeholder="" name="groom_address" ></textarea>
                                    @error('groom_address')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="col-md-2 mb-2">
                                    <label class="form-label">ജില്ല / District </label>
                                    <select id="groom_district" name="groom_district" class="form-control" >
                                        <option value="">Select</option>
                                            @foreach($districts as $district)
                                                <option value="{{$district->id}}"  >{{$district->name}}</option>
                                            @endforeach
                                    </select>
                                     @error('groom_district')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                    <input type="hidden" name="groom_district_name" id="groom_district_name" value="">
                                </div>
                                <div class="col-md-2 mb-2">
                                    <label class="form-label">താലൂക്ക്  Taluk </label>
                                    <select id="groom_taluk" name="groom_taluk" class="form-control">
                                        <option value="">Choose Taluk</option>
                                    </select>                                 
                                    @error('groom_taluk')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                    <input type="hidden" name="groom_taluk_name" id="groom_taluk_name" value="">
                                </div>
                                <div class="col-md-2 mb-2">
                                    <label class="form-label">പിൻകോഡ് / Pincode  </label>
                                    <input type="text" value="{{ old('groom_pincode') }}"  class="form-control"  name="groom_pincode" />
                                    @error('groom_pincode')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                                             
                            </div><br><hr>
                            <div class="row">   
                                <div class="col-md-3 mb-3">
                                    <label class="form-label">വരന്റെ അച്ഛന്റെ / അമ്മയുടെ /രക്ഷാകർത്താവിന്റെ പേര് / Groom's Father's/Mother's/Guardian's Name </label>
                                    <input type="text" value="{{ old('groom_parent_name') }}" class="form-control" placeholder="" name="groom_parent_name" />
                                    @error('groom_parent_name')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label class="form-label">വരന്റെ അച്ഛന്റെ / അമ്മയുടെ /രക്ഷാകർത്താവിന്റെ മേൽവിലാസം / Address of Groom's Father/Mother/Guardian</label>
                                    <textarea type="text" value="{{ old('groom_parent_address') }}" class="form-control" placeholder="" name="groom_parent_address" ></textarea>
                                    @error('groom_parent_address')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="col-md-2 mb-2">
                                    <label class="form-label">ജില്ല / District </label>
                                    <select id="groom_parent_district" name="groom_parent_district" class="form-control" >
                                        <option value="">Select</option>
                                            @foreach($districts as $district)
                                                <option value="{{$district->id}}"  >{{$district->name}}</option>
                                            @endforeach
                                    </select>
                                     @error('current_district')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                    <input type="hidden" name="groom_parent_district_name" id="groom_parent_district_name" value="">
                                </div>
                                <div class="col-md-2 mb-2">
                                    <label class="form-label">താലൂക്ക് / Taluk </label>
                                    <select id="groom_parent_taluk" name="groom_parent_taluk" class="form-control">
                                        <option value="">Choose Taluk</option>
                                    </select>                                 
                                    @error('groom_parent_taluk')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                    <input type="hidden" name="groom_parent_taluk_name" id="groom_parent_taluk_name" value="">
                                </div>
                                <div class="col-md-2 mb-2">
                                    <label class="form-label">പിൻകോഡ് / Pincode  </label>
                                    <input type="text" value="{{ old('groom_parent_pincode') }}"  class="form-control"  name="groom_parent_pincode" />
                                    @error('groom_parent_pincode')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                                            
                            </div><br><hr>
                            <div class="row">   
                              
                                    <label class="form-label">ഈ ആവശ്യത്തിന് സർക്കാരിൽനിന്നോ സംഘടനകളിൽനിന്നോ ഏജൻസികളിൽനിന്നോ ധനസഹായം ലഭിച്ചിട്ടുണ്ടെങ്കിൽ ആയതിന്റെ പൂർണവിവരം / Full details of any financial assistance, if any, received from the Government, organizations or agencies for this purpose</label>
                                    <textarea type="text" value="{{ old('financial_assistance_details') }}" class="form-control" placeholder="" name="financial_assistance_details" ></textarea>
                                    @error('financial_assistance_details')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                               
                                                            
                            </div><br>  
                            <div class="row">   
                                <div class="col-md-6 mb-6">
                                    <label class="form-label">സ്ഥലം / Place</label>
                                    <input type="text" value="{{ old('place') }}" class="form-control" placeholder="സ്ഥലം" name="place" />
                                    @error('place')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-6">
                                    <label class="form-label">അപേക്ഷകന്റെ ഒപ്പ്/വിരലടയാളം / Applicant's Signature/Fingerprint </label>
                                    <input type="file" onchange="validateSignature()" value="{{ old('signature') }}"  class="form-control" placeholder="അപേക്ഷകന്റെ ഒപ്പ്/വിരലടയാളം" name="signature" id="signature" />
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
                                <label class="form-label">ജില്ല / District </label>
                                <select id="submitted_district" name="submitted_district" class="form-control" required />
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
                                <label class="form-label">ടി.ഇ.ഒ / TEO  </label>
                                <select id="submitted_teo" name="submitted_teo" class="form-control" required />
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

    function validateCaste() {
        var input = document.getElementById('caste_certificate');
        var errorMessage = document.getElementById('errorCaste');

        if (input.files.length > 0) {
            var fileSize = input.files[0].size; // in bytes
            var maxSize = 2 * 1024 * 1024; // 2MB

            if (fileSize > maxSize) {
                errorMessage.innerText = 'Error: File size exceeds 2MB limit';
                input.value = ''; // Clear the file input
                $("#submit").prop("disabled", true);
            } else {
                errorMessage.innerText = '';
                 $("#submit").prop("disabled", false);
            }
        }

        
    }

    function validateIncome() {
        var input = document.getElementById('income_certificate');
        var errorMessage = document.getElementById('errorIncome');

        if (input.files.length > 0) {
            var fileSize = input.files[0].size; // in bytes
            var maxSize = 2 * 1024 * 1024; // 2MB

            if (fileSize > maxSize) {
                errorMessage.innerText = 'Error: File size exceeds 2MB limit';
                input.value = ''; // Clear the file input
                $("#submit").prop("disabled", true);
            } else {
                errorMessage.innerText = '';
                 $("#submit").prop("disabled", false);
            }
        }

        
    }


    function copyCurrentAddress() {
        if ($('#copyAddress').prop('checked')) {
            // Copy the value of current_address to permanent_address
            $('#permanent_address').val($('#current_address').val());
        } else {
            // Clear the value of permanent_address if the checkbox is unchecked
            $('#permanent_address').val('');
        }
    }
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

    $('#fiancee_district').change(function(){
        var fiancee_district = this.options[this.selectedIndex].text;
    document.getElementById('fiancee_district_name').value = fiancee_district;
        var val = document.getElementById("fiancee_district").value;
      
        $.ajax({
                    url: "{{url('district/fetch-taluk')}}",
                    type: "POST",
                    data: {
                        district_id: val,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (result) {
                        $("#fiancee_taluk").find('option').remove();
                          $("#fiancee_taluk").append('<option value="" selected>Choose Taluk</option>');
                        $.each(result.taluks, function (key, value) {
                            var $opt = $('<option>');
                            $opt.val(value._id).text(value.taluk_name);
                            $opt.appendTo('#fiancee_taluk');
                          

                        });

                    }
                });

    });
    $('#fiancee_taluk').change(function(){
        var fiancee_taluk = this.options[this.selectedIndex].text;
    document.getElementById('fiancee_taluk_name').value = fiancee_taluk;
    });

    $('#groom_district').change(function(){
        var groom_district = this.options[this.selectedIndex].text;
    document.getElementById('groom_district_name').value = groom_district;
        var val = document.getElementById("groom_district").value;
      
        $.ajax({
                    url: "{{url('district/fetch-taluk')}}",
                    type: "POST",
                    data: {
                        district_id: val,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (result) {
                        $("#groom_taluk").find('option').remove();
                          $("#groom_taluk").append('<option value="" selected>Choose Taluk</option>');
                        $.each(result.taluks, function (key, value) {
                            var $opt = $('<option>');
                            $opt.val(value._id).text(value.taluk_name);
                            $opt.appendTo('#groom_taluk');
                          

                        });

                    }
                });

    });
    $('#groom_taluk').change(function(){
        var groom_taluk = this.options[this.selectedIndex].text;
    document.getElementById('groom_taluk_name').value = groom_taluk;
    });

    $('#groom_parent_district').change(function(){
        var groom_parent_district = this.options[this.selectedIndex].text;
    document.getElementById('groom_parent_district_name').value = groom_parent_district;
        var val = document.getElementById("groom_parent_district").value;
      
        $.ajax({
                    url: "{{url('district/fetch-taluk')}}",
                    type: "POST",
                    data: {
                        district_id: val,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (result) {
                        $("#groom_parent_taluk").find('option').remove();
                          $("#groom_parent_taluk").append('<option value="" selected>Choose Taluk</option>');
                        $.each(result.taluks, function (key, value) {
                            var $opt = $('<option>');
                            $opt.val(value._id).text(value.taluk_name);
                            $opt.appendTo('#groom_parent_taluk');
                          

                        });

                    }
                });

    });
    $('#groom_parent_taluk').change(function(){
        var groom_parent_taluk = this.options[this.selectedIndex].text;
    document.getElementById('groom_parent_taluk_name').value = groom_parent_taluk;
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

        $('input[name="current_pincode"]').on('input', function() {
            this.value = this.value.replace(/[^0-9]/g, '').substring(0, 6);
        });
        $('input[name="permanent_pincode"]').on('input', function() {
            this.value = this.value.replace(/[^0-9]/g, '').substring(0, 6);
        });
        $('input[name="fiancee_pincode"]').on('input', function() {
            this.value = this.value.replace(/[^0-9]/g, '').substring(0, 6);
        });
        $('input[name="groom_pincode"]').on('input', function() {
            this.value = this.value.replace(/[^0-9]/g, '').substring(0, 6);
        });
        $('input[name="groom_parent_pincode"]').on('input', function() {
            this.value = this.value.replace(/[^0-9]/g, '').substring(0, 6);
        });
        $('#example').DataTable();
      
   });

   function fetchTaluk() {    
    //alert("qqqqqqq");    
    var val1 = $("#current_district").val();

    $.ajax({
         url: "{{ url('district/fetch-taluk') }}",
        type: "POST",
        data: {
            district_id: val1,
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
                if ('{{ old('taluk') }}' == value._id) {
                    $opt.attr('selected', 'selected');
                }

                $opt.appendTo('#current_taluk');
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
