@extends('layouts.master-res')

@section('Title')
    List of Dishes Categories

@endsection


@section('content')
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
          <h1 class="m-0 text-dark" style="font-weight: 700;">Dish Categories</h1>
          <p style="color: grey;">view all dish categories</p>
          </div>
    </div>
    <div style="margin-left: auto;display: flex; align-items: center;">
      <div class="searchicon">
          <i class="fas fa-search" style="color: #8141a1;margin: auto ;"></i>
        </div>
        <div>
        <input id="myInput"  class="search" type="text" placeholder="Search.." style="border: none; ">
        </div>
      <div class="bell">
        <i class="fas fa-bell" style="margin: auto ;"></i>
      </div>
        <div class="imglogo">
            <img src="{{ asset('/img/purple_logo.png') }}" style="margin:auto;width: 100%;height: 100%;">
        </div>
    </div>       
</div>
@if (Session::has('Msg_dish_cate_Edit'))
  <div class="alert alert-success alert-dismissible fade show" id="success-alert">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
      {{Session::get('Msg_dish_cate_Edit')}}
    </div>  
@endif 
<script>
$("#success-alert").fadeTo(2000, 500).slideUp(500, function(){
    $("#success-alert").slideUp(500);
});
</script>
<div class="container-fluid">
                    <!-- Small boxes (Stat box) -->
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h1 class="card-title mt-2">List of Dishes Categories</h1>
        <div class="card-tools">
          <a href="{{route('restaurant-owner.dish_category.create')}}">
          <button type="button" class="btn btn-block  btn-sm" style="background: #8141a1;color: white;">Add Dish Category</button>
          </a>
        </div>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
      <div class="table-responsive">
      <table class="table table-bordered data-table table-striped">
          <thead>
            <tr>
              <th>Sr No.</th>
              <th>Image</th>
              <th>Name</th>
              <th>Active</th>
              <th colspan="1">Action</th>
            </tr>
          </thead>
          <tbody id="myTable">
         
          </tbody>
          <tfoot>
            <tr>
              <th>Sr No.</th>
              <th>Image</th>
              <th>Name</th>
              <th>Active</th>
              <th colspan="1">Action</th>
            </tr>
          </tfoot>
        </table>
        </div>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  <!-- ./col -->
</div>
<!-- /.row -->
                </div>

<script type="text/javascript">
  $(function () {
  
    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('restaurant-owner.dish_categories') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'image', name: 'image',},
            {data: 'name', name: 'name'},
            {data: 'active', name: 'active'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
           
            
        ],
        "order": [[1, 'asc']]
    });
  });
</script>
@endsection


@section('scripts')

@endsection