@extends('layouts.master-res')

@section('Title')
    Dashboard |Restaurant-Owner
@endsection


@section('content')
<style>
    .switch {
      position: relative;
      display: inline-block;
      width: 45px;
      height: 23px;
    }
    
    .switch input { 
      opacity: 0;
      width: 0;
      height: 0;
    }
    
    .slider {
      position: absolute;
      cursor: pointer;
      top: 0;
      left: -2px;
      right: 0;
      bottom: 0;
      background-color: #ccc;
      -webkit-transition: .4s;
      transition: .4s;
    }
    
    .slider:before {
      position: absolute;
      content: "";
      height: 18px;
      width: 18px;
      left: 1px;
      bottom: 2.5px;
      background-color: white;
      -webkit-transition: .4s;
      transition: .4s;
    }
    
    input:checked + .slider {
      background-color: #8141a1;
    }
    
    input:focus + .slider {
      box-shadow: 0 0 1px #2196F3;
    }
    
    input:checked + .slider:before {
      -webkit-transform: translateX(26px);
      -ms-transform: translateX(26px);
      transform: translateX(26px);
    }
    
    /* Rounded sliders */
    .slider.round {
      border-radius: 34px;
    }
    
    .slider.round:before {
      border-radius: 50%;
    }
    .btn-sm{
        border-radius:50%;
      /* background-color: #f3dce8  ; */
    }
    .card-header a{
        border-bottom: 2px solid transparent;
        color: gray ;
    }
    .card-header a:hover{
        border-bottom: 2px solid #7dd3f6;
        color: black ;
    }
    .card-header a:focus{
        border-bottom: 2px solid #7dd3f6;
    }
    /* #food:focus{
        border-bottom: 2px solid #7dd3f6;
    } */
    .link{
      border-bottom: 2px solid #7dd3f6;
    }
</style>

<div class="content-header" style="display: flex;">

    <div class="container-fluid" style="display: flex;">
        <div class="toggle">
            <a class="nav-link togg" data-widget=""   id="cll" onclick="CloseNav();">
                <i class="fas fa-bars"></i>
                <span class="sr-only">Toggle navigation</span>
            </a>
            <a class="nav-link togg" data-widget="" id="open" onclick="openNav();">
                <i class="fas fa-bars"></i>
                <span class="sr-only">Toggle navigation</span>
            </a>
        </div>
        <div style="padding: auto 0px;">
        <h1 class="m-0 text-dark" style="font-weight: 700;">Menu</h1>
        <p style="color: grey;">Manage all restaurant menu items</p>
    </div>
    <div style="margin-left: auto;display: flex; align-items: center;">
      <div class="searchicon">
        <i class="fas fa-search" style="color: #8141a1;margin: auto ;"></i>
      </div>
      <div class="search">
      </div>
      <div class="bell">
        <i class="fas fa-bell" style="margin: auto ;"></i>
      </div>
        <div class="imglogo">
          <img src="{{ asset('/img/purple_logo.png') }}" style="margin:auto;width: 100%;height: 100%;">
      </div>
    </div>    
</div>
</div>
<div class="btnlist">
    <div class="container-fluid" >
    <a href="{{route('restaurant-owner.dish.create')}}">
        <button type="button" class="btn menubtn" >
        <i class="fas fa-plus" style="color: white;font-weight: 100px;;margin-right: 5px;"></i>
        Cuisines
        </button> 
    </a>
    <a href="{{route('restaurant-owner.dish_categories')}}">
        <button type="button" class="btn menubtn"  >
        <!-- <i class="fas fa-plus" style="color: white;font-weight: 100px;font-size: 13px;margin-right: 5px;"></i> -->
         Dish Category
        </button>
    </a>
    <a href="{{route('restaurant-owner.dish_addons')}}">
        <button type="button" class="btn menubtn" >
        <!-- <i class="fas fa-plus" style="color: white;font-weight: 100px;font-size: 13px;margin-right: 5px;"></i> -->
        Extras
        </button> 
    </a>
    <a href="{{route('restaurant-owner.dish_addons_categories')}}">
        <button type="button" class="btn menubtn" >
        <!-- <i class="fas fa-plus" style="color: white;font-weight: 100px;font-size: 13px;margin-right: 5px;"></i> -->
        Extra Category
        </button> 
    </a>
    </div>
</div>

<div class="container-fluid">


<div class="row dishcard" >
  <div class="col-lg-12 col-12 card" style="border-radius:8px;box-shadow: 0px 0px 5px -1px;height:auto;margin-bottom: 0px;">
          <div class="card-header" style="padding-bottom: 0px;">
                <ul class="nav ">
                    <li class="nav-item" style="line-height: 30px;">
                      <a class="nav-link active link" data-toggle="tab" href="#home"  id="food">Food</a>
                    </li>
                    <li class="nav-item" style="line-height: 30px;">
                      <a class="nav-link" data-toggle="tab" href="#menu1" >Drink</a>
                    </li>
                    <li class="nav-item" style="line-height: 30px;">
                      <a class="nav-link" data-toggle="tab" href="#menu2" >Meal</a>
                    </li>
                  </ul>
            </div>
            <div class="card-body">
                <div class="tab-content">
                    <div class="tab-pane active " id="home">
                        <div class="row">
                            @foreach($dishes_food as $dish)
                            <div class=" col-xl-4 col-lg-6 col-md-12 col-sm-12 col-12">
                                <div class="dishlist" >
                                    <div style="height: 70px;width: 70px;margin: auto 0px; ">
                                    <a href="dishes/edit/{{$dish->id}}">
                                        <img src="{{asset('/upload/'.$dish->image)}}" style="border-radius: 50px;" height="100%" width="100%">
                                    </a>
                                    </div>
                                    <div style="margin-left: 10px;width: 90%;">
                                        <div style="display: flex;">
                                            <span style="margin: auto 0px;"><sup style="font-weight: 600;color: #8141a1;">KD</sup>
                                              <span style="font-weight: 700;color: #8141a1;">{{$dish->price}}</span>&nbsp;
                                              <small style="color: gray;">Price</small></span>
                                            <div style="margin-left: auto;">
                                                <a href="dishes/edit/{{$dish->id}} ">
                                                    <button type="button" class="btn-sm" style="background-color: #f3dce8;  border: 1px solid transparent;">
                                                    <i class="fas fa-pencil-alt" style="color:#8141a1;font-size: small;"></i>
                                                        </button>
                                                </a>
                                                <a href="dishes/delete/{{$dish->id}}">
                                                    <button type="button" class="btn-sm" style="background-color: #f3dce8;  border: 1px solid transparent; " >
                                                    <i class="fas fa-trash" style="color: #8141a1;font-size: small;"></i>
                                                    </button>
                                                </a>
                                            </div>
                                        </div>
                                        <div style="display: flex;margin-top: 10px;justify-content:space-between">
                                            <div>
                                    <a href="dishes/edit/{{$dish->id}}">
                                                <h6 style="margin: 0px;color: black;font-weight: 600;">{{$dish->name}}</h6>
                                                <p style="margin-bottom: 10px;font-size: 14px;color: gray ;">{{$dish->description}}</p>
                                            </a>
                                            </div>
                                            <div style="margin: auto 0px auto 15px;">
                                            <label class="switch" >
                                                <input type="checkbox" {{$dish->active == 'on' ? 'checked' : ''}} >
                                                <span class="slider round"></span>
                                              </label>
                                              </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach  
                        </div>
                    </div>
                    <div class="tab-pane container" id="menu1">
                      <div class="row">
                        @foreach($dishes_drink as $dish)
                        <div class=" col-xl-4 col-lg-6 col-md-12 col-sm-12 col-12">
                            <div class="dishlist" >
                                <div style="height: 70px;width: 70px;margin: auto 0px; ">
                                <a href="dishes/edit/{{$dish->id}}">
                                    <img src="{{asset('/upload/'.$dish->image)}}" style="border-radius: 50px;" height="100%" width="100%">
                                </a>
                                </div>
                                <div style="margin-left: 10px;width: 90%;">
                                    <div style="display: flex;">
                                        <span style="margin: auto 0px;"><sup style="font-weight: 600;color: #8141a1;">KD</sup>
                                          <span style="font-weight: 700;color: #8141a1;">{{$dish->price}}</span>&nbsp;
                                          <small style="color: gray;">Price</small></span>
                                        <div style="margin-left: auto;">
                                            <a href="dishes/edit/{{$dish->id}} ">
                                                <button type="button" class="btn-sm" style="background-color: #f3dce8;  border: 1px solid transparent;">
                                                <i class="fas fa-pencil-alt" style="color:#8141a1;font-size: small;"></i>
                                                    </button>
                                            </a>
                                            <a href="dishes/delete/{{$dish->id}}">
                                                <button type="button" class="btn-sm" style="background-color: #f3dce8;  border: 1px solid transparent; " >
                                                <i class="fas fa-trash" style="color: #8141a1;font-size: small;"></i>
                                                </button>
                                            </a>
                                        </div>
                                    </div>
                                    <div style="display: flex;margin-top: 10px;justify-content:space-between">
                                        <div>
                                <a href="dishes/edit/{{$dish->id}}">
                                            <h6 style="margin: 0px;color: black;font-weight: 600;">{{$dish->name}}</h6>
                                            <p style="margin-bottom: 10px;font-size: 14px;color: gray ;">{{$dish->description}}</p>
                                        </a>
                                        </div>
                                        <div style="margin: auto 0px auto 15px;">
                                        <label class="switch" >
                                            <input type="checkbox" {{$dish->active == 'on' ? 'checked' : ''}} >
                                            <span class="slider round"></span>
                                          </label>
                                          </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach  
                    </div>
                    </div>
                    <div class="tab-pane container" id="menu2">
                      <div class="row">
                        @foreach($dishes_meal as $dish)
                        <div class=" col-xl-4 col-lg-6 col-md-12 col-sm-12 col-12">
                            <div class="dishlist" >
                                <div style="height: 70px;width: 70px;margin: auto 0px; ">
                                <a href="dishes/edit/{{$dish->id}}">
                                    <img src="{{asset('/upload/'.$dish->image)}}" style="border-radius: 50px;" height="100%" width="100%">
                                </a>
                                </div>
                                <div style="margin-left: 10px;width: 90%;">
                                    <div style="display: flex;">
                                        <span style="margin: auto 0px;"><sup style="font-weight: 600;color: #8141a1;">KD</sup>
                                          <span style="font-weight: 700;color: #8141a1;">{{$dish->price}}</span>&nbsp;
                                          <small style="color: gray;">Price</small></span>
                                        <div style="margin-left: auto;">
                                            <a href="dishes/edit/{{$dish->id}} ">
                                                <button type="button" class="btn-sm" style="background-color: #f3dce8;  border: 1px solid transparent;">
                                                <i class="fas fa-pencil-alt" style="color:#8141a1;font-size: small;"></i>
                                                    </button>
                                            </a>
                                            <a href="dishes/delete/{{$dish->id}}">
                                                <button type="button" class="btn-sm" style="background-color: #f3dce8;  border: 1px solid transparent; " >
                                                <i class="fas fa-trash" style="color: #8141a1;font-size: small;"></i>
                                                </button>
                                            </a>
                                        </div>
                                    </div>
                                    <div style="display: flex;margin-top: 10px;justify-content:space-between">
                                        <div>
                                <a href="dishes/edit/{{$dish->id}}">
                                            <h6 style="margin: 0px;color: black;font-weight: 600;">{{$dish->name}}</h6>
                                            <p style="margin-bottom: 10px;font-size: 14px;color: gray ;">{{$dish->description}}</p>
                                        </a>
                                        </div>
                                        <div style="margin: auto 0px auto 15px;">
                                        <label class="switch" >
                                            <input type="checkbox" {{$dish->active == 'on' ? 'checked' : ''}} >
                                            <span class="slider round"></span>
                                          </label>
                                          </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach  
                    </div>
                    </div>
                </div>
            </div>
        <!-- </div> -->
    </div>
</div>


                </div>
@endsection


@section('scripts')
<script>
  $(document).ready(function(){
  
});

    $(".nav-item .nav-link").on("click", function(e) {
         
         if($(this).attr('href') == '#'){
           // href url is not specified, assuming its an ajax call 
           // If not you can remove this
           e.preventDefault();
         }
         // // Remove all active classes
         $('.nav-item .nav-link').removeClass('link');
         
         // Add active class for the current item
         $(this).addClass("link");
         });
</script>

@endsection