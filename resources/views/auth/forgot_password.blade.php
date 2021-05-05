<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
     <link href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.9/css/intlTelInput.css" rel="stylesheet" media="screen">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.9/js/intlTelInput.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.9/js/intlTelInput.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.9/js/utils.js"></script>
    <style>
        body {
            width: 810px;
            margin: auto;
            background-image: url('mainbg.png');
            background-repeat: no-repeat;

        }

        label {
            font-weight: bold;
        }

        .card-body {

            -webkit-box-shadow: 2px 1px 21px -9px rgba(0, 0, 0, 0.38);
            -moz-box-shadow: 2px 1px 21px -9px rgba(0, 0, 0, 0.38);
            box-shadow: 2px 1px 21px -9px rgba(0, 0, 0, 0.38);

        }

        h1 {
        
            font-weight: 600;
            text-align: center;
            line-height: 1.7;
            
            
        }
        @media(max-width: 480px) 
        {
        h1{
            font-size: 2rem;
        }
            label
            {
                display: none;
            }
        }
    </style>
</head>

<body>

    <div class="content-header">

        <div class="container-fluid">
            <div class="toggl">
                <a class="nav-link togg" data-widget="" id="cll" onclick="CloseNav();">
                    <i class="fas fa-bars"></i>
                    <span class="sr-only">Toggle navigation</span>
                </a>
                <a class="nav-link togg" data-widget="" id="open" onclick="openNav();">
                    <i class="fas fa-bars"></i>
                    <span class="sr-only">Toggle navigation</span>
                </a>
            </div>
            
        </div>
    </div>
    <!-- <div class="content"> -->
    <div class="container-fluid ">
        <!-- Small boxes (Stat box) -->
        <div class="row ">
            <div class="col-12">
                <!-- jquery validation -->
                <div class="card " style="margin-top: 10px;">

                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" id="createForm" method="POST" action="create_forgot_pass"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div style="padding: auto 0px;">
                                <h1 class="mb-3 text-center text-light " style="background: #8141a1; border-radius: 3px;">Forgot Password  </h1>
                            </div>
                            <div class="form-group row">
                                
                                <label for="restaurant_id" class="col-sm-3 col-form-label">Email 
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="col-sm-9 input-wrapper">
                                    <input name="email" type="email" id="email" placeholder="Your Email Id" class="form-control" required
                                        style="width: 100%;">
                                        <span class="invalid-feedback" id="msg-login" role="alert">
                                            @if (Session::has('msg'))
                                        <div class="alert alert-success">
                                            {{Session::get('msg')}} 
                                        </div>
                                        @endif
                                            </span>
                                </div>
                               
                            </div>
                   
                            <div class="card-footer bg-white text-center">
                                <button type="submit" class="btn w-75"
                                    style="background: #8141a1; color: white;line-height: 1.8;">Submit</button>
                            </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
        </div>
        <!-- ./col -->
    </div>

</body>

</html>