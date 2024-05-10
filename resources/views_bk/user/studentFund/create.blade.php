@extends('layouts.app')

@section('content')
    <!-- main-content -->
    <div class="main-content app-content">
        <!-- container -->
        <div class="main-container container-fluid">
            <!-- breadcrumb -->
            <div class="breadcrumb-header justify-content-between row me-0 ms-0">

                <h4 class="content-title mb-2"> മെഡിക്കൽ / എഞ്ചിനിയറിംഗ് കോഴ്‌സുകളിലെ
                    പട്ടികജാതി വിദ്യാർത്ഥികൾക്ക് പ്രാരംഭചെലവുകൾക്ക് ധനസഹായം അനുവദിക്കുന്നതിനുള്ള അപേക്ഷ 

                </h4>
                <h4 class="content-title mb-2 small">Application for grant of financial assistance towards initial expenses for
                    Scheduled Caste students in Medical / Engineering Courses 

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

                        <form name="patientForm" id="patientForm" method="post"
                            action="{{ route('MedicalEngineeringStudentFund.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6 mb-6">
                                                <label class="form-label">
                                                 അപേക്ഷകന്റെ പേര്  <br> <span class="small">  Applicant's Name </span>
                                                </label>
                                                <input type="text" value="{{ old('name') }}" class="form-control"
                                                    placeholder="അപേക്ഷകന്റെ പേര് " name="name" />
                                                @error('name')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="col-md-6 mb-6">
                                                <label class="form-label">മേൽവിലാസം <br> <span class="small">Address </span></label>
                                                <textarea type="text" value="{{ old('address') }}" class="form-control" placeholder="മേൽവിലാസം" name="address">{{ old('address') }}</textarea>
                                                @error('address')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div><br>
                                        <div class="row">

                                            <div class="col-md-2 mb-2">
                                                <label class="form-label">ജില്ല<br> <span class="small"> District</span> </label>
                                                <select id="current_district" name="current_district" class="form-control">
                                                    <option value="">Select</option>
                                                    @foreach ($districts as $district)
                                                        <option value="{{ $district->id }}"
                                                            {{ old('current_district') == $district->id ? 'selected' : '' }}>
                                                            {{ $district->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('current_district')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                                <input type="hidden" name="current_district_name"
                                                    id="current_district_name" value="{{ old('current_district_name') }}">
                                            </div>
                                            <div class="col-md-2 mb-2">
                                                <label class="form-label">താലൂക്ക് <br> <span class="small">Taluk</span> </label>
                                                <select id="current_taluk" name="current_taluk" class="form-control">
                                                    <option value="">Choose Taluk</option>
                                                </select>
                                                @error('current_taluk')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                                <input type="hidden" name="current_taluk_name" id="current_taluk_name"
                                                    value="{{ old('current_taluk_name') }}">
                                            </div>
                                            <div class="col-md-2 mb-2">
                                                <label class="form-label"> പിൻകോഡ് <br> <span class="small">Pincode</span></label>
                                                <input type="number" value="{{ old('current_pincode') }}"
                                                    class="form-control" name="current_pincode" />
                                                @error('current_pincode')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="col-md-6 mb-6">
                                                <label class="form-label"> പഞ്ചായത്തിൻ്റെ പേര് <br> <span class="small">Name of panchayath </span>

                                                </label>
                                                <input type="text" value="{{ old('panchayath') }}" class="form-control"
                                                    placeholder="പഞ്ചായത്തിൻ്റെ പേര്" name="panchayath" />

                                                @error('panchayath')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>


                                        </div><br>
                                        <div class="row">
                                            <div class="col-md-6 mb-6">
                                                <label class="form-label">കോഴ്‌സിന്റെ പേര് <br> <span class="small">Course Name </span>

                                                </label>
                                                <input type="text" value="{{ old('course_name') }}" class="form-control"
                                                    placeholder="കോഴ്‌സിന്റെ പേര് " name="course_name" />

                                                @error('course_name')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-md-6 mb-6">
                                                <label class="form-label">സ്ഥാപനത്തിൻ്റെ തരം <br> <span class="small">Type Of Institution </span>

                                                </label>

                                                <select class="form-select " id="institution_type" name="institution_type"
                                                    aria-label="Floating label select example">

                                                    <option value="">Select Type Of Institution</option>
                                                    <option value="Government"
                                                        {{ old('institution_type') == 'Government' ? 'selected' : '' }}>
                                                        Government</option>
                                                    <option value="Aided"
                                                        {{ old('institution_type') == 'Aided' ? 'selected' : '' }}>Aided
                                                    </option>
                                                    <option value="Self-Financing"
                                                        {{ old('institution_type') == 'Self-Financing' ? 'selected' : '' }}>
                                                        Self-Financing</option>
                                                    <option value="Private"
                                                        {{ old('institution_type') == 'Private' ? 'selected' : '' }}>
                                                        Private</option>

                                                </select>
                                                {{-- <input type="text" value="{{ old('institution_type') }}"  class="form-control" placeholder="സ്ഥാപനത്തിൻ്റെ തരം" name="institution_type" />
                                    --}}
                                                @error('institution_type')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div><br>
                                        <div class="row">
                                            <div class="col-md-6 mb-6">
                                                <label class="form-label">
                                                    നടപ്പ് അദ്ധ്യയന വർഷം ക്ലാസ് ആരംഭിച്ച തീയതി <br> <span class="small">Current Academic Year Class Commencement Date
                                               </span> </label>
                                                <input type="date" value="{{ old('class_start_date') }}"
                                                    class="form-control"
                                                    placeholder="നടപ്പ് അദ്ധ്യയന വർഷം ക്ലാസ് ആരംഭിച്ച തീയതി  "
                                                    name="class_start_date" />

                                                @error('class_start_date')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-md-6 mb-6">
                                                <label class="form-label">അലോട്ട്മെൻ്റ് മെമ്മോ അപ്ലോഡ് <br> <span class="small" >Allotement memo upload (Max Size : 2 MB)</span>
                                                    </label>
                                                <input type="file" class="form-control" accept="image/*,.pdf,.docs"
                                                    name="allotment_memo" id="allotment_memo" value=""
                                                    placeholder="അലോട്ട്മെൻ്റ് മെമ്മോ അപ്ലോഡ്" />
                                                @error('allotment_memo')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                                <br>
                                                <span class="text-danger" id="errorAllotment"></span>
                                            </div>
                                        </div><br>
                                        <div class="row">
                                            <div class="col-md-6 mb-6">
                                                <label class="form-label"> 
                                                    അപേക്ഷകനെ പ്രവേശനം ലഭിച്ചത് <br> <span class="small">Applicant is admitted</span>

                                                </label>
                                                <div style="border: 1px solid black" class="form-control">


                                                    <input type="radio" id="merit" name="admission_type"
                                                        value="merit"
                                                        {{ old('admission_type') == 'merit' ? 'checked' : '' }}>
                                                    <label for="merit">മെരിറ്റ് </label> &nbsp; &nbsp;
                                                    <input type="radio" id="reservation" name="admission_type"
                                                        value="reservation"
                                                        {{ old('admission_type') == 'reservation' ? 'checked' : '' }}>
                                                    <label for="reservation">സംവരണം </label> &nbsp; &nbsp;

                                                    <input type="radio" id="management" name="admission_type"
                                                        value="management"
                                                        {{ old('admission_type') == 'management' ? 'checked' : '' }}>
                                                    <label for="management">മാനേജ്‌മന്റ്</label>&nbsp; &nbsp;

                                                    <input type="radio" id="option3" name="admission_type"
                                                        value="others"
                                                        {{ old('admission_type') == 'others' ? 'checked' : '' }}>
                                                    <label for="others">മറ്റുള്ളവ</label>&nbsp; &nbsp;
                                                </div>
                                                @error('admission_type')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror

                                            </div>

                                            <div class="col-md-6 mb-6" style="display: none;" id="othersDiv">
                                                <label class="form-label"> Others Details </label>

                                                <input type="text" value="{{ old('other_details') }}"
                                                    class="form-control" placeholder="Others Details "
                                                    name="other_details" value="{{ old('other_details') }}">


                                                @error('other_details')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>


                                        </div><br>
                                        <div class="row">

                                            <div class="col-md-3 mb-3">
                                                <label class="form-label"><br>അപേക്ഷകന്റെ ജാതി/ മതം
                                                    (സർട്ടിഫിക്കറ്റ് ഹാജരാക്കണം ) <br> <span class="small">Caste/Religion of Applicant (Certificate to be
                                                    produced) </span>

                                                </label>
                                                <input type="text" value="{{ old('caste') }}" class="form-control"
                                                    placeholder="അപേക്ഷകന്റെ ജാതി/ മതം" name="caste">
                                                @error('caste')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label class="form-label">ജാതി/ മതം സർട്ടിഫിക്കറ്റ് <br> <span class="small"> Caste/Religion Certificate (Max Size : 2 MB)
                                                    
                                               </span> </label>
                                                <input type="file" class="form-control" name="caste_certificate"
                                                    id="caste_certificate" value=""
                                                    placeholder=" സർട്ടിഫിക്കറ്റ്" />
                                                @error('caste_certificate')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                                <br>
                                                <span class="text-danger" id="errorcaste"></span>
                                            </div>

                                            <div class="col-md-3 mb-3">
                                                <label class="form-label">
                                                    അപേക്ഷകന്റെ വരുമാനം
                                                    (സർട്ടിഫിക്കറ്റ് ഹാജരാക്കണം ) <br> <span class="small">Applicant's Income (certificate to be produced)

</span>
                                                </label>
                                                <input type="number" value="{{ old('income') }}" class="form-control"
                                                    placeholder="അപേക്ഷകന്റെ വരുമാനം " name="income">

                                                @error('income')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label class="form-label"> വരുമാന
                                                    സർട്ടിഫിക്കറ്റ് <br><span class="small"> Income Certificate (Max Size : 2 MB) </span>
                                                </label>
                                                <input type="file" class="form-control" name="income_certificate"
                                                    id="income_certificate" value=""
                                                    placeholder=" സർട്ടിഫിക്കറ്റ്" />
                                                @error('income_certificate')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                                <br>
                                                <span class="text-danger" id="errorincome"></span>
                                            </div>

                                        </div><br>

                                        <div class="row">
                                            <div class="col-md-6 mb-6">
                                                <label class="form-label">
                                                   
                                                    വിദ്യാർത്ഥികൾക്ക് ഇ-ഗ്രാൻഡ് അകൗണ്ട് നമ്പർ ഉണ്ടോ ? <br> <span class="small"> Do students have an e-grand account number?</span></label>
                                                <div style="border: 1px solid black" class="form-control">
                                                    <input type="radio" id="yes" name="account_details"
                                                        value="yes"
                                                        {{ old('account_details') == 'yes' ? 'checked' : '' }}>&nbsp;
                                                    &nbsp;

                                                    <label for="yes">Yes ( അതെ)</label> &nbsp; &nbsp;
                                                    &nbsp; &nbsp;

                                                    <input type="radio" id="no" name="account_details"
                                                        value="no"
                                                        {{ old('account_details') == 'no' ? 'checked' : '' }}>

                                                    <label for="No">No (ഇല്ല)</label>

                                                </div><br>
                                                <div class="row" style="display:none" id="accountDiv">
                                                    <div class="col-md-4 mb-4">
                                                       ബാങ്ക് ശാഖ Bank Branch 

                                                        <input type="text" value="{{ old('bank_branch') }}"
                                                            class="form-control" placeholder="ബാങ്ക് ശാഖ"
                                                            name="bank_branch" value="{{ old('bank_branch') }}">


                                                        @error('bank_branch')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-4 mb-4">
                                                     ഇ -ഗ്രാൻഡ് അകൗണ്ട് നം     E-Grand Account no



                                                        <input type="number" value="{{ old('account_no') }}"
                                                            class="form-control" placeholder="ഇ -ഗ്രാൻഡ് അകൗണ്ട് നം "
                                                            name="account_no">
                                                        @error('account_no')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-4 mb-4">
                                                        IFSC കോഡ് IFSC Code 



                                                        <input type="text" value="{{ old('ifsc_code') }}"
                                                            class="form-control" placeholder="IFSC കോഡ്"
                                                            name="ifsc_code">
                                                        @error('ifsc_code')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                            </div>
                                            {{-- <div class="col-md-6 mb-6">
                                    <label class="form-label">വിദ്യാർത്ഥികൾക്ക് ഇ-ഗ്രാൻഡ് അകൗണ്ട് നമ്പർ ഉണ്ടെങ്കിൽ ബാങ്ക് ശാഖ /ഇ -ഗ്രാൻഡ് അകൗണ്ട് നം 
                                        </label>
                                        <input type="text" class="form-control"   name="account_details" id="account_details" value="" placeholder="വിദ്യാർത്ഥികൾക്ക് ഇ-ഗ്രാൻഡ് അകൗണ്ട് നമ്പർ ഉണ്ടെങ്കിൽ ബാങ്ക് ശാഖ /ഇ -ഗ്രാൻഡ് അകൗണ്ട് നം" />
                                    @error('account_details')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div> --}}

                                            <div class="col-md-6 mb-6">
                                                <label class="form-label">അപേക്ഷകന്റെ ഒപ്പ് <br> <span class="small"> Applicant's signature (Max Size : 2 MB)
                                                  </span>   </label>
                                                <input type="file" class="form-control" accept="image/*"
                                                    name="signature" id="signature" value=""
                                                    placeholder="അപേക്ഷകന്റെ ഒപ്പ് " />
                                                @error('signature')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                                <br>
                                                <span class="text-danger" id="errorsignature"></span>
                                            </div>

                                        </div><br>
                                        <div class="row">


                                            <div class="col-md-6 mb-6">
                                                <label class="form-label">രക്ഷാകർത്താവിന്റെ പേര്  <br> <span class="small">Parent Name </span>

                                                </label>
                                                <input type="text" class="form-control" name="parent_name"
                                                    id="parent_name" value="{{ old('parent_name') }}"
                                                    placeholder="രക്ഷാകർത്താവിന്റെ പേര് " />
                                                @error('parent_name')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-md-6 mb-6">
                                                <label class="form-label">അപേക്ഷകന്റെ ഫോട്ടോ <br> <span class="small">  Applicant's Image( Max size: 2 MB)
                                                   </span> </label>
                                                <input type="file" class="form-control" accept="image/*"
                                                    name="applicant_image" id="applicant_image" value=""
                                                    placeholder="Applicant's Image " />
                                                @error('applicant_image')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                                <br>
                                                <span class="text-danger" id="errorimage"></span>
                                            </div>



                                        </div><br>

                                        <hr>
                                        <div class="row">
                                            <div class="col-md-1 mb-1">
                                            </div>
                                            <div class="col-md-1 mb-1">
                                                <input type="checkbox" id="agree" name="agree" value="Yes"
                                                    required {{ old('agree') == 'Yes' ? 'checked' : '' }}>
                                            </div>
                                            <div class="col-md-9 mb-9">
                                               
                                                 ഞങ്ങൾ മുകളിൽ ചേർത്ത എല്ലാ വിവരങ്ങളും സത്യവും ശരിയുമാണെന്ന് ഇതിനാൽ പ്രതിജ്ഞ
                                                ചെയ്തുകൊള്ളുന്നു. We hereby pledge that all the information we have added above is true and
                                                correct.
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
                                               അപേക്ഷ സമർപ്പിക്കുന്നത്   Submitting the application

                                            </h1>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-6">
                                            <label class="form-label">ജില്ല <br> <span class="small"> District </span></label>
                                            <select id="submitted_district" name="submitted_district"
                                                class="form-control">
                                                <option value="">Select</option>
                                                @foreach ($districts as $district)
                                                    <option value="{{ $district->id }}"
                                                        {{ old('submitted_district') == $district->id ? 'selected' : '' }}>
                                                        {{ $district->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('submitted_district')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            <input type="hidden" name="dist_name" id="dist_name"
                                                value="{{ old('dist_name') }}">
                                        </div>
                                        <div class="col-md-6 mb-6">
                                            <label class="form-label"> ടി .ഇ .ഓ <br> <span class="small"> TEO </span></label>
                                            <select id="submitted_teo" name="submitted_teo" class="form-control">
                                                <option value="">Choose TEO</option>
                                            </select>
                                            @error('submitted_teo')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            <input type="hidden" name="teo_name" id="teo_name"
                                                value="{{ old('teo_name') }}">
                                        </div>
                                    </div><br>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-2 mb-2">

                                </div>
                                <div class="col-md-12 mb-12">

                                    <button type="reset" id="submit1"
                                        class="btn btn-primary waves-effect waves-light text-center submit">Cancel</button>
                                    <button type="submit" id="submit"
                                        class="btn btn-danger waves-effect waves-light text-center submit">Save</button>
                                </div>


                            </div><br>



                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        @if (!empty(old('current_district')))
            var val = document.getElementById("current_district").value;
            $.ajax({
                url: "{{ url('district/fetch-taluk') }}",
                type: "POST",
                data: {
                    district_id: val,
                    _token: '{{ csrf_token() }}'
                },
                success: function(data) {
                    $("#current_taluk").find('option').remove();
                    $("#current_taluk").append('<option value="" selected>Choose Taluk</option>');

                    $.each(data.taluks, function(key, value) {
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

        @if (!empty(old('submitted_district')))
            var val = document.getElementById("submitted_district").value;
            $.ajax({
                url: "{{ url('district/fetch-teo') }}",
                type: "POST",
                data: {
                    district_id: val,
                    _token: '{{ csrf_token() }}'
                },
                success: function(data) {

                    $("#submitted_teo").find('option').remove();
                    $("#submitted_teo").append('<option value="" selected>Choose Teo</option>');

                    $.each(data.teos, function(key, value) {
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
        $('#current_district').change(function() {
            var current_district = this.options[this.selectedIndex].text;
            document.getElementById('current_district_name').value = current_district;
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
                        $opt.appendTo('#current_taluk');


                    });

                }
            });

        });
        $('#current_taluk').change(function() {
            var current_taluk = this.options[this.selectedIndex].text;
            document.getElementById('current_taluk_name').value = current_taluk;
        });
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
                    $("#submitted_teo").append('<option value="" selected>Choose TEO</option>');
                    $.each(result.teos, function(key, value) {
                        var $opt = $('<option>');
                        $opt.val(value._id).text(value.teo_name);
                        $opt.appendTo('#submitted_teo');


                    });

                }
            });

        });
        $('#submitted_teo').change(function() {
            var submitted_teo = this.options[this.selectedIndex].text;
            document.getElementById('teo_name').value = submitted_teo;
        });

        $(document).ready(function() {
            if ($('input[name="admission_type"]:checked').val() === 'others') {
                $('#othersDiv').show();
            }
            $('#income_certificate').change(function() {
                var file = this.files[0];
                if (file) {
                    var fileSize = file.size;

                    // Convert fileSize to megabytes
                    var fileSizeInMB = fileSize / (1024 * 1024);
                    if (fileSizeInMB <= 2) {

                        $('#submit').prop('disabled', false);
                        $('#errorincome').html('')
                    } else {
                        $('#errorincome').html(
                            'File size exceeds the limit of 2 MB. Please choose a smaller file.')
                        // alert('');
                        $('#submit').prop('disabled', true);
                        $('#income_certificate').val('');
                    }
                }
            });

            $('#caste_certificate').change(function() {
                var file = this.files[0];
                if (file) {
                    var fileSize = file.size;

                    // Convert fileSize to megabytes
                    var fileSizeInMB = fileSize / (1024 * 1024);
                    if (fileSizeInMB <= 2) {

                        $('#submit').prop('disabled', false);
                        $('#errorcaste').html('')
                    } else {
                        $('#errorcaste').html(
                            'File size exceeds the limit of 2 MB. Please choose a smaller file.')
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
            $('#signature').change(function() {
                var file = this.files[0];
                if (file) {
                    var fileSize = file.size;

                    // Convert fileSize to megabytes
                    var fileSizeInMB = fileSize / (1024 * 1024);
                    if (fileSizeInMB <= 2) {

                        $('#submit').prop('disabled', false);
                        $('#errorsignature').html('')
                    } else {
                        $('#errorsignature').html(
                            'File size exceeds the limit of 2 MB. Please choose a smaller file.')
                        // alert('');
                        $('#submit').prop('disabled', true);
                        $('#signature').val('');
                    }
                }
            });

            $('#allotment_memo').change(function() {
                var file = this.files[0];
                if (file) {
                    var fileSize = file.size;

                    // Convert fileSize to megabytes
                    var fileSizeInMB = fileSize / (1024 * 1024);
                    if (fileSizeInMB <= 2) {

                        $('#submit').prop('disabled', false);
                        $('#errorAllotment').html('')
                    } else {
                        $('#errorAllotment').html(
                            'File size exceeds the limit of 2 MB. Please choose a smaller file.')
                        // alert('');
                        $('#submit').prop('disabled', true);
                        $('#allotment_memo').val('');
                    }
                }
            });

            $('input[name="admission_type"]').change(function() {

                if ($(this).val() === 'others') {
                    $('#othersDiv').show();
                } else {
                    $('#othersDiv').hide();
                }
            });

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
