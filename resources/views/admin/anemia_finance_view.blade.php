@extends('layouts.app')
@section('content')
<style>

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }
    
    th, td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }
    
    th {
        background-color: #f2f2f2;
    }
    
    
    </style>
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
            <div class="row row-sm w-100">
                <div class="col-sm-12 col-md-12 col-lg-8">
                    <div class="card overflow-hidden" style="width: 113%;">
                        <div class="card-body pd-y-7">
                            <h4 class="medical__form--h1 text-center m-3">
                                <b>പട്ടികവർഗ്ഗ വികസന വകുപ്പ്<br>
                                    സിക്കിൾസെൽ അനീമിയരോഗികൾക്ക് പ്രതിമാസ ധനസഹായം
                                </b>
                            </h4>
                            <div class="m-5">
                                <h6 class="text-center"><u>അപേക്ഷ ഫോറം</u></h6>
                            </div>
                            <form action="#" method="post">
                                <table>
                                    <thead>

                                    </thead>
                                    <tbody>
                                        <tr>

                                            <td>പേര്
                                                <br>

                                            </td>
                                            <td>{{ @$formData['name'] }}</td>
                                        </tr>
                                        <tr>

                                            <td>ജനന തീയതി


                                            </td>
                                            <td>{{ @$formData['dob'] }}</td>
                                        </tr>
                                        <tr>

                                            <td>വയസ്സ്

                                            </td>
                                            <td>{{ @$formData['age'] }}</td>
                                        </tr>
                                        <tr>

                                            <td>ജാതി<br> (സർട്ടിഫിക്കറ്റ് ഹാജരാക്കണം )

                                            </td>
                                            <td>{{ @$formData['caste'] }} <br>
                                                @if($formData['caste_certificate'])
                                                <a href="{{ asset('applications/anemia_finance/' . @$formData['caste_certificate']) }}" target="_blank">View</a>
                                              
                                           @endif
                                            </td>
                                        </tr>
                                        <tr>

                                            <td>മേൽവിലാസം

                                            </td>
                                            <td> {{ @$formData['address'] }} 
                                                <br>
                                                @if (@$formData['districtRelation']['name'])
                                                    {{ @$formData['districtRelation']['name'] }}
                                                @endif
                                                @if (@$formData['talukName']['taluk_name'])
                                                    ,{{ @$formData['talukName']['taluk_name'] }}
                                                @endif
                                                @if (@$formData['pincode'])
                                                    ,{{ @$formData['pincode'] }}
                                                @endif

                                            </td>
                                        </tr>
                                        <tr>

                                            <td>ആധാർ നമ്പർ <br>
                                                (പകർപ്പ് ഹാജരാക്കണം )


                                            </td>
                                            <td>{{ @$formData['adhaar_number'] }} <br>
                                                @if($formData['adhaar_copy'])
                                                <a href="{{ asset('applications/anemia_finance/' . @$formData['adhaar_copy']) }}" target="_blank">View</a>
                                              @endif
                                            </td>
                                        </tr>
                                        <tr>

                                            <td>ബാങ്ക് അക്കൗണ്ട് വിശദംശങ്ങൾ<br>
                                                (പാസ്സ് ബുക്കിന്റെ പകർപ്പ് ഹാജരാക്കണം )

                                            </td>
                                            <td>{{ @$formData['bank_account_details'] }} <br>
                                                @if($formData['passbook_copy'])
                                                <a href="{{ asset('applications/anemia_finance/' . @$formData['passbook_copy']) }}" target="_blank">View</a>
                                           @endif
                                            </td>
                                        </tr>
                                        <tr>

                                            <td>ഫോൺ നമ്പർ


                                            </td>
                                            <td> {{ @$formData['phone'] }}</td>
                                        </tr>
                                        <tr>

                                            <td>റേഷൻ കാർഡ്
                                                (പകർപ്പ് ഹാജരാക്കണം )


                                            </td>
                                            <td>{{ @$formData['ration_card_type'] }} <br>
                                                @if($formData['ration_card'])
                                                <a href="{{ asset('applications/anemia_finance/' . @$formData['ration_card']) }}" target="_blank">View</a>
                                           @endif
                                            </td>
                                        </tr>
                                        <tr>

                                            <td>മെഡിക്കൽ സർട്ടിഫിക്കറ്റ് ഹാജരാക്കിയിട്ടുണ്ടോ<br>
                                                (മെഡിക്കൽ സർട്ടിഫിക്കറ്റ് ഹാജരാക്കണം )


                                            </td>
                                            <td>{{ @$formData['is_medical_certificate_submitted'] }} <br>
                                                @if($formData['medical_certificate'])
                                                <a href="{{ asset('applications/anemia_finance/' . @$formData['medical_certificate']) }}" target="_blank">View</a>
                                           @endif
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>


                                <div class="m-5">
                                    <h6 class="text-center"><u>സത്യപ്രസ്താവന </u>
                                    </h6>
                                </div>
                                <div class="m-5 ">
                                    <p class="text-center">മേൽ പ്രസ്താവിച്ച വിവരങ്ങൾ പൂർണമായും സത്യമാണെന്ന്
                                        ബോധിപ്പിക്കുന്നു

                                    </p>
                                </div>
                                <div class="d-flex row">
                                    <div class="col-4">

                                        <label>സ്ഥലം: {{ @$formData['place'] }} </label><br>

                                    </div>
                                    <div  class="col-4">
                                    </div>
                                    <div  class="col-4">

                                        <div>
                                            <label> പേര്: {{ @$formData['name'] }} 
                                            </label>
                                        </div>

                                    </div>

                                </div>
                                <div class="d-flex row">
                                    <div class="col-4">

                                        <label>തീയതി : {{ @date('d-m-Y') }}</label><br>

                                    </div>
                                    <div  class="col-4">
                                    <label>  ഫോട്ടോ
                                                :   
                                                @if($formData['applicant_photo'])
                                                <img src="{{ asset('applications/anemia_finance/' . @$formData['applicant_photo']) }}" width="120px" height="60px">
                                           @endif
                                            </label>
                                    </div>
                                    <div class="col-4">

                                            <label> ഒപ്പ്
                                                :   
                                                @if($formData['signature'])
                                                <img src="{{ asset('applications/anemia_finance/' . @$formData['signature']) }}" width="120px" height="60px">
                                           @endif
                                            </label>
                                    </div>

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
        
                                                <label>ജില്ല </label>
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
        <br><br>
                         

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