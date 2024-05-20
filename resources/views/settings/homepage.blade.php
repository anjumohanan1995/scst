@extends('layouts.homelayouts')
@section('content')

@php
   $top_sliders=getTopSliders();
   $show_events=getEvents();
   $latest_updates=getLatestNewsUpdates();
   $bottom_sliders=getBottomSliders();
   $newslist = \DB::Table('news_lists')->select('*')->orderBy('display_order','desc')->take(8)->get();
   $awards = \DB::Table('awards')->select('*')->orderBy('id','desc')->take(5)->get();

   $homesetting = \DB::Table('home_settings')->first();
@endphp
         <!-- Start Main -->
         <main>
          <div class="container">
      <div class="row">
            <div class="col-xl-8 banner">
               <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">

      @if($top_sliders!=NULL)
       @php $i=0; @endphp
         @foreach($top_sliders as $slider)

            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="{{$i++}}" class="active" aria-current="true" aria-label="{{ @$slider->title}}"></button>

         @endforeach
      @endif


    </div>
    <div class="carousel-inner">
      @if($top_sliders!=NULL)
      @php  $i=0; @endphp
         @foreach($top_sliders as $slider)
            <div class="carousel-item @if($i=='0') active @endif" style="background-image: url({{url('/')}}/admin/uploads/thumbnails/{{$slider->image}})">
               <div class="carousel-caption">
                <h5>{{ @$slider->title }}</h5>
                <p>{{ @$slider->description }}</p>
              </div>
            </div>
            @php  $i++; @endphp
         @endforeach
      @endif


    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
</div>

         <div class="col-xl-4 align-center box" style="background: url({{url('/')}}/images/1.png) #016e35">

		  <h2 class="mb-5">Raise your Query</h2>
          <div class="alert alert-danger print-error-msg" style="display:none">
            <ul></ul>
        </div>
<div class="alert alert-success" role="alert" id="formStatus">
  Thank you for filling out your information!
</div>
  <div >
   <textarea name="query" id="ct_query" class="form-control" placeholder="How can we help you? Please type your query here……….."></textarea>
   <br/>
   <input type="text" name="name" id="ct_name" class="form-control"  placeholder="Name">
   <br/>
   <input type="text" name="mobile" id="ct_mobile" class="form-control" placeholder="Mobile">
   <br/>

   <input type="email" name="email" id="ct_email" class="form-control"  placeholder="Email">
   <br/>
   <input type="button" name="" id="ct_submit" class="btn btn-primary" value="Submit">
  </div>
</div>



             </div>
            <!-- start feature-section-style-1  -->
            <section class="rt-feature-section feature-section-style-1 overflow-hidden mt-4"
               data-bg-image="media/elements/element_1.png">
               <div class="container">
                  <div class="row gutter-24">
                     @if($latest_updates!=NULL)
                        @foreach($latest_updates as $latest_update)
                           <div class="col-xl-3 col-md-6 wow fadeInUp" data-wow-delay="200ms" data-wow-duration="800ms">
                              <div class="rt-post post-sm style-1">
                                 <div class="post-img">
                                     @php

                                        if($latest_update->title == "News"){
                                             $value = "/page/news";
                                        }
                                        elseif($latest_update->title == "ENERGY"){
                                             $value = "/page/energymanager";
                                        }
                                        else{
                                             $value = "#";
                                        }
                                     @endphp

                                    <a href="{{$value}}">
                                       <img src="{{url('/')}}/admin/uploads/thumbnails/{{$latest_update->file_name}}" alt="post" width="100" height="100">
                                    </a>
                                 </div>
                                 <div class="ms-4 post-content">
                                    <a href="{{$value}}">{{@$latest_update->title}}</a>
                                    <h3 class="post-title">
                                       <a href="{{$value}}">
                                       {!!@$latest_update->description!!}

                                       </a>
                                    </h3>
                                    <span class="rt-meta">
                                       <i class="far fa-calendar-alt icon"></i>
                                          @php
                                             $newtime = strtotime($latest_update->created_at);
                                             $latest_update->time = date('M d, Y',$newtime);

                                          @endphp

                                     {{@$latest_update->time}}
                                    </span>
                                 </div>
                              </div>
                           </div>
                        @endforeach
                     @endif


                     <!-- <div class="col-xl-3 col-md-6  wow fadeInUp" data-wow-delay="400ms" data-wow-duration="800ms">
                        <div class="rt-post post-sm style-1">
                           <div class="post-img">
                              <a href="single-post1.html">
                                 <img src="media/gallery/post-sm_2.jpg" alt="post" width="100" height="100">
                              </a>
                           </div>
                           <div class="ms-4 post-content">
                              <a href="technology.html" class="rt-post-cat-normal">  Awards
                              </a>
                              <h3 class="post-title">
                                 <a href="single-post1.html">
                                  SEEM Awards <br>
                                 2020

                                 </a>
                              </h3>
                              <span class="rt-meta">
                                 <i class="far fa-calendar-alt icon"></i>
                                 DECEMBER  2022
                              </span>
                           </div>
                        </div>
                     </div>


                     <div class="col-xl-3 col-md-6 wow fadeInUp" data-wow-delay="600ms" data-wow-duration="800ms">
                        <div class="rt-post post-sm style-1">
                           <div class="post-img">
                              <a href="single-post1.html">
                                 <img src="media/gallery/post-sm_3.jpg" alt="post" width="100" height="100">
                              </a>
                           </div>
                           <div class="ms-4 post-content">
                              <a href="life-style.html" class="rt-post-cat-normal">Exam</a>
                              <h3 class="post-title">
                                 <a href="single-post1.html">
                                     Course on EA/EM Exam
                                 </a>
                              </h3>
                              <span class="rt-meta">
                                 <i class="far fa-calendar-alt icon"></i>
                                Exam2021
                              </span>
                           </div>
                        </div>
                     </div>

                     <div class="col-xl-3 col-md-6 wow fadeInUp" data-wow-delay="800ms" data-wow-duration="800ms">
                        <div class="rt-post post-sm style-1">
                           <div class="post-img">
                              <a href="single-post1.html">
                                 <img src="media/gallery/post-sm_4.jpg" alt="post" width="100" height="100">
                              </a>
                           </div>
                           <div class="ms-4 post-content">
                              <a href="life-style.html" class="rt-post-cat-normal">Energy</a>
                              <h3 class="post-title">
                                 <a href="single-post1.html">
                                  Energy Manager, our   magazine
                                 </a>
                              </h3>
                              <span class="rt-meta">
                                 <i class="far fa-calendar-alt icon"></i>
                               April - June 2018
                              </span>
                           </div>
                        </div>
                     </div>

 -->
                  </div>
                  <!-- end row -->
               </div>
               <!-- end container -->
            </section>
             </div>
            <!-- <div class="awwards mt-4">
               <div class="container">
                  <div class="row">
                     <div class="col-xl-4"> <img src="media/awwards.png" alt=""/> </div>
                     <div class="col-xl-4"><h2>SEEM Awards 2022 </h2>
                     </div>
                     <div class="col-xl-4">
                        <button class="apply">Apply Online</button>
                     </div>

                   </div>
               </div>
            </div> --><hr>
        <div class="awwards mt-0">
                        <div class="container">
                           <div class="row">
              @if($show_events!=NULL)
              @if(@$show_events->count() % 2 == 0)
              @foreach($show_events as $show_event)


                              <div class="col-xl-6"><h2>{{@$show_event->name}} </h2><h6>

                                       @php



                                          @endphp
                                          {{date("d-m-Y", strtotime(@$show_event->date))}} TO {{ date("d-m-Y", strtotime(@$show_event->to_date))}}</h6>



                                 <a href="/programs/{{$show_event->id}}">  <button class="apply">Register</button></a>
                                  </div>

                  @endforeach

              @else


                  @foreach($show_events as $show_event)


                              <div class="col-xl-4"><h2>{{@$show_event->name}} </h2><h6>

                                       @php



                                          @endphp
                                          {{date("d-m-Y", strtotime(@$show_event->date))}} TO {{ date("d-m-Y", strtotime(@$show_event->to_date))}}</h6>



                                 <a href="/programs/{{$show_event->id}}">  <button class="apply">Register</button></a>
                                  </div>

                  @endforeach
                  @endif
               @endif
  						</div>
                        </div>
                     </div>


            <section class="whats-new-style-1 section-padding">
               <div class="container">
                  <div class="row gutter-30">

                     <div class="col-xl-4  mt-5">
                        <div class="featured-area-style-1 overflow-hidden">

                           <div class="wrap mb--60">
                              <div class="featured-tab-title">
                                 <h2 class="rt-section-heading style-2 mb--30">
                                 <span class="rt-section-text">Latest News </span>
                                 <span class="rt-section-dot"></span>
                                 <span class="rt-section-line"></span>
                              </h2>


                              </div>
                              <!-- end featured-tab-title -->

                              <div class="tab-content" id="myTabContent">
                                 <div class="tab-pane tab-item animated fadeInUp show active" id="menu-1"
                                    role="tabpanel" aria-labelledby="menu-1-tab">
                                    <div class="row gutter-24">

                                       <div class="col-lg-12">
                                          <div class="row gutter-24">
                                             @foreach($newslist as $newsdata)
                                             <div class="col-12">
                                                <div class="rt-post post-sm style-2">
                                                   <div class="post-content">
                                                      <!-- <a href="gaming.html" class="rt-post-cat-normal">News</a> -->
                                                      <h4 class="post-title">
                                                         <a href="{{ url('/')}}/page/news">
                                                            @php
$title =  str_replace('_', ' ', @$newsdata->title);
$title1 =  strtoupper($title);
@endphp
                                                           {{@$title1}}  @if($newsdata->image != '')

                                                         <a href="{{url('/')}}/admin/uploads/newslist/{{@$newsdata->image}}" target="_blank"  > <i class="fa fa-file-pdf" style="color: #FF0004"> </i></a>
                                                         @endif
                                                         </a>
                                                      </h4>
                                                      <span class="rt-meta">
                                                         <i class="far fa-calendar-alt icon"></i>
                                                           @php
                                                            $newtime = strtotime($newsdata->created_at);
                                                            $latest_update->time = date('M d, Y',$newtime);
                                                            @endphp
                                                            {{@$latest_update->time}}
                                                      </span>

                                                   </div>



                                                   <div class="post-img">



                                                      <!-- <a href="/seem/{{$newsdata->slug}}">
                                                         <img src="{{ url('/')}}/admin/uploads/newslist/{{@$newsdata->image}}" alt="post" width="143"
                                                            height="110">
                                                      </a> -->

                                                      <a href="{{ url('/')}}/page/news"><i class="fa fa-arrow-right"></i></a>
                                                   </div>
                                                </div>
                                             </div>
                                             @endforeach

                                          </div>
                                          <a class="float-right" href="{{ url('/')}}/page/news" target="_blank">Read All..</a>

                                       </div>
                                    </div>
                                 </div><!-- end ./tab item -->

                                  <!-- end ./tab item -->

                                  <!-- end ./tab item -->

                                  <!-- end ./tab item -->
                              </div> <!-- end /.tab-content -->
                           </div>



                        </div>
                        <!-- end featured-area-style-1 -->
                     </div>



                   <div class="col-xl-5 align-center">
                      <img src="{{url('/')}}/admin/uploads/home-images/{{$homesetting->middle_image}}" alt="{{$homesetting->middle_image}}"/>
                    </div>
                     <div class="col-xl-3 p-0 mt-4">
                    <div class="rt-post-overlay rt-post-overlay-md mb-4">
                                       <div class="post-img">
                                          <a href="/apply-institutions" class="img-link">
                                             <img src="media/gallery/post-xl_6.jpg" alt="post-xl_6" width="900" height="600">
                                          </a>
                                       </div>
                                       <div class="post-content">
                                          <h3 class="post-title bold-underline">
                                             <a href="/apply-institutions">
                                               SEEM Membership
For Institutions
                                             </a>
                                          </h3>



                                       </div>
                                    </div>
<div class="rt-post-overlay rt-post-overlay-md mb-4">
                                       <div class="post-img">
                                          <a href="/apply-institutions" class="img-link">
                                             <img src="media/gallery/post-xl_5.jpg" alt="post-xl_5" width="900" height="600">
                                          </a>
                                       </div>
                                       <div class="post-content">
                                          <h3 class="post-title bold-underline">
                                             <a href="/apply-institutions">
                                               SEEM Membership
For Institutions
                                             </a>
                                          </h3>



                                       </div>
                                    </div><img src="{{url('/')}}/admin/uploads/home-images/{{@$homesetting->middle_image_one}}" alt=""/>
                 </div>  </div>
                  <!-- end row -->

                  <br/>
                  {{-- <div class="featured-tab-title">
                     <h2 class="rt-section-heading style-2 mb--30">
                     <span class="rt-section-text">Awards </span>
                     <span class="rt-section-dot"></span>
                     <span class="rt-section-line"></span>
                  </h2>


                  </div> --}}
                  {{-- @foreach ($awards as $award)
                  <div class="col-md-12">
                  <div class="rt-post-overlay rt-post-overlay-md mb-4">
                    <div class="row">
                        <div class="col-md-10 border-bottom mb-3">
                                  <h4 class="post-title">  <a href="/awardslist/{{$award->id}}"> {{@$award->title}}  <i class="fa fa-arrow-right float-end"></i></a>&nbsp;&nbsp;&nbsp;&nbsp; - &nbsp;&nbsp;&nbsp;&nbsp;{{@$award->award_holder}}</h4>
                        </div>
                    </div>

                  </div>
                  </div>
                  @endforeach --}}<hr>
                  <div class="col-md-12">
                     <div class="rt-post-overlay rt-post-overlay-md mb-4">
                       <div class="row">
                           <div class="col-md-10 border-bottom mb-3">
                                   <center>  <h2 class="post-title">  <a class="blinking-text" href="https://seemindia.org/public/img/awards.pdf" target="_blank"> SEEM AWARDS 2022 - RESULTS PUBLISHED</a></h2> </center>
                           </div>
                       </div>

                     </div>
                     </div>



                    <div class="container">
                        <div class="col-xl-6 mt-6" style="float: left;">

                      <img class="" src="{{url('/')}}/admin/uploads/home-images/program1.jpg" alt="">
                            </div>
                    <div class="col-xl-6 mt-6" style="float: left;">

                       <img class="" src="{{url('/')}}/admin/uploads/home-images/program2.jpg" alt="">
                        </div>  <a href="{{ url('/')}}/program-brochure" >Read more..</a>
                        <p >  Meeting Link : <br>
                            <a href="https://youtube.com/live/nywTLAcN1D4?feature=share" target="_blank">https://youtube.com/live/nywTLAcN1D4?feature=share</a><br>

                            <a href="https://www.youtube.com/channel/UCUQnb0JccqeaLOv5ZCqH-bg" target="_blank">https://www.youtube.com/channel/UCUQnb0JccqeaLOv5ZCqH-bg</a>
                                        </p>



        </div>
                         {{--  <div class="container">
                            <div class="col-xl-6 mt-6" style="float: left;">
                            <img src="prelease.jpeg"/>
                            </div>

                            <div class="col-xl-6 mt-6" style="float: left;">
                            <h1>Society of Energy Engineers and Managers (SEEM) Announces New National Management Council</h1><br/>

Raipur, Chhattisgarh - The Society of Energy Engineers and Managers (SEEM) recently held its 17th Annual General body Meeting at Hotel Babylon Capital on 19th April 2023. During the meeting, a new National Management Council was elected for the term 2023-2026.<br/>

The new team was installed by the outgoing National President Dr. Mool Chand Jain (Chhattisgarh) during the AGM. The newly elected members of the National Management Council are as follows:<br/>

·         National President: Mr. Jayakumar Nair (Kerala)<br/>

·         Vice President: Prof. Dr. Mohan Khedkar (Maharashtra)<br/>

·         National General Secretary: Mr.G.Krishnakumar (Kerala)<br/>

·         Treasurer: Mr. Jayesh Darji (Gujarat)<br/>

·         Joint Secretary: Mr. Anurag Bajpai (Delhi NCR)<br/>



"We are  thrilled  to welcome the  new  National  Management  Council to SEEM," said<br/>

Dr. Mool Chand Jain. "I am confident that this new team will bring fresh perspectives, ideas, and innovations to our organization. Their leadership and expertise will undoubtedly help us to continue our mission to advance energy conservation and management in India."<br/>



Society of Energy Engineers and Managers (SEEM) is a not-for-profit professional body of Certified Energy Managers and Auditors in India. With over 15 State chapters across India, SEEM is a leading authority in the field of energy management and energy audits.<br/>



For more information about SEEM and its initiatives, please visit the website at www.seemindia.org.<br/>


--<br/>

Thanks and regards,<br/>
G Krishnakumar

National General Secretary
                            </div>

                            </div>  --}}


               </div>
               <!--  end container -->
            </section>



              <div class="container">


            <div class="list-categories categories-activations axil-slick-arrow arrow-between-side pb-5">
               @if($bottom_sliders!=NULL)
                  @php $i=0; @endphp
                  @foreach($bottom_sliders as $slider)



                           <div class="single-cat">
                                <div class="inner">
                                    <a href="#">
                                        <div class="thumbnail">
                                            <img src="{{url('/')}}/admin/uploads/thumbnails/{{$slider->image}}" alt="post categories images">
                                        </div>
                                        <div class="content">
                                            <h5 class="title">{{@$slider->title}} </h5>
                                        </div>
                                    </a>
                                </div>
                           </div>
                  @endforeach
               @endif

                         <!--   <div class="single-cat">
                                <div class="inner">
                                    <a href="#">
                                        <div class="thumbnail">
                                            <img src="media/gallery/2.png" alt="post categories images">
                                        </div>
                                        <div class="content">
                                            <h5 class="title">NAM S&T Centre</h5>
                                        </div>
                                    </a>
                                </div>
                           </div>

                           <div class="single-cat">
                                <div class="inner">
                                    <a href="#">
                                        <div class="thumbnail">
                                            <img src="media/gallery/1.png" alt="post categories images">
                                        </div>
                                        <div class="content">
                                            <h5 class="title">REEEP</h5>
                                        </div>
                                    </a>
                                </div>
                           </div>

                           <div class="single-cat">
                                <div class="inner">
                                    <a href="#">
                                        <div class="thumbnail">
                                            <img src="media/gallery/2.png" alt="post categories images">
                                        </div>
                                        <div class="content">
                                            <h5 class="title">CETIAT</h5>
                                        </div>
                                    </a>
                                </div>
                           </div>

                           <div class="single-cat">
                                <div class="inner">
                                    <a href="#">
                                        <div class="thumbnail">
                                             <img src="media/gallery/3.png" alt="post categories images">
                                        </div>
                                        <div class="content">
                                            <h5 class="title">International Copper Association India</h5>
                                        </div>
                                    </a>
                                </div>
                           </div>

                           <div class="single-cat">
                                <div class="inner">
                                    <a href="#">
                                        <div class="thumbnail">
                                            <img src="media/gallery/4.png" alt="post categories images">
                                        </div>
                                        <div class="content">
                                            <h5 class="title">MNRE</h5>
                                        </div>
                                    </a>
                                </div>
                           </div>
                           <div class="single-cat">
                                <div class="inner">
                                    <a href="#">
                                        <div class="thumbnail">
                                             <img src="media/gallery/5.png" alt="post categories images">
                                        </div>
                                        <div class="content">
                                            <h5 class="title">BEE</h5>
                                        </div>
                                    </a>
                                </div>
                           </div>
                           <div class="single-cat">
                                <div class="inner">
                                    <a href="#">
                                        <div class="thumbnail">
                                            <img src="media/gallery/6.png" alt="post categories images">
                                        </div>
                                        <div class="content">
                                            <h5 class="title">TERI</h5>
                                        </div>
                                    </a>
                                </div>
                           </div>
                           <div class="single-cat">
                                <div class="inner">
                                    <a href="#">
                                        <div class="thumbnail">
                                            <img src="media/gallery/9.png" alt="post categories images">
                                        </div>
                                        <div class="content">
                                            <h5 class="title">SEEM Publications</h5>
                                        </div>
                                    </a>
                                </div>
                           </div> -->


                        </div>
          </div>
         </main>
         <!-- End Main -->




    <script type="text/javascript">

      $('#formStatus').hide();

      $('#ct_submit').on('click', function(e) {

       e.preventDefault();
       var query  = $('#ct_query').val();
        var name  = $('#ct_name').val();
       var email  = $('#ct_email').val();
       var mobile = $('#ct_mobile').val();

       $.ajax({
           type: "POST",
           url: '/query/add',
           data: { "_token": "{{ csrf_token() }}",
                   querys:query,
                   name:name,
                   email:email,
                   mobile:mobile
                 },
           success: function(data) {
             //alert(msg);
             if($.isEmptyObject(data.error)){
               $(".print-error-msg").hide();
               $('#formStatus').show();
               $('#formStatus').delay(5000).fadeOut('slow');
               $('#ct_query').val("");
               $('#ct_name').val("");
               $('#ct_email').val("");
               $('#ct_mobile').val("");
           }else{
               printErrorMsg(data.error);
           }

           }
       });

   });
   function printErrorMsg (msg) {
      $(".print-error-msg").find("ul").html('');
      $(".print-error-msg").css('display','block');
      $.each( msg, function( key, value ) {
          $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
      });
  }
</script>
<style>
    @keyframes blink {
            0%, 100% { color: red; }
            50% { color: blue; }
        }

   .blinking-text {
       animation: blink 1s infinite;
   }
</style>
@endsection
