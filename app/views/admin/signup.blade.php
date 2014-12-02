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
        <!--page level css -->
    <link href="css/pages/form_layouts.css" rel="stylesheet" type="text/css"/>
    <!--end of page level css-->
    <link href="{{ asset('assets/css/pages/form_layouts.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('assets/vendors/wizard/acc-wizard-master/css/acc-wizard.min.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/css/pages/accordionformwizard.css') }}" rel="stylesheet" />
	<link href="{{ asset('assets/vendors/dropzone-master/downloads/css/dropzone.css') }}" rel="stylesheet" />




</head>

<body onload="initialize()" class="skin-josh">
    <header class="header" id="HEADER_1">
        <a href="{{ URL::to('admin/index') }}" class="logo">
            <img src="{{ asset('assets/img/logo.png') }}" alt="logo">
        </a>
        <nav id="HEADER_1" class="navbar navbar-static-top" role="navigation">
           
            <div class="navbar-right">
                <ul class="nav navbar-nav">
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
<!--     main content-->
 
   <div class="row">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                <i class="livicon" data-name="gear" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                                Venue Signup
                            </h3>
                            
                        </div>
                        <div class="panel-body">
                            <div class="row acc-wizard">
                                <div class="col-md-3" style="padding-left: 2em;">
                                    <p style="margin-bottom: 2em;">
                                        Follow the steps below to begin using the eventGL&uuml; management suite.
                                    </p>
                                    <ol class="acc-wizard-sidebar">
                                        <li class="acc-wizard-todo acc-wizard-active">
                                            <a href="#prerequisites">Venue Details</a>
                                        </li>
                                        <li class="acc-wizard-todo">
                                            <a href="#addwizard">Rooms</a>
                                        </li>
                                        <li class="acc-wizard-todo">
                                            <a href="#adjusthtml">Images</a>
                                        </li>
                                        <li class="acc-wizard-todo">
                                            <a href="#viewpage">Menus/Pricing</a>
                                        </li>
                                    </ol>
                                </div>
                                <div class="col-md-9" style="padding-right: 2em;">
                                    <div id="accordion-demo" class="panel-group">
                                        <div class="panel panel-success">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a href="#prerequisites" data-parent="#accordion-demo" data-toggle="collapse">Venue Details</a>
                                                </h4>
                                            </div>
                                            <div id="prerequisites" class="panel-collapse collapse in">
                                                <div class="panel-body">
                                                    <form id="form-prerequisites">
                                                       
                                            <div class="form-group">
                                            
                                            <label for="validate-text">Venue Name</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="validate-text" id="validate-text" placeholder="Enter Venue Name" required>
                                                <span class="input-group-addon danger">
                                                    <span class="glyphicon glyphicon-remove"></span>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            
                                            <label for="validate-text">Venue Address</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="validate-text" id="validate-text" placeholder="Enter Venue Address" required>
                                                <span class="input-group-addon danger">
                                                    <span class="glyphicon glyphicon-remove"></span>
                                                </span>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="validate-select">Venue Type</label>
                                            <div class="input-group">
                                                <select class="form-control" name="validate-select" id="validate-select" required>
                                                    <option value="">Select an item</option>
                                                    <option value="item_1">Gallery</option>
                                                    <option value="item_2">Residential</option>
                                                    <option value="item_3">Conference Center</option>
                                                    <option value="item_3">Bar</option>
                                                    <option value="item_3">Restaurant</option>
                                                    <option value="item_3">Club/Lounge</option>
                                                    <option value="item_3">Hotel</option>
                                                    <option value="item_3">Warehouse</option>
                                                    <option value="item_3">Loft</option>
                                                    <option value="item_3">Meeting Space</option>
                                                    <option value="item_3">Studio</option>
                                                    <option value="item_3">Theatre</option>
                                                    <option value="item_3">Country Club</option>
                                                    <option value="item_3">Cafe</option>
                                                    <option value="item_3">Other</option>
                                                </select>
                                                <span class="input-group-addon danger">
                                                    <span class="glyphicon glyphicon-remove"></span>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="validate-length">Short Description</label>
                                            <div class="input-group" data-validate="length" data-length="5">
                                                <input type="text" class="form-control" maxlength="80" name="alloptions" id="alloptions" placeholder="Maximum length 80 characters" required>
                                                <span class="input-group-addon danger">
                                                    <span class="glyphicon glyphicon-remove"></span>
                                                </span>
                                            </div>
                                        </div>


                                    <div class="form-group">
                                    <label >Long Description</label>
                                    <div class="input-group">
                                        <textarea placeholder="Write something here..." class="form-control" data-autogrow rows="3" cols="80"></textarea>
                                    </div>
                                    <!-- /.input group -->
                                </div>



                                                        <div class="acc-wizard-step"></div>
                                                    </form>
                                                </div>
                                                <!--/.panel-body -->
                                            </div>
                                            <!-- /#prerequisites -->
                                        </div>
                                        <!-- /.panel.panel-default -->

                                        <div class="panel panel-success">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a href="#addwizard" data-parent="#accordion-demo" data-toggle="collapse">Rooms</a>
                                                </h4>
                                            </div>
                                            <div id="addwizard" class="panel-collapse collapse" style="height: 36.400001525878906px;">
                                                <div class="panel-body">
                                                    <form id="form-addwizard">
                                                        <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-success">
                                <div class="panel-heading">
                                    <h3 class="panel-title">
                                        <i class="livicon" data-name="wrench" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                                        Room 1
                                    </h3>
                                    <span class="pull-right clickable">
                                        <i class="glyphicon glyphicon-chevron-up"></i>
                                    </span>
                                </div>
                                <div class="panel-body">
                                    <form method="post">
                                        <div class="form-group">
                                            
                                            <label for="validate-text">Room Name</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="validate-text" id="validate-text" placeholder="Enter Venue Name" required>
                                                <span class="input-group-addon danger">
                                                    <span class="glyphicon glyphicon-remove"></span>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="validate-number">Max Seated</label>
                                            <div class="input-group" data-validate="number">
                                                <input type="text" class="form-control" name="validate-number" id="validate-number" placeholder="Validate Number" required>
                                                <span class="input-group-addon danger">
                                                    <span class="glyphicon glyphicon-remove"></span>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="validate-number">Max Standing</label>
                                            <div class="input-group" data-validate="number">
                                                <input type="text" class="form-control" name="validate-number" id="validate-number" placeholder="Validate Number" required>
                                                <span class="input-group-addon danger">
                                                    <span class="glyphicon glyphicon-remove"></span>
                                                </span>
                                            </div>
                                        </div>
                                   
                                  


                                        <div class="form-group">
                                            <label for="validate-length">Short Description</label>
                                            <div class="input-group" data-validate="length" data-length="5">
                                                <input type="text" class="form-control" maxlength="80" name="alloptions" id="alloptions" placeholder="Maximum length 80 characters" required>
                                                <span class="input-group-addon danger">
                                                    <span class="glyphicon glyphicon-remove"></span>
                                                </span>
                                            </div>
                                        </div>
                                        
                                    </form>

                                </div>

                            </div>
                        <!-- First Basic Table strats here-->
                       <br> <a href="#" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Add a Room</a>
                    </div>
                </div>


                                                        <div class="acc-wizard-step"></div>
                                                    </form>
                                                </div>
                                                <!--/.panel-body -->
                                            </div>
                                            <!-- /#addwizard -->
                                        </div>
                                        <!-- /.panel.panel-default -->
                                        <div class="panel panel-success">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a href="#adjusthtml" data-parent="#accordion-demo" data-toggle="collapse">Images</a>
                                                </h4>
                                            </div>
                                            <div id="adjusthtml" class="panel-collapse collapse" style="height: 36.400001525878906px;">
                                                <div class="panel-body">
                                                    <form id="form-adjusthtml">
                                                        

<div class="panel-body" style="padding:0px !important;">
                                <div class="col-md-12" style="padding:30px; float:center;">
                                    <div action="target" class="dropzone" id="myDropzone">
                                        <div class="fallback">
                                            <input name="file" type="file" multiple />
                                        </div>
                                    </div>
                                </div>
                            </div>

                                                





                                                        <div class="acc-wizard-step"></div>
                                                    </form>
                                                </div>
                                                <!--/.panel-body -->
                                            </div>
                                            <!-- /#adjusthtml -->
                                        </div>
                                        <!-- /.panel.panel-default -->
                                        <div class="panel panel-success">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a href="#viewpage" data-parent="#accordion-demo" data-toggle="collapse">Menus/Pricing</a>
                                                </h4>
                                            </div>
                                            <div id="viewpage" class="panel-collapse collapse" style="height: 36.400001525878906px;">
                                                <div class="panel-body">
                                                    <form id="form-viewpage">
                                                      

<div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-success">
                                <div class="panel-heading">
                                    <h3 class="panel-title">
                                        <i class="livicon" data-name="wrench" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                                        Menu 1
                                    </h3>
                                    <span class="pull-right clickable">
                                        <i class="glyphicon glyphicon-chevron-up"></i>
                                    </span>
                                </div>
                                <div class="panel-body">
                                    <form method="post">
                                        <div class="form-group">
                                            
                                            <label for="validate-text">Menu Name</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="validate-text" id="validate-text" placeholder="Enter Venue Name" required>
                                                <span class="input-group-addon danger">
                                                    <span class="glyphicon glyphicon-remove"></span>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="validate-number">Menu Price ($ per person)</label>
                                            <div class="input-group" data-validate="number">
                                                <input type="text" class="form-control" name="validate-number" id="validate-number" placeholder="Validate Number" required>
                                                <span class="input-group-addon danger">
                                                    <span class="glyphicon glyphicon-remove"></span>
                                                </span>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        <!-- First Basic Table strats here-->
                       <br> <a href="#" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Add a Menu</a>

                    </div>

                </div>






                                                        <div class="acc-wizard-step"></div>
                                                    </form>
                                                </div>
                                                <!--/.panel-body -->
                                            </div>
                                            <!-- /#adjusthtml -->
                                        </div>
                                        <!-- /.panel.panel-default -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--main content ends-->

	
	
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
        min: .5,
        max: 100,
        step: .1,
        decimals: 1,
        boostat: 2,
        maxboostedstep: 5,
        postfix: '%'
    });
    $("input[name='adults']").TouchSpin({
        min: 1,
        max: 500,
        step: 1,
        decimals: 0,
        boostat: 5,
        maxboostedstep: 50,
        postfix: 'adults'
    });
    $("input[name='kids']").TouchSpin({
        min: 1,
        max: 500,
        step: 1,
        decimals: 0,
        boostat: 5,
        maxboostedstep: 50,
        postfix: 'kids'
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
<!-- modal  -->
<script src="{{ asset('assets/vendors/modal/js/classie.js') }}"></script>
<script src="{{ asset('assets/vendors/modal/js/modalEffects.js') }}"></script>

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
<script src="{{ asset('assets/vendors/wizard/acc-wizard-master/js/acc-wizard.min.js') }}"></script>
<script src="{{ asset('assets/js/pages/accordionformwizard.js') }}" type="text/javascript"></script>
<script type="text/javascript" src="{{ asset('assets/vendors/dropzone-master/downloads/dropzone.js') }}"></script>
<script>
    var FormDropzone = function() {
        return {
            //main function to initiate the module
            init: function() {

                Dropzone.options.myDropzone = {
                    init: function() {
                        this.on("addedfile", function(file) {
                            // Create the remove button
                            var removeButton = Dropzone.createElement("<button>Remove file</button>");

                            // Capture the Dropzone instance as closure.
                            var _this = this;

                            // Listen to the click event
                            removeButton.addEventListener("click", function(e) {
                                // Make sure the button click doesn't submit the form:
                                e.preventDefault();
                                e.stopPropagation();

                                // Remove the file preview.
                                _this.removeFile(file);
                                // If you want to the delete the file on the server as well,
                                // you can do the AJAX request here.
                            });

                            // Add the button to the file preview element.
                            file.previewElement.appendChild(removeButton);
                        });
                    }
                }
            }
        };
    }();
    jQuery(document).ready(function() {

        FormDropzone.init();
    });
    </script>
</body>
</html>