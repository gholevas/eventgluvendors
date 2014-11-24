<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>
        @section('title')
        | eventGL&uuml;
        @show
    </title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
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
    <!--end of page level css-->
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
                                        <a data-toggle="modal" data-href="#responsive" href="#responsive">New Quote</a>
                                    </li>
                                    <li>
                                        <i class="livicon success" data-n="users" data-s="20" data-c="white" data-hc="white"></i>
                                        <a data-toggle="modal" data-href="#responsive" href="#responsive">New Client</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
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
                    <li class="dropdown notifications-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="livicon" data-name="bell" data-loop="true" data-color="#7cc142" data-hovercolor="#e9573f" data-size="28"></i>
                            <span class="label label-danger">7</span>
                        </a>
                        <ul class=" notifications dropdown-menu">
                            <li class="dropdown-title">You have 7 notifications</li>
                            <li>
                                <!-- inner menu: contains the actual data -->
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
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img data-src="holder.js/35x35/#fff:#000" width="35" class="img-circle img-responsive pull-left" height="35" alt="riot">
                            <div class="riot">
                                <div>
                                    {{ Sentry::getUser()->first_name }} {{ Sentry::getUser()->last_name }}
                                    <span>
                                        <i class="caret"></i>
                                    </span>
                                </div>
                            </div>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header bg-light-blue">
                                <img data-src="holder.js/90x90/#fff:#000" class="img-responsive img-circle" alt="User Image">
                                <p class="topprofiletext">{{ Sentry::getUser()->first_name }} {{ Sentry::getUser()->last_name }}</p>
                            </li>
                            <!-- Menu Body -->
                            <li>
                                <a href="#">
                                    <i class="livicon" data-name="user" data-s="18"></i>
                                    My Profile
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
<!--- responsive model -->
    <div class="modal fade in" id="newEvent" tabindex="-1" role="dialog" aria-hidden="false" style="display:none;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">New Event</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Event Name</label>
                                <input id="name" name="name" type="text" placeholder="ex. Maria's Sweet 16" class="form-control">
                                <br>
                                <label>Date and Time</label>
                                <div class="input-group date form_datetime5 col-md-12" data-date="2012-12-21T15:25:00Z" data-date-format="dd MM yyyy - HH:ii p" data-link-field="dtp_input1">
                                    <input size="16" type="text" value="" class="form-control" readonly>
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-remove"></span>
                                    </span>
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-th"></span>
                                    </span>
                            </div>
                         <div class="form-group">
                         <br>
                            <label>Event Duration</label>
                            <div class="form-group">
                                <input id="duration" type="text" value="4" name="duration" class="form-control">
                            </div>
                            
                            <label>Guests</label>
                            <br>
                            <div class="form-group col-md-6">
                                <input id="adults" type="text" value="50" name="adults" class="form-control">
                            </div>
                            
                            <div class="form-group col-md-6">
                                <input id="kids" type="text" value="50" name="kids" class="form-control">
                            </div>
                        </div>

                        </div>
                            
                        </div>
                        <div class="col-md-6">


                            <div class="form-group">
                                <label>Client Name</label>
                                <input id="name" name="name" type="text" placeholder="ex. Angela Smith" class="form-control">
                                <br>
                                <label>Client Phone</label>
                                <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-phone"></i>
                                </div>
                                <input type="text" class="form-control" data-inputmask='"mask": "(999) 999-9999"' data-mask/>
                            </div><br>
                            <label>Client Email</label>
                                <input id="email" name="email" type="text" placeholder="ex. angela@gmail.com" class="form-control">
                                

                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn">Cancel</button>
                    <a type="button" href="eventdetail.html" class="btn btn-primary">Create New Event</a>
                </div>
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
                        <li {{ (Request::is('admin/new_quote') ? 'class="active"' : '') }}>
                            <a href="{{ URL::to('admin/new_quote') }}">
                                <i class="livicon" data-name="magic" data-size="18" data-c="#7cc142" data-hc="#7cc142" data-loop="true"></i>
                                <span class="title">New Quote</span>
                            </a>
                    
                        </li>
                        <li {{ (Request::is('admin/mail_box') || Request::is('admin/compose') || Request::is('admin/sent') || Request::is('admin/trash') || Request::is('admin/spam') || Request::is('admin/draft') ? 'class="active"' : '') }}>
                            <a href="{{ URL::to('admin/mail_box') }}">
                                <i class="livicon" data-name="mail" data-c="#7cc142" data-hc="#7cc142" data-size="18" data-loop="true"></i>
                                <span class="title">Inbox</span>
                                <span class="badge badge-danger">10</span>
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
                                    <a href="{{ URL::to('admin/upcoming_events') }}">
                                        <i class="fa fa-angle-double-right"></i>
                                        Upcoming Events
                                    </a>
                                </li>
                                <li {{ (Request::is('admin/leads') ? 'class="active"' : '') }}>
                                    <a href="{{ URL::to('admin/leads') }}">
                                        <i class="fa fa-angle-double-right"></i>
                                        Leads
                                    </a>
                                </li>
                                <li {{ (Request::is('admin/past_events') ? 'class="active"' : '') }}>
                                    <a href="{{ URL::to('admin/past_events') }}">
                                        <i class="fa fa-angle-double-right"></i>
                                        Past Events
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li {{ (Request::is('admin/manage_venue_details') || Request::is('admin/manage_rooms') || Request::is('admin/manage_images') || Request::is('admin/manage_menus') ? 'class="active"' : '') }}>
                            <a href="#">
                                <i class="livicon" data-name="pen" data-c="#7cc142" data-hc="#7cc142" data-size="18" data-loop="true"></i>
                                <span class="title">Manage Listing</span>
                                <span class="fa arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li {{ (Request::is('admin/manage_venue_details') ? 'class="active"' : '') }}>
                                    <a href="{{ URL::to('admin/manage_venue_details') }}">
                                        <i class="fa fa-angle-double-right"></i>
                                        Manage Venue Details
                                    </a>
                                </li>
                                <li {{ (Request::is('admin/manage_rooms') ? 'class="active"' : '') }}>
                                    <a href="{{ URL::to('admin/manage_rooms') }}">
                                        <i class="fa fa-angle-double-right"></i>
                                        Manage Rooms
                                    </a>
                                </li>
                                <li {{ (Request::is('admin/manage_images') ? 'class="active"' : '') }}>
                                    <a href="{{ URL::to('admin/manage_images') }}">
                                        <i class="fa fa-angle-double-right"></i>
                                        Manage Images
                                    </a>
                                </li>
                                <li {{ (Request::is('admin/manage_menus') ? 'class="active"' : '') }}>
                                    <a href="{{ URL::to('admin/manage_menus') }}">
                                        <i class="fa fa-angle-double-right"></i>
                                        Manage Menus/Prices
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li {{ (Request::is('admin/calendar') ? 'class="active"' : '') }}>
                            <a href="#">
                                <i class="livicon" data-name="inbox" data-c="#7cc142" data-hc="#7cc142" data-size="18" data-loop="true"></i>
                                <span class="title">Manage Calendars</span>
                                <span class="fa arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li {{ (Request::is('admin/calendar') ? 'class="active"' : '') }}>
                                    <a href="{{ URL::to('admin/calendar') }}">
                                        <i class="fa fa-angle-double-right"></i>
                                        Room 1 Name
                                    </a>
                                </li>
                                <li {{ (Request::is('admin/calendar') ? 'class="active"' : '') }}>
                                    <a href="{{ URL::to('admin/calendar') }}">
                                        <i class="fa fa-angle-double-right"></i>
                                        Room 2 Name
                                    </a>
                                </li>
                                <li {{ (Request::is('admin/calendar') ? 'class="active"' : '') }}>
                                    <a href="{{ URL::to('admin/calendar') }}">
                                        <i class="fa fa-angle-double-right"></i>
                                        Room 3 Name
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li {{ (Request::is('admin/analytics') ? 'class="active"' : '') }}>
                            <a href="{{ URL::to('admin/analytics') }}">
                                <i class="livicon" data-c="#7cc142" data-hc="#7cc142" data-name="barchart" data-size="18" data-loop="true"></i>
                                Analytics
                            </a>
                        </li>
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
<script>
    $("input[name='demo1']").TouchSpin({
        min: 0,
        max: 100,
        step: 0.1,
        decimals: 2,
        boostat: 5,
        maxboostedstep: 10,
        postfix: '%'
    });

    $("input[name='demo2']").TouchSpin({
        min: -1000000000,
        max: 1000000000,
        stepinterval: 50,
        maxboostedstep: 10000000,
        prefix: '$'
    });

    $("input[name='demo_vertical']").TouchSpin({
        verticalbuttons: true
    });

    $("input[name='demo_vertical2']").TouchSpin({
        verticalbuttons: true,
        verticalupclass: 'glyphicon glyphicon-plus',
        verticaldownclass: 'glyphicon glyphicon-minus'
    });

    $("input[name='demo3']").TouchSpin();

    $("input[name='demo3_21']").TouchSpin({
        initval: 40
    });

    $("input[name='demo3_22']").TouchSpin({
        initval: 40
    });

    $("input[name='demo4']").TouchSpin({
        postfix: "a button",
        postfix_extraclass: "btn btn-default"
    });

    $("input[name='demo4_2']").TouchSpin({
        postfix: "a button",
        postfix_extraclass: "btn btn-default"
    });

    $("input[name='demo5']").TouchSpin({
        prefix: "pre",
        postfix: "post"
    });

    $("input[name='demo6']").TouchSpin({
        buttondown_class: "btn btn-link",
        buttonup_class: "btn btn-link"
    });
    </script>
<script type="text/javascript" src="{{ asset('assets/vendors/multiselect/js/bootstrap-multiselect.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.multiselect').multiselect();
        $('#example2').multiselect();
        $('#example27').multiselect({
            includeSelectAllOption: true
        });

        // Add options for example 28.
        for (var i = 1; i <= 100; i++) {
            $('#example28').append('<option value="' + i + '">' + i + '</option>');
        }

        $('#example28').multiselect({
            includeSelectAllOption: true,
            enableFiltering: true,
            maxHeight: 150
        });

        $('#example28-values').on('click', function() {
            var values = [];

            $('option:selected', $('#example28')).each(function() {
                values.push($(this).val());
            });

            alert(values);
        })

        $('#example3').multiselect({
            buttonClass: 'btn btn-link'
        });
        $('#example6').multiselect();

        $('#example9').multiselect({
            onChange: function(element, checked) {
                alert('Change event invoked!');
                console.log(element);
            }
        });

        $('#example13').multiselect();

        $('#example19').multiselect();

        $('#example35').multiselect();
        $('#example35-enable').on('click', function() {
            $('#example35').multiselect('enable');
        });
        $('#example35-disable').on('click', function() {
            $('#example35').multiselect('disable');
        });
    });
    </script>
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
</body>
</html>