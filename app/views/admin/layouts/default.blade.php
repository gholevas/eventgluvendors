<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>
        @section('title')
        | eventGL&uuml;
        @show
    </title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    <!-- global css -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- font Awesome -->
    <link href="{{ asset('assets/vendors/font-awesome-4.2.0/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/styles/black.css') }}" rel="stylesheet" type="text/css" id="colorscheme" />
    <link rel="stylesheet" href="{{ asset('assets/css/panel.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/metisMenu.css') }}" />
    <link href="{{ asset('assets/vendors/datetimepicker/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet" media="screen" />
    <link href="{{ asset('assets/vendors/spinner/dist/bootstrap-spinner.css') }}" rel="stylesheet" />

    <!-- end of global css -->
    <!--page level css-->
    @yield('header_styles')
    <!--modal level css -->
    <link href="{{ asset('assets/vendors/modal/css/component.css') }}" rel="stylesheet" />
    <!--end of page level css-->
    <!--end of page level css-->
    <!-- daterange picker -->
    <link href="{{ asset('assets/vendors/daterangepicker/css/daterangepicker-bs3.css') }}" rel="stylesheet" type="text/css" />
    <!--select css-->
    <link href="{{ asset('assets/vendors/select2/select2.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets/vendors/select2/select2-bootstrap.css') }}" />
    <!--clock face css-->
    <link href="{{ asset('assets/vendors/iCheck/skins/all.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/pages/formelements.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/pages/form_layouts.css') }}" rel="stylesheet" type="text/css"/>
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/datatables/css/select2.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/datatables/css/dataTables.bootstrap.css') }}" />
	<link href="{{ asset('assets/css/pages/tables.css') }}" rel="stylesheet" type="text/css" />
	<!-- page level css -->
<!--
	<link href="{{ asset('assets/vendors/x-editable/css/x-select.css') }}" type="text/css" rel="stylesheet" />
	<link href="{{ asset('assets/vendors/x-editable/css/bootstrap-editable.css') }}" type="text/css" rel="stylesheet" />
	<link href="{{ asset('assets/vendors/x-editable/css/x-selectbootstrap.css') }}" type="text/css" rel="stylesheet" />
	<link href="{{ asset('assets/vendors/x-editable/css/typehead-bootstrap.css') }}" type="text/css" rel="stylesheet" />
	<link href="{{ asset('assets/css/pages/inlinedit.css') }}" rel="stylesheet" />
--->
</head>

<body class="skin-josh">
    <header class="header" id="HEADER_1">
        <a href="{{ URL::to('admin/index') }}" class="logo">
            <img src="{{ asset('assets/img/logo.png') }}" alt="logo">
        </a>
        <nav id="HEADER_1" class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <div>
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <div class="responsive_nav"></div>
                </a>
            </div>
            <div class="navbar-right">
                <ul class="nav navbar-nav">
                    <li class="dropdown notifications-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="livicon" data-name="plus-alt" data-loop="true" data-color="#7cc142" data-hovercolor="#7cc142" data-size="28"></i>
                        </a>
                        <ul class=" notifications dropdown-menu">
                            <li class="dropdown-title">Quick Add</li>
                            <li>
                                <!-- inner menu: contains the actual data -->
                                <ul class="menu">
                                    <li>
                                        <i class="livicon success" data-n="inbox" data-s="20" data-c="white" data-hc="white"></i>
                                        <a data-toggle="modal" data-href="#newEvent" href="#newEvent">New Event</a>
                                    </li>
                                    <li>
                                        <i class="livicon success" data-n="magic" data-s="20" data-c="white" data-hc="white"></i>
                                        <a data-toggle="modal" data-href="#newQuote" href="#newQuote">New Quote</a>
                                    </li>
                                    <li>
                                        <i class="livicon success" data-n="users" data-s="20" data-c="white" data-hc="white"></i>
                                        <a data-toggle="modal" data-href="#newClient" href="#newClient">New Client</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                <!--
                    <li class="dropdown messages-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="livicon" data-name="message-flag" data-loop="true" data-color="#7cc142" data-hovercolor="#7cc142" data-size="28"></i>
                            <span class="label label-danger">4</span>
                        </a>
                        <ul class="dropdown-menu dropdown-messages pull-right">
                            <li class="dropdown-title">4 New Messages</li>
                            <li class="unread message">
                                <a href="javascript:;" class="message"> <i class="pull-right" data-toggle="tooltip" data-placement="top" title="Mark as Read"><span class="pull-right ol livicon" data-n="adjust" data-s="10" data-c="#287b0b"></span></i> 
                                    <img data-src="holder.js/45x45/#000:#fff" class="img-responsive message-image" alt="icon">
                                    <div class="message-body">
                                        <strong>Riot Zeast</strong>
                                        <br>Hello, You there?
                                        <br>
                                        <small>8 minutes ago</small>
                                    </div>
                                </a>
                            </li>
                            <li class="unread message">
                                <a href="javascript:;" class="message">
                                    <i class="pull-right" data-toggle="tooltip" data-placement="top" title="Mark as Read"><span class="pull-right ol livicon" data-n="adjust" data-s="10" data-c="#287b0b"></span></i> 
                                    <img data-src="holder.js/45x45/#000:#fff" class="img-responsive message-image" alt="icon">
                                    <div class="message-body">
                                        <strong>John Kerry</strong>
                                        <br>Can we Meet ?
                                        <br>
                                        <small>45 minutes ago</small>
                                    </div>
                                </a>
                            </li>
                            <li class="unread message">
                                <a href="javascript:;" class="message">
                                    <i class="pull-right" data-toggle="tooltip" data-placement="top" title="Mark as Read">
                                        <span class="pull-right ol livicon" data-n="adjust" data-s="10" data-c="#287b0b"></span>
                                    </i>
                                    <img data-src="holder.js/45x45/#000:#fff" class="img-responsive message-image" alt="icon">
                                    <div class="message-body">
                                        <strong>Jenny Kerry</strong>
                                        <br>Dont forgot to call...
                                        <br>
                                        <small>An hour ago</small>
                                    </div>
                                </a>
                            </li>
                            <li class="unread message">
                                <a href="javascript:;" class="message">
                                    <i class="pull-right" data-toggle="tooltip" data-placement="top" title="Mark as Read">
                                        <span class="pull-right ol livicon" data-n="adjust" data-s="10" data-c="#287b0b"></span>
                                    </i>
                                    <img data-src="holder.js/45x45/#000:#fff" class="img-responsive message-image" alt="icon">
                                    <div class="message-body">
                                        <strong>Ronny</strong>
                                        <br>Hey! sup Dude?
                                        <br>
                                        <small>3 Hours ago</small>
                                    </div>
                                </a>
                            </li>
                            <li class="footer">
                                <a href="#">View all</a>
                            </li>
                        </ul>
                    </li>
                    -->

                   <!--

                    -->

                    <!--
                    <li class="dropdown notifications-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="livicon" data-name="bell" data-loop="true" data-color="#7cc142" data-hovercolor="#e9573f" data-size="28"></i>
                            <span class="label label-danger">7</span>
                        </a>
                        <ul class=" notifications dropdown-menu">
                            <li class="dropdown-title">You have 7 notifications</li>
                            <li>
                    
                                <ul class="menu">
                                    <li>
                                        <i class="livicon danger" data-n="timer" data-s="20" data-c="white" data-hc="white"></i>
                                        <a href="#">after a long time</a>
                                        <small class="pull-right">
                                            <span class="livicon paddingright_10" data-n="timer" data-s="10"></span>
                                            Just Now
                                        </small>
                                    </li>
                                    <li>
                                        <i class="livicon success" data-n="gift" data-s="20" data-c="white" data-hc="white"></i>
                                        <a href="#">Jef's Birthday today</a>
                                        <small class="pull-right">
                                            <span class="livicon paddingright_10" data-n="timer" data-s="10"></span>
                                            Few seconds ago
                                        </small>
                                    </li>
                                    <li>
                                        <i class="livicon warning" data-n="dashboard" data-s="20" data-c="white" data-hc="white"></i>
                                        <a href="#">out of space</a>
                                        <small class="pull-right">
                                            <span class="livicon paddingright_10" data-n="timer" data-s="10"></span>
                                            8 minutes ago
                                        </small>
                                    </li>
                                    <li>
                                        <i class="livicon bg-aqua" data-n="hand-right" data-s="20" data-c="white" data-hc="white"></i>
                                        <a href="#">New friend request</a>
                                        <small class="pull-right">
                                            <span class="livicon paddingright_10" data-n="timer" data-s="10"></span>
                                            An hour ago
                                        </small>
                                    </li>
                                    <li>
                                        <i class="livicon danger" data-n="shopping-cart-in" data-s="20" data-c="white" data-hc="white"></i>
                                        <a href="#">On sale 2 products</a>
                                        <small class="pull-right">
                                            <span class="livicon paddingright_10" data-n="timer" data-s="10"></span>
                                            3 Hours ago
                                        </small>
                                    </li>
                                    <li>
                                        <i class="livicon success" data-n="image" data-s="20" data-c="white" data-hc="white"></i>
                                        <a href="#">Lee Shared your photo</a>
                                        <small class="pull-right">
                                            <span class="livicon paddingright_10" data-n="timer" data-s="10"></span>
                                            Yesterday
                                        </small>
                                    </li>
                                    <li>
                                        <i class="livicon warning" data-n="thumbs-up" data-s="20" data-c="white" data-hc="white"></i>
                                        <a href="#">David liked your photo</a>
                                        <small class="pull-right">
                                            <span class="livicon paddingright_10" data-n="timer" data-s="10"></span>
                                            2 July 2014
                                        </small>
                                    </li>
                                </ul>
                            </li>
                            <li class="footer">
                                <a href="#">View all</a>
                            </li>
                        </ul>
                    </li>
                    -->
                    

                    
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="http://www.gravatar.com/avatar/{{{md5(Sentry::getUser()->email)}}}" <?php /*data-src="holder.js/35x35/#fff:#000"*/ ?> width="35" class="img-circle img-responsive pull-left" height="35" alt="riot">
                            <div class="riot">
                                <div>
                                    {{{$venue->name}}}
                                    <span>
                                        <i class="caret"></i>
                                    </span>
                                </div>
                            </div>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header bg-light-blue">
                                <img src="http://www.gravatar.com/avatar/{{{md5(Sentry::getUser()->email)}}}" <?php /*data-src="holder.js/90x90/#fff:#000"*/ ?> class="img-responsive img-circle" alt="User Image">
                                <p class="topprofiletext">{{{$venue->name}}}</p>
                            </li>
                            <!-- Menu Body -->
                            <li>
                                <a href="signup">
                                    <i class="livicon" data-name="pen" data-s="18"></i>
                                    Manage Venue Listing
                                </a>
                            </li>
                            <li role="presentation"></li>
                            <li>
                                <a href="#">
                                    <i class="livicon" data-name="gears" data-s="18"></i>
                                    Account Settings
                                </a>
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-right">
                                    <a href="{{ URL::to('admin/logout') }}">
                                        <i class="livicon" data-name="sign-out" data-s="18"></i>
                                        Logout
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
<!--- new event responsive model -->
    <div class="modal fade in" id="newEvent" role="dialog" aria-hidden="false" style="display:none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="row">
                        <form class="form-horizontal form-bordered event-new-submit">
                        <!--basic form starts-->
                        <div class="panel panel-primary" id="hidepanel1">
                            <div class="panel-heading">
                                <h3 class="panel-title">
                                    <i class="livicon" data-name="inbox" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                                    New Event
                                </h3>
                            </div>
                            <div class="panel-body border">
                                    <fieldset>
                                        <!-- Name input-->
                                        <div class="form-group striped-col">
                                            <label class="col-md-3 control-label" for="ne-eventname">Event Name</label>
                                            <div class="col-md-9">
                                                <input id="ne-eventname" type="text" placeholder="ex. Maria's Sweet 16" class="form-control"></div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="ne-type">
                                                Type
                                            </label>
                                            <div class="col-md-9">
                                            <select id="ne-type" class="form-control select2">
                                                    <option value="">Select a Type</option>
                                                    <option value="Sweet 16">Sweet 16</option>
                                                    <option value="Corporate Event">Corporate Event</option>
                                            </select>
                                            </div>
                                        </div>
                                         <!--select2 starts-->
                                        <div class="form-group striped-col">
                                            <label class="col-md-3 control-label" for="ne-room">
                                                Room
                                            </label>
                                            <div class="col-md-9">
                                            <select id="ne-room" class="form-control select2">
                                                    <option value="">Select a Room</option>
                                                    @@foreach ($rooms as $room)
                                                    <option value="{{{$room->id}}}">{{{$room->name}}}</option>
                                                    @@endforeach 
                                            </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="ne-datetime">
                                                Date and Time
                                            </label>
                                            <div class="input-group date form_datetime5 col-md-9 pull-right" data-date="<?php echo date('Y-m-d'); ?>T00:00:00Z" data-date-format="dd MM yyyy - HH:ii p" data-link-field="dtp_input1">
                                                <input id="ne-datetime" type="text" value="" class="form-control">
                                                <span class="input-group-addon">
                                                    <span class="glyphicon glyphicon-remove"></span>
                                                </span>
                                                <span class="input-group-addon">
                                                    <span class="glyphicon glyphicon-th"></span>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="form-group striped-col">
                                            <label class="col-md-3 control-label" for="ne-duration">Event Duration</label>
                                            <div class="col-md-offset-3">
												<input id="ne-duration" type="text" value="4" class="form-control ts-dur">
											</div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Guests</label>

                                            <div class="col-md-offset-3">
												<input id="ne-adults" type="text" value="50" class="form-control ts-adults">
                                            </div>
                                            <div class="col-md-offset-3">
												<input id="ne-kids" type="text" value="50" class="form-control ts-kids">
                                            </div> 
                                        </div>
                                        <div class="form-group striped-col">
                                            <label for="single-append-text" class="col-md-3 control-label">
                                                Client
                                            </label>
                                            <div class="col-md-9">
                                                <div style="width:270px;float:left;"><input id="ne-client" class="form-control client-search" type="hidden"></div> <a class="btn btn-default pull-right" data-toggle="modal" href="#newClient">Create Client</a>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="ne-notes">Notes</label>
                                            <div class="col-md-9">
                                                <textarea class="form-control" id="ne-notes" placeholder="Enter your notes here..." rows="5"></textarea>
                                            </div>
                                        </div>
                                    </fieldset>
                            </div>
                        </div>
                        <!-- Form actions -->
						<div class="form-group">
							<div class="col-md-12 text-right">
								<button type="submit" class="btn btn-responsive btn-warning ">Create New Lead</button>&nbsp;&nbsp;&nbsp;
								<button type="submit" class="btn btn-responsive btn-success pull-right isConfirmed">Create New Confirmed Event</button>
							</div>
						</div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- END modal-->
    <!--- see client responsive model -->
    <div class="modal fade in" id="newClient" role="dialog" aria-hidden="false" style="display:none;">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="row">
                        <!--basic form starts-->
						<form class="clients-new-submit">
							<div class="panel panel-primary">
								<div class="panel-heading">
									<h3 class="panel-title">
										<i class="livicon" data-name="users" data-c="#fff" data-hc="#fff" data-size="18" data-loop="true"></i>
										New Client
									</h3>
								</div>
								<div class="panel-body border">
									<div class="form-horizontal form-bordered">
										<div class="form-body">
											<div class="form-group striped-col">
												<label for="" class="col-md-3 control-label">
												<i class="livicon" data-name="user" data-size="18" data-c="#000" data-hc="#000" data-loop="true"></i>
												</label>
												<div class="col-md-9 pull-right">
													<div class="input-group">
														<input id="nc-firstname" type="text" class="form-control" placeholder=" First name"></div>
												</div>
												<div class="col-md-9 pull-right">
													<div class="input-group">
														<input id="nc-lastname" type="text" class="form-control" placeholder=" Last name"></div>
												</div>
											</div>
											<div class="form-group">
												<label for="" class="col-md-3 control-label">
													<i class="livicon" data-name="cellphone" data-size="18" data-c="#000" data-hc="#000" data-loop="true"></i>
												</label>
												<div class="col-md-9 pull-right">
													<div class="input-group">
														<input id="nc-primary" type="text" class="form-control" placeholder=" Primary number"></div>
												</div>
												<div class="col-md-9 pull-right">
													<div class="input-group">
														<input id="nc-secondary" type="text" class="form-control" placeholder=" Secondary number"></div>
												</div>
											</div>
											<div class="form-group striped-col">
												<label for="nc-fax" class="col-md-3 control-label">
													<i class="livicon" data-name="printer" data-size="18" data-c="#000" data-hc="#000" data-loop="true"></i>
												</label>
												<div class="col-md-9 pull-right">
													<div class="input-group">
														<input id="nc-fax" type="text" class="form-control" placeholder=" Fax number"></div>
												</div>
											</div>
											<div class="form-group">
												<label for="nc-emailaddress" class="col-md-3 control-label">
													<i class="livicon" data-name="mail" data-size="18" data-c="#000" data-hc="#000" data-loop="true"></i>
												</label>
												<div class="col-md-9 pull-right">
													<div class="input-group">
														<input id="nc-emailaddress" type="text" placeholder=" Email address" class="form-control"/>
													</div>
												</div>
											</div>
											<div class="form-group striped-col">
												<label for="nc-address" class="col-md-3 control-label">
													<i class="livicon" data-name="map" data-c="#000" data-hc="#000" data-size="18" data-loop="true"></i>
												</label>
												<div class="col-md-9 pull-right">
													<div class="input-group">
														<input id="nc-address" type="text" class="form-control" placeholder=" Address"></div>
												</div>
											</div>
											<div class="form-group">
												<label for="nc-comments" class="col-md-3 control-label">
												<i class="livicon" data-name="doc-portrait" data-c="#000" data-hc="#000" data-size="18" data-loop="true"></i>
												</label>
												<div class="col-md-9 pull-right">
													<textarea id="nc-comments" rows="3" class="form-control" placeholder=" Enter your notes here..."></textarea>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-12 text-right">
									<button type="submit" class="btn btn-primary pull-right">Create New Client</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
<!-- END modal-->
<!--- new quote model -->
<div class="modal fade in" id="newQuote" role="dialog" aria-hidden="false" style="display:none;">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header success">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h4 class="modal-title">New Quote Generator</h4>
			</div>
			<form class="form-horizontal form-bordered quote-new-submit">			
			<div class="modal-body">
				<div class="row">
					<div class="col-md-6">
						<h4>Event Details</h4>
							<fieldset>
								<div class="form-group striped-col">
									<label class="col-md-3 control-label" for="nq-eventname">Event Name</label>
									<div class="col-md-9">
										<input id="nq-eventname" type="text" placeholder="ex. Maria's Sweet 16" class="form-control">
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label" for="nq-type">
										Type
									</label>
									<div class="col-md-9">
									<select id="nq-type" class="form-control select2">
											<option value="">Select a Type</option>
											<option value="Sweet 16">Sweet 16</option>
											<option value="Corporate Event">Corporate Event</option>
									</select>
									</div>
								</div>
								<div class="form-group striped-col">
									<label class="col-md-3 control-label" for="nq-room">
										Room
									</label>
									<div class="col-md-9">
									<select id="nq-room" class="form-control select2">
											<option value="">Select a Room</option>
                                              @foreach ($rooms as $room)
                                              <option value="{{{$room->id}}}">{{{$room->name}}}</option>
                                              @endforeach 
									</select>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label" for="nq-datetime">
										Date and Time
									</label>
									<div class="input-group date form_datetime5 col-md-9 pull-right" data-date="<?php echo date('Y-m-d'); ?>T00:00:00Z" data-date-format="dd MM yyyy - HH:ii p" data-link-field="dtp_input1">
										<input id="nq-datetime" type="text" value="" class="form-control">
										<span class="input-group-addon">
											<span class="glyphicon glyphicon-remove"></span>
										</span>
										<span class="input-group-addon">
											<span class="glyphicon glyphicon-th"></span>
										</span>
									</div>
								</div>
								<div class="form-group striped-col">
									<label class="col-md-3 control-label" for="nq-duration">Event Duration</label>
									<div class="col-md-offset-3">
										<input id="nq-duration" type="text" value="4" class="form-control ts-dur">
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label">Guests</label>
									<div class="col-md-offset-3">
										<input id="nq-adults" type="text" value="50" class="form-control ts-adults">
									</div>
									<div class="col-md-offset-3">
										<input id="nq-kids" type="text" value="50" class="form-control ts-kids">
									</div> 
								</div>
							</fieldset>
					</div>
					<div class="col-md-6">
						<h4>Order Details</h4>
							<fieldset>
							   <div class="form-group striped-col">
									<label class="col-md-3 control-label">Food package</label>
									<div class="col-md-offset-3">
										<select id="nq-food" class="form-control select2 consume-parent">
											<option value="">Select a food package</option>
                                                @foreach ($food_options as $option)
                                                <option value="{{{$option->id}}}">{{{$option->name}}}</option>
                                                @endforeach
										</select><br>
										<input type="hidden" id="nq-food-extras" class="consume-extras form-control" data-test="12312312312312">
									</div>
									<div class="col-md-offset-3" style="padding-top: 0;">
										<div class="span4">
											<div id="food-kids" style="display:none;">
												<select id="nq-foodkids" class="form-control select2 consume-parent">
												<option value="">Select a kid's food package</option>
                                                @foreach ($food_options as $option)
                                                <option value="{{{$option->id}}}">{{{$option->name}}}</option>
                                                @endforeach
												</select><br>
												<input type="hidden" id="nq-foodkids-extras" class="consume-extras form-control" multiple><br>
											</div>
											<a onclick="$('#food-kids').toggle(); $('#nq-foodkids').val(''); $('#nq-foodkids-extras').select2('data', null); $(this).text(this.text=='Different package for kids?'?'Same package as adults':'Different package for kids?');return false;" href="#">Different package for kids?</a>
										</div>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label">Drink package</label>
									<div class="col-md-offset-3">
										<select id="nq-drink" class="form-control select2 consume-parent">
                                            <option value="">Select a drink package</option>
                                                @foreach ($drink_options as $option)
                                                <option value="{{{$option->id}}}">{{{$option->name}}}</option>
                                                @endforeach
										</select><br>
										<input type="hidden" id="nq-drink-extras" class="consume-extras form-control" multiple>
									</div>
									<div class="col-md-offset-3" style="padding-top: 0;">
										<div class="span4">
											<div id="drink-kids" style="display:none;">
												<select id="nq-drinkkids" class="form-control select2 consume-parent">
													<option value="">Select a kid's drink package</option>
                                                @foreach ($drink_options as $option)
                                                <option value="{{{$option->id}}}">{{{$option->name}}}</option>
                                                @endforeach
												</select><br>
												<input type="hidden" id="nq-drinkkids-extras" class="consume-extras form-control" multiple><br>
											</div>
											<a onclick="$('#drink-kids').toggle(); $('#nq-drinkkids').val(''); $('#nq-drinkkids-extras').select2('data', null); $(this).text(this.text=='Different package for kids?'?'Same package as adults':'Different package for kids?');return false;" href="#">Different package for kids?</a>
										</div>
									</div>
								</div>
								<div class="form-group striped-col">
									<label class="col-md-3 control-label">Add-Ons</label>
									<div class="col-md-9">
                                        @foreach ($addons as $addon)
                                        <label class="standard-check"><input type="checkbox" class="nq-addons" value="{{{$addon->id}}}" />&nbsp;{{{$addon->name}}}</label><br>
                                        @endforeach
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label" for="nq-discount">Discount</label>
									<div class="col-md-9">
									<input id="nq-discount" type="text" value="10" class="form-control ts-perc">
									</div>
								</div>
								<div class="form-group striped-col">
									<label for="single-append-text" class="col-md-3 control-label">
										Client
									</label>
									<div class="col-md-9">
										<div style="width:270px;float:left;"><input id="nq-client" class="form-control client-search" type="hidden"></div> <a class="btn btn-default pull-right" href="javascript:void(0);" onClick="$('#newClient').appendTo('body').modal('show')">Create Client</a>
									</div>
								</div>
							</fieldset>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<div class="table-responsive danger">
					<table class="table table-condensed">
						<thead>
							<tr>
								<td>
									<strong>Price per person</strong>
								</td>
								<td class="text-center">
									<strong>Discount (10%)</strong>
								</td>
								<td class="text-center">
									<strong>Tax</strong>
								</td>
								<td class="text-center">
									<strong>Gratuity</strong>
								</td>
								<td class="text-right">
									<strong>Total</strong>
								</td>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td class="highrow" id="quote-pp">$0.00</td>
								<td class="highrow" id="quote-dc">$0.00</td>
								<td class="highrow" id="quote-tax">$0.00</td>
								<td class="highrow" id="quote-grat">$0.00</td>
								<td class="highrow" id="quote-total">$0.00</td>
							</tr>
						</tbody>
					</table>
				</div>
				<br>
				<button type="button" data-dismiss="modal" class="btn">Close</button>
				<button type="submit" class="btn btn-warning isFullQuote">Create Lead</button>
				<button type="submit" class="btn btn-success isConfirmed isFullQuote">Create Confirmed Event</button>
			</div>
			</form>
		</div>
	</div>
</div>
<!-- END modal-->
    <div class="wrapper row-offcanvas row-offcanvas-left">
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="left-side sidebar-offcanvas">
            <section class="sidebar purplebg">
                <div class="page-sidebar  sidebar-nav">
                    <div class="clearfix"></div>
                    <!-- BEGIN SIDEBAR MENU -->
                    <ul id="menu" class="page-sidebar-menu">
                        <li {{ (Request::is('admin/index') ? 'class="active"' : '') }}>
                            <a href="{{ URL::to('admin/index') }}">
                                <i class="livicon" data-name="home" data-size="18" data-c="#7cc142" data-hc="#7cc142" data-loop="true"></i>
                                <span class="title">Dashboard</span>
                            </a>

                        </li>
                        <li {{ (Request::is('admin/clients') ? 'class="active"' : '') }}>
                            <a href="{{ URL::to('admin/clients') }}">
                                <i class="livicon" data-name="users" data-c="#7cc142" data-hc="#7cc142" data-size="18" data-loop="true"></i>
                                <span class="title">Clients</span>
                            </a>
                        </li>
                        <li {{ (Request::is('admin/upcoming_events') || Request::is('admin/leads') || Request::is('admin/past_events') ? 'class="active"' : '') }}>
                            <a href="#">
                                <i class="livicon" data-name="inbox" data-c="#7cc142" data-hc="#7cc142" data-size="18" data-loop="true"></i>
                                <span class="title">Manage Events</span>
                                <span class="fa arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li {{ (Request::is('admin/upcoming_events') ? 'class="active"' : '') }}>
                                    <a href="{{ URL::to('admin/events/0') }}">
                                        <i class="fa fa-angle-double-right"></i>
                                        Upcoming Events
                                    </a>
                                </li>
                                <li {{ (Request::is('admin/leads') ? 'class="active"' : '') }}>
                                    <a href="{{ URL::to('admin/events/1') }}">
                                        <i class="fa fa-angle-double-right"></i>
                                        Leads
                                    </a>
                                </li>
                                <li {{ (Request::is('admin/past_events') ? 'class="active"' : '') }}>
                                    <a href="{{ URL::to('admin/events/2') }}">
                                        <i class="fa fa-angle-double-right"></i>
                                        Past Events
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li {{ (Request::is('admin/calendar') ? 'class="active"' : '') }}>
                            <a href="#">
                                <i class="livicon" data-name="calendar" data-c="#7cc142" data-hc="#7cc142" data-size="18" data-loop="true"></i>
                                <span class="title">Manage Calendars</span>
                                <span class="fa arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                @foreach ($rooms as $room)
                                <li {{ (Request::is('admin/calendar/' . $room->id) ? 'class="active"' : '') }}>
                                    <a href="{{ URL::to('admin/calendar/' .$room->id) }}">
                                        <i class="fa fa-angle-double-right"></i>
                                        {{$room->name}}
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </li>
                        <?php /*
                        <li {{ (Request::is('admin/analytics') ? 'class="active"' : '') }}>
                            <a href="{{ URL::to('admin/analytics') }}">
                                <i class="livicon" data-c="#7cc142" data-hc="#7cc142" data-name="barchart" data-size="18" data-loop="true"></i>
                                Analytics
                            </a>
                        </li>
                        */ ?>
                    </ul>
                    <!-- END SIDEBAR MENU -->
                </div>
            </section>
        </aside>
        <aside class="right-side">

            <!-- Notifications -->
            @include('notifications')
            
            <!-- Content -->
            @yield('content')
        </aside>
        <!-- right-side -->
    </div>
    <a id="back-to-top" href="#" class="btn btn-primary btn-lg back-to-top" role="button" title="Return to top" data-toggle="tooltip" data-placement="left">
        <i class="livicon" data-name="plane-up" data-size="18" data-loop="true" data-c="#fff" data-hc="white"></i>
    </a>
    <!-- global js -->
    <script src="{{ asset('assets/js/jquery-1.11.1.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/jquery-encoder-0.1.0.js') }}" type="text/javascript"></script>
    @if (Request::is('admin/form_builder2') || Request::is('admin/gridmanager') || Request::is('admin/portlet_draggable'))
        <script src="{{ asset('assets/vendors/form_builder1/js/jquery.ui.min.js') }}"></script>
    @endif
    <script src="{{ asset('assets/js/bootstrap.min.js') }}" type="text/javascript"></script>
    <!--livicons-->
    <script src="{{ asset('assets/vendors/livicons/minified/raphael-min.js') }}"></script>
    <script src="{{ asset('assets/vendors/livicons/minified/livicons-1.4.min.js') }}"></script>
    <script src="{{ asset('assets/js/josh.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/metisMenu.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/holder-master/holder.js') }}"></script>
    <!-- end of global js -->
    <!-- begin page level js -->
    @yield('footer_scripts')
    <!-- begining of page level js -->
<!--color picker-->
<script src="{{ asset('assets/vendors/colorpicker/js/bootstrap-colorpicker.js') }}"></script>
<!--time picker-->
<script src="{{ asset('assets/vendors/timepicker/js/bootstrap-timepicker.min.js') }}"></script>
<!--datetime picker-->
<script type="text/javascript" src="{{ asset('assets/vendors/datetimepicker/js/bootstrap-datetimepicker.js') }}" charset="UTF-8"></script>
<script type="text/javascript" src="{{ asset('assets/vendors/datetimepicker/js/locales/bootstrap-datetimepicker.fr.js') }}" charset="UTF-8"></script>
<!--clockface-->
<script src="{{ asset('assets/vendors/clockface/js/clockface.js') }}"></script>
<script type="text/javascript">
    $(function() {
        $('#t1').clockface();
    });

    $(function() {
        $('#t3').clockface({
            format: 'H:mm'
        }).clockface('show', '14:30');
    });

    $(function() {
        $('#t2').clockface({
            format: 'HH:mm',
            trigger: 'manual'
        });

        $('#toggle-btn').click(function(e) {
            e.stopPropagation();
            $('#t2').clockface('toggle');
        });
    });
    <!--panel js-->
    $(function() {
        //Colorpicker
        $(".my-colorpicker1").colorpicker();

        $(".my-colorpicker2").colorpicker();

        $(".my-colorpicker3").colorpicker();
    });
    //Timepicker
    $('#timepicker1').timepicker({
        showInputs: false

    });
    $('#timepicker2').timepicker({
        minuteStep: 5,
        showInputs: false,
        disableFocus: true
    });
    $('#timepicker3').timepicker({

        showSeconds: true,
        showMeridian: false,
        defaultTime: false
    });

    $('.form_datetime').datetimepicker({
        //language:  'fr',
        weekStart: 1,
        todayBtn: 1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        forceParse: 0,
        showMeridian: 1
    });

    $(".form_datetime0").datetimepicker({
        format: "dd MM yyyy - hh:ii"
    });
    $(".form_datetime2").datetimepicker({
        format: "dd MM yyyy - hh:ii",
        autoclose: true,
        todayBtn: true,
        pickerPosition: "bottom-left"
    });
    $(".form_datetime3").datetimepicker({
        format: "dd MM yyyy - hh:ii",
        autoclose: true,
        todayBtn: true,
        startDate: "2013-02-14 10:00",
        minuteStep: 10
    });
    $(".form_datetime4").datetimepicker({
        format: "dd MM yyyy - hh:ii",
        linkField: "mirror_field",
        linkFormat: "yyyy-mm-dd hh:ii"
    });
    $(".form_datetime5").datetimepicker({
        format: "dd MM yyyy - HH:ii P",
        showMeridian: true,
        autoclose: true,
        todayBtn: true
    });
    </script>
<!--touchspin-->
<script src="{{ asset('assets/vendors/touchspin/dist/jquery.bootstrap-touchspin.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/vendors/multiselect/js/bootstrap-multiselect.js') }}"></script>
<!--switch-->
<script src="{{ asset('assets/vendors/switch/dist/js/bootstrap-switch.js') }}"></script>
<script type="text/javascript">$("[name='my-checkbox']").bootstrapSwitch();</script>
<!--spinner-->
<script src="{{ asset('assets/vendors/spinner/dist/jquery.spinner.js') }}"></script>
<script type="text/javascript">
    $(function() {
        $('#customize-spinner').spinner('changed', function(e, newVal, oldVal) {
            $('#old-val').text(oldVal);
            $('#new-val').text(newVal);
        });
    })
</script>
<!-- modal  -->
<script src="{{ asset('assets/vendors/modal/js/classie.js') }}"></script>
<script src="{{ asset('assets/vendors/modal/js/modalEffects.js') }}"></script>
<!--
<script src="{{ asset('assets/vendors/x-editable/jquery.mockjax.js') }}"></script>
<script src="{{ asset('assets/vendors/x-editable/moment.min.js') }}"></script>
<script src="{{ asset('assets/vendors/x-editable/select2.js') }}"></script>
<script src="{{ asset('assets/vendors/x-editable/bootstrap-editable.js') }}"></script>
<script src="{{ asset('assets/vendors/x-editable/typeahead.js') }}"></script>
<script src="{{ asset('assets/vendors/x-editable/typeaheadjs.js') }}"></script>
<script src="{{ asset('assets/vendors/x-editable/address.js') }}"></script>
-->
<!-- begining of page level js -->
<!-- InputMask -->
<script src="{{ asset('assets/vendors/input-mask/jquery.inputmask.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/vendors/input-mask/jquery.inputmask.date.extensions.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/vendors/input-mask/jquery.inputmask.extensions.js') }}" type="text/javascript"></script>
<!-- date-range-picker -->
<script src="{{ asset('assets/vendors/daterangepicker/daterangepicker.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/vendors/select2/select2.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/vendors/iCheck/icheck.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/vendors/iCheck/demo/js/custom.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/vendors/autogrow/js/jQuery-autogrow.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/vendors/maxlength/bootstrap-maxlength.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/pages/formelements.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/custom.js') }}" type="text/javascript"></script>
</body>
</html>
