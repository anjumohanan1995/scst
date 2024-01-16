@extends('layouts.app')
@section('content')
    <!-- main-content -->
    <div class="main-content app-content">
        <!-- container -->
        <div class="main-container container-fluid">
            <!-- breadcrumb -->
            <div class="breadcrumb-header justify-content-between row me-0 ms-0">
                <div class="col-xl-9">
                    <h4 class="content-title mb-2">ഏക വരുമാന ദായകൻ മരണപ്പെട്ട പട്ടിക വർഗ്ഗ വിഭാഗ കുടുംബങ്ങൾക്കുള്ള ധനസഹായം
                        അപേക്ഷ ഫോറം</h4>
                </div>
                <div class="col-xl-3">
                </div>
            </div>
            <!-- /breadcrumb -->
            <!-- main-content-body -->
            <div class="main-content-body">


                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                <!-- row -->
                <!-- row -->
                <div class="row row-sm mt-4">
                    <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12 ">
                        <div class="card">
                            <div class="card-body">
                                <div id="success_message" class="ajax_response" style="display: none;"></div>
                                <div class="mb-4 main-content-label">
                                    Application Preview
                                </div>


                                <table border="1" class="table">
                                    <tr>
                                        <td>

                                            <h5> <strong>Part 1 <br>അപേക്ഷകനെ സംബന്ധിച്ച വിവരങ്ങൾ</strong></h5>
                                        </td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>

                                            പേര് </td>
                                        <td> {{ @$formData['applicant_name'] }}

                                        </td>
                                        <td>

                                            ജാതി </td>
                                        <td> {{ @$formData['applicant_caste'] }}

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>

                                            തഹസിൽദാരിൽ നിന്നുള്ള സാക്ഷ്യപത്രം </td>
                                        <td>
                                            @if (@$formData['caste_certificate'])
                                                <embed
                                                    src="{{ asset('applications/single_earner/' . @$formData['caste_certificate']) }}"
                                                    type="" width="250px" height="150px">
                                            @else
                                                Not uploaded!
                                            @endif
                                        </td>
                                        <td>

                                            മേൽവിലാസം </td>
                                        <td> {{ @$formData['address'] }}

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>

                                            ജില്ല </td>
                                        <td> {{ @$formData['district_name'] }}

                                        </td>
                                        <td>

                                            താലൂക്ക് </td>
                                        <td> {{ @$formData['taluk_name'] }}

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>

                                            പിൻകോഡ് </td>
                                        <td> {{ @$formData['pincode'] }}

                                        </td>
                                        <td>

                                            അയാളും ഉള്ള ബന്ധം മരണപ്പെട്ടയാളുമായുള്ള ബന്ധം </td>
                                        <td> {{ @$formData['relation_with_person'] }}


                                        </td>
                                    </tr>
                                    <tr>
                                        <td>

                                            ആധാർ നം </td>
                                        <td>
                                            @if (@$formData['adhaar_copy'])
                                                <embed
                                                    src="{{ asset('applications/single_earner/' . @$formData['adhaar_copy']) }}"
                                                    type="" width="250px" height="150px">
                                            @else
                                                Not uploaded!
                                            @endif
                                        </td>
                                        <td>

                                            ഫോൺ നമ്പർ </td>
                                        <td> {{ @$formData['applicant_phone'] }}

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>

                                            ബാങ്ക് അക്കൗണ്ട് നം </td>
                                        <td> {{ @$formData['bank_account_no'] }}

                                        </td>

                                    </tr>
                                    <tr>
                                        <td>

                                            ബാങ്ക് അക്കൗണ്ട് IFSC നം </td>
                                        <td> {{ ucwords(@$formData['bank_account_ifsc']) }}

                                        </td>
                                        <td>

                                            ബാങ്ക് അക്കൗണ്ട് പകർപ്പ് </td>
                                        <td>
                                            @if (@$formData['passbook_copy'])
                                                <embed
                                                    src="{{ asset('applications/single_earner/' . @$formData['passbook_copy']) }}"
                                                    type="" width="250px" height="150px">
                                            @else
                                                Not uploaded!
                                            @endif

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h5> <strong>part 2 <br> മരണപ്പെട്ടയാളെ സംബന്ധിച്ചു വിവരങ്ങൾ </h5> </strong>
                                        </td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>

                                            പേര് </td>
                                        <td> {{ ucwords(@$formData['deceased_person_name']) }}

                                        </td>
                                        <td>

                                            ജാതി </td>
                                        <td> {{ ucwords(@$formData['deceased_person_caste']) }}

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>

                                            ജനന തീയതി </td>
                                        <td> {{ ucwords(@$formData['date_of_birth']) }}

                                        </td>
                                        <td>

                                            മരണ തീയതി</td>
                                        <td> {{ @$formData['date_of_death'] }}

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>

                                            വയസ്സ് </td>
                                        <td> {{ @$formData['deceased_person_age'] }}

                                        </td>
                                        <td>

                                            മരണ സർട്ടിഫിക്കറ്റിന്റെ പകർപ്പ് </td>
                                        <td>
                                            @if (@$formData['death_certificate'])
                                                <embed
                                                    src="{{ asset('applications/single_earner/' . @$formData['death_certificate']) }}"
                                                    type="" width="250px" height="150px">
                                            @else
                                                Not uploaded!
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>

                                            മരണ കാരണം
                                        </td>
                                        <td>
                                            {{ @$formData['cause_of_death'] }}

                                        </td>
                                        <td>

                                            ചെയ്തിരുന്ന തൊഴിൽ </td>
                                        <td> {{ @$formData['past_job'] }}

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>

                                            ചെയ്തിരുന്ന തൊഴിലിന്റെ പകർപ്പ്
                                        </td>
                                        <td>
                                            @if (@$formData['ration_card'])
                                                <embed
                                                    src="{{ asset('applications/single_earner/' . @$formData['ration_card']) }}"
                                                    type="" width="250px" height="150px">
                                            @else
                                                Not uploaded!
                                            @endif

                                        </td>

                                    </tr>
                                    <tr>
                                        <td>
                                            <h5> <strong>part 3 <br> മരണപെട്ടയാളുടെ കുടുംബ വിവരങ്ങൾ
                                            </h5> </strong>
                                        </td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>

                                            ആകെ കുടുംബാഗങ്ങൾ
                                        </td>
                                        <td> {{ @$formData['total_members'] }}

                                        </td>
                                        <td>

                                            റേഷൻ കാർഡിന്റെ പകർപ്പ്
                                        </td>
                                        <td>
                                            @if (@$formData['past_job_document'])
                                                <embed
                                                    src="{{ asset('applications/past_job_document/' . @$formData['past_job_document']) }}"
                                                    type="" width="250px" height="150px">
                                            @else
                                                Not uploaded!
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>

                                            കടുബാംഗങ്ങളിൽ 18 നും 70 നും മദ്ധ്യേ പ്രയമായവരുടെ പേരും
                                            തൊഴിലും വരുമാനവും

                                        </td>
                                        <td colspan="3">
                                            <table class="table">
                                                <thead>

                                                    <tr>
                                                        <th>
                                                            <div>പേര്</div>
                                                        </th>
                                                        <th>
                                                            <div>തൊഴിൽ</div>
                                                        </th>
                                                        <th>
                                                            <div>വരുമാനം</div>
                                                        </th>
                                                    </tr>

                                                </thead>
                                                <tbody>

                                                    @for ($i = 0; $i < count($formData['name']); $i++)
                                                        <tr>
                                                            <td>
                                                                <div>{{ $formData['name'][$i] }}</div>
                                                            </td>
                                                            <td>
                                                                <div>{{ $formData['job'][$i] }}</div>
                                                            </td>
                                                            <td>
                                                                <div>{{ $formData['salary'][$i] }}</div>
                                                            </td>
                                                        </tr>
                                                    @endfor


                                                </tbody>
                                            </table>



                                        </td>
                                    </tr>
                                    <tr>
                                        <td>

                                            കുടുംബ വാർഷിക വരുമാനം ( വില്ലജ് ഓഫീസറിൽ
                                            നിന്നുള്ള
                                            സാക്ഷ്യപത്രം ഹാജരാകണം ) </td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>

                                            കുടുംബ വാർഷിക വരുമാനം </td>
                                        <td> {{ @$formData['annual_income'] }}

                                        </td>
                                        <td>

                                            വില്ലജ് ഓഫീസറിൽ
                                            നിന്നുള്ള
                                            സാക്ഷ്യപത്രം </td>
                                        <td>
                                            @if (@$formData['income_certificate'])
                                                <embed
                                                    src="{{ asset('applications/single_earner/' . @$formData['income_certificate']) }}"
                                                    type="" width="250px" height="150px">
                                            @else
                                                Not uploaded!
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>

                                            നിലവിൽ കുടുംബത്തിന്റെ വരുമാന സ്രോതസ്സ്: </td>
                                        <td>
                                            {{ @$formData['income_source'] }}

                                        </td>


                                    </tr>
                                </table>

                            </div>
                            <br> <br> <br>


                            <form action="{{ url('singleEarnerStore') }}" method="POST" enctype="multipart/form-data"
                                onsubmit="return validateForm()">
                                @csrf


                                <div class="row">
                                    <div class="col-md-3">
                                        <input type="hidden" name="formData" value="{{ json_encode($formData) }}">
                                        <button type="submit" class="btn-block btn btn-success"
                                            onclick="return confirm('Do you want to continue?')">Submit</button>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="btn_wrapper">
                                            <a href="javascript:void(0)" class="btn btn-primary w-100"
                                                onclick="goback()">Edit</a>
                                        </div>
                                    </div>
                                </div>
                            </form>

                            <br>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>


    <script>
        // edit button function
        function goback() {
            if (confirm('Are you sure ? Do you want to edit this form!. ')) {
                window.history.back();
            }
            return
        }
    </script>
@endsection
