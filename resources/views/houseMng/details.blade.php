@extends('layouts.app')
@section('content')
<!-- main-content -->
<div class="main-content app-content">
   <!-- container -->
   <div class="main-container container-fluid">
      <!-- breadcrumb -->
      <div class="breadcrumb-header justify-content-between row me-0 ms-0" >
         <h4 class="content-title mb-2">    Application for financial assistance from the Department of Scheduled Tribes Development for renovation and addition of facilities and completion of houses
            (  പട്ടികവർഗ്ഗ വികസന വകുപ്പിൽനിന്ന് വീടുകളുടെ നവീകരണത്തിനും അധികസൗകര്യങ്ങൾ ഏർപെടുത്തുന്നതിനും   പൂർത്തീകരിക്കുന്നതിനുമുള്ള 
            ധനസഹായത്തിനുള്ള അപേക്ഷ)  
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
                  <table border="1" class="table">
                     <tr>
                        <td>
                           Applicant's Name  (അപേക്ഷകന്റെ പേര്) 
                        </td>
                        <td><strong> {{ @$houseManagement['name'] }} </strong></td>
                        <td>
                           Address (മേൽവിലാസം) 
                        </td>
                        <td> <strong> {{ @$houseManagement['address'] }} , {{ @$houseManagement['address'] }}</strong> 
                        </td>
                     </tr>
                     <tr>
                        <td>
                           Grama Panchayat  (ഗ്രാമപഞ്ചായത്ത്)‌/ വാർഡ് നമ്പർ 
                        </td>
                        <td><strong> {{ @$houseManagement['panchayath'] }} </strong></td>
                        <td>
                           Ward No (വാർഡ് നമ്പർ )
                        </td>
                        <td><strong> {{ @$houseManagement['ward_no'] }} </strong></td>
                     </tr>
                     <tr>
                        <td>
                           Caste  (ജാതി) 
                        </td>
                        <td> <strong> {{ @$houseManagement['caste'] }}</strong> 
                        </td>
                        <td>
                           Annual Income  (വാർഷിക വരുമാനം )
                        </td>
                        <td> 
                           {{ @$houseManagement['annual_income'] }} 
                        </td>
                     </tr>
                     <tr>
                        <td>
                           Condition of the house for which financing is applied for and the year of sanction   (ധനസഹായത്തിനപേക്ഷിക്കുന്ന  വീടിന്റ അവസ്ഥയും അനുവദിച്ച വർഷവും )  
                        </td>
                        <td> {{ @$houseManagement['house_details'] }}
                        </td>
                        <td>
                           Year of completion of house work and receipt of final installment  ( വീടുപണി പൂർത്തിയായി അവസാന ഗഡു കൈപ്പറ്റിയ വർഷം) 
                        </td>
                        <td> {{ @$houseManagement['last_payment_year'] }}
                        </td>
                     </tr>
                     <tr>
                        <td>
                           Family Status (Unmarried :
                           Mother, female headed family, premature
                           Those who had to become a widow, physically and mentally
                           Those who are facing challenges, those who are terminally ill,
                           women victims of atrocities etc.)<br>
                           കുടുംബത്തിന്റെ അവസ്ഥ  (അവിവാഹിതരായ :
                           അമ്മ, വനിത നാഥയായ കുടുംബം , അകാലത്തിൽ
                           വിധവയാകേണ്ടി വന്നവർ , ശാരീരിക മാനസിക
                           വേല്ലുവിളി നേരിടുന്നവർ , തീരാവ്യാധി പിടിപ്പെട്ടവർ ,
                           അതികർമങ്ങൾക്ക് ഇരയായ വനിതകൾ തുടങ്ങിയവ )
                        </td>
                        <td> 
                           {{ @$houseManagement['family_details'] }} 
                        </td>
                        <td>
                           Nature of work for which financial assistance is sought (Innovation / Additional convenience / Completion)<br>
                           ധനസഹായം ആവശ്യപ്പെടുന്ന പ്രവർത്തിയുടെ സ്വഭാവം 
                           (നവീകരണം /അധിക സൗകര്യം / പൂർത്തീകരണം ) 
                        </td>
                        <td>@if(@$houseManagement['nature_payment'] == 'innovation') 
                           Innovation (നവീകരണം)
                           @elseif(@$houseManagement['nature_payment'] == 'Additional convenience') 
                           Additional convenience (അധിക സൗകര്യം)
                           @elseif(@$houseManagement['nature_payment'] == 'Completion') 
                           Completion (പൂർത്തീകരണം)
                           @endif
                        </td>
                     </tr>
                     <tr>
                        <td>
                           Has funding been received from other government departments/agencies or local self-government bodies for the specified purpose ?<br>
                           നിർദിഷ്ട്ട ആവശ്യത്തിനും മറ്റ് സർക്കാർ വകുപ്പ് / 
                           ഏജൻസികളിൽനിന്നോ തദ്ദേശ സ്വയംഭരണാ സ്ഥാപനങ്ങളിൽ നിന്നോ 
                           ധനസഹായം ലഭിച്ചിട്ടുണ്ടോ ?   
                        </td>
                        <td>  
                           @if(@$houseManagement['payment_details'] =='yes')Yes ( അതെ)
                           @else 
                           No (ഇല്ല)
                           @endif 
                        </td>
                        @if(@$houseManagement['payment_details'] =='yes')
                        <td>
                           Amount and date of receipt (എത്ര തുക ,ലഭിച്ച തീയതി )
                        </td>
                        <td>  
                           {{ @$houseManagement['payment_amount'] }} , {{ @$houseManagement['date_received'] }}
                        </td>
                        @endif 
                     </tr>
                     <tr>
                        <td>
                           Other matters to prove eligibility for preference
                           ( മുൻഗണന ലഭിക്കുന്നതിനുള്ള അർഹത തെളിയിക്കുന്നതിനുമുള്ള 
                           മറ്റു സംഗതികൾ) 
                        </td>
                        <td> {{ @$houseManagement['prove_eligibility'] }}
                           @if($houseManagement['prove_eligibility_file'])
                           <iframe src="{{ asset('homeMng/' . @$houseManagement['prove_eligibility_file']) }}" width="400" height="200"></iframe>
                           @endif
                        </td>
                        <td>
                           Place  (സ്ഥലം)
                        </td>
                        <td> 
                           {{ @$houseManagement['place'] }} 
                        </td>
                     </tr>
                     <tr>
                        <td>
                           Date  (തീയതി)  
                        </td>
                        <td> @if($houseManagement['date'])
                           {{ date('d-m-Y', strtotime(@$houseManagement['date'])) }}
                           @endif
                        </td>
                        <td>
                           Applicant's Signature/Fingerprint ( അപേക്ഷകന്റെ ഒപ്പ്/വിരലടയാളം) 
                        </td>
                        <td>  @if($houseManagement['signature'])
                           <iframe src="{{ asset('homeMng/' . @$houseManagement['signature']) }}" width="400" height="200"></iframe>
                           @endif
                        </td>
                     </tr>
                  </table>
                  <div class="row">
                     <div class="col-md-4 mb-4">
                     </div>
                     <div class="col-md-6 mb-6">
                        <a href="{{ route('userHouseGrantList') }}">  <input type="button" class="btn btn-primary" value="Back >>" >
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
<script>
   $(document).ready(function() {
       	$('#example').DataTable();
   });
    
</script>
<!-- main-content-body -->
@endsection