@extends('layouts.master-res')

@section('Title')
    Dashboard |Restaurant-Owner
@endsection

@section('content')
<style>
    .dishlist{
        display: flex;
        width: 100%;
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
    #food:focus{
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
                   <h1 class="m-0 text-dark" style="font-weight: 700;">Dashboard</h1>
        <p style="color: grey;">Welcome Back, <?php echo Session::get('resname'); ?> take a look of all information</p>
        </div>
    </div>
    <div style="margin-left: auto;display: flex; align-items: center;">
        <div class="searchicon">
            <i class="fas fa-search" style="color: #8141a1;margin: auto ;"></i>
          </div>
          <div class="search">
          </div>
      
      <!-- <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text">@</span>
        </div>
        <input type="text" class="form-control" placeholder="Username">
      </div> -->

       <!-- <div style="height:40px;width: 500px;border-radius:0px 8px 8px 0px;margin: 0px 10px 0px 0px;background: #f3dce8;">
      </div> -->

      <!-- <input class="btn" type="search" placeholder="search menu items" style="background: #f3dce8;"> -->
      <div class="bell">
        <i class="fas fa-bell" style="margin: auto ;"></i>
      </div>
        <div class="imglogo">
            <img src="{{ asset('/img/purple_logo.png') }}" style="margin:auto;width: 100%;height: 100%;">
        </div>
    </div>
</div>
    <div class="content">
<div class="container-fluid" >
   
    <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3>150</h3>
  
              <p>New Orders</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3>53<sup style="font-size: 20px">%</sup></h3>
  
              <p>Bounce Rate</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
              <h3>44</h3>
  
              <p>User Registrations</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
              <h3>65</h3>
  
              <p>Unique Visitors</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
    

    <div class="row" style="margin:5px 5px;background: white;">
    <!-- #888888 -->
        <div class="col-lg-12 col-12 dashrow" >
        <div class="imglogo" style="border: 2px solid #8141a1;">
        <a href="{{route('edit.profile')}}" style="color:black">
        
        <img src="{{ asset('/upload/'.Session::get('reslogo')) }}"  
               style="width: 100%;height: 100%;border-radius: 50%;margin:auto; " >
  </a>
            </div>
            <div style="height: 50px;margin:auto 5px;display: grid;">
                <div style="margin: auto;">
                <a href="{{route('edit.profile')}}" style="color:black">
                    <h5 class="h51"><?php echo Session::get('resname'); ?></h5>
                    <h5 class="h52">12:00 pm -12:00 am (monday to saturday)</h5>
                </a>
                  </div>
            </div>  
            <!-- <a href="{{route('restaurant-owner.review')}}" style="color:black"> -->
            <div style="height: 100%;margin-left: auto;display: flex;">


                <i class="fa fa-star" style="margin: auto 5px;color: #7dd3f6;font-size: 12px;"></i>
                <h5 style="margin:auto;color: #8141a1;" class="h51">4.7</h5>
 
                <h5 style="margin:auto 5px;" class="h52">(500 people rated)</h5>
 
            </div>
  <!-- </a> -->
        </div>
    </div>  
    <div class="row" style="margin:10px 5px;background: white;">
        <div class="col-lg-12 col-12 dashrow" >
                <h5 class="h53">Restaurant Profile</h5>
                <div style="margin-left: auto;display: flex;">
                    <div style="margin:auto 5px">
                    <a href="{{route('restaurant-owner.dish.create')}}" >
                        <button type="button" class="btn dashbtn" >
                        Menu
                        </button> 
                    </a>
                    </div>
                    <div style="margin:auto 5px">
                        <a href="{{route('restaurant-owner.dish.create')}}">
                            <button type="button" class="btn dashbtn" >
                            Location
                            </button> 
                        </a>
                    </div>
                    <div style="margin:auto 5px">
                        <a href="{{route('restaurant-owner.dish.create')}}">
                            <button type="button" class="btn dashbtn" >
                            Reviews
                            </button> 
                        </a>
                    </div>
            </div>
        </div>
    </div>
    <div class="row" style="margin:5px 5px 0px 5px;">
        <div class="col-lg-12 col-12 card" style="border-radius:8px;box-shadow: 0px 0px 5px -1px;height:auto;margin-bottom: 0px;">
                <div class="card-header" style="padding-bottom: 0px;">
                    <ul class="nav ">
                        <li class="nav-item mr-2" style="line-height: 30px;">
                          <a class="nav-link active" data-toggle="tab" href="#food" >Food</a>
                        </li>
                        <li class="nav-item mr-2" style="line-height: 30px;">
                          <a class="nav-link" data-toggle="tab" href="#drink" >Drink </a>
                        </li>
                        <li class="nav-item" style="line-height: 30px;">
                          <a class="nav-link" data-toggle="tab" href="#meal">Meal </a>
                        </li>
                      </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane active " id="food">
                        <div class="row">
                            @foreach($dishes_food as $dish)
                        
                            <div class="col-12" style="margin-bottom: 10px;">
                                <div class="dishlist" >
                                    <div style="margin: auto 0px;" class="imglist">
                                        <img src="{{asset('/upload/'.$dish->image)}}" style="border-radius: 8px;" height="100%" width="100%">
                                    </div>
                                    <!-- <div style="margin-left: 10px;width: 80%;"> -->
                                        
                                        <div style="margin:auto 10px ;">
                                                <h6 style="margin-bottom: 5px;color: black;font-weight: 600;">{{$dish->name}}</h6>
                                                <p style="margin-bottom: 0px;font-size: 14px;color: gray ;">{{$dish->description}}</p>       
                                        </div>
                                        <div style="display: flex;margin-left: auto;">
                                            <span style="margin: auto 0px;">
                                              <span style="font-weight: 700;color: #8141a1;">KD{{$dish->price}}</span>&nbsp;
                                              </span>
                                        </div>
                                    <!-- </div> -->
                                </div>
                            </div>
                            @endforeach  
                        </div>
                        </div>
                        <div class="tab-pane container" id="drink">
                          
                            <div class="row">
                                @foreach($dishes_drink as $dish)
                                <div class="col-12" style="margin-bottom: 10px;">
                                    <div class="dishlist" >
                                        <div style="margin: auto 0px;" class="imglist">
                                            <img src="{{asset('/upload/'.$dish->image)}}" style="border-radius: 8px;" height="100%" width="100%">
                                        </div>
                                        <!-- <div style="margin-left: 10px;width: 80%;"> -->
                                            
                                            <div style="margin:auto 10px ;">
                                                    <h6 style="margin-bottom: 5px;color: black;font-weight: 600;">{{$dish->name}}</h6>
                                                    <p style="margin-bottom: 0px;font-size: 14px;color: gray ;">{{$dish->description}}</p>       
                                            </div>
                                            <div style="display: flex;margin-left: auto;">
                                                <span style="margin: auto 0px;">
                                                  <span style="font-weight: 700;color: #8141a1;">KD{{$dish->price}}</span>&nbsp;
                                                  </span>
                                            </div>
                                        <!-- </div> -->
                                    </div>
                                </div>
                                @endforeach  
                            
                            </div>
                        </div>
                        <div class="tab-pane container" id="meal">
                           
                          <div class="row">
                            @foreach($dishes_meal as $dish)
                            <div class="col-12" style="margin-bottom: 10px;">
                                <div class="dishlist" >
                                    <div style="margin: auto 0px;" class="imglist">
                                        <img src="{{asset('/upload/'.$dish->image)}}" style="border-radius: 8px;" height="100%" width="100%">
                                    </div>
                                    <!-- <div style="margin-left: 10px;width: 80%;"> -->
                                        
                                        <div style="margin:auto 10px ;">
                                                <h6 style="margin-bottom: 5px;color: black;font-weight: 600;">{{$dish->name}}</h6>
                                                <p style="margin-bottom: 0px;font-size: 14px;color: gray ;">{{$dish->description}}</p>       
                                        </div>
                                        <div style="display: flex;margin-left: auto;">
                                            <span style="margin: auto 0px;">
                                              <span style="font-weight: 700;color: #8141a1;">KD{{$dish->price}}</span>&nbsp;
                                              </span>
                                        </div>
                                    <!-- </div> -->
                                </div>
                            </div>
                            @endforeach  
                        
                        </div>
                        </div>
                      </div>
                </div>
        </div>
    </div>

  </div> 

  <!-- <div class="content-header">
    <div class="container-fluid" style="display:flex;">
      <a class="nav-link" data-widget=""  style="margin:auto 0px;" id="cll" onclick="CloseNav();">
            <i class="fas fa-bars"></i>
                <span class="sr-only">Toggle navigation</span>
      </a>
      <a class="nav-link" data-widget=""  style="margin:auto 0px;" id="open" onclick="openNav();">
        <i class="fas fa-bars"></i>
            <span class="sr-only">Toggle navigation</span>
  </a> -->
        
  <!-- <div class="content-header">
    <div class="container-fluid" style="display:flex;">
      <a class="nav-link" data-widget=""  style="margin:auto 0px;" id="cll" onclick="CloseNav();">
            <i class="fas fa-bars"></i>
                <span class="sr-only">Toggle navigation</span>
      </a>
      <a class="nav-link" data-widget=""  style="margin:auto 0px;" id="open" onclick="openNav();">
        <i class="fas fa-bars"></i>
            <span class="sr-only">Toggle navigation</span>
  </a>
      <h1 class="m-0 text-dark">Dashboard</h1>
    </div>
</div>


 <div class="content">
    <div class="container-fluid">
<div class="row">
<div class="col-lg-3 col-6">
<div class="small-box bg-info">
<div class="inner">
<h3>6</h3>

<p>Today Orders</p>
</div>
<div class="icon">
<i class="fa fa-shopping-bag"></i>
</div>
<a href="/restaurant-owner/live-orders" class="small-box-footer">More info <i
class="fas fa-arrow-circle-right"></i></a>
</div>
</div>
<div class="col-lg-3 col-6">
<div class="small-box bg-success">
<div class="inner">
<h3><sup style="font-size: 20px">$</sup>417.9</h3>

<p>Today Earnings</p>
</div>
<div class="icon">
<i class="fa fa-money-bill"></i>
</div>
<a href="restaurant-owner/live-orders" class="small-box-footer">More info <i
class="fas fa-arrow-circle-right"></i></a>
</div>
</div>
<div class="col-lg-3 col-6">
<div class="small-box bg-warning">
<div class="inner">
<h3>867</h3>

<p>Total Orders</p>
</div>
<div class="icon">
<i class="fa fa-shopping-bag"></i>
</div>
<a href="restaurant-owner/orders" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
</div>
</div>
<div class="col-lg-3 col-6">
<div class="small-box bg-danger">
<div class="inner">
<h3><sup style="font-size: 20px">$</sup>71684.55</h3>

<p>Total Earnings</p>
</div>
<div class="icon">
<i class="fa fa-money-bill"></i>
</div>
<a href="restaurant-owner/orders" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
</div>
</div>
</div>
    </div>
</div> -->

@endsection

@section('scripts')

@endsection

