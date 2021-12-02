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
                    <a><i class="fa fa-question-circle fa-fw text-info m-r-5"></i> CLIENT LIST </a>
                </h4><br>
                {{--<button class="form-control col-md-3 btn btn-info" data-toggle="modal" data-target="#modal-add"><i class="fa fa-upload"></i>&nbsp;&nbsp;Import</button>--}}
                <button class="form-control col-md-3 btn btn-inverse" data-toggle="modal" data-target="#modal-add-client"><i class="fa fa-plus">&nbsp;</i>Add New Client&nbsp;</button>
                
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
                                <th class="text-nowrap">Client Information</th>
                                <th class="text-nowrap">Total Locations</th>
                                <th class="text-nowrap">Total Guards</th>
                                <th class="text-nowrap">Total DC</th>
                                <th class="text-nowrap">Total NSO</th>
                                <th class="text-nowrap">Action</th>
                                <th class="text-nowrap" hidden>client name</th>
                                <th class="text-nowrap" hidden>contact</th>
                                <th class="text-nowrap" hidden>email</th>
                                <th class="text-nowrap" hidden>address</th>
                                <th class="text-nowrap" hidden>client repre</th>
                                
                                
                            </tr>

                        </thead>
                        <tbody>
                            @foreach($data as $row)
                            <tr>
                                <td style="text-transform: uppercase; width: 30%;"><b>{{$row->client_name}}</b><br>
                                {!! (!empty($row->client_contact)) ? "CONTACT : ".$row->client_contact."<br>": "" !!}
                                {!! (!empty($row->client_email)) ? "EMAIL : ".$row->client_email."<br>": "" !!}
                                {!! (!empty($row->client_address)) ? "ADDRESS : ".$row->client_address."<br>": "" !!}
                                {!! (!empty($row->client_representative)) ? "REPRESENTATIVE : ".$row->client_representative."<br>": "" !!}
                                </td>
                                {{--$location_info = db::table('r_location_information')->where('client_id',$row->client_id)->get()--}}
                                <td style="text-transform: uppercase;">
                                @php
                                    $location_count = db::table('r_location_information')->where('client_id',$row->client_id)->count();
                                    $guard_count = db::table('v_get_count_assigned_guard')->where('CLIENT_ID',$row->client_id)->value('GUARDS_COUNT');
                                    $supervisor_dc = db::table('v_get_count_assigned_dc')->where('CLIENT_ID',$row->client_id)->value('GUARDS_COUNT');
                                    $supervisor_nso = db::table('v_get_count_assigned_nso')->where('CLIENT_ID',$row->client_id)->value('GUARDS_COUNT');
                                @endphp
                                
                                {!! (!empty($location_count)) ? "Locations : ".$location_count."<br>": "" !!}
                                </td>
                                <td style="text-transform: uppercase;">
                                {!! (!empty($guard_count)) ? "Guards : ".$guard_count."<br>": "" .""!!}
                                
                                 </td>
                                 <td style="text-transform: uppercase;">{!! (!empty($supervisor_dc)) ? "Supervisor : ".$supervisor_dc."<br>": "" !!}</td>
                                 <td style="text-transform: uppercase;">{!! (!empty($supervisor_nso)) ? "Supervisor : ".$supervisor_nso."<br>": "" !!}</td>
                                <td style="width: 10%;">
                                    <div class="row">
                                        @if($row->active_flag == 1)

                                      
                                        <a id=edit vals="{{$row->client_id}}" class="btn btn-info" data-toggle="modal" data-target="#modal-edit"><i class="fa fa-edit text-white"></i></a>&nbsp;
                                        <a id=deact vals="{{$row->client_id}}" class="btn btn-purple" data-toggle="tooltip" title="Deactive"><i class="fa fa-ban text-white"></i></a>
                                        @else
                                        <a id=act vals="{{$row->client_id}}" class="btn btn-success" data-toggle="tooltip" title="Activate"><i class="fa fa-redo text-white"></i></a>&nbsp;

                                        @endif



                                    </div>

                                </td>
                                <td hidden>{{$row->client_name}}</td>
                                <td hidden>{{$row->client_contact}}</td>
                                <td hidden>{{$row->client_email}}</td>
                                <td hidden>{{$row->client_address}}</td>
                                <td hidden>{{$row->client_representative}}</td>
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
                            <div class="note-icon"><i class="fa fa-user-secret"></i></div>
                            <div class="note-content text-left">
                                <h4><b>IMPORT CLIENTS</b></h4>
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
                                    <label>&nbsp;Client Name <span class="required">*</span></label>
                                    <input class="form-control client_name_e" style="height: 40px; text-transform:uppercase" type="text" />

                                </div>
                            </div>


                        </div><br>

                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="stats-content">
                                    <label>&nbsp;Client Representative <span class="required">*</span></label>
                                    <input class="form-control client_rep_e" style="height: 40px; text-transform:uppercase" type="text" />

                                </div>
                            </div>


                        </div><br>

                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="stats-content">
                                    <label>&nbsp;Client Contact <span class="required">*</span></label>
                                    <input class="form-control client_contact_e" style="height: 40px; text-transform:uppercase" type="text" />

                                </div>
                            </div>


                        </div><br>

                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="stats-content">
                                    <label>&nbsp;Client Address <span class="required">*</span></label>
                                    <input class="form-control client_address_e" style="height: 40px; text-transform:uppercase" type="text" />

                                </div>
                            </div>


                        </div><br>

                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="stats-content">
                                    <label>&nbsp;Client Email <span class="required">*</span></label>
                                    <input class="form-control client_email_e" style="height: 40px; " type="text" />

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
    <div class="modal fade" id="modal-add-client">
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
                                <h4><b>ADD INFORMATION</b></h4>
                                <p>

                                </p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="stats-content">
                                    <label>&nbsp;Client Name <span class="required">*</span></label>
                                    <input class="form-control client_name_a" style="height: 40px; text-transform:uppercase" type="text" />

                                </div>
                            </div>


                        </div><br>

                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="stats-content">
                                    <label>&nbsp;Client Representative <span class="required">*</span></label>
                                    <input class="form-control client_rep_a" style="height: 40px; text-transform:uppercase" type="text" />

                                </div>
                            </div>


                        </div><br>

                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="stats-content">
                                    <label>&nbsp;Client Contact <span class="required">*</span></label>
                                    <input class="form-control client_contact_a" style="height: 40px; text-transform:uppercase" type="text" />

                                </div>
                            </div>


                        </div><br>

                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="stats-content">
                                    <label>&nbsp;Client Address <span class="required">*</span></label>
                                    <input class="form-control client_address_a" style="height: 40px; text-transform:uppercase" type="text" />

                                </div>
                            </div>


                        </div><br>

                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="stats-content">
                                    <label>&nbsp;Client Email <span class="required">*</span></label>
                                    <input class="form-control client_email_a" style="height: 40px; " type="text" />

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
        //DashboardV2.init();
        $('#data-table-default').DataTable({
            'paging': true,
            'searching': true,
            'ordering': false,
        });
        $('.loading').hide();
    });

    $('.btn-gen-all').click(function() {
        $('#modal-loading').modal('show');
    });

    $('#btnRegister').click(function() {

        var form_data = new FormData();
        form_data.append("file", document.getElementById('inMainDocument').files[0]);
        form_data.append("_token", "{{csrf_token()}}");

        var button = $(this);
        button.closest(".modal").modal('hide');
        var url = "{{route('import_client')}}";
        import_excel(form_data, url, "");

    });

    var id = "";
    $('#data-table-default').on('click', '#deact', function() {

        id = $(this).attr('vals');
        url = "{{route('client_crud')}}";
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
        url = "{{route('client_crud')}}";
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
            client_name = $(row.find("td")[6]).text(),
            contact = $(row.find("td")[7]).text(),
            email = $(row.find("td")[8]).text(),
            address = $(row.find("td")[9]).text(),
            client_repre = $(row.find("td")[10]).text()


        $('.client_name_e').val(client_name);
        $('.client_rep_e').val(client_repre);
        $('.client_contact_e').val(contact);
        $('.client_address_e').val(address);
        $('.client_email_e').val(email);

        $('#header_txt').text(client_name)

    });

    $('#btnUpdate').click(function() {
        
        url = "{{route('client_crud')}}";
        status = "normal";
        data = {
            id: id,
            _token: "{{csrf_token()}}",
            status: status,
            client_name: $('.client_name_e').val(),
            client_representative: $('.client_rep_e').val(),
            client_contact: $('.client_contact_e').val(),
            client_address: $('.client_address_e').val(),
            client_email: $('.client_email_e').val()

        }
        var button = $(this);
        button.closest(".modal").modal('hide');
        update(data, url, status);
    });

    $('#btnAdd').click(function() {
        
        
        url = "{{route('client_crud')}}";
        status = "add";
        data = {
            
            _token: "{{csrf_token()}}",
            status: status,
            client_name: $('.client_name_a').val(),
            client_representative: $('.client_rep_a').val(),
            client_contact: $('.client_contact_a').val(),
            client_address: $('.client_address_a').val(),
            client_email: $('.client_email_a').val()

        }

        var button = $(this);
        button.closest(".modal").modal('hide');
        update(data, url, status);
    });
</script>

@endsection
@endsection