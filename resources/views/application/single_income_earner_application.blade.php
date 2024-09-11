@extends('layouts.app')

@section('content')
    <!-- main-content -->
    <div class="main-content app-content">
        <!-- container -->
        <div class="main-container container-fluid">
            <!-- breadcrumb -->
            <div class="breadcrumb-header justify-content-between row me-0 ms-0">
                <div class="col-md-12">

                    <h4 class="text-white">ഏക വരുമാന ദായകൻ മരണപ്പെട്ട പട്ടിക വർഗ്ഗ വിഭാഗ കുടുംബങ്ങൾക്കുള്ള ധനസഹായം
                        അപേക്ഷ ഫോറം </h4>

                </div>

                @if ($message = Session::get('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><i
                                class="fa fa-window-close"></i></button> {{ $message }}
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

                            <form name="userForm" id="userForm" method="post"
                                action="{{ url('singleIncomeEarnerPreview') }}" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group">

                                    <h5 class="form-label">Part 1</h5>
                                    <br>
                                    <h4>  അപേക്ഷകനെ യെ സംബന്ധിച്ച വിവരങ്ങൾ / information about the applicant </h4>
                                    <br>
                                    
                                    </label>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label"> പേര്  <br><span class="small"> Name</span></label> 
                                            <input type="text" value="{{ old('applicant_name') }}" class="form-control"
                                                name="applicant_name" placeholder="പേര്" />
                                            @error('applicant_name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">  ഇമെയിൽ <br><span class="small">Email </span></label> 
                                            <input type="text" value="{{ old('applicant_email') }}" class="form-control"
                                                name="applicant_email" placeholder="ഇമെയിൽ" />
                                            @error('applicant_email')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <br>
                                    <label class="form-label">  ജാതി,
                                        ( തഹസിൽദാരിൽ നിന്നുള്ള സാക്ഷ്യപത്രം ഹാജരാക്കണം )<br><span class="small">caste (Certificate from Tehsildar should be produced) 
                                        </span></label>
                                    <div class="row">
                                        <div class="col-md-6">
                                             ജാതി  / caste
                                            <input type="text" value="{{ old('applicant_caste') }}" class="form-control"
                                                placeholder="ജാതി" name="applicant_caste" />
                                            @error('applicant_caste')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            തഹസിൽദാരിൽ നിന്നുള്ള സാക്ഷ്യപത്രം അപ്‌ലോഡ് ചെയുക  / Certificate from Tehsildar 
                                            <input type="file" value="{{ old('caste_certificate') }}"
                                                class="form-control" placeholder="" name="caste_certificate" id="caste_certificate" onchange="validateImage('caste_certificate','caste_certificate_error')" />
                                            <span class="text-muted small">(File less than 2 mb. jpg & pdf only. / ഫയൽ: 2
                                                എംബി കുറഞ്ഞത്, JPG/PDF
                                                മാത്രം.)</span>
                                            @error('caste_certificate')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            <div id="caste_certificate_error" style="color:red;">
                                            </div>
                                        </div>
                                    </div>
                                    <br>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label">  മേൽവിലാസം <br><span class="small"> Address</span> </label>
                                            <textarea type="text" value="{{ old('address') }}" class="form-control" placeholder="മേൽവിലാസം" name="address"></textarea>
                                            @error('address')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror

                                        </div>
                                        <div class="col-md-6 d-flex">
                                            <div class="col-md-4 mb-4">
                                                <label class="form-label">ജില്ല <br><span class="small">District </span></label>
                                                <select id="district" name="district" class="form-control">
                                                    <option value="">Select</option>
                                                    @foreach ($districts as $district)
                                                        <option value="{{ $district->id }}"
                                                            {{ old('district') == $district->id ? 'selected' : '' }}>
                                                            {{ $district->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('district')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                                <input type="hidden" name="district_name" id="district_name"
                                                    value="">
                                            </div>
                                            <div class="col-md-4 mb-4">
                                                <label class="form-label"> താലൂക്ക് <br><span class="small">Taluk</span> </label>
                                                <select id="taluk" name="taluk" class="form-control">
                                                    <option value="">Choose Taluk</option>
                                                </select>
                                                @error('taluk')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                                <input type="hidden" name="taluk_name" id="taluk_name" value="">
                                            </div>
                                            <div class="col-md-4 mb-4">
                                                <label class="form-label"> പിൻകോഡ് <br><span class="small">Pincode </span> </label>
                                                <input type="text" value="{{ old('pincode') }}" class="form-control"
                                                    name="pincode" placeholder="പിൻകോഡ്" inputmode="numeric"
                                                    inputmode="numeric" pattern="[0-9]{6}" maxlength="6"
                                                    oninput="this.value = this.value.replace(/[^0-9]/g, '');" />
                                                @error('pincode')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>


                                    </div><br>




                                    <label class="form-label">മരണപ്പെട്ടയാളുമായുള്ള ബന്ധം <br><span class="small"> relation to the deceased person 
                                    </span></label>
                                    <div class="row">
                                        <div class="col-md-12">
                                            {{-- <input type="text" value="{{ old('relation_with_person') }}"
                                                class="form-control"
                                                placeholder="അയാളും ഉള്ള ബന്ധം മരണപ്പെട്ടയാളുമായുള്ള ബന്ധം"
                                                name="relation_with_person" /> --}}

                                            <select class="form-control" name="relation_with_person">
                                                <option value="" selected disabled>Select a relationship </option>
                                                @foreach ([
            'father' => 'Father / അച്ഛൻ',
            'mother' => 'Mother / അമ്മ',
            'sibling' => 'Sibling / സഹോദര/സഹോദരി',
            'spouse' => 'Spouse / ഭാര്യ/ഭര്‍ത്ത',
            'friend' => 'Friend / സുഹൃത്ത്',
            'relative' => 'Relative / ബന്ധു',
            'colleague' => 'Colleague / സഹോദര',
            'other' => 'other / മറ്റുള്ളവ ',
        ] as $value => $label)
                                                    <option value="{{ $value }}"
                                                        @if (old('relation_with_person') == $value) selected @endif>
                                                        {{ $label }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('relation_with_person')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <br>
                                    <label class="form-label">  ആധാർ നം (പകർപ്പ് സഹിതം) <br><span class="small">Aadhar No. (submit the copy) </span>
                                    </label>
                                    <div class="row">
                                        <div class="col-md-6">
                                          ആധാർ നം  /  Aadhar No. 
                                            <input type="text" pattern="[0-9]{12}" maxlength="12"
                                                value="{{ old('applicant_aadhar_no') }}" class="form-control"
                                                placeholder="ആധാർ നം" name="applicant_aadhar_no" inputmode="numeric"
                                                oninput="this.value = this.value.replace(/[^0-9]/g, '');" />
                                            @error('applicant_aadhar_no')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">പകർപ്പ് സഹിതം അപ്‌ലോഡ് ചെയുക /
                                            Upload Aadhar card image 
                                            <input type="file"  class="form-control"
                                                placeholder="ആധാർ നം" id="adhaar_copy" name="adhaar_copy" onchange="validateImage('adhaar_copy','adhaar_copy_error')" />
                                            <span class="text-muted small">(File less than 2 mb. jpg & pdf only. / ഫയൽ: 2
                                                എംബി കുറഞ്ഞത്, JPG/PDF
                                                മാത്രം.)</span>
                                            @error('adhaar_copy')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            <div id="adhaar_copy_error" style="color:red;">
                                            </div>
                                        </div>
                                    </div>
                                    <br>

                                    <label class="form-label">
                                        ഫോൺ നമ്പർ <br><span class="small">Phone No.</span>
                                    </label>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input type="text" value="{{ old('applicant_phone') }}"
                                                class="form-control" maxlength="12" placeholder="ഫോൺ നമ്പർ"
                                                name="applicant_phone" inputmode="numeric"
                                                oninput="this.value = this.value.replace(/[^0-9]/g, '');" />
                                            @error('applicant_phone')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <br>

                                    <label class="form-label">ബാങ്ക് അക്കൗണ്ട് വിവരങ്ങൾ (പകർപ്പ്
                                        സഹിതം) <br><span class="small">Bank account details </span>
                                    </label>
                                    <div class="row d-flex align-items-end">
                                        <div class="col-md-4">
                                            <label class=""> ബാങ്ക് അക്കൗണ്ട് നം <br><span class="small"> Account number </span></label>
                                            <input type="text" value="{{ old('bank_account_no') }}"
                                                class="form-control" placeholder="ബാങ്ക് അക്കൗണ്ട്  "
                                                name="bank_account_no" />
                                            @error('bank_account_no')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <label class="">ബാങ്ക് അക്കൗണ്ട് IFSC നം <br><span class="small"> Branch IFSC code </span> </label>
                                            <input type="text" value="{{ old('bank_account_ifsc') }}"
                                                class="form-control" placeholder="ബാങ്ക് അക്കൗണ്ട് IFSC നം  "
                                                name="bank_account_ifsc" />
                                            @error('bank_account_ifsc')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <label class="">ബാങ്ക് അക്കൗണ്ട് പകർപ്പ് 
                                                അപ്‌ലോഡ് ചെയുക  <br><span class="small">Upload the copy of passbook</span> </label>
                                            <input type="file" onchange="validateImage('passbook_copy','passbook_copy_error')" value="{{ old('passbook_copy') }}"
                                                class="form-control" id="passbook_copy" placeholder="ബാങ്ക് അക്കൗണ്ട് IFSC നം  "
                                                name="passbook_copy" />
                                            <span class="text-muted small">(File less than 2 mb. jpg & pdf only. / ഫയൽ: 2
                                                എംബി കുറഞ്ഞത്, JPG/PDF
                                                മാത്രം.)</span>
                                            @error('passbook_copy')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            <div id="passbook_copy_error" style="color:red;">
                                            </div>
                                        </div>
                                    </div>
                                    <br>


                                    <h5 class="form-label">Part 2</h5>

                                    <br>
                                    <h4> മരണപ്പെട്ടയാളെ സംബന്ധിച്ചു വിവരങ്ങൾ / Information about the deceased </h4>
                                    <br>

                                    <label class="form-label">  പേര് <br><span class="small"> Name</span>
                                    </label>
                                    <div class="row">
                                        <div class="col-md-6">

                                            <input type="text" value="{{ old('deceased_person_name') }}"
                                                class="form-control" placeholder="പേര്" name="deceased_person_name" />
                                            @error('deceased_person_name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <br>

                                    <label class="form-label">ജാതി <br><span class="small"> Caste </span>
                                    </label>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input type="text" value="{{ old('deceased_person_caste') }}"
                                                class="form-control" placeholder="ജാതി" name="deceased_person_caste" />
                                            @error('deceased_person_caste')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <br>


                                    <label class="form-label">  ജനന തീയതി  <br><span class="small"> Date of birth </span>
                                    </label>
                                    <div class="row ">
                                        <div class="col-md-6">
                                            <input type="date" value="{{ old('date_of_birth') }}"
                                                class="form-control" placeholder="ജനന തീയതി" name="date_of_birth" />
                                            @error('date_of_birth')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <br>
                                    <label class="form-label">മരണ തീയതി (മരണ
                                        സർട്ടിഫിക്കറ്റിന്റെ പകർപ്പ് ഹാജരാക്കുക )  <br><span class="small">Date of Death (submit the death certificate) </span>
                                    </label>
                                    <div class="row d-flex align-items-end">
                                        <div class="col-md-4">
                                             മരണ തീയതി / Date of death 
                                            <input type="date" value="{{ old('date_of_death') }}"
                                                class="form-control" placeholder="മരണ തീയതി " name="date_of_death"
                                                max="{{ now()->format('Y-m-d') }}" />
                                            @error('date_of_death')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            വയസ്സ് / Age 
                                            <input type="text" value="{{ old('deceased_person_age') }}"
                                                class="form-control" placeholder="വയസ്സ്" name="deceased_person_age"
                                                inputmode="numeric" maxlength="3"
                                                oninput="this.value = this.value.replace(/[^0-9]/g, '');" />
                                            @error('deceased_person_age')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            മരണ സർട്ടിഫിക്കറ്റിന്റെ പകർപ്പ് അപ്‌ലോഡ്
                                            ചെയുക / Upload the death certificate image 
                                            <input type="file" onchange="validateImage('death_certificate','death_certificate_error')" value="{{ old('death_certificate') }}"
                                                class="form-control" id="death_certificate" placeholder="വയസ്സ് " name="death_certificate" />
                                            <span class="text-muted small">(File less than 2 mb. jpg & pdf only. / ഫയൽ: 2
                                                എംബി കുറഞ്ഞത്, JPG/PDF
                                                മാത്രം.)</span>
                                            @error('death_certificate')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            <div id="death_certificate_error" style="color:red;">
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <label class="form-label"> മരണ കാരണം <br><span class="small">  Reason of death</span> 
                                    </label>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input type="text" value="{{ old('cause_of_death') }}"
                                                class="form-control" id="cause_of_death" placeholder="മരണ കാരണം " name="cause_of_death" />
                                            @error('cause_of_death')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <br>


                                    <label class="form-label"> ചെയ്തിരുന്ന തൊഴിൽ ( ഏക വരുമാന
                                        ദായകനായിരുന്നു എന്നത്
                                        സംബന്ധിച്ച് തഹസിൽദാരിൽ നിന്നുള്ള സാക്ഷ്യപത്രം ഹാജരാക്കണം) <br><span class="small"> Job of the decreased person 
                                  </span>  </label>
                                    <div class="row d-flex align-items-end">
                                        <div class="col-md-6">
                                           ചെയ്തിരുന്ന തൊഴിൽ  / Job  

                                            <input type="text" value="{{ old('past_job') }}" class="form-control"
                                                placeholder="ചെയ്തിരുന്ന തൊഴിൽ " name="past_job" />
                                            @error('past_job')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                           തഹസിൽദാരിൽ നിന്നുള്ള സാക്ഷ്യപത്രം
                                            ഹാജരാക്കുക /  Upoad the document form the Tehsildar 

                                            <input type="file" onchange="validateImage('past_job_document','past_job_document_error')" value="{{ old('past_job_document') }}"
                                                class="form-control" id="past_job_document" name="past_job_document" />
                                            <span class="text-muted small">(File less than 2 mb. jpg & pdf only. / ഫയൽ: 2
                                                എംബി കുറഞ്ഞത്, JPG/PDF
                                                മാത്രം.)</span>
                                            @error('past_job_document')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            <div id="past_job_document_error" style="color:red;">
                                            </div>
                                        </div>
                                    </div>
                                    <br>




                                    <h5 class="form-label">Part 3</h5>
                                    <br>
                                    <h4> മരണപെട്ടയാളുടെ കുടുംബ വിവരങ്ങൾ / Family details of the deceased  </h4>
                                    <br>
                                    <label class="form-label"> ആകെ
                                        കുടുംബാഗങ്ങൾ ( റേഷൻ കാർഡിന്റെ പകർപ്പ് ഹാജരാക്കണം )<br><span class="small"> Total family members (Upload the ration card image) 
                                  </span>  </label>

                                    <br>
                                    <div class="row">
                                        <div class="col-md-6">
                                            ആകെ കുടുംബാഗങ്ങൾ / Total family members
                                            <input type="text" value="{{ old('total_members') }}"
                                                class="form-control" placeholder="Total Members in family"
                                                name="total_members" />
                                            @error('total_members')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="col-md-6">
                                            റേഷൻ കാർഡിന്റെ പകർപ്പ് അപ്‌ലോഡ് ചെയുക / Upload the ration card image 
                                            <input type="file" onchange="validateImage('ration_card','ration_card_error')" value="{{ old('ration_card') }}" class="form-control"
                                                placeholder="Total Members in family" id="ration_card" name="ration_card" />
                                            <span class="text-muted small">(File less than 2 mb. jpg & pdf only. / ഫയൽ: 2
                                                എംബി കുറഞ്ഞത്, JPG/PDF
                                                മാത്രം.)</span>
                                            @error('ration_card')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            <div id="ration_card_error" style="color:red;">
                                            </div>
                                        </div>
                                    </div>

                                    <br>

                                   

                                    <label class="form-label"> കടുബാംഗങ്ങളിൽ 18 നും 70 നും മദ്ധ്യേ പ്രയമായവരുടെ പേരും
                                        തൊഴിലും വരുമാനവും <br> <span class="small">Name, occupation and income of dependents aged between 18
                                        and 70 </span>  </label>

                                    <div class="row">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label for=""> പേര് <br> <span class="small">Name </span></label>
                                            </div>
                                            <div class="col-md-3">
                                                <label for=""> തൊഴിൽ <br> <span class="small">Job</span> </label>
                                            </div>
                                            <div class="col-md-3">
                                                <label for=""> വരുമാനം <br> <span class="small">Salery </span></label>
                                            </div>
                                        </div>

                                        <div class="row addRow">
                                            <div class="col-md-3">
                                                <input type="text"
                                                    value="{{ htmlspecialchars(old('name')[0] ?? '') }}"
                                                    class="form-control single__income__earner--add--imputbox "
                                                    placeholder="പേര്" name="name[]" />
                                                @error('name')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>


                                            <div class="col-md-3">
                                                <input type="text" value="{{ htmlspecialchars(old('job')[0] ?? '') }}"
                                                    class="form-control single__income__earner--add--imputbox "
                                                    placeholder="തൊഴിൽ" name="job[]" />
                                                <span id="nameError" class="text-danger"></span>
                                                @error('job')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="col-md-3">
                                                <input type="text"
                                                    value="{{ htmlspecialchars(old('salary')[0] ?? '') }}"
                                                    class="form-control single__income__earner--add--imputbox "
                                                    placeholder="വരുമാനം" name="salary[]" />
                                                <span id="nameError" class="text-danger"></span>
                                                @error('salary')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="col-md-3">
                                                {{-- <a class="btn btn-danger delete">-</a> --}}
                                                <a class="btn btn-success add">+</a>
                                            </div>
                                        </div>


                                        @php
                                            $i = 0;
                                            // $oldValues = old() ? json_decode(json_encode(old()), true) : [];
                                        @endphp

                                        @if (!empty(old('name')))
                                            @foreach (old('name') as $item)
                                                @php
                                                    $i++;
                                                @endphp

                                                <div class="row addRow">
                                                    <div class="col-md-3">
                                                        <input type="text" value="{{ old('name')[$i] ?? '' }}"
                                                            class="form-control single__income__earner--add--inputbox"
                                                            placeholder="പേര്" name="name[]" />
                                                        @error('name')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>

                                                    <div class="col-md-3">
                                                        <input type="text" value="{{ old('job')[$i] ?? '' }}"
                                                            class="form-control single__income__earner--add--inputbox"
                                                            placeholder="തൊഴിൽ" name="job[]" />
                                                        @error('job')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>

                                                    <div class="col-md-3">
                                                        <input type="text" value="{{ old('salary')[$i] ?? '' }}"
                                                            class="form-control single__income__earner--add--inputbox"
                                                            placeholder="വരുമാനം" name="salary[]" />
                                                        @error('salary')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>

                                                    <div class="col-md-3">
                                                        {{-- <a class="btn btn-success add">+</a> --}}
                                                        <a class="btn btn-danger delete">-</a>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif




                                        <div id="items"></div>

                                    </div>
                                    <br>



                                    <label class="form-label"> 
                                        കുടുംബ വാർഷിക വരുമാനം ( വില്ലജ് ഓഫീസറിൽ
                                        നിന്നുള്ള
                                        സാക്ഷ്യപത്രം ഹാജരാകണം ) <br> <span class="small"> Annual income of the family (Upload income certificate )</span> </label>
                                    <div class="row">
                                        <div class="col-md-6">
                                          കുടുംബ വാർഷിക വരുമാനം / Annual family income 
                                            <input type="text" value="{{ old('annual_income') }}"
                                                class="form-control" placeholder="വാർഷിക വരുമാനം" name="annual_income" />
                                            @error('annual_income')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            വില്ലജ് ഓഫീസറിൽ
                                            നിന്നുള്ള
                                            സാക്ഷ്യപത്രം ഹാജരാകണം അപ്‌ലോഡ് ചെയുക / Upload Certificate of Attendance from Village Officer 
                                            <input type="file" onchange="validateImage('income_certificate','income_certificate_error')" value="{{ old('income_certificate') }}"
                                                class="form-control" id="income_certificate" placeholder="വാർഷിക വരുമാനം"
                                                name="income_certificate" />
                                            <span class="text-muted small">(File less than 2 mb. jpg & pdf only. / ഫയൽ: 2
                                                എംബി കുറഞ്ഞത്, JPG/PDF
                                                മാത്രം.)</span>
                                            @error('income_certificate')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            <div id="income_certificate_error" style="color:red;">
                                            </div>
                                        </div>


                                    </div><br>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label">  നിലവിൽ
                                                കുടുംബത്തിന്റെ വരുമാന സ്രോതസ്സ് <br> <span class="small">Current source of income for the family</span> </label>
                                            <input type="text" value="{{ old('income_source') }}"
                                                class="form-control" placeholder="വരുമാന സ്രോതസ്സ്"
                                                name="income_source" />
                                            @error('income_source')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">' അപേക്ഷകന്റെ ഒപ്പു <br> <span class="small">Applicant's Signature </span></label>
                                            <input type="file" value="{{ old('signature') }}" class="form-control"
                                                name="signature" required accept="image/*" />
                                            <span class="text-muted small">(File less than 2 mb. jpg only. / ഫയൽ: 2 എംബി
                                                കുറഞ്ഞത്, JPG
                                                മാത്രം.)</span>
                                            @error('signature')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-6 mb-6">
                                            <label class="form-label">
                                                അപേക്ഷകന്റെ ഫോട്ടോ <br> <span class="small"> Applicant's Image  </span></label>
                                            <input type="file" class="form-control" accept="image/*"
                                                name="applicant_image" id="applicant_image" 
                                                required />
                                                <span class="text-muted small">(File less than 2 mb. image only. / ഫയൽ: 2 എംബി
                                                    കുറഞ്ഞത്,
                                                   image
                                                    മാത്രം.)</span>
                                            @error('applicant_image')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            <br>
                                            <span class="text-danger" id="errorimage"></span>
                                        </div>
                                    </div>

                                    <br>

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




                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-6 mb-6">
                                                    <label class="form-label">  ജില്ല <br> <span class="small">District </span> </label>
                                                    <select id="submitted_district" name="submitted_district"
                                                        class="form-control">
                                                        <option value="">Select</option>
                                                        @foreach ($districts as $district)
                                                            <option value="{{ $district->id }}"
                                                                {{ old('submitted_district') == $district->id ? 'selected' : '' }}>
                                                                {{ $district->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('dist')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                    <input type="hidden" name="dist_name" id="dist_name"
                                                        value="">
                                                </div>
                                                <div class="col-md-6 mb-6">
                                                    <label class="form-label"> ടി ഇ ഓ <br> <span class="small"> TEO </span></label>
                                                    <select id="submitted_teo" name="submitted_teo" class="form-control">
                                                        <option value="">Choose TEO</option>
                                                    </select>
                                                    @error('teo')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                    <input type="hidden" name="teo_name" id="teo_name" value="">
                                                </div>
                                            </div><br>
                                        </div>
                                    </div>




                                </div>
                                <br>

                                <button type="submit" id="submit"
                                    class="btn btn-danger w-15 waves-effect waves-light text-center">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript">
        //duplication code starts here.
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

        function validateImage(inputId, errorMessageId) {

            var input = document.getElementById(inputId);
            var errorMessage = document.getElementById(errorMessageId);
            var submitButton = document.getElementById('submit');

            if (input.files.length > 0) {
                var fileSize = input.files[0].size; // in bytes
                var maxSize = 2 * 1024 * 1024; // 2MB

                if (fileSize > maxSize) {
                    errorMessage.innerText = 'Error: Image size exceeds 2MB limit';
                    input.value = ''; // Clear the file input
                    submitButton.disabled = true;
                } else {
                    errorMessage.innerText = '';
                    submitButton.disabled = false;
                }
            }
        }


        $(document).ready(function() {
            let count = 1;

            $(".add").click(function(e) {
                e.preventDefault();

                // Increment the count for each new row.
                count++;

                // Access old input values.
                var nameValue = $(this).closest(".addRow").data('name') || '';
                var jobValue = $(this).closest(".addRow").data('job') || '';
                var salaryValue = $(this).closest(".addRow").data('salary') || '';

                // Build the HTML using jQuery.
                var html = '<div class="row addRow">' +
                    '<div class="col-md-3">' +
                    '<input type="text" class="form-control single__income__earner--add--inputbox" placeholder="പേര്" name="name[]" />' +
                    '<span class="text-danger error-message" id="nameError' + count +
                    '"></span>' +
                    '</div>' +

                    '<div class="col-md-3">' +
                    '<input type="text" class="form-control single__income__earner--add--inputbox" placeholder="തൊഴിൽ" name="job[]" />' +
                    '<span class="text-danger error-message" id="jobError' + count +
                    '"></span>' +
                    '</div>' +

                    '<div class="col-md-3">' +
                    '<input type="text" class="form-control single__income__earner--add--inputbox" placeholder="വരുമാനം" name="salary[]" />' +
                    '<span class="text-danger error-message" id="salaryError' + count +
                    '"></span>' +
                    '</div>' +

                    '<div class="col-md-3">' +
                    '<a class="btn btn-danger delete">-</a>' +
                    '</div>' +
                    '</div>';

                // Append the newly built HTML to the "#items" div
                $("#items").append(html);

                // Set the values after appending the HTML if needed
                // $(".addRow:last-child input[name='name[]']").val(nameValue);
                // $(".addRow:last-child input[name='job[]']").val(jobValue);
                // $(".addRow:last-child input[name='salary[]']").val(salaryValue);
            });

            $("body").on("click", ".delete", function(e) {
                $(this).closest(".addRow").remove();
            });
        });



        //duplication code ends here.



        $(document).ready(function() {
            $('input[name="apart_for_any_period"]').change(function() {
                if ($(this).val() === 'Yes') {
                    $('#additionalDiv').show();
                } else {
                    $('#additionalDiv').hide();
                }
            });
        });


        //alll the rest code.
        $('#district').change(function() {
            var districtName = this.options[this.selectedIndex].text;
            document.getElementById('district_name').value = districtName;
            var val = document.getElementById("district").value;

            $.ajax({
                url: "{{ url('district/fetch-taluk') }}",
                type: "POST",
                data: {
                    district_id: val,
                    _token: '{{ csrf_token() }}'
                },
                dataType: 'json',
                success: function(result) {
                    $("#taluk").find('option').remove();
                    $("#taluk").append('<option value="" selected>Choose Taluk</option>');

                    $.each(result.taluks, function(key, value) {
                        var $opt = $('<option>');
                        $opt.val(value._id).text(value.taluk_name);

                        // Set the selected attribute based on the old submitted value
                        if ('{{ old('taluk') }}' == value._id) {
                            $opt.attr('selected', 'selected');
                        }

                        $opt.appendTo('#taluk');
                    });
                }
            });
        });

        function fetchTaluk() {
            var val = document.getElementById("district").value;


            $.ajax({
                url: "{{ url('district/fetch-taluk') }}",
                type: "POST",
                data: {
                    district_id: val,
                    _token: '{{ csrf_token() }}'
                },
                dataType: 'json',
                success: function(result) {
                    $("#taluk").find('option').remove();
                    $("#taluk").append('<option value="" selected>Choose Taluk</option>');

                    $.each(result.taluks, function(key, value) {
                        var $opt = $('<option>');
                        $opt.val(value._id).text(value.taluk_name);

                        // Set the selected attribute based on the old submitted value
                        if ('{{ old('taluk') }}' == value._id) {
                            $opt.attr('selected', 'selected');
                        }

                        $opt.appendTo('#taluk');
                    });
                }
            });
        }


        $('#taluk').change(function() {
            var talukName = this.options[this.selectedIndex].text;
            document.getElementById('taluk_name').value = talukName;
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





        // Call the function on page load
        $(document).ready(function() {
            fetchTeo();
            fetchTaluk();
        });






        $('#submitted_teo').change(function() {
            var submitted_teo = this.options[this.selectedIndex].text;
            document.getElementById('teo_name').value = submitted_teo;
        });

        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>

    <!-- main-content-body -->
@endsection
