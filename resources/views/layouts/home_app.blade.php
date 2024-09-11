
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>STDD | Scheduled Tribes Development Department</title>
    <link rel="icon" type="image/png" href="{{ asset('images_new/favicon.png')}}">
    <link rel="stylesheet" href="{{ asset('css_new/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css_new/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css_new/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css_new/aos.css')}}">
    <link rel="stylesheet" href="{{ asset('css_new/swiper.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css_new/jquery.fancybox.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css_new/style.css')}}">
</head>

<body>
    <!-- Start Header -->
    <header>
        <div class="header_top_area my-1">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="header_top d-flex justify-content-between">
                            <div class="site_logo">
                                <a href="index.html"><img src="{{ asset('images_new/logo.png')}}" alt="logo" class="img-fluid"></a>
                            </div>
                            <div class="site_info d-flex justify-content-between">
                                <div class="single_info">
                                <img src="{{ asset('images_new/unnathi.png')}}" width="150" height="" alt=""/> </div>
                                <div class="single_info">
                                    <img src="{{ asset('images_new/phone.png')}}" alt="Location" class="img-fluid">
                                    <div class="info_data">
                                        <h6>ടോൾ ഫ്രീ നമ്പർ</h6>
                                        <p class="text-danger"><strong>+1800 425 2312</strong></p>
                                    </div>
                                </div>
                                <div class="single_info">
                                    {{-- <button class="special-button" onclick="window.location.href = 'apply_form.html';">അപേക്ഷിക്കുക <i class="fa fa-angle-right"></i> <span class="button_icon"><i class="far fa-file-alt"></i></span></button> --}}
                                    <button class="special-button" ><a href="{{ url('/login') }}">അപേക്ഷിക്കുക <i class="fa fa-angle-right"></i> <span class="button_icon"><i class="far fa-file-alt"></i></span></a></button>

                                
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="main-menu-area bg_dark_mobile">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 p-0">
                        <div class="main-menu default_bg">
                            <nav class="navbar navbar-expand-lg">
                                <div class="mobile_site_logo d-none">
                                    <a href="index.html"><img src="{{ asset('images_new/footer_logo.png')}}" alt="logo" class="img-fluid"></a>
                                </div>
                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                                    <i class="fa fa-bars"></i>
                                </button>
                                <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                                     <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                                        <li class="nav-item dropdown">
                                            <a class="nav-link" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                ഹോം
                                        </a>
                                            
                                        </li>
                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                ചെറു വിവരണം
                                        </a>
                                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                                <a class="dropdown-item" href="index.html">ചരിത്രം</a>
                                                <a class="dropdown-item" href="index-2.html">വീക്ഷണം</a>
                                                <a class="dropdown-item" href="index-3.html"> ഭരണസംവിധാനം</a>
                                                
                                            </div>
                                        </li>
										<li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                ഗോത്ര വര്‍ഗ്ഗം
                                        </a>
                                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                                <a class="dropdown-item" href="index.html"> ഗോത്രവര്‍ഗ്ഗ സമുദായങ്ങള്‍</a>
                                                <a class="dropdown-item" href="index-2.html"> 2011 ലെ പട്ടിക വര്‍ഗ്ഗ ജനസംഖ്യ</a>
                                                <a class="dropdown-item" href="index-3.html"> സാമൂഹ്യസാമ്പത്തിക സര്‍വ്വേ വിവരങ്ങള്‍  </a>
                                                
                                            </div>
                                        </li>
										 
                                        
                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown">
                                                സ്ഥാപനങ്ങള്‍
                                            </a>
                                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                
                                                <li class="nav-item dropdown">
                                                    <a class="dropdown-item dropdown-toggle" href="#" id="blogDropdown1" role="button" data-toggle="dropdown">
                                                        സ്‌കൂളുകള്‍
                                                    </a>
                                                    <ul class="dropdown-menu" aria-labelledby="blogDropdown1">
                                                        <li><a class="dropdown-item" href="blog_01.html">ബാലവാടി/വികാസ്‌വാടി </a></li>
                                                        <li><a class="dropdown-item" href="blog_02.html"> ബാലവിജ്ഞാനകേന്ദ്രം</a></li>
														<li><a class="dropdown-item" href="blog_02.html">മോഡല്‍ റസിഡന്‍ഷ്യല്‍ സ്‌കൂളുകള്‍  </a></li>
														<li><a class="dropdown-item" href="blog_02.html">ഏകാദ്ധ്യാപക സ്‌കൂളുകള്‍  </a></li>
														<li><a class="dropdown-item" href="blog_02.html"> നഴ്‌സറി സ്‌കൂളുകള്‍  </a></li>
														<li><a class="dropdown-item" href="blog_02.html">കിന്റര്‍ ഗാര്‍ട്ടന്‍  </a></li>
														<li><a class="dropdown-item" href="blog_02.html"> പെരിപ്പറ്ററ്റിക് സെന്റര്‍  </a></li>
														 
														
                                                    </ul>
                                                </li>
                                                <li><a class="dropdown-item" href="blog_details.html">ഹോസ്റ്റലുകള്‍</a></li>
                                                <li class="nav-item dropdown">
													<a class="dropdown-item dropdown-toggle" href="#" id="blogDropdown1" role="button" data-toggle="dropdown"> ആശുപത്രികള്‍ &amp; ഡിസ്പന്‍സറികള്‍</a>
												<ul class="dropdown-menu" aria-labelledby="blogDropdown1">
                                                        <li><a class="dropdown-item" href="blog_01.html"> ആയൂര്‍വേദ ഡിസ്‌പെന്‍സറികള്‍</a></li>
                                                        <li><a class="dropdown-item" href="blog_02.html">ആയൂര്‍വേദ ആശുപത്രി</a></li>
														<li><a class="dropdown-item" href="blog_02.html">എ.എന്‍.എം. സെന്റര്‍   </a></li>
														<li><a class="dropdown-item" href="blog_02.html"> ഒ.പി. ക്ലിനിക്കുകള്‍    </a></li>
														<li><a class="dropdown-item" href="blog_02.html"> മൊബൈല്‍ മെഡിക്കല്‍ യൂണിറ്റ് </a></li> 
														 
														
                                                    </ul>
												</li>
                                                <li><a class="dropdown-item" href="teacher_details.html">അഗതി മന്ദിരങ്ങള്‍</a></li>
												<li><a class="dropdown-item" href="events.html">ഐ.റ്റി.ഐ</a></li>
												 
                                            </ul>
                                        </li>
                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                ഉത്തരവുകള്‍
                                        </a>
                                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                                <a class="dropdown-item" href="index.html">Before 2021 </a>
                                                <a class="dropdown-item" href="index.html">2021-22 </a>
                                                <a class="dropdown-item" href="index-2.html"> 2022-23</a>
                                                <a class="dropdown-item" href="index-3.html"> 2023-24 </a>
                                                
                                            </div>
                                        </li>
                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                പദ്ധതികള്‍
                                        </a>
                                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                                <a class="dropdown-item" href="index.html"> ഭൂമിയും -വീടുകളും </a>
                                                <a class="dropdown-item" href="index.html">പട്ടികവര്‍ഗ്ഗസങ്കേതങ്ങളുടെ വികസനം </a>
                                                <a class="dropdown-item" href="index-2.html"> വിദ്യാഭ്യാസം</a>
                                                <a class="dropdown-item" href="index-3.html"> തൊഴില്‍ / സ്വയം തൊഴില്‍ /  സ്‌കില്‍ ഡെവലപ്‌മെന്റ്&#039; </a>
                                                <a class="dropdown-item" href="index.html"> ആരോഗ്യപദ്ധതികള്‍  </a>
                                                <a class="dropdown-item" href="index.html">ഗവേഷണവും ആധുനികവല്‍ക്കരണവും </a>
                                                <a class="dropdown-item" href="index-2.html"> പൊതുപദ്ധതികള്‍ </a>
                                                <a class="dropdown-item" href="index-3.html"> പൗരന്റെ അവകാശ സംരക്ഷണം  </a>
                                            </div>
                                        </li>
										 <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown">
                                                മേല്‍വിലാസം
                                            </a>
                                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                
                                               
                                                <li><a class="dropdown-item" href="blog_details.html">ഡയറക്ടറുടെ കാര്യാലയം</a></li>
                                                <li class="nav-item dropdown">
													<a class="dropdown-item dropdown-toggle" href="#" id="blogDropdown1" role="button" data-toggle="dropdown">  ഡിസ്ട്രിക്റ്റ് ഓഫീസ്</a>
												<ul class="dropdown-menu" aria-labelledby="blogDropdown1">
                                                        <li><a class="dropdown-item" href="blog_01.html"> പ്രോജക്ട് ഓഫീസുകള്‍</a></li>
                                                        <li><a class="dropdown-item" href="blog_02.html">ട്രൈബല്‍ ഡവലപ്പ്‌മെന്റ്  ഓഫീസുകള്‍</a></li>
														<li><a class="dropdown-item" href="blog_02.html">ട്രൈബല്‍ എക്സ്റ്റന്‍ഷന്‍  ഓഫീസുകള്‍    </a></li>
														
														 
														
                                                    </ul>
												</li>
                                                <li><a class="dropdown-item" href="teacher_details.html">മറ്റുള്ള ഓഫീസുകള്‍</a></li>
												
												 
                                            </ul>
                                        </li>
                                        <li class="nav-item">
                                            <a href="notice.html" class="nav-link">ഫോമുകള്‍</a>
                                        </li><li class="nav-item">
                                            <a href="notice.html" class="nav-link">പുനരധിവാസമിഷന്‍</a>
                                        </li>
                                       

                                        
                                        <li class="nav-item">
                                            <a href="#search_modal" data-toggle="modal" data-target="#search_modal" class="nav-link"><i class="fa fa-search"></i></a>
                                        </li>
                                    </ul>
                                    <div class="collapse-bar">
                                        <a class="navbar-brand" data-toggle="collapse" href="#languages_options"><i class="fa fa-bars"></i></a>
                                        <div class="option-menu collapse" id="languages_options">
                                            <nav>
                                                <ul>
                                                    <li class="nav-item">
                                                        <a class="nav-link" href="#">English</a>
                                                        <a class="nav-link" href="#">മലയാളം</a>
                                                        
                                                    </li>
                                                </ul>
                                            </nav>
                                        </div>
                                    </div>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Button trigger modal -->
            <!-- Start Search Modal -->
            <div class="modal fade" id="search_modal">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title sm-sub-title">Search Here</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                        <div class="search-widget">
                                <form action="#">
                                    <input type="text" class="form-control" placeholder="Search Here">
                                    <button type="submit"><i class="fas fa-search"></i></button>
                                </form>
                        </div>
                   
                </div>
                 
                </div>
            </div>
            </div>
             <!-- End Search Modal -->
        </div>
    </header>
    <!-- End Header -->
    	 @yield('content')

  
    <footer data-aos="fade-up">
        <div class="footer-area default_bg">
            <div class="footer-top section-ptb">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-md-6 mb-xs-5">
                            <div class="single_widget">
                                <div class="address-widget">
                                    <div class="footer-logo">
                                        <a href="index.html"><img src="{{ asset('images_new/footer_logo.png')}}" alt="" class="img-fluid"></a>
                                    </div>
                                    <p>Directorate of Scheduled Tribes Development Department, 
4th floor, Vikas Bhavan,Thiruvananthapuram</p>
                                    <span>E-Mail ID: keralatribes@gmail.com<br>
Phone no: 0471-2304594, 0471-2303229</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 mb-3d-5">
                            <div class="single_widget">
                                <h3>പദ്ധതികള്‍ </h3>
                                <div class="widget-list">
                                    <ul>
                                        <li><a href="#"> 
											ഭൂമിയും -വീടുകളും </a></li>
                                              <li><a href="#">    പട്ടികവര്‍ഗ്ഗസങ്കേതങ്ങളുടെ വികസനം </a></li>
                                              <li><a href="#">      വിദ്യാഭ്യാസം</a></li>
                                             <li><a href="#">     തൊഴില്‍ / സ്വയം തൊഴില്‍ /  സ്‌കില്‍ ഡെവലപ്‌മെന്റ്' </a></li>
                                             <li><a href="#">       ആരോഗ്യപദ്ധതികള്‍  </a></li>
                                             <li><a href="#">      ഗവേഷണവും ആധുനികവല്‍ക്കരണവും </a></li>
                                             <li><a href="#">       പൊതുപദ്ധതികള്‍ </a></li>
                                            <li><a href="#">      പൗരന്റെ അവകാശ സംരക്ഷണം  </a></li>
                                             
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 mb-xs-5">
                            <div class="single_widget">
                                <h3>സ്ഥാപനങ്ങള്‍ </h3>
                                <div class="widget-list">
                                    <ul>
                                    
                                                
                                                <li><a href="#">   
                                                 
                                                        സ്‌കൂളുകള്‍
                                                    </a>
                                                   
                                                </li>
                                                <li><a href="#">   ഹോസ്റ്റലുകള്‍</a></li>
                                                <li>
													<a href="#">    ആശുപത്രികള്‍ &amp; ഡിസ്പന്‍സറികള്‍</a>
												 
												</li>
                                                <li><a href="#">   അഗതി മന്ദിരങ്ങള്‍</a></li>
												<li><a href="#">   ഐ.റ്റി.ഐ</a></li>
												 
                                            </ul>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="single_widget">
                                <h3>ആശുപത്രികള്‍ & ഡിസ്പന്‍സറികള്‍</h3>
								<div class="widget-list">
                                    <ul>
                                    
                                                <li><a   href="#"> ആയൂര്‍വേദ ഡിസ്‌പെന്‍സറികള്‍</a></li>
                                                        <li><a   href="#">ആയൂര്‍വേദ ആശുപത്രി</a></li>
														<li><a   href="#">എ.എന്‍.എം. സെന്റര്‍   </a></li>
														<li><a   href="#"> ഒ.പി. ക്ലിനിക്കുകള്‍    </a></li>
														<li><a   href="#"> മൊബൈല്‍ മെഡിക്കല്‍ യൂണിറ്റ് </a></li> 
														 
                                            </ul>
                                    </ul>
                                </div>
                                    
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom-wrapper border-top py-3">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="footer-bottom">
                                <div class="copyright-text">
                                    <p>© 2023 Directorate of Scheduled Tribes Development Department. All rights reserved.</p>
                                </div>
                                <div class="social-accounts">
                                    <ul>
                                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="scroll-top">
            <div class="scroll-icon">
                <i class="fa fa-angle-up"></i>
            </div>
        </div>
    </footer>
    <!-- End Footer -->
    <script src="{{ asset('js_new/jquery-3.4.0.min.js')}}"></script>
    <script src="{{ asset('js_new/popper.min.js')}}"></script>
    <script src="{{ asset('js_new/jquery.easing.min.js')}}"></script>
    <script src="{{ asset('js_new/bootstrap.min.js')}}"></script>
    <script src="{{ asset('js_new/aos.js')}}"></script>
    <script src="{{ asset('js_new/owl.carousel.min.js')}}"></script>
    <script src="{{ asset('js_new/swiper.min.js')}}"></script>
    <script src="{{ asset('js_new/jquery.fancybox.min.js')}}"></script>
    <script src="{{ asset('js_new/jquery.waypoints.min.js')}}"></script>
    <script src="{{ asset('js_new/jquery.counterup.min.js')}}"></script>
    <script src="{{ asset('js_new/jquery.matchHeight-min.js')}}"></script>
    <script src="{{ asset('js_new/bootnavbar.js')}}"></script>
    <script src="{{ asset('js_new/main.js')}}"></script>
</body>

</html>