<!DOCTYPE html>
<html lang="en">

	<!-- begin::Head -->
	<head>
		<base href="">
		<meta charset="utf-8" />
		<title>Nimap Infotech | Hirring</title>
		<meta name="description" content="Updates and statistics">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!--begin::Fonts -->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700|Roboto:300,400,500,600,700">

		<!--end::Fonts -->

		<!--begin::Page style(used by this page) -->
		 @yield('style')
		<!--end::Page style -->

		<!--begin::Page Vendors Styles(used by this page) -->

		<!--end::Page Vendors Styles -->

		<!--begin::Global Theme Styles(used by all pages) -->

		<!--begin:: Vendor Plugins -->
		<link rel="stylesheet" type="text/css" href="{{ asset('plugins/general/perfect-scrollbar/css/perfect-scrollbar.css')}}" />
		<link rel="stylesheet" type="text/css" href="{{ asset('plugins/general/tether/dist/css/tether.css')}}" />
		<link rel="stylesheet" type="text/css" href="{{ asset('plugins/general/bootstrap-datepicker/dist/css/bootstrap-datepicker3.css')}}" />
		<link rel="stylesheet" type="text/css" href="{{ asset('plugins/general/bootstrap-datetime-picker/css/bootstrap-datetimepicker.css')}}" />
		<link rel="stylesheet" type="text/css" href="{{ asset('plugins/general/bootstrap-timepicker/css/bootstrap-timepicker.css')}}" />
		<link rel="stylesheet" type="text/css" href="{{ asset('plugins/general/bootstrap-daterangepicker/daterangepicker.css')}}" />
		<link rel="stylesheet" type="text/css" href="{{ asset('plugins/general/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.css')}}" />
		<link rel="stylesheet" type="text/css" href="{{ asset('plugins/general/bootstrap-select/dist/css/bootstrap-select.css')}}" />
		<link rel="stylesheet" type="text/css" href="{{ asset('plugins/general/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.css')}}" />
		<link rel="stylesheet" type="text/css" href="{{ asset('plugins/general/select2/dist/css/select2.css')}}" />
		<link rel="stylesheet" type="text/css" href="{{ asset('plugins/general/ion-rangeslider/css/ion.rangeSlider.css')}}" />
		<link rel="stylesheet" type="text/css" href="{{ asset('plugins/general/nouislider/distribute/nouislider.css')}}" />
		<link rel="stylesheet" type="text/css" href="{{ asset('plugins/general/owl.carousel/dist/assets/owl.carousel.css')}}" />
		<link rel="stylesheet" type="text/css" href="{{ asset('plugins/general/owl.carousel/dist/assets/owl.theme.default.css')}}" />
		<link rel="stylesheet" type="text/css" href="{{ asset('plugins/general/dropzone/dist/dropzone.css')}}" />
		<link rel="stylesheet" type="text/css" href="{{ asset('plugins/general/quill/dist/quill.snow.css')}}" />
		<link rel="stylesheet" type="text/css" href="{{ asset('plugins/general/@yaireo/tagify/dist/tagify.css')}}" />
		<link rel="stylesheet" type="text/css" href="{{ asset('plugins/general/summernote/dist/summernote.css')}}" />
		<link rel="stylesheet" type="text/css" href="{{ asset('plugins/general/bootstrap-markdown/css/bootstrap-markdown.min.css')}}" />
		<link rel="stylesheet" type="text/css" href="{{ asset('plugins/general/animate.css/animate.css')}}" />
		<link rel="stylesheet" type="text/css" href="{{ asset('plugins/general/toastr/build/toastr.css')}}" />
		<link rel="stylesheet" type="text/css" href="{{ asset('plugins/general/dual-listbox/dist/dual-listbox.css')}}" />
		<link rel="stylesheet" type="text/css" href="{{ asset('plugins/general/morris.js/morris.css')}}" />
		<link rel="stylesheet" type="text/css" href="{{ asset('plugins/general/sweetalert2/dist/sweetalert2.css')}}" />
		<link rel="stylesheet" type="text/css" href="{{ asset('plugins/general/socicon/css/socicon.css')}}" />
		<link rel="stylesheet" type="text/css" href="{{ asset('plugins/general/plugins/line-awesome/css/line-awesome.css')}}" />
		<link rel="stylesheet" type="text/css" href="{{ asset('plugins/general/plugins/flaticon/flaticon.css')}}" />
		<link rel="stylesheet" type="text/css" href="{{ asset('plugins/general/plugins/flaticon2/flaticon.css')}}" />
		<link rel="stylesheet" type="text/css" href="{{ asset('plugins/general/@fortawesome/fontawesome-free/css/all.min.css')}}" />

		<!--end:: Vendor Plugins -->
		<link rel="stylesheet" type="text/css" href="{{ asset('css/style.bundle.css')}}" />

		<!--begin:: Vendor Plugins for custom pages -->
		<link rel="stylesheet" type="text/css" href="{{ asset('plugins/custom/plugins/jquery-ui/jquery-ui.min.css')}}" />
		<link rel="stylesheet" type="text/css" href="{{ asset('plugins/custom/@fullcalendar/core/main.css')}}" />
		<link rel="stylesheet" type="text/css" href="{{ asset('plugins/custom/@fullcalendar/daygrid/main.css')}}" />
		<link rel="stylesheet" type="text/css" href="{{ asset('plugins/custom/@fullcalendar/list/main.css')}}" />
		<link rel="stylesheet" type="text/css" href="{{ asset('plugins/custom/@fullcalendar/timegrid/main.css')}}" />
		<link rel="stylesheet" type="text/css" href="{{ asset('plugins/custom/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" />
		<link rel="stylesheet" type="text/css" href="{{ asset('plugins/custom/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}" />
		<link rel="stylesheet" type="text/css" href="{{ asset('plugins/custom/datatables.net-autofill-bs4/css/autoFill.bootstrap4.min.css')}}" />
		<link rel="stylesheet" type="text/css" href="{{ asset('plugins/custom/datatables.net-colreorder-bs4/css/colReorder.bootstrap4.min.css')}}" />
		<link rel="stylesheet" type="text/css" href="{{ asset('plugins/custom/datatables.net-fixedcolumns-bs4/css/fixedColumns.bootstrap4.min.css')}}" />
		<link rel="stylesheet" type="text/css" href="{{ asset('plugins/custom/datatables.net-fixedheader-bs4/css/fixedHeader.bootstrap4.min.css')}}" />
		<link rel="stylesheet" type="text/css" href="{{ asset('plugins/custom/datatables.net-keytable-bs4/css/keyTable.bootstrap4.min.css')}}" />
		<link rel="stylesheet" type="text/css" href="{{ asset('plugins/custom/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')}}" />
		<link rel="stylesheet" type="text/css" href="{{ asset('plugins/custom/datatables.net-rowgroup-bs4/css/rowGroup.bootstrap4.min.css')}}" />
		<link rel="stylesheet" type="text/css" href="{{ asset('plugins/custom/datatables.net-rowreorder-bs4/css/rowReorder.bootstrap4.min.css')}}" />
		<link rel="stylesheet" type="text/css" href="{{ asset('plugins/custom/datatables.net-scroller-bs4/css/scroller.bootstrap4.min.css')}}" />
		<link rel="stylesheet" type="text/css" href="{{ asset('plugins/custom/datatables.net-select-bs4/css/select.bootstrap4.min.css')}}" />
		<link rel="stylesheet" type="text/css" href="{{ asset('plugins/custom/jstree/dist/themes/default/style.css')}}" />
		<link rel="stylesheet" type="text/css" href="{{ asset('plugins/custom/jqvmap/dist/jqvmap.css')}}" />
		<link rel="stylesheet" type="text/css" href="{{ asset('plugins/custom/uppy/dist/uppy.min.css')}}" />

		<!--end:: Vendor Plugins for custom pages -->

		<!--end::Global Theme Styles -->

		<!--begin::Layout Skins(used by all pages) -->
		<link rel="stylesheet" type="text/css" href="{{ asset('css/skins/header/base/light.css')}}"  />
		<link rel="stylesheet" type="text/css" href="{{ asset('css/skins/header/menu/light.css')}}"  />
		<link rel="stylesheet" type="text/css" href="{{ asset('css/skins/brand/dark.css')}}" />
		<link rel="stylesheet" type="text/css" href="{{ asset('css/skins/aside/dark.css')}}" />

		<!--end::Layout Skins -->
		<link rel="shortcut icon" href="{{ asset('media/logos/favicon.ico')}}" />
	</head>
	<!-- begin::Body -->
	<body class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--fixed kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading">

		<!-- begin:: Page -->

		<!-- begin:: Header Mobile -->
		<div id="kt_header_mobile" class="kt-header-mobile  kt-header-mobile--fixed ">
			<div class="kt-header-mobile__logo">
				<a href="{{ url('home') }}">
					<img alt="Logo" src="{{ url('/docs/logo.png') }}" style="height: 45px;" />
				</a>
			</div>
			<div class="kt-header-mobile__toolbar">
				<button class="kt-header-mobile__toggler kt-header-mobile__toggler--left" id="kt_aside_mobile_toggler"><span></span></button>
				<button class="kt-header-mobile__toggler" id="kt_header_mobile_toggler"><span></span></button>
				<button class="kt-header-mobile__topbar-toggler" id="kt_header_mobile_topbar_toggler"><i class="flaticon-more"></i></button>
			</div>
		</div>


		<!-- end:: Header Mobile -->
		<div class="kt-grid kt-grid--hor kt-grid--root">
			<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">

				<!-- begin:: Aside -->
				<!-- Uncomment this to display the close button of the panel
				<button class="kt-aside-close " id="kt_aside_close_btn"><i class="la la-close"></i></button>-->
				<div class="kt-aside  kt-aside--fixed  kt-grid__item kt-grid kt-grid--desktop kt-grid--hor-desktop" id="kt_aside">

					<!-- begin:: Aside -->
					<div class="kt-aside__brand kt-grid__item " id="kt_aside_brand">
						<div class="kt-aside__brand-logo">
							<a href="{{ url('/') }}">
								<img alt="Logo" src="{{ url('/docs/logo.png') }}" style="height: 50px" />
							</a>
						</div>
						<div class="kt-aside__brand-tools">
							<button class="kt-aside__brand-aside-toggler" id="kt_aside_toggler">
								<span><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
										<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
											<polygon points="0 0 24 0 24 24 0 24" />
											<path d="M5.29288961,6.70710318 C4.90236532,6.31657888 4.90236532,5.68341391 5.29288961,5.29288961 C5.68341391,4.90236532 6.31657888,4.90236532 6.70710318,5.29288961 L12.7071032,11.2928896 C13.0856821,11.6714686 13.0989277,12.281055 12.7371505,12.675721 L7.23715054,18.675721 C6.86395813,19.08284 6.23139076,19.1103429 5.82427177,18.7371505 C5.41715278,18.3639581 5.38964985,17.7313908 5.76284226,17.3242718 L10.6158586,12.0300721 L5.29288961,6.70710318 Z" fill="#000000" fill-rule="nonzero" transform="translate(8.999997, 11.999999) scale(-1, 1) translate(-8.999997, -11.999999) " />
											<path d="M10.7071009,15.7071068 C10.3165766,16.0976311 9.68341162,16.0976311 9.29288733,15.7071068 C8.90236304,15.3165825 8.90236304,14.6834175 9.29288733,14.2928932 L15.2928873,8.29289322 C15.6714663,7.91431428 16.2810527,7.90106866 16.6757187,8.26284586 L22.6757187,13.7628459 C23.0828377,14.1360383 23.1103407,14.7686056 22.7371482,15.1757246 C22.3639558,15.5828436 21.7313885,15.6103465 21.3242695,15.2371541 L16.0300699,10.3841378 L10.7071009,15.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(15.999997, 11.999999) scale(-1, 1) rotate(-270.000000) translate(-15.999997, -11.999999) " />
										</g>
									</svg></span>
								<span><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
										<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
											<polygon points="0 0 24 0 24 24 0 24" />
											<path d="M12.2928955,6.70710318 C11.9023712,6.31657888 11.9023712,5.68341391 12.2928955,5.29288961 C12.6834198,4.90236532 13.3165848,4.90236532 13.7071091,5.29288961 L19.7071091,11.2928896 C20.085688,11.6714686 20.0989336,12.281055 19.7371564,12.675721 L14.2371564,18.675721 C13.863964,19.08284 13.2313966,19.1103429 12.8242777,18.7371505 C12.4171587,18.3639581 12.3896557,17.7313908 12.7628481,17.3242718 L17.6158645,12.0300721 L12.2928955,6.70710318 Z" fill="#000000" fill-rule="nonzero" />
											<path d="M3.70710678,15.7071068 C3.31658249,16.0976311 2.68341751,16.0976311 2.29289322,15.7071068 C1.90236893,15.3165825 1.90236893,14.6834175 2.29289322,14.2928932 L8.29289322,8.29289322 C8.67147216,7.91431428 9.28105859,7.90106866 9.67572463,8.26284586 L15.6757246,13.7628459 C16.0828436,14.1360383 16.1103465,14.7686056 15.7371541,15.1757246 C15.3639617,15.5828436 14.7313944,15.6103465 14.3242754,15.2371541 L9.03007575,10.3841378 L3.70710678,15.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(9.000003, 11.999999) rotate(-270.000000) translate(-9.000003, -11.999999) " />
										</g>
									</svg></span>
							</button>

							<!--
			<button class="kt-aside__brand-aside-toggler kt-aside__brand-aside-toggler--left" id="kt_aside_toggler"><span></span></button>
			-->
						</div>
					</div>

					<!-- end:: Aside -->

					<!-- begin:: Aside Menu -->
					<div class="kt-aside-menu-wrapper kt-grid__item kt-grid__item--fluid" id="kt_aside_menu_wrapper">
						<div id="kt_aside_menu" class="kt-aside-menu " data-ktmenu-vertical="1" data-ktmenu-scroll="1" data-ktmenu-dropdown-timeout="500">
							<ul class="kt-menu__nav ">
								<li class="kt-menu__item  kt-menu__item--active" aria-haspopup="true"><a href="{{ url('/') }}" class="kt-menu__link "><span class="kt-menu__link-icon"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<polygon points="0 0 24 0 24 24 0 24" />
													<path d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z" fill="#000000" fill-rule="nonzero" />
													<path d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z" fill="#000000" opacity="0.3" />
												</g>
											</svg></span><span class="kt-menu__link-text">Dashboard</span></a></li>
											<li class="kt-menu__section ">
									<h4 class="kt-menu__section-text">Invoice Masters</h4>
									<i class="kt-menu__section-icon flaticon-more-v2"></i>
								</li>
								<li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
									<a href="{{ url('invoice') }}" class="kt-menu__link kt-menu__toggle"><span class="kt-menu__link-icon"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
									<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
										<rect x="0" y="0" width="24" height="24" />
										<rect fill="#000000" x="4" y="4" width="7" height="7" rx="1.5" />
										<path d="M5.5,13 L9.5,13 C10.3284271,13 11,13.6715729 11,14.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,14.5 C4,13.6715729 4.67157288,13 5.5,13 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,9.5 C20,10.3284271 19.3284271,11 18.5,11 L14.5,11 C13.6715729,11 13,10.3284271 13,9.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z M14.5,13 L18.5,13 C19.3284271,13 20,13.6715729 20,14.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,14.5 C13,13.6715729 13.6715729,13 14.5,13 Z" fill="#000000" opacity="0.3" />
									</g>
									</svg></span><span class="kt-menu__link-text">Invoice Status</span></a>
								</li>
								<li class="kt-menu__section ">
									<h4 class="kt-menu__section-text">Masters</h4>
									<i class="kt-menu__section-icon flaticon-more-v2"></i>
								</li>

								

								<li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
									<a href="{{ url('viewresource') }}" class="kt-menu__link kt-menu__toggle"><span class="kt-menu__link-icon"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
									<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
										<rect x="0" y="0" width="24" height="24" />
										<rect fill="#000000" x="4" y="4" width="7" height="7" rx="1.5" />
										<path d="M5.5,13 L9.5,13 C10.3284271,13 11,13.6715729 11,14.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,14.5 C4,13.6715729 4.67157288,13 5.5,13 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,9.5 C20,10.3284271 19.3284271,11 18.5,11 L14.5,11 C13.6715729,11 13,10.3284271 13,9.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z M14.5,13 L18.5,13 C19.3284271,13 20,13.6715729 20,14.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,14.5 C13,13.6715729 13.6715729,13 14.5,13 Z" fill="#000000" opacity="0.3" />
									</g>
									</svg></span><span class="kt-menu__link-text">Resource Master</span></a>
								</li>
								<li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
									<a href="{{ url('viewclient') }}" class="kt-menu__link kt-menu__toggle"><span class="kt-menu__link-icon"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
									<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
										<rect x="0" y="0" width="24" height="24" />
										<rect fill="#000000" x="4" y="4" width="7" height="7" rx="1.5" />
										<path d="M5.5,13 L9.5,13 C10.3284271,13 11,13.6715729 11,14.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,14.5 C4,13.6715729 4.67157288,13 5.5,13 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,9.5 C20,10.3284271 19.3284271,11 18.5,11 L14.5,11 C13.6715729,11 13,10.3284271 13,9.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z M14.5,13 L18.5,13 C19.3284271,13 20,13.6715729 20,14.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,14.5 C13,13.6715729 13.6715729,13 14.5,13 Z" fill="#000000" opacity="0.3" />
									</g>
									</svg></span><span class="kt-menu__link-text">Client Master</span></a>
								</li>
								<li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
									<a href="{{ url('viewaccountant') }}" class="kt-menu__link kt-menu__toggle"><span class="kt-menu__link-icon"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
									<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
										<rect x="0" y="0" width="24" height="24" />
										<rect fill="#000000" x="4" y="4" width="7" height="7" rx="1.5" />
										<path d="M5.5,13 L9.5,13 C10.3284271,13 11,13.6715729 11,14.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,14.5 C4,13.6715729 4.67157288,13 5.5,13 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,9.5 C20,10.3284271 19.3284271,11 18.5,11 L14.5,11 C13.6715729,11 13,10.3284271 13,9.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z M14.5,13 L18.5,13 C19.3284271,13 20,13.6715729 20,14.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,14.5 C13,13.6715729 13.6715729,13 14.5,13 Z" fill="#000000" opacity="0.3" />
									</g>
									</svg></span><span class="kt-menu__link-text">Account Master</span></a>
								</li>
								<li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
									<a href="{{ url('viewtechnology') }}" class="kt-menu__link kt-menu__toggle"><span class="kt-menu__link-icon"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
									<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
										<rect x="0" y="0" width="24" height="24" />
										<rect fill="#000000" x="4" y="4" width="7" height="7" rx="1.5" />
										<path d="M5.5,13 L9.5,13 C10.3284271,13 11,13.6715729 11,14.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,14.5 C4,13.6715729 4.67157288,13 5.5,13 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,9.5 C20,10.3284271 19.3284271,11 18.5,11 L14.5,11 C13.6715729,11 13,10.3284271 13,9.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z M14.5,13 L18.5,13 C19.3284271,13 20,13.6715729 20,14.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,14.5 C13,13.6715729 13.6715729,13 14.5,13 Z" fill="#000000" opacity="0.3" />
									</g>
									</svg></span><span class="kt-menu__link-text">Technology Master</span></a>
								</li>
								<li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
									<a href="{{ url('viewjsettings') }}" class="kt-menu__link kt-menu__toggle"><span class="kt-menu__link-icon"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
									<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
										<rect x="0" y="0" width="24" height="24" />
										<rect fill="#000000" x="4" y="4" width="7" height="7" rx="1.5" />
										<path d="M5.5,13 L9.5,13 C10.3284271,13 11,13.6715729 11,14.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,14.5 C4,13.6715729 4.67157288,13 5.5,13 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,9.5 C20,10.3284271 19.3284271,11 18.5,11 L14.5,11 C13.6715729,11 13,10.3284271 13,9.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z M14.5,13 L18.5,13 C19.3284271,13 20,13.6715729 20,14.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,14.5 C13,13.6715729 13.6715729,13 14.5,13 Z" fill="#000000" opacity="0.3" />
									</g>
									</svg></span><span class="kt-menu__link-text">Settings</span></a>
								</li>
							<!-- 	<li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><span class="kt-menu__link-icon"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<rect x="0" y="0" width="24" height="24" />
													<path d="M5,5 L5,15 C5,15.5948613 5.25970314,16.1290656 5.6719139,16.4954176 C5.71978107,16.5379595 5.76682388,16.5788906 5.81365532,16.6178662 C5.82524933,16.6294602 15,7.45470952 15,7.45470952 C15,6.9962515 15,6.17801499 15,5 L5,5 Z M5,3 L15,3 C16.1045695,3 17,3.8954305 17,5 L17,15 C17,17.209139 15.209139,19 13,19 L7,19 C4.790861,19 3,17.209139 3,15 L3,5 C3,3.8954305 3.8954305,3 5,3 Z" fill="#000000" fill-rule="nonzero" transform="translate(10.000000, 11.000000) rotate(-315.000000) translate(-10.000000, -11.000000) " />
													<path d="M20,22 C21.6568542,22 23,20.6568542 23,19 C23,17.8954305 22,16.2287638 20,14 C18,16.2287638 17,17.8954305 17,19 C17,20.6568542 18.3431458,22 20,22 Z" fill="#000000" opacity="0.3" />
												</g>
											</svg></span><span class="kt-menu__link-text">Resource Master</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
									<div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
										<ul class="kt-menu__subnav">
											<li class="kt-menu__item " aria-haspopup="true"><a href="{{ url('viewresource') }}" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">view</span></a></li>
											<li class="kt-menu__item " aria-haspopup="true"><a href="layout/skins/aside-light.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Light Aside</span></a></li>
											<li class="kt-menu__item " aria-haspopup="true"><a href="layout/skins/header-dark.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Dark Header</span></a></li>
										</ul>
									</div>
								</li> -->
							<!-- 	<li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="" class="kt-menu__link kt-menu__toggle"><span class="kt-menu__link-icon"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<rect x="0" y="0" width="24" height="24" />
													<rect fill="#000000" x="4" y="4" width="7" height="7" rx="1.5" />
													<path d="M5.5,13 L9.5,13 C10.3284271,13 11,13.6715729 11,14.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,14.5 C4,13.6715729 4.67157288,13 5.5,13 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,9.5 C20,10.3284271 19.3284271,11 18.5,11 L14.5,11 C13.6715729,11 13,10.3284271 13,9.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z M14.5,13 L18.5,13 C19.3284271,13 20,13.6715729 20,14.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,14.5 C13,13.6715729 13.6715729,13 14.5,13 Z" fill="#000000" opacity="0.3" />
												</g>
											</svg></span><span class="kt-menu__link-text">Applications</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
									<div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
										<ul class="kt-menu__subnav">
											<li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true"><span class="kt-menu__link"><span class="kt-menu__link-text">Applications</span></span></li>
											<li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-bullet kt-menu__link-bullet--line"><span></span></i><span class="kt-menu__link-text">Users</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
												<div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
													<ul class="kt-menu__subnav">
														<li class="kt-menu__item " aria-haspopup="true"><a href="custom/apps/user/list-default.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">List - Default</span></a></li>
														<li class="kt-menu__item " aria-haspopup="true"><a href="custom/apps/user/list-datatable.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">List - Datatable</span></a></li>
														<li class="kt-menu__item " aria-haspopup="true"><a href="custom/apps/user/list-columns-1.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">List - Columns 1</span></a></li>
														<li class="kt-menu__item " aria-haspopup="true"><a href="custom/apps/user/list-columns-2.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">List - Columns 2</span></a></li>
														<li class="kt-menu__item " aria-haspopup="true"><a href="custom/apps/user/add-user.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Add User</span></a></li>
														<li class="kt-menu__item " aria-haspopup="true"><a href="custom/apps/user/edit-user.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Edit User</span></a></li>
														<li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Profile 1</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
															<div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
																<ul class="kt-menu__subnav">
																	<li class="kt-menu__item " aria-haspopup="true"><a href="custom/apps/user/profile-1/overview.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--line"><span></span></i><span class="kt-menu__link-text">Overview</span></a></li>
																	<li class="kt-menu__item " aria-haspopup="true"><a href="custom/apps/user/profile-1/personal-information.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--line"><span></span></i><span class="kt-menu__link-text">Personal Information</span></a></li>
																	<li class="kt-menu__item " aria-haspopup="true"><a href="custom/apps/user/profile-1/account-information.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--line"><span></span></i><span class="kt-menu__link-text">Account Information</span></a></li>
																	<li class="kt-menu__item " aria-haspopup="true"><a href="custom/apps/user/profile-1/change-password.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--line"><span></span></i><span class="kt-menu__link-text">Change Password</span></a></li>
																	<li class="kt-menu__item " aria-haspopup="true"><a href="custom/apps/user/profile-1/email-settings.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--line"><span></span></i><span class="kt-menu__link-text">Email Settings</span></a></li>
																</ul>
															</div>
														</li>
														<li class="kt-menu__item " aria-haspopup="true"><a href="custom/apps/user/profile-2.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Profile 2</span></a></li>
														<li class="kt-menu__item " aria-haspopup="true"><a href="custom/apps/user/profile-3.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Profile 3</span></a></li>
													</ul>
												</div>
											</li>
											<li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-bullet kt-menu__link-bullet--line"><span></span></i><span class="kt-menu__link-text">Contacts</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
												<div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
													<ul class="kt-menu__subnav">
														<li class="kt-menu__item " aria-haspopup="true"><a href="custom/apps/contacts/list-columns.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">List - Columns</span></a></li>
														<li class="kt-menu__item " aria-haspopup="true"><a href="custom/apps/contacts/list-datatable.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">List - Datatable</span></a></li>
														<li class="kt-menu__item " aria-haspopup="true"><a href="custom/apps/contacts/view-contact.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">View Contact</span></a></li>
														<li class="kt-menu__item " aria-haspopup="true"><a href="custom/apps/contacts/add-contact.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Add Contact</span></a></li>
														<li class="kt-menu__item " aria-haspopup="true"><a href="custom/apps/contacts/edit-contact.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Edit Contact</span></a></li>
													</ul>
												</div>
											</li>
											<li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-bullet kt-menu__link-bullet--line"><span></span></i><span class="kt-menu__link-text">Projects</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
												<div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
													<ul class="kt-menu__subnav">
														<li class="kt-menu__item " aria-haspopup="true"><a href="custom/apps/projects/add-project.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Add Project</span></a></li>
													</ul>
												</div>
											</li>
											<li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-bullet kt-menu__link-bullet--line"><span></span></i><span class="kt-menu__link-text">Support Center</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
												<div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
													<ul class="kt-menu__subnav">
														<li class="kt-menu__item " aria-haspopup="true"><a href="custom/apps/support-center/home-1.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Home 1</span></a></li>
														<li class="kt-menu__item " aria-haspopup="true"><a href="custom/apps/support-center/home-2.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Home 2</span></a></li>
														<li class="kt-menu__item " aria-haspopup="true"><a href="custom/apps/support-center/faq-1.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">FAQ 1</span></a></li>
														<li class="kt-menu__item " aria-haspopup="true"><a href="custom/apps/support-center/faq-2.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">FAQ 2</span></a></li>
														<li class="kt-menu__item " aria-haspopup="true"><a href="custom/apps/support-center/faq-3.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">FAQ 3</span></a></li>
														<li class="kt-menu__item " aria-haspopup="true"><a href="custom/apps/support-center/feedback.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Feedback</span></a></li>
														<li class="kt-menu__item " aria-haspopup="true"><a href="custom/apps/support-center/license.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">License</span></a></li>
													</ul>
												</div>
											</li>
											<li class="kt-menu__item " aria-haspopup="true"><a href="custom/apps/inbox.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--line"><span></span></i><span class="kt-menu__link-text">Inbox</span><span class="kt-menu__link-badge"><span class="kt-badge kt-badge--danger kt-badge--inline">new</span></span></a></li>
										</ul>
									</div>
								</li> -->
						<!-- 		<li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><span class="kt-menu__link-icon"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<rect x="0" y="0" width="24" height="24" />
													<rect fill="#000000" opacity="0.3" x="4" y="4" width="8" height="16" />
													<path d="M6,18 L9,18 C9.66666667,18.1143819 10,18.4477153 10,19 C10,19.5522847 9.66666667,19.8856181 9,20 L4,20 L4,15 C4,14.3333333 4.33333333,14 5,14 C5.66666667,14 6,14.3333333 6,15 L6,18 Z M18,18 L18,15 C18.1143819,14.3333333 18.4477153,14 19,14 C19.5522847,14 19.8856181,14.3333333 20,15 L20,20 L15,20 C14.3333333,20 14,19.6666667 14,19 C14,18.3333333 14.3333333,18 15,18 L18,18 Z M18,6 L15,6 C14.3333333,5.88561808 14,5.55228475 14,5 C14,4.44771525 14.3333333,4.11438192 15,4 L20,4 L20,9 C20,9.66666667 19.6666667,10 19,10 C18.3333333,10 18,9.66666667 18,9 L18,6 Z M6,6 L6,9 C5.88561808,9.66666667 5.55228475,10 5,10 C4.44771525,10 4.11438192,9.66666667 4,9 L4,4 L9,4 C9.66666667,4 10,4.33333333 10,5 C10,5.66666667 9.66666667,6 9,6 L6,6 Z" fill="#000000" fill-rule="nonzero" />
												</g>
											</svg></span><span class="kt-menu__link-text">Pages</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
									<div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
										<ul class="kt-menu__subnav">
											<li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true"><span class="kt-menu__link"><span class="kt-menu__link-text">Pages</span></span></li>
											<li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Wizard</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
												<div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
													<ul class="kt-menu__subnav">
														<li class="kt-menu__item " aria-haspopup="true"><a href="custom/pages/wizard/wizard-1.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Wizard 1</span></a></li>
														<li class="kt-menu__item " aria-haspopup="true"><a href="custom/pages/wizard/wizard-2.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Wizard 2</span></a></li>
														<li class="kt-menu__item " aria-haspopup="true"><a href="custom/pages/wizard/wizard-3.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Wizard 3</span></a></li>
														<li class="kt-menu__item " aria-haspopup="true"><a href="custom/pages/wizard/wizard-4.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Wizard 4</span></a></li>
													</ul>
												</div>
											</li>
											<li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">FAQ</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
												<div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
													<ul class="kt-menu__subnav">
														<li class="kt-menu__item " aria-haspopup="true"><a href="custom/pages/faq/faq-1.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">FAQ 1</span></a></li>
													</ul>
												</div>
											</li>
											<li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">User Pages</span><span class="kt-menu__link-badge"><span class="kt-badge kt-badge--rounded kt-badge--brand">2</span></span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
												<div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
													<ul class="kt-menu__subnav">
														<li class="kt-menu__item " aria-haspopup="true"><a href="custom/pages/user/login-1.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Login 1</span></a></li>
														<li class="kt-menu__item " aria-haspopup="true"><a href="custom/pages/user/login-2.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Login 2</span></a></li>
														<li class="kt-menu__item " aria-haspopup="true"><a href="custom/pages/user/login-3.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Login 3</span></a></li>
														<li class="kt-menu__item " aria-haspopup="true"><a href="custom/pages/user/login-4.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Login 4</span></a></li>
														<li class="kt-menu__item " aria-haspopup="true"><a href="custom/pages/user/login-5.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Login 5</span></a></li>
														<li class="kt-menu__item " aria-haspopup="true"><a href="custom/pages/user/login-6.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Login 6</span></a></li>
													</ul>
												</div>
											</li>
											<li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Error Pages</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
												<div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
													<ul class="kt-menu__subnav">
														<li class="kt-menu__item " aria-haspopup="true"><a href="custom/pages/error/error-1.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Error 1</span></a></li>
														<li class="kt-menu__item " aria-haspopup="true"><a href="custom/pages/error/error-2.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Error 2</span></a></li>
														<li class="kt-menu__item " aria-haspopup="true"><a href="custom/pages/error/error-3.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Error 3</span></a></li>
														<li class="kt-menu__item " aria-haspopup="true"><a href="custom/pages/error/error-4.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Error 4</span></a></li>
														<li class="kt-menu__item " aria-haspopup="true"><a href="custom/pages/error/error-5.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Error 5</span></a></li>
														<li class="kt-menu__item " aria-haspopup="true"><a href="custom/pages/error/error-6.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Error 6</span></a></li>
													</ul>
												</div>
											</li>
										</ul>
									</div>
								</li> -->
								<li class="kt-menu__section ">
									<h4 class="kt-menu__section-text">Process</h4>
									<i class="kt-menu__section-icon flaticon-more-v2"></i>
								</li>
								<li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
									<a href="{{ url('viewInterview') }}" class="kt-menu__link kt-menu__toggle"><span class="kt-menu__link-icon"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
									<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<rect x="0" y="0" width="24" height="24" />
													<path d="M5,5 L5,15 C5,15.5948613 5.25970314,16.1290656 5.6719139,16.4954176 C5.71978107,16.5379595 5.76682388,16.5788906 5.81365532,16.6178662 C5.82524933,16.6294602 15,7.45470952 15,7.45470952 C15,6.9962515 15,6.17801499 15,5 L5,5 Z M5,3 L15,3 C16.1045695,3 17,3.8954305 17,5 L17,15 C17,17.209139 15.209139,19 13,19 L7,19 C4.790861,19 3,17.209139 3,15 L3,5 C3,3.8954305 3.8954305,3 5,3 Z" fill="#000000" fill-rule="nonzero" transform="translate(10.000000, 11.000000) rotate(-315.000000) translate(-10.000000, -11.000000) " />
													<path d="M20,22 C21.6568542,22 23,20.6568542 23,19 C23,17.8954305 22,16.2287638 20,14 C18,16.2287638 17,17.8954305 17,19 C17,20.6568542 18.3431458,22 20,22 Z" fill="#000000" opacity="0.3" />
												</g>
									</svg></span><span class="kt-menu__link-text">Interview</span></a>
								</li>
								<li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
									<a href="{{ url('viewjoinings') }}" class="kt-menu__link kt-menu__toggle"><span class="kt-menu__link-icon"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
								<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<rect x="0" y="0" width="24" height="24" />
													<path d="M2.56066017,10.6819805 L4.68198052,8.56066017 C5.26776695,7.97487373 6.21751442,7.97487373 6.80330086,8.56066017 L8.9246212,10.6819805 C9.51040764,11.267767 9.51040764,12.2175144 8.9246212,12.8033009 L6.80330086,14.9246212 C6.21751442,15.5104076 5.26776695,15.5104076 4.68198052,14.9246212 L2.56066017,12.8033009 C1.97487373,12.2175144 1.97487373,11.267767 2.56066017,10.6819805 Z M14.5606602,10.6819805 L16.6819805,8.56066017 C17.267767,7.97487373 18.2175144,7.97487373 18.8033009,8.56066017 L20.9246212,10.6819805 C21.5104076,11.267767 21.5104076,12.2175144 20.9246212,12.8033009 L18.8033009,14.9246212 C18.2175144,15.5104076 17.267767,15.5104076 16.6819805,14.9246212 L14.5606602,12.8033009 C13.9748737,12.2175144 13.9748737,11.267767 14.5606602,10.6819805 Z" fill="#000000" opacity="0.3" />
													<path d="M8.56066017,16.6819805 L10.6819805,14.5606602 C11.267767,13.9748737 12.2175144,13.9748737 12.8033009,14.5606602 L14.9246212,16.6819805 C15.5104076,17.267767 15.5104076,18.2175144 14.9246212,18.8033009 L12.8033009,20.9246212 C12.2175144,21.5104076 11.267767,21.5104076 10.6819805,20.9246212 L8.56066017,18.8033009 C7.97487373,18.2175144 7.97487373,17.267767 8.56066017,16.6819805 Z M8.56066017,4.68198052 L10.6819805,2.56066017 C11.267767,1.97487373 12.2175144,1.97487373 12.8033009,2.56066017 L14.9246212,4.68198052 C15.5104076,5.26776695 15.5104076,6.21751442 14.9246212,6.80330086 L12.8033009,8.9246212 C12.2175144,9.51040764 11.267767,9.51040764 10.6819805,8.9246212 L8.56066017,6.80330086 C7.97487373,6.21751442 7.97487373,5.26776695 8.56066017,4.68198052 Z" fill="#000000" />
												</g>
									</svg></span><span class="kt-menu__link-text">Joining</span></a>
								</li>
								<li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
									<a href="{{ route('nonjoining') }}" class="kt-menu__link kt-menu__toggle"><span class="kt-menu__link-icon"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
								<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<rect x="0" y="0" width="24" height="24" />
													<path d="M7,3 L17,3 C19.209139,3 21,4.790861 21,7 C21,9.209139 19.209139,11 17,11 L7,11 C4.790861,11 3,9.209139 3,7 C3,4.790861 4.790861,3 7,3 Z M7,9 C8.1045695,9 9,8.1045695 9,7 C9,5.8954305 8.1045695,5 7,5 C5.8954305,5 5,5.8954305 5,7 C5,8.1045695 5.8954305,9 7,9 Z" fill="#000000" />
													<path d="M7,13 L17,13 C19.209139,13 21,14.790861 21,17 C21,19.209139 19.209139,21 17,21 L7,21 C4.790861,21 3,19.209139 3,17 C3,14.790861 4.790861,13 7,13 Z M17,19 C18.1045695,19 19,18.1045695 19,17 C19,15.8954305 18.1045695,15 17,15 C15.8954305,15 15,15.8954305 15,17 C15,18.1045695 15.8954305,19 17,19 Z" fill="#000000" opacity="0.3" />
												</g>
									</svg></span><span class="kt-menu__link-text">Non Joining</span></a>
							</ul>
						</div>
					</div>

					<!-- end:: Aside Menu -->
				</div>

				<!-- end:: Aside -->

				<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper">

	<!-- begin:: Header -->
					<div id="kt_header" class="kt-header kt-grid__item  kt-header--fixed ">

						<!-- begin:: Header Menu -->

						<!-- Uncomment this to display the close button of the panel
							<button class="kt-header-menu-wrapper-close" id="kt_header_menu_mobile_close_btn"><i class="la la-close"></i></button>-->
						<div class="kt-header-menu-wrapper" id="kt_header_menu_wrapper">
							<div id="kt_header_menu" class="kt-header-menu kt-header-menu-mobile  kt-header-menu--layout-default ">
								<ul class="kt-menu__nav ">
								</ul>
							</div>
						</div>

						<!-- end:: Header Menu -->

						<!-- begin:: Header Topbar -->
						<div class="kt-header__topbar">

						<style>
							/* #dragableNote{
								position: absolute;
								z-index: 1000;
								width: 45px;
								height: 45px;
								background: #ffb822;
								border-radius: 25%;
								box-shadow: inset 1px 1px 1px 0px #ffeabd, #616161 2px 2px 5px;
								display: none;
							}

							#dragableNote i{
								font-size: 30px;
								margin: 8px 8px;
								color: #fff;
								font-weight: bold;
							} */
						</style>
						<!-- <a href="javascript:void(0)" id="dragableNote" onclick="openNotesModal()" title="Notes">
							<i class="la la-pencil"></i>
						</a> -->


							<!--begin: User Bar -->
							<div class="kt-header__topbar-item kt-header__topbar-item--user">
								<div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="0px,0px">
									<div class="kt-header__topbar-user">
										<span class="kt-header__topbar-welcome kt-hidden-mobile">Hi,</span>
										<span class="kt-header__topbar-username kt-hidden-mobile">Sean</span>
										<img class="kt-hidden" alt="Pic" src="media/users/300_25.jpg" />

										<!--use below badge element instead the user avatar to display username's first letter(remove kt-hidden class to display it) -->
										<span class="kt-badge kt-badge--username kt-badge--unified-success kt-badge--lg kt-badge--rounded kt-badge--bold">S</span>
									</div>
								</div>
								<div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-top-unround dropdown-menu-xl">

									<!--begin: Head -->
									<div class="kt-user-card kt-user-card--skin-dark kt-notification-item-padding-x" style="background-image: url(media/misc/bg-1.jpg)">
										<div class="kt-user-card__avatar">
											<img class="kt-hidden" alt="Pic" src="media/users/300_25.jpg" />

											<!--use below badge element instead the user avatar to display username's first letter(remove kt-hidden class to display it) -->
											<span class="kt-badge kt-badge--lg kt-badge--rounded kt-badge--bold kt-font-success">S</span>
										</div>
										<div class="kt-user-card__name">
											Sean Stone
										</div>
									</div>

									<!--end: Head -->

									<!--begin: Navigation -->
									<div class="kt-notification">
										<div class="kt-notification__custom kt-space-between">
											<a href="{{url('/logout')}}" target="" class="btn btn-label btn-label-brand btn-sm btn-bold">Sign Out</a>
										</div>
									</div>

									<!--end: Navigation -->
								</div>
							</div>

							<!--end: User Bar -->
						</div>

						<!-- end:: Header Topbar -->
					</div>

					<!-- end:: Header -->


				<!-- page content -->
				@include('inc.messages')
				@yield('content')
				<!-- End page content -->

				<!-- begin:: Footer -->
					<!-- <div class="kt-footer  kt-grid__item kt-grid kt-grid--desktop kt-grid--ver-desktop" id="kt_footer">
						<div class="kt-container  kt-container--fluid ">
							<div class="kt-footer__copyright">
								2019&nbsp;&copy;&nbsp;<a href="" target="_blank" class="kt-link">Nimap Infotech</a>
							</div>
							<div class="kt-footer__menu">
								<a href="" target="_blank" class="kt-footer__menu-link kt-link">About</a>
								<a href="" target="_blank" class="kt-footer__menu-link kt-link">Team</a>
								<a href="" target="_blank" class="kt-footer__menu-link kt-link">Contact</a>
							</div>
						</div>
					</div> -->

					<!-- end:: Footer -->
				</div>
			</div>
		</div>

		<!-- end:: Page -->

		<!-- begin::Quick Panel -->
		<div id="kt_quick_panel" class="kt-quick-panel">
			<a href="#" class="kt-quick-panel__close" id="kt_quick_panel_close_btn"><i class="flaticon2-delete"></i></a>
			<div class="kt-quick-panel__nav">
				<ul class="nav nav-tabs nav-tabs-line nav-tabs-bold nav-tabs-line-3x nav-tabs-line-brand  kt-notification-item-padding-x" role="tablist">
					<li class="nav-item active">
						<a class="nav-link active" data-toggle="tab" href="#kt_quick_panel_tab_notifications" role="tab">Notifications</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" data-toggle="tab" href="#kt_quick_panel_tab_logs" role="tab">Audit Logs</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" data-toggle="tab" href="#kt_quick_panel_tab_settings" role="tab">Settings</a>
					</li>
				</ul>
			</div>
			<div class="kt-quick-panel__content">
				<div class="tab-content">
					<div class="tab-pane fade show kt-scroll active" id="kt_quick_panel_tab_notifications" role="tabpanel">
						<div class="kt-notification">
							<a href="#" class="kt-notification__item">
								<div class="kt-notification__item-icon">
									<i class="flaticon2-line-chart kt-font-success"></i>
								</div>
								<div class="kt-notification__item-details">
									<div class="kt-notification__item-title">
										New order has been received
									</div>
									<div class="kt-notification__item-time">
										2 hrs ago
									</div>
								</div>
							</a>
							<a href="#" class="kt-notification__item">
								<div class="kt-notification__item-icon">
									<i class="flaticon2-box-1 kt-font-brand"></i>
								</div>
								<div class="kt-notification__item-details">
									<div class="kt-notification__item-title">
										New customer is registered
									</div>
									<div class="kt-notification__item-time">
										3 hrs ago
									</div>
								</div>
							</a>
							<a href="#" class="kt-notification__item">
								<div class="kt-notification__item-icon">
									<i class="flaticon2-chart2 kt-font-danger"></i>
								</div>
								<div class="kt-notification__item-details">
									<div class="kt-notification__item-title">
										Application has been approved
									</div>
									<div class="kt-notification__item-time">
										3 hrs ago
									</div>
								</div>
							</a>
							<a href="#" class="kt-notification__item">
								<div class="kt-notification__item-icon">
									<i class="flaticon2-image-file kt-font-warning"></i>
								</div>
								<div class="kt-notification__item-details">
									<div class="kt-notification__item-title">
										New file has been uploaded
									</div>
									<div class="kt-notification__item-time">
										5 hrs ago
									</div>
								</div>
							</a>
							<a href="#" class="kt-notification__item">
								<div class="kt-notification__item-icon">
									<i class="flaticon2-drop kt-font-info"></i>
								</div>
								<div class="kt-notification__item-details">
									<div class="kt-notification__item-title">
										New user feedback received
									</div>
									<div class="kt-notification__item-time">
										8 hrs ago
									</div>
								</div>
							</a>
							<a href="#" class="kt-notification__item">
								<div class="kt-notification__item-icon">
									<i class="flaticon2-pie-chart-2 kt-font-success"></i>
								</div>
								<div class="kt-notification__item-details">
									<div class="kt-notification__item-title">
										System reboot has been successfully completed
									</div>
									<div class="kt-notification__item-time">
										12 hrs ago
									</div>
								</div>
							</a>
							<a href="#" class="kt-notification__item">
								<div class="kt-notification__item-icon">
									<i class="flaticon2-favourite kt-font-danger"></i>
								</div>
								<div class="kt-notification__item-details">
									<div class="kt-notification__item-title">
										New order has been placed
									</div>
									<div class="kt-notification__item-time">
										15 hrs ago
									</div>
								</div>
							</a>
							<a href="#" class="kt-notification__item kt-notification__item--read">
								<div class="kt-notification__item-icon">
									<i class="flaticon2-safe kt-font-primary"></i>
								</div>
								<div class="kt-notification__item-details">
									<div class="kt-notification__item-title">
										Company meeting canceled
									</div>
									<div class="kt-notification__item-time">
										19 hrs ago
									</div>
								</div>
							</a>
							<a href="#" class="kt-notification__item">
								<div class="kt-notification__item-icon">
									<i class="flaticon2-psd kt-font-success"></i>
								</div>
								<div class="kt-notification__item-details">
									<div class="kt-notification__item-title">
										New report has been received
									</div>
									<div class="kt-notification__item-time">
										23 hrs ago
									</div>
								</div>
							</a>
							<a href="#" class="kt-notification__item">
								<div class="kt-notification__item-icon">
									<i class="flaticon-download-1 kt-font-danger"></i>
								</div>
								<div class="kt-notification__item-details">
									<div class="kt-notification__item-title">
										Finance report has been generated
									</div>
									<div class="kt-notification__item-time">
										25 hrs ago
									</div>
								</div>
							</a>
							<a href="#" class="kt-notification__item">
								<div class="kt-notification__item-icon">
									<i class="flaticon-security kt-font-warning"></i>
								</div>
								<div class="kt-notification__item-details">
									<div class="kt-notification__item-title">
										New customer comment recieved
									</div>
									<div class="kt-notification__item-time">
										2 days ago
									</div>
								</div>
							</a>
							<a href="#" class="kt-notification__item">
								<div class="kt-notification__item-icon">
									<i class="flaticon2-pie-chart kt-font-warning"></i>
								</div>
								<div class="kt-notification__item-details">
									<div class="kt-notification__item-title">
										New customer is registered
									</div>
									<div class="kt-notification__item-time">
										3 days ago
									</div>
								</div>
							</a>
						</div>
					</div>
					<div class="tab-pane fade kt-scroll" id="kt_quick_panel_tab_logs" role="tabpanel">
						<div class="kt-notification-v2">
							<a href="#" class="kt-notification-v2__item">
								<div class="kt-notification-v2__item-icon">
									<i class="flaticon-bell kt-font-brand"></i>
								</div>
								<div class="kt-notification-v2__itek-wrapper">
									<div class="kt-notification-v2__item-title">
										5 new user generated report
									</div>
									<div class="kt-notification-v2__item-desc">
										Reports based on sales
									</div>
								</div>
							</a>
							<a href="#" class="kt-notification-v2__item">
								<div class="kt-notification-v2__item-icon">
									<i class="flaticon2-box kt-font-danger"></i>
								</div>
								<div class="kt-notification-v2__itek-wrapper">
									<div class="kt-notification-v2__item-title">
										2 new items submited
									</div>
									<div class="kt-notification-v2__item-desc">
										by Grog John
									</div>
								</div>
							</a>
							<a href="#" class="kt-notification-v2__item">
								<div class="kt-notification-v2__item-icon">
									<i class="flaticon-psd kt-font-brand"></i>
								</div>
								<div class="kt-notification-v2__itek-wrapper">
									<div class="kt-notification-v2__item-title">
										79 PSD files generated
									</div>
									<div class="kt-notification-v2__item-desc">
										Reports based on sales
									</div>
								</div>
							</a>
							<a href="#" class="kt-notification-v2__item">
								<div class="kt-notification-v2__item-icon">
									<i class="flaticon2-supermarket kt-font-warning"></i>
								</div>
								<div class="kt-notification-v2__itek-wrapper">
									<div class="kt-notification-v2__item-title">
										$2900 worth producucts sold
									</div>
									<div class="kt-notification-v2__item-desc">
										Total 234 items
									</div>
								</div>
							</a>
							<a href="#" class="kt-notification-v2__item">
								<div class="kt-notification-v2__item-icon">
									<i class="flaticon-paper-plane-1 kt-font-success"></i>
								</div>
								<div class="kt-notification-v2__itek-wrapper">
									<div class="kt-notification-v2__item-title">
										4.5h-avarage response time
									</div>
									<div class="kt-notification-v2__item-desc">
										Fostest is Barry
									</div>
								</div>
							</a>
							<a href="#" class="kt-notification-v2__item">
								<div class="kt-notification-v2__item-icon">
									<i class="flaticon2-information kt-font-danger"></i>
								</div>
								<div class="kt-notification-v2__itek-wrapper">
									<div class="kt-notification-v2__item-title">
										Database server is down
									</div>
									<div class="kt-notification-v2__item-desc">
										10 mins ago
									</div>
								</div>
							</a>
							<a href="#" class="kt-notification-v2__item">
								<div class="kt-notification-v2__item-icon">
									<i class="flaticon2-mail-1 kt-font-brand"></i>
								</div>
								<div class="kt-notification-v2__itek-wrapper">
									<div class="kt-notification-v2__item-title">
										System report has been generated
									</div>
									<div class="kt-notification-v2__item-desc">
										Fostest is Barry
									</div>
								</div>
							</a>
							<a href="#" class="kt-notification-v2__item">
								<div class="kt-notification-v2__item-icon">
									<i class="flaticon2-hangouts-logo kt-font-warning"></i>
								</div>
								<div class="kt-notification-v2__itek-wrapper">
									<div class="kt-notification-v2__item-title">
										4.5h-avarage response time
									</div>
									<div class="kt-notification-v2__item-desc">
										Fostest is Barry
									</div>
								</div>
							</a>
						</div>
					</div>
					<div class="tab-pane kt-quick-panel__content-padding-x fade kt-scroll" id="kt_quick_panel_tab_settings" role="tabpanel">
						<form class="kt-form">
							<div class="kt-heading kt-heading--sm kt-heading--space-sm">Customer Care</div>
							<div class="form-group form-group-xs row">
								<label class="col-8 col-form-label">Enable Notifications:</label>
								<div class="col-4 kt-align-right">
									<span class="kt-switch kt-switch--success kt-switch--sm">
										<label>
											<input type="checkbox" checked="checked" name="quick_panel_notifications_1">
											<span></span>
										</label>
									</span>
								</div>
							</div>
							<div class="form-group form-group-xs row">
								<label class="col-8 col-form-label">Enable Case Tracking:</label>
								<div class="col-4 kt-align-right">
									<span class="kt-switch kt-switch--success kt-switch--sm">
										<label>
											<input type="checkbox" name="quick_panel_notifications_2">
											<span></span>
										</label>
									</span>
								</div>
							</div>
							<div class="form-group form-group-last form-group-xs row">
								<label class="col-8 col-form-label">Support Portal:</label>
								<div class="col-4 kt-align-right">
									<span class="kt-switch kt-switch--success kt-switch--sm">
										<label>
											<input type="checkbox" checked="checked" name="quick_panel_notifications_2">
											<span></span>
										</label>
									</span>
								</div>
							</div>
							<div class="kt-separator kt-separator--space-md kt-separator--border-dashed"></div>
							<div class="kt-heading kt-heading--sm kt-heading--space-sm">Reports</div>
							<div class="form-group form-group-xs row">
								<label class="col-8 col-form-label">Generate Reports:</label>
								<div class="col-4 kt-align-right">
									<span class="kt-switch kt-switch--sm kt-switch--danger">
										<label>
											<input type="checkbox" checked="checked" name="quick_panel_notifications_3">
											<span></span>
										</label>
									</span>
								</div>
							</div>
							<div class="form-group form-group-xs row">
								<label class="col-8 col-form-label">Enable Report Export:</label>
								<div class="col-4 kt-align-right">
									<span class="kt-switch kt-switch--sm kt-switch--danger">
										<label>
											<input type="checkbox" name="quick_panel_notifications_3">
											<span></span>
										</label>
									</span>
								</div>
							</div>
							<div class="form-group form-group-last form-group-xs row">
								<label class="col-8 col-form-label">Allow Data Collection:</label>
								<div class="col-4 kt-align-right">
									<span class="kt-switch kt-switch--sm kt-switch--danger">
										<label>
											<input type="checkbox" checked="checked" name="quick_panel_notifications_4">
											<span></span>
										</label>
									</span>
								</div>
							</div>
							<div class="kt-separator kt-separator--space-md kt-separator--border-dashed"></div>
							<div class="kt-heading kt-heading--sm kt-heading--space-sm">Memebers</div>
							<div class="form-group form-group-xs row">
								<label class="col-8 col-form-label">Enable Member singup:</label>
								<div class="col-4 kt-align-right">
									<span class="kt-switch kt-switch--sm kt-switch--brand">
										<label>
											<input type="checkbox" checked="checked" name="quick_panel_notifications_5">
											<span></span>
										</label>
									</span>
								</div>
							</div>
							<div class="form-group form-group-xs row">
								<label class="col-8 col-form-label">Allow User Feedbacks:</label>
								<div class="col-4 kt-align-right">
									<span class="kt-switch kt-switch--sm kt-switch--brand">
										<label>
											<input type="checkbox" name="quick_panel_notifications_5">
											<span></span>
										</label>
									</span>
								</div>
							</div>
							<div class="form-group form-group-last form-group-xs row">
								<label class="col-8 col-form-label">Enable Customer Portal:</label>
								<div class="col-4 kt-align-right">
									<span class="kt-switch kt-switch--sm kt-switch--brand">
										<label>
											<input type="checkbox" checked="checked" name="quick_panel_notifications_6">
											<span></span>
										</label>
									</span>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>

		<!-- end::Quick Panel -->

		<!-- begin::Scrolltop -->
		<div id="kt_scrolltop" class="kt-scrolltop">
			<i class="fa fa-arrow-up"></i>
		</div>

		<!-- end::Scrolltop -->

		<!-- begin::Global Config(global config for global JS sciprts) -->
		<script>
			var KTAppOptions = {
				"colors": {
					"state": {
						"brand": "#5d78ff",
						"dark": "#282a3c",
						"light": "#ffffff",
						"primary": "#5867dd",
						"success": "#34bfa3",
						"info": "#36a3f7",
						"warning": "#ffb822",
						"danger": "#fd3995"
					},
					"base": {
						"label": [
							"#c5cbe3",
							"#a1a8c3",
							"#3d4465",
							"#3e4466"
						],
						"shape": [
							"#f0f3ff",
							"#d9dffa",
							"#afb4d4",
							"#646c9a"
						]
					}
				}
			};
		</script>

		<!-- end::Global Config -->

		<!--begin::Global Theme Bundle(used by all pages) -->

		<!--begin:: Vendor Plugins -->
		<script src="{{ asset('plugins/general/jquery/dist/jquery.js') }}" type="text/javascript"></script>
		<script src="{{ asset('plugins/general/popper.js/dist/umd/popper.js') }}" type="text/javascript"></script>
		<script src="{{ asset('plugins/general/bootstrap/dist/js/bootstrap.min.js') }}" type="text/javascript"></script>
		<script src="{{ asset('plugins/general/js-cookie/src/js.cookie.js') }}" type="text/javascript"></script>
		<script src="{{ asset('plugins/general/moment/min/moment.min.js') }}" type="text/javascript"></script>
		<script src="{{ asset('plugins/general/tooltip.js/dist/umd/tooltip.min.js') }}" type="text/javascript"></script>
		<script src="{{ asset('plugins/general/perfect-scrollbar/dist/perfect-scrollbar.js') }}" type="text/javascript"></script>
		<script src="{{ asset('plugins/general/sticky-js/dist/sticky.min.js') }}" type="text/javascript"></script>
		<script src="{{ asset('plugins/general/wnumb/wNumb.js') }}" type="text/javascript"></script>
		<script src="{{ asset('plugins/general/jquery-form/dist/jquery.form.min.js') }}" type="text/javascript"></script>
		<script src="{{ asset('plugins/general/block-ui/jquery.blockUI.js') }}" type="text/javascript"></script>
		<script src="{{ asset('plugins/general/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}" type="text/javascript"></script>
		<script src="{{ asset('plugins/general/js/global/integration/plugins/bootstrap-datepicker.init.js') }}" type="text/javascript"></script>
		<script src="{{ asset('plugins/general/bootstrap-datetime-picker/js/bootstrap-datetimepicker.min.js') }}" type="text/javascript"></script>
		<script src="{{ asset('plugins/general/bootstrap-timepicker/js/bootstrap-timepicker.min.js') }}" type="text/javascript"></script>
		<script src="{{ asset('plugins/general/js/global/integration/plugins/bootstrap-timepicker.init.js') }}" type="text/javascript"></script>
		<script src="{{ asset('plugins/general/bootstrap-daterangepicker/daterangepicker.js') }}" type="text/javascript"></script>
		<script src="{{ asset('plugins/general/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.js') }}" type="text/javascript"></script>
		<script src="{{ asset('plugins/general/bootstrap-maxlength/src/bootstrap-maxlength.js') }}" type="text/javascript"></script>
		<script src="{{ asset('plugins/general/plugins/bootstrap-multiselectsplitter/bootstrap-multiselectsplitter.min.js') }}" type="text/javascript"></script>
		<script src="{{ asset('plugins/general/bootstrap-select/dist/js/bootstrap-select.js') }}" type="text/javascript"></script>
		<script src="{{ asset('plugins/general/bootstrap-switch/dist/js/bootstrap-switch.js') }}" type="text/javascript"></script>
		<script src="{{ asset('plugins/general/js/global/integration/plugins/bootstrap-switch.init.js') }}" type="text/javascript"></script>
		<script src="{{ asset('plugins/general/select2/dist/js/select2.full.js') }}" type="text/javascript"></script>
		<script src="{{ asset('plugins/general/ion-rangeslider/js/ion.rangeSlider.js') }}" type="text/javascript"></script>
		<script src="{{ asset('plugins/general/typeahead.js/dist/typeahead.bundle.js') }}" type="text/javascript"></script>
		<script src="{{ asset('plugins/general/handlebars/dist/handlebars.js') }}" type="text/javascript"></script>
		<script src="{{ asset('plugins/general/inputmask/dist/jquery.inputmask.bundle.js') }}" type="text/javascript"></script>
		<script src="{{ asset('plugins/general/inputmask/dist/inputmask/inputmask.date.extensions.js') }}" type="text/javascript"></script>
		<script src="{{ asset('plugins/general/inputmask/dist/inputmask/inputmask.numeric.extensions.js') }}" type="text/javascript"></script>
		<script src="{{ asset('plugins/general/nouislider/distribute/nouislider.js') }}" type="text/javascript"></script>
		<script src="{{ asset('plugins/general/owl.carousel/dist/owl.carousel.js') }}" type="text/javascript"></script>
		<script src="{{ asset('plugins/general/autosize/dist/autosize.js') }}" type="text/javascript"></script>
		<script src="{{ asset('plugins/general/clipboard/dist/clipboard.min.js') }}" type="text/javascript"></script>
		<script src="{{ asset('plugins/general/dropzone/dist/dropzone.js') }}" type="text/javascript"></script>
		<script src="{{ asset('plugins/general/js/global/integration/plugins/dropzone.init.js') }}" type="text/javascript"></script>
		<script src="{{ asset('plugins/general/quill/dist/quill.js') }}" type="text/javascript"></script>
		<script src="{{ asset('plugins/general/@yaireo/tagify/dist/tagify.polyfills.min.js') }}" type="text/javascript"></script>
		<script src="{{ asset('plugins/general/@yaireo/tagify/dist/tagify.min.js') }}" type="text/javascript"></script>
		<script src="{{ asset('plugins/general/summernote/dist/summernote.js') }}" type="text/javascript"></script>
		<script src="{{ asset('plugins/general/markdown/lib/markdown.js') }}" type="text/javascript"></script>
		<script src="{{ asset('plugins/general/bootstrap-markdown/js/bootstrap-markdown.js') }}" type="text/javascript"></script>
		<script src="{{ asset('plugins/general/js/global/integration/plugins/bootstrap-markdown.init.js') }}" type="text/javascript"></script>
		<script src="{{ asset('plugins/general/bootstrap-notify/bootstrap-notify.min.js') }}" type="text/javascript"></script>
		<script src="{{ asset('plugins/general/js/global/integration/plugins/bootstrap-notify.init.js') }}" type="text/javascript"></script>
		<script src="{{ asset('plugins/general/jquery-validation/dist/jquery.validate.js') }}" type="text/javascript"></script>
		<script src="{{ asset('plugins/general/jquery-validation/dist/additional-methods.js') }}" type="text/javascript"></script>
		<script src="{{ asset('plugins/general/js/global/integration/plugins/jquery-validation.init.js') }}" type="text/javascript"></script>
		<script src="{{ asset('plugins/general/toastr/build/toastr.min.js') }}" type="text/javascript"></script>
		<script src="{{ asset('plugins/general/dual-listbox/dist/dual-listbox.js') }}" type="text/javascript"></script>
		<script src="{{ asset('plugins/general/raphael/raphael.js') }}" type="text/javascript"></script>
		<script src="{{ asset('plugins/general/morris.js/morris.js') }}" type="text/javascript"></script>
		<script src="{{ asset('plugins/general/chart.js/dist/Chart.bundle.js') }}" type="text/javascript"></script>
		<script src="{{ asset('plugins/general/plugins/bootstrap-session-timeout/dist/bootstrap-session-timeout.min.js') }}" type="text/javascript"></script>
		<script src="{{ asset('plugins/general/plugins/jquery-idletimer/idle-timer.min.js') }}" type="text/javascript"></script>
		<script src="{{ asset('plugins/general/waypoints/lib/jquery.waypoints.js') }}" type="text/javascript"></script>
		<script src="{{ asset('plugins/general/counterup/jquery.counterup.js') }}" type="text/javascript"></script>
		<script src="{{ asset('plugins/general/es6-promise-polyfill/promise.min.js') }}" type="text/javascript"></script>
		<script src="{{ asset('plugins/general/sweetalert2/dist/sweetalert2.min.js') }}" type="text/javascript"></script>
		<script src="{{ asset('plugins/general/js/global/integration/plugins/sweetalert2.init.js') }}" type="text/javascript"></script>
		<script src="{{ asset('plugins/general/jquery.repeater/src/lib.js') }}" type="text/javascript"></script>
		<script src="{{ asset('plugins/general/jquery.repeater/src/jquery.input.js') }}" type="text/javascript"></script>
		<script src="{{ asset('plugins/general/jquery.repeater/src/repeater.js') }}" type="text/javascript"></script>
		<script src="{{ asset('plugins/general/dompurify/dist/purify.js') }}" type="text/javascript"></script>

		<!--end:: Vendor Plugins -->
		<script src="{{ asset('js/scripts.bundle.js') }}" type="text/javascript"></script>

		<!--begin:: Vendor Plugins for custom pages -->
		<script src="{{ asset('plugins/custom/plugins/jquery-ui/jquery-ui.min.js') }}" type="text/javascript"></script>
		<script src="{{ asset('plugins/custom/@fullcalendar/core/main.js') }}" type="text/javascript"></script>
		<script src="{{ asset('plugins/custom/@fullcalendar/daygrid/main.js') }}" type="text/javascript"></script>
		<script src="{{ asset('plugins/custom/@fullcalendar/google-calendar/main.js') }}" type="text/javascript"></script>
		<script src="{{ asset('plugins/custom/@fullcalendar/interaction/main.js') }}" type="text/javascript"></script>
		<script src="{{ asset('plugins/custom/@fullcalendar/list/main.js') }}" type="text/javascript"></script>
		<script src="{{ asset('plugins/custom/@fullcalendar/timegrid/main.js') }}" type="text/javascript"></script>
		<script src="{{ asset('plugins/custom/gmaps/gmaps.js') }}" type="text/javascript"></script>
		<script src="{{ asset('plugins/custom/flot/dist/es5/jquery.flot.js') }}" type="text/javascript"></script>
		<script src="{{ asset('plugins/custom/flot/source/jquery.flot.resize.js') }}" type="text/javascript"></script>
		<script src="{{ asset('plugins/custom/flot/source/jquery.flot.categories.js') }}" type="text/javascript"></script>
		<script src="{{ asset('plugins/custom/flot/source/jquery.flot.pie.js') }}" type="text/javascript"></script>
		<script src="{{ asset('plugins/custom/flot/source/jquery.flot.stack.js') }}" type="text/javascript"></script>
		<script src="{{ asset('plugins/custom/flot/source/jquery.flot.crosshair.js') }}" type="text/javascript"></script>
		<script src="{{ asset('plugins/custom/flot/source/jquery.flot.axislabels.js') }}" type="text/javascript"></script>
		<script src="{{ asset('plugins/custom/datatables.net/js/jquery.dataTables.js') }}" type="text/javascript"></script>
		<script src="{{ asset('plugins/custom/datatables.net-bs4/js/dataTables.bootstrap4.js') }}" type="text/javascript"></script>
		<script src="{{ asset('plugins/custom/js/global/integration/plugins/datatables.init.js') }}" type="text/javascript"></script>
		<script src="{{ asset('plugins/custom/datatables.net-autofill/js/dataTables.autoFill.min.js') }}" type="text/javascript"></script>
		<script src="{{ asset('plugins/custom/datatables.net-autofill-bs4/js/autoFill.bootstrap4.min.js') }}" type="text/javascript"></script>
		<script src="{{ asset('plugins/custom/jszip/dist/jszip.min.js') }}" type="text/javascript"></script>
		<script src="{{ asset('plugins/custom/pdfmake/build/pdfmake.min.js') }}" type="text/javascript"></script>
		<script src="{{ asset('plugins/custom/pdfmake/build/vfs_fonts.js') }}" type="text/javascript"></script>
		<script src="{{ asset('plugins/custom/datatables.net-buttons/js/dataTables.buttons.min.js') }}" type="text/javascript"></script>
		<script src="{{ asset('plugins/custom/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}" type="text/javascript"></script>
		<script src="{{ asset('plugins/custom/datatables.net-buttons/js/buttons.colVis.js') }}" type="text/javascript"></script>
		<script src="{{ asset('plugins/custom/datatables.net-buttons/js/buttons.flash.js') }}" type="text/javascript"></script>
		<script src="{{ asset('plugins/custom/datatables.net-buttons/js/buttons.html5.js') }}" type="text/javascript"></script>
		<script src="{{ asset('plugins/custom/datatables.net-buttons/js/buttons.print.js') }}" type="text/javascript"></script>
		<script src="{{ asset('plugins/custom/datatables.net-colreorder/js/dataTables.colReorder.min.js') }}" type="text/javascript"></script>
		<script src="{{ asset('plugins/custom/datatables.net-fixedcolumns/js/dataTables.fixedColumns.min.js') }}" type="text/javascript"></script>
		<script src="{{ asset('plugins/custom/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js') }}" type="text/javascript"></script>
		<script src="{{ asset('plugins/custom/datatables.net-keytable/js/dataTables.keyTable.min.js') }}" type="text/javascript"></script>
		<script src="{{ asset('plugins/custom/datatables.net-responsive/js/dataTables.responsive.min.js') }}" type="text/javascript"></script>
		<script src="{{ asset('plugins/custom/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}" type="text/javascript"></script>
		<script src="{{ asset('plugins/custom/datatables.net-rowgroup/js/dataTables.rowGroup.min.js') }}" type="text/javascript"></script>
		<script src="{{ asset('plugins/custom/datatables.net-rowreorder/js/dataTables.rowReorder.min.js') }}" type="text/javascript"></script>
		<script src="{{ asset('plugins/custom/datatables.net-scroller/js/dataTables.scroller.min.js') }}" type="text/javascript"></script>
		<script src="{{ asset('plugins/custom/datatables.net-select/js/dataTables.select.min.js') }}" type="text/javascript"></script>
		<script src="{{ asset('plugins/custom/jstree/dist/jstree.js') }}" type="text/javascript"></script>
		<script src="{{ asset('plugins/custom/jqvmap/dist/jquery.vmap.js') }}" type="text/javascript"></script>
		<script src="{{ asset('plugins/custom/jqvmap/dist/maps/jquery.vmap.world.js') }}" type="text/javascript"></script>
		<!-- <script src="{{ asset('plugins/custom/jqvmap/dist/maps/jquery.vmap.russia.js') }}" type="text/javascript"></script>
		<script src="{{ asset('plugins/custom/jqvmap/dist/maps/jquery.vmap.usa.js') }}" type="text/javascript"></script>
		<script src="{{ asset('plugins/custom/jqvmap/dist/maps/jquery.vmap.germany.js') }}" type="text/javascript"></script>
		<script src="{{ asset('plugins/custom/jqvmap/dist/maps/jquery.vmap.europe.js') }}" type="text/javascript"></script> -->
		<script src="{{ asset('plugins/custom/uppy/dist/uppy.min.js') }}" type="text/javascript"></script>

		<!--end:: Vendor Plugins for custom pages -->

		<!--end::Global Theme Bundle -->

		<!--begin::Page Vendors(used by this page) -->
		<!-- <script src="" type="text/javascript"></script> -->

		<!--end::Page Vendors -->

		<!--begin::Page Scripts(used by this page) -->
		 @yield('scripts')
		<!--end::Page Scripts -->

		<!-- Add dragable note - Start -->
		<script type="text/javascript">
			// dragElement(document.getElementById("dragableNote"));

			// $(document).ready(function(){
			// 	let topPosition = window.localStorage.getItem('topPosition');
			// 	let leftPosition = window.localStorage.getItem('leftPosition');

			// 	if(topPosition != null && leftPosition != null && topPosition > 25 && leftPosition > 50){
			// 		$("#dragableNote").attr('style','top: '+topPosition+'px;left: '+leftPosition+'px');
			// 	}
			// 	else{
			// 		let windowHeight = parseInt($("body").height()) - 150;
			// 		$("#dragableNote").attr('style','top: '+windowHeight+'px;right: 25px');
			// 	}
			// 	$("#dragableNote").show();
			// });

			// window.onresize = function() {
			// 	let windowHeight = parseInt($("body").height()) - 150;
			// 	$("#dragableNote").css('top',windowHeight+'px').css('right','25px').css('left','');
			// 	console.log(windowHeight);
			// }

			// function dragElement(elmnt) {
			// 	var pos1 = 0, pos2 = 0, pos3 = 0, pos4 = 0;
			// 	if (document.getElementById(elmnt.id + "header")) {
			// 		/* if present, the header is where you move the DIV from:*/
			// 		document.getElementById(elmnt.id + "header").onmousedown = dragMouseDown;
			// 	} else {
			// 		/* otherwise, move the DIV from anywhere inside the DIV:*/
			// 		elmnt.onmousedown = dragMouseDown;
			// 	}

			// 	function dragMouseDown(e) {
			// 		e = e || window.event;
			// 		e.preventDefault();
			// 		// get the mouse cursor position at startup:
			// 		pos3 = e.clientX;
			// 		pos4 = e.clientY;
			// 		document.onmouseup = closeDragElement;
			// 		// call a function whenever the cursor moves:
			// 		document.onmousemove = elementDrag;
			// 	}

			// 	function elementDrag(e) {
			// 		$("#dragableNote").removeAttr('onclick');

			// 		e = e || window.event;
			// 		e.preventDefault();
			// 		// calculate the new cursor position:
			// 		pos1 = pos3 - e.clientX;
			// 		pos2 = pos4 - e.clientY;
			// 		pos3 = e.clientX;
			// 		pos4 = e.clientY;
			// 		// set the element's new position:
			// 		elmnt.style.top = (elmnt.offsetTop - pos2) + "px";
			// 		elmnt.style.left = (elmnt.offsetLeft - pos1) + "px";

			// 		//Set position in local disk
			// 		window.localStorage.setItem('topPosition',(elmnt.offsetTop - pos2));
			// 		window.localStorage.setItem('leftPosition',(elmnt.offsetLeft - pos1));
			// 	}

			// 	function closeDragElement() {
			// 		/* stop moving when mouse button is released:*/
			// 		document.onmouseup = null;
			// 		document.onmousemove = null;
			// 		setTimeout(function(){
			// 			$("#dragableNote").attr('onclick','openNotesModal()');
			// 		},100);
			// 	}
			// }

			// function openNotesModal(){
			// 	$("#openNotesModalForm").modal('show');
			// }

			// function openAddNote(){
			// 	$(".showNoteTable").slideUp();
			// 	$(".addNoteData").slideDown();
			// 	$(".editNoteData").slideUp();
			// }

			// function addEditNoteToDatabase(currentObj, formId, postUrl){
			// 	let note = $("#"+formId).find('textarea').val();
			// 	if(note == ""){
			// 		errorLogView(formId, 'Please enter the note');
			// 		$("#"+formId).find('textarea').focus();
			// 		return false;
			// 	}

			// 	let previousOnclick = '';
    		// 	let previousName = '';

			// 	var formData = $("#"+formId).serialize();
			// 	previousOnclick = $(currentObj).attr('onclick');
			// 	previousName = $(currentObj).text();
			// 	$(currentObj).text('Loading...');
			// 	$(currentObj).removeAttr('onclick');

			// 	$.ajax({
			// 		type:"post",
			// 		url:postUrl,
			// 		data:formData,
			// 		success:function(res){
			// 			console.log(res);
			// 			$(currentObj).text(previousName);
            // 			$(currentObj).attr('onclick',previousOnclick);
			// 		},
			// 		error:function(err){
			// 			console.log(err);
			// 			errorLogView(formId, 'Network Error');
			// 			$(currentObj).text(previousName);
            // 			$(currentObj).attr('onclick',previousOnclick);
			// 		}
			// 	})
			// }

			// function errorLogView(formId, messags){
			// 	$("#"+formId).find('p').text(messags).css('text-align','center').css('color','red').css('font-weight','500').slideDown();
			// 	setTimeout(function(){
			// 		$("#"+formId).find('p').text(messags).css('text-align','center').slideUp();
			// 	},3000);
			// }
		</script>
		<!-- Add dragable note - End -->

		<!-- <div class="modal fade" id="openNotesModalForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-toggle="modal" data-backdrop="static" data-keyboard="false">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content ">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Notes</h5>
						
						<a href="javascript:void(0)" onclick="openAddNote()">
								<i class="la la-plus"></i>
							Add Notes
						</a>
					</div>
					<div class="modal-body">
						<div class="showNoteTable">
							<table class="table table-striped- table-bordered table-hover table-checkable" id="">
								<thead>
									<tr>
										<th>Sr No.</th>
										<th>Notes</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>1</td>
										<td>Abc</td>
										<td>NA</td>
									</tr>
								</tbody>
							</table>
						</div>
						<div class="addNoteData" style="display:none">
							<form id="addNoteForm">
								<input type="hidden" tyoe="add">
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
								<div class="kt-section__body">
									<div class="form-group row">
										<div class="col-lg-12">
											<label>Add Note</label>
											{!! Form::textarea('notes', '', ['class' => 'form-control', 'rows' => 3, 'cols' => 40]) !!}
										</div>
									</div>
								</div>
								<p></p>
							</form>
						</div>
						<div class="editNoteData" style="display:none">
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="addNoteData btn btn-brand btn-elevate btn-icon-sm" style="display:none" onclick="addEditNoteToDatabase(this,'addNoteForm','{{ route('add-note') }}')">Add</button>
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div> -->

	</body>

	<!-- end::Body -->
</html>