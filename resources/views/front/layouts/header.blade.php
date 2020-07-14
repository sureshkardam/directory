	<header class="header menu_fixed">
		<div id="logo">
			<a href="{{url('/')}}" title="Sparker - Directory and listings template">
				<img src="{{ asset('front/img/logo.png') }}" width="165" height="35" alt="" class="logo_normal">
				<img src="{{ asset('front/img/logo_sticky.png') }}" width="165" height="35" alt="" class="logo_sticky">
			</a>
		</div>
		<ul id="top_menu">
			<li><a href="#." class="btn_add">Add Listing</a></li>
			<li><a href="#sign-in-dialog" id="sign-in" class="login" title="Sign In">Sign In</a></li>
			
		</ul>
		
		<a href="#menu" class="btn_mobile">
			<div class="hamburger hamburger--spin" id="hamburger">
				<div class="hamburger-box">
					<div class="hamburger-inner"></div>
				</div>
			</div>
		</a>
@include('front.layouts.nav')
	</header>