@extends('layouts.app')

@section('content')
    <!-- main-content -->
    <div class="main-content app-content">
        <!-- container -->
        <div class="main-container container-fluid">
            <!-- breadcrumb -->
            <div class="breadcrumb-header justify-content-between row me-0 ms-0">
                <div class="col-md-12">
                    <h4> Application Form</h4><br>
                    <h2>മരണപെട്ടയാളുടെ കുടുംബ വിവരങ്ങൾ </h2>

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

                            <form name="userForm" id="userForm" method="post" action="{{ route('financialHelpStore') }}">
                                @csrf
                                {{-- <div class="mb-4 main-content-label">User Details</div> --}}
                                <div class="form-group">
                                    ആകെ കുടുംബാഗങ്ങൾ ( റേഷൻ കാർഡിന്റെ പകർപ്പ് ഹാജരാക്കണം ) <br>
                                    <div class="row">


                                        <div class="col-md-12">
                                            {{-- <label class="form-label">Total Members (submit the copy of ration card) / ആകെ
                                                കുടുംബാഗങ്ങൾ ( റേഷൻ കാർഡിന്റെ പകർപ്പ് ഹാജരാക്കണം )
                                            </label> --}}
                                            <input type="text" value="{{ old('total_members') }}" class="form-control"
                                                placeholder="Total Members in family" name="total_members" />
                                            @error('total_members')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <br>



                                    <div class="row">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label for="">പേര്</label>
                                            </div>
                                            <div class="col-md-3">
                                                <label for="">തൊഴിൽ</label>
                                            </div>
                                            <div class="col-md-3">
                                                <label for="">വരുമാനം</label>
                                            </div>
                                        </div>

                                        <div class="row addRow">
                                            <div class="col-md-3">
                                                <input type="text" value="{{ old('husband_address') }}"
                                                    class="form-control single__income__earner--add--imputbox " placeholder="Husband Address"
                                                    name="husband_address" />
                                                @error('husband_address')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="col-md-3">
                                                <input type="text" value="{{ old('wife_address') }}" class="form-control single__income__earner--add--imputbox "
                                                    placeholder="Wife Address" name="wife_address" />
                                                <span id="nameError" class="text-danger"></span>
                                                @error('wife_address')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="col-md-3">
                                                <input type="text" value="{{ old('wife_address') }}" class="form-control single__income__earner--add--imputbox "
                                                    placeholder="Wife Address" name="wife_address" />
                                                <span id="nameError" class="text-danger"></span>
                                                @error('wife_address')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="col-md-3">
                                                {{-- <a class="btn btn-danger delete">-</a> --}}
                                                <a class="btn btn-success add">+</a>
                                            </div>
                                        </div>

                                        <div id="items">

                                        </div>

                                        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                                        <script type="text/javascript">
                                            $(document).ready(function() {
                                                $(".add").click(function(e) {
                                                    // Build the HTML using jQuery
                                                    var html = '<div class="row addRow">' +
                                                        '<div class="col-md-3">' +
                                                        '<input type="text" value="{{ old('husband_address') }}" class="form-control single__income__earner--add--imputbox" placeholder="Husband Address" name="husband_address" />' +
                                                        '@error('husband_address')' +
                                                        '<span class="text-danger">{{ $message }}</span>' +
                                                        '@enderror' +
                                                        '</div>' +

                                                        '<div class="col-md-3">' +
                                                        '<input type="text" value="{{ old('wife_address') }}" class="form-control single__income__earner--add--imputbox" placeholder="Wife Address" name="wife_address" />' +
                                                        '<span id="nameError" class="text-danger"></span>' +
                                                        '@error('wife_address')' +
                                                        '<span class="text-danger">{{ $message }}</span>' +
                                                        '@enderror' +
                                                        '</div>' +

                                                        '<div class="col-md-3">' +
                                                        '<input type="text" value="{{ old('wife_address') }}" class="form-control single__income__earner--add--imputbox" placeholder="Wife Address" name="wife_address" />' +
                                                        '<span id="nameError" class="text-danger"></span>' +
                                                        '@error('wife_address')' +
                                                        '<span class="text-danger">{{ $message }}</span>' +
                                                        '@enderror' +
                                                        '</div>' +

                                                        '<div class="col-md-3">' +
                                                        '<a class="btn btn-danger delete">-</a>' +

                                                        '</div>' +
                                                        '</div>';

                                                    // Append the newly built HTML to the "#items" div
                                                    $("#items").append(html);
                                                });

                                                $("body").on("click", ".delete", function(e) {
                                                    $(this).closest(".addRow").remove();
                                                });
                                            });
                                        </script>


                                        വിവാഹത്തിനുമുമ്പുള്ള പൂർണ്ണ മേൽവിലാസം
                                        <div class="row">
                                            <div class="col-md-6 mb-6">
                                                <label class="form-label">Husband / ഭർത്താവ് </label>
                                                <input type="text" value="{{ old('husband_address_old') }}"
                                                    class="form-control" placeholder="Husband Address"
                                                    name="husband_address_old" />
                                                @error('husband_address_old')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="col-md-6 mb-6">
                                                <label class="form-label">Wife / ഭാര്യ </label>
                                                <input type="text" value="{{ old('wife_address_old') }}"
                                                    class="form-control" placeholder="Wife Address"
                                                    name="wife_address_old" />
                                                <span id="nameError" class="text-danger"></span>
                                                @error('wife_address_old')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                        </div><br>
                                        സമുദായം
                                        <div class="row">
                                            <div class="col-md-6 mb-6">
                                                <label class="form-label">Husband / ഭർത്താവ് </label>
                                                <input type="text" value="{{ old('husband_caste') }}"
                                                    class="form-control" placeholder="Husband Caste" name="husband_caste" />
                                                @error('husband_caste')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="col-md-6 mb-6">
                                                <label class="form-label">Wife / ഭാര്യ </label>
                                                <input type="text" value="{{ old('wife_caste') }}" class="form-control"
                                                    placeholder="Wife Caste" name="wife_caste" />
                                                <span id="nameError" class="text-danger"></span>
                                                @error('wife_caste')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div><br>
                                        വിവാഹത്തിനുമുമ്പുള്ള തൊഴിലും മാസ വരുമാനവും
                                        <div class="row">
                                            <div class="col-md-6 mb-6">
                                                <label class="form-label">Husband / ഭർത്താവ് </label>
                                                <input type="text" value="{{ old('hus_work_before_marriage') }}"
                                                    class="form-control"
                                                    placeholder="വിവാഹത്തിനുമുമ്പുള്ള തൊഴിലും മാസ വരുമാനവും"
                                                    name="hus_work_before_marriage" />
                                                @error('hus_work_before_marriage')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="col-md-6 mb-6">
                                                <label class="form-label">Wife / ഭാര്യ </label>
                                                <input type="text" value="{{ old('wife_work_before_marriage') }}"
                                                    class="form-control"
                                                    placeholder="വിവാഹത്തിനുമുമ്പുള്ള തൊഴിലും മാസ വരുമാനവും "
                                                    name="wife_work_before_marriage" />
                                                <span id="nameError" class="text-danger"></span>
                                                @error('wife_work_before_marriage')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>


                                        </div><br>

                                        അപേക്ഷ സമർപ്പിക്കുമ്പോഴത്തെ തൊഴിലും മാസാവരുമാനവും
                                        <div class="row">
                                            <div class="col-md-6 mb-6">
                                                <label class="form-label">Husband / ഭർത്താവ് </label>
                                                <input type="text" value="{{ old('hus_work_after_marriage') }}"
                                                    class="form-control"
                                                    placeholder="അപേക്ഷ സമർപ്പിക്കുമ്പോഴത്തെ തൊഴിലും മാസാവരുമാനവും"
                                                    name="hus_work_after_marriage" />
                                                @error('hus_work_after_marriage')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="col-md-6 mb-6">
                                                <label class="form-label">Wife / ഭാര്യ </label>
                                                <input type="text" value="{{ old('wife_work_after_marriage') }}"
                                                    class="form-control"
                                                    placeholder="അപേക്ഷ സമർപ്പിക്കുമ്പോഴത്തെ തൊഴിലും മാസാവരുമാനവും"
                                                    name="wife_work_after_marriage" />
                                                <span id="nameError" class="text-danger"></span>
                                                @error('wife_work_after_marriage')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>


                                        </div><br>

                                        വിവാഹത്തിന്റെ വിശദ വിവരങ്ങൾ <br>
                                        എ)വിവാഹ സമയത്തെ പ്രായം
                                        <div class="row">
                                            <div class="col-md-6 mb-6">
                                                <label class="form-label">Husband / ഭർത്താവ് </label>
                                                <input type="text" value="{{ old('husband_age') }}"
                                                    class="form-control" placeholder="വിവാഹ സമയത്തെ പ്രായം"
                                                    name="husband_age" />
                                                @error('husband_age')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="col-md-6 mb-6">
                                                <label class="form-label">Wife / ഭാര്യ </label>
                                                <input type="text" value="{{ old('wife_age') }}" class="form-control"
                                                    placeholder="വിവാഹ സമയത്തെ പ്രായം" name="wife_age" />
                                                <span id="nameError" class="text-danger"></span>
                                                @error('wife_age')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>


                                        </div><br>

                                        ബി)രജിസ്റ്റർ വിവാഹം ആയിരുന്നുവോ എങ്കിൽ രെജിസ്റ്ററേഷൻ നമ്പരും തിയതിയും,
                                        റെജിസ്റ്ററോഫീസിന്റെ പേരും

                                        <div class="row">
                                            <div class="col-md-12">
                                                <label class="form-label">Details</label>
                                                <textarea class="form-control" placeholder="Details" name="register_details">{{ old('register_details') }}</textarea>

                                            </div>

                                        </div><br>
                                        സി)വിവാഹത്തിന്റെ സാധ്യത തെളിയിക്കുന്നതിന് രേഖ ഹാജരാക്കിയിട്ടുണ്ടെങ്കിൽ അതിന്റെ വിവരം
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label class="form-label">Details</label>
                                                <textarea class="form-control" placeholder="Details" name="certificate_details">{{ old('certificate_details') }}</textarea>

                                            </div>

                                        </div><br>
                                        വിവാഹത്തിനുശേഷം ദമ്പതികൾ ഏതെങ്കിലും കാലയളവിൽ വേർപിരിഞ്ഞ് താമസിച്ചിട്ടുണ്ടോ?
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label class="form-label">Yes</label>
                                                <input class="form-control" type="radio" name="apart_for_any_period"
                                                    value="Yes">

                                                <label class="form-label">No</label>
                                                <input class="form-control" type="radio" name="apart_for_any_period"
                                                    value="No">
                                            </div>
                                        </div><br>
                                        <div id="additionalDiv" style="display:none;">
                                            വേർപിരിഞ്ഞ് താമസിച്ച കാലയളവ്
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label class="form-label">Duration</label>
                                                    <input type="text" class="form-control" placeholder="Duration"
                                                        name="duration" />

                                                </div>

                                            </div><br>
                                            വേർപിരിഞ്ഞ് താമസിക്കാനുണ്ടായ കാരണം
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label class="form-label">Reason</label>
                                                    <input type="text" class="form-control" placeholder="Reason"
                                                        name="reason" />

                                                </div>

                                            </div><br>


                                        </div>

                                        ധനസഹായം ലഭിക്കുന്ന പക്ഷം എന്തു കാര്യത്തിനുവേണ്ടി ചെലവഴിക്കാനാണ് ഉദ്ദേശിക്കുന്നത്
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label class="form-label">Details</label>
                                                <textarea class="form-control" placeholder="Details" name="financial_assistance">{{ old('financial_assistance') }}</textarea>

                                            </div>

                                        </div><br>

                                        മിശ്രവിവാഹം മൂലം ദമ്പതികൾക്ക് അനുഭവിക്കേണ്ടി വന്നിട്ടുള്ള കഷ്ടതകളും പ്രയാസങ്ങളും
                                        എന്തെല്ലാം
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label class="form-label">Details</label>
                                                <textarea class="form-control" placeholder="Details" name="difficulties">{{ old('difficulties') }}</textarea>

                                            </div>

                                        </div><br>

                                    </div>
                                    <br><br><br>
                                    <button type="submit" id="submit"
                                        class="btn btn-warning waves-effect waves-light float-end">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
    </script>
    <!-- main-content-body -->
@endsection
