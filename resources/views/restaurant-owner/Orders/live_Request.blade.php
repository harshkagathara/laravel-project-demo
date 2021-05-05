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
            <h1 class="m-0 text-dark" style="font-weight: 700;">Live Requests</h1>
            <p style="color: grey;">view all Live Requests</p>
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
            
              <th colspan="2">Action</th>
            </tr>
          </thead>
          <tbody id="myTable">
          @foreach($live_request as $live_req)
                        <tr>
              <td  class="id{{$live_req->id}}">#{{$live_req->id}}</td>
              <td >{{$live_req->name}}</td>
              <td class="wep{{$live_req->id}}">{{$live_req->wepppies}}</td>
              <td class="pur{{$live_req->id}}">{{$live_req->purpose}}</td>
              <td class="date{{$live_req->id}}">{{$live_req->date}}</td>
              <td class="time{{$live_req->id}}">{{$live_req->time}}</td>
              <input type="hidden" class="res{{$live_req->id}}" value="{{$live_req->restaurant_id}}">
              <input type="hidden" class="req{{$live_req->id}}" value="{{$live_req->request_by}}">
              <td>
                <a class="Accept" id="{{$live_req->id}}">
                  <button type="button" class="btn" style="background-color: white;">
                    <i class="fas fa-check"  style="color: #8141a1;"></i>
                  </button>
                </a>
              </td>
              <td>
              <a class="Decline" id="{{$live_req->id}}">
                  <button type="button" class="btn" style="background-color: #8141a1;">
                    <i class="fas fa-times " style="color: white;"></i>
                    
                    </button>
                    
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
            
              <th colspan="2">Action</th>
            </tr>
          </tfoot>
        </table>
      </div> 
     </div>
    </div>
    <!-- /.card -->
  </div>
  <!-- ./col -->
</div>
<!-- /.row -->
                </div>
                <script>

           
           
                	$(document).on('click', '.Accept', function() {
                    var id = $(this).attr('id');
                    var req =$('.req'+id+"").val();
                    var wep =$('.wep'+id+"").text();
                    var date =$('.date'+id+"").text();
                    var time =$('.time'+id+"").text();
                    var pur =$('.pur'+id+"").text();
                    var res_id =$('.res'+id+"").val();
                    var status = '1';
  
                    $.ajax({
                      url:"{{ route('live-request-store') }}",
                      method: "post",
                      dataType: "json",
                      data: {
                        id:id, req:req , wep:wep , date:date, time:time , pur:pur , res_id:res_id,
                        status:status, 
                       _token: '{{csrf_token()}}',
                      },
                      success: function(data) {

                       window.location.reload()
                      }
                    })
                  });

                  $(document).on('click', '.Decline', function() {
                    var id = $(this).attr('id');
                    var req =$('.req'+id+"").text();
                    var wep =$('.wep'+id+"").text();
                    var date =$('.date'+id+"").text();
                    var time =$('.time'+id+"").text();
                    var pur =$('.pur'+id+"").text();
                    var res_id =$('.res'+id+"").val();
                    var status = '0';
        
                    $.ajax({
                      url:"{{ route('live-request-store') }}",
                      method: "post",
                      dataType: "json",
                      data: {
                        id:id, req:req , wep:wep , date:date, time:time , pur:pur , res_id:res_id,
                        status:status, 
                       _token: '{{csrf_token()}}',
                      },
                      success: function(data) {
                       window.location.reload()
                      }
                    })
                  });
                </script>
 
@endsection


@section('scripts')


@endsection