@extends('layouts.master')

@section('Title')
    Dashboard |Restaurant
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
         <h1 class="m-0 text-dark" style="font-weight: 700;">Add Coupon</h1>
         </div>
         </div>
</div>
<div class="container-fluid">
                    <!-- Small boxes (Stat box) -->
<div class="row">
	<div class="col-12">
		<!-- jquery validation -->
		<div class="card" style="margin-top: 10px;">
			<!-- <div class="card-header" style="background:#8141a1">
				<h3 class="card-title" style="color: white;">Add Coupon</h3>
			</div> -->
			<!-- /.card-header -->
			<!-- form start -->
			<form role="form" id="createForm" method="POST" action="{{route('save.coupon')}}">
				@csrf				<div class="card-body">
					
					 <div class="form-group row">
    <label for=name class="col-sm-3 col-form-label">Coupon Name
        <span class="text-danger">*</span>
            </label>
    <div class="col-sm-9 input-wrapper">
        <input type=text class="form-control" name=name id=name
            value=""  />
    </div>
</div>
					 <div class="form-group row">
    <label for=description class="col-sm-3 col-form-label">Coupon Description
        <span class="text-danger">*</span>
            </label>
    <div class="col-sm-9 input-wrapper">
        <input type=text class="form-control" name=description id=description
            value=""  />
    </div>
</div>

					 <div class="form-group row">
    <label for=restaurant_id class="col-sm-3 col-form-label">Restaurant
        <span class="text-danger">*</span>
            </label>
    <select name=restaurant_id class="col-sm-9 form-control select2" >
        @foreach($restaurants as $restaurant) 
            <option value="{{$restaurant->id}}" >{{$restaurant->name}}</option>
        @endforeach
            </select>
</div>

					 <div class="form-group row">
    <label for=coupon_code class="col-sm-3 col-form-label">Coupon Code
        <span class="text-danger">*</span>
            </label>
    <div class="col-sm-9 input-wrapper">
        <input type=text class="form-control" name=coupon_code id=coupon_code
            value=""  />
    </div>
</div>

					 <div class="form-group row">
    <label for=discount_type class="col-sm-3 col-form-label">Discount Type
        <span class="text-danger">*</span>
            </label>
    <select name=discount_type class="col-sm-9 form-control select2" >
                <option value="FIXED" >
            Fixed Amount Discount</option>
                <option value="PERCENTAGE" >
            Percentage Discount</option>
            </select>
</div>
					 <div class="form-group row">
    <label for=discount class="col-sm-3 col-form-label">Dicount
        <span class="text-danger">*</span>
            </label>
    <div class="col-sm-9 input-wrapper">
        <input type=number class="form-control" name=discount id=discount
            value=""   step="1"   />
    </div>
</div>
					 <div class="form-group row">
    <label for=expiry_date class="col-sm-3 col-form-label">Expiry Date
        <span class="text-danger">*</span>
            </label>
    <div class="col-sm-9 input-group  p-1">
        <div class="input-group">
            
            <input type="date" class="form-control datetimepicker-input"  name="expiry_date" data-inputmask-inputformat="yyyy/mm/dd" />
                        <div class="input-group-append" data-target="#reservationdate"  data-toggle="datetimepicker">
        </div></div>
    </div>
</div>
	 <div class="form-group row">
    <label for=max_usage class="col-sm-3 col-form-label">Max. usage
            </label>
    <div class="col-sm-9 input-wrapper">
        <input type=number class="form-control" name=max_usage id=max_usage
            value=""   step="1"   />
    </div>
</div>
 
<div class="form-group row">
    <label for=active class="col-sm-3 col-4  col-form-label">Active
            </label>
    <div class="col-sm-9 col-8 input-group  ">
        <label class="switch"  style="margin: auto 0px;">
            <input type="checkbox" name=active checked  >
            <span class="slider round"></span>
        </label>
    </div>
</div>
				</div>
				<!-- /.card-body -->
				<div class="card-footer">
                <button type="submit" class="btn" style="background: #8141a1;color: white;">Submit</button>

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
	// $(function () {
	// 	$('#datemask').datepicker(
	// 	{
	// 		format: "yyyy-mm-dd",
	// 		autoclose: true,
	// 	}).val();
	// })

    </script>
    
@endsection