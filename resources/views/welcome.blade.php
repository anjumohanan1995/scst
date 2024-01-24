@extends('layouts.home_app')

@section('content')


  <!-- Start Slider -->
    <section class="slider-section swiper-container" data-aos="fade-in">
        <div class="swiper-wrapper">
            <div class="slider-area height-700 swiper-slide overlay" style="background-image:url(images_new/slider_bg_2.jpg)">
                <div class="container">
                    <div class="row">
                        <div class="col-md-7 ml-5">
                            <div class="slider-content text-white pb-5 mb-5">
                                <h2 class="display-3">മെച്ചപ്പെട്ട ലോകത്തിന് മികച്ച വിദ്യാഭ്യാസം</h2>
                                <p>പട്ടികജാതി-പട്ടികവർഗ വിഭാഗങ്ങളെ ശാക്തീകരിക്കുന്നതും, സമൃദ്ധമായ ഉപജീവന അവസരങ്ങളോടെ അഭിവൃദ്ധി പ്രാപിക്കുന്നതുമായ ഒരു ആവാസവ്യവസ്ഥയാണ് കേരള എംപവർമെന്റ് സൊസൈറ്റി വിഭാവനം ചെയ്യുന്നത്. </p>
                                <a href="#" class="button_one mt-4">Contact Us</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="slider-area height-700 swiper-slide overlay" style="background-image:url(images_new/slider_bg.jpg)">
                <div class="container">
                    <div class="row">
                        <div class="col-md-7 ml-5">
                            <div class="slider-content text-white pb-5 mb-5">
                                <h2 class="display-3">ഗോത്രകാര്യ <br>
                                    മന്ത്രാലയം (MOTA)</h2>
                                <p>പട്ടികജാതി-പട്ടികവർഗ വിഭാഗങ്ങളെ ശാക്തീകരിക്കുന്നതും, സമൃദ്ധമായ ഉപജീവന അവസരങ്ങളോടെ അഭിവൃദ്ധി പ്രാപിക്കുന്നതുമായ ഒരു ആവാസവ്യവസ്ഥയാണ് കേരള എംപവർമെന്റ് സൊസൈറ്റി വിഭാവനം ചെയ്യുന്നത്.  </p>
                                <a href="#" class="button_one mt-4">Contact Us</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="slider-area height-700 swiper-slide overlay" style="background-image:url(images_new/slider_bg_3.jpg)">
                <div class="container">
                    <div class="row">
                        <div class="col-md-7  ml-5">
                            <div class="slider-content text-white pb-5 mb-5">
                                <h2 class="display-3">
                                    വിദ്യാഭ്യാസ മൂല്യം നിലനിർത്തുക</h2>
                                <p>പട്ടികജാതി-പട്ടികവർഗ വിഭാഗങ്ങളെ ശാക്തീകരിക്കുന്നതും, സമൃദ്ധമായ ഉപജീവന അവസരങ്ങളോടെ അഭിവൃദ്ധി പ്രാപിക്കുന്നതുമായ ഒരു ആവാസവ്യവസ്ഥയാണ് കേരള എംപവർമെന്റ് സൊസൈറ്റി വിഭാവനം ചെയ്യുന്നത്. </p>
                                <a href="#" class="button_one mt-4">Contact Us</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="swiper-pagination"></div>
    </section>
    <!-- End Slider -->
    <!-- Start Services -->
    <section class="services-section translate_34">
        <div class="services-area">
            <div class="container">
                 <div class="row">
                    <div class="col-md-2 mb-xs-2 mt-xs-2" data-aos="fade-in" data-aos-delay="200">
                        <div class="single-service default_bg text-center text-white pt-3 pb-2 px-2">
                            <div class="service-icon">
                                <img src="{{ asset('images_new/service_icon_01.png')}}" alt="service one" class="img-fluid">
                            </div>
                            <div class="service-text">
                                <h4>വകുപ്പുതല വാർത്തകൾ</h4>
                                 
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 mb-xs-2" data-aos="fade-in" data-aos-delay="300">
                        <div class="single-service default_bg text-center text-white pt-3 pb-2 px-2">
                            <div class="service-icon">
                                <img src="{{ asset('images_new/service_icon_02.png')}}" alt="service one" class="img-fluid">
                            </div>
                            <div class="service-text">
                                <h4>ഇ-ഗവേണൻസ്<br>
                                &nbsp;</h4>
                                 
                            </div>
                        </div>
                    </div>
					<div class="col-md-2 mb-xs-2" data-aos="fade-in" data-aos-delay="400">
                        <div class="single-service default_bg text-center text-white pt-3 pb-2 px-4">
                            <div class="service-icon">
                                <img src="{{ asset('images_new/service_icon_03.png')}}" alt="service one" class="img-fluid">
                            </div>
                            <div class="service-text">
                                <h4>പുതിയ പദ്ധതികൾ</h4>
                               
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 mb-xs-2" data-aos="fade-in" data-aos-delay="500">
                        <div class="single-service default_bg text-center text-white pt-3 pb-2 px-2">
                            <div class="service-icon">
                                <img src="{{ asset('images_new/Untitled-4.png')}}" alt="service one" class="img-fluid">
                            </div>
                            <div class="service-text">
                                <h4>വിദ്യാർത്ഥികളുടെ ലോകം</h4>
                               
                            </div>
                        </div>
                    </div>
					<div class="col-md-2 mb-xs-2" data-aos="fade-in" data-aos-delay="500">
                        <div class="single-service default_bg text-center text-white pt-3 pb-2 px-2">
                            <div class="service-icon">
                                <img src="{{ asset('images_new/service_icon_021.png')}}" alt="service one" class="img-fluid">
                            </div>
                            <div class="service-text">
                                <h4>യോഗ്യത<br>
                                &nbsp;</h4>
                               
                            </div>
                        </div>
                    </div>
					<div class="col-md-2 mb-xs-2" data-aos="fade-in" data-aos-delay="600">
                        <div class="single-service default_bg text-center text-white pt-3 pb-2 px-2">
                            <div class="service-icon">
                                <img src="{{ asset('images_new/Untitled-1.png')}}" alt="service one" class="img-fluid">
                            </div>
                            <div class="service-text">
                                <h4>വിവരാകാശം<br>
                                &nbsp;</h4>
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Services -->
    <!-- Start Welcome Section -->
    <section class="welcome-section section-pb" data-aos="fade-in">
        <div class="welcome-area">
            <div class="container pl-5 pr-5">
                <div class="row">
                    <div class="col-lg-3 mb-3d-5 px-2">
                        <div class="half_column_image">
                            <img src="{{ asset('images_new/pinarayi.jpg')}}" alt="welcome" class="img-fluid ">
							<h3>
                            ശ്രീ.പിണറായി വിജയൻ</h3><h6>ബഹു.മുഖ്യമന്ത്രി</h6>
                        </div>
                    </div>
					 <div class="col-lg-3 mb-3d-5 px-2">
                        <div class="half_column_image">
                            <img src="{{ asset('images_new/welcome.jpg')}}" alt="welcome" class="img-fluid ">
							<h3>ശ്രീ.കെ.രാധാകൃഷ്ണൻ</h3><h6>ബഹു. മന്ത്രി</h6>
                        </div>
                    </div>
                    <div class="col-lg-6 equal-height">
                        <div class="half_column_content">
                            <h2 class="sub-title">STDD-ലേക്ക് സ്വാഗതം</h2>
                            <p>പിന്നാക്ക സമുദായങ്ങളുടെ പ്രശ്‌നങ്ങൾ പരിഹരിക്കുന്നതിന് സ്വാതന്ത്ര്യത്തിന് വർഷങ്ങൾക്ക് മുമ്പ് തന്നെ അതാത് സർക്കാരുകളുടെ ശ്രദ്ധ ലഭിക്കാൻ തുടങ്ങി. ഇന്നത്തെ കേരള സംസ്ഥാനം രൂപീകരിക്കുന്നതിന് മുമ്പ് തിരുവിതാംകൂർ, കൊച്ചി, മലബാർ എന്നീ പ്രദേശങ്ങൾക്ക് ഈ ആവശ്യത്തിനായി അവരുടേതായ പദ്ധതികളും ഭരണപരമായ സജ്ജീകരണങ്ങളും ഉണ്ടായിരുന്നു.</p>
                            <div class="theme-list">
                                <ul>
                                    <li><a href="#">പരാതികൾ</a></li>
                                    <li><a href="#">ജോലി ഒഴുവുകൾ</a></li>
                                    
                                </ul>
                            </div>
                            <div class="theme-list ml-xl-5">
                                <ul>
                                    <li><a href="#">വനാവകാശ നിയമം</a></li>
                                    <li><a href="#">നൈപുണ്യ വികസനം</a></li>
                                    
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Welcome Section -->
    <!--Start Department -->
    <div class="page-wrapper section-ptb semi_dark_bg">
        <div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="section-title text-center" data-aos="fade-in">
						<h4>Our Departments</h4>
						<h2> പദ്ധതികള്‍</h2>
					</div>
				</div>
			</div>		
            <div class="row">
                <div class="col-lg-3 col-md-6 py-3 " data-aos="fade-up" data-aos-delay="200">
                   <div class="single-item h-100">
                        <!-- <div class="item-icon">
                            <img class="img-fluid" src="{{ asset('images_new/icon_01.png')}}" alt="icon">
                        </div> -->
                        <div class="item-text">
                            <h4><a href="#">ഭൂമിയും -വീടുകളും <br>
                                    &nbsp;</a></h4>
                            <p> പട്ടികവര്‍ഗ്ഗ വികസന വകുപ്പിന്റെ പദ്ധതികള്‍ ആസുത്രണം ചെയ്തിരിക്കുന്നത് പ്രത്യേക ലക്ഷ്യവും കാഴ്ചപ്പാടിന്റേയും അടിസ്ഥാനത്തിലാണ്. </p>
                        </p>
                            <a href="#" class="link_btn">Read More <i class="fa fa-angle-right"></i> </a>
                        </div>
                   </div>
               </div>
                <div class="col-lg-3 col-md-6 py-3 " data-aos="fade-up" data-aos-delay="200">
                   <div class="single-item h-100">
                        <!-- <div class="item-icon">
                            <img class="img-fluid" src="{{ asset('images_new/icon_02.png')}}" alt="icon">
                        </div> -->
                        <div class="item-text">
                            <h4><a href="#">പട്ടികവര്‍ഗ്ഗസങ്കേതങ്ങളുടെ വികസനം</a></h4>
                            <!-- <p>The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using.</p> -->
                            <p>പട്ടികവര്‍ഗ്ഗ കോളനികളുടെ സമഗ്ര വികസനം  ലക്ഷ്യം വച്ച് ചുവടെ ചേര്‍ത്തിട്ടുള്ള പദ്ധതികള്‍ നടപ്പിലാക്കിവരുന്നു</p>
                            <a href="#" class="link_btn mt-2">Read More <i class="fa fa-angle-right"></i> </a>
                        </div>
                   </div>
               </div>
                <div class="col-lg-3 col-md-6 py-3 " data-aos="fade-up" data-aos-delay="200">
                   <div class="single-item h-100">
                        <!-- <div class="item-icon">
                            <img class="img-fluid" src="{{ asset('images_new/icon_03.png')}}" alt="icon">
                        </div> -->
                        <div class="item-text">
                            <h4><a href="#">വിദ്യാഭ്യാസം<br>
                                &nbsp;</a></h4>
                            <!-- <p>The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using.</p> -->
                            
                             
                            <p>    വിദ്യാഭ്യാസം ,  റസിഡന്‍ഷ്യല്‍ സ്‌കൂള്‍,  പ്രാക്തന വര്‍ഗ്ഗക്കാര്‍ക്കായുള്ള പെരിപെറ്ററ്റിക് എഡ്യൂക്കേഷന്‍ 
                               , ട്യൂട്ടോറിയല്‍ സ്‌കീം ,
                                
                                ഗോത്ര സാരഥി  </p>
                                 
                                 
                            <a href="#" class="link_btn mt-2">Read More <i class="fa fa-angle-right"></i> </a>
                        </div>
                   </div>
               </div>
                <div class="col-lg-3 col-md-6 py-3 " data-aos="fade-up" data-aos-delay="200">
                   <div class="single-item h-100">
                        <!-- <div class="item-icon">
                            <img class="img-fluid" src="{{ asset('images_new/icon_04.png')}}" alt="icon">
                        </div> -->
                        <div class="item-text">
                            <h4><a href="#">തൊഴില്‍ / സ്വയം തൊഴില്‍ /  സ്‌കില്‍ ഡെവലപ്‌മെന്റ്&#039; </a></h4>
                            <!-- <p>The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using.</p> -->
                          <p>വോക്കേഷണല്‍ ട്രെയിനിംഗ് ,
                                
                                തൊഴിലും നൈപുണ്യവികസനവും,
                               
                               സ്വയം തൊഴില്‍ പദ്ധതിക്കായുള്ള ധനസഹായം,
                               
                                ട്രെയിനിംഗ് കോഴ്‌സുകള്‍ </p>
                            </ul>
                            <a href="#" class="link_btn mt-2">Read More <i class="fa fa-angle-right"></i> </a>
                        </div>
                   </div>
               </div>
                <div class="col-lg-3 col-md-6 py-3 " data-aos="fade-up" data-aos-delay="200">
                   <div class="single-item h-100">
                        <!-- <div class="item-icon">
                            <img class="img-fluid" src="{{ asset('images_new/icon_05.png')}}" alt="icon">
                        </div> -->
                        <div class="item-text">
                            <h4><a href="#"> ആരോഗ്യപദ്ധതികള്‍  <br>
                            &nbsp;</a></h4>
                            <!-- <p>The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using.</p> -->
                           <p>ആരോഗ്യസംരക്ഷണ കേന്ദ്രങ്ങള്‍ ,
                                 
                               ആശുപത്രികള്‍ വഴിയുളള മെഡിക്കല്‍ സഹായം ,
                               പട്ടികവര്‍ഗ്ഗ ആശ്വാസനിധി </p>
                                 
                               
                            <a href="#" class="link_btn mt-2">Read More <i class="fa fa-angle-right"></i> </a>
                        </div>
                   </div>
               </div>
                <div class="col-lg-3 col-md-6 py-3 " data-aos="fade-up" data-aos-delay="200">
                   <div class="single-item h-100">
                        <!-- <div class="item-icon">
                            <img class="img-fluid" src="{{ asset('images_new/icon_06.png')}}" alt="icon">
                        </div> -->
                        <div class="item-text">
                            <h4><a href="#">ഗവേഷണവും ആധുനികവല്‍ക്കരണവും</a></h4>
                            <!-- <p>The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using.</p> -->
                          
                                <p>പട്ടികവര്‍ഗ്ഗ വികസന വകുപ്പിന്റെ നവീകരണം ,
                                 
                                 പട്ടികവര്‍ഗ്ഗ വികസന വകുപ്പിന്റെ നവീകരണം ,
                                
                                ആദികലാഗ്രാമം ,
                                 
									പരിശീലനങ്ങള്‍, ഗവേഷണം </p>
                                 
                               
                            <a href="#" class="link_btn mt-2">Read More <i class="fa fa-angle-right"></i> </a>
                        </div>
                   </div>
               </div>
               <div class="col-lg-3 col-md-6 py-3 " data-aos="fade-up" data-aos-delay="200">
                <div class="single-item h-100">
                     <!-- <div class="item-icon">
                         <img class="img-fluid" src="{{ asset('images_new/icon_06.png')}}" alt="icon">
                     </div> -->
                     <div class="item-text">
                         <h4><a href="#"> പൊതുപദ്ധതികള്‍<br>
                        &nbsp;</a></h4>
                         <!-- <p>The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using.</p> -->
                       
                            <p>ഭക്ഷണത്തിനുളള  സഹായ/സുരക്ഷക്കുള്ള പരിപാടി,
                             
                            പട്ടികവര്‍ഗ്ഗ ഉപപദ്ധതി പ്രകാരമുളള പരിപാടികളിലെ നിര്‍ണ്ണായകമായ വിടവ് നികത്തല്‍ (കോര്‍പ്പസ് ഫണ്ട്)' 
                             </p>
                            
                           
                      
                         <a href="#" class="link_btn mt-2">Read More <i class="fa fa-angle-right"></i> </a>
                     </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 py-3 " data-aos="fade-up" data-aos-delay="200">
                <div class="single-item h-100">
                     <!-- <div class="item-icon">
                         <img class="img-fluid" src="{{ asset('images_new/icon_06.png')}}" alt="icon">
                     </div> -->
                     <div class="item-text">
                         <h4><a href="#">പൗരന്റെ അവകാശ സംരക്ഷണം<br>
                                &nbsp;</a></h4>
                         <!-- <p>The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using.</p> -->
                         <p>
                             അതിക്രമങ്ങള്‍ തടയല്‍ നിയമം നടപ്പാക്കല്‍,
                             
                            ഭൂമി കൈമാറ്റ നിയമവും അന്യാധീനപ്പെട്ട ഭൂമി പുനസ്ഥാപിച്ച് നല്‍കലും വനാവകാശ നിയമം  
                        </p>
                        
                         <a href="#" class="link_btn mt-2">Read More <i class="fa fa-angle-right"></i> </a>
                     </div>
                </div>
            </div>
            </div>
            <div class="row" data-aos="fade-up" data-aos-delay="300">
                <div class="col-md-12">
                    <div class="load-more-button pt-4 mx-auto text-center">
                        <a href="#" class="button_five">View More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Department -->
<!-- Start Featured Section -->	
<section class="featured-section section-ptb" data-aos="fade-up">
   <div class="featured-area show_navigation">
      <div class="container">
         <div class="row">
            <div class="col-md-12">
               <div class="section-title mb-4">
                  <h4>Scheduled Tribes Development Department</h4>
                  <h2>Publications</h2>
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-md-12">
               <div class="featured-carousel owl-carousel">
                  <div class="single-featured border bg-white" data-aos="fade-up" data-aos-duration="300">
                     <img src="{{ asset('images_new/featured_01.jpg')}}" alt="Featured" class="">
                     <div class="featured-text-and-info border border-top-0">
                        <div class="feature-content pt-3">
                           <h3><a href="#">ഗോത്ര ജാലകം - 2019</a></h3>
                        </div>
                     </div>
                  </div>
                  <div class="single-featured border bg-white" data-aos="fade-up" data-aos-duration="600">
                     <img src="{{ asset('images_new/featured_02.jpg')}}" alt="Featured" class="">
                     <div class="featured-text-and-info border border-top-0">
                        <div class="feature-content pt-3">
                           <h3><a href="#">ഗോത്ര ജാലകം - 2017</a></h3>
                        </div>
                     </div>
                  </div>
                  <div class="single-featured border bg-white" data-aos="fade-up" data-aos-duration="700">
                     <img src="{{ asset('images_new/featured_03.jpg')}}" alt="Featured" class="">
                     <div class="featured-text-and-info border border-top-0">
                        <div class="feature-content pt-3">
                           <h3><a href="#">ഉന്നതി - 2023</a></h3>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- End Our Team Carousel -->
<!-- Start Events Section -->
<section class="blog-section semi_dark_bg section-ptb" data-aos="fade-up">
   <div class="blog-area">
      <div class="container">
         <div class="row">
            <div class="col-md-12">
               <div class="section-title text-center mb-4">
                  <h4>Blog Posts</h4>
                  <h2>പുതിയ വാർത്ത</h2>
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-lg-6 mb-3d-5" data-aos="fade-up" data-aos-delay="200">
               <div class="big-blog-area border bg-white">
                  <div class="blog-thumb">
                     <a href="#"><img src="{{ asset('images_new/big_blog.jpg')}}" alt="big blog" class="img-fluid"></a>
                  </div>
                  <div class="blog-content p-4">
                     <div class="blog-text">
                        <h3><a href="#">AMC - താത്പര്യപത്രം ക്ഷണിക്കുന്നു 23-11-2023</a></h3>
                        <p> പിന്നാക്ക സമുദായങ്ങളുടെ പ്രശ്‌നങ്ങൾ പരിഹരിക്കുന്നതിന് സ്വാതന്ത്ര്യത്തിന് വർഷങ്ങൾക്ക് മുമ്പ് തന്നെ അതാത് സർക്കാരുകളുടെ ശ്രദ്ധ ലഭിക്കാൻ തുടങ്ങി. ഇന്നത്തെ കേരള സംസ്ഥാനം</p>
                        <a href="#">Read More <i class="fas fa-long-arrow-alt-right"></i></a>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="400">
               <div class="blog-lists-wrapper">
                  <div class="single-blog-wrapper">
                     <div class="blog-thumb pr-4">
                        <a href="#"><img src="{{ asset('images_new/blog_01.jpg')}}" alt="blog"></a>
                     </div>
                     <div class="blog-content-wrapper">
                        <h4><a href="#">വിജ്ഞാപനം നമ്പർ ബി 3/4357/2023 തീയതി 09 .11 .2023</a></h4>
                        <p>പിന്നാക്ക സമുദായങ്ങളുടെ പ്രശ്‌നങ്ങൾ പരിഹരിക്കുന്നതിന് സ്വാതന്ത്ര്യത്തിന് വർഷങ്ങൾക്ക് മുമ്പ് തന്നെ അതാത് സർക്കാരുകളുടെ ശ്രദ്ധ ലഭിക്കാൻ തുടങ്ങി. ഇന്നത്തെ കേരള സംസ്ഥാനം</p>
                        <div class="post-meta"><span> Posted on 25 March, 2019</span></div>
                     </div>
                  </div>
                  <div class="single-blog-wrapper">
                     <div class="blog-thumb pr-4">
                        <a href="#"><img src="{{ asset('images_new/blog_02.jpg')}}" alt="blog"></a>
                     </div>
                     <div class="blog-content-wrapper">
                        <h4><a href="#">ഗോത്രകാര്യ മന്ത്രാലയം (MOTA)</a></h4>
                        <p>പിന്നാക്ക സമുദായങ്ങളുടെ പ്രശ്‌നങ്ങൾ പരിഹരിക്കുന്നതിന് സ്വാതന്ത്ര്യത്തിന് വർഷങ്ങൾക്ക് മുമ്പ് തന്നെ അതാത് സർക്കാരുകളുടെ ശ്രദ്ധ ലഭിക്കാൻ തുടങ്ങി. ഇന്നത്തെ കേരള സംസ്ഥാനം</p>
                        <div class="post-meta"><span> Posted on 25 March, 2019</span></div>
                     </div>
                  </div>
                  <div class="single-blog-wrapper">
                     <div class="blog-thumb pr-4">
                        <a href="#"><img src="{{ asset('images_new/blog_03.jpg')}}" alt="blog"></a>
                     </div>
                     <div class="blog-content-wrapper">
                        <h4><a href="#">ഉന്നതി ഓവർസീസ് സ്കോളർഷിപ്പ് ലഭിക്കുന്നതിന് പട്ടികവർഗ വിദ്യാർത്ഥികൾ</a></h4>
                        <p>പിന്നാക്ക സമുദായങ്ങളുടെ പ്രശ്‌നങ്ങൾ പരിഹരിക്കുന്നതിന് സ്വാതന്ത്ര്യത്തിന് വർഷങ്ങൾക്ക് മുമ്പ് തന്നെ അതാത് സർക്കാരുകളുടെ ശ്രദ്ധ ലഭിക്കാൻ തുടങ്ങി. ഇന്നത്തെ കേരള സംസ്ഥാനം</p>
                        <div class="post-meta"><span> Posted on 25 March, 2019</span></div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- End Events Section -->
<!-- Start Testimonials Section -->
<section class="testimonials-section section-ptb" data-aos="fade-up">
   <div class="testimonials-area">
      <div class="container">
         <div class="row">
            <div class="col-md-12">
               <div class="testimonials-wrapper owl-carousel">
                  <div class="single-testimonial border-2 p-4">
                     <img src="{{ asset('images_new/clients/MoTA_logo.jpg')}}"   alt=""/> 
                  </div>
                  <div class="single-testimonial border-2 p-4">
                     <img src="{{ asset('images_new/clients/kerala_logo.jpg')}}"   alt=""/> 
                  </div>
                  <div class="single-testimonial border-2 p-4">
                     <img src="{{ asset('images_new/clients/scdd_logo.png')}}"   alt=""/> 
                  </div>
                  <div class="single-testimonial border-2 p-4">
                     <img src="{{ asset('images_new/clients/kila.png')}}"   alt=""/> 
                  </div>
                  <div class="single-testimonial border-2 p-4">
                     <img src="{{ asset('images_new/clients/kirtads_logo.png')}}"   alt=""/> 
                  </div>
                  <div class="single-testimonial border-2 p-4">
                     <img src="{{ asset('images_new/clients/kscscst_logo.png')}}"   alt=""/> 
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
    <!-- End Testimonials Section -->
    <!-- Start Blog Section -->
    
    <!-- End Blog Section -->
    <!-- Start Footer -->
@endsection
