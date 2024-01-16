@extends('layouts.app')
@section('content')
<!-- main-content -->
<div class="main-content app-content">
   <!-- container -->
   <div class="main-container container-fluid">
      <!-- breadcrumb -->
      <div class="breadcrumb-header justify-content-between row me-0 ms-0" >
         <h4 class="content-title mb-2">    Application for financial assistance from the Department of Scheduled Tribes Development for renovation and addition of facilities and completion of houses
            {{-- (  പട്ടികവർഗ്ഗ വികസന വകുപ്പിൽനിന്ന് വീടുകളുടെ നവീകരണത്തിനും അധികസൗകര്യങ്ങൾ ഏർപെടുത്തുന്നതിനും   പൂർത്തീകരിക്കുന്നതിനുമുള്ള 
            ധനസഹായത്തിനുള്ള അപേക്ഷ)   --}}
         </h4>
         @if ($message = Session::get('error'))
         <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><i class="fa fa-window-close"></i></button>                                {{ $message }}
         </div>
         @endif
      </div>
      <!-- /breadcrumb -->
 
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
                        style="text-align: center;color: rgb(0, 0, 0);font-size: medium;  padding: 20px;line-height: 32px;font-weight: 600;"><ul>
                        പട്ടികവർഗ്ഗ വികസന വകുപ്പിൽനിന്ന് വീടുകളുടെ നവീകരണത്തിനും അധികസൗകര്യങ്ങൾ ഏർപെടുത്തുന്നതിനും   പൂർത്തീകരിക്കുന്നതിനുമുള്ള 
                        ധനസഹായത്തിനുള്ള അപേക്ഷ</ul>
                     </h1>
                     <br>
                     <br>
                     <div class="paper-1">
                        <div class="w-100">
                           <div class="row w-100">
                              <div class="col-5">
                                 <label>1. അപേക്ഷകന്റെ പേര്  </label><br>
                              </div>
                              <div class="col-1 w-100">
                                 <label> :  
                                 </label>
                              </div>
                              <div class="col-6">
                                 <label> 
                                 {{ @$houseManagement['name'] }}
                                 </label>
                              </div>
                           </div>
                        </div>
                     </div>
                     <br>
                     <div class="paper-1">
                        <div class="w-100">
                           <div class="row w-100">
                              <div class="col-5">
                                 <label>2. മേൽവിലാസം  </label><br>
                              </div>
                              <div class="col-1 w-100">
                                 <label> :  
                                 </label>
                              </div>
                              <div class="col-6">
                                 <label> 
                                 {{ @$houseManagement['address'] }} , {{ @$houseManagement['current_district_name'] }} , {{ @$houseManagement['current_taluk_name'] }} , {{ @$houseManagement['pincode'] }}
                                 </label>
                              </div>
                           </div>
                        </div>
                     </div>
                     <br>
                     <div class="paper-1">
                        <div class="w-100">
                           <div class="row w-100">
                              <div class="col-5">
                                 <label>3. ഗ്രാമപഞ്ചായത്ത്‌/ വാർഡ് നമ്പർ 
                                 </label><br>
                              </div>
                              <div class="col-1 w-100">
                                 <label> :  
                                 </label>
                              </div>
                              <div class="col-6">
                                 <label> 
                                 {{ @$houseManagement['panchayath'] }} /  {{ @$houseManagement['ward_no'] }}
                                 </label>
                              </div>
                           </div>
                        </div>
                     </div>
                     <br>
                     <div class="paper-1">
                        <div class="w-100">
                           <div class="row w-100">
                              <div class="col-5">
                                 <label>4. ജാതി 
                                 </label><br>
                              </div>
                              <div class="col-1 w-100">
                                 <label> :  
                                 </label>
                              </div>
                              <div class="col-6">
                                 <label> 
                                 {{ @$houseManagement['caste'] }} 
                                 </label>
                              </div>
                           </div>
                        </div>
                     </div>
                     <br>
                     <div class="paper-1">
                        <div class="w-100">
                           <div class="row w-100">
                              <div class="col-5">
                                 <label>5. വാർഷിക വരുമാനം 
                                 </label><br>
                              </div>
                              <div class="col-1 w-100">
                                 <label> :  
                                 </label>
                              </div>
                              <div class="col-6">
                                 <label> 
                                 {{ @$houseManagement['income'] }} 
                                 </label>
                              </div>
                           </div>
                        </div>
                     </div>
                     <br>
                     <div class="paper-1">
                        <div class="w-100">
                           <div class="row w-100">
                              <div class="col-5">
                                 <label>6. 
                                 ധനസഹായത്തിനപേക്ഷിക്കുന്ന  വീടിന്റ അവസ്ഥയും അനുവദിച്ച വർഷവും 
                                 </label><br>
                              </div>
                              <div class="col-1 w-100">
                                 <label> :  
                                 </label>
                              </div>
                              <div class="col-6">
                                 <label> 
                                 {{ @$houseManagement['house_details'] }} 
                                 </label>
                              </div>
                           </div>
                        </div>
                     </div>
                     <br>
                     <div class="paper-1">
                        <div class="w-100">
                           <div class="row w-100">
                              <div class="col-5">
                                 <label>7. അനുവദിച്ച ഏജൻസി/ വകുപ്പ് 
                                 </label><br>
                              </div>
                              <div class="col-1 w-100">
                                 <label> :  
                                 </label>
                              </div>
                              <div class="col-6">
                                 <label> 
                                 {{ @$houseManagement['agency'] }}
                                 </label>
                              </div>
                           </div>
                        </div>
                     </div>
                     <br>
                     <div class="paper-1">
                        <div class="w-100">
                           <div class="row w-100">
                              <div class="col-5">
                                 <label>8. വീടുപണി പൂർത്തിയായി അവസാന ഗഡു കൈപ്പറ്റിയ വർഷം  
                                 </label><br>
                              </div>
                              <div class="col-1 w-100">
                                 <label> :  
                                 </label>
                              </div>
                              <div class="col-6">
                                 <label> 
                                 {{ @$houseManagement['last_payment_year'] }} 
                                 </label>
                              </div>
                           </div>
                        </div>
                     </div>
                     <br>
                     <div class="paper-1">
                        <div class="w-100">
                           <div class="row w-100">
                              <div class="col-5">
                                 <label>9. കുടുംബത്തിന്റെ അവസ്ഥ  (അവിവാഹിതരായ :
                                 അമ്മ, വനിത നാഥയായ കുടുംബം , അകാലത്തിൽ
                                 വിധവയാകേണ്ടി വന്നവർ , ശാരീരിക മാനസിക
                                 വേല്ലുവിളി നേരിടുന്നവർ , തീരാവ്യാധി പിടിപ്പെട്ടവർ ,
                                 അതികർമങ്ങൾക്ക് ഇരയായ വനിതകൾ തുടങ്ങിയവ
                                 </label><br>
                              </div>
                              <div class="col-1 w-100">
                                 <label> :  
                                 </label>
                              </div>
                              <div class="col-6">
                                 <label> 
                                 {{ @$houseManagement['family_details'] }} 
                                 </label>
                              </div>
                           </div>
                        </div>
                     </div>
                     <br>
                     <div class="paper-1">
                        <div class="w-100">
                           <div class="row w-100">
                              <div class="col-5">
                                 <label>10. 
                                 ധനസഹായം ആവശ്യപ്പെടുന്ന പ്രവർത്തിയുടെ സ്വഭാവം 
                                 (നവീകരണം  / അധിക സൗകര്യം / പൂർത്തീകരണം )
                                 </label><br>
                              </div>
                              <div class="col-1 w-100">
                                 <label> :  
                                 </label>
                              </div>
                              <div class="col-6">
                                 <label> 
                                 @if(@$houseManagement['nature_payment'] == 'innovation') 
                                 നവീകരണം
                                 @elseif(@$houseManagement['nature_payment'] == 'Additional convenience') 
                                 അധിക സൗകര്യം
                                 @elseif(@$houseManagement['nature_payment'] == 'Completion') 
                                 പൂർത്തീകരണം
                                 @endif
                                 </label>
                              </div>
                           </div>
                        </div>
                     </div>
                     <br>
                     <div class="paper-1">
                        <div class="w-100">
                           <div class="row w-100">
                              <div class="col-5">
                                 <label>11. നിർദിഷ്ട്ട ആവശ്യത്തിനും മറ്റ് സർക്കാർ വകുപ്പ് / 
                                 ഏജൻസികളിൽനിന്നോ തദ്ദേശ സ്വയംഭരണാ സ്ഥാപനങ്ങളിൽ നിന്നോ 
                                 ധനസഹായം ലഭിച്ചിട്ടുണ്ടോ എന്നുള്ള  വിവരം  
                                 (ഉണ്ടെങ്കിൽ എത്ര തുക ,ലഭിച്ച തീയതി )
                                 </label><br>
                              </div>
                              <div class="col-1 w-100">
                                 <label> :  
                                 </label>
                              </div>
                              <div class="col-6">
                                 <label> 
                                 @if(@$houseManagement['payment_details'] =='yes')Yes ,
                                 @else 
                                 No 
                                 @endif 
                                 @if(@$houseManagement['payment_details'] =='yes')
                                 {{ @$houseManagement['payment_amount'] }} , {{ @$houseManagement['date_received'] }}
                                 @endif 
                                 </label>
                              </div>
                           </div>
                        </div>
                     </div>
                     <br> 
                     <div class="paper-1">
                        <div class="w-100">
                           <div class="row w-100">
                              <div class="col-5">
                                 <label>12. മുൻഗണന ലഭിക്കുന്നതിനുള്ള അർഹത തെളിയിക്കുന്നതിനുമുള്ള
                                 </label><br>
                              </div>
                              <div class="col-1 w-100">
                                 <label> :  
                                 </label>
                              </div>
                              <div class="col-6">
                                 <label> 
                                 {{ @$houseManagement['prove_eligibility'] }}    </label>
                                 <br>
                                 @if($houseManagement['prove_eligibility_file'])
                                 <iframe src="{{ asset('homeMng/' . @$houseManagement['prove_eligibility_file']) }}" width="400" height="200"></iframe>
                                 @endif
                              </div>
                           </div>
                        </div>
                     </div>
                   
                     <br><br>
                     <div class="paper-1">
                        <div class="w-100">
                           <div class="row w-100">
                              <div class="col-5">
                                 <label>സ്ഥലം
                                 </label>: {{ @$houseManagement['place'] }}<br>
                                 <label>thiyathi
                                 </label>: {{date('d-m-Y')}}
                              </div>
                              <div class="col-6">
                                 <label> അപേക്ഷകന്റെ ഒപ്പ് /
                                 </label> :  @if($houseManagement['signature'])
                                 <img src="{{ asset('homeMng/' . @$houseManagement['signature']) }}" width="150px" height="70px">
                                 @endif
                              </div>
                           </div>
                        </div>
                     </div>
                     <br>
              
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