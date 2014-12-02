@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
Past Events
@parent
@stop

{{-- page level styles --}}
@section('header_styles')    
    <!--page level css -->
    <link rel="stylesheet" href="{{ asset('assets/css/pages/portlet.css') }}" />
    <!--end of page level css-->
@stop


{{-- Page content --}}
@section('content')

<section class="content-header">
                <h1>Upcoming Events</h1>
                <ol class="breadcrumb">
                    <li>
                        <a href="index">
                            <i class="fa fa-dashboard"></i>
                            Dashboard
                        </a>
                    </li>
                    <li>
                        Manage Events
                    </li>
                    <li class="active">Past Events</li>
                </ol>
            </section>
            <!-- Main content -->
            <section class="content">
                <div class="form-group col-md-2 col-md-offset-8">
                    <label>Search:</label>
                    <input class="form-control"/>
                </div>
				<div class="form-group col-md-offset-10">
                    <label>Sort by:</label>
                    <select class="form-control">
                    <option>Date</option>
                    <option>Room</option>
                    <option>Type</option>
                    <option>Price</option>
                    <option>Time</option>
                    </select>
                </div>
                <div class="row ui-sortable" id="sortable_portlets">
                    <div class="col-md-4 column sortable">
                        <!-- BEGIN Portlet PORTLET-->
                        <div class=" portlet box danger">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="livicon" data-c="#fff" data-hc="#fff" data-name="gift" data-size="18" data-loop="true"></i>
                                    Maria's Sweet 16
                                </div>
                                <div class="actions">
                                    <a href="{{ URL::to('admin/eventdetail') }}" class="btn btn-default btn-sm">
                                        <i class="glyphicon glyphicon-share-alt"></i>
                                        Go to Event
                                    </a>
                                </div>
                            </div>
                            <div class="portlet-body">
                                <div>
                                    <b>Date:</b> Fri. 4/12/14<br>
                                    <b>Time:</b> 6-10 PM<br>
                                    <b>Room:</b> Ammos<br>
                                    <b>Type:</b> Sweet 16<br>
                                    <b>Guests:</b> 80 adults, 20 kids (confirmed)<br>
                                    <b>Menu:</b> Buffet<br>
                                    <b>Bar:</b> Open<br>
                                    <b>Price:</b> $1800 (owe $1000)<br>
                                    <b>Notes:</b> None
                                </div>
                            </div>
                        </div>
                        <!-- END Portlet PORTLET-->
                        <!-- BEGIN Portlet PORTLET-->
                        <div class=" portlet box danger">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="livicon" data-c="#fff" data-hc="#fff" data-name="gift" data-size="18" data-loop="true"></i>
                                    Maria's Sweet 16
                                </div>
                                <div class="actions">
                                    <a href="{{ URL::to('admin/eventdetail') }}" class="btn btn-default btn-sm">
                                        <i class="glyphicon glyphicon-share-alt"></i>
                                        Go to Event
                                    </a>
                                </div>
                            </div>
                            <div class="portlet-body">
                                <div>
                                    <b>Date:</b> Fri. 4/12/14<br>
                                    <b>Time:</b> 6-10 PM<br>
                                    <b>Room:</b> Ammos<br>
                                    <b>Type:</b> Sweet 16<br>
                                    <b>Guests:</b> 80 adults, 20 kids (confirmed)<br>
                                    <b>Menu:</b> Buffet<br>
                                    <b>Bar:</b> Open<br>
                                    <b>Price:</b> $1800 (owe $1000)<br>
                                    <b>Notes:</b> None
                                </div>
                            </div>
                        </div>
                        <!-- END Portlet PORTLET-->
                        <!-- BEGIN Portlet PORTLET-->
                        <div class=" portlet box danger">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="livicon" data-c="#fff" data-hc="#fff" data-name="gift" data-size="18" data-loop="true"></i>
                                    Maria's Sweet 16
                                </div>
                                <div class="actions">
                                    <a href="{{ URL::to('admin/eventdetail') }}" class="btn btn-default btn-sm">
                                        <i class="glyphicon glyphicon-share-alt"></i>
                                        Go to Event
                                    </a>
                                </div>
                            </div>
                            <div class="portlet-body">
                                <div>
                                    <b>Date:</b> Fri. 4/12/14<br>
                                    <b>Time:</b> 6-10 PM<br>
                                    <b>Room:</b> Ammos<br>
                                    <b>Type:</b> Sweet 16<br>
                                    <b>Guests:</b> 80 adults, 20 kids (confirmed)<br>
                                    <b>Menu:</b> Buffet<br>
                                    <b>Bar:</b> Open<br>
                                    <b>Price:</b> $1800 (owe $1000)<br>
                                    <b>Notes:</b> None
                                </div>
                            </div>
                        </div>
                        <!-- END Portlet PORTLET-->
                    </div>
                    <div class="col-md-4 column sortable">
                        <!-- BEGIN Portlet PORTLET-->
                        <div class=" portlet box danger">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="livicon" data-c="#fff" data-hc="#fff" data-name="gift" data-size="18" data-loop="true"></i>
                                    Maria's Sweet 16
                                </div>
                                <div class="actions">
                                    <a href="{{ URL::to('admin/eventdetail') }}" class="btn btn-default btn-sm">
                                        <i class="glyphicon glyphicon-share-alt"></i>
                                        Go to Event
                                    </a>
                                </div>
                            </div>
                            <div class="portlet-body">
                                <div>
                                    <b>Date:</b> Fri. 4/12/14<br>
                                    <b>Time:</b> 6-10 PM<br>
                                    <b>Room:</b> Ammos<br>
                                    <b>Type:</b> Sweet 16<br>
                                    <b>Guests:</b> 80 adults, 20 kids (confirmed)<br>
                                    <b>Menu:</b> Buffet<br>
                                    <b>Bar:</b> Open<br>
                                    <b>Price:</b> $1800 (owe $1000)<br>
                                    <b>Notes:</b> None
                                </div>
                            </div>
                        </div>
                        <!-- END Portlet PORTLET-->
                        <!-- BEGIN Portlet PORTLET-->
                        <div class=" portlet box danger">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="livicon" data-c="#fff" data-hc="#fff" data-name="gift" data-size="18" data-loop="true"></i>
                                    Maria's Sweet 16
                                </div>
                                <div class="actions">
                                    <a href="{{ URL::to('admin/eventdetail') }}" class="btn btn-default btn-sm">
                                        <i class="glyphicon glyphicon-share-alt"></i>
                                        Go to Event
                                    </a>
                                </div>
                            </div>
                            <div class="portlet-body">
                                <div>
                                    <b>Date:</b> Fri. 4/12/14<br>
                                    <b>Time:</b> 6-10 PM<br>
                                    <b>Room:</b> Ammos<br>
                                    <b>Type:</b> Sweet 16<br>
                                    <b>Guests:</b> 80 adults, 20 kids (confirmed)<br>
                                    <b>Menu:</b> Buffet<br>
                                    <b>Bar:</b> Open<br>
                                    <b>Price:</b> $1800 (owe $1000)<br>
                                    <b>Notes:</b> None
                                </div>
                            </div>
                        </div>
                        <!-- END Portlet PORTLET-->
                        <!-- BEGIN Portlet PORTLET-->
                        <div class=" portlet box danger">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="livicon" data-c="#fff" data-hc="#fff" data-name="gift" data-size="18" data-loop="true"></i>
                                    Maria's Sweet 16
                                </div>
                                <div class="actions">
                                    <a href="{{ URL::to('admin/eventdetail') }}" class="btn btn-default btn-sm">
                                        <i class="glyphicon glyphicon-share-alt"></i>
                                        Go to Event
                                    </a>
                                </div>
                            </div>
                            <div class="portlet-body">
                                <div>
                                    <b>Date:</b> Fri. 4/12/14<br>
                                    <b>Time:</b> 6-10 PM<br>
                                    <b>Room:</b> Ammos<br>
                                    <b>Type:</b> Sweet 16<br>
                                    <b>Guests:</b> 80 adults, 20 kids (confirmed)<br>
                                    <b>Menu:</b> Buffet<br>
                                    <b>Bar:</b> Open<br>
                                    <b>Price:</b> $1800 (owe $1000)<br>
                                    <b>Notes:</b> None
                                </div>
                            </div>
                        </div>
                        <!-- END Portlet PORTLET-->
                    </div>
                    <div class="col-md-4 column sortable">
                        <!-- BEGIN Portlet PORTLET-->
                        <div class=" portlet box danger">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="livicon" data-c="#fff" data-hc="#fff" data-name="gift" data-size="18" data-loop="true"></i>
                                    Maria's Sweet 16
                                </div>
                                <div class="actions">
                                    <a href="{{ URL::to('admin/eventdetail') }}" class="btn btn-default btn-sm">
                                        <i class="glyphicon glyphicon-share-alt"></i>
                                        Go to Event
                                    </a>
                                </div>
                            </div>
                            <div class="portlet-body">
                                <div>
                                    <b>Date:</b> Fri. 4/12/14<br>
                                    <b>Time:</b> 6-10 PM<br>
                                    <b>Room:</b> Ammos<br>
                                    <b>Type:</b> Sweet 16<br>
                                    <b>Guests:</b> 80 adults, 20 kids (confirmed)<br>
                                    <b>Menu:</b> Buffet<br>
                                    <b>Bar:</b> Open<br>
                                    <b>Price:</b> $1800 (owe $1000)<br>
                                    <b>Notes:</b> None
                                </div>
                            </div>
                        </div>
                        <!-- END Portlet PORTLET-->
                        <!-- BEGIN Portlet PORTLET-->
                        <div class=" portlet box danger">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="livicon" data-c="#fff" data-hc="#fff" data-name="gift" data-size="18" data-loop="true"></i>
                                    Maria's Sweet 16
                                </div>
                                <div class="actions">
                                    <a href="{{ URL::to('admin/eventdetail') }}" class="btn btn-default btn-sm">
                                        <i class="glyphicon glyphicon-share-alt"></i>
                                        Go to Event
                                    </a>
                                </div>
                            </div>
                            <div class="portlet-body">
                                <div>
                                    <b>Date:</b> Fri. 4/12/14<br>
                                    <b>Time:</b> 6-10 PM<br>
                                    <b>Room:</b> Ammos<br>
                                    <b>Type:</b> Sweet 16<br>
                                    <b>Guests:</b> 80 adults, 20 kids (confirmed)<br>
                                    <b>Menu:</b> Buffet<br>
                                    <b>Bar:</b> Open<br>
                                    <b>Price:</b> $1800 (owe $1000)<br>
                                    <b>Notes:</b> None
                                </div>
                            </div>
                        </div>
                        <!-- END Portlet PORTLET-->
                        <!-- BEGIN Portlet PORTLET-->
                        <div class=" portlet box danger">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="livicon" data-c="#fff" data-hc="#fff" data-name="gift" data-size="18" data-loop="true"></i>
                                    Maria's Sweet 16
                                </div>
                                <div class="actions">
                                    <a href="{{ URL::to('admin/eventdetail') }}" class="btn btn-default btn-sm">
                                        <i class="glyphicon glyphicon-share-alt"></i>
                                        Go to Event
                                    </a>
                                </div>
                            </div>
                            <div class="portlet-body">
                                <div>
                                    <b>Date:</b> Fri. 4/12/14<br>
                                    <b>Time:</b> 6-10 PM<br>
                                    <b>Room:</b> Ammos<br>
                                    <b>Type:</b> Sweet 16<br>
                                    <b>Guests:</b> 80 adults, 20 kids (confirmed)<br>
                                    <b>Menu:</b> Buffet<br>
                                    <b>Bar:</b> Open<br>
                                    <b>Price:</b> $1800 (owe $1000)<br>
                                    <b>Notes:</b> None
                                </div>
                            </div>
                        </div>
                        <!-- END Portlet PORTLET-->
                    </div>
                </div>
            </section>
            @stop

{{-- page level scripts --}}
@section('footer_scripts')
    <!-- begining of page level js-->
    <script>
    jQuery(document).ready(function() {

        $("#sortable_portlets").sortable({
            connectWith: ".portlet",
            items: ".portlet",
            opacity: 0.8,
            coneHelperSize: true,
            placeholder: 'sortable-box-placeholder round-all',
            forcePlaceholderSize: true,
            tolerance: "pointer"
        });

        $(".column").disableSelection();
    });
    </script>
    @stop
