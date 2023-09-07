"use strict";
// Class definition

var KTAppsUsersListDatatable = function() {
	// Private functions

	var url = $(location).attr('href'),
    parts = url.split("/"),
    last_part = parts[parts.length-1];

	// basic demo
	var _demo = function() {
		var datatable = $('#kt_datatable').KTDatatable({
			// datasource definition
			data: {
				type: 'remote',
				source: {
					read: {
						url: HOST_URL + 'api/get-accessibility/'+last_part,
						method: 'GET'
					},
				},
				pageSize: 5, // display 20 records per page
				serverPaging: true,
				serverFiltering: true,
				serverSorting: true,
			},

			// layout definition
			layout: {
				scroll: false, // enable/disable datatable scroll both horizontal and vertical when needed.
				footer: false, // display/hide footer
			},

			// column sorting
			sortable: true,

			pagination: true,

			search: {
				input: $('#kt_subheader_search_form'),
				delay: 400,
				key: 'generalSearch'
			},

			// columns definition
			columns: [
				{
					field: 'id',
					title: '#',
					sortable: 'asc',
					width: 40,
					type: 'number',
					selector: false,
					textAlign: 'left',
					template: function(data) {
						return '<span class="font-weight-bolder">' + data.id + '</span>';
					}
				}, {
					field: 'name',
					title: 'Employee',
					width: 250,
					template: function(data) {

						var stateNo = KTUtil.getRandomInt(0, 7);
						var states = [
							'success',
							'primary',
							'danger',
							'success',
							'warning',
							'dark',
							'primary',
							'info'];
						var state = states[stateNo];

						var output = '<div class="d-flex align-items-center">\
							<div class="symbol symbol-40 symbol-light-'+state+' flex-shrink-0">\
								<span class="symbol-label font-size-h4 font-weight-bold">' + data.name.substring(0, 1) + '</span>\
							</div>\
							<div class="ml-4">\
								<div class="text-dark-75 font-weight-bolder font-size-lg mb-0">' + data.name + '</div>\
								<a href="#" class="text-muted font-weight-bold text-hover-primary">' + data.email + '</a>\
							</div>\
						</div>';

						return output;
					}
				}, {
					field: 'Actions',
					title: 'Actions',
					sortable: false,
					width: 130,
					overflow: 'visible',
					autoHide: false,
					template: function(data) {
						return '\
						<a href="/evaluations/accessibility/delete/'+data.id+'" class="btn btn-sm btn-outline-danger btn-icon mr-2" title="Edit details">\
								<i class="flaticon2-trash"></i>\
						</a>\
	                    ';
					},
				}],
		});

		console.log(datatable);
		$('#kt_datatable_search_status').on('change', function() {
			datatable.search($(this).val().toLowerCase(), 'Status');
		});

		$('#kt_datatable_search_type').on('change', function() {
			datatable.search($(this).val().toLowerCase(), 'Type');
		});

		$('#kt_datatable_search_status, #kt_datatable_search_type').selectpicker();
	};

	return {
		// public functions
		init: function() {
			_demo();
		},
	};
}();

jQuery(document).ready(function() {
	KTAppsUsersListDatatable.init();
});
