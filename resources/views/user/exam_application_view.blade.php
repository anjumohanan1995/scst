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
            അപേക്ഷ
         </h4>
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
      <div>
         <div class="row row-sm ">
            <div class="col-sm-12 col-md-12 col-lg-8">
               <div id="showPrint" class="card overflow-hidden" >
                  <div class="card-body pd-y-7">
                     <div id="btnHide" class="row justify-content-end m-3">
                        <a style="width: 50px" onclick="printDiv()"><img
                           src="{{ asset('admin/uploads/icons/printer.png') }}" alt=""></a>
                     </div>
                     <div id="form_id">
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
                        <form action="#" method="post"
                           style="font-weight: 500;font-size: 12px;padding: 90px;">
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
                           {{-- 
                           <div class=" row paper-1">
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
                           </div>
                           --}}
                           {{-- 
                           <div class=" row paper-1">
                              <div class="col-5">
                                 <label>12. Birth Place / ജനനസ്ഥലവും </label>
                              </div>
                              <div class="col-1">
                                 <label> : </label>
                              </div>
                              <div class="col-6">
                                 <label> {{ @$formData['birth_place'] }} </label>
                              </div>
                           </div>
                           --}}
                           {{-- 
                           <div class=" row paper-1">
                              <div class="col-5">
                                 <label>13. Birth District / ജില്ലയും </label>
                              </div>
                              <div class="col-1">
                                 <label> : </label>
                              </div>
                              <div class="col-6">
                                 <label> {{ @$birth_district->name }} </label>
                              </div>
                           </div>
                           --}}
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
                                 @if (@$formData['signature'])
                                 <img class="w-50"
                                    src="{{ asset('/signature/' . @$formData['signature']) }}"
                                    alt="">
                                 @endif
                              </div>
                           </div>
                           {{-- ends here  --}}
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
                                    <label>{{ @$formData['submittedDistrict']['name'] }}</label>
                                    {{-- <label>{{ @$formData['submittedDistrict']['name'] }}</label> --}}
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
                                    <label>{{ @$formData['submittedTeo']['teo_name'] }}</label>
                                 </div>
                              </div>
                           </div>
                           <br><br>
                           <div class="row paper-1">
                              <div class="col-12">
                                 <span for="parentSign"> മുകളിൽ പറഞ്ഞിട്ടുള്ള വിവരങ്ങൾ എല്ലാം എന്റെ
                                 അറിവിൽപെട്ടിടത്തോളം സത്യവും ശരിയുമെന്നെന്നും ഇതിനാൽ
                                 ബോധിപ്പിച്ചുകൊള്ളുന്നു.
                                 മുകളിൽ പറഞ്ഞിട്ടുള്ള സ്കൂളിൽ എന്റെ മകൻ/മകൾ
                                 <b>{{ @$formData['student_name'] }}</b> പ്രവേശനം ലഭിക്കുന്ന പക്ഷം
                                 പഠനം
                                 പൂർത്തിയാക്കുന്നതിനു മുൻപായി എന്റെ സ്വന്തം താല്പര്യപ്രകാരം പഠിത്തം
                                 നിർത്തുകയോ കുട്ടിയെ പിന്വലിക്കുകയോ ചെയ്യുകയില്ല എന്നു ഇതിനാൽ
                                 ഉറപ്പുതന്നുകുള്ളുന്നു.</span>
                              </div>
                           </div><br>
                           <div class="row">
                              <div class="col-md-4 mb-4">  

                              <div class="col-md-6 mb-6">
                               <a href="{{ route('userExamList') }}">  <input type="button" class="btn btn-primary" value="Back >>" >
                               </a>  </div>
                                      
                                  </div><br>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
            

            @if( Auth::user()->role == 'User') 
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
                <div class="pt-2 card overflow-hidden">                            
                   <div class="card-body">
                     @if( @$formData->return_status == 1)
                     @php
                     $role = DB::table('users')->where('_id', @$formData->return_userid)->value('role');
                    
                 @endphp
                     <p class="inputText badge bg-danger" style="font-size: 12px">Returned Application - by {{ @$formData->returnUser->name }} ({{ @$role }})</p>
                        <ul class="timeline-3"> 
                           @if( @$formData->teo_return == null)
                           <li class="ApproveTimeline">
                              <a href="#!">TEO</a>
                              <a href="#!" class="float-end"><i class="fa fa-eye"></i>  {{ @$formData['teo_return_view_date'] }}</a>
                              <br>
                              <p class="inputText badge bg-success" style="font-size: 12px">Approved </p>
                         
                              <p  class="mt-2"><span class= "spanclr"> Approved Date :   </span>@if(@$formData['teo_status_date']!=null) {{ \Carbon\Carbon::parse(@$formData['teo_status_date'])->format('d-m-Y h:i a') }}@endif</p>
                            
                           </li>
                           @if(@$formData->teo_return == null)
                           @if( @$formData->clerk_return == null)
                           <li class="ApproveTimeline">
                              <a href="#!">Clerk</a>
                              <a href="#!" class="float-end"><i class="fa fa-eye"></i>  {{ @$formData['clerk_return_view_date'] }}</a>
                              <p></p>
                              <p class="inputText badge bg-success" style="font-size: 12px">Approved </p>
                              <p  class="mt-2"><span class= "spanclr"> Name :   </span>{{ @$formData->clerkUser->name }}</p>
                             
                              <p  class="mt-2"><span class= "spanclr"> Approved Date :   </span>@if(@$formData['clerk_status_date']!=null) {{ \Carbon\Carbon::parse(@$formData['clerk_status_date'])->format('d-m-Y h:i a') }}@endif</p>
                              <p  class="mt-2"><span class= "spanclr"> Approved Reason :   </span>{{ @$formData->clerk_status_reason}}</p>
                           </li>
            
                           @elseif( @$formData->clerk_return == 1)
                           <li class="ApproveTimeline">
                              <a href="#!">Clerk</a>
                              <p></p>
                              <p class="inputText badge bg-warning" style="font-size: 12px">Pending </p>
                             
                           </li>
            
                           @endif
                           @endif
            
                            @if(@$formData->clerk_return == null)
                           @if( @$formData->JsSeo_return == null)
                           <li class="ApproveTimeline">
                              <a href="#!">JS/ SEO</a>
                              <a href="#!" class="float-end"><i class="fa fa-eye"></i>  {{ @$formData['JsSeo_return_view_date'] }}</a>
                              <p></p>
                              <p class="inputText badge bg-success" style="font-size: 12px">Approved </p>
                              <p  class="mt-2"><span class= "spanclr"> Name :   </span>{{ @$formData->JsSeoUser->name }}</p>
                             
                              <p  class="mt-2"><span class= "spanclr"> Approved Date :   </span>@if(@$formData['JsSeo_status_date']!=null) {{ \Carbon\Carbon::parse(@$formData['JsSeo_status_date'])->format('d-m-Y h:i a') }}@endif</p>
                              <p  class="mt-2"><span class= "spanclr"> Approved Reason :   </span>{{ @$formData->JsSeo_status_reason}}</p>
                           </li>
            
                           @elseif( @$formData->JsSeo_return == 1)
                           <li class="ApproveTimeline">
                              <a href="#!">JS/ SEO</a>
                              <p></p>
                              <p class="inputText badge bg-warning" style="font-size: 12px">Pending </p>
                             
                           </li>
            
                           @endif
                           @endif 
            
                           @if(@$formData->JsSeo_return == null)
                           @if( @$formData->assistant_return == null)
                           <li class="ApproveTimeline">
                              <a href="#!">APO/ ATDO</a>
                              <a href="#!" class="float-end"><i class="fa fa-eye"></i>  {{ @$formData['assistant_return_view_date'] }}</a>
                              <p></p>
                              <p class="inputText badge bg-success" style="font-size: 12px">Approved </p>
                              <p  class="mt-2"><span class= "spanclr"> Name :   </span>{{ @$formData->JsSeoUser->name }}</p>
                             
                              <p  class="mt-2"><span class= "spanclr"> Approved Date :   </span>@if(@$formData['assistant_status_date']!=null) {{ \Carbon\Carbon::parse(@$formData['assistant_status_date'])->format('d-m-Y h:i a') }}@endif</p>
                              <p  class="mt-2"><span class= "spanclr"> Approved Reason :   </span>{{ @$formData->assistant_status_reason}}</p>
                           </li>
            
                           @elseif( @$formData->assistant_return == 1)
                           <li class="ApproveTimeline">
                              <a href="#!">APO/ ATDO</a>
                              <p></p>
                              <p class="inputText badge bg-warning" style="font-size: 12px">Pending </p>
                             
                           </li>
            
                           @endif
                           @endif 
      
                           @if(@$formData->rejection_status  == 1)
                           <li class="rejectTimeline">
                              <a href="#!">PO / TDO</a>
                              <a href="#!" class="float-end"><i class="fa fa-eye"></i>  {{ @$formData['officer_return_view_date'] }}</a>
                              <p></p>
                              <p class="inputText badge bg-danger" style="font-size: 12px">Rejected </p>
                              <p  class="mt-2"><span class= "spanclr"> Name :   </span>{{ @$formData->officerUser->name }}</p>
                              
                              <p  class="mt-2"><span class= "spanclr"> Rejection Date :   </span>@if(@$formData['officer_status_date']!=null) {{ \Carbon\Carbon::parse(@$formData['officer_status_date'])->format('d-m-Y h:i a') }}@endif</p>
                              <p  class="mt-2"><span class= "spanclr"> Rejection Reason :   </span>{{ @$formData->officer_status_reason}}</p>
                           </li>
                           @else
            
                           @if(@$formData->assistant_return == null)
                           @if( @$formData->officer_return == null)
                           <li class="ApproveTimeline">
                              <a href="#!">PO/ TDO</a>
                              <a href="#!" class="float-end"><i class="fa fa-eye"></i>  {{ @$formData['officer_return_view_date'] }}</a>
                              <p></p>
                              <p class="inputText badge bg-success" style="font-size: 12px">Approved </p>
                              <p  class="mt-2"><span class= "spanclr"> Name :   </span>{{ @$formData->JsSeoUser->name }}</p>
                             
                              <p  class="mt-2"><span class= "spanclr"> Approved Date :   </span>@if(@$formData['officer_status_date']!=null) {{ \Carbon\Carbon::parse(@$formData['JsSeo_status_date'])->format('d-m-Y h:i a') }}@endif</p>
                              <p  class="mt-2"><span class= "spanclr"> Approved Reason :   </span>{{ @$formData->officer_status_reason}}</p>
                           </li>
      
            
                           @elseif( @$formData->officer_return == 1)
                           <li class="ApproveTimeline">
                              <a href="#!">PO/ TDO</a>
                              <p></p>
                              <p class="inputText badge bg-warning" style="font-size: 12px">Pending </p>
                              {{-- <div class="settings-icon">
                                 <a class="approveItem" data-id="{{ @$formData->id }}"><i class="fa fa-check bg-success me-1"></i></a>
                                 &nbsp;&nbsp;<a class="rejectItem" data-id="{{ @$formData->id }}"><i class="fa fa-ban bg-danger "></i></a>
                                 &nbsp;&nbsp;<a class="remove" data-id="{{ @$formData->id }}"><i class="fa fa-times bg-danger "></i></a>
                                 
                              </div> --}}
                             
                           </li>
            
                           @endif
                           @endif 
                           @endif
                           @endif
                        </ul>
                    @else
      
                     <ul class="timeline-3">                                 
                   
                         @if( @$formData->teo_status == null)
            
                         <li class="pendingTimeline">
                          <a href="#!">TEO</a>
                          <a href="#!" class="float-end"><i class="fa fa-eye"></i>  {{ @$formData['teo_view_date'] }}</a>
                          <br>       
                          <p class="inputText badge bg-warning" style="font-size: 12px">Pending</p>
                                 {{-- <div class="settings-icon">
                                     <a class="approveItem" data-id="{{ @$formData->id }}"><i class="fa fa-check bg-success me-1"></i></a>
                                     &nbsp;&nbsp;  <a class="rejectItem" data-id="{{ @$formData->id }}"><i class="fa fa-ban bg-danger "></i></a>
                                  </div>
                                 --}}
                             </li>
                           
                             @elseif( @$formData->teo_status == 1)
            
                             <li class="ApproveTimeline">
                              <a href="#!">TEO</a>
                              <a href="#!" class="float-end"><i class="fa fa-eye"></i>  {{ @$formData['teo_view_date'] }}</a>
                              <br>
                              <p class="inputText badge bg-success" style="font-size: 12px">Approved </p>
                         
                              <p  class="mt-2"><span class= "spanclr"> Approved Date :   </span>@if(@$formData['teo_status_date']!=null) {{ \Carbon\Carbon::parse(@$formData['teo_status_date'])->format('d-m-Y h:i a') }}@endif</p>
                              <p  class="mt-2"><span class= "spanclr"> Approved Reason :   </span>{{ @$formData->teo_status_reason}}</p>
                            
                                 </li>
                                 @elseif( @$formData->teo_status == 2)
            
                                 <li class="rejectTimeline">
                                  <a href="#!">TEO</a>
                                  <a href="#!" class="float-end"><i class="fa fa-eye"></i>  {{ @$formData['teo_view_date'] }}</a>
                                  <br>
                                  <p class="inputText badge bg-danger" style="font-size: 12px">Returned </p>
                             
                                  <p  class="mt-2"><span class= "spanclr"> Returned Date :   </span>@if(@$formData['teo_status_date']!=null) {{ \Carbon\Carbon::parse(@$formData['teo_status_date'])->format('d-m-Y h:i a') }}@endif</p>
                                  <p  class="mt-2"><span class= "spanclr"> Returned Reason :   </span>{{ @$formData->teo_status_reason}}</p>
                                
                                     </li>
                                 @endif
                                 @if(@$formData->teo_status == 1)
                                 @if( @$formData->clerk_status == 1)
                
                                 <li class="ApproveTimeline">
                                   <a href="#!">Clerk</a>
                                   <a href="#!" class="float-end"><i class="fa fa-eye"></i>  {{ @$formData['clerk_view_date'] }}</a>
                                   <p></p>
                                   <p class="inputText badge bg-success" style="font-size: 12px">Approved </p>
                                   <p  class="mt-2"><span class= "spanclr"> Name :   </span>{{ @$formData->clerkUser->name }}</p>
                                  
                                   <p  class="mt-2"><span class= "spanclr"> Approved Date :   </span>@if(@$formData['clerk_status_date']!=null) {{ \Carbon\Carbon::parse(@$formData['clerk_status_date'])->format('d-m-Y h:i a') }}@endif</p>
                                   <p  class="mt-2"><span class= "spanclr"> Approved Reason :   </span>{{ @$formData->clerk_status_reason}}</p>
                                </li>
                                @elseif( @$formData->clerk_status == 2)
                
                                <li class="rejectTimeline">
                                  <a href="#!">Clerk</a>
                                  <a href="#!" class="float-end"><i class="fa fa-eye"></i>  {{ @$formData['clerk_view_date'] }}</a>
                                  <p></p>
                                  <p class="inputText badge bg-danger" style="font-size: 12px">Returned </p>
                                  <p  class="mt-2"><span class= "spanclr"> Name :   </span>{{ @$formData->clerkUser->name }}</p>
                                  
                                  <p  class="mt-2"><span class= "spanclr"> Returned Date :   </span>@if(@$formData['clerk_status_date']!=null) {{ \Carbon\Carbon::parse(@$formData['clerk_status_date'])->format('d-m-Y h:i a') }}@endif</p>
                                  <p  class="mt-2"><span class= "spanclr"> Returned Reason :   </span>{{ @$formData->clerk_status_reason}}</p>
                               </li>
                               @elseif( @$formData->clerk_status == null)
                
                               <li class="pendingTimeline">
                                 <a href="#!">Clerk</a>
                                 <a href="#!" class="float-end"><i class="fa fa-eye"></i>  {{ @$formData['clerk_view_date'] }}</a>
                                <p></p>
                                 <p class="inputText badge bg-warning" style="font-size: 12px">Pending </p>
                                 {{-- <div class="settings-icon">
                                    <a class="approveItem" data-id="{{ @$formData->id }}"><i class="fa fa-check bg-success me-1"></i></a>
                                    &nbsp;&nbsp;  <a class="rejectItem" data-id="{{ @$formData->id }}"><i class="fa fa-ban bg-danger "></i></a>
                                 </div>
                                --}}
                                  </li>
                                  @endif
                                  @endif
                                  @if(@$formData->clerk_status == 1)
                               
                                  @if( @$formData->JsSeo_status == 1)
                 
                                  <li class="ApproveTimeline">
                                    <a href="#!">JS/ SEO</a>
                                    <a href="#!" class="float-end"><i class="fa fa-eye"></i>  {{ @$formData['JsSeo_view_date'] }}</a>
                                    <p></p>
                                    <p class="inputText badge bg-success" style="font-size: 12px">Approved </p>
                                    <p  class="mt-2"><span class= "spanclr"> Name :   </span>{{ @$formData->assistantUser->name }}</p>
                                   
                                    <p  class="mt-2"><span class= "spanclr"> Approved Date :   </span>@if(@$formData['JsSeo_status_date']!=null) {{ \Carbon\Carbon::parse(@$formData['JsSeo_status_date'])->format('d-m-Y h:i a') }}@endif</p>
                                    <p  class="mt-2"><span class= "spanclr"> Approved Reason :   </span>{{ @$formData->JsSeo_status_reason}}</p>
                                 </li>
                                 @elseif( @$formData->JsSeo_status == 2)
                 
                                 <li class="rejectTimeline">
                                   <a href="#!">JS/ SEO</a>
                                   <a href="#!" class="float-end"><i class="fa fa-eye"></i>  {{ @$formData['JsSeo_view_date'] }}</a>
                                   <p></p>
                                   <p class="inputText badge bg-danger" style="font-size: 12px">Returned </p>
                                   <p  class="mt-2"><span class= "spanclr"> Name :   </span>{{ @$formData->JsSeoUser->name }}</p>
                                   
                                   <p  class="mt-2"><span class= "spanclr"> Returned Date :   </span>@if(@$formData['JsSeo_status_date']!=null) {{ \Carbon\Carbon::parse(@$formData['JsSeo_status_date'])->format('d-m-Y h:i a') }}@endif</p>
                                   <p  class="mt-2"><span class= "spanclr"> Returned Reason :   </span>{{ @$formData->JsSeo_status_reason}}</p>
                                </li>
                                @elseif( @$formData->JsSeo_status == null)
                 
                                <li class="pendingTimeline">
                                  <a href="#!">JS/ SEO</a>
                                  <a href="#!" class="float-end"><i class="fa fa-eye"></i>  {{ @$formData['JsSeo_view_date'] }}</a>
                                 <p></p>
                                  <p class="inputText badge bg-warning" style="font-size: 12px">Pending </p>
                                  {{-- <div class="settings-icon">
                                    <a class="approveItem" data-id="{{ @$formData->id }}"><i class="fa fa-check bg-success me-1"></i></a>
                                    &nbsp;&nbsp;  <a class="rejectItem" data-id="{{ @$formData->id }}"><i class="fa fa-ban bg-danger "></i></a>
                                 </div> --}}
                               
                                   </li>
                                  
                                   @endif
                                   @endif
            
                                 @if(@$formData->JsSeo_status == 1)     
                                 @if( @$formData->assistant_status == 1)
                
                                 <li class="ApproveTimeline">
                                   <a href="#!">APO / ATDO</a>
                                   <a href="#!" class="float-end"><i class="fa fa-eye"></i>  {{ @$formData['assistant_view_date'] }}</a>
                                   <p></p>
                                   <p class="inputText badge bg-success" style="font-size: 12px">Approved </p>
                                   <p  class="mt-2"><span class= "spanclr"> Name :   </span>{{ @$formData->assistantUser->name }}</p>
                                  
                                   <p  class="mt-2"><span class= "spanclr"> Approved Date :   </span>@if(@$formData['assistant_status_date']!=null) {{ \Carbon\Carbon::parse(@$formData['assistant_status_date'])->format('d-m-Y h:i a') }}@endif</p>
                                   <p  class="mt-2"><span class= "spanclr"> Approved Reason :   </span>{{ @$formData->assistant_status_reason}}</p>
                                </li>
                                @elseif( @$formData->assistant_status == 2)
                
                                <li class="rejectTimeline">
                                  <a href="#!">APO / ATDO</a>
                                  <a href="#!" class="float-end"><i class="fa fa-eye"></i>  {{ @$formData['assistant_view_date'] }}</a>
                                  <p></p>
                                  <p class="inputText badge bg-danger" style="font-size: 12px">Returned </p>
                                  <p  class="mt-2"><span class= "spanclr"> Name :   </span>{{ @$formData->assistantUser->name }}</p>
                                  
                                  <p  class="mt-2"><span class= "spanclr"> Returned Date :   </span>@if(@$formData['assistant_status_date']!=null) {{ \Carbon\Carbon::parse(@$formData['assistant_status_date'])->format('d-m-Y h:i a') }}@endif</p>
                                  <p  class="mt-2"><span class= "spanclr"> Returned Reason :   </span>{{ @$formData->assistant_status_reason}}</p>
                               </li>
                               
                               @elseif( @$formData->assistant_status == null)
                
                               <li class="pendingTimeline">
                                 <a href="#!">APO / ATDO</a>
                                 <a href="#!" class="float-end"><i class="fa fa-eye"></i>  {{ @$formData['assistant_view_date'] }}</a>
                                <p></p>
                                 <p class="inputText badge bg-warning" style="font-size: 12px">Pending </p>
                                 {{-- <div class="settings-icon">
                                    <a class="approveItem" data-id="{{ @$formData->id }}"><i class="fa fa-check bg-success me-1"></i></a>
                                    &nbsp;&nbsp;  <a class="rejectItem" data-id="{{ @$formData->id }}"><i class="fa fa-ban bg-danger "></i></a>
                                 </div> --}}
                                  </li>
                           
                                  @endif
                                  @endif
      
                                  @if(@$formData->rejection_status  == 1)
                                  <li class="rejectTimeline">
                                     <a href="#!">PO / TDO</a>
                                     <a href="#!" class="float-end"><i class="fa fa-eye"></i>  {{ @$formData['officer_view_date'] }}</a>
                                     <p></p>
                                     <p class="inputText badge bg-danger" style="font-size: 12px">Rejected </p>
                                     <p  class="mt-2"><span class= "spanclr"> Name :   </span>{{ @$formData->officerUser->name }}</p>
                                     
                                     <p  class="mt-2"><span class= "spanclr"> Rejection Date :   </span>@if(@$formData['officer_status_date']!=null) {{ \Carbon\Carbon::parse(@$formData['officer_status_date'])->format('d-m-Y h:i a') }}@endif</p>
                                     <p  class="mt-2"><span class= "spanclr"> Rejection Reason :   </span>{{ @$formData->officer_status_reason}}</p>
                                  </li>
                                  @else
      
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
                                   <p class="inputText badge bg-danger" style="font-size: 12px">Returned </p>
                                   <p  class="mt-2"><span class= "spanclr"> Name :   </span>{{ @$formData->officerUser->name }}</p>
                                   
                                   <p  class="mt-2"><span class= "spanclr"> Returned Date :   </span>@if(@$formData['officer_status_date']!=null) {{ \Carbon\Carbon::parse(@$formData['officer_status_date'])->format('d-m-Y h:i a') }}@endif</p>
                                   <p  class="mt-2"><span class= "spanclr"> Returned Reason :   </span>{{ @$formData->officer_status_reason}}</p>
                                </li>
      
                                @elseif( @$formData->officer_status == null)
                 
                                <li class="pendingTimeline">
                                  <a href="#!">PO / TDO</a>
                                  <a href="#!" class="float-end"><i class="fa fa-eye"></i>  {{ @$formData['officer_view_date'] }}</a>
                                 <p></p>
                                  <p class="inputText badge bg-warning" style="font-size: 12px">Pending </p>
                                  {{-- <div class="settings-icon">
                                    <a class="approveItem" data-id="{{ @$formData->id }}"><i class="fa fa-check bg-success me-1"></i></a>
                                    &nbsp;&nbsp;<a class="rejectItem" data-id="{{ @$formData->id }}"><i class="fa fa-ban bg-danger "></i></a>
                                    &nbsp;&nbsp;<a class="remove" data-id="{{ @$formData->id }}"><i class="fa fa-times bg-danger "></i></a>
                                    
                                 </div> --}}
                                   </li>
                                   @endif
                                   @endif
                                   @endif
                     </ul>  
                     @endif
                 </div>
             </div>
            </div>

               

            @endif

            @if (Auth::user()->role !== 'User')
            <div class="col-sm-12 col-md-12 col-lg-4">
               <div class="card overflow-hidden"
                  style="width: min-content;margin-left: 128px;width: 73%;">
                  <div class="card-body pb-3">
                     <div class="d-flex justify-content-between">
                        <h4 class="card-title mg-b-10">project &amp; task</h4>
                        <i class="mdi mdi-dots-horizontal text-gray"> </i>
                     </div>
                     <p class="tx-12 text-muted mb-3">In project, a task is an activity that needs to be
                        accomplished within a defined period of time or by a deadline. <a
                           href="">Learn
                        more</a>
                     </p>
                     <div class="table-responsive mb-0 projects-stat tx-14">
                        <table
                           class="table table-hover table-bordered mb-0 text-md-nowrap text-lg-nowrap text-xl-nowrap">
                           <thead>
                              <tr>
                                 <th>Project &amp; Task</th>
                                 <th>Status</th>
                              </tr>
                           </thead>
                           <tbody>
                              <tr>
                                 <td>
                                    <div class="project-names">
                                       <h6
                                          class="bg-primary-transparent text-primary d-inline-block mr-2 text-center">
                                          U
                                       </h6>
                                       <p class="d-inline-block font-weight-semibold mb-0">UI
                                          Design
                                       </p>
                                    </div>
                                 </td>
                                 <td>
                                    <div class="badge badge-success">Completed</div>
                                 </td>
                              </tr>
                              <tr>
                                 <td>
                                    <div class="project-names">
                                       <h6
                                          class="bg-pink-transparent text-pink d-inline-block text-center mr-2">
                                          R
                                       </h6>
                                       <p class="d-inline-block font-weight-semibold mb-0">Landing
                                          Page
                                       </p>
                                    </div>
                                 </td>
                                 <td>
                                    <div class="badge badge-warning">Pending</div>
                                 </td>
                              </tr>
                              <tr>
                                 <td>
                                    <div class="project-names">
                                       <h6
                                          class="bg-success-transparent text-success d-inline-block mr-2 text-center">
                                          W
                                       </h6>
                                       <p class="d-inline-block font-weight-semibold mb-0">Website
                                          &amp; Blog
                                       </p>
                                    </div>
                                 </td>
                                 <td>
                                    <div class="badge badge-danger">Canceled</div>
                                 </td>
                              </tr>
                              <tr>
                                 <td>
                                    <div class="project-names">
                                       <h6
                                          class="bg-purple-transparent text-purple d-inline-block mr-2 text-center">
                                          P
                                       </h6>
                                       <p class="d-inline-block font-weight-semibold mb-0">Product
                                          Development
                                       </p>
                                    </div>
                                 </td>
                                 <td>
                                    <div class="badge badge-teal">on-going</div>
                                 </td>
                              </tr>
                              <tr>
                                 <td>
                                    <div class="project-names">
                                       <h6
                                          class="bg-danger-transparent text-danger d-inline-block mr-2 text-center">
                                          L
                                       </h6>
                                       <p class="d-inline-block font-weight-semibold mb-0">Logo
                                          Design
                                       </p>
                                    </div>
                                 </td>
                                 <td>
                                    <div class="badge badge-success">Completed</div>
                                 </td>
                              </tr>
                           </tbody>
                        </table>
                     </div>
                  </div>
               </div>
            </div>
            @endif
         </div>
      </div>
   </div>
</div>
<style>
   @media print {
   body * {
   visibility: hidden;
   }
   #btnHide {
   display: none;
   }
   #showPrint * {
   visibility: visible;
   }
   }
</style>
<link rel="stylesheet" href="{{ asset('css/timeline.css') }}">
<script>
   function validateForm() {
       // Check if the required fields are filled
       var parent_name = document.getElementsByName('parent_name')[0].value;
       var signature = document.getElementsByName('signature')[0].value;
       var student_name = document.getElementsByName('student_name')[0].value;
       var agree = document.getElementsByName('agree')[0].value;
   
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
       if (confirm('Are you sure ? Do you want to edit this form!. ')) {
           window.history.back();
       }
       return
   }
   // print preview function.
   
   function printDiv() {
       // alert('ho');
       var printContents = document.getElementById('form_id').innerHTML;
       var originalContents = document.body.innerHTML;
   
       document.body.innerHTML = printContents;
   
       window.print();
       document.body.innerHTML = originalContents;
   }
</script>
@endsection