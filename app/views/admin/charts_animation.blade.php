@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
Animated Charts
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
<!--page level css -->
<link href="{{ asset('assets/vendors/charts/circliful/jquery.circliful.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/css/pages/charts.css" rel="stylesheet') }}" type="text/css" />
<!--end of page level css-->
@stop


{{-- Page content --}}
@section('content')
<section class="content-header">
    <h1>Animating Charts</h1>
    <ol class="breadcrumb">
        <li>
            <a href="index"> <i class="livicon" data-name="home" data-size="16" data-color="#000"></i>
                Home
            </a>
        </li>
        <li>Charts</li>
        <li class="active">Animating Charts</li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-lg-12 col-xs-12 col-md-12 col-sm-12">
            <!-- Basic charts strats here-->
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h4 class="panel-title">Circular Charts</h4>
                    <span class="pull-right"> <i class="glyphicon glyphicon-chevron-up showhide clickable"></i>
                        <i class="glyphicon glyphicon-remove removepanel clickable"></i>
                    </span>
                </div>
                <div class="panel-body">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="col-lg-3 col-sm-6 center">
                            <span id="myStathalf" data-dimension="210" data-text="45% Views" data-fontsize="18" data-percent="45" data-fgcolor="#60BA3B" data-bgcolor="#eee" data-type="half" data-fill="#ddd"></span>
                        </div>
                        <div class="col-lg-3 col-sm-6  center">
                            <span id="myStat" data-dimension="210" data-text="75% Subscribes" data-info="Sales" data-fontsize="15" data-percent="75" data-fgcolor="#E4664B" data-bgcolor="#eee" data-fill="#ddd"></span>
                        </div>
                        <div class="col-lg-3  col-sm-6 center">
                            <span id="myStathalf2" data-dimension="210" data-text="25% Sales" data-info="Subscribes" data-fontsize="18" data-percent="25" data-fgcolor="#3FB0DC" data-bgcolor="#eee" data-type="half" data-icon="fa-task"></span>
                        </div>
                        <div class="col-lg-3 col-sm-4 center">
                            <span id="myStat2" data-dimension="210" data-text="85% New Users" data-info="New Users" data-fontsize="15" data-percent="85" data-fgcolor="#F79646" data-bgcolor="#eee"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <!-- Stack charts strats here-->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">Animation Wave</h4>
                    <span class="pull-right">
                        <i class="glyphicon glyphicon-chevron-up showhide clickable"></i>
                        <i class="glyphicon glyphicon-remove removepanel clickable"></i>
                    </span>
                </div>
                <div class="panel-body">
                    <div id="chart4" class="animation-chart"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- row -->
    <div class="row">
        <div class="col-lg-12">
            <!-- Stack charts strats here-->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">Animation Area</h4>
                    <span class="pull-right">
                        <i class="glyphicon glyphicon-chevron-up showhide clickable"></i>
                        <i class="glyphicon glyphicon-remove removepanel clickable"></i>
                    </span>
                </div>
                <div class="panel-body">
                    <div id="chart3" class="animation-chart"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- row -->
    <div class="row">
        <div class="col-lg-12">
            <!-- Stack charts strats here-->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">Animation on Bar Chart</h4>
                    <span class="pull-right">
                        <i class="glyphicon glyphicon-chevron-up showhide clickable"></i>
                        <i class="glyphicon glyphicon-remove removepanel clickable"></i>
                    </span>
                </div>
                <div class="panel-body">
                    <div id="chart1" class="animation-chart"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <!-- Stack charts strats here-->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">Animation On Points</h4>
                    <span class="pull-right">
                        <i class="glyphicon glyphicon-chevron-up showhide clickable"></i>
                        <i class="glyphicon glyphicon-remove removepanel clickable"></i>
                    </span>
                </div>
                <div class="panel-body">
                    <div id="chart2" class="animation-chart"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- row -->
</section>
@stop

@section('footer_scripts')
<script src="{{ asset('assets/vendors/animationcharts/jquery.flot.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/vendors/animationcharts/jquery.flot.animator.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/vendors/charts/circliful/jquery.circliful.min.js') }}"></script>
<script language="javascript" type="text/javascript" src="{{ asset('assets/vendors/charts/jquery.flot.resize.js') }}"></script>
<script>
    var d8 = [
        [2, 5],
        [3, 6],
        [4, 8],
        [5, 6],
        [6, 2],
        [7, 5],
        [8, 4],
        [9, 1],
        [10, 4],
        [11, 8],
        [12, 5],
        [13, 6],
        [14, 4]
    ];
    var d9 = [
        [2, 4.5],
        [2.5, 5],
        [4.5, 8],
        [6.5, 2],
        [7.5, 5],
        [9.5, 1],
        [10.5, 4],
        [11.5, 8],
        [12.5, 5],
        [13.5, 6],
        [14.5, 4],
        [15, 3]
    ];
    var plot1 = $.plotAnimator($("#chart1"), [{
        data: d8,
        bars: {
            barWidth: 0.5,
            show: true,
            fill: true,
            fillColor: '#DFEFFC',
        }
    }, {
        data: d9,
        lines: {
            lineWidth: 3,
            fill: true,
            fillColor: 'rgba(239,111,108,.2)'
        },
        animator: {
            start: $("#start").val(),
            steps: $("#steps").val(),
            duration: $("#duration").val(),
            direction: $("#dir").val()
        }
    }]);
    //animation on bar chart end
    var d0 = [
        [2, 5],
        [4, 8],
        [6, 2],
        [7, 3],
        [10, 4],
        [12, 5],
        [13, 6],
        [14, 4]
    ];
    var d1 = [
        [2, 5],
        [4, 8],
        [6, 2],
        [7, 3],
        [10, 4],
        [12, 5],
        [13, 6],
        [14, 4]
    ];
    var plot2 = $.plotAnimator($("#chart2"), [{
        data: d1,
        animator: {
            steps: 26,
            duration: 1500,
            start: 0
        },
        points: {
            show: true,
            fill: true,
            radius: 10,
            fillColor: "#418bca"
        },
        label: "Bars"
    }], {
        grid: {
            backgroundColor: {
                colors: ["#fff", "#fff"]
            }
        }
    });
    setTimeout(function() {
        plot2 = $.plotAnimator($("#chart2"), [{
            data: d1,
            points: {
                show: true,
                fill: true,
                radius: 5,
                fillColor: "#418bca"
            },
            label: "Points"
        }, {
            data: d0,
            animator: {
                steps: 136,
                duration: 1500,
                start: 0
            },
            lines: {
                show: true,
                fill: true,
                fillColor: "rgba(65,139,202,0.5)"
            },
            label: "Evolution"
        }], {
            grid: {
                backgroundColor: {
                    colors: ["#ccc", "#67C5DF"]
                }
            }
        });

    }, 3000);

    //animation on points ends
    var d5 = [
        [1, 4],
        [2, 2],
        [4, 4],
        [6, 2],
        [8, 4],
        [10, 2],
        [15, 4],
        [20, 2]
    ];
    var d6 = [
        [1, 3],
        [20, 3]
    ];
    var plot3 = $.plotAnimator($("#chart3"), [{
        data: d5,
        animator: {
            steps: 136,
            duration: 2000,
            start: 0
        },
        lines: {
            show: true,
            fill: true,
            fillColor: 'rgba(239,111,108,0.8)'
        },
        label: "Fill this"
    }, {
        data: d6,
        lines: {
            show: true,
            fill: false
        },
        label: "Standard Values"
    }], {
        grid: {
            backgroundColor: {
                colors: ["#ccc", "#F89A14"]
            }
        }
    });

    //animation area ends
    var d2 = [];
    for (var i = 0; i < 20.1; i += 0.1) d2.push([i, Math.sin(i)]);
    var d3 = [
        [0, 0],
        [20, 0]
    ];
    var plot4 = $.plotAnimator($("#chart4"), [{
        data: d2,
        animator: {
            steps: 136,
            duration: 3000,
            start: 0
        },
        lines: {
            show: true,
            fill: true,
            fillColor: 'rgba(65,139,202,0.8)'
        },
        label: "sin(x)",
        color: '#418bca'
    }, {
        data: d3,
        lines: {
            show: true,
            fill: false,
            linecolor: '#000',
        }
    }, {
        data: d2,
        lines: {
            show: true,
            fill: false
        }
    }], {
        grid: {
            backgroundColor: {
                colors: ["#6CC66C", "#6CC66C"]
            }
        }
    });

    //animation wave ends
    </script>
<script>
    $(document).ready(function() {
        $('#myStathalf').circliful();
        $('#myStat').circliful();
        $('#myStathalf2').circliful();
        $('#myStat2').circliful();
    });
    </script>
@stop