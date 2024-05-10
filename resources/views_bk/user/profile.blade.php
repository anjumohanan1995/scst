@extends('layouts.app')

@section('content')
<style>
    .tab button.active {
        background-color: #fff; /* Active button background color */
        color: #fff; /* Active button text color */
    }
</style>

<!-- main-content -->
<div class="main-content app-content">
	<!-- container -->
	<div class="main-container container-fluid">
		<!-- breadcrumb -->
		<div class="breadcrumb-header justify-content-between row me-0 ms-0" >
			<div class="col-xl-3">
				<h4 class="content-title mb-2"> User Profile</h4>
				{{-- <nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item active" aria-current="page"><i class="side-menu__icon fe fe-box"> </i> - Dashboard
						</li>
					</ol>
				</nav> --}}
			</div>

            @if ($message = Session::get('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><i class="fa fa-window-close"></i></button>                                {{ $message }}
                </div>
            @endif
		</div>
		<!-- /breadcrumb -->

	</div>
	<div class="main-content-body">
        <div class="row row-sm mt-4">
        <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12 ">
        
                        <div class="card">
                            <div class="card-body">
                                <div class="tab">
                                    <button class="btn btn-primary tablinks" onclick="userProfile(event, 'UserDetails')">User Details</button>
                                    <button class="btn btn-primary tablinks" onclick="userProfile(event, 'BankDetails')">Bank Details</button>
                                   
                                </div>
                                  
                                  
                                  <div id="UserDetails" class="pt-4 tabcontent">
                                   <table id="example" class="" style="width:100%">
                                    
                                                                <tr>
                        
                        
                                                                    <td><label class="form-control">Name: <b>{{ @$formData['name'] }} </b>
                                                                        </label></td>
                                                                    <td><label class="form-control">Date of Birth: <b>{{ @$formData['dob'] }} </b>
                                                                    </td>
                                                                </tr>
                                                                
                                                                <tr>
                                                                    <td><label class="form-control">Gender: <b>{{ @$formData['gender'] }} </b>
                                                                    </td>
                                                                    <td><label class="form-control">Mobile Number: <b>{{ @$formData['mobile'] }}</b>
                                                                        </label></td>
                                                                </tr>
                        
                                                                <tr>
                                                                    <td><label class="form-control">Father's Name: <b>{{ @$formData['father_name'] }} </b>
                                                                    </td>
                                                                    <td><label class="form-control">Mother's Name: <b>{{ @$formData['mother_name'] }}</b>
                                                                        </label></td>
                                                                </tr>
                        
                                                                <tr>
                                                                    <td><label class="form-control">Caste: <b>{{ @$formData['caste'] }} </b>
                                                                    </td>
                                                                    <td><label class="form-control">Aadhar Number: <b>{{ @$formData['aadhar_number'] }}</b>
                                                                        </label></td>
                                                                </tr>
                        
                                                                <tr>
                                                                    <td><label class="form-control">Id Proof: <b>{{ @$formData['id_proof'] }} </b>
                                                                    </td>
                                                                    <td><label class="form-control">Id Proof Details: <b>{{ @$formData['id_proof_details'] }}</b>
                                                                        </label></td>
                                                                </tr>
                        
                                                                <tr>
                                                                    <td><label class="form-control">Email: <b>{{ @$formData['email'] }} </b>
                                                                    </td>
                                                                   
                                                                </tr>
                                                                 <tr>
                                                                 </tr>
                                    </table>
                                </div>
                                <div id="BankDetails" class="pt-4 tabcontent" style="display: none">
                                    <table id="example" class="" style="width:100%">
                                    
                                        <tr>


                                            <td><label class="form-control">Bank Name: <b>{{ @$formData['bank_name'] }} </b>
                                                </label></td>
                                            <td><label class="form-control">Account Number: <b>{{ @$formData['account_no'] }} </b>
                                            </td>
                                        </tr>
                                        
                                        <tr>
                                            <td><label class="form-control">IFSC Code: <b>{{ @$formData['ifsc_code'] }} </b>
                                            </td>
                                            <td><label class="form-control">Passbook: <a href="{{ asset('user/'. @$formData['passbook'] ) }}" target="_blank"> View</a>
                                                </label></td>
                                        </tr>

                     
                                         <tr>
                                         </tr>
            </table>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>

        
     
	</div>
</div>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>

<script>

function userProfile(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
    tablinks[i].style.backgroundColor = "";
            tablinks[i].style.color = "";
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
  evt.currentTarget.style.backgroundColor = "#007bff"; // Active button background color
        evt.currentTarget.style.color = "#fff";
}
	$(document).ready(function() {
     	$('#example').DataTable();
       
       
    
	});
  </script>

<!-- main-content-body -->
@endsection
