@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
Calendar
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
<link href="{{ asset('assets/vendors/webui-popover/jquery.webui-popover.min.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('assets/vendors/fullcalendar/fullcalendar.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/css/bootstrap-switch.min.css') }}" rel="stylesheet" type="text/css" />
<script>
	var CALENDAR_ROOM_ID = '1';
</script>
@stop


{{-- Page content --}}
@section('content')
<style>
	.popover{
    max-width: 100%; 
}
</style>
<section class="content-header">
    <h1>Calendar - {{{$room->name}}}</h1>
    <ol class="breadcrumb">
        <li>
            <a href="index"> <i class="livicon" data-name="home" data-size="16" data-color="#000"></i>
                Home
            </a>
        </li>
        <li>Calendar - {{{$room->name}}}</li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12">
			<div class="panel panel-primary panel-border">
				<div class="panel-heading border-light">
					<h4 class="panel-title">
						<i class="livicon" data-name="calendar" data-size="16" data-loop="true" data-c="white" data-hc="white"></i>
						Basic Pricing
					</h4>
				</div>
				<div class="panel-body">
					<div class="fc fc-ltr fc-unthemed">
						<div class="fc-view-container" style="">
							<div class="fc-view fc-month-view fc-basic-view">
								<table>
									<thead>
										<tr>
											<td class="fc-widget-header">
												<div class="fc-row fc-widget-header">
													<table>
														<thead>
															<tr>
																<th class="fc-day-header fc-widget-header fc-mon">Mon</th>
																<th class="fc-day-header fc-widget-header fc-tue">Tue</th>
																<th class="fc-day-header fc-widget-header fc-wed">Wed</th>
																<th class="fc-day-header fc-widget-header fc-thu">Thu</th>
																<th class="fc-day-header fc-widget-header fc-fri">Fri</th>
																<th class="fc-day-header fc-widget-header fc-sat">Sat</th>
																<th class="fc-day-header fc-widget-header fc-sun">Sun</th>
															</tr>
														</thead>
													</table>
												</div>
											</td>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td class="fc-widget-content">
												<div class="fc-day-grid-container">
													<div class="fc-day-grid">
														<div class="fc-row fc-week fc-widget-content" style="height: 100px;">
															<div class="fc-bg">
																<table>
																	<tbody>
																		<tr>
																			<td class="fc-day fc-widget-content fc-mon"></td>
																			<td class="fc-day fc-widget-content fc-tue"></td>
																			<td class="fc-day fc-widget-content fc-wed"></td>
																			<td class="fc-day fc-widget-content fc-thu"></td>
																			<td class="fc-day fc-widget-content fc-fri"></td>
																			<td class="fc-day fc-widget-content fc-sat"></td>
																			<td class="fc-day fc-widget-content fc-sun"></td>
																		</tr>
																	</tbody>
																</table>
															</div>
															<div class="fc-content-skeleton">
																<table>
																	<tbody>
																		<tr>
																			<td class="fc-event-container cal-day-basic" id="cal-basic-mon" data-day="monday">@if (isset($closed_arr[1]) && $closed_arr[1]) <h3>Closed</h3> @else Minimum<h3>@if (isset($day_pricing_arr[1])) ${{{number_format($day_pricing_arr[1], 2)}}} @else Not Set @endif @endif</h3></td>
																			<td class="fc-event-container cal-day-basic" id="cal-basic-tue" data-day="tuesday">@if (isset($closed_arr[1]) && $closed_arr[2]) <h3>Closed</h3> @else Minimum<h3>@if (isset($day_pricing_arr[2])) ${{{number_format($day_pricing_arr[2], 2)}}} @else Not Set @endif @endif</h3></td>
																			<td class="fc-event-container cal-day-basic" id="cal-basic-wed" data-day="wednesday">@if (isset($closed_arr[1]) && $closed_arr[3]) <h3>Closed</h3> @else Minimum<h3>@if (isset($day_pricing_arr[3])) ${{{number_format($day_pricing_arr[3], 2)}}} @else Not Set @endif @endif</h3></td>
																			<td class="fc-event-container cal-day-basic" id="cal-basic-thu" data-day="thursday">@if (isset($closed_arr[1]) && $closed_arr[4]) <h3>Closed</h3> @else Minimum<h3>@if (isset($day_pricing_arr[4])) ${{{number_format($day_pricing_arr[4], 2)}}} @else Not Set @endif @endif</h3></td>
																			<td class="fc-event-container cal-day-basic" id="cal-basic-fri" data-day="friday">@if (isset($closed_arr[1]) && $closed_arr[5]) <h3>Closed</h3> @else Minimum<h3>@if (isset($day_pricing_arr[5])) ${{{number_format($day_pricing_arr[5], 2)}}} @else Not Set @endif @endif</h3></td>
																			<td class="fc-event-container cal-day-basic" id="cal-basic-sat" data-day="saturday">@if (isset($closed_arr[1]) && $closed_arr[6]) <h3>Closed</h3> @else Minimum<h3>@if (isset($day_pricing_arr[6])) ${{{number_format($day_pricing_arr[6], 2)}}} @else Not Set @endif @endif</h3></td>
																			<td class="fc-event-container cal-day-basic" id="cal-basic-sun" data-day="sunday">@if (isset($closed_arr[1]) && $closed_arr[0]) <h3>Closed</h3> @else Minimum<h3>@if (isset($day_pricing_arr[0])) ${{{number_format($day_pricing_arr[0], 2)}}} @else Not Set @endif @endif</h3></td>
																		</tr>
																	</tbody>
																</table>
															</div>
														</div>
													</div>
												</div>
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
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12">
			<div class="panel panel-primary panel-border">
				<div class="panel-heading border-light">
					<h4 class="panel-title">
						<i class="livicon" data-name="calendar" data-size="16" data-loop="true" data-c="white" data-hc="white"></i>
						Calendar &amp; Advanced Pricing
					</h4>
				</div>
				<div class="panel-body">
					<div id="full-calendar"></div>
				</div>
			</div>
		</div>
	</div>
</section>
<div class="modal modal-center modal-small" id="dateInfo" role="dialog" aria-labelledby="dateInfo_title" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" aria-labelledby="dateInfo_title"></h4>
			</div>
			<div class="modal-body">
				<strong>Business hours</strong>
				<p>10:00am-11:00pm</p><hr>
				<strong>Room Minimum</strong>
				<p>$2000 based on a 4 hour event</p><hr>
				<strong>Advanced Room minimum</strong>
				<p>$1000 from 10:00am-12:00pm</p>
				<p>$2000 from 08:00pm-11:00pm</p>
			</div>
			<div class="modal-footer">
				<a id="calendar-modal-edit" href="#" type="button" class="btn btn-success" data-dismiss="modal">Edit</a>
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
			</div>
		</div>
	</div>
</div>
<div class="modal modal-center modal-small" id="dayBasic" role="dialog" aria-labelledby="dayBasic_title" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" aria-labelledby="dayBasic_title"></h4>
			</div>
			<div class="modal-body">
				<div class="form-group" style="position: static;">
					<p class="help-block">Enter the base minimum spend</p>
					<div class="form-group input-group">
						<span class="input-group-addon">$</span>
							<input id="cal-day-spend" type="text" class="form-control" placeholder="2000">
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<input type="hidden" id="cal-basic-day">
				<a id="calendar-day-save" href="#" type="button" class="btn btn-success">Save</a>
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
			</div>
		</div>
	</div>
</div>
<div class="modal modal-center modal-small" id="dateEdit" role="dialog" aria-labelledby="dateInfo_title" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" aria-labelledby="dateInfo_title"></h4>
			</div>
			<div class="modal-body">
				<label for="cal-from">Business Hours</label>
				<div style='float: right;'><input type="checkbox" name="openCheckbox" id="openCheckbox" checked data-on-text="Open" data-off-text="Closed" data-size="mini" /></div>
				<p class="help-block">Enter the hours available to host an event.</p>
				<div class="col-md-6 display-no" style="display: block;">
					<div class="form-group" style="position: static;">
						From
						<select class="form-control select2-nosearch" id="cal-from">
							<option value=""></option>
							<option value="0000">00:00</option>
							<option value="0100">01:00</option>
							<option value="0200">02:00</option>
							<option value="0300">03:00</option>
							<option value="0400">04:00</option>
							<option value="0500">05:00</option>
							<option value="0600">06:00</option>
							<option value="0700">07:00</option>
							<option value="0800">08:00</option>
							<option value="0900">09:00</option>
							<option value="1000">10:00</option>
							<option value="1100">11:00</option>
							<option value="1200">12:00</option>
							<option value="1300">13:00</option>
							<option value="1400">14:00</option>
							<option value="1500">15:00</option>
							<option value="1600">16:00</option>
							<option value="1700">17:00</option>
							<option value="1800">18:00</option>
							<option value="1900">19:00</option>
							<option value="2000">20:00</option>
							<option value="2100">21:00</option>
							<option value="2200">22:00</option>
							<option value="2300">23:00</option>
						</select>
					</div>
				</div>
				<div class="col-md-6 display-no" style="display: block;">
					<div class="form-group" style="position: static;">
						To
						<select class="form-control select2-nosearch" id="cal-to">
							<option value=""></option>
							<option value="0000">00:00</option>
							<option value="0100">01:00</option>
							<option value="0200">02:00</option>
							<option value="0300">03:00</option>
							<option value="0400">04:00</option>
							<option value="0500">05:00</option>
							<option value="0600">06:00</option>
							<option value="0700">07:00</option>
							<option value="0800">08:00</option>
							<option value="0900">09:00</option>
							<option value="1000">10:00</option>
							<option value="1100">11:00</option>
							<option value="1200">12:00</option>
							<option value="1300">13:00</option>
							<option value="1400">14:00</option>
							<option value="1500">15:00</option>
							<option value="1600">16:00</option>
							<option value="1700">17:00</option>
							<option value="1800">18:00</option>
							<option value="1900">19:00</option>
							<option value="2000">20:00</option>
							<option value="2100">21:00</option>
							<option value="2200">22:00</option>
							<option value="2300">23:00</option>
						</select>
					</div>
				</div>
				<hr>
				<div class="form-group" style="position: static;">
					<label for="select-3">Room Minimum</label>
					<p class="help-block">Enter the standard duration of the event.</p>
					<input id="cal-duration" type="text" placeholder="4" class="form-control ts-dur">
				</div>
				<div class="form-group" style="position: static;">
					<p class="help-block">Enter the base minimum spend for this duration.</p>
					<div class="form-group input-group">
						<span class="input-group-addon">$</span>
							<input id="cal-spend" type="text" class="form-control" placeholder="2000">
					</div>
				</div>
				<div class="checkbox" style="position: static;">
					<label>
						<input id="cal-advanced" type="checkbox" value="1"> <span>Advanced minimum spend</span>
					</label>
				</div>
				<div id="showAdvanced" style="display:none">
					<label for="select-1">Advanced Room Minimums</label>
					<p class="help-block">Enter time slots and their corresponding minimum spends.</p>
					<div class="row advanced-pricing-row">
						<div class="col-md-4 display-no" style="display: block;padding-top: 20px;">
							<div class="form-group input-group" style="position: static;">
								<span class="input-group-addon">$</span>
									<input class="cal-advanced-spend form-control" type="text" placeholder="2000">
							</div>
						</div>
						<div class="col-md-4 display-no" style="display: block;">
							<div class="form-group" style="position: static;">
								From
								<select class="form-control select2-nosearch cal-advanced-from">
									<option value=""></option>
									<option value="0000">00:00</option>
									<option value="0100">01:00</option>
									<option value="0200">02:00</option>
									<option value="0300">03:00</option>
									<option value="0400">04:00</option>
									<option value="0500">05:00</option>
									<option value="0600">06:00</option>
									<option value="0700">07:00</option>
									<option value="0800">08:00</option>
									<option value="0900">09:00</option>
									<option value="1000">10:00</option>
									<option value="1100">11:00</option>
									<option value="1200">12:00</option>
									<option value="1300">13:00</option>
									<option value="1400">14:00</option>
									<option value="1500">15:00</option>
									<option value="1600">16:00</option>
									<option value="1700">17:00</option>
									<option value="1800">18:00</option>
									<option value="1900">19:00</option>
									<option value="2000">20:00</option>
									<option value="2100">21:00</option>
									<option value="2200">22:00</option>
									<option value="2300">23:00</option>
								</select>
							</div>
						</div>
						<div class="col-md-4 display-no" style="display: block;">
							<div class="form-group" style="position: static;">
								To
								<select class="form-control select2-nosearch cal-advanced-to">
									<option value=""></option>
									<option value="0000">00:00</option>
									<option value="0100">01:00</option>
									<option value="0200">02:00</option>
									<option value="0300">03:00</option>
									<option value="0400">04:00</option>
									<option value="0500">05:00</option>
									<option value="0600">06:00</option>
									<option value="0700">07:00</option>
									<option value="0800">08:00</option>
									<option value="0900">09:00</option>
									<option value="1000">10:00</option>
									<option value="1100">11:00</option>
									<option value="1200">12:00</option>
									<option value="1300">13:00</option>
									<option value="1400">14:00</option>
									<option value="1500">15:00</option>
									<option value="1600">16:00</option>
									<option value="1700">17:00</option>
									<option value="1800">18:00</option>
									<option value="1900">19:00</option>
									<option value="2000">20:00</option>
									<option value="2100">21:00</option>
									<option value="2200">22:00</option>
									<option value="2300">23:00</option>
								</select>
							</div>
						</div>
						<a href="#" class="col-md-1 advanced-pricing-close">&times;</a>
					</div>
					<a id="calendar-add-slot" href="#" class="btn btn-xs btn-success" style="float:left;"><span class="glyphicon glyphicon-plus"></span> Add a pricing slot</a>
					<a id="calendar-del-slot" href="#" class="btn btn-xs btn-danger" style="display:none;float:right;"></span> Remove pricing slot <span class="glyphicon glyphicon-minus"></a>
					<br style="clear:both;">
				</div>
			</div>
			<div class="modal-footer">
				<input type="hidden" id="cal-date-start">
				<input type="hidden" id="cal-date-end">
				<input type="hidden" id="cal-type">
				<a id="calendar-modal-save" href="#" type="button" class="btn btn-success">Save</a>
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
			</div>
		</div>
	</div>
</div>
@stop

@section('footer_scripts')
<script src="{{ asset('assets/vendors/webui-popover/jquery.webui-popover.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/vendors/fullcalendar/moment/min/moment.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/vendors/fullcalendar/fullcalendar.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/bootstrap-switch.min.js') }}"></script>
<script>
$("#openCheckbox").bootstrapSwitch();

$(document).ready(function(){
	$('#openCheckbox').on('switchChange.bootstrapSwitch', function (event, state) {
		if (!state)
		{
			$("#cal-from").prop("disabled", true);
			$("#cal-to").prop("disabled", true);
			$("#cal-duration").prop("disabled", true);
			$("#cal-spend").prop("disabled", true);
			$("#cal-advanced").prop("disabled", true);

			$("#cal-advanced").prop("checked", false);
			$("#showAdvanced").hide();
		}
		 else
		{
			$("#cal-from").prop("disabled", false);
			$("#cal-to").prop("disabled", false);
			$("#cal-duration").prop("disabled", false);
			$("#cal-spend").prop("disabled", false);	
			$("#cal-advanced").prop("disabled", false);	
		}
	});
});

</script>
@stop