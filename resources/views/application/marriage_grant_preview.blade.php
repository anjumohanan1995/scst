@extends('layouts.app')
@section('content')
    <link href="{{ asset('css/style_view.css') }}" rel="stylesheet" />
    <!-- main-content -->
    <div class="main-content app-content">
        <!-- container -->
        <div class="main-container container-fluid">
            <!-- breadcrumb -->
            <div class="breadcrumb-header justify-content-between row me-0 ms-0">

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
                <div class="row row-sm">
                    <div class="col-xl-8 col-lg-12 col-md-12 col-sm-12">



                        <div class="card overflow-hidden" style="width: 113%;">

                            <div class="card-body pd-y-7">
                                <h1
                                    style="text-align: center;color: rgb(0, 0, 0);font-size: medium;  padding: 20px;line-height: 32px;font-weight: 600;">
                                    പട്ടികവർഗ്ഗത്തിൽപ്പെട്ട പെണ്കുട്ടികൾക്ക്
                                    വിവാഹധനസഹായം<br>നൽകുന്നതിനുള്ള അപേക്ഷഫോറം


                                </h1>
                                <h2 style="text-align: center;"> പാർട്ട് -എ
                                </h2>
                                <p style="text-align: center;"> ( അപേക്ഷകൻ പൂരിപ്പിക്കേണ്ടത് )


                                </p>
                                <table>
                                    <thead>

                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>അപേക്ഷകന്റെ പൂർണ്ണമായ പേര്
                                            </td>
                                            <td>{{ @$formData['name'] }}</td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>വയസ്</td>
                                            <td>{{ @$formData['age'] }}</td>
                                        </tr>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>ഇപ്പോഴത്തെ മേൽവിലാസം</td>
                                            <td>{{ @$formData['current_address'] }}
                                                <br>
                                                @if (@$formData['current_district_name'])
                                                    {{ @$formData['current_district_name'] }}
                                                @endif
                                                @if (@$formData['current_taluk_name'])
                                                    ,{{ @$formData['current_taluk_name'] }}
                                                @endif
                                                @if (@$formData['current_pincode'])
                                                    ,{{ @$formData['current_pincode'] }}
                                                @endif
                                            </td>
                                        </tr>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td>സ്ഥിരമായ മേൽവിലാസം
                                            </td>
                                            <td>{{ @$formData['permanent_address'] }}
                                                <br>
                                                @if (@$formData['permanent_district_name'])
                                                    {{ @$formData['permanent_district_name'] }}
                                                @endif
                                                @if (@$formData['permanent_taluk_name'])
                                                    ,{{ @$formData['permanent_taluk_name'] }}
                                                @endif
                                                @if (@$formData['permanent_pincode'])
                                                    ,{{ @$formData['permanent_pincode'] }}
                                                @endif
                                            </td>
                                        </tr>
                                        </tr>
                                        <tr>
                                            <td>5</td>
                                            <td>കുടുംബങ്ങളെ സംബന്ധിച്ച<br> വിശദവിവരങ്ങൾ
                                                <br> ( മരിച്ചുപോയവരുടേതുൾപ്പെടെ )
                                            </td>
                                            <td>{{ @$formData['family_details'] }}</td>
                                        </tr>
                                        </tr>
                                        <tr>
                                            <td>6</td>
                                            <td>അപേക്ഷകന്റെ ജാതി <br> (തഹസിൽദാരിൽനിന്നും ജാതി<br> തെളിയിക്കുന്ന
                                                സാക്ഷ്യപത്രം <br>(അസൽ )ഹാജരാക്കണം )
                                            </td>
                                            <td>
                                                @if ($formData['caste_certificate'])
                                                <a href="{{ asset('applications/marriage_grant_certificates/' . @$formData['caste_certificate']) }}" target="_blank">View</a>
                                                    
                                                @endif
                                            </td>
                                        </tr>
                                        </tr>
                                        <tr>
                                            <td>7</td>
                                            <td>വിവാഹം ഉറപ്പിച്ചിരിക്കുന്ന പെൺകുട്ടിയുടെ<br> പേരും മേൽവിലാസവും
                                            </td>
                                            <td>{{ @$formData['fiancee_name'] }} <br>{{ @$formData['fiancee_address'] }}
                                                <br>
                                                @if (@$formData['fiancee_district_name'])
                                                    ,{{ @$formData['fiancee_district_name'] }}
                                                @endif
                                                @if (@$formData['fiancee_taluk_name'])
                                                    ,{{ @$formData['fiancee_taluk_name'] }}
                                                @endif
                                                @if (@$formData['fiancee_pincode'])
                                                    ,{{ @$formData['fiancee_pincode'] }}
                                                @endif
                                            </td>
                                        </tr>
                                        </tr>
                                        <tr>
                                            <td>8</td>
                                            <td>ആരുടെ വിവാഹമാണോ ഉറപ്പിച്ചിരിക്കുന്നത്<br> ആ പെൺകുട്ടിക്ക്
                                                അപേക്ഷകനുമായുള്ള<br> ബന്ധം
                                            </td>
                                            <td>{{ @$formData['relation_with_applicant'] }}</td>
                                        </tr>
                                        <tr>
                                            <td>9</td>
                                            <td>പെൺകുട്ടിയുടെ ആദ്യവിവാഹമോ പുനർവിവാഹമോ

                                            </td>
                                            <td> {{ @$formData['marriage_type'] }}</td>
                                        </tr>
                                        <tr>
                                            <td>10</td>
                                            <td>ഗുണഭോക്താവ് വിധവയാണോ

                                            </td>
                                            <td> {{ @$formData['is_widow'] }} </td>
                                        </tr>
                                        <tr>
                                            <td>11</td>
                                            <td>അച്ഛൻ/അമ്മ/ രക്ഷാകർത്താവിന്റെ തൊഴിൽ

                                            </td>
                                            <td>{{ ucwords(@$formData['parent_occupation']) }}</td>
                                        </tr>
                                        <tr>
                                            <td>12</td>
                                            <td>കുടുംബത്തിൽ എല്ലാ മാർഗത്തിൽ<br> നിന്നുമുള്ള ആകെ വാർഷിക വരുമാനം (വില്ലേജ്
                                                <br> ആഫീസറിൽ നിന്നും ലഭിച്ച സർട്ടിഫിക്കറ്റ് <br>(അസൽ) ഹാജരാക്കണം )


                                            </td>
                                            <td>{{ ucwords(@$formData['annual_income']) }}<br>
                                                @if ($formData['income_certificate'])
                                                <a href="{{ asset('applications/marriage_grant_certificates/' . @$formData['income_certificate']) }}" target="_blank">View</a>

                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>13</td>
                                            <td>നിശ്ചയിച്ചിരിക്കുന്ന വിവഹ സ്ഥലവും <br>തീയതിയും


                                            </td>
                                            <td>{{ ucwords(@$formData['marriage_place']) }} ,
                                                @if($formData['marriage_date'])  {{ date("d-m-Y",strtotime(@$formData['marriage_date'])) }} @endif</td>
                                        </tr>
                                        <tr>
                                            <td>14</td>
                                            <td> വിവാഹിതയാകാൻ പോകുന്ന<br> പെൺകുട്ടിയുടെ മാതാവ് / പിതാവ്
                                                <br> മരിച്ചുപോയിട്ടുടെങ്കിൽ ആയത്<br> സംബന്ധിച്ച വിവരങ്ങൾ
                                            </td>
                                            <td>{{ @$formData['fiancee_family_details'] }}</td>
                                        </tr>
                                        <tr>
                                            <td>15</td>
                                            <td>മാതാപിതാക്കളിലാർക്കെങ്കിലും തൊഴിലിൽ <br>ഏർപ്പെടാൻ കഴിയാത്തവിധം<br>
                                                അംഗവൈകല്യം സംഭവിച്ചിട്ടുണ്ടെങ്കിൽ<br> ആയത് സംബന്ധിച്ച വിവരങ്ങൾ


                                            </td>
                                            <td>{{ @$formData['disabled_parent_info'] }}</td>
                                        </tr>
                                        <tr>
                                            <td>16</td>
                                            <td>വിവാഹം കഴിക്കുന്ന പെണ്കുട്ടിയോ<br> മാതാപിതാക്കളോ അടിമപ്പണിയിൽ നിന്നും
                                                <br>വിമുക്തരാക്കപ്പെട്ടവരാണെങ്കിൽ<br> ആയതിന്റെ വിശദവിവരം


                                            </td>
                                            <td>{{ @$formData['freedmen_parent_details'] }}</td>
                                        </tr>
                                        <tr>
                                            <td>17</td>
                                            <td>വിവാഹിതയാകുന്ന പെൺക്കുട്ടിയോ<br> മാതാപിതാക്കളോ<br>
                                                പട്ടികവർഗക്കാരല്ലാത്തവരുടെ <br>അതിക്രമങ്ങൾക്കിരയായിട്ടുള്ളവരാണെങ്കിൽ
                                                <br>ആയതിന്റെ വിവരങ്ങൾ

                                            </td>
                                            <td>{{ @$formData['violence_by_non_scheduled_tribes_info'] }}</td>
                                        </tr>
                                        <tr>
                                            <td>18</td>
                                            <td>വിവാഹിതയാകുന്ന പെൺകുട്ടിയുടെയോ<br> ഭൂമി അന്യാധീനപ്പെട്ട്<br>
                                                നിർദ്ധനരായിട്ടുള്ളപക്ഷം <br>ആയതിന്റെ വിവരങ്ങൾ


                                            </td>
                                            <td>{{ @$formData['land_alienated_details'] }}</td>
                                        </tr>
                                        <tr>
                                            <td>19</td>
                                            <td>വിവാഹിതയാകുന്ന പെൺകുട്ടിയുടെ<br> മാതാവോ / പിതാവോ സമുദായഭ്രഷ്ടരാണെങ്കിൽ
                                                <br>ആയതിന്റെ പൂർണവിവരം


                                            </td>
                                            <td>{{ @$formData['outcast_parent_details'] }}</td>
                                        </tr>
                                        <tr>
                                            <td>20</td>
                                            <td>വിവാഹിതയാകുന്ന പെൺകുട്ടിയുടെ<br> മാതാവോ / പിതാവോ പുനർവിവാഹം<br> ചെയ്ത്
                                                ജീവിക്കുന്നുവെങ്കിൽ ആയതിന്റെ വിവരങ്ങൾ

                                            </td>
                                            <td>{{ @$formData['remarried_parent_details'] }}</td>
                                        </tr>
                                        <tr>
                                            <td>21</td>
                                            <td>വരന്റെ പേരും മേൽവിലാസവും



                                            </td>
                                            <td>{{ @$formData['groom_name'] }} <br>{{ @$formData['groom_address'] }}
                                                <br>
                                                @if (@$formData['groom_district_name'])
                                                    {{ @$formData['groom_district_name'] }}
                                                @endif
                                                @if (@$formData['groom_taluk_name'])
                                                    ,{{ @$formData['groom_taluk_name'] }}
                                                @endif
                                                @if (@$formData['groom_pincode'])
                                                    ,{{ @$formData['groom_pincode'] }}
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>22</td>
                                            <td>വരന്റെ അച്ഛന്റെ / അമ്മയുടെ<br> /രക്ഷാകർത്താവിന്റെ<br> പേരും മേൽവിലാസവും

                                            </td>
                                            <td>{{ @$formData['groom_parent_name'] }}
                                                <br>{{ @$formData['groom_parent_address'] }}
                                                <br>
                                                @if (@$formData['groom_parent_district_name'])
                                                    {{ @$formData['groom_parent_district_name'] }}
                                                @endif
                                                @if (@$formData['groom_parent_taluk_name'])
                                                    ,{{ @$formData['groom_parent_taluk_name'] }}
                                                @endif
                                                @if (@$formData['groom_parent_pincode'])
                                                    ,{{ @$formData['groom_parent_pincode'] }}
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>23</td>
                                            <td>.ഈ ആവശ്യത്തിന് സർക്കാരിൽനിന്നോ<br> സംഘടനകളിൽനിന്നോ ഏജൻസികളിൽനിന്നോ
                                                <br>ധനസഹായം ലഭിച്ചിട്ടുണ്ടെങ്കിൽ <br>ആയതിന്റെ പൂർണവിവരം


                                            </td>
                                            <td>{{ @$formData['financial_assistance_details'] }}</td>
                                        </tr>
                                        <tr>
                                            <td>24</td>
                                            <td>.പഞ്ചായത്തിൻ്റെ/കോ-ഓർപ്പറേഷൻ്റെ പേര്


                                            </td>
                                            <td>{{ @$formData['panchayath_name'] }}</td>
                                        </tr>
                                        <tr>
                                            <td>25</td>
                                            <td>വിവാഹത്തിന് ശേഷമാണോ അപേക്ഷ സമർപ്പിക്കുന്നത്? 


                                            </td>
                                            <td>{{ @$formData['submitted_after_marriage'] }}</td>
                                        </tr>
                                        @if(@$formData['submitted_after_marriage'] == 'Yes')
                                        <tr>
                                            <td>26</td>
                                            <td>Marriage Date & Certificate 


                                            </td>
                                            <td>
                                                
                                                @if(@$formData['date_of_marriage']!=null) {{ \Carbon\Carbon::parse(@$formData['date_of_marriage'])->format('d-m-Y') }} @endif<br>
                                                @if ($formData['marriage_certificate'])
                                               <a href="{{ asset('applications/marriage_grant_certificates/' . @$formData['marriage_certificate']) }}" target="_blank">View</a>
                                                 @endif

                                            
                                               
                                            </td>
                                        </tr>
                                        @else
                                        <tr>
                                            
                                            <td>26</td>
                                            <td>Invitation Letter


                                            </td>
                                            <td>
                                               
                                                @if ($formData['invitation_letter'])
                                               <a href="{{ asset('applications/marriage_grant_certificates/' . @$formData['invitation_letter']) }}" target="_blank">View</a>
                                                 @endif
                                               
                                            </td>
                                        </tr>
                                        @endif
                                       
                                        
                                        


                                    </tbody>
                                </table>


                                <div class="row mt-5">
                                        <div class="row d-flex flex-direction-row col-4">
                                            <div class="row col-12">
                                                <div class="col-4">

                                                    <label>സ്ഥലം </label>
                                                </div>

                                                <div class="col-1">
                                                    <label> : </label>
                                                </div>
                                                <div class="col-6">
                                                    <label> {{ @$formData['place'] }} </label>
                                                </div>
                                            </div>

                                            <div class="row col-12">
                                                <div class="col-4">

                                                    <label>തീയതി </label>
                                                </div>

                                                <div class="col-1">
                                                    <label> : </label>
                                                </div>
                                                <div class="col-6">
                                                    <label> {{ date('d-m-Y') }} </label>
                                                </div>
                                            </div>


                                        </div>

                                        <div class="col-4 d-flex">
                                            <div class="row d-flex col-12">
                                                <div class="col-12">
                                                    @if ($formData['applicant_photo'])
                                                 
                                                        <img src="{{ asset('applications/marriage_grant_certificates/' . @$formData['applicant_photo']) }}" width="120px" height="60px">
                                                @endif
                                                    <label>അപേക്ഷകന്റെ ഫോട്ടോ</label>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-4 d-flex">
                                            <div class="row d-flex col-12">
                                                <div class="col-12">
                                                    @if ($formData['signature'])
                                                  
                                                        <img src="{{ asset('applications/marriage_grant_certificates/' . @$formData['signature']) }}" width="120px" height="60px">
                                                @endif
                                                    <label>അപേക്ഷകന്റെ ഒപ്പ്</label>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                        <div class="row mt-5">
                                            <div class="col-12">
                                                <h1
                                                    style="text-align: center;color: rgb(0, 0, 0);font-size: medium; text-decoration: underline; padding: 20px;line-height: 32px;font-weight: 600;">
                                                    അപേക്ഷ സമർപ്പിക്കുന്നത്

                                                </h1>
                                            </div>
                                        </div>
                                        <div class="row ">
                                            <div class=" col-6 d-flex ">
                                                <div class=" d-flex col-12">
                                                    <div class="col-3">

                                                        <label>ജില്ല </label>
                                                    </div>

                                                    <div class="col-1">
                                                        <label> : </label>
                                                    </div>
                                                    <div class="col-8">
                                                        <label> {{ @$formData['dist_name'] }} </label>
                                              

                                                    </div>
                                                </div>


                                            </div>

                                            <div class="col-6 d-flex">
                                                <div class=" d-flex col-12">
                                                    <div class="col-3">

                                                        <label>TEO</label>
                                                    </div>

                                                    <div class="col-1">
                                                        <label> : </label>
                                                    </div>
                                                    <div class="col-8">
                                                        <label> {{ @$formData['teo_name'] }} </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><br></br>

                                        <form action="{{ url('marriageGrantStoreDetails') }}" method="POST"
                                            enctype="multipart/form-data" >
                                            @csrf


                                            <div class="row justify-content-center">
                                                <div class="col-md-3">
                                                    <input type="hidden" name="formData"
                                                        value="{{ json_encode($formData) }}">
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
                    if (confirm('Are you sure? Do you want to edit this form?')) {
                        window.location.href = "{{ url()->previous() }}";
                        //window.history.back();
                       
                    }
                }
            </script>
        @endsection
