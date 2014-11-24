@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
Invoice
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
<!--page level css -->
<link href="{{ asset('assets/vendors/jasny-bootstrap/css/jasny-bootstrap.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/vendors/x-editable/css/bootstrap-editable.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/vendors/magnifier/css/imgmagnify.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/vendors/iCheck/skins/all.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/css/pages/user_profile.css') }}" rel="stylesheet" type="text/css"/>
<!--end of page level css-->
@stop


{{-- Page content --}}
@section('content')
<section class="content-header">
    <h1>Event Details</h1>
    <ol class="breadcrumb">
        <li>
            <a href="index"> <i class="livicon" data-name="home" data-size="16" data-color="#000"></i>
                Dashboard
            </a>
        </li>
        <li class="active">Manage Events</li>
        <li class="active">Event Details</li>
    </ol>
</section>
<!-- Main content -->
<section class="content paddingleft_right15">
    <div class="row">
        <div class="panel panel-success">
            <div class="panel-heading">
                <h3 class="panel-title">
                <i class="livicon" data-name="gift" data-size="20" data-loop="true" data-c="#fff" data-hc="#fff"></i>
                    Maria's Sweet 16 (#33221)
                </h3>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-xs-12  col-sm-4 col-md-4 col-lg-4 pull-left">
                        <div class="panel panel-success height">

                            <div class="panel-heading">
                                    Client Details</div>
                                <div class="panel-body"> 
                                    <table class="table table-bordered table-striped" id="users">
                                        <tr>
                                            <td><b>Name</b></td>
                                            <td>
                                                <a href="#" data-pk="1" class="editable" data-title="Edit User Name">Angela Smith</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><b>Email</b></td>
                                            <td>
                                                <a href="#" data-pk="1" class="editable" data-title="Edit E-mail">angela@gmail.com</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><b>Phone</b></td>
                                            <td>
                                                <a href="#" data-pk="1" class="editable" data-title="Edit Phone Number">(999) 999-9999</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><b>Address</b></td>
                                            <td>
                                                <a href="#" data-pk="1" class="editable" data-title="Edit Address">2234 Astoria Blvd. Astoria, NY 11032</a>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                            <div class="panel panel-success height">

                                <div class="panel-heading hidden-sm">
                                    Event Summary</div>
                                    <div class="panel-heading hidden-lg hidden-md hidden-xs">Order Pre</div>
                                        <div class="panel-body" style="padding:15px 0px 36px 22px;">
                                        <table class="table table-bordered table-striped" id="users">
                                            <tr>
                                                <td><b>Date</b></td>
                                                <td>
                                                    <a href="#" data-pk="1" class="editable" data-title="Edit User Name">12/15/2014</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><b>Time</b></td>
                                                <td>
                                                    <a href="#" data-pk="1" class="editable" data-title="Edit E-mail">6-10 PM</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><b>Room</b></td>
                                                <td>
                                                    <a href="#" data-pk="1" class="editable" data-title="Edit Phone Number">Ammos</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><b>Type</b></td>
                                                <td>
                                                    <a href="#" data-pk="1" class="editable" data-title="Edit Address">Sweet16</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><b>Guests</b></td>
                                                <td>
                                                    <a href="#" data-pk="1" class="editable" data-title="Edit Address">80 adults, 20 kids (not confirmed)</a>
                                                </td>
                                            </tr>
                                        </table>    
                                        </div>
                                    </div>
                                </div>
                            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                <div class="panel panel-success height">
                                    <div class="panel-heading">
                                        Payment Info</div>
                                    <div class="panel-body" style="padding:15px 0px 55px 22px;">
                                        <table class="table table-bordered table-striped" id="users">
                                            <tr>
                                                <td><b>Card on file</b></td>
                                                <td>
                                                    <a href="#" data-pk="1" class="editable" data-title="Edit User Name">Yes</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><b>Card Type</b></td>
                                                <td>
                                                    <a href="#" data-pk="1" class="editable" data-title="Edit E-mail">Visa</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><b>Card Number</b></td>
                                                <td>
                                                    <a href="#" data-pk="1" class="editable" data-title="Edit Phone Number">** 332</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><b>Deposit</b></td>
                                                <td>
                                                    <a href="#" data-pk="1" class="editable" data-title="Edit Address">$500</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><b>Balance</b></td>
                                                <td>
                                                    <a href="#" data-pk="1" class="editable" data-title="Edit Address">$9758.45</a>
                                                    <div style="margin-right:22px;" class="progress">
                                                        <div class="progress-bar progress-bar-primary progress-bar-striped active" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 45%">
                                                          <span>45% Complete</span>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-success">
                                <div class="panel-heading">
                                <div class="actions">
                                <a href="eventdetail.html" class="btn btn-default btn-sm pull-right">
                                <i class="glyphicon glyphicon-edit"></i>
                                    Edit
                                </a>
                                </div>
                                    <strong>Order summary</strong>
                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-condensed">
                                            <thead>
                                                <tr>
                                                    <td>
                                                        <strong>Item Name</strong>
                                                    </td>
                                                    <td class="text-center">
                                                        <strong>Item Price</strong>
                                                    </td>
                                                    <td class="text-center">
                                                        <strong>Item Quantity</strong>
                                                    </td>
                                                    <td class="text-right">
                                                        <strong>Total</strong>
                                                    </td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><b>Food</b><br>Buffet Menu<br>&nbsp;&nbsp;&nbsp;Calamari<br>&nbsp;&nbsp;&nbsp;Filet Mignon<br>&nbsp;&nbsp;&nbsp;Roasted Leg of Lamb</td>
                                                    <td class="text-center"><br><br>$3.50<br>$8.00<br>$8.00</td>
                                                    <td class="text-center"><br>80</td>
                                                    <td class="text-right"></td>
                                                </tr>
                                                <tr>
                                                    <td><b>Food</b><br>Premium Open Bar</td>
                                                    <td class="text-center"></td>
                                                    <td class="text-center">80</td>
                                                    <td class="text-right"></td>
                                                </tr>
                                                <tr>
                                                    <td class="highrow"></td>
                                                    <td class="highrow"></td>
                                                    <td class="highrow text-center">
                                                        <strong>Price per person</strong>
                                                    </td>
                                                    <td class="highrow text-right">$99.50</td>
                                                </tr>
                                                <tr>
                                                    <td class="emptyrow"></td>
                                                    <td class="emptyrow"></td>
                                                    <td class="emptyrow text-center">
                                                        <strong>Tax</strong>
                                                    </td>
                                                    <td class="emptyrow text-right">$706.45</td>
                                                </tr>
                                                <tr>
                                                    <td class="emptyrow"></td>
                                                    <td class="emptyrow"></td>
                                                    <td class="emptyrow text-center">
                                                        <strong>Gratuity</strong>
                                                    </td>
                                                    <td class="emptyrow text-right">$1592.00</td>
                                                </tr>
                                                <tr>
                                                    <td class="emptyrow">
                                                        <i class="livicon" data-name="barcode" data-size="60" data-loop="true"></i>
                                                    </td>
                                                    <td class="emptyrow"></td>
                                                    <td class="emptyrow text-center">
                                                    <strong>Total</strong>
                                                </td>
                                                <td class="emptyrow text-right">$10,258.45</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                            <div class="pull-right" style="margin:10px 20px;">
                                <button type="button" class="btn btn-responsive button-alignment btn-primary" data-toggle="button">
                                    <a style="color:#fff;" onclick="javascript:window.print();">
                                        Print
                                        <i class="livicon" data-name="printer" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                                    </a>
                                </button>
                                <button type="button" class="btn btn-responsive button-alignment btn-success" data-toggle="button">
                                    <a style="color:#fff;">
                                        Send Invoice to Client
                                        <i class="livicon" data-name="check" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                                    </a>
                                </button>
                            </div>
                        </div>
                    </div>
                </section>
@stop

{{-- page level scripts --}}
@section('footer_scripts')
<!-- begining of page level js -->
<script src="{{ asset('assets/vendors/jasny-bootstrap/js/jasny-bootstrap.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/vendors/x-editable/jquery.mockjax.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/vendors/x-editable/bootstrap-editable.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/vendors/magnifier/imgmagnify.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/vendors/iCheck/icheck.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/pages/user_profile.js') }}" type="text/javascript"></script>
<!-- end of page level js -->
@stop