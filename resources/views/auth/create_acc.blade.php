<!DOCTYPE html>
<html lang="en">
<head>
  <title>Registration</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="{{ asset('js/login-js.js') }}" ></script>
  <link href="{{ asset('css/login-style.css') }}" rel="stylesheet">
  <style>
.alert-danger{
  color: #721c24;
    background-color: #f8d7da;
    border-color: #f5c6cb;
  }
  .alert{
    position: relative;
    padding: .75rem 1.25rem;
    margin-bottom: 1rem;
    border: 1px solid transparent;
    border-radius: .25rem;
  }

 

</style>
<script>
 

 window.onload = function() {
  window.setTimeout(fadeout, 1000); //8 seconds
}
function fadeout() {
  document.getElementById('myAlert').style.display = 'none';
}
 

 
  </script>
</head>
<body>

<!-- <div class="container"> -->
   
<div  class="b">
  <img src="{{ asset('/img/Login_size1.png') }}" style="max-width: 100%;" >
<div class="con">
<div class="log1">
<img src="{{ asset('/img/purple_logo.png') }}" style="text-align: center;width: 100px;height: 100px;">
</div>
<div class="log" >
<h1>REGISTERATION</h1>
<!-- <p>Login to your account to manage all the services and explore our tools.</p> -->
<span id="notification"></span>

<section id="signup-form" class="signup-container">

  <form  method="POST" action="create">
    @csrf
 
   
    
      @if (Session::has('msg'))
  <div class="alert alert-danger" id="myAlert" >
      {{Session::get('msg')}} 
    
  </div>
  @endif
      
  
      
    <div class="form-group row">
      <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
      <div class="col-md-6">
          <input id="name" type="text" class="form-control" name="name" value="" 
          placeholder="Please enter your Name" required  autofocus >
      </div>
    </div>
    <div class="form-group row">
      <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

      <div class="col-md-6">
          <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" 
          placeholder="Please enter your email address" required autocomplete="email" >

          @error('email')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
      </div>
  </div>
  <div class="form-group row">
    <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Phone No') }}</label>
    <div class="col-md-6">
        <input id="phone" type="text" class="form-control" name="phone" value="" 
        placeholder="Please enter your Phone Number" required  >
    </div>
  </div>
  <div class="form-group row">
    <label for="type" class="col-sm-3 col-form-label">Type
    </label>
    <select name="type" class="col-sm-9 form-control select2" id="type">
                    <option value="user">
        user</option>
                    <option value="owner">
        owner</option>
                  </select>
  </div>
  <div class="form-group row">
    <label for="password" class="col-md-4 col-form-label text-md-right" >{{ __('Password') }}</label>

      <div class="col-md-6">
        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" 
        placeholder="Please enter your password" required autocomplete="current-password">

        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>


    <!-- <div class="form-group form-check">
      <label class="form-check-label">
        <input class="form-check-input" type="checkbox" name="remember"> Remember me
      </label>
    </div> -->
    <div class="form-group row ">
      <div class="col-md-8 offset-md-4">
          <button type="submit" class="btn btn-primary" style="font-weight: 600;">
              {{ __('Register') }}
          </button>
      </div>
  </div>
  <div class="form-group row">
    <div class="col-md-6 offset-md-4">
        <a class="btn btn-link" href="{{route('auth.login')}}" style="margin-top: 10px;float:right;color:#8141a1;text-decoration: none;
                font-weight: bold;">
                {{ __('Already Have An Account? LOGIN') }}
        </a>
    </div>
</div>
<!-- </div> -->
</section>

<section id="signup-message" class="message"></section>
</div>
</div>
</div>
</body>
</html>
