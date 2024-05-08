@extends('layouts.app')

@section('content')
<!-- main-content -->
<div class="main-content app-content">
	<!-- container -->
	<div class="main-container container-fluid">
		<!-- breadcrumb -->
		<div class="breadcrumb-header justify-content-between row me-0 ms-0" >
			
				<h4 class="content-title mb-2">പട്ടികവർഗ്ഗത്തിൽപ്പെട്ട പെണ്കുട്ടികൾക്ക്  വിവാഹധനസഹായം  നൽകുന്നതിനുള്ള അപേക്ഷഫോറം </h4>
                   <h4  class="content-title mb-2 small"> Application form for marriage grant to poor girls belonging to Scheduled Tribes </h4>
				

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
           
                    <form name="patientForm" id="patientForm" method="post" action="{{ route('marriageGrantUpdate',['id' => $datas->id]) }}" enctype="multipart/form-data">
                        @csrf
                        <div class="card">
                            <div class="card-body">
                        <div class="form-group">
                            <div class="row">   
                                <div class="col-md-6 mb-6">
                                    <label class="form-label">അപേക്ഷകന്റെ പൂർണ്ണമായ പേര്  <br><span class="small">Applicant's full name </span></label>
                                    <input type="text" value="{{ @$datas->name }}"  class="form-control" placeholder="" name="name" required />
                                    @error('name')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-6">
                                    <label class="form-label">വയസ്  <br><span class="small">Age </span>  </label>
                                    <input type="number" value="{{ @$datas->age }}" class="form-control" placeholder="" name="age" />
                                    
                                    @error('age')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div><br>
                            <div class="row">   
                                <div class="col-md-6 mb-6">
                                    <label class="form-label">ഇപ്പോഴത്തെ മേൽവിലാസം <br><span class="small">  Current address </span> </label>
                                    <textarea type="text" id="current_address" value="{{ @$datas->current_address }}"  class="form-control" placeholder="" name="current_address" >{{ @$datas->current_address }}</textarea>
                                    @error('current_address')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                             
                                <div class="col-md-6 mb-6"> 
                                    <label class="form-label">സ്ഥിരമായ മേൽവിലാസം  &nbsp;&nbsp;  <input type="checkbox" id="copyAddress" onclick="copyCurrentAddress()" style="align:left;"><br> (നിലവിലെ ഇപ്പോഴത്തെ മേൽവിലാസം) <br><span class="small"> Permanent address </span> </label>
                                   
                                    <textarea type="text" id="permanent_address" value="{{ @$datas->permanent_address }}" class="form-control" placeholder="" name="permanent_address" >{{ @$datas->permanent_address }}</textarea>
                                    
                                    @error('permanent_address')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                               <div class="row">   
                                    <div class="col-md-2 mb-2">
                                        <label class="form-label">ജില്ല <br><span class="small"> District </span> </label>
                                        <select id="current_district" name="current_district" class="form-control" >
                                            <option value="">Select</option>
                                                @foreach($districts as $district)
                                                    <option value="{{$district->id}}" @if($district->id == @$datas->current_district) selected @endif >{{$district->name}}</option>
                                                @endforeach
                                        </select>
                                         @error('current_district')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                        <input type="hidden" name="current_district_name" id="current_district_name" value="{{ @$datas->current_district_name }}">
                                    </div>
                                    <div class="col-md-2 mb-2">
                                        <label class="form-label">താലൂക്ക് <br><span class="small"> Taluk </span> </label>
                                        <select id="current_taluk" name="current_taluk" class="form-control">
                                            <option value="">Choose Taluk</option>
                                        </select>                                 
                                        @error('current_taluk')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                        <input type="hidden" name="current_taluk_name" id="current_taluk_name" value="{{ @$datas->current_taluk_name }}">
                                    </div>
                                    <div class="col-md-2 mb-2">
                                        <label class="form-label">പിൻകോഡ് <br><span class="small">Pincode</span> </label>
                                        <input type="text" value="{{ @$datas->current_pincode }}"  class="form-control"  name="current_pincode" />
                                        @error('current_pincode')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-2 mb-2">
                                        <label class="form-label">ജില്ല  <br><span class="small">District </span> </label>
                                        <select id="permanent_district" name="permanent_district" class="form-control" >
                                            <option value="">Select</option>
                                                @foreach($districts as $district)
                                                    <option value="{{$district->id}}" @if($district->id == @$datas->permanent_district) selected @endif >{{$district->name}}</option>
                                                @endforeach
                                        </select>
                                         @error('permanent_district')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                        <input type="hidden" name="permanent_district_name" id="permanent_district_name" value="{{ @$datas->permanent_district_name }}">
                                    </div>
                                    <div class="col-md-2 mb-2">
                                        <label class="form-label">താലൂക്ക് <br><span class="small">Taluk </span> </label>
                                        <select id="permanent_taluk" name="permanent_taluk" class="form-control">
                                            <option value="">Choose Taluk</option>
                                        </select>                                 
                                        @error('permanent_taluk')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                        <input type="hidden" name="permanent_taluk_name" id="permanent_taluk_name" value="{{ @$datas->permanent_taluk_name }}">
                                    </div>
                                    <div class="col-md-2 mb-2">
                                        <label class="form-label">പിൻകോഡ് <br><span class="small"> Pincode </span></label>
                                        <input type="text" value="{{ @$datas->permanent_pincode }}"  class="form-control"  name="permanent_pincode" />
                                        @error('permanent_pincode')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div><br>
                            <div class="row">   
                                <div class="col-md-6 mb-6">
                                    <label class="form-label">കുടുംബങ്ങളെ സംബന്ധിച്ച വിശദവിവരങ്ങൾ (മരിച്ചുപോയവരുടേതുൾപ്പെടെ ) <br><span class="small">Details of families (including deceased) </span> </label>
                                    <input type="text" value="{{ @$datas->family_details }}"  class="form-control" placeholder="" name="family_details" />
                                    @error('family_details')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-6">
                                    <label class="form-label">അപേക്ഷകന്റെ ജാതി  (തഹസിൽദാരിൽനിന്നും ജാതി തെളിയിക്കുന്ന സാക്ഷ്യപത്രം (അസൽ )ഹാജരാക്കണം ) <br><span class="small">Caste of the applicant (Proof caste certificate (asal) from Tehsildar should be produced)  </span> </label>
                                    <div class="row">
                                    <div class="col-md-6 mb-6">
                                    <input type="text" value="{{ @$datas->caste }}" class="form-control" placeholder="" name="caste" />
                                    @error('caste')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                    <div class="col-md-6 mb-6">
                                        <input type="file" onchange="validateCaste()" value="{{ @$datas->caste_certificate }}" class="form-control" placeholder="" name="caste_certificate" id="caste_certificate" />
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
                                    <label class="form-label">വിവാഹം ഉറപ്പിച്ചിരിക്കുന്ന പെൺകുട്ടിയുടെ പേര് <br><span class="small"> Name of girl whose marriage is fixed</span> </label>
                                    <input type="text" value="{{ @$datas->fiancee_name }}"  class="form-control" placeholder="" name="fiancee_name" />
                                    @error('fiancee_name')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-6">
                                    <label class="form-label">വിവാഹം ഉറപ്പിച്ചിരിക്കുന്ന പെൺകുട്ടിയുടെ മേൽവിലാസം <br><span class="small"> Address of girl whose marriage is fixed </span> </label>
                                    <textarea type="text"  class="form-control" placeholder="" name="fiancee_address" >{{ @$datas->fiancee_address }}</textarea>
                                    @error('fiancee_address')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">   
                                <div class="col-md-6 mb-6">
                                    <label class="form-label">ആരുടെ വിവാഹമാണോ ഉറപ്പിച്ചിരിക്കുന്നത് ആ പെൺകുട്ടിക്ക് അപേക്ഷകനുമായുള്ള ബന്ധം <br><span class="small"> The relationship of the girl with the applicant whose marriage is fixed  </span> </label>
                                    <!-- <input type="text" value="{{ @$datas->relation_with_applicant }}" class="form-control" placeholder="" name="relation_with_applicant" /> -->
                                    <select class="form-select" name="relation_with_applicant">
                                                <option value="" disabled>Select a relationship</option>
                                                <option value="father" @if (@$datas->relation_with_applicant == 'father') selected @endif>
                                                    Father / അച്ഛൻ</option>
                                                <option value="mother" @if (@$datas->relation_with_applicant == 'mother') selected @endif>
                                                    Mother / അമ്മ</option>
                                                <option value="grandfather"
                                                    @if (@$datas->relation_with_applicant == 'grandfather') selected @endif>Grandfather /
                                                    മുത്തച്ഛൻ</option>
                                                <option value="grandmother"
                                                    @if (@$datas->relation_with_applicant == 'grandmother') selected @endif>Grandmother /
                                                    മുത്തശ്ശി</option>
                                                <option value="uncle" @if (@$datas->relation_with_applicant == 'uncle') selected @endif>
                                                    Uncle / മാമൻ </option>
                                                <option value="aunt" @if (@$datas->relation_with_applicant == 'aunt') selected @endif>
                                                    Aunt / മാമി </option>
                                                <option value="cousin" @if (@$datas->relation_with_applicant == 'cousin') selected @endif>
                                                    Cousin / സഹോദര / സഹോദരി</option>
                                                <option value="siblings"
                                                    @if (@$datas->relation_with_applicant == 'siblings') selected @endif>Siblings / സഹോദര /
                                                    സഹോദരി</option>
                                                <option value="others" @if (@$datas->relation_with_applicant == 'others') selected @endif>
                                                    Others / മറ്റുള്ളവ </option>
                                            </select>
                                    
                                    @error('relation_with_applicant')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="col-md-2 mb-2">
                                    <label class="form-label">ജില്ല <br><span class="small">District </span> </label>
                                    <select id="fiancee_district" name="fiancee_district" class="form-control" >
                                        <option value="">Select</option>
                                            @foreach($districts as $district)
                                                <option value="{{$district->id}}" @if($district->id == @$datas->fiancee_district) selected @endif  >{{$district->name}}</option>
                                            @endforeach
                                    </select>
                                     @error('fiancee_district')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                    <input type="hidden" name="fiancee_district_name" id="fiancee_district_name" value="{{ @$datas->fiancee_district_name }}">
                                </div>
                                <div class="col-md-2 mb-2">
                                    <label class="form-label">താലൂക്ക് <br><span class="small"> Taluk</span> </label>
                                    <select id="fiancee_taluk" name="fiancee_taluk" class="form-control">
                                        <option value="">Choose Taluk</option>
                                    </select>                                 
                                    @error('fiancee_taluk')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                    <input type="hidden" name="fiancee_taluk_name" id="fiancee_taluk_name" value="{{ @$datas->fiancee_taluk_name }}">
                                </div>
                                <div class="col-md-2 mb-2">
                                    <label class="form-label">പിൻകോഡ് <br><span class="small"> Pincode</span> </label>
                                    <input type="text" value="{{ @$datas->fiancee_pincode }}"  class="form-control"  name="fiancee_pincode" />
                                    @error('fiancee_pincode')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div><br> 
                            <div class="row">   
                                <div class="col-md-6 mb-6">
                                    <label class="form-label">പെൺകുട്ടിയുടെ ആദ്യവിവാഹമോ പുനർവിവാഹമോ?<br><span class="small"> Girl's first marriage or remarriage?</span>  </label>
                                    <div>
                                        <input type="radio" id="firstMarriage" name="marriage_type" value="first" {{ @$datas->marriage_type == 'first' ? 'checked' : '' }}>
                                        <label for="firstMarriage">ആദ്യവിവാഹം<br><span class="small"> (First marriage)</span></label>
                                    </div>
                                    <div>
                                        <input type="radio" id="remarriage" name="marriage_type" value="remarriage" {{ @$datas->marriage_type == 'remarriage' ? 'checked' : '' }} >
                                        <label for="remarriage">പുനർവിവാഹം <br><span class="small">(Remarriage)</span></label>
                                    </div>
                                    {{--  <textarea type="text" value="{{ @$datas->marriage_count') }}"  class="form-control" placeholder="" name="marriage_count" ></textarea>  --}}
                                    @error('marriage_type')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-6">
                                    <label class="form-label">ഗുണഭോക്താവ് വിധവയാണോ? <br><span class="small">Is the beneficiary a widow?</span>  </label>
                                    <div>
                                        <input type="radio" id="yes" name="is_widow" value="Yes" {{ @$datas->is_widow == 'Yes' ? 'checked' : '' }} >
                                        <label for="yes">അതെ/Yes</label>
                                    </div>
                                    <div>
                                        <input type="radio" id="no" name="is_widow" value="No" {{ @$datas->is_widow == 'No' ? 'checked' : '' }} >
                                        <label for="no">അല്ല/No</label>
                                    </div>
                                    @error('is_widow')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div><br> 
                            <div class="row">   
                                <div class="col-md-6 mb-6">
                                    <label class="form-label">അച്ഛൻ/അമ്മ/ രക്ഷാകർത്താവിന്റെ തൊഴിൽ  <br><span class="small">Occupation of Father/Mother/Guardian </span> </label>
                                    <textarea type="text" class="form-control" placeholder="" name="parent_occupation" >{{ @$datas->parent_occupation }}</textarea>
                                    @error('parent_occupation')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-6">
                                    <label class="form-label">കുടുംബത്തിൽ എല്ലാ മാർഗത്തിൽ നിന്നുമുള്ള ആകെ വാർഷിക വരുമാനം (വില്ലേജ് ആഫീസറിൽ നിന്നും ലഭിച്ച സർട്ടിഫിക്കറ്റ് (അസൽ) ഹാജരാക്കണം )  <br><span class="small">Total annual income of the family from all sources (Certificate (Original) obtained from Village Officer should be produced) </span>  </label>
                                    <div class="row">
                                    <div class="col-md-6 mb-6">
                                    <input type="text" value="{{ @$datas->annual_income }}" class="form-control" placeholder="" name="annual_income" />
                                    @error('annual_income')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                    <div class="col-md-6 mb-6">
                                        <input type="file" onchange="validateIncome()" value="{{ @$datas->income_certificate }}" class="form-control" placeholder="" name="income_certificate" id="income_certificate" />
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
                                    <label class="form-label">നിശ്ചയിച്ചിരിക്കുന്ന വിവഹ സ്ഥലവും തീയതിയും  <br><span class="small"> Place and date of marriage fixed </span> </label>
                                    <div class="row">
                                        <div class="col-md-6 mb-6">
                                        <input type="text" value="{{ @$datas->marriage_place }}" class="form-control" placeholder="സ്ഥലം" name="marriage_place" />
                                        @error('marriage_place')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                        <div class="col-md-6 mb-6">
                                            <input type="date" value="{{ @$datas->marriage_date }}" class="form-control" placeholder="" name="marriage_date" />
                                            @error('marriage_date')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                        </div>  
                                        </div>  
                                </div>

                                <div class="col-md-6 mb-6">
                                    <label class="form-label">വിവാഹിതയാകാൻ പോകുന്ന പെൺകുട്ടിയുടെ മാതാവ് / പിതാവ് മരിച്ചുപോയിട്ടുടെങ്കിൽ ആയത് സംബന്ധിച്ച വിവരങ്ങൾ: <br><span class="small"> Information regarding the deceased mother/father of the girl to be married:</span> </label>
                                    <textarea type="text" class="form-control" placeholder="" name="fiancee_family_details" >{{ @$datas->fiancee_family_details }}</textarea>
                                    
                                    @error('fiancee_family_details')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div><br> 
                            <div class="row">   
                                <div class="col-md-6 mb-6">
                                    <label class="form-label">മാതാപിതാക്കളിലാർക്കെങ്കിലും തൊഴിലിൽ ഏർപ്പെടാൻ  കഴിയാത്തവിധം അംഗവൈകല്യം സംഭവിച്ചിട്ടുണ്ടെങ്കിൽ ആയത് സംബന്ധിച്ച വിവരങ്ങൾ  <br><span class="small"> Information about if either of the parents is disabled so that they are unable to engage in employment </span> </label>
                                    <textarea type="text" class="form-control" placeholder="" name="disabled_parent_info" >{{ @$datas->disabled_parent_info }}</textarea>
                                    @error('disabled_parent_info')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-6">
                                    <label class="form-label">വിവാഹം കഴിക്കുന്ന പെണ്കുട്ടിയോ മാതാപിതാക്കളോ അടിമപ്പണിയിൽ നിന്നും വിമുക്തരാക്കപ്പെട്ടവരാണെങ്കിൽ ആയതിന്റെ വിശദവിവരം  <br><span class="small"> Details of whether the girl to be married or her parents are freedmen </span></label>
                                    <textarea type="text" class="form-control" placeholder="" name="freedmen_parent_details" >{{ @$datas->freedmen_parent_details }}</textarea>
                                    @error('freedmen_parent_details')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div><br>  
                            <div class="row">   
                                <div class="col-md-6 mb-6">
                                    <label class="form-label">വിവാഹിതയാകുന്ന പെൺക്കുട്ടിയോ മാതാപിതാക്കളോ പട്ടികവർഗക്കാരല്ലാത്തവരുടെ അതിക്രമങ്ങൾക്കിരയായിട്ടുള്ളവരാണെങ്കിൽ ആയതിന്റെ വിവരങ്ങൾ  <br><span class="small"> Information about whether the girl child getting married or her parents have been victims of violence by non-Scheduled Tribes </span></label>
                                    <textarea type="text" class="form-control" placeholder="" name="violence_by_non_scheduled_tribes_info" >{{ @$datas->violence_by_non_scheduled_tribes_info }}</textarea>
                                    @error('violence_by_non_scheduled_tribes_info')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-6">
                                    <label class="form-label">വിവാഹിതയാകുന്ന പെൺകുട്ടിയുടെയോ ഭൂമി അന്യാധീനപ്പെട്ട് നിർദ്ധനരായിട്ടുള്ളപക്ഷം ആയതിന്റെ വിവരങ്ങൾ  <br><span class="small"> Details of the girl getting married or if the land has been alienated and destitute </span> </label>
                                    <textarea type="text" class="form-control" placeholder="" name="land_alienated_details" >{{ @$datas->land_alienated_details }}</textarea>
                                    @error('land_alienated_details')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>                                
                            </div><br>   
                            <div class="row">   
                                <div class="col-md-6 mb-6">
                                    <label class="form-label">വിവാഹിതയാകുന്ന പെൺകുട്ടിയുടെ മാതാവോ  / പിതാവോ സമുദായഭ്രഷ്ടരാണെങ്കിൽ ആയതിന്റെ പൂർണവിവരം  <br><span class="small"> Full details of the mother/father of the girl to be married if they are outcasts </span></label>
                                    <textarea type="text" class="form-control" placeholder="" name="outcast_parent_details" >{{ @$datas->outcast_parent_details }}</textarea>
                                    @error('outcast_parent_details')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-6">
                                    <label class="form-label">വിവാഹിതയാകുന്ന പെൺകുട്ടിയുടെ മാതാവോ  / പിതാവോ പുനർവിവാഹം ചെയ്ത് ജീവിക്കുന്നുവെങ്കിൽ ആയതിന്റെ വിവരങ്ങൾ  <br><span class="small"> Details of mother/father of the girl to be married if remarried and living </span> </label>
                                    <textarea type="text" class="form-control" placeholder="" name="remarried_parent_details" >{{ @$datas->remarried_parent_details }}</textarea>
                                    @error('remarried_parent_details')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>                                
                            </div><br> <hr>
                            <div class="row">   
                                <div class="col-md-3 mb-3">
                                    <label class="form-label">വരന്റെ പേര്  <br><span class="small"> Groom's Name </span></label>
                                    <input type="text" value="{{ @$datas->groom_name }}" class="form-control" placeholder="" name="groom_name" />
                                    @error('groom_name')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label class="form-label">വരന്റെ മേൽവിലാസം  <br><span class="small"> Groom's Address </span></label>
                                    <textarea type="text" class="form-control" placeholder="" name="groom_address" >{{ @$datas->groom_address }}</textarea>
                                    @error('groom_address')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="col-md-2 mb-2">
                                    <label class="form-label">ജില്ല  <br><span class="small"> District </span></label>
                                    <select id="groom_district" name="groom_district" class="form-control" >
                                        <option value="">Select</option>
                                            @foreach($districts as $district)
                                                <option value="{{$district->id}}" @if($district->id == @$datas->groom_district) selected @endif >{{$district->name}}</option>
                                            @endforeach
                                    </select>
                                     @error('groom_district')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                    <input type="hidden" name="groom_district_name" id="groom_district_name" value="{{ @$datas->groom_district_name }}">
                                </div>
                                <div class="col-md-2 mb-2">
                                    <label class="form-label">താലൂക്ക്  <br><span class="small"> Taluk</span> </label>
                                    <select id="groom_taluk" name="groom_taluk" class="form-control">
                                        <option value="">Choose Taluk</option>
                                    </select>                                 
                                    @error('groom_taluk')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                    <input type="hidden" name="groom_taluk_name" id="groom_taluk_name" value="{{ @$datas->groom_taluk_name }}">
                                </div>
                                <div class="col-md-2 mb-2">
                                    <label class="form-label">പിൻകോഡ്  <br><span class="small"> Pincode </span> </label>
                                    <input type="text" value="{{ @$datas->groom_pincode }}"  class="form-control"  name="groom_pincode" />
                                    @error('groom_pincode')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                                             
                            </div><br><hr>
                            <div class="row">   
                                <div class="col-md-3 mb-3">
                                    <label class="form-label">വരന്റെ അച്ഛന്റെ / അമ്മയുടെ /രക്ഷാകർത്താവിന്റെ പേര്  <br><span class="small"> Groom's Father's/Mother's/Guardian's Name</span> </label>
                                    <input type="text" value="{{ @$datas->groom_parent_name }}" class="form-control" placeholder="" name="groom_parent_name" />
                                    @error('groom_parent_name')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label class="form-label">വരന്റെ അച്ഛന്റെ / അമ്മയുടെ /രക്ഷാകർത്താവിന്റെ മേൽവിലാസം  <br><span class="small"> Address of Groom's Father/Mother/Guardian </span></label>
                                    <textarea type="text" class="form-control" placeholder="" name="groom_parent_address" >{{ @$datas->groom_parent_address }}</textarea>
                                    @error('groom_parent_address')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="col-md-2 mb-2">
                                    <label class="form-label">ജില്ല  <br><span class="small"> District </span> </label>
                                    <select id="groom_parent_district" name="groom_parent_district" class="form-control" >
                                        <option value="">Select</option>
                                            @foreach($districts as $district)
                                                <option value="{{$district->id}}" @if($district->id == @$datas->groom_parent_district) selected @endif  >{{$district->name}}</option>
                                            @endforeach
                                    </select>
                                     @error('current_district')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                    <input type="hidden" name="groom_parent_district_name" id="groom_parent_district_name" value="{{ @$datas->groom_parent_district_name }}">
                                </div>
                                <div class="col-md-2 mb-2">
                                    <label class="form-label">താലൂക്ക്  <br><span class="small"> Taluk </span> </label>
                                    <select id="groom_parent_taluk" name="groom_parent_taluk" class="form-control">
                                        <option value="">Choose Taluk</option>
                                    </select>                                 
                                    @error('groom_parent_taluk')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                    <input type="hidden" name="groom_parent_taluk_name" id="groom_parent_taluk_name" value="{{ @$datas->groom_parent_taluk_name }}">
                                </div>
                                <div class="col-md-2 mb-2">
                                    <label class="form-label">പിൻകോഡ്  <br><span class="small"> Pincode </span> </label>
                                    <input type="text" value="{{ @$datas->groom_parent_pincode }}"  class="form-control"  name="groom_parent_pincode" />
                                    @error('groom_parent_pincode')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                                            
                            </div><br><hr>
                            <div class="row">   
                                <div class="col-md-6 mb-6">
                                    <label class="form-label">ഈ ആവശ്യത്തിന് സർക്കാരിൽനിന്നോ സംഘടനകളിൽനിന്നോ ഏജൻസികളിൽനിന്നോ ധനസഹായം ലഭിച്ചിട്ടുണ്ടെങ്കിൽ ആയതിന്റെ പൂർണവിവരം  <br><span class="small"> Full details of any financial assistance, if any, received from the Government, organizations or agencies for this purpose </span></label>
                                    <textarea type="text" class="form-control" placeholder="" name="financial_assistance_details" >{{ @$datas->financial_assistance_details }}</textarea>
                                    @error('financial_assistance_details')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-6">
                                    <label class="form-label">പഞ്ചായത്തിൻ്റെ/കോ-ഓർപ്പറേഷൻ്റെ പേര്  <br><span class="small"> Name of Panchayath/Co-orporation </span> </label>
                                    <input type="text" value="{{ @$datas->panchayath_name }}"  class="form-control"  name="panchayath_name" />
                                    @error('panchayath_name')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                    
                               
                                                            
                            </div><br>
                            <div class="row">   
                                <div class="col-md-6 mb-6">
                                    <label class="form-label">വിവാഹത്തിന് ശേഷമാണോ അപേക്ഷ സമർപ്പിക്കുന്നത്?  <br><span class="small"> Is the application submitted after marriage? </span></label>
                                    <div>
                                        <input type="radio" id="submitted_after_marriage_yes" name="submitted_after_marriage" value="Yes" {{ @$datas->submitted_after_marriage == 'Yes' ? 'checked' : '' }} >
                                        <label for="submitted_after_marriage_yes">അതെ/Yes</label>
                                    </div>
                                    <div>
                                        <input type="radio" id="submitted_after_marriage_no" name="submitted_after_marriage" value="No" {{ @$datas->submitted_after_marriage == 'No' ? 'checked' : '' }} >
                                        <label for="submitted_after_marriage_no">അല്ല/No</label>
                                    </div>
                                    @error('submitted_after_marriage')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-6">
                                    <div id="marriage" style="display: none;">
                                        <label class="form-label">Marriage Date</label>
                                        <div class="row">
                                            <div class="col-md-6 mb-6">
                                                <input type="date" value="{{ @$datas->date_of_marriage }}" class="form-control" placeholder="" name="date_of_marriage" />
                                                @error('date_of_marriage')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                            <div class="col-md-6 mb-6">
                                                <label class="form-label">Marriage Certificate</label>
                                                <input type="file" onchange="validateCaste()" value="{{ @$datas->marriage_certificate }}" class="form-control" placeholder="" name="marriage_certificate" id="marriage_certificate" />
                                                <p style="font-size: 11px;">Max. filesize: 2 MB • Format: JPG, PNG, PDF </p>
                                                @error('marriage_certificate')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                                <div id="errorCaste" style="color:red;"></div>
                                            </div>
                                        </div> 
                                    </div>
                                    
                                    <div id="invite" style="display: none;">
                                        <label class="form-label">Invitation Letter</label>                                  
                                        <input type="file" onchange="validateCaste()" value="{{ @$datas->invitation_letter }}" class="form-control" placeholder="" name="invitation_letter" id="invitation_letter" />
                                        <p style="font-size: 11px;">Max. filesize: 2 MB • Format: JPG, PNG, PDF </p>
                                        @error('invitation_letter')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>                          
                                </div>
                                                                              
                            </div>
                             
                            <div class="row">   
                                <div class="col-md-4 mb-4">
                                    <label class="form-label">സ്ഥലം  <br><span class="small"> Place </span></label>
                                    <input type="text" value="{{ @$datas->place }}" class="form-control" placeholder="സ്ഥലം" name="place" />
                                    @error('place')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="col-md-4 mb-4">
                                            <label class="form-label">അപേക്ഷകന്റെ ഫോട്ടോ  <br><span class="small"> Applicant's photo </span></label>
                                            <input type="file" class="form-control" name="applicant_photo" id="applicant_photo"
                                                value="" placeholder="" onchange="validatePhoto()" accept=".jpg, .jpeg, .png" required />
                                                <p style="font-size: 11px;">Max. filesize: 2 MB • Format: JPG, PNG </p>
                                            @error('signature')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            <div id="errorPhoto" style="color:red;"></div>
                                        </div>
                                <div class="col-md-4 mb-4">
                                    <label class="form-label">അപേക്ഷകന്റെ ഒപ്പ്/വിരലടയാളം  <br><span class="small"> Applicant's Signature/Fingerprint</span> </label>
                                    <input type="file" onchange="validateSignature()" value="{{ @$datas->signature }}"  class="form-control" placeholder="അപേക്ഷകന്റെ ഒപ്പ്/വിരലടയാളം" name="signature" id="signature" />
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
                        <h1
                            style="text-align: center;color: rgb(0, 0, 0);font-size: medium; text-decoration: underline; padding: 20px;line-height: 32px;font-weight: 600;">
                            അപേക്ഷ സമർപ്പിക്കുന്നത് 
    
                        </h1>
                            <div class="col-md-6 mb-6">
                                <label class="form-label">ജില്ല  <br><span class="small"> District</span> </label>
                                <select id="submitted_district" name="submitted_district" class="form-control" required />
                                    <option value="">Select</option>
                                        @foreach($districts as $district)
                                            <option value="{{$district->id}}" @if($district->id == @$datas->submitted_district) selected @endif  >{{$district->name}}</option>
                                        @endforeach
                                </select>
                                 @error('submitted_district')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                                <input type="hidden" name="dist_name" id="dist_name" value="{{ @$datas->dist_name }}">
                            </div>
                            <div class="col-md-6 mb-6">
                                <label class="form-label">ടി.ഇ.ഒ  <br><span class="small"> TEO </span> </label>
                                <select id="submitted_teo" name="submitted_teo" class="form-control" required />
                                    <option value="">Choose TEO</option>
                                </select>                                 
                                @error('submitted_teo')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                                <input type="hidden" name="teo_name" id="teo_name" value="{{ @$datas->teo_name }}">
                            </div>                                 
                        </div><br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 mb-3">
                        
                            </div>
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
<script>
    $(document).ready(function() {
        $('#invite').hide();
        $('#marriage').hide();
        $('input[name="submitted_after_marriage"]').change(function() {
            if ($(this).val() === 'Yes') {
                $('#marriage').show();
                $('#invite').hide();
            } else {
                $('#invite').show();
                $('#marriage').hide();
            }
        });
    });

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

        function validatePhoto() {
            var input = document.getElementById('applicant_photo');
            var errorMessage = document.getElementById('errorPhoto');
    
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
        fetchPermanentTaluk();
        fetchFianceeTaluk();
        fetchGroomTaluk();
        fetchGroomParentTaluk();
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
                if ('{{ @$datas->current_taluk }}' == value._id) {
                    $opt.attr('selected', 'selected');
                }

                $opt.appendTo('#current_taluk');
            });
        }
    });
}

function fetchPermanentTaluk() {    
      
    var val1 = $("#permanent_district").val();

    $.ajax({
         url: "{{ url('district/fetch-taluk') }}",
        type: "POST",
        data: {
            district_id: val1,
            _token: '{{ csrf_token() }}'
        },
        dataType: 'json',
        success: function(result) {
            $("#permanent_taluk").find('option').remove();
            $("#permanent_taluk").append('<option value="" selected>Choose Taluk</option>');

            $.each(result.taluks, function(key, value) {
                var $opt = $('<option>');
                $opt.val(value._id).text(value.taluk_name);

                // Set the selected attribute based on the old submitted value
                if ('{{ @$datas->permanent_taluk }}' == value._id) {
                    $opt.attr('selected', 'selected');
                }

                $opt.appendTo('#permanent_taluk');
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
                if ('{{ @$datas->submitted_teo }}' == value._id) {
                    $opt.attr('selected', 'selected');
                }

                $opt.appendTo('#submitted_teo');
            });
        }
    });
}
function fetchFianceeTaluk() {    
      
    var val1 = $("#fiancee_district").val();

    $.ajax({
         url: "{{ url('district/fetch-taluk') }}",
        type: "POST",
        data: {
            district_id: val1,
            _token: '{{ csrf_token() }}'
        },
        dataType: 'json',
        success: function(result) {
            $("#fiancee_taluk").find('option').remove();
            $("#fiancee_taluk").append('<option value="" selected>Choose Taluk</option>');

            $.each(result.taluks, function(key, value) {
                var $opt = $('<option>');
                $opt.val(value._id).text(value.taluk_name);

                // Set the selected attribute based on the old submitted value
                if ('{{ @$datas->fiancee_taluk }}' == value._id) {
                    $opt.attr('selected', 'selected');
                }

                $opt.appendTo('#fiancee_taluk');
            });
        }
    });
}
function fetchGroomTaluk() {    
      
    var val1 = $("#groom_district").val();

    $.ajax({
         url: "{{ url('district/fetch-taluk') }}",
        type: "POST",
        data: {
            district_id: val1,
            _token: '{{ csrf_token() }}'
        },
        dataType: 'json',
        success: function(result) {
            $("#groom_taluk").find('option').remove();
            $("#groom_taluk").append('<option value="" selected>Choose Taluk</option>');

            $.each(result.taluks, function(key, value) {
                var $opt = $('<option>');
                $opt.val(value._id).text(value.taluk_name);

                // Set the selected attribute based on the old submitted value
                if ('{{ @$datas->groom_taluk }}' == value._id) {
                    $opt.attr('selected', 'selected');
                }

                $opt.appendTo('#groom_taluk');
            });
        }
    });
}
function fetchGroomParentTaluk() {    
      
    var val1 = $("#groom_parent_district").val();

    $.ajax({
         url: "{{ url('district/fetch-taluk') }}",
        type: "POST",
        data: {
            district_id: val1,
            _token: '{{ csrf_token() }}'
        },
        dataType: 'json',
        success: function(result) {
            $("#groom_parent_taluk").find('option').remove();
            $("#groom_parent_taluk").append('<option value="" selected>Choose Taluk</option>');

            $.each(result.taluks, function(key, value) {
                var $opt = $('<option>');
                $opt.val(value._id).text(value.taluk_name);

                // Set the selected attribute based on the old submitted value
                if ('{{ @$datas->groom_parent_taluk }}' == value._id) {
                    $opt.attr('selected', 'selected');
                }

                $opt.appendTo('#groom_parent_taluk');
            });
        }
    });
}
  </script>
<!-- main-content-body -->
@endsection
