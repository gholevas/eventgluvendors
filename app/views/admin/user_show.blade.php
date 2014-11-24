@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
Client Name
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
    <!-- page level css -->
    <link href="{{ asset('assets/vendors/x-editable/css/x-select.css') }}" type="text/css" rel="stylesheet" />
    <link href="{{ asset('assets/vendors/x-editable/css/bootstrap-editable.css') }}" type="text/css" rel="stylesheet" />
    <link href="{{ asset('assets/vendors/x-editable/css/x-selectbootstrap.css') }}" type="text/css" rel="stylesheet" />
    <link href="{{ asset('assets/vendors/x-editable/css/typehead-bootstrap.css') }}" type="text/css" rel="stylesheet" />
    <link href="{{ asset('assets/css/pages/inlinedit.css') }}" rel="stylesheet" />
    <!-- end of page level css -->
@stop


{{-- Page content --}}
@section('content')

<section class="content-header">
                <h1>Clients</h1>
                <ol class="breadcrumb">
                    <li>
                        <a href="index">
                            <i class="livicon" data-name="home" data-size="16" data-color="#000"></i>
                            Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="clients">
                            Clients
                        </a>
                    </li>
                    <li class="active">John Doe</li>
                </ol>
            </section>
            <!-- Main content -->
            <section class="content paddingleft_right15">
                <div class="row">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <i class="livicon" data-name="user" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                                John Doe
                            </h4>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table id="user" class="table table-bordered table-striped" style="clear:both">
                                    <tbody>
                                        <tr>
                                            <td>First Name</td>
                                            <td>
                                                <a href="#" id="firstname" data-type="text" data-pk="1" data-title="Enter first name" class="editable editable-click" data-original-title="" title="">John</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Last Name</td>
                                            <td>
                                                <a href="#" id="lastname" data-type="text" data-pk="1" data-title="Enter last name" class="editable editable-click" data-original-title="" title="">Doe</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Primary Number</td>
                                            <td>
                                                <a href="#" id="primary" data-type="text" data-pk="1" data-title="Enter primary number" class="editable editable-click" data-original-title="" title="">(718) 223 2321</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Secondary Number</td>
                                            <td>
                                                <a href="#" id="secondary" data-type="text" data-pk="1" data-title="Enter secondary number" class="editable editable-click" data-original-title="" title=""></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Fax Number</td>
                                            <td>
                                                <a href="#" id="fax" data-type="text" data-pk="1" data-title="Enter fax number" class="editable editable-click" data-original-title="" title=""></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Email</td>
                                            <td>
                                                <a href="#" id="email" data-type="text" data-pk="1" data-title="Enter email address" class="editable editable-click" data-original-title="" title="">johndoe@gmail.com</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Address</td>
                                            <td>
                                                <a id="address" data-type="address" data-pk="1" data-title="Please, fill address" class="editable editable-click" data-original-title="" title=""> <b>Moscow</b>
                                                    , Lenina st., bld. 12
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Notes</td>
                                            <td>
                                                <a href="#" id="comments" data-type="textarea" data-pk="1" data-placeholder="Your comments here..." data-title="Enter comments" class="editable editable-pre-wrapped editable-click">Awesome client!</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                  
                </div>
            </section>
        @stop

{{-- page level scripts --}}
@section('footer_scripts')
<script src="{{ asset('assets/vendors/x-editable/jquery.mockjax.js') }}"></script>
<script src="{{ asset('assets/vendors/x-editable/moment.min.js') }}"></script>
<script src="{{ asset('assets/vendors/x-editable/select2.js') }}"></script>
<script>var f = 'bootstrap3';</script>
<script src="{{ asset('assets/vendors/x-editable/bootstrap-editable.js') }}"></script>
<script src="{{ asset('assets/vendors/x-editable/typeahead.js') }}"></script>
<script src="{{ asset('assets/vendors/x-editable/typeaheadjs.js') }}"></script>
<script src="{{ asset('assets/vendors/x-editable/address.js') }}"></script>
<script>
    var c = window.location.href.match(/c=inline/i) ? 'popup' : 'inline';
    $.fn.editable.defaults.mode = c === 'popup' ? 'popup' : 'inline';

    $(function() {
        $('#f').val(f);
        $('#c').val(c);

        $('#frm').submit(function() {
            var f = $('#f').val();
            if (f === 'jqueryui') {
                $(this).attr('action', 'demo-jqueryui.html');
            } else if (f === 'plain') {
                $(this).attr('action', 'demo-plain.html');
            } else if (f === 'bootstrap2') {
                $(this).attr('action', 'demo.html');
            } else {
                $(this).attr('action', 'x-editable');
            }
        });
    });
</script>
<script src="{{ asset('assets/vendors/x-editable/demo-mock.js') }}"></script>
<script src="{{ asset('assets/vendors/x-editable/demo.js') }}"></script>
@stop