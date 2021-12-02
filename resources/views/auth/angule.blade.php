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
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">
                    <div class="navbar nav_title" style="border: 0;">
                        <a href="index.html" class="site_title"><i class="fa fa-bar-chart"></i> <span style="margin-left: 20px"> Register</span></a>
                    </div>

                    <div class="clearfix"></div>

                    <!-- menu profile quick info -->
                    {{--<div class="profile clearfix">
                        <div class="profile_pic">
                            <img src="{{asset ('production/images/img.jpg') }}" alt="..." class="img-circle profile_img">
                        </div>
                        <div class="profile_info">
                            <span>Welcome,</span>
                            <h2>Rodel Duterte</h2>
                        </div>
                    </div>--}}
                    <!-- /menu profile quick info -->

                    <br />



                    <!-- /menu footer buttons -->
                    <div class="sidebar-footer hidden-small">
                        <a data-toggle="tooltip" data-placement="top" title="Settings">
                            <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                            <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="Lock">
                            <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                            <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                        </a>
                    </div>
                    <!-- /menu footer buttons -->
                </div>
            </div>

            <!-- top navigation -->
            <div class="top_nav">
                <div class="nav_menu">
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>
                    {{--<nav class="nav navbar-nav">
                        <ul class=" navbar-right">
                            <li class="nav-item dropdown open" style="padding-left: 15px;">
                                <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                                    <img src="{{asset ('production/images/img.jpg') }}" alt="">Rodel Duterte
                                </a>
                                <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="javascript:;"> Profile</a>
                                    <a class="dropdown-item" href="javascript:;">
                                        <span class="badge bg-red pull-right">50%</span>
                                        <span>Settings</span>
                                    </a>
                                    <a class="dropdown-item" href="javascript:;">Help</a>
                                    <a class="dropdown-item" href="login.html"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                                </div>
                            </li>

                            <li role="presentation" class="nav-item dropdown open">
                                <a href="javascript:;" class="dropdown-toggle info-number" id="navbarDropdown1" data-toggle="dropdown" aria-expanded="false">
                                    <i class="fa fa-envelope-o"></i>
                                    <span class="badge bg-green">6</span>
                                </a>
                                <ul class="dropdown-menu list-unstyled msg_list" role="menu" aria-labelledby="navbarDropdown1">
                                    <li class="nav-item">
                                        <a class="dropdown-item">
                                            <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                                            <span>
                                                <span>John Smith</span>
                                                <span class="time">3 mins ago</span>
                                            </span>
                                            <span class="message">
                                                Film festivals used to be do-or-die moments for movie makers. They were where...
                                            </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="dropdown-item">
                                            <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                                            <span>
                                                <span>John Smith</span>
                                                <span class="time">3 mins ago</span>
                                            </span>
                                            <span class="message">
                                                Film festivals used to be do-or-die moments for movie makers. They were where...
                                            </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="dropdown-item">
                                            <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                                            <span>
                                                <span>John Smith</span>
                                                <span class="time">3 mins ago</span>
                                            </span>
                                            <span class="message">
                                                Film festivals used to be do-or-die moments for movie makers. They were where...
                                            </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="dropdown-item">
                                            <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                                            <span>
                                                <span>John Smith</span>
                                                <span class="time">3 mins ago</span>
                                            </span>
                                            <span class="message">
                                                Film festivals used to be do-or-die moments for movie makers. They were where...
                                            </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <div class="text-center">
                                            <a class="dropdown-item">
                                                <strong>See All Alerts</strong>
                                                <i class="fa fa-angle-right"></i>
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </nav>--}}
                </div>
            </div>
            <!-- /top navigation -->

            <!-- page content -->
            <div class="right_col" role="main">
                <div class="">
                    <div class="page-title">
                        <div class="title_left">
                            <h3><i class="fa fa-level-up"></i></h3>
                        </div>

                        {{--<div class="title_right">
                            <div class="col-md-5 col-sm-5  form-group pull-right top_search">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search for...">
                                    <span class="input-group-btn">
                                        <button class="btn btn-default" type="button">Go!</button>
                                    </span>
                                </div>
                            </div>
                        </div>--}}
                    </div>
                    <div class="clearfix"></div>
                    <div class="row">

                      <div class="col-md-12 col-sm-12 ">
                        <div class="x_panel">
                          <div class="x_title">
                            <h2>Registration <small>...</small></h2>
                            <ul class="nav navbar-right panel_toolbox">
                              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                              </li>


                          </ul>
                          <div class="clearfix"></div>
                      </div>
                      <div class="x_content">


                        <!-- Smart Wizard -->
                        <p>...</p>
                        <div id="wizard" class="form_wizard wizard_horizontal">
                          <ul class="wizard_steps">
                            <li>
                              <a href="#step-1">
                                <span class="step_no">1</span>
                                <span class="step_descr">
                                  Step 1<br />
                                  <small>Personal Information</small>
                              </span>
                              <span id=loading class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                          </a>
                      </li>
                      <li>
                          <a href="#step-2">
                            <span class="step_no">2</span>
                            <span class="step_descr">
                              Step 2<br />
                              <small>Business Information</small>
                          </span>
                      </a>
                  </li>
                  <li>
                      <a href="#step-3">
                        <span class="step_no">3</span>
                        <span class="step_descr">
                          Step 3<br />
                          <small>Step 3 description</small>
                      </span>
                  </a>
              </li>

          </ul>
          <div id="step-1">
            <form class="form-horizontal form-label-left" >

              <div class="form-group row" id="fname-p">

                <label class="col-form-label col-md-3 col-sm-3 label-align" >Full Name <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6" id="fname-s">
                    <!-- data-parsley-trigger="change -->
                    <input type="text" class="form-control" id="inName" />

                </div>
                <div class="alert" id="name_r"></div>
            </div>
            <div class="form-group row" id="contact-p">
                <label class="col-form-label col-md-3 col-sm-3 label-align" >Contact Number <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6" id="contact-s">
                    <!-- data-parsley-trigger="change -->
                    <input type="text" id="contact" class="form-control" name="contact" onkeyup="checkInput(this.id)" required style="text-transform: capitalize;" />

                </div>

            </div>

            <div class="form-group row">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Gender</label>
                <div class="col-md-6 col-sm-6 ">
                  <div id="gender" class="btn-group" data-toggle="buttons">
                    <label class="btn btn-secondary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-secondary">
                      <input type="radio" name="gender" value="male" class="join-btn"> &nbsp; Male &nbsp;
                  </label>
                  <label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-secondary">
                      <input type="radio" name="gender" value="female" class="join-btn"> Female
                  </label>
              </div>
          </div>
      </div>
      <div class="form-group row">
        <label class="col-form-label col-md-3 col-sm-3 label-align">Date Of Birth <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 ">
          <input id="birthday" class="date-picker form-control" required="required" type="text">
      </div>
  </div>

</form>

</div>
<div id="step-2">
    <h2 class="StepTitle">Step 2 Content</h2>

</div>
<div id="step-3">
    <h2 class="StepTitle">Step 3 Content</h2>

</div>


</div>
<!-- End SmartWizard Content -->



<!-- End SmartWizard Content -->
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


</script>
</body></html>
