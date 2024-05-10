@extends('layouts.app')

@section('content')
<!-- main-content -->
<div class="main-content app-content">
	<!-- container -->
	<div class="main-container container-fluid">
		<!-- breadcrumb -->
		<div class="breadcrumb-header justify-content-between row me-0 ms-0 mb-3" >
			<div class="col-xl-3">
				<h4 class="content-title mb-2"> Add Permission  </h4>
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item active" aria-current="page"><i class="side-menu__icon fe fe-box"> </i> - Add Permission</li>
					</ol>
				</nav>
			</div>
		</div>
		<!-- /breadcrumb -->
		<!-- main-content-body -->
		<div class="main-content-body">

			<!-- row -->

			<!-- /row -->
			<!-- row -->
			<div class="row row-sm">
				<div class="col-lg-8 col-xl-8 col-md-12 col-sm-12 ">
					<div class="card">

							<div class="card-body">
								<div id="success_message" class="ajax_response" style="display: none;"></div>
								<div class="mb-4 main-content-label">Add Permission</div>
								<form name="createForm" id="createForm" method="post" action="javascript:void(0)">
									@csrf
									<input type="hidden" name="user_id" value="{{ \Auth::user()->id}}">
									<div class="mb-4 main-content-label">Permission</div>
									<div class="form-group">
										<div class="row">
											<div class="col-md-3"><label class="form-label">Select Permissions</label></div>
											<div class="col-md-9">


                                                    @foreach($totalRecord as $permission)
                                                    <div class="topic" >
                                                    <input type="checkbox" name="permission[]" id="{{$permission->id}}" value="{{$permission->slug}}" @if($checked !=null) @if(!empty($checked->permission)){{ (in_array($permission->slug, $checked->permission )) ? 'checked' : '' }} @endif  @endif /> <label for="permission">{{$permission->name}}</label><br>
                                                </div>
                                                    {{--  @if(!empty($permission->sub_permission))
                                               <div class="subtopic" data-parentid="{{$permission->id}}">
                                                  <ul class="inputs-list">
                                                     <li style=" list-style-type: none">
                                                        @foreach(json_decode($permission->sub_permission) as $detail )
                                                        &nbsp; &nbsp;  &nbsp;  &nbsp;
                                                         <input type="checkbox" name="sub_permission[]" id="sub_permission{{$permission->id}}" value="{{$detail}}" @if($checked !=null) @if(!empty($checked->sub_permissions)){{ (in_array($detail, json_decode($checked->sub_permissions) )) ? 'checked' : '' }} @endif @endif/> <label for="permission">{{$detail}}</label><br>
                                                     </li>
                                               @endforeach
                                                        </ul>
                                                    </div>
                                                    @endif  --}}
                                               @endforeach




												@error('permission')
													<span class="text-danger">{{$message}}</span>
												@enderror
											</div>
										</div>
									</div>
									<div class="card-footer">
										<button type="submit" id="submit" class="btn btn-primary waves-effect waves-light">Save</button>
										<!-- <button type="submit"  class="btn btn-primary waves-effect waves-light">Add</button> -->
									</div>
								</form>
							</div>

						</div>

				</div>



			</div>
			<!-- /row -->
			<!-- row -->

			<!-- /row -->
			<!-- row -->
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /main-content -->
					<!-- /main-content -->
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
<script>
    $(".topic input[type='checkbox']").each(function(){
        if ($(this).prop('checked')==false){
            $('div[data-parentid="' + $(this).attr('id') + '"]').toggle();

        }
    });
     $('.topic [type="checkbox"]').change(function() {
            var shouldBeDisplayed = $(this).prop('checked');
           var id=$(this).attr('id') + '';
           var checkid = $('#sub_permission'+id);
           $(".subtopic input[type='checkbox']").each(function(){
            var ids=$(this).attr('id') + '';
          //  alert('sub_permission'+id);
            if( 'sub_permission'+ids === 'sub_permission'+id){
                $('#'.ids).prop('checked',false);
                //alert(ids);
            }

        });
           checkid.prop("checked", false);
            //$('div[data-parentid="' + $(this).attr('id') + '"]').prop('checked',false);
            $('div[data-parentid="' + $(this).attr('id') + '"]').toggle(shouldBeDisplayed);


         });
  $(document).ready(function () {

     $(".topic input[type='checkbox']").click(function(){
        var shouldBeDisplayed = $(this).prop('checked');
        $('div[data-parentid="' + $(this).attr('id') + '"]').toggle(shouldBeDisplayed);

    });
      });
if ($("#createForm").length > 0) {
$("#createForm").validate({
	rules: {
		name: {
		required: true,

		},

	},
	messages: {
		name: {
		required: "Please enter Role",

		},





	},
    submitHandler: function(form) {
	$.ajaxSetup({
		headers: {
		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});
	var id  = "{{$role_name}}";

	$('#submit').html('Please Wait...');
	$("#submit"). attr("disabled", true);
		$.ajax({
			url: '{{ url("roles/addPermission") }}'+'/'+id,
			type: "POST",
			data: $('#createForm').serialize(),
			success: function( response ) {
				//console.log(response.success);

				$('#submit').html('Submit');
				$("#submit"). attr("disabled", false);
				$('#success_message').fadeIn().html(response.success);
				setTimeout(function() {
					$('#success_message').fadeOut("slow");
				}, 2000 );
                location.reload();
				//alert('Data submitted successfully');
				document.getElementById("createForm").reset();
			}
		});
}
})
}
</script>

@endsection

