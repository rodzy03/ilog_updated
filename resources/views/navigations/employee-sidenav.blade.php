<!-- begin #sidebar -->
<div id="sidebar" class="sidebar">
  <!-- begin sidebar scrollbar -->
  <div data-scrollbar="true" data-height="100%">

    <!-- end sidebar user -->
    <!-- begin sidebar nav -->
    <ul class="nav">
      <!-- <li class="nav-header">Navigation</li> -->

      <br><br><br>
      <li class="has-sub active">
        <a href="{{route('admin_dashboard')}}">

          <i class="fa fa-th-large"></i>
          <span>Dashboard</span>
        </a>

      </li>
      @if(Auth::user()->role == 'admin')
      <li class="has-sub {{ (Route::currentRouteName() == 'get_guards') 
            || (Route::currentRouteName() == 'get_supervisor') 
            || (Route::currentRouteName() == 'get_sessions')
            || (Route::currentRouteName() == 'get_employees')
            
             ? 'active' : '' }}">
        <a href="javascript:;">
          <b class="caret"></b>

          <i class="fa fa-user"></i>
          <span>&nbsp;Manage Personnel</span>
        </a>
        <ul class="sub-menu">
          <li class="has-sub  {{ (Route::currentRouteName() == 'get_guards') ? 'active' : '' }}">

            <a href="{{route('get_guards')}}">

              <i class="fa fa-circle"></i>
              <span>&nbsp;Guard List</span>
            </a>

          </li>

          <li class="has-sub  {{ (Route::currentRouteName() == 'get_supervisor') ? 'active' : '' }}">

            <a href="{{route('get_supervisor')}}">

              <i class="fa fa-circle"></i>
              <span>&nbsp;Supervisor List</span>
            </a>

          </li>

          <li class="has-sub  {{ (Route::currentRouteName() == 'get_employees') ? 'active' : '' }}">
          
          <a href="{{route('get_employees')}}">

              <i class="fa fa-circle"></i>
              <span>&nbsp;Office Employees</span>
            </a>

          </li>

          <li class="has-sub  {{ (Route::currentRouteName() == 'get_sessions') ? 'active' : '' }}">

            <a href="{{route('get_sessions')}}">

              <i class="fa fa-circle"></i>
              <span>&nbsp;Personnel Sessions</span>
            </a>

          </li>
         
          {{--<li class="has-sub {{ (Route::currentRouteName() == 'get_students') ? 'active' : '' }}">

            <a href="{{route('get_students')}}">

              <i class="fa fa-circle"></i>
              <span>&nbsp;Shift Schedule</span>
            </a>

          </li>--}}
          
          

        </ul>
      </li>
      <li class="has-sub {{ (Route::currentRouteName() == 'get_students') 
             || (Route::currentRouteName() == 'get_assigned'
             || (Route::currentRouteName() == 'get_shift_supervisor'))
             ? 'active' : '' }}">
        <a href="javascript:;">
          <b class="caret"></b>

          <i class="fa fa-calendar-check"></i>
          <span>&nbsp;Manage Schedule</span>
        </a>
        <ul class="sub-menu">
          
          
          <li class="has-sub {{ (Route::currentRouteName() == 'get_students')
           ? 'active' : '' }}">

            <a href="{{route('get_students')}}">

              <i class="fa fa-circle"></i>
              <span>&nbsp;Guard Shift</span>
            </a>

          </li>

          <li class="has-sub {{ (Route::currentRouteName() == 'get_shift_supervisor') ? 'active' : '' }}">

            <a href="{{route('get_shift_supervisor')}}">

              <i class="fa fa-circle"></i>
              <span>&nbsp;Supervisor Shift</span>
            </a>

          </li>
          <li class="has-sub {{ (Route::currentRouteName() == 'get_assigned') ? 'active' : '' }}">
            <a href="{{route('get_assigned')}}">

              <i class="fa fa-circle"></i>
              <span>&nbsp;Shift Summary</span>
            </a>

          </li>
          

        </ul>
      </li>
      
      <li class="has-sub {{ (Route::currentRouteName() == 'get_swim')
            || (Route::currentRouteName() == 'get_swim_super') ? 'active' : '' }}">
        <a href="javascript:;">
          <b class="caret"></b>

          <i class="fa fa-tasks"></i>
          <span>&nbsp;Manage SWIM List</span>
        </a>

        <ul class="sub-menu">
          
          
          <li class="has-sub {{ (Route::currentRouteName() == 'get_swim')
           ? 'active' : '' }}">

            <a href="{{route('get_swim')}}">

              <i class="fa fa-circle"></i>
              <span>&nbsp;Guard Task</span>
            </a>

          </li>

          <li class="has-sub {{ (Route::currentRouteName() == 'get_swim_super')
           ? 'active' : '' }}">

            <a href="{{route('get_swim_super')}}">

              <i class="fa fa-circle"></i>
              <span>&nbsp;Supervisor Task</span>
            </a>

          </li>
          

        </ul>
      </li>

      
     
      
      

      <li class="has-sub {{ (Route::currentRouteName() == 'get_client') ? 'active' : '' }}">
        <a href="{{route('get_client')}}">

          <i class="fa fa-user-secret"></i>
          <span>&nbsp;Manage Client</span>
        </a>

      </li>
      <li class="has-sub {{ (Route::currentRouteName() == 'get_location') ? 'active' : '' }}">
        <a href="{{route('get_location')}}">

          <i class="fa fa-map-pin"></i>
          <span>&nbsp;Manage Location</span>
        </a>

      </li>

      <li class="has-sub {{ (Route::currentRouteName() == 'get_assets') ? 'active' : '' }}">
        <a href="{{route('get_assets')}}">
          

          <i class="fa fa-building"></i>
          <span>&nbsp;Manage Assets</span>
        </a>
       
      </li>

      <li class="has-sub {{ (Route::currentRouteName() == 'get_turnover_items') ? 'active' : '' }}">
        <a href="{{route('get_turnover_items')}}">
          

          <i class="fa fa-redo"></i>
          <span>&nbsp;Manage Turnover Items</span>
        </a>
       
      </li>
     
      <li class="has-sub {{ (Route::currentRouteName() == 'get_incident_type') 
            || (Route::currentRouteName() == 'get_turnover_items')
            || (Route::currentRouteName() == 'get_shifts')
            || (Route::currentRouteName() == 'get_emergency_type')
            || (Route::currentRouteName() == 'get_job_role') 
            || (Route::currentRouteName() == 'get_notif') 
             ? 'active' : '' }}">
        <a href="javascript:;">
          <b class="caret"></b>

          <i class="fab fa-get-pocket"></i>
          <span>&nbsp;Configure Picklist</span>
        </a>
        <ul class="sub-menu">
        <li class="has-sub {{ (Route::currentRouteName() == 'get_shifts') ? 'active' : '' }}">

          <a href="{{route('get_shifts')}}">

            <i class="fa fa-circle"></i>
            <span>&nbsp;Shift Type</span>
          </a>

          </li>
          <li class="has-sub  {{ (Route::currentRouteName() == 'get_incident_type') ? 'active' : '' }}">

            <a href="{{route('get_incident_type')}}">

              <i class="fa fa-circle"></i>
              <span>&nbsp;Incident Type</span>
            </a>

          </li>

          <li class="has-sub {{ (Route::currentRouteName() == 'get_emergency_type') ? 'active' : '' }}">

            <a href="{{route('get_emergency_type')}}">

              <i class="fa fa-circle"></i>
              <span>&nbsp;Emergency Type</span>
            </a>

          </li>
          <li class="has-sub {{ (Route::currentRouteName() == 'get_job_role') ? 'active' : '' }}">

            <a href="{{route('get_job_role')}}">

              <i class="fa fa-circle"></i>
              <span>&nbsp;Job Role</span>
            </a>

          </li>

          <li class="has-sub {{ (Route::currentRouteName() == 'get_notif') ? 'active' : '' }}">

            <a href="{{route('get_notif')}}">

              <i class="fa fa-bell"></i>
              <span>&nbsp;Notifications</span>
            </a>

          </li>
         
          


        </ul>
      </li>
      

      <li class="has-sub {{ (Route::currentRouteName() == 'view_reports')
             || (Route::currentRouteName() == 'incident_reports')
             || (Route::currentRouteName() == 'emergency_reports')
             || (Route::currentRouteName() == 'performance_reports') ? 'active' : '' }}">
        <a href="javascript:;">
          <b class="caret"></b>

          <i class="fa fa-sticky-note"></i>
          <span>&nbsp;Reports</span>
        </a>
        <ul class="sub-menu">
          
          
          <li class="has-sub {{ (Route::currentRouteName() == 'view_reports')
           ? 'active' : '' }}">

            <a href="{{route('view_reports')}}">

              <i class="fa fa-circle"></i>
              <span>&nbsp;Activity Logbook</span>
            </a>

          </li>

          <li class="has-sub {{ (Route::currentRouteName() == 'incident_reports')
           ? 'active' : '' }}">

            <a href="{{route('incident_reports')}}">

              <i class="fa fa-circle"></i>
              <span>&nbsp;Incident Logbook</span>
            </a>

          </li>

          <li class="has-sub {{ (Route::currentRouteName() == 'emergency_reports')
           ? 'active' : '' }}">

            <a href="{{route('emergency_reports')}}">

              <i class="fa fa-circle"></i>
              <span>&nbsp;Emergency Logbook</span>
            </a>

          </li>
          
          <li class="has-sub {{ (Route::currentRouteName() == 'performance_reports')
           ? 'active' : '' }}">

            <a href="{{route('performance_reports')}}">

              <i class="fa fa-circle"></i>
              <span>&nbsp;Task Performance Logbook</span>
            </a>

          </li>

        </ul>
      </li>
      @endif
     
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