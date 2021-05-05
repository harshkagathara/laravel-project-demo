@extends('layouts.master-res')

@section('Title')
        Dishes Categories
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
         <h1 class="m-0 text-dark" style="font-weight: 700;">Add Dish Category</h1>
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
				<h3 class="card-title" style="color: white;" >Add Dish Category</h3>
			</div> -->
			<!-- /.card-header -->
			<!-- form start -->
	<form role="form" id="createForm" method="POST" action="{{route('save.dishcategory-res')}}" enctype="multipart/form-data">
				@csrf
    <div class="card-body">
					 <div class="form-group row">
    <label for=name class="col-sm-3 col-form-label">Category Name
        <span class="text-danger">*</span>
            </label>
    <div class="col-sm-9 input-wrapper">
        <input type=text class="form-control" name=name id=name
            value=""  />
    </div>
</div>
					 <div class="form-group row">
    <label class="col-sm-3 col-form-label">Image
        <span class="text-danger">*</span>
            </label>
    <div class="col-sm-9 input-group">
        <div class="custom-file">
            <input type="file" class="custom-file-input" id=image accept=image/* name=image onchange="showImage(this)" required/>
            <label class="custom-file-label" for=image>Choose file</label>
        </div>
        <div class="input-group-append">
            <span class="input-group-text">Upload</span>
        </div>
        <h6 class="d-block w-100 mt-2 mb-0">File Size should be less than 2mb</h6>
                <img src="" id="show" class="img-preview " />
            </div>
</div>



<div class="form-group row">
    <label for=active class="col-sm-3 col-4 col-form-label">Active
            </label>
    <div class="col-sm-9 col-8 input-group ">
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
                </div>
@endsection


@section('scripts')

@endsection