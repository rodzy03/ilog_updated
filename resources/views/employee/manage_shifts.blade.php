@extends('layouts.main')
@section('title','shifts')
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
                    <a><i class="fa fa-question-circle fa-fw text-info m-r-5"></i> SHIFT LIST </a>
                </h4><br>
                <button class="form-control col-md-3 btn btn-inverse" data-toggle="modal" data-target="#modal-add-shift"><i class="fa fa-plus "></i>&nbsp;Add Shift</button>
                
            
            </div>
            <!-- LIST OF CHED TDP GRANTEES ACADEMIC YEAR 2020-2021 -->
            <div id="faq-2">
                <div class="panel-body">
               
                    <table id="data-table-default" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th class="text-nowrap" hidden>Shift Id</th>
                                <th class="text-nowrap">Shift Name</th>
                                <th class="text-nowrap">Start</th>
                                <th class="text-nowrap">End</th>
                                <th class="text-nowrap" hidden> 1</th>
                                <th class="text-nowrap" hidden>2</th>
                                <th class="text-nowrap">Action</th>

                            </tr>

                        </thead>
                        <tbody>
                            @foreach($data as $row)
                            <tr>
                                <td hidden>{{$row->tsc_config}} </td>
                                <td style="font-weight: bold; text-transform:uppercase">{{$row->tsc_value}}</td>
                                <td>{{$row->tsc_start}}</td>
                                <td>{{$row->tsc_end}}</td>
                                <td hidden>{{$row->tsc_start_d}}</td>
                                <td hidden>{{$row->tsc_start_e}}</td>
                                <td>
                                <div class="row">
                                        @if($row->active_flag == 1)

                                        <a id=edit vals="{{$row->tsc_config}}" class="btn btn-info" data-toggle="modal" data-target="#modal-edit"><i class="fa fa-edit text-white"></i></a>&nbsp;
                                        <a id=deact vals="{{$row->tsc_config}}" class="btn btn-purple" data-toggle="tooltip" title="Deactive"><i class="fa fa-ban text-white"></i></a>
                                        @else
                                        <a id=act vals="{{$row->tsc_config}}" class="btn btn-success" data-toggle="tooltip" title="Activate"><i class="fa fa-redo text-white"></i></a>&nbsp;

                                        @endif



                                    </div>
                                    
                                </td>

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
                        <div class="note note-with-left-icon m-b-15">
                            <div class="note-icon"><i class="fa fa-briefcase"></i></div>
                            <div class="note-content text-left">
                                <h4><b>IMPORT SHIFTS</b></h4>
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
                        <span id=loading class="fas fa-spinner fa-pulse"></span>&nbsp;Submit</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-edit">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    &nbsp;
                </div>
                <div class="modal-body">
                    <fieldset>
                        <div class="note note-with-left-icon m-b-15">
                            <div class="note-icon"><i class="fa fa-edit"></i></div>
                            <div class="note-content text-left">
                                <h4><b>EDIT SHIFT</b></h4>
                                <p>
                                
                                </p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12  col-md-12">
                                <div class="stats-content">
                                    <label>Shift Name <span class="required">*</span></label>
                                    <input style="text-transform: uppercase;" class="form-control " style="height: 40px;" type="text" id="txt_shift_name" />

                                </div>
                            </div>


                        </div><br>
                        <div class="row">
                            <div class="col-lg-6  col-md-12">
                                <div class="stats-content">
                                    <label>Start <span class="required">*</span></label>
                                    <input class="form-control " style="height: 40px;" type="time" id="txt_start" />

                                </div>
                            </div>


                        </div><br>
                        <div class="row">
                            <div class="col-lg-6  col-md-12">
                                <div class="stats-content">
                                    <label>End <span class="required">*</span></label>
                                    <input class="form-control " style="height: 40px;" type="time" id="txt_end" />

                                </div>
                            </div>


                        </div>

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

    <div class="modal fade" id="modal-add-shift">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    &nbsp;
                </div>
                <div class="modal-body">
                    <fieldset>
                        <div class="note note-with-left-icon m-b-15">
                            <div class="note-icon"><i class="fa fa-edit"></i></div>
                            <div class="note-content text-left">
                                <h4><b>ADD SHIFT</b></h4>
                                <p>
                                
                                </p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12  col-md-12">
                                <div class="stats-content">
                                    <label>Shift Name <span class="required">*</span></label>
                                    <input style="text-transform: uppercase;" class="form-control " style="height: 40px;" type="text" id="txt_shift_name_a" />

                                </div>
                            </div>


                        </div><br>
                        <div class="row">
                            <div class="col-lg-6  col-md-12">
                                <div class="stats-content">
                                    <label>Start <span class="required">*</span></label>
                                    <input class="form-control " style="height: 40px;" type="time" id="txt_start_a" />

                                </div>
                            </div>


                        </div><br>
                        <div class="row">
                            <div class="col-lg-6  col-md-12">
                                <div class="stats-content">
                                    <label>End <span class="required">*</span></label>
                                    <input class="form-control " style="height: 40px;" type="time" id="txt_end_a" />

                                </div>
                            </div>


                        </div>

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
        //DashboardV2.init();
        $('#data-table-default').DataTable({
            'paging'      : true,
            'searching'   : true,
            'ordering'    : false, 
        });
        $('.loading').hide();

    });


    var shift_id = "", final_s = "", final_e = "", final_d_s = "", final_d_e = "";
    $('#data-table-default').on('click', '#edit', function() {
        let row = $(this).closest("tr"),
            shiftname = $(row.find("td")[1]).text();
        start = $(row.find("td")[4]).text();
        end = $(row.find("td")[5]).text();
        shift_id = $(this).attr('vals');

        var st = start.split(" ");
        var cd = st[0].split("-");
        var ct = st[1].split(":");

        var en = end.split(" ");
        var ce = en[0].split("-");
        var cte = en[1].split(":");

        final_s = ct[0] + ":" + ct[1] + ":" + "00";
        final_e = cte[0] + ":" + cte[1] + ":" + "00";
        final_d_s = st[0];
        final_d_e = en[0];

        $('#txt_shift_name').val(shiftname);
        $('#txt_start').val(final_s);
        $('#txt_end').val(final_e);
    });

    $('#btnUpdate').click(function() {

        
        status = "normal";
        data = {
            shift_id: shift_id,
            txt_shift_name: $('#txt_shift_name').val(),
            txt_start: final_d_s+" "+$('#txt_start').val(),
            txt_end: final_d_e+" "+$('#txt_end').val(),
            _token: "{{csrf_token()}}",
            status:status

        }

        console.log($('#txt_end').val())
        
        var url = "{{route('shift_crud')}}";
        var button = $(this);
        button.closest(".modal").modal('hide');
        update(data, url, status);
        
    });
    
    $('#data-table-default').on('click', '#deact', function() {

        shift_id = $(this).attr('vals');
        url = "{{route('shift_crud')}}";
        status = "deact"
        data = {
            id: shift_id,
            _token: "{{csrf_token()}}",
            status: status
            
        }

        update(data, url, status);
    });

    $('#data-table-default').on('click', '#act', function() {

        shift_id = $(this).attr('vals');

        url = "{{route('shift_crud')}}";
        status = "act";
        data = {
            id: shift_id,
            _token: "{{csrf_token()}}",
            status: status
        }

        update(data, url, status);
    });

    $('#btnAdd').click(function() {

        status = "add";
        data = {
            
            txt_shift_name: $('#txt_shift_name_a').val(),
            txt_start: final_d_s+" "+$('#txt_start_a').val(),
            txt_end: final_d_e+" "+$('#txt_end_a').val(),
            _token: "{{csrf_token()}}",
            status:status

        }
        
        var url = "{{route('shift_crud')}}";
        var button = $(this);
        button.closest(".modal").modal('hide');
        
        update(data, url, status);

    });


    

    $('#btnRegister').click(function() {

        var form_data = new FormData();
        form_data.append("file", document.getElementById('inMainDocument').files[0]);
        form_data.append("_token", "{{csrf_token()}}");

        var button = $(this);
        button.closest(".modal").modal('hide');
        var url = "{{route('import_assets')}}";
        import_excel(form_data,url,"");
    });
</script>

@endsection
@endsection