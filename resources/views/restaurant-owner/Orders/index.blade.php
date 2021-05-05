@extends('layouts.master-res')

@section('Title')
    Dashboard |Restaurant-Owner
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
                    <!-- Small boxes (Stat box) -->
<div class="row">
  <div class="col-12">
    <div class="card" style="overflow-x: auto;">
      <!-- <div class="card-header">
              <h3 class="card-title">DataTable with default features</h3>
            </div> -->
      <!-- /.card-header -->
       <div class="card-body">
      <div class="table-responsive">
        <table id="table-data" class="table table-bordered table-striped">
          <thead>
            <tr>
            <th>Order ID</th>
            
              <th>Requested By</th>
              <th>Wepppis</th>
              <th>Purpose Of Invitation</th>
              <th>Date</th>
              <th>Time</th>
              <th>Amount</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody id="myTable">
          @foreach($follow_ups as $live_req)
                        <tr>
              <td>#{{$live_req->order_id }}</td>
              <!-- #02-10-92B404E9-3BBE -->
              <td>{{$live_req->name}}</td>
              <td>{{$live_req->wepppies}}</td>
              <td>{{$live_req->purpose}}</td>
              <td>{{$live_req->date}}</td>
              <td>{{$live_req->time}}</td>
            
                @if($live_req->amount == "")
                <td>-</td>
                @else
                <td>KD {{$live_req->amount}} </td>
                @endif
              <td>
                @if($live_req->status == 1)
                <span class="badge badge-pill " style="background:#7dd3f6">Accepted</span>
                @else
                <span class="badge badge-pill " style="background:#ff6666">Declined</span>
                @endif
                </td>
              <td>
                <a href="#">
                  <button type="button" class="btn" style="background-color: #8141a1;color:white;">  View   </button>
                </a>
              </td>
            </tr>
            @endforeach
            </tbody>
          <tfoot>
            <tr>
            <th>Order ID</th>
             
              <th>Requested By</th>
              <th>Wepppis</th>
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
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  <!-- ./col -->
</div>
<!-- /.row -->
                </div>

@endsection


@section('scripts')


@endsection