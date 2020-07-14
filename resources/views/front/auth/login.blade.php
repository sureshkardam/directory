<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="SPARKER - Premium directory and listings template by Ansonika.">
    <meta name="author" content="Ansonika">
    <title>Bestbizdeal Business Listing</title>

   
	<!-- Favicons-->
    <link rel="shortcut icon" href="{{ asset('front/img/favicon.ico') }}" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon" href="{{ asset('front/img/apple-touch-icon-57x57-precomposed.png') }}">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="{{ asset('front/img/apple-touch-icon-72x72-precomposed.png') }}">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="{{ asset('front/img/apple-touch-icon-114x114-precomposed.png') }}">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="{{ asset('front/img/apple-touch-icon-144x144-precomposed.png') }}">

    <!-- GOOGLE WEB FONT -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- BASE CSS -->
    <link href="{{ asset('front/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('front/css/style.css') }}" rel="stylesheet">
	<link href="{{ asset('front/css/vendors.css') }}" rel="stylesheet">

    <!-- YOUR CUSTOM CSS -->
    <link href="{{ asset('front/css/custom.css') }}" rel="stylesheet">

</head>

<body id="login_bg">
	
	<nav id="menu" class="fake_menu"></nav>
	
	<div id="login">
		<aside>
			<figure>
				<a href="index.html"><img src="{{ asset('front/img/logo_sticky.svg') }}" width="165" height="35" alt="" class="logo_sticky"></a>
			</figure>
			  <form action="{{route('admin.login')}}" enctype="multipart/form-data" method="post">
                                       @csrf
				
				<div class="form-group">
					<label>Email</label>
					@if(Session::has('appLoginErrors'))
						@foreach(Session::get('appLoginErrors')->get('Email') as $errorMessage)
								<span class="label label-danger">{{$errorMessage}}</span>
						@endforeach
					@endif
					<input type="text" name="email" placeholder="Email" id="input-username" class="form-control" required>
					
					
					<i class="icon_mail_alt"></i>
				</div>
				<div class="form-group">
					<label>Password</label>
					
					 @if(Session::has('appLoginErrors'))
						@foreach(Session::get('appLoginErrors')->get('Password') as $errorMessage)
								<span class="label label-danger">{{$errorMessage}}</span>
						@endforeach
					@endif
					
					<input type="password" name="password"  placeholder="Password" id="input-password" class="form-control">
					
					<i class="icon_lock_alt"></i>
				</div>
				<div class="clearfix add_bottom_30">
					
					<div class="float-right mt-1"><a id="forgot" href="javascript:void(0);">Forgot Password?</a></div>
				</div>
				
				
				<button type="submit" class="btn_1 rounded full-width">
                                    {{ __('Login Now') }}
                                </button>
				
				
				<div class="text-center add_top_10">New to Sparker? <strong><a href="register.html">Sign up!</a></strong></div>
			</form>
			<div class="copy">© 2018 Sparker</div>
		</aside>
	</div>
	
    <script src="{{ asset('front/js/common_scripts.js') }}"></script>
	<script src="{{ asset('front/js/functions.js') }}"></script>
	<script src="{{ asset('front/assets/validate.js') }}"></script>
  
</body>
</html>