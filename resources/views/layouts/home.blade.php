
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<title>ANNOUNCEMENTS</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	
	@include('layouts.includes.base-css')
    
	<link href="{{ asset('assets/plugins/bootstrap3/css/bootstrap.min.css')}}" rel="stylesheet" />
	<link href="{{ asset('assets/css/e-commerce/style.min.css')}}" rel="stylesheet" />
	<link href="{{ asset('assets/css/e-commerce/style-responsive.min.css')}}" rel="stylesheet" />
	<link href="{{ asset('assets/css/e-commerce/theme/default.css')}}" id="theme" rel="stylesheet" />
    	<!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
	<link href="{{ asset('assets/plugins/DataTables/media/css/dataTables.bootstrap.min.css')}}" rel="stylesheet" />
	<link href="{{ asset('assets/plugins/DataTables/extensions/Responsive/css/responsive.bootstrap.min.css')}}" rel="stylesheet" />
	<!-- ================== END PAGE LEVEL STYLE ================== -->

</head>
<body class="bg-silver">
    <!-- BEGIN #page-container -->
    <div id="page-container" class="fade">
        <!-- BEGIN #top-nav -->
        
        <!-- END #top-nav -->
    
        <!-- BEGIN #header -->
        <div id="header" class="header">
            <!-- BEGIN container -->
            <div class="container">
                <!-- BEGIN header-container -->
                <div class="header-container">
                    <!-- BEGIN navbar-header -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <div class="header-logo">
                            <a href="index.html">
                                
                                <span>PUPQC</span> Scholarship
                                
                            </a>
                        </div>
                    </div>
                    <!-- END navbar-header -->
                    <!-- BEGIN header-nav -->
                    <div class="header-nav">
                        <div class=" collapse navbar-collapse" id="navbar-collapse">
                            <ul class="nav">
                                <li><a href="/home">Home</a></li>
                                <li><a href="/faqs">Faqs</a></li>
                                
                                
                            </ul>
                        </div>
                    </div>
                    <!-- END header-nav -->
                    <!-- BEGIN header-nav -->
                    <div class="header-nav">
                        <ul class="nav pull-right">
                            
                            <li class="divider"></li>
                            <li>
                                <a href="my_account.html">
                                    <img src="{{asset('assets/img/user/profile.png')}}" class="user-img" alt="" /> 
                                    <!-- <span class="hidden-md hidden-sm hidden-xs">Login / Register</span> -->
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- END header-nav -->
                    
                </div>
                <!-- END header-container -->
            </div>
            <!-- END container -->
        </div>
        <!-- END #header -->
        
        <!-- BEGIN #page-header -->
        <div id="page-header" class="section-container page-header-container bg-black">
            <!-- BEGIN page-header-cover -->
            <div class="page-header-cover">
                <img src="{{asset('assets/img/login-bg/background_login.jpg')}}" alt="" />
            </div>
            <!-- END page-header-cover -->
            <!-- BEGIN container -->
            <div class="container">
                <h1 class="page-header">Announcements </h1>
            </div>
            <!-- END container -->
        </div>
        <!-- BEGIN #page-header -->
        
        <!-- BEGIN #faq -->
        <div id="faq" class="section-container">
            <!-- BEGIN container -->
            <div class="container">
                <!-- BEGIN breadcrumb -->
                <ul class="breadcrumb m-b-10 f-s-12">
                    <li><a href="#">Home</a></li>
                    
                    <li class="active">FAQs</li>
                </ul>
                <!-- END breadcrumb -->
                
                <!-- BEGIN panel-group -->
                <div class="panel-group faq" id="faq-list">
                    <!-- BEGIN panel -->
                    <div class="panel ">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" href="#faq-2"><i class="fa fa-question-circle fa-fw text-info m-r-5"></i> SCHOLARSHIP AND FINANCIAL SERVICES  </a>
                            </h4>
                        </div>
                        <!-- LIST OF CHED TDP GRANTEES ACADEMIC YEAR 2020-2021 -->
                        <div id="faq-2" class="panel-collapse collapse in">
                            <div class="panel-body">
                                <!-- <p>
                                The available scholarship programs are posted in the 
                                Facebook Page Scholarship and Financial Assistance Services – 
                                PUP Manila and Facebook Page PUPQC Scholarship and Financial Services.
                                </p> -->
                                <table id="data-table-default" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="text-nowrap">Scholarship</th>
                                            <th class="text-nowrap">Description</th>
                                        </tr>
                                    
                                    </thead>
                                    <tbody>
                                        @foreach($data as $row)
                                        <tr class="odd gradeX">
                                            <td>{{$row->scholarship_name}}</td>
                                            <td>{{$row->description}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- END panel -->
                    
                </div>
                <!-- END panel-group -->

                 <!-- BEGIN panel-group -->
                 <div class="panel-group faq" id="faq-title">
                    <!-- BEGIN panel -->
                    <div class="panel ">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" href="#faq-1"><i class="fa fa-question-circle fa-fw text-info m-r-5"></i> ANNOUNCEMENTS  </a>
                            </h4>
                        </div>
                        <!-- LIST OF CHED TDP GRANTEES ACADEMIC YEAR 2020-2021 -->
                        <div id="faq-1" class="panel-collapse collapse">
                            <div class="panel-body">
                                <!-- <p>
                                The available scholarship programs are posted in the 
                                Facebook Page Scholarship and Financial Assistance Services – 
                                PUP Manila and Facebook Page PUPQC Scholarship and Financial Services.
                                </p> -->
                                <table id="title-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="text-nowrap">Name</th>
                                        </tr>
                                    
                                    </thead>
                                    <tbody>
                                        <tr class="odd gradeX">
                                            <td>Rodel Duterte</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- END panel -->
                    
                </div>
                <!-- END panel-group -->
            </div>
            <!-- END container -->
        </div>
        <!-- END #faq -->
        
       
        <!-- BEGIN #footer-copyright -->
        <div id="footer-copyright" class="footer-copyright">
            <!-- BEGIN container -->
            <div class="container">
                <div class="payment-method">
                    <!-- <img src="../assets/img/payment/payment-method.png" alt="" /> -->
                </div>
                <div class="copyright">
                    Copyright &copy; 2021 PUPQC Scholarship. All rights reserved. <b>bongcuadra13@gmail.com</b>
                </div><br>
                                
            </div>
            <!-- END container -->
        </div>
        <!-- END #footer-copyright -->
    </div>
    <!-- END #page-container -->
    
    @include('layouts.includes.base-js')
    <script src="{{ asset('assets/plugins/bootstrap3/js/bootstrap.min.js')}}"></script>
	
	<script src="{{ asset('assets/js/e-commerce/apps.min.js')}}"></script>
    
	<!-- ================== BEGIN PAGE LEVEL JS ================== -->
	<script src="{{ asset('assets/plugins/DataTables/media/js/jquery.dataTables.js')}}"></script>
	<script src="{{ asset('assets/plugins/DataTables/media/js/dataTables.bootstrap.min.js')}}"></script>
	<script src="{{ asset('assets/plugins/DataTables/extensions/Responsive/js/dataTables.responsive.min.js')}}"></script>
	<script src="{{ asset('assets/js/demo/table-manage-default.demo.min.js')}}"></script>
	<!-- ================== END PAGE LEVEL JS ================== -->
    
	<script>
	    $(document).ready(function() {
	        App.init();
            TableManageDefault.init();
            $('#title-table').DataTable();
	    });
	</script>
</body>
</html>
