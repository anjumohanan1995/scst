@extends('layouts.app')

@section('content')
    <!-- main-content -->
    <div class="main-content app-content">
        <!-- container -->
        <div class="main-container container-fluid">
            <!-- breadcrumb -->
            <div class="breadcrumb-header justify-content-between row me-0 ms-0">

                <h4 class="content-title mb-2"> ജനനി-ജനനി -ജന്മരക്ഷ പ്രസവാനുകുല്യം - മാതൃശിശു സംരക്ഷണ പദ്ധതി അപേക്ഷഫോറം <br>
                    Janani-Janani -Janamraksha Matrishukulyam -Maternal Child Protection Scheme Application Form
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
                        action="{{ route('motherChildProtectionSchemeStore') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6 mb-6">
                                            <label class="form-label">പേര് / Name </label>
                                            <input type="text" value="{{ old('name') }}" class="form-control"
                                                placeholder="പേര്" name="name" required />
                                            @error('name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mb-6">
                                            <label class="form-label">മേൽവിലാസം / Address </label>
                                            <textarea type="text" value="{{ old('address') }}" class="form-control" name="address"></textarea>
                                            @error('address')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 mb-4">
                                            <label class="form-label">ജില്ല / District</label>
                                            <select id="district" name="district" class="form-control">
                                                <option value="">Select</option>
                                                @foreach ($districts as $district)
                                                    <option value="{{ $district->id }}" @if($district->id == old('district')) selected @endif>{{ $district->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('district')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            <input type="hidden" name="district_name" id="district_name" value="">
                                        </div>
                                        <div class="col-md-4 mb-4">
                                            <label class="form-label">താലൂക്ക് / Taluk </label>
                                            <select id="taluk" name="taluk" class="form-control">
                                                <option value="">Choose Taluk</option>
                                            </select>
                                            @error('taluk')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            <input type="hidden" name="taluk_name" id="taluk_name" value="">
                                        </div>
                                        <div class="col-md-4 mb-4">
                                            <label class="form-label">പിൻകോഡ് / Pincode</label>
                                            <input type="text" value="{{ old('pincode') }}" class="form-control"
                                                name="pincode" />
                                            @error('pincode')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-6">
                                            <label class="form-label">വയസ് / Age </label>
                                            <input type="number" value="{{ old('age') }}" class="form-control"
                                                name="age" />
                                            @error('age')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mb-6">
                                            <label class="form-label">ജനനതീയതി /Date Of Birth </label>
                                            <input type="date" class="form-control" name="dob" id="dob"
                                                value="" />
                                            @error('dob')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div><br>
                                    <div class="row">
                                        <div class="col-md-6 mb-6">
                                            <label class="form-label">ഭർത്താവിന്റെ പേര് / Husband's Name</label>
                                            <input type="text" class="form-control" name="hus_name" id="hus_name"
                                                value="" placeholder="ഭർത്താവിന്റെ പേര് "  />
                                            @error('hus_name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mb-6">
                                            <label class="form-label">സമുദായം / ജാതി (Community / Caste) </label>
                                            <input type="text" class="form-control" name="caste" id="caste"
                                                value="" placeholder="സമുദായം / ജാതി " />
                                            @error('Caste')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div><br>
                                    <div class="row">
                                        <div class="col-md-6 mb-6">
                                            <label class="form-label">വില്ലേജ് / Village </label>
                                            <input type="text" class="form-control" name="village" id="village"
                                                value="" placeholder="വില്ലേജ്" />
                                            @error('village')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mb-6">
                                            <label class="form-label">എത്രാമത്തെ പ്രസവം / How many births? </label>
                                            <input type="number" class="form-control" name="births" id="births"
                                                value="" placeholder="എത്രാമത്തെ പ്രസവം" />
                                            @error('births')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div><br>
                                    <div class="row">
                                        <div class="col-md-6 mb-6">
                                            <label class="form-label">പ്രസവം നടക്കുമെന്ന് പ്രതീക്ഷിക്കുന്ന തിയതി / Expected date of delivery </label>
                                            <input type="date" class="form-control" name="expected_date_of_delivery"
                                                id="expected_date_of_delivery" value=""
                                                placeholder="" />
                                            @error('expected_date_of_delivery')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mb-6">
                                            <label class="form-label">ഗർഭ /പ്രസവ ശുശ്രുഷക്ക് ആശ്രയിക്കുന്ന ആശുപത്രി
                                                /കുടുംബക്ഷേമ കേന്ദ്രം / Dependent hospital/family welfare center for pregnancy/antenatal care</label>
                                            <input type="text" class="form-control" name="dependent_hospital"
                                                id="dependent_hospital" value=""
                                                placeholder="" />
                                            @error('dependent_hospital')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div><br>
                                    <div class="row">
                                        <div class="col-md-6 mb-6">
                                            <label class="form-label">സ്ഥലം / Place </label>
                                            <input type="text" class="form-control" name="place" id="place"
                                                value="" placeholder="" />
                                            @error('place')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mb-6">
                                            <label class="form-label">അപേക്ഷകന്റെ ഒപ്പ് / Applicant's signature</label>
                                            <input type="file" class="form-control" name="signature" id="signature"
                                                value="" placeholder="" onchange="validateSignature()" accept=".jpg, .jpeg, .png, .pdf" />
                                                <p style="font-size: 11px;">Max. filesize: 2 MB • Format: JPG, PNG, PDF </p>
                                            @error('signature')
                                                <span class="text-danger">{{ $message }}</span>
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
                                <button type="submit" id="submit"
                                    class="btn btn-warning waves-effect waves-light text-start submit">Save</button>
                            </div>
                        </div><br>




                    </form>


                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">

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

        var selectElement = document.getElementById("district");
        var districtName = selectElement.options[selectElement.selectedIndex].text;
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
                var permanentTalukValue = "{{ old('taluk') }}";
              
                $("#taluk").find('option').remove();
                $("#taluk").append('<option value="" selected>Choose Taluk</option>');
                $.each(result.taluks, function (key, value) {
                    if(value._id == permanentTalukValue)
                    $('#taluk').append('<option value="'+value._id+'" selected>'+ value.taluk_name +'</option>');
                    else
                    $('#taluk').append('<option value="'+value._id+'">'+ value.taluk_name +'</option>');
                });
             

            }
        });

      

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
                        $opt.appendTo('#taluk');


                    });

                }
            });

        });
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
            alert("fgdf"); 
            fetchTeo();
         
        });

      
        function fetchTeo() {    
            //alert("qqqqqqq");    
            var val1 = $("#submitted_district").val();
          alert({{ old('submitted_teo') }});
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
