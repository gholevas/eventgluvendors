@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
Clients | eventGL&uuml;
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/datatables/css/select2.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/datatables/css/dataTables.bootstrap.css') }}" />
<link href="{{ asset('assets/css/pages/tables.css') }}" rel="stylesheet" type="text/css" />
@stop


{{-- Page content --}}
@section('content')
<section class="content-header">
    <h1>Clients</h1>
    <ol class="breadcrumb">
        <li>
            <a href="index"> <i class="livicon" data-name="home" data-size="18" data-loop="true"></i>
                Dashboard
            </a>
        </li>
        <li class="active">Clients</li>
    </ol>
</section>
<!-- Main content -->
            <section class="content paddingleft_right15">
                <div class="row">
                    <div class="panel panel-primary ">
                        <div class="btn-group pull-right">
                            <button class="btn dropdown-toggle btn-primary" data-toggle="dropdown">
                                Tools
                                <i class="fa fa-angle-down"></i>
                            </button>
                            <ul class="dropdown-menu pull-right">
                                <li>
                                    <a href="#">Print</a>
                                </li>
                                <li>
                                    <a href="#">Save as PDF</a>
                                </li>
                                <li>
                                    <a href="#">Export to Excel</a>
                                </li>
                            </ul>
                        </div>
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <i class="livicon" data-name="user" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                                Clients
                            </h4>
                        </div>
                        <br />
                        <div class="panel-body">
                            <table class="table table-bordered " id="table">
                                <thead>
                                    <tr class="filters">
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>
                                            User E-mail
                                        </th>
                                        <th>Phone</th>
                                        <th>Created At</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>John</td>
                                        <td>Doe</td>
                                        <td>
                                            admin@admin.com
                                        </td>
                                        <td>(718) 228 3928</td>
                                        <td>
                                            1 month ago
                                        </td>
                                        <td>
                                            <a href="{{ URL::to('admin/user_show') }}">
                                                <i class="livicon" data-name="info" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="view user"></i>
                                            </a>
                                            <a href="#" data-toggle="modal" data-target="#delete_confirm">
                                                <i class="livicon" data-name="user-remove" data-size="18" data-loop="true" data-c="#f56954" data-hc="#f56954" title="delete user"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Mozzy</td>
                                        <td>
                                            loomy69@gmail.com
                                        </td>
                                        <td>
                                            loomy69@gmail.com
                                        </td>
                                        <td>(718) 228 3928</td>
                                        <td>
                                            4 weeks ago
                                        </td>
                                        <td>
                                            <a href="{{ URL::to('admin/user_show') }}">
                                                <i class="livicon" data-name="info" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="view user"></i>
                                            </a>
                                            <a href="#" data-toggle="modal" data-target="#delete_confirm">
                                                <i class="livicon" data-name="user-remove" data-size="18" data-loop="true" data-c="#f56954" data-hc="#f56954" title="delete user"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>jonh</td>
                                        <td>Doe</td>
                                        <td>
                                            email@email.com.br
                                        </td>
                                        <td>(718) 228 3928</td>
                                        <td>
                                            3 weeks ago
                                        </td>
                                        <td>
                                            <a href="{{ URL::to('admin/user_show') }}">
                                                <i class="livicon" data-name="info" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="view user"></i>
                                            </a>
                                            <a href="#" data-toggle="modal" data-target="#delete_confirm">
                                                <i class="livicon" data-name="user-remove" data-size="18" data-loop="true" data-c="#f56954" data-hc="#f56954" title="delete user"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Lue</td>
                                        <td>Gutkowski</td>
                                        <td>
                                            weissnat.ron@feeney.biz
                                        </td>
                                        <td>(718) 228 3928</td>
                                        <td>
                                            2 weeks ago
                                        </td>
                                        <td>
                                            <a href="{{ URL::to('admin/user_show') }}">
                                                <i class="livicon" data-name="info" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="view user"></i>
                                            </a>
                                            <a href="#" data-toggle="modal" data-target="#delete_confirm">
                                                <i class="livicon" data-name="user-remove" data-size="18" data-loop="true" data-c="#f56954" data-hc="#f56954" title="delete user"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Claire</td>
                                        <td>Crooks</td>
                                        <td>
                                            yd&#039;amore@grimes.net
                                        </td>
                                        <td>(718) 228 3928</td>
                                        <td>
                                            2 weeks ago
                                        </td>
                                        <td>
                                            <a href="{{ URL::to('admin/user_show') }}">
                                                <i class="livicon" data-name="info" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="view user"></i>
                                            </a>
                                            <a href="#" data-toggle="modal" data-target="#delete_confirm">
                                                <i class="livicon" data-name="user-remove" data-size="18" data-loop="true" data-c="#f56954" data-hc="#f56954" title="delete user"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Hailie</td>
                                        <td>Lesch</td>
                                        <td>
                                            mschultz@gmail.com
                                        </td>
                                        <td>(718) 228 3928</td>
                                        <td>
                                            2 weeks ago
                                        </td>
                                        <td>
                                            <a href="{{ URL::to('admin/user_show') }}">
                                                <i class="livicon" data-name="info" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="view user"></i>
                                            </a>
                                            <a href="#" data-toggle="modal" data-target="#delete_confirm">
                                                <i class="livicon" data-name="user-remove" data-size="18" data-loop="true" data-c="#f56954" data-hc="#f56954" title="delete user"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Mollie</td>
                                        <td>Quigley</td>
                                        <td>
                                            morar.reta@daughertyromaguera.com
                                        </td>
                                        <td>(718) 228 3928</td>
                                        <td>
                                            2 weeks ago
                                        </td>
                                        <td>
                                            <a href="{{ URL::to('admin/user_show') }}">
                                                <i class="livicon" data-name="info" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="view user"></i>
                                            </a>
                                            <a href="#" data-toggle="modal" data-target="#delete_confirm">
                                                <i class="livicon" data-name="user-remove" data-size="18" data-loop="true" data-c="#f56954" data-hc="#f56954" title="delete user"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Roxanne</td>
                                        <td>Streich</td>
                                        <td>
                                            oquitzon@yahoo.com
                                        </td>
                                        <td>(718) 228 3928</td>
                                        <td>
                                            2 weeks ago
                                        </td>
                                        <td>
                                            <a href="{{ URL::to('admin/user_show') }}">
                                                <i class="livicon" data-name="info" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="view user"></i>
                                            </a>
                                            <a href="#" data-toggle="modal" data-target="#delete_confirm">
                                                <i class="livicon" data-name="user-remove" data-size="18" data-loop="true" data-c="#f56954" data-hc="#f56954" title="delete user"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Sincere</td>
                                        <td>Hackett</td>
                                        <td>
                                            vickie.hackett@yahoo.com
                                        </td>
                                        <td>(718) 228 3928</td>
                                        <td>
                                            2 weeks ago
                                        </td>
                                        <td>
                                            <a href="{{ URL::to('admin/user_show') }}">
                                                <i class="livicon" data-name="info" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="view user"></i>
                                            </a>
                                            <a href="#" data-toggle="modal" data-target="#delete_confirm">
                                                <i class="livicon" data-name="user-remove" data-size="18" data-loop="true" data-c="#f56954" data-hc="#f56954" title="delete user"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Oral</td>
                                        <td>Stroman</td>
                                        <td>
                                            hoeger.gennaro@gmail.com
                                        </td>
                                        <td>(718) 228 3928</td>
                                        <td>
                                            2 weeks ago
                                        </td>
                                        <td>
                                            <a href="{{ URL::to('admin/user_show') }}">
                                                <i class="livicon" data-name="info" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="view user"></i>
                                            </a>
                                            <a href="#" data-toggle="modal" data-target="#delete_confirm">
                                                <i class="livicon" data-name="user-remove" data-size="18" data-loop="true" data-c="#f56954" data-hc="#f56954" title="delete user"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Will</td>
                                        <td>Gaylord</td>
                                        <td>
                                            schimmel.delores@schiller.com
                                        </td>
                                        <td>(718) 228 3928</td>
                                        <td>
                                            2 weeks ago
                                        </td>
                                        <td>
                                            <a href="{{ URL::to('admin/user_show') }}">
                                                <i class="livicon" data-name="info" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="view user"></i>
                                            </a>
                                            <a href="#" data-toggle="modal" data-target="#delete_confirm">
                                                <i class="livicon" data-name="user-remove" data-size="18" data-loop="true" data-c="#f56954" data-hc="#f56954" title="delete user"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Hal</td>
                                        <td>Kuphal</td>
                                        <td>
                                            hflatley@deckow.biz
                                        </td>
                                        <td>(718) 228 3928</td>
                                        <td>
                                            2 weeks ago
                                        </td>
                                        <td>
                                            <a href="{{ URL::to('admin/user_show') }}">
                                                <i class="livicon" data-name="info" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="view user"></i>
                                            </a>
                                            <a href="#" data-toggle="modal" data-target="#delete_confirm">
                                                <i class="livicon" data-name="user-remove" data-size="18" data-loop="true" data-c="#f56954" data-hc="#f56954" title="delete user"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Leone</td>
                                        <td>Dach</td>
                                        <td>
                                            pcruickshank@waters.info
                                        </td>
                                        <td>(718) 228 3928</td>
                                        <td>
                                            2 weeks ago
                                        </td>
                                        <td>
                                            <a href="{{ URL::to('admin/user_show') }}">
                                                <i class="livicon" data-name="info" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="view user"></i>
                                            </a>
                                            <a href="#" data-toggle="modal" data-target="#delete_confirm">
                                                <i class="livicon" data-name="user-remove" data-size="18" data-loop="true" data-c="#f56954" data-hc="#f56954" title="delete user"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Letha</td>
                                        <td>Ebert</td>
                                        <td>
                                            darien55@hotmail.com
                                        </td>
                                        <td>(718) 228 3928</td>
                                        <td>
                                            2 weeks ago
                                        </td>
                                        <td>
                                            <a href="{{ URL::to('admin/user_show') }}">
                                                <i class="livicon" data-name="info" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="view user"></i>
                                            </a>
                                            <a href="#" data-toggle="modal" data-target="#delete_confirm">
                                                <i class="livicon" data-name="user-remove" data-size="18" data-loop="true" data-c="#f56954" data-hc="#f56954" title="delete user"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Blaise</td>
                                        <td>Rohan</td>
                                        <td>
                                            jerde.zechariah@yahoo.com
                                        </td>
                                        <td>(718) 228 3928</td>
                                        <td>
                                            2 weeks ago
                                        </td>
                                        <td>
                                            <a href="{{ URL::to('admin/user_show') }}">
                                                <i class="livicon" data-name="info" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="view user"></i>
                                            </a>
                                            <a href="#" data-toggle="modal" data-target="#delete_confirm">
                                                <i class="livicon" data-name="user-remove" data-size="18" data-loop="true" data-c="#f56954" data-hc="#f56954" title="delete user"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Raina</td>
                                        <td>Kilback</td>
                                        <td>
                                            idenesik@schneider.com
                                        </td>
                                        <td>(718) 228 3928</td>
                                        <td>
                                            2 weeks ago
                                        </td>
                                        <td>
                                            <a href="{{ URL::to('admin/user_show') }}">
                                                <i class="livicon" data-name="info" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="view user"></i>
                                            </a>
                                            <a href="#" data-toggle="modal" data-target="#delete_confirm">
                                                <i class="livicon" data-name="user-remove" data-size="18" data-loop="true" data-c="#f56954" data-hc="#f56954" title="delete user"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Enid</td>
                                        <td>Rippin</td>
                                        <td>
                                            ashlee23@yahoo.com
                                        </td>
                                        <td>(718) 228 3928</td>
                                        <td>
                                            2 weeks ago
                                        </td>
                                        <td>
                                            <a href="{{ URL::to('admin/user_show') }}">
                                                <i class="livicon" data-name="info" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="view user"></i>
                                            </a>
                                            <a href="#" data-toggle="modal" data-target="#delete_confirm">
                                                <i class="livicon" data-name="user-remove" data-size="18" data-loop="true" data-c="#f56954" data-hc="#f56954" title="delete user"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Cathryn</td>
                                        <td>Jakubowski</td>
                                        <td>
                                            qmohr@kilback.org
                                        </td>
                                        <td>(718) 228 3928</td>
                                        <td>
                                            2 weeks ago
                                        </td>
                                        <td>
                                            <a href="{{ URL::to('admin/user_show') }}">
                                                <i class="livicon" data-name="info" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="view user"></i>
                                            </a>
                                            <a href="#" data-toggle="modal" data-target="#delete_confirm">
                                                <i class="livicon" data-name="user-remove" data-size="18" data-loop="true" data-c="#f56954" data-hc="#f56954" title="delete user"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Rickie</td>
                                        <td>Frami</td>
                                        <td>
                                            flatley.wilhelmine@gaylord.com
                                        </td>
                                        <td>(718) 228 3928</td>
                                        <td>
                                            2 weeks ago
                                        </td>
                                        <td>
                                            <a href="{{ URL::to('admin/user_show') }}">
                                                <i class="livicon" data-name="info" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="view user"></i>
                                            </a>
                                            <a href="#" data-toggle="modal" data-target="#delete_confirm">
                                                <i class="livicon" data-name="user-remove" data-size="18" data-loop="true" data-c="#f56954" data-hc="#f56954" title="delete user"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Lyric</td>
                                        <td>Reinger</td>
                                        <td>
                                            storphy@hotmail.com
                                        </td>
                                        <td>(718) 228 3928</td>
                                        <td>
                                            2 weeks ago
                                        </td>
                                        <td>
                                            <a href="{{ URL::to('admin/user_show') }}">
                                                <i class="livicon" data-name="info" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="view user"></i>
                                            </a>
                                            <a href="#" data-toggle="modal" data-target="#delete_confirm">
                                                <i class="livicon" data-name="user-remove" data-size="18" data-loop="true" data-c="#f56954" data-hc="#f56954" title="delete user"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Cortney</td>
                                        <td>Walter</td>
                                        <td>
                                            wmayer@gmail.com
                                        </td>
                                        <td>(718) 228 3928</td>
                                        <td>
                                            2 weeks ago
                                        </td>
                                        <td>
                                            <a href="{{ URL::to('admin/user_show') }}">
                                                <i class="livicon" data-name="info" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="view user"></i>
                                            </a>
                                            <a href="#" data-toggle="modal" data-target="#delete_confirm">
                                                <i class="livicon" data-name="user-remove" data-size="18" data-loop="true" data-c="#f56954" data-hc="#f56954" title="delete user"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Keegan</td>
                                        <td>Hilpert</td>
                                        <td>
                                            yokuneva@yahoo.com
                                        </td>
                                        <td>(718) 228 3928</td>
                                        <td>
                                            2 weeks ago
                                        </td>
                                        <td>
                                            <a href="{{ URL::to('admin/user_show') }}">
                                                <i class="livicon" data-name="info" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="view user"></i>
                                            </a>
                                            <a href="#" data-toggle="modal" data-target="#delete_confirm">
                                                <i class="livicon" data-name="user-remove" data-size="18" data-loop="true" data-c="#f56954" data-hc="#f56954" title="delete user"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Vito</td>
                                        <td>Fay</td>
                                        <td>
                                            dlynch@hotmail.com
                                        </td>
                                        <td>(718) 228 3928</td>
                                        <td>
                                            2 weeks ago
                                        </td>
                                        <td>
                                            <a href="{{ URL::to('admin/user_show') }}">
                                                <i class="livicon" data-name="info" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="view user"></i>
                                            </a>
                                            <a href="#" data-toggle="modal" data-target="#delete_confirm">
                                                <i class="livicon" data-name="user-remove" data-size="18" data-loop="true" data-c="#f56954" data-hc="#f56954" title="delete user"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Nakia</td>
                                        <td>Gutkowski</td>
                                        <td>
                                            genoveva84@mitchellreichel.com
                                        </td>
                                        <td>(718) 228 3928</td>
                                        <td>
                                            2 weeks ago
                                        </td>
                                        <td>
                                            <a href="{{ URL::to('admin/user_show') }}">
                                                <i class="livicon" data-name="info" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="view user"></i>
                                            </a>
                                            <a href="#" data-toggle="modal" data-target="#delete_confirm">
                                                <i class="livicon" data-name="user-remove" data-size="18" data-loop="true" data-c="#f56954" data-hc="#f56954" title="delete user"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Stephania</td>
                                        <td>Mayer</td>
                                        <td>
                                            diego.hilll@yahoo.com
                                        </td>
                                        <td>(718) 228 3928</td>
                                        <td>
                                            2 weeks ago
                                        </td>
                                        <td>
                                            <a href="{{ URL::to('admin/user_show') }}">
                                                <i class="livicon" data-name="info" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="view user"></i>
                                            </a>
                                            <a href="#" data-toggle="modal" data-target="#delete_confirm">
                                                <i class="livicon" data-name="user-remove" data-size="18" data-loop="true" data-c="#f56954" data-hc="#f56954" title="delete user"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Selmer</td>
                                        <td>Feest</td>
                                        <td>
                                            mann.uriah@gmail.com
                                        </td>
                                        <td>(718) 228 3928</td>
                                        <td>
                                            2 weeks ago
                                        </td>
                                        <td>
                                            <a href="{{ URL::to('admin/user_show') }}">
                                                <i class="livicon" data-name="info" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="view user"></i>
                                            </a>
                                            <a href="#" data-toggle="modal" data-target="#delete_confirm">
                                                <i class="livicon" data-name="user-remove" data-size="18" data-loop="true" data-c="#f56954" data-hc="#f56954" title="delete user"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Chauncey</td>
                                        <td>Stiedemann</td>
                                        <td>
                                            braeden.dicki@reillywilkinson.com
                                        </td>
                                        <td>(718) 228 3928</td>
                                        <td>
                                            2 weeks ago
                                        </td>
                                        <td>
                                            <a href="{{ URL::to('admin/user_show') }}">
                                                <i class="livicon" data-name="info" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="view user"></i>
                                            </a>
                                            <a href="#" data-toggle="modal" data-target="#delete_confirm">
                                                <i class="livicon" data-name="user-remove" data-size="18" data-loop="true" data-c="#f56954" data-hc="#f56954" title="delete user"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Lilyan</td>
                                        <td>Lemke</td>
                                        <td>
                                            jamison25@connelly.com
                                        </td>
                                        <td>(718) 228 3928</td>
                                        <td>
                                            2 weeks ago
                                        </td>
                                        <td>
                                            <a href="{{ URL::to('admin/user_show') }}">
                                                <i class="livicon" data-name="info" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="view user"></i>
                                            </a>
                                            <a href="#" data-toggle="modal" data-target="#delete_confirm">
                                                <i class="livicon" data-name="user-remove" data-size="18" data-loop="true" data-c="#f56954" data-hc="#f56954" title="delete user"></i>
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <!-- Modal for showing delete confirmation -->
                            <div class="modal fade" id="delete_confirm" tabindex="-1" role="dialog" aria-labelledby="user_delete_confirm_title" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            <h4 class="modal-title" id="user_delete_confirm_title">
                                                Delete User
                                            </h4>
                                        </div>
                                        <div class="modal-body">
                                            Are you sure to delete this user? This operation is irreversible.
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                            <a href="#" type="button" class="btn btn-danger">Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- row--> </section>

@stop

{{-- page level scripts --}}
@section('footer_scripts')
<script type="text/javascript" src="{{ asset('assets/vendors/datatables/jquery.dataTables.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/vendors/datatables/dataTables.bootstrap.js') }}"></script>
<script>
$(document).ready(function() {
    $('#table').DataTable();
});
</script>

<div class="modal fade" id="delete_confirm" tabindex="-1" role="dialog" aria-labelledby="user_delete_confirm_title" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content"></div>
  </div>
</div>
<script>
$(function () {
    $('body').on('hidden.bs.modal', '.modal', function () {
        $(this).removeData('bs.modal');
    });
});
</script>
@stop