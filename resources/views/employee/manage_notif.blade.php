@extends('layouts.main')
@section('title','notifications')
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
                    <a><i class="fa fa-question-circle fa-fw text-info m-r-5"></i> NOTIFICATION LIST </a>
                </h4><br>
                <button class="form-control col-md-3 btn btn-inverse" data-toggle="modal" data-target="#modal-add-shift"><i class="fa fa-plus "></i>&nbsp;Add Notification</button>
                
            
            </div>
            <!-- LIST OF CHED TDP GRANTEES ACADEMIC YEAR 2020-2021 -->
            <div id="faq-2">
                <div class="panel-body">
               
                    <table id="data-table-default" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                
                                <th class="text-nowrap">Title</th>
                                
                                <th class="text-nowrap">Body</th>
                                <th class="text-nowrap">Date Post</th>
                                
                                <th class="text-nowrap">Action</th>

                            </tr>

                        </thead>
                        <tbody>
                            @foreach($data as $row)
                            <tr>
                                
                                <td style="font-weight: bold; text-transform:uppercase">{{$row->title}}</td>
                                <td>{{$row->body}}</td>
                                <td>{{$row->date_post}}</td>
                                
                                <td>
                                    <div class="row">
                                            

                                            <a id=edit vals="{{$row->notif_id}}" class="btn btn-info" data-toggle="modal" data-target="#modal-edit"><i class="fa fa-edit text-white"></i></a>&nbsp;

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
                                <h4><b>EDIT NOTIFICATION</b></h4>
                                <p>
                                
                                </p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12  col-md-12">
                                <div class="stats-content">
                                    <label>Title <span class="required">*</span></label>
                                    <input  class="form-control " style="height: 40px;" type="text" id="txt_title_e" />

                                </div>
                            </div>


                        </div><br>
                        <div class="row">
                            <div class="col-lg-12  col-md-12">
                                <div class="stats-content">
                                    <label>Body <span class="required">*</span></label>
                                    <textarea class="form-control " style="height: 40px;" type="text" id="txt_body_e" ></textarea>

                                </div>
                            </div>


                        </div><br>
                        
                        <div class="row">
                            <div class="col-lg-6  col-md-12">
                                <div class="stats-content">
                                    <label>Date Post <span class="required">*</span></label>
                                    <input class="form-control " style="height: 40px;" type="date" id="txt_post_e" />

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
                                <h4><b>ADD NOTIFICATION</b></h4>
                                <p>
                                
                                </p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12  col-md-12">
                                <div class="stats-content">
                                    <label>Title <span class="required">*</span></label>
                                    <input  class="form-control " style="height: 40px;" type="text" id="txt_title_a" />

                                </div>
                            </div>


                        </div><br>
                        <div class="row">
                            <div class="col-lg-12  col-md-12">
                                <div class="stats-content">
                                    <label>Body <span class="required">*</span></label>
                                    <textarea class="form-control " style="height: 40px;" type="text" id="txt_body_a" ></textarea>

                                </div>
                            </div>


                        </div><br>
                        
                        <div class="row">
                            <div class="col-lg-6  col-md-12">
                                <div class="stats-content">
                                    <label>Date Post <span class="required">*</span></label>
                                    <input class="form-control " style="height: 40px;" type="date" id="txt_post_a" />

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
        shift_id = $(this).attr('vals');
        let row = $(this).closest("tr"),
            txt_title_e = $(row.find("td")[0]).text();
        txt_body_e = $(row.find("td")[1]).text();
        txt_post_e = $(row.find("td")[2]).text();
        

        $('#txt_title_e').val(txt_title_e);
        $('#txt_body_e').val(txt_body_e);
        $('#txt_post_e').val(txt_post_e);
    });

    $('#btnUpdate').click(function() {

        
        status = "normal";
        data = {
            notif_id:shift_id,
            title: $('#txt_title_e').val(),
            body: $('#txt_body_e').val(),
            date_post: $('#txt_post_e').val(),
            _token: "{{csrf_token()}}",
            status:status

        }
        
        var url = "{{route('notif_crud')}}";
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
            
            title: $('#txt_title_a').val(),
            body: $('#txt_body_a').val(),
            date_post: $('#txt_post_a').val(),
            _token: "{{csrf_token()}}",
            status:status

        }
        
        var url = "{{route('notif_crud')}}";
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