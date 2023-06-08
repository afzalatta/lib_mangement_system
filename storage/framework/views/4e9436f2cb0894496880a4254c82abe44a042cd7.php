<!DOCTYPE html>
<html lang="en">
	<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
	<head>
		<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start': new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0], j=d.createElement(s),dl=l!='dataLayer'?'&amp;l='+l:'';j.async=true;j.src= '../../../www.googletagmanager.com/gtm5445.html?id='+i+dl;f.parentNode.insertBefore(j,f); })(window,document,'script','dataLayer','GTM-5FS8GGP');</script>
		<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
		<meta charset="utf-8" />
		<title>Vasela Admin</title>
		<meta name="description" content="Updates and statistics" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
		<link rel="stylesheet" href="<?php echo e(asset('/css/trix.css')); ?>">

		<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />

		<script src="https://cdn.ckeditor.com/ckeditor5/30.0.0/classic/ckeditor.js"></script>

		<link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css" />

		<link href="<?php echo e(asset('/admin_assets/plugins/custom/fullcalendar/fullcalendar.bundle5883.css?v=7.2.9')); ?>" rel="stylesheet" type="text/css" />
		<link href="<?php echo e(asset('/admin_assets/plugins/global/plugins.bundle5883.css?v=7.2.9')); ?>" rel="stylesheet" type="text/css" />
		<link href="<?php echo e(asset('/admin_assets/plugins/custom/prismjs/prismjs.bundle5883.css?v=7.2.9')); ?>" rel="stylesheet" type="text/css" />
		<link href="<?php echo e(asset('/admin_assets/css/style.bundle5883.css?v=7.2.9')); ?>" rel="stylesheet" type="text/css" />

        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css"  />

		<link rel="shortcut icon" href="<?php echo e(asset('/favicon.ico')); ?>" />
		<script>(function(h,o,t,j,a,r){ h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)}; h._hjSettings={hjid:1070954,hjsv:6}; a=o.getElementsByTagName('head')[0]; r=o.createElement('script');r.async=1; r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv; a.appendChild(r); })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');</script>
		<style>
			.dataTables_wrapper .dataTables_filter input{
				margin-left: 9px;
			}
		</style>
	</head>
	<body id="kt_body" class="header-fixed header-mobile-fixed header-bottom-enabled page-loading">
		<noscript>
			<iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5FS8GGP" height="0" width="0" style="display:none;visibility:hidden"></iframe>
		</noscript>
		<div id="kt_header_mobile" class="header-mobile bg-primary header-mobile-fixed">
			<a href="<?php echo e(url('admin/home')); ?>">
				<img alt="Logo" src="<?php echo e(asset('/logo.png')); ?>" class="max-h-35px" style="margin-right:12px;" />
			</a>
			<div class="d-flex align-items-center">
				<button class="btn p-0 burger-icon burger-icon-left ml-4" id="kt_header_mobile_toggle">
					<span></span>
				</button>
				<button class="btn p-0 ml-2" id="kt_header_mobile_topbar_toggle">
					<span class="svg-icon svg-icon-xl">
						<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
							<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
								<polygon points="0 0 24 0 24 24 0 24" />
								<path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
								<path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero" />
							</g>
						</svg>
					</span>
				</button>
			</div>
		</div>
		<?php
			$homeItems = ['admin/books','admin/book/*','admin/add','admin/edit','admin/edit/*','admin/authors','admin/author/*','admin/students','admin/student/*','admin/categories','admin/category/*','admin/publishers','admin/publisher/*','admin/edit/profile','admin/password/edit','admin/orders','admin/order/*'];
			$settings = ['admin/settings','admin/settings/*']
		?>
		<div class="d-flex flex-column">
			<div class="d-flex flex-row flex-column-fluid page">
				<div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
					<div id="kt_header" class="header flex-column header-fixed">
						<div class="header-top">
							<div class="container">
								<div class="d-none d-lg-flex align-items-center mr-3">
									<a href="<?php echo e(url('admin/home')); ?>" class="mr-20">
										<img alt="Logo" src="<?php echo e(asset('/logo.png')); ?>" class="max-h-35px" />
									</a>
									<ul class="header-tabs nav align-self-end font-size-lg" role="tablist">
										<li class="nav-item">
											<a href="<?php echo e(url('admin/home')); ?>" class="nav-link py-4 px-6 <?=setSectionActive($homeItems)?>" >Dashboard</a>
										</li>
										<li class="nav-item">
											<a href="<?php echo e(url('admin/settings')); ?>" class="nav-link py-4 px-6 <?=setSectionActive($settings)?>" >Settings</a>
										</li>
									</ul>
								</div>
								<div class="topbar">
									<div class="topbar-item">
										<div class="btn btn-icon btn-hover-transparent-white w-sm-auto d-flex align-items-center btn-lg px-2" id="kt_quick_user_toggle">
											<div class="d-flex flex-column text-right pr-sm-3">
												<span class="text-white opacity-50 font-weight-bold font-size-sm d-none d-sm-inline"><?php echo e(isset(Auth::user()->admin_name) ? Auth::user()->admin_name : Auth::user()->admin_email); ?></span>
											</div>
											<span class="symbol symbol-35">
												<span class="symbol-label font-size-h5 font-weight-bold text-white bg-white-o-30"><?php echo e(isset(Auth::user()->admin_name) ? substr(Auth::user()->admin_name ,0, 1 ): Auth::user()->admin_email); ?></span>
											</span>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="header-bottom">
							<div class="container">
								<div class="header-navs header-navs-left" id="kt_header_navs">
									<ul class="header-tabs p-5 p-lg-0 d-flex d-lg-none nav nav-bold nav-tabs" role="tablist">
										<li class="nav-item">
											<a href="<?php echo e(url('admin/students')); ?>" class="nav-link py-4 px-6 <?=setSectionActive($homeItems)?>" >Home</a>
										</li>
										<li class="nav-item">
											<a href="<?php echo e(url('admin/pages')); ?>" class="nav-link py-4 px-6 <?=setSectionActive($settings)?>" >Settings</a>
										</li>
									</ul>

									<div class="tab-content">
										<div class="tab-pane py-5 p-lg-0 <?=setTabActive($homeItems)?>" id="kt_header_tab_0">
											<div id="kt_header_menu" class="header-menu header-menu-mobile header-menu-layout-default">
												<ul class="menu-nav">
													<li class="menu-item <?php echo e(setActive(['admin/students','admin/student/*'])); ?>" aria-haspopup="true">
														<a href="<?php echo e(url('/admin/students')); ?>" class="menu-link">
															<span class="menu-text">Manage Students</span>
														</a>
													</li>
													<li class="menu-item <?php echo e(setActive(['admin/categories','admin/category/*'])); ?>" aria-haspopup="true">
														<a href="<?php echo e(url('/admin/categories')); ?>" class="menu-link">
															<span class="menu-text">Manage Categories</span>
														</a>
													</li>
													<li class="menu-item <?php echo e(setActive(['admin/authors','admin/author/*'])); ?>" aria-haspopup="true">
														<a href="<?php echo e(url('/admin/authors')); ?>" class="menu-link">
															<span class="menu-text">Manage Authors</span>
														</a>
													</li>

													<li class="menu-item <?php echo e(setActive(['admin/publishers','admin/publisher/*'])); ?>" aria-haspopup="true">
														<a href="<?php echo e(url('/admin/publishers')); ?>" class="menu-link">
															<span class="menu-text">Manage Publishers</span>
														</a>
													</li>

													<li class="menu-item <?php echo e(setActive(['admin/books','admin/book/*'])); ?>" aria-haspopup="true">
														<a href="<?php echo e(url('/admin/books')); ?>" class="menu-link">
															<span class="menu-text">Manage Books</span>
														</a>
													</li>

													<li class="menu-item <?php echo e(setActive(['admin/orders','admin/order/*'])); ?>" aria-haspopup="true">
														<a href="<?php echo e(url('/admin/orders')); ?>" class="menu-link">
															<span class="menu-text">Manage Orders</span>
														</a>
													</li>



												</ul>
											</div>
										</div>
										<div class="tab-pane py-5 p-lg-0 <?=setTabActive($settings)?>" id="kt_header_tab_0">
											<div id="kt_header_menu" class="header-menu header-menu-mobile header-menu-layout-default">
												<ul class="menu-nav">
													<!-- <li class="menu-item <?php echo e(setActive(['admin/email_templates','admin/email_template/*'])); ?>" aria-haspopup="true">
														<a href="<?php echo e(url('/admin/email_templates')); ?>" class="menu-link">
															<span class="menu-text">Email Template</span>
														</a>
													</li>  -->
													<li class="menu-item <?php echo e(setActive(['admin/settings','admin/settings/*'])); ?>" aria-haspopup="true">
														<a href="<?php echo e(url('/admin/settings')); ?>" class="menu-link">
															<span class="menu-text">Settings</span>
														</a>
													</li>
												</ul>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div id="kt_quick_user" class="offcanvas offcanvas-right p-10">
			<div class="offcanvas-header d-flex align-items-center justify-content-between pb-5">
				<h3 class="font-weight-bold m-0">Admin Profile </h3>
				<a href="#" class="btn btn-xs btn-icon btn-light blue-color-hover" id="kt_quick_user_close">
					<i class="ki ki-close icon-xs text-muted"></i>
				</a>
			</div>

			<div class="offcanvas-content pr-5 mr-n5">
				<div class="d-flex align-items-center mt-5">
					<div class="symbol symbol-100 mr-5">
						<div class="symbol-label" style="background-image:url(<?php echo e(url('/uploads/admin/thumbs/'.Auth::user()->logo)); ?>)" onerror="this.onerror=null;this.src='<?php echo e(asset('/uploads/no_image.png')); ?>';"></div>
						<i class="symbol-badge bg-success"></i>
					</div>
					<div class="d-flex flex-column">
						<div class="font-weight-bold font-size-h5 text-dark-75 "><?php echo e(isset(Auth::user()->admin_name) ? Auth::user()->admin_name : Auth::user()->admin_name); ?></div>

						<div class="navi mt-2">
							<a href="#" class="navi-item">
								<span class="navi-link p-0 pb-2">
									<span class="navi-icon mr-1">
										<span class="svg-icon svg-icon-lg svg-icon-primary">
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<rect x="0" y="0" width="24" height="24" />
													<path d="M21,12.0829584 C20.6747915,12.0283988 20.3407122,12 20,12 C16.6862915,12 14,14.6862915 14,18 C14,18.3407122 14.0283988,18.6747915 14.0829584,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,8 C3,6.8954305 3.8954305,6 5,6 L19,6 C20.1045695,6 21,6.8954305 21,8 L21,12.0829584 Z M18.1444251,7.83964668 L12,11.1481833 L5.85557487,7.83964668 C5.4908718,7.6432681 5.03602525,7.77972206 4.83964668,8.14442513 C4.6432681,8.5091282 4.77972206,8.96397475 5.14442513,9.16035332 L11.6444251,12.6603533 C11.8664074,12.7798822 12.1335926,12.7798822 12.3555749,12.6603533 L18.8555749,9.16035332 C19.2202779,8.96397475 19.3567319,8.5091282 19.1603533,8.14442513 C18.9639747,7.77972206 18.5091282,7.6432681 18.1444251,7.83964668 Z" fill="#000000" />
													<circle fill="#000000" opacity="0.3" cx="19.5" cy="17.5" r="2.5" />
												</g>
											</svg>
										</span>
									</span>

										<span class="navi-text text-muted " style="word-break: break-all;" ><?php echo e(isset(Auth::user()->admin_name) ? Auth::user()->admin_email : Auth::user()->admin_email); ?></span>

								</span>
							</a>
							<a href="<?php echo e(url('admin/logout')); ?>" class="btn btn-sm btn-light-blue-cstm font-weight-bolder py-2 px-5">Sign Out</a>
						</div>
					</div>
				</div>
				<div class="separator separator-dashed mt-8 mb-5"></div>
				<div class="navi navi-spacer-x-0 p-0">
					<a href="<?php echo e(url('admin/edit/profile')); ?>" class="navi-item">
						<div class="navi-link blue-on-hover">
							<div class="symbol symbol-40 bg-light mr-3">
								<div class="symbol-label">
									<span class="svg-icon svg-icon-md svg-icon-success">
										<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
											<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
												<rect x="0" y="0" width="24" height="24" />
												<path d="M13.2070325,4 C13.0721672,4.47683179 13,4.97998812 13,5.5 C13,8.53756612 15.4624339,11 18.5,11 C19.0200119,11 19.5231682,10.9278328 20,10.7929675 L20,17 C20,18.6568542 18.6568542,20 17,20 L7,20 C5.34314575,20 4,18.6568542 4,17 L4,7 C4,5.34314575 5.34314575,4 7,4 L13.2070325,4 Z" fill="#000000" />
												<circle fill="#000000" opacity="0.3" cx="18.5" cy="5.5" r="2.5" />
											</g>
										</svg>
									</span>
								</div>
							</div>
							<div class="navi-text">
								<div class="font-weight-bold">My Profile</div>
								<div class="text-muted">Click to Edit  </div>
							</div>
						</div>
					</a>

					<a href="<?php echo e(url('admin/password/edit')); ?>" class="navi-item">
						<div class="navi-link blue-on-hover">
							<div class="symbol symbol-40 bg-light mr-3">
								<div class="symbol-label">
									<span class="svg-icon svg-icon-md svg-icon-success">
										<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
											<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
												<rect x="0" y="0" width="24" height="24" />
												<path d="M13.2070325,4 C13.0721672,4.47683179 13,4.97998812 13,5.5 C13,8.53756612 15.4624339,11 18.5,11 C19.0200119,11 19.5231682,10.9278328 20,10.7929675 L20,17 C20,18.6568542 18.6568542,20 17,20 L7,20 C5.34314575,20 4,18.6568542 4,17 L4,7 C4,5.34314575 5.34314575,4 7,4 L13.2070325,4 Z" fill="#000000" />
												<circle fill="#000000" opacity="0.3" cx="18.5" cy="5.5" r="2.5" />
											</g>
										</svg>
									</span>
								</div>
							</div>
							<div class="navi-text">
								<div class="font-weight-bold">Change Password</div>
							</div>
						</div>
					</a>
					</div>
				<div>

				</div>
			</div>
		</div>
		<?php echo $__env->yieldContent('content'); ?>
		<script src = "https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js" defer ></script>
		<script>
			$(document).ready(function() {
                    $('#example').dataTable( {
                    "ordering": false,
					"pageLength": 50,
                    "pagingType": "full_numbers",
					"lengthMenu": [ [5, 10, 25, 50, -1], [5, 10, 25, 50, "All"] ],
					stateSave: true
                    } );
                } );
		</script>
 			<script>
                function loadPreview(input, id) {
                    id = id || '#preview_img';
                    if (input.files && input.files[0]) {
                        var reader = new FileReader();

                        reader.onload = function (e) {
                            $(id)
							.attr('src', e.target.result)
							.width(200)
							.height(150);
                        };
                        reader.readAsDataURL(input.files[0]);
                    }
                }
            </script>

		<script>var KTAppSettings = { "breakpoints": { "sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1200 }, "colors": { "theme": { "base": { "white": "#ffffff", "primary": "#6993FF", "secondary": "#E5EAEE", "success": "#1BC5BD", "info": "#8950FC", "warning": "#FFA800", "danger": "#F64E60", "light": "#F3F6F9", "dark": "#212121" }, "light": { "white": "#ffffff", "primary": "#E1E9FF", "secondary": "#ECF0F3", "success": "#C9F7F5", "info": "#EEE5FF", "warning": "#FFF4DE", "danger": "#FFE2E5", "light": "#F3F6F9", "dark": "#D6D6E0" }, "inverse": { "white": "#ffffff", "primary": "#ffffff", "secondary": "#212121", "success": "#ffffff", "info": "#ffffff", "warning": "#ffffff", "danger": "#ffffff", "light": "#464E5F", "dark": "#ffffff" } }, "gray": { "gray-100": "#F3F6F9", "gray-200": "#ECF0F3", "gray-300": "#E5EAEE", "gray-400": "#D6D6E0", "gray-500": "#B5B5C3", "gray-600": "#80808F", "gray-700": "#464E5F", "gray-800": "#1B283F", "gray-900": "#212121" } }, "font-family": "Poppins" };</script>
		<script type="text/javascript" src="<?php echo e(URL('/admin_assets/DataTables/datatables.min.js')); ?>"></script>
        <script type="text/javascript" src="<?php echo e(URL('/admin_assets/js/data-tables/jquery.dataTables.js')); ?>"></script>
		<script src="<?php echo e(asset('/admin_assets/plugins/global/plugins.bundle5883.js?v=7.2.9')); ?>"></script>
		<script src="<?php echo e(asset('/admin_assets/plugins/custom/prismjs/prismjs.bundle5883.js?v=7.2.9')); ?>"></script>
		<script src="<?php echo e(asset('/admin_assets/js/scripts.bundle5883.js?v=7.2.9')); ?>"></script>
		<script src="<?php echo e(asset('/admin_assets/plugins/custom/fullcalendar/fullcalendar.bundle5883.js?v=7.2.9')); ?>"></script>

	</body>
</html>
<?php /**PATH D:\installed Xampp\htdocs\my projects\Library ManagmentV3\Library Managment\resources\views/admin/layout/app.blade.php ENDPATH**/ ?>