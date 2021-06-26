<style type="text/css">
	footer{
		/* display: flex;*/
		position: absolute;
		font-size: 22px;
		font-style: normal;
		list-style: none;
		background-image: url("{{asset('background/1.jpg')}}");
		opacity: 0.8;
		background-size: cover;
		width: 100%;
	}

	/*.footer-ambaza{
		display: flex;
	}*/
	.address{
		list-style: none;
		font-size: 22px;
		text-decoration: none;
	}
	.help-link{
		list-style: none;
		font-size: 22px;
		text-decoration: none;
	}
	.social-media{
		list-style: none;
		font-size: 22px;
		text-decoration: none;
	}
	.section1{
		margin-left: 45%;
		text-decoration: none;
		padding: 5%;
		margin-top: 5%;
	}
	.section2{
		margin-left: 40%;
		text-decoration: none;
		padding: 5%;
		margin-top: 5%;
	}
	.section3{
		margin-left: 45%;
		text-decoration: none;
		padding: 5%;
		margin-top: 5%;
	}
	
</style>

<footer>
			<div>
                  <p class="col-xl-12">@lang('Subscribe')</p>
                  <form style="display: flex;" id="subscribeFrom" class="subscribe" action="{{URL::route('site.subscribe')}}" method="POST" enctype="multipart/form-data" >
                    @csrf
                    <input type="email" name="email" class="form-control" required placeholder="@lang('write email')" aria-required="true">
                    <input type="submit" class="btn btn-danger" value="@lang('subscribe')">
                  </form>
                </div> 
			<div class="text-center">
			<div class="col-md-8 footer-ambaza">
				<section class="section1 text-center">
					<h2 class="corner-radius" id="contact">@lang('contact us')</h2>
					<ul class="address">
						<li>
							<a href="">@lang('Adress')</a>
						</li>
			
						<li>
							<a href="">@lang('Phone Number')</a>
						</li>

						<li>
							<a href="">@lang('Email')</a>
						</li>
					</ul>

				</section>
				<section class="col-md-8 col-xl-16 text-center section2">
					<h2 class="">@lang('help links')
					</h2>
					<ul class="help-link">
						<li>
							<a href="{{URL::route('site.faq_view')}}">@lang('FAQ')</a>
						</li>
			
						<li>
							<a href="{{URL::route('site.gallery_view')}}" id="gallery">@lang('Gallery')</a>
						</li>

						<li>
							<a href="{{URL::route('site.contact_us_view')}}">@lang('Contact Us')</a>
						</li>
					</ul>
				</section>
				<section class="col-md-8 col-xl-16 text-center section3">
					<h2 class="" id="help">@lang('Social Media links')
					</h2>
					<ul class="social-media">
						<li>
							<a href="">@lang('Facebook')</a>
						</li>
			
						<li>
							<a href="}">@lang('Instagram')</a>
						</li>

						<li>
							<a href="">@lang('Linkden')</a>
						</li>
						<li>
							<a href="">@lang('Tweeter')</a>
						</li>
					</ul>
				</section>
			</div>
		</div>
		<div class="footer-bottom">
			<div class="col-md-8">
				<div class="text-center">{{config('app.name')}} &copy; {{date('Y')}} || @lang('Developped And Maintained by')
					<a href="" class="site">{{config('app.maintainer')}}</a>
				</div>
			</div>
		</div>
	</footer>