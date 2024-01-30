@extends('layouts.app')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

<style>
    .details-card {
        background: #ecf0f1;
    }

    .card-content {
        background: #ffffff;
        border: 4px;
        box-shadow: 0 2px 5px 0 rgba(0, 0, 0, .16), 0 2px 10px 0 rgba(0, 0, 0, .12);
    }

    .card-img {
        position: relative;
        overflow: hidden;
        border-radius: 0;
        z-index: 1;
    }

    .card-img img {
        width: 100%;
        height: auto;
        display: block;
    }

    .card-img span {
        position: absolute;
        top: 15%;
        left: 12%;
        background: #1ABC9C;
        padding: 6px;
        color: #fff;
        font-size: 12px;
        border-radius: 4px;
        -webkit-border-radius: 4px;
        -moz-border-radius: 4px;
        -ms-border-radius: 4px;
        -o-border-radius: 4px;
        transform: translate(-50%, -50%);
    }

    .card-img span h4 {
        font-size: 12px;
        margin: 0;
        padding: 10px 5px;
        line-height: 0;
    }

    .card-desc {
        padding: 1.25rem;
    }

    .card-desc h3 {
        color: #000000;
        font-weight: 600;
        font-size: 1.5em;
        line-height: 1.3em;
        margin-top: 0;
        margin-bottom: 5px;
        padding: 0;
    }

    .card-desc p {
        color: #747373;
        font-size: 14px;
        font-weight: 400;
        font-size: 1em;
        line-height: 1.5;
        margin: 0px;
        margin-bottom: 20px;
        padding: 0;
        font-family: 'Raleway', sans-serif;
    }

    .btn-card {
        background-color: #1ABC9C;
        color: #fff;
        box-shadow: 0 2px 5px 0 rgba(0, 0, 0, .16), 0 2px 10px 0 rgba(0, 0, 0, .12);
        padding: .84rem 2.14rem;
        font-size: .81rem;
        -webkit-transition: color .15s ease-in-out, background-color .15s ease-in-out, border-color .15s ease-in-out, -webkit-box-shadow .15s ease-in-out;
        transition: color .15s ease-in-out, background-color .15s ease-in-out, border-color .15s ease-in-out, -webkit-box-shadow .15s ease-in-out;
        -o-transition: color .15s ease-in-out, background-color .15s ease-in-out, border-color .15s ease-in-out, box-shadow .15s ease-in-out;
        transition: color .15s ease-in-out, background-color .15s ease-in-out, border-color .15s ease-in-out, box-shadow .15s ease-in-out;
        transition: color .15s ease-in-out, background-color .15s ease-in-out, border-color .15s ease-in-out, box-shadow .15s ease-in-out, -webkit-box-shadow .15s ease-in-out;
        margin: 0;
        border: 0;
        -webkit-border-radius: .125rem;
        border-radius: .125rem;
        cursor: pointer;
        text-transform: uppercase;
        white-space: normal;
        word-wrap: break-word;
        color: #fff;
    }

    .btn-card:hover {
        background: orange;
    }

    a.btn-card {
        text-decoration: none;
        color: #fff;
    }
</style>

@section('content')
    <!-- main-content -->
    <div class="main-content app-content">
        <!-- container -->
        <div class="main-container container-fluid">
            <!-- breadcrumb -->
            <div class="breadcrumb-header justify-content-between row me-0 ms-0">
                <div class="col-xl-3">
                    <h4 class="content-title mb-2"> User Dashboard</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active" aria-current="page"><i class="side-menu__icon fe fe-box"> </i>
                                - Dashboard
                            </li>
                        </ol>
                    </nav>
                </div>

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


                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4 mb-4">
                                            <div class="card-content">

                                                <div class="card-desc">
                                                    <h3>Application 1 - <a
                                                            href="{{ route('userCoupleFinanceList') }}">Applied({{ $data['coupleFinanceCount'] }})</a>
                                                    </h3>
                                                    <p class="ctm-height">മിശ്ര വിവാഹം മൂലം ക്ലേശങ്ങൾ അനുഭവിക്കുന്ന
                                                        പട്ടികവർഗ്ഗ ദമ്പതികൾക്ക് പട്ടികവർഗ്ഗ വികസന വകുപ്പിൽ നിന്നും
                                                        സാമ്പത്തിക സഹായം അനുവദിക്കുന്നതിനുള്ള അപേക്ഷഫോറം </p>

                                                    <a href="#" class="btn-card" data-toggle="modal"
                                                        data-target="#coupleGrant">Apply Now</a>
                                                    {{-- <a href="{{url('couples-financial-help')}}" class="btn-card">Apply Now</a>    --}}
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4 mb-4">
                                            <div class="card-content">

                                                <div class="card-desc">
                                                    <h3>Application 2 - <a
                                                            href="{{ route('userMotherChildList') }}">Applied({{ $data['motherChildCount'] }})</a>
                                                    </h3>
                                                    <p class="ctm-height">ജനനി-ജനനി -ജന്മരക്ഷ പ്രസവാനുകുല്യം - മാതൃശിശു
                                                        സംരക്ഷണ പദ്ധതി അപേക്ഷഫോറം </p>
                                                     {{-- <a href="{{ route('applicationForm2') }}" class="btn-card">Apply Now</a>     --}}
                                                    <a href="#" class="btn-card" data-toggle="modal"
                                                        data-target="#applicationModal">Apply Now</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-4">
                                            <div class="card-content">

                                                <div class="card-desc">
                                                    <h3>Application 3 -<a
                                                            href="{{ route('userExamList') }}">Applied({{ $data['examCount'] }})</a>
                                                    </h3>
                                                    <p class="ctm-height">അയ്യങ്കാളി ടാലന്റ് സേർച്ച് &ഡെവലപ്പ്മെന്റ് സ്‌കീം
                                                        പ്രവേശന പരീക്ഷക്കുള്ള അപേക്ഷ</p>
                                                    {{-- <a href="{{ route('exam-application') }}" class="btn-card">Apply Now</a> --}}
                                                    <a href="#" class="btn-card" data-toggle="modal"
                                                    data-target="#examApplication">Apply Now</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div><br>


                                    <div class="row">
                                        <div class="col-md-4 mb-4">
                                            <div class="card-content">

                                                <div class="card-desc">
                                                    <h3>Application 4 - <a
                                                            href="{{ route('userMarriageGrantList') }}">Applied({{ $data['marriageGrantCount'] }})</a>
                                                    </h3>
                                                    <p class="ctm-height">പട്ടികവർഗ്ഗത്തിൽപ്പെട്ട പാവപ്പെട്ട
                                                        പെണ്കുട്ടികൾക്ക് വിവാഹധനസഹായം നൽകുന്നതിനുള്ള അപേക്ഷഫോറം </p>
                                                    {{--  <a href="{{url('marriageGrantForm')}}" class="btn-card">Apply Now</a>     --}}
                                                    <a href="#" class="btn-card" data-toggle="modal"
                                                        data-target="#marriageGrant">Apply Now</a>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4 mb-4">
                                            <div class="card-content">

                                                <div class="card-desc">
                                                    <h3>Application 5 -<a href="{{ route('userchildFinanceList') }}">Applied({{ $data['childFinanceCount'] }})</h3>
                                                    <p class="ctm-height">അനാധകർക്ക്പ്രതിമാസം 1500 രൂപ ധനസഹായം നൽകുന്ന പദ്ധതി കൈത്താങ്ങ് </p>
                                                         
                                                        {{-- <a href="{{url('childFinancialAssistanceForm')}}" class="btn-card">Apply Now</a>    --}}

                                                          <a href="#" class="btn-card" data-toggle="modal" data-target="#childFinancialAssistance">Apply Now</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-4">
                                            <div class="card-content">

                                                <div class="card-desc">
                                                    <h3>Application 6 - <a
                                                            href="{{ route('userHouseGrantList') }}">Applied({{ $data['houseGrantCount'] }})</a>
                                                    </h3>
                                                    <p class="ctm-height">പട്ടികവർഗ്ഗ വികസന വകുപ്പിൽനിന്ന് വീടുകളുടെ
                                                        നവീകരണത്തിനും അധികസൗകര്യങ്ങൾ ഏർപെടുത്തുന്നതിനും
                                                        പൂർത്തീകരിക്കുന്നതിനുമുള്ള
                                                        ധനസഹായത്തിനുള്ള അപേക്ഷ
                                                    </p>
                                                    <a href="#" class="btn-card" data-toggle="modal"
                                                        data-target="#houseGrantModal">Apply Now</a>
                                                    {{-- <a href="/houseGrant/create" class="btn-card">Apply Now</a>    --}}
                                                </div>
                                            </div>
                                        </div>
                                    </div><br>
                                    <div class="row">
                                        <div class="col-md-4 mb-4">
                                            <div class="card-content">

                                                <div class="card-desc">
                                                    <h3>Application 7 - <a
                                                            href="{{ route('userSingleEarnerList') }}">Applied({{ $data['singleEarnerCount'] }})</a>
                                                    </h3>
                                                    <p class="ctm-height">ഏകവരുമാനദായകന്റെ മരണം തെളിയിക്കുന അപേക്ഷഫോറം </p>
                                                    {{-- <a href="{{ url('single-income-earner') }}" class="btn-card">Apply
                                                        Now</a> --}}

                                                    <a href="#" class="btn-card" data-toggle="modal"
                                                        data-target="#userSingleEarnerListModel">Apply Now</a>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4 mb-4">
                                            <div class="card-content">

                                                <div class="card-desc">
                                                    <h3>Application 8 - <a href="{{ route('userAnemiaFinanceList') }}">Applied({{ $data['anemiaFinanceCount'] }})</a></h3>
                                                    <p>സിക്കിൾസെൽ അനീമിയരോഗികൾക്ക് പ്രതിമാസ ധനസഹായം നൽകുന്ന പദ്ധതി </p>
                                                    <a href="#" class="btn-card" data-toggle="modal" data-target="#anemiaFinanceModal">Apply Now</a>
                                                         {{--  <a href="{{url('anemia-financial-assistance')}}" class="btn-card">Apply Now</a>anemiaFinanceModal     --}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-4">
                                            <div class="card-content">

                                                <div class="card-desc">
                                                    <h3>Application 9 - <a
                                                            href="MedicalEngineeringStudentFund">Applied({{ $data['studentFundCount'] }})</a>
                                                    </h3>
                                                    <p class="ctm-height">മെഡിക്കൽ / എഞ്ചിനിയറിംഗ് കോഴ്‌സുകളിലെ പട്ടികജാതി
                                                        വിദ്യാർത്ഥികൾക്ക് പ്രാരംഭചെലവുകൾക്ക് ധനസഹായം അനുവദിക്കുന്നതിനുള്ള
                                                        അപേക്ഷ </p>
                                                    {{-- <a href="MedicalEngineeringStudentFund/create" class="btn-card">Apply Now</a>    --}}
                                                    <a href="#" class="btn-card" data-toggle="modal"
                                                        data-target="#studentFundModal">Apply Now</a>

                                                </div>
                                            </div>
                                        </div>
                                    </div><br>
                                    <div class="row">
                                        <div class="col-md-4 mb-4">
                                            <div class="card-content">

                                                <div class="card-desc">
                                                    <h3>Application 10 - <a
                                                            href="{{ route('userStudentAwardList') }}">Applied({{ $data['studentAwardCount'] }})</a>
                                                    </h3>
                                                    <p class="ctm-height">മിടുക്കരായ വിദ്യാർത്ഥികൾക്കുള്ള പ്രത്യേക
                                                        പ്രോത്സാഹനo </p>
                                                    {{--  <a href="{{url('student-award')}}" class="btn-card">Apply Now</a>   --}}
                                                    <a href="#" class="btn-card" data-toggle="modal"
                                                        data-target="#studentAward">Apply Now</a>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4 mb-4">
                                            <div class="card-content">

                                                <div class="card-desc">
                                                    <h3>Application 11 - <a
                                                            href="{{ route('userTuitionFeeList') }}">Applied({{ $data['tuitionFeeCount'] }})</a>
                                                    </h3>
                                                    <p class="ctm-height">പട്ടിക വർഗ്ഗ വികസന വകുപ്പിൽ നിന്നും 8 ,9 ,10 ,11
                                                        ,12 ക്ലാസ്സുകളിൽ പഠിക്കുന്നു കുട്ടികൾക്ക് ട്യൂഷൻ ഫീസിനുള്ള അപേക്ഷ
                                                    </p> 
                                                     <a href="#" class="btn-card" data-toggle="modal"
                                                        data-target="#tutionStudentModal">Apply Now</a>
                                                    {{-- <a href="TuitionFee/create" class="btn-card">Apply Now</a> --}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-4">
                                            <div class="card-content">

                                                <div class="card-desc">
                                                    <h3>Application 12 - <a
                                                            href="{{ route('userItiFundList') }}">Applied({{ @$data['itiFundCount'] }})</a>
                                                    </h3>
                                                    <p class="ctm-height">ഐ.റ്റി.ഐ /ട്രൈനിംഗ് സെന്ററുകളിലെ പഠിതാക്കൾക്കുള്ള
                                                        സ്കോളർഷിപ്പ്</p>
                                                    <a href="#" class="btn-card" data-toggle="modal"
                                                        data-target="#itiStudentModal">Apply Now</a>
                                                    {{-- <a href="{{ url('iti-scholarship') }}" class="btn-card">Apply Now</a> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </div><br>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>


        <div class="modal fade" id="itiStudentModal" tabindex="-1" role="dialog"
        aria-labelledby="applicationModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <!-- Your form content goes here -->
                <form>
                    <div class="modal-header">
                        <h5 class="modal-title" id="applicationModalLabel">
                            ഐ.റ്റി.ഐ /ട്രൈനിംഗ് സെന്ററുകളിലെ പഠിതാക്കൾക്കുള്ള
                                                        സ്കോളർഷിപ്പ്
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h4>
                            <p> ഹാജരാക്കേണ്ട രേഖകൾ:</p>
                            <p style="font-size: 11px;">(Max. filesize: 2 MB • Format: JPG, PNG, PDF) </p>

                            <ul>
                                <li>
                                    അപേക്ഷകന്റെ ഫോട്ടോ (ഫോട്ടോ)
                                    
                                </li>  
                                <li>
                                    വരുമാന സർട്ടിഫിക്കറ്റ് (ഫോട്ടോ / ഡോക്യുമെന്റ്)
                                    
                                </li>
                                <li>
                                    ജാതി/ മതം സർട്ടിഫിക്കറ്റ് (ഫോട്ടോ / ഡോക്യുമെന്റ്)
                                    
                                </li>
                                <li>
                                    രക്ഷാകർത്താവിന്റെ ഒപ്പ്  (ഫോട്ടോ)
                                    
                                </li>
                                <li>
                                    അപേക്ഷകന്റെ ഒപ്പ് (ഫോട്ടോ)
                                    
                                </li>  
                               
                            </ul>
                        </h4>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <a href="{{ url('iti-scholarship') }}" class="btn btn-primary"> Continue</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

         <div class="modal fade" id="tutionStudentModal" tabindex="-1" role="dialog"
            aria-labelledby="applicationModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <!-- Your form content goes here -->
                    <form>
                        <div class="modal-header">
                            <h5 class="modal-title" id="applicationModalLabel">
                                പട്ടിക വർഗ്ഗ വികസന വകുപ്പിൽ നിന്നും 8 ,9 ,10 ,11
                                                        ,12 ക്ലാസ്സുകളിൽ പഠിക്കുന്നു കുട്ടികൾക്ക് ട്യൂഷൻ ഫീസിനുള്ള അപേക്ഷ
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <h4>
                                <p> ഹാജരാക്കേണ്ട രേഖകൾ:</p>

                                <ul>
                                    <li>
                                        അപേക്ഷകന്റെ ഒപ്പ് (ഫോട്ടോ)
                                    </li>
                                </ul>
                            </h4>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <a href="TuitionFee/create" class="btn btn-primary"> Continue</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade" id="houseGrantModal" tabindex="-1" role="dialog"
            aria-labelledby="applicationModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <!-- Your form content goes here -->
                    <form>
                        <div class="modal-header">
                            <h5 class="modal-title" id="applicationModalLabel">
                                പട്ടികവർഗ്ഗ വികസന വകുപ്പിൽനിന്ന് വീടുകളുടെ നവീകരണത്തിനും അധികസൗകര്യങ്ങൾ ഏർപെടുത്തുന്നതിനും
                                പൂർത്തീകരിക്കുന്നതിനുമുള്ള
                                ധനസഹായത്തിനുള്ള അപേക്ഷ
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <h4>
                                <p> ഹാജരാക്കേണ്ട രേഖകൾ:</p>
                                <p style="font-size: 11px;">(Max. filesize: 2 MB • Format: JPG, PNG, PDF) </p>

                                <ul>
                                    <li>
                                        അപേക്ഷകന്റെ ഫോട്ടോ (ഫോട്ടോ)
                                    </li>
                                    <li>
                                        മുൻഗണന ലഭിക്കുന്നതിനുള്ള അർഹത തെളിയിക്കുന്നതിനുമുള്ള മറ്റു സംഗതികൾ (ഫോട്ടോ / ഡോക്യുമെന്റ്)
                                    </li>
                                    <li>
                                        അപേക്ഷകന്റെ ഒപ്പ് (ഫോട്ടോ)
                                    </li>
                                   
                                    
                                </ul>
                            </h4>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <a href="/houseGrant/create" class="btn btn-primary"> Continue</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <div class="modal fade" id="studentFundModal" tabindex="-1" role="dialog"
            aria-labelledby="applicationModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <!-- Your form content goes here -->
                    <form>
                        <div class="modal-header">
                            <h5 class="modal-title" id="applicationModalLabel">
                                മെഡിക്കൽ / എഞ്ചിനിയറിംഗ് കോഴ്‌സുകളിലെ പട്ടികജാതി വിദ്യാർത്ഥികൾക്ക് പ്രാരംഭചെലവുകൾക്ക്
                                ധനസഹായം അനുവദിക്കുന്നതിനുള്ള അപേക്ഷ
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <h4>
                                <p> ഹാജരാക്കേണ്ട രേഖകൾ:</p>
                                <p style="font-size: 11px;">(Max. filesize: 2 MB • Format: JPG, PNG, PDF) </p>

                                <ul>
                                    <li>
                                        അപേക്ഷകന്റെ ഫോട്ടോ (ഫോട്ടോ)
                                        
                                    </li>
                                    <li>
                                        വരുമാന സർട്ടിഫിക്കറ്റ് (ഫോട്ടോ / ഡോക്യുമെന്റ്)
                                        
                                    </li>
                                    <li>
                                        ജാതി/ മതം സർട്ടിഫിക്കറ്റ് (ഫോട്ടോ / ഡോക്യുമെന്റ്)
                                        
                                    </li>
                                    <li>
                                        രക്ഷാകർത്താവിന്റെ ഒപ്പ്  (ഫോട്ടോ)
                                        
                                    </li>
                                    <li>
                                        അപേക്ഷകന്റെ ഒപ്പ് (ഫോട്ടോ)
                                        
                                    </li>
                                </ul>
                            </h4>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <a href="MedicalEngineeringStudentFund/create" class="btn btn-primary"> Continue</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade" id="userSingleEarnerListModel" tabindex="-1" role="dialog"
            aria-labelledby="applicationModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <!-- Your form content goes here -->
                    <form>
                        <div class="modal-header">
                            <h5 class="modal-title" id="applicationModalLabel">
                                ഏകവരുമാനദായകന്റെ മരണം തെളിയിക്കുന അപേക്ഷഫോറം 
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <h4>
                                <p> ഹാജരാക്കേണ്ട രേഖകൾ:</p>

                                <ul>
                                    <li>
                                        തഹസിൽദാരിൽ നിന്നുള്ള സാക്ഷ്യപത്രം (ഫോട്ടോ / ഡോക്യുമെന്റ്)
                                    </li>
                                </ul>
                                <ul>
                                    <li>
                                        ആധാർ  (ഫോട്ടോ / ഡോക്യുമെന്റ്)
                                    </li>
                                </ul>
                                <ul>
                                    <li>
                                        ബാങ്ക് അക്കൗണ്ട് പകർപ്പ് (ഫോട്ടോ / ഡോക്യുമെന്റ്)
                                    </li>
                                </ul>
                                <ul>
                                    <li>
                                        മരണ സർട്ടിഫിക്കറ്റിന്റെ പകർപ്പ്  (ഫോട്ടോ / ഡോക്യുമെന്റ്)
                                    </li>
                                </ul>
                                <ul>
                                    <li>
                                        ചെയ്തിരുന്ന തൊഴിൽ വ്യക്തം ആക്കുന്ന സാക്ഷ്യപത്രം  (ഫോട്ടോ / ഡോക്യുമെന്റ്)
                                    </li>
                                </ul>
                                <ul>
                                    <li>
                                        റേഷൻ കാർഡിന്റെ പകർപ്പ് (ഫോട്ടോ / ഡോക്യുമെന്റ്)
                                    </li>
                                </ul>
                                <ul>
                                    <li>
                                        കുടുംബ വാർഷിക വരുമാനം പകർപ്പ് (ഫോട്ടോ / ഡോക്യുമെന്റ്)
                                    </li>
                                </ul>
                                <ul>
                                    <li>
                                        അപേക്ഷകന്റെ ഒപ്പു  (ഫോട്ടോ)
                                    </li>
                                </ul>
                                
                            </h4>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                             <a href="{{ url('single-income-earner') }}" class="btn btn-primary"> Continue</a>
                        </div>
                   </form>
                </div>
            </div>
        </div>



        <!-- Bootstrap Modal -->
        <div class="modal fade" id="applicationModal" tabindex="-1" role="dialog"
            aria-labelledby="applicationModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <!-- Your form content goes here -->
                    <form>
                        <div class="modal-header">
                            <h5 class="modal-title" id="applicationModalLabel">
                                ജനനി-ജനനി -ജന്മരക്ഷ പ്രസവാനുകുല്യം - മാതൃശിശു സംരക്ഷണ പദ്ധതി അപേക്ഷഫോറം
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <h4>
                                <p> ഹാജരാക്കേണ്ട രേഖകൾ:</p>

                                <ul>
                                    <li>
                                        അപേക്ഷകന്റെ ഒപ്പ് (ഫോട്ടോ)
                                    </li>
                                </ul>
                            </h4>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <a href="{{ route('applicationForm2') }}" <button type="submit"
                                class="btn btn-primary">Continue</button></a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade" id="marriageGrant" tabindex="-1" role="dialog"
            aria-labelledby="applicationModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <!-- Your form content goes here -->
                    <form>
                        <div class="modal-header">
                            <h5 class="modal-title" id="applicationModalLabel">
                                പട്ടികവർഗ്ഗത്തിൽപ്പെട്ട പാവപ്പെട്ട പെണ്കുട്ടികൾക്ക് വിവാഹധനസഹായം നൽകുന്നതിനുള്ള അപേക്ഷഫോറം
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <h4>
                                <p> ഹാജരാക്കേണ്ട രേഖകൾ:</p>

                                <ol>
                                    <li>
                                        തഹസിൽദാരിൽനിന്നും ജാതി തെളിയിക്കുന്ന സാക്ഷ്യപത്രം (അസൽ )ഹാജരാക്കണം
                                    </li>
                                    <li>
                                        കുടുംബത്തിൽ എല്ലാ മാർഗത്തിൽ നിന്നുമുള്ള ആകെ വാർഷിക വരുമാനം (വില്ലേജ് ആഫീസറിൽ നിന്നും
                                        ലഭിച്ച സർട്ടിഫിക്കറ്റ് (അസൽ) ഹാജരാക്കണം )
                                    </li>
                                    <li>
                                        അപേക്ഷകന്റെ ഒപ്പ് (ഫോട്ടോ)
                                    </li>
                                </ol>
                            </h4>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <a href="{{ url('marriageGrantForm') }}" <button type="submit"
                                class="btn btn-primary">Continue</button></a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade" id="studentAward" tabindex="-1" role="dialog" aria-labelledby="applicationModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <!-- Your form content goes here -->
                    <form>
                        <div class="modal-header">
                            <h5 class="modal-title" id="applicationModalLabel">
                                മിടുക്കരായ വിദ്യാർത്ഥികൾക്കുള്ള പ്രത്യേക പ്രോത്സാഹനo
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <h4>
                                <p> ഹാജരാക്കേണ്ട രേഖകൾ:</p>

                                <ol>
                                    <li>
                                        പരീക്ഷാ വിവരങ്ങൾ
                                    </li>
                                    <li>
                                        ആധാർ വിവരങ്ങൾ
                                    </li>
                                    <li>
                                        അപേക്ഷകന്റെ ഒപ്പ് (ഫോട്ടോ)
                                    </li>
                                </ol>
                            </h4>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <a href="{{ url('student-award') }}" <button type="submit"
                                class="btn btn-primary">Continue</button></a>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <div class="modal fade" id="coupleGrant" tabindex="-1" role="dialog" aria-labelledby="coupleGrantLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <!-- Your form content goes here -->
                    <form>
                        <div class="modal-header">
                            <h5 class="modal-title" id="applicationModalLabel">
                                മിശ്ര വിവാഹം മൂലം ക്ലേശങ്ങൾ അനുഭവിക്കുന്ന പട്ടികവർഗ്ഗ ദമ്പതികൾക്ക് പട്ടികവർഗ്ഗ വികസന
                                വകുപ്പിൽ നിന്നും സാമ്പത്തിക സഹായം അനുവദിക്കുന്നതിനുള്ള അപേക്ഷഫോറം
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <h4>
                                <p> ഹാജരാക്കേണ്ട രേഖകൾ:</p>

                                <ul>
                                    <li>
                                        വിവാഹത്തിന്റെ സാധ്യത തെളിയിക്കുന്നതിന് രേഖ
                                    </li>
                                    <li>
                                        ഭർത്താവിന്റെ ഒപ്പ്(ഫോട്ടോ)
                                    </li>
                                    <li>
                                        ഭാര്യയുടെ ഒപ്പ്(ഫോട്ടോ)
                                    </li>
                                </ul>
                            </h4>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                            <a href="{{ url('couples-financial-help') }}" class="btn btn-primary"> Continue</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>







    <div class="modal fade" id="childFinancialAssistance" tabindex="-1" role="dialog" aria-labelledby="childFinancialAssistanceLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <!-- Your form content goes here -->
                <form>
                    <div class="modal-header">
                        <h5 class="modal-title" id="applicationModalLabel">
                          അനാധകർക്ക്പ്രതിമാസം 1500 രൂപ ധനസഹായം നൽകുന്ന പദ്ധതി കൈത്താങ്ങ് 
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h4>
                        <p>  ഹാജരാക്കേണ്ട രേഖകൾ:</p>
                      
                        <ul>
                            <li>
                               കുട്ടിയുടെ ജനന സർട്ടിഫിക്കറ്റ്
 
                            </li>
                            <li>
                              അപേക്ഷകന്റെ ഒപ്പ്(വിരലടയാളം)
 
                            </li>
                            <li>
                              കുട്ടിയുടെ ഫോട്ടോ
 
                            </li>
                        </ul>
                    </h4>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                       
                       <a  href="{{url('childFinancialAssistanceForm')}}"   class="btn btn-primary"> Continue</a>
                    </div>
                </form>
            </div>
        </div>
    </div>


    




    <!-- Bootstrap Modal -->
    <div class="modal fade" id="applicationModal" tabindex="-1" role="dialog" aria-labelledby="applicationModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <!-- Your form content goes here -->
                <form>
                    <div class="modal-header">
                        <h5 class="modal-title" id="applicationModalLabel">
                            ജനനി-ജനനി -ജന്മരക്ഷ പ്രസവാനുകുല്യം - മാതൃശിശു സംരക്ഷണ പദ്ധതി അപേക്ഷഫോറം 
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h4>
                        <p>  ഹാജരാക്കേണ്ട രേഖകൾ:</p>
                      
                        <ul>
                            <li>
                                അപേക്ഷകന്റെ ഒപ്പ് (ഫോട്ടോ)
                            </li>
                        </ul>
                    </h4>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                       <a href="{{ route('applicationForm2') }}" <button type="submit" class="btn btn-primary">Continue</button></a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="marriageGrant" tabindex="-1" role="dialog" aria-labelledby="applicationModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <!-- Your form content goes here -->
                <form>
                    <div class="modal-header">
                        <h5 class="modal-title" id="applicationModalLabel">
                            പട്ടികവർഗ്ഗത്തിൽപ്പെട്ട പാവപ്പെട്ട പെണ്കുട്ടികൾക്ക് വിവാഹധനസഹായം നൽകുന്നതിനുള്ള അപേക്ഷഫോറം
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h4>
                        <p>  ഹാജരാക്കേണ്ട രേഖകൾ:</p>
                      
                        <ol>
                            <li>
                                തഹസിൽദാരിൽനിന്നും ജാതി തെളിയിക്കുന്ന സാക്ഷ്യപത്രം (അസൽ )ഹാജരാക്കണം
                            </li>
                            <li>
                                കുടുംബത്തിൽ എല്ലാ മാർഗത്തിൽ നിന്നുമുള്ള ആകെ വാർഷിക വരുമാനം (വില്ലേജ് ആഫീസറിൽ നിന്നും ലഭിച്ച സർട്ടിഫിക്കറ്റ് (അസൽ) ഹാജരാക്കണം ) 
                            </li>
                            <li>
                                അപേക്ഷകന്റെ ഒപ്പ് (ഫോട്ടോ)
                            </li>
                        </ol>
                    </h4>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                       <a href="{{url('marriageGrantForm')}}" <button type="submit" class="btn btn-primary">Continue</button></a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="studentAward" tabindex="-1" role="dialog" aria-labelledby="applicationModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <!-- Your form content goes here -->
                <form>
                    <div class="modal-header">
                        <h5 class="modal-title" id="applicationModalLabel">
                            മിടുക്കരായ വിദ്യാർത്ഥികൾക്കുള്ള പ്രത്യേക പ്രോത്സാഹനo
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h4>
                        <p>  ഹാജരാക്കേണ്ട രേഖകൾ:</p>
                      
                        <ol>
                            <li>
                                പരീക്ഷാ വിവരങ്ങൾ 
                            </li>
                            <li>
                                ആധാർ വിവരങ്ങൾ
                            </li>
                            <li>
                                അപേക്ഷകന്റെ ഒപ്പ് (ഫോട്ടോ)
                            </li>
                        </ol>
                    </h4>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                       <a href="{{url('student-award')}}" <button type="submit" class="btn btn-primary">Continue</button></a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="anemiaFinanceModal" tabindex="-1" role="dialog" aria-labelledby="applicationModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <!-- Your form content goes here -->
                <form>
                    <div class="modal-header">
                        <h5 class="modal-title" id="applicationModalLabel">
                            സിക്കിൾസെൽ അനീമിയരോഗികൾക്ക് പ്രതിമാസ ധനസഹായം നൽകുന്ന പദ്ധതി 
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h4>
                        <p>  ഹാജരാക്കേണ്ട രേഖകൾ: </p>
                        <p style="font-size: 11px;">(Max. filesize: 2 MB • Format: JPG, PNG, PDF) </p>

                        <ul>
                            <li>
                                ജാതി സർട്ടിഫിക്കറ്റ്
                            </li>
                            <li>
                                ആധാർ പകർപ്പ്
                            </li>
                            <li>
                                ബാങ്ക് അക്കൗണ്ട് പാസ്സ് ബുക്കിന്റെ പകർപ്പ്
                            </li>
                            <li>
                                മെഡിക്കൽ സർട്ടിഫിക്കറ്റ് 
                            </li>
                            <li>
                                അപേക്ഷകന്റെ ഒപ്പ് (ഫോട്ടോ)
                            </li>
                        </ul>
                    </h4>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                       <a href="{{url('anemia-financial-assistance')}}" class="btn btn-primary"> Continue</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="examApplication" tabindex="-1" role="dialog" aria-labelledby="applicationModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <!-- Your form content goes here -->
                <form>
                    <div class="modal-header">
                        <h5 class="modal-title" id="applicationModalLabel">
                            അയ്യങ്കാളി ടാലന്റ് സേർച്ച് &ഡെവലപ്പ്മെന്റ് സ്‌കീം പ്രവേശന പരീക്ഷക്കുള്ള അപേക്ഷ
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h4>
                        <p>  ഹാജരാക്കേണ്ട രേഖകൾ: </p>
                        <p style="font-size: 11px;">(Max. filesize: 2 MB • Format: JPG, PNG, PDF) </p>

                        <ul>
                     
                            <li>
                                രക്ഷിതാവിന്റെ ഒപ്പും (ഫോട്ടോ)
                            </li>
                        </ul>
                    </h4>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                       <a href="{{ route('exam-application') }}" class="btn btn-primary"> Continue</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>

    </section>


    </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
    <!-- main-content-body -->
@endsection
