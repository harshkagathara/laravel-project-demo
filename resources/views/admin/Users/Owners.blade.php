@extends('layouts.master')

@section('Title')
    Dashboard |Restaurant
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
					<h1 class="m-0 text-dark">Restaurant Owners</h1> 
          <p style="color: grey;">Manage all restaurant Owners</p>
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
                <div class="container-fluid">
                    <!-- Small boxes (Stat box) -->
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h1 class="card-title mt-2">List of Restaurant Owners</h1>
        <div class="card-tools">
          <!-- <a href="#">
            <button type="button" class="btn btn-block btn-sm	" style="color: white; background:#8141a1">Add Owner</button>
          </a> -->
        </div>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
      <div class="table-responsive">
      <table class="table table-bordered data-table table-striped">
          <thead>
            <tr>
              <th>Sr No.</th>
              <th>Name</th>
              <th>Email</th>
              <th>Phone</th>
              <th>Joined</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody id="myTable">
          
          </tbody>
          <tfoot>
            <tr>
              <th>Sr No.</th>
              <th>Name</th>
              <th>Email</th>
              <th>Phone</th>
              <th>Joined</th>
              <th>Action</th>
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
        ajax: "{{ route('admin.owners') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'name', name: 'name',},
            {data: 'email', name: 'email'},
            {data: 'phone', name: 'phone'},
            {data: 'created_at', name: 'created_at'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
           
            
        ],
        "order": [[1, 'asc']]
    });
  });
</script>
@endsection


@section('scripts')

@endsection