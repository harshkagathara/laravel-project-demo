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
        <h1 class="m-0 text-dark" style="font-weight: 700;">Review</h1>
        <p style="color: grey;">Manage all Reviews</p>
        </div>
    </div>
    <div style="margin-left: auto;display: flex; align-items: center;">
      <div class="searchicon">
          <i class="fas fa-search" style="color: #8141a1;margin: auto ;"></i>
        </div>
        <div >
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
        <table id="orders-data" class="table table-bordered table-striped">
          <thead>
            <tr>
            <th>Name</th>
            <th>Order No</th>
            <th>Rating</th>
            <th>Text Review</th>
             
             
            </tr>
          </thead>
          <tbody id="myTable">
                        <tr>
                <td>Kagu</td>
              <td>Od-211
              </td>
              <td> 
              <i class="fa fa-star" style="margin: auto 5px;color: #7dd3f6;font-size: 12px;"></i>
              <i class="fa fa-star" style="margin: auto 5px;color: #7dd3f6;font-size: 12px;"></i>
              <i class="fa fa-star" style="margin: auto 5px;color: #7dd3f6;font-size: 12px;"></i>
              <i class="fa fa-star" style="margin: auto 5px;color: #7dd3f6;font-size: 12px;"></i>
              <i class="fa fa-star" style="margin: auto 5px;color: #7dd3f6;font-size: 12px;"></i>

              </td>
              <td>Thank you Wepppi Team for the delicious food! </td>
              
             
            </tr>
            <tr>
                <td>dhiraj</td>
              <td>Od-212
              </td>
              <td> 
              <i class="fa fa-star" style="margin: auto 5px;color: #7dd3f6;font-size: 12px;"></i>
              <i class="fa fa-star" style="margin: auto 5px;color: #7dd3f6;font-size: 12px;"></i>
              <i class="fa fa-star" style="margin: auto 5px;color: #7dd3f6;font-size: 12px;"></i>
              </td>
              <td>Thank you Wepppi Team for the delicious service! </td>
              
             
            </tr>
            </tbody>
          <tfoot>
            <tr>
            <th>Name</th>
            <th>Order No</th>
            <th>Rating</th>
            <th>Text Review</th>
             
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