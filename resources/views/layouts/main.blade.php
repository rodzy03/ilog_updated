<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->

<head>
  <meta charset="utf-8" />
  <title>JAW | @yield('title')</title>
  <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
  <meta content="" name="description" />
  <meta content="" name="author" />




  @include('layouts.includes.base-css')

  @yield('extra-css')
  <style>
    #logo {
      display: inline-block;
      margin: 10px;
      height: 35px;
      width: auto;
      /* correct proportions to specified height */
      border-radius: 50%;
      /* makes it a circle */
    }

    .theme-panel {
      right: -600px;
      width: 600px;



    }
  </style>
  <!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
  <link href="{{ asset('assets/plugins/DataTables/media/css/dataTables.bootstrap.min.css')}}" rel="stylesheet" />
  <link href="{{ asset('assets/plugins/DataTables/extensions/Responsive/css/responsive.bootstrap.min.css')}}" rel="stylesheet" />
  <!-- ================== END PAGE LEVEL STYLE ================== -->
  <script src='https://api.mapbox.com/mapbox-gl-js/v2.3.1/mapbox-gl.js'></script>
  <link href='https://api.mapbox.com/mapbox-gl-js/v2.3.1/mapbox-gl.css' rel='stylesheet' />

</head>

<body>

  <!-- begin #page-loader -->
  <div id="page-loader" class="fade show"><span class="spinner"></span></div>
  <!-- end #page-loader -->

  <!-- begin #page-container -->
  <div id="page-container" class="fade page-sidebar-fixed page-header-fixed">
    <!-- begin #header -->
    <div id="header" class="header navbar-default">
      <!-- begin navbar-header -->
      <div class="navbar-header">
        <a href="#"><img id="logo" src="{{asset('uploads/ilog_dark.png')}}"></a>

        <b style="font-size: 16px; margin-right: 1px;">JaGwar Administrator Web</b>


      </div>
      <!-- end navbar-header -->

      <!-- begin header-nav -->
      <ul class="navbar-nav navbar-right">
        <li>
          <form class="navbar-form">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Enter keyword" />
              <button type="submit" class="btn btn-search"><i class="fa fa-search"></i></button>
            </div>
          </form>
        </li>
        <li class="dropdown">
          <a href="javascript:;" data-toggle="dropdown" class="dropdown-toggle f-s-14">
            <i class="fa fa-bell"></i>
            <span class="label">12</span>

          </a>
          <ul class="dropdown-menu media-list dropdown-menu-right">
            <li class="dropdown-header">NOTIFICATIONS (12)</li>

          </ul>
        </li>

        <li class="dropdown navbar-user">
          <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
            <img src="{{asset('uploads/security.png')}}" alt="" />
            <span class="d-none d-md-inline" style="text-transform: capitalize;">{{ Auth::user()->name }}</span> <b class="caret"></b>
          </a>
          <div class="dropdown-menu dropdown-menu-right">
            <a class="dropdown-item" href="javascript;:" data-toggle="modal" data-target="#modal-edit-p">Edit Profile</a>
            
            <div class="dropdown-divider"></div>
            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();" class="dropdown-item">Log Out</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
            </form>
          </div>
        </li>
      </ul>
      <!-- end header navigation right -->
    </div>
    <!-- end #header -->

    @include('navigations.employee-sidenav')

    @yield('content')
    <div class="modal fade" id="modal-edit-p">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                &nbsp;
                </div>
                <div class="modal-body">
                    <fieldset>
                        <div class="note  note-with-left-icon m-b-15">
                            <div class="note-icon"><i class="fa fa-user"></i></div>
                            <div class="note-content text-left">
                                <h4><b>EDIT PROFILE</b></h4>
                                <p>

                                </p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="stats-content">
                                    <label>Full Name <span class="required">*</span></label>
                                    <input style="text-transform: uppercase;" class="form-control taskname_p" type="text" value="{{ Auth::user()->name }}"/>
                                    
                                </div>
                            </div>
                        </div> <br>

                        <div class="row">
                            <div class="col-lg-6 col-md-12">
                                <div class="stats-content">
                                    <label>Email <span class="required">*</span></label>
                                    <input  class="form-control email_p" type="text"  value="{{ Auth::user()->email }}"/>
                                    
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-12">
                                <div class="stats-content">
                                    <label>New Password <span class="required">*</span></label>
                                    <input  class="form-control password_p" type="password"  />
                                    
                                </div>
                            </div>


                        </div>

                    </fieldset>
                </div>

                <div class="modal-footer">
                    <a href="javascript:;" class="btn btn-white" data-dismiss="modal">Close</a>
                    <button type="button" class="btn btn-success" id="btnUpdateP">
                        Submit</button>
                </div>
            </div>
        </div>
    </div>

    <!-- begin theme-panel -->

    
  </div>

  <!-- end theme-panel -->
  <!-- begin scroll to top btn -->
  <a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
  <!-- end scroll to top btn -->

  <div class="modal fade" id="modal-loading" data-backdrop="static" style="text-align: center; margin-top:250px;">
    <div class="modal-dialog" style="width: 300px; display: inline-block; vertical-align: middle;">
      <div class="modal-content">

        <div class="modal-body">

          <div class="fa-3x">

            <label style="font-size: 30px; color:gray"><i class="fas fa-spinner fa-spin"></i>&nbsp;&nbsp;Please wait ..</label>

          </div>


        </div>


      </div>
    </div>
  </div>
  </div>
  <!-- end page container -->


  @include('layouts.includes.base-js')

  @yield('extra-js')
  <script src='https://api.mapbox.com/mapbox-gl-js/v1.3.1/mapbox-gl.js'></script>
  <!-- ================== BEGIN PAGE LEVEL JS ================== -->
  <script src="{{ asset('assets/plugins/DataTables/media/js/jquery.dataTables.js')}}"></script>
  <script src="{{ asset('assets/plugins/DataTables/media/js/dataTables.bootstrap.min.js')}}"></script>
  <script src="{{ asset('assets/plugins/DataTables/extensions/Responsive/js/dataTables.responsive.min.js')}}"></script>
  <script src="{{ asset('assets/js/demo/table-manage-default.demo.min.js')}}"></script>
  <!-- ================== END PAGE LEVEL JS ================== -->
  <script>
    $(document).ready(function() {
      $('#table_1').DataTable();
      $('#table_2').DataTable();
      $('#table_3').DataTable();
      $('#table_4').DataTable();
    });

    $('#btnUpdateP').click(function() {
        
        url = "{{route('employee_crud')}}";
        status = "profile";
        data = {
            _token: "{{csrf_token()}}",
            status: status,
            taskname:$('.taskname_p').val(),
            email:$('.email_p').val(),
            password:$('.password_p').val()
            
        }
        var button = $(this);
        button.closest(".modal").modal('hide');
        update(data, url, status);
    });
  </script>

</body>

</html>