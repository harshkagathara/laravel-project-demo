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
        <h1 class="m-0 text-dark" style="font-weight: 700;">Payment</h1>
        <p style="color: grey;">Manage all Payments</p>
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
      <!-- <div class="card-header">
              <h3 class="card-title">DataTable with default features</h3>
            </div> -->
      <!-- /.card-header -->
      <div class="card-body">
      <div class="table-responsive">
        <table id="table-data" class="table table-bordered table-striped">
          <thead>
            <tr>
            <th>Payment ID</th>
              <th>Date</th>
              <th>Booking ID</th>
              <th>Customer Name</th>
              <th>Total</th>
              <th>Discount</th>
              <th>Payment Type</th>
              <th>Payment Details</th>
             
            </tr>
          </thead>
          <tbody id="myTable">
                        <tr>
                        <td>#02-10-92B404E9-3BBE</td>
              <td>02-02-2021
              </td>
              <td>Bk-214</td>
              <td>parag</td>
              <td>KD1000</td>
              <td>0</td> 
              <td>Card</td>
              <td>
                <a href="#">
                  <button type="button" class="btn btn-info btn-sm" style="background-color: #8141a1;">
                    
                    View</button>
                </a>
              </td>
            </tr>
            </tbody>
          <tfoot>
            <tr>
            <th>Payment ID</th>
              <th>Date</th>
              <th>Booking ID</th>
              <th>Customer Name</th>
              <th>Total</th>
              <th>Discount</th>
              <th>Payment Type</th>
              <th>Payment Details</th>
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