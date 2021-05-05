<!DOCTYPE html>
<html lang="en-US">

<head>
    <title>Sign In</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="js/login-"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
        integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link href="login-style.css" rel="stylesheet">
    <link href="{{ asset('css/login-sec.css') }}" rel="stylesheet">
    <link rel="icon" href="{{ asset('img/purple_logo.png') }}" type="image/gif" sizes="16x16">
    <style>
.alert {
  padding: 8px;
  background-color: #7dd3f6;
  color: #8141a1;
  border-radius: 6px;
}

.closebtn {
  margin-left: 15px;
  color: #8141a1;
  font-weight: bold;
  float: right;
  font-size: 22px;
  line-height: 20px;
  cursor: pointer;
  transition: 0.3s;
}

.closebtn:hover {
  color: black;
}
.fade{
    transition: opacity 0.15s linear;
}
</style>

</head>

<body>

    <div class="row">
        <div class="column1">
            <div class="row1">
                <div class="log">
                    <img src="{{ asset('img/purple_logo.png')}}" style="text-align:center;width:100px;height:100px;">
                </div>
                <div class="bgcover">
                    <div class="log1">
                        <h1 style="text-transform: uppercase;-webkit-transform: scaleX(0.95);
                        transform: scaleX(0.95);color: white;">WELCOME BACK!</h1>
                        <p style="margin-top:-1em;font-size:small;color:#7dd3f6;">Login to your account to manage all the services and
                            explore our tools.</p>
                       
                        @if (Session::has('msg'))
                        <div class="alert fade" id="success-alert">
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
  <strong id="mynoti">{{ (Session::get('msg')) }}</strong>
</div> 

@endif 
<script>
    setTimeout(function() {
        document.getElementById("success-alert").style.display = "none";
}, 2000); 

   

</script>
                        <section id="signup-form" class="signup-container">

                            <form method="POST" action="check">

                            @csrf
                                <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right" style="color:#7dd3f6;">E-Mail
                                        Address</label>

                                    <div class="col-md-6">
                                        <input id="email" type="text"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="" placeholder="Please enter your email address" required
                                            autocomplete="email" autofocus>


                                        

                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password"  style="color:#7dd3f6;"z
                                        class="col-md-4 col-form-label text-md-right control-label">Password</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            value="" placeholder="Please enter your password" required
                                            autocomplete="current-password">
                                            
                                        <span class="field-icon"><i class="fas fa-eye-slash showpwd"
                                                onClick="showPwd('password', this)"></i></span>

                                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-6 offset-md-4">
                                        <div class="form-check" style="margin-top: 10px;font-size: 12px;">
                                            <input class="form-check-input" type="checkbox" name="remember"
                                                id="remember" style="margin-top: -1px;">

                                            <label style="display:inline; color:#7dd3f6; font-weight:100; "
                                                class="form-check-label" for="remember">
                                                Remember my password
                                            </label>

                                            <a class="btn btn-link" href="{{ route('forgot.password') }}" style=" float: right;color: #7dd3f6;text-decoration: none;
                                        font-weight: bold;">
                                                Forgot Password?
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row ">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn btn-primary" style="font-weight: 600;">
                                            Proceed
                                        </button>
                                    </div>
                                </div>

                                <!-- <div class="form-group row">
                                    <div class="col-md-6 offset-md-4">
                                        <a class="btn btn-link" href="#" style="margin-top:10px;float:right;color:#8fe6ef;text-decoration: none;
                                        font-weight: bold;">
                                            Create Account
                                        </a>
                                    </div>
                                </div> -->
                            </form>
                        </section>

                        <section id="signup-message" class="message"></section>
                    </div>
                </div>

            </div>

        </div>
        <div class="column2">
            <div class="row">
                <ul>
                    <li><a href="#home" style="margin-top:15px;">HOME</a></li>
                    <li><a href="#news" style="margin-top:15px;">ABOUT US</a></li>
                    <li><a href="#contact" style="margin-top:15px;">TERMS & CONDITIONS</a></li>
                    <li class="lastlist"><a class="active" href="{{route('auth.patnerwithus')}}">Become our Partner</a></li>
                </ul>
            </div>
            <div class="row2">
                <h1 style="font-weight:800; font-size:40px; padding-top: 50px;line-height: 40px;text-transform: uppercase;-webkit-transform: scaleX(0.9);
                transform: scaleX(0.9);">Take Wepppis</h1>
                <h2
                    style="text-align:center;font-weight:800; font-size:30px;line-height: 5px;text-transform: uppercase;color:#7dd3f6;">
                    with you!</h2>
                <p style=" padding-top: 10px;"><span>Request a table,invite your friends,select your
                        preferences</span><span>pay and enjoy your meal</span><br></p>
            </div>
            <div class="botcontainer">

                <p style="font-weight:bold;padding-top: 0px;">Have you got the app?</p>
                <img src="{{ asset('img/playstore.png')}}" alt="playstore" class="playstore">
                <img src="{{ asset('img/app-store.png')}}" alt="appstore" class="appstore">

            </div>
        </div>
    </div>

    <script>
        function showPwd(id, el) {
            let x = document.getElementById(id);
            if (x.type === "password") {
                x.type = "text";
                el.className = 'far fa-eye showpwd';
            } else {
                x.type = "password";
                el.className = 'fas fa-eye-slash showpwd';
            }
        }
    </script>
</body>

</html>