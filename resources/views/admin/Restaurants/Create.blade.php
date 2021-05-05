@extends('layouts.master')

@section('Title')
    Add Restaurant
  
@endsection


@section('content')
<div class="content-header" style="display: flex;">

    <div class="container-fluid" style="display: flex;">
        <div class="toggl">
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
      
         <h1 class="m-0 text-dark" style="font-weight: 700;">Add New Restaurant</h1>
         </div>
</div>
         </div>
<div class="container-fluid">
                    <!-- Small boxes (Stat box) -->
<div class="row">
	<div class="col-12">
		<!-- jquery validation -->
		<div class="card " style="margin-top: 10px;">
			<!-- <div class="card-header" style="background:#8141a1">
				<h3 class="card-title" style="color: white;">Add New Restaurant</h3>
			</div> -->
			<!-- /.card-header -->
			<!-- form start -->
			<form role="form" id="createForm" method="POST" action="{{route('save.restaurant')}}" enctype="multipart/form-data">
                @csrf       
                <div class="card-body">
					
					 <div class="form-group row">
    <label for=name class="col-sm-3 col-form-label">Name
        <span class="text-danger">*</span>
            </label>
    <div class="col-sm-9 input-wrapper">
        <input type=text class="form-control" name=name id=name
            value=""  />
    </div>
</div>
					 <div class="form-group row">
    <label for=description class="col-sm-3 col-form-label">Description
        <span class="text-danger">*</span>
            </label>
    <div class="col-sm-9 input-wrapper">
        <input type=text class="form-control" name=description id=description
            value=""  />
    </div>
</div>

					 <div class="form-group row">
    <label for=user_id class="col-sm-3 col-form-label">Restaurant Owner
        <span class="text-danger">*</span>
            </label>
    <div class="col-sm-9 input-wrapper">
    <select name=user_id class=" form-control select2" style="width: 100%;" >
        @foreach($users as $user) 
        <option value="{{$user->id}}" >{{$user->name}}</option>
    @endforeach
            </select>
</div>
</div>
<div class="form-group row">
    <label for=foodtype_id class="col-sm-3 col-form-label">Cuisine
        <span class="text-danger">*</span>
            </label>
    <div class="col-sm-9 input-wrapper">
    <select name=foodtype_id class=" form-control select2"  style="width: 100%;">
    @foreach($foodtypes as $foodtypes) 
            <option value="{{$foodtypes->id}}" >{{$foodtypes->name}}</option>
        @endforeach
            </select>
</div>
</div>
					 <div class="form-group row">
    <label class="col-sm-3 col-form-label">Image
        <span class="text-danger">*</span>
            </label>
    <div class="col-sm-9 input-group">
        <div class="custom-file">
            <input type="file" class="custom-file-input" id=image  name=image onchange="showImage(this)" required/>
            <label class="custom-file-label" for=image>Choose file</label>
        </div>
        <div class="input-group-append">
            <span class="input-group-text">Upload</span>
        </div>
        <h6 class="d-block w-100 mt-2 mb-0">File Size should be less than 2mb</h6>
                <img src="" id="show" class="img-preview w-25" />
            </div>
</div>
					 <div class="form-group row">
    <label for=phone class="col-sm-3 col-form-label">Phone
        <span class="text-danger">*</span>
            </label>
    <div class="col-sm-9 input-wrapper">
        <input type=text class="form-control" name=phone id=phone
            value=""  />
    </div>
</div>
					 <div class="form-group row">
    <label for=email class="col-sm-3 col-form-label">Email
        <span class="text-danger">*</span>
            </label>
    <div class="col-sm-9 input-wrapper">
        <input type=email class="form-control" name=email id=email
            value=""    />
    </div>
</div>
	<hr />
					 <div class="form-group row">
    <label for=rating class="col-sm-3 col-form-label">Rating
        <span class="text-danger">*</span>
            </label>
    <div class="col-sm-9 input-wrapper">
        <input type=number class="form-control" name=rating id=rating
            value=""   step=".5"  max="5" disabled />
    </div>
</div>
					 <div class="form-group row">
    <label for=delivery_time class="col-sm-3 col-form-label">Approx. Delivery Time (in mins)
        <span class="text-danger">*</span>
            </label>
    <div class="col-sm-9 input-wrapper">
        <input type=number class="form-control" name=delivery_time id=delivery_time
            value=""   step="1"   />
    </div>
</div>
<div class="form-group row">
    <label for=delivery_radius class="col-sm-3 col-form-label">Delivery Radius (in km)
            </label>
    <div class="col-sm-9 input-wrapper">
        <input type=number class="form-control" name=delivery_radius id=delivery_radius
            value=""   step="1"   />
    </div>
</div>
					 <div class="form-group row">
    <label for=for_two class="col-sm-3 col-form-label">Approx. price for two people
        <span class="text-danger">*</span>
            </label>
    <div class="col-sm-9 input-wrapper">
        <input type=number class="form-control" name=for_two id=for_two
            value=""   step="10"   />
    </div>
</div>
		<hr />
					 <div class="form-group row">
    <label for=address class="col-sm-3 col-form-label">Full Address
        <span class="text-danger">*</span>
            </label>
    <div class="col-sm-9 input-wrapper">
        <input type=text class="form-control" name=address id=address
            value=""  />
    </div>
</div>

					 <div class="form-group row">
    <label for=pincode class="col-sm-3 col-form-label">Pincode
            </label>
    <div class="col-sm-9 input-wrapper">
        <input type=text class="form-control" name=pincode id=pincode
            value=""  />
    </div>
</div>
					 <div class="form-group row">
    <label for=city class="col-sm-3 col-form-label">City
            </label>
    <div class="col-sm-9 input-wrapper">
        <input type=text class="form-control" name=city id=city
            value=""  />
    </div>
</div>
					 <div class="form-group row">
    <label for=lat class="col-sm-3 col-form-label">Latitude
        <span class="text-danger">*</span>
            </label>
    <div class="col-sm-9 input-wrapper">
        <input type=number class="form-control" name=lat id=lat
            value=""   step=".00000001"   />
    </div>
</div>
					 <div class="form-group row">
    <label for=long class="col-sm-3 col-form-label">Longitude
        <span class="text-danger">*</span>
            </label>
    <div class="col-sm-9 input-wrapper">
        <input type=number class="form-control" name=long id=long
            value=""   step=".00000001"   />
    </div>
</div>
					<!-- <hr />

<div class="form-group row">
    <label for=restaurant_charges class="col-sm-3 col-form-label">Opening Hours</label>
    <div class="input-group date col-sm-9 input-wrapper" >
        <input type="time" name="opentime"  class="form-control " />
         
    </div>
</div>
<div class="form-group row">
    <label for=restaurant_charges class="col-sm-3 col-form-label">Closing Hours </label>
    <div class="input-group date col-sm-9 input-wrapper" >
        <input type="time" name="closetime"  class="form-control " />
 
    </div>
</div> -->

<!--   -->
<!-- 
<div class="form-group row">
    <label for=restaurant_charges class="col-sm-3 col-form-label">Opening Time</label>
    <div class="input-group date col-sm-9 input-wrapper" data-target-input="nearest">
        <input type="time" name="opentime" id="timepicker" class="form-control datetimepicker-input" data-target="#timepicker"/>
            <div class="input-group-append" data-target="#timepicker" data-toggle="datetimepicker">
                <div class="input-group-text"><i class="far fa-clock"></i></div>
            </div>
    </div>
</div>

<div class="form-group row">
    <label for=restaurant_charges class="col-sm-3 col-form-label">Closing Time</label>
    <div class="input-group date col-sm-9 input-wrapper" data-target-input="nearest">
        <input type="text" name="closetime" id="timepicker1"  class="form-control datetimepicker-input" data-target="#timepicker1"/>
            <div class="input-group-append" data-target="#timepicker1" data-toggle="datetimepicker">
                <div class="input-group-text"><i class="far fa-clock"></i></div>
            </div>
    </div>
</div> -->
<hr />
<div class="form-group row">
    <label for=sun class="col-sm-3 col-4 col-form-label">Sunday
            </label>
    <div class="col-sm-2 col-8 input-group ">
    <label class="switch" style="margin: auto 0px;" >
        <input type="checkbox" name="sun" checked >
        <span class="slider round"></span>
    </label>
    </div>
    <div class="input-group date col-sm-3 col-5 input-wrapper" >
        <input type="time" name="sun_opentime"  class="form-control " />
    </div>
    <div class="input-group date col-sm-1 col-2 input-wrapper" style="text-align:center;align-items: center;" >
        <h4 style="text-align:center;width: 100%;">-</h4>
    </div>
    <div class="input-group date col-sm-3 col-5 input-wrapper" >
        <input type="time" name="sun_closetime"  class="form-control " />
    </div>
</div>

<div class="form-group row">
    <label for=mon class="col-sm-3 col-4 col-form-label">Monday
            </label>
    <div class="col-sm-2 col-8 input-group ">
    <label class="switch" style="margin: auto 0px;" >
        <input type="checkbox" name="mon" checked >
        <span class="slider round"></span>
    </label>
    </div>
    <div class="input-group date col-sm-3 col-5 input-wrapper" >
        <input type="time" name="mon_opentime"  class="form-control " />
    </div>
    <div class="input-group date col-sm-1 col-2 input-wrapper" style="text-align:center;align-items: center;" >
        <h4 style="text-align:center;width: 100%;">-</h4>
    </div>
    <div class="input-group date col-sm-3 col-5 input-wrapper" >
        <input type="time" name="mon_closetime"  class="form-control " />
    </div>
</div>

<div class="form-group row">
    <label for=tue class="col-sm-3 col-4 col-form-label">Tuesday
            </label>
    <div class="col-sm-2 col-8 input-group ">
    <label class="switch" style="margin: auto 0px;" >
        <input type="checkbox" name="tue" checked >
        <span class="slider round"></span>
    </label>
    </div>
    <div class="input-group date col-sm-3 col-5 input-wrapper" >
        <input type="time" name="tue_opentime"  class="form-control " />
    </div>
    <div class="input-group date col-sm-1 col-2 input-wrapper" style="text-align:center;align-items: center;" >
        <h4 style="text-align:center;width: 100%;">-</h4>
    </div>
    <div class="input-group date col-sm-3 col-5 input-wrapper" >
        <input type="time" name="tue_closetime"  class="form-control " />
    </div>
</div>

<div class="form-group row">
    <label for=wed class="col-sm-3 col-4 col-form-label">Wednesday
            </label>
    <div class="col-sm-2 col-8 input-group ">
    <label class="switch" style="margin: auto 0px;" >
        <input type="checkbox" name="wed" checked >
        <span class="slider round"></span>
    </label>
    </div>
    <div class="input-group date col-sm-3 col-5 input-wrapper" >
        <input type="time" name="wed_opentime"  class="form-control " />
    </div>
    <div class="input-group date col-sm-1 col-2 input-wrapper" style="text-align:center;align-items: center;" >
        <h4 style="text-align:center;width: 100%;">-</h4>
    </div>
    <div class="input-group date col-sm-3 col-5 input-wrapper" >
        <input type="time" name="wed_closetime"  class="form-control " />
    </div>
</div>

<div class="form-group row">
    <label for=thu class="col-sm-3 col-4 col-form-label">Thursday
            </label>
    <div class="col-sm-2 col-8 input-group ">
    <label class="switch" style="margin: auto 0px;" >
        <input type="checkbox" name="thu" checked >
        <span class="slider round"></span>
    </label>
    </div>
    <div class="input-group date col-sm-3 col-5 input-wrapper" >
        <input type="time" name="thu_opentime"  class="form-control " />
    </div>
    <div class="input-group date col-sm-1 col-2 input-wrapper" style="text-align:center;align-items: center;" >
        <h4 style="text-align:center;width: 100%;">-</h4>
    </div>
    <div class="input-group date col-sm-3 col-5 input-wrapper" >
        <input type="time" name="thu_closetime"  class="form-control " />
    </div>
</div>

<div class="form-group row">
    <label for=fri class="col-sm-3 col-4 col-form-label">Friday
            </label>
    <div class="col-sm-2 col-8 input-group ">
    <label class="switch" style="margin: auto 0px;" >
        <input type="checkbox" name="fri" checked >
        <span class="slider round"></span>
    </label>
    </div>
    <div class="input-group date col-sm-3 col-5 input-wrapper" >
        <input type="time" name="fri_opentime"  class="form-control " />
    </div>
    <div class="input-group date col-sm-1 col-2 input-wrapper" style="text-align:center;align-items: center;" >
        <h4 style="text-align:center;width: 100%;">-</h4>
    </div>
    <div class="input-group date col-sm-3 col-5 input-wrapper" >
        <input type="time" name="fri_closetime"  class="form-control " />
    </div>
</div>

<div class="form-group row">
    <label for=sat class="col-sm-3 col-4 col-form-label">Saturday
            </label>
    <div class="col-sm-2 col-8 input-group ">
    <label class="switch" style="margin: auto 0px;" >
        <input type="checkbox" name="sat" checked >
        <span class="slider round"></span>
    </label>
    </div>
    <div class="input-group date col-sm-3 col-5 input-wrapper" >
        <input type="time" name="sat_opentime"  class="form-control " />
    </div>
    <div class="input-group date col-sm-1 col-2 input-wrapper" style="text-align:center;align-items: center;" >
        <h4 style="text-align:center;width: 100%;">-</h4>
    </div>
    <div class="input-group date col-sm-3 col-5 input-wrapper" >
        <input type="time" name="sat_closetime"  class="form-control " />
    </div>
</div>
					<hr />
<!-- <div class="form-group row">
<label for=is_veg class="col-sm-3 col-form-label">Gluten Free
        </label>
<div class="col-sm-9 input-group ">
<label class="switch" >
    <input type="checkbox" name="is_veg" checked >
    <span class="slider round"></span>
</label>
</div> 
</div>-->

<div class="form-group row">
    <label for=is_veg class="col-sm-3 col-4 col-form-label">Vegetarian
            </label>
    <div class="col-sm-9 col-8 input-group ">
    <label class="switch" style="margin: auto 0px;">
        <input type="checkbox" name="is_veg" checked >
        <span class="slider round"></span>
    </label>
    </div>
</div>


<div class="form-group row">
    <label for=active class="col-sm-3 col-4 col-form-label">Active
            </label>
    <div class="col-sm-9 col-8  input-group ">
        <label class="switch" style="margin: auto 0px;">
            <input type="checkbox" name=active checked  >
            <span class="slider round"></span>
        </label>
    </div>
</div>
			
				</div>
				<!-- /.card-body -->
				<div class="card-footer">
                <button type="submit" class="btn " style="background: #8141a1;color: white;">Submit</button>

				</div>
			</form>
		</div>
		<!-- /.card -->
	</div>
</div>
<!-- ./col -->
</div>
<!-- /.row -->
                </div>
@endsection


@section('scripts')
<script>
//  $('#timepicker').datetimepicker({
//       format: 'LT'
//     });
//     $('#timepicker1').datetimepicker({
//       format: 'LT'
//     });
// $(function(){
//   $('#weekdays').weekdays();
// });

//   $('#weekdays').weekdays({
//     days: ["Domingo", "Segunda", "Terça", "Quarta", "Quinta", "Sexta", "Sábado"]
//   });

    </script>
@endsection