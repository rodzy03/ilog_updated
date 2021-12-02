<!-- top navigation -->
        <div class="top_nav">
            <div class="nav_menu">
                <ul class=" navbar-right">
                  <li class="nav-item dropdown open" style="padding-left: 15px;">
                    <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                      <img src="{{asset('production/images/img.jpg')}}" alt="">{{ Auth::user()->name }} {{-- <label style="text-transform: capitalize;">({{ session('office_name') }})</label>--}}
                    </a>
                    <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item"  href="javascript:;"> Profile</a>
                        <a class="dropdown-item"  href="javascript:;">
                          <span class="badge bg-red pull-right">50%</span>
                          <span>Settings</span>
                        </a>
                    <a class="dropdown-item"  href="javascript:;">Help</a>
                      <a class="dropdown-item"  href="{{ route('logout') }}" 
                      onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">
                      <i class="fa fa-sign-out pull-right"></i> Log Out</a>

                      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                          @csrf
                      </form>
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
                          <span class="image"><img src="{{asset('production/images/img.jpg')}}" alt="Profile Image" /></span>
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
                
                <div>
                  <div style="margin-left: 10px; " id="icon-doc" >
                              <span style="font-size: 30px; margin-top: 10px" class="glyphicon glyphicon-book" aria-hidden="true"></span>
                            </div>
                  <p style="margin-left: 50px; margin-top: -32px; font-size: 20px; ">DocExpert</p>
                </div>
              
            </div>
          </div>
        <!-- /top navigation -->