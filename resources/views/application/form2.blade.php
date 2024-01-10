@extends('layouts.app')

@section('content')
    <!-- main-content -->
    <div class="main-content app-content">
        <!-- container -->
        <div class="main-container container-fluid">
            <!-- breadcrumb -->
            <div class="breadcrumb-header justify-content-between row me-0 ms-0">

                <h4 class="content-title mb-2"> ജനനി-ജനനി -ജന്മരക്ഷ പ്രസവാനുകുല്യം - മാതൃശിശു സംരക്ഷണ പദ്ധതി അപേക്ഷഫോറം</h4>


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


                    <form name="patientForm" id="patientForm" method="post"
                        action="{{ route('motherChildProtectionSchemeStore') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6 mb-6">
                                            <label class="form-label">പേര് </label>
                                            <input type="text" value="{{ old('name') }}" class="form-control"
                                                placeholder="പേര്" name="name" />
                                            @error('name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mb-6">
                                            <label class="form-label">മേൽവിലാസം </label>
                                            <textarea type="text" value="{{ old('address') }}" class="form-control" name="address"></textarea>
                                            @error('address')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 mb-4">
                                            <label class="form-label">ജില്ല </label>
                                            <select id="district" name="district" class="form-control">
                                                <option value="">Select</option>
                                                @foreach ($districts as $district)
                                                    <option value="{{ $district->id }}">{{ $district->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('district')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            <input type="hidden" name="district_name" id="district_name" value="">
                                        </div>
                                        <div class="col-md-4 mb-4">
                                            <label class="form-label">താലൂക്ക് </label>
                                            <select id="taluk" name="taluk" class="form-control">
                                                <option value="">Choose Taluk</option>
                                            </select>
                                            @error('taluk')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            <input type="hidden" name="taluk_name" id="taluk_name" value="">
                                        </div>
                                        <div class="col-md-4 mb-4">
                                            <label class="form-label">പിൻകോഡ് </label>
                                            <input type="text" value="{{ old('pincode') }}" class="form-control"
                                                name="pincode" />
                                            @error('pincode')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-6">
                                            <label class="form-label">വയസ് </label>
                                            <input type="number" value="{{ old('age') }}" class="form-control"
                                                name="age" />
                                            @error('age')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mb-6">
                                            <label class="form-label">ജനനതീയതി </label>
                                            <input type="date" class="form-control" name="dob" id="dob"
                                                value="" />
                                            @error('dob')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div><br>
                                    <div class="row">
                                        <div class="col-md-6 mb-6">
                                            <label class="form-label">ഭർത്താവിന്റെ പേര് </label>
                                            <input type="text" class="form-control" name="hus_name" id="hus_name"
                                                value="" placeholder="ഭർത്താവിന്റെ പേര് " />
                                            @error('hus_name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mb-6">
                                            <label class="form-label">സമുദായം / ജാതി </label>
                                            <input type="text" class="form-control" name="caste" id="caste"
                                                value="" placeholder="സമുദായം / ജാതി " />
                                            @error('Caste')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div><br>
                                    <div class="row">
                                        <div class="col-md-6 mb-6">
                                            <label class="form-label">വില്ലേജ് </label>
                                            <input type="text" class="form-control" name="village" id="village"
                                                value="" placeholder="വില്ലേജ്" />
                                            @error('village')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mb-6">
                                            <label class="form-label">എത്രാമത്തെ പ്രസവം </label>
                                            <input type="number" class="form-control" name="births" id="births"
                                                value="" placeholder="എത്രാമത്തെ പ്രസവം" />
                                            @error('births')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div><br>
                                    <div class="row">
                                        <div class="col-md-6 mb-6">
                                            <label class="form-label">പ്രസവം നടക്കുമെന്ന് പ്രതീക്ഷിക്കുന്ന തിയതി </label>
                                            <input type="date" class="form-control" name="expected_date_of_delivery"
                                                id="expected_date_of_delivery" value=""
                                                placeholder="പ്രസവം നടക്കുമെന്ന് പ്രതീക്ഷിക്കുന്ന തിയതി" />
                                            @error('expected_date_of_delivery')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mb-6">
                                            <label class="form-label">ഗർഭ /പ്രസവ ശുശ്രുഷക്ക് ആശ്രയിക്കുന്ന ആശുപത്രി
                                                /കുടുംബക്ഷേമ കേന്ദ്രം </label>
                                            <input type="text" class="form-control" name="dependent_hospital"
                                                id="dependent_hospital" value=""
                                                placeholder="ഗർഭ /പ്രസവ ശുശ്രുഷക്ക് ആശ്രയിക്കുന്ന ആശുപത്രി /കുടുംബക്ഷേമ കേന്ദ്രം" />
                                            @error('dependent_hospital')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div><br>
                                    <div class="row">
                                        <div class="col-md-6 mb-6">
                                            <label class="form-label">സ്ഥലം </label>
                                            <input type="text" class="form-control" name="place" id="place"
                                                value="" placeholder="സ്ഥലം" />
                                            @error('place')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mb-6">
                                            <label class="form-label">അപേക്ഷകന്റെ ഒപ്പ് </label>
                                            <input type="file" class="form-control" name="signature" id="signature"
                                                value="" placeholder="അപേക്ഷകന്റെ ഒപ്പ് " />
                                            @error('signature')
                                                <span class="text-danger">{{ $message }}</span>
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
                                        <label class="form-label">ജില്ല </label>
                                        <select id="submitted_district" name="submitted_district" class="form-control">
                                            <option value="">Select</option>
                                            @foreach ($districts as $district)
                                                <option value="{{ $district->id }}">{{ $district->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('dist')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        <input type="hidden" name="dist_name" id="dist_name" value="">
                                    </div>
                                    <div class="col-md-6 mb-6">
                                        <label class="form-label">TEO </label>
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

    <script>
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
            $('#example').DataTable();
        });
    </script>
    <!-- main-content-body -->
@endsection
