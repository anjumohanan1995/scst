@extends('layouts.app')

@section('content')
<!-- main-content -->
<div class="main-content app-content">
	<!-- container -->
	<div class="main-container container-fluid">
		<!-- breadcrumb -->
		<div class="breadcrumb-header justify-content-between row me-0 ms-0" >
			
				

            @if ($message = Session::get('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><i class="fa fa-window-close"></i></button>                                {{ $message }}
                </div>
            @endif
		</div>
		<!-- /breadcrumb -->

<div class="main-content-body">
    <div class="row row-sm w-100">
        <div class="col-sm-12 col-md-12 col-lg-8">



            <div class="card overflow-hidden" style="width: 113%;">

                <div class="card-body pd-y-7">
                   
                    <div class="card-body pd-y-7">

                        <h1
                            style="text-align: center;color: rgb(0, 0, 0);font-size: medium; text-decoration: underline; padding: 20px;line-height: 32px;font-weight: 600;">
                            ജനനി-ജനനി -ജന്മരക്ഷ <br> പ്രസവാനുകുല്യം - മാതൃശിശു സംരക്ഷണ പദ്ധതി <br> അപേക്ഷഫോറം
    
                        </h1>
                        <form action="#" method="post" style="font-weight: 500;font-size: 12px;padding: 90px;">
    
                            <div class=" row paper-1">
                                <div class="col-5">
    
                                    <label>1. പേര് </label>
                                </div>
    
                                <div class="col-1">
                                    <label> : </label>
                                </div>
                                <div class="col-6">
                                    <label> {{ @$formData['name'] }} </label>
                                </div>
                            </div>
                            <div class=" row paper-1">
                                <div class="col-5">
    
                                    <label>1. മേൽവിലാസം (പിൻകോഡ് സഹിതം) </label>
                                </div>
    
                                <div class="col-1">
                                    <label> : </label>
                                </div>
                                <div class="col-6">
                                    <label> {{ @$formData['address'] }} </label>
                                </div>
                            </div>
                            <div class=" row paper-1">
                                <div class="col-5">
    
                                    <label> ജില്ല </label>
                                </div>
    
                                <div class="col-1">
                                    <label> : </label>
                                </div>
                                <div class="col-6">
                                    <label> {{ @$formData['districtRelation']['name'] }} </label>
                                </div>
                            </div>
                            <div class=" row paper-1">
                                <div class="col-5">
    
                                    <label> താലൂക്ക് </label>
                                </div>
    
                                <div class="col-1">
                                    <label> : </label>
                                </div>
                                <div class="col-6">
                                    <label> {{ @$formData['TalukName']['taluk_name'] }} </label>
                                </div>
                            </div>
                            <div class=" row paper-1">
                                <div class="col-5">
    
                                    <label> പിൻകോഡ് </label>
                                </div>
    
                                <div class="col-1">
                                    <label> : </label>
                                </div>
                                <div class="col-6">
                                    <label> {{ @$formData['pincode'] }} </label>
                                </div>
                            </div>
    
                            <div class=" row paper-1">
                                <div class="col-5">
    
                                    <label>3.വയസ്, ജനനതീയതി</label>
                                </div>
    
                                <div class="col-1">
                                    <label> : </label>
                                </div>
                                <div class="col-6">
                                    <label> {{ @$formData['age'] }} , {{ @$formData['dob'] }} </label>
                                </div>
                            </div>
                            <div class=" row paper-1">
                                <div class="col-5">
    
                                    <label>4. .ഭർത്താവിന്റെ പേര് </label>
                                </div>
    
                                <div class="col-1">
                                    <label> : </label>
                                </div>
                                <div class="col-6">
                                    <label> {{ @$formData['hus_name'] }} </label>
                                </div>
                            </div>
                            <div class=" row paper-1">
                                <div class="col-5">
    
                                    <label>5. സമുദായം / ജാതി</label>
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
    
                                    <label>6.വില്ലേജ് </label>
                                </div>
    
                                <div class="col-1">
                                    <label> : </label>
                                </div>
                                <div class="col-6">
                                    <label> {{ @$formData['village'] }} </label>
                                </div>
                            </div>
                            <div class=" row paper-1">
                                <div class="col-5">
    
                                    <label>7.എത്രാമത്തെ പ്രസവം </label>
                                </div>
    
                                <div class="col-1">
                                    <label> : </label>
                                </div>
                                <div class="col-6">
                                    <label> {{ @$formData['births'] }} </label>
                                </div>
                            </div>
                            <div class=" row paper-1">
                                <div class="col-5">
    
                                    <label>8.പ്രസവം നടക്കുമെന്ന് പ്രതീക്ഷിക്കുന്ന തിയതി </label>
                                </div>
    
                                <div class="col-1">
                                    <label> : </label>
                                </div>
                                <div class="col-6">
                                    <label> {{ @$formData['expected_date_of_delivery'] }} </label>
                                </div>
                            </div>
                            <div class=" row paper-1">
                                <div class="col-5">
    
                                    <label>9. ഗർഭ /പ്രസവ ശുശ്രുഷക്ക് ആശ്രയിക്കുന്ന ആശുപത്രി /കുടുംബക്ഷേമ
                                        കേന്ദ്രം </label>
                                </div>
    
                                <div class="col-1">
                                    <label> : </label>
                                </div>
                                <div class="col-6">
                                    <label> {{ @$formData['dependent_hospital'] }} </label>
                                </div>
                            </div>
    
                            <div class="row mt-5">
                                <div class="row d-flex flex-direction-row col-6">
                                    <div class="row col-12">
                                        <div class="col-3">
    
                                            <label>സ്ഥലം </label>
                                        </div>
    
                                        <div class="col-1">
                                            <label> : </label>
                                        </div>
                                        <div class="col-2">
                                            <label> {{ @$formData['place'] }} </label>
                                        </div>
                                    </div>
    
                                    <div class="row col-12">
                                        <div class="col-3">
    
                                            <label>തീയതി </label>
                                        </div>
    
                                        <div class="col-1">
                                            <label> : </label>
                                        </div>
                                        <div class="col-2">
                                            <label> {{ date('d-m-Y') }} </label>
                                        </div>
                                    </div>
    
                
                                </div>
    
                                <div class="col-6 d-flex">
                                    <div class="row d-flex col-12" >
                                        <div class="col-8">
                                            <img src="{{ url('/') }}/applications/{{ $formData['signature'] }}" alt="Preview" width="500" height="40">
                                            <label>അപേക്ഷകന്റെ ഒപ്പ്</label>
                                        </div>
    
                                    </div>
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
                                <div class="row d-flex flex-direction-row col-6">
                                    <div class="row col-12">
                                        <div class="col-3">
    
                                            <label>ജില്ല </label>
                                        </div>
    
                                        <div class="col-1">
                                            <label> : </label>
                                        </div>
                                        <div class="col-2">
                                            <label> {{ @$formData['submittedDistrict']['name'] }} </label>
                                        </div>
                                    </div>
    
                
                                </div>
    
                                <div class="col-6 d-flex">
                                    <div class="row d-flex col-12">
                                        <div class="col-6">
    
                                            <label>TEO</label>
                                        </div>
    
                                        <div class="col-1">
                                            <label> : </label>
                                        </div>
                                        <div class="col-4">
                                            <label> {{ @$formData['submittedTeo']['teo_name'] }} </label>
                                        </div>
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


	$(document).ready(function() {
     	$('#example').DataTable();
	});
  </script>
<!-- main-content-body -->
@endsection
