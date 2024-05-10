@extends('layouts.app')
@section('content')
    <!-- main-content -->
    <div class="main-content app-content">
        <!-- container -->
        <div class="main-container container-fluid">
            <!-- breadcrumb -->
            <div class="breadcrumb-header justify-content-between row me-0 ms-0">
                <div class="col-xl-9">
                    <h4 class="content-title mb-2"> മിടുക്കരായ വിദ്യാർത്ഥികൾക്കുള്ള പ്രത്യേക പ്രോത്സാഹനo</h4>

                </div>
                <div class="col-xl-3">
                </div>
                {{-- </div> --}}
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
                    <div class="row row-sm w-100">
                        <div class="col-xl-8 col-lg-12 col-md-12 col-sm-12">
                            <div class=" card">
                                <div class="card-body  p-5">

                                    <div id="btnHide" class="row justify-content-end m-3">
                                        <a style="width: 50px" onclick="printDiv()"><img
                                                src="{{ asset('admin/uploads/icons/printer.png') }}" alt=""></a>
                                    </div>
                                    <div id="form_id">
                                        <h1
                                            style="text-align: center;color: rgb(0, 0, 0);font-size: medium;  padding: 20px;line-height: 32px;font-weight: 600;">
                                            APPLICATION FOR SSLC/PLUS TWO/ DEGREE/PG AWARD 2023-24
                                        </h1>
                                        <div class="paper-1 pt-4">
                                            <div class="w-100">
                                               <div class="row w-100">
                                                  <div class="col-12" style="text-align: right;">
                                                     @if(@$formData['applicant_image'])
                                                        <img src="{{ asset('applications/student_award/' . @$formData['applicant_image']) }}" width= "100mm" height= "100mm";>
                                                     @endif
                                                  </div>
                                               </div>
                                            </div>
                                         </div>


                                        <form action="#" id="" method="post"
                                            style="font-weight: 500;font-size: 12px;padding: 90px;">

                                            <div class="paper-1">
                                                <div class="col-6">

                                                    <label>1. Name and address of Applicant </label>
                                                </div>

                                                <div class="col-6">
                                                    <label> : {{ @$formData['name'] }} <br> {{ @$formData['address'] }} <br>
                                                        @if (@$formData['districtRelation']['name'])
                                                            {{ @$formData['districtRelation']['name'] }}
                                                        @endif
                                                        @if (@$formData['talukName']['taluk_name'])
                                                            ,{{ @$formData['talukName']['taluk_name'] }}
                                                        @endif
                                                        @if (@$formData['pincode'])
                                                            ,{{ @$formData['pincode'] }}
                                                        @endif
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="paper-1">
                                                <div class="col-6">

                                                    <label>2. Examination Passed </label>
                                                </div>

                                                <div class="col-6">
                                                    <label> : {{ @$formData['examination_passed'] }} </label>
                                                </div>
                                            </div>

                                            <div class="paper-1">
                                                <div class="col-6">

                                                    <label>3. Name of the Guardian </label>
                                                </div>

                                                <div class="col-6">
                                                    <label> : {{ @$formData['guardian_name'] }}</label>
                                                </div>
                                            </div>


                                            <div class="paper-1">
                                                <div class="col-6">

                                                    <label>4. Date of Birth </label>
                                                </div>

                                                <div class="col-6">
                                                    <label> : {{ @$formData['dob'] }}</label>
                                                </div>
                                            </div>

                                            <div class="paper-1">
                                                <div class="col-6">

                                                    <label>5. Community </label>
                                                </div>

                                                <div class="col-6">
                                                    <label> : {{ @$formData['community'] }}</label>
                                                </div>
                                            </div>

                                            <div class="paper-1">
                                                <div class="col-6">

                                                    <label>6. Name of Panchayath </label>
                                                </div>

                                                <div class="col-6">
                                                    <label> : {{ @$formData['panchayath_name'] }}</label>
                                                </div>
                                            </div>

                                            <div class="paper-1">
                                                <div class="col-6">

                                                    <label>7. Name of Institution </label>
                                                </div>

                                                <div class="col-6">
                                                    <label> : {{ @$formData['institution_name'] }}</label>
                                                </div>
                                            </div>

                                            <div class="paper-1">
                                                <div class="col-6">

                                                    <label>8. Month & Year of Pass </label>
                                                </div>

                                                <div class="col-6">
                                                    <label> : {{ @$formData['pass_month'] }} {{ @$formData['pass_year'] }}
                                                    </label>
                                                </div>
                                            </div>


                                            <div class="paper-1">
                                                <div class="col-6">

                                                    <label>9. Phone No. </label>
                                                </div>

                                                <div class="col-6">
                                                    <label> : {{ @$formData['phone'] }}</label>
                                                </div>
                                            </div>


                                            <div class="paper-1">
                                                <div class="col-6">

                                                    <label>10. Account No. </label>
                                                </div>

                                                <div class="col-6">
                                                    <label> : {{ @$formData['account_number'] }}</label>
                                                </div>
                                            </div>


                                            <div class="paper-1">
                                                <div class="col-6">

                                                    <label>11. IFSC Code </label>
                                                </div>

                                                <div class="col-6">
                                                    <label> : {{ @$formData['ifsc_code'] }} </label>
                                                </div>
                                            </div>

                                            <div class="paper-1">
                                                <div class="col-6">

                                                    <label>12. Aadhar No</label>
                                                </div>

                                                <div class="col-6">
                                                    <label> : {{ @$formData['aadhar_number'] }} </label>
                                                </div>
                                            </div>

                                            <h2 style="text-align: center;">DECLARATION</h2>
                                            <h5 style="text-align: center;">The above given Details are true according to my
                                                best
                                                knowledge </h5>






                                            <div>
                                                <label>
                                                    {{ @$formData['name'] }}
                                                </label>
                                                <label style="float: right;">
                                                    @if ($formData['signature'])
                                                        <img src="{{ asset('applications/student_award/' . @$formData['signature']) }}"
                                                            style="width: 145px;height: 40px;" />
                                                    @endif
                                                    <br>
                                                    (Name and Signature)

                                                </label><br>

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

                                                            <label>District </label>
                                                        </div>

                                                        <div class="col-1">
                                                            <label> : </label>
                                                        </div>
                                                        <div class="col-8">
                                                            <label> {{ @$formData['submittedDistrict']['name'] }} </label>


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
                                                            <label> {{ @$formData['submittedTeo']['teo_name'] }} </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <br></br>

                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
                            <div class="pt-2 card overflow-hidden">
                            
                               <div class="card-body">
                         <ul class="timeline-3">
                            @if(@$formData->teo_status == 1)
                            <li class="ApproveTimeline">
                              <a href="#!">TEO</a>
                              <a href="#!" class="float-end"><i class="fa fa-eye"></i>  {{ @$formData['teo_view_date'] }}</a>
                             
                              <p class="inputText badge bg-success" style="font-size: 12px">Approved </p>
                              <p class="mt-2"><span class= "spanclr">TEO  :  </span>{{ @$formData->submittedTeo->teo_name }}</p>
                              <p class="mt-2"><span class= "spanclr">TEO Name : </span>{{ @$formData->teoUser->name }}</p>
                              <p class="mt-2"><span class= "spanclr">District :  </span>{{ @$formData->submittedDistrict->name }}</p>
                              <p  class="mt-2"><span class= "spanclr">TEO Approved Date :   </span>@if(@$formData['teo_status_date']!=null) {{ \Carbon\Carbon::parse(@$houseManagement['teo_status_date'])->format('d-m-Y h:i a') }}@endif</p>
                              <p  class="mt-2"><span class= "spanclr"> Approved Reason :   </span>{{ @$formData->teo_status_reason}}</p>
                            
                            </li>
                           
                            @elseif(@$formData->teo_status == 2)
                            <li class="rejectTimeline">
                               <a href="#!">TEO</a>
                              <a href="#!" class="float-end"><i class="fa fa-eye"></i>  {{ @$formData['teo_view_date'] }}</a>
                             
                                   <p class="inputText badge bg-danger" style="font-size: 12px">Rejected</p>
                                   <p class="mt-2"><span class= "spanclr">TEO  :  </span>{{ @$formData->submittedTeo->teo_name }}</p>
                                  <p class="mt-2"><span class= "spanclr">TEO Name : </span>{{ @$formData->teoUser->name }}</p>
                                  <p class="mt-2"><span class= "spanclr">District :  </span>{{ @$formData->submittedDistrict->name }}</p>
                                  <p  class="mt-2"><span class= "spanclr">TEO Rejected Date :   </span>@if(@$formData['teo_status_date']!=null) {{ \Carbon\Carbon::parse(@$houseManagement['teo_status_date'])->format('d-m-Y h:i a') }}@endif</p>
                                  <p  class="mt-2"><span class= "spanclr"> Rejected Reason :   </span>{{ @$formData->teo_status_reason}}</p>
                               </li>
                                  
                           @elseif(@$formData->teo_status == null)
                           <li class="pendingTimeline">
                            <a href="#!">TEO</a>
                              <a href="#!" class="float-end"><i class="fa fa-eye"></i>  {{ @$formData['teo_view_date'] }}</a>
                             
                            <p class="inputText badge bg-warning" style="font-size: 12px">Pending </p>
                            <p class="mt-2"><span class= "spanclr">TEO View Date :   </span> {{ @$formData['teo_view_date'] }}</p>
                            
                           
                        
                        </li>
                               
                        @endif
                        @if(@$formData->teo_status == 1)
                        @if( @$formData->pjct_offcr_status == 1)
                         
                        <li class="ApproveTimeline">
                         <a href="#!">Project Officer</a>
                         <a href="#!" class="float-end"><i class="fa fa-eye"></i>  {{ @$formData['pjct_offcr_view_date'] }}</a>
                                <p class="inputText badge bg-success" style="font-size: 12px">Approved</p>
                               
                                <p class="mt-2"><span class= "spanclr">Project Officer Name  : </span>{{ @$formData->prjUser->name }}</p>
                                  <p class="mt-2"><span class= "spanclr">District :  </span>{{ @$formData->district->name }}</p>
                                 <p class="mt-2"><span class= "spanclr"> Approved Date :   </span>@if(@$formData['pjct_offcr_status_date']!=null) {{ \Carbon\Carbon::parse(@$houseManagement['pjct_offcr_status_date'])->format('d-m-Y h:i a') }}@endif</p>
                               
                            </li>
                        @elseif( @$formData->tdo_status == 1)
                        <li class="ApproveTimeline">
                        <a href="#!">TDO</a>
                        <a href="#!" class="float-end"><i class="fa fa-eye"></i>  {{ @$formData['tdo_view_date'] }}</a>
                               <p class="inputText badge bg-success" style="font-size: 12px">Approved</p>
                          
                                <p class="mt-2"><span class= "spanclr">TDO Name  : </span>{{ @$formData->tdoUser->name }}</p>
                                <p class="mt-2"><span class= "spanclr">TEO  :  </span>{{ @$formData->teo->teo_name }}</p>
                                <p class="mt-2"><span class= "spanclr">District :  </span>{{ @$formData->district->name }}</p>
                                  <p class="mt-2"><span class= "spanclr"> Approved Date :   </span>@if(@$formData['tdo_status_date']!=null) {{ \Carbon\Carbon::parse(@$houseManagement['tdo_status_date'])->format('d-m-Y h:i a') }}@endif</p>
                               
                        </li>
                        @endif
                        @if( @$formData->tdo_status == 2 )
                         
                        <li class="rejectTimeline">
                         <a href="#!">TDO</a>
                        <a href="#!" class="float-end"><i class="fa fa-eye"></i>  {{ @$formData['tdo_view_date'] }}</a>
                       
                              
                               <p class="mt-2"><span class= "spanclr">TDO Name  : </span>{{ @$formData->tdoUser->name }}</p>
                               <p class="mt-2"><span class= "spanclr">TEO  :  </span>{{ @$formData->teo->teo_name }}</p>
                               <p class="mt-2"><span class= "spanclr">District :  </span>{{ @$formData->district->name }}</p>
                               <p class="mt-2"><span class= "spanclr"> Rejected Date :   </span>@if(@$formData['tdo_status_date']!=null) {{ \Carbon\Carbon::parse(@$houseManagement['tdo_status_date'])->format('d-m-Y h:i a') }}@endif</p>
                               <p class="mt-2"><span class= "spanclr"> Rejected Reason :   </span>{{ @$formData->tdo_status_reason}}</p>
                              
                        </li>
                        
                         
                         @elseif( @$formData->pjct_offcr_status == 2)
                        
                         <li class="rejectTimeline">
                            <a href="#!">TDO</a>
                           <a href="#!" class="float-end"><i class="fa fa-eye"></i>  {{ @$formData['pjct_offcr_view_date'] }}</a>
                          
                              
                                <p class="inputText badge bg-danger" style="font-size: 12px">Rejected</p>
                               
                                <p class="mt-2"><span class= "spanclr">Project Officer Name  : </span>{{ @$formData->prjUser->name }}</p>
                                <p class="mt-2"><span class= "spanclr">TEO  :  </span>{{ @$formData->teo->teo_name }}</p>
                                <p class="mt-2"><span class= "spanclr">District :  </span>{{ @$formData->district->name }}</p>
                                <p class="mt-2"><span class= "spanclr"> Rejected Date :   </span>@if(@$formData['pjct_offcr_status_date']!=null) {{ \Carbon\Carbon::parse(@$houseManagement['pjct_offcr_status_date'])->format('d-m-Y h:i a') }}@endif</p>
                                <p class="mt-2"><span class= "spanclr"> Rejected Reason :   </span>{{ @$formData->pjct_offcr_status_reason}}</p>
                               
                         </li>
                        @endif
                        @if(@$formData->tdo_status == null && @$formData->pjct_offcr_status == null)
                        <li class="pendingTimeline">
                         <a href="#!">PO / TDO</a>
                           <a href="#!" class="float-end"><i class="fa fa-eye"></i>
                            @if(@$formData->pjct_offcr_view_date != null)
                           PO :  {{ @$formData['pjct_offcr_view_date'] }}
                           @endif
                           @if(@$formData->tdo_view_date != null)
                           TDO :  {{ @$formData['teo_view_date'] }} 
                           @endif
                         </a>
                          
                            
                           
                         
                        </li>
                          @endif
                        
                          @endif 
                          
                
                          
                          </ul>
                         </div>
                      </div>
                   </div>



                    </div>
                </div>
            </div>
        </div>
        <link rel="stylesheet" href="{{ asset('css/timeline.css') }}">
        <script>
            // edit button function
            function goback() {
                if (confirm('Are you sure ? Do you want to edit this form!. ')) {
                    window.history.back();
                }
                return
            }

            function printDiv() {
                var printContents = document.getElementById('form_id').innerHTML;
                var originalContents = document.body.innerHTML;

                document.body.innerHTML = printContents;

                window.print();

                document.body.innerHTML = originalContents;
            }
        </script>
    @endsection
