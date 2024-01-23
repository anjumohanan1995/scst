<!DOCTYPE html>
<html>
	<head>

		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="Description" content="SC/ST" />
		<meta name="Author" content="" />
		<!-- Title -->
		<title>SC/ST</title>
		<!--- Favicon --->
		<link rel="icon" href="img//favicon.png" type="image/x-icon" />
		<!-- Bootstrap css -->
		<link href="{{ asset('css/bootstrap.css')}}" rel="stylesheet" id="style" />
		<!--- Style css --->
		<link href="{{ asset('css/style.css') }}" rel="stylesheet" />
		<link href="{{ asset('css/plugins.css') }}" rel="stylesheet" />
		<!--- Icons css --->
		<link href="{{ asset('css/icons.css') }}" rel="stylesheet" />
		<!--- Animations css --->
		<link href="{{ asset('css/animate.css') }}" rel="stylesheet" />
		<!-- Switcher css -->
		<link href="{{ asset('css/switcher.css') }}" rel="stylesheet" />
		<link href="{{ asset('css/demo.css') }}" rel="stylesheet" />

		<meta http-equiv="imagetoolbar" content="no" />


        @php
        $domains = ['opportal.sha.kerala.gov.in', '61.0.248.21', '10.5.69.181', '127.0.0.1'];
        if ( ! in_array($_SERVER['SERVER_NAME'], $domains)) {
            header($_SERVER['SERVER_PROTOCOL'] . ' 400 Bad Request');
            exit;
        }
		/*$host = request()->getHost();
		if($host != 'opportal.sha.kerala.gov.in' && $host != '61.0.248.21' && $host != '10.5.69.181' && $host != '127.0.0.1'){
			return false;exit();
		}
        */
		@endphp

	</head>
 <body class="main-body ">
    <!-- Loader -->

    <!-- /Loader -->
    <!-- Start Switcher -->

    <!-- End Switcher -->
    <!-- page -->
   <div class="page">
     	<!-- main-signin-wrapper -->

     	 @yield('content')

   </div>
    <!-- page closed -->
    <!--- Back-to-top --->

</body>
</html>
