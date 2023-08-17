"use strict";
// Class definition

var KTAppsUsersListDatatable = function() {
	// Private functions

	// basic demo
	var _demo = function() {
		var datatable = $('#kt_datatable').KTDatatable({
			// datasource definition
			data: {
				type: 'remote',
				source: {
					read: {
						url: HOST_URL + 'api/get-intakes',
						method: 'GET'
					},
				},
				pageSize: 10, // display 20 records per page
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
					title: 'Intake ID',
				},
                {
					field: 'user.name',
					title: 'Client Name',
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
								<span class="symbol-label font-size-h4 font-weight-bold">' + data.user.name.substring(0, 1) + '</span>\
							</div>\
							<div class="ml-4">\
								<div class="text-dark-75 font-weight-bolder font-size-lg mb-0">' + data.user.name + '</div>\
								<a href="#" class="text-muted font-weight-bold text-hover-primary">' + data.user.email + '</a>\
						    </div>';

						return output;
					}
				},
                {
					field: 'name',
					title: 'Name',
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
						    </div>';

						return output;
					}
				},
				{
					field: 'phone',
					title: 'phone',
				},
				{
					field: 'address_1',
					title: 'Street Address',
				},
				{
					field: 'city',
					title: 'City',
					template: function(row) {
						var output = '';

						output += '<div class="font-weight-bolder font-size-lg mb-0">' + row.state + '</div>';
						output += '<div class="font-weight-bold text-muted">Postal Code: ' + row.postal_code + '</div>';

						return output;
					}
				},
				{
					field: 'state',
					title: 'state',
				},
				{
					field: 'address_2',
					title: 'Street Address Line 2',
				},
				{
					field: 'language',
					title: 'language',
				},
				{
					field: 'gender',
					title: 'gender',
				},
				{
					field: 'age',
					title: 'age',
				}, {
					field: 'Actions',
					title: 'Actions',
					sortable: false,
					width: 130,
					overflow: 'visible',
					autoHide: false,
					template: function(data) {
						return '\
                            <div class="d-flex">\
                                <a href="/intakes/'+data.id+'/view" class="btn btn-sm btn-default btn-text-primary btn-hover-primary btn-icon mr-2" title="Edit details">\
                                    <i class="flaticon2-document"></i>\
                                </a>\
                                <form action="/intakes/delete/'+data.id+'" method="POST">\
                                    <button type="submit" class="btn btn-sm btn-default btn-text-primary btn-hover-primary btn-icon">\
                                        <span class="svg-icon svg-icon-md">\
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">\
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">\
                                                    <rect x="0" y="0" width="24" height="24"/>\
                                                    <path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero"/>\
                                                    <path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3"/>\
                                                </g>\
                                            </svg>\
                                        </span>\
                                    </button>\
                                </form>\
                            </div>\
	                    ';
					},
			}],
		});

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
