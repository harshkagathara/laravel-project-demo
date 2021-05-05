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
         <h1 class="m-0 text-dark" style="font-weight: 700;">Add Extra </h1>
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
				<h3 class="card-title" style="color: white;">Add Addon</h3>
			</div> -->
			<!-- /.card-header -->
			<!-- form start -->
			<form role="form" id="createForm" method="POST" action="{{route('save.addon')}}" enctype="multipart/form-data">
				@csrf			<div class="card-body">

        <div class="form-group row">
            <label for=restaurant_id class="col-sm-3 col-form-label">Restaurant
                <span class="text-danger">*</span>
                    </label>
            <div class="col-sm-9 input-wrapper">
            <select name=restaurant_id class="form-control select2"  style="width: 100%;" >
            @foreach($restaurants as $restaurant) 
                    <option value="{{$restaurant->id}}" >{{$restaurant->name}}</option>
                @endforeach
                    </select>
        </div>
        </div>

        <div class="form-group row">
    <label for=name class="col-sm-3 col-form-label">Extra Name
        <span class="text-danger">*</span>
            </label>
    <div class="col-sm-9 input-wrapper">
        <input type=text class="form-control" name=name id=name
            value=""  />
    </div>
</div>

 

					 <div class="form-group row">
    <label for=addons_category_id class="col-sm-3 col-form-label">Extra Category
        <span class="text-danger">*</span>
            </label>
    <div class="col-sm-9 input-wrapper">

    <select name=addons_category_id class="form-control select2"  style="width: 100%;" >
        @foreach($addons_categories as $addons_categories) 
            <option value="{{$addons_categories->id}}" >{{$addons_categories->name}}</option>
        @endforeach
            </select>
</div>
</div>

 

					 <div class="form-group row">
    <label for=price class="col-sm-3 col-form-label">Price
        <span class="text-danger">*</span>
            </label>
    <div class="col-sm-9 input-wrapper">
        <input type=number class="form-control" name=price id=price
            value=""   step="1"   />
    </div>
</div>




<div class="form-group row">
    <label for=active class="col-sm-3 col-4 col-form-label">Active
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

@endsection