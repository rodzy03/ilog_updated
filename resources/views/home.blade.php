<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<title>Color Admin | Blank Page</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />   
	
	<!-- ================== BEGIN BASE CSS STYLE ================== -->
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
	<link href="../assets/plugins/jquery-ui/jquery-ui.min.css" rel="stylesheet" />
	<link href="../assets/plugins/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" />
	<link href="../assets/plugins/font-awesome/5.0/css/fontawesome-all.min.css" rel="stylesheet" />
	<link href="../assets/plugins/animate/animate.min.css" rel="stylesheet" />
	<link href="../assets/css/default/style.min.css" rel="stylesheet" />
	<link href="../assets/css/default/style-responsive.min.css" rel="stylesheet" />
	<link href="../assets/css/default/theme/default.css" rel="stylesheet" id="theme" />
	<!-- ================== END BASE CSS STYLE ================== -->
	
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="../assets/plugins/pace/pace.min.js"></script>
	<!-- ================== END BASE JS ================== -->
    <style>
    #my_camera{
        width: 320px;
        height: 240px;
        border: 1px solid black;
    }
    </style>

</head>
<body>
	<!-- begin #page-loader -->
	<div id="page-loader" class="fade show"><span class="spinner"></span></div>
	<!-- end #page-loader -->
	
	<!-- begin #page-container -->
	<div id="page-container" class="page-container fade page-sidebar-fixed page-header-fixed">
		<!-- begin #header -->
		<div id="header" class="header navbar-default">
			<!-- begin navbar-header -->
			<div class="navbar-header">
				<a href="index.html" class="navbar-brand"><span class="navbar-logo"></span> <b>Color</b> Admin</a>
				<button type="button" class="navbar-toggle" data-click="sidebar-toggled">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>
			<!-- end navbar-header -->
			
			
		</div>
		<!-- end #header -->
		
		<!-- begin #sidebar -->
		<div id="sidebar" class="sidebar">
			<!-- begin sidebar scrollbar -->
			<div data-scrollbar="true" data-height="100%">
				<!-- begin sidebar user -->
				<ul class="nav">
					<li class="nav-profile">
						<a href="javascript:;" data-toggle="nav-profile">
							<div class="cover with-shadow"></div>
							<div class="image">
								<img src="../assets/img/user/user-13.jpg" alt="" />
							</div>
							<div class="info">
								<b class="caret pull-right"></b>
								Sean Ngu
								<small>Front end developer</small>
							</div>
						</a>
					</li>
					<li>
						<ul class="nav nav-profile">
                            <li><a href="javascript:;"><i class="fa fa-cog"></i> Settings</a></li>
                            <li><a href="javascript:;"><i class="fa fa-pencil-alt"></i> Send Feedback</a></li>
                            <li><a href="javascript:;"><i class="fa fa-question-circle"></i> Helps</a></li>
                        </ul>
					</li>
				</ul>
				<!-- end sidebar user -->
				<!-- begin sidebar nav -->
				<ul class="nav">
					<li class="nav-header">Navigation</li>
					<li class="has-sub">
						<a href="javascript:;">
					        <b class="caret"></b>
						    <i class="fa fa-th-large"></i>
						    <span>Dashboard</span>
					    </a>
						<ul class="sub-menu">
						    <li><a href="index.html">Dashboard v1</a></li>
						    <li><a href="index_v2.html">Dashboard v2</a></li>
						</ul>
					</li>
					<li class="has-sub">
						<a href="javascript:;">
							<span class="badge pull-right">10</span>
							<i class="fa fa-hdd"></i> 
							<span>Email</span>
						</a>
						<ul class="sub-menu">
						    <li><a href="email_inbox.html">Inbox</a></li>
						    <li><a href="email_compose.html">Compose</a></li>
						    <li><a href="email_detail.html">Detail</a></li>
						</ul>
					</li>
					<li class="has-sub">
						<a href="javascript:;">
					        <b class="caret"></b>
						    <i class="fa fa-gem"></i>
						    <span>UI Elements <span class="label label-theme m-l-5">NEW</span></span> 
						</a>
						<ul class="sub-menu">
							<li><a href="ui_general.html">General</a></li>
							<li><a href="ui_typography.html">Typography</a></li>
							<li><a href="ui_tabs_accordions.html">Tabs & Accordions</a></li>
							<li><a href="ui_unlimited_tabs.html">Unlimited Nav Tabs</a></li>
							<li><a href="ui_modal_notification.html">Modal & Notification <i class="fa fa-paper-plane text-theme m-l-5"></i></a></li>
							<li><a href="ui_widget_boxes.html">Widget Boxes</a></li>
							<li><a href="ui_media_object.html">Media Object</a></li>
							<li><a href="ui_buttons.html">Buttons</a></li>
							<li><a href="ui_icons.html">Icons</a></li>
							<li><a href="ui_simple_line_icons.html">Simple Line Icons</a></li>
							<li><a href="ui_ionicons.html">Ionicons</a></li>
							<li><a href="ui_tree.html">Tree View</a></li>
							<li><a href="ui_language_bar_icon.html">Language Bar & Icon</a></li>
							<li><a href="ui_social_buttons.html">Social Buttons</a></li>
							<li><a href="ui_tour.html">Intro JS</a></li>
						</ul>
					</li>
					<li>
						<a href="bootstrap_4.html">
							<div class="icon-img">
						    	<img src="../assets/img/logo/logo-bs4.png" alt="" />
						    </div>
						    <span>Bootstrap 4 <span class="label label-theme m-l-5">NEW</span></span> 
						</a>
					</li>
					<li class="has-sub">
						<a href="javascript:;">
					        <b class="caret"></b>
						    <i class="fa fa-list-ol"></i>
						    <span>Form Stuff <span class="label label-theme m-l-5">NEW</span></span> 
						</a>
						<ul class="sub-menu">
							<li><a href="form_elements.html">Form Elements <i class="fa fa-paper-plane text-theme m-l-5"></i></a></li>
							<li><a href="form_plugins.html">Form Plugins <i class="fa fa-paper-plane text-theme m-l-5"></i></a></li>
							<li><a href="form_slider_switcher.html">Form Slider + Switcher</a></li>
							<li><a href="form_validation.html">Form Validation</a></li>
							<li><a href="form_wizards.html">Wizards</a></li>
							<li><a href="form_wizards_validation.html">Wizards + Validation</a></li>
							<li><a href="form_wysiwyg.html">WYSIWYG</a></li>
							<li><a href="form_editable.html">X-Editable</a></li>
							<li><a href="form_multiple_upload.html">Multiple File Upload</a></li>
							<li><a href="form_summernote.html">Summernote</a></li>
							<li><a href="form_dropzone.html">Dropzone</a></li>
						</ul>
					</li>
					<li class="has-sub">
						<a href="javascript:;">
					        <b class="caret"></b>
						    <i class="fa fa-table"></i>
						    <span>Tables</span>
						</a>
						<ul class="sub-menu">
							<li><a href="table_basic.html">Basic Tables</a></li>
							<li class="has-sub">
							    <a href="javascript:;"><b class="caret pull-right"></b> Managed Tables</a>
							    <ul class="sub-menu">
							        <li><a href="table_manage.html">Default</a></li>
							        <li><a href="table_manage_autofill.html">Autofill</a></li>
							        <li><a href="table_manage_buttons.html">Buttons</a></li>
							        <li><a href="table_manage_colreorder.html">ColReorder</a></li>
							        <li><a href="table_manage_fixed_columns.html">Fixed Column</a></li>
							        <li><a href="table_manage_fixed_header.html">Fixed Header</a></li>
							        <li><a href="table_manage_keytable.html">KeyTable</a></li>
							        <li><a href="table_manage_responsive.html">Responsive</a></li>
							        <li><a href="table_manage_rowreorder.html">RowReorder</a></li>
							        <li><a href="table_manage_scroller.html">Scroller</a></li>
							        <li><a href="table_manage_select.html">Select</a></li>
							        <li><a href="table_manage_combine.html">Extension Combination</a></li>
							    </ul>
							</li>
						</ul>
					</li>
					<li class="has-sub">
						<a href="javascript:;">
					        <b class="caret"></b>
							<i class="fa fa-star"></i> 
							<span>Front End</span>
						</a>
						<ul class="sub-menu">
						    <li><a href="../../../frontend/template/template_one_page_parallax/index.html" target="_blank">One Page Parallax</a></li>
						    <li><a href="../../../frontend/template/template_blog/index.html" target="_blank">Blog</a></li>
						    <li><a href="../../../frontend/template/template_forum/index.html" target="_blank">Forum</a></li>
						    <li><a href="../../../frontend/template/template_e_commerce/index.html" target="_blank">E-Commerce</a></li>
						</ul>
					</li>
					<li class="has-sub">
					    <a href="javascript:;">
					        <b class="caret"></b>
					        <i class="fa fa-envelope"></i>
					        <span>Email Template</span>
					    </a>
						<ul class="sub-menu">
							<li><a href="email_system.html">System Template</a></li>
							<li><a href="email_newsletter.html">Newsletter Template</a></li>
						</ul>
					</li>
					<li class="has-sub">
					    <a href="javascript:;">
					        <b class="caret"></b>
					        <i class="fa fa-chart-pie"></i>
						    <span>Chart</span>
						</a>
						<ul class="sub-menu">
						    <li><a href="chart-flot.html">Flot Chart</a></li>
						    <li><a href="chart-morris.html">Morris Chart</a></li>
							<li><a href="chart-js.html">Chart JS</a></li>
						    <li><a href="chart-d3.html">d3 Chart</a></li>
						</ul>
					</li>
					<li><a href="calendar.html"><i class="fa fa-calendar"></i> <span>Calendar</span></a></li>
					<li class="has-sub">
					    <a href="javascript:;">
					        <b class="caret"></b>
					        <i class="fa fa-map"></i>
					        <span>Map</span>
					    </a>
						<ul class="sub-menu">
							<li><a href="map_vector.html">Vector Map</a></li>
							<li><a href="map_google.html">Google Map</a></li>
						</ul>
					</li>
					<li class="has-sub">
					    <a href="javascript:;">
					        <b class="caret"></b>
						    <i class="fa fa-image"></i>
						    <span>Gallery</span>
						</a>
					    <ul class="sub-menu">
					        <li><a href="gallery.html">Gallery v1</a></li>
					        <li><a href="gallery_v2.html">Gallery v2</a></li>
					    </ul>
					</li>
					<li class="has-sub active">
						<a href="javascript:;">
					        <b class="caret"></b>
						    <i class="fa fa-cogs"></i>
						    <span>Page Options</span>
						</a>
						<ul class="sub-menu">
							<li class="active"><a href="page_blank.html">Blank Page</a></li>
							<li><a href="page_with_footer.html">Page with Footer</a></li>
							<li><a href="page_without_sidebar.html">Page without Sidebar</a></li>
							<li><a href="page_with_right_sidebar.html">Page with Right Sidebar</a></li>
							<li><a href="page_with_minified_sidebar.html">Page with Minified Sidebar</a></li>
							<li><a href="page_with_two_sidebar.html">Page with Two Sidebar</a></li>
							<li><a href="page_with_line_icons.html">Page with Line Icons</a></li>
							<li><a href="page_with_ionicons.html">Page with Ionicons</a></li>
							<li><a href="page_full_height.html">Full Height Content</a></li>
							<li><a href="page_with_wide_sidebar.html">Page with Wide Sidebar</a></li>
							<li><a href="page_with_light_sidebar.html">Page with Light Sidebar</a></li>
							<li><a href="page_with_mega_menu.html">Page with Mega Menu</a></li>
                            <li><a href="page_with_top_menu.html">Page with Top Menu</a></li>
                            <li><a href="page_with_boxed_layout.html">Page with Boxed Layout</a></li>
                            <li><a href="page_with_mixed_menu.html">Page with Mixed Menu</a></li>
                            <li><a href="page_boxed_layout_with_mixed_menu.html">Boxed Layout with Mixed Menu</a></li>
                            <li><a href="page_with_transparent_sidebar.html">Page with Transparent Sidebar</a></li>
						</ul>
					</li>
					<li class="has-sub">
						<a href="javascript:;">
					        <b class="caret"></b>
						    <i class="fa fa-gift"></i>
						    <span>Extra</span>
						</a>
						<ul class="sub-menu">
						    <li><a href="extra_timeline.html">Timeline</a></li>
						    <li><a href="extra_coming_soon.html">Coming Soon Page</a></li>
							<li><a href="extra_search_results.html">Search Results</a></li>
							<li><a href="extra_invoice.html">Invoice</a></li>
							<li><a href="extra_404_error.html">404 Error Page</a></li>
							<li><a href="extra_profile.html">Profile Page</a></li>
						</ul>
					</li>
					<li class="has-sub">
					    <a href="javascript:;">
					        <b class="caret"></b>
					        <i class="fa fa-key"></i>
					        <span>Login & Register</span>
					    </a>
					    <ul class="sub-menu">
							<li><a href="login.html">Login</a></li>
					        <li><a href="login_v2.html">Login v2</a></li>
					        <li><a href="login_v3.html">Login v3</a></li>
					        <li><a href="register_v3.html">Register v3</a></li>
					    </ul>
					</li>
					<li class="has-sub">
					    <a href="javascript:;">
					        <b class="caret"></b>
					        <i class="fa fa-cubes"></i>
					        <span>Version <span class="label label-theme m-l-5">NEW</span></span>
					    </a>
					    <ul class="sub-menu">
							<li><a href="javascript:;">HTML</a></li>
					        <li><a href="../template_ajax/index.html">AJAX</a></li>
					        <li><a href="../template_angularjs/index.html">ANGULAR JS</a></li>
					        <li><a href="../template_angularjs5/index.html">ANGULAR JS 5 <i class="fa fa-paper-plane text-theme m-l-5"></i></a></li>
					        <li><a href="../template_laravel/index.html">LARAVEL <i class="fa fa-paper-plane text-theme m-l-5"></i></a></li>
					        <li><a href="../template_material/index.html">MATERIAL DESIGN</a></li>
					        <li><a href="../template_apple/index.html">APPLE DESIGN</a></li>
					        <li><a href="../template_transparent/index.html">TRANSPARENT DESIGN <i class="fa fa-paper-plane text-theme m-l-5"></i></a></li>
					    </ul>
					</li>
					<li class="has-sub">
					    <a href="javascript:;">
					        <b class="caret"></b>
					        <i class="fa fa-medkit"></i>
					        <span>Helper</span>
					    </a>
					    <ul class="sub-menu">
							<li><a href="helper_css.html">Predefined CSS Classes</a></li>
					    </ul>
					</li>
					<li class="has-sub">
						<a href="javascript:;">
					        <b class="caret"></b>
						    <i class="fa fa-align-left"></i> 
						    <span>Menu Level</span>
						</a>
						<ul class="sub-menu">
							<li class="has-sub">
								<a href="javascript:;">
					        		<b class="caret"></b>
						            Menu 1.1
						        </a>
								<ul class="sub-menu">
									<li class="has-sub">
										<a href="javascript:;">
										    <b class="caret"></b>
										    Menu 2.1
										</a>
										<ul class="sub-menu">
											<li><a href="javascript:;">Menu 3.1</a></li>
											<li><a href="javascript:;">Menu 3.2</a></li>
										</ul>
									</li>
									<li><a href="javascript:;">Menu 2.2</a></li>
									<li><a href="javascript:;">Menu 2.3</a></li>
								</ul>
							</li>
							<li><a href="javascript:;">Menu 1.2</a></li>
							<li><a href="javascript:;">Menu 1.3</a></li>
						</ul>
					</li>
			        <!-- begin sidebar minify button -->
					<li><a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i class="fa fa-angle-double-left"></i></a></li>
			        <!-- end sidebar minify button -->
				</ul>
				<!-- end sidebar nav -->
			</div>
			<!-- end sidebar scrollbar -->
		</div>
		<div class="sidebar-bg"></div>
		<!-- end #sidebar -->
		
		<!-- begin #content -->
		<div id="content" class="content">
			<!-- begin breadcrumb -->
			{{--<ol class="breadcrumb pull-right">
				<li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
				<li class="breadcrumb-item"><a href="javascript:;">Page Options</a></li>
				<li class="breadcrumb-item active">Blank Page</li>
			</ol>--}}
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			
			<!-- end page-header -->
			
			<!-- begin panel -->
			<div class="panel panel-inverse">
				<div class="panel-heading">
					<div class="panel-heading-btn">
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
					</div>
					<h4 class="panel-title">Panel Title here</h4>
				</div>
				<div class="panel-body">
                    <form>
                        <div class="row form-group m-b-10">
                            <label class="col-md-3 col-form-label">Valid Input</label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <div class="input-group-prepend"><span class="input-group-text">@</span></div>
                                    <input type="text" class="form-control is-invalid" />
                                    <div class="invalid-tooltip">Please choose a unique and valid username.</div>
                                </div>
                            </div>
                        </div><br><br>
                        <div class="row form-group m-b-10">
                            <label class="col-md-3 col-form-label">Invalid Input</label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <div class="input-group-prepend"><span class="input-group-text">@</span></div>
                                    <input type="text" class="form-control is-valid" />
                                    <div class="valid-tooltip">Looks good!</div>
                                </div>
                            </div>
                            <br><br><br><br>
                        </div><br><br>
                        <div class="row form-group m-b-10">
                        <!-- The buttons to control the stream -->
                        <label class="col-md-3 col-form-label">Upload photo</label>
                           
                        
                        </div>
                        <button id="btn-capture" type="button" class="button form-control btn btn-primary">Submit</button>
                        
                    </form>
				</div>
			</div>
            
			<!-- end panel -->
		</div>
		<!-- end #content -->
		
        
		<!-- begin scroll to top btn -->
		<a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
		<!-- end scroll to top btn -->
	</div>
	<!-- end page container -->
	
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="{{asset('assets/plugins/jquery/jquery-3.2.1.min.js')}}"></script>
	<script src="{{asset('assets/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
	<script src="../assets/plugins/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
	<!--[if lt IE 9]>
		<script src="../assets/crossbrowserjs/html5shiv.js"></script>
		<script src="../assets/crossbrowserjs/respond.min.js"></script>
		<script src="../assets/crossbrowserjs/excanvas.min.js"></script>
	<![endif]-->
	<script src="../assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
	<script src="../assets/plugins/js-cookie/js.cookie.js"></script>
	<script src="../assets/js/theme/default.min.js"></script>
	<script src="../assets/js/apps.min.js"></script>
    
	<!-- ================== END BASE JS ================== -->
	
	<script>
		$(document).ready(function() {
			App.init();
            //getWebcam();    
		});

        // async function getWebcam() {
        //     try {
        //         const video_src = await navigator.mediaDevices.getUserMedia({video:true});    
        //         var video = document.getElementById('video');
        //         video.srcObject = video_src; 
        //         video.play();

        //         if(this._facingMode == 'user'){
        //             this._webcamElement.style.transform = "scale(-1,1)";    
        //         }
        //     } catch (error) {
        //         console.log(error)
        //     }
           
        // }
        // var capture = document.getElementById('btn-capture');
        // var canvas = document.getElementById('canvas');
        // var context = canvas.getContext('2d');


        // capture.addEventListener('click',captureImage);
        // function captureImage() {
        //     context.drawImage(video,0,0,250,200);
        //     // Convert canvas image to Base64
        //     var img = canvas.toDataURL();
        //     //var file = dataURItoBlob(img);
            
        //     canvas.toBlob(blob => {
        //         const file = new File([blob], "test.png");
        //         console.log(file);
        //     });

        // }

        // function dataURItoBlob(dataURI) {
        // // convert base64/URLEncoded data component to raw binary data held in a string
        //     var byteString;
        //     if (dataURI.split(',')[0].indexOf('base64') >= 0)
        //         byteString = atob(dataURI.split(',')[1]);
        //     else
        //         byteString = unescape(dataURI.split(',')[1]);
        //     // separate out the mime component
        //     var mimeString = dataURI.split(',')[0].split(':')[1].split(';')[0];
        //     // write the bytes of the string to a typed array
        //     var ia = new Uint8Array(byteString.length);
        //     for (var i = 0; i < byteString.length; i++) {
        //         ia[i] = byteString.charCodeAt(i);
        //     }
        //     return new Blob([ia], {type:mimeString});
        // }
    </script>
</body>
</html>
{{--

 <!-- Video Element & Canvas -->
 <div class="play-area m-b-10">
                                <div class="play-area-sub"> 
                                    
                                    <video id="video" width="250" height="240"></video>
                                </div>
                                <div class="play-area-sub">
                                <label class="col-md-3 col-form-label">Capture Image</label>
                                    <canvas id="canvas" width="250" height="240"></canvas>
                                    <!-- <div id="snapshot"></div> -->
                                </div>
                            </div>
--}}