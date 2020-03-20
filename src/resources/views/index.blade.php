@extends('layouts/header')
<?php
// echo "<pre>";
// print_r($counts['NxtMonthRel']);
// exit();
?>
    @section('content')

    <meta name="csrf-token" content="{{ csrf_token() }}">


    <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">

        <!-- begin:: Content -->
        <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">

            <!--Begin::Dashboard 1-->
            <div class="row">
                <div class="col-lg-12 col-xl-4 order-lg-1 order-xl-1">

                    <!--begin:: Widgets/Activity-->
                    <div class="kt-portlet kt-portlet--fit kt-portlet--head-lg kt-portlet--head-overlay kt-portlet--skin-solid kt-portlet--height-fluid">
                        <div class="kt-portlet__head kt-portlet__head--noborder kt-portlet__space-x">
                            <div class="kt-portlet__head-label">
                                <h3 class="kt-portlet__head-title">
													Count's
												</h3>
                            </div>

                        </div>
                        <div class="kt-portlet__body kt-portlet__body--fit">
                            <div class="kt-widget17">
                                <div class="kt-widget17__visual kt-widget17__visual--chart kt-portlet-fit--top kt-portlet-fit--sides" style="background-color: #fd397a">
                                    <div class="kt-widget17__chart" style="height:320px;">
                                        <canvas id="kt_chart_activities"></canvas>
                                    </div>
                                </div>
                                <div class="kt-widget17__stats">
                                    <div class="kt-widget17__items">
                                        <div class="kt-widget17__item">
                                            <span class="kt-widget17__icon">
																<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon kt-svg-icon--brand">
																	<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																		<rect x="0" y="0" width="24" height="24" />
																		<path d="M5,3 L6,3 C6.55228475,3 7,3.44771525 7,4 L7,20 C7,20.5522847 6.55228475,21 6,21 L5,21 C4.44771525,21 4,20.5522847 4,20 L4,4 C4,3.44771525 4.44771525,3 5,3 Z M10,3 L11,3 C11.5522847,3 12,3.44771525 12,4 L12,20 C12,20.5522847 11.5522847,21 11,21 L10,21 C9.44771525,21 9,20.5522847 9,20 L9,4 C9,3.44771525 9.44771525,3 10,3 Z" fill="#000000" />
																		<rect fill="#000000" opacity="0.3" transform="translate(17.825568, 11.945519) rotate(-19.000000) translate(-17.825568, -11.945519) " x="16.3255682" y="2.94551858" width="3" height="18" rx="1" />
																	</g>
																</svg> </span>
                                            <span class="kt-widget17__subtitle">
																Total Resource
															</span>
                                            <span class="kt-widget17__desc">
																<b>{{ $counts['totalResource']}}</b>
															</span>
                                        </div>
                                        <div class="kt-widget17__item">
                                            <span class="kt-widget17__icon">
																<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon kt-svg-icon--success">
																	<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																		<polygon points="0 0 24 0 24 24 0 24" />
																		<path d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z" fill="#000000" fill-rule="nonzero" />
																		<path d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z" fill="#000000" opacity="0.3" />
																	</g>
																</svg> </span>
                                            <span class="kt-widget17__subtitle">
																In House Resources
															</span>
                                            <span class="kt-widget17__desc">
																<b>{{ $counts['InHouseResource']}}</b>
															</span>
                                        </div>
                                    </div>
                                    <div class="kt-widget17__items">
                                        <div class="kt-widget17__item">
                                            <span class="kt-widget17__icon">
																<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon kt-svg-icon--warning">
																	<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																		<rect x="0" y="0" width="24" height="24" />
																		<path d="M12.7037037,14 L15.6666667,10 L13.4444444,10 L13.4444444,6 L9,12 L11.2222222,12 L11.2222222,14 L6,14 C5.44771525,14 5,13.5522847 5,13 L5,3 C5,2.44771525 5.44771525,2 6,2 L18,2 C18.5522847,2 19,2.44771525 19,3 L19,13 C19,13.5522847 18.5522847,14 18,14 L12.7037037,14 Z" fill="#000000" opacity="0.3" />
																		<path d="M9.80428954,10.9142091 L9,12 L11.2222222,12 L11.2222222,16 L15.6666667,10 L15.4615385,10 L20.2072547,6.57253826 C20.4311176,6.4108595 20.7436609,6.46126971 20.9053396,6.68513259 C20.9668779,6.77033951 21,6.87277228 21,6.97787787 L21,17 C21,18.1045695 20.1045695,19 19,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,6.97787787 C3,6.70173549 3.22385763,6.47787787 3.5,6.47787787 C3.60510559,6.47787787 3.70753836,6.51099993 3.79274528,6.57253826 L9.80428954,10.9142091 Z" fill="#000000" />
																	</g>
																</svg> </span>
                                            <span class="kt-widget17__subtitle">
																Client Side Resources
															</span>
                                            <span class="kt-widget17__desc">
																<b>{{ $counts['ClientSideResource']}}</b>
															</span>
                                        </div>
                                        <div class="kt-widget17__item">
                                            <span class="kt-widget17__icon">
																<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon kt-svg-icon--danger">
																	<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																		<rect x="0" y="0" width="24" height="24" />
																		<path d="M3,16 L5,16 C5.55228475,16 6,15.5522847 6,15 C6,14.4477153 5.55228475,14 5,14 L3,14 L3,12 L5,12 C5.55228475,12 6,11.5522847 6,11 C6,10.4477153 5.55228475,10 5,10 L3,10 L3,8 L5,8 C5.55228475,8 6,7.55228475 6,7 C6,6.44771525 5.55228475,6 5,6 L3,6 L3,4 C3,3.44771525 3.44771525,3 4,3 L10,3 C10.5522847,3 11,3.44771525 11,4 L11,19 C11,19.5522847 10.5522847,20 10,20 L4,20 C3.44771525,20 3,19.5522847 3,19 L3,16 Z" fill="#000000" opacity="0.3" />
																		<path d="M16,3 L19,3 C20.1045695,3 21,3.8954305 21,5 L21,15.2485298 C21,15.7329761 20.8241635,16.200956 20.5051534,16.565539 L17.8762883,19.5699562 C17.6944473,19.7777745 17.378566,19.7988332 17.1707477,19.6169922 C17.1540423,19.602375 17.1383289,19.5866616 17.1237117,19.5699562 L14.4948466,16.565539 C14.1758365,16.200956 14,15.7329761 14,15.2485298 L14,5 C14,3.8954305 14.8954305,3 16,3 Z" fill="#000000" />
																	</g>
																</svg> </span>
                                            <span class="kt-widget17__subtitle">
																Total Clients
															</span>
                                            <span class="kt-widget17__desc">
																<b>{{ $counts['totalClient']}}</b>
															</span>
                                        </div>
                                    </div>
                                    <div class="kt-widget17__items">
                                        <div class="kt-widget17__item">
                                            <span class="kt-widget17__icon">
																<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon kt-svg-icon--warning">
																	<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																		<rect x="0" y="0" width="24" height="24" />
																		<path d="M5,3 L6,3 C6.55228475,3 7,3.44771525 7,4 L7,20 C7,20.5522847 6.55228475,21 6,21 L5,21 C4.44771525,21 4,20.5522847 4,20 L4,4 C4,3.44771525 4.44771525,3 5,3 Z M10,3 L11,3 C11.5522847,3 12,3.44771525 12,4 L12,20 C12,20.5522847 11.5522847,21 11,21 L10,21 C9.44771525,21 9,20.5522847 9,20 L9,4 C9,3.44771525 9.44771525,3 10,3 Z" fill="#000000" />
																		<rect fill="#000000" opacity="0.3" transform="translate(17.825568, 11.945519) rotate(-19.000000) translate(-17.825568, -11.945519) " x="16.3255682" y="2.94551858" width="3" height="18" rx="1" />
																	</g>
																</svg> </span>
                                            <span class="kt-widget17__subtitle">
																Active Clients
															</span>
                                            <span class="kt-widget17__desc">
																<b>{{ $counts['ActiveClient']}}</b>
															</span>
                                        </div>
                                        <!-- 		<div class="kt-widget17__item">
															<span class="kt-widget17__icon">
																<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon kt-svg-icon--danger">
																	<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																		<rect x="0" y="0" width="24" height="24" />
																		<path d="M3,16 L5,16 C5.55228475,16 6,15.5522847 6,15 C6,14.4477153 5.55228475,14 5,14 L3,14 L3,12 L5,12 C5.55228475,12 6,11.5522847 6,11 C6,10.4477153 5.55228475,10 5,10 L3,10 L3,8 L5,8 C5.55228475,8 6,7.55228475 6,7 C6,6.44771525 5.55228475,6 5,6 L3,6 L3,4 C3,3.44771525 3.44771525,3 4,3 L10,3 C10.5522847,3 11,3.44771525 11,4 L11,19 C11,19.5522847 10.5522847,20 10,20 L4,20 C3.44771525,20 3,19.5522847 3,19 L3,16 Z" fill="#000000" opacity="0.3" />
																		<path d="M16,3 L19,3 C20.1045695,3 21,3.8954305 21,5 L21,15.2485298 C21,15.7329761 20.8241635,16.200956 20.5051534,16.565539 L17.8762883,19.5699562 C17.6944473,19.7777745 17.378566,19.7988332 17.1707477,19.6169922 C17.1540423,19.602375 17.1383289,19.5866616 17.1237117,19.5699562 L14.4948466,16.565539 C14.1758365,16.200956 14,15.7329761 14,15.2485298 L14,5 C14,3.8954305 14.8954305,3 16,3 Z" fill="#000000" />
																	</g>
																</svg> </span>
															<span class="kt-widget17__subtitle">
																Arrived
															</span>

														</div> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--end:: Widgets/Activity-->
                </div>

                <div class="col-lg-12 col-xl-12 order-lg-1 order-xl-1">
                    <div class="kt-portlet__head kt-portlet__head--lg kt-portlet__head--noborder kt-portlet__head--break-sm">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">
													Active Client's
												</h3>
                        </div>

                    </div>
                    <!-- <div class="kt-portlet kt-portlet--height-fluid kt-portlet--mobile ">
										<div class="kt-portlet__head kt-portlet__head--lg kt-portlet__head--noborder kt-portlet__head--break-sm">
											<div class="kt-portlet__head-label">
												<h3 class="kt-portlet__head-title">
													Exclusive Datatable Plugin
												</h3>
											</div>

										</div>
										<div class="kt-portlet__body kt-portlet__body--fit">

											<div class="kt-datatable" id="kt_datatable_latest_orders"></div>

										</div>
									</div>
 -->
                    <div class="kt-datatable kt-datatable--default kt-datatable--brand kt-datatable--loaded" id="kt_apps_user_list_datatable" style="">
                        <table class="kt-datatable__table" style="display: block;">
                            <thead class="kt-datatable__head">
                                <tr class="kt-datatable__row" style="left: 0px;">
                                    <th class="kt-datatable__cell kt-datatable__toggle-detail"><span></span></th>
                                    <th data-field="RecordID" class="kt-datatable__cell--center kt-datatable__cell kt-datatable__cell--check"></th>
                                    <th data-field="AgentName" class="kt-datatable__cell kt-datatable__cell--sort"><span style="width: 133px;">Name</span></th>

                                    <th data-field="AgentName" class="kt-datatable__cell kt-datatable__cell--sort"><span style="width: 133px;">Manager Name</span></th>
                                    <th data-field="AgentName" class="kt-datatable__cell kt-datatable__cell--sort"><span style="width: 133px;">Manager Email</span></th>
                                    <th data-field="AgentName" class="kt-datatable__cell kt-datatable__cell--sort"><span style="width: 133px;">
														Resources
													</span></th>
                                    <th data-field="AgentName" class="kt-datatable__cell kt-datatable__cell--sort"><span style="width: 133px;">Address</span></th>

                                    <!-- 	<th data-field="Actions" data-autohide-disabled="false" class="kt-datatable__cell kt-datatable__cell--sort"><span style="width: 133px;">Actions</span></th> -->
                                </tr>
                            </thead>
                            <tbody class="kt-datatable__body" style="">
                                @foreach($counts['ActiveClientDTL'] as $key => $data)
                                <tr data-row="0" class="kt-datatable__row" style="left: 0px;">
                                    <td class="kt-datatable__cell kt-datatable__toggle-detail"></td>
                                    <td class="kt-datatable__cell--center kt-datatable__cell kt-datatable__cell--check" data-field="RecordID"></td>

                                    <td data-field="Country" class="kt-datatable__cell"><span style="width: 133px;">{{$data['client_name']}}</span></td>
                                    <td data-field="Country" class="kt-datatable__cell"><span style="width: 133px;">{{$data['reporting_name']}}</span></td>
                                    <td data-field="Country" class="kt-datatable__cell"><span style="width: 133px;">{{$data['reporting_email']}}</span></td>
                                    <td data-field="Country" class="kt-datatable__cell"><span style="width: 133px;">{{$data['resource']}}</span></td>
                                    <td data-field="Actions" data-autohide-disabled="false" class="kt-datatable__cell">
                                        <span style="overflow: visible; position: relative; width: 133px;">		<div class="dropdown">
																<a data-toggle="dropdown" class="btn btn-sm btn-clean btn-icon btn-icon-md">
																<i class="flaticon-more-1"></i>								
																</a>
																<div class="dropdown-menu dropdown-menu-right">					<ul class="kt-nav">
																	 <!-- <li class="kt-nav__item">									<a class="kt-nav__link" href="#">							<i class="kt-nav__link-icon flaticon2-expand"></i>		   <span class="kt-nav__link-text">View</span> </a>
                                        </li> -->
                                        <li class="kt-nav__item">
                                            <a class="kt-nav__link" onclick="viewActiveCli('{{$data['client_id']}}')"> <i class="kt-nav__link-icon flaticon2-contract"></i> <span class="kt-nav__link-text">View</span> </a>
                                        </li>
                                        <!--  <li class="kt-nav__item">									<a class="kt-nav__link" href="#" onclick="deleteresource(<?php// echo $data['id']; ?>)">						<i class="kt-nav__link-icon flaticon2-trash"></i>		<span class="kt-nav__link-text">Delete</span>			</a>										
																	 </li> -->
                                        <!-- <li class="kt-nav__item">									<a class="kt-nav__link" href="#">							<i class="kt-nav__link-icon flaticon2-mail-1"></i>			<span class="kt-nav__link-text">Export</span>		</a>										
																	 </li>		 -->
                                        </ul>
                    </div>
                </div>
                </span>
                </td>
                <td></td>
                <!-- <td data-field="Country" class="kt-datatable__cell"><span style="width: 133px;">{{$data['address']}}</span></td> -->

                <!-- 		<td data-field="Actions" data-autohide-disabled="false" class="kt-datatable__cell">
														<span style="overflow: visible; position: relative; width: 133px;">		<div class="dropdown">
																<a data-toggle="dropdown" class="btn btn-sm btn-clean btn-icon btn-icon-md">
																<i class="flaticon-more-1"></i>								
																</a>
																<div class="dropdown-menu dropdown-menu-right" style="overflow: visible;">					<ul class="kt-nav">						
																	 <li class="kt-nav__item">								
																	 <a class="kt-nav__link" href="{{ url('settingedit/') }}">
																	 	<i class="kt-nav__link-icon flaticon2-contract"></i>
																	 	<span class="kt-nav__link-text">Edit</span>			
																	 </a>
																	 </li>										

																	</ul>								
																</div>							
															</div>						
														</span>
													</td> -->
                </tr>
                @endforeach
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                </tbody>
                </table>

                <!--end: Datatable -->
            </div>
            <!--End::Portlet-->
        </div>
    </div>


    <!--Begin::Row-->
    <div class="row">
    <div class="col-md-12">
            <div class="kt-portlet kt-portlet--height-fluid">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">Resources</h3>
                    </div>
                </div>
                <div class="kt-portlet__body">
                    <div class="tab-content">
                        <ul id="tabs" class="nav nav-tabs">
                            @php( $count = sizeOf($onBenchResource))
                            <li class="nav-item"><a href="" data-target="#tab-1-open" data-toggle="tab" class="nav-link small text-uppercase active">Current Bench Resources</a></li>
                            @php( $count = sizeOf($upcomingBenchResource))
                            <li class="nav-item"><a href="" data-target="#tab-2-open" data-toggle="tab" class="nav-link small text-uppercase">Upcomming Bench Resources</a></li>
                        </ul>
                        <br>
                        <div id="tabsContent" class="tab-content">
                            <div id="tab-1-open" class="tab-pane fade active show">
                                <style>
                                .tableBodyScroll tbody {
                                    display: block;
                                    max-height: 200px;
                                    overflow-y: scroll;
                                }

                                .tableBodyScroll thead, tbody tr {
                                    display: table;
                                    width: 100%;
                                    table-layout: fixed;
                                }

                                .tableBodyScroll tbody::-webkit-scrollbar-track
                                {
                                    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
                                    border-radius: 10px;
                                    background-color: #F5F5F5;
                                }

                                .tableBodyScroll tbody::-webkit-scrollbar
                                {
                                    width: 5px;
                                    background-color: #F5F5F5;
                                }

                                .tableBodyScroll tbody::-webkit-scrollbar-thumb
                                {
                                    border-radius: 5px;
                                    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
                                    background-color: gray;
                                }
                                </style>
                                <div class="row">
                                    <div class="col-md-9"></div>
                                    <div class="col-md-3">
                                        <div class="md-form active-cyan active-cyan-2 mb-3">
                                            <input class="form-control" type="text" placeholder="Search" onkeyup="searchDataFromTable(this ,'tableBodyScroll')">  
                                        </div>
                                    </div>
                                </div>
                                <table class="tableBodyScroll table table-striped- table-bordered table-hover table-checkable" id="">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Address</th>
                                            <th>Technology</th>
                                            <th>Experience</th>
                                            <th>Resume</th>
                                            <th>Idle days</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @if(!empty($onBenchResource)) 
                                        @foreach($onBenchResource as $keys => $datas)
                                        <tr>
                                            <td>{{ $datas['name'] }}</td>
                                            <td>{{ $datas['resident_address'] }}</td>
                                            <td>{{ implode(', ', $datas['techname']) }}</td>
                                            <td>{{ $datas['exp_date'] }}</td>
                                            <td>
                                                @if (strpos($datas['resume'], 'https://drive.google.com') !== false OR strpos($datas['resume'], 'https://docs.google.com') !== false)
                                                <a href="{{ $datas['resume'] }}" target="_blank">&nbsp;&nbsp;&nbsp;&nbsp;<i class="flaticon-eye"></i></a>
                                                @else
                                                <a href="{{ url('/').$datas['resume']}}" target="_blank">&nbsp;&nbsp;&nbsp;&nbsp;<i class="flaticon-eye"></i></a>
                                                @endif
                                            </td>
                                            <td>{{ $datas['idleDays'] }}</td>
                                        </tr>
                                        @endforeach
                                    @endif
                                    </tbody>
                                </table>
                                <!--end: Datatable -->
                            </div>
                            <div id="tab-2-open" class="tab-pane fade">
                                <!--begin: Datatable -->
                                <div class="row">
                                    <div class="col-md-9"></div>
                                    <div class="col-md-3">
                                        <div class="md-form active-cyan active-cyan-2 mb-3">
                                            <input class="form-control" type="text" placeholder="Search" onkeyup="searchDataFromTable(this ,'tableBodyScroll2')">  
                                        </div>
                                    </div>
                                </div>
                                <table class="tableBodyScroll tableBodyScroll2 table table-striped- table-bordered table-hover table-checkable" id="">
                                    <thead>
                                        <tr>
                                            <th>Name</th>                                            
                                            <th>Address</th>
                                            <th>Technology</th>
                                            <th>Experience</th>
                                            <th>Resume</th>
                                            <th>Client Name</th>
                                            <th>End Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @if(!empty($upcomingBenchResource)) 
                                        @foreach($upcomingBenchResource as $keys => $datas)
                                        <tr>
                                            <td>{{ $datas['name'] }}</td>
                                            <td>{{ $datas['resident_address'] }}</td>
                                            <td>{{ implode(', ', $datas['techname']) }}</td>
                                            <td>{{ $datas['exp_date'] }}</td>
                                            <td>
                                                @if (strpos($datas['resume'], 'https://drive.google.com') !== false OR strpos($datas['resume'], 'https://docs.google.com') !== false)
                                                <a href="{{ $datas['resume'] }}" target="_blank">&nbsp;&nbsp;&nbsp;&nbsp;<i class="flaticon-eye"></i></a>
                                                @else
                                                <a href="{{ url('/').$datas['resume']}}" target="_blank">&nbsp;&nbsp;&nbsp;&nbsp;<i class="flaticon-eye"></i></a>
                                                @endif
                                            </td>
                                            <td>{{ $datas['client_name'] }}</td>
                                            <td>{{ $datas['endDate'] }}</td>
                                        </tr>
                                        @endforeach
                                    @endif
                                    </tbody>
                                </table>
                                <!--end: Datatable -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--End::Row-->
    

    <!--Begin::Row-->
    <div class="row">
        <div class="col-xl-8 col-lg-8 order-lg-3 order-xl-1">

            <!--begin:: Widgets/Best Sellers-->
            <div class="kt-portlet kt-portlet--height-fluid">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">
                            Notes
                        </h3>
                    </div>
                    <a href="javascript:void(0)" onclick="openAddNote()" style="padding-top: 15px">
                            <i class="la la-plus"></i>
                        Add Notes
                    </a>
                </div>
                <div class="kt-portlet__body">
                    <!--begin: Datatable -->
                    <table class="table table-striped- table-bordered table-hover table-checkable" id="">
                        <thead>
                            <tr>
                                <th>Notes</th>
                                <th>Last Modified</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="noteTableBody">
                            @foreach($notesList as $keys => $value)
                            <tr id="noteTableId_{{ $value->id }}">
                                <td>{{ $value->notes }}</td>
                                <td>{{ $value->adddate }}</td>
                                <td>
                                    <a href="javascript:void(0)" data-id="{{ $value->id }}" data-message="{{ $value->notes }}" onclick="openEditNote(this)"><i class="la la-edit" style="font-size: 18px"></i></a>
                                    <a href="javascript:void(0)" onclick="deleteAccountant('{{ $value->id }}')"><i class="la la-trash" style="font-size: 18px"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!--end: Datatable -->
                </div>
            </div>
        </div>
    </div>
    <!--Begin::Row-->
    <div class="row" style="display:none">
        <div class="col-xl-6 col-lg-6 order-lg-3 order-xl-1">

            <!--begin:: Widgets/Best Sellers-->
            <div class="kt-portlet kt-portlet--height-fluid">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">
													Resources releasing in next 30 days
												</h3>
                    </div>

                </div>
                <div class="kt-portlet__body">
                    <div class="tab-content">
                        <div class="tab-pane active" id="kt_widget5_tab1_content" aria-expanded="true">
                            @foreach($counts['NxtMonthRel'] as $keys => $datas)

                            <div class="kt-widget5">
                                <div class="kt-widget5__item">
                                    <div class="kt-widget5__content">
                                        <div class="kt-widget5__pic">
                                            <!-- <img class="kt-widget7__img" src="media//products/product27.jpg" alt=""> -->
                                        </div>
                                        <div class="kt-widget5__section">
                                            <a href="#" class="kt-widget5__title">
																	{{ $datas['name']}}
																	</a>
                                            <p class="kt-widget5__desc">
                                                {{ $datas['technology']}}
                                            </p>
                                            <div class="kt-widget5__info">
                                                <span>Contact:</span>
                                                <span class="kt-font-info">{{ $datas['phone']}}</span>
                                                <span>Email:</span>
                                                <span class="kt-font-info">{{ $datas['email']}}</span>
                                                <br/>
                                                <span>Release On:</span>
                                                <span class="kt-font-info">{{ date('d-M-Y', strtotime($datas['end_date']))}}</span>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="kt-widget5__content">
                                        <!-- <div class="kt-widget5__stats">
																	<span class="kt-widget5__number">19,200</span>
																	<span class="kt-widget5__sales">sales</span>
																</div>
																<div class="kt-widget5__stats">
																	<span class="kt-widget5__number">1046</span>
																	<span class="kt-widget5__votes">votes</span>
																</div> -->
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>

                    </div>
                </div>
            </div>

            <!--end:: Widgets/Best Sellers-->
        </div>

    </div>

    <!--End::Row-->

    <!--End::Dashboard 1-->
    <div class="modal fade" id="kt_dash_act_records_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Setting View</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"></span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="kt-scroll" data-scroll="true" data-height="300">
                        <div class="form-group">
                            <label>Name :</label>
                            <div class="clNm"></div>
                        </div>
                        <div class="form-group">
                            <label>Manager Name :</label>
                            <div class="clMg"></div>
                        </div>
                        <div class="form-group">
                            <label>Manager Email :</label>
                            <div class="clMe"></div>
                        </div>
                        <div class="form-group">
                            <label>Address :</label>
                            <div class="clAddr"></div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-brand" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    </div>

    <!-- end:: Content -->
    </div>


<div class="modal fade" id="openAddNotesModalForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-toggle="modal" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content ">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Notes</h5>
            </div>
            <div class="modal-body">
                <div class="addNoteData">
                    <form id="addNoteForm">
                        <input type="hidden" tyoe="add">
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
            </div>
            <div class="modal-footer">
                <button type="button" class="addNoteData btn btn-brand btn-elevate btn-icon-sm" onclick="addEditNoteToDatabase(this,'addNoteForm','{{ route('add-note') }}')">Add</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="openEditNotesModalForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-toggle="modal" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content ">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Notes</h5>
            </div>
            <div class="modal-body">
                <div class="addNoteData">
                    <form id="updateNoteForm">
                        <input type="hidden" name="id" value="">
                        <div class="kt-section__body">
                            <div class="form-group row">
                                <div class="col-lg-12">
                                    <label>Update Note</label>
                                    {!! Form::textarea('notes', '', ['class' => 'form-control', 'rows' => 3, 'cols' => 40]) !!}
                                </div>
                            </div>
                        </div>
                        <p></p>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="addNoteData btn btn-brand btn-elevate btn-icon-sm" onclick="addEditNoteToDatabase(this,'updateNoteForm','{{ route('update-note') }}')">Update</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
    @endsection

    <!-- sript for page -->
    @section('scripts')
    <script src="{{ asset('js/pages/crud/datatables/basic/scrollable.js') }}" type="text/javascript"></script>
    
    <script src="{{ asset('js/pages/dashboard.js') }}" type="text/javascript"></script>
    <script src="//maps.google.com/maps/api/js?key=AIzaSyBTGnKT7dt597vo9QgeQ7BFhvSRP4eiMSM" type="text/javascript"></script>
    <script>
        function viewActiveCli(id) {
            if (id) {
                $('#kt_dash_act_records_modal').modal('show');
                $.ajax({
                    url: "{{ url('viewindactclient/') }}/" + id,
                    type: "GET",
                    success: function(res) {
                        var m_set = res[0];
                        $('.clNm').html(m_set.client_name);
                        $('.clMg').html(m_set.reporting_name);
                        $('.clMe').html(m_set.reporting_email);
                        $('.clAddr').html(m_set.address);

                    }
                });
            }
        }
    </script>

    <script>
        function openAddNote(){
            $("#openAddNotesModalForm").modal('show');
        }

        function openEditNote(currentObj){
            $("#openEditNotesModalForm").find('[name="notes"]').val($(currentObj).attr('data-message'));
            $("#openEditNotesModalForm").find('[name="id"]').val($(currentObj).attr('data-id'));
            $("#openEditNotesModalForm").modal('show');
        }

        function addEditNoteToDatabase(currentObj, formId, postUrl){
            let note = $("#"+formId).find('textarea').val();
            if(note == ""){
                errorLogView(formId, 'Please enter the note');
                $("#"+formId).find('textarea').focus();
                return false;
            }

            let previousOnclick = '';
            let previousName = '';

            var formData = $("#"+formId).serialize();
            previousOnclick = $(currentObj).attr('onclick');
            previousName = $(currentObj).text();
            $(currentObj).text('Loading...');
            $(currentObj).removeAttr('onclick');

            $.ajax({
                type:"post",
                url:postUrl,
                data:formData,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success:function(res){
                    try {
                        let jsonData = JSON.parse(res);
                        if(jsonData.code == 200){
                            $('#'+formId)[0].reset();
                            $("#openAddNotesModalForm").modal('hide');
                            $("#openEditNotesModalForm").modal('hide');
                            Swal.fire(
                                'Success!',
                                jsonData.message,
                                'success'
                            )
                            closeSwal();
                            addUpdateNotesContain(jsonData.data);
                        }
                        else{
                            errorLogView(formId, jsonData.message);
                        }
                    } catch (error) {
                        errorLogView(formId, 'Server side error');
                    }
                    $(currentObj).text(previousName);
                    $(currentObj).attr('onclick',previousOnclick);
                },
                error:function(err){
                    console.log(err);
                    errorLogView(formId, 'Network Error');
                    $(currentObj).text(previousName);
                    $(currentObj).attr('onclick',previousOnclick);
                }
            })
        }

        function errorLogView(formId, messags){
            $("#"+formId).find('p').text(messags).css('text-align','center').css('color','red').css('font-weight','500').slideDown();
            setTimeout(function(){
                $("#"+formId).find('p').text(messags).css('text-align','center').slideUp();
            },3000);
        }

        function deleteAccountant(id){
            Swal.fire({
            title: 'Are you sure?',
            text: "You won't be ablze to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: "{{ route('delete-note') }}",
                    data:{ 'id' : id},
                    type: "post",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(res){

                        try {
                            let jsonData = JSON.parse(res);
                            if(jsonData.code == 200){
                                Swal.fire(
                                    'Deleted!',
                                    jsonData.message,
                                    'success'
                                )
                                $("#openAddNotesModalForm").modal('hide');
                                addUpdateNotesContain(jsonData.data)
                            }
                            else{
                                Swal.fire(
                                    'warning!',
                                    jsonData.message,
                                    'fail'
                                )
                            }
                        } catch (error) {
                            Swal.fire(
                                'warning!',
                                'Server side error',
                                'fail'
                            )
                        }
                        closeSwal();
                        // $(currentObj).text(previousName);
                        // $(currentObj).attr('onclick',previousOnclick);
                        
                    },
                    error:function(err){
                        console.log(err);
                        Swal.fire(
                            'warning!',
                            'Network Error',
                            'fail'
                        )
                        closeSwal();
                        $(currentObj).text(previousName);
                        $(currentObj).attr('onclick',previousOnclick);
                    }
                });
                
            }
            })
        }

        function closeSwal(){
            setTimeout(function(){
                swal.close();
            }, 1500);
        }

        function addUpdateNotesContain(data){
            let htmlData = '';
            if(parseInt(data.id) == 0 && data.notes != ""){
                htmlData = '<tr id="noteTableId_'+data.lastId+'">'+
                                '<td>'+data.notes+'</td>'+
                                '<td>'+data.adddate+'</td>'+
                                '<td>'+
                                    '<a href="javascript:void(0)" data-id="'+data.lastId+'" data-message="'+data.notes+'" onclick="openEditNote(this)"><i class="la la-edit" style="font-size: 18px"></i></a>'+
                                    '<a href="javascript:void(0)" onclick="deleteAccountant(\''+data.lastId+'\')"><i class="la la-trash" style="font-size: 18px"></i></a>'+
                                '</td>'+
                            '</tr>';
                $("#noteTableBody").append(htmlData);
            }
            else if(parseInt(data.id) > 0 && data.notes != ""){
                console.log($("#noteTableBody").find('[data-id="3"]'));
                htmlData = '<td>'+data.notes+'</td>'+
                            '<td>'+data.adddate+'</td>'+
                            '<td>'+
                                '<a href="javascript:void(0)" data-id="'+data.id+'" data-message="'+data.notes+'" onclick="openEditNote(this)"><i class="la la-edit" style="font-size: 18px"></i></a>'+
                                '<a href="javascript:void(0)" onclick="deleteAccountant(\''+data.id+'\')"><i class="la la-trash" style="font-size: 18px"></i></a>'+
                            '</td>';
                $("#noteTableId_"+data.id).html(htmlData);
            }
            else if(parseInt(data.id) > 0 && data.notes == ""){
                $("#noteTableId_"+data.id).remove();
            }
        }

        function searchDataFromTable(currentObj, className){
            let serachValue = $(currentObj).val().toLowerCase();
            let count = 0;
            $("."+className).find('tbody').find('tr').each(function(key, trObj){
                $(trObj).show();

                if(serachValue != ""){    
                    $(trObj).find('td').each(function(key2, tdObj){
                        let tempData = $(tdObj).text().toLowerCase();
                        if(tempData != "" && tempData.includes(serachValue)){
                            count++;
                            console.log(tempData);
                        }
                    })

                    if(count == 0){
                        $(trObj).hide();
                    }
                    count = 0;   
                }

            });
        }
    </script>
    @stop
    <!-- End sript for page -->