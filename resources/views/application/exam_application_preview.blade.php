@extends('layouts.app')
@section('content')
    <!-- main-content -->
    <div class="main-content app-content">
        <!-- container -->
        <div class="main-container container-fluid">
            <!-- breadcrumb -->
            <div class="breadcrumb-header justify-content-between row me-0 ms-0">
                <div class="col-xl-9">
                    <h4 class="content-title mb-2">അയ്യങ്കാളി ടാലന്റ് സേർച്ച് &ഡെവലപ്പ്മെന്റ് സ്‌കീം പ്രവേശന പരീക്ഷക്കുള്ള
                        അപേക്ഷ</h4>
                </div>
                <div class="col-xl-3">
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
                        <div class="col-12 col-md-8 ">
                            <div class="card overflow-hidden" style="width: 113%;">

                                <div class="card-body pd-y-7">


                                    <h1
                                        style="text-align: center;color: rgb(0, 0, 0);font-size: medium; text-decoration: underline; padding: 20px;line-height: 32px;font-weight: 600;">
                                        അയ്യങ്കാളി ടാലന്റ് സേർച്ച് &ഡെവലപ്പ്മെന്റ് സ്‌കീം പ്രവേശന പരീക്ഷക്കുള്ള അപേക്ഷ

                                    </h1>
                                    <div class="paper-1 pt-4">
                                        <div class="w-100">
                                           <div class="row w-100">
                                              <div class="col-12" style="text-align: right;">
                                                 @if(@$formData['applicant_image'])
                                                    <img src="{{ asset('img/' . @$formData['applicant_image']) }}" width= "100mm" height= "100mm";>
                                                 @endif
                                              </div>
                                           </div>
                                        </div>
                                     </div>
                                    @php
                                        // dd($formData);
                                        $district = App\Models\District::where('_id', $formData['district'])->first();
                                      //  $birth_district = App\Models\District::where('_id', $formData['birth_district'])->first();
                                        $submitted_district = App\Models\District::where('_id', $formData['submitted_district'])->first();
                                        $submitted_teo = App\Models\Teo::where('_id', $formData['submitted_teo'])->first();
                                        $taluk = App\Models\Taluk::where('_id', $formData['taluk'])->first();

                                        // dd($submitted_teo);

                                    @endphp


                                    <div style="font-weight: 500;font-size: 12px;padding: 90px;">

                                        <div class=" row paper-1">
                                            <div class="col-5">

                                                <label>1. School Name / സ്ക്കൂളിന്റെ പേര് </label>
                                            </div>

                                            <div class="col-1">
                                                <label> : </label>
                                            </div>
                                            <div class="col-6">
                                                <label> {{ @$formData['school_name'] }} </label>
                                            </div>
                                        </div>

                                        <div class=" row paper-1">
                                            <div class="col-5">

                                                <label>2. Student Name/വിദ്യാർത്ഥിയുടെ പേര് </label>
                                            </div>

                                            <div class="col-1">
                                                <label> : </label>
                                            </div>
                                            <div class="col-6">
                                                <label> {{ @$formData['student_name'] }} </label>
                                            </div>
                                        </div>
                                        <div class=" row paper-1">
                                            <div class="col-5">

                                                <label>3. Gender / ആൺകുട്ടിയോ/ പെൺകുട്ടിയോ </label>
                                            </div>

                                            <div class="col-1">
                                                <label> : </label>
                                            </div>
                                            <div class="col-6">
                                                <label> {{ @$formData['gender'] }} </label>
                                            </div>
                                        </div>

                                        <div class=" row paper-1">
                                            <div class="col-5">

                                                <label>4.  Address With Pincode /  വിലാസം
                                                    (പിൻകോഡ് സഹിതം ) </label>
                                            </div>

                                            <div class="col-1">
                                                <label> : </label>
                                            </div>

                                            <div class="col-6">
                                                <label> {{ @$formData['address'] }} </label>
                                                <br>{{ @$taluk->taluk_name }},
                                                <br>{{ @$district->name }},
                                                <br> {{ @$formData['pincode'] }}
                                            </div>
                                        </div>
                                        <div class=" row paper-1">
                                            <div class="col-5">

                                                <label>5. Guardian  Name / 
                                                    രക്ഷാധികാരിയുടെ പേര്  </label>
                                            </div>

                                            <div class="col-1">
                                                <label> : </label>
                                            </div>
                                            <div class="col-6">
                                                <label> {{ @$formData['parent_name'] }} </label>
                                            </div>
                                        </div>
                                        <div class=" row paper-1">
                                            <div class="col-5">

                                                <label>6. Relation / രക്ഷിതാവിനു കുട്ടിയുമായുള്ള ബന്ധം </label>
                                            </div>

                                            <div class="col-1">
                                                <label> : </label>
                                            </div>
                                            <div class="col-6">
                                                <label> {{ @$formData['relation'] }} </label>
                                            </div>
                                        </div>
                                        <div class=" row paper-1">
                                            <div class="col-5">

                                                <label>7. Father's Name /   അച്ഛൻ്റെ പേര് </label>
                                            </div>

                                            <div class="col-1">
                                                <label> : </label>
                                            </div>
                                            <div class="col-6">
                                                <label> {{ @$formData['mother_name'] }} </label>
                                            </div>
                                        </div>
                                        <div class=" row paper-1">
                                            <div class="col-5">

                                                <label>8. Mother's Name / മാതാവിന്റെ പേര് </label>
                                            </div>

                                            <div class="col-1">
                                                <label> : </label>
                                            </div>
                                            <div class="col-6">
                                                <label> {{ @$formData['mother_name'] }} </label>
                                            </div>
                                        </div>
                                        <div class=" row paper-1">
                                            <div class="col-5">

                                                <label>9. Annual Income / കുടുംബ വാർഷിക വരുമാനം </label>
                                            </div>

                                            <div class="col-1">
                                                <label> : </label>
                                            </div>
                                            <div class="col-6">
                                                <label> {{ @$formData['annual_income'] }} </label>
                                            </div>
                                        </div>
                                        <div class=" row paper-1">
                                            <div class="col-5">

                                                <label>10. Occupation of Parent / രക്ഷിതാവിന്റെ തൊഴിൽ </label>
                                            </div>

                                            <div class="col-1">
                                                <label> : </label>
                                            </div>
                                            <div class="col-6">
                                                <label> {{ @$formData['occupation_parent'] }} </label>
                                            </div>
                                        </div>
                                        <div class=" row paper-1">
                                            <div class="col-5">

                                                <label>11. Date of Birth / വിദ്യാർത്ഥിയുടെ ജനനതിയതി</label>
                                            </div>

                                            <div class="col-1">
                                                <label> : </label>
                                            </div>
                                            <div class="col-6">
                                                <label> {{ @$formData['dob'] }} </label>
                                            </div>
                                        </div>
                                        <div class=" row paper-1">
                                            <div class="col-5">

                                                <label>12. Age / വയസ്സും </label>
                                            </div>

                                            <div class="col-1">
                                                <label> : </label>
                                            </div>
                                            <div class="col-6">
                                                <label> {{ @$formData['age'] }} </label>
                                            </div>
                                        </div>
                                        <div class=" row paper-1">
                                            <div class="col-5">

                                                <label>13. ST Category / ST വിഭാഗം </label>
                                            </div>

                                            <div class="col-1">
                                                <label> : </label>
                                            </div>
                                            <div class="col-6">
                                                <label> {{ @$formData['caste'] }} </label>
                                            </div>
                                        </div>
                                        <div class=" row paper-1">
                                            <div class="col-5">

                                                <label>14. പട്ടികജാതി/ പട്ടികവർഗ/ മറ്റിതര സമുദായം ഇവയിൽ ഏത് </label>
                                            </div>

                                            <div class="col-1">
                                                <label> : </label>
                                            </div>
                                            <div class="col-6">
                                                <label> {{ @$formData['other'] }} </label>
                                            </div>
                                        </div>
                                        {{-- <div class=" row paper-1">
                                            <div class="col-5">

                                                <label>12. Class, School Name and Address / പഠിക്കുന്ന ക്ലാസും ,സ്കൂളിന്റെ
                                                    പേരും വിലാസവും </label>
                                            </div>

                                            <div class="col-1">
                                                <label> : </label>
                                            </div>
                                            <div class="col-6">
                                                <label> {{ @$formData['school_address'] }} </label>
                                            </div>
                                        </div> --}}
                                        {{-- <div class=" row paper-1">
                                            <div class="col-5">

                                                <label>12. Birth Place / ജനനസ്ഥലവും </label>
                                            </div>

                                            <div class="col-1">
                                                <label> : </label>
                                            </div>
                                            <div class="col-6">
                                                <label> {{ @$formData['birth_place'] }} </label>
                                            </div>
                                        </div> --}}
                                        {{-- <div class=" row paper-1">
                                            <div class="col-5">

                                                <label>13. Birth District / ജില്ലയും </label>
                                            </div>

                                            <div class="col-1">
                                                <label> : </label>
                                            </div>
                                            <div class="col-6">
                                                <label> {{ @$birth_district->name }} </label>
                                            </div>
                                        </div> --}}
                                        <div class=" row paper-1">
                                            <div class="col-5">

                                                <label>15. Mother Tounge/വിദ്യാർത്ഥിയുടെ മാതൃഭാഷ </label>
                                            </div>

                                            <div class="col-1">
                                                <label> : </label>
                                            </div>
                                            <div class="col-6">
                                                <label> {{ @$formData['mother_tonge'] }} </label>
                                            </div>
                                        </div>
                                        <div class=" row paper-1">
                                            <div class="col-5">

                                                <label>16. Place/സ്ഥലം </label>
                                            </div>

                                            <div class="col-1">
                                                <label> : </label>
                                            </div>
                                            <div class="col-6">
                                                <label> {{ @$formData['place'] }} </label>
                                            </div>
                                        </div>

                                        <div class="row paper-1">
                                            <div class="col-5">
                                                <label for="date">17. Date/തിയതി</label>
                                            </div>
                                            <div class="col-1">
                                                <label>:</label>
                                            </div>
                                            <div class="col-6">
                                                <label id="dateLabel">{{ @$formData['date'] }}</label>
                                            </div>
                                        </div>
                                        <div class="row paper-1">
                                            <div class="col-5">
                                                <label for="parentName">Guardian Name/രക്ഷിതാവിന്റെ പേരു</label>
                                            </div>
                                            <div class="col-1">
                                                <label>:</label>
                                            </div>
                                            <div class="col-6">
                                                <label id="parentNameLabel">{{ @$formData['parent_name'] }}</label>
                                            </div>
                                        </div>
                                        <div class="row paper-1">
                                            <div class="col-5">
                                                <label for="parentSign">Guardian Sign/രക്ഷിതാവിന്റെ ഒപ്പും</label>
                                            </div>
                                            <div class="col-1">
                                                <label>:</label>
                                            </div>

                                            <div class="col-6">

                                                @if ($formData['signature'])
                                                    <img class="w-50"
                                                        src="{{ asset('/signature/' . @$formData['signature']) }}"
                                                        alt="">
                                                @endif
                                            </div>

                                        </div>
                                        <br>
                                        <br>
                                        <div class="row mt-5">
                                            <div class="col-12">
                                                <h1
                                                    style="text-align: center;color: rgb(0, 0, 0);font-size: medium; text-decoration: underline; padding: 20px;line-height: 32px;font-weight: 600;">
                                                    അപേക്ഷ സമർപ്പിക്കുന്നത്

                                                </h1>
                                            </div>
                                        </div>

                                        <div class="row w-100">

                                            <div class="col-6 d-flex">
                                                <div class="col-4">
                                                    <label class="fw-bold">ജില്ല</label>
                                                </div>
                                                <div class="col-1">
                                                    <label class="fw-bold">:</label>
                                                </div>
                                                <div class="col-7">
                                                    <label>{{ @$submitted_district->name }}</label>
                                                </div>
                                            </div>


                                            <div class="col-6 d-flex">
                                                <div class="col-4">
                                                    <label class="fw-bold">TEO</label>
                                                </div>
                                                <div class="col-1">
                                                    <label class="fw-bold">:</label>
                                                </div>
                                                <div class="col-7">
                                                    <label>{{ @$submitted_teo->teo_name }}</label>
                                                </div>
                                            </div>
                                        </div>




                                    </div>

                                    {{-- ends here  --}}




                                    <div class="container">
                                        <div class="row">
                                            <div class=" m-auto col-10">
                                                <span for="parentSign"> മുകളിൽ പറഞ്ഞിട്ടുള്ള വിവരങ്ങൾ എല്ലാം എന്റെ
                                                    അറിവിൽപെട്ടിടത്തോളം സത്യവും ശരിയുമെന്നെന്നും ഇതിനാൽ
                                                    ബോധിപ്പിച്ചുകൊള്ളുന്നു.
                                                    മുകളിൽ പറഞ്ഞിട്ടുള്ള സ്കൂളിൽ എന്റെ മകൻ/മകൾ
                                                    <b>{{ @$formData['student_name'] }}</b> പ്രവേശനം ലഭിക്കുന്ന പക്ഷം പഠനം
                                                    പൂർത്തിയാക്കുന്നതിനു മുൻപായി എന്റെ സ്വന്തം താല്പര്യപ്രകാരം പഠിത്തം
                                                    നിർത്തുകയോ കുട്ടിയെ പിന്വലിക്കുകയോ ചെയ്യുകയില്ല എന്നു ഇതിനാൽ
                                                    ഉറപ്പുതന്നുകുള്ളുന്നു.</span>
                                            </div>
                                        </div>
                                    </div>


                                    <br>
                                    <br>
                                    <br>

                                    <form action="{{ url('examApplicationStore') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="row justify-content-center m-5">
                                            <div class="col-md-3">
                                                <input type="hidden" name="formData"
                                                    value="{{ json_encode($formData) }}">
                                                <input type="submit" class="btn-block btn btn-success"
                                                    onclick="return confirm('Do you want to continue?')" value="Submit">

                                            </div>
                                            <div class="col-md-3">
                                                <div class="btn_wrapper">
                                                    <a href="javascript:void(0)" class="btn btn-primary w-100"
                                                        onclick="goback()">Edit</a>
                                                </div>
                                            </div>
                                        </div>
                                    </form>

                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
    <script>
        function validateForm() {

            alert('hho');

            // Check if the required fields are filled
            var parent_name = document.querySelector('[name="parent_name"]').value.trim();
            var signature = document.querySelector('[name="signature"]').value.trim();
            var student_name = document.querySelector('[name="student_name"]').value.trim();
            var agree = document.querySelector('[name="agree"]').value.trim();

            if (parent_name === '' || signature === '' || student_name === '' || agree === '') {
                alert('Please fill in all required fields.');
                return false; // Prevent form submission
            }

            return true; // Allow form submission
        }
    </script>

    <script>
        // edit button function
        function goback() {
            return confirm('Are you sure? Do you want to edit this form!');
        }
    </script>
@endsection
