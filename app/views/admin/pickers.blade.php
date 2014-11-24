@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
Pickers
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
<!--page level css -->
<link href="{{ asset('assets/vendors/clockface/css/clockface.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/vendors/colorpicker/css/colorpicker.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/vendors/timepicker/css/bootstrap-timepicker.min.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/vendors/datetimepicker/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet" media="screen" />
<link href="{{ asset('assets/vendors/touchspin/dist/jquery.bootstrap-touchspin.css') }}" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" href="{{ asset('assets/vendors/multiselect/css/bootstrap-multiselect.css') }}" type="text/css" />
<link href="{{ asset('assets/vendors/switch/dist/css/bootstrap3/bootstrap-switch.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/vendors/spinner/dist/bootstrap-spinner.css') }}" rel="stylesheet" />
<!--end of page level css-->
@stop


{{-- Page content --}}
@section('content')
<section class="content-header">
    <!--section starts-->
    <h1>
        Pickers
        <small></small>
    </h1>
    <ol class="breadcrumb">
        <li>
            <a href="index"> <i class="livicon" data-name="home" data-size="14" data-loop="true"></i>
                Home
            </a>
        </li>
        <li>
            <a href="#">UI Components</a>
        </li>
        <li class="active">Pickers</li>
    </ol>
</section>
<!--section ends-->
<section class="content">
    <!--main content-->
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title"> <i class="livicon" data-name="camcoder" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                        Color Picker
                    </h3>
                    <span class="pull-right clickable">
                        <i class="glyphicon glyphicon-chevron-up"></i>
                    </span>
                </div>
                <div class="panel-body">
                    <div class="box-body">
                        <!-- Color Picker -->
                        <div class="form-group">
                            <label>Default</label>
                            <input type="text" class="form-control my-colorpicker1" value="#8fff00" id="cp1"></div>
                        <!-- /.form group -->
                        <!-- Color Picker -->
                        <div class="form-group">
                            <label>Color picker with RGB notation</label>
                            <input type="text" class="form-control my-colorpicker2" value="rgb(0,194,255,0.78)" id="cp2" data-color-format="rgba"></div>
                        <!-- /.form group -->
                        <!-- Color Picker -->
                        <div class="form-group">
                            <label>Color picker with addon</label>
                            <div class="input-group">
                                <div class="input-group my-colorpicker3" data-color="rgb(255, 146, 180)" data-color-format="rgb" id="cp3">
                                    <input type="text" class="form-control" value="#428BCA">
                                    <span class="input-group-addon">
                                        <i class="fa fa-eye"></i>
                                    </span>
                                </div>
                            </div>
                            <!-- /.input group --> </div>
                        <!-- /.form group --> </div>
                    <!-- /.box-body --> </div>
            </div>
            <!--time picker-->
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="livicon" data-name="spinner-one" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                        Time Picker
                    </h3>
                    <span class="pull-right clickable">
                        <i class="glyphicon glyphicon-chevron-up"></i>
                    </span>
                </div>
                <div class="panel-body">
                    <div class="box-body">
                        <!-- Time Picker -->
                        <div class="form-group">
                            <label>Default</label>
                            <input id="timepicker1" type="text" class="input-small form-control">
                            <span class="add-on">
                                <i class="icon-time"></i>
                            </span>
                        </div>
                        <!-- /.form group -->
                        <!-- time Picker -->
                        <div class="bootstrap-timepicker">
                            <div class="form-group">
                                <label>Time picker:</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="timepicker3" readonly />
                                    <div class="input-group-addon">
                                        <i class="fa fa-clock-o"></i>
                                    </div>
                                </div>
                                <!-- /.input group --> </div>
                            <!-- /.form group --> </div>
                    </div>
                    <!-- /.box-body --> </div>
            </div>
            <!--time picker ends-->
            <!--time picker-->
            <div class="panel panel-danger">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="livicon" data-name="cloud-snow" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                        Bootstrap TouchSpin
                    </h3>
                    <span class="pull-right clickable">
                        <i class="glyphicon glyphicon-chevron-up"></i>
                    </span>
                </div>
                <div class="panel-body">
                    <div class="box-body">
                        <!-- Touch spin -->
                        <div class="form-group">
                            <label>Postfix</label>
                            <input id="demo1" type="text" value="55" name="demo1" class="form-control"></div>
                        <!-- /.form group -->
                        <!-- Touch spin -->
                        <div class="form-group">
                            <label>Prefix</label>
                            <div class="form-group">
                                <input id="demo2" type="text" value="0" name="demo2" class="form-control"></div>
                        </div>
                        <!-- /.form group -->
                        <!-- Touch spin -->
                        <div class="form-group">
                            <label>Vertical button alignment</label>
                            <div class="form-group">
                                <input id="demo_vertical" type="text" value="" name="demo_vertical"></div>
                        </div>
                        <!-- /.form group -->
                        <!-- Touch spin -->
                        <div class="form-group">
                            <label>Vertical buttons with custom icons</label>
                            <div class="form-group">
                                <input id="demo_vertical2" type="text" value="" name="demo_vertical2"></div>
                        </div>
                        <!-- /.form group -->
                        <!-- Touch spin -->
                        <div class="form-group">
                            <label>Init with empty value</label>
                            <div class="form-group">
                                <input id="demo3" type="text" value="" name="demo3"></div>
                        </div>
                        <!-- /.form group -->
                        <!-- Touch spin -->
                        <div class="form-group">
                            <label>Value attribute is not set (applying settings.initval)</label>
                            <div class="form-group">
                                <input id="demo3_21" type="text" value="" name="demo3_21"></div>
                        </div>
                        <!-- /.form group -->

                        <!-- Touch spin -->
                        <div class="form-group">
                            <label>Button postfix (small)</label>
                            <div class="form-group">
                                <input id="demo4" type="text" value="" name="demo4" class="input-sm"></div>
                        </div>
                        <!-- /.form group -->

                        <!-- Touch spin -->
                        <div class="form-group">
                            <label>Button postfix (large)</label>
                            <div class="form-group">
                                <input id="demo4_2" type="text" value="" name="demo4_2" class="form-control input-lg"></div>
                        </div>
                        <!-- /.form group -->

                        <!-- Touch spin -->
                        <div class="form-group">
                            <label>Button group</label>
                            <div class="form-group">
                                <div class="input-group">
                                    <input id="demo5" type="text" class="form-control" name="demo5" value="50"></div>
                            </div>
                        </div>
                        <!-- /.form group -->
                        <!-- Touch spin -->
                        <div class="form-group">
                            <label>Change button class:</label>
                            <div class="form-group">
                                <input id="demo6" type="text" value="50" name="demo6"></div>
                        </div>
                        <!-- /.form group --> </div>
                    <!-- /.box-body --> </div>
            </div>
            <!--time picker ends-->
            <!--Switch-->
            <div class="panel panel-danger">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="livicon" data-name="magnet" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                        Bootstrap Switch
                    </h3>
                    <span class="pull-right clickable">
                        <i class="glyphicon glyphicon-chevron-up"></i>
                    </span>
                </div>
                <div class="panel-body">
                    <!--switch -->
                    <div class="form-group">
                        <label>Default Sizes</label>
                        <div class="form-group">
                            <input type="checkbox" name="my-checkbox" data-size="mini" checked>
                            <input type="checkbox" name="my-checkbox" data-size="small" checked>
                            <input type="checkbox" name="my-checkbox" data-size="normal" checked>
                            <input type="checkbox" name="my-checkbox" data-size="large"></div>
                    </div>
                    <!-- /.form group -->
                    <!--switch -->
                    <div class="form-group">
                        <label>Color Switch</label>
                        <div class="form-group">
                            <input type="checkbox" name="my-checkbox" checked data-on-color="primary" data-off-color="info">
                            <input type="checkbox" name="my-checkbox" checked data-on-color="success" data-off-color="warning">
                            <input type="checkbox" name="my-checkbox" checked data-on-color="warning" data-off-color="danger"></div>
                    </div>
                    <!-- /.form group -->
                    <!--switch -->
                    <div class="form-group">
                        <label>Animate</label>
                        <div class="form-group">
                            <input type="checkbox" name="my-checkbox" data-on-color="info" data-off-color="primary" data-animate>
                            <input type="checkbox" name="my-checkbox" checked data-on-color="danger" data-off-color="warning" data-animate>
                            <input type="checkbox" name="my-checkbox" checked data-on-color="warning" data-off-color="success" data-animate></div>
                    </div>
                    <!-- /.form group -->
                    <!--switch -->
                    <div class="form-group">
                        <label>Disabled / Readonly</label>
                        <div class="form-group">
                            <input type="checkbox" checked disabled name="my-checkbox" />
                            <input type="checkbox" name="my-checkbox" />
                        </div>
                    </div>
                    <!-- /.form group --> </div>
            </div>
            <!--Spinners-->
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="livicon" data-name="rocket" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                        General Pickers
                    </h3>
                    <span class="pull-right clickable">
                        <i class="glyphicon glyphicon-chevron-up"></i>
                    </span>
                </div>
                <div class="panel-body">
                    <!--switch -->
                    <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="spinners">
                            <label>Quality</label>
                            <div class="input-append spinner" data-trigger="spinner">
                                <input type="text" value="1" data-rule="quantity">
                                <div class="add-on">
                                    <a href="javascript:;" class="spin-up" data-spin="up">
                                        <i class="glyphicon glyphicon-chevron-up"></i>
                                    </a>
                                    <a href="javascript:;" class="spin-down" data-spin="down">
                                        <i class="glyphicon glyphicon-chevron-down"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--switch-->
                    <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="spinners">
                            <label>Currency</label>
                            <div class="input-append spinner" data-trigger="spinner">
                                <input type="text" value="1" data-rule="currency">
                                <div class="add-on">
                                    <a href="javascript:;" class="spin-up" data-spin="up">
                                        <i class="glyphicon glyphicon-chevron-up"></i>
                                    </a>
                                    <a href="javascript:;" class="spin-down" data-spin="down">
                                        <i class="glyphicon glyphicon-chevron-down"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--switch-->
                    <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="spinners">
                            <label>Percent:</label>
                            <div class="input-append spinner" data-trigger="spinner">
                                <input type="text" value="1" data-rule="percent">
                                <div class="add-on">
                                    <a href="javascript:;" class="spin-up" data-spin="up">
                                        <i class="glyphicon glyphicon-chevron-up"></i>
                                    </a>
                                    <a href="javascript:;" class="spin-down" data-spin="down">
                                        <i class="glyphicon glyphicon-chevron-down"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--switch-->
                    <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="spinners">
                            <label>Customize</label>
                            <div class="input-append spinner" data-trigger="spinner" id="customize-spinner">
                                <input type="text" value="0" data-max="200" data-min="0" data-step="2">
                                <div class="add-on">
                                    <a href="javascript:;" class="spin-up" data-spin="up">
                                        <i class="glyphicon glyphicon-chevron-up"></i>
                                    </a>
                                    <a href="javascript:;" class="spin-down" data-spin="down">
                                        <i class="glyphicon glyphicon-chevron-down"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <p>Event handler: changed</p>
                        <p>
                            Old =
                            <span id="old-val"></span>
                            , New =
                            <span id="new-val"></span>
                        </p>
                    </div>
                    <!--switch -->
                    <div class="spinners">
                        <div class="form-group">
                            <label>Disabled</label>
                            <div class="form-group">
                                <div class="input-append spinner" data-trigger="spinner" id="customize-spinner1">
                                    <input type="text" value="100" data-max="200" data-min="0" data-step="1" disabled="disabled">
                                    <div class="add-on">
                                        <a href="javascript:;" class="spin-up" data-spin="up">
                                            <i class="glyphicon glyphicon-chevron-up"></i>
                                        </a>
                                        <a href="javascript:;" class="spin-down" data-spin="down">
                                            <i class="glyphicon glyphicon-chevron-down"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.form group --> </div>
                </div>
            </div>
        </div>
        <!--col-md-6 ends-->
        <div class="col-md-6">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="livicon" data-name="clock" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                        Clock Face Picker
                    </h3>
                    <span class="pull-right clickable">
                        <i class="glyphicon glyphicon-chevron-up"></i>
                    </span>
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <label for="t1" class="control-label">Default clock</label>
                        <input id="t1" class="form-control input-small" value="2:30 PM" data-format="hh:mm A" type="text"></div>
                    <div class="form-group">
                        <label for="t2" class="control-label">Button</label>
                        <div class="input-group">
                            <input type="text" class="form-control input-small" id="t2" value="14:30" readonly>
                            <span class="input-group-btn">
                                <button class="btn" type="button" id="toggle-btn">
                                    <i class="fa fa-clock-o"></i>
                                </button>
                            </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <h4> <b>Inline</b>
                        </h4>
                        <div id="t3" class="well well-sm" style="padding-left:30%"></div>
                    </div>
                </div>
            </div>
            <!--date picker-->
            <div class="panel panel-warning">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="livicon" data-name="alarm" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                        Date Picker
                    </h3>
                    <span class="pull-right clickable">
                        <i class="glyphicon glyphicon-chevron-up"></i>
                    </span>
                </div>
                <div class="panel-body">
                    <div class="box-body">
                        <!-- date Picker -->
                        <div class="form-group">
                            <label>Default</label>
                            <div class="input-group date form_datetime col-md-8" data-date="1979-09-16T05:25:07Z" data-date-format="dd MM yyyy - HH:ii p" data-link-field="dtp_input1">
                                <input class="form-control" size="16" type="text" value="" readonly>
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-th"></span>
                                </span>
                            </div>
                        </div>
                        <!-- /.form group -->
                        <div class="form-group">
                            <label>Date time picker:</label>
                            <div class="input-group date form_datetime0 col-md-8" data-date="2012-12-21T15:25:00Z" data-date-format="dd MM yyyy - HH:ii p" data-link-field="dtp_input1">
                                <input size="16" type="text" value="" readonly class="form-control">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-th"></span>
                                </span>
                            </div>
                        </div>
                        <!-- /.form group -->
                        <div class="form-group">
                            <label>Positionning</label>
                            <div class="input-group date form_datetime2 col-md-8" data-date="2012-12-21T15:25:00Z" data-date-format="dd MM yyyy - HH:ii p" data-link-field="dtp_input1">
                                <input size="16" type="text" value="" readonly class="form-control">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-th"></span>
                                </span>
                            </div>
                        </div>
                        <!-- /.form group -->
                        <div class="form-group">
                            <label>Advanced Time picker</label>
                            <div class="input-group date form_datetime3 col-md-8" data-date="2012-12-21T15:25:00Z" data-date-format="dd MM yyyy - HH:ii p" data-link-field="dtp_input1">
                                <input class="form-control" size="16" type="text" value="" readonly>
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-remove"></span>
                                </span>
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-th"></span>
                                </span>
                            </div>
                        </div>
                        <!-- /.form group -->
                        <!-- date Picker -->
                        <div class="form-group">
                            <label>Mirror field</label>
                            <div class="input-group date form_datetime4 col-md-8" data-date="2012-12-21T15:25:00Z" data-date-format="dd MM yyyy - HH:ii p" data-link-field="dtp_input1">
                                <input size="16" type="text" value="" class="form-control" readonly>
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-remove"></span>
                                </span>
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-th"></span>
                                </span>
                            </div>
                            <input type="text" id="mirror_field" value="" class="col-md-8" readonly />
                        </div>
                        <!-- /.form group -->
                        <br/>
                        <!-- date Picker -->
                        <div class="form-group">
                            <label>Meridian format</label>
                            <div class="input-group date form_datetime5 col-md-8" data-date="2012-12-21T15:25:00Z" data-date-format="dd MM yyyy - HH:ii p" data-link-field="dtp_input1">
                                <input size="16" type="text" value="" class="form-control" readonly>
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-remove"></span>
                                </span>
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-th"></span>
                                </span>
                            </div>
                        </div>
                        <!-- /.form group --> </div>
                    <!-- /.box-body --> </div>
            </div>
            <!--multi select-->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="livicon" data-name="balance" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                        Multiselect
                    </h3>
                    <span class="pull-right clickable">
                        <i class="glyphicon glyphicon-chevron-up"></i>
                    </span>
                </div>
                <div class="panel-body">
                    <div class="form-group col-md-6 col-xs-12">
                        <label>Normal Select</label>
                        <div class="input-group  col-md-8">
                            <select class="multiselect" multiple="multiple">
                                <option value="cheese">Cheese</option>
                                <option value="tomatoes">Tomatoes</option>
                                <option value="mozarella">Mozzarella</option>
                                <option value="mushrooms">Mushrooms</option>
                                <option value="pepperoni">Pepperoni</option>
                                <option value="onions">Onions</option>
                            </select>
                        </div>
                    </div>
                    <!-- /.form group -->
                    <div class="form-group col-md-6 col-xs-12">
                        <label>preselected</label>
                        <div class="input-group  col-md-8">
                            <select id="example2" multiple="multiple">
                                <option value="cheese" selected>Cheese</option>
                                <option value="tomatoes" selected>Tomatoes</option>
                                <option value="mozarella" selected>Mozzarella</option>
                                <option value="mushrooms">Mushrooms</option>
                                <option value="pepperoni">Pepperoni</option>
                                <option value="onions">Onions</option>
                            </select>
                        </div>
                    </div>
                    <!-- /.form group -->
                    <div class="form-group col-md-6 col-xs-12">
                        <label>Select all</label>
                        <div class="input-group  col-md-8">
                            <select id="example27" multiple="multiple">
                                <option value="cheese">Cheese</option>
                                <option value="tomatoes">Tomatoes</option>
                                <option value="mozarella">Mozzarella</option>
                                <option value="mushrooms">Mushrooms</option>
                                <option value="pepperoni">Pepperoni</option>
                                <option value="onions">Onions</option>
                            </select>
                        </div>
                    </div>
                    <!-- /.form group -->
                    <div class="form-group col-md-6 col-xs-12">
                        <label>Select all</label>
                        <div class="input-group  col-md-8">
                            <div class="btn-group">
                                <select id="example28" multiple="multiple"></select>
                                <button id="example28-values" class="btn btn-primary">Get Selected</button>
                            </div>
                        </div>
                    </div>
                    <!-- /.form group -->
                    <div class="form-group col-md-6 col-xs-12">
                        <label>link select</label>
                        <div class="input-group  col-md-8">
                            <div class="btn-group">
                                <select id="example3" multiple="multiple">
                                    <option value="cheese">Cheese</option>
                                    <option value="tomatoes">Tomatoes</option>
                                    <option value="mozarella">Mozzarella</option>
                                    <option value="mushrooms">Mushrooms</option>
                                    <option value="pepperoni">Pepperoni</option>
                                    <option value="onions">Onions</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- /.form group -->
                    <div class="form-group col-md-6 col-xs-12">
                        <label>Add-ons</label>
                        <div class="input-group  col-md-8">
                            <div class="input-group btn-group">
                                <span class="input-group-addon"> <b class="glyphicon glyphicon-list-alt"></b>
                                </span>
                                <select id="example6" multiple="multiple">
                                    <option value="cheese">Cheese</option>
                                    <option value="tomatoes">Tomatoes</option>
                                    <option value="mozarella">Mozzarella</option>
                                    <option value="mushrooms">Mushrooms</option>
                                    <option value="pepperoni">Pepperoni</option>
                                    <option value="onions">Onions</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- /.form group -->
                    <div class="form-group col-md-6 col-xs-12">
                        <label>onChange</label>
                        <div class="input-group  col-md-8">
                            <div class="btn-group">
                                <select id="example9" multiple="multiple">
                                    <option value="cheese">Cheese</option>
                                    <option value="tomatoes">Tomatoes</option>
                                    <option value="mozarella">Mozzarella</option>
                                    <option value="mushrooms">Mushrooms</option>
                                    <option value="pepperoni">Pepperoni</option>
                                    <option value="onions">Onions</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- /.form group -->
                    <div class="form-group col-md-6 col-xs-12">
                        <label>Disable</label>
                        <div class="input-group  col-md-8">
                            <div class="btn-group">
                                <select id="example13" multiple="multiple">
                                    <option value="enabled1">Enabled 1</option>
                                    <option value="enabled2">Enabled 2</option>
                                    <option value="disabled2" disabled="disabled">Disabled 1</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- /.form group -->
                    <div class="form-group col-md-5 col-xs-12">
                        <label>group label</label>
                        <div class="input-group  col-md-8">
                            <div class="btn-group">
                                <select id="example19" multiple="multiple">
                                    <optgroup label="Mathematics">
                                        <option value="analysis">Analysis</option>
                                        <option value="algebra">Linear Algebra</option>
                                        <option value="discrete">Discrete Mathematics</option>
                                        <option value="numerical">Numerical Analysis</option>
                                        <option value="probability">Probability Theory</option>
                                    </optgroup>
                                    <optgroup label="Computer Science">
                                        <option value="programming">Introduction to Programming</option>
                                        <option value="automata">Automata Theory</option>
                                        <option value="complexity">Complexity Theory</option>
                                        <option value="software">Software Engineering</option>
                                    </optgroup>
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- /.form group -->
                    <div class="form-group col-md-7 col-xs-12">
                        <label>multiselect</label>
                        <div class="input-group  col-md-8">
                            <div class="btn-group">
                                <select id="example35" multiple="multiple">
                                    <option value="cheese">Cheese</option>
                                    <option value="tomatoes">Tomatoes</option>
                                    <option value="mozarella">Mozzarella</option>
                                    <option value="mushrooms">Mushrooms</option>
                                    <option value="pepperoni">Pepperoni</option>
                                    <option value="onions">Onions</option>
                                </select>
                                <button id="example35-enable" class="btn btn-default">Enable</button>
                                <button id="example35-disable" class="btn btn-default">Disable</button>
                            </div>
                        </div>
                    </div>
                    <!-- /.form group --> </div>
            </div>
        </div>
        <!--col-md-6 ends--> </div>
    <!--main content ends-->
</section>
@stop

{{-- page level scripts --}}
@section('footer_scripts')
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
@stop