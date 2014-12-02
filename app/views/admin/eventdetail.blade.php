@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
Event Name
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
<!--page level css -->

<link href="{{ asset('assets/css/pages/user_profile.css') }}" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" href="{{ asset('assets/css/only_dashboard.css') }}" />
<!--end of page level css-->
<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/datatables/css/select2.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/datatables/css/dataTables.bootstrap.css') }}" />
<link href="{{ asset('assets/css/pages/tables.css') }}" rel="stylesheet" type="text/css" />
<!-- page level css -->
<link href="{{ asset('assets/vendors/x-editable/css/x-select.css') }}" type="text/css" rel="stylesheet" />
<link href="{{ asset('assets/vendors/x-editable/css/bootstrap-editable.css') }}" type="text/css" rel="stylesheet" />
<link href="{{ asset('assets/vendors/x-editable/css/x-selectbootstrap.css') }}" type="text/css" rel="stylesheet" />
<link href="{{ asset('assets/vendors/x-editable/css/typehead-bootstrap.css') }}" type="text/css" rel="stylesheet" />
<link href="{{ asset('assets/css/pages/inlinedit.css') }}" rel="stylesheet" />
<!-- end of page level css -->


<style>
	

.chat
{
    list-style: none;
    margin: 0;
    padding: 0;
}

.chat li
{
    margin-bottom: 10px;
    padding-bottom: 5px;
    border-bottom: 1px dotted #B3A9A9;
}

.chat li.left .chat-body
{
    margin-left: 60px;
}

.chat li.right .chat-body
{
    margin-right: 60px;
}


.chat li .chat-body p
{
    margin: 0;
    color: #777777;
}

.panel .slidedown .glyphicon, .chat .glyphicon
{
    margin-right: 5px;
}


.chat-scroll
{
    overflow-y: scroll;
    height: 250px;
}


	
	
	
	
	
	
	
	
	

</style>

@stop


{{-- Page content --}}
@section('content')
<section class="content-header">
    <h1>Maria's Sweet 16</h1>
    <ol class="breadcrumb">
        <li>
            <a href="index"> <i class="livicon" data-name="home" data-size="16" data-color="#000"></i>
                Dashboard
            </a>
        </li>
        <li class="active">Upcoming Events</li>
        <li class="active">Maria's Sweet 16</li>
    </ol>
</section>


<!-- Main content -->
<section class="content paddingleft_right15">
    <div class="row">		
         
			
            <div class="panel-body">
                <div class="row">
                    <div class="col-xs-12  col-sm-4 col-md-4 col-lg-4 pull-left">
                        <div class="panel panel-success height">
							<div class="btn-group pull-right">
									<button class="btn dropdown-toggle btn-success" data-toggle="dropdown">
										<i class="livicon" data-name="gear" data-size="20" data-loop="true" data-c="#fff" data-hc="#fff"></i>
										<i class="fa fa-angle-down"></i>
									</button>
									<ul class="dropdown-menu pull-right">
										<li>
											<a data-toggle="modal" data-href="#editClientDetails" href="#editClientDetails">Edit</a>
										</li>
									</ul>
									</div>

                            <div class="panel-heading">
                                    <strong>Client Details</strong>
							</div>
                                <div class="panel-body"> 
                                    <table class="table table-bordered table-striped" id="users">
                                        <tr>
                                            <td><b>Name</b></td>
                                            <td>
                                                Angela Doe
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><b>Email</b></td>
                                            <td>
                                                angela@gmail.com
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><b>Phone</b></td>
                                            <td>
                                                (999) 999-9999
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><b>Address</b></td>
                                            <td>
                                                2234 Astoria Blvd. Astoria, NY 11032
                                            </td>
                                        </tr>
										<tr>
                                            <td><b>Notes</b></td>
                                            <td>
                                                None
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                            <div class="panel panel-success height">
								<div class="btn-group pull-right">
									<button class="btn dropdown-toggle btn-success" data-toggle="dropdown">
										<i class="livicon" data-name="gear" data-size="20" data-loop="true" data-c="#fff" data-hc="#fff"></i>
										<i class="fa fa-angle-down"></i>
									</button>
									<ul class="dropdown-menu pull-right">
										<li>
											<a data-toggle="modal" data-href="#editEvent" href="#editEvent">Edit</a>
										</li>
									</ul>
									</div>
                                <div class="panel-heading hidden-sm">
                                    <strong>Event Summary</strong>
								</div>
                                    <div class="panel-heading hidden-lg hidden-md hidden-xs">Order Pre</div>
                                        <div class="panel-body" style="padding:15px 0px 36px 22px;">
                                        <table class="table table-bordered table-striped" id="users">
                                            <tr>
                                                <td><b>Event Name</b></td>
                                                <td>
                                                    Maria's Sweet 16
                                                </td>
                                            </tr>
											<tr>
                                                <td><b>Date</b></td>
                                                <td>
                                                    12/15/2014
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><b>Time</b></td>
                                                <td>
                                                   	6-10 PM
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><b>Room</b></td>
                                                <td>
                                                    Ammos
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><b>Type</b></td>
                                                <td>
                                                    Sweet16
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><b>Guests</b></td>
                                                <td>
                                                    80 adults, 20 kids (not confirmed)
                                                </td>
                                            </tr>
                                        </table>    
                                        </div>
                                    </div>
                                </div>
                            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                <div class="panel panel-success height">
									<div class="btn-group pull-right">
									<button class="btn dropdown-toggle btn-success" data-toggle="dropdown">
										<i class="livicon" data-name="gear" data-size="20" data-loop="true" data-c="#fff" data-hc="#fff"></i>
										<i class="fa fa-angle-down"></i>
									</button>
									<ul class="dropdown-menu pull-right">
										<li>
											<a href="#">Log a payment</a>
										</li>
										<li>
											<a href="#">Change credit card</a>
										</li>
									</ul>
									</div>
                                    <div class="panel-heading">
                                        <strong>Payment Info</strong>
									</div>
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
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="panel panel-success">
								<div class="btn-group pull-right">
									<button class="btn dropdown-toggle btn-success" data-toggle="dropdown">
										<i class="livicon" data-name="gear" data-size="20" data-loop="true" data-c="#fff" data-hc="#fff"></i>
										<i class="fa fa-angle-down"></i>
									</button>
									<ul class="dropdown-menu pull-right">
										<li>
											<a data-toggle="modal" data-href="#editSummary" href="#editSummary">Edit</a>
										</li>
										<li>
											<a href="#">Print</a>
										</li>
										<li>
											<a href="#">Save as PDF</a>
										</li>
										<li>
											<a href="#">Email Invoice to Client</a>
										</li>
									</ul>
								</div>
                                <div class="panel-heading">
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
                                                    <td><b>Drink</b><br>Premium Open Bar</td>
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
                                                    <td class="highrow"></td>
                                                    <td class="highrow"></td>
                                                    <td class="highrow text-center">
                                                        <strong>Discount (10%)</strong>
                                                    </td>
                                                    <td class="highrow text-right">$9.99</td>
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
										<strong>Notes</strong><br>None
                                </div>
                            </div>
                        </div>
                    </div>
						
					        <!-- To do list -->
        <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="panel panel-success todolist">
                <div class="panel-heading border-light">
                    <strong>Event Notes</strong>
                </div>
                <div class="panel-body nopadmar">
                    <form class="row">
                        <div class="todolist_list showactions">
                            <div class="col-md-8 col-sm-8 col-xs-8 nopadmar custom_textbox1">
                                <div class="todoitemcheck checkbox-custom">
                                   
                                </div>
                                <div class="todotext todoitem">Meeting with CEO</div>
                            </div>
                            <div class="col-md-4  col-sm-4 col-xs-4  pull-right showbtns todoitembtns">
                                <a href="#" class="todoedit">
                                    <span class="glyphicon glyphicon-pencil"></span>
                                </a>
                                |
                                <a href="#" class="tododelete redcolor">
                                    <span class="glyphicon glyphicon-trash"></span>
                                </a>
                            </div>
                        </div>
                        <div class="todolist_list showactions">
                            <div class="col-md-8 col-sm-8 col-xs-8 nopadmar custom_textbox1">
                                <div class="todoitemcheck">
                                    
                                </div>
                                <div class="todotext todoitem">Team Out</div>
                            </div>
                            <div class="col-md-4  col-sm-4 col-xs-4  pull-right showbtns todoitembtns">
                                <a href="#" class="todoedit">
                                    <span class="glyphicon glyphicon-pencil"></span>
                                </a>
                                |
                                <a href="#" class="tododelete redcolor">
                                    <span class="glyphicon glyphicon-trash"></span>
                                </a>
                            </div>
                        </div>
                        <div class="todolist_list showactions">
                            <div class="col-md-8 col-sm-8 col-xs-8 nopadmar custom_textbox1">
                                <div class="todoitemcheck">
                                    
                                </div>
                                <div class="todotext todoitem">Review On Sales</div>
                            </div>
                            <div class="col-md-4  col-sm-4 col-xs-4  pull-right showbtns todoitembtns">
                                <a href="#" class="todoedit">
                                    <span class="glyphicon glyphicon-pencil"></span>
                                </a>
                                |
                                <a href="#" class="tododelete redcolor">
                                    <span class="glyphicon glyphicon-trash"></span>
                                </a>
                            </div>
                        </div>
                        <div class="todolist_list showactions">
                            <div class="col-md-8 col-sm-8 col-xs-8 nopadmar custom_textbox1">
                                <div class="todoitemcheck">
                                    
                                </div>
                                <div class="todotext todoitem">Meeting with Client</div>
                            </div>
                            <div class="col-md-4  col-sm-4 col-xs-4  pull-right showbtns todoitembtns">
                                <a href="#" class="todoedit">
                                    <span class="glyphicon glyphicon-pencil"></span>
                                </a>
                                |
                                <a href="#" class="tododelete redcolor">
                                    <span class="glyphicon glyphicon-trash"></span>
                                </a>
                            </div>
                        </div>
                        <div class="todolist_list showactions">
                            <div class="col-md-8 col-sm-8 col-xs-8 nopadmar custom_textbox1">
                                <div class="todoitemcheck">
                                    
                                </div>
                                <div class="todotext todoitem">Analysis on Views</div>
                            </div>
                            <div class="col-md-4  col-sm-4 col-xs-4  pull-right showbtns todoitembtns">
                                <a href="#" class="todoedit">
                                    <span class="glyphicon glyphicon-pencil"></span>
                                </a>
                                |
                                <a href="#" class="tododelete redcolor">
                                    <span class="glyphicon glyphicon-trash"></span>
                                </a>
                            </div>
                        </div>
                        <div class="todolist_list showactions">
                            <div class="col-md-8 col-sm-8 col-xs-8 nopadmar custom_textbox1">
                                <div class="todoitemcheck">
                                    
                                </div>
                                <div class="todotext todoitem">Seminar on Market</div>
                            </div>
                            <div class="col-md-4  col-sm-4 col-xs-4  pull-right showbtns todoitembtns">
                                <a href="#" class="todoedit">
                                    <span class="glyphicon glyphicon-pencil"></span>
                                </a>
                                |
                                <a href="#" class="tododelete redcolor">
                                    <span class="glyphicon glyphicon-trash"></span>
                                </a>
                            </div>
                        </div>
                        <div class="todolist_list showactions">
                            <div class="col-md-8 col-sm-8 col-xs-8 nopadmar custom_textbox1">
                                <div class="todoitemcheck">
                                    
                                </div>
                                <div class="todotext todoitem">Business Review</div>
                            </div>
                            <div class="col-md-4  col-sm-4 col-xs-4  pull-right showbtns todoitembtns">
                                <a href="#" class="todoedit">
                                    <span class="glyphicon glyphicon-pencil"></span>
                                </a>
                                |
                                <a href="#" class="tododelete redcolor">
                                    <span class="glyphicon glyphicon-trash"></span>
                                </a>
                            </div>
                        </div>
                        <div class="todolist_list showactions">
                            <div class="col-md-8 col-sm-8 col-xs-8 nopadmar custom_textbox1">
                                <div class="todoitemcheck">
                                    
                                </div>
                                <div class="todotext todoitem">Purchase Equipment</div>
                            </div>
                            <div class="col-md-4  col-sm-4 col-xs-4  pull-right showbtns todoitembtns">
                                <a href="#" class="todoedit">
                                    <span class="glyphicon glyphicon-pencil"></span>
                                </a>
                                |
                                <a href="#" class="tododelete redcolor">
                                    <span class="glyphicon glyphicon-trash"></span>
                                </a>
                            </div>
                        </div>
                        <div class="todolist_list showactions">
                            <div class="col-md-8 col-sm-8 col-xs-8 nopadmar custom_textbox1">
                                <div class="todoitemcheck">
                                    
                                </div>
                                <div class="todotext todoitem">Meeting with CEO</div>
                            </div>
                            <div class="col-md-4  col-sm-4 col-xs-4  pull-right showbtns todoitembtns">
                                <a href="#" class="todoedit">
                                    <span class="glyphicon glyphicon-pencil"></span>
                                </a>
                                |
                                <a href="#" class="tododelete redcolor">
                                    <span class="glyphicon glyphicon-trash"></span>
                                </a>
                            </div>
                        </div>
                        <div class="todolist_list showactions">
                            <div class="col-md-8 col-sm-8 col-xs-8 nopadmar custom_textbox1">
                                <div class="todoitemcheck">
                                    
                                </div>
                                <div class="todotext todoitem">Takeover Leads</div>
                            </div>
                            <div class="col-md-4  col-sm-4 col-xs-4  pull-right showbtns todoitembtns">
                                <a href="#" class="todoedit">
                                    <span class="glyphicon glyphicon-pencil"></span>
                                </a>
                                |
                                <a href="#" class="tododelete redcolor">
                                    <span class="glyphicon glyphicon-trash"></span>
                                </a>
                            </div>
                        </div>
                    </form>
                    <div class="todolist_list adds">
                        <form role="form" id="main_input_box" class="form-inline">
                            <div class="form-group">
                                <label class="sr-only" for="AddTask">Add Note</label>
                                <input id="custom_textbox" name="Item" type="text" required placeholder="Add note item here" class="form-control" />
                            </div>
                            <input type="submit" value="Add Note" class="btn btn-primary add_button" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
						
						
						
						
						
			</div>
			<div class="row">
        <div class="col-md-12">
            <div class="panel panel-success">
				<div class="btn-group pull-right">
									<button class="btn dropdown-toggle btn-success" data-toggle="dropdown">
										<i class="livicon" data-name="gear" data-size="20" data-loop="true" data-c="#fff" data-hc="#fff"></i>
										<i class="fa fa-angle-down"></i>
									</button>
									<ul class="dropdown-menu pull-right">
										<li>
											<a href="#">Print</a>
										</li>
										<li>
											<a href="#">Save as PDF</a>
										</li>
									</ul>
								</div>
                <div class="panel-heading">
					<strong>Chat</strong>
                </div>
                <div class="panel-body chat-scroll">
                    <ul class="chat">
                        <li class="left clearfix"><span class="chat-img pull-left">
                            <img src="http://placehold.it/50/55C1E7/fff&text=U" alt="User Avatar" class="img-circle" />
                        </span>
                            <div class="chat-body clearfix">
                                <div class="header">
                                    <strong class="primary-font">Jack Sparrow</strong> <small class="pull-right text-muted">
                                        <span class="glyphicon glyphicon-time"></span>12 mins ago</small>
                                </div>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare
                                    dolor, quis ullamcorper ligula sodales.
                                </p>
                            </div>
                        </li>
                        <li class="right clearfix"><span class="chat-img pull-right">
                            <img src="http://placehold.it/50/FA6F57/fff&text=ME" alt="User Avatar" class="img-circle" />
                        </span>
                            <div class="chat-body clearfix">
                                <div class="header">
                                    <small class=" text-muted"><span class="glyphicon glyphicon-time"></span>13 mins ago</small>
                                    <strong class="pull-right primary-font">Bhaumik Patel</strong>
                                </div>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare
                                    dolor, quis ullamcorper ligula sodales.
                                </p>
                            </div>
                        </li>
                        <li class="left clearfix"><span class="chat-img pull-left">
                            <img src="http://placehold.it/50/55C1E7/fff&text=U" alt="User Avatar" class="img-circle" />
                        </span>
                            <div class="chat-body clearfix">
                                <div class="header">
                                    <strong class="primary-font">Jack Sparrow</strong> <small class="pull-right text-muted">
                                        <span class="glyphicon glyphicon-time"></span>14 mins ago</small>
                                </div>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare
                                    dolor, quis ullamcorper ligula sodales.
                                </p>
                            </div>
                        </li>
                        <li class="right clearfix"><span class="chat-img pull-right">
                            <img src="http://placehold.it/50/FA6F57/fff&text=ME" alt="User Avatar" class="img-circle" />
                        </span>
                            <div class="chat-body clearfix">
                                <div class="header">
                                    <small class=" text-muted"><span class="glyphicon glyphicon-time"></span>15 mins ago</small>
                                    <strong class="pull-right primary-font">Bhaumik Patel</strong>
                                </div>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare
                                    dolor, quis ullamcorper ligula sodales.
                                </p>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="panel-footer">
                    <div class="input-group">
                        <input id="btn-input" type="text" class="form-control input-sm" placeholder="Type your message here..." />
                        <span class="input-group-btn">
                            <button class="btn btn-warning btn-sm" id="btn-chat">
                                Send</button>
                        </span>
                    </div>
                </div>
            </div>
        </div>
		

						
						
						
                        </div>
                </section>
	
	
	
	<!--- order summary model -->
    <div class="modal fade in" id="editSummary" tabindex="-1" role="dialog" aria-hidden="false" style="display:none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="row">
                        <!--basic form starts-->
                        <div class="panel panel-success" id="hidepanel1">
                            <div class="panel-heading">
                                <h3 class="panel-title">
                                    <i class="livicon" data-name="inbox" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                                    Edit Order Summary
                                </h3>
                            </div>
                            <div class="panel-body border">
                                <form class="form-horizontal form-bordered" action="#" method="post">
                                    <fieldset>
                                        <!-- Name input-->
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="name">
                                                Food package
                                            </label>
                                            <div class="col-md-offset-3">
                                            <select id="e1" class="form-control select2">
                                                    <option value="Room1">Select a package</option>
                                                    <option value="Room1">Passing Menu</option>
                                                    <option value="Room2">Buffet Menu</option>
													<option value="Room2">Standard Menu</option>
                                            </select>
											
											</div>
											
												<div class="col-md-offset-3">
												<div class="span4">
													<div class="form-control display-no">
													<select id="e1" class="form-control select2">
                                                    <option value="Room1">Select a package</option>
                                                    <option value="Room1">Passing Menu</option>
                                                    <option value="Room2">Buffet Menu</option>
													<option value="Room2">Standard Menu</option>
													</select>
													</div>
													<a onclick="$(this).closest('.span4').find('div').toggle(); $(this).text(this.text=='Different package for kids?'?'Same package as adults':'Different package for kids?');return false;" href="#">Different package for kids?</a>
                                        		</div>
												</div>
                                          
											
                                        </div>
                                         <!--select2 starts-->
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="name">
                                                Drink package
                                            </label>
                                            <div class="col-md-9">
                                            <select id="e1" class="form-control select2">
                                                    <option value="Room1">Select a package</option>
                                                    <option value="Room1">Cash Bar</option>
                                                    <option value="Room2">Premium Open Bar</option>
                                            </select>
												
                                            </div>
											<div class="col-md-offset-3">
												<div class="span5">
													<div class="form-control display-no">
													<select id="e1" class="form-control select2">
                                                    <option value="Room1">Select a package</option>
                                                    <option value="Room1">Passing Menu</option>
                                                    <option value="Room2">Buffet Menu</option>
													<option value="Room2">Standard Menu</option>
													</select>
													</div>
													<a onclick="$(this).closest('.span5').find('div').toggle(); $(this).text(this.text=='Different package for kids?'?'Same package as adults':'Different package for kids?');return false;" href="#">Different package for kids?</a>
                                        		</div>
												</div>
                                        </div>
						
                                        <!-- Name input-->
										<div class="form-group">
                                            <label class="col-md-3 control-label" for="name">
                                                Add-Ons
                                            </label>
                                            <div class="col-md-9">
                                            
												<label>
													<input type="checkbox" class="flat-red" />
												</label>Extra hour<br>
												<label>
													<input type="checkbox" class="flat-red" />
												</label>Vianese Table
												
											
                                            </div>
                                        </div>
                                        <!-- Name input-->
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="name">Discount</label>
                                            <input id="demo1" type="text" value="4" name="demo1" class="form-control"></div>
                                        <!-- Message body -->
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="message">Notes</label>
                                            <div class="col-md-9">
                                                <textarea class="form-control" id="message" name="message" placeholder="Enter your notes here..." rows="5"></textarea>
                                            </div>
                                        </div>
                                    </fieldset>
                                </form>
                            </div>
                        </div>
                        <!-- Form actions -->
                <div class="form-group">
                    <div class="col-md-12 text-right">
                        <button type="submit" class="btn btn-responsive btn-primary pull-right">Save changes</button>
                    </div>
                </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- END order summary modal-->
	
	
	<!--- edit event summary  model -->
    <div class="modal fade in" id="editEvent" tabindex="-1" role="dialog" aria-hidden="false" style="display:none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="row">
                        <!--basic form starts-->
                        <div class="panel panel-success" id="hidepanel1">
                            <div class="panel-heading">
                                <h3 class="panel-title">
                                    <i class="livicon" data-name="inbox" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                                    Edit Event Summary
                                </h3>
                            </div>
                            <div class="panel-body border">
                                <form class="form-horizontal form-bordered" action="#" method="post">
                                    <fieldset>
                                         <!--select2 starts-->
                                        <div class="form-group striped-col">
                                            <label class="col-md-3 control-label" for="name">
                                                Room
                                            </label>
                                            <div class="col-md-9">
                                            <select id="e1" class="form-control select2">
                                                    <option value="Room1">Select a Room</option>
                                                    <option value="Room1">Room1</option>
                                                    <option value="Room2">Room2</option>
                                            </select>
                                            </div>
                                        </div>
										<!--select2 starts-->
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="name">
                                                Type
                                            </label>
                                            <div class="col-md-9">
                                            <select id="e1" class="form-control select2">
                                                    <option value="Room1">Select an event type</option>
                                                    <option value="Room1">Sweet 16</option>
                                                    <option value="Room2">Corporate Event</option>
                                            </select>
                                            </div>
                                        </div>
                                        <!-- Name input-->
                                        <div class="form-group striped-col">
                                            <label class="col-md-3 control-label" for="name">
                                                Date and Time
                                            </label>
                                            <div class="input-group date form_datetime5 col-md-9 pull-right" data-date="2012-12-21T15:25:00Z" data-date-format="dd MM yyyy - HH:ii p" data-link-field="dtp_input1">
                                                <input type="text" value="" class="form-control" readonly>
                                                <span class="input-group-addon">
                                                    <span class="glyphicon glyphicon-remove"></span>
                                                </span>
                                                <span class="input-group-addon">
                                                    <span class="glyphicon glyphicon-th"></span>
                                                </span>
                                            </div>
                                        </div>
                                        <!-- Name input-->
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="name">Event Duration</label>
                                            <input id="demo1" type="text" value="4" name="demo1" class="form-control"></div>
                                        <!-- Name input-->
                                        <div class="form-group striped-col">
                                            <label class="col-md-3 control-label" for="name">Guests</label>

                                            <div class="col-md-offset-3">
                                            <input id="adults" type="text" value="50" name="adults" class="form-control">
                                            </div>
                                            <div class="col-md-offset-3">
                                            <input id="kids" type="text" value="50" name="kids" class="form-control">
                                            </div> 
                                        </div>
                                       
                                        <!-- Message body -->
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="message">Notes</label>
                                            <div class="col-md-9">
                                                <textarea class="form-control" id="message" name="message" placeholder="Enter your notes here..." rows="5"></textarea>
                                            </div>
                                        </div>
                                    </fieldset>
                                </form>
                            </div>
                        </div>
                        <!-- Form actions -->
                <div class="form-group">
                    <div class="col-md-12 text-right">
                        <button type="submit" class="btn btn-responsive btn-primary pull-right">Save Changes</button>
                    </div>
                </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- END event summary modal-->
	
		<!--- client details model -->
                            <div class="modal fade in" id="editClientDetails" tabindex="-1" role="dialog" aria-hidden="false" style="display:none;">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            <h4 class="modal-title">Edit Client Info</h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="panel panel-success">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <i class="livicon" data-name="user" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                                                            John Doe
                                                        </h4>
                                                    </div>
                                                    <div class="panel-body">
                                                        <div class="table-responsive">
                                                            <table id="user" class="table table-bordered table-striped" style="clear:both">
                                                                <tbody>
                                                                    <tr>
                                                                        <td>First Name</td>
                                                                        <td>
                                                                            <a href="#" id="firstname" data-type="text" data-pk="1" data-title="Enter first name" class="editable editable-click" data-original-title="" title="">John</a>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Last Name</td>
                                                                        <td>
                                                                            <a href="#" id="lastname" data-type="text" data-pk="1" data-title="Enter last name" class="editable editable-click" data-original-title="" title="">Doe</a>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Primary Number</td>
                                                                        <td>
                                                                            <a href="#" id="primary" data-type="text" data-pk="1" data-title="Enter primary number" class="editable editable-click" data-original-title="" title="">(718) 223 2321</a>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Secondary Number</td>
                                                                        <td>
                                                                            <a href="#" id="secondary" data-type="text" data-pk="1" data-title="Enter secondary number" class="editable editable-click" data-original-title="" title=""></a>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Fax Number</td>
                                                                        <td>
                                                                            <a href="#" id="fax" data-type="text" data-pk="1" data-title="Enter fax number" class="editable editable-click" data-original-title="" title=""></a>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Email</td>
                                                                        <td>
                                                                            <a href="#" id="emailaddress" data-type="text" data-pk="1" data-title="Enter email address" class="editable editable-click" data-original-title="" title="">johndoe@gmail.com</a>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Address</td>
                                                                        <td>
                                                                            <a id="address" data-type="address" data-pk="1" data-title="Please, fill address" class="editable editable-click" data-original-title="" title=""> <b>Moscow</b>
                                                                                , Lenina st., bld. 12
                                                                            </a>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Notes</td>
                                                                        <td>
                                                                            <a href="#" id="comments" data-type="textarea" data-pk="1" data-placeholder="Your comments here..." data-title="Enter comments" class="editable editable-pre-wrapped editable-click">Awesome client!</a>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
               
    <!-- END client details modal-->
	
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
<!--  todolist-->
<script src="{{ asset('assets/js/todolist.js') }}"></script>
<!-- EASY PIE CHART JS -->
<script src="{{ asset('assets/vendors/charts/easypiechart.min.js') }}"></script>
<script src="{{ asset('assets/vendors/charts/jquery.easypiechart.min.js') }}"></script>
<!--for calendar-->
<script src="{{ asset('assets/vendors/fullcalendar/fullcalendar.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/vendors/fullcalendar/calendarcustom.min.js') }}" type="text/javascript"></script>
<!--   Realtime Server Load  -->
<script src="{{ asset('assets/vendors/charts/jquery.flot.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/vendors/charts/jquery.flot.resize.min.js') }}" type="text/javascript"></script>
<!--Sparkline Chart-->
<script src="{{ asset('assets/vendors/charts/jquery.sparkline.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/vendors/countUp/countUp.js') }}"></script>
<!--   maps -->
<script src="{{ asset('assets/vendors/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
<script src="{{ asset('assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
<script src="{{ asset('assets/js/dashboard.js') }}" type="text/javascript"></script>
<!-- end of page level js -->
<script type="text/javascript">
$(document).ready(function() {
    var composeHeight = $('#calendar').height() + 21 - $('.adds').height();
    $('.list_of_items').slimScroll({
        color: '#A9B6BC',
        height: composeHeight + 'px',
        size: '5px'
    });
});
</script>
<script type="text/javascript" src="{{ asset('assets/vendors/datatables/jquery.dataTables.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/vendors/datatables/dataTables.bootstrap.js') }}"></script>
<script>
$(document).ready(function() {
    $('#table').DataTable();
});
</script>

<div class="modal fade" id="delete_confirm" tabindex="-1" role="dialog" aria-labelledby="user_delete_confirm_title" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content"></div>
  </div>
</div>
<script>
$(function () {
    $('body').on('hidden.bs.modal', '.modal', function () {
        $(this).removeData('bs.modal');
    });
});
</script>
<script src="{{ asset('assets/vendors/x-editable/jquery.mockjax.js') }}"></script>
<script src="{{ asset('assets/vendors/x-editable/moment.min.js') }}"></script>
<script src="{{ asset('assets/vendors/x-editable/select2.js') }}"></script>
<script>var f = 'bootstrap3';</script>
<script src="{{ asset('assets/vendors/x-editable/bootstrap-editable.js') }}"></script>
<script src="{{ asset('assets/vendors/x-editable/typeahead.js') }}"></script>
<script src="{{ asset('assets/vendors/x-editable/typeaheadjs.js') }}"></script>
<script src="{{ asset('assets/vendors/x-editable/address.js') }}"></script>
<script>
    var c = window.location.href.match(/c=inline/i) ? 'popup' : 'inline';
    $.fn.editable.defaults.mode = c === 'popup' ? 'popup' : 'inline';

    $(function() {
        $('#f').val(f);
        $('#c').val(c);

        $('#frm').submit(function() {
            var f = $('#f').val();
            if (f === 'jqueryui') {
                $(this).attr('action', 'demo-jqueryui.html');
            } else if (f === 'plain') {
                $(this).attr('action', 'demo-plain.html');
            } else if (f === 'bootstrap2') {
                $(this).attr('action', 'demo.html');
            } else {
                $(this).attr('action', 'x-editable');
            }
        });
    });
</script>
<script src="{{ asset('assets/vendors/x-editable/demo-mock.js') }}"></script>
<script src="{{ asset('assets/vendors/x-editable/demo.js') }}"></script>
@stop