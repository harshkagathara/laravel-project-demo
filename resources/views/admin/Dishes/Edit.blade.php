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
      
         <h1 class="m-0 text-dark" style="font-weight: 700;">Edit Dish</h1>
         </div>
</div>
         </div>
<div class="container-fluid">
                    <!-- Small boxes (Stat box) -->
<div class="row">
	<div class="col-12">
		<!-- jquery validation -->
		<div class="card " style="margin-top: 10px;">
			<!-- <div class="card-header" style="background:#8141a1;">
				<h3 class="card-title" style="color: white;">Edit Dish</h3>
			</div> -->
			<!-- /.card-header -->
			<!-- form start -->
			<form role="form" id="createForm" method="POST" action="{{route('update.dish')}}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{$dishes->id}}">
                <div class="card-body">
										 <div class="form-group row">
    <label for=restaurant_id class="col-sm-3 col-form-label">Restaurant
        <span class="text-danger">*</span>
            </label>
    <div class="col-sm-9 input-wrapper">
    <select name=restaurant_id class="form-control select2" style="width: 100%;">
    @foreach($restaurants as $restaurant) 
            <option value="{{$restaurant->id}}" {{$dishes->restaurant_id == $restaurant->id ? 'selected' : ''}}>
            {{$restaurant->name}}</option>
        @endforeach
            </select>
</div>
</div>
					 <div class="form-group row">
    <label for=name class="col-sm-3 col-form-label">Dish Name
        <span class="text-danger">*</span>
            </label>
    <div class="col-sm-9 input-wrapper">
        <input type=text class="form-control" name=name id=name
            value="{{$dishes->name}}"  />
    </div>
</div>
					 <div class="form-group row">
    <label for=description class="col-sm-3 col-form-label">Dish Description
        <span class="text-danger">*</span>
            </label>
    <div class="col-sm-9 input-wrapper">
        <input type=text class="form-control" name=description id=description
            value="{{$dishes->description}}"  />
    </div>
</div>
					 <div class="form-group row">
    <label class="col-sm-3 col-form-label">Dish Image
        <span class="text-danger">*</span>
            </label>
    <div class="col-sm-9 input-group">
        <div class="custom-file">
            <input type="file" class="custom-file-input" id=image accept=image/* name=image onchange="showImage(this)"/>
            <label class="custom-file-label" for=image>Choose file</label>
        </div>
        <div class="input-group-append">
            <span class="input-group-text">Upload</span>
        </div>
        <h6 class="d-block w-100 mt-2 mb-0">File Size should be less than 2mb</h6>
        <img src="{{asset('/upload/'.$dishes->image)}}" class="img-preview " id="show" 
        height="150px" width="150px"/>
            </div>
</div>
					 <div class="form-group row">
    <label for=dish_category_id class="col-sm-3 col-form-label">Dish Category
            </label>
    <div class="col-sm-9 input-wrapper">
    <select name=dish_category_id class=" form-control select2" style="width: 100%;">
        @foreach($dish_categories as $dish_category) 
            <option value="{{$dish_category->id}}" {{$dishes->dish_category_id == $dish_category->id ? 'selected' : ''}}>
            {{$dish_category->name}}</option>
        @endforeach
            </select>
</div>
</div> 
					 <div class="form-group row">
    <label for=addon_id class="col-sm-3 col-form-label">Extras
        <span class="text-danger">*</span>
            </label>
    <div class="col-sm-9 input-wrapper">
    <select name=addon_id class=" form-control select2" style="width: 100%;" >
        @foreach($addonscategories as $addonscategory) 
            <option value="{{$addonscategory->id}}" {{$dishes->addons_category_id == $addonscategory->id ? 'selected' : ''}}>
            {{$addonscategory->name}}</option>
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
       
            <option value="food" {{$dishes->type == 'food' ? 'selected' : ''}} >Food</option>
            <option value="drink"  {{$dishes->type == 'drink' ? 'selected' : ''}} >Drink</option>
            <option value="meal"  {{$dishes->type == 'meal' ? 'selected' : ''}} >Meal</option>
            </select>
</div>
</div>

					 <div class="form-group row">
    <label for=price class="col-sm-3 col-form-label">Price
        <span class="text-danger">*</span>
            </label>
    <div class="col-sm-9 input-wrapper">
        <input type=number class="form-control" name=price id=price
           value="{{$dishes->price}}"   step="1"   />
    </div>
</div>
					 <div class="form-group row">
    <label for=discount_price class="col-sm-3 col-form-label">Dicounted Price
            </label>
    <div class="col-sm-9 input-wrapper">
        <input type=number class="form-control" name=discount_price id=discount_price
           value="{{$dishes->price}}"   step="1"   />
    </div>
</div>
<div class="form-group row">
    <label for=calories class="col-sm-3 col-form-label">calories
      
            </label>
    <div class="col-sm-9 input-wrapper">
        <input type=number class="form-control" name=calories id=calories
            value="{{$dishes->calories}}"   step="1" min="0"  />
    </div>
</div>
					 <div class="form-group row">
    <label for=protien class="col-sm-3 col-form-label">protien 
            </label>
    <div class="col-sm-9 input-wrapper">
        <input type=number class="form-control" name=protien id=protien
            value="{{$dishes->protien}}"   step="1" min="0"  />
    </div>
</div>
<div class="form-group row">
    <label for=sodium class="col-sm-3 col-form-label">sodium
      
            </label>
    <div class="col-sm-9 input-wrapper">
        <input type=number class="form-control" name=sodium id=sodium
            value="{{$dishes->sodium}}"   step="1" min="0"  />
    </div>
</div>
					 <div class="form-group row">
    <label for=cholesterol class="col-sm-3 col-form-label">cholesterol 
            </label>
    <div class="col-sm-9 input-wrapper">
        <input type=number class="form-control" name=cholesterol id=cholesterol
            value="{{$dishes->cholesterol}}"   step="1" min="0"  />
    </div>
</div>
<div class="form-group row">
    <label for=is_veg class="col-sm-3  col-4 col-form-label">Vegetarian
            </label>
    <div class="col-sm-9 col-8 input-group  ">
    <label class="switch" style="margin: auto 0px;" >
        <input type="checkbox" name="is_veg" {{$dishes->is_veg == 'on' ? 'checked' : ''}} >
        <span class="slider round"></span>
    </label>
    </div>
</div>

<div class="form-group row">
    <label for=glu_free class="col-sm-3 col-4 col-form-label">Gluten Free
            </label>
    <div class="col-sm-9 col-8 input-group  ">
        <label class="switch" style="margin: auto 0px;">
            <input type="checkbox" name="glu_free" {{$dishes->glu_free == 'on' ? 'checked' : ''}} >
            <span class="slider round"></span>
        </label>
    </div>
</div>

					 <div class="form-group row">
    <label for=active class="col-sm-3 col-4 col-form-label">Active
            </label>
    <div class="col-sm-9 col-8 input-group ">
        <label class="switch" >
            <input type="checkbox" name="active" {{$dishes->active == 'on' ? 'checked' : ''}} >
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
