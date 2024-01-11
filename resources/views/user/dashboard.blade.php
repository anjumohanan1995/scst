@extends('layouts.app')
<style>
.details-card {
    background: #ecf0f1;
}

.card-content {
    background: #ffffff;
    border: 4px;
    box-shadow: 0 2px 5px 0 rgba(0,0,0,.16), 0 2px 10px 0 rgba(0,0,0,.12);
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
    transform: translate(-50%,-50%);
}
.card-img span h4{
        font-size: 12px;
        margin:0;
        padding:10px 5px;
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
.btn-card{
    background-color: #1ABC9C;
    color: #fff;
    box-shadow: 0 2px 5px 0 rgba(0,0,0,.16), 0 2px 10px 0 rgba(0,0,0,.12);
    padding: .84rem 2.14rem;
    font-size: .81rem;
    -webkit-transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,-webkit-box-shadow .15s ease-in-out;
    transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,-webkit-box-shadow .15s ease-in-out;
    -o-transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;
    transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;
    transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out,-webkit-box-shadow .15s ease-in-out;
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
        <div class="breadcrumb-header justify-content-between row me-0 ms-0" >
            <div class="col-xl-3">
                <h4 class="content-title mb-2"> User Dashboard</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page"><i class="side-menu__icon fe fe-box"> </i> - Dashboard
                        </li>
                    </ol>
                </nav>
            </div>

            @if ($message = Session::get('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><i class="fa fa-window-close"></i></button>                                {{ $message }}
            </div>

        @endif
        </div>
        <!-- /breadcrumb -->

    </div>
    <div class="main-content-body">

    <section class="details-card">
    <div class="container">
        <br>
        <div class="row">
            <div class="col-md-4">
                <div class="card-content">
                   
                    <div class="card-desc">
                        <h3>Application 1 - <a href="{{ route('userCoupleFinanceList') }}">Applied({{ $data['coupleFinanceCount'] }})</a></h3>
                        <p>മിശ്ര വിവാഹം മൂലം ക്ലേശങ്ങൾ അനുഭവിക്കുന്ന പട്ടികവർഗ്ഗ ദമ്പതികൾക്ക് പട്ടികവർഗ്ഗ വികസന വകുപ്പിൽ നിന്നും സാമ്പത്തിക സഹായം അനുവദിക്കുന്നതിനുള്ള അപേക്ഷഫോറം </p>
                             <a href="{{url('couples-financial-help')}}" class="btn-card">Apply Now</a>   
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card-content">
                  
                    <div class="card-desc">
                        <h3>Application 2 - <a href="{{ route('userMotherChildList') }}">Applied({{ $data['motherChildCount'] }})</a></h3>
                        <p>ജനനി-ജനനി -ജന്മരക്ഷ  പ്രസവാനുകുല്യം - മാതൃശിശു  സംരക്ഷണ പദ്ധതി  അപേക്ഷഫോറം </p>
                            <a href="{{ route('applicationForm2') }}" class="btn-card">Apply Now</a>   
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card-content">
                    
                    <div class="card-desc">
                        <h3>Application 3 -<a href="{{ route('userExamList') }}">Applied({{ $data['examCount'] }})</a></h3>
                        <p>അയ്യങ്കാളി ടാലന്റ് സേർച്ച് &ഡെവലപ്പ്മെന്റ്  സ്‌കീം  പ്രവേശന പരീക്ഷക്കുള്ള അപേക്ഷ</p>
                            <a href="{{ route('exam-application') }}" class="btn-card">Apply Now</a>   
                    </div>
                </div>
            </div>
        </div><br>
        <div class="row">
            <div class="col-md-4">
                <div class="card-content">
                   
                    <div class="card-desc">
                        <h3>Application 4 - <a href="{{ route('userMarriageGrantList') }}">Applied({{ $data['marriageGrantCount'] }})</a></h3>
                        <p>പട്ടികവർഗ്ഗത്തിൽപ്പെട്ട  പാവപ്പെട്ട പെണ്കുട്ടികൾക്ക്  വിവാഹധനസഹായം  നൽകുന്നതിനുള്ള അപേക്ഷഫോറം </p>
                             <a href="{{url('marriageGrantForm')}}" class="btn-card">Apply Now</a>   
                    </div>
                </div>
            </div>

             <div class="col-md-4">
                <div class="card-content">
                   
                    <div class="card-desc">
                        <h3>Application 5 -<a href="{{ route('userchildFinanceList') }}">Applied({{ $data['childFinanceCount'] }})</h3>
                        <p>അനാധകർക്ക്പ്രതിമാസം 1500 രൂപ ധനസഹായം നൽകുന്ന പദ്ധതി കൈത്താങ്ങ് </p>
                             <a href="{{url('childFinancialAssistanceForm')}}" class="btn-card">Apply Now</a>   
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card-content">
                   
                    <div class="card-desc">
                        <h3>Application 6 - <a href="{{ route('userHouseGrantList') }}">Applied({{ $data['houseGrantCount'] }})</a></h3>
                        <p>പട്ടികവർഗ്ഗ വികസന വകുപ്പിൽനിന്ന് വീടുകളുടെ നവീകരണത്തിനും അധികസൗകര്യങ്ങൾ ഏർപെടുത്തുന്നതിനും   പൂർത്തീകരിക്കുന്നതിനുമുള്ള 
                            ധനസഹായത്തിനുള്ള അപേക്ഷ 
                         </p>
                             <a href="/houseGrant/create" class="btn-card">Apply Now</a>   
                    </div>
                </div>
            </div>
         
        </div>
        <div class="row">

            <div class="col-md-4">
                <div class="card-content">
                   
                    <div class="card-desc">
                        <h3>Application 7 - <a href="{{ route('userSingleEarnerList') }}">Applied({{ $data['singleEarnerCount'] }})</a></h3>
                        <p>ഏകവരുമാനദായകന്റെ മരണം തെളിയിക്കുന അപേക്ഷഫോറം </p>
                             <a href="{{url('single-income-earner')}}" class="btn-card">Apply Now</a>   
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card-content">
                   
                    <div class="card-desc">
                        <h3>Application 8 - <a href="{{ route('userAnemiaFinanceList') }}">Applied({{ $data['anemiaFinanceCount'] }})</a></h3>
                        <p>സിക്കിൾസെൽ അനീമിയരോഗികൾക്ക് പ്രതിമാസ ധനസഹായം നൽകുന്ന പദ്ധതി </p>
                             <a href="{{url('anemia-financial-assistance')}}" class="btn-card">Apply Now</a>   
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card-content">
                   
                    <div class="card-desc">
                        <h3>Application 9 - <a href="MedicalEngineeringStudentFund">Applied({{ $data['studentFundCount'] }})</a></h3>
                        <p>മെഡിക്കൽ / എഞ്ചിനിയറിംഗ് കോഴ്‌സുകളിലെ പട്ടികജാതി വിദ്യാർത്ഥികൾക്ക് പ്രാരംഭചെലവുകൾക്ക് ധനസഹായം അനുവദിക്കുന്നതിനുള്ള അപേക്ഷ </p>
                             <a href="MedicalEngineeringStudentFund/create" class="btn-card">Apply Now</a>   
                    </div>
                </div>
            </div>
                      
                    </div>
                    <div class="row">

                        <div class="col-md-4">
                            <div class="card-content">
                               
                                <div class="card-desc">
                                    <h3>Application 10 - <a href="{{ route('userStudentAwardList') }}">Applied({{ $data['studentAwardCount'] }})</a></h3>
                                    <p>മിടുക്കരായ വിദ്യാർത്ഥികൾക്കുള്ള പ്രത്യേക പ്രോത്സാഹനo </p>
                                         <a href="{{url('student-award')}}" class="btn-card">Apply Now</a>     
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card-content">
                               
                                <div class="card-desc">
                                    <h3>Application 11 - <a href="{{ route('userTuitionFeeList') }}">Applied({{ $data['tuitionFeeCount'] }})</a></h3>
                                    <p>പട്ടിക വർഗ്ഗ വികസന വകുപ്പിൽ നിന്നും 8 ,9 ,10 ,11 ,12  ക്ലാസ്സുകളിൽ പഠിക്കുന്നു കുട്ടികൾക്ക് ട്യൂഷൻ ഫീസിനുള്ള അപേക്ഷ </p>
                                         <a href="TuitionFee/create" class="btn-card">Apply Now</a>   
                                </div>
                            </div>
                        </div>
                          <div class="col-md-4">
                            <div class="card-content">
                               
                                <div class="card-desc">
                                    <h3>Application 12 - <a href="{{ route('userTuitionFeeList') }}">Applied({{ @$data['itiFundCount'] }})</a></h3>
                                    <p>ഐ .റ്റി.ഐ /ട്രൈനിംഗ് സെന്ററുകളിലെ പഠിതാക്കൾക്കുള്ള സ്കോളർഷിപ്പ്</p>
                                         <a href="{{url('iti-scholarship')}}" class="btn-card">Apply Now</a>   
                                </div>
                            </div>
                        </div>
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
