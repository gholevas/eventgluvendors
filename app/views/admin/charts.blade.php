@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
Charts
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
<!--page level css -->
<link type="text/css" rel="stylesheet" href="{{ asset('assets/vendors/charts/css/examples.css') }}" />
<!--end of page level css-->
@stop


{{-- Page content --}}
@section('content')
<section class="content-header">
    <!--section starts-->
    <h1>Flot Charts</h1>
    <ol class="breadcrumb">
        <li>
            <a href="index"> <i class="livicon" data-name="home" data-size="14" data-loop="true"></i>
                Home
            </a>
        </li>
        <li>
            <a href="#">Charts</a>
        </li>
        <li class="active">Flot Charts</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-lg-12">
            <!-- Stack charts strats here-->
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h4 class="panel-title">Stack Charts</h4>
                    <span class="pull-right"> <i class="glyphicon glyphicon-chevron-up showhide clickable"></i>
                        <i class="glyphicon glyphicon-remove removepanel clickable"></i>
                    </span>
                </div>
                <div class="panel-body">
                    <div class="demo-container">
                        <div id="placeholderstack" class="demo-placeholder"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <!-- toggling series charts strats here-->
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h4 class="panel-title">Toggling Charts</h4>
                    <span class="pull-right">
                        <i class="glyphicon glyphicon-chevron-up showhide clickable"></i>
                        <i class="glyphicon glyphicon-remove removepanel clickable"></i>
                    </span>
                </div>
                <div class="panel-body">
                    <div class="demo-container">
                        <div id="placeholdertoggle" class="demo-placeholder toggler-left"></div>
                        <p id="choices" class="toggler-right"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- row -->
    <div class="row">
        <div class="col-lg-12">
            <!-- Tracking charts strats here-->
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h4 class="panel-title">Tracking Charts</h4>
                    <span class="pull-right">
                        <i class="glyphicon glyphicon-chevron-up showhide clickable"></i>
                        <i class="glyphicon glyphicon-remove removepanel clickable"></i>
                    </span>
                </div>
                <div class="panel-body">
                    <div class="demo-container">
                        <div id="placeholdertracking" class="demo-placeholder"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- row -->
    <div class="row">
        <div class="col-lg-12">
            <!-- Stack charts strats here-->
            <div class="panel panel-warning">
                <div class="panel-heading">
                    <h4 class="panel-title">Visitors Charts</h4>
                    <span class="pull-right">
                        <i class="glyphicon glyphicon-chevron-up showhide clickable"></i>
                        <i class="glyphicon glyphicon-remove removepanel clickable"></i>
                    </span>
                </div>
                <div class="panel-body">
                    <div class="demo-container">
                        <div id="placeholderusers" class="demo-placeholder"></div>
                    </div>
                    <div class="demo-container visitors-bottom" style="height:200px;">
                        <div id="overview" class="demo-placeholder"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- row -->
    <div class="row">
        <div class="col-lg-12">
            <!-- Charts with symbols charts strats here-->
            <div class="panel panel-danger">
                <div class="panel-heading">
                    <h4 class="panel-title">Symbol Charts</h4>
                    <span class="pull-right">
                        <i class="glyphicon glyphicon-chevron-up showhide clickable"></i>
                        <i class="glyphicon glyphicon-remove removepanel clickable"></i>
                    </span>
                </div>
                <div class="panel-body">
                    <div class="demo-container">
                        <div id="placeholdersymbols" class="demo-placeholder"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- row -->
    <div class="row">
        <div class="col-lg-12">
            <!-- Real time charts strats here-->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">Real Time Charts</h4>
                    <span class="pull-right">
                        <i class="glyphicon glyphicon-chevron-up showhide clickable"></i>
                        <i class="glyphicon glyphicon-remove removepanel clickable"></i>
                    </span>
                </div>
                <div class="panel-body">
                    <div class="demo-container">
                        <div id="placeholderrealtime" class="demo-placeholder"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h4 class="panel-title">Multi Charts</h4>
                    <span class="pull-right">
                        <i class="glyphicon glyphicon-chevron-up showhide clickable"></i>
                        <i class="glyphicon glyphicon-remove removepanel clickable"></i>
                    </span>
                </div>
                <div class="panel-body">
                    <div class="demo-container">
                        <div id="placeholderbasic" class="demo-placeholder"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- row -->
    <div class="row">
        <div class="col-lg-12">
            <!-- Interacting charts strats here-->
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h4 class="panel-title">Interacting Charts</h4>
                    <span class="pull-right">
                        <i class="glyphicon glyphicon-chevron-up showhide clickable"></i>
                        <i class="glyphicon glyphicon-remove removepanel clickable"></i>
                    </span>
                </div>
                <div class="panel-body">
                    <p>
                        <label>
                            <input id="enablePositions" type="checkbox" checked="checked" />
                            Mouse Position
                            <span id="hoverdata"></span>
                        </label>
                    </p>
                    <div class="demo-container">
                        <div id="placeholderinteracting" class="demo-placeholder"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- row -->
</section>
@stop

@section('footer_scripts')
<script language="javascript" type="text/javascript" src="{{ asset('assets/vendors/charts/jquery.flot.min.js') }}"></script>
<script language="javascript" type="text/javascript" src="{{ asset('assets/vendors/charts/jquery.flot.stack.js') }}"></script>
<script language="javascript" type="text/javascript" src="{{ asset('assets/vendors/charts/jquery.flot.crosshair.js') }}"></script>
<script language="javascript" type="text/javascript" src="{{ asset('assets/vendors/charts/jquery.flot.time.js') }}"></script>
<script language="javascript" type="text/javascript" src="{{ asset('assets/vendors/charts/jquery.flot.selection.js') }}"></script>
<script language="javascript" type="text/javascript" src="{{ asset('assets/vendors/charts/jquery.flot.symbol.js') }}"></script>
<script language="javascript" type="text/javascript" src="{{ asset('assets/vendors/charts/customcharts.js') }}"></script>
<script language="javascript" type="text/javascript" src="{{ asset('assets/vendors/charts/jquery.flot.resize.js') }}"></script>
@stop