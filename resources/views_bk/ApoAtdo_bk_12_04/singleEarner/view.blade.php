@extends('layouts.app')
@section('content')
    <!-- main-content -->
    <div class="main-content app-content">
        <!-- container -->
        <div class="main-container container-fluid">
            <!-- breadcrumb -->
            <div class="breadcrumb-header justify-content-between row me-0 ms-0">
                <div class="col-xl-9">
                    <h4 class="content-title mb-2">ഏകവരുമാനദായകന്റെ മരണം തെളിയിക്കുന അപേക്ഷഫോറം</h4>
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
                    <div class="col-12 d-flex ">

                        @php

                            $taluk = App\Models\Taluk::where('_id', $formData['taluk'])->first();
                            $district = App\Models\District::where('_id', $formData['district'])->first();
                            $submitted_district = App\Models\District::where('_id', $formData['submitted_district'])->first();
                            $submitted_teo = App\Models\Teo::where('_id', $formData['submitted_teo'])->first();

                        @endphp



                        <div class="row row-sm w-100">
                            <div class="col-xl-8 col-lg-12 col-md-12 col-sm-12">
                                <div class=" card">
                                    <div class="card-body  p-5">      
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


                                        <div class="paper-1 pt-4">
                                            <div class="w-100">
                                               <div class="row w-100">
                                                  <div class="col-12" style="text-align: right;">
                                                     @if(@$formData['applicant_image'])
                                                        <img src="{{ asset('applications/single_earner/' . @$formData['applicant_image']) }}" width= "100mm" height= "100mm";>
                                                     @endif
                                                  </div>
                                               </div>
                                            </div>
                                         </div>
    
    


                                        <div action="#" method="post"
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
    
                                                    <label>ഇമെയിൽ
    
    
                                                    </label>
                                                </div>
    
                                                <div class="col-1">
                                                    <label> :</label>
                                                </div>
    
                                                <div class="col-5">
                                                    <label> {{ @$formData['applicant_email'] }}</label>
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
                                                @endphp

                                                <div class="col-5">
                                                    <label> {{ @$formData['address'] }},
                                                        <br>{{ @$taluk->taluk_name }},
                                                        <br>{{ @$district->name }},
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
                                            <div class="row">
                                                <div class="col-6">
                                                    <p>കുടുബാംഗങ്ങളിൽ 18 നും 70 നും മദ്ധ്യേ പ്രായമായവരുടെ പേരും, തൊഴിലും,
                                                        വരുമാനവും
                                                    </p>
                                                </div>
                                                <div class="col-1"></div>
                                                <div class="col-5">
                                                    <table border="1" class="w-100">
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
                                                </div>
                                            </div>




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



                                            {{-- files code starts here   --}}


                                            @if ($formData['caste_certificate'])
                                                <div class="row">
                                                    <div class="col-6">അപേക്ഷകന്റെ ജാതി തെളിയിക്കുന്ന സർട്ടിഫിക്കറ്റ്
                                                    </div>
                                                    <div class="col-1">:</div>
                                                    <div class="col-5">
                                                        <a href="{{ asset('/applications/single_earner/' . @$formData['caste_certificate'] ?? '') }}"
                                                            target="_blank" rel="noopener noreferrer">View</a>

                                                    </div>
                                                </div>
                                            @endif



                                            @if ($formData['adhaar_copy'])
                                                <div class="row">
                                                    <div class="col-6">അപേക്ഷകന്റെ ആധാർ പകർപ്പ് </div>
                                                    <div class="col-1">:</div>
                                                    <div class="col-5">
                                                        <a href="{{ asset('/applications/single_earner/' . @$formData['adhaar_copy']) }}"
                                                            target="_blank">View</a>
                                                    </div>
                                                </div>
                                            @endif

                                            @if ($formData['passbook_copy'])
                                                <div class="row">
                                                    <div class="col-6">അപേക്ഷകന്റെ പാസ്ബുക്ക് പകർപ്പ്</div>
                                                    <div class="col-1">:</div>
                                                    <div class="col-5">
                                                        <a href="{{ asset('/applications/single_earner/' . @$formData['passbook_copy']) }}"
                                                            target="_blank">View</a>
                                                    </div>
                                                </div>
                                            @endif

                                            @if ($formData['death_certificate'])
                                                <div class="row">
                                                    <div class="col-6">മരണ സർട്ടിഫിക്കറ്റിന്റെ പകർപ്പ് </div>
                                                    <div class="col-1">:</div>
                                                    <div class="col-5">
                                                        <a href="{{ asset('/applications/single_earner/' . @$formData['death_certificate']) }}"
                                                            target="_blank">View</a>
                                                    </div>
                                                </div>
                                            @endif

                                            @if ($formData['ration_card'])
                                                <div class="row">
                                                    <div class="col-6">റേഷൻ കാർഡിന്റെ പകർപ്പ് </div>
                                                    <div class="col-1">:</div>
                                                    <div class="col-5">
                                                        <a href="{{ asset('/applications/single_earner/' . @$formData['ration_card']) }}"
                                                            target="_blank">View</a>
                                                    </div>
                                                </div>
                                            @endif


                                            @if ($formData['income_certificate'])
                                                <div class="row">
                                                    <div class="col-6">വില്ലജ് ഓഫീസറിൽ നിന്നുള്ള സാക്ഷ്യപത്രം</div>
                                                    <div class="col-1">:</div>
                                                    <div class="col-5">
                                                        <a href="{{ asset('/applications/single_earner/' . @$formData['income_certificate']) }}"
                                                            target="_blank">View</a>
                                                    </div>
                                                </div>
                                            @endif

                                            @if ($formData['past_job_document'])
                                                <div class="row">
                                                    <div class="col-6">ഏക വരുമാന ദായകനായിരുന്നു എന്നത് സംബന്ധിച്ച്
                                                        തഹസിൽദാരിൽ നിന്നുള്ള സാക്ഷ്യപത്രം</div>
                                                    <div class="col-1">:</div>
                                                    <div class="col-5">
                                                        <a href="{{ asset('/applications/single_earner/' . @$formData['past_job_document']) }}"
                                                            target="_blank">View</a>
                                                    </div>
                                                </div>
                                            @endif


                                            <div class="row">
                                                <div class="col-6">അപേക്ഷകന്റെ ഒപ്പു </div>
                                                <div class="col-1">:</div>
                                                <div class="col-5">
                                                    {{-- <a href="{{ asset('/applications/single_earner/' . @$formData->past_job_document) }}"
                                                        target="_blank">View</a> --}}

                                                    @if (@$formData['signature'])
                                                        <embed
                                                            src="{{ asset('applications/single_earner/' . @$formData['signature']) }}"
                                                            type="" width="250px" height="150px">
                                                    @else
                                                        Not uploaded!
                                                    @endif

                                                </div>
                                            </div>



                                            {{-- files code ends here   --}}


                                            <div class="m-5">
                                                <h6 class="text-center">
                                                    <b><u>സത്യപ്രസ്താവന</u>
                                                    </b>
                                                </h6>
                                            </div>
                                            <p>മേൽ പ്രസ്താവിച്ച വിവരങ്ങൾ പൂർണമായും സത്യമാണെന്ന് ബോധിപ്പിച് കൊള്ളുന്നു
                                            </p>



                                            <br>

                                            <div class="m-3">
                                                <h6 class="text-center">
                                                    <b><u>ട്രൈബൽ എക്സ്റ്റൻഷൻ ഓഫീസറുടെ റിപ്പോർട്ട്</u>

                                                    </b>
                                                </h6>
                                            </div>
                                            <p>ബന്ധപ്പെട്ട രേഖകളുടെ പരിശോധനയിലും ഫീൽഡ് തല അന്വേഷണത്തിലും അപേക്ഷകനെ/യ്ക്ക്
                                                പദ്ധതി മാനദണ്ഡങ്ങൾ പ്രകാരം ധനസഹായത്തിന് അർഹതയുണ്ട് എന്ന് റിപ്പോർട്ട്
                                                ചെയുന്നു.</p>
                                            <br>
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
                                            <br>
                                            <div class="row" id="btnHide">
                                                <button class="btn btn-primary" onclick="printDiv()">Print Part</button>
                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>
                        </div>

                      
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
                            <div class="pt-2 card overflow-hidden">
                            
                               <div class="card-body">
                                 <ul class="timeline-3">
                                  
                                     <li class="ApproveTimeline">
                                       <a href="#!">TEO</a>
                                       <a href="#!" class="float-end">@if( @$formData['teo_view_date'] !='')<i class="fa fa-eye"></i>  {{ @$formData['teo_view_date'] }}@endif</a>
                                       <br>
                                       <p class="inputText badge bg-success" style="font-size: 12px">Approved </p>
                                       <p class="mt-2"><span class= "spanclr">TEO  :  </span>{{ @$formData->teo->teo_name }}</p>
                                       <p class="mt-2"><span class= "spanclr"> Name : </span>{{ @$formData->teoUser->name }}</p>
                                       <p class="mt-2"><span class= "spanclr">District :  </span>{{ @$formData->district->name }}</p>
                                       <p  class="mt-2"><span class= "spanclr"> Approved Date :   </span>@if(@$formData['teo_status_date']!=null) {{ \Carbon\Carbon::parse(@$formData['teo_status_date'])->format('d-m-Y h:i a') }}@endif</p>
                                       <p  class="mt-2"><span class= "spanclr"> Approved Reason :   </span>{{ @$formData->teo_status_reason}}</p>
                                     
                                     </li>
                                     <li class="ApproveTimeline">
                                        <a href="#!">Clerk</a>
                                        <a href="#!" class="float-end"><i class="fa fa-eye"></i>  {{ @$formData['clerk_view_date'] }}</a>
                                        <br>
                                        <p class="inputText badge bg-success" style="font-size: 12px">Approved </p>
                                        <p  class="mt-2"><span class= "spanclr"> Clerk Name :   </span>{{ @$formData->clerkUser->name }}</p>
                                      
                                        <p  class="mt-2"><span class= "spanclr"> Approved Date :   </span>@if(@$formData['clerk_status_date']!=null) {{ \Carbon\Carbon::parse(@$formData['clerk_status_date'])->format('d-m-Y h:i a') }}@endif</p>
                                        <p  class="mt-2"><span class= "spanclr"> Approved Reason :   </span>{{ @$formData->clerk_status_reason}}</p>
                                     </li>
                                     @if( @$formData->assistant_status == null)
                                     <li class="pendingTimeline">
                                        <a href="#!">{{ auth::user()->name }}</a>
                                        <a href="#!" class="float-end"><i class="fa fa-eye"></i>  {{ @$formData['assistant_view_date'] }}</a>
                                        <br>
                                        <p class="inputText badge bg-warning" style="font-size: 12px">Pending</p>
                                        <div class="settings-icon">
                                           <a class="approveItem" data-id="{{ @$formData->id }}"><i class="fa fa-check bg-success me-1"></i></a>
                                           &nbsp;&nbsp;  <a class="rejectItem" data-id="{{ @$formData->id }}"><i class="fa fa-ban bg-danger "></i></a>
                                        </div>
                                     </li>
                                     @elseif( @$formData->assistant_status == 1)
                                     <li class="ApproveTimeline">
                                        <a href="#!">{{ auth::user()->name }}</a>
                                        <a href="#!" class="float-end"><i class="fa fa-eye"></i>  {{ @$formData['assistant_view_date'] }}</a>
                                        <br>
                                        <p class="inputText badge bg-success" style="font-size: 12px">Approved </p>
                    
                                        <p  class="mt-2"><span class= "spanclr"> Approved Date :   </span>@if(@$formData['assistant_status_date']!=null) {{ \Carbon\Carbon::parse(@$formData['assistant_status_date'])->format('d-m-Y h:i a') }}@endif</p>
                                        <p  class="mt-2"><span class= "spanclr"> Approved Reason :   </span>{{ @$formData->assistant_status_reason}}</p>
                                     </li>
                                     @elseif( @$formData->assistant_status == 2)
                                     <li class="rejectTimeline">
                                        <a href="#!">{{ auth::user()->name }}</a>
                                        <a href="#!" class="float-end"><i class="fa fa-eye"></i>  {{ @$formData['assistant_view_date'] }}</a>
                                        <br>
                                        <p class="inputText badge bg-danger" style="font-size: 12px">Rejected </p>
                                        <p  class="mt-2"><span class= "spanclr"> Rejected Date :   </span>@if(@$formData['assistant_status_date']!=null) {{ \Carbon\Carbon::parse(@$formData['assistant_status_date'])->format('d-m-Y h:i a') }}@endif</p>
                                        <p  class="mt-2"><span class= "spanclr"> Rejected Reason :   </span>{{ @$formData->assistant_status_reason}}</p>
                                     </li>
                                     @endif

                                     @if(@$formData->assistant_status == 1)
                                     @if( @$formData->officer_status == 1)
                    
                                     <li class="ApproveTimeline">
                                       <a href="#!">PO / TDO</a>
                                       <a href="#!" class="float-end"><i class="fa fa-eye"></i>  {{ @$formData['officer_view_date'] }}</a>
                                       <p></p>
                                       <p class="inputText badge bg-success" style="font-size: 12px">Approved </p>
                                       <p  class="mt-2"><span class= "spanclr"> Name :   </span>{{ @$formData->officerUser->name }}</p>
                                      
                                       <p  class="mt-2"><span class= "spanclr"> Approved Date :   </span>@if(@$formData['officer_status_date']!=null) {{ \Carbon\Carbon::parse(@$formData['officer_status_date'])->format('d-m-Y h:i a') }}@endif</p>
                                       <p  class="mt-2"><span class= "spanclr"> Approved Reason :   </span>{{ @$formData->officer_status_reason}}</p>
                                    </li>
                                    @elseif( @$formData->officer_status == 2)
                    
                                    <li class="rejectTimeline">
                                      <a href="#!">PO / TDO</a>
                                      <a href="#!" class="float-end"><i class="fa fa-eye"></i>  {{ @$formData['officer_view_date'] }}</a>
                                      <p></p>
                                      <p class="inputText badge bg-danger" style="font-size: 12px">Rejected </p>
                                      <p  class="mt-2"><span class= "spanclr"> Name :   </span>{{ @$formData->officerUser->name }}</p>
                                      
                                      <p  class="mt-2"><span class= "spanclr"> Rejected Date :   </span>@if(@$formData['officer_status_date']!=null) {{ \Carbon\Carbon::parse(@$formData['assistant_status_date'])->format('d-m-Y h:i a') }}@endif</p>
                                      <p  class="mt-2"><span class= "spanclr"> Rejected Reason :   </span>{{ @$formData->officer_status_reason}}</p>
                                   </li>
                                   @elseif( @$formData->officer_status == null)
                    
                                   <li class="pendingTimeline">
                                     <a href="#!">PO / TDO</a>
                                     <a href="#!" class="float-end"><i class="fa fa-eye"></i>  {{ @$formData['officer_view_date'] }}</a>
                                    <p></p>
                                     <p class="inputText badge bg-warning" style="font-size: 12px">Pending </p>
                                      </li>
                                      @endif
                                      @endif

                                 </ul>
                     
                         <!-- /row -->
                     </div>
                     
            </div>
            </div>

                         <div class="modal fade" id="approve-popup" style="display: none">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content country-select-modal border-0">
                                    <div class="modal-header offcanvas-header">
                                        <h6 class="modal-title">Are you sure to Approve this Application?</h6><button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button"><span aria-hidden="true">×</span></button>
                                    </div>
                                    <div class="modal-body p-5">
                                       
                                        <form id="ownForm">                            
                                            @csrf
                                            <div class="text-center">
                                                <h5>Reason for Approval</h5>
                                                <textarea class="form-control" name="approved_reason" id="approved_reason" requred></textarea>
                                                <span id="approval"></span>
                                            </div>
                                        <input type="hidden" id="requestId" name="requestId" value="" />
                                        <div class="text-center">
                                            <button type="button" onclick="approve()" class="btn btn-primary mt-4 mb-0 me-2">Yes</button>
                                            <button class="btn btn-default mt-4 mb-0" data-bs-dismiss="modal" type="button">No</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="rejection-popup">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content country-select-modal border-0">
                                    <div class="modal-header offcanvas-header">
                                        <h6 class="modal-title">Are you sure to reject this Application?</h6><button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button"><span aria-hidden="true">×</span></button>
                                    </div>
                                    <div class="modal-body p-5">
                                        <form id="ownForm">
                                            @csrf
                                        <div class="text-center">
                                            <h5>Reason for Rejection</h5>
                                            <textarea class="form-control" name="reason" id="reason" requred></textarea>
                                            <span id="rejection"></span>
                                        </div>
                    
                                        <input type="hidden" id="requestId2" name="requestId2" value="" />
                                        <div class="text-center">
                                            <button type="button" onclick="reject()" class="btn btn-primary mt-4 mb-0 me-2">Yes</button>
                                            <button class="btn btn-default mt-4 mb-0" data-bs-dismiss="modal" type="button">No</button>
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
    </div>
    <meta name="csrf_token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href="{{ asset('css/timeline.css') }}">
    <script type="text/javascript">


        $(document).on("click", ".approveItem", function() {
            var id =$(this).attr('data-id');
                $('#requestId').val($(this).attr('data-id') );
                $('#approve-popup').modal('show');
                  
              
                });
                $(document).on("click", ".rejectItem", function() {
                    $('#requestId2').val($(this).attr('data-id') );
                $('#rejection-popup').modal('show');
                });
    
                function approve() {
    
                    var reqId = $('#requestId').val();
                    var reason = $('#approved_reason').val();
            
                $.ajax({
                            url: "{{ route('singleEarner-assistant.approve') }}",
                            type: "POST",
                            data: {
                                "id": reqId,
                                "reason" :reason,
                                "_token": "{{ csrf_token() }}"
                            },
                            success: function(response) {
                                toastr.success(response.success, 'Success!')
                                $('#success').show();
                                $('#approve-popup').modal('hide');
                                $('#success_message').fadeIn().html(response.success);
                                setTimeout(function() {
                                    $('#success_message').fadeOut("slow");
                                }, 2000);
            
                                $('#example').DataTable().ajax.reload();
            
                            }
                        });
            }
            function reject() {
                    var reason = $('#reason').val();
                  
                    if($('#reason').val() == ""){
                        rejection.innerHTML = "<span style='color: red;'>"+"Please enter the reason for rejection</span>";
                    }
                    else{
                        rejection.innerHTML ="";
                        var reqId = $('#requestId2').val();
                    console.log(reqId);
                    $.ajax({
                      
                        url: "{{ route('singleEarner-assistant.reject') }}",
                        type: "POST",
                            data: {
                                "id": reqId,
                                "reason" :reason,
                                "_token": "{{ csrf_token() }}"
                            },
                        success: function(response) {
                            console.log(response.success);
                            toastr.success(response.success, 'Success!')
                                $('#rejection-popup').modal('hide');
                                $('#success_message').fadeIn().html(response.success);
                                    setTimeout(function() {
                                        $('#success_message').fadeOut("slow");
                                    }, 2000 );
            
                                $('#example').DataTable().ajax.reload();
            
                        }
                    })
            
                    }
                 }

        // edit button function
        function goback() {
            if (confirm('Are you sure ? Do you want to edit this form!. ')) {
                window.history.back();
            }
            return
        }
    </script>
@endsection
