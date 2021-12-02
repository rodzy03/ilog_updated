@extends('layouts.main')
@section('title','dashboard')
@section('content')

@section('extra-css')
<!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
<link href="{{ asset('assets/plugins/DataTables/media/css/dataTables.bootstrap.min.css')}}" rel="stylesheet" />
<link href="{{ asset('assets/plugins/DataTables/extensions/Responsive/css/responsive.bootstrap.min.css')}}" rel="stylesheet" />
<!-- ================== END PAGE LEVEL STYLE ================== -->


@endsection

<!-- begin #content -->
<div id="content" class="content" >
    
    

    <!-- BEGIN panel-group -->
    <div class="panel-group faq" id="faq-list" >
        <!-- BEGIN panel -->
        <div class="panel ">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a><i class="fa fa-question-circle fa-fw text-info m-r-5"></i> LOCATION LIST </a>
                </h4><br>
                {{--<button class="form-control col-md-3 btn btn-info" data-toggle="modal" data-target="#modal-add"><i class="fa fa-upload"></i>&nbsp;&nbsp;import</button>--}}
                <button class="form-control col-md-3 btn btn-inverse" data-toggle="modal" data-target="#modal-add-location"><i class="fa fa-building">&nbsp;&nbsp;&nbsp;</i>Add New Location&nbsp;</button>
                
                <form action="{{ route('generate_location_qr_all')}}" method="post">
                        @csrf
                        <br><button class="form-control col-md-3 btn btn-purple btn-gen-all">
                            <i class="fa fa-share"></i>&nbsp;Generate all QR</button>
                    </form>
            </div>
            <!-- LIST OF CHED TDP GRANTEES ACADEMIC YEAR 2020-2021 -->
            <div id="faq-2">
                <div class="panel-body">
                    <!-- <p>
                                The available scholarship programs are posted in the 
                                Facebook Page Scholarship and Financial Assistance Services – 
                                PUP Manila and Facebook Page PUPQC Scholarship and Financial Services.
                                </p> -->
                    <table id="data-table-default" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th class="text-nowrap">Location Information</th>
                                <th class="text-nowrap">Detachment Center</th>
                                <th class="text-nowrap">Client</th>
                                <th class="text-nowrap">DC</th>
                                <th class="text-nowrap">NSO</th>
                                <th class="text-nowrap">Action</th>
                                <th class="text-nowrap" hidden>lat</th>
                                <th class="text-nowrap" hidden>long</th>
                                <th class="text-nowrap" hidden>type</th>
                                <th class="text-nowrap" hidden>client id</th>
                                <th hidden>10</th>
                                <th hidden>11</th>
                                <th hidden>12</th>
                                <th hidden>13</th>
                                <th hidden>14</th>
                            </tr>

                        </thead>
                        <tbody>
                        
                            @foreach($data as $row)
                            <tr>
                               @php
                                    
                                    $d_centers = db::table('v_get_detachments')
                                    ->where('LOCATION_ID',$row->RLI_LOCATIONID)
                                    ->get(['DETACHMENT_CENTER','client_id']);
                                    
                               @endphp
                               
                                <td style="text-transform: uppercase;width: 23%;">
                                <b>{!! (!empty($row->RLI_LOCATIONAME)) ? $row->RLI_LOCATIONAME."<br>": "" !!}</b>
                                {!! (!empty($row->ADDRESS)) ? "ADDRESS: ".$row->ADDRESS."<br>": "" !!}
                                {!! (!empty($row->PROVINCE)) ? "PROVINCE: ".$row->PROVINCE."<br>": "" !!}
                                {!! (!empty($row->CITY)) ? "CITY: ".$row->CITY."<br>": "" !!}
                                {!! (!empty($row->CONTACT)) ? "CONTACT: ".$row->CONTACT."<br>": "" !!}
                                </td>
                                <td style="text-transform: uppercase; width: 20%;">
                                
                                
                                <ul>
                                
                                    @for ($y = 0; $y < count($d_centers); $y++)
                                        @if($d_centers[$y]->DETACHMENT_CENTER != NULL)
                                        <li style="margin-left: -25px; ">{{$d_centers[$y]->DETACHMENT_CENTER}}</li> 
                                        @endif
                                    @endfor
                                </ul>
                                
                                </td>
                                <td style="text-transform: uppercase; width: 20%;">
                                
                                @if(!empty($d_centers))
                                <ul>
                                    @for ($j = 0; $j < count($d_centers); $j++)
                                        @if($d_centers[$j]->client_id != 0)
                                        <li style="margin-left: -25px; ">{{db::table('t_clients')->where('client_id',$d_centers[$j]->client_id)->value('client_name')}}</li> 
                                        @else
                                        <li style="margin-left: -25px; ">NO CLIENT</li>
                                        @endif
                                    @endfor
                                </ul>
                                @endif
                                </td>
                                <td style="text-transform: uppercase;width: 20%">
                                <ul>
                                @if(!empty($d_centers))
                                    @for ($z = 0; $z < count($d_centers); $z++)
                                    @php

                                        if(strtolower($row->LOCATION_TYPE) == strtolower("Post")) {
                                            $get_super_day = db::table('v_get_locations_sched')
                                            ->where('RLI_LOCATIONAME',$d_centers[$z]->DETACHMENT_CENTER )
                                            ->where('SHIFT_ID',1)
                                            ->where('RAI_TYPE',2)
                                            ->where('ACTIVE_FLAG',1)
                                            ->get(['RAI_LASTNAME','RAI_FIRSTNAME']);
                                        }   
                                        else {
                                            $get_super_day = \db::table('v_get_locations_sched')
                                            ->where('SHIFT_ID',1)
                                            ->where('RAI_TYPE',2)
                                            ->where('RLI_LOCATIONID',$row->RLI_LOCATIONID)
                                            ->where('ACTIVE_FLAG',1)
                                            ->get(['RAI_LASTNAME','RAI_FIRSTNAME']);    
                                        }

                                        


                                    @endphp
                                    @if(!empty($get_super_day[$z]))
                                    <li style="margin-left: -25px; ">{{$get_super_day[$z]->RAI_LASTNAME}} {{$get_super_day[$z]->RAI_FIRSTNAME}}</li> 
                                    @endif
                                    @endfor
                                @endif
                                </ul>
                                </td>
                                <td style="text-transform: uppercase;width: 20%">
                                <ul>
                                @if(!empty($d_centers))
                                    @for ($q = 0; $q < count($d_centers); $q++)
                                    @php

                                        if(strtolower($row->LOCATION_TYPE) == strtolower("Post")) {
                                            $get_super_night = db::table('v_get_locations_sched')
                                            ->where('RLI_LOCATIONAME',$d_centers[$q]->DETACHMENT_CENTER )
                                            ->where('SHIFT_ID',3)
                                            ->where('RAI_TYPE',2)
                                            ->where('ACTIVE_FLAG',1)
                                            ->get(['RAI_LASTNAME','RAI_FIRSTNAME']);
                                        }   
                                        else {
                                            $get_super_night = \db::table('v_get_locations_sched')
                                            ->where('SHIFT_ID',3)
                                            ->where('RAI_TYPE',2)
                                            ->where('RLI_LOCATIONID',$row->RLI_LOCATIONID)
                                            ->where('ACTIVE_FLAG',1)
                                            ->get(['RAI_LASTNAME','RAI_FIRSTNAME']);    
                                        }

                                    @endphp
                                    @if(!empty($get_super_night[$q]))
                                    <li style="margin-left: -25px; ">{{$get_super_night[$q]->RAI_LASTNAME}} {{$get_super_night[$q]->RAI_FIRSTNAME}}</li> 
                                    @endif
                                    @endfor
                                @endif
                                </ul>
                                </td>
                                <td style="width: 20%;">
                                    <div class="row">
                                        @if($row->RLI_ACTIVE == 1)

                                        <form action="{{ route('generate_location_qr')}}" method="post">
                                            @csrf
                                            <input type="text" value="{{$row->RLI_LOCATIONID}}" name="asset_id" hidden>
                                            <button type="submit" class="form-control btn btn-danger ">
                                                <i class="fa fa-print"></i>&nbsp;</button>

                                        </form>&nbsp;&nbsp;
                                        <a id=edit vals="{{$row->RLI_LOCATIONID}}" class="btn btn-info" data-toggle="modal" data-target="#modal-edit"><i class="fa fa-edit text-white"></i></a>&nbsp;
                                        
                                        <a id=deact vals="{{$row->RLI_LOCATIONID}}" class="btn btn-purple" data-toggle="tooltip" title="Deactive"><i class="fa fa-ban text-white"></i>&nbsp;</a>&nbsp;
                                        @else
                                        <a id=act vals="{{$row->RLI_LOCATIONID}}" class="btn btn-success" data-toggle="tooltip" title="Activate"><i class="fa fa-redo text-white"></i></a>&nbsp;

                                        @endif



                                    </div>

                                </td>
                                <td hidden>{{$row->RLI_LAT}}</td>
                                <td hidden>{{$row->RLI_LONG}}</td>
                                <td hidden>{{$row->LOCATION_TYPE}}</td>
                                <td hidden>{{$row->CLIENT_ID}}</td>

                                <td hidden>{{$row->RLI_LOCATIONAME}}</td>
                                <td hidden>{{$row->ADDRESS}}</td>
                                <td hidden>{{$row->PROVINCE}}</td>
                                <td hidden>{{$row->CITY}}</td>
                                <td hidden>{{$row->CONTACT}}</td>
                            </tr>
                            
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- END panel -->

    </div>


    <div class="modal fade" id="modal-add">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">

                </div>
                <div class="modal-body">
                    <fieldset>
                        <div class="note  note-with-left-icon m-b-15">
                            <div class="note-icon"><i class="fa fa-briefcase"></i></div>
                            <div class="note-content text-left">
                                <h4><b>IMPORT LOCATION</b></h4>
                                <p>

                                </p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12  col-md-12">
                                <div class="stats-content">
                                    <label>Excel File <span class="required">*</span></label>
                                    <input class="form-control btn btn-inverse " style="height: 40px;" type="file" id="inMainDocument" />
                                    <label id="main_r_store" for="inMainDocument"></label>
                                </div>
                            </div>


                        </div>

                    </fieldset>
                </div>

                <div class="modal-footer">
                    <a href="javascript:;" class="btn btn-white" data-dismiss="modal">Close</a>
                    <button type="button" class="btn btn-success" id="btnRegister">
                        <span id=loading class="fas fa-spinner fa-pulse loading"></span>&nbsp;Submit</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-edit">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h4 style="text-transform: uppercase;" class="modal-title" id="header_txt">EDIT</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <fieldset>
                        <div class="note note-with-left-icon m-b-15">
                            <div class="note-icon"><i class="fa fa-edit"></i></div>
                            <div class="note-content text-left">
                                <h4><b>EDIT INFORMATION</b></h4>
                                <p>

                                </p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="stats-content">
                                    <label>&nbsp;Location Name <span class="required">*</span></label>
                                    <input class="form-control firstname" style="height: 40px; text-transform:uppercase" type="text" />
                                    
                                </div>
                            </div>

                            
                        </div><br>

                     

                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                            <label>&nbsp;Location Type <span class="required">*</span></label>
                                <div class="radio radio-css">
                                    <input type="radio" name="radio_type_e" id="radio_detach_e" value="detachment center">
                                    <label for="radio_detach_e">Detachment Center</label>
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12">
                                <div class="radio radio-css">
                                    <input type="radio" name="radio_type_e" id="radio_post_e" value="post">
                                    <label for="radio_post_e">Post</label>
                                </div>
                            </div>
                        </div><br>
                       
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="stats-content">
                                    <label>&nbsp;Address <span class="required">*</span></label>
                                    <textarea class="form-control address_e" style="height: 50px; text-transform:uppercase" type="text" placeholder="146 area 2 oriole street sitio veterans brgy bagong silangan" ></textarea>
                                    
                                </div>
                            </div>

                            
                        </div><br>

                        <div class="row">
                            <div class="col-lg-4 col-md-12">
                                <div class="stats-content">
                                    <label>&nbsp;Province <span class="required">*</span></label>
                                    <input class="form-control province_e" style="height: 40px; text-transform:uppercase" type="text" placeholder="NCR, SECOND DISTRICT"/>
                                    
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-12">
                                <div class="stats-content">
                                    <label>&nbsp;City / Town <span class="required">*</span></label>
                                    <input class="form-control city_e" style="height: 40px; text-transform:uppercase" type="text" placeholder="QUEZON CITY"/>
                                    
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-12">
                                <div class="stats-content">
                                    <label>&nbsp;Contact Number <span class="required">*</span></label>
                                    <input class="form-control contact_e" style="height: 40px; text-transform:uppercase" type="number" placeholder="09441123449"/>
                                    
                                </div>
                            </div>

                            
                        </div><br>

                        <div class="row client" >
                            <div class="col-lg-12 col-md-12">
                                <div class="stats-content">
                                    <label>&nbsp;Client <span class="required"></span></label>
                                    <select id=sel_client_e name="sel_client_e" class="form-control sel_client_e" style="text-transform: uppercase; height: 40px">
                                        <option value="NA">N\A</option>
                                        @foreach($client as $row)
                                        <option value="{{$row->client_id}}">{{$row->client_name}}</option>
                                        @endforeach
                                    </select>
                                    
                                </div>
                            </div>

                            
                        </div><br>
                        <div class="row detach" style="display: none;">
                            <div class="col-lg-12 col-md-12">
                                <div class="stats-content">
                                    <label>&nbsp;Detachment Locations <span class="required">*</span></label>
                                    <select name="sel_detach_e" class="form-control sel_detach_e" style="text-transform: uppercase; height: 40px">
                                        @foreach($detach as $row)
                                        <option value="{{$row->RLI_LOCATIONID}}">{{$row->RLI_LOCATIONAME}}</option>
                                        @endforeach
                                    </select>
                                    
                                </div>
                            </div>

                            
                        </div><br>

                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="stats-content">
                                    <label>&nbsp;Latitude and Longhitude <span class="required">*</span></label>
                                    <input class="form-control longhitude_e" style="height: 40px; " placeholder="15.139849347259181, 120.59089350162373"/>
                                    <label id="lbl_latlng" ></label>
                                </div>
                            </div>

                            
                        </div><br>

                       
                    </fieldset>
                </div>

                <div class="modal-footer">
                    <a href="javascript:;" class="btn btn-white" data-dismiss="modal">Close</a>
                    <button type="button" class="btn btn-success" id="btnUpdate">
                        <span id=loading class="fas fa-spinner fa-pulse loading"></span>&nbsp;Submit</button>
                </div>
            </div>
        </div>
    </div>

   
    

    <div class="modal fade" id="modal-add-location">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">ADD LOCATION</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <fieldset>
                        <div class="note note-with-left-icon m-b-15">
                            <div class="note-icon"><i class="fa fa-edit"></i></div>
                            <div class="note-content text-left">
                                <h4><b>LOCATION INFORMATION</b></h4>
                                <p>

                                </p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="stats-content">
                                    <label>&nbsp;Location Name <span class="required">*</span></label>
                                    <input class="form-control firstname_a" style="height: 40px; text-transform:uppercase" type="text" />
                                               
                                </div>
                            </div>

                            
                        </div><br>
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                            <label>&nbsp;Location Type <span class="required">*</span></label>
                                <div class="radio radio-css">
                                    <input type="radio" name="radio_type" id="radio_detach" checked value="detachment center">
                                    <label for="radio_detach">Detachment Center</label>
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12">
                                <div class="radio radio-css">
                                    <input type="radio" name="radio_type" id="radio_post" value="post">
                                    <label for="radio_post">Post</label>
                                </div>
                            </div>
                        </div><br>

                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="stats-content">
                                    <label>&nbsp;Address <span class="required">*</span></label>
                                    <textarea class="form-control address" style="height: 50px; text-transform:uppercase" type="text" placeholder="146 area 2 oriole street sitio veterans brgy bagong silangan" ></textarea>
                                    
                                </div>
                            </div>

                            
                        </div><br>

                        <div class="row">
                            <div class="col-lg-4 col-md-12">
                                <div class="stats-content">
                                    <label>&nbsp;Province <span class="required">*</span></label>
                                    <input class="form-control province" style="height: 40px; text-transform:uppercase" type="text" placeholder="NCR, SECOND DISTRICT"/>
                                    
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-12">
                                <div class="stats-content">
                                    <label>&nbsp;City / Town <span class="required">*</span></label>
                                    <input class="form-control city" style="height: 40px; text-transform:uppercase" type="text" placeholder="QUEZON CITY"/>
                                    
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-12">
                                <div class="stats-content">
                                    <label>&nbsp;Contact Number <span class="required">*</span></label>
                                    <input class="form-control contact" style="height: 40px; text-transform:uppercase" type="number" placeholder="09441123449"/>
                                    
                                </div>
                            </div>

                            
                        </div><br>

                        <div class="row client" >
                            <div class="col-lg-12 col-md-12">
                                <div class="stats-content">
                                    <label>&nbsp;Client <span class="required"></span></label>
                                    <select name="sel_client" class="form-control sel_client" style="text-transform: uppercase; height: 40px">
                                        <option value="NA">N\A</option>
                                        @foreach($client as $row)
                                        <option value="{{$row->client_id}}">{{$row->client_name}}</option>
                                        @endforeach
                                    </select>
                                    
                                </div>
                            </div>

                            
                        </div><br>
                        <div class="row detach" style="display: none;">
                            <div class="col-lg-12 col-md-12">
                                <div class="stats-content">
                                    <label>&nbsp;Detachment Locations <span class="required">*</span></label>
                                    <select name="sel_detach" class="form-control sel_detach" style="text-transform: uppercase; height: 40px">
                                        @foreach($detach as $row)
                                        <option value="{{$row->RLI_LOCATIONID}}">{{$row->RLI_LOCATIONAME}}</option>
                                        @endforeach
                                    </select>
                                    
                                </div>
                            </div>

                            
                        </div><br>

                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="stats-content">
                                    <label>&nbsp;Latitude and Longitude <span class="required">*</span></label>
                                    <input class="form-control longhitude_a" style="height: 40px; " id="latlng" placeholder="15.139849347259181, 120.59089350162373"/>
                                    <label id="lbl_latlng_a" for="latlng"></label>
                                </div>
                            </div>

                            
                        </div><br>
                    </fieldset>
                </div>

                <div class="modal-footer">
                    <a href="javascript:;" class="btn btn-white" data-dismiss="modal">Close</a>
                    <button type="button" class="btn btn-success" id="btnAdd">
                        <span id=loading class="fas fa-spinner fa-pulse loading"></span>&nbsp;Submit</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end #content -->

@section('extra-js')


<!-- ================== BEGIN PAGE LEVEL JS ================== -->
<script src="{{ asset('assets/plugins/DataTables/media/js/jquery.dataTables.js')}}"></script>
<script src="{{ asset('assets/plugins/DataTables/media/js/dataTables.bootstrap.min.js')}}"></script>
<script src="{{ asset('assets/plugins/DataTables/extensions/Responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{ asset('assets/js/demo/table-manage-default.demo.min.js')}}"></script>
<!-- ================== END PAGE LEVEL JS ================== -->

<script>
    $(document).ready(function() {
        App.init();
        $('#data-table-default').DataTable({
            'paging'      : true,
            'searching'   : true,
            'ordering'    : true, 
        });
        $('.loading').hide();
    });

    var lat = "",long = "";
    $(document).on('keyup', '.longhitude_e', function(e){
        var input = $(this);
        var array = $(this).val().split(',');
        lat = $.trim(array[0]);
        long = $.trim(array[1]);
        var label = $('#lbl_latlng');
        
        if(isLatitude(lat) && isLongitude(long)) {
            label.text('');
            input.css("border-color","");
            $('#btnUpdate').attr('disabled', false);
        } 
        else if (lat == "") {
            label.text('');
            input.css("border-color","");
            $('#btnUpdate').attr('disabled', false);
        }
        else {
            
            label.css("color","red");
            label.text('Invalid latitude and longhitude');
            input.css("border-color","red");
            $('#btnUpdate').attr('disabled', true);
        }
    });

    $(document).on('keyup', '.longhitude_a', function(e){
        var input = $(this);
        var array = $(this).val().split(',');
        lat = $.trim(array[0]);
        long = $.trim(array[1]);
        var label = $('#lbl_latlng_a');
        
        if(isLatitude(lat) && isLongitude(long)) {
            label.text('');
            input.css("border-color","");
            $('#btnAdd').attr('disabled', false);
        } 
        else if (lat == "") {
            label.text('');
            input.css("border-color","");
            $('#btnAdd').attr('disabled', false);
        }
        else {
            
            label.css("color","red");
            label.text('Invalid latitude and longhitude');
            input.css("border-color","red");
            $('#btnAdd').attr('disabled', true);
        }
    });

    function isLatitude(lat) {
        return isFinite(lat) && Math.abs(lat) <= 90;
    }

    function isLongitude(lng) {
        return isFinite(lng) && Math.abs(lng) <= 180;
    }

    $('.btn-gen-all').click(function(){
        $('#modal-loading').modal('show');
    });
    var is_edit = false;
    $('.sel_client').on('change',function(){
        is_edit = false;
        client_id = ($('select[name=sel_client] option:selected').val() == "NA") ? 0 : $('select[name=sel_client] option:selected').val();
        get_client_loc(client_id)
    });

    $('.sel_client_e').on('change',function(){
        is_edit = true;
        client_id = ($('select[name=sel_client_e] option:selected').val() == "NA") ? 0 : $('select[name=sel_client_e] option:selected').val();
        get_client_loc(client_id)
    });



    $('input[type=radio][name=radio_type]').change(function() {
        if(this.value == "post") {
            $('.detach').show();
            
            
        }  
        else {

            
            $('.client').show();
            $('.detach').hide();
        }
        
    });

    function get_client_loc(id) {

        $.ajax({
            url: "{{route('get_client_loc')}}",
            method: "post",
            data: {
                _token: "{{csrf_token()}}",
                id: id
            },
            success: function(response) {

                if(is_edit == false) {
                    $('.sel_detach').empty();
                    $('.sel_detach').each(function(index, row) {
                        for (var i = 0; i < response['data'].length; i++) {
                            $(this).append($("<option>").text(response['data'][i]['RLI_LOCATIONAME']).val(response['data'][i]['RLI_LOCATIONID']));
                        }
                    });
                }
                else {
                    $('.sel_detach_e').empty();
                    $('.sel_detach_e').each(function(index, row) {
                        for (var i = 0; i < response['data'].length; i++) {
                            $(this).append($("<option>").text(response['data'][i]['RLI_LOCATIONAME']).val(response['data'][i]['RLI_LOCATIONID']));
                        }
                    });
                }
                

            },
            error: function() {
                console.log(response)
            }
        });
    }
    $('input[type=radio][name=radio_type_e]').change(function() {
        if(this.value == "post") {
            $('.detach').show();
            
        }  
        else {
            $('.client').show();
            $('.detach').hide();
        }
    });

    
    

    $('#btnRegister').click(function() {

        var form_data = new FormData();
        form_data.append("file", document.getElementById('inMainDocument').files[0]);
        form_data.append("_token", "{{csrf_token()}}");

        var button = $(this);
        button.closest(".modal").modal('hide');
        var url = "{{route('import_location')}}";
        import_excel(form_data,url,"");

    });

    var id = "";
    $('#data-table-default').on('click', '#deact', function() {

        id = $(this).attr('vals');
        url = "{{route('location_crud')}}";
        status = "deact"
        data = {
            id: id,
            _token: "{{csrf_token()}}",
            status: status
        }

        update(data, url, status);
    });

    $('#data-table-default').on('click', '#act', function() {

        id = $(this).attr('vals');
        url = "{{route('location_crud')}}";
        status = "act";
        data = {
            id: id,
            _token: "{{csrf_token()}}",
            status: status
        }

        update(data, url, status);
    });
    
    $('#data-table-default').on('click', '#edit', function() {

        id = $(this).attr('vals');
        let row = $(this).closest("tr"),
            firstname = $(row.find("td")[10]).text(),
            latlng = $(row.find("td")[6]).text() +', '+$(row.find("td")[7]).text(),
            type = $(row.find("td")[8]).text().toLowerCase(),
            client = ($(row.find("td")[9]).text() === "" || $(row.find("td")[9]).text() == 0)  ? "NA" : $(row.find("td")[9]).text();
            address_e = $(row.find("td")[11]).text()
            province_e = $(row.find("td")[12]).text()
            city_e = $(row.find("td")[13]).text()
            contact_e = $(row.find("td")[14]).text()
            
            if(latlng == ", ")
                latlng = "";


            
            $('.firstname').val(firstname);
            $('.longhitude_e').val(latlng);

            $('.address_e').val(address_e);
            $('.province_e').val(province_e);
            $('.city_e').val(city_e);
            $('.contact_e').val(contact_e);
            




            if(type == "post") { 
                
                $('.detach').show();
                $('#radio_post_e').prop('checked', true) 
            } 
            else {
                $('.client').show();
                $('.detach').hide();
                $('#radio_detach_e').prop('checked', true); 
            }

            selectElement('sel_client_e', client)
            $('#header_txt').text(firstname)
            
    });

    function selectElement(id, valueToSelect) {    
        let element = document.getElementById(id);
        element.value = valueToSelect;
    }

    var location_id = "", client_id = "";
    $('#btnUpdate').click(function() {

        if(lat == "") {
            var array = $('.longhitude_e').val().split(',');
            lat = $.trim(array[0]);
            long = $.trim(array[1]);
        }
        
        url = "{{route('location_crud')}}";
        status = "normal";
        loc_type = $('input[name="radio_type_e"]:checked').val();
        location_id = (loc_type == "post") ? $('select[name=sel_detach_e] option:selected').val() : "";
        client_id = $('select[name=sel_client_e] option:selected').val();
        data = {
            id: id,
            _token: "{{csrf_token()}}",
            status: status,
            asset_name:$('.firstname').val(),
            loc_type:loc_type,
            location_id:location_id,
            client_id:client_id,
            lat:lat,
            long:long,
            address:$('.address_e').val(),
            province:$('.province_e').val(),
            city:$('.city_e').val(),
            contact:$('.contact_e').val()
        }

        var button = $(this);
        button.closest(".modal").modal('hide');
        update(data, url, status);
    });




    $('#btnAdd').click(function() {
        
        var array = $('.longhitude_a').val().split(',');
        lat = $.trim(array[0]);
        long = $.trim(array[1]);
        url = "{{route('location_crud')}}";
        status = "add";
        loc_type = $('input[name="radio_type"]:checked').val();
        location_id = (loc_type == "post") ? $('select[name=sel_detach] option:selected').val() : "";
        client_id = $('select[name=sel_client] option:selected').val();
        
        data = {
            id: id,
            _token: "{{csrf_token()}}",
            status: status,
            asset_name:$('.firstname_a').val(),
            loc_type:loc_type,
            location_id:location_id,
            client_id:client_id,
            lat:lat,
            long:long,
            address:$('.address').val(),
            province:$('.province').val(),
            city:$('.city').val(),
            contact:$('.contact').val(),
        }

        
        var button = $(this);
        button.closest(".modal").modal('hide');
        update(data, url, status);
    });

</script>

@endsection
@endsection