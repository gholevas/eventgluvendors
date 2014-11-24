@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
Invoice
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
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
                                <div class="actions">
                                    <a href="eventdetail.html" class="btn btn-default btn-sm pull-right">
                                    <i class="glyphicon glyphicon-edit"></i>
                                        Edit
                                    </a>
                                </div>

                                    Client Details</div>

                                <div class="panel-body"> 
                                    <b>Name:</b> Angela Smith<br>
                                    <b>Email:</b> angela@gmail.com<br>
                                    <b>Phone:</b> (718) 229 3829<br>
                                    <b>Address:</b> 2234 Astoria Blvd.<br>
                                    Astoria, NY 11032
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                            <div class="panel panel-success height">

                                <div class="panel-heading hidden-sm">
                                    <div class="actions">
                                        <a href="eventdetail.html" class="btn btn-default btn-sm pull-right">
                                            <i class="glyphicon glyphicon-edit"></i>
                                            Edit
                                        </a>
                                    </div>
                                    Event Summary</div>
                                    <div class="panel-heading hidden-lg hidden-md hidden-xs">Order Pre</div>
                                        <div class="panel-body" style="padding:15px 0px 36px 22px;">

                                            <b>Date:</b> 12/15/2014<br>
                                            <b>Time:</b> 6-10 PM<br>
                                            <b>Room:</b> Ammos<br>
                                            <b>Type:</b> Sweet16<br>
                                            <b>Guests:</b> 80 adults, 20 kids (not confirmed)
                                        </div>
                                    </div>
                                </div>
                            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                <div class="panel panel-success height">
                                    <div class="panel-heading">
                                    <div class="actions">
                                    <a href="eventdetail.html" class="btn btn-default btn-sm pull-right">
                                        <i class="glyphicon glyphicon-edit"></i>
                                            Edit
                                        </a>
                                        </div>
                                        Payment Info</div>
                                    <div class="panel-body" style="padding:15px 0px 55px 22px;">

                                        <b>Card on file:</b> Yes<br>
                                        <b>Card Type:</b>
                                        Visa
                                        <br>
                                        <b>Card Number:</b>
                                        ** 332
                                        <br>
                                        <b>Exp Date:</b>
                                        09/2020
                                        <br>
                                        <b>Deposit:</b> $500<br>
                                        <b>Balance:</b> $9758.45
                                        <div style="margin-right:22px;" class="progress">
                                        <div class="progress-bar progress-bar-primary progress-bar-striped active" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 45%">
                                          <span>45% Complete</span>
                                        </div>
                                         </div>
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
@stop