<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
	<title><?php echo ($meta_title); ?></title>

	

	<!--common-->
	<link href="/Public/AdminEx/css/style.css" rel="stylesheet">
	<link href="/Public/AdminEx/css/style-responsive.css" rel="stylesheet">

	
    <style type="text/css">
        #content ul {
            list-style: none;
            position: relative;
            padding-left: 40px;
        }
        
        #content li:hover {
            background: #eff0f4;
        }
        
        #content ul a {
            padding-left: 0;
        }
        
        #content ul:before {
            width: 1px;
            z-index: 1;
            display: block;
            content: "";
            position: absolute;
            top: 0;
            bottom: 0;
            border-left: 1px dotted #666;
        }
        
        #content li:before {
            display: inline-block;
            content: "";
            width: 30px;
            height: 0;
            border-top: 1px dotted #666;
            z-index: 1;
            vertical-align: middle;
        }
        
        #masklayerbg {
            display: none;
            position: fixed;
            top: 0%;
            left: 0%;
            width: 100%;
            height: 100%;
            background-color: #777;
            z-index: 1001;
            -moz-opacity: 0.7;
            opacity: .70;
            filter: alpha(opacity=70);
        }
        
        #masklayershow {
            display: none;
            position: fixed;
            top: 1%;
            left: 22%;
            width: 56%;
            height: 98%;
            z-index: 1002;
            overflow: auto;
        }
    </style>

	
	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="/Public/AdminEx/js/html5shiv.js"></script>
	<script src="/Public/AdminEx/js/respond.min.js"></script>
	<![endif]-->
</head>

<body class="sticky-header">

	<section>
		<!-- left side start-->
		<div class="left-side sticky-left-side">

			<!--logo and iconic logo start-->
			<div class="logo">
				<a href="/"><img src="/Public/AdminEx/images/logo.png" alt=""></a>
			</div>

			<div class="logo-icon text-center">
				<a href="index.html"><img src="/Public/AdminEx/images/logo_icon.png" alt=""></a>
			</div>
			<!--logo and iconic logo end-->

			<div class="left-side-inner">

				<!-- visible to small devices only -->
				<div class="visible-xs hidden-sm hidden-md hidden-lg">
					<div class="media logged-user">
						<img alt="" src="/Public/AdminEx/images/photos/user-avatar.png" class="media-object">
						<div class="media-body">
							<h4><a href="#">John Doe</a></h4>
							<span>"Hello There..."</span>
						</div>
					</div>

					<h5 class="left-nav-title">Account Information</h5>
					<ul class="nav nav-pills nav-stacked custom-nav">
						<li><a href="#"><i class="fa fa-user"></i> <span>Profile</span></a></li>
						<li><a href="#"><i class="fa fa-cog"></i> <span>Settings</span></a></li>
						<li><a href="#"><i class="fa fa-sign-out"></i> <span>Sign Out</span></a></li>
					</ul>
				</div>

				<!--sidebar nav start-->
				<ul class="nav nav-pills nav-stacked custom-nav">
					<li class="active"><a href="index.html"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>
					<li class="menu-list"><a href=""><i class="fa fa-laptop"></i> <span>Layouts</span></a>
						<ul class="sub-menu-list">
							<li><a href="blank_page.html"> Blank Page</a></li>
							<li><a href="boxed_view.html"> Boxed Page</a></li>
							<li><a href="leftmenu_collapsed_view.html"> Sidebar Collapsed</a></li>
							<li><a href="horizontal_menu.html"> Horizontal Menu</a></li>

						</ul>
					</li>
					<li class="menu-list"><a href=""><i class="fa fa-book"></i> <span>UI Elements</span></a>
						<ul class="sub-menu-list">
							<li><a href="general.html"> General</a></li>
							<li><a href="buttons.html"> Buttons</a></li>
							<li><a href="tabs-accordions.html"> Tabs & Accordions</a></li>
							<li><a href="typography.html"> Typography</a></li>
							<li><a href="slider.html"> Slider</a></li>
							<li><a href="panels.html"> Panels</a></li>
						</ul>
					</li>
					<li class="menu-list"><a href=""><i class="fa fa-cogs"></i> <span>Components</span></a>
						<ul class="sub-menu-list">
							<li><a href="grids.html"> Grids</a></li>
							<li><a href="gallery.html"> Media Gallery</a></li>
							<li><a href="calendar.html"> Calendar</a></li>
							<li><a href="tree_view.html"> Tree View</a></li>
							<li><a href="nestable.html"> Nestable</a></li>

						</ul>
					</li>

					<li><a href="fontawesome.html"><i class="fa fa-bullhorn"></i> <span>Fontawesome</span></a></li>

					<li class="menu-list"><a href=""><i class="fa fa-envelope"></i> <span>Mail</span></a>
						<ul class="sub-menu-list">
							<li><a href="mail.html"> Inbox</a></li>
							<li><a href="mail_compose.html"> Compose Mail</a></li>
							<li><a href="mail_view.html"> View Mail</a></li>
						</ul>
					</li>

					<li class="menu-list"><a href=""><i class="fa fa-tasks"></i> <span>Forms</span></a>
						<ul class="sub-menu-list">
							<li><a href="form_layouts.html"> Form Layouts</a></li>
							<li><a href="form_advanced_components.html"> Advanced Components</a></li>
							<li><a href="form_wizard.html"> Form Wizards</a></li>
							<li><a href="form_validation.html"> Form Validation</a></li>
							<li><a href="editors.html"> Editors</a></li>
							<li><a href="inline_editors.html"> Inline Editors</a></li>
							<li><a href="pickers.html"> Pickers</a></li>
							<li><a href="dropzone.html"> Dropzone</a></li>
							<li><a href="http://www.weidea.net"> More</a></li>
						</ul>
					</li>
					<li class="menu-list"><a href=""><i class="fa fa-bar-chart-o"></i> <span>Charts</span></a>
						<ul class="sub-menu-list">
							<li><a href="flot_chart.html"> Flot Charts</a></li>
							<li><a href="morris.html"> Morris Charts</a></li>
							<li><a href="chartjs.html"> Chartjs</a></li>
							<li><a href="c3chart.html"> C3 Charts</a></li>
						</ul>
					</li>
					<li class="menu-list"><a href="#"><i class="fa fa-th-list"></i> <span>Data Tables</span></a>
						<ul class="sub-menu-list">
							<li><a href="basic_table.html"> Basic Table</a></li>
							<li><a href="dynamic_table.html"> Advanced Table</a></li>
							<li><a href="responsive_table.html"> Responsive Table</a></li>
							<li><a href="editable_table.html"> Edit Table</a></li>
						</ul>
					</li>

					<li class="menu-list"><a href="#"><i class="fa fa-map-marker"></i> <span>Maps</span></a>
						<ul class="sub-menu-list">
							<li><a href="google_map.html"> Google Map</a></li>
							<li><a href="vector_map.html"> Vector Map</a></li>
						</ul>
					</li>
					<li class="menu-list"><a href=""><i class="fa fa-file-text"></i> <span>Extra Pages</span></a>
						<ul class="sub-menu-list">
							<li><a href="profile.html"> Profile</a></li>
							<li><a href="invoice.html"> Invoice</a></li>
							<li><a href="pricing_table.html"> Pricing Table</a></li>
							<li><a href="timeline.html"> Timeline</a></li>
							<li><a href="blog_list.html"> Blog List</a></li>
							<li><a href="blog_details.html"> Blog Details</a></li>
							<li><a href="directory.html"> Directory </a></li>
							<li><a href="chat.html"> Chat </a></li>
							<li><a href="404.html"> 404 Error</a></li>
							<li><a href="500.html"> 500 Error</a></li>
							<li><a href="registration.html"> Registration Page</a></li>
							<li><a href="lock_screen.html"> Lockscreen </a></li>
						</ul>
					</li>
					<li><a href="login.html"><i class="fa fa-sign-in"></i> <span>Login Page</span></a></li>

				</ul>
				<!--sidebar nav end-->

			</div>
		</div>
		<!-- left side end-->

		<!-- main content start-->
		<div class="main-content">

			<!-- header section start-->
			<div class="header-section">

				<!--toggle button start-->
				<a class="toggle-btn"><i class="fa fa-bars"></i></a>
				<!--toggle button end-->

				<!--search start-->
				<form class="searchform" action="index.html" method="post">
					<input type="text" class="form-control" name="keyword" placeholder="Search here..." />
				</form>
				<!--search end-->

				<!--notification menu start -->
				<div class="menu-right">
					<ul class="notification-menu">
						<li>
							<a href="#" class="btn btn-default dropdown-toggle info-number" data-toggle="dropdown">
								<i class="fa fa-tasks"></i>
								<span class="badge">8</span>
							</a>
							<div class="dropdown-menu dropdown-menu-head pull-right">
								<h5 class="title">You have 8 pending task</h5>
								<ul class="dropdown-list user-list">
									<li class="new">
										<a href="#">
											<div class="task-info">
												<div>Database update</div>
											</div>
											<div class="progress progress-striped">
												<div style="width: 40%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="40" role="progressbar" class="progress-bar progress-bar-warning">
													<span class="">40%</span>
												</div>
											</div>
										</a>
									</li>
									<li class="new">
										<a href="#">
											<div class="task-info">
												<div>Dashboard done</div>
											</div>
											<div class="progress progress-striped">
												<div style="width: 90%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="90" role="progressbar" class="progress-bar progress-bar-success">
													<span class="">90%</span>
												</div>
											</div>
										</a>
									</li>
									<li>
										<a href="#">
											<div class="task-info">
												<div>Web Development</div>
											</div>
											<div class="progress progress-striped">
												<div style="width: 66%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="66" role="progressbar" class="progress-bar progress-bar-info">
													<span class="">66% </span>
												</div>
											</div>
										</a>
									</li>
									<li>
										<a href="#">
											<div class="task-info">
												<div>Mobile App</div>
											</div>
											<div class="progress progress-striped">
												<div style="width: 33%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="33" role="progressbar" class="progress-bar progress-bar-danger">
													<span class="">33% </span>
												</div>
											</div>
										</a>
									</li>
									<li>
										<a href="#">
											<div class="task-info">
												<div>Issues fixed</div>
											</div>
											<div class="progress progress-striped">
												<div style="width: 80%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="80" role="progressbar" class="progress-bar">
													<span class="">80% </span>
												</div>
											</div>
										</a>
									</li>
									<li class="new"><a href="">See All Pending Task</a></li>
								</ul>
							</div>
						</li>
						<li>
							<a href="#" class="btn btn-default dropdown-toggle info-number" data-toggle="dropdown">
								<i class="fa fa-envelope-o"></i>
								<span class="badge">5</span>
							</a>
							<div class="dropdown-menu dropdown-menu-head pull-right">
								<h5 class="title">You have 5 Mails </h5>
								<ul class="dropdown-list normal-list">
									<li class="new">
										<a href="">
											<span class="thumb"><img src="/Public/AdminEx/images/photos/user1.png" alt="" /></span>
											<span class="desc">
										  <span class="name">John Doe <span class="badge badge-success">new</span></span>
											<span class="msg">Lorem ipsum dolor sit amet...</span>
											</span>
										</a>
									</li>
									<li>
										<a href="">
											<span class="thumb"><img src="/Public/AdminEx/images/photos/user2.png" alt="" /></span>
											<span class="desc">
										  <span class="name">Jonathan Smith</span>
											<span class="msg">Lorem ipsum dolor sit amet...</span>
											</span>
										</a>
									</li>
									<li>
										<a href="">
											<span class="thumb"><img src="/Public/AdminEx/images/photos/user3.png" alt="" /></span>
											<span class="desc">
										  <span class="name">Jane Doe</span>
											<span class="msg">Lorem ipsum dolor sit amet...</span>
											</span>
										</a>
									</li>
									<li>
										<a href="">
											<span class="thumb"><img src="/Public/AdminEx/images/photos/user4.png" alt="" /></span>
											<span class="desc">
										  <span class="name">Mark Henry</span>
											<span class="msg">Lorem ipsum dolor sit amet...</span>
											</span>
										</a>
									</li>
									<li>
										<a href="">
											<span class="thumb"><img src="/Public/AdminEx/images/photos/user5.png" alt="" /></span>
											<span class="desc">
										  <span class="name">Jim Doe</span>
											<span class="msg">Lorem ipsum dolor sit amet...</span>
											</span>
										</a>
									</li>
									<li class="new"><a href="">Read All Mails</a></li>
								</ul>
							</div>
						</li>
						<li>
							<a href="#" class="btn btn-default dropdown-toggle info-number" data-toggle="dropdown">
								<i class="fa fa-bell-o"></i>
								<span class="badge">4</span>
							</a>
							<div class="dropdown-menu dropdown-menu-head pull-right">
								<h5 class="title">Notifications</h5>
								<ul class="dropdown-list normal-list">
									<li class="new">
										<a href="">
											<span class="label label-danger"><i class="fa fa-bolt"></i></span>
											<span class="name">Server #1 overloaded.  </span>
											<em class="small">34 mins</em>
										</a>
									</li>
									<li class="new">
										<a href="">
											<span class="label label-danger"><i class="fa fa-bolt"></i></span>
											<span class="name">Server #3 overloaded.  </span>
											<em class="small">1 hrs</em>
										</a>
									</li>
									<li class="new">
										<a href="">
											<span class="label label-danger"><i class="fa fa-bolt"></i></span>
											<span class="name">Server #5 overloaded.  </span>
											<em class="small">4 hrs</em>
										</a>
									</li>
									<li class="new">
										<a href="">
											<span class="label label-danger"><i class="fa fa-bolt"></i></span>
											<span class="name">Server #31 overloaded.  </span>
											<em class="small">4 hrs</em>
										</a>
									</li>
									<li class="new"><a href="">See All Notifications</a></li>
								</ul>
							</div>
						</li>
						<li>
							<a href="#" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
								<img src="/Public/AdminEx/images/photos/user-avatar.png" alt="" /> John Doe
								<span class="caret"></span>
							</a>
							<ul class="dropdown-menu dropdown-menu-usermenu pull-right">
								<li><a href="#"><i class="fa fa-user"></i>  Profile</a></li>
								<li><a href="#"><i class="fa fa-cog"></i>  Settings</a></li>
								<li><a href="#"><i class="fa fa-sign-out"></i> Log Out</a></li>
							</ul>
						</li>

					</ul>
				</div>
				<!--notification menu end -->

			</div>
			<!-- header section end-->

			<!-- page heading start-->
			<div class="page-heading">
				<h3>
					<?php echo ($meta_title); ?>
				</h3>
				<ul class="breadcrumb">
					<li>
						<a href="#">Dashboard</a>
					</li>
					<li class="active"> My Dashboard </li>
				</ul>
				
			</div>
			<!-- page heading end-->

			<!--body wrapper start-->
			<div class="wrapper">
				
    <div class="row">
        <div class="col-md-12">
            <section class="panel">
                <header class="panel-heading">
                    <a class="btn btn-link fullClick">全选</a> |
                    <a class="btn btn-link nofullClick">取消全选</a>
                </header>
                <div class="panel-body" id="content"></div>
            </section>
        </div>
    </div>

			</div>
			<!--body wrapper end-->

			<!--footer section start-->
			<footer>
				2014 &copy; AdminEx by <a href="http://www.mycodes.net/" target="_blank">源码之家</a>
			</footer>
			<!--footer section end-->
		</div>
		<!-- main content end-->
	</section>

	<!-- Placed js at the end of the document so the pages load faster -->
	<script src="/Public/AdminEx/js/jquery-1.10.2.min.js"></script>
	<script src="/Public/AdminEx/js/jquery-ui-1.9.2.custom.min.js"></script>
	<script src="/Public/AdminEx/js/jquery-migrate-1.2.1.min.js"></script>
	<script src="/Public/AdminEx/js/bootstrap.min.js"></script>
	<script src="/Public/AdminEx/js/modernizr.min.js"></script>
	<script src="/Public/AdminEx/js/jquery.nicescroll.js"></script>

	
    <script src="/Public/Javascript/vertify.js"></script>
    <script src="/Public/Admin/menu.js"></script>


	<!--common scripts for all pages-->
	<script src="/Public/AdminEx/js/scripts.js"></script>
	
	
    <script type="text/javascript">
        $(function () {
            fuc.init();
        });
    </script>


</body>

</html>