@extends('layouts.main')
@section('title','clients')
@section('content')

@section('extra-css')
<!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
<link href="{{ asset('assets/plugins/DataTables/media/css/dataTables.bootstrap.min.css')}}" rel="stylesheet" />
<link href="{{ asset('assets/plugins/DataTables/extensions/Responsive/css/responsive.bootstrap.min.css')}}" rel="stylesheet" />
<!-- ================== END PAGE LEVEL STYLE ================== -->

@endsection


<!-- begin #content -->
<div id="content" class="content">
   


    <!-- BEGIN panel-group -->
    <div class="panel-group faq" id="faq-list">
        <!-- BEGIN panel -->
        <div class="panel ">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a><i class="fa fa-question-circle fa-fw text-info m-r-5"></i>Shift Summary</a>
                </h4><br>
                <button hidden class="form-control col-md-3 btn btn-info" data-toggle="modal" data-target="#modal-add"><i class="fa fa-upload"></i>&nbsp;&nbsp;Import</button>
                {{--<button class="form-control col-md-3 btn btn-inverse" data-toggle="modal" data-target="#modal-add-asset"><i class="fa fa-plus">&nbsp;</i>Add New Client&nbsp;</button>--}}
                
            </div>
            <!-- LIST OF CHED TDP GRANTEES ACADEMIC YEAR 2020-2021 -->
            <div id="faq-2">
                <div class="panel-body">
                
                    <table id="data-table-default" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th class="text-nowrap">Detachment Center</th>
                                <th class="text-nowrap">Guard (Day Shift)</th>
                                <th class="text-nowrap">Guard (Night Shift)</th>
                                <th class="text-nowrap">Detachment Commander</th>
                                <th class="text-nowrap">Night Shift Officer</th>
                                
                                <!-- <th class="text-nowrap">Action</th> -->

                            </tr>

                        </thead>
                        <tbody>
                        
                            @for ($i=0; $i < count($data); $i++)
    
                            @php
                                    

                                    $get_super_day = \db::table('v_get_locations_sched')
                                    ->where(strtolower('LOCATION_TYPE'), strtolower('Detachment Center'))
                                    ->where('SHIFT_ID',1)
                                    ->where('RAI_TYPE',2)
                                    ->where('RLI_LOCATIONID',$data[$i]['location_id'])
                                    ->where('ACTIVE_FLAG',1)
                                    ->get();

                                    $get_super_night = \db::table('v_get_locations_sched')
                                    ->where(strtolower('LOCATION_TYPE'), strtolower('Detachment Center'))
                                    ->where('SHIFT_ID',3)
                                    ->where('RAI_TYPE',2)
                                    ->where('RLI_LOCATIONID',$data[$i]['location_id'])
                                    ->where('ACTIVE_FLAG',1)
                                    ->get();

                                    $posts_day = \db::table('v_get_locations_sched')
                                    ->where('DETACHMENT_ID',$data[$i]['location_id'])
                                    ->where(strtolower('LOCATION_TYPE'), strtolower('Post') )
                                    ->where('RAI_TYPE',1)
                                    ->where('SHIFT_ID',1)
                                    ->where('ACTIVE_FLAG',1)
                                    ->get();

                                    $posts_night = \db::table('v_get_locations_sched')
                                    ->where('DETACHMENT_ID',$data[$i]['location_id'])
                                    ->where(strtolower('LOCATION_TYPE'), strtolower('Post') )
                                    ->where('RAI_TYPE',1)
                                    ->where('SHIFT_ID',3)
                                    ->where('ACTIVE_FLAG',1)
                                    ->get();
                                    
                                @endphp
                            <tr>
                                <td style="text-transform: uppercase; width: 20%;" ><b>{{$data[$i]['location_name']}}</b></td>
                                
                                <td style="text-transform: uppercase;">
                                @for ($z = 0; $z < count($posts_day); $z++)
                                <ul>
                                    
                                    <li style="margin-left: -25px; ">{{$posts_day[$z]->RLI_LOCATIONAME}}<br> NAME: {{$posts_day[$z]->RAI_LASTNAME}} {{$posts_day[$z]->RAI_FIRSTNAME}}<br>SHIFT: {{$posts_day[$z]->START_SHIFT}} - {{$posts_day[$z]->END_SHIFT}}</li> 
                                    
                                </ul>
                                
                                @endfor
                                </td>
                                

                                <td style="text-transform: uppercase;">
                                @for ($z = 0; $z < count($posts_night); $z++)
                                <ul>
                                    
                                    <li style="margin-left: -25px; ">{{$posts_night[$z]->RLI_LOCATIONAME}}<br> NAME: {{$posts_night[$z]->RAI_LASTNAME}} {{$posts_night[$z]->RAI_FIRSTNAME}}<br>SHIFT: {{$posts_night[$z]->START_SHIFT}} - {{$posts_night[$z]->END_SHIFT}}</li> 
                                    
                                </ul>
                                
                                @endfor
                                </td>
                                <td style="text-transform: uppercase;">
                                <ul>
                                    @for ($y = 0; $y < count($get_super_day); $y++)
                                    <li style="margin-left: -25px; ">{{$get_super_day[$y]->RAI_LASTNAME}} {{$get_super_day[$y]->RAI_FIRSTNAME}}</li> 
                                    @endfor
                                </ul>
                                    
                                </td>

                                
                                <td style="text-transform: uppercase;">
                                <ul>
                                    @for ($x = 0; $x < count($get_super_night); $x++)
                                    <li style="margin-left: -25px; ">{{$get_super_night[$x]->RAI_LASTNAME}} {{$get_super_night[$x]->RAI_FIRSTNAME}}</li> 
                                    @endfor
                                </ul>
                                    
                                </td>

                                
                                {{--<td style="width: 15%;">
                                    <div class="row">
                                    <button vals="{{$data[$i]['location_id']}}" class="form-control btn btn-danger view_btn" data-toggle="modal" data-target="#modal-view"><i class="fa fa-eye"></i>&nbsp;View Guards</button>&nbsp;
                                        
                                        <a id=edit vals="{{$row->assign_id}}" class="btn btn-info" data-toggle="modal" data-target="#modal-edit"><i class="fa fa-edit text-white"></i></a>&nbsp;
                                        <a id=deact vals="{{$row->assign_id}}" class="btn btn-purple" data-toggle="tooltip" title="Deactive"><i class="fa fa-ban text-white"></i></a>
                                        
                                        @if($row->active_flag == 1)
                                        
                                        @else
                                        <a id=act vals="{{$row->assign_id}}" class="btn btn-success" data-toggle="tooltip" title="Activate"><i class="fa fa-redo text-white"></i></a>&nbsp;

                                        @endif 

                                    </div>

                                </td>--}}
                            </tr>
                            @endfor
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

    <div class="modal fade" id="modal-view">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">

                </div>
                <div class="modal-body">
                    <fieldset>
                        <div class="note  note-with-left-icon m-b-15">
                            <div class="note-icon"><i class="fa fa-user-secret"></i></div>
                            <div class="note-content text-left">
                                <h4><b>VIEW GUARDS</b></h4>
                                <p>

                                </p>
                            </div>
                        </div>
                        <div class="div_guard_list">
                            
                            <ol class="div_ol">
                            </ol>
                            
                        </div>
                        
                    </fieldset>
                </div>

                <div class="modal-footer">
                    <a href="javascript:;" class="btn btn-white" data-dismiss="modal">Close</a>
                    {{--<button type="button" class="btn btn-success" id="btnRegister">
                        <span id=loading class="fas fa-spinner fa-pulse loading"></span>&nbsp;Submit</button>--}}
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-add">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">

                </div>
                <div class="modal-body">
                    <fieldset>
                        <div class="note  note-with-left-icon m-b-15">
                            <div class="note-icon"><i class="fa fa-user-secret"></i></div>
                            <div class="note-content text-left">
                                <h4><b>IMPORT FOR ASSIGNING SUPERVISOR</b></h4>
                                <p>

                                </p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12 col-md-12">
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
                    <h4 class="modal-title">EDIT</h4>
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
                                    <label>&nbsp;Asset Name <span class="required">*</span></label>
                                    <input class="form-control firstname" style="height: 40px; text-transform:uppercase" type="text" />

                                </div>
                            </div>


                        </div><br>

                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="stats-content">
                                    <label>&nbsp;Asset Type <span class="required">*</span></label>
                                    <input class="form-control middlename" style="height: 40px; text-transform:uppercase" type="text" />

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

    {{--<div class="modal fade" id="modal-add-asset">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">ADD</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <fieldset>
                        <div class="note note-with-left-icon m-b-15">
                            <div class="note-icon"><i class="fa fa-edit"></i></div>
                            <div class="note-content text-left">
                                <h4><b>ADD INFORMATION</b></h4>
                                <p>

                                </p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="stats-content">
                                    <label>&nbsp;Client Name <span class="required">*</span></label>
                                    <input class="form-control client_a" style="height: 40px; text-transform:uppercase" type="text" />

                                </div>
                            </div>


                        </div><br>

                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="stats-content">
                                    <label>&nbsp;Asset Purpose <span class="required">*</span></label>
                                    <input class="form-control middlename_a" style="height: 40px; text-transform:uppercase" type="text" />

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
    </div>--}}
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
        //DashboardV2.init();
        $('#data-table-default').DataTable({
            'paging': true,
            'searching': true,
            
        });
        $('.loading').hide();
    });

    

    $('#btnRegister').click(function() {

        var form_data = new FormData();
        form_data.append("file", document.getElementById('inMainDocument').files[0]);
        form_data.append("_token", "{{csrf_token()}}");

        var button = $(this);
        button.closest(".modal").modal('hide');
        var url = "{{route('import_assigned')}}";
        import_excel(form_data, url, "");

    });

    var id = "";
    $('#data-table-default').on('click', '#deact', function() {

        id = $(this).attr('vals');
        url = "{{route('asset_crud')}}";
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
        url = "{{route('asset_crud')}}";
        status = "act";
        data = {
            id: id,
            _token: "{{csrf_token()}}",
            status: status
        }

        update(data, url, status);
    });

    $('#data-table-default').on('click', '.view_btn', function() {

        id = $(this).attr('vals');
        url = "{{route('asset_crud')}}";
      
        data = {
            location_id: id,
            _token: "{{csrf_token()}}"
            
        }

        $.ajax({
            url: "{{route('get_guards_assigned')}}",
            method: "post",
            data:data,
            success:function(response) {
                $('.div_ol').empty();
                console.log(response['data'][0]['RAI_FIRSTNAME'])
                for(i=0; i<response['data'].length; i++) {
                const content = `
                
                    <li style="text-transform: uppercase;"><b>${response['data'][i]['RAI_LASTNAME']} ${response['data'][i]['RAI_FIRSTNAME']} - ( ${response['data'][i]['tsc_value']} )</b></li>
                        
                `;
                $('.div_ol').append(content)
                }
                
                
                
            },
            error:function(){
                console.log(response)
            }
        });
    });

    $('#data-table-default').on('click', '#edit', function() {

        id = $(this).attr('vals');
        let row = $(this).closest("tr"),
            firstname = $(row.find("td")[0]).text(),
            middlename = $(row.find("td")[1]).text()


        $('.firstname').val(firstname);
        $('.middlename').val(middlename);


    });

    $('#btnUpdate').click(function() {
        var guard_location = $('select[name=guard_location] option:selected').val();
        url = "{{route('asset_crud')}}";
        status = "normal";
        data = {
            id: id,
            _token: "{{csrf_token()}}",
            status: status,
            asset_name: $('.firstname').val(),
            asset_purpose: $('.middlename').val(),
            location_id: guard_location

        }
        var button = $(this);
        button.closest(".modal").modal('hide');
        update(data, url, status);
    });

    $('#btnAdd').click(function() {
        var guard_location = $('select[name=guard_location] option:selected').val();
        url = "{{route('asset_crud')}}";
        status = "add";
        data = {
            id: id,
            _token: "{{csrf_token()}}",
            status: status,
            asset_name: $('.firstname_a').val(),
            asset_purpose: $('.middlename_a').val(),
            location_id: guard_location
        }

        var button = $(this);
        button.closest(".modal").modal('hide');
        update(data, url, status);
    });
</script>

@endsection
@endsection