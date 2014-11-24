@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
Sparkline Charts
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
<!--page level css -->
<link href="{{ asset('assets/css/pages/sparklinecharts.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/css/panel.css') }}" rel="stylesheet" type="text/css" />
<!-- end of page level css -->
@stop


{{-- Page content --}}
@section('content')
<section class="content-header">
    <h1>Sparkline Charts</h1>
    <ol class="breadcrumb">
        <li class="active">
            <a href="index"> <i class="livicon" data-name="home" data-size="16" data-color="#333" data-hovercolor="#333"></i>
                Home
            </a>
        </li>
        <li class="active">
            <a href="#">Charts</a>
        </li>
        <li class="active">
            <a href="#">Sparkline Charts</a>
        </li>
    </ol>
</section>
<!-- breadcrumb-->
<!-- Main content -->
<section class="content paddingleft_right15">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h4 class="panel-title">Sparkline Charts</h4>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-6 col-xs-12 col-sm-6 spark-chart">
                    <div class="minichart-box">Line Chart</div>
                    <span id="sparklineline">5,6,7,9,9,5,3,2,2,4,6,7</span>
                    <div class="minichart-txt">This Month Sales</div>
                </div>
                <div class="col-md-6 col-xs-12 col-sm-6 spark-chart">
                    <div class="minichart-box">Bar Chart</div>
                    <span id="sparklinebar">3,9,16,8,13,7,2</span>
                    <div class="minichart-txt">This Week Sales</div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-xs-12 col-sm-6 spark-chart">
                    <div class="minichart-box">Bullet Chart</div>
                    <span id="sparklinebullet">10,12,12,9,7</span>
                    <div class="minichart-txt">Bounce Rate</div>
                </div>
                <div class="col-md-6 col-xs-12 col-sm-6 spark-chart">
                    <div class="minichart-box">Discrete Chart</div>
                    <span id="sparklinediscrete">1,1,0,1,-1,-1,1,-1,0,0,1,1</span>
                    <div class="minichart-txt">Quarterly Report</div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-xs-12 col-sm-6 spark-chart">
                    <div class="minichart-box">Tristate Chart</div>
                    <span id="sparklinetristate">1,1,0,1,-1,-1,1,-1,0,0,1,1</span>
                    <div class="minichart-txt">Success/Lose Rate</div>
                </div>
                <div class="col-md-6 col-xs-12 col-sm-6 spark-chart">
                    <div class="minichart-box">Pie Chart</div>
                    <span id="sparklinepie" style="padding-left:70px;">1,2,3</span>
                    <div class="minichart-txt">
                        1. Unique Visitors
                        <br />
                        2. New Visitors
                        <br />
                        3. Total Visitors
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-xs-12 col-sm-6 spark-chart">
                    <div class="minichart-box">Box Chart</div>
                    <span id="sparklinebox">4,27,34,52,54,59,61,68,78,82,85,87,91,93,100</span>
                    <div class="minichart-txt">This Week Sales</div>
                </div>
                <div class="col-md-6 col-xs-12 col-sm-6 spark-chart">
                    <div class="minichart-box">Multi Bar Chart</div>
                    <span id="sparklinebarcolor">1:3,2:9,4:16,3:8</span>
                    <div class="minichart-txt">Unique VS New Visitors</div>
                </div>
            </div>
        </div>
    </div>
</section>
@stop

{{-- page level scripts --}}
@section('footer_scripts')
<script src="{{ asset('assets/vendors/sparkline/jquery.sparkline.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/vendors/sparkline/src/chart-bar.js') }}"></script>
<script type="text/javascript">
    $("#sparklinebar").sparkline([3, 9, 16, 8, 13, 7, 11], {
        type: 'bar',
        height: '40',
        barWidth: 14,
        barColor: '#6cc66c'
    });

    $("#sparklinebarcolor").sparkline([
        [1, 3],
        [3, 9],
        [4, 16],
        [3, 8],
        [5, 13],
        [2, 7],
        [3, 10]
    ], {
        type: 'bar',
        height: '40',
        barWidth: 12,
        barColor: '#6cc66c'
    });

    $("#sparklineline").sparkline([5, 6, 7, 9, 9, 5, 3, 2, 2, 4, 6, 7], {
        type: 'line',
        width: '120',
        height: '30 ',
        lineColor: '#67c5df',
        fillColor: '#8bd2e5',
        lineWidth: 2,
        spotColor: '#f89a14',
        minSpotColor: '#f89a14',
        maxSpotColor: '#f89a14',
        highlightSpotColor: '#6cc66c',
        highlightLineColor: '#ef6f6c',
        drawNormalOnTop: true
    });

    $("#sparklinebullet").sparkline([10, 12, 12, 9, 7, 7], {
        type: 'bullet',
        performanceColor: '#44abff',
        width: 110,
        height: 30,
        rangeColors: ['#418bca', '#8bacc6', '#b9dbf7']
    });

    $("#sparklinetristate").sparkline([1, 0, 1, -1, -1, 1, -1, 0, 0, 1, 1], {
        type: 'tristate',
        height: '70 ',
        barWidth: 10,
        zeroAxis: true
    });

    $("#sparklinediscrete").sparkline([4, 6, 7, 7, 4, 3, 2, 1, 1, 3, 4, 5, 6, 3, 2, 1, 1, 3, 4, 5, 6, 7, 8], {
        type: 'discrete',
        width: '120',
        height: '30',
        lineColor: '#6cc66c',
        thresholdValue: 4,
        thresholdColor: '#ff0000'
    });

    $("#sparklinepie").sparkline([1, 2, 3], {
        type: 'pie',
        width: '150',
        height: '80 ',
        sliceColors: ['#f89a14', '#6cc66c', '#418bca']
    });

    $("#sparklinebox").sparkline([4, 27, 34, 52, 54, 59, 61, 68, 78, 82, 85, 87, 91, 93, 100], {
        type: 'box',
        width: '120',
        height: '40 ',
        raw: false,
        showOutliers: false,
        boxLineColor: '#cccccc',
        boxFillColor: '#a9b6bc',
        whiskerColor: '#111010',
        outlierLineColor: '#141313',
        medianColor: '#ef6f6c',
        targetColor: '#6cc66c'
    });
    </script>
@stop