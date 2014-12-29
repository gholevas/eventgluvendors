@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
{{{$title}}}
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
                <h1>{{{$title}}}</h1>
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
                    <li class="active">{{{$title}}}</li>
                </ol>
            </section>

            <!-- Main content -->
            @if ($deleted_event)
            <div class="alert alert-success alert-dismissable'"><p>The event has been successfully canceled.</p></div>
            @endif

            <section class="content">
                <form action='#' method='POST' id='filter_form'>
                    <div class="form-group col-md-2 col-md-offset-8">
                        <label>Search:</label>
                        <input class="form-control" name='search' id='search' value='{{{$search}}}'/>
                    </div>
    				<div class="form-group col-md-offset-10">
                        <label>Sort by</label>
                        <select class="form-control" name='sort' id='sort'>
                        <option @if ($sort == 'date') selected="1" @endif>Date</option>
                        <option @if ($sort == 'room') selected="1" @endif>Room</option>
                        <option @if ($sort == 'type') selected="1" @endif>Type</option>
                        <option @if ($sort == 'price') selected="1" @endif>Price</option>
                        </select>
                    </div>
                </form>
                <div class="row ui-sortable" id="sortable_portlets">
                   <!-- <div class="col-md-4 column sortable"> -->
                    @foreach ($event_data as $event)
                    <div class="col-md-4 column sortable">
                        <!-- BEGIN Portlet PORTLET-->
                        <div class="portlet box @if ($lead == 1) warning @else success @endif">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="livicon" data-c="#fff" data-hc="#fff" data-name="gift" data-size="18" data-loop="true"></i>
                                    {{{$event['title']}}}
                                </div>
                                <div class="actions">
                                    <a href="{{ URL::to('admin/event/' . $event['id']) }}" class="btn btn-default btn-sm">
                                        <i class="glyphicon glyphicon-share-alt"></i>
                                        Go to Event
                                    </a>
                                </div>
                            </div>
                            <div class="portlet-body">
                                <div>
                                    <b>Date:</b> {{{$event['date']}}}<br>
                                    <b>Time:</b> {{{$event['time']}}}<br>
                                    <b>Room:</b> {{{$event['room']->name}}}<br>
                                    <b>Type:</b> {{{$event['type']}}}<br>
                                    <b>Guests:</b> {{{$event['guests_adults']}}} adults, {{{$event['guests_kids']}}} kid<?php if ($event['guests_kids']!=1) echo 's';?> {{{$event['confirmed']}}}<br>
                                    @if (isset($event['food_package']))
                                    <b>Menu:</b> {{{$event['food_package']->name}}}<br>
                                    @endif
                                    @if (isset($event['drink_package']))
                                    <b>Bar:</b> {{{$event['drink_package']->name}}}<br>
                                    @endif
                                    <b>Price:</b> ${{{number_format($event['price'],2)}}} (owe ${{{number_format($event['left'],2)}}})<br>
                                    <b>Notes:</b> {{{$event['notes']}}}
                                </div>
                            </div>
                        </div>
                        <!-- END portletlet PORTLET-->
                    </div>
                    @endforeach
                </div>
            </section>
            @stop

{{-- page level scripts --}}
@section('footer_scripts')
    <!-- begining of page level js-->
    <script>
    jQuery(document).ready(function() {
/*
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
*/

            $("#search").keypress(function(event) {
                if (event.which == 13) {
                    event.preventDefault();
                    $("#filter_form").submit();
                }
            });

           $('#sort').change(function(){
               $("#filter_form").submit();
            });




    });
    </script>
    @stop
