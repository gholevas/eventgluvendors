@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
Clients | eventGL&uuml;
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
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
					<i class="livicon" data-name="gear" data-size="20" data-loop="true" data-c="#fff" data-hc="#fff"></i>
					<i class="fa fa-angle-down"></i>
				</button>
				<ul class="dropdown-menu pull-right">
					<li>
						<a data-toggle="modal" data-href="#newClient" href="#newClient">New Client</a>
					</li>
					<?php /*<li>
						<a href="#">Print</a>
					</li>
					<li>
						<a href="#">Save as PDF</a>
					</li>
					<li>
						<a href="#">Export to Excel</a>
					</li>*/ ?>
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
				<table class="table table-bordered" id="clients-list-table">
					<thead>
						<tr class="filters">
							<th>First Name</th>
							<th>Last Name</th>
							<th>E-mail</th>
							<th>Phone</th>
							<th>Created At</th>
							<th>Actions</th>
						</tr>
					</thead>
				</table>
			</div>
		</div>
	</div>
<!-- row-->
</section>
<!-- Modal for showing delete confirmation -->
<div class="modal fade" id="delete_confirm" role="dialog" aria-labelledby="user_delete_confirm_title" aria-hidden="true">
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
				<a id="clients-delete-submit" href="#" type="button" class="btn btn-danger">Delete</a>
			</div>
		</div>
	</div>
</div>
<!--- see client responsive model -->
<div class="modal fade in" id="show_profile" role="dialog" aria-hidden="false" style="display:none;">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h4 class="modal-title">Client Info</h4>
				<input type="hidden" id="clients-profile-modal-id" value="">
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="panel panel-info">
						<div class="panel-heading">
							<h4 class="panel-title">
								<i class="livicon" data-name="user" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
								<span id="ec-fullname"></span>
							</h4>
						</div>
						<div class="panel-body">
							<div class="table-responsive">
								<table class="table table-bordered table-striped" style="clear:both">
									<tbody>
										<tr>
											<td>First Name</td>
											<td>
												<span id="ec-firstname" class="ec-input" data-placeholder="Enter first name"></span>
											</td>
										</tr>
										<tr>
											<td>Last Name</td>
											<td>
												<span id="ec-lastname" class="ec-input" data-placeholder="Enter last name"></span>
											</td>
										</tr>
										<tr>
											<td>Primary Number</td>
											<td>
												<span id="ec-primary" class="ec-input" data-placeholder="Enter primary number"></span>
											</td>
										</tr>
										<tr>
											<td>Secondary Number</td>
											<td>
												<span id="ec-secondary" class="ec-input" data-placeholder="Enter secondary number"></span>
											</td>
										</tr>
										<tr>
											<td>Fax Number</td>
											<td>
												<span id="ec-fax" class="ec-input" data-placeholder="Enter fax number"></span>
											</td>
										</tr>
										<tr>
											<td>Email</td>
											<td>
												<span id="ec-emailaddress" class="ec-input" data-placeholder="Enter email address"></span>
											</td>
										</tr>
										<tr>
											<td>Address</td>
											<td>
												<span id="ec-address" class="ec-input" data-placeholder="Enter address"></span>
											</td>
										</tr>
										<tr>
											<td>Notes</td>
											<td>
												<span id="ec-comments" class="ec-input" data-placeholder="Your comments here..."></span>
											</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<a id="clients-edit-click" href="#" type="button" class="btn btn-success">Edit</a>
				<a id="clients-cancel-click" href="#" type="button" class="btn btn-warning" style="display:none;">Cancel Changes</a>
				<a id="clients-save-click" href="#" type="button" class="btn btn-success" style="display:none;">Save Changes</a>
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>

@stop

{{-- page level scripts --}}
@section('footer_scripts')
<script type="text/javascript" src="{{ asset('assets/vendors/datatables/jquery.dataTables.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/vendors/datatables/dataTables.bootstrap.js') }}"></script>
<script>
$(function () {
    $('body').on('hidden.bs.modal', '.modal', function () {
        $(this).removeData('bs.modal');
    });
});
</script>
@stop
