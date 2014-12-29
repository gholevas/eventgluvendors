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
<script>
	var EVENT_DETAIL_ID = '{{{$event->id}}}';
	var EVENT_CLIENT_ID = '{{{$event->client_id}}}';
</script>
@stop


{{-- Page content --}}
@section('content')
<section class="content-header">
    <h1>{{{$event->title}}}</h1>
    <ol class="breadcrumb">
        <li>
            <a href="index"> <i class="livicon" data-name="home" data-size="16" data-color="#000"></i>
                Dashboard
            </a>
        </li>
        <li class="active">@if ($event->start_time >= time()) @if ($event->confirmed == 0) Leads @else Upcoming Events @endif @else Past Events @endif</li>
        <li class="active">{{{$event->title}}}</li>
    </ol>
</section>

<!-- Main content -->
@if ($set_confirmed)
<div class="alert alert-success alert-dismissable'"><p>The event has been confirmed.</p></div>
@endif

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
                                <div class="panel-body" style="padding:15px 0px 55px 22px;">
                                    <table class="table table-bordered table-striped">
                                        <tr>
                                            <td><b>Name</b></td>
                                            <td>
                                                {{{$client->first_name}}} {{{$client->last_name}}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><b>Email</b></td>
                                            <td>
                                                @if (strlen($client->email) > 0)
                                                {{{$client->email}}}
                                                @else
                                                Not Provided
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><b>Phone</b></td>
                                            <td>
                                                {{{$client->phone_number}}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><b>Address</b></td>
                                            <td>
                                                @if (strlen($client->address) > 0)
                                                {{{$client->address}}}
                                                @else
                                                Not Provided
                                                @endif
                                            </td>
                                        </tr>
										<tr>
                                            <td><b>Notes</b></td>
                                            <td>
                                                @if (strlen($client->notes) > 0)
                                                {{{$client->notes}}}
                                                @else
                                                None
                                                @endif
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
                                        @if ($event->confirmed == 0)
                                        <li>
                                            <a data-toggle="modal" data-href="#confirmEvent" href="#confirmEvent">Confirm Event</a>
                                        </li>
                                        @endif
                                        <li>
                                            <a data-toggle="modal" data-href="#cancelEvent" href="#cancelEvent">Cancel Event</a>
                                        </li>
									</ul>
									</div>
                                <div class="panel-heading hidden-sm">
                                    <strong>Event Summary</strong>
								</div>
<!--                                    <div class="panel-heading hidden-lg hidden-md hidden-xs">Order Pre</div> -->
                                    <div class="panel-body" style="padding:15px 0px 36px 22px;">
                                        <table class="table table-bordered table-striped">
                                            <tr>
                                                <td><b>Event Name</b></td>
                                                <td>
                                                    {{{$event->title}}}
                                                </td>
                                            </tr>
											<tr>
                                                <td><b>Date</b></td>
                                                <td>
                                                    {{{date('m/d/Y', $event->start_time)}}}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><b>Time</b></td>
                                                <td>
                                                    {{{date('h:i A', $event->start_time)}}} - {{{date('h:i A', $event->end_time)}}}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><b>Room</b></td>
                                                <td>
                                                    {{{$room->name}}}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><b>Type</b></td>
                                                <td>
                                                    {{{$event->type}}}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><b>Guests</b></td>
                                                <td>
                                                    {{{$event->guests_adults}}} adults, {{{$event->guests_kids}}} kid<?php if ($event->guests_kids != 1) echo 's'; ?> @if ($event->confirmed == 1) (Confirmed) @else (Not Confirmed) @endif
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
											<a data-toggle="modal" data-href="#logPayment" href="#logPayment">Log a payment</a>
										</li>
										<?php /*<li>
											<a href="#">Change credit card</a>
										</li> */ ?>
									</ul>
									</div>
                                    <div class="panel-heading">
                                        <strong>Payment Info</strong>
									</div>
                                    <div class="panel-body" style="padding:15px 0px 55px 22px;">
                                        <table class="table table-bordered table-striped">
                                          <tr>
                                                <td><b>Total Price</b></td>
                                                <td>
                                                    ${{{number_format($event->total_price, 2)}}}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><b>Due By</b></td>
                                                <td>
                                                    {{{date('m/d/Y', $event->due_by)}}}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><b>Deposit Amount</b></td>
                                                <td>
                                                    ${{{number_format($event->deposit, 2)}}}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><b>Balance Paid</b></td>
                                                <td>
                                                    ${{{number_format($event->balance_paid, 2)}}}
                                                </td>
                                            </tr>
                                           <tr>
                                                <td><b>Remaining Balance</b></td>
                                                <td>
                                                    ${{{number_format($event->total_price - $event->balance_paid, 2)}}}
                                                </td>
                                            </tr>
                                            <?php /*<tr>
                                                <td><b>Balance</b></td>
                                                <td>
                                                    <a href="#" data-pk="1" class="editable" data-title="Edit Address">$9758.45</a>
                                                    <div style="margin: 10px 22px 0 0;" class="progress">
                                                        <div class="progress-bar progress-bar-primary progress-bar-striped active" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 45%">
                                                          <span>45% Complete</span>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr> */ ?>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div id="event-detail-order-summary" class="panel panel-success">
								<div class="btn-group pull-right">
									<button class="btn dropdown-toggle btn-success" data-toggle="dropdown">
										<i class="livicon" data-name="gear" data-size="20" data-loop="true" data-c="#fff" data-hc="#fff"></i>
										<i class="fa fa-angle-down"></i>
									</button>
									<ul class="dropdown-menu pull-right">
										<li>
											<a data-toggle="modal" data-href="#editSummary" href="#editSummary">Edit</a>
										</li>
                                        <?php /*
										<li>
											<a href="#">Print</a>
										</li>
										<li>
											<a href="#">Save as PDF</a>
										</li>
										<li>
											<a href="#">Email Invoice to Client</a>
										</li>
                                        */ ?>
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
                                                    <?php /*<td><b>Food</b><br>Buffet Menu<br>&nbsp;&nbsp;&nbsp;Calamari<br>&nbsp;&nbsp;&nbsp;Filet Mignon<br>&nbsp;&nbsp;&nbsp;Roasted Leg of Lamb</td>
                                                    <td class="text-center"><br><br>$3.50<br>$8.00<br>$8.00</td>
                                                    <td class="text-center"><br>80</td>
                                                    <td class="text-right"></td>*/ ?>
                                                <tr>
                                                    <?php
                                                    if (isset($event->food_option))
                                                    {
                                                        $item_str = '';
                                                        $price_str = '';
                                                        $amt_str = '';

                                                        $food_option = Menu::find($event->food_option);
                                                        $item_str = $food_option->name;
                                                        $amt_str = (isset($event->food_option_kids) ? $event->guests_adults : $event->guests_adults + $event->guests_kids);

                                                        $food_option_extras = unserialize($event->food_option_extras);
                                                        if (is_array($food_option_extras))
                                                        {
                                                            foreach ($food_option_extras as $extra)
                                                            {
                                                                $item_str .= '<br />&nbsp;&nbsp;&nbsp;&nbsp;' . $extra['name'];
                                                                $price_str .= '<br />$' . $extra['price'] . '/pp';
                                                                $amt_str .= '<br />';
                                                            }
                                                        }

                                                        if (isset($event->food_option_kids))
                                                        {
                                                            $food_option = Menu::find($event->food_option_kids);
                                                            $item_str .= '<br />' . $food_option->name . ' (Kids)';
                                                            $amt_str .= '<br />' . (isset($event->food_option_kids) ? $event->guests_adults : $event->guests_adults + $event->guests_kids);
                                                            $price_str .= '<br />';

                                                            $food_option_extras = unserialize($event->food_option_kids_extras);
                                                            if (is_array($food_option_extras))
                                                            {
                                                                foreach ($food_option_extras as $extra)
                                                                {
                                                                    $item_str .= '<br />&nbsp;&nbsp;&nbsp;&nbsp;' . $extra['name'];
                                                                    $price_str .= '<br />$' . $extra['price'] . '/pp';
                                                                    $amt_str .= '<br />';
                                                                }
                                                            }                                                          
                                                        }
                                                        ?>
                                                        <td><b>Food</b><br />{{$item_str}}<br><br></td>
                                                        <td class="text-center"><br />{{$price_str}}</td>
                                                        <td class="text-center"><br>{{$amt_str}}</td>
                                                        <td class="text-right"></td>
                                                    <?php
                                                     }
                                                     else
                                                    {
                                                         ?>
                                                        <td><b>Food</b><br>None selected</td>
                                                        <td class="text-center"></td>
                                                        <td class="text-center"></td>
                                                        <td class="text-right"></td>
                                                        <?php                                                       
                                                    }
                                                    ?>
                                                </tr>
                                       
                                                <tr>
                                                    <?php
                                                    if (isset($event->drink_option))
                                                    {
                                                        $item_str = '';
                                                        $price_str = '';
                                                        $amt_str = '';

                                                        $drink_option = Menu::find($event->drink_option);
                                                        $item_str = $drink_option->name;
                                                        $amt_str = (isset($event->drink_option_kids) ? $event->guests_adults : $event->guests_adults + $event->guests_kids);

                                                        $drink_option_extras = unserialize($event->drink_option_extras);
                                                        if (is_array($drink_option_extras))
                                                        {
                                                            foreach ($drink_option_extras as $extra)
                                                            {
                                                                $item_str .= '<br />&nbsp;&nbsp;&nbsp;&nbsp;' . $extra['name'];
                                                                $price_str .= '<br />$' . $extra['price'] . '/pp';
                                                                $amt_str .= '<br />';
                                                            }
                                                        }

                                                        if (isset($event->drink_option_kids))
                                                        {
                                                            $drink_option = Menu::find($event->drink_option_kids);
                                                            $item_str .= '<br />' . $drink_option->name . ' (Kids)';
                                                            $amt_str .= '<br />' . (isset($event->drink_option_kids) ? $event->guests_adults : $event->guests_adults + $event->guests_kids);
                                                            $price_str .= '<br />';

                                                            $drink_option_extras = unserialize($event->drink_option_kids_extras);
                                                            if (is_array($drink_option_extras))
                                                            {
                                                                foreach ($drink_option_extras as $extra)
                                                                {
                                                                    $item_str .= '<br />&nbsp;&nbsp;&nbsp;&nbsp;' . $extra['name'];
                                                                    $price_str .= '<br />$' . $extra['price'] . '/pp';
                                                                    $amt_str .= '<br />';
                                                                }
                                                            }                                                          
                                                        }
                                                        ?>
                                                        <td><b>Drink</b><br />{{$item_str}}<br><br></td>
                                                        <td class="text-center"><br />{{$price_str}}</td>
                                                        <td class="text-center"><br>{{$amt_str}}</td>
                                                        <td class="text-right"></td>
                                                    <?php
                                                     }
                                                     else
                                                    {
                                                         ?>
                                                        <td><b>Drink</b><br>None selected</td>
                                                        <td class="text-center"></td>
                                                        <td class="text-center"></td>
                                                        <td class="text-right"></td>
                                                        <?php                                                       
                                                    }
                                                    ?>
                                                </tr>

                                                <tr>
                                                    <?php
                                                    $chosen_addons = unserialize($event->addons);
                                                    if (is_array($chosen_addons) && count($chosen_addons) > 0)
                                                    {
                                                        ?>
                                                        <td><b>Addons</b><br>@foreach ($chosen_addons as $addon) {{{$addon['name']}}}<br> @endforeach<br></td>
                                                        <td class="text-center"><br>@foreach ($chosen_addons as $addon) ${{{$addon['price']}}}<br> @endforeach<br></td>
                                                        <td class="text-center"></td>
                                                        <td class="text-right"></td>
                                                        <?php
                                                    }
                                                     else
                                                    {
                                                         ?>
                                                        <td><b>Addons</b><br>None selected</td>
                                                        <td class="text-center"></td>
                                                        <td class="text-center"></td>
                                                        <td class="text-right"></td>
                                                        <?php                                                       
                                                    }
                                                    ?>
                                                </tr>
                                                <tr>
                                                    <td class="highrow"></td>
                                                    <td class="highrow"></td>
                                                    <td class="highrow text-center">
                                                        <strong>Price Per Person</strong>
                                                    </td>
                                                    <td class="highrow text-right">${{{number_format($event->price_per_person, 2)}}}</td>
                                                </tr>
												<tr>
                                                    <td class="highrow"></td>
                                                    <td class="highrow"></td>
                                                    <td class="highrow text-center">
                                                        <strong>Discount ({{{$event->discount_percent*100}}}%)</strong>
                                                    </td>
                                                    <td class="highrow text-right">${{{number_format($event->discount, 2)}}}</td>
                                                </tr>
                                                <tr>
                                                    <td class="emptyrow"></td>
                                                    <td class="emptyrow"></td>
                                                    <td class="emptyrow text-center">
                                                        <strong>Tax</strong>
                                                    </td>
                                                    <td class="emptyrow text-right">${{{number_format($event->tax, 2)}}}</td>
                                                </tr>
                                                <tr>
                                                    <td class="emptyrow"></td>
                                                    <td class="emptyrow"></td>
                                                    <td class="emptyrow text-center">
                                                        <strong>Gratuity</strong>
                                                    </td>
                                                    <td class="emptyrow text-right">${{{number_format($event->gratuity, 2)}}}</td>
                                                </tr>
                                                <tr>
                                                    <td class="emptyrow">
                                                        <i class="livicon" data-name="barcode" data-size="60" data-loop="true"></i>
                                                    </td>
                                                    <td class="emptyrow"></td>
                                                    <td class="emptyrow text-center">
                                                    <strong>Total</strong>
                                                </td>
                                                <td class="emptyrow text-right">${{{number_format($event->total_price, 2)}}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
										<strong>Notes</strong><br>@if (strlen($event->notes) > 0) {{{$event->notes}}} @else None @endif
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
								<form id="event-notes-form">
									<div id="event-notes" class="row list_of_items">
                                        @foreach ($event_notes as $note)
										<div class="todolist_list showactions" data-id="{{{$note->id}}}">
                                           
											<div class="col-md-8 col-sm-8 col-xs-8 nopadmar custom_textbox1">
												<div class="todotext todoitem">{{{$note->note}}}</div>
											</div>
                                        
											<div class="col-md-4  col-sm-4 col-xs-4  pull-right showbtns todoitembtns">
												<a href="#" class="event-notes-edit">
													<span class="glyphicon glyphicon-pencil"></span>
												</a>
												<a href="#" class="event-notes-edit-submit" style="display:none;">
													<span class="glyphicon glyphicon-save"></span>
												</a>
												|
												<a href="#" class="event-notes-delete redcolor">
													<span class="glyphicon glyphicon-trash"></span>
												</a>
											</div>
										</div>
                                        @endforeach
									</div>
									<div class="todolist_list adds">
										<div class="form-inline">
											<div class="form-group">
												<label class="sr-only" for="event-notes-add">Add Note</label>
												<input id="note-add-text" type="text" required placeholder="Add event note here" class="form-control" />
											</div>
											<input type="submit" value="Add Note" class="btn btn-primary add_button" />
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>		
			</div>
			<div class="row">
             <?php /*
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
        */ ?>
	</div>
</section>
<div class="modal modal-center modal-small" id="logPayment" role="dialog" aria-labelledby="logPayment_title" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" aria-labelledby="logPayment_title">Log a Payment</h4>
			</div>
			<div class="modal-body">
				<div class="form-group" style="position: static;">
					<p class="help-block">Enter payment amount</p>
					<div class="form-group input-group">
						<span class="input-group-addon">$</span>
						<input id="lp-amount" type="text" class="form-control">
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<a id="event-detail-log-payment" href="#" type="button" class="btn btn-success">Save</a>
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
			</div>
		</div>
	</div>
</div>

<div class="modal modal-center modal-small" id="cancelEvent" role="dialog" aria-labelledby="cancelEvent_title" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" aria-labelledby="cancelEvent_title">Cancel Event</h4>
            </div>
            <div class="modal-body">
                <div class="form-group" style="position: static;">
                    <p class="help-block">Are you sure you want to cancel the event?</p>
                </div>
            </div>
            <div class="modal-footer">
                <a id="event-cancel" href="#" type="button" class="btn btn-danger" onclick='window.location="/admin/events/0/?cancel={{{$event->id}}}";'>Yes</a>
                <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
            </div>
        </div>
    </div>
</div>

<div class="modal modal-center modal-small" id="confirmEvent" role="dialog" aria-labelledby="confirmEvent_title" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" aria-labelledby="confirmEvent_title">Confirm Event</h4>
            </div>
            <div class="modal-body">
                <div class="form-group" style="position: static;">
                    <p class="help-block">Are you sure you want to confirm the event?</p>
                </div>
            </div>
            <div class="modal-footer">
                <a id="event-confirm" href="#" type="button" class="btn btn-success" onclick='window.location="/admin/event/{{{$event->id}}}?confirm={{{$event->id}}}";'>Yes</a>
                <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
            </div>
        </div>
    </div>
</div>

<!--- order summary model -->
<div class="modal fade in" id="editSummary" tabindex="-1" role="dialog" aria-hidden="false" style="display:none;">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-body">
				<div class="row">
					<!--basic form starts-->
					<form id="event-detail-edit-summary">
                        <div class="panel panel-success" id="hidepanel1">
                            <div class="panel-heading">
                                <h3 class="panel-title">
                                    <i class="livicon" data-name="inbox" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                                    Edit Order Summary
                                </h3>
                            </div>
                            <div class="panel-body border">
                                <div class="form-horizontal form-bordered">
                                    <fieldset>
                                        <!-- Name input-->
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">
                                                Food package
                                            </label>
                                            <div class="col-md-offset-3">
												<select id="es-food" class="form-control select2 consume-parent">
													<option value="">Select a package</option>
                                                    @foreach ($food_options as $option))
													<option value="{{{$option->id}}}" @if ($event->food_option == $option->id) selected @endif>{{{$option->name}}}</option>
                                                    @endforeach
												</select><br>
												<input type="hidden" id="es-food-extras" class="consume-extras form-control" value="{{{$food_extra_string}}}">
											</div>
											<div class="col-md-offset-3">
												<div class="span4">
													<div id="es-div-foodkids" @if ($event->food_option_kids == NULL) style='display: none;' @endif id='es-foodkids-display'>
														<select id="es-foodkids" class="form-control select2 consume-parent">
														<option value="">Select a package</option>
                                                        @foreach ($food_options as $option))
                                                        <option value="{{{$option->id}}}" @if ($event->food_option_kids == $option->id) selected @endif>{{{$option->name}}}</option>
                                                        @endforeach
														</select><br>
														<input type="hidden" id="es-foodkids-extras" class="consume-extras form-control" value="{{{$food_extra_kids_string}}}"><br>
													</div>
													<a onclick="$('#es-div-foodkids').toggle(); $('#es-foodkids').val(''); $('#es-foodkids-extras').select2('data', null); $(this).text(this.text=='Different package for kids?'?'Same package as adults':'Different package for kids?'); return false;" href="#">@if ($event->food_option_kids == NULL)Different package for kids?@else Same package as adults?@endif</a>
												</div>
											</div>
                                        </div>
                                         <!--select2 starts-->
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="name">
                                                Drink package
                                            </label>
                                            <div class="col-md-offset-3">
												<select id="es-drink" class="form-control select2 consume-parent">
													<option value="">Select a package</option>
                                                    @foreach ($drink_options as $option))
                                                    <option value="{{{$option->id}}}" @if ($event->drink_option == $option->id) selected @endif>{{{$option->name}}}</option>
                                                    @endforeach
												</select><br>
												<input type="hidden" id="es-drink-extras" class="consume-extras form-control" value="{{{$drink_extra_string}}}">
                                            </div>
											<div class="col-md-offset-3">
												<div class="span5">
													<div id="es-div-drinkkids" @if ($event->drink_option_kids == NULL) style='display: none' @endif id='es-drinkkids-display'>
														<select id="es-drinkkids" class="form-control select2 consume-parent">
															<option value="">Select a package</option>
                                                            @foreach ($drink_options as $option))
                                                            <option value="{{{$option->id}}}" @if ($event->drink_option_kids == $option->id) selected @endif>{{{$option->name}}}</option>
                                                            @endforeach
														</select><br>
														<input type="hidden" id="es-drinkkids-extras" class="consume-extras form-control" value="{{{$drink_extra_kids_string}}}"><br>
													</div>
													<a onclick="$('#es-div-drinkkids').toggle(); $('#es-drinkkids').val(''); $('#es-drinkkids-extras').select2('data', null); $(this).text(this.text=='Different package for kids?'?'Same package as adults':'Different package for kids?');return false;" href="#">@if ($event->drink_option_kids == NULL)Different package for kids?@else Same package as adults?@endif</a>
                                        		</div>
											</div>
                                        </div>
										<div class="form-group">
                                            <label class="col-md-3 control-label">
                                                Add-Ons
                                            </label>
                                            <div class="col-md-9">
                                            <?php
                                                $chosen_addons = unserialize($event->addons);
                                                $chosen_addon_ids = array();
                                                if (is_array($chosen_addons) && count($chosen_addons) > 0)
                                                    foreach ($chosen_addons as $addon)
                                                        $chosen_addon_ids[] = $addon['id'];
                                            ?>
                                                @foreach ($addons as $addon)
												<label>
													<input type="checkbox" class="flat-red es-addons" value="{{{$addon->id}}}}" @if (is_array($chosen_addons) && in_array($addon->id, $chosen_addon_ids)) checked="1" @endif/>
												</label>{{{$addon->name}}}<br>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="name">Discount</label>
                                            <div class="col-md-9">
												<input id="es-discount" type="text" value="{{{$event->discount_percent*100}}}" class="form-control ts-perc">
											</div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="message">Notes</label>
                                            <div class="col-md-9">
												<textarea id="es-comments" rows="3" class="form-control" placeholder=" Enter your notes here...">@if (strlen($event->notes) > 0){{{$event->notes}}}@endif</textarea>
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
							<div class="form-group" style="margin:0;">
								<div class="col-md-12 text-right" style="margin-top:20px;">
									<button type="submit" class="btn btn-responsive btn-primary">Save Changes</button>&nbsp;&nbsp;&nbsp;
									<button type="button" class="btn btn-danger pull-right" data-dismiss="modal">Cancel</button>
								</div>
							</div>
                        </div>
					</form>
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
					<form id="event-detail-edit-event">
                        <div class="panel panel-success" id="hidepanel1">
                            <div class="panel-heading">
                                <h3 class="panel-title">
                                    <i class="livicon" data-name="inbox" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                                    Edit Event Summary
                                </h3>
                            </div>
                            <div class="panel-body border">
                                <div class="form-horizontal form-bordered">
                                    <fieldset>
										<!--select2 starts-->
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="ee-type">
                                                Type
                                            </label>
                                            <div class="col-md-9">
												<select id="ee-type" class="form-control select2">
													<option value="">Select an event type</option>
													<option value="Sweet 16" @if ($event->type == 'Sweet 16') selected="1" @endif>Sweet 16</option>
													<option value="Corporate Event" @if ($event->type == 'Corporate Event') selected="1" @endif>Corporate Event</option>
												</select>
                                            </div>
                                        </div>
                                         <!--select2 starts-->
                                        <div class="form-group striped-col">
                                            <label class="col-md-3 control-label" for="ee-room">
                                                Room
                                            </label>
                                            <div class="col-md-9">
												<select id="ee-room" class="form-control select2">
													<option value="">Select a Room</option>
                                                    @foreach ($rooms as $room)
                                                    <option value="{{{$room->id}}}" @if ($event->room_id == $room->id) selected="1" @endif>{{{$room->name}}}</option>
                                                    @endforeach 
												</select>
                                            </div>
                                        </div>
                                        <div class="form-group striped-col">
                                            <label class="col-md-3 control-label" for="ee-datetime">
                                                Date and Time
                                            </label>
                                            <div class="input-group date form_datetime5 col-md-9 pull-right" data-date="<?php echo date('Y-m-d', $event->start_time); ?>T00:00:00Z" data-date-format="dd MM yyyy - HH:ii p" data-link-field="dtp_input1">
                                                <input id="ee-datetime" type="text" value="<?php echo date(/*'m/d/Y H:i:s'*/'d F Y - h:i A', $event->start_time); ?>" class="form-control">
                                                <span class="input-group-addon">
                                                    <span class="glyphicon glyphicon-remove"></span>
                                                </span>
                                                <span class="input-group-addon">
                                                    <span class="glyphicon glyphicon-th"></span>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="ee-duration">Event Duration</label>
                                            <div class="col-md-offset-3">
												<input id="ee-duration" type="text" value="4" class="form-control ts-dur">
											</div>
                                        </div>
                                        <div class="form-group striped-col">
                                            <label class="col-md-3 control-label">Guests</label>
                                            <div class="col-md-offset-3">
												<input id="ee-adults" type="text" value="50" class="form-control ts-adults">
                                            </div>
                                            <div class="col-md-offset-3">
												<input id="ee-kids" type="text" value="50" class="form-control ts-kids">
											</div> 
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
							<!-- Form actions -->
							<div class="form-group" style="margin:0;">
								<div class="col-md-12 text-right" style="margin-top:20px;">
									<button type="submit" class="btn btn-responsive btn-primary">Save Changes</button>&nbsp;&nbsp;&nbsp;
									<button type="button" class="btn btn-danger pull-right" data-dismiss="modal">Cancel</button>
								</div>
							</div>
                        </div>
					</form>
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
					<form id="event-detail-edit-client">
						<div class="panel panel-success">
							<div class="panel-heading">
								<h4 class="panel-title">
									<i class="livicon" data-name="user" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
									Angela Doe
								</h4>
							</div>
							<div class="panel-body">
								<div class="table-responsive">
									<table class="table table-bordered table-striped" style="clear:both;margin-bottom:0;">
										<tbody>
											<tr>
												<td>First Name</td>
												<td><input id="ed-firstname" type="text" placeholder="Enter first name" class="form-control" value="{{{$client->first_name}}}"></td>
											</tr>
											<tr>
												<td>Last Name</td>
												<td><input id="ed-lastname" type="text" placeholder="Enter last name" class="form-control" value="{{{$client->last_name}}}"></td>
											</tr>
											<tr>
												<td>Primary Number</td>
												<td><input id="ed-primary" type="text" placeholder="Enter primary number" class="form-control" value="{{{$client->phone_number}}}"></td>
											</tr>
											<tr>
												<td>Secondary Number</td>
												<td><input id="ed-secondry" type="text" placeholder="Enter secondary number" class="form-control" value="{{{$client->secondary_phone_number}}}"></td>
											</tr>
											<tr>
												<td>Fax Number</td>
												<td><input id="ed-fax" type="text" placeholder="Enter fax number" class="form-control" value="{{{$client->fax_number}}}"></td>
											</tr>
											<tr>
												<td>Email</td>
												<td><input id="ed-emailaddress" type="text" placeholder="Enter email address" class="form-control" value="{{{$client->email}}}"></td>
											</tr>
											<tr>
												<td>Address</td>
												<td><input id="ed-address" type="text" placeholder="Enter street address" class="form-control" value="{{{$client->address}}}"></td>
											</tr>
											<tr>
												<td>Notes</td>
												<td><textarea id="ed-notes" placeholder="Your comments here..." class="form-control">{{{$client->notes}}}</textarea></td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
							<div class="form-group" style="margin:0;">
								<div class="col-md-12 text-right" style="margin-top:20px;">
									<button type="submit" class="btn btn-responsive btn-primary">Save Changes</button>&nbsp;&nbsp;&nbsp;
									<button type="button" class="btn btn-danger pull-right" data-dismiss="modal">Cancel</button>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- END client details modal-->
@stop

{{-- page level scripts --}}
@section('footer_scripts')
<script>
$(function () {
    $('body').on('hidden.bs.modal', '.modal', function () {
        $(this).removeData('bs.modal');
    });
});
</script>
@stop
