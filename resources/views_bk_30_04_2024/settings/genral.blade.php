<form enctype="multipart/form-data" method="POST" action="{{ route('setting.store') }}">

	@csrf



	<div class="row">

		{{-- <div class="col-md-6">

			<div class="form-group">

				<label for="exampleInputDetails">TextLogo:</label>

			    <li class="tg-list-item">

			        <input class="tgl tgl-skewed" id="opp" type="checkbox" name="project_logo" {{ $setting->logo_type == 'L' ? 'checked' : '' }}>

			        <label class="tgl-btn" data-tg-off="Text" data-tg-on="Logo" for="opp"></label>

			    </li>

			    <input type="hidden" name="free" value="0" for="opp" id="oppp">

		    </div>

		</div> --}}

	</div>

	<br>



	<div class="row">

		<div class="col-md-6">

			<div class="row">



				@if ($errors->has('logo'))

				<div class="display-none" id="logo">

                    <strong class="text-danger">{{ $errors->first('logo') }}</strong>

                </div>

                @endif

				<div class="col-md-6">

					<div class="form-group">

						<label for="exampleInputDetails">Logo :</label>- <p class="inline info">Size: 300x90</p>

						<br>	

						<input type="file" name="logo" value="{{ $setting->logo }}" id="logo" class="{{ $errors->has('logo') ? ' is-invalid' : '' }} inputfile inputfile-1"/>

				<label for="logo"><svg xmlns="http://www.w3.org/2000/svg" width="50" height="30" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> <span>Choose Logo</span></label>

				<span class="text-danger invalid-feedback" role="alert"></span>

					</div>

				 	  

				</div>

				<div class="col-md-4">

					<div class="well">

						@if($setting->logo !="")

							<div class="logo-settings">

								<img src="{{ asset('logo/'.$setting->logo) }}" alt="{{ $setting->logo }}" class="img-responsive">

							</div>

						@else

							<div class="alert alert-danger">

								No logo found

							</div>

						@endif

					</div>

				</div>

			</div>

			<br>

		</div>

		<div class="col-md-6">

			<div class="row">



				@if ($errors->has('footer_logo'))

				<div class="display-none" id="footer_logo">

                    <strong class="text-danger">{{ $errors->first('footer_logo') }}</strong>

                </div>

                @endif

				<div class="col-md-6">

					<div class="form-group">

						<label for="exampleInputDetails">Footer Logo</label>- <p class="inline info">Size: 300x90</p>

						<br>	

						<input type="file" name="footer_logo" value="{{ $setting->footer_logo }}" id="footer_logo" class="{{ $errors->has('footer_logo') ? ' is-invalid' : '' }} inputfile inputfile-1"/>

						<label for="footer_logo"><svg xmlns="http://www.w3.org/2000/svg" width="50" height="30" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> <span>Choose Logo</span></label>

						<span class="text-danger invalid-feedback" role="alert"></span>

					</div>

				 	  

				</div>

				<div class="col-md-4">

					<div class="well">

						@if($setting->footer_logo !="")

							<div class="logo-settings">

								<img src="{{ asset('footer_logo/'.$setting->footer_logo) }}" alt="{{ $setting->footer_logo }}" class="img-responsive">

							</div>

						@else

							<div class="alert alert-danger">

								No Logo Found

							</div>

						@endif

					</div>

				</div>

			</div>

			<br>

		</div>

	</div>





	<div class="row">

		<div class="col-md-6">

			<div class="row">

				

				@if ($errors->has('favicon'))

                    <strong class="text-danger">{{ $errors->first('favicon') }}</strong>

                @endif

				<div class="col-md-6">

					<label for="exampleInputDetails">Favicon</label>- <p class="inline info">Size: 35x35</p>

					<br>	

					<input type="file" name="favicon" id="favi" class="{{ $errors->has('favicon') ? ' is-invalid' : '' }} inputfile inputfile-1"/>



					<label for="favi"><svg xmlns="http://www.w3.org/2000/svg" width="100" height="30" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> <span>Choose a favicon</span></label>

				</div>

				<div class="col-md-4">

					<div class="well">

						@if($setting->favicon !="")

							<div class="favicon-settings">

								<img src="{{ asset('favicon/'.$setting->favicon) }}" alt="{{ $setting->favicon }}" class="img-responsive">

							</div>

						@else

							<div class="alert alert-danger">

								No Favicon found

							</div>

						@endif

					</div>



				</div>

			</div>

			<br>

		</div>

		<div class="col-md-6">

			<div class="row">



				@if ($errors->has('preloader_logo'))

				<div class="display-none" id="preloader_logo">

                    <strong class="text-danger">{{ $errors->first('preloader_logo') }}</strong>

                </div>

                @endif

				<div class="col-md-6">

					<div class="form-group">

						<label for="exampleInputDetails">Pre loader logo</label>- <p class="inline info">Size: 300x90</p>

						<br>	

						<input type="file" name="preloader_logo" value="{{ $setting->preloader_logo }}" id="preloader_logo" class="{{ $errors->has('preloader_logo') ? ' is-invalid' : '' }} inputfile inputfile-1"/>

						<label for="preloader_logo"><svg xmlns="http://www.w3.org/2000/svg" width="50" height="30" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> <span>Choose a Logo</span></label>

						<span class="text-danger invalid-feedback" role="alert"></span>

					</div>

				 	  

				</div>

				<div class="col-md-4">

					<div class="well">

						@if($setting->preloader_logo !="")

							<div class="favicon-settings">

								<img src="{{ asset('preloader_logo/'.$setting->preloader_logo) }}" alt="{{ $setting->preloader_logo }}" class="img-responsive">

							</div>

						@else

							<div class="alert alert-danger">

								No logo found

							</div>

						@endif

					</div>

				</div>

			</div>

			<br>

		</div>

	</div>



	



	<div class="row">

		<div class="col-md-6">

			<div class="form-group">

				<label for="project_title">Project Title:<sup class="redstar">*</sup></label>

			  	<input value="{{ $setting->project_title }}" placeholder="Enter project title" name="project_title" type="text" class="{{ $errors->has('project_title') ? ' is-invalid' : '' }} form-control">

			  	@if ($errors->has('project_title'))

	                <span class="text-danger invalid-feedback" role="alert">

	                    <strong>{{ $errors->first('project_title') }}</strong>

	                </span>

	            @endif

	        </div>

		</div>

	

		

	</div>



	<div class="row">

		

		<div class="col-md-6">

			<label for="phone">Contact:<sup class="redstar">*</sup></label>

            <input value="{{ $setting->mobile }}" name="mobile" placeholder="Enter contact no." type="text" class="{{ $errors->has('mobile') ? ' is-invalid' : '' }} form-control" required>

		</div>

		<div class="col-md-6">

			<label for="wel_email">Email:<sup class="redstar">*</sup></label>

            <input value="{{ $setting->email }}" name="email" placeholder="Enter your email" type="text" class="{{ $errors->has('email') ? ' is-invalid' : '' }} form-control" required>

		</div>

	</div>

	<br>



	<div class="row">

		<div class="col-md-6">

            <label for="copy_right">Copyright Text:<sup class="redstar">*</sup></label>

            <input value="{{ $setting->copy_right }}" name="copy_right" placeholder="Enter Copyright Text" type="text" required class="{{ $errors->has('copy_right') ? ' is-invalid' : '' }} form-control">

		</div>

		<div class="col-md-6">

		

		</div>

		

	</div>

	<br>



	<div class="row">

		<div class="col-md-12">

			<label for="exampleInputDetails">Address :<sup class="redstar">*</sup></label>

            <textarea name="address" rows="2" class="form-control" placeholder="Enter your address" required>{{ $setting->address }}</textarea>

		</div>

	</div>

	<br>



	{{-- <h4 class="box-title">Map Coordinates</h4>



	<div class="row">

		<div class="col-md-6">

            <label for="map_lat">Map Enable :</label>

            <li class="tg-list-item">              

	            <input class="tgl tgl-skewed" id="map_enable" type="checkbox" name="map_enable" {{ $setting->map_enable == 'map' ? 'checked' : '' }} >

	            <label class="tgl-btn" data-tg-off="Image" data-tg-on="Map" for="map_enable"></label>

	        </li>

	        <div>

	            <small>(Enable Map on contact page)</small>

			</div>

		</div>

		<div class="col-md-6">

			<div class="row" style="{{ $setting['map_enable'] == 'image' ? '' : 'display:none' }}" id="sec_one">

				<div class="col-md-6">

					<label for="contact_image">Contact Page Image:</label>

					<br>

		            <input type="file" name="contact_image" value="{{ $setting->contact_image }}" id="contact" class="{{ $errors->has('contact_image') ? ' is-invalid' : '' }} inputfile inputfile-1">



		            <label for="contact"><svg xmlns="http://www.w3.org/2000/svg" width="100" height="30" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> <span>{{ __('adminstaticword.Chooseaimage') }}</span></label>

				</div>

				<div class="col-md-6">

					@if($setting->contact_image !="")

						<div class="contact-settings">

							<img src="{{ asset('images/contact/'.$setting->contact_image) }}" alt="{{ $setting->contact_image }}" class="img-responsive">

						</div>

					@endif

				</div>

			</div>

		</div>

	</div>

	<br> --}}



	{{-- <div class="row" style="{{ $setting['map_enable'] == 'map' ? '' : 'display:none' }}" id="sec1_one">

		<div class="col-md-4">

            <label for="map_lat">Map Latitude:</label>

            <input value="{{ $setting->map_lat }}" name="map_lat" placeholder="Enter Latitude" type="text" class="{{ $errors->has('map_lat') ? ' is-invalid' : '' }} form-control">

		</div>

		<div class="col-md-4">

			<label for="map_long">Map Longitude:</label>

            <input value="{{ $setting->map_long }}" name="map_long" placeholder="Enter Longitude" type="text" class="{{ $errors->has('map_long') ? ' is-invalid' : '' }} form-control">

		</div>

		<div class="col-md-4">

			<label for="map_api">Map Api Key:</label>

            <input value="{{ $setting->map_api }}" name="map_api" placeholder="Enter Map Api" type="text" class="{{ $errors->has('map_api') ? ' is-invalid' : '' }} form-control">

		</div>

	</div> --}}

	





	<hr>





	{{-- <h4 class="box-title">App Download</h4>



	<div class="row">

		<div  class="col-md-2">

			<label for="">App Store : </label>

			<br>

			<li class="tg-list-item">              

	            <input class="tgl tgl-skewed" id="app_download" type="checkbox" name="app_download" {{ $setting->app_download == '1' ? 'checked' : '' }} >

	            <label class="tgl-btn" data-tg-off="Disable" data-tg-on="Enable" for="app_download"></label>

            </li>

            <input type="hidden" name="free" value="0" for="app_download" id="app_download"> 

		</div>

		<div  class="col-md-10">



			<label for="promo_text">Link:</label>

            <input value="{{ $setting->app_link }}" name="app_link" placeholder="Enter Link" type="text" class="{{ $errors->has('app_link') ? ' is-invalid' : '' }} form-control">

			

		</div>

		

	</div>



	<br>





	<div class="row">

		<div  class="col-md-2">

			<label for="">{{ __('Play Store') }}: </label>

			<br>

    		<li class="tg-list-item">              

	            <input class="tgl tgl-skewed" id="play_download" type="checkbox" name="play_download" {{ $setting->play_download == '1' ? 'checked' : '' }} >

	            <label class="tgl-btn" data-tg-off="Disable" data-tg-on="Enable" for="play_download"></label>

            </li>

            <input type="hidden" id="play_download" name="free" value="0" for="play_download" id="play_download"> 

		</div>

		<div  class="col-md-10">



			<label for="promo_text">Link :</label>

            <input value="{{ $setting->play_link }}" name="play_link" placeholder="Enter Link" type="text" class="{{ $errors->has('play_link') ? ' is-invalid' : '' }} form-control">

			

		</div>

		

	</div> --}}













	<div class="row" style="display: none;">

		<div class="col-md-6">

			<br>

			<div class="row">

				<div  class="col-md-6">

					<label for="">{{ __('adminstaticword.RightClick') }}: </label>

					<br>

					<li class="tg-list-item">              

			            <input class="tgl tgl-skewed" id="cb3" type="checkbox" name="rightclick" {{ $setting->rightclick == '0' ? 'checked' : '' }} >

			            <label class="tgl-btn" data-tg-off="Disable" data-tg-on="Enable" for="cb3"></label>

		            </li>

		            <input type="hidden"  name="free" value="0" for="cb3" id="cb3"> 

				</div>

				<div  class="col-md-6">

					<label for="">{{ __('adminstaticword.InspectElement') }}: </label>

					<br>

		    		<li class="tg-list-item">              

			            <input class="tgl tgl-skewed" id="cb4" type="checkbox" name="inspect" {{ $setting->inspect == '0' ? 'checked' : '' }} >

			            <label class="tgl-btn" data-tg-off="Disable" data-tg-on="Enable" for="cb4"></label>

		            </li>

		            <input type="hidden" id="inspect" name="free" value="0" for="cb4" id="cb4">

				</div>

				

			</div>

		</div>

		<div class="col-md-3">

			<br>

        	<label for="">{{ __('adminstaticword.PreloaderEnable') }}: </label>

			<li class="tg-list-item">              

	            <input class="tgl tgl-skewed" id="preloader" type="checkbox" name="preloader_enable" {{ $setting->preloader_enable == '1' ? 'checked' : '' }} >

	            <label class="tgl-btn" data-tg-off="Disable" data-tg-on="Enable" for="preloader"></label>

            </li>

            <input type="hidden"  name="free" value="0" for="preloader" id="preloader">

        </div>

        <div  class="col-md-3">

        	<br>

            <label>{{ __('adminstaticword.APPDebug') }}:</label>

            <br>

            <li class="tg-list-item">              

	            <input class="tgl tgl-skewed" id="debug" type="checkbox" name="APP_DEBUG" {{ env('APP_DEBUG') == true ? "checked" : "" }} >

	            <label class="tgl-btn" data-tg-off="Disable" data-tg-on="Enable" for="debug"></label>

            </li>

            <input type="hidden"  name="free" value="0" for="debug" id="debug">

		</div>

	</div>

	



	



	<div class="row" style="display: none;">

		<div class="col-md-6">

			<div class="row">

				<div class="col-md-6">

					<div >

						<label for="">{{ __('adminstaticword.WelcomeEmail') }}: </label>



						<li class="tg-list-item">              

				            <input class="tgl tgl-skewed" id="welmail" type="checkbox" name="w_email_enable" {{ $setting->w_email_enable == '1' ? 'checked' : '' }} >

				            <label class="tgl-btn" data-tg-off="Disable" data-tg-on="Enable" for="welmail"></label>

			            </li>

			            <input type="hidden"  name="free" value="0" for="welmail" id="welmail">

			          

					</div>

				</div>

				<div class="col-md-6">

					<div >

						<label for="">{{ __('adminstaticword.VerifyEmail') }}: </label>



						<li class="tg-list-item">              

				            <input class="tgl tgl-skewed" id="verify" type="checkbox" name="verify_enable" {{ $setting->verify_enable == '1' ? 'checked' : '' }} >

				            <label class="tgl-btn" data-tg-off="Disable" data-tg-on="Enable" for="verify"></label>

			            </li>

			            <input type="hidden" name="free" value="0" for="verify" id="verify">

			          

					</div>

				</div>

			</div>



			<div>

	            <small>(If you enable it, a welcome email will be sent to user's register email id,<br> make sure you updated your mail setting in Site Setting >> Mail Settings before enable it.)</small>

      			<small class="text-danger">{{ $errors->first('color') }}</small> 

			</div>

			

		</div>

	





    <div class="row"  style="display: none;">

    	



    	<div class="col-md-3">

	    	<label for="">{{ __('Mobile no. on SignUp') }}: </label>

			<li class="tg-list-item">              

	            <input class="tgl tgl-skewed" id="mobile_enable" type="checkbox" name="mobile_enable" {{ $setting->mobile_enable == 1 ? 'checked' : '' }} >

	            <label class="tgl-btn" data-tg-off="Disable" data-tg-on="Enable" for="mobile_enable"></label>

	        </li>

	        <div>

	            <small>(Enable mobile no. on SignUp)</small>

			</div>

    	</div>



    	<div class="col-md-3">

	    	<label for="">{{ __('adminstaticword.DeviceControl') }}: </label>

			<li class="tg-list-item">              

	            <input class="tgl tgl-skewed" id="device_enable" type="checkbox" name="device_enable" {{ $setting->device_control == 1 ? 'checked' : '' }} >

	            <label class="tgl-btn" data-tg-off="Disable" data-tg-on="Enable" for="device_enable"></label>

	        </li>

	        <div>

	            <small>(Enable Device Control on Courses)</small>

			</div>

    	</div>



    	



    	<div class="col-md-3">

	    	<label for="">{{ __('adminstaticword.CookieNotice') }}: </label>

			<li class="tg-list-item">              

	            <input class="tgl tgl-skewed" id="cookie_enable" type="checkbox" name="cookie_enable" {{ $setting->cookie_enable == 1 ? 'checked' : '' }} >

	            <label class="tgl-btn" data-tg-off="Disable" data-tg-on="Enable" for="cookie_enable"></label>

	        </li>

	        <div>

	            <small>(Enable Cookie Notice on Site)</small>

			</div>

    	</div>



    	<div class="col-md-3">

	    	<label for="">{{ __('adminstaticword.IPBlock') }}: </label>

			<li class="tg-list-item">              

	            <input class="tgl tgl-skewed" id="ipblock_enable" type="checkbox" name="ipblock_enable" {{ $setting->ipblock_enable == 1 ? 'checked' : '' }} >

	            <label class="tgl-btn" data-tg-off="Disable" data-tg-on="Enable" for="ipblock_enable"></label>

	        </li>

	        <div>

	            <small>(Enable Ip block on portal)</small>

			</div>

    	</div>





    	



    </div>

    <hr>





   



    	

    </div>



    <hr>





    

	<br>

	<br>

	

	<div class="box-footer">

		<button type="Submit" class="btn btn-lg col-md-3 btn-primary btn-md"><i class="fa fa-save"></i> Save</button>

	</div>



</form>

