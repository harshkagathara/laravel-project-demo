@extends('layouts.master')

@section('Title')
   Request
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
        <h1 class="m-0 text-dark" style="font-weight: 700;">Follow Up</h1>
        <p style="color: grey;">Manage all Follow Ups</p>
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
                  
                    <div class="row">
  <div class="col-12">
    <div class="card" style="overflow-x: auto;">
    
      <div class="card-body">
      <div class="table-responsive">
      <table class="table table-bordered data-table table-striped">
          <thead>
            <tr>
            <th>Order ID</th>
              <th>Restaurant</th>
              <th>Wepppi (Requested By)</th>
              <th>No. Of Wepppis</th>
              <th>Purpose Of Invitation</th>
              <th>Date</th>
              <th>Time</th>
              <th>Amount</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody id="myTable">
          
            </tbody>
          <tfoot>
            <tr>
            <th>Order ID</th>
              <th>Restaurant</th>
              <th>Wepppi (Requested By)</th>
              <th>No. Of Wepppis</th>
              <th>Purpose Of Invitation</th>
              <th>Date</th>
              <th>Time</th>
              <th>Amount</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </tfoot>
        </table> 
        </div>
    </div>
    </div>
</div>
</div>
</div>

<script type="text/javascript">
  $(function () {
  
    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('admin.orders') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'Rname', name: 'Rname'},
            {data: 'name', name: 'name'},
            {data: 'wepppies', name: 'wepppies'},
            {data: 'purpose', name: 'purpose'},
            {data: 'date', name: 'date'},
            {data: 'time', name: 'time'},
            {data: 'amount', name: 'amount'},
            {data: 'active', name: 'active'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
                
        ]
       
    });
  });
</script>
@endsection


@section('scripts')

@endsection