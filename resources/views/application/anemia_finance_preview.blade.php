@extends('layouts.app')
@section('content')

<!-- main-content -->
<div class="main-content app-content">
	<!-- container -->
	<div class="main-container container-fluid">
		<!-- breadcrumb -->
		<div class="breadcrumb-header justify-content-between row me-0 ms-0" >
			<div class="col-xl-9">
				<h4 class="content-title mb-2">സിക്കിൾസെൽ അനീമിയരോഗികൾക്ക് പ്രതിമാസ ധനസഹായം നൽകുന്ന പദ്ധതി</h4>
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
				<div class="col-lg-12 col-xl-12 col-md-12 col-sm-12 ">
					<div class="card">
						<div class="card-body">
							    <div id="success_message" class="ajax_response" style="display: none;"></div>
								<div class="mb-4 main-content-label">
                                 Application Preview
                                    </div>
								
                                   
          <table border="1" class="table">
            <tr> <td >
 
                 പേര് </td><td><strong> {{ @$formData['name'] }} </strong></td>
             <td colspan="">
 
                ജനനതീയതി </td><td> <strong> {{ @$formData['dob'] }}</strong> 
 
            </td>
            <td colspan="">
 
                വയസ്  </td><td> {{ @$formData['age'] }}
 
                </td>
            </tr><tr> 
                <td colspan="">
 
                    ഫോൺ നമ്പർ  </td><td> {{ @$formData['phone'] }}
     
                    </td>
                    <td colspan="">
                        മേൽവിലാസം
                    </td>
                    <td> 
                        {{ @$formData['address'] }} 
                    </td>
                     </tr>
                   
                <tr>
                   
                    <td colspan="">
                        ജില്ല  </td><td> {{ @$formData['district_name'] }}
                    </td>
            
                     
                <td colspan="">
                    താലൂക്ക്
                    </td>
                    <td> 
                        {{ @$formData['taluk_name'] }} 
                    </td>
                    <td>
                        പിൻകോഡ്
                        </td>
                        <td> 
                            {{ @$formData['pincode'] }} 
                        </td>
               
             </tr>
             <tr>
                     
                <td colspan="2">

                    ജാതി   </td><td> {{ @$formData['caste'] }}  </td>
              <td>

                ജാതി സർട്ടിഫിക്കറ്റ്  </td>
                 <td colspan="2">
                    @if($formData['caste_certificate'])
                    <iframe src="{{ asset('applications/anemia_finance/' . @$formData['caste_certificate']) }}" width="400" height="200"></iframe>
               @endif
                </td>
              
             </tr>
             <tr>
                     
                <td colspan="2">

                    ആധാർ നമ്പർ   </td><td> {{ @$formData['adhaar_number'] }}  </td>
              <td>

                ആധാർ പകർപ്പ്   </td>
                 <td colspan="2">
                    @if($formData['adhaar_copy'])
                    <iframe src="{{ asset('applications/anemia_finance/' . @$formData['adhaar_copy']) }}" width="400" height="200"></iframe>
               @endif
                </td>
              
             </tr>
             <tr>
                     
                <td colspan="2">

                    ബാങ്ക് അക്കൗണ്ട് വിശദംശങ്ങൾ   </td><td> {{ @$formData['bank_account_details'] }}  </td>
              <td>

                ബാങ്ക് അക്കൗണ്ട് പാസ്സ് ബുക്കിന്റെ പകർപ്പ്  </td>
                 <td colspan="2">
                    @if($formData['passbook_copy'])
                    <iframe src="{{ asset('applications/anemia_finance/' . @$formData['passbook_copy']) }}" width="400" height="200"></iframe>
               @endif
                </td>
              
             </tr>
             <tr>
                     
                <td colspan="2">

                    റേഷൻ കാർഡ്   </td><td> {{ @$formData['ration_card_type'] }}  </td>
              <td>

                റേഷൻ  കാർഡ് പകർപ്പ്  </td>
                 <td colspan="2">
                    @if($formData['ration_card'])
                    <iframe src="{{ asset('applications/anemia_finance/' . @$formData['ration_card']) }}" width="400" height="200"></iframe>
               @endif
                </td>
              
             </tr>
             <tr>
                     
                <td colspan="2">

                    മെഡിക്കൽ സർട്ടിഫിക്കറ്റ് ഹാജരാക്കിയിട്ടുണ്ടോ?   </td><td> {{ @$formData['is_medical_certificate_submitted'] }}  </td>
              <td>

                മെഡിക്കൽ സർട്ടിഫിക്കറ്റ്   </td>
                 <td colspan="2">
                    @if($formData['medical_certificate'])
                    <iframe src="{{ asset('applications/anemia_finance/' . @$formData['medical_certificate']) }}" width="400" height="200"></iframe>
               @endif
                </td>
              
             </tr>
           
               
           </table>
           <h3 style="text-align: center;"><u>സത്യപ്രസ്താവന</u></h3>
            <p style="text-align: center;">മേൽ പ്രസ്താവിച്ച വിവരങ്ങൾ പൂർണമായും സത്യമാണെന്ന് ബോധിപ്പിക്കുന്നു</p>
            <div>
                <p style="">സ്ഥലം   &nbsp; &nbsp; <b>{{ @$formData['place'] }}</b></p> <p style="float: right;">പേര്  &nbsp; &nbsp; <b>{{ @$formData['name'] }}</b></p>
            </div>
            <div>
                <p style="">തീയതി &nbsp; &nbsp; <b>{{ @date('d-m-Y') }}</p> 
                    <p style="float: right;"> 
                         @if($formData['signature'])
                    <img src="{{ asset('applications/anemia_finance/' . @$formData['signature']) }}" style="width: 145px;height: 100px;" />
               @endif</p>
               <br>
            </div>
            <br>  <br>  <br>
         
                                
                                <form action="{{ url('anemiaFinanceStore') }}" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
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
                                
                                <br>

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
        if (confirm('Are you sure ? Do you want to edit this form!. ')) {
            window.history.back();
        }
        return
    }
</script>
@endsection