@extends('layouts.master-res')

@section('Title')
    Location
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
					<h1 class="text-dark" >Locations</h1> 
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
      <div class="card-header">
        <h1 class="card-title mt-2">List of Locations</h1>
        <div class="card-tools">
          <a href="{{route('restaurant-owner.location.create')}}">
          <button type="button" class="btn btn-block  btn-sm" style="background: #8141a1;color: white;">Add Branch</button>
          </a>
        </div>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
      <div class="table-responsive">
        <table id="table-data" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>ID</th>
              <th>Branch</th>
              <th>Address</th>
              <th>Pincode</th>
              <th  colspan="2">Action</th>
            </tr>
          </thead>
          <tbody id="myTable">
                <td>2</td>
                <td>KFC JAFZA Branch Dubai</td>
                <td>United Arab Emirates</td>
                <td>363641</td>
                <td> 
                <a href="">
                  <button type="button" class="btn" style="background-color: #8141a1;">
                  <i class="fas fa-pencil-alt" style="color: white;"></i>
                  </button>
                </a>
</td>
<td>
                <a href="">
                  <button type="button" class="btn" style="background-color: #8141a1;" >
                  <i class="fas fa-trash" style="color: white;"></i>
                  </button>
                </a>
            </td>
          </tbody>
          <tfoot>
            <tr>
              <th>ID</th>
              <th>Branch</th>
              <th>Address</th>
              <th>Pincode</th>
              <th  colspan="2">Action</th>
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