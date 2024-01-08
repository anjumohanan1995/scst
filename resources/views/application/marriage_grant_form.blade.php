@extends('layouts.app')

@section('content')
<!-- main-content -->
<div class="main-content app-content">
	<!-- container -->
	<div class="main-container container-fluid">
		<!-- breadcrumb -->
		<div class="breadcrumb-header justify-content-between row me-0 ms-0" >
			
				<h4 class="content-title mb-2">പട്ടികവർഗ്ഗത്തിൽപ്പെട്ട  പാവപ്പെട്ട പെണ്കുട്ടികൾക്ക്  വിവാഹധനസഹായം  നൽകുന്നതിനുള്ള അപേക്ഷഫോറം </h4>
				

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
           
                    <form name="patientForm" id="patientForm" method="post" action="{{route('marriageGrantFormStore')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="card">
                            <div class="card-body">
                        <div class="form-group">
                            <div class="row">   
                                <div class="col-md-6 mb-6">
                                    <label class="form-label">അപേക്ഷകന്റെ പൂർണ്ണമായ പേര്  </label>
                                    <input type="text" value="{{ old('name') }}"  class="form-control" placeholder="" name="name" />
                                    @error('name')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-6">
                                    <label class="form-label">വയസ്   </label>
                                    <input type="number" value="{{ old('age') }}" class="form-control" placeholder="" name="age" />
                                    
                                    @error('age')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div><br>
                            <div class="row">   
                                <div class="col-md-6 mb-6">
                                    <label class="form-label">ഇപ്പോഴത്തെ മേൽവിലാസം  </label>
                                    <textarea type="text" value="{{ old('current_address') }}"  class="form-control" placeholder="" name="current_address" ></textarea>
                                    @error('current_address')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                             
                                <div class="col-md-6 mb-6">
                                    <label class="form-label">സ്ഥിരമായ മേൽവിലാസം   </label>
                                    <textarea type="text" value="{{ old('permanent_address') }}" class="form-control" placeholder="" name="permanent_address" ></textarea>
                                    
                                    @error('permanent_address')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
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
                                    <div class="col-md-2 mb-2">
                                        <label class="form-label">ജില്ല  </label>
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
                                        <label class="form-label">താലൂക്ക്  </label>
                                        <select id="permanent_taluk" name="permanent_taluk" class="form-control">
                                            <option value="">Choose Taluk</option>
                                        </select>                                 
                                        @error('permanent_taluk')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                        <input type="hidden" name="permanent_taluk_name" id="permanent_taluk_name" value="">
                                    </div>
                                    <div class="col-md-2 mb-2">
                                        <label class="form-label">പിൻകോഡ്  </label>
                                        <input type="text" value="{{ old('permanent_pincode') }}"  class="form-control"  name="permanent_pincode" />
                                        @error('permanent_pincode')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div><br>
                            <div class="row">   
                                <div class="col-md-6 mb-6">
                                    <label class="form-label">കുടുംബങ്ങളെ സംബന്ധിച്ച വിശദവിവരങ്ങൾ (മരിച്ചുപോയവരുടേതുൾപ്പെടെ )  </label>
                                    <input type="text" value="{{ old('family_details') }}"  class="form-control" placeholder="" name="family_details" />
                                    @error('family_details')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-6">
                                    <label class="form-label">അപേക്ഷകന്റെ ജാതി  (തഹസിൽദാരിൽനിന്നും ജാതി തെളിയിക്കുന്ന സാക്ഷ്യപത്രം (അസൽ )ഹാജരാക്കണം )   </label>
                                    <div class="row">
                                    <div class="col-md-6 mb-6">
                                    <input type="text" value="{{ old('caste') }}" class="form-control" placeholder="" name="caste" />
                                    @error('caste')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                    <div class="col-md-6 mb-6">
                                        <input type="file" value="{{ old('caste_certificate') }}" class="form-control" placeholder="" name="caste_certificate" />
                                        @error('caste_certificate')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                    </div>  
                                    </div>                                 
                                    
                                </div>
                            </div><br>   
                            <div class="row">   
                                <div class="col-md-6 mb-6">
                                    <label class="form-label">വിവാഹം ഉറപ്പിച്ചിരിക്കുന്ന പെൺകുട്ടിയുടെ പേരും മേൽവിലാസവും  </label>
                                    <textarea type="text" value="{{ old('name_and_address_fiancee') }}"  class="form-control" placeholder="" name="name_and_address_fiancee" ></textarea>
                                    @error('name_and_address_fiancee')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-6">
                                    <label class="form-label">ആരുടെ വിവാഹമാണോ ഉറപ്പിച്ചിരിക്കുന്നത് ആ പെൺകുട്ടിക്ക് അപേക്ഷകനുമായുള്ള ബന്ധം   </label>
                                    <input type="text" value="{{ old('relation_with_applicant') }}" class="form-control" placeholder="" name="relation_with_applicant" />
                                    
                                    @error('relation_with_applicant')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div><br> 
                            <div class="row">   
                                <div class="col-md-6 mb-6">
                                    <label class="form-label">പെൺകുട്ടിയുടെ ആദ്യവിവാഹമോ പുനർവിവാഹമോ?  </label>
                                    <textarea type="text" value="{{ old('marriage_count') }}"  class="form-control" placeholder="" name="marriage_count" ></textarea>
                                    @error('marriage_count')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-6">
                                    <label class="form-label">ഗുണഭോക്താവ് വിധവയാണോ?  </label>
                                    <input type="text" value="{{ old('is_widow') }}" class="form-control" placeholder="" name="is_widow" />
                                    
                                    @error('is_widow')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div><br> 
                            <div class="row">   
                                <div class="col-md-6 mb-6">
                                    <label class="form-label">അച്ഛൻ/അമ്മ/ രക്ഷാകർത്താവിന്റെ തൊഴിൽ  </label>
                                    <textarea type="text" value="{{ old('parent_occupation') }}"  class="form-control" placeholder="" name="parent_occupation" ></textarea>
                                    @error('parent_occupation')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-6">
                                    <label class="form-label">കുടുംബത്തിൽ എല്ലാ മാർഗത്തിൽ നിന്നുമുള്ള ആകെ വാർഷിക വരുമാനം (വില്ലേജ് ആഫീസറിൽ നിന്നും ലഭിച്ച സർട്ടിഫിക്കറ്റ് (അസൽ) ഹാജരാക്കണം )   </label>
                                    <div class="row">
                                    <div class="col-md-6 mb-6">
                                    <input type="text" value="{{ old('annual_income') }}" class="form-control" placeholder="" name="annual_income" />
                                    @error('annual_income')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                    <div class="col-md-6 mb-6">
                                        <input type="file" value="{{ old('income_certificate') }}" class="form-control" placeholder="" name="income_certificate" />
                                        @error('income_certificate')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                    </div>  
                                    </div>  
                                </div>
                            </div><br> 
                            <div class="row">   
                                <div class="col-md-6 mb-6">
                                    <label class="form-label">നിശ്ചയിച്ചിരിക്കുന്ന വിവഹ സ്ഥലവും തീയതിയും  </label>
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
                                    <label class="form-label">വിവാഹിതയാകാൻ പോകുന്ന പെൺകുട്ടിയുടെ മാതാവ് / പിതാവ് മരിച്ചുപോയിട്ടുടെങ്കിൽ ആയത് സംബന്ധിച്ച വിവരങ്ങൾ: </label>
                                    <textarea type="text" value="{{ old('fiancee_family_details') }}" class="form-control" placeholder="" name="fiancee_family_details" ></textarea>
                                    
                                    @error('fiancee_family_details')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div><br> 
                            <div class="row">   
                                <div class="col-md-6 mb-6">
                                    <label class="form-label">മാതാപിതാക്കളിലാർക്കെങ്കിലും തൊഴിലിൽ ഏർപ്പെടാൻ  കഴിയാത്തവിധം അംഗവൈകല്യം സംഭവിച്ചിട്ടുണ്ടെങ്കിൽ ആയത് സംബന്ധിച്ച വിവരങ്ങൾ  </label>
                                    <textarea type="text" value="{{ old('disabled_parent_info') }}"  class="form-control" placeholder="" name="disabled_parent_info" ></textarea>
                                    @error('disabled_parent_info')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-6">
                                    <label class="form-label">വിവാഹം കഴിക്കുന്ന പെണ്കുട്ടിയോ മാതാപിതാക്കളോ അടിമപ്പണിയിൽ നിന്നും വിമുക്തരാക്കപ്പെട്ടവരാണെങ്കിൽ ആയതിന്റെ വിശദവിവരം </label>
                                    <textarea type="text" value="{{ old('freedmen_parent_details') }}" class="form-control" placeholder="" name="freedmen_parent_details" ></textarea>
                                    @error('freedmen_parent_details')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div><br>  
                            <div class="row">   
                                <div class="col-md-6 mb-6">
                                    <label class="form-label">വിവാഹിതയാകുന്ന പെൺക്കുട്ടിയോ മാതാപിതാക്കളോ പട്ടികവർഗക്കാരല്ലാത്തവരുടെ അതിക്രമങ്ങൾക്കിരയായിട്ടുള്ളവരാണെങ്കിൽ ആയതിന്റെ വിവരങ്ങൾ</label>
                                    <textarea type="text" value="{{ old('violence_by_non_scheduled_tribes_info') }}" class="form-control" placeholder="" name="violence_by_non_scheduled_tribes_info" ></textarea>
                                    @error('violence_by_non_scheduled_tribes_info')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-6">
                                    <label class="form-label">വിവാഹിതയാകുന്ന പെൺകുട്ടിയുടെയോ ഭൂമി അന്യാധീനപ്പെട്ട് നിർദ്ധനരായിട്ടുള്ളപക്ഷം ആയതിന്റെ വിവരങ്ങൾ  </label>
                                    <textarea type="text" value="{{ old('land_alienated_details') }}"  class="form-control" placeholder="" name="land_alienated_details" ></textarea>
                                    @error('land_alienated_details')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>                                
                            </div><br>   
                            <div class="row">   
                                <div class="col-md-6 mb-6">
                                    <label class="form-label">വിവാഹിതയാകുന്ന പെൺകുട്ടിയുടെ മാതാവോ  / പിതാവോ സമുദായഭ്രഷ്ടരാണെങ്കിൽ ആയതിന്റെ പൂർണവിവരം</label>
                                    <textarea type="text" value="{{ old('outcast_parent_details') }}" class="form-control" placeholder="" name="outcast_parent_details" ></textarea>
                                    @error('outcast_parent_details')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-6">
                                    <label class="form-label">വിവാഹിതയാകുന്ന പെൺകുട്ടിയുടെ മാതാവോ  / പിതാവോ പുനർവിവാഹം ചെയ്ത് ജീവിക്കുന്നുവെങ്കിൽ ആയതിന്റെ വിവരങ്ങൾ  </label>
                                    <textarea type="text" value="{{ old('remarried_parent_details') }}"  class="form-control" placeholder="" name="remarried_parent_details" ></textarea>
                                    @error('remarried_parent_details')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>                                
                            </div><br> 
                            <div class="row">   
                                <div class="col-md-6 mb-6">
                                    <label class="form-label">വരന്റെ പേരും മേൽവിലാസവും</label>
                                    <textarea type="text" value="{{ old('groom_name_and_address') }}" class="form-control" placeholder="" name="groom_name_and_address" ></textarea>
                                    @error('groom_name_and_address')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-6">
                                    <label class="form-label">വരന്റെ അച്ഛന്റെ / അമ്മയുടെ /രക്ഷാകർത്താവിന്റെ പേരും മേൽവിലാസവും </label>
                                    <textarea type="text" value="{{ old('name_and_address_groom_parent') }}"  class="form-control" placeholder="" name="name_and_address_groom_parent" ></textarea>
                                    @error('name_and_address_groom_parent')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>                                
                            </div><br>
                            <div class="row">   
                              
                                    <label class="form-label">ഈ ആവശ്യത്തിന് സർക്കാരിൽനിന്നോ സംഘടനകളിൽനിന്നോ ഏജൻസികളിൽനിന്നോ ധനസഹായം ലഭിച്ചിട്ടുണ്ടെങ്കിൽ ആയതിന്റെ പൂർണവിവരം</label>
                                    <textarea type="text" value="{{ old('financial_assistance_details') }}" class="form-control" placeholder="" name="financial_assistance_details" ></textarea>
                                    @error('financial_assistance_details')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                               
                                                            
                            </div><br>  
                            <div class="row">   
                                <div class="col-md-4 mb-4">
                                    <label class="form-label">സ്ഥലം</label>
                                    <input type="text" value="{{ old('place') }}" class="form-control" placeholder="സ്ഥലം" name="place" />
                                    @error('place')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="col-md-4 mb-4">
                                    <label class="form-label">തീയതി </label>
                                    <input type="date" value="{{ old('date') }}"  class="form-control" placeholder="തീയതി" name="date" />
                                    @error('date')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div> 
                                <div class="col-md-4 mb-4">
                                    <label class="form-label">അപേക്ഷകന്റെ ഒപ്പ്/വിരലടയാളം </label>
                                    <input type="file" value="{{ old('signature') }}"  class="form-control" placeholder="അപേക്ഷകന്റെ ഒപ്പ്/വിരലടയാളം" name="signature" />
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
