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
						url: HOST_URL + 'api/get-users',
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
					title: 'Customer',
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
								<span class="text-muted font-weight-bold text-hover-primary">' + data.email + '</span>\
							</div>\
						</div>';

						return output;
					}
				},
				{
					field: 'status',
					title: 'status',
					template: function(row) {

						let index = null

						if (row.status == 'active') {
							
							index = 1;

						}else if (row.status == 'deactive') {
							
							index = 2;

						}else{
							index = 0;
						}

						var values = {
							1: {
								'title': 'Active',
								'class': ' label-light-primary'
							},
							2: {
								'title': 'Deactive',
								'class': ' label-light-danger'
							},
						};
						return '<span class="label font-weight-bold label-lg ' + values[index].class + ' label-inline">' + values[index].title + '</span>';
					},
				},
				{
					field: 'Actions',
					title: 'Actions',
					sortable: false,
					width: 130,
					overflow: 'visible',
					autoHide: false,
					template: function(data) {
						var activeHref = '<a href="/users/'+data.id+'/active" class=" btn btn-sm btn-outline-primary btn-text-primary btn-hover-primary btn-icon mr-2" title="Active User">\
												<i class="fas fa-user-check icon-sm"></i>\
											</a>\
											';
						var deactiveHref = '<a href="/users/'+data.id+'/deactive" class=" btn btn-sm btn-outline-danger btn-text-deactive btn-hover-deactive btn-icon mr-2" title="Deactive User">\
												<i class="fas fa-user-slash icon-sm"></i>\
											</a>\
											';
						var editHref = '<a href="/users/'+data.id+'/edit" class="btn btn-sm btn-outline-secondary btn-text-primary btn-hover-secondary btn-icon mr-2" title="Edit details">\
											<span class="svg-icon svg-icon-md">\
												<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">\
													<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">\
														<rect x="0" y="0" width="24" height="24"/>\
														<path d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953) "/>\
														<path d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>\
													</g>\
												</svg>\
											</span>\
										</a>\
										' ;
						var detailHref = '<a href="/users/'+data.id+'/edit" class="btn btn-sm btn-outline-secondary btn-text-primary btn-hover-secondary btn-icon mr-2" title="View User Documents">\
											<span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2020-10-29-133027/theme/html/demo1/dist/../src/media/svg/icons/Files/User-folder.svg-->\
												<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">\
													<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">\
														<rect x="0" y="0" width="24" height="24"/>\
														<path d="M3.5,21 L20.5,21 C21.3284271,21 22,20.3284271 22,19.5 L22,8.5 C22,7.67157288 21.3284271,7 20.5,7 L10,7 L7.43933983,4.43933983 C7.15803526,4.15803526 6.77650439,4 6.37867966,4 L3.5,4 C2.67157288,4 2,4.67157288 2,5.5 L2,19.5 C2,20.3284271 2.67157288,21 3.5,21 Z" fill="#000000" opacity="0.3"/>\
														<path d="M12,13 C10.8954305,13 10,12.1045695 10,11 C10,9.8954305 10.8954305,9 12,9 C13.1045695,9 14,9.8954305 14,11 C14,12.1045695 13.1045695,13 12,13 Z" fill="#000000" opacity="0.3"/>\
														<path d="M7.00036205,18.4995035 C7.21569918,15.5165724 9.36772908,14 11.9907452,14 C14.6506758,14 16.8360465,15.4332455 16.9988413,18.5 C17.0053266,18.6221713 16.9988413,19 16.5815,19 C14.5228466,19 11.463736,19 7.4041679,19 C7.26484009,19 6.98863236,18.6619875 7.00036205,18.4995035 Z" fill="#000000" opacity="0.3"/>\
													</g>\
												</svg><!--end::Svg Icon--></span>\
										</a>\
										' ;
						var div = '';
						if(data.status == "active" ){
							div = '<div class="d-flex">'+deactiveHref+editHref+detailHref+'</div>';
						}
						else if(data.status == "deactive"){
							div = '<div class="d-flex">'+activeHref+editHref+detailHref+'</div>';
						}
						else{
							div = '<div class="d-flex">'+activeHref+deactiveHref+editHref+detailHref+'</div>';
						}
						return div;

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
