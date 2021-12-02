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
<div id="content" class="content">
  
    <!-- BEGIN panel-group -->
    <div class="panel-group faq" id="faq-list">
        <!-- BEGIN panel -->
        <div class="panel ">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a><i class="fa fa-question-circle fa-fw text-info m-r-5"></i> ASSET LIST </a>
                </h4><br>
                <button class="form-control col-md-3 btn btn-info" data-toggle="modal" data-target="#modal-add"><i class="fa fa-upload"></i>&nbsp;&nbsp;import</button>
                <button class="form-control col-md-3 btn btn-inverse" data-toggle="modal" data-target="#modal-add-asset"><i class="fa fa-plus">&nbsp;</i>Add New Asset&nbsp;</button>
                <form action="{{ route('generate_asset_qr_all')}}" method="post">
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
                                <th class="text-nowrap">Asset Name</th>
                                <th class="text-nowrap">Asset Type</th>
                                <th class="text-nowrap">Location</th>
                                <th class="text-nowrap">Action</th>
                                <th hidden>Location ID</th>

                            </tr>

                        </thead>
                        <tbody>
                            @foreach($data as $row)
                            <tr>
                                <td style="text-transform: uppercase; width: 50%;"><b>{{$row->ASSET_NAME}}</b></td>
                                <td style="text-transform: uppercase;">{{$row->ASSET_TYPE}}</td>
                                <td style="text-transform: uppercase;">{{$row->RLI_LOCATIONAME}}</td>
                                <td style="width: 20%;">
                                    <div class="row">
                                        @if($row->ACTIVE_FLAG == 1)

                                        <form action="{{ route('generate_asset_qr')}}" method="post">
                                            @csrf
                                            <input type="text" value="{{$row->ASSET_ID}}" name="asset_id" hidden>
                                            <button type="submit" class="form-control btn btn-danger ">
                                                <i class="fa fa-share"></i>&nbsp;Print QR</button>

                                        </form>&nbsp;&nbsp;
                                        <a id=edit vals="{{$row->ASSET_ID}}" class="btn btn-info" data-toggle="modal" data-target="#modal-edit"><i class="fa fa-edit text-white"></i></a>&nbsp;
                                        <a id=deact vals="{{$row->ASSET_ID}}" class="btn btn-purple" data-toggle="tooltip" title="Deactive"><i class="fa fa-ban text-white"></i></a>
                                        @else
                                        <a id=act vals="{{$row->ASSET_ID}}" class="btn btn-success" data-toggle="tooltip" title="Activate"><i class="fa fa-redo text-white"></i></a>&nbsp;

                                        @endif



                                    </div>

                                </td>
                                <td hidden>{{$row->RLI_LOCATIONID}}</td>
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
                                <h4><b>IMPORT ASSETS</b></h4>
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
                        <span id=loading class="fas fa-spinner fa-pulse loading" ></span>&nbsp;Submit</button>
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

                        <label>&nbsp;Location <span class="required">*</span></label>
                        <select id=guard_location name="guard_location" class="form-control" style="text-transform: uppercase; height: 40px">
                            @foreach($location as $row)
                            <option value="{{$row->RLI_LOCATIONID}}">{{$row->RLI_LOCATIONAME}}</option>
                            @endforeach
                        </select><br>
                        
                                
                                    

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

    <div class="modal fade" id="modal-add-asset">
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
                                    <label>&nbsp;Asset Name <span class="required">*</span></label>
                                    <input class="form-control firstname_a" style="height: 40px; text-transform:uppercase" type="text" />
                                    
                                </div>
                            </div>


                        </div><br>

                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="stats-content">
                                    <label>&nbsp;Asset Type <span class="required">*</span></label>
                                    <input class="form-control middlename_a" style="height: 40px; text-transform:uppercase" type="text" />
                                    
                                </div>
                            </div>


                        </div><br>
                        <label>&nbsp;Location <span class="required">*</span></label>
                        <select id=guard_location_a name="guard_location_a" class="form-control" style="text-transform: uppercase; height: 40px">
                            @foreach($location as $row)
                            <option value="{{$row->RLI_LOCATIONID}}">{{$row->RLI_LOCATIONAME}}</option>
                            @endforeach
                        </select><br>

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
    
    $('.btn-gen-all').click(function(){
        $('#modal-loading').modal('show');
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
    
    $('#data-table-default').on('click', '#edit', function() {

        id = $(this).attr('vals');
        let row = $(this).closest("tr"),
            firstname = $(row.find("td")[0]).text()
            , middlename = $(row.find("td")[1]).text()
            , loc_id = $(row.find("td")[4]).text()

            $('.firstname').val(firstname);
            $('.middlename').val(middlename);
            
            selectElement('guard_location', loc_id)
            $('#header_txt').text(firstname)
            
    });


    function selectElement(id, valueToSelect) {    
        let element = document.getElementById(id);
        element.value = valueToSelect;
    }
    

    $('#btnUpdate').click(function() {
        var guard_location = $('select[name=guard_location] option:selected').val();
        url = "{{route('asset_crud')}}";
        status = "normal";
        data = {
            id: id,
            _token: "{{csrf_token()}}",
            status: status,
            asset_name:$('.firstname').val(),
            asset_purpose:$('.middlename').val(),
            location_id:guard_location
            
        }
        var button = $(this);
        button.closest(".modal").modal('hide');
        update(data, url, status);
    });

    $('#btnAdd').click(function() {
        var guard_location = $('select[name=guard_location_a] option:selected').val();
        url = "{{route('asset_crud')}}";
        status = "add";
        data = {
            id: id,
            _token: "{{csrf_token()}}",
            status: status,
            asset_name:$('.firstname_a').val(),
            asset_purpose:$('.middlename_a').val(),
            location_id:guard_location
        }
        
        var button = $(this);
        button.closest(".modal").modal('hide');
        update(data, url, status);
    });

</script>

@endsection
@endsection