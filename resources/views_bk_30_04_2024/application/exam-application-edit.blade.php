@extends('layouts.app')

@section('content')
    <!-- main-content -->
    <div class="main-content app-content">
        <!-- container -->
        <div class="main-container container-fluid">
            <!-- breadcrumb -->
            <div class="breadcrumb-header justify-content-between row me-0 ms-0">
                <div class="col-md-12">

                    <h4 class="content-title mb-2">അയ്യങ്കാളി ടാലന്റ് സേർച്ച് &ഡെവലപ്പ്മെന്റ് സ്‌കീം പ്രവേശന പരീക്ഷക്കുള്ള അപേക്ഷ
                    </h4>

                </div>

                @if ($message = Session::get('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><i
                                class="fa fa-window-close"></i></button> {{ $message }}
                    </div>
                @endif

                <!-- /breadcrumb -->

            </div>
            <div class="main-content-body">
                <div class="row row-sm mt-4">
                    <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12 ">


                        <form name="userForm" id="userForm" method="post" action="{{ route('examApplicationUpdate', ['id' => $datas->id]) }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="card">
                                <div class="card-body">

                                    <br>
                                    <div class="row">


                                        <div class="col-md-6 mb-6">
                                            <label class="form-label"> സ്ക്കൂളിന്റെ പേര് <br><span class="small"> Name</span> </label>
                                            <input type="text" value="{{ old('school_name') }}" class="form-control"
                                                placeholder="School Name" name="school_name" />
                                            @error('school_name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="col-md-6 mb-6">
                                            <label class="form-label">വിദ്യാർത്ഥിയുടെ പേര് <br><span class="small">Student Name</span></label>
                                            <input type="text" value="{{ old('student_name') }}" class="form-control"
                                                placeholder="Student Name" name="student_name" />

                                            @error('student_name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>


                                    </div><br>
                                    <div class="row">
                                        <div class="col-md-6 mb-6">
                                            <label class="form-label"> ആൺകുട്ടിയോ/ പെൺകുട്ടിയോ <br><span class="small"> Gender</span></label>
                                            <div class="col-md-6 d-flex">
                                                <label class="form-label">Male</label>
                                                <input class="form-control" type="radio" name="gender" value="Male"
                                                    @if (old('gender') == 'Male') checked @endif>

                                                <label class="form-label">Female</label>
                                                <input class="form-control" type="radio" name="gender" value="Female"
                                                    @if (old('gender') == 'Female') checked @endif>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-6">
                                            <label class="form-label"> വിലാസം <br><span class="small"> Address</span> </label>
                                            {{-- <label class="form-label"> വീട്ടുപേര് <br><span class="small"> House Name </span></label> --}}
                                            <textarea class="form-control" placeholder="House Name" name="address"></textarea>
                                            <span id="nameError" class="text-danger"></span>
                                            @error('address')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                      
                                    </div><br>
                                    
                                    <div class="row">
                                        
                                        <div class="col-md-6 mb-6">
                                            <div class="row">
                                                <div class="col-md-4 mb-4">
                                                    <label class="form-label">  ജില്ല <br><span class="small"> District </span> </label>
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
                                                    <label class="form-label">  താലൂക്ക് <br><span class="small">Taluk </span></label>
                                                    <select id="taluk" name="taluk" class="form-control">
                                                        <option value="">Choose Taluk</option>
                                                    </select>
                                                    @error('taluk')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                    <input type="hidden" name="taluk_name" id="taluk_name" value="">
                                                </div>
                                                <div class="col-md-4 mb-4">
                                                    <label class="form-label"> പിൻകോഡ് <br><span class="small">Pincode</span> </label>
                                                    <input placeholder="Pincode" type="text" pattern="[0-9]{6}" maxlength="6"
                                                    value="{{ old('pincode') }}" class="form-control"
                                                    name="pincode" title="Please enter a 6-digit numeric pin code"
                                                    inputmode="numeric" oninput="this.value = this.value.replace(/[^0-9]/g, '');"/>
                                         
                                                    @error('pincode')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                

                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-6">
                                            <label class="form-label"> 
                                                രക്ഷാധികാരിയുടെ പേര് <br><span class="small"> Guardian  Name</span> </label>
                                            <input class="form-control" placeholder="Guardian Name"
                                                value="{{ old('parent_name') }}" name="parent_name" />
                                            <span id="nameError" class="text-danger"></span>
                                            @error('parent_name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                    </div><br>
                                    <div class="row">
                                        <div class="col-md-6 mb-6">
                                            <label class="form-label"> രക്ഷിതാവിനു കുട്ടിയുമായുള്ള ബന്ധം <br><span class="small"> Relation</span> </label>
                                            <select class="form-select" name="relation">
                                                <option value="" disabled>Select a relationship</option>
                                                <option value="father" @if (old('relation') == 'father') selected @endif>
                                                    Father / അച്ഛൻ</option>
                                                <option value="mother" @if (old('relation') == 'mother') selected @endif>
                                                    Mother / അമ്മ</option>
                                                <option value="grandfather"
                                                    @if (old('relation') == 'grandfather') selected @endif>Grandfather /
                                                    മുത്തച്ഛൻ</option>
                                                <option value="grandmother"
                                                    @if (old('relation') == 'grandmother') selected @endif>Grandmother /
                                                    മുത്തശ്ശി</option>
                                                <option value="uncle" @if (old('relation') == 'uncle') selected @endif>
                                                    Uncle / മാമൻ </option>
                                                <option value="aunt" @if (old('relation') == 'aunt') selected @endif>
                                                    Aunt / മാമി </option>
                                                <option value="cousin" @if (old('relation') == 'cousin') selected @endif>
                                                    Cousin / സഹോദര / സഹോദരി</option>
                                                <option value="siblings"
                                                    @if (old('relation') == 'siblings') selected @endif>Siblings / സഹോദര /
                                                    സഹോദരി</option>
                                                <option value="others" @if (old('relation') == 'others') selected @endif>
                                                    Others / മറ്റുള്ളവ </option>
                                            </select>

                                            @error('relation')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="col-md-6 mb-6">
                                            <label class="form-label"> അച്ഛൻ്റെ  പേര് <br><span class="small"> Father's Name </span></label>
                                            <input type="text" value="{{ old('father_name') }}" class="form-control"
                                                placeholder="Father's Name" name="father_name" />
                                            <span id="nameError" class="text-danger"></span>
                                            @error('father_name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                       
                                    </div><br>
                                    <div class="row">
                                        <div class="col-md-6 mb-6">
                                            <label class="form-label"> മാതാവിന്റെ പേര് <br><span class="small"> Mother's Name </span></label>
                                            <input type="text" value="{{ old('mother_name') }}" class="form-control"
                                                placeholder="Mothers's Name" name="mother_name" />
                                            <span id="nameError" class="text-danger"></span>
                                            @error('mother_name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mb-6">
                                            <label class="form-label"> കുടുംബ വാർഷിക വരുമാനം <br><span class="small"> Annual Income </span></label>
                                            <input type="number" value="{{ old('annual_income') }}"
                                                class="form-control" placeholder="Annual Income" name="annual_income" />
                                            @error('annual_income')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                      


                                    </div><br>
                                    <div class="row">
                                        <div class="col-md-6 mb-6">
                                            <label class="form-label"> രക്ഷിതാവിന്റെ തൊഴിൽ <br><span class="small"> Occupation of Parent</span></label>
                                            <input type="text" value="{{ old('occupation_parent') }}"
                                                class="form-control" placeholder="Occupation of Parent"
                                                name="occupation_parent" />
                                            <span id="nameError" class="text-danger"></span>
                                            @error('occupation_parent')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mb-6 d-flex align-items-end">
                                            <div class="col-6">
                                                <label class="form-label">വിദ്യാർത്ഥിയുടെ ജനനതിയതി <br><span class="small"> Date of Birth</span></label>
                                                <input type="date" value="{{ old('dob') }}" class="form-control"
                                                    placeholder="Date of Birth" name="dob"
                                                    max="{{ date('Y-m-d') }}" />
                                                @error('dob')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="col-6">
                                                <label class="form-label"> വിദ്യാർത്ഥിയുടെ വയസ്സു <br><span class="small">Age</span> </label>
                                                <input type="text" value="{{ old('age') }}" pattern="[0-9]{1,3}"
                                                    maxlength="3" class="form-control" placeholder="Age"
                                                    name="age" />
                                                @error('age')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                        </div>

                                   


                                    </div><br>
                                    <div class="row">
                                        <div class="col-md-6 mb-6">
                                            <label class="form-label">ST Category / ST  വിഭാഗം  </label>
                                            <input type="text" value="{{ old('caste') }}" class="form-control"
                                                placeholder="ST Category" name="caste" />
                                            <span id="nameError" class="text-danger"></span>
                                            @error('caste')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mb-6">
                                            <label class="form-label">  പട്ടികജാതി/
                                                പട്ടികവർഗ/ മറ്റിതര സമുദായം ഇവയിൽ ഏത് <br><span class="small"> Caste / Category / Other Community </span></label>
                                            <input type="text" value="{{ old('other') }}" class="form-control"
                                                placeholder="Caste / Category / Other Community" name="other" />
                                            @error('other')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        {{-- <div class="col-md-6 mb-6">
                                            <label class="form-label">Class,School Name and Address / പഠിക്കുന്ന ക്ലാസും
                                                ,സ്കൂളിന്റെ പേരും വിലാസവും </label>
                                            <input type="text" value="{{ old('school_address') }}"
                                                class="form-control" placeholder="Class,School Name and Address"
                                                name="school_address" />
                                            <span id="nameError" class="text-danger"></span>
                                            @error('school_address')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div> --}}


                                    </div><br>
                                    <div class="row">

                                        {{-- <div class="col-md-6 mb-6">
                                            <label class="form-label">Birth Place and District /ജനനസ്ഥലവും ,ജില്ലയും
                                            </label>
                                            <div class="d-flex">
                                                <div class="col-6">
                                                    <label class="form-label">Birth Place /ജനനസ്ഥലവും </label>
                                                    <input type="text" value="{{ old('birth_place') }}"
                                                        class="form-control" placeholder="Birth Place and District"
                                                        name="birth_place" />

                                                    @error('birth_place')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="col-6">
                                                    <label class="form-label">Birth District / ജനിച്ച ജില്ല </label>
                                                    <select id="" name="birth_district" class="form-control"
                                                        required>
                                                        <option value="">Select</option>
                                                        @foreach ($districts as $district)
                                                            <option value="{{ $district->id }}"
                                                                {{ old('birth_district') == $district->id ? 'selected' : '' }}>
                                                                {{ $district->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>

                                                    @error('birth_district')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                            </div>
                                        </div> --}}
                                        <div class="col-md-6 mb-6">
                                            <label class="form-label"> വിദ്യാർത്ഥിയുടെ മാതൃഭാഷ <br><span class="small"> Mother Tounge </span> </label>


                                            <select class="form-select" name="mother_tonge">
                                                <option value="" disabled selected>Select a mother tongue</option>
                                                <option value="malayalam"
                                                    @if (old('mother_tonge') == 'malayalam') selected @endif>Malayalam / മലയാളം
                                                </option>
                                                <option value="tamil" @if (old('mother_tonge') == 'tamil') selected @endif>
                                                    Tamil / தமிழ்</option>
                                                <option value="kannada"
                                                    @if (old('mother_tonge') == 'kannada') selected @endif>Kannada / ಕನ್ನಡ
                                                </option>
                                                <option value="konkani"
                                                    @if (old('mother_tonge') == 'konkani') selected @endif>Konkani / कोंकणी
                                                </option>
                                                <option value="tulu" @if (old('mother_tonge') == 'tulu') selected @endif>
                                                    Tulu / ತುಳು</option>
                                                <option value="marathi"
                                                    @if (old('mother_tonge') == 'marathi') selected @endif>Marathi / मराठी
                                                </option>
                                                <option value="urdu" @if (old('mother_tonge') == 'urdu') selected @endif>
                                                    Urdu / اردو</option>
                                            </select>


                                            @error('mother_tonge')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror

                                        </div>
                                        <div class="col-md-6 mb-6">
                                            <label class="form-label"> സ്ഥലം <br><span class="small">Place </span></label>
                                            <input type="text" value="{{ old('place') }}" class="form-control"
                                                placeholder="Place" name="place" />

                                            @error('place')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div><br>
                                    <div class="row">
                                       
                                        <div class="col-md-6 mb-6">
                                            <label class="form-label"> രക്ഷിതാവിന്റെ ഒപ്പും <br><span class="small"> Parent's Sign </span></label>
                                            <input type="file" class="form-control" name="signature" id="signature" accept=".jpg"
                                                required onchange = "validateImage()" />
                                            <span class="text-muted small">(File less than 2 mb. jpg only. / ഫയൽ: 2 എംബി
                                                കുറഞ്ഞത്,
                                                JPG/PDF
                                                മാത്രം.)</span>
                                            @error('signature')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            <div id="errorMessage" style="color:red;">
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-6">
                                            <label class="form-label"> 
                                                അപേക്ഷകന്റെ ഫോട്ടോ <br><span class="small">Applicant's Image</span></label>
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
                                    </div><br>                       
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6 mb-6">
                                            <label class="form-label">ജില്ല<br><span class="small">District</span></label>
                                            <select id="submitted_district" name="submitted_district" class="form-control" required>
                                                <option value="">Select</option>
                                                @foreach ($districts as $district)
                                                <option value="{{ $district->id }}" {{ old('submitted_district') == $district->id ? 'selected' : '' }}>
                                                    {{ $district->name }}
                                                </option>
                                                @endforeach
                                            </select>
                                            @error('dist')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            <input type="hidden" name="dist_name" id="dist_name" value="">
                                        </div>
                                        <div class="col-md-6 mb-6">
                                            <label class="form-label">ടി.ഇ.ഓ<br><span class="small">TEO</span></label>
                                            <select id="submitted_teo" name="submitted_teo" class="form-control" required>
                                                <option value="">Choose TEO</option>
                                            </select>
                                            @error('teo')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            <input type="hidden" name="teo_name" id="teo_name" value="">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-3 mb-3">
                                        </div>
                                        <div class="  col-md-12 mb-12">
                                            <button type="submit" id="submit"
                                                class="btn btn-danger w-15 waves-effect waves-light text-center submit">Save</button>
                                        </div>
                                    </div><br>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- </div>
    </div>
    </div> --}}
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

        $(document).ready(function() {
            fetchTeo();
            fetchTaluk();
        });


        //selection of district 
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




        //selection of teo.
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

        function validateImage() {
            // alert('ho');
            var input = document.getElementById('signature');
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
    </script>
    <!-- main-content-body -->
@endsection
