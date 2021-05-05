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
                    <form role="form" id="createForm" method="POST" action="create_patnerwithus"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div style="padding: auto 0px;">
                                <h1 class="mb-3 text-center text-light " style="background: #8141a1; border-radius: 3px;">Partner with us </h1>
                            </div>
                            <div class="form-group row">
                                
                                <label for="restaurant_id" class="col-sm-3 col-form-label">Restaurant name
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="col-sm-9 input-wrapper">
                                    <input name="name" id="name" placeholder="Restaurant name" class="form-control"
                                        style="width: 100%;">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="address" class="col-sm-3 col-form-label">Restaurant addrerss
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="col-sm-9 input-wrapper">
                                    <input type="text" placeholder="Restaurant address" class="form-control"
                                        name="address" id="address" value="" />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="first_name" class="col-sm-3 col-form-label">First Name
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="col-sm-9 input-wrapper">
                                    <input type="text" class="form-control" name="first_name" id="first_name"
                                        placeholder="First name" value="" />
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="sur_name" class="col-sm-3 col-form-label">Surname
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="col-sm-9 input-wrapper">
                                    <input type="text" class="form-control" name="sur_name" id="sur_name"
                                        placeholder="Surname" value="" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="phone" class="col-sm-3 col-form-label">Mobile number
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="col-sm-9 input-wrapper">
                                    <input type="tel" placeholder="Moblie number" class="form-control" name="phone"
                                        id="phone" value="" />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="res_phone" class="col-sm-3 col-form-label">Restaurant number
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="col-sm-9 input-wrapper">
                                    <input type="number" placeholder="Restaurant number" class="form-control"
                                        name="res_phone" id="res_phone" value="" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-sm-3 col-form-label"> Email address
                                </label>
                                <div class="col-sm-9 input-wrapper">
                                    <input type="email" placeholder="Email address" class="form-control" name="email"
                                        id="email" value="" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="no_of_loc" class="col-sm-3 col-form-label">
                                    Number of locations
                                </label>
                                <div class="col-sm-9 input-wrapper">
                                    <input type="number" placeholder="Number of locations" class="form-control"
                                        name="no_of_loc" id="no_of_loc" value="0" step="1" min="0" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="type_of_cuisine" class="col-sm-3 col-form-label">Type of cuisine
                                </label>
                                <div class="col-sm-9 input-wrapper">
                                    <select class="form-control" name="type_of_cuisine" id="type_of_cuisine">
                                        <option disabled selected>Select cuisine</option>
                                        <option>American</option>
                                        <option>Asian</option>
                                        <option>Indian</option>
                                        <option>Italian</option>
                                        <option>Cake & Bakery</option>
                                        <option>Middle easten</option>
                                        <option>Healthy</option>
                                        <option>Mediterranean</option>
                                    </select>
                                </div>
                            </div>

                            <!-- /.card-body -->
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
    <!-- /.row -->

<!-- <script>

var telInput = $("#phone"),
  errorMsg = $("#error-msg"),
  validMsg = $("#valid-msg");

// initialise plugin
telInput.intlTelInput({

  allowExtensions: true,
  formatOnDisplay: true,
  autoFormat: true,
  autoHideDialCode: true,
  autoPlaceholder: true,
  defaultCountry: "auto",
  ipinfoToken: "yolo",

  nationalMode: false,
  numberType: "MOBILE",
  //onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
  preferredCountries: ['sa', 'ae', 'qa','om','bh','kw','ma'],
  preventInvalidNumbers: true,
  separateDialCode: true,
  initialCountry: "auto",
  geoIpLookup: function(callback) {
  $.get("http://ipinfo.io", function() {}, "jsonp").always(function(resp) {
    var countryCode = (resp && resp.country) ? resp.country : "";
    callback(countryCode);
  });
},
   utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.9/js/utils.js"
});

var reset = function() {
  telInput.removeClass("error");
  errorMsg.addClass("hide");
  validMsg.addClass("hide");
};

// on blur: validate
telInput.blur(function() {
  reset();
  if ($.trim(telInput.val())) {
    if (telInput.intlTelInput("isValidNumber")) {
      validMsg.removeClass("hide");
    } else {
      telInput.addClass("error");
      errorMsg.removeClass("hide");
    }
  }
});

// on keyup / change flag: reset
telInput.on("keyup change", reset);



</script> -->
</body>

</html>