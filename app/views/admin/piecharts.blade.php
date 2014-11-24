@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
Pie Charts
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
<!--page level css -->
<link href="{{ asset('assets/vendors/charts/css/examples.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/css/pages/piecharts.css') }}" rel="stylesheet" type="text/css" />
<!--end of page level css-->
@stop


{{-- Page content --}}
@section('content')
<section class="content-header">
    <h1>Pie Charts</h1>
    <ol class="breadcrumb">
        <li>
            <a href="index"> <i class="livicon" data-name="home" data-size="16" data-color="#000"></i>
                Dashboard
            </a>
        </li>
        <li>Charts</li>
        <li class="active">Pie Charts</li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-lg-6">
            <!-- Trans label pie charts strats here-->
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h4 class="panel-title">Interactiv Pie</h4>
                    <span class="pull-right"> <i class="glyphicon glyphicon-chevron-up showhide clickable"></i>
                        <i class="glyphicon glyphicon-remove removepanel clickable"></i>
                    </span>
                </div>
                <div class="panel-body">
                    <div class="demo-container">
                        <div id="placeholderinteractivity" class="demo-placeholder"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <!-- Trans label pie charts strats here-->
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h4 class="panel-title">Tilted Pie</h4>
                    <span class="pull-right">
                        <i class="glyphicon glyphicon-chevron-up showhide clickable"></i>
                        <i class="glyphicon glyphicon-remove removepanel clickable"></i>
                    </span>
                </div>
                <div class="panel-body">
                    <div class="demo-container">
                        <div id="placeholdertiltedpie" class="demo-placeholder"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- row -->
    <div class="row">
        <div class="col-lg-6">
            <!-- Trans label pie charts strats here-->
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h4 class="panel-title">Transparent Label</h4>
                    <span class="pull-right">
                        <i class="glyphicon glyphicon-chevron-up showhide clickable"></i>
                        <i class="glyphicon glyphicon-remove removepanel clickable"></i>
                    </span>
                </div>
                <div class="panel-body">
                    <div class="demo-container">
                        <div id="placeholdertranslabel" class="demo-placeholder"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <!-- Trans label pie charts strats here-->
            <div class="panel panel-warning">
                <div class="panel-heading">
                    <h4 class="panel-title">Radius Label</h4>
                    <span class="pull-right">
                        <i class="glyphicon glyphicon-chevron-up showhide clickable"></i>
                        <i class="glyphicon glyphicon-remove removepanel clickable"></i>
                    </span>
                </div>
                <div class="panel-body">
                    <div class="demo-container">
                        <div id="placeholderradiuslabel" class="demo-placeholder"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--row-->
    <div class="row">
        <div class="col-lg-6">
            <!-- Trans label pie charts strats here-->
            <div class="panel panel-danger">
                <div class="panel-heading">
                    <h4 class="panel-title">Styled Label #1</h4>
                    <span class="pull-right">
                        <i class="glyphicon glyphicon-chevron-up showhide clickable"></i>
                        <i class="glyphicon glyphicon-remove removepanel clickable"></i>
                    </span>
                </div>
                <div class="panel-body">
                    <div class="demo-container">
                        <div id="placeholderstylelabel1" class="demo-placeholder"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <!-- Trans label pie charts strats here-->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">Styled Label #2</h4>
                    <span class="pull-right">
                        <i class="glyphicon glyphicon-chevron-up showhide clickable"></i>
                        <i class="glyphicon glyphicon-remove removepanel clickable"></i>
                    </span>
                </div>
                <div class="panel-body">
                    <div class="demo-container">
                        <div id="placeholderstylelabel2" class="demo-placeholder"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--row-->
    <div class="row">
        <div class="col-lg-6">
            <!-- Trans label pie charts strats here-->
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h4 class="panel-title">Hidden Labels</h4>
                    <span class="pull-right">
                        <i class="glyphicon glyphicon-chevron-up showhide clickable"></i>
                        <i class="glyphicon glyphicon-remove removepanel clickable"></i>
                    </span>
                </div>
                <div class="panel-body">
                    <div class="demo-container">
                        <div id="placeholderhiddenlabels" class="demo-placeholder"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <!-- Trans label pie charts strats here-->
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h4 class="panel-title">Combined Slice</h4>
                    <span class="pull-right">
                        <i class="glyphicon glyphicon-chevron-up showhide clickable"></i>
                        <i class="glyphicon glyphicon-remove removepanel clickable"></i>
                    </span>
                </div>
                <div class="panel-body">
                    <div class="demo-container">
                        <div id="placeholdercombinedlabels" class="demo-placeholder"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--row-->
    <div class="row">
        <div class="col-lg-6">
            <!-- Trans label pie charts strats here-->
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h4 class="panel-title">Rectangular Pie</h4>
                    <span class="pull-right">
                        <i class="glyphicon glyphicon-chevron-up showhide clickable"></i>
                        <i class="glyphicon glyphicon-remove removepanel clickable"></i>
                    </span>
                </div>
                <div class="panel-body">
                    <div class="demo-container">
                        <div id="placeholderrectangularpie" class="demo-placeholder"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <!-- Basic Pie charts strats here-->
            <div class="panel panel-warning">
                <div class="panel-heading">
                    <h4 class="panel-title">Pie Chart #1</h4>
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
    <!--row-->
    <div class="row">
        <div class="col-lg-6">
            <!-- Trans label pie charts strats here-->
            <div class="panel panel-danger">
                <div class="panel-heading">
                    <h4 class="panel-title">Donut Hole</h4>
                    <span class="pull-right">
                        <i class="glyphicon glyphicon-chevron-up showhide clickable"></i>
                        <i class="glyphicon glyphicon-remove removepanel clickable"></i>
                    </span>
                </div>
                <div class="panel-body">
                    <div class="demo-container">
                        <div id="placeholderdonuthole" class="demo-placeholder"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <!-- Basic Pie without legend charts strats here-->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">Pie Chart #2</h4>
                    <span class="pull-right">
                        <i class="glyphicon glyphicon-chevron-up showhide clickable"></i>
                        <i class="glyphicon glyphicon-remove removepanel clickable"></i>
                    </span>
                </div>
                <div class="panel-body">
                    <div class="demo-container">
                        <div id="placeholdernolegend" class="demo-placeholder"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--row-->
</section>
@stop

{{-- page level scripts --}}
@section('footer_scripts')
<script language="javascript" type="text/javascript" src="{{ asset('assets/vendors/charts/jquery.flot.js') }}"></script>
<script language="javascript" type="text/javascript" src="{{ asset('assets/vendors/charts/jquery.flot.pie.js') }}"></script>
<script language="javascript" type="text/javascript" src="{{ asset('assets/vendors/charts/custompiecharts.js') }}"></script>
<script language="javascript" type="text/javascript" src="{{ asset('assets/vendors/charts/jquery.flot.resize.js') }}"></script>
@stop