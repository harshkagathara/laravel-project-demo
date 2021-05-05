@if(!Session::has('owner_name'))
<script>window.location = "/login";</script>
@else
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="csrf-token" content="50aXtNJ4h5StJCJAaipjwPZlKalNxND2EhnhLlzQ">
      <link rel="icon" href="{{ asset('img/purple_logo.png') }}" type="image/gif" sizes="16x16">
      <title> @yield('Title')</title>
      <link rel="stylesheet" type="text/css" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}" />
      <link rel="stylesheet" type="text/css" href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}" />
      <link rel="stylesheet" type="text/css" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}" />
      <link rel="stylesheet" type="text/css" href="{{ asset('plugins/jqvmap/jqvmap.min.css') }}" />
      <link rel="stylesheet" type="text/css" href="{{ asset('dist/css/adminlte.css') }}" />
      <link rel="stylesheet" type="text/css" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}" />
      <link rel="stylesheet" type="text/css" href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}" />
      <link rel="stylesheet" type="text/css" href="{{ asset('plugins/summernote/summernote-bs4.css') }}" />
     
    
      <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
      <link href="{{ asset('css/res-style.css') }}" rel="stylesheet">
      <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
  <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
  <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
  <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    
      <style>
         ::-webkit-scrollbar{
         display: none;
         }
         .nav-link{
         /* margin-bottom: 0px !important; */
         padding: .1rem 1rem ;
         }      
         /* @media(max-width :992px)
         {
            #main{
            margin-left: 235px ;
            transition: margin-left .5s;
            }
            #mySidenav{
            width: 220px;
            transition: margin-left .5s;
            }
            .table th,
            .table td {
               font-size: small;
            }
            .container-fluid h1{
               font-size: 1.5em;
            }
            .container-fluid p{
               font-size: .8em;
               margin-bottom: 0em;
            }
            .weekDays-selector input[type=checkbox] + label {
               margin-right:15px !important;  
            }
         }
         @media(max-width :768px)
         {
            #main{
            margin-left: 15px ;
            transition: margin-left .3s;
            }
            #mySidenav{
            width: 0px;
            transition: margin-left .3s;
            }
            .table th,
            .table td {
               font-size:smaller;
            }
            .content-header{
               padding: 15px 0.4rem;
            }
            .container-fluid {
               padding-left: 6px;
               padding-right: 6px;
            }
            .container-fluid .togg{
               margin:2px 0px 0px;
               padding: .3rem .7rem ;
            }
            .container-fluid h1{
               font-size: 1.3em;
            }
            .container-fluid p{
               font-size: .7em;
               margin-bottom: 0em;
            }
            .imglogo{
               height:45px;
               width: 45px;
            }
         }
         @media(max-width :600px)
         {
            #main{
            margin: 10px ;
            transition: margin-left .3s;
            }
            .table th,
            .table td {
               font-size:x-small;
            }
            .content-header{
               padding: 12px 0.3rem;
            }
            .container-fluid {
               padding-left: 4.5px;
               padding-right: 4.5px;
            }
            .container-fluid .togg{
               margin:2px 0px 0px;
               padding: 0rem .4rem ;
            }
            i{
               font-size: small;
            }
            .container-fluid h1{
               font-size: 1.1em;
            }
            .container-fluid p{
               font-size: .6em;
            }
            .imglogo{
               height:40px;
               width: 40px;
            }
         } */
         /* @media(max-width :480px)
         {
            #main{
            margin: 5px ;
            transition: margin-left .3s;
            }
            .table th,
            .table td {
               font-size:xx-small;
            }
            .content-header{
               padding: 9px 0.2rem;
            }
            .container-fluid {
               padding-left: 3px;
               padding-right: 3px;
            }
            .container-fluid .togg{
               margin:0px 0px 0px;
               padding: 0rem .3rem ;
            }
            i{
               font-size: x-small;
            }
            .container-fluid h1{
               font-size: .9em;
            }
            .container-fluid p{
               font-size: .5em;
            }
            .imglogo{
               height:35px;
               width: 35px;
            }
         } */
         
          .active1 {
         background-color: #7dd3f6;
         }
         /*
         .nav-item {
         display: inline-block;
         }
         .nav-link p {
         display: block;
         } */
      </style>
   </head>
   <body class="layout-fixed" style="background-image: url('/img/dashboardbg.png');background-attachment:fixed;background-size:cover;

  background-repeat: no-repeat;">
      <div>
      <aside class="main-sidebar sidebar-dark-primary" id="mySidenav"
         style="background:transparent;overflow-y:auto;overflow-x:hidden;z-index: 5;">
         <a href=""    class=" logo-switch" style="display: flex;" >
            <div   class="log1" style="background: white;width: 100px;height: 100px;margin: 20px auto 5px;border-radius: 50%"> 
               <img src="{{ asset('/upload/'.Session::get('reslogo')) }}"  
                  style="width: 100%;height: 100%;border-radius: 50%;" >
            </div>
         </a>
         <p style="color: white;text-align: center;margin-bottom: 30px;">
            <?php echo Session::get('resname'); ?>
         </p>
         <div class="sidebar" style="height: auto;">
            <nav class="mt-2">
               <ul class="nav nav-pills nav-sidebar flex-column "
                  data-widget="treeview" role="menu"
                  >
                  
                  <li class="nav-item {{ (request()->is('restaurant-owner/dashboard*')) ? 'active1' : '' }} ">  
                     <a class="nav-link  "  href="{{route('restaurant-owner.dashboard')}}" style="color: white;">
                        <img src="{{ asset('/img/dashboard.png') }}" height="50px">
                        <p> Dashboard </p>
                     </a>
                  </li>
                  <li class="nav-item {{ (request()->is('restaurant-owner/live-orders*')) ? 'active1' : '' }} ">  
                     <a class="nav-link  "
                        href="{{route('restaurant-owner.live-orders')}}" style="color: white;">
                        <img src="{{ asset('/img/payment.png') }}"  height="40px">
                        <p>
                           Live Requests
                        </p>
                     </a>
                  </li>
                  <li class="nav-item {{ (request()->is('restaurant-owner/orders*')) ? 'active1' : '' }} ">  
                     <a class="nav-link" href="{{route('restaurant-owner.orders')}}" style="color: white;">
                        <img src="{{ asset('/img/follow.png') }}"  height="40px">
                        <p> Follow Up </p>
                     </a>
                  </li>
                  <li class="nav-item {{ (request()->is('restaurant-owner/dishes*')) ? 'active1' : '' }} ">  
                     <a class="nav-link" href="{{route('restaurant-owner.dishes')}}" style="color: white;">
                        <img src="{{ asset('/img/menu.png') }}"  height="40px">
                        <p>Menu </p>
                     </a>
                  </li>
                  <li class="nav-item {{ (request()->is('restaurant-owner/coupons*')) ? 'active1' : '' }} ">  
                     <a class="nav-link" href="{{ route('restaurant-owner.coupons') }}" style="color: white;">
                        <img src="{{ asset('/img/offer.png') }}"  height="40px">
                        <p> Offers & Discount </p>
                     </a>
                  </li>
                  <li class="nav-item {{ (request()->is('restaurant-owner/payment*')) ? 'active1' : '' }} ">  
                     <a class="nav-link" href="{{route('restaurant-owner.payment')}}" style="color: white;">
                        <img src="{{ asset('/img/payment.png') }}"  height="40px">
                        <p> Payment </p>
                     </a>
                  </li>
                  <li class="nav-item {{ (request()->is('restaurant-owner/review*')) ? 'active1' : '' }} ">  
                     <a class="nav-link" href="{{route('restaurant-owner.review')}}" style="color: white;">
                        <img src="{{ asset('/img/reviews.png') }}"  height="40px">
                        <p style="color: white;"> Reviews </p>
                     </a>
                  </li>
                  <li class="nav-item {{ (request()->is('restaurant-owner/location*')) ? 'active1' : '' }} ">  
                     <a class="nav-link" href="{{route('restaurant-owner.location')}}" style="color: white;">
                        <img src="{{ asset('/img/location.png') }}"  height="40px">
                        <p> Location </p>
                     </a>
                  </li>
                  <li class="nav-item {{ (request()->is('restaurant-owner/help*')) ? 'active1' : '' }} ">  
                     <a class="nav-link" href="{{route('restaurant-owner.help')}}" style="color: white;">
                        <img src="{{ asset('/img/chat.png') }}"  height="40px">
                        <p> Chat/Help </p>
                     </a>
                  </li>
                
                  <li class="nav-item has-treeview">
                     <a href="" class="nav-link" style="color: white;margin-left: 7px; height:40px;">
                        <i  class="nav-icon fas fa-cog"></i>
                        <p style="color: white;margin-left: 2px;">   Setting       
                           <i  class="fas fa-angle-left right"></i>
                        </p>
                     </a>
                     <ul class="nav nav-treeview">
                        <li class="nav-item {{ (request()->is('restaurant-owner/setting*')) ? 'active1' : '' }} " style="height:40px;">
                           <a href="{{route('edit.profile')}}" class="nav-link" style="color: white;margin-left: 7px;">
                              <i  class="far fa-circle nav-icon" style="
                              margin-left: 11px;"></i>
                              <p style="color: white;margin-left: 4px;">Profile</p>
                           </a>
                        </li>

                        <li class="nav-item" style="height:40px;">
                           <a href="{{route('edit.profile')}}" class="nav-link" style="color: white;margin-left: 7px;">
                              <i  class="far fa-circle nav-icon" style="
                              margin-left: 11px;"></i>
                              <p style="color: white;margin-left: 4px;">Report</p>
                           </a>
                        </li>
                     </ul>
                  </li>

                  <li  class="nav-item" style="height:40px;margin-top: auto;">
                     <a href="{{ route('logout-res') }}" class="nav-link" style="color: white;margin-left: 7px;"> 
                        <!-- <img src="{{ asset('/img/logout.png') }}"  height="40px" style="color:#89bdee"> -->
                        <i class="nav-icon fa fa-fw fa-power-off fa-rotate-90" style="color:#89bdee;"></i>
                        <p style="color: white;margin-left: 2px;" >
                           Logout
                        </p>
                     </a>
                  </li>
               </ul>
            </nav>
         </div>
      </aside>
      <div class="w3-overlay w3-animate-opacity" onclick="CloseNav()" style="cursor:pointer" id="myOverlay"></div>
      <div class="content-wrapper" id="main" >
         <!-- style="background: #f8eef3;" -->
         @yield('content') 
      </div>
   </div>

      <script src="https://foodlicious.ml/vendor/jquery/jquery.min.js"></script>
      <script src="https://foodlicious.ml/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
      <script src="https://foodlicious.ml/vendor/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
      <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
      <script src="//cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
      <script src="//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.bundle.min.js"></script>
     
      <script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
  
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>  


      <script>
         function showImage(input){
           var file=$("input[type=file]").get(0).files[0];
           if(file)
           {
               var reader = new FileReader();
               reader.onload = function(){
                   $('#show').attr("src",reader.result).attr("width",'150px').attr("height",'150px');
               }
               reader.readAsDataURL(file); 
           }
         }
         
         $(document).ready(function () 
         {
           // $(".gotop").hide();
            $("#cll").hide();
            let z = window.matchMedia("(max-width:768px)");
            if(z.matches)
            {
               $("#open").show();
            }
            else
            {
               $("#open").hide();
            }  
           // $("#btnhide").hide();
           // $("#logo2").hide();
         });
         
         function openNav() 
         {
           document.getElementById("mySidenav").style.width = "67%" ;
           document.getElementById("mySidenav").style.backgroundColor = "#8141a1"; 
           document.getElementById("myOverlay").style.display = "block";
         //   document.getElementById("main").style.marginLeft = "265px";
           // document.getElementById("header").style.marginLeft = "250px";
           //  document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
           $("#open").hide();
           $("#cll").show();
           // $("#logo1").hide();
           // $("#logo2").show();
         }
         
         function CloseNav()
         {
           document.getElementById("mySidenav").style.width = "0";
         //   document.getElementById("main").style.marginLeft= "15px";
             document.getElementById("myOverlay").style.display = "none";
           // document.getElementById("header").style.marginLeft= "0";
           // document.body.style.backgroundColor = "white";
           $("#cll").hide();
           $("#open").show();
           // $("#logo2").hide();
           // $("#logo1").show();
         }
         
        //  $(".nav-item .nav-link").on("click", function(e) {
         
        //  if($(this).attr('href') == '#'){
        //    // href url is not specified, assuming its an ajax call 
        //    // If not you can remove this
        //    e.preventDefault();
        //  }
        //  // // Remove all active classes
        //  $('.nav-item .nav-link').removeClass('active1');
         
        //  // Add active class for the current item
        //  $(this).addClass("active1");
        //  });
      function myfunction(X)
      {
         if(x[0].matches)
         {
           $("#open").show();
         // document.getElementById("open").show();
         // document.getElementById("open").style.display="inline";
         // document.getElementById("mySidenav").style.width="0px";
         // document.getElementById("main").style.marginLeft="15px";
            $('.btn').addClass("btn-sm");
            
            if(x[1].matches)
            {
               $('.btn').addClass("btn-xs");
            }
            else
            {
               $('.btn').removeClass("btn-xs");
            }
         }
         else
         {
            $("#open").hide();
            // document.getElementById("mySidenav").style.width="250px";
            // document.getElementById("main").style.marginLeft="265px";
            $('.btn').removeClass("btn-sm");
         }
      } 
        
      let x = [window.matchMedia("(max-width:768px)"),window.matchMedia("(max-width:600px)")];  
     
      for ( let i =0; i < x.length; i++ )
      {
         myfunction(x[i]);
         x[i].addListener(myfunction);
      }
      </script>
      @yield('scripts')
   </body>
</html>

<!-- <script>
	$(function() {
		$("#table-data").DataTable({
			"responsive": true,
			"autoWidth": false,
		});
	
	});
	</script> -->
@endif