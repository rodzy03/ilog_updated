<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>BIR | Register</title>
    <!-- Bootstrap -->
    <link href="{{asset ('vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{asset ('vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="{{asset ('build/css/custom.min.css') }}" rel="stylesheet">
</head>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            {{--<div class="col-md-3 left_col">
                <div class="left_col scroll-view">
                    <div class="navbar nav_title" style="border: 0;">
                        <a href="index.html" class="site_title"><i class="fa fa-bar-chart"></i> <span style="margin-left: 20px"> Register</span></a>
                    </div>
                </div>
            </div>--}}

            <!-- top navigation -->
            {{--<div class="top_nav">
                <div class="nav_menu">
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>

                </div>
            </div>--}}

            <!-- page content -->
            <div class="right_col" role="main">
                <div class="">
                    
                    <input type="text" id="url" value="{{URL::asset('/thankyou')}}" hidden>
                    <div class="clearfix"></div>
                    <div class="row">

                        <div class="col-md-12 col-sm-12 ">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Personal Information&nbsp;&nbsp;<i class="fa fa-user"></i></h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>

                                </div>
                                {{--<div class="alert alert-success alert-dismissible " role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                                    </button>
                                    <strong>Something went wrong!</strong> .
                                </div>--}}
                                <div class="x_content">
                                    <br />
                                    <form id="demo-form2" class="form-horizontal form-label-left">

                                        <div class="item form-group" id="fname-p">
                                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Full Name <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 " id="fname-s">
                                                <input type="text" id="inName" class="form-control" style="text-transform: capitalize;">
                                            </div>
                                            <div class="alert" id="name_r"></div>
                                        </div>
                                        
                                        <div class="item form-group" >
                                            <label class="col-form-label col-md-3 col-sm-3 label-align">Position</label>
                                            <div class="col-md-6 col-sm-6 field item form-group row " id="gender-p">
                                                <div class="btn-group" data-toggle="buttons" id="gender-s">
                                                    <label class="btn btn-secondary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                                        <input type="radio" name="gender" value="supplier" class="join-btn" id="inGender"> &nbsp; Supplier &nbsp;
                                                    </label>
                                                    <label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                                        <input type="radio" name="gender" value="distributor" class="join-btn"> Distributor
                                                    </label>
                                                </div>
                                                <div class="alert" id="gender_r"></div>
                                            </div>
                                        </div>
                                        {{--<div class="item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3 label-align">Date Of Birth <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 ">
                                                <input id="birthday" class="date-picker form-control" placeholder="dd-mm-yyyy" type="text" required="required" type="text" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)">
                                                <script>
                                                    function timeFunctionLong(input) {
                                                        setTimeout(function() {
                                                            input.type = 'text';
                                                        }, 60000);
                                                    }
                                                </script>
                                            </div>
                                        </div>--}}
                                        </br>
                                        <div class="x_title">
                                            <h2>Business Information&nbsp;&nbsp;<i class="fa fa-building"></i></h2>
                                            
                                            <div class="clearfix"></div>
                                        </div><br />
                                        <div class="item form-group" id="business-p">
                                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Business Name <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 " id="business-s">
                                                <input type="text" id="inBusiness" class="form-control" style="text-transform: capitalize;">
                                            </div>
                                            <div class="alert" id="business_r"></div>
                                        </div>

                                        <div class="item form-group" id="tin-p">
                                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Tin No. <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 " id="tin-s">
                                                <input type="text" id="inTin" class="form-control" style="text-transform: capitalize;">
                                            </div>
                                            <div class="alert" id="tin_r"></div>
                                        </div>

                                        <div class="item form-group" id="tin-p">
                                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Upload Requirements. <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 " id="tin-s">
                                                <input class="form-control" type="file" id="multiFiles" name="myfiles[]" multiple="multiple"/>
                                        
                                            </div>
                                            
                                            <div class="alert" id="tin_r"></div>
                                        </div>

                                        <div class="ln_solid"></div>
                                        <div class="item form-group">
                                            <div class="col-md-6 col-sm-6 offset-md-3">
                                                
                                                <button class="btn btn-primary" type="reset">Reset</button>
                                                <button type="button" class="btn btn-success" id="btnRegister">
                                                    <span id=loading class="spinner-border spinner-border-sm" style="display: none;"></span>&nbsp;Register</button>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /page content -->

            <!-- footer content -->
            <footer>
                <div class="pull-right">
                    BIR -  by <a href="#"></a>
                </div>
                <div class="clearfix"></div>
            </footer>
            <!-- /footer content -->
        </div>
    </div>

    <!-- jQuery -->
    <script src="{{asset ('vendors/jquery/dist/jquery.min.js') }}"></script>
    <!-- My Modular -->
    <script src="{{asset ('modular/register.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{asset ('vendors/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <!-- Custom Theme Scripts -->
    <script src="{{asset ('build/js/custom.min.js') }}"></script>
    <!-- jquery.inputmask -->
    <script src="{{asset ('vendors/jquery.inputmask/dist/min/jquery.inputmask.bundle.min.js') }}"></script>

    <script src="{{asset ('vendors/jQuery-Smart-Wizard/js/jquery.smartWizard.js') }}"></script>

    <script type="text/javascript">

    $(document).ready(function (e) {

           
    });

    
    </script>
</body></html>
