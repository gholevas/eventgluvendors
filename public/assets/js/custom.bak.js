$(function()
{
	// Dashboard ---------------------------------------------------

		if ($('#dash-calendar').length)
		{
			ajaxReq('POST', '/admin/json/events/list', { }, function(r)
				{
					var eventData = $.parseJSON(r.message);
/*
[
	{
		title    : 'Click me 1',
		start    : '2014-12-01 06:00:00',
		end      : '2014-12-01 08:00:00',
		editable : false,
		event_id : '1'
	},
	{
		title    : 'Click me 2',
		start    : '2014-12-12 14:00:00',
		end      : '2014-12-12 15:00:00',
		editable : false,
		event_id : '2' 
	},
]
*/
					$('#dash-calendar').fullCalendar(
					{
						header     :
						{
							left: '',
							center: 'title',
							right: 'prev,next'
						},
						buttonText :
						{
							prev: '<span class="fa fa-caret-left"></span>',
							next: '<span class="fa fa-caret-right"></span>',
							today: 'today',
							month: 'month',
							week: 'week',
							day: 'day'
						},
						events          : eventData,
						editable        : false,
						droppable       : false,
						disableDragging : true,
						slotEventOverlap: false,
						eventClick      : function(event)
						{
							if (event.event_id)
							{
								window.location('/admin/event/' + event.event_id);
							}
						}
					});
				},
				function(r)
				{
					alertBar('danger', 'Error: ' + r.message);
				}
			);
		}

		if ($('form#todo-add').length)
		{
			$(document).on('submit', 'form#todo-add', function(e)
			{
				e.preventDefault();

				var input = $('#todo-add-text').val();

				if (!input)
					return;

				ajaxReq('POST', '/admin/json/todo/add', { 'todo' : input }, function(r)
					{
						$('#dashboard-todo').prepend('<div class="todolist_list showactions" data-id="' + r.message + '"><div class="col-md-8 col-sm-8 col-xs-8 nopadmar custom_textbox1"><div class="todoitemcheck checkbox-custom"><input type="checkbox" class="todo-complete large" /></div><div class="todotext todoitem">' + $.encoder.encodeForHTML(input) + '</div></div><div class="col-md-4 col-sm-4 col-xs-4 pull-right showbtns todoitembtns"><a href="#" class="todo-edit"><span class="glyphicon glyphicon-pencil"></span></a><a href="#" class="todo-edit-submit" style="display:none;"><span class="glyphicon glyphicon-save"></span></a> | <a href="#" class="todo-delete redcolor"><span class="glyphicon glyphicon-trash"></span></a></div></div>');
						alertBar('info', 'The to do item has been added to your list', false, true, true);
					}
				);
			});

			$(document).on('click', '.todo-delete', function(e)
			{
				e.preventDefault();

				// hide immediately
				var elm = $(this).closest('.todolist_list');
				elm.hide();

				ajaxReq('POST', '/admin/json/todo/delete', { 'todo_id' : $(this).parent().parent().data('id') }, function(r)
					{
						elm.remove();
					},
					function(r)
					{
						elm.show();
						alertBar('danger', 'Error: ' + r.message);
					}
				);
			});

			$(document).on('click', '.todo-complete', function(e)
			{
				// toggle this immediately so it looks like the request was instant
				$(this).closest('.todolist_list').find('.todotext').toggleClass('strikethrough');
				
				ajaxReq('POST', '/admin/json/todo/completed', { 'todo_id' : $(this).parent().parent().parent().data('id') }, function(){}, function()
					{
						// toggle again if an error occured
						$(this).closest('.todolist_list').find('.todotext').toggleClass('strikethrough');
					}
				);
			});

			// displays the input
			$(document).on('click', '.todo-edit', function(e)
			{
				e.preventDefault();

				var elm = $(this).parent().parent().find('div:first').find('.todoitem');

				elm.html('<input class="todo-edit-text" type="text" value="' + elm.text() + '">');
				elm.find('input').focus();
				// show submit icon and hide the edit icon
				$(this).toggle();
				$(this).parent().find('.todo-edit-submit').show();
			});

			$(document).on('click', '.todo-edit-submit', function(e)
			{
				e.preventDefault();

				var elm   = $(this).parent().parent().find('div:first').find('.todoitem');
				var input = elm.find('input').val();

				if (!input)
					return false;

				ajaxReq('POST', '/admin/json/todo/edit', { 'todo_id' : $(this).parent().parent().data('id') , 'todo' : input }, function()
					{
						elm.text(input);
						$(this).closest('a.todo-edit-submit').html('<span class="glyphicon glyphicon-pencil"></span>');
						// hide submit icon and show edit icon
						$(this).toggle();
						$(this).parent().find('.todo-edit').show();
					}
				);
			});
		}

	// Clients -----------------------------------------------------

		if ($('#clients-list-table').length)
		{
			refreshClientsList();

			$(document).on('click', '.clients-open-delete-modal', function()
			{
				$('#clients-delete-submit').attr('data-id', $(this).data('id'));
			});

			$(document).on('click', '#clients-delete-submit', function()
			{
				ajaxReq('POST', '/admin/json/clients/delete', { 'client_id' : $(this).data('id') }, function(r)
					{
						//window.location = '/admin/clients';
						refreshClientsList();
						$('#deleteClient').modal('hide');
						alertBar('info', 'The client has been deleted');
					}
				);
			});

			$(document).on('click', '.clients-open-profile-modal', function()
			{
				$('#clients-profile-modal-id').val($(this).data('id'));

				ajaxReq('POST', '/admin/json/clients/details', { 'client_id' : $(this).data('id') }, function(r)
					{
						var data = $.parseJSON(r.message);

						$('#ec-fullname').text(data.first_name + ' ' + data.last_name);
						$('#ec-firstname').text(data.first_name);
						$('#ec-lastname').text(data.last_name);
						$('#ec-primary').text(data.phone_number);
						$('#ec-secondary').text(data.secondary_phone_number);
						$('#ec-fax').text(data.fax_number);
						$('#ec-emailaddress').text(data.email);
						$('#ec-address').text(data.address);
						$('#ec-comments').text(data.notes);
					},
					function(r)
					{
						alertBar('danger', 'Error: ' + r.message);
						$('#show_profile').modal('hide');
					}
				);
			});
		}

		$(document).on('submit', '.clients-new-submit', function(e)
		{
			e.preventDefault();

			ajaxReq('POST', '/admin/json/clients/add',
				{
					'first_name'             : $('#nc-firstname').val() ,
					'last_name'              : $('#nc-lastname').val() ,
					'phone_number'           : $('#nc-primary').val() ,
					'secondary_phone_number' : $('#nc-secondary').val() ,
					'fax_number'             : $('#nc-fax').val() ,
					'email'                  : $('#nc-emailaddress').val() ,
					'address'                : $('#nc-address').val() ,
					'notes'                  : $('#nc-comments').val()
				},
				function(r)
				{
					//window.location = '/admin/clients';
					refreshClientsList();
					$('#newClient').modal('hide');
					alertBar('info', 'The client has been added');
				},
				function(r)
				{
					console.log(r);
					alert('Error: ' + "\n" + r.message);
				}
			);
		});

		$(document).on('click', '#clients-edit-click', function(e)
		{
			e.preventDefault();

			$(this).hide();
			$('#clients-cancel-click').show();
			$('#clients-save-click').show();

			$('span.ec-input').each(function(key, value)
			{
				var input = $('<input />',
					{
						'type'        : 'text' ,
						'id'          : $(this).attr('id') ,
						'class'       : 'form-control ec-input' ,
						'value'       : $(this).text() ,
						'placeholder' : $(this).data('placeholder') ,
						'data-orig'   : $(this).text()
					}
				);
				$(this).parent().append(input);
				$(this).remove();
			});
		});

		$(document).on('click', '#clients-save-click', function(e)
		{
			e.preventDefault();

			ajaxReq('POST', '/admin/json/clients/edit',
				{
					'client_id'              : $('#clients-profile-modal-id').val() ,
					'first_name'             : $('#ec-firstname').val() ,
					'last_name'              : $('#ec-lastname').val() ,
					'phone_number'           : $('#ec-primary').val() ,
					'secondary_phone_number' : $('#ec-secondary').val() ,
					'fax_number'             : $('#ec-fax').val() ,
					'email'                  : $('#ec-emailaddress').val() ,
					'address'                : $('#ec-address').val() ,
					'notes'                  : $('#ec-comments').val()
				},
				function(r)
				{
					//window.location = '/admin/clients';
					refreshClientsList();
					alert('The client\'s information been added');
					clientInputToSpan();
					$(this).hide();
					$('#clients-cancel-click').hide();
					$('#clients-edit-click').show();
				},
				function(r)
				{
					console.log(r);
					alert('Error: ' + "\n" + r.message);
				}
			);
		});

		$(document).on('click', '#clients-cancel-click', function(e)
		{
			e.preventDefault();

			if (window.confirm('Are you sure you want to cancel your changes?'))
			{
				clientInputToSpan(true);
				$(this).hide();
				$('#clients-save-click').hide();
				$('#clients-edit-click').show();
			}
		});

		function refreshClientsList()
		{
			ajaxReq('POST', '/admin/json/clients/list', { }, function(r)
				{
					var tableData = $.parseJSON(r.message);
					var processed = [];

					$.each(tableData, function(key, value)
					{
						processed.push([ value.first_name , value.last_name , value.email , value.phone_number, value.created_at , '<a href="#" data-toggle="modal" data-target="#show_profile" class="clients-open-profile-modal" data-id="' + value.id + '"><i class="livicon dataTabeIcon" data-name="info" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="view user"></i></a> <a href="#" data-toggle="modal" data-target="#delete_confirm" class="clients-open-delete-modal" data-id="' + value.id + '"><i class="livicon dataTabeIcon" data-name="user-remove" data-size="18" data-loop="true" data-c="#f56954" data-hc="#f56954" title="delete user"></i></a>' ]);
					});

					$('#clients-list-table').DataTable(
					{
						'aaData'         : processed,
						'fnDrawCallback' : function() {	$('.dataTabeIcon').updateLivicon(); } ,
						'bDestroy'       : true
					});
				}
			);
		}

		function clientInputToSpan(cancel)
		{
			$('input.ec-input').each(function(key, value)
			{
				var span = $('<span />',
					{
						'id'               : $(this).attr('id') ,
						'class'            : 'ec-input' ,
						'data-placeholder' : $(this).data('placeholder')
					}
				);

				span.text( ((cancel) ? $(this).data('orig') : $(this).val()) );
				$(this).parent().append(span);
				$(this).remove();
			});
		}

	// Events ------------------------------------------------------

		$('.client-search').select2(
		{
			placeholder        : 'Select a Client',
			minimumInputLength : 1,
			ajax:
			{
				url         : '/admin/json/clients/search',
				type        : 'POST',
				dataType    : 'json',
				quietMillis : 250,
				data        : function (term, page) { return { query : term }; },
				results     : function (data, page)
				{
					var json = $.parseJSON(data.message);
					var out  = [];

					$.each(json, function(key, value)
					{
						out.push({ id : value.id , text : value.first_name + ' ' + value.last_name + ' (' + value.email + ')' });
					});

					return { results : out };
				}
			}
		});

		$(document).on('submit', '.event-new-submit', function(e)
		{
			e.preventDefault();

			var btn = $(this).find('button[type=submit]:focus');
			var addons = [];
			$('.ne-addons:checked').each(function(){ addons.push($(this).val()); });

			ajaxReq('POST', '/admin/json/events/add',
				{
					'title'              : $('#ne-eventname').val() ,
					'type'               : $('#ne-type').val() ,
					'room'               : $('#ne-room').val() ,
					'date'               : $('#ne-datetime').val() ,
					'length'             : $('#ne-duration').val() ,
					'guests_adults'      : $('#ne-adults').val() ,
					'guests_kids'        : $('#ne-kids').val() ,
					'food_package'       : $('#ne-food').val() ,
					'food_package_kids'  : $('#ne-foodkids').val() ,
					'drink_package'      : $('#ne-drink').val() ,
					'drink_package_kids' : $('#ne-drinkkids').val() ,
					'addons'             : JSON.stringify(addons) ,
					'discount'           : $('#ne-discount').val() ,
					'client_id'          : $('#ne-client').val() ,
					'notes'              : $('#ne-notes').val() ,
					'full_quote'         : ((btn.hasClass('isFullQuote')) ? '1' : '0') ,
					'confirmed'          : ((btn.hasClass('isConfirmed')) ? '1' : '0')
				},
				function(r)
				{
					alertBar('info', 'Your event has been added');
					$('#newEvent').modal('hide');
				},
				function(r)
				{
					alert('Error: ' + "\n" + r.message);
				}
			);
		});

		$(document).on('submit', '.quote-new-submit', function(e)
		{
			e.preventDefault();

			var btn = $(this).find('button[type=submit]:focus');
			var addons = [];
			$('.nq-addons:checked').each(function(){ addons.push($(this).val()); });

			ajaxReq('POST', '/admin/json/events/add',
				{
					'title'              : $('#nq-eventname').val() ,
					'type'               : $('#nq-type').val() ,
					'room'               : $('#nq-room').val() ,
					'date'               : $('#nq-datetime').val() ,
					'length'             : $('#nq-duration').val() ,
					'guests_adults'      : $('#nq-adults').val() ,
					'guests_kids'        : $('#nq-kids').val() ,
					'food_package'       : $('#nq-food').val() ,
					'food_package_kids'  : $('#nq-foodkids').val() ,
					'drink_package'      : $('#nq-drink').val() ,
					'drink_package_kids' : $('#nq-drinkkids').val() ,
					'addons'             : JSON.stringify(addons) ,
					'discount'           : $('#nq-discount').val() ,
					'client_id'          : $('#nq-client').val() ,
					'full_quote'         : ((btn.hasClass('isFullQuote')) ? '1' : '0') ,
					'confirmed'          : ((btn.hasClass('isConfirmed')) ? '1' : '0')
				},
				function(r)
				{
					alertBar('info', 'Your quote has been added');
					$('#newQuote').modal('hide');
				},
				function(r)
				{
					alert('Error: ' + "\n" + r.message);
				}
			);
		});

		$('#newQuote').on('change', '.quote-new-submit input', function(e)
		{
			if ($('#nq-room').val() == '')
				return;

			$('.quoteText').fadeOut();
			generateNewQuote();
		});

		$('#newQuote').on('change', '.quote-new-submit select', function(e)
		{
			$('.quoteText').fadeOut();
			generateNewQuote();
		});

		if ($('form#event-notes-form').length)
		{
			$(document).on('submit', 'form#event-notes-form', function(e)
			{
				e.preventDefault();

				var input = $('#note-add-text').val();

				if (!input)
					return;
				
				ajaxReq('POST', '/admin/json/event_notes/add', { 'event_id' : EVENT_DETAIL_ID , 'note' : input }, function(r)
					{
//						$('#event-notes').prepend('<div class="todolist_list showactions" data-id="' + r.id + '"><div class="col-md-8 col-sm-8 col-xs-8 nopadmar custom_textbox1"><div class="todoitemcheck checkbox-custom"><input type="checkbox" class="event-notes-complete large" /></div><div class="todotext todoitem">' + $.encoder.encodeForHTML(r.item) + '</div></div><div class="col-md-4 col-sm-4 col-xs-4 pull-right showbtns todoitembtns"><a href="#" class="event-notes-edit"><span class="glyphicon glyphicon-pencil"></span></a><a href="#" class="event-notes-edit-submit" style="display:none;"><span class="glyphicon glyphicon-save"></span></a> | <a href="#" class="event-notes-delete redcolor"><span class="glyphicon glyphicon-trash"></span></a></div></div>');
						$('#event-notes').prepend('<div class="todolist_list showactions" data-id="' + $.parseJSON(r.message).id + '"><div class="col-md-8 col-sm-8 col-xs-8 nopadmar custom_textbox1"><div class="todotext todoitem">' + $.encoder.encodeForHTML($.parseJSON(r.message).item) + '</div></div><div class="col-md-4 col-sm-4 col-xs-4 pull-right showbtns todoitembtns"><a href="#" class="event-notes-edit"><span class="glyphicon glyphicon-pencil"></span></a><a href="#" class="event-notes-edit-submit" style="display:none;"><span class="glyphicon glyphicon-save"></span></a> | <a href="#" class="event-notes-delete redcolor"><span class="glyphicon glyphicon-trash"></span></a></div></div>');
						$('#note-add-text').val('');
						//alertBar('info', 'The to do item has been added to your list');
					}
				);
			});

			$(document).on('click', '.event-notes-delete', function(e)
			{
				e.preventDefault();

				// hide immediately
				var elm = $(this).closest('.todolist_list');
				elm.hide();

				ajaxReq('POST', '/admin/json/event_notes/delete', { 'note_id' : $(this).parent().parent().data('id') }, function(r)
					{
						elm.remove();
					},
					function(r)
					{
						elm.show();
						alertBar('danger', 'Error: ' + r.message);
					}
				);
			});
/*
			$(document).on('click', '.event-notes-complete', function(e)
			{
				// toggle this immediately so it looks like the request was instant
				$(this).closest('.todolist_list').find('.todotext').toggleClass('strikethrough');
				
				ajaxReq('POST', '/admin/json/event_notes/completed', { 'note_id' : $(this).parent().parent().parent().data('id') }, function(){}, function()
					{
						// toggle again if an error occured
						$(this).closest('.todolist_list').find('.todotext').toggleClass('strikethrough');
					}
				);
			});
*/
			// displays the input
			$(document).on('click', '.event-notes-edit', function(e)
			{
				e.preventDefault();

				var elm = $(this).parent().parent().find('div:first').find('.todoitem');

				elm.html('<input class="event-notes-edit-text" type="text" value="' + elm.text() + '"></input>');
				elm.find('input').focus();
				// show submit icon and hide the edit icon
				$(this).toggle();
				$(this).parent().find('.event-notes-edit-submit').show();
			});

			$(document).on('click', '.event-notes-edit-submit', function(e)
			{
				e.preventDefault();

				var elm   = $(this).parent().parent().find('div:first').find('.todoitem');
				var input = elm.find('input').val();

				if (!input)
					return false;

				ajaxReq('POST', '/admin/json/event_notes/edit', { 'note_id' : $(this).parent().parent().data('id') , 'note' : input }, function()
					{
						elm.text(input);
						$(this).closest('a.event-notes-edit-submit').html('<span class="glyphicon glyphicon-pencil"></span>');
						// hide submit icon and show edit icon
						$(this).toggle();
						$(this).parent().find('.event-notes-edit').show();
					}
				);
			});

			$('#event-notes').slimScroll(
			{
				color  : '#A9B6BC',
				height : ($('#event-detail-order-summary').height() - 90) + 'px',
				size   : '5px'
			});

			$(document).on('submit', '#event-detail-edit-event', function(e)
			{
				e.preventDefault();

				ajaxReq('POST', '/admin/json/events/edit_summary',
					{
						'event_id'           : EVENT_DETAIL_ID ,
						'type'               : $('#ee-type').val() ,
						'room'               : $('#ee-room').val() ,
						'date'               : $('#ee-datetime').val() ,
						'length'             : $('#ee-duration').val() ,
						'guests_adults'      : $('#ee-adults').val() ,
						'guests_kids'        : $('#ee-kids').val()
					},
					function(r)
					{
						alert('The event has been successfully updated');
						location.reload();
					},
					function(r)
					{
						alert('Error: ' + "\n" + r.message);
					}
				);
			});

			$(document).on('submit', '#event-detail-edit-summary', function(e)
			{
				e.preventDefault();

				var addons = [];
				$('.es-addons:checked').each(function(){ addons.push($(this).val()); });

				ajaxReq('POST', '/admin/json/events/edit',
					{
						'event_id'           : EVENT_DETAIL_ID ,
						'food_package'       : $('#es-food').val() ,
						'food_package_kids'  : $('#es-foodkids').val() ,
						'drink_package'      : $('#es-drink').val() ,
						'drink_package_kids' : $('#es-drinkkids').val() ,
						'addons'             : JSON.stringify(addons) ,
						'discount'           : $('#es-discount').val() ,
						'notes'              : $('#es-notes').val()
					},
					function(r)
					{
						alert('The order has been successfully updated');
						location.reload();
					},
					function(r)
					{
						alert('Error: ' + "\n" + r.message);
					}
				);
			});

			$(document).on('submit', '#event-detail-edit-client', function(e)
			{
				e.preventDefault();

				ajaxReq('POST', '/admin/json/clients/edit',
					{
						'client_id'              : EVENT_CLIENT_ID ,
						'first_name'             : $('#ed-firstname').val() ,
						'last_name'              : $('#ed-lastname').val() ,
						'phone_number'           : $('#ed-primary').val() ,
						'secondary_phone_number' : $('#ed-secondary').val() ,
						'fax_number'             : $('#ed-fax').val() ,
						'email'                  : $('#ed-emailaddress').val() ,
						'address'                : $('#ed-address').val() ,
						'notes'                  : $('#ed-comments').val()
					},
					function(r)
					{
						alert('The client has been successfully updated');
						location.reload();
					},
					function(r)
					{
						alert('Error: ' + "\n" + r.message);
					}
				);
			});

			$(document).on('click', '#event-detail-log-payment', function(e)
			{
				e.preventDefault();

				ajaxReq('POST', '/admin/json/events/logpayment',
					{
						'event_id' : EVENT_DETAIL_ID ,
						'amount'   : $('#lp-amount').val()
					},
					function(r)
					{
						$('#logPayment').modal('hide');
						alert('The payment has been logged');
						$('#lp-balancePaid').text(r.balance_paid);
						$('#lp-remainingBalance').text(r.remaining_balance);
						$('#lp-amount').val('');
						location.reload();
					},
					function(r)
					{
						alert('Error: ' + "\n" + r.message);
					}
				);
			});
		}

		function generateNewQuote()
		{
			var addons = [];
			$('.nq-addons:checked').each(function(){ addons.push($(this).val()); });

			ajaxReq('POST', '/admin/json/pricing/quote',
				{
					'room'               : $('#nq-room').val() ,
					'date'               : $('#nq-datetime').val() ,
					'length'             : $('#nq-duration').val() ,
					'guests_adults'      : $('#nq-adults').val() ,
					'guests_kids'        : $('#nq-kids').val() ,
					'food_package'       : $('#nq-food').val() ,
					'food_package_kids'  : $('#nq-foodkids').val() ,
					'drink_package'      : $('#nq-drink').val() ,
					'drink_package_kids' : $('#nq-drinkkids').val() ,
					'addons'             : JSON.stringify(addons) ,
					'discount'           : $('#nq-discount').val()
				},
				function(rnj)
				{
					r = $.parseJSON(rnj.message);
					$('#quote-pp').text('$'+r.perperson);
					$('#quote-dc').text('$'+r.discount);
					$('#quote-tax').text('$'+r.tax);
					$('#quote-grat').text('$'+r.grat);
					$('#quote-total').text('$'+r.total);
					$('.quoteText').fadeIn();
				},
				function(r)
				{
					//alert('Error: ' + "\n" + r.message);
				}
			);
		}

	// Calendar ----------------------------------------------------

			function formatCalendarData(raw)
			{
				var output = [];

				$.each(raw, function(k, v)
				{
					var first_end = this[0].business_end;

					if (v.length > 1)
					{
						var first      = true;
						var that       = this[0];
						var last_start = this[0].business_start;
						var last_end   = false;

						$.each(v, function()
						{
							if (first)
							{
								first = false;
							}
							else
							{
								if (moment(first_end, 'YYYY-MM-DD HH:mm:ss').diff(moment(this.rule_start, 'YYYY-MM-DD HH:mm:ss'), 'seconds') > 0)
								{
									first_end = this.rule_start;
								}

								if (last_end && moment(this.rule_start, 'YYYY-MM-DD HH:mm:ss').diff(moment(last_end, 'YYYY-MM-DD HH:mm:ss'), 'seconds') !== 0)
								{
									output.push(
									{
										title    : '$' + that.minimum_spend + ' (' + that.minimum_hours + ' hrs)' ,
										start    : last_end,
										end      : this.rule_end,
										editable : false
									});
								}

								last_end = this.rule_end;

								output.push(
								{
									title    : '$' + this.minimum_spend + ' (' + that.minimum_hours + ' hrs)' ,
									start    : this.rule_start,
									end      : this.rule_end,
									editable : false,
									color    : '#7cc142'
								});
							}
						});

						if (last_end && moment(that.business_end, 'YYYY-MM-DD HH:mm:ss').diff(moment(last_end, 'YYYY-MM-DD HH:mm:ss'), 'seconds') !== 0)
						{
							output.push(
							{
								title    : '$' + that.minimum_spend + ' (' + that.minimum_hours + ' hrs)',
								start    : last_end,
								end      : that.business_end,
								editable : false
							});
						}
					}

					if (first_end != this[0].business_start)
					{
						output.push(
						{
							title    : '$' + this[0].minimum_spend + ' (' + this[0].minimum_hours + ' hrs)',
							start    : this[0].business_start,
							end      : first_end,
							editable : false
						});
					}
				});

				return output;
			}

		if ($('#full-calendar').length)
		{
			$(document).on('click', '.cal-day-basic', function(e)
			{
				$('#dayBasic').find('.modal-title').text('Basic pricing for ' + $(this).data('day'));
				$('#cal-basic-day').val($(this).data('day'));
				$('#dayBasic').modal('show');

				if ($(this).html() != '')
				{
					$('#cal-day-spend').val($(this).find('h3').text().substring(1));
				}
			});

			$(document).on('click', '#calendar-day-save', function(e)
			{
				e.preventDefault();

				ajaxReq('POST', '/admin/json/calendar/basic',
					{
						'room_id' : CALENDAR_ROOM_ID ,
						'day'     : $('#cal-basic-day').val() ,
						'minimum' : $('#cal-day-spend').val()
					},
					function(r)
					{
						$('#cal-day-spend').val('');
						$('#dayBasic').modal('hide');

						var elm = $('#cal-basic-' + $('#cal-basic-day').val().substring(0,3));

						if (elm.html() == '')
						{
							elm.html('Minimum<h3>$' + $('#cal-day-spend').val() + '</h3>');
						}
						else
						{
							elm.find('h3').text('$' + $('#cal-day-spend').val());
						}

						alert('The pricing has been successfully updated');
					},
					function(r)
					{
						alert('Error: ' + "\n" + r.message);
					}
				);
			});

/*
			ajaxReq('POST', '/admin/json/calendar/list',
				{
					'room_id' : CALENDAR_ROOM_ID
				},
				function(r)
				{
					var rawData = $.parseJSON(r.message);
*/
					var rawData = {
						'2014-12-01' : [ {
								business_start : '2014-12-01 10:00:00',
								business_end   : '2014-12-02 02:00:00',
								minimum_hours  : '4',
								minimum_spend  : '2000'
							},{
								minimum_spend : '5000',
								rule_start    : '2014-12-01 18:00:00',
								rule_end      : '2014-12-01 22:00:00'
							}
						],
						'2014-12-02' : [ {
								business_start : '2014-12-02 10:00:00',
								business_end   : '2014-12-02 15:00:00',
								minimum_hours  : '4',
								minimum_spend  : '2000'
							}
						],
						'2014-12-03' : [ {
								business_start : '2014-12-03 10:00:00',
								business_end   : '2014-12-03 15:00:00',
								minimum_hours  : '4',
								minimum_spend  : '2000'
							},{
								minimum_spend : '2000',
								rule_start    : '2014-12-03 10:00:00',
								rule_end      : '2014-12-03 12:00:00'
							},{
								minimum_spend : '5000',
								rule_start    : '2014-12-03 12:00:00',
								rule_end      : '2014-12-03 15:00:00'
							}
						],
						'2014-12-04' : [ {
								business_start : '2014-12-04 10:00:00',
								business_end   : '2014-12-05 04:00:00',
								minimum_hours  : '2',
								minimum_spend  : '1000'
							},{
								minimum_spend : '2000',
								rule_start    : '2014-12-04 18:00:00',
								rule_end      : '2014-12-04 22:00:00'
							},{
								minimum_spend : '5000',
								rule_start    : '2014-12-04 22:00:00',
								rule_end      : '2014-12-04 23:00:00'
							}
						],
						'2014-12-05' : [ {
								business_start : '2014-12-05 10:00:00',
								business_end   : '2014-12-05 18:00:00',
								minimum_hours  : '2',
								minimum_spend  : '1000'
							},{
								minimum_spend : '2000',
								rule_start    : '2014-12-05 10:00:00',
								rule_end      : '2014-12-05 14:00:00'
							}
						],
						'2014-12-07' : [ {
								business_start : '2014-12-07 10:00:00',
								business_end   : '2014-12-08 04:00:00',
								minimum_hours  : '2',
								minimum_spend  : '1000'
							},{
								minimum_spend : '2000',
								rule_start    : '2014-12-07 12:00:00',
								rule_end      : '2014-12-07 14:00:00'
							},{
								minimum_spend : '5000',
								rule_start    : '2014-12-07 16:00:00',
								rule_end      : '2014-12-07 18:00:00'
							}
						],
						'2014-12-12' : [ {
								business_start : '2014-12-12 18:00:00',
								business_end   : '2014-12-13 03:00:00',
								minimum_hours  : '4',
								minimum_spend  : '2000'
							},{
								minimum_spend : '5000',
								rule_start    : '2014-12-12 22:00:00',
								rule_end      : '2014-12-13 03:00:00'
							}
						]
					};
					//process rawData to data readable by fullcalendar
					var calendarData = formatCalendarData(rawData);

					$('#full-calendar').fullCalendar(
					{
						header:
						{
							left   : 'title',
//							center : 'month,agendaWeek,agendaDay,',
//							right  : 'today prev,next'
							center : '',
							right  : 'prev,next'
						},
//						height          : 500,
						firstDay        : 1,
//						businessHours   : true,
						allDaySlot      : false,
						disableDragging : true,
						slotEventOverlap: false,
						displayEventEnd :
						{
							month     : true,
							basicWeek : true,
							"default" : true
						},
/*
						eventClick      : function(calEvent, jsEvent, view)
						{
							console.log('event clicked');
							console.log(calEvent);
							$('#popover2').popover('show');
							$('#dateEvent').find('.modal-title').text('1 December 10:00-18:00');
							$('#dateEvent').modal('show');
						},
*/
						selectable   : true,
						eventSources : [
						{
//							url           : '/XXX/yyyyy',
//							editable      : true,
							allDayDefault : false
						}],
						eventRender  : function(event, element)
						{
							element.draggable = false;
							event.editable = false;
						},
						select       : function(start,end,title,jsEvent)
						{
/*
							$(title.toElement).popover(
								{
									html      : true,
									container : '#full-calendar',
									title     : 'test',
									content   : '<strong>Business hours</strong><p>10:00am-11:00pm</p><hr><strong>Room Minimum</strong><p>$2000 based on a 4 hour event</p><hr><strong>Advanced Room minimum</strong><p>$1000 from 10:00am-12:00pm</p><p>$2000 from 08:00pm-11:00pm</p></br><span><a href="#" class="btn btn-sm btn-success">Edit </a></span>'
								}
							).popover('show');
*/
/*
							$(title.target).webuiPopover(
								{
									title      : 'test',
									closeable  : true,
									constrains : 'horizontal',
									cache      : true,
									content    : '<strong>Business hours</strong><p>10:00am-11:00pm</p><hr><strong>Room Minimum</strong><p>$2000 based on a 4 hour event</p><hr><strong>Advanced Room minimum</strong><p>$1000 from 10:00am-12:00pm</p><p>$2000 from 08:00pm-11:00pm</p></br><span><a href="#" class="btn btn-sm btn-success">Edit </a></span>'
								}
							).webuiPopover('show');
*/
							var modalHeader = (moment(start).diff(end, 'days') == '-1') ? moment(start).format('MMMM D') : moment(start).format('MMMM D') + ' - ' + moment(end).format('MMMM D') ;

							$('#dateInfo').find('.modal-title').text(modalHeader);
							$('#dateEdit').find('.modal-title').text(modalHeader);
							$('#cal-date-start').val(moment(start).format('YYYY-MM-DD'));
							$('#cal-date-end').val(moment(end).format('YYYY-MM-DD'));

							//reset all inputs
							$('#showAdvanced').find('.advanced-pricing-row:not(:last)').remove();
							$('#dateEdit').find('input[type!="hidden"]').val('');
							$('#dateEdit').find('option:selected').prop('selected', false);
							$('#cal-advanced').prop('checked', false);
							$('#showAdvanced').hide();

							//if already has data, show modal1
							if (typeof rawData[moment(start).format('YYYY-MM-DD')] !== 'undefined')
							{
		//						$('#dateInfo').modal('show');
								$('#dateEdit').modal('show');

								var dayData = rawData[moment(start).format('YYYY-MM-DD')];

								$('#cal-duration').val(dayData[0].minimum_hours);
								$('#cal-spend').val(dayData[0].minimum_spend);
								$('#cal-from').val(moment(dayData[0].business_start, 'YYYY-MM-DD HH:mm:ss').format('HHmm'));
								$('#cal-to').val(moment(dayData[0].business_end, 'YYYY-MM-DD HH:mm:ss').format('HHmm'));

								if (dayData.length > 1)
								{
									$('#cal-advanced').prop('checked', true);
									$('#showAdvanced').show();

									var first = true;

									$.each(dayData, function(k, v)
									{
										if (first)
										{
											first = false;
										}
										else
										{
											$('.advanced-pricing-row:last').find('.cal-advanced-spend').val(this.minimum_spend)
											$('.advanced-pricing-row:last').find('.cal-advanced-from').val(moment(this.rule_start, 'YYYY-MM-DD HH:mm:ss').format('HHmm'));
											$('.advanced-pricing-row:last').find('.cal-advanced-to').val(moment(this.rule_end, 'YYYY-MM-DD HH:mm:ss').format('HHmm'));
											$('.advanced-pricing-row:last').after($('.advanced-pricing-row:first').get(0).outerHTML);
										}
									});
								}
							}
							else
							{
								$('#dateEdit').modal('show');
							}
						},
						events: calendarData,
						timeFormat : 'HH:mm'
					});
/*
				},
				function(r)
				{
					alert('Error: ' + "\n" + r.message);
				}
			);
*/
			$(document).on('click', '#calendar-modal-edit', function(e)
			{
				$('#dateEdit').modal('show');
			});

			$(document).on('change', '#cal-advanced', function(e)
			{
				$('#showAdvanced').toggle();
			});

			$(document).on('click', '#calendar-add-slot', function(e)
			{
				e.preventDefault();
				$('.advanced-pricing-row:last').after($('.advanced-pricing-row:first').get(0).outerHTML);
				$('#calendar-del-slot').show();
			});

			$(document).on('click', '#calendar-del-slot', function(e)
			{
				e.preventDefault();
				$('.advanced-pricing-row:last').remove();

				if ($('.advanced-pricing-row').length === 1)
				{
					$('#calendar-del-slot').hide();
				}
			});

			$(document).on('click', '#calendar-modal-save', function(e)
			{
				e.preventDefault();

				if ($('#cal-advanced').is(':checked'))
				{
					var advancedVars = [];

					$('.cal-advanced-spend').each(function()
					{
						if ($(this).val() != '')
							advancedVars.push([ $(this).val() , $(this).parent().parent().parent().find('.cal-advanced-from').val() , $(this).parent().parent().parent().find('.cal-advanced-to').val() ]);
					})
				}

				ajaxReq('POST', '/admin/json/calendar/save',
					{
						'room_id'    : CALENDAR_ROOM_ID ,
						'from'       : $('#cal-from').val() ,
						'to'         : $('#cal-to').val() ,
						'min_hours'  : $('#cal-duration').val() ,
						'min_spend'  : $('#cal-spend').val() ,
						'date_start' : $('#cal-date-start').val() ,
						'date_end'   : $('#cal-date-end').val() ,
						'advanced'   : ((typeof advancedVars !== 'undefined') ? JSON.stringify(advancedVars) : '' )
					},
					function(r)
					{
						var start = moment($('#cal-date-start').val(), 'YYYY-MM-DD');
						var end   = moment($('#cal-date-end').val(), 'YYYY-MM-DD');
						var diff  = moment(end).diff(start, 'days');

						rawData[$('#cal-date-start').val()] = [];

						while (diff >= 1)
						{
							rawData[start] = [
							{
								minimum_hours  : $('#cal-duration').val(),
								minimum_spend  : $('#cal-spend').val(),
								business_start : start + ' ' + $('#cal-from').val().substring(0, 2) + ':00:00',
								business_end   : end + ' ' + $('#cal-to').val().substring(0, 2) + ':00:00'
							}];

							if (typeof advancedVars !== 'undefined')
							{
								advancedVars.each(function()
								{
									var advStart = moment(start + ' ' + this[1], 'YYYY-MM-DD HHmm');
									var advEnd   = moment(end + ' ' + this[2], 'YYYY-MM-DD HHmm');

									rawData[start].push(
									{
										minimum_spend : this[0],
										rule_start    : moment(advStart).format('YYYY-MM-DD HH:mm:ss'),
										rule_end      : moment(advEnd).format('YYYY-MM-DD HH:mm:ss')
									});
								});
							}

							start = start.add(1, 'd');
							end   = end.add(1, 'd');
							diff  = moment(end).diff(start, 'days');
						}

						calendarData = formatCalendarData(rawData);
						$('#full-calendar').fullCalendar('refetchEvents');
//						$('#full-calendar').fullCalendar('rerenderEvents');

						alert('The calendar has been successfully updated');
						$('#dateEdit').modal('hide');
					},
					function(r)
					{
						alert('Error: ' + "\n" + r.message);
					}
				);
			});
/*
			function formatCalendarData(raw)
			{
				var output = [];

				$.each(raw, function(k, v)
				{
					var first_end = this[0].business_end;

					if (v.length > 1)
					{
						var first      = true;
						var that       = this[0];
						var last_start = this[0].business_start;
						var last_end   = false;

						$.each(v, function()
						{
							if (first)
							{
								first = false;
							}
							else
							{
								if (moment(first_end, 'YYYY-MM-DD HH:mm:ss').diff(moment(this.rule_start, 'YYYY-MM-DD HH:mm:ss'), 'seconds') > 0)
								{
									first_end = this.rule_start;
								}

								if (last_end && moment(this.rule_start, 'YYYY-MM-DD HH:mm:ss').diff(moment(last_end, 'YYYY-MM-DD HH:mm:ss'), 'seconds') !== 0)
								{
									output.push(
									{
										title    : '$' + that.minimum_spend + ' (' + that.minimum_hours + ' hrs)' ,
										start    : last_end,
										end      : this.rule_end,
										editable : false
									});
								}

								last_end = this.rule_end;

								output.push(
								{
									title    : '$' + this.minimum_spend + ' (' + that.minimum_hours + ' hrs)' ,
									start    : this.rule_start,
									end      : this.rule_end,
									editable : false,
									color    : '#7cc142'
								});
							}
						});

						if (last_end && moment(that.business_end, 'YYYY-MM-DD HH:mm:ss').diff(moment(last_end, 'YYYY-MM-DD HH:mm:ss'), 'seconds') !== 0)
						{
							output.push(
							{
								title    : '$' + that.minimum_spend + ' (' + that.minimum_hours + ' hrs)',
								start    : last_end,
								end      : that.business_end,
								editable : false
							});
						}
					}

					if (first_end != this[0].business_start)
					{
						output.push(
						{
							title    : '$' + this[0].minimum_spend + ' (' + this[0].minimum_hours + ' hrs)',
							start    : this[0].business_start,
							end      : first_end,
							editable : false
						});
					}
				});

				return output;
			}
*/
		}

	// Misc --------------------------------------------------------
		
		$('input.ts-adults').TouchSpin(
		{
			min: 1,
			max: 500,
			step: 1,
			decimals: 0,
			boostat: 5,
			maxboostedstep: 50,
			postfix: 'adults'
		});

		$('input.ts-kids').TouchSpin(
		{
			min: 1,
			max: 500,
			step: 1,
			decimals: 0,
			boostat: 5,
			maxboostedstep: 50,
			postfix: 'kids'
		});

		$('input.ts-perc').TouchSpin({
			min: .5,
			max: 100,
			step: .1,
			decimals: 1,
			boostat: 2,
			maxboostedstep: 5,
			postfix: '%'
		});

		$('input.ts-dur').TouchSpin({
			min: 1,
			max: 24,
			step: .5,
			decimals: 1,
			boostat: 2,
			maxboostedstep: 5,
			postfix: 'hours'
		});

		$('select2-nosearch').select2(
		{
			minimumResultsForSearch: -1
		});

	// General Functions -------------------------------------------

		function alertBar(type, text, div, dismiss, only)
		{
			if (!div)
				var div = 'section.content';

			if (only)
				$('.alert').remove();

			$(div).prepend('<div class="alert alert-' + type + ((dismiss) ? ' alert-dismissable' : '') + '"><p>' + text + '</p></div>');
		}

		function ajaxReq(type, url, data, success, badreq)
		{
			$.ajax({
				type       : type,
				url        : url,
				data       : data,
				dataType   : 'json',
				statusCode :
				{
					200 : function (r)
					{
						success(r);
					},
					400: function (r)
					{
						if (typeof badreq == 'undefined')
						{
							alertBar('danger', 'Error: ' + r.responseJSON.message);
						}
						else
						{
							badreq(r.responseJSON);
						}
					},
					401: function (r)
					{
						if (typeof badreq == 'undefined')
						{
							alertBar('danger', 'Error: ' + r.responseJSON.message);
						}
						else
						{
							badreq(r.responseJSON);
						}
					},
					403 : function ()
					{
						window.location = '/login';
					},
					500 : function (r)
					{
						alert('Server Error');
					}
				}
			});
		}
});