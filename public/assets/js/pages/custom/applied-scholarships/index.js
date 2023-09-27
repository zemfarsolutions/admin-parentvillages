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
						url: HOST_URL + 'api/get-applied-scholarships',
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
					field: 'scholarship_id',
					title: 'Scholarship Id',
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
					field: 'appartment',
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
					field: 'email',
					title: 'Email',
				},
				{
					field: 'date',
					title: 'Date',
                    template: function(data) {

                        let full_date = new Date(data.date);
                        return full_date.toString().slice(0, 15);
                    }
				},
				{
					field: 'scholarship.short_description',
					title: 'Scholarship',
				},
				{
					field: 'Actions',
					title: 'Actions',
					sortable: false,
					width: 150,
					overflow: 'visible',
					autoHide: false,
					template: function(data) {
						return '\
                            <div class="d-flex">\
                                <a href="/applicants/'+data.slug+'/view" class="btn btn-sm btn-outline-primary btn-text-primary btn-hover-primary btn-icon mr-2" title="Edit details">\
                                    <i class="flaticon2-document"></i>\
                                </a>\
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
