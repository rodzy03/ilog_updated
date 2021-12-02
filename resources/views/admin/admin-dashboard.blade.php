@extends('layouts.main')
@section('title','dashboard')
@section('content')

@section('extra-css')
{{--<link href="https://api.mapbox.com/mapbox-gl-js/v2.3.1/mapbox-gl.css" rel="stylesheet">
<script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.7.0/mapbox-gl-geocoder.min.js"></script>
<link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.7.0/mapbox-gl-geocoder.css" type="text/css">
<!-- Promise polyfill script required to use Mapbox GL Geocoder in IE 11 -->
<script src="https://cdn.jsdelivr.net/npm/es6-promise@4/dist/es6-promise.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/es6-promise@4/dist/es6-promise.auto.min.js"></script>--}}

<link href="{{asset('assets/plugins/jquery-jvectormap/jquery-jvectormap.css')}}" rel="stylesheet" />
<style>

  .mapbox-logo {
    display: none;
  }

  .mapboxgl-ctrl-logo {
    display: none !important;
  }

  .mapbox-improve-map {
    display: none;
  }

  .mapboxgl-ctrl-compass {
    display: none;
  }

  .mapboxgl-popup-close-button {
    display: none;
  }

  .mapboxgl-popup-content {
    width: 250px;
  }



  .map-overlay h2,
  .map-overlay p {
    margin: 0 0 10px;
  }

  .card-block {
    padding: 12px;
    padding-top: 12px;
    padding-right: 12px;
    padding-bottom: 12px;
    padding-left: 12px;
  }

  .table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
    border-color: #e2e7eb;
    padding: 2px 2px;
  }

  #menu {
    position: absolute;
    background: #efefef;
    padding: 10px;
    font-family: 'Open Sans', sans-serif;
  }

  

</style>
@endsection


<!-- begin #content -->
<div id="content" class="content content-inverse-mode">


  @include('layouts.includes.tiles') 
 <div style="margin: 0 -8px;">
<div id="menu">
  <input id="satellite-v9" type="radio" name="rtoggle" class="rtoggle" value="satellite" checked="checked">
  <label for="satellite-v9">Satellite</label>
  <input id="light-v10" type="radio" name="rtoggle" class="rtoggle" value="light">
  <label for="light-v10">Light</label>

  <input id="dark-v10" type="radio" name="rtoggle" class="rtoggle" value="dark">
  <label for="dark-v10">Dark</label>

  <input id="streets-v11" type="radio" name="rtoggle" class="rtoggle" value="streets">
  <label for="streets-v11">Streets</label>

  <input id="outdoors-v11" type="radio" name="rtoggle" class="rtoggle" value="outdoors">
  <label for="outdoors-v11">Outdoors</label>
</div>

  <div style="top: 350px; position:absolute; z-index: 1; width:140px; margin-left:20px">
    <!-- begin card -->
    <div class="card text-center">
      <div class="card-header">
        SELECT FILTER
      </div>

      <div class="card-block">

        <div class="checkbox checkbox-css">
          <input class="filter_checkbox" type="checkbox" id="e_checkbox" value="emergency" />
          <label style="margin-left: -20px; text-transform:uppercase" for="e_checkbox">Emergency</label>
        </div>

        <div class="checkbox checkbox-css">
          <input class="filter_checkbox" type="checkbox" id="i_checkbox" value="incident" />
          <label style="margin-left: -27px; text-transform:uppercase" for="i_checkbox">Incidents</label>
        </div>

        <div class="checkbox checkbox-css">
          <input class="filter_checkbox" type="checkbox" id="s_checkbox" value="supervisor" />
          <label style="margin-left: -19px; text-transform:uppercase" for="s_checkbox">Supervisor</label>
        </div>

        <div class="checkbox checkbox-css">
          <input class="filter_checkbox" type="checkbox" id="g_checkbox" value="guards" />
          <label style="margin-left: -41px; text-transform:uppercase" for="g_checkbox">Guards</label>
        </div>

        <div class="checkbox checkbox-css">
          <input class="filter_checkbox" type="checkbox" id="l_checkbox" value="locations" />
          <label style="margin-left: -22px; text-transform:uppercase" for="l_checkbox">Locations</label>
        </div>

        <div class="checkbox checkbox-css">
          <input class="filter_checkbox" type="checkbox" id="no_checkbox" value="no_filter" />
          <label style="margin-left: -28px; text-transform:uppercase" for="no_checkbox">Show All</label>
        </div><br>


        {{-- <div class="radio radio-css">
          <input type="radio" name="radio_css" id="assvisitorsets" value="visitors">
          <label for="visitors" style="margin-left: -36px; text-transform:uppercase">Visitors</label>
        </div>
        <div class="radio radio-css">
          <input type="radio" name="radio_css" id="assets" value="assets">
          <label for="assets" style="margin-left: -50px; text-transform:uppercase">Assets</label>
        </div> --}}

        <div class="fa-2x div_loading" style="display: none;"><span class="fas fa-spinner fa-pulse loading"></span>
          <p style="font-size: 12px;">Loading Results..</p>
        </div>
      </div>


    </div>

    <!-- end card -->
  </div>



  <div class="modal fade" id="modal-incident">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" style="color: red;">INCIDENT</h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        </div>
        <div class="modal-body">
          <fieldset>
            <div class="div_emer">


            </div>


          </fieldset>
        </div>


      </div>
    </div>
  </div>

  <div class="panel panel-inverse"  style="margin-top:-15px;" >
    <div class="panel-heading">
     
      <h4 class="panel-title">Jagwar Map</h4>
    </div>
    <div class="panel-body p-0" >

      <div id='map' style="height: 450px; ">

      </div>
    </div>
    <!-- end panel -->

  </div>
  <div class="panel panel-inverse"  style="margin-top:-22px;">
    <div class="panel-heading">

      <h4 class="panel-title">Jagwar Map</h4>
    </div>
  </div>

  <div class="theme-panel">
      <div style="overflow-y:auto; overflow:scroll; height: 500px; ">
        <a class="theme-collapse-btn" data-click="theme-panel-expand" href="javascript:;" style="width: 0px;left: -70px;"><button type="button" class="btn btn-grey m-r-5 m-b-5" style="-webkit-transform: rotate(90deg);
              -moz-transform: rotate(90deg);
              -o-transform: rotate(90deg);
              -ms-transform: rotate(90deg);
              transform: rotate(90deg);">QUICK VIEW</button>
        </a>


        <div class="theme-panel-content">
          <div class="panel panel-inverse" >
            <div class="panel-heading">

              <h3 class="panel-title">EMERGENCY</h3>
            </div>

            <table id="table_1" class="table table-striped table-bordered">

              <div class="divider"></div>
              <thead>
                <tr style="text-transform: uppercase;">
                  <th class="text-nowrap">Location</th>
                  <th class="text-nowrap">Type</th>
                  <th class="text-nowrap">Description</th>
                  <th class="text-nowrap">Time</th>


                </tr>

              </thead>
              <tbody>
                @php

                $emergency = db::table('v_admin_get_emergency')
                ->where(DB::raw('DATE(REL_DATEADDED)'), DB::raw('CURRENT_DATE'))
                ->get(['RLI_LOCATIONAME','RET_TYPENAME','TIME_E','REL_EMERGENCYDESC']);

                @endphp

                @for ($y = 0; $y < count($emergency); $y++) <tr style="text-transform: uppercase;">
                  @if($emergency[$y]->RLI_LOCATIONAME != NULL)
                  <td style="width:25%">{{$emergency[$y]->RLI_LOCATIONAME}}</td>
                  <td style="width:25%">{{$emergency[$y]->RET_TYPENAME}}</td>
                  <td>{{$emergency[$y]->REL_EMERGENCYDESC}}</td>
                  <td style="width:18%">{{$emergency[$y]->TIME_E}}</td>
                  @endif

                  </tr>
                  @endfor



              </tbody>
            </table>
          </div>

        </div><br>

        
        
        <div class="panel panel-inverse" >
            <div class="panel-heading">

              <h3 class="panel-title">INCIDENTS</h3>
            </div>
          <table id="table_2" class="table table-striped table-bordered">
          <div class="divider"></div>
            <thead>
              <tr style="text-transform: uppercase;">
                <th class="text-nowrap">Location</th>
                <th class="text-nowrap">Type</th>
                <th class="text-nowrap">Description</th>
                <th class="text-nowrap">Time</th>


              </tr>

            </thead>
            <tbody>
              @php

              $incidents = db::table('v_admin_get_incidents')
              ->where(DB::raw('DATE(RIL_DATEADDED)'), DB::raw('CURRENT_DATE'))
              ->get(['RLI_LOCATIONAME','RIT_TYPE','TIME_I','RIL_DESC']);

              @endphp

              @for ($y = 0; $y < count($incidents); $y++) <tr style="text-transform: uppercase;">
                @if($incidents[$y]->RLI_LOCATIONAME != NULL)
                <td style="width:25%">{{$incidents[$y]->RLI_LOCATIONAME}}</td>
                <td style="width:25%">{{$incidents[$y]->RIT_TYPE}}</td>
                <td>{{$incidents[$y]->RIL_DESC}}</td>
                <td style="width:18%">{{$incidents[$y]->TIME_I}}</td>
                @endif

                </tr>
                @endfor



            </tbody>
          </table>
        </div><br>

        <div class="panel panel-inverse" >
            <div class="panel-heading">

              <h3 class="panel-title">ACTIVE GUARDS</h3>
            </div>
          <table id="table_3" class="table table-striped table-bordered">
          <div class="divider"></div>
            <thead>
              <tr style="text-transform: uppercase;">
                <th class="text-nowrap">Name</th>
                <th class="text-nowrap">Location</th>
                <th class="text-nowrap">TIME IN</th>
                <th class="text-nowrap">SHIFT</th>

              </tr>

            </thead>
            {{--->where(DB::raw('DATE(DATE_ADDED)'), DB::raw('CURRENT_DATE'))--}}
            <tbody>
              @php

              $guards = db::table('v_admin_get_locations')

              ->where('RAI_TYPE',1)
              ->where('TGS_STATUS',1)
              ->get(['RLI_LOCATIONAME','RAI_LASTNAME','RAI_FIRSTNAME','TIME_G','tsc_value']);

              @endphp

              @for ($y = 0; $y < count($guards); $y++) <tr>
                @if($guards[$y]->RLI_LOCATIONAME != NULL)

                <td style="text-transform: uppercase;width:30%">{{$guards[$y]->RAI_LASTNAME}} {{$guards[$y]->RAI_FIRSTNAME}}</td>
                <td style="text-transform: uppercase; width:30%">{{$guards[$y]->RLI_LOCATIONAME}}</td>
                <td>{{$guards[$y]->TIME_G}}</td>

                <td style="text-transform: uppercase; width:19%">{{$guards[$y]->tsc_value}}</td>
                @endif
                </tr>
                @endfor

            </tbody>
          </table>
        </div><br>

        <div class="panel panel-inverse" >
            <div class="panel-heading">

              <h3 class="panel-title">ACTIVE SUPERVISOR</h3>
            </div>

          <table id="table_4" class="table table-striped table-bordered">

          <div class="divider"></div>
            <thead>
              <tr style="text-transform: uppercase;">
                <th class="text-nowrap">Name</th>
                <th class="text-nowrap">Location</th>
                <th class="text-nowrap">TIME IN</th>
                <th class="text-nowrap">SHIFT</th>

              </tr>

            </thead>
            {{-- >where(DB::raw('DATE(DATE_ADDED)'), DB::raw('CURRENT_DATE'))--}}
            <tbody>
              @php

              $guards = db::table('v_admin_get_locations')

              ->where('RAI_TYPE',2)
              ->where('TGS_STATUS',1)
              ->get(['RLI_LOCATIONAME','RAI_LASTNAME','RAI_FIRSTNAME','TIME_G','tsc_value']);

              @endphp

              @for ($y = 0; $y < count($guards); $y++) <tr>
                @if($guards[$y]->RLI_LOCATIONAME != NULL)

                <td style="text-transform: uppercase;width:30%">{{$guards[$y]->RAI_LASTNAME}} {{$guards[$y]->RAI_FIRSTNAME}}</td>
                <td style="text-transform: uppercase; width:30%">{{$guards[$y]->RLI_LOCATIONAME}}</td>
                <td>{{$guards[$y]->TIME_G}}</td>
                <td style="text-transform: uppercase; width:19%">{{$guards[$y]->tsc_value}}</td>
                @endif
                </tr>
                @endfor
            </tbody>
          </table>
        </div><br>



        <div class="row m-t-10">
          {{--<div class="col-md-12">
            <a href="javascript:;" class="btn btn-inverse btn-block btn-sm" data-click="reset-local-storage">Reset Local Storage</a>
          </div>--}}
        </div>
      </div>
    </div>
</div>
</div>  
<!-- begin panel -->
@include('layouts.includes.footer-tiles')
@section('extra-js')

<script src="{{asset('assets/js/demo/dashboard-v2.min.js')}}"></script>
<script src="{{asset('assets/plugins/jquery-jvectormap/jquery-jvectormap.min.js')}}"></script>
<script src="{{asset('assets/plugins/jquery-jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>


<script>
  $(document).ready(function() {
    App.init();
    DashboardV2.init();
    
  });
</script>
<script>
  //mapboxgl.accessToken = 'pk.eyJ1Ijoicm9kenkwMyIsImEiOiJja3FiaDVkdDgwZHR5MnZwOTl1NWlwdzkzIn0.Cr980SIbnKFyrjB1X-ySJg';

  var markerElement;
  var full_name = '';
  mapboxgl.accessToken = "{{env('MAPBOX_KEY')}}";
  // const default_location = [121.05767272556076,14.47034224025487];
  const default_location = [120.59933876222333, 15.116366253165598];

  var map = new mapboxgl.Map({
    container: 'map',
    center: default_location,
    zoom: 12,
    style: 'mapbox://styles/mapbox/satellite-v9',
    attributionControl: false

  });


  $('.rtoggle').change(function(e) {
    layerId = e.target.id;
    (layerId == "dark-v10") ?  map.setStyle('mapbox://styles/rodzy03/ckqbiphl300dq18mqqkbbvk0n') : map.setStyle('mapbox://styles/mapbox/' + layerId)
  });

  map.addControl(new mapboxgl.FullscreenControl());
  map.addControl(new mapboxgl.NavigationControl());
  map.on('click', (e) => {

  });

  // console.log(e.lngLat.lng,e.lngLat.lat);



  function get_locations(filter_value) {


    setTimeout(function() {
      $.ajax({
        url: "{{route('filters')}}",
        method: "post",

        data: {
          _token: "{{csrf_token()}}",
          type: filter_value
        },
        success: function(response) {

          if (response['data'].length > 0) {
            for (i = 0; i < response['data'].length; i++) {

              $.ajax({
                url: "{{route('sp_get_name')}}",
                type: 'post',
                data: {
                  _token: "{{csrf_token()}}",
                  id: response['data'][i]['LOCATION_ID']
                },
                async: false,
                success: function(name) {
                  full_name = "";
                  name_len = name['names'].length;
                  if (name_len > 0) {
                    for (j = 0; j < name_len; j++) {

                      if (j == name_len - 1) {
                        full_name += name['names'][j]['RAI_LASTNAME'] + " " + name['names'][j]['RAI_FIRSTNAME'];
                      } else {
                        full_name += name['names'][j]['RAI_LASTNAME'] + " " + name['names'][j]['RAI_FIRSTNAME'] + " , <br>";
                      }
                    }


                  } else {
                    full_name = "NO PERSONNEL ON DUTY";
                  }

                },
                error: function(error) {
                  console.log(error)
                }
              });





              markerElement = document.createElement('div')
              markerElement.className = 'marker ' + response['data'][i]['LOCATION_ID']
              markerElement.id = response['data'][i]['LOCATION_ID']

              markerElement.style.backgroundImage = "url(https://jagwar.ph/uploads/location_marker)"
              markerElement.style.backgroundSize = 'cover'
              markerElement.style.width = '50px'
              markerElement.style.height = '50px'


              var content = ``;
              if (response['data'][i]['LOCATION_TYPE'] == "post") {


                content = `
                
                
                <div style="text-align:left">
                  
                  <div class="card-block">
                    <p style="text-transform:uppercase; color:red; font-weight: bold; font-size: 13px">${response['data'][i]['LOCATION_NAME']}</p>
                    <hr style="height: 1px; background-color: gray;">
                    <p style="font-size:10px; text-transform:uppercase"><b>TYPE : </b>${response['data'][i]['LOCATION_TYPE']}
                    <br><b>detachment center : </b><br>${response['data'][i]['DETACHMENT_CENTER']}
                    
                    <br><b style="text-transform:uppercase">guard on duty : </b><br>${full_name}
                    </p>
                  </div>
                </div>
                
                
                `;
              } else {
                content = `
                
                
                <div style="text-align:left">
                  
                  <div class="card-block">
                    <p class="card-title" style="text-transform:uppercase; color:red; font-weight: bold; font-size: 13px">${response['data'][i]['LOCATION_NAME']}</p>
                    <hr style="height: 1px; background-color: gray;">
                    <p style="font-size:10px; text-transform:uppercase"><b>TYPE : </b>${response['data'][i]['LOCATION_TYPE']}
                    
                    <br><b style="text-transform:uppercase">supervisor on duty : </b><br>${full_name}
                    </p>
                  </div>
                </div>
                
                
                `;
              }
              const popUp = new mapboxgl.Popup({

              }).setHTML(content).setMaxWidth("400px");


              new mapboxgl.Marker(markerElement)
                .setLngLat([
                  response['data'][i]['RLI_LONG'], response['data'][i]['RLI_LAT']
                ])
                .setPopup(popUp)
                .addTo(map)

            }
          }

          $('.div_loading').hide();
        },
        error: function(response) {
          $('.div_loading').hide();
        }
      })
    }, 1000);
  }


  function get_incident(filter_value) {
    setTimeout(function() {
      $.ajax({
        url: "{{route('filters')}}",
        method: "post",

        data: {
          _token: "{{csrf_token()}}",
          type: filter_value
        },
        success: function(response) {


          if (response['data'].length > 0) {
            for (i = 0; i < response['data'].length; i++) {


              markerElement = document.createElement('div')
              markerElement.className = 'marker ' + response['data'][i]['RIL_LOGID']
              markerElement.id = response['data'][i]['RIL_LOGID']

              markerElement.style.backgroundImage = "url(https://jagwar.ph/uploads/guards)"
              markerElement.style.backgroundSize = 'cover'
              markerElement.style.width = '50px'
              markerElement.style.height = '50px'
              var picture = response['data'][i]['RAI_PICTURE'];

              const content = `
                <!-- begin card -->
                <center>
                <div class="card">
                  <img  src="{{asset('uploads/original_pictures/${picture}')}}" />
                  <div class="card-block">
                    <h4 class="card-title m-t-0 m-b-10" style="text-transform:uppercase">${response['data'][i]['RAI_FIRSTNAME']} ${response['data'][i]['RAI_MIDDLENAME']} ${response['data'][i]['RAI_LASTNAME']} (${response['data'][i]['RAT_TYPE']})</h4>
                    <p style="font-size:12px; text-transform:uppercase"><b>LOCATION:</b> ${response['data'][i]['RLI_LOCATIONAME']}<br><b>TYPE:</b> ${response['data'][i]['RIT_TYPE']}<br><b>DESCRIPTION</b>: ${response['data'][i]['RIL_DESC']}</p>
                    
                  </div>
                </div>
                </center>
                <!-- end card -->
                `;
              const popUp = new mapboxgl.Popup({

              }).setHTML(content).setMaxWidth("400px");


              new mapboxgl.Marker(markerElement)
                .setLngLat([
                  response['data'][i]['RIL_LONGH'], response['data'][i]['RIL_LAT']
                ])
                //.setPopup(popUp)
                .addTo(map)

            }

            markerElement.addEventListener('click', (event) => {

              $.ajax({
                url: "{{route('filters')}}",
                method: "post",

                data: {
                  _token: "{{csrf_token()}}",
                  type: "current_i",
                  id: event.target.id
                },
                success: function(response) {
                  $('.div_emer').empty();
                  const emer = `
                  
                            <div class="row form-group m-b-10">
                                    <label class="col-md-3 col-form-label">&nbsp;</label>
                                    <div class="col-md-12">
                                        <div class="input-group">
                                            <div class="input-group-prepend"></div>
                                            <img id="valid_id" src="{{asset('uploads/incident/')}}/${response['data'][0]['RIL_FILE_NAME']}" alt="UPLOAD VALID ID" width="100%" height="auto">
                                            
                                        </div>
                                    </div>
                                </div>
                                <div style="text-align:left" >
                                  <div class="card-block">
                                      
                                      <hr style="height: 1px; background-color: gray;">
                                      <p style="font-size:11px; text-transform:uppercase"><b>TYPE : </b>${response['data'][0]['RIT_TYPE']}
                                      <br><b>location : </b>${response['data'][0]['RLI_LOCATIONAME']}
                                      
                                      <br><b>description : </b>${response['data'][0]['RIL_DESC']}
                                      <br>

                                      <br><b style="text-transform:uppercase">reported by : </b>${response['data'][0]['RAI_LASTNAME']} ${response['data'][0]['RAI_FIRSTNAME']}
                                      <br><b style="text-transform:uppercase">role : </b>${response['data'][0]['RIT_TYPE']}
                                      <br><b style="text-transform:uppercase">time reported : </b>${response['data'][0]['TIME_I']}
                                      </p>
                                  </div>
                                    
                                </div>
                                `
                  $('.div_emer').append(emer);
                  $('#modal-incident').modal('show');
                }

              });


            });
          }

          $('.div_loading').hide();
        },
        error: function(response) {
          $('.div_loading').hide();
        }
      })
    }, 1000);
  }

  function get_emergency(filter_value) {
    setTimeout(function() {
      $.ajax({
        url: "{{route('filters')}}",
        method: "post",

        data: {
          _token: "{{csrf_token()}}",
          type: filter_value
        },
        success: function(response) {

          if (response['data'].length > 0) {
            for (i = 0; i < response['data'].length; i++) {


              markerElement = document.createElement('div')
              markerElement.className = 'marker ' + response['data'][i]['REL_LOGID']
              markerElement.id = response['data'][i]['REL_LOGID']

              markerElement.style.backgroundImage = "url(https://jagwar.ph/uploads/guards)"
              markerElement.style.backgroundSize = 'cover'
              markerElement.style.width = '50px'
              markerElement.style.height = '50px'
              var picture = response['data'][i]['RAI_PICTURE'];
              const content = `
                <!-- begin card -->
                <center>
                <div class="card">
                  <img  src="{{asset('uploads/original_pictures/${picture}')}}" />
                  <div class="card-block">
                    <h4 class="card-title m-t-0 m-b-10" style="text-transform:uppercase">${response['data'][i]['RAI_FIRSTNAME']} ${response['data'][i]['RAI_MIDDLENAME']} ${response['data'][i]['RAI_LASTNAME']} (${response['data'][i]['RAT_TYPE']})</h4>
                    <p style="font-size:12px; text-transform:uppercase"><b>LOCATION:</b> ${response['data'][i]['RLI_LOCATIONAME']}<br><b>TYPE:</b> ${response['data'][i]['RET_TYPENAME']}<br><b>DESCRIPTION</b>: ${response['data'][i]['REL_EMERGENCYDESC']}</p>
                    
                    
                  </div>
                </div>
                </center>
                <!-- end card -->
                `;
              const popUp = new mapboxgl.Popup({

              }).setHTML(content).setMaxWidth("400px");


              new mapboxgl.Marker(markerElement)
                .setLngLat([
                  response['data'][i]['REL_LONG'], response['data'][i]['REL_LAT']
                ])
                //.setPopup(popUp)
                .addTo(map)

            }

            markerElement.addEventListener('click', (event) => {

              $.ajax({
                url: "{{route('filters')}}",
                method: "post",

                data: {
                  _token: "{{csrf_token()}}",
                  type: "current_e",
                  id: event.target.id
                },
                success: function(response) {
                  $('.div_emer').empty();
                  const emer = `
                  
                            <div class="row form-group m-b-10">
                                    <label class="col-md-3 col-form-label">&nbsp;</label>
                                    <div class="col-md-12">
                                        <div class="input-group">
                                            <div class="input-group-prepend"></div>
                                            <img id="valid_id" src="{{asset('uploads/emergency/')}}/${response['data'][0]['REL_FILE_NAME']}" alt="UPLOAD VALID ID" width="100%" height="auto">
                                            
                                        </div>
                                    </div>
                                </div>
                                <div style="text-align:left" >
                                  <div class="card-block">
                                      
                                      <hr style="height: 1px; background-color: gray;">
                                      <p style="font-size:11px; text-transform:uppercase"><b>TYPE : </b>${response['data'][0]['RET_TYPENAME']}
                                      <br><b>location : </b>${response['data'][0]['RLI_LOCATIONAME']}
                                      
                                      <br><b>description : </b>${response['data'][0]['REL_EMERGENCYDESC']}
                                      <br>

                                      <br><b style="text-transform:uppercase">reported by : </b>${response['data'][0]['RAI_LASTNAME']} ${response['data'][0]['RAI_FIRSTNAME']}
                                      <br><b style="text-transform:uppercase">role : </b>${response['data'][0]['RAT_TYPE']}
                                      <br><b style="text-transform:uppercase">time reported : </b>${response['data'][0]['TIME_E']}
                                      </p>
                                  </div>
                                    
                                </div>
                                `
                  $('.div_emer').append(emer);
                  $('#modal-incident').modal('show');
                }

              });


            });
          }
          $('.div_loading').hide();
        },
        error: function(response) {
          $('.div_loading').hide();
        }
      })
    }, 1000);
  }

  function get_guards(type) {

    setTimeout(function() {
      $.ajax({
        url: "{{route('admin_get_locations')}}",
        method: "post",
        async: false,
        data: {
          _token: "{{csrf_token()}}",
          type: type
        },
        success: function(response) {


          if (response['data'].length > 0) {
            var picture = [];
            for (i = 0; i < response['data'].length; i++) {

              $.ajax({
                url: "{{route('get_current_status')}}",
                type: 'post',
                data: {
                  _token: "{{csrf_token()}}",
                  id: response['data'][i]['USER_ID']
                },
                async: false,
                success: function(curr) {
                  current_status = "";
                  name_len = curr['current_status'].length;
                  if (name_len > 0) {
                    current_status = curr['current_status'][0]['CURRENT_STATUS'];
                  }
                }
              });

              markerElement = document.createElement('div')
              markerElement.className = 'marker ' + response['data'][i]['USER_ID']
              markerElement.id = response['data'][i]['USER_ID']

              // markerElement.style.backgroundImage = "url(https://media.giphy.com/media/AxJaiJ65agT7sVZ8tf/giphy.gif)"
              markerElement.style.backgroundImage = (response['data'][i]['RAI_TYPE'] == "1") ? "url(https://jagwar.ph/uploads/guards)" : "url(https://jagwar.ph/uploads/superv)"


              markerElement.style.backgroundSize = 'cover'
              markerElement.style.width = '50px'
              markerElement.style.height = '50px'
              picture[i] = response['data'][i]['RAI_PICTURE'];
              const content = `
                  
                  
                  <div style="text-align:left;">&nbsp;
                  <center>
                  <img  src="{{asset('uploads/original_pictures/')}}/${response['data'][i]['RAI_PICTURE']}" />
                  </center>
                    <div class="card-block">
                      <p style="text-transform:uppercase; color:red; font-weight: bold; font-size: 13px; text-align:center">${response['data'][i]['RAI_LASTNAME']}, ${response['data'][i]['RAI_FIRSTNAME']} </p>
                      <hr style="height: 1px; background-color: gray;">
                      <p class="card-text" style="font-size:10px; text-transform:uppercase;">
                      <br><b>JOB ROLE : </b>${response['data'][i]['RAT_TYPE']}
                      <br><b>SHIFT : </b>${response['data'][i]['tsc_value']}
                      <br><b>STATUS : </b>${current_status}
                      <br><br><b>LOCATION : </b>${response['data'][i]['RLI_LOCATIONAME']}
                      </p>
                    </div>
                  </div>

                  `;
              const popUp = new mapboxgl.Popup({

              }).setHTML(content).setMaxWidth("400px");


              new mapboxgl.Marker(markerElement)
                .setLngLat([
                  response['data'][i]['LONGH'], response['data'][i]['LAT']
                ])
                .setPopup(popUp)
                .addTo(map)

            }


          }

          $('.div_loading').hide();
        },
        error: function(error) {
          $('.div_loading').hide();

        }
      });
    }, 1000);

  }
  $('.filter_checkbox').change(function() {
    $('.div_loading').show();
    $('input:checkbox.filter_checkbox:checked').each(function() {
      var filter_value = ($(this).attr('value') == "") ? "no_val" : $(this).attr('value');

      if (filter_value == "emergency") {
        get_emergency(filter_value);
      } else if (filter_value == "incident") {
        get_incident(filter_value);
      } else if (filter_value == "guards") {
        get_guards("1");
      } else if (filter_value == "supervisor") {
        get_guards("2");
      } else if (filter_value == "locations") {
        get_locations(filter_value)
      } else if (filter_value == "no_filter") {
        get_locations("locations")
        get_incident("incident");
        get_emergency("emergency");
        get_guards("all");
      }



    });

    $('input:checkbox.filter_checkbox:not(:checked)').each(function() {
      var filter_value = $(this).attr('value');

      if (filter_value == "emergency") {
        $('.marker').remove();
      } else if (filter_value == "incident") {
        $('.marker').remove();
      } else if (filter_value == "guards") {
        $('.marker').remove();
      } else if (filter_value == "supervisor") {
        $('.marker').remove();
      } else if (filter_value == "locations") {
        $('.marker').remove();
      } else if (filter_value == "no_filter") {
        $('.marker').remove();

      }

      setTimeout(function() {
        $('.div_loading').hide();
      }, 1000)

    });
  });


</script>
@endsection
@endsection