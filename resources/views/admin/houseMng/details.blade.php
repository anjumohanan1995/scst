@extends('layouts.app')
@section('content')
<!-- main-content -->
<div class="main-content app-content">
   <!-- container -->
   <div class="main-container container-fluid">
      <!-- breadcrumb -->
      <div class="breadcrumb-header justify-content-between row me-0 ms-0" >
         <h4 class="content-title mb-2">From the Scheduled Tribes Development Department for renovation of houses and provision and completion of additional facilities
            Application for financial assistance (പട്ടികവർഗ്ഗ വികസന വകുപ്പിൽനിന്ന് വീടുകളുടെ നവീകരണത്തിനും അധികസൗകര്യങ്ങൾ                                     ഏർപെടുത്തുന്നതിനും   പൂർത്തീകരിക്കുന്നതിനുമുള്ള 
            ധനസഹായത്തിനുള്ള അപേക്ഷ )
         </h4>
         @if ($message = Session::get('error'))
         <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><i class="fa fa-window-close"></i></button>                                {{ $message }}
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
                              <label class="form-label">Name (പേര്) :</label>
                           </div>
                           <div class="col-md-6 mb-6">
                              <input type="text" class="form-control"  name="name" id="name" value="{{ @$houseManagement->name }}" placeholder="പേര്" readonly/>
                           </div>
                        </div>
                        <br>
                        <div class="row">
                           <div class="col-md-4 mb-4">
                              <label class="form-label">Address (മേൽവിലാസം):</label>                                    
                           </div>
                           <div class="col-md-6 mb-6">
                              <input type="text" class="form-control"  name="address" id="address" value="{{ @$houseManagement['address'] }}" placeholder="മേൽവിലാസം (പിൻകോഡ് സഹിതം)"  readonly/>
                           </div>
                        </div>
                        <br>
                        <div class="row">
                           <div class="col-md-4 mb-4">
                              <label class="form-label">Grama panchayath (ഗ്രാമപഞ്ചായത്ത്‌)/ വാർഡ് നമ്പർ  :</label>
                           </div>
                           <div class="col-md-6 mb-6">
                              <input type="text" class="form-control"  name="age" id="age" value="{{ @$houseManagement['panchayath'] }}" placeholder="" readonly />
                           </div>
                        </div>
                        <br>
                        <div class="row">
                           <div class="col-md-4 mb-4">
                              <label class="form-label">Ward No ( വാർഡ് നമ്പർ ) :</label>
                           </div>
                           <div class="col-md-6 mb-6">
                              <input type="text" class="form-control"  name="age" id="age" value="{{ @$houseManagement['ward_no'] }}" placeholder="" readonly />
                           </div>
                        </div>
                        <br>
                        <div class="row">
                           <div class="col-md-4 mb-4">
                              <label class="form-label">Caste(ജാതി)   :</label>
                           </div>
                           <div class="col-md-6 mb-6">
                              <input type="text" class="form-control"  name="caste" id="caste" value="{{ @$houseManagement['caste'] }}" placeholder="വയസ്, ജനനതീയതി" readonly/>
                           </div>
                        </div>
                        <br>
                        <div class="row">
                           <div class="col-md-4 mb-4">
                              <label class="form-label">Annual Income (വാർഷിക വരുമാനം) 
                              :</label>
                           </div>
                           <div class="col-md-6 mb-6">
                              <input type="text" class="form-control"  name="annual_income" id="annual_income" value="{{ @$houseManagement['annual_income'] }}" placeholder=" " readonly />
                           </div>
                        </div>
                        <br>
                        <div class="row">
                           <div class="col-md-4 mb-4">
                              <label class="form-label">Condition of the house for which financing is applied for and the year of sanction <br>(ധനസഹായത്തിനപേക്ഷിക്കുന്ന  വീടിന്റ അവസ്ഥയും അനുവദിച്ച വർഷവും)   :</label>
                           </div>
                           <div class="col-md-6 mb-6">
                              <input type="text" class="form-control"  name="house_details" id="house_details" value="{{ @$houseManagement['house_details'] }}" placeholder="" readonly />
                           </div>
                        </div>
                        <br>
                        <div class="row">
                           <div class="col-md-4 mb-4">
                              <label class="form-label">
                              Allotting Agency/Department (അനുവദിച്ച ഏജൻസി/ വകുപ്പ് )
                              :</label>
                           </div>
                           <div class="col-md-6 mb-6">
                              <input type="text" class="form-control"  name="agency" id="agency" value="{{ @$houseManagement['agency'] }}" placeholder="" readonly/>
                           </div>
                        </div>
                        <br>
                        <div class="row">
                           <div class="col-md-4 mb-4">
                              <label class="form-label">Year of completion of house work and receipt of final installment<br> (വീടുപണി പൂർത്തിയായി അവസാന ഗഡു കൈപ്പറ്റിയ വർഷം) :</label>
                           </div>
                           <div class="col-md-6 mb-6">
                              <input type="text" class="form-control"  name="last_payment_year" id="last_payment_year" value="{{ @$houseManagement['last_payment_year'] }}" placeholder="" readonly />
                           </div>
                        </div>
                        <br>
                        <div class="row">
                           <div class="col-md-4 mb-4">
                              <label class="form-label">Family Status (Unmarried :
                              Mother, female headed family, premature
                              Those who had to become a widow, physically and mentally
                              Those who are facing challenges, those who are terminally ill,
                              women victims of atrocities etc.)<br> കുടുംബത്തിന്റെ അവസ്ഥ  (അവിവാഹിതരായ :
                              അമ്മ, വനിത നാഥയായ കുടുംബം , അകാലത്തിൽ
                              വിധവയാകേണ്ടി വന്നവർ , ശാരീരിക മാനസിക
                              വേല്ലുവിളി നേരിടുന്നവർ , തീരാവ്യാധി പിടിപ്പെട്ടവർ ,
                              അതികർമങ്ങൾക്ക് ഇരയായ വനിതകൾ തുടങ്ങിയവ )
                              :</label>
                           </div>
                           <div class="col-md-6 mb-6">
                              <input type="text" class="form-control"  name="family_details" id="family_details" value="{{ @$houseManagement['family_details'] }}" placeholder="" readonly />
                           </div>
                        </div>
                        <br>
                        <div class="row">
                           <div class="col-md-4 mb-4">
                              <label class="form-label">Nature of the activity seeking funding
                              (Innovation, Additional convenience / Completion) <br>ധനസഹായം ആവശ്യപ്പെടുന്ന പ്രവർത്തിയുടെ സ്വഭാവം 
                              (നവീകരണം / അധിക സൗകര്യം / പൂർത്തീകരണം )
                              :</label>
                           </div>
                           <div class="col-md-6 mb-6">
                              <input type="text" class="form-control" value="{{ isset($houseManagement['nature_payment']) ? (
                                 $houseManagement['nature_payment'] == 'innovation' ? 'Innovation (നവീകരണം)' : (
                                 $houseManagement['nature_payment'] == 'Additional convenience' ? 'Additional convenience (അധിക സൗകര്യം)' : (
                                 $houseManagement['nature_payment'] == 'Completion' ? 'Completion (പൂർത്തീകരണം)' : ''
                                 )
                                 )
                                 ) : '' }}" name="nature_payment" id="nature_payment" readonly="">
                           </div>
                        </div>
                        <br>
                        <div class="row">
                           <div class="col-md-4 mb-4">
                              <label class="form-label">Has funding been received from other government departments/agencies or local self-government bodies for the specified purpose? : <br>(നിർദിഷ്ട്ട ആവശ്യത്തിനും മറ്റ് സർക്കാർ വകുപ്പ് / 
                              ഏജൻസികളിൽനിന്നോ തദ്ദേശ സ്വയംഭരണാ സ്ഥാപനങ്ങളിൽ നിന്നോ 
                              ധനസഹായം ലഭിച്ചിട്ടുണ്ടോ ? )
                              :</label>
                           </div>
                           <div class="col-md-6 mb-6">
                              <input type="text" class="form-control" value="@if(@$houseManagement['payment_details'] == 'yes') Yes ( അതെ) @else No (ഇല്ല) @endif" name="payment_details" id="payment_details" readonly="">
                           </div>
                        </div>
                        <br>
                        @if(@$houseManagement['payment_details'] =='yes')
                        <div class="row">
                           <div class="col-md-4 mb-4">
                              <label class="form-label"> Amount and date of receipt (എത്ര തുക ,ലഭിച്ച തീയതി )
                              :</label>
                           </div>
                           <div class="col-md-6 mb-6">
                              <input type="text" class="form-control" value=" {{ @$houseManagement['payment_amount'] }} , {{ @$houseManagement['date_received'] }}" name="payment_details" id="payment_details" readonly="">
                           </div>
                        </div>
                        <br>
                        @endif 
                        <div class="row">
                           <div class="col-md-4 mb-4">
                              <label class="form-label">Other things to prove eligibility: <br>(മുൻഗണന ലഭിക്കുന്നതിനുള്ള അർഹത തെളിയിക്കുന്നതിനുമുള്ള 
                              മറ്റു സംഗതികൾ)
                              :</label>
                           </div>
                           <div class="col-md-4 mb-4">
                              <input type="text" class="form-control" value="{{ @$houseManagement['prove_eligibility']}}" name="prove_eligibility" id="prove_eligibility" readonly="">
                           </div>
                           <div class="col-md-4 mb-4">
                              @if($houseManagement['prove_eligibility_file'])
                              <iframe src="{{ asset('homeMng/' . @$houseManagement['prove_eligibility_file']) }}" width="400" height="200"></iframe>
                              @endif
                           </div>
                        </div>
                        <br>
                        <div class="row">
                           <div class="col-md-4 mb-4">
                              <label class="form-label">Place (സ്ഥലം) :</label>
                           </div>
                           <div class="col-md-6 mb-6">
                              <input type="text" class="form-control"  name="place" id="place" value="{{ @$houseManagement['place'] }}" placeholder="സ്ഥലം" readonly />
                           </div>
                        </div>
                        <br>
                        <div class="row">
                           <div class="col-md-4 mb-4">
                              <label class="form-label">Date (തീയതി) :</label>
                           </div>
                           <div class="col-md-6 mb-6">
                              <input type="text" class="form-control"  name="date" id="date" value="{{ @$houseManagement['date'] }}" placeholder="തീയതി" readonly />
                           </div>
                        </div>
                        <br>
                        <div class="row">
                           <div class="col-md-4 mb-4">
                              <label class="form-label">Applicant's signature (അപേക്ഷകന്റെ ഒപ്പ് ) :</label>
                           </div>
                           <div class="col-md-6 mb-6">
                              @if(@$houseManagement['signature'] !="")
                              <img src="{{ url('/') }}/homeMng/{{ @$houseManagement['signature'] }}" alt="Preview" width="300" height="200">
                              @endif
                           </div>
                        </div>
                        <br>
                        <div class="row">
                           <div class="col-md-4 mb-4">
                           </div>
                           <div class="col-md-6 mb-6">
                              <a href="{{ route('adminHouseGrantList') }}">  <input type="button" class="btn btn-primary" value="Back >>" >
                              </a>  
                           </div>
                        </div>
                        <br>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<script>
   $(document).ready(function() {
       	$('#example').DataTable();
   });
    
</script>
<!-- main-content-body -->
@endsection