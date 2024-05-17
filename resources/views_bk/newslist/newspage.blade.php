@extends('layouts.homelayouts')
@section('content')

         <!-- Start Main -->
         <main>
            <div class="awwards mt-4">
				 	 <div class="container"><div class="row">
						 
						 <div class="col-xl-8"><h4>Advance your career by becoming a part of India’s fastest growing network of Energy Managers and Auditors.</h4>
						 </div> 
			    		<div class="col-xl-4">  
						 	<button class="apply">Join SEEM</button>
						 </div>
			 	
			 </div>
			 </div> 
         </div>

			 <div class="container pt-5 pb-5"><div class="row">
				 	<div class="col-xl-8">
				 <h2 class="rt-section-heading">
                                 <span class="rt-section-text">{{@$page->title}}</span>
                              </h2>
            
             {!!@$page->content!!}
				  
				 </div><div class="col-xl-4 p-4" style="background-color: #efefef">
                        <div class="featured-area-style-1 overflow-hidden">

                           <div class="wrap mb--60">
                              <div class="featured-tab-title">
                                 <h2 class="rt-section-heading style-2 mb--30">
                                 <span class="rt-section-text">Stay Connected </span>
                                 <span class="rt-section-dot"></span>
                                 <span class="rt-section-line"></span>
                              </h2>

                                  
                              </div>
                              <!-- end featured-tab-title -->
                              @php
                                 $newslist = \DB::Table('news_lists')->select('*')->get();
                                 @endphp
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
                                                         <a href="/seem/{{$newsdata->slug}}">
                                                           {{$newsdata->title}}
                                                         </a>
                                                      </h4>
                                                      <span class="rt-meta">
                                                         <i class="far fa-calendar-alt icon"></i>
                                                           @php 
                                                            $newtime = strtotime(@$newsdata->created_at);
                                                            $latest_update = date('M d, Y',$newtime);
                                                            @endphp
                                                            {{@$latest_update}}
                                                      </span>
                                                   </div>
                                                   <div class="post-img">
                                                      <a href="/seem/{{$newsdata->slug}}">
                                                         <img src="{{ url('/')}}/admin/uploads/newslist/{{@$newsdata->image}}" alt="post" width="143"
                                                            height="110">
                                                      </a>
                                                   </div>
                                                </div>
                                             </div>
                                             @endforeach
                                         
                                          </div>
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
				 
				 
				 
				 </div>
 		 			


             </div> 
			  

             
            
         </main>
         <!-- End Main -->

@endsection