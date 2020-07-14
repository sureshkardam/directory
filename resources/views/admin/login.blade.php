@extends('admin.theme.layouts.app') 
@section('content')
<style>
        * {box-sizing: border-box}

/* Style the tab */
.tab {
    float: left;
    border: 1px solid #ccc;
    background-color: #f1f1f1;
    width: 30%;
    height: 300px;
}

/* Style the buttons that are used to open the tab content */
.tab button {
    display: block;
    background-color: inherit;
    color: black;
    padding: 22px 16px;
    width: 100%;
    border: none;
    outline: none;
    text-align: left;
    cursor: pointer;
    transition: 0.3s;
}

/* Change background color of buttons on hover */
.tab button:hover {
    background-color: #ddd;
}

/* Create an active/current "tab button" class */
.tab button.active {
    background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
    float: left;
    padding: 0px 12px;
    border: 1px solid #ccc;
    width: 70%;
    /* border-left: none; */
    /* height: 300px; */
    display: none;
    padding: 30px;
}



    /*======login form======*/

 .login-sec #button-menu {
    line-height: 30px;
    font-size: 24px;
    padding: 15px 22px;
    margin-right: 1280px;
    display: inline-block;
    cursor: pointer;
    color: #6D6D6D;
    border-left: 1px solid #eee;
}
.login-sec #content {
    padding-bottom: 40px;
    transition: all 0.3s;
}
.login-sec .container-fluid {
    padding-left: 20px;
    padding-right: 20px;
}

.login-sec .panel-default {
    border: 1px solid #dcdcdc;
    border-top: 1px solid #dcdcdc;

}

.login-sec .panel {
    margin-bottom: 18px;
    background-color: #fff;
    border:1px solid #00000012;
    border-radius: 0px;
    box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
}
.login-sec .login-area-admin .panel-default .panel-heading {
    color: #3a3a3a;
    border-color: #fed917;
    background: #fed917;
    text-shadow: 0 -1px 0 rgba(50, 50, 50, 0);
}
.login-sec .panel-default .panel-heading {
    color: #4c4d5a;
    border-color: #dcdcdc;
    background: #f6f6f6;
    text-shadow: 0 -1px 0 rgba(50, 50, 50, 0);
}
.login-sec .panel .panel-heading {
    position: relative;
    font-size: 16px;
    padding: 10px 10px;

}
.login-sec .login-area-admin .panel-body {
    padding: 15px 20px 15px;
}

.login-sec .form-group {
    padding: 5px 30px;
    padding-bottom: 15px;
    margin-bottom: 0;
}

.login-sec .form-group+.form-group {
    border-top: 1px solid #ededed;
}

.login-sec .login-area-admin .input-group-addon {
    color: #fff;
    background-color: #2676b3;
    border: none;
    border-radius: 0;
    padding: 0px 15px;
    line-height: 40px;
}

.login-sec .login-area-admin .input-group .form-control {
    position: relative;
    z-index: 2;
    float: left;
    margin-bottom: 0;
    border: solid 1px #ddd;
    margin-left: 7px;
    box-sizing: inherit;
}

.login-sec .help-block a {
    color: #4c4c4c;
    margin-top: 15px;
    display: block;
}

.login-sec .login-area-admin .btn-primary {
       color: #fff;
    background-color: #2676b3;
    border-color: #2676b3;
    padding: 8px 60px;
	    margin-bottom: 15px;
}
.login-sec .panel-heading i.fa.fa-lock {
    padding-right: 10px;
}
.login-sec .panel.panel-default {
    margin-top: -40px;
}


        </style>

    
    <section class="login-sec">
        <div id="container">
            <div id="content" class="login-area-admin">
                <div class="container-fluid"><br>
                    <br>
                    <div class="row">
                        <div class="col-sm-6 offset-sm-3">
                            <div class="panel panel-default">
                                <div class="panel-box">
                                    <h1 class="panel-heading"><i class="fa fa-lock"></i> Please enter your login details.</h1>
                                </div>
								
								@if(Session::has('credential_error'))
                                <div class="panel-body">
                                    <div class="container">
                                      <div class="alert alert-danger">
                                          <p style="margin: 0px;">{{Session::get('credential_error')}}</p>
                                      </div>
                                  </div>
								 @endif  
								  
                                    <form action="{{route('admin.login')}}" enctype="multipart/form-data" method="post">
                                       @csrf
									   <div class="form-group">
                                            <label for="input-username">Email</label>
                                            <div class="input-group"><span class="input-group-addon"><i class="fa fa-user"></i></span>
											 @if(Session::has('appLoginErrors'))
						@foreach(Session::get('appLoginErrors')->get('Email') as $errorMessage)
								<span class="label label-danger">{{$errorMessage}}</span>
						@endforeach
					@endif
                                                <input type="text" name="email" placeholder="Email" id="input-username" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="input-password">Password</label>
											 @if(Session::has('appLoginErrors'))
						@foreach(Session::get('appLoginErrors')->get('Password') as $errorMessage)
								<span class="label label-danger">{{$errorMessage}}</span>
						@endforeach
					@endif
                                            <div class="input-group"><span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                                <input type="password" name="password"  placeholder="Password" id="input-password" class="form-control">
                                            </div>
                                           <!-- <span class="help-block"><a href="#">Forgotten Password</a></span>-->
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary "><i class="fa fa-key"></i> Login</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="clearfix"></div>
@endsection