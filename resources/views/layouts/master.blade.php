
@if(!Session::has('admin_name'))
<script>window.location = "/login";</script>

   @else
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="N6hWRtWw0Zaybils5PkjcsX1T97PCFINzwHJF2pG">
    <title> 
      @yield('Title')
  </title>
	
  <link rel="icon" href="{{ asset('img/purple_logo.png') }}" type="image/gif" sizes="16x16">


    <!-- -->
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}" />
    <!-- <link rel="stylesheet" type="text/css" href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}" /> -->
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/jqvmap/jqvmap.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('dist/css/adminlte.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/summernote/summernote-bs4.css') }}" />
  

  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
  <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
  <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
  <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
  <style>
    .sidebar a{
      color: white !important;
    }
    ::-webkit-scrollbar{
      display: none;
    }
    nav-link{
         /* margin-bottom: 0px !important; */
         padding: .1rem 1rem ;
         }   
/* @media(max-width :1200px)
{
  .imglist{
    height:65px;
    width:110px;
  }
}
@media(max-width :992px)
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
  .weekDays-selector input[type=checkbox] + label {
      margin-right:15px !important;  
  }
  .card-header {
    padding: 0.70rem 1.1rem;
  }
  .card-body{
    padding: 1.1rem;
  }
  .imglist{
    height:60px;
    width:100px;
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
  .card-header {
    padding: 0.65rem .95rem;
  }
  .card-body{
    padding: .95rem;
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
      font-size: 1.5em;
  }
  .container-fluid p{
      font-size: .8em;
      margin-bottom: 0em;
  }
  .imglogo{
      height:45px;
      width: 45px;
  }
  .imglist{
    height:55px;
    width:90px;
  }
}
@media(max-width :600px)
{
  #main{
  margin: 10px ;
  transition: margin-left .3s;
  }
  .card-header {
    padding: 0.6rem .8rem;
  }
  .card-body{
    padding: .8rem;
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
      font-size: 1.3em;
  }
  .container-fluid p{
      font-size: .6em;
  }
  .imglogo{
      height:40px;
      width: 40px;
  }
  .imglist{
    height:50px;
    width:80px;
  }
}
@media(max-width :480px)
{
  #main{
  margin: 5px ;
  transition: margin-left .3s;
  }
  .card-header {
    padding: 0.55rem .65rem;
  }
  .card-body{
    padding: .65rem;
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
      padding: 0rem .3rem !important;
  }
  i{
      font-size: x-small;
  }
  .container-fluid h1{
      font-size: 1em;
  }
  .container-fluid p{
      font-size: .4em;
  }
  .imglogo{
      height:35px;
      width: 35px;
  }
  .imglist{
    height:45px;
    width:70px;
  }
} */
.active1 {
         background-color: #7dd3f6;
         }
  </style>

<!-- <body class="layout-fixed layout-navbar-fixed" style="background-image: url('/img/Restaurant-Panel.png');background-attachment: fixed;"> -->
<body class="layout-fixed" style="background-image: url('/img/dashboardbg.png');background-attachment:fixed;background-size:cover;

  background-repeat: no-repeat;">
    <!-- <aside class="main-sidebar sidebar-dark-primary  " style="background: transparent;overflow-y:auto ;
    overflow-x: hidden;"> -->
    <aside class="main-sidebar sidebar-dark-primary" id="mySidenav"
         style="background:transparent;overflow-y:auto;overflow-x:hidden;z-index: 5;">
      <a href=""    class="logo-switch"  style="display: flex;" >
          
            <div   class="log1" style="background: white;width: 100px;height: 100px;margin: 20px auto 30px;border-radius: 50%;">
              <img src="{{ asset('/img/purple_logo.png') }}" style="width: 100%;height: 100%;border-radius: 50%;">
            </div>
            
      </a>
            

            <div class="sidebar" style="height: auto;">
				<nav class="mt-2">
       
					<ul class="nav nav-pills nav-sidebar flex-column " data-widget="treeview" role="menu">
                  <li class="nav-item {{ (request()->is('admin/dashboard*')) ? 'active1' : '' }} ">  
                            <a href="{{route('admin.dashboard')}}" class="nav-link">
                              <i class="nav-icon fas fa-th" ></i>
                              <p >
                                Dashboard
                              </p>
                            </a>
                          </li>
						<li class="nav-item has-treeview">
                            <a href="" class="nav-link">
                                <i class="nav-icon fas fa-store" ></i>
                                <p >
                                  Restaurants
                                  <i class="fas fa-angle-left right"></i>
                                
                                </p>
                              </a>
                              <ul class="nav nav-treeview">
                              <li class="nav-item {{ (request()->is('admin/restaurants*')) ? 'active1' : '' }} "> 
                                  <a href="{{route('admin.restaurants')}}"  class="nav-link">
                                    <i  class="far fa-circle nav-icon"></i>
                                    <p >Restaurants List</p>
                                  </a>
                                </li>
                              <li class="nav-item {{ (request()->is('admin/restaurant/create*')) ? 'active1' : '' }} "> 
                                  <a href="{{route('admin.restaurant.create')}}" class="nav-link">
                                    <i  class="far fa-circle nav-icon"></i>
                                    <p >Create Restaurant </p>
                                  </a>
                                </li>
                              
                              </ul>
						</li>
					  <li class="nav-item {{ (request()->is('admin/orders*')) ? 'active1' : '' }} "> 
                            <a href="{{route('admin.orders')}}" class="nav-link">
                                <i  class="nav-icon fas fa-receipt"></i>
                                <p >
                                  Request
                                </p>
                              </a>
						</li>
						<li class="nav-item has-treeview">
                            <a href="" class="nav-link">
                                <i  class="nav-icon fas fa-utensils"></i>
                                <p >
                                  Dishes
                                  <i  class="fas fa-angle-left right"></i>
                                
                                </p>
                              </a>
                              <ul class="nav nav-treeview">
                             	  <li class="nav-item {{ (request()->is('admin/dishes*')) ? 'active1' : '' }} "> 
                                  <a href="{{route('admin.dishes')}}" class="nav-link">
                                    <i  class="far fa-circle nav-icon"></i>
                                    <p >Dishes List</p>
                                  </a>
                                </li>
                             	  <li class="nav-item {{ (request()->is('admin/dish/create*')) ? 'active1' : '' }} "> 
                                  <a href="{{route('admin.dish.create')}}" class="nav-link">
                                    <i  class="far fa-circle nav-icon"></i>
                                    <p >Create Dish </p>
                                  </a>
                                </li>
                              
                              </ul>
						</li>
						<li class="nav-item has-treeview">
                            <a class="nav-link nav-item" href="" >
                                <i  class=" nav-icon far fas fa-fw fa-utensils "></i>
                                    <p >
                                        Dish Categories
                                <i class="fas fa-angle-left right"></i>
                                    </p>
                            </a>
							<ul class="nav nav-treeview">
                            	  <li class="nav-item {{ (request()->is('admin/dish_categories*')) ? 'active1' : '' }} "> 
                                    <a class="nav-link" href="{{route('admin.dish_categories')}}">
                                        <i  class="far fa-fw fa-circle "></i>
                                            <p >
                                                Categories List
                                            </p>
                                    </a>
                                </li>
                            	  <li class="nav-item {{ (request()->is('admin/dish_category/create*')) ? 'active1' : '' }} "> 
                                    <a class="nav-link" href="{{route('admin.dish_category.create')}}">
                                        <i  class="far fa-fw fa-circle "></i>
                                            <p  >
                                            Create Category
                                            </p>
                                    </a>
                                </li>
							</ul>
						</li>
						<li class="nav-item has-treeview ">
							<a class="nav-link  nav-item " href=""> <i   class="nav-icon far fas fa-fw fa-utensils "></i>
								<p  > Addons <i  class="fas fa-angle-left right"></i> </p>
							</a>
                            <ul class="nav nav-treeview">
                              <li class="nav-item {{ (request()->is('admin/addons*')) ? 'active1' : '' }} "> 
                                  <a class="nav-link" href="{{ route('admin.addons') }}"> <i   class="far fa-fw fa-circle "></i>
                                    <p   > Addons List </p>
                                  </a>
                                </li>
                                <li class="nav-item {{ (request()->is('admin/addon/category*')) ? 'active1' : '' }} "> 
                                  <a class="nav-link  " href="{{ route('admin.addoncategory') }}"> <i   class="far fa-fw fa-circle "></i>
                                    <p   > Addon Category List </p>
                                  </a>
                                </li>
                              </ul>
						</li>
            <li class="nav-item {{ (request()->is('admin/coupons*')) ? 'active1' : '' }} "> 
                            <a href="{{ route('admin.coupons') }}" class="nav-link">
                                <i  class="nav-icon far fas fa-tags"></i>
                                <p >
                                  Manage Coupons
                                </p>
                              </a>
						</li>
                        <li class="nav-header" style="font-size: 20px;" >Account Setting</li>
                        <li class="nav-item has-treeview">
                            <a href="#"  class="nav-link">
                              <i   class="nav-icon fas fa-users"></i>
                              <p >
                                Users
                                <i class="fas fa-angle-left right"></i>
                              
                              </p>
                            </a>
                            <ul class="nav nav-treeview">
                              <li class="nav-item">
                                <a href="{{route('admin.customers')}}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p >Wepppies</p>
                                </a>
                              </li>
                              <li class="nav-item">
                                <a href="{{route('admin.owners')}}" class="nav-link">
                                  <i  class="far fa-circle nav-icon"></i>
                                  <p >Restaurant Owners </p>
                                </a>
                              </li>
                            
                            </ul>
                          </li>
						  <li class="nav-item">
                            <a href="pages/widgets.html" class="nav-link">
                              <i  class="nav-icon fas fa-cog"></i>
                              <p >
                               Settings
                              </p>
                            </a>
                          </li>
                          <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                              <i  class="nav-icon fas fa-sliders-h"></i>
                              <p >
                                Notifications
                                <i class="fas fa-angle-left right"></i>
                              
                              </p>
                            </a>
                            <ul class="nav nav-treeview">
                              <li class="nav-item">
                                <a href="pages/layout/top-nav.html" class="nav-link">
                                  <i  class="fa fas fa-envelope-open"></i>
                                  <p >Send PUsh Notifications</p>
                                </a>
                              </li>
                            </ul>
                          </li>
                          <li class="nav-item">
                            <a href="{{ route('logout-res') }}" class="nav-link">
                              <i class="nav-icon fa fa-fw fa-power-off fa-rotate-90" style="color:#89bdee"></i>
                              <p >
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
			<!-- <div class="content-header">
				<div class="container-fluid">
					<h1 class="m-0 text-dark">Addons - Total (9)</h1> </div>
			</div>
			
            <section class="content" > -->
                @yield('content')
              <!-- </section> -->
		</div>
        <!-- <footer class="main-footer">
            <strong>Copyright &copy; 2021-2022 <a href="https://www.infusion-infotech.com">Infusion Infotech</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
              <b>Version</b> 1.0.0
            </div>
          </footer> -->
        
          <!-- Control Sidebar -->
          <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
          </aside>
	<!-- </div> -->
	
<script src="{{ asset('/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<script src="{{ asset('/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('/plugins/sparklines/sparkline.js') }}"></script>
<script src="{{ asset('/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
<script src="{{ asset('/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<script src="{{ asset('/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('/plugins/daterangepicker/daterangepicker.js') }}"></script>
<script src="{{ asset('/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<script src="{{ asset('/plugins/summernote/summernote-bs4.min.js') }}"></script>
<script src="{{ asset('/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<script src="{{ asset('/dist/js/adminlte.js') }}"></script>
<script src="{{ asset('/dist/js/pages/dashboard.js') }}"></script>
<script src="{{ asset('/dist/js/demo.js') }}"></script>

<script src="https://foodlicious.ml/vendor/jquery/jquery.min.js"></script>
<script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="//cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
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
         if(x.matches)
         {
           $("#open").show();
         // document.getElementById("open").show();
         // document.getElementById("open").style.display="inline";
         // document.getElementById("mySidenav").style.width="0px";
         // document.getElementById("main").style.marginLeft="15px";
         $('.btn').addClass("btn-xs");
         }
         else
         {
            $("#open").hide();
            // document.getElementById("mySidenav").style.width="250px";
            // document.getElementById("main").style.marginLeft="265px";
            $('.btn').removeClass("btn-xs");
         }
      } 
        
      var x = window.matchMedia("(max-width:768px)")
      myfunction(x)
      x.addListener(myfunction)   

	// $(function() {
	// 	$("#table-data").DataTable({
	// 		"responsive": true,
	// 		"autoWidth": false,
	// 	});
	
	// });
	</script>
</body>

</html> 

@endif