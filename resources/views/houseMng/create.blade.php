@extends('layouts.app')

@section('content')
    <!-- main-content -->
    <div class="main-content app-content">
        <!-- container -->
        <div class="main-container container-fluid">
            <!-- breadcrumb -->
            <div class="breadcrumb-header justify-content-between row me-0 ms-0">

                <h4 class="content-title mb-2">പട്ടികവർഗ്ഗ വികസന വകുപ്പിൽനിന്ന് വീടുകളുടെ നവീകരണത്തിനും അധികസൗകര്യങ്ങൾ
                    ഏർപെടുത്തുന്നതിനും പൂർത്തീകരിക്കുന്നതിനുമുള്ള
                    ധനസഹായത്തിനുള്ള അപേക്ഷ
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

                        <form name="patientForm" id="patientForm" method="post" action="{{ route('houseGrant.store') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6 mb-6">
                                                <label class="form-label"> അപേക്ഷകന്റെ പേര് <br> <span class="small">
                                                        Applicant's
                                                        Name</span>
                                                </label>
                                                <input type="text" value="{{ old('name') }}" class="form-control"
                                                    placeholder="Applicant's Name" name="name" />
                                                @error('name')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="col-md-6 mb-6">
                                                <label class="form-label">
                                                    മേൽവിലാസം <br> <span class="small"> Address</span>
                                                </label>
                                                <textarea type="text" value="{{ old('address') }}" class="form-control" placeholder="Address" name="address">{{ old('address') }}</textarea>
                                                @error('address')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div><br>
                                        <div class="row">

                                            <div class="col-md-2 mb-2">
                                                <label class="form-label"> ജില്ല <br> <span class="small">
                                                        District</span></label>
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
                                                <label class="form-label"> താലൂക്ക് <br> <span class="small"> Taluk
                                                    </span></label>
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
                                                <label class="form-label">പിൻകോഡ് <br> <span class="small"> Pincode
                                                    </span></label>
                                                <input type="number" value="{{ old('current_pincode') }}"
                                                    class="form-control" name="current_pincode" placeholder="Pincode" />
                                                @error('current_pincode')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label class="form-label">ഗ്രാമപഞ്ചായത്ത് <br> <span class="small"> Grama
                                                        Panchayat</span>
                                                </label>
                                                <input type="text" value="{{ old('panchayath') }}" class="form-control"
                                                    placeholder="Grama Panchayat" name="panchayath" />

                                                @error('panchayath')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label class="form-label"> വാർഡ് നമ്പർ <br> <span class="small"> Ward
                                                        No</span>
                                                </label>
                                                <input type="number" value="{{ old('ward_no') }}" class="form-control"
                                                    placeholder="Ward No" name="ward_no" />

                                                @error('ward_no')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div><br>
                                        <div class="row">
                                            <div class="col-md-6 mb-6">
                                                <label class="form-label">
                                                    ജാതി <br> <span class="small">Caste </span>
                                                </label>
                                                <input type="text" value="{{ old('caste') }}" class="form-control"
                                                    placeholder="Caste" name="caste" />

                                                @error('caste')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-md-6 mb-6">
                                                <label class="form-label"> വാർഷിക വരുമാനം <br> <span class="small">
                                                        Annual Income</span>
                                                </label>
                                                <input type="number" value="{{ old('annual_income') }}"
                                                    class="form-control" placeholder="Annual Income"
                                                    name="annual_income" />

                                                @error('annual_income')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror

                                            </div>




                                        </div><br>
                                        <div class="row">
                                            <div class="col-md-3 mb-3">
                                                <label class="form-label">ധനസഹായത്തിനപേക്ഷിക്കുന്ന വീടിന്റ അവസ്ഥയും
                                                    അനുവദിച്ച വർഷവും
                                                </label>
                                                <textarea type="text" value="{{ old('house_details') }}" class="form-control"
                                                    placeholder="Condition of the house for which financing is applied for and the year of sanction"
                                                    name="house_details">{{ old('house_details') }}</textarea>
                                                @error('house_details')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label class="form-label"> അനുവദിച്ച ഏജൻസി/
                                                    വകുപ്പ് <br> <span class="small"> Allotting Agency/Department </span>
                                                </label>
                                                <input type="text" value="{{ old('agency') }}" class="form-control"
                                                    placeholder="Allotting Agency/Department" name="agency" />
                                                @error('agency')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="col-md-6 mb-6">
                                                <label class="form-label">വീടുപണി പൂർത്തിയായി അവസാന ഗഡു കൈപ്പറ്റിയ വർഷം
                                                </label>
                                                {{-- <input type="number" id="last_payment_year" class="form-control" name="last_payment_year" min="1000" max="9999" value="{{ old('last_payment_year') }}"> --}}
                                                <select class="form-control last_payment_year" id="last_payment_year"
                                                    name="last_payment_year" data-live-search="true">
                                                    <option value="">Select Year</option>
                                                    @for ($year = date('Y'); $year >= date('Y') - 30; $year--)
                                                        <option value="{{ $year }}"
                                                            {{ old('last_payment_year') == $year ? 'selected' : '' }}>
                                                            {{ $year }}</option>
                                                    @endfor
                                                </select>
                                                @error('last_payment_year')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                        </div><br>

                                        <div class="row">
                                            <div class="col-md-6 mb-6">
                                                <label class="form-label">കുടുംബത്തിന്റെ അവസ്ഥ (അവിവാഹിതരായ :
                                                    അമ്മ, വനിത നാഥയായ കുടുംബം , അകാലത്തിൽ
                                                    വിധവയാകേണ്ടി വന്നവർ , ശാരീരിക മാനസിക
                                                    വേല്ലുവിളി നേരിടുന്നവർ , തീരാവ്യാധി പിടിപ്പെട്ടവർ ,
                                                    അതികർമങ്ങൾക്ക് ഇരയായ വനിതകൾ തുടങ്ങിയവ )

                                                </label>
                                                <textarea type="text" value="{{ old('family_details') }}" class="form-control"
                                                    placeholder="Family status (unmarried: mother, female headed family, premature widows, physically and mentally challenged, terminally ill, abused women, etc.)"
                                                    name="family_details">{{ old('family_details') }}</textarea>

                                                @error('family_details')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-md-6 mb-6">
                                                <label class="form-label">

                                                    ധനസഹായം ആവശ്യപ്പെടുന്ന പ്രവർത്തിയുടെ സ്വഭാവം
                                                    (നവീകരണം / അധിക സൗകര്യം / പൂർത്തീകരണം )<br> <span class="small">
                                                        Nature of work for which
                                                        financial assistance is sought (Innovation /
                                                        Additional convenience / Completion)</span>
                                                </label>
                                                <div style="border: 1px solid black" class="form-control">


                                                    <input type="radio" id="innovation" name="nature_payment"
                                                        value="innovation"
                                                        {{ old('nature_payment') == 'innovation' ? 'checked' : '' }}>
                                                    <label for="innovation">Innovation (നവീകരണം)</label> &nbsp; &nbsp;

                                                    <input type="radio" id="option2" name="nature_payment"
                                                        value="Additional convenience"
                                                        {{ old('nature_payment') == 'Additional convenience' ? 'checked' : '' }}>
                                                    <label for="Additional convenience">Additional convenience (അധിക
                                                        സൗകര്യം)</label>&nbsp; &nbsp;

                                                    <input type="radio" id="option3" name="nature_payment"
                                                        value="Completion"
                                                        {{ old('nature_payment') == 'Completion' ? 'checked' : '' }}>
                                                    <label for="Completion">Completion (പൂർത്തീകരണം)</label>&nbsp; &nbsp;
                                                </div>
                                                @error('marriage_count')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>


                                        </div><br>
                                        <div class="row">
                                            <div class="col-md-6 mb-6">
                                                <label class="form-label">

                                                    നിർദിഷ്ട്ട ആവശ്യത്തിനും മറ്റ് സർക്കാർ വകുപ്പ് /
                                                    ഏജൻസികളിൽനിന്നോ തദ്ദേശ സ്വയംഭരണാ സ്ഥാപനങ്ങളിൽ നിന്നോ
                                                    ധനസഹായം ലഭിച്ചിട്ടുണ്ടോ ? <br> <span class="small"> Has funding been
                                                        received from other
                                                        government departments/agencies or
                                                        local self-government bodies for the specified purpose ?
                                                    </span></label>
                                                <div style="border: 1px solid black" class="form-control">
                                                    <input type="radio" id="innovation" name="payment_details"
                                                        value="yes"
                                                        {{ old('payment_details') == 'yes' ? 'checked' : '' }}>&nbsp;
                                                    &nbsp;

                                                    <label for="yes">Yes ( അതെ)</label> &nbsp; &nbsp;
                                                    &nbsp; &nbsp;

                                                    <input type="radio" id="option2" name="payment_details"
                                                        value="no"
                                                        {{ old('payment_details') == 'no' ? 'checked' : '' }}>

                                                    <label for="No">No (ഇല്ല)</label>

                                                </div><br>
                                                <div class="row" style="display:none" id="paymentDiv">
                                                    <div class="col-md-6 mb-6">
                                                        How much amount ( എത്ര തുക)



                                                        <input type="number" value="{{ old('payment_amount') }}"
                                                            class="form-control" placeholder="How much amount"
                                                            name="payment_amount">
                                                        @error('payment_amount')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-6 mb-6">
                                                        Date received (ലഭിച്ച തീയതി )



                                                        <input type="date" value="{{ old('date_received') }}"
                                                            class="form-control" placeholder="Date received"
                                                            name="date_received">
                                                        @error('date_received')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label class="form-label">മുൻഗണന ലഭിക്കുന്നതിനുള്ള അർഹത
                                                    തെളിയിക്കുന്നതിനുമുള്ള
                                                    മറ്റു സംഗതികൾ



                                                </label>
                                                <textarea type="text" value="{{ old('prove_eligibility ') }}" class="form-control"
                                                    placeholder="Other matters to prove eligibility for preference" name="prove_eligibility">{{ old('prove_eligibility') }}</textarea>

                                                @error('prove_eligibility')
                                                    <span class="text-danger">{{ $message }}</span><br> <span
                                                        class="small">
                                                    @enderror
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label class="form-label"><small>
                                                        ( Max size: 2 MB)
                                                        &nbsp; &nbsp; &nbsp;
                                                    </small>
                                                </label>
                                                <input type="file" class="form-control" accept="pdf/doc"
                                                    name="prove_eligibility_file" id="prove_eligibility_file"
                                                    value="{{ old('prove_eligibility_file') }}" placeholder=" " />

                                                @error('prove_eligibility_file')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                                <br>
                                                <span class="text-danger" id="prove_eligibility_file_error"></span>
                                            </div>



                                        </div><br>

                                        <div class="row">
                                            <div class="col-md-6 mb-6">
                                                <label class="form-label">
                                                    സ്ഥലം <br><span class="small"> Place </span>

                                                </label>
                                                <input type="text" value="{{ old('place') }}" class="form-control"
                                                    placeholder="Place" name="place" />
                                                @error('place')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-md-6 mb-6">
                                                <label class="form-label"> അപേക്ഷകന്റെ ഒപ്പ് <br><span
                                                        class="small">Applicant's signature </span> <br><small>( Max
                                                        size: 2 MB)</small>
                                                </label>
                                                <input type="file" class="form-control" accept="image/*"
                                                    name="signature" id="signature" value=""
                                                    placeholder="Applicant's signature " />
                                                @error('signature')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                                <br>
                                                <span class="text-danger" id="errorsignature"></span>
                                            </div>
                                        </div><br>
                                        <br>
                                        <div class="row">

                                            <div class="col-md-6 mb-6">
                                                <label class="form-label"> അപേക്ഷകന്റെ ഫോട്ടോ <br><span
                                                        class="small">Applicant's Image </span><br><small>( Max size:
                                                        2 MB)</small>
                                                </label>
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

                                        <h5 class="heading">Bank Details / ബാങ്ക് വിശദാംശങ്ങൾ</h5>

                                <div class="row">
                                    <div class="col-md-6 mb-6">
                                        <label class="form-label">ബാങ്ക് നാമം <br><span class="small"> Bank Name </span></label>
                                        <input type="text" value="{{ old('bank_name') }}" class="form-control" placeholder="ബാങ്ക് നാമം" name="bank_name" id="bank_name" required />
                                        @error('bank_name')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
        
                                    <div class="col-md-6 mb-6">
                                        <label class="form-label">അക്കൗണ്ട് നമ്പർ <br><span class="small"> Account Number </span></label>
                                        <input type="text" value="{{ old('account_no') }}" class="form-control" placeholder="അക്കൗണ്ട് നമ്പർ" name="account_no" id="account_no" required />
                                        @error('account_no')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div><br>
        
                                <div class="row">
                                    <div class="col-md-6 mb-6">
                                        <label class="form-label">IFSC കോഡ് <br><span class="small"> IFSC Code </span></label>
                                        <input type="text" value="{{ old('ifsc_code') }}" class="form-control" placeholder="IFSC കോഡ്" name="ifsc_code" id="ifsc_code" required />
                                        @error('ifsc_code')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
        
                                    <div class="col-md-6 mb-6">
                                        <label class="form-label">പാസ്‌ബുക്ക് (Pdf/ചിത്രം പരമാവധി 2 MB) <br><span class="small"> Passbook (Pdf/Image Max Size: 2 MB) </span></label>
                                        <input type="file" class="form-control" name="passbook" id="passbook" required />
                                        @error('passbook')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
        
                                <br>
                                
                                        <br>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-1 mb-1">
                                            </div>
                                            <div class="col-md-1 mb-1">
                                                <input type="checkbox" id="agree" name="agree" value="Yes"
                                                    required {{ old('agree') == 'Yes' ? 'checked' : '' }}>
                                            </div>
                                            <div class="col-md-9 mb-9">
                                                ഞങ്ങൾ മുകളിൽ ചേർത്ത എല്ലാ വിവരങ്ങളും സത്യവും ശരിയുമാണെന്ന് ഇതിനാൽ
                                                പ്രതിജ്ഞ ചെയ്തുകൊള്ളുന്നു.
                                                <br><span class="small"> We hereby pledge that all the information we have
                                                    added above is true and
                                                    correct.</span>
                                            </div>
                                        </div>
                                        <br>



                                    </div>
                                </div>
                            </div>


                            <div class="card">
                                <div class="card-body">
                                    <div class="row mt-5">
                                        <div class="col-12">
                                            <h1
                                                style="text-align: center;color: rgb(0, 0, 0);font-size: medium; text-decoration: underline; padding: 10px;line-height: 32px;font-weight: 600;">
                                                അപേക്ഷ സമർപ്പിക്കുന്നത്

                                            </h1>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-6">
                                            <label class="form-label">ജില്ല <br><span class="small">District
                                                </span></label>
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
                                            <label class="form-label"> ടി .ഇ .ഓ <br><span
                                                    class="small">TEO</span></label>
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
                                        class="btn btn-primary waves-effect waves-light text-start submit">Cancel</button>
                                    <button type="submit" id="submit"
                                        class="btn btn-danger waves-effect waves-light text-start submit">Save</button>
                                </div>


                            </div><br>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script type="text/javascript">
        $(function() {


            //   $("#last_payment_year").datepicker({
            //     dateFormat: 'yy',
            //     changeMonth: false,
            //     changeYear: true,
            //     onSelect: function (dateText, inst) {
            //       var year = inst.selectedYear;
            //       $(this).val(year);
            //     }
            //   });
        });

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


        $(document).ready(function() {
            // $('.selectpicker').selectpicker();
            $('input[name="payment_details"]').change(function() {
                // alert('djhfggj');

                if ($(this).val() === 'yes') {
                    $('#paymentDiv').show();
                } else {
                    $('#paymentDiv').hide();
                }
            }).change();
            $('input[name="payment_details"]:checked').change();
            // Trigger the change event initially
        });
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
                    var oldValue = "{{ old('current_taluk') }}";
                    $("#current_taluk").val(oldValue);
                }
            });

        });
        $('#current_taluk').change(function() {
            var current_taluk = this.options[this.selectedIndex].text;
            document.getElementById('current_taluk_name').value = current_taluk;
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

            $('#prove_eligibility_file').change(function() {
                var file = this.files[0];
                if (file) {
                    var fileSize = file.size;

                    // Convert fileSize to megabytes
                    var fileSizeInMB = fileSize / (1024 * 1024);
                    if (fileSizeInMB <= 2) {

                        $('#submit').prop('disabled', false);
                        $('#prove_eligibility_file_error').html('')
                    } else {
                        $('#prove_eligibility_file_error').html(
                            'File size exceeds the limit of 2 MB. Please choose a smaller file.')
                        // alert('');
                        $('#submit').prop('disabled', true);
                        $('#prove_eligibility_file').val('');
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
            $('input[name="current_pincode"]').on('input', function() {
                this.value = this.value.replace(/[^0-9]/g, '').substring(0, 6);
            });
            $('#example').DataTable();
        });
    </script>
    <!-- main-content-body -->
@endsection
