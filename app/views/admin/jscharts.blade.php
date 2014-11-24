@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
JS Charts
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
<!--page level css -->
<link rel="stylesheet" href="{{ asset('assets/css/pages/jscharts.css') }}" />
<!--end of page level css-->
@stop


{{-- Page content --}}
@section('content')
<section class="content-header">
    <h1>Charts</h1>
    <ol class="breadcrumb">
        <li>
            <a href="index"> <i class="livicon" data-name="home" data-size="16" data-color="#000"></i>
                Home
            </a>
        </li>
        <li>Charts</li>
        <li class="active">JS Charts</li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-lg-6">
            <!-- Stack charts strats here-->
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h4 class="panel-title">Line Chart</h4>
                    <span class="pull-right"> <i class="glyphicon glyphicon-chevron-up showhide clickable"></i>
                        <i class="glyphicon glyphicon-remove removepanel clickable"></i>
                    </span>
                </div>
                <div class="panel-body">
                    <canvas id="canvasline" width="600" height="360" style="height:360px ! important; width:600px;"></canvas>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <!-- Stack charts strats here-->
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h4 class="panel-title">Bar Chart</h4>
                    <span class="pull-right">
                        <i class="glyphicon glyphicon-chevron-up showhide clickable"></i>
                        <i class="glyphicon glyphicon-remove removepanel clickable"></i>
                    </span>
                </div>
                <div class="panel-body">
                    <canvas id="canvasbar" width="600" height="360" style="height:360px ! important; width:600px;"></canvas>
                </div>
            </div>
        </div>
    </div>
    <!-- row -->
    <div class="row">
        <div class="col-lg-6">
            <!-- Stack charts strats here-->
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h4 class="panel-title">Donut Chart</h4>
                    <span class="pull-right">
                        <i class="glyphicon glyphicon-chevron-up showhide clickable"></i>
                        <i class="glyphicon glyphicon-remove removepanel clickable"></i>
                    </span>
                </div>
                <div class="panel-body">
                    <canvas id="canvasdonut" width="600" height="360" style="height:360px ! important; width:600px;"></canvas>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <!-- Stack charts strats here-->
            <div class="panel panel-warning">
                <div class="panel-heading">
                    <h4 class="panel-title">Pie Chart</h4>
                    <span class="pull-right">
                        <i class="glyphicon glyphicon-chevron-up showhide clickable"></i>
                        <i class="glyphicon glyphicon-remove removepanel clickable"></i>
                    </span>
                </div>
                <div class="panel-body">
                    <canvas id="canvaspie" width="600" height="360" style="height:360px ! important; width:600px;"></canvas>
                </div>
            </div>
        </div>
    </div>
    <!-- row -->
    <div class="row">
        <div class="col-lg-6">
            <!-- Stack charts strats here-->
            <div class="panel panel-danger">
                <div class="panel-heading">
                    <h4 class="panel-title">Polar Area Chart</h4>
                    <span class="pull-right">
                        <i class="glyphicon glyphicon-chevron-up showhide clickable"></i>
                        <i class="glyphicon glyphicon-remove removepanel clickable"></i>
                    </span>
                </div>
                <div class="panel-body">
                    <canvas id="canvaspolar" width="600" height="360" style="height:360px ! important; width:600px;"></canvas>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <!-- Stack charts strats here-->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">Radar Chart</h4>
                    <span class="pull-right">
                        <i class="glyphicon glyphicon-chevron-up showhide clickable"></i>
                        <i class="glyphicon glyphicon-remove removepanel clickable"></i>
                    </span>
                </div>
                <div class="panel-body">
                    <canvas id="canvasradar" width="600" height="360" style="height:360px ! important; width:600px;"></canvas>
                </div>
            </div>
        </div>
    </div>
    <!-- row -->
</section>
@stop

{{-- page level scripts --}}
@section('footer_scripts')
<!-- begining of page level js -->
<script src="{{ asset('assets/vendors/jscharts/Chart.js') }}"></script>
<script>
    var lineChartData = {
        labels: ["January", "February", "March", "April", "May", "June", "July"],
        datasets: [{
            fillColor: "rgba(245, 105, 84,0.5)",
            strokeColor: "rgba(245, 105, 84,1)",
            pointColor: "rgba(245, 105, 84,1)",
            pointStrokeColor: "#fff",
            data: [65, 59, 90, 81, 56, 55, 40]
        }, {
            fillColor: "rgba(151,187,205,0.5)",
            strokeColor: "rgba(151,187,205,1)",
            pointColor: "rgba(151,187,205,1)",
            pointStrokeColor: "#fff",
            data: [28, 48, 40, 19, 96, 27, 100]
        }]
    }
    var myLine = new Chart(document.getElementById("canvasline").getContext("2d")).Line(lineChartData);
    //end of line chart

    var barChartData = {
        labels: ["January", "February", "March", "April", "May", "June", "July"],
        datasets: [{
            fillColor: "rgba(220,220,220,0.5)",
            strokeColor: "rgba(220,220,220,1)",
            data: [65, 59, 90, 81, 56, 55, 40]
        }, {
            fillColor: "rgba(151,187,205,0.5)",
            strokeColor: "rgba(151,187,205,1)",
            data: [28, 48, 40, 19, 96, 27, 100]
        }]
    }
    var myLine = new Chart(document.getElementById("canvasbar").getContext("2d")).Bar(barChartData);
    //end of bar chart
    var doughnutData = [{
        value: 30,
        color: "#F7464A"
    }, {
        value: 50,
        color: "#46BFBD"
    }, {
        value: 100,
        color: "#FDB45C"
    }, {
        value: 40,
        color: "#949FB1"
    }, {
        value: 120,
        color: "#4D5360"
    }];
    var myDoughnut = new Chart(document.getElementById("canvasdonut").getContext("2d")).Doughnut(doughnutData);
    //end of donut chart
    var pieData = [{
        value: 30,
        color: "#F38630"
    }, {
        value: 50,
        color: "#E0E4CC"
    }, {
        value: 100,
        color: "#69D2E7"
    }];
    var myPie = new Chart(document.getElementById("canvaspie").getContext("2d")).Pie(pieData);
    //end of pie chart

    var chartData = [{
        value: Math.random(),
        color: "#D97041"
    }, {
        value: Math.random(),
        color: "#C7604C"
    }, {
        value: Math.random(),
        color: "#21323D"
    }, {
        value: Math.random(),
        color: "#9D9B7F"
    }, {
        value: Math.random(),
        color: "#7D4F6D"
    }, {
        value: Math.random(),
        color: "#584A5E"
    }];
    var myPolarArea = new Chart(document.getElementById("canvaspolar").getContext("2d")).PolarArea(chartData);
    //end of polar chart

    var radarChartData = {
        labels: ["Eating", "Drinking", "Sleeping", "Designing", "Coding", "Partying", "Running"],
        datasets: [{
            fillColor: "rgba(220,220,220,0.5)",
            strokeColor: "rgba(220,220,220,1)",
            pointColor: "rgba(220,220,220,1)",
            pointStrokeColor: "#fff",
            data: [65, 59, 90, 81, 56, 55, 40]
        }, {
            fillColor: "rgba(151,187,205,0.5)",
            strokeColor: "rgba(151,187,205,1)",
            pointColor: "rgba(151,187,205,1)",
            pointStrokeColor: "#fff",
            data: [28, 48, 40, 19, 96, 27, 100]
        }]
    }
    var myRadar = new Chart(document.getElementById("canvasradar").getContext("2d")).Radar(radarChartData, {
        scaleShowLabels: false,
        pointLabelFontSize: 10
    });
    //end of radar chart
    </script>
@stop