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

                                <div class="card-body pd-y-7">

                                    <h4 class="medical__form--h1 text-center m-3">
                                        <b>പട്ടിക വർഗ്ഗ വികസന വകുപ്പ്<br>
                                            ഏക വരുമാന ദായകൻ മരണപ്പെട്ട പട്ടിക വർഗ്ഗ കുടുംബങ്ങൾക്കുള്ള ധനസഹായം

                                        </b>
                                    </h4>
                                    <div class="m-5">
                                        <h6 class="text-center"><u>അപേക്ഷ ഫോറം</u></h6>
                                    </div>





                                    <form action="#" method="post"
                                        style="font-weight: 500;font-size: 12px;padding: 90px;">
                                        <p>A അപേക്ഷകനെ/യെ സംബന്ധിച്ച വിവരങ്ങൾ </p>
                                        <br>
                                        <br>
                                        <div class="row w-100">
                                            <div class="col-6">

                                                <label>പേര്


                                                </label>
                                            </div>

                                            <div class="col-1">
                                                <label> :</label>
                                            </div>

                                            <div class="col-5">
                                                <label> {{ @$formData['applicant_name'] }}</label>
                                            </div>
                                        </div>





                                        <div class="row w-100">
                                            <div class="col-6">

                                                <label>ജാതി (തഹസിൽദാരിൽ നിന്നുള്ള സാക്ഷ്യപത്രം ഹാജരാക്കണം )



                                                </label>
                                            </div>

                                            <div class="col-1">
                                                <label> :</label>
                                            </div>

                                            <div class="col-5">
                                                <label> {{ @$formData['applicant_caste'] }}</label>
                                            </div>
                                        </div>

                                        <br>


                                        <div class="row w-100">
                                            <div class="col-6">

                                                <label>മേൽവിലാസം (പിൻ കോഡ് സഹിതം )



                                                </label>
                                            </div>

                                            <div class="col-1">
                                                <label> :</label>
                                            </div>

                                            @php
                                                
                                                // DD($formData['district']);
                                            @endphp

                                            <div class="col-5">
                                                <label> {{ @$formData['address'] }},
                                                    <br>{{ @$formData['taluk']['taluk_name'] }},
                                                    <br>{{ @$formData['district']['name'] }},
                                                    <br> {{ @$formData['pincode'] }}
                                                </label>
                                            </div>
                                        </div>


                                        <div class="row w-100">
                                            <div class="col-6">

                                                <label>മരണപെട്ടയാളുമായുള്ള ബന്ധം



                                                </label>
                                            </div>

                                            <div class="col-1">
                                                <label> :</label>
                                            </div>

                                            <div class="col-5">
                                                <label> {{ @$formData['relation_with_person'] }}</label>
                                            </div>
                                        </div>

                                        <div class="row w-100">
                                            <div class="col-6">

                                                <label>ആധാർ നം


                                                </label>
                                            </div>

                                            <div class="col-1">
                                                <label> :</label>
                                            </div>

                                            <div class="col-5">
                                                <label> {{ @$formData['applicant_aadhar_no'] }} </label>
                                            </div>
                                        </div>



                                        <div class="row w-100">
                                            <div class="col-6">

                                                {{-- <label>ബാങ്ക് അക്കൗണ്ട് വിവരങ്ങൾ (പകർപ്പ് സഹിതം )
                                                </label> --}}
                                                <label>ബാങ്ക് അക്കൗണ്ട് നം
                                                </label>
                                            </div>

                                            <div class="col-1">
                                                <label> :</label>
                                            </div>

                                            <div class="col-5">
                                                <label> {{ @$formData['bank_account_no'] }}</label>
                                            </div>
                                        </div>

                                        <div class="row w-100">
                                            <div class="col-6">

                                                <label>ബാങ്ക് അക്കൗണ്ട് IFSC നം
                                                </label>
                                            </div>

                                            <div class="col-1">
                                                <label> :</label>
                                            </div>

                                            <div class="col-5">
                                                <label> {{ @$formData['bank_account_ifsc'] }}</label>
                                            </div>
                                        </div>



                                        <div class="row w-100">
                                            <div class="col-6">

                                                <label>ഫോൺ നമ്പർ



                                                </label>
                                            </div>

                                            <div class="col-1">
                                                <label> :</label>
                                            </div>

                                            <div class="col-5">
                                                <label>{{ @$formData['applicant_phone'] }}</label>
                                            </div>
                                        </div>




                                        <br>
                                        <br>

                                        <p>B മരണപെട്ടയാളെ സംബന്ധിച്ച വിവരങ്ങൾ
                                        </p>
                                        <br>

                                        <div class="row w-100">
                                            <div class="col-6">

                                                <label>പേര്


                                                </label>
                                            </div>

                                            <div class="col-1">
                                                <label> :</label>
                                            </div>

                                            <div class="col-5">
                                                <label> {{ ucwords(@$formData['deceased_person_name']) }}</label>
                                            </div>
                                        </div>




                                        <div class="row w-100">
                                            <div class="col-6">

                                                <label>ജാതി


                                                </label>
                                            </div>

                                            <div class="col-1">
                                                <label> :</label>
                                            </div>

                                            <div class="col-5">
                                                <label>{{ ucwords(@$formData['deceased_person_caste']) }}</label>
                                            </div>
                                        </div>



                                        <div class="row w-100">
                                            <div class="col-6">

                                                <label>ജനന തീയതി പ്രായം


                                                </label>
                                            </div>

                                            <div class="col-1">
                                                <label> :</label>
                                            </div>

                                            <div class="col-5">
                                                <label> {{ ucwords(@$formData['date_of_birth']) }}</label>
                                            </div>
                                        </div>

                                        <div class="row w-100">
                                            <div class="col-6">

                                                <label>മരണ തീയതി


                                                </label>
                                            </div>

                                            <div class="col-1">
                                                <label> :</label>
                                            </div>

                                            <div class="col-5">
                                                <label> {{ @$formData['date_of_death'] }}</label>
                                            </div>
                                        </div>
                                        <div class="row w-100">
                                            <div class="col-6">

                                                <label>വയസ്സ്


                                                </label>
                                            </div>

                                            <div class="col-1">
                                                <label> :</label>
                                            </div>

                                            <div class="col-5">
                                                <label> {{ @$formData['deceased_person_age'] }}</label>
                                            </div>
                                        </div>


                                        <div class="row w-100">
                                            <div class="col-6">

                                                <label>മരണ കാരണം


                                                </label>
                                            </div>

                                            <div class="col-1">
                                                <label> :</label>
                                            </div>

                                            <div class="col-5">
                                                <label> {{ @$formData['cause_of_death'] }}</label>
                                            </div>
                                        </div>


                                        <div class="row w-100">
                                            <div class="col-6">

                                                <label>6. ചെയുന്ന തൊഴിൽ (ഏക വരുമാന<br> ദായകനായിരുന്നു എന്നത് സംബന്ധിച്ച
                                                    തഹസിദാരിൽ <br>നിന്നുള്ള സാക്ഷ്യപത്രം ഹാജരാക്കണം )

                                                </label>
                                            </div>

                                            <div class="col-1">
                                                <label> :</label>
                                            </div>

                                            <div class="col-5">
                                                <label> {{ @$formData['past_job'] }}</label>
                                            </div>
                                        </div>
                                        <br>
                                        <br>
                                        <p>C മരണ പെട്ടയാളുടെ കുടുംബ വിവരങ്ങൾ


                                            <br>

                                        <div class="row w-100">
                                            <div class="col-6">

                                                <label>ആകെ കുടുബാംഗങ്ങൾ (റേഷൻ കാർഡിന്റെ പകർപ്പ് ഹാജരാക്കണം )


                                                </label>
                                            </div>

                                            <div class="col-1">
                                                <label> :</label>
                                            </div>

                                            <div class="col-5">
                                                <label>{{ @$formData['total_members'] }}</label>
                                            </div>
                                        </div>
                                        <br>
                                        <p>കുടുബാംഗങ്ങളിൽ 18 നും 70 നും മദ്ധ്യേ പ്രായമായവരുടെ പേരും, തൊഴിലും, വരുമാനവും
                                        </p>

                                        <table border="1">
                                            <tr>
                                                <th>പേര് </th>
                                                <th>തൊഴിൽ </th>
                                                <th>വരുമാനം
                                                </th>
                                            </tr>

                                            @for ($i = 0; $i < count($formData['name']); $i++)
                                                <tr>
                                                    <td>{{ $formData['name'][$i] }}</td>
                                                    <td>{{ $formData['job'][$i] }}</td>
                                                    <td>{{ $formData['salary'][$i] }}</td>
                                                </tr>
                                            @endfor

                                            <!-- Add more rows as needed -->
                                        </table>

                                        <br>
                                        <br>
                                        <div class="row w-100">
                                            <div class="col-6">

                                                <label>കുടുംബ വാർഷിക വരുമാനം (വില്ലേജ് <br> താഹിസിൽദാരിൽ നിന്നുള്ള
                                                    സാക്ഷ്യപത്രം<br> ഹാജരാക്കണം )



                                                </label>
                                            </div>

                                            <div class="col-1">
                                                <label> :</label>
                                            </div>

                                            <div class="col-5">
                                                <label> {{ @$formData['annual_income'] }}
                                                </label>
                                            </div>
                                        </div>
                                        <br>

                                        <div class="row w-100">
                                            <div class="col-6">

                                                <label>നിലവിൽ കുടുംബത്തിന്റെ വരുമാന സ്രോതസ്സ്

                                                </label>
                                            </div>

                                            <div class="col-1">
                                                <label> :</label>
                                            </div>

                                            <div class="col-5">
                                                <label> {{ @$formData['income_source'] }}
                                                </label>
                                            </div>
                                        </div>

                                        <div class="row w-100">
                                            <div class="col-12">

                                                <h6 class="text-center">
                                                    <b><u>അപ്‌ലോഡ് ചേത പകർപ്പുകൾ</u>
                                                    </b>
                                                </h6>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-5 m-2">
                                                <label for=""><b>അപേക്ഷകന്റെ ജാതി തെളിയിക്കുന്ന
                                                        സർട്ടിഫിക്കറ്റ്</b> </label>

                                                @if (@$formData['caste_certificate'])
                                                    <embed
                                                        src="{{ asset('applications/single_earner/' . @$formData['caste_certificate']) }}"
                                                        type="" width="250px" height="150px">
                                                @else
                                                    <br>
                                                    Not uploaded!
                                                @endif
                                            </div>
                                            <div class="col-5 m-2">
                                                <label for=""><b>അപേക്ഷകന്റെ ആധാർ പകർപ്പ് </b> </label>

                                                @if (@$formData['adhaar_copy'])
                                                    <embed
                                                        src="{{ asset('applications/single_earner/' . @$formData['adhaar_copy']) }}"
                                                        type="" width="250px" height="150px">
                                                @else
                                                    <br>
                                                    Not uploaded!
                                                @endif
                                            </div>
                                            <div class="col-5 m-2">
                                                <label for=""><b>അപേക്ഷകന്റെ പാസ്ബുക്ക് പകർപ്പ് </b> </label>

                                                @if (@$formData['passbook_copy'])
                                                    <embed
                                                        src="{{ asset('applications/single_earner/' . @$formData['passbook_copy']) }}"
                                                        type="" width="250px" height="150px">
                                                @else
                                                    <br>
                                                    Not uploaded!
                                                @endif
                                            </div>
                                            <div class="col-5 m-2">
                                                <label for=""><b>മരണ സർട്ടിഫിക്കറ്റിന്റെ പകർപ്പ് </b> </label>

                                                @if (@$formData['death_certificate'])
                                                    <embed
                                                        src="{{ asset('applications/single_earner/' . @$formData['death_certificate']) }}"
                                                        type="" width="250px" height="150px">
                                                @else
                                                    <br>
                                                    Not uploaded!
                                                @endif
                                            </div>
                                            <div class="col-5 m-2">
                                                <label for=""><b>റേഷൻ കാർഡിന്റെ പകർപ്പ് </b> </label>

                                                @if (@$formData['ration_card'])
                                                    <embed
                                                        src="{{ asset('applications/single_earner/' . @$formData['ration_card']) }}"
                                                        type="" width="250px" height="150px">
                                                @else
                                                    <br>
                                                    Not uploaded!
                                                @endif
                                            </div>
                                            <div class="col-5 m-2">
                                                <label for=""><b>വില്ലജ് ഓഫീസറിൽ നിന്നുള്ള സാക്ഷ്യപത്രം </b>
                                                </label>

                                                @if (@$formData['income_certificate'])
                                                    <embed
                                                        src="{{ asset('applications/single_earner/' . @$formData['income_certificate']) }}"
                                                        type="" width="250px" height="150px">
                                                @else
                                                    <br>
                                                    Not uploaded!
                                                @endif
                                            </div>
                                            <div class="col-5 m-2">
                                                <label for=""><b>ഏക വരുമാന ദായകനായിരുന്നു എന്നത് സംബന്ധിച്ച്
                                                        തഹസിൽദാരിൽ നിന്നുള്ള സാക്ഷ്യപത്രം </b> </label>

                                                @if (@$formData['past_job_document'])
                                                    <embed
                                                        src="{{ asset('applications/single_earner/' . @$formData['past_job_document']) }}"
                                                        type="" width="250px" height="150px">
                                                @else
                                                    <br>
                                                    Not uploaded!
                                                @endif
                                            </div>
                                            <div class="col-5 m-2">
                                                <label for=""><b>അപേക്ഷകന്റെ പാസ്ബുക്ക് പകർപ്പ് </b> </label>

                                                @if (@$formData['signature'])
                                                    <embed
                                                        src="{{ asset('applications/single_earner/' . @$formData['signature']) }}"
                                                        type="" width="250px" height="150px">
                                                @else
                                                    <br>
                                                    Not uploaded!
                                                @endif
                                            </div>


                                        </div>

                                        <div class="m-5">
                                            <h6 class="text-center">
                                                <b><u>സത്യപ്രസ്താവന</u>
                                                </b>
                                            </h6>
                                        </div>
                                        <p>മേൽ പ്രസ്താവിച്ച വിവരങ്ങൾ പൂർണമായും സത്യമാണെന്ന് ബോധിപ്പിച് കൊള്ളുന്നു
                                        </p>

                                        {{-- <div class="d-flex row">
                                            <div class="col-6">

                                                <label>സ്ഥലം: </label><br>

                                            </div>

                                            <div class="col-6"">

                                                <div>
                                                    <label> അപേക്ഷകന്റെ പേരും ഒപ്പും:
                                                    </label>
                                                </div>

                                            </div>

                                        </div>
                                        <div class=" d-flex row">
                                            <div class="col-6">

                                                <label>തീയതി : </label><br>

                                            </div>

                                            <div class="col-6">

                                                <label>


                                                </label>
                                            </div>

                                        </div> --}}

                                        <br><br>

                                        <div class="m-3">
                                            <h6 class="text-center">
                                                <b><u>ട്രൈബൽ എക്സ്റ്റൻഷൻ ഓഫീസറുടെ റിപ്പോർട്ട്</u>

                                                </b>
                                            </h6>
                                        </div>
                                        <p>ബന്ധപ്പെട്ട രേഖകളുടെ പരിശോധനയിലും ഫീൽഡ് തല അന്വേഷണത്തിലും അപേക്ഷകനെ/യ്ക്ക്
                                            പദ്ധതി മാനദണ്ഡങ്ങൾ പ്രകാരം ധനസഹായത്തിന് അർഹതയുണ്ട് എന്ന് റിപ്പോർട്ട്
                                            ചെയുന്നു.</p>

                                        {{-- <div class="d-flex row">
                                            <div class="col-6">

                                                <label>സ്ഥലം: </label><br>

                                            </div>

                                            <div class="col-6"">

                                                <div>
                                                    <label>
                                                    </label>
                                                </div>

                                            </div>

                                        </div>
                                        <div class=" d-flex row">
                                            <div class="col-6">

                                                <label>തീയതി : </label><br>

                                            </div>

                                            <div class="col-6">

                                                <label>
                                                    ട്രൈബൽ എക്സ്റ്റൻഷൻ ഓഫീസർ



                                                </label>
                                            </div>

                                        </div> --}}
                                </div>

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
