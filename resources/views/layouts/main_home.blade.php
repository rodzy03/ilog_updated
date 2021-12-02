
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<title>FAQS</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	
	@include('layouts.includes.base-css')
    
	<link href="{{ asset('assets/plugins/bootstrap3/css/bootstrap.min.css')}}" rel="stylesheet" />
	<link href="{{ asset('assets/css/e-commerce/style.min.css')}}" rel="stylesheet" />
	<link href="{{ asset('assets/css/e-commerce/style-responsive.min.css')}}" rel="stylesheet" />
	<link href="{{ asset('assets/css/e-commerce/theme/default.css')}}" id="theme" rel="stylesheet" />
    
</head>
<body class="bg-silver">
    <!-- BEGIN #page-container -->
    <div id="page-container" class="fade">
        <!-- BEGIN #top-nav -->
        {{--<div id="top-nav" class="top-nav">
            <!-- BEGIN container -->
            <div class="container">
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li class="dropdown dropdown-hover">
                            <a href="#" data-toggle="dropdown"><img src="../assets/img/flag/flag-english.png" class="flag-img" alt="" /> English <i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="#"><img src="../assets/img/flag/flag-english.png" class="flag-img" alt="" /> English</a></li>
                                <li><a href="#"><img src="../assets/img/flag/flag-german.png" class="flag-img" alt="" /> German</a></li>
                                <li><a href="#"><img src="../assets/img/flag/flag-spanish.png" class="flag-img" alt="" /> Spanish</a></li>
                                <li><a href="#"><img src="../assets/img/flag/flag-french.png" class="flag-img" alt="" /> French</a></li>
                                <li><a href="#"><img src="../assets/img/flag/flag-chinese.png" class="flag-img" alt="" /> Chinese</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Customer Care</a></li>
                        <li><a href="#">Order Tracker</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#">Career</a></li>
                        <li><a href="#">Our Forum</a></li>
                        <li><a href="#">Newsletter</a></li>
                        <li><a href="#"><i class="fa fa-facebook f-s-14"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter f-s-14"></i></a></li>
                        <li><a href="#"><i class="fa fa-instagram f-s-14"></i></a></li>
                        <li><a href="#"><i class="fa fa-dribbble f-s-14"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus f-s-14"></i></a></li>
                    </ul>
                </div>
            </div>
            <!-- END container -->
        </div>--}}
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
                                    <span class="hidden-md hidden-sm hidden-xs">Login / Register</span>
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
                <h1 class="page-header">Frequently Asked <b>Questions</b></h1>
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
                                <a data-toggle="collapse" href="#faq-1"><i class="fa fa-question-circle fa-fw m-r-5"></i> 1. Where can we view the available scholarship programs? </a>
                            </h4>
                        </div>
                        <div id="faq-1" class="panel-collapse collapse in">
                            <div class="panel-body">
                                <p>
                                The available scholarship programs are posted in the 
                                Facebook Page Scholarship and Financial Assistance Services – 
                                PUP Manila and Facebook Page PUPQC Scholarship and Financial Services.
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- END panel -->
                    <!-- BEGIN panel -->
                    <div class="panel ">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" href="#faq-2">
                                <i class="fa fa-question-circle fa-fw text-muted m-r-5"></i> 2. Can I apply for more than one scholarship?</a>
                            </h4>
                        </div>
                        <div id="faq-2" class="panel-collapse collapse in">
                            <div class="panel-body">
                                <p>
                                You can only avail one scholarship program.
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- END panel -->
                    <!-- BEGIN panel -->
                    <div class="panel ">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" href="#faq-3"><i class="fa fa-question-circle fa-fw text-primary m-r-5"></i> 3. How do we contact the Scholarship Office?</a>
                            </h4>
                        </div>
                        <div id="faq-3" class="panel-collapse collapse in">
                            <div class="panel-body">
                                <p>
                                The Scholarship and Financial Assistance Services is 
                                located at Ground Floor, Rothlener Building. 
                                You may send inquiry through <a href="https://gacuadra@pup.edu.ph">gacuadra@pup.edu.ph</a>

                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- END panel -->
                    <!-- BEGIN panel -->
                    <div class="panel ">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" href="#faq-4"><i class="fa fa-question-circle fa-fw text-info m-r-5"></i> 4. What are the basic requirements to apply for scholarship program?</a>
                            </h4>
                        </div>
                        <div id="faq-4" class="panel-collapse collapse in">
                            <div class="panel-body">
                                <p>
                                The applicants must be presently enrolled and must have copy of registration card, grades, good moral certificate and proof of annual income of the family.

                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- END panel -->
                    <!-- BEGIN panel -->
                    <div class="panel">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" href="#faq-5"><i class="fa fa-question-circle fa-fw text-success m-r-5"></i> 5. What are the services offered by SFAS?</a>
                            </h4>
                        </div>
                        <div id="faq-5" class="panel-collapse collapse in">
                            <div class="panel-body">
                                <p>
                                SFAS processes the resident scholarship, 
                                special grants, entrance scholarship and student assistantship program.
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- END panel -->
                    <!-- BEGIN panel -->
                    <div class="panel ">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" href="#faq-6">
                                <i class="fa fa-question-circle fa-fw text-warning m-r-5"></i> 6. Can I apply in any scholarship program?</a>
                            </h4>
                        </div>
                        <div id="faq-6" class="panel-collapse collapse in">
                            <div class="panel-body">
                                <p>
                                Special grants have qualifications that are set by grantors in the Memorandum of Agreement. Applicants must check if they qualify before submitting their requirements.

                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- END panel -->
                    <!-- BEGIN panel -->
                    <div class="panel ">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" href="#faq-7">
                                <i class="fa fa-question-circle fa-fw text-danger m-r-5"></i> 7.  Do you require original copy of documents/requirements?</a>
                            </h4>
                        </div>
                        <div id="faq-7" class="panel-collapse collapse in">
                            <div class="panel-body">
                                <p>
                                SFAS will verify the authenticity of the document from the original copy but will only collect the photocopy/ scanned copy.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="panel ">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" href="#faq-8">
                                <i class="fa fa-question-circle fa-fw text-warning m-r-5"></i> 8.  What is the required grade to be initially qualified for scholarship?</a>
                            </h4>
                        </div>
                        <div id="faq-8" class="panel-collapse collapse in">
                            <div class="panel-body">
                                <p>
                                    You must have a general weighted average and grade per subject of 2.25 or better and without a grade of INC, D or Dropped, W or Withdrawn and F or Failed.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="panel ">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" href="#faq-9">
                                <i class="fa fa-question-circle fa-fw text-inverse m-r-5"></i> 9.  What is the income celling of the parents to be able to qualify in the scholarship?</a>
                            </h4>
                        </div>
                        <div id="faq-9" class="panel-collapse collapse in">
                            <div class="panel-body">
                                <p>
                                Some scholarship grantors are strict in evaluating the estimated annual income the best estimate is 300,000.00 per annum.
                                </p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="panel ">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" href="#faq-10">
                                <i class="fa fa-question-circle fa-fw text-muted m-r-5"></i> 10.  Where will I see all the scholarship grantors of PUP?</a>
                            </h4>
                        </div>
                        <div id="faq-10" class="panel-collapse collapse in">
                            <div class="panel-body">
                                <p>
                                Some scholarship grantors are strict in evaluating the estimated annual income the best estimate is 300,000.00 per annum.
                                </p>
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
                    Copyright &copy; 2021 PUPQC Scholarship. All rights reserved.
                </div>
            </div>
            <!-- END container -->
        </div>
        <!-- END #footer-copyright -->
    </div>
    <!-- END #page-container -->
    
    @include('layouts.includes.base-js')
    <script src="{{ asset('assets/plugins/bootstrap3/js/bootstrap.min.js')}}"></script>
	
	<script src="{{ asset('assets/js/e-commerce/apps.min.js')}}"></script>
    
    
	<script>
	    $(document).ready(function() {
	        App.init();
	    });
	</script>
</body>
</html>
