@extends('layouts.app')
@section('content')
<!-- main-content -->
<div class="main-content app-content">
   <!-- container -->
   <div class="main-container container-fluid">
      <!-- breadcrumb -->
      <div class="breadcrumb-header justify-content-between row me-0 ms-0">
         <div class="col-xl-9">
            <h4 class="content-title mb-2"></h4>
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
        <div class="row row-sm">
           <div class="col-xl-8 col-lg-12 col-md-12 col-sm-12">
              <div class="card overflow-hidden" >
                 <div class="card-body p-5">
                    <h1
                       style="text-align: center;color: rgb(0, 0, 0);font-size: medium;  padding: 20px;line-height: 32px;font-weight: 600;"><u>
                       പട്ടികവർഗ്ഗ വികസന വകുപ്പിൽനിന്ന് വീടുകളുടെ നവീകരണത്തിനും അധികസൗകര്യങ്ങൾ ഏർപെടുത്തുന്നതിനും   പൂർത്തീകരിക്കുന്നതിനുമുള്ള 
                       ധനസഹായത്തിനുള്ള അപേക്ഷ</u>
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
                                {{ @$formData['name'] }}
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
                                {{ @$formData['address'] }} , {{ @$formData['current_district_name'] }} , {{ @$formData['current_taluk_name'] }} , {{ @$formData['pincode'] }}
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
                                {{ @$formData['panchayath'] }} /  {{ @$formData['ward_no'] }}
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
                                {{ @$formData['caste'] }} 
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
                                {{ @$formData['annual_income'] }} 
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
                                {{ @$formData['house_details'] }} 
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
                                {{ @$formData['agency'] }}
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
                                {{ @$formData['last_payment_year'] }} 
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
                                അതികർമങ്ങൾക്ക് ഇരയായ വനിതകൾ തുടങ്ങിയവ)
                                </label><br>
                             </div>
                             <div class="col-1 w-100">
                                <label> :  
                                </label>
                             </div>
                             <div class="col-6">
                                <label> 
                                {{ @$formData['family_details'] }} 
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
                                @if(@$formData['nature_payment'] == 'innovation') 
                                നവീകരണം
                                @elseif(@$formData['nature_payment'] == 'Additional convenience') 
                                അധിക സൗകര്യം
                                @elseif(@$formData['nature_payment'] == 'Completion') 
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
                                @if(@$formData['payment_details'] =='yes')Yes ,
                                @else 
                                No 
                                @endif 
                                @if(@$formData['payment_details'] =='yes')
                                {{ @$formData['payment_amount'] }} ,@if(@$formData['date_received']!=null) {{ \Carbon\Carbon::parse(@$formData['date_received'])->format('d-m-Y') }}@endif 
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
                                <label>12. മുൻഗണന ലഭിക്കുന്നതിനുള്ള അർഹത തെളിയിക്കുന്നതിനുമുള്ള മറ്റു സംഗതികൾ
                                </label><br>
                             </div>
                             <div class="col-1 w-100">
                                <label> :  
                                </label>
                             </div>
                             <div class="col-6">
                                <label> 
                                {{ @$formData['prove_eligibility'] }}    </label>
                                <br>
                                @if($formData['prove_eligibility_file'] !='')
                                <a href="{{ asset('homeMng/' . @$formData['prove_eligibility_file']) }}" target="_blank">View</a>
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
                                </label>: {{ @$formData['place'] }}<br>
                                <label>
                                 തീയതി
                                </label>: {{date('d-m-Y')}}
                             </div>
                             <div class="col-6">
                                <label> അപേക്ഷകന്റെ ഒപ്പ് /
                                </label> :  @if($formData['signature'])
                                <img src="{{ asset('homeMng/' . @$formData['signature']) }}" width="150px" height="70px">
                                @endif
                             </div>
                          </div>
                       </div>
                    </div>
                   <br>
                    <div class="row mt-5">
                     <div class="col-12">
                         <h1
                 style="text-align: center;color: rgb(0, 0, 0);font-size: medium; text-decoration: underline; padding: 20px;line-height: 32px;font-weight: 600;">
                 അപേക്ഷ സമർപ്പിക്കുന്നത് 

             </h1>
                     </div>
                 </div>
                 <div class="row ">

                     <div class="col-6 d-flex">
                         <span class="col-5"> ജില്ല
                         </span>
                         <span class="col-1"> :</span>
                         <span class="col-6"> {{ @$formData['dist_name'] }}  </span>

                     </div>

                     <div class="col-6 d-flex">
                         <span class="col-5"> ടി .ഇ .ഓ</span>
                         <span class="col-1"> :</span>
                         <span class="col-6">{{ @$formData['teo_name'] }} </span>

                     </div>
                    

                 </div>
                    {{-- <hr> --}}
                    {{-- <div class="text-justify text">
                        <p>രണ്ടായിരത്തി ...........................വർഷം ...................മാസം കേരള ഗവർണ്ണർക്കുവേണ്ടി ..............സംയോജിത പട്ടികവർഗ്ഗ വികസന 
                            പ്രൊജക്ട്ട് ഓഫിസർ / ട്രൈബൽ ഡെവലപ്മെന്റ്  ഓഫിസർ മുമ്പാകെ .......................ജില്ലയിൽ ..........താലൂക്കിൽ .......................
                            വില്ലേജിൽ ..................പഞ്ചായത്തിൽ  സെറ്റിൽമെന്റ് / കോളനിയിൽ  വീട്ടിൽ ...................താമസം .............മകൻ /മകൾ /ഭാര്യ .....
                            ..........എഴുതി നൽകുന്ന കരാർ ഉടമ്പടി .
               ....................ഐ.റ്റി.ഡി പ്രൊജക്റ്റ് ഓഫിസർ /ട്രൈബൽ ഡെവലപ്മെന്റ് ഓഫിസർ ...............തീയതിയിലെ ..............നമ്പർ ഉത്തരവ് 
                            പ്രകാരം എന്റെ വീടിന്റെ നവീകരണത്തിനെ /അധികസൗകര്യത്തിനെ / പൂർത്തീകരണത്തിന് ................രൂപ (................................)
                            ധനസഹായം അനുവദിക്കുന്നുണ്ട് .ടി തുക വിനയോഗിച്  നിർദിഷ്ട എസ്റ്റിമേറ്റ് അനുസരിച്പ്രവർത്തി  ഒന്നാം ഗഡു കൈപറ്റി 3 
                            മാസത്തിനകം പൂർത്തീകരിക്കുന്നതാണെന്നും, പ്രസ്തുത വീടും സ്ഥലവും യാതൊരു കാരണവശാലും അന്യാധീനപ്പെടുത്തുന്നതല്ലെന്നും ,
                            ടി ധനസഹായ തുക നിർദിഷ്ട വീടിന്റെ അറ്റുകുറ്റപണിക്ക് മാത്രമേ വിനയോഗിക്കുള്ളുവെന്നും ടി പ്രവർത്തി പൂർത്തീകരിച്ചു സർക്കാർ സർവീസിലെ അസിസ്റ്റന്റ് എഞ്ചിനീർയറിൽ നിന്നും പൂർത്തീകരണ/ വാലുവേഷൻ സർട്ടിഫിക്കറ്റ് വാങ്ങി ഹാജരാക്കുന്നതാന്നെനും അല്ലാത്തപക്ഷം കൈപ്പറ്റുന്ന തുക ഞാൻ സർക്കാരില്ലേക്ക് തിരിച്ചടക്കുന്നതാന്നെന്നും അപ്രകാരം കഴിഞ്ഞില്ലെങ്കിൽ മേൽപടി   തുക റവന്യൂറികവറിയിലൂടെയോ സർക്കാർ തീരുമാനിക്കുന്ന മറ്റു മാർഗങ്ങളിലൂടെയോ എന്റെയൊ ,എന്റെ കുടുംബങ്ങളുടെയോ സ്ഥാവരജംഗമ വസ്തുക്കളിൽ നിന്നും വസൂലാക്കുന്നതിനും  സ്വമനസാലെ സമ്മതിച് ഇതിനാൽ കരാർ ഒപ്പു വെക്കുന്നു . 
                            </p>
                    </div> --}}
                    <br><br>
                    {{-- <div class="paper-1">
                        <div class="w-100">
                           <div class="row w-100">
                              <div class="col-5">
                                 <label>സ്ഥലം
                                 </label>: {{ @$formData['place'] }}<br>
                                 <label>thiyathi
                                 </label>: {{date('d-m-Y')}}
                              </div>
                              <div class="col-6">
                                 <label> അപേക്ഷകന്റെ ഒപ്പ് /
                                 </label> :  @if($formData['signature'])
                                 <img src="{{ asset('homeMng/' . @$formData['signature']) }}" width="150px" height="70px">
                                 @endif
                              </div>
                           </div>
                        </div>
                     </div> --}}
                    <form action="{{ url('HouseGrantStoreDetails') }}" method="POST" enctype="multipart/form-data">
                       @csrf
                       <div class="row">
                          <div class="col-md-3">
                             <input type="hidden" name="formData" value="{{ json_encode($formData) }}">
                             <button type="submit" class="btn-block btn btn-success" onclick="return confirm('Do you want to continue?')">Submit</button>
                          </div>
                          <div class="col-md-3">
                             <div class="btn_wrapper">
                                <a href="javascript:void(0)" class="btn btn-primary w-100" onclick="goback()">Edit</a>
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
<script>
   function validateForm() {
       // Check if the required fields are filled
       var husbandSign = document.getElementsByName('husband_sign')[0].value;
       var wifeSign = document.getElementsByName('wife_sign')[0].value;
       var husbandName = document.getElementsByName('husband_name')[0].value;
       var wifeName = document.getElementsByName('wife_name')[0].value;
   
       if (husbandSign === '' || wifeSign === '' || husbandName === '' || wifeName === '') {
           alert('Please fill in all required fields.');
           return false; // Prevent form submission
       }
   
       return true; // Allow form submission
   }
</script>
<script>
   // edit button function
   function goback() {
       if (confirm('Are you sure? Do you want to edit this form?')) {
           window.location.href = "{{ url()->previous() }}";
       }
   }
</script>
@endsection