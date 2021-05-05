@extends('layouts.master')

@section('Title')
    Dashboard |Restaurant-Owner
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
         <h1 class="m-0 text-dark" style="font-weight: 700;">Order Details </h1>
         </div>
         </div>
</div>



<div class="content-wrapper ">

            
    <div class="content-header">
        <div class="container-fluid">
            <h1 class="m-0 text-dark">Order #04-01-93185ACD-1946</h1>
        </div>
    </div>

    
    <div class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->

<div class="row">
<div class="col-12">



<div class="card card-primary card-tabs">
    <div class="card-header p-0 pt-1 border-bottom-0">
        <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="custom-tabs-three-home-tab" data-toggle="pill"
                    href="#custom-tabs-three-home" role="tab" aria-controls="custom-tabs-three-home"
                    aria-selected="true">Order Detail</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="tabs-dishes-tab" data-toggle="pill" href="#tabs-dishes" role="tab"
                    aria-controls="tabs-dishes" aria-selected="false">
                    <i class="fas fa-pencil-alt"></i> Update Order Status</a>
            </li>
        </ul>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div class="tab-content" id="custom-tabs-three-tabContent">
            <div class="tab-pane fade show active" id="custom-tabs-three-home" role="tabpanel"
                aria-labelledby="custom-tabs-three-home-tab">
                <!-- Main content -->
                <div class="invoice p-3 mb-3" id="invoice">
                    <div class="row border-bottom">
                        <div class="col-12 pb-2">
                            <h4 class="text-muted">
                                <i class="far fas fa-store"></i> Barrique Venice
                                
                            </h4>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- info row -->
                    <div class="row invoice-info pt-2">
                        <div class="col-sm-4 invoice-col">
                            From
                            <address>
                                <strong>Customer</strong><br>
                                3195 Hobart Flats<br>
                                Phone: +123456893<br>
                                Email: customer@example.com
                            </address>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4 invoice-col">
                            To
                            <address>
                                <strong>Barrique Venice</strong><br>
                                3677 Golden Heights<br>
                                Port Arneside<br>
                                43168<br>
                                Phone: (931) 541-7235 x82956<br>
                                Email: uconroy@mcclure.com
                            </address>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4 invoice-col">
                            <b>Invoice #04-01-93185ACD-1946</b><br>
                            <b>2021-04-01 21:48:38</b><br>
                            <br>
                            <b>Order ID:</b> 1048<br>
                            <b>Order placed:</b> 4 hours ago<br>
                            <b>Status:</b> <button type="button"
                                class="btn btn-success btn-xs">ORDER PLACED</button>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->

                    <!-- Table row -->
                    <div class="row">
                        <div class="col-12 table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Dish Name</th>
                                        <th>Per Price</th>
                                        <th>Qty</th>
                                        <th>Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                                                                                                            <tr>
                                        <td>Cheese Pizza <br>
                                                                                                    Addons: 
                                                                                                            Large-$12.00,
                                                                                                                                                                        Peanut Butter Filling-$5.00,
                                                                                                                                                                                                                </td>
                                        <td>$10.00</td>
                                        <td>x 1</td>
                                        <td>$27
                                        </td>
                                    </tr>
                                                                                                                        </tbody>
                            </table>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->

                    <div class="row">
                        <!-- accepted payments column -->
                        <div class="col-6">
                            <p class="lead">Payment Methods:</p>

                            <p class="text-muted well well-sm text-uppercase shadow-none font-weight-bold"
                                style="margin-top: 10px;">
                                COD
                            </p>
                        </div>
                        <!-- /.col -->
                        <div class="col-6">

                            <div class="table-responsive">
                                <table class="table">
                                    <tr>
                                        <th style="width:50%">Subtotal:</th>
                                        <td>$27</td>
                                    </tr>
                                    <tr>
                                        <th>Tax (5%)</th>
                                        <td>$3.35</td>
                                    </tr>
                                    <tr>
                                        <th>Delivery Charges:</th>
                                        <td>$40.00</td>
                                    </tr>
                                    <tr>
                                        <th>Coupon Discount (-):</th>
                                        <td>$0.00</td>
                                    </tr>
                                    <tr>
                                        <th>Total:</th>
                                        <td>$70.35</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->

                    <!-- this row will not appear when printing -->
                    <div class="row no-print">
                        <div class="col-12">
                            <a href="javascript:void()" onclick="window.print()" class="btn btn-default"><i
                                    class="fas fa-print"></i>
                                Print</a>
                        </div>
                    </div>
                </div>
                <!-- /.invoice -->
            </div>

            <div class="tab-pane fade" id="tabs-dishes" role="tabpanel" aria-labelledby="tabs-dishes-tab">
                <!-- form start -->
                <form role="form" id="createForm" method="POST"
                    action="https://foodlicious.ml/admin/orders/1048/update" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="27N40M7pXP9oYfMVvwOuxViFWlkrfC3YNqG9GQ4E">							<input type="hidden" name="_method" value="PUT">							<div class="card-body">

                        <div class="form-group row">
                            <label for="order_status" class="col-sm-3 col-form-label">Order Status
                            </label>
                            <select name="order_status" class="col-sm-9 form-control select2">
                                                                        <option value="ORDER PLACED"
                                    selected>
                                    ORDER PLACED</option>
                                                                        <option value="ORDER ACCEPTED"
                                    >
                                    ORDER ACCEPTED</option>
                                                                        <option value="ORDER PREPARED"
                                    >
                                    ORDER PREPARED</option>
                                                                        <option value="On the Way"
                                    >
                                    On the Way</option>
                                                                        <option value="Delivered"
                                    >
                                    Delivered</option>
                                                                    </select>
                        </div>

                        <div class="form-group row">
                            <label for="payment_status" class="col-sm-3 col-form-label">Payment Status
                            </label>
                            <select name="payment_status" class="col-sm-9 form-control select2">
                                                                        <option value="NOT_PAID"
                                    >
                                    NOT_PAID</option>
                                                                        <option value="PAID"
                                    >
                                    PAID</option>
                                                                        <option value="YET_TO_BE_PAID"
                                    >
                                    YET_TO_BE_PAID</option>
                                                                    </select>
                        </div>

                        <div class="form-group row">
                            <label for="delivery_user_id" class="col-sm-3 col-form-label">Delivery Scout Assign
                            </label>
                            <select name="delivery_user_id" class="col-sm-9 form-control select2">
                                <option value=""></option>
                                                                        <option value="3"
                                    >
                                    Delivery Scout</option>
                                                                    </select>
                        </div>

                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>


</div>
<!-- ./col -->
</div>
        </div>
    </div>
</div>


@endsection


@section('scripts')


@endsection