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
                        ജില്ല  </td><td> {{ @$formData['districtRelation']['name'] }}
                    </td>
            
                     
                <td colspan="">
                    താലൂക്ക്
                    </td>
                    <td> 
                        {{ @$formData['talukName']['taluk_name'] }} 
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
        if (confirm('Are you sure ? Do you want to edit this form!. ')) {
            window.history.back();
        }
        return
    }
</script>
@endsection