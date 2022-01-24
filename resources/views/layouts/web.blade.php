
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>INSPEKTORAT KOTA CILEGON</title>
	<link rel="shortcut icon" href="http://inspektorat.cilegon.go.id/assets/img/profil/5821cilegon2.png" width="30" type="image/x-icon">
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	
	<!-- ================== BEGIN BASE CSS STYLE ================== -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
	<link href="{{url('assets/assets/css/default/app.min.css')}}" rel="stylesheet" />
	<!-- <link href="{{url('assets/assets/css/transparent/app.min.css')}}" rel="stylesheet"> -->
	<!-- ================== END BASE CSS STYLE ================== -->
    <!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
	<link href="{{url('assets/assets/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.css')}}" rel="stylesheet" />
	<link href="{{url('assets/assets/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker3.css')}}" rel="stylesheet" />
	<link href="{{url('assets/assets/plugins/ion-rangeslider/css/ion.rangeSlider.min.css')}}" rel="stylesheet" />
	<link href="{{url('assets/assets/plugins/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css')}}" rel="stylesheet" />
	<link href="{{url('assets/assets/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css')}}" rel="stylesheet" />
	<link href="{{url('assets/assets/plugins/@danielfarrell/bootstrap-combobox/css/bootstrap-combobox.css')}}" rel="stylesheet" />
	<link href="{{url('assets/assets/plugins/bootstrap-select/dist/css/bootstrap-select.min.css')}}" rel="stylesheet" />
	<link href="{{url('assets/assets/plugins/tag-it/css/jquery.tagit.css')}}" rel="stylesheet" />
	<link href="{{url('assets/assets/plugins/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet" />
	<link href="{{url('assets/assets/plugins/select2/dist/css/select2.min.css')}}" rel="stylesheet" />
	<link href="{{url('assets/assets/plugins/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css')}}" rel="stylesheet" />
	<link href="{{url('assets/assets/plugins/bootstrap-colorpalette/css/bootstrap-colorpalette.css')}}" rel="stylesheet" />
	<link href="{{url('assets/assets/plugins/jquery-simplecolorpicker/jquery.simplecolorpicker.css')}}" rel="stylesheet" />
	<link href="{{url('assets/assets/plugins/jquery-simplecolorpicker/jquery.simplecolorpicker-fontawesome.css')}}" rel="stylesheet" />
	<link href="{{url('assets/assets/plugins/jquery-simplecolorpicker/jquery.simplecolorpicker-glyphicons.css')}}" rel="stylesheet" />
	<!-- ================== END PAGE LEVEL STYLE ================== -->
	<link href="{{url('assets/assets/plugins/jstree/dist/themes/default/style.min.css')}}" rel="stylesheet" />
	<link href="{{url('assets/assets/plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
	<link href="{{url('assets/assets/plugins/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
	<link href="{{url('assets/assets/plugins/datatables.net-fixedheader-bs4/css/fixedheader.bootstrap4.min.css')}}" rel="stylesheet" />
	<link href="{{url('assets/assets/plugins/smartwizard/dist/css/smart_wizard.css')}}" rel="stylesheet" />
	<link href="{{url('assets/assets/plugins/bootstrap3-wysihtml5-bower/dist/bootstrap3-wysihtml5.min.css')}}" rel="stylesheet" />
	<style>
		.loadnya {
			height: 100%;
			width: 0;
			position: fixed;
			z-index: 1070;
			top: 0;
			left: 0;
			background-color: rgb(181 167 167 / 79%);
			overflow-x: hidden;
			transition: transform .9s;
		}

		.loadnya-content {
			position: relative;
			top: 25%;
			width: 100%;
			text-align: center;
			margin-top: 30px;
			color:#fff;
			font-size:20px;
		}
		.nav-pills .nav-link.active, .nav-pills .show>.nav-link {
			background-color: #85af7e !important;
			border-radius: 0px  !important;
		}
		.page-with-light-sidebar .sidebar-bg {
			background: transparent;
		}
		.page-with-light-sidebar .sidebar .nav>li>a {
			color: #fefeff;
			font-weight: 600;
		}
		.page-with-light-sidebar .sidebar .nav>li>a:focus, .page-with-light-sidebar .sidebar .nav>li>a:hover {
			color: #7388b9;
		}
		.page-with-light-sidebar .sidebar .sub-menu>li>a {
			color: #f1f4f7;
			font-weight: 600!important;
		}
		.lilinya{
			border-style: solid;
			border-width: 1px 0px 0px 0px;
			border-color: #706161;
		}
		.page-header {
			font-size: 24px;
			margin: 0 0 15px;
			color: #fff;
			padding: 0;
			margin-right:10px;
			border: none;
			line-height: 32px;
			font-weight: 500;
		}
		.panel {
			margin-bottom: 20px;
			background: #fbf9f9ed;
			border: none;
			-webkit-box-shadow: none;
			box-shadow: none;
			-webkit-border-radius: 3px;
			border-radius: 3px;
		}
		.breadcrumb .breadcrumb-item a {
			color: #b8c1c9;
		}
		.header.navbar-inverse {
			background: #150f34;
		}
		.modal-header{
			background:#101c3c;
			color:#fff;
		}
		.modal-besar{
			max-width:70% !important;
		}
		.widget-chart-info-progress{
				text-align:left;
			}

		@media only screen and (min-width: 600px) {
			#logo-head-web{
				
			}
			#logo-head-mobile{
				display: none;
			}
			marquee{
				font-size: 17px;
    			text-transform: uppercase;
			}
			.img-file{
				width:20%
			}
			.img-file-col{
				width:50%
			}
			
		}

		@media only screen and (max-width: 590px) {
			#logo-head-web{
				display: none;
			}
			#row-web{
			    display:none;
			}
			#logo-head-mobile{
				
			}
			.modal-dialog{
				max-width: 100% !important;
			}
			#content{
				padding: 4%;
			}
			.content{
				padding: 1% !important;
			}
			#login-mobile{
			    display:none;
			}
			.panel-body{
				overflow-y:scroll;
			}
			.widget-list-content{
				text-align:right;
				width: 20%;
			}
			
			marquee{
				font-size: 17px;
    			text-transform: uppercase;
			}
			.img-file{
				width:100%
			}
			.img-file-col{
				width:100%
			}
			.header .navbar-brand img {
                max-width: max-content !important;
                max-height: max-content !important;
                width:170px !important;
                margin-top: 0% !important;
            }
            .page-header-fixed {
                padding-top: 13%;
            }
		}

	</style>
	@stack('style')
</head>
<body style="background: url({{url('img/bgbg2.jpg')}});background-size: cover;">
	<!-- begin #page-loader -->
	<div id="page-loader" class="fade show">
		<span class="spinner"></span>
	</div>
	<div id="loadnya" class="loadnya">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <div class="loadnya-content">
			<img src="{{url('img/loading.gif')}}" width="30%">
        </div>
	</div>
	<!-- end #page-loader -->
	<div class="app-cover"></div>
	<!-- begin #page-container -->
	<div id="page-container"  class="fade page-sidebar-fixed page-header-fixed page-with-light-sidebar">
		<!-- begin #header -->
		<div id="header" class="header navbar-inverse">
			<!-- begin navbar-header -->
			<div class="navbar-header" id="logo-head-web">
				<a href="index.html" class="navbar-brand"><img src="{{url('img/logo.png')}}" alt="" width="60%" /></a>
				<button type="button" class="navbar-toggle" data-click="sidebar-toggled">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>
			<div class="navbar-header" id="logo-head-mobile">
				<a href="index.html" class="navbar-brand"><img src="{{url('img/logo.png')}}" alt="" width="10%" /></a>
				<button type="button" class="navbar-toggle" data-click="sidebar-toggled">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>
			<!-- end navbar-header --><!-- begin header-nav -->
			<ul class="navbar-nav navbar-right">
				
				<!-- <li class="dropdown">
					<a href="#" data-toggle="dropdown" class="dropdown-toggle f-s-14">
						<i class="fa fa-bell"></i>
						<span class="label">5</span>
					</a>
					<div class="dropdown-menu media-list dropdown-menu-right">
						<div class="dropdown-header">NOTIFICATIONS (5)</div>
						<a href="javascript:;" class="dropdown-item media">
							<div class="media-left">
								<i class="fa fa-bug media-object bg-silver-darker"></i>
							</div>
							<div class="media-body">
								<h6 class="media-heading">Server Error Reports <i class="fa fa-exclamation-circle text-danger"></i></h6>
								<div class="text-muted f-s-10">3 minutes ago</div>
							</div>
						</a>
						
						<div class="dropdown-footer text-center">
							<a href="javascript:;">View more</a>
						</div>
					</div>
				</li> -->
				<li class="dropdown navbar-user" id="login-mobile">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<img src="{{url('img/akun.png')}}" alt="" /> 
						<span class="d-none d-md-inline">{{Auth::user()->name}}</span> <b class="caret"></b>
					</a>
					<div class="dropdown-menu dropdown-menu-right">
						<a href="javascript:;" class="dropdown-item">Setting</a>
						<div class="dropdown-divider"></div>
						<a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Log Out</a>
						
						<form id="logout-form" onkeypress="return event.keyCode != 13"  action="{{ route('logout') }}" method="POST" class="d-none">
							@csrf
						</form>
					</div>
				</li>
			</ul>
			<!-- end header-nav -->
		</div>
		<!-- end #header -->
		
		<!-- begin #sidebar -->
		<div id="sidebar" class="sidebar" style="background: #190e44;">
			<!-- begin sidebar scrollbar -->
			<div data-scrollbar="true" data-height="100%">
				<!-- begin sidebar user -->
				<ul class="nav">
					<li class="nav-profile">
						<a href="javascript:;" data-toggle="nav-profile">
							<div class="cover with-shadow"></div>
							<div class="image">
								<img src="{{url('img/akun.png')}}" alt="" />
							</div>
							<div class="info">
								<b class="caret pull-right"></b>{{Auth::user()->name}}
								@if(Auth::user()->role_id==3)
									<small>{{nama_opd()}}</small>
								@else
									<small>{{aksesnya(Auth::user()->akses)}}</small>
								@endif
								
							</div>
						</a>
					</li>
					<!-- <li>
						<ul class="nav nav-profile">
							<li><a href="javascript:;"><i class="fa fa-cog"></i> Settings</a></li>
							<li><a href="javascript:;"><i class="fa fa-pencil-alt"></i> Send Feedback</a></li>
							<li><a href="javascript:;"><i class="fa fa-question-circle"></i> Helps</a></li>
						</ul>
					</li> -->
				</ul>
				<!-- end sidebar user -->
				<!-- begin sidebar nav -->
				@include('layouts.side')
				<!-- end sidebar nav -->
			</div>
			<!-- end sidebar scrollbar -->
		</div>
		<div class="sidebar-bg"></div>
		<!-- end #sidebar -->
		
		<!-- begin #content -->
		@yield('conten')
		<!-- end #content -->
		<div class="row">
					<div class="modal fade" id="modal-kke" aria-hidden="true" style="display: none;">
                        <div class="modal-dialog" style="max-width:90%">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="labelkke"></h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                </div>
                                <div class="modal-body">
                                   
                                        <div id="tampil-kke"></div>
                                    
                                </div>
                                <div class="modal-footer">
                                    <a href="javascript:;" class="btn btn-red" data-dismiss="modal">Tutup</a>
                                </div>
                            </div>
                        </div>
                    </div>
					<div class="modal fade" id="modal-password" style="background:#9e9eadd1" aria-hidden="true" style="display: none;">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="labelkke"></h4>
                                    <button type="button" class="close">×</button>
                                </div>
                                <div class="modal-body">
									<form  id="password-data" onkeypress="return event.keyCode != 13"  action="{{url('/Ubahpassword')}}" method="post" enctype="multipart/form-data">
							                @csrf
											<div class="form-group">
												<label>Password Baru</label>
												<input type="text" name="password" class="form-control">
											</div>
									</form>
                                </div>
                                <div class="modal-footer">
                                    <a href="javascript:;" class="btn btn-blue" onclick="simpan_password()">Ubah Password</a>
                                </div>
                            </div>
                        </div>
                    </div>
		</div>

		<!-- begin theme-panel -->
		<div class="theme-panel theme-panel-lg">
			<!-- <a href="javascript:;" data-click="theme-panel-expand" class="theme-collapse-btn"><i class="fa fa-cog"></i></a> -->
			<div class="theme-panel-content">
				<h5>App Settings</h5><ul class="theme-list clearfix">
					<li><a href="javascript:;" class="bg-red" data-theme="red" data-theme-file="../assets/css/default/theme/red.min.css" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Red">&nbsp;</a></li>
					<li><a href="javascript:;" class="bg-pink" data-theme="pink" data-theme-file="../assets/css/default/theme/pink.min.css" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Pink">&nbsp;</a></li>
					<li><a href="javascript:;" class="bg-orange" data-theme="orange" data-theme-file="../assets/css/default/theme/orange.min.css" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Orange">&nbsp;</a></li>
					<li><a href="javascript:;" class="bg-yellow" data-theme="yellow" data-theme-file="../assets/css/default/theme/yellow.min.css" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Yellow">&nbsp;</a></li>
					<li><a href="javascript:;" class="bg-lime" data-theme="lime" data-theme-file="../assets/css/default/theme/lime.min.css" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Lime">&nbsp;</a></li>
					<li><a href="javascript:;" class="bg-green" data-theme="green" data-theme-file="../assets/css/default/theme/green.min.css" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Green">&nbsp;</a></li>
					<li class="active"><a href="javascript:;" class="bg-teal" data-theme="default" data-theme-file="" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Default">&nbsp;</a></li>
					<li><a href="javascript:;" class="bg-aqua" data-theme="aqua" data-theme-file="../assets/css/default/theme/aqua.min.css" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Aqua">&nbsp;</a></li>
					<li><a href="javascript:;" class="bg-blue" data-theme="blue" data-theme-file="../assets/css/default/theme/blue.min.css" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Blue">&nbsp;</a></li>
					<li><a href="javascript:;" class="bg-purple" data-theme="purple" data-theme-file="../assets/css/default/theme/purple.min.css" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Purple">&nbsp;</a></li>
					<li><a href="javascript:;" class="bg-indigo" data-theme="indigo" data-theme-file="../assets/css/default/theme/indigo.min.css" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Indigo">&nbsp;</a></li>
					<li><a href="javascript:;" class="bg-black" data-theme="black" data-theme-file="../assets/css/default/theme/black.min.css" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Black">&nbsp;</a></li>
				</ul>
				<div class="divider"></div>
				<div class="row m-t-10">
					<div class="col-6 control-label text-inverse f-w-600">Header Fixed</div>
					<div class="col-6 d-flex">
						<div class="custom-control custom-switch ml-auto">
							<input type="checkbox" class="custom-control-input" name="header-fixed" id="headerFixed" value="1" checked />
							<label class="custom-control-label" for="headerFixed">&nbsp;</label>
						</div>
					</div>
				</div>
				<div class="row m-t-10">
					<div class="col-6 control-label text-inverse f-w-600">Header Inverse</div>
					<div class="col-6 d-flex">
						<div class="custom-control custom-switch ml-auto">
							<input type="checkbox" class="custom-control-input" name="header-inverse" id="headerInverse" value="1" />
							<label class="custom-control-label" for="headerInverse">&nbsp;</label>
						</div>
					</div>
				</div>
				<div class="row m-t-10">
					<div class="col-6 control-label text-inverse f-w-600">Sidebar Fixed</div>
					<div class="col-6 d-flex">
						<div class="custom-control custom-switch ml-auto">
							<input type="checkbox" class="custom-control-input" name="sidebar-fixed" id="sidebarFixed" value="1" checked />
							<label class="custom-control-label" for="sidebarFixed">&nbsp;</label>
						</div>
					</div>
				</div>
				<div class="row m-t-10">
					<div class="col-6 control-label text-inverse f-w-600">Sidebar Grid</div>
					<div class="col-6 d-flex">
						<div class="custom-control custom-switch ml-auto">
							<input type="checkbox" class="custom-control-input" name="sidebar-grid" id="sidebarGrid" value="1" />
							<label class="custom-control-label" for="sidebarGrid">&nbsp;</label>
						</div>
					</div>
				</div>
				<div class="row m-t-10">
					<div class="col-md-6 control-label text-inverse f-w-600">Sidebar Gradient</div>
					<div class="col-md-6 d-flex">
						<div class="custom-control custom-switch ml-auto">
							<input type="checkbox" class="custom-control-input" name="sidebar-gradient" id="sidebarGradient" value="1" />
							<label class="custom-control-label" for="sidebarGradient">&nbsp;</label>
						</div>
					</div>
				</div>
				<div class="divider"></div>
				<h5>Admin Design (5)</h5>
				<div class="theme-version">
					<a href="../template_html/index_v2.html" class="active">
						<span style="background-image: url(../assets/img/theme/default.jpg);"></span>
					</a>
					<a href="../template_transparent/index_v2.html">
						<span style="background-image: url(../assets/img/theme/transparent.jpg);"></span>
					</a>
				</div>
				<div class="theme-version">
					<a href="../template_apple/index_v2.html">
						<span style="background-image: url(../assets/img/theme/apple.jpg);"></span>
					</a>
					<a href="../template_material/index_v2.html">
						<span style="background-image: url(../assets/img/theme/material.jpg);"></span>
					</a>
				</div>
				<div class="theme-version">
					<a href="../template_facebook/index_v2.html">
						<span style="background-image: url(../assets/img/theme/facebook.jpg);"></span>
					</a>
					<a href="../template_google/index_v2.html">
						<span style="background-image: url(../assets/img/theme/google.jpg);"></span>
					</a>
				</div>
				<div class="divider"></div>
				<h5>Language Version (7)</h5>
				<div class="theme-version">
					<a href="../template_html/index_v2.html" class="active">
						<span style="background-image: url(../assets/img/version/html.jpg);"></span>
					</a>
					<a href="../template_ajax/index_v2.html">
						<span style="background-image: url(../assets/img/version/ajax.jpg);"></span>
					</a>
				</div>
				<div class="theme-version">
					<a href="../template_angularjs/index_v2.html">
						<span style="background-image: url(../assets/img/version/angular1x.jpg);"></span>
					</a>
					<a href="../template_angularjs8/index_v2.html">
						<span style="background-image: url(../assets/img/version/angular8x.jpg);"></span>
					</a>
				</div>
				<div class="theme-version">
					<a href="../template_laravel/index_v2.html">
						<span style="background-image: url(../assets/img/version/laravel.jpg);"></span>
					</a>
					<a href="../template_vuejs/index_v2.html">
						<span style="background-image: url(../assets/img/version/vuejs.jpg);"></span>
					</a>
				</div>
				<div class="theme-version">
					<a href="../template_reactjs/index_v2.html">
						<span style="background-image: url(../assets/img/version/reactjs.jpg);"></span>
					</a>
				</div>
				<div class="divider"></div>
				<h5>Frontend Design (4)</h5>
				<div class="theme-version">
					<a href="../../../frontend/template/template_one_page_parallax/index.html">
						<span style="background-image: url(../assets/img/theme/one-page-parallax.jpg);"></span>
					</a>
					<a href="../../../frontend/template/template_e_commerce/index.html">
						<span style="background-image: url(../assets/img/theme/e-commerce.jpg);"></span>
					</a>
				</div>
				<div class="theme-version">
					<a href="../../../frontend/template/template_blog/index.html">
						<span style="background-image: url(../assets/img/theme/blog.jpg);"></span>
					</a>
					<a href="../../../frontend/template/template_forum/index.html">
						<span style="background-image: url(../assets/img/theme/forum.jpg);"></span>
					</a>
				</div>
				<div class="divider"></div>
				<div class="row m-t-10">
					<div class="col-md-12">
						<a href="https://seantheme.com/color-admin/documentation/" class="btn btn-inverse btn-block btn-rounded" target="_blank"><b>Documentation</b></a>
						<a href="javascript:;" class="btn btn-default btn-block btn-rounded" data-click="reset-local-storage"><b>Reset Local Storage</b></a>
					</div>
				</div>
			</div>
		</div>
		<!-- end theme-panel -->
		
		<!-- begin scroll to top btn -->
		<a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
		<!-- end scroll to top btn -->
	</div>
	<!-- end page container -->
	
	<!-- ================== BEGIN BASE JS ================== -->
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="{{url('assets/assets/js/app.min.js')}}"></script>
	<!-- <script src="{{url('assets/assets/js/theme/default.min.js')}}"></script> -->
	<script src="{{url('assets/assets/js/theme/transparent.min.js')}}"></script>
	<!-- ================== END BASE JS ================== -->
	
	<!-- ================== BEGIN PAGE LEVEL JS ================== -->
	<script src="{{url('assets/assets/plugins/jquery-migrate/dist/jquery-migrate.min.js')}}"></script>
	<script src="{{url('assets/assets/plugins/moment/min/moment.min.js')}}"></script>
	<script src="{{url('assets/assets/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.js')}}"></script>
	<script src="{{url('assets/assets/plugins/ion-rangeslider/js/ion.rangeSlider.min.js')}}"></script>
	<script src="{{url('assets/assets/plugins/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js')}}"></script>
	<script src="{{url('assets/assets/plugins/jquery.maskedinput/src/jquery.maskedinput.js')}}"></script>
	<script src="{{url('assets/assets/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js')}}"></script>
	<script src="{{url('assets/assets/plugins/pwstrength-bootstrap/dist/pwstrength-bootstrap.min.js')}}"></script>
	<script src="{{url('assets/assets/plugins/@danielfarrell/bootstrap-combobox/js/bootstrap-combobox.js')}}"></script>
	<script src="{{url('assets/assets/plugins/bootstrap-select/dist/js/bootstrap-select.min.js')}}"></script>
	<script src="{{url('assets/assets/plugins/tag-it/js/tag-it.min.js')}}"></script>
	<script src="{{url('assets/assets/plugins/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
	<script src="{{url('assets/assets/plugins/select2/dist/js/select2.min.js')}}"></script>
	<script src="{{url('assets/assets/plugins/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js')}}"></script>
	<script src="{{url('assets/assets/plugins/bootstrap-show-password/dist/bootstrap-show-password.js')}}"></script>
	<script src="{{url('assets/assets/plugins/bootstrap-colorpalette/js/bootstrap-colorpalette.js')}}"></script>
	<script src="{{url('assets/assets/plugins/jquery-simplecolorpicker/jquery.simplecolorpicker.js')}}"></script>
	<script src="{{url('assets/assets/plugins/clipboard/dist/clipboard.min.js')}}"></script>
	<script src="{{url('assets/assets/js/demo/form-plugins.demo.js')}}"></script>
	<script src="{{url('assets/assets/plugins/datatables.net/js/jquery.dataTables.min.js')}}"></script>
	<script src="{{url('assets/assets/plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
	<script src="{{url('assets/assets/plugins/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
	<script src="{{url('assets/assets/plugins/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')}}"></script>
	<script src="{{url('assets/assets/js/demo/table-manage-responsive.demo.js')}}"></script>
	<script src="{{url('assets/assets/plugins/chart.js/dist/Chart.min.js')}}"></script>
	<script src="{{url('assets/assets/plugins/jstree/dist/jstree.min.js')}}"></script>
	<script src="{{url('assets/assets/js/demo/ui-tree.demo.js')}}"></script>
	<!-- ================== BEGIN PAGE LEVEL JS ================== -->
	<script src="{{url('assets/assets/plugins/datatables.net-fixedheader/js/dataTables.fixedheader.min.js')}}"></script>
	<script src="{{url('assets/assets/plugins/datatables.net-fixedheader-bs4/js/fixedheader.bootstrap4.min.js')}}"></script>
	@stack('ajax')
	<script>
		function pilih_tahun_laporan(id) {
			location.assign("{{url('Transaksilhe/create')}}?id="+id);
		}
		function kirim_auditor(id) {
			$.ajax({
				type: 'GET',
				url: "{{url('Transaksilhe/kirim_auditor')}}",
				data: "id="+id,
				beforeSend: function() {
					document.getElementById("loadnya").style.width = "100%";
				},
				success: function(msg){
					location.reload();
				}
			}); 
		}
		function hanyaAngka(evt) {
			var charCode = (evt.which) ? evt.which : event.keyCode
			if (charCode > 31 && (charCode < 48 || charCode > 57))

				return false;
			return true;
		}
		function hanyaangkadantitik(evt) {
			var charCode = (evt.which) ? evt.which : event.keyCode
			if (charCode > 31 && (charCode < 45 || charCode > 57) || charCode==48)
			
				return false;
			return true;
			// alert(charCode)
		}

		@if(Auth::user()->role_id==2 || Auth::user()->role_id==3 )
			@if(Auth::user()->sts_pass=='')
				$('#modal-password').modal({
                        backdrop: 'static',
                        keyboard: true, 
                        show: true
                });
			@endif
		@endif

		function simpan_password(){
            var form=document.getElementById('password-data');
            
                $.ajax({
                    type: 'POST',
                    url: "{{url('/Ubahpassword')}}",
                    data: new FormData(form),
                    contentType: false,
                    cache: false,
                    processData:false,
                    beforeSend: function() {
						document.getElementById("loadnya").style.width = "100%";
					},
                    success: function(msg){
                        location.reload();
                        
                    }
                });

        } 
		function cetak_kke(id,a,label){
            $('#labelkke').html(label);
            $('#tampil-kke').html("<iframe src='{{url('Transaksilhe/cetak')}}?kat="+a+"&id="+id+"' width='100%' height='600px'></iframe>");
            $('#modal-kke').modal('show');
        }
	</script>
	<!-- ================== END BASE JS ================== -->
</body>
</html>