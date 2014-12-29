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
								window.location = '/admin/event/' + event.event_id;
							}

							if (event.start_time && event.end_time)
							{
								window.location = '/admin/events/0/date/none/' + event.start_time + '/' + event.end_time;
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
				var that = $(this);
				$(this).closest('.todolist_list').find('.todotext').toggleClass('strikethrough');
				
				ajaxReq('POST', '/admin/json/todo/completed', { 'todo_id' : $(this).parent().parent().parent().data('id') }, function(){}, function()
					{
						// toggle again if an error occured
						that.closest('.todolist_list').find('.todotext').toggleClass('strikethrough');
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
				var that  = $(this);

				if (!input)
					return false;

				ajaxReq('POST', '/admin/json/todo/edit', { 'todo_id' : $(this).parent().parent().data('id') , 'todo' : input }, function()
					{
						elm.text(input);
						that.closest('a.todo-edit-submit').html('<span class="glyphicon glyphicon-pencil"></span>');
						// hide submit icon and show edit icon
						that.toggle();
						that.parent().find('.todo-edit').show();
					}
				);
			});

			$(document).on('keydown', '.todo-edit-text', function(e)
			{
				if (e.keyCode == 13)
				{
					e.preventDefault();
					$(this).parent().parent().parent().find('.showbtns').find('.todo-edit-submit').click();
				}
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
/*
		var MutationObserver = window.MutationObserver || window.WebKitMutationObserver || window.MozMutationObserver;

		$.fn.attrchange = function(callback)
		{
			if (MutationObserver)
			{
				var options =
				{
					subtree    : false,
					attributes : true
				};

				var observer = new MutationObserver(function(mutations)
				{
					mutations.forEach(function(e)
					{
						callback.call(e.target, e.attributeName);
					});
				});

				return this.each(function()
				{
					observer.observe(this, options);
				});
			}
		}
*/
		$('#nq-food-extras').select2(
		{
			placeholder        : 'Package Addons',
			minimumInputLength : 0,
			multiple           : true,
			initSelection      : function(element, callback) { select2MultiInitVals(element, callback); },
			ajax               :
			{
				url         : '/admin/json/pricing/get_extras',
				type        : 'GET',
				dataType    : 'json',
				quietMillis : 250,
				data        : function (term, page) { return { menu_id : $('#nq-food').val() }; },
				results     : function (data, page) { return select2PackageAddons(data, page); }
			}
		}).select2('enable', false);

		$('#nq-foodkids-extras').select2(
		{
			placeholder        : 'Package Addons',
			minimumInputLength : 0,
			multiple           : true,
			initSelection      : function(element, callback) { select2MultiInitVals(element, callback); },
			ajax               :
			{
				url         : '/admin/json/pricing/get_extras',
				type        : 'GET',
				dataType    : 'json',
				quietMillis : 250,
				data        : function (term, page) { return { menu_id : $('#nq-foodkids').val() }; },
				results     : function (data, page) { return select2PackageAddons(data, page); }
			}
		}).select2('enable', false);

		$('#nq-drink-extras').select2(
		{
			placeholder        : 'Package Addons',
			minimumInputLength : 0,
			multiple           : true,
			initSelection      : function(element, callback) { select2MultiInitVals(element, callback); },
			ajax               :
			{
				url         : '/admin/json/pricing/get_extras',
				type        : 'GET',
				dataType    : 'json',
				quietMillis : 250,
				data        : function (term, page) { return { menu_id : $('#nq-drink').val() }; },
				results     : function (data, page) { return select2PackageAddons(data, page); }
			}
		}).select2('enable', false);

		$('#nq-drinkkids-extras').select2(
		{
			placeholder        : 'Package Addons',
			minimumInputLength : 0,
			multiple           : true,
			initSelection      : function(element, callback) { select2MultiInitVals(element, callback); },
			ajax               :
			{
				url         : '/admin/json/pricing/get_extras',
				type        : 'GET',
				dataType    : 'json',
				quietMillis : 250,
				data        : function (term, page) { return { menu_id : $('#nq-drinkkids').val() }; },
				results     : function (data, page) { return select2PackageAddons(data, page); }
			}
		}).select2('enable', false);

		$('#es-food-extras').select2(
		{
			placeholder        : 'Package Addons',
			minimumInputLength : 0,
			multiple           : true,
			initSelection      : select2MultiInitVals,
			formatSelection    : select2FormatSelection,
            id                 : function(e) { return e.id + ':' + e.text; },
			ajax               :
			{
				url         : '/admin/json/pricing/get_extras',
				type        : 'GET',
				dataType    : 'json',
				quietMillis : 250,
				data        : function (term, page) { return { menu_id : $('#es-food').val() }; },
				results     : function (data, page) { return select2PackageAddons(data, page); }
			}
		});

		$('#es-foodkids-extras').select2(
		{
			placeholder        : 'Package Addons',
			minimumInputLength : 0,
			multiple           : true,
			initSelection      : select2MultiInitVals,
			formatSelection    : select2FormatSelection,
            id                 : function(e) { return e.id + ':' + e.text; },
			ajax               :
			{
				url         : '/admin/json/pricing/get_extras',
				type        : 'GET',
				dataType    : 'json',
				quietMillis : 250,
				data        : function (term, page) { return { menu_id : $('#es-foodkids').val() }; },
				results     : function (data, page) { return select2PackageAddons(data, page); }
			}
		});

		$('#es-drink-extras').select2(
		{
			placeholder        : 'Package Addons',
			minimumInputLength : 0,
			multiple           : true,
			initSelection      : select2MultiInitVals,
			formatSelection    : select2FormatSelection,
            id                 : function(e) { return e.id + ':' + e.text; },
			ajax               :
			{
				url         : '/admin/json/pricing/get_extras',
				type        : 'GET',
				dataType    : 'json',
				quietMillis : 250,
				data        : function (term, page) { return { menu_id : $('#es-drink').val() }; },
				results     : function (data, page) { return select2PackageAddons(data, page); }
			}
		});

		$('#es-drinkkids-extras').select2(
		{
			placeholder        : 'Package Addons',
			minimumInputLength : 0,
			multiple           : true,
			initSelection      : select2MultiInitVals,
			formatSelection    : select2FormatSelection,
            id                 : function(e) { return e.id + ':' + e.text; },
			ajax               :
			{
				url         : '/admin/json/pricing/get_extras',
				type        : 'GET',
				dataType    : 'json',
				quietMillis : 250,
				data        : function (term, page) { return { menu_id : $('#es-drinkkids').val() }; },
				results     : function (data, page) { return select2PackageAddons(data, page); }
			}
		});

		$('.consume-parent').on('change', function(e)
		{
			if (!this.value)
			{
				$(this).parent().find('input.consume-extras').select2('enable', false);
				$(this).parent().find('input.consume-extras').select2('data', null);
			}
			else
			{
				$(this).parent().find('input.consume-extras').select2('enable', true);
				$(this).parent().find('input.consume-extras').select2('data', null);
			}
		});

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
					'title'                    : $('#ne-eventname').val() ,
					'type'                     : $('#ne-type').val() ,
					'room'                     : $('#ne-room').val() ,
					'date'                     : $('#ne-datetime').val() ,
					'length'                   : $('#ne-duration').val() ,
					'guests_adults'            : $('#ne-adults').val() ,
					'guests_kids'              : $('#ne-kids').val() ,
					'food_package'             : $('#nq-food').val() ,
					'food_package_extra'       : select2FixSave($('#nq-food-extras').val().split(',')) ,
					'food_package_kids'        : $('#nq-foodkids').val() ,
					'food_package_kids_extra'  : select2FixSave($('#nq-foodkids-extras').val().split(',')) ,
					'drink_package'            : $('#nq-drink').val() ,
					'drink_package_extra'      : select2FixSave($('#nq-drink-extras').val().split(',')) ,
					'drink_package_kids'       : $('#nq-drinkkids').val() ,
					'drink_package_kids_extra' : select2FixSave($('#nq-drinkkids-extras').val().split(',')) ,
					'addons'                   : JSON.stringify(addons) ,
					'discount'                 : $('#ne-discount').val() ,
					'client_id'                : $('#ne-client').val() ,
					'notes'                    : $('#ne-notes').val() ,
					'full_quote'               : ((btn.hasClass('isFullQuote')) ? '1' : '0') ,
					'confirmed'                : ((btn.hasClass('isConfirmed')) ? '1' : '0')
				},
				function(r)
				{
					//alertBar('info', 'Your event has been added');
					//$('#newEvent').modal('hide');
					window.location = '/admin/event/' + r.message;
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
					'title'                    : $('#nq-eventname').val() ,
					'type'                     : $('#nq-type').val() ,
					'room'                     : $('#nq-room').val() ,
					'date'                     : $('#nq-datetime').val() ,
					'length'                   : $('#nq-duration').val() ,
					'guests_adults'            : $('#nq-adults').val() ,
					'guests_kids'              : $('#nq-kids').val() ,
					'food_package'             : $('#nq-food').val() ,
					'food_package_extra'       : select2FixSave($('#nq-food-extras').val().split(',')) ,
					'food_package_kids'        : $('#nq-foodkids').val() ,
					'food_package_kids_extra'  : select2FixSave($('#nq-foodkids-extras').val().split(',')) ,
					'drink_package'            : $('#nq-drink').val() ,
					'drink_package_extra'      : select2FixSave($('#nq-drink-extras').val().split(',')) ,
					'drink_package_kids'       : $('#nq-drinkkids').val() ,
					'drink_package_kids_extra' : select2FixSave($('#nq-drinkkids-extras').val().split(',')) ,
					'addons'                   : JSON.stringify(addons) ,
					'discount'                 : $('#nq-discount').val() ,
					'client_id'                : $('#nq-client').val() ,
					'full_quote'               : ((btn.hasClass('isFullQuote')) ? '1' : '0') ,
					'confirmed'                : ((btn.hasClass('isConfirmed')) ? '1' : '0')
				},
				function(r)
				{
					//alertBar('info', 'Your quote has been added');
					//$('#newQuote').modal('hide');
					window.location = '/admin/event/' + r.message;
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
/*
		$('#newQuote .icheckbox_flat-red').attrchange(function(attrName)
		{
			if (attrName == 'class' && $(this).hasClass('active'))
			{
				$('.quoteText').fadeOut();
				generateNewQuote();
			}
		});
*/
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
				var that  = $(this);

				if (!input)
					return false;

				ajaxReq('POST', '/admin/json/event_notes/edit', { 'note_id' : $(this).parent().parent().data('id') , 'note' : input }, function()
					{
						elm.text(input);
						that.closest('a.event-notes-edit-submit').html('<span class="glyphicon glyphicon-pencil"></span>');
						// hide submit icon and show edit icon
						that.toggle();
						that.parent().find('.event-notes-edit').show();
					}
				);
			});

			$(document).on('keydown', '.event-notes-edit-text', function(e)
			{
				if (e.keyCode == 13)
				{
					e.preventDefault();
					$(this).parent().parent().parent().find('.showbtns').find('.event-notes-edit-submit').click();
				}
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
						'event_id'                 : EVENT_DETAIL_ID ,
						'food_package'             : $('#es-food').val() ,
						'food_package_extra'       : select2FixSave($('#es-food-extras').val()) ,
						'food_package_kids'        : $('#es-foodkids').val() ,
						'food_package_kids_extra'  : select2FixSave($('#es-foodkids-extras').val()) ,
						'drink_package'            : $('#es-drink').val() ,
						'drink_package_extra'      : select2FixSave($('#es-drink-extras').val()) ,
						'drink_package_kids'       : $('#es-drinkkids').val() ,
						'drink_package_kids_extra' : select2FixSave($('#es-drinkkids-extras').val()) ,
						'addons'                   : JSON.stringify(addons) ,
						'discount'                 : $('#es-discount').val() ,
						'notes'                    : $('#es-comments').val()
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
						'notes'                  : $('#ed-notes').val()
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

		function select2FixSave(data)
		{
			if (data == '')
				return '';

			if (typeof data == 'object')
				return JSON.stringify(data);

			var out = [];

			$.each(data.split(','), function()
			{
				out.push(this.split(':')[0]);
			});

			return JSON.stringify(out);
		}

		function select2PackageAddons(data, page)
		{
			var json = $.parseJSON(data.message);
			var out  = [];

			$.each(json, function(key, value)
			{
				out.push({ id : value.id , text : value.name + ' $' + value.price + 'pp' });
			});

			return { results : out };
		}

		function select2MultiInitVals(element, callback)
		{
			var data = [];

			$(element.val().split(",")).each(function(i)
			{
				var item = this.split(':');
				data.push({ id : item[0] , text : item[1] });
			});

			callback(data);
		}

		function select2FormatSelection(data)
		{
			return data.text;
		}

		function generateNewQuote()
		{
			var addons = [];
			$('.nq-addons:checked').each(function(){ addons.push($(this).val()); });

			ajaxReq('POST', '/admin/json/pricing/quote',
				{
					'room'                     : $('#nq-room').val() ,
					'date'                     : $('#nq-datetime').val() ,
					'length'                   : $('#nq-duration').val() ,
					'guests_adults'            : $('#nq-adults').val() ,
					'guests_kids'              : $('#nq-kids').val() ,
					'food_package'             : $('#nq-food').val() ,
					'food_package_extra'       : select2FixSave($('#nq-food-extras').val().split(',')) ,
					'food_package_kids'        : $('#nq-foodkids').val() ,
					'food_package_kids_extra'  : select2FixSave($('#nq-foodkids-extras').val().split(',')) ,
					'drink_package'            : $('#nq-drink').val() ,
					'drink_package_extra'      : select2FixSave($('#nq-drink-extras').val().split(',')) ,
					'drink_package_kids'       : $('#nq-drinkkids').val() ,
					'drink_package_kids_extra' : select2FixSave($('#nq-drinkkids-extras').val().split(',')) ,
					'addons'                   : JSON.stringify(addons) ,
					'discount'                 : $('#nq-discount').val()
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
					$('#quote-pp').text('$0.00');
					$('#quote-dc').text('$0.00');
					$('#quote-tax').text('$0.00');
					$('#quote-grat').text('$0.00');
					$('#quote-total').text('$0.00');
					$('.quoteText').fadeIn();
					//alert('Error: ' + "\n" + r.message);
				}
			);
		}

	// Calendar ----------------------------------------------------

		if ($('#full-calendar').length)
		{
			var timeslots;
			var dayslots;
			var calData;
			var fullCalendar;

			// 7 day calendar
			$(document).on('click', '.cal-day-basic', function(e)
			{
				openCalModal('day', $(this).data('day'));
			});

			// Main calendar
			ajaxReq('POST', '/admin/json/calendar/list',
				{
					'room_id' : CALENDAR_ROOM_ID
				},
				function(r)
				{
					var data  = $.parseJSON(r.message);
					timeslots = data.timeslot;
					dayslots  = data.dayslot;
					calData   = data.calendar;

					fullCalendar = $('#full-calendar').fullCalendar(
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
						allDaySlot      : false,
						disableDragging : true,
						slotEventOverlap: false,
						displayEventEnd :
						{
							month     : true,
							basicWeek : true,
							"default" : true
						},
						eventClick      : function(event)
						{
							if (event.event_id)
							{
								window.location = '/admin/event/' + event.event_id;
							}
						},
						selectable   : true,
						eventSources : [
						{
							editable      : false,
							allDayDefault : false
						}],
						eventRender  : function(event, element)
						{
							element.draggable = false;
							event.editable    = false;
						},
						select       : function(start,end,title,jsEvent)
						{
							if (end.diff(start, 'days') > 1)
							{
								fullCalendar.fullCalendar('unselect');
								return false;
							}

							openCalModal('adv', start, end);
						},
						dayRender    : function(date, cell)
						{
							var time = date.format('YYYY-MM-DD');
							var data = timeslots[time];

							if (typeof data != 'undefined')
							{
								if (typeof data[0]['open'] == "undefined" || data[0]['open'])
								{
									cell.html('<div class="main-cal-day-' + time + '" style="position:absolute;bottom:0;">Min. $<span>' + data[0].minimum_spend + '</span></div>');
								} 
								 else
								{
									cell.html('<div class="main-cal-day-' + time + '" style="position:absolute;bottom:0;"><span>Closed</span></div>');
								}
							}
							else
							{
								cell.html('<div class="main-cal-day-' + time + '" style="position:absolute;bottom:0;"></div>');
							}
						},
						events       : calData,
						timeFormat   : 'HH:mm'
					});
				},
				function(r)
				{
					alert('Error: ' + "\n" + r.message);
				}
			);

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

			$(document).on('click', '.advanced-pricing-close', function(e)
			{
				e.preventDefault();

				if ($('.advanced-pricing-row').length > 1)
				{
					$(this).parent().remove();
				}
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
						'open'       : ($('#openCheckbox').bootstrapSwitch('state') ? 1 : 0),
						'from'       : $('#cal-from').val() ,
						'to'         : $('#cal-to').val() ,
						'min_hours'  : $('#cal-duration').val() ,
						'min_spend'  : $('#cal-spend').val() ,
						'date_start' : $('#cal-date-start').val() ,
						'date_end'   : $('#cal-date-end').val() ,
						'advanced'   : ((typeof advancedVars !== 'undefined') ? JSON.stringify(advancedVars) : '' ) ,
						'type'       : $('#cal-type').val()
					},
					function(r)
					{
						if ($('#cal-type').val() == 'adv')
						{
							var start    = moment($('#cal-date-start').val(), 'YYYY-MM-DD');
							var end      = moment($('#cal-date-end').val(), 'YYYY-MM-DD');
							var diff     = moment(end).diff(start, 'days');
							var orig_end = moment($('#cal-date-end').val(), 'YYYY-MM-DD');

							timeslots[$('#cal-date-start').val()] = [];

							while (diff >= 1)
							{
								timeslots[start.format('YYYY-MM-DD')] = [
								{
									minimum_hours  : $('#cal-duration').val(),
									minimum_spend  : $('#cal-spend').val(),
									business_start : start.format('YYYY-MM-DD') + ' ' + $('#cal-from').val().substring(0, 2) + ':00:00',
									business_end   : end.format('YYYY-MM-DD') + ' ' + $('#cal-to').val().substring(0, 2) + ':00:00',
									open           : ($('#openCheckbox').bootstrapSwitch('state') ? 1 : 0),
								}];

								if (typeof advancedVars !== 'undefined')
								{
									$.each(advancedVars, function()
									{
										var advStart = moment(start.format('YYYY-MM-DD') + ' ' + this[1], 'YYYY-MM-DD HHmm');
										var advEnd   = moment(end.format('YYYY-MM-DD') + ' ' + this[2], 'YYYY-MM-DD HHmm');

										timeslots[start.format('YYYY-MM-DD')].push(
										{
											minimum_spend : this[0],
											rule_start    : advStart.format('YYYY-MM-DD HH:mm:ss'),
											rule_end      : advEnd.format('YYYY-MM-DD HH:mm:ss')
										});
									});
								}

								var elm = $('.main-cal-day-' + start.format('YYYY-MM-DD'));

								if (r.message != "opened")
								{
									//if (elm.find('span').length === 0)
									//{
										if ($('#openCheckbox').bootstrapSwitch('state'))
										{
											elm.html('Min. $<span>' + $('#cal-spend').val() + '</span>');
										}
										 else
										{
											elm.html('<span>Closed</span>');
										}
									//}
									//else
									//{
									//	elm.find('span').html('Min. $<span>' + $('#cal-spend').val() + '</span>');
									//}
								}
								 else
								{
									$('.main-cal-day-' + start.format('YYYY-MM-DD')).html('');
								}

								start = start.add(1, 'd');
								end   = end.add(1, 'd');
								diff  = orig_end.diff(start, 'days');
							}
						}
						else
						{
							if ($('#openCheckbox').bootstrapSwitch('state'))
							{
								//$('#cal-basic-' + $('#cal-date-start').val().substring(0, 3)).find('h3').text('$' + $('#cal-spend').val());
								$('#cal-basic-' + $('#cal-date-start').val().substring(0, 3)).html('Minimum<h3>$' + $('#cal-spend').val() + '</h3>');
							} 
							 else
							{
								$('#cal-basic-' + $('#cal-date-start').val().substring(0, 3)).html('<h3>Closed</h3>');
							}

							dayslots[$('#cal-date-start').val()] = [
							{
								minimum_hours  : $('#cal-duration').val(),
								minimum_spend  : $('#cal-spend').val(),
								business_start : $('#cal-from').val().substring(0, 2) + ':00:00',
								business_end   : $('#cal-to').val().substring(0, 2) + ':00:00',
								open           : ($('#openCheckbox').bootstrapSwitch('state') ? 1 : 0)
							}];

							if (typeof advancedVars !== 'undefined')
							{
								$.each(advancedVars, function()
								{
									dayslots[$('#cal-date-start').val()].push(
									{
										minimum_spend : this[0],
										rule_start    : this[1].substring(0, 2) + ':00:00',
										rule_end      : this[2].substring(0, 2) + ':00:00'
									});
								});
							}
					}

						alert('The calendar has been successfully updated');
						$('#dateEdit').modal('hide');
					},
					function(r)
					{
						alert('Error: ' + "\n" + r.message);
					}
				);
			});

			function openCalModal(type, start, end, open)
			{
				if (type == 'day')
				{
					var modalHeader = ucwords(start);
					$('#cal-date-start').val(start);
					$('#cal-date-end').val(start);
				}
				else
				{
					start = start.toString().substring(0, start.toString().indexOf('GMT'));
					end   = end.toString().substring(0, end.toString().indexOf('GMT'));
					
					var modalHeader = (moment(start).diff(end, 'days') == '-1') ? moment(start).format('MMMM D') : moment(start).format('MMMM D') + ' - ' + moment(end).format('MMMM D') ;
					$('#cal-date-start').val(moment(start).format('YYYY-MM-DD'));
					$('#cal-date-end').val(moment(end).format('YYYY-MM-DD'));
				}

				$('#dateInfo').find('.modal-title').text(modalHeader);
				$('#dateEdit').find('.modal-title').text(modalHeader);
				$('#cal-type').val(type);

				//reset all inputs
				$('#showAdvanced').find('.advanced-pricing-row:not(:last)').remove();
				$('#dateEdit').find('input[type!="hidden"]').val('');
				$('#dateEdit').find('option:selected').prop('selected', false);
				$('#cal-advanced').prop('checked', false);
				$('#showAdvanced').hide();

				$('#cal-from').prop('disabled', false);
				$('#cal-to').prop('disabled', false);
				$('#cal-duration').prop('disabled', false);
				$('#cal-spend').prop('disabled', false);
				$('#cal-advanced').prop('disabled', false);

				// setState doesn't seem to be working, so we'll just use this
				if (!$("#openCheckbox").bootstrapSwitch('state'))
					$("#openCheckbox").bootstrapSwitch('toggleState');

				$('#dateEdit').modal('show');

				//if already has data, show modal1
				if (type == 'day' && typeof dayslots[start] !== 'undefined')
				{
					var dayData = dayslots[start];

					if (dayData[0].open)
					{
						$('#cal-duration').val(dayData[0].minimum_hours);
						$('#cal-spend').val(dayData[0].minimum_spend);
						$('#cal-from').val(formatTime2Select(dayData[0].business_start));
						$('#cal-to').val(formatTime2Select(dayData[0].business_end));

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
									$('.advanced-pricing-row:last').find('.cal-advanced-from').val(formatTime2Select(this.rule_start));
									$('.advanced-pricing-row:last').find('.cal-advanced-to').val(formatTime2Select(this.rule_end));
									$('.advanced-pricing-row:last').after($('.advanced-pricing-row:first').get(0).outerHTML);
								}
							});
						}
					}
				}
				else if (typeof timeslots[moment(start).format('YYYY-MM-DD')] !== 'undefined')
				{
					var dayData = timeslots[moment(start).format('YYYY-MM-DD')];

					if (dayData[0].open)
					{
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
				}

				if (typeof dayData != 'undefined' && !dayData[0].open)
				{
					$('#cal-from').prop('disabled', true);
					$('#cal-to').prop('disabled', true);
					$('#cal-duration').prop('disabled', true);
					$('#cal-spend').prop('disabled', true);
					$('#cal-advanced').prop('disabled', true);
					$("#openCheckbox").bootstrapSwitch('toggleState');
				}
			}

			function formatTime2Select(time)
			{
				return time.replace(/:/g, '').substring(0, 4);
			}
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

		function ucwords(str)
		{
			return (str + '').replace(/^([a-z])|\s+([a-z])/g, function ($1)
			{
				return $1.toUpperCase();
			});
		}

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