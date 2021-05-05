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
      
         <h1 class="m-0 text-dark" style="font-weight: 700;">Add Extra Category</h1>
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
				<h3 class="card-title" style="color: white;">Add Addon Category</h3>
			</div> -->
			<!-- /.card-header -->
			<!-- form start -->
			<form role="form" id="createForm" method="POST" action="{{route('save.addoncategory')}}"
				enctype="multipart/form-data">
				@csrf
						<div class="card-body">
										 <div class="form-group row">
    <label for=name class="col-sm-3 col-form-label">Extra Category Name
        <span class="text-danger">*</span>
            </label>
    <div class="col-sm-9 input-wrapper">
        <input type=text class="form-control" name=name id=name
            value=""  />
    </div>
</div>

 
					
					<div class="form-group row">
						<label for="type" class="col-sm-3 col-form-label">Type<span class="text-danger">*</span>
						</label>
    <div class="col-sm-9 input-wrapper">

						<select name="type" class=" form-control select2" style="width: 100%;">
														<option value="SINGLE">
								SINGLE</option>
														<option value="MULTIPLE">
								MULTIPLE</option>
													</select>
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