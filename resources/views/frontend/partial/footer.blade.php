<style type="text/css">
	footer{
		/* display: flex;*/
		
		font-size: 22px;
		font-style: normal;
		list-style: none;
		background-image: url("{{asset('background/1.jpg')}}");
		opacity: 0.8;
		backface-visibility: all;
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
		margin-left: 30%;
		text-decoration: none;
		padding: 5%;
		margin-top: 5%;
	}
	.section2{
		margin-left: 30%;
		text-decoration: none;
		padding: 5%;
		margin-top: 5%;
	}
	.section3{
		margin-left: 30%;
		text-decoration: none;
		padding: 5%;
		margin-top: 5%;
	}
	
</style>
<br><br>
<div class="container-fluid">
<footer>
			<div>
                  <p></p>
                  <form style="display: flex;" id="subscribeFrom" class="subscribe" action="{{URL::route('site.subscribe')}}" method="POST" enctype="multipart/form-data" >
                    @csrf
                    <input type="email" name="email" class="form-control" required placeholder="@lang('votre e-mail')" aria-required="true">
                    <input type="submit" class="btn btn-danger" value="@lang('S\'abonner')">
                  </form>
                </div> 
			<div class="text-center container-fluid">
			<div class="col-md-8 footer-ambaza">
				<section class="section1 text-center">
					<h2 class="corner-radius" id="contact">@lang('Nous travaillons:')</h2>
					<ul class="address container-fluid">
						<li>
							@lang('Lundi : 24h/24h')
						</li>
						<li>
							@lang('Mard : 24h/24h')
						</li>
						<li>
							@lang('Mercredi : 24h/24h')
						</li>
						<li>
							@lang('Jeudi : 24h/24h')
						</li>
						<li>
							@lang('Vendredi : 24h/24h')
						</li>
						<li>
							@lang('Samedi : 24h/24h')
						</li>
						<li>
							@lang('Dimanche : 24h/24h')
						</li>
					</ul>

				</section>
				<section class="col-md-8 col-xl-16 text-center section2">
					<h2 class="">@lang('Hotel')
					</h2>
					<ul class="help-link">
						<li>
							<a href="{{URL::route('site.faq_view')}}">@lang('FAQ')</a>
						</li>
			
						<li>
							<a href="{{URL::route('site.gallery_view')}}" id="gallery">@lang('Gallerie')</a>
						</li>

						<li>
							<a href="{{URL::route('site.contact_us_view')}}">@lang('Contactez-nous')</a>
						</li>
					</ul>
				</section>
				<section class="col-md-8 col-xl-16 text-center section3">
					<h2 class="" id="help">@lang('Réseaux sociaux')
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
							<a href="">@lang('Twitter')</a>
						</li>
					</ul>
				</section>
			</div>
		</div>

				<div style="text-align: center;">{{config('app.name')}} &copy; {{date('Y')}} || @lang('Tous les droits sont réservés || ')
					<a href="mailto:ambazamarcellin2001@gmail.com" class="site">{{config('app.maintainer')}}</a>
				</div>
			

	</footer>
</div>