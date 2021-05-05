@extends('layouts.master-res')

@section('Title')
    Add Location
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
         <h1 class="m-0 text-dark" style="font-weight: 700;">Add Location</h1>
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
				<h3 class="card-title" style="color: white;">Add Location</h3>
			</div> -->
			<!-- /.card-header -->
			<!-- form start -->
			<form role="form" id="createForm" method="POST" action="{{route('save.location')}}">
				@csrf			
                <div class="card-body">
					
                    <div class="form-group row">
                        <label for=name class="col-sm-3 col-form-label">Branch Name
                            <span class="text-danger">*</span>
                                </label>
                        <div class="col-sm-9 input-wrapper">
                            <input type=text class="form-control" name=name id=name
                                value=""  />
                        </div>
                    </div>

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

                    
<div class="form-group row">
    <label for=restaurant_charges class="col-sm-3 col-form-label">Opening Time</label>
    <div class="input-group date col-sm-9 input-wrapper" >
        <input type="time" name="opentime"  class="form-control " />
            <!-- <div class="input-group-append">
                <div class="input-group-text"><i class="far fa-clock"></i></div>
            </div> -->
    </div>
</div>
<div class="form-group row">
    <label for=restaurant_charges class="col-sm-3 col-form-label">Opening Time</label>
    <div class="input-group date col-sm-9 input-wrapper" >
        <input type="time" name="closetime"  class="form-control " />
            <!-- <div class="input-group-append">
                <div class="input-group-text"><i class="far fa-clock"></i></div>
            </div> -->
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