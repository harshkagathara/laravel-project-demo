@extends('layouts.master-res')

@section('Title')
    Dashboard |Restaurant-Owner
@endsection


@section('content')
<!-- <div class="content-header" style="display: flex;align-items: center;">
    <div class="container-fluid" >
        <h1 class="m-0 text-dark" style="font-weight: 700;">Menu</h1>
        <p style="color: grey;">Manage all restaurant menu items</p>
    </div>
    <div style="margin-left: auto;display: flex; align-items: center;">
        <div style="height:40px;width: 500px;border-radius:8px;margin: 0px 10px;background: #f3dce8;"></div>
        <div style="height:40px;width: 40px;border-radius:8px;background: #f3dce8;"></div>
        <div style="height:50px;width: 50px;border: 1px solid black;border-radius: 50%;margin: 0px 10px;display: flex; ">
            <img src="{{ asset('/img/purple_logo.png') }}" style="margin:auto;width: 40px;height: 40px;">
        </div>
    </div>    
</div> -->
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
         <h1 class="m-0 text-dark" style="font-weight: 700;">Add Dish</h1>
         </div>
         </div>
         </div>
                <!-- <div class="content"> -->
<div class="container-fluid">
                    <!-- Small boxes (Stat box) -->
<div class="row">
	<div class="col-12">
		<!-- jquery validation -->
		<div class="card " style="margin-top: 10px;">
			<!-- <div class="card-header" style="background:#8141a1;">
				<h3 class="card-title" style="color: white;">Create a Dish</h3>
			</div> -->
			<!-- /.card-header -->
			<!-- form start -->
        <form role="form" id="createForm" method="POST" action="{{route('save.dish-res')}}" enctype="multipart/form-data">
                @csrf
            <div class="card-body">
									
					 <div class="form-group row">
    <label for=name class="col-sm-3 col-form-label">Dish Name
        <span class="text-danger">*</span>
            </label>
    <div class="col-sm-9 input-wrapper">
        <input type=text class="form-control" name=name id=name
            value=""  />
    </div>
</div>


					 <div class="form-group row">
    <label for=description class="col-sm-3 col-form-label">Dish Description
        <span class="text-danger">*</span>
            </label>
    <div class="col-sm-9 input-wrapper">
        <input type=text class="form-control" name=description id=description
            value=""  />
    </div>
</div>

					 <div class="form-group row">
    <label class="col-sm-3 col-form-label">Dish Image
        <span class="text-danger">*</span>
            </label>
    <div class="col-sm-9 input-group">
        <div class="custom-file">
            <input type="file" class="custom-file-input" id=image accept=image/* name=image onchange="showImage(this)"required/>
            <label class="custom-file-label" for=image>Choose file</label>
        </div>
        <div class="input-group-append">
            <span class="input-group-text">Upload</span>
        </div>
        <h6 class="d-block w-100 mt-2 mb-0">File Size should be less than 2mb</h6>
                <img src="" id="show" class="img-preview "  />
            </div>
</div>


					 <div class="form-group row">
    <label for=dish_category_id class="col-sm-3 col-form-label">Dish Category
            </label>
    <div class="col-sm-9 input-wrapper">
    <select name=dish_category_id class="form-control" style="width: 100%;" id="dish_category_id">
        @foreach($dish_categories as $dish_category) 
            <option value="{{$dish_category->id}}" >{{$dish_category->name}}</option>
        @endforeach
    </select>
</div>
</div>
					 <div class="form-group row">
    <label for=addons_category_id class="col-sm-3 col-form-label">Extras
        <span class="text-danger">*</span>
            </label>
    <div class="col-sm-9 input-wrapper">

    <select name=addons_category_id class=" form-control select2" style="width: 100%;"  >
        @foreach($addons as $addons) 
            <option value="{{$addons->id}}" >{{$addons->name}}</option>
        @endforeach
            </select>
</div>
</div>

<div class="form-group row">
    <label for=type class="col-sm-3 col-form-label">Type
        <span class="text-danger">*</span>
            </label>
    <div class="col-sm-9 input-wrapper">

    <select name=type class=" form-control select2" style="width: 100%;"  >
       
            <option value="food" >Food</option>
            <option value="drink" >Drink</option>
            <option value="meal" >Meal</option>
            </select>
</div>
</div>

					 <div class="form-group row">
    <label for=price class="col-sm-3 col-form-label">Price
        <span class="text-danger">*</span>
            </label>
    <div class="col-sm-9 input-wrapper">
        <input type=number class="form-control" name=price id=price
            value=""   step="1" min="0"  />
    </div>
</div>
					 <div class="form-group row">
    <label for=discount_price class="col-sm-3 col-form-label">Dicounted Price
            </label>
    <div class="col-sm-9 input-wrapper">
        <input type=number class="form-control" name=discount_price id=discount_price
            value=""   step="1" min="0"  />
    </div>
</div>
<div class="form-group row">
    <label for=calories class="col-sm-3 col-form-label">Calories
      
            </label>
    <div class="col-sm-9 input-wrapper">
        <input type=number class="form-control" name=calories id=calories
            value="0"   step="1" min="0"  />
    </div>
</div>
					 <div class="form-group row">
    <label for=protien class="col-sm-3 col-form-label">Protien 
            </label>
    <div class="col-sm-9 input-wrapper">
        <input type=number class="form-control" name=protien id=protien
            value="0"   step="1" min="0"  />
    </div>
</div>
<div class="form-group row">
    <label for=sodium class="col-sm-3 col-form-label">Sodium
      
            </label>
    <div class="col-sm-9 input-wrapper">
        <input type=number class="form-control" name=sodium id=sodium
            value="0"   step="1" min="0"  />
    </div>
</div>
					 <div class="form-group row">
    <label for=cholesterol class="col-sm-3 col-form-label">Cholesterol 
            </label>
    <div class="col-sm-9 input-wrapper">
        <input type=number class="form-control" name=cholesterol id=cholesterol
            value="0"   step="1" min="0"  />
    </div>
</div>
<div class="form-group row">
    <label for=is_veg class="col-sm-3 col-4 col-form-label">Vegetarian
            </label>
    <div class="col-sm-9 col-8 input-group  ">
    <label class="switch" style="margin: auto 0px;">
        <input type="checkbox" name="is_veg" checked >
        <span class="slider round"></span>
    </label>
    </div>
</div>

<div class="form-group row">
    <label for=glu_free class="col-sm-3 col-4 col-form-label">Gluten Free
            </label>
    <div class="col-sm-9 col-8 input-group  ">
        <label class="switch" style="margin: auto 0px;">
            <input type="checkbox" name="glu_free" checked >
            <span class="slider round"></span>
        </label>
    </div>
</div>

<div class="form-group row">
    <label for=active class="col-sm-3 col-4 col-form-label">Active
            </label>
    <div class="col-sm-9 col-8 input-group  ">
        <label class="switch" style="margin: auto 0px;">
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
<script>
            $(document).ready(function () {
                $('#dish_category_id').select2({
                   
    placeholder: 'Select a month'
});
            });
        </script>    
@endsection


@section('scripts')


@endsection