@extends('layouts.main')
@section('title','dashboard')
@section('content')

@section('extra-css')
<!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
<link href="{{ asset('assets/plugins/DataTables/media/css/dataTables.bootstrap.min.css')}}" rel="stylesheet" />
<link href="{{ asset('assets/plugins/DataTables/extensions/Responsive/css/responsive.bootstrap.min.css')}}" rel="stylesheet" />
<!-- ================== END PAGE LEVEL STYLE ================== -->

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<style>
.select2-selection__rendered {
    line-height: 40px !important;
    
}
.select2-container .select2-selection--single {
    height: 40px ;
    text-transform: uppercase;
}
.select2-selection__arrow {
    height: 40px;
    
}
.select2-search__field {
    padding: 0;
    text-transform: uppercase;
}
.select2-results__option {
    
    text-transform: uppercase;
}
</style>
@endsection

<!-- begin #content -->
<div id="content" class="content">
    

    <!-- BEGIN panel-group -->
    <div class="panel-group faq" id="faq-list">
        <!-- BEGIN panel -->
        <div class="panel ">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a><i class="fa fa-question-circle fa-fw text-info m-r-5"></i> GUARD SCHEDULE </a>
                </h4><br>
                <button class="form-control col-md-3 btn btn-info" data-toggle="modal" data-target="#modal-add">
                    <i class="fa fa-upload"></i>&nbsp;Import</button>
                <button class="form-control col-md-3 btn btn-inverse" data-toggle="modal" data-target="#modal-add-shift"><i class="fa fa-plus">&nbsp;</i>Add New Shift&nbsp;</button>

            </div>
            <!-- LIST OF CHED TDP GRANTEES ACADEMIC YEAR 2020-2021 -->
            <div id="faq-2">
                <div class="panel-body">
                        
                            <div class="col-lg-3 alert alert-danger fade show alert_div" style="display: none;">
                                <span class="close" data-dismiss="alert">×</span>
                                <strong>Error!</strong> Shift already exists.
                            </div>
                        
                            
                    <table id="data-table-default" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th class="text-nowrap">Guard Name</th>
                                <th class="text-nowrap">Shift</th>
                                <th class="text-nowrap">Shift Time</th>
                                <th class="text-nowrap">Validity Date</th>
                                <th class="text-nowrap">Location</th>
                                <th class="text-nowrap">Action</th>
                                <th class="text-nowrap" hidden>Val Start</th>
                                <th class="text-nowrap" hidden>Val End</th>
                                <th class="text-nowrap" hidden>Loc Id</th>
                                <th class="text-nowrap" hidden>fullname</th>
                                <th class="text-nowrap" hidden>rat type</th>
                            </tr>

                        </thead>
                        <tbody>
                            @foreach($data as $row)
                            <tr >
                                <td style="text-transform: uppercase;"><b>{{$row->FULLNAME}}</b><br>( {{$row->RAT_TYPE}} )</td>
                                <td style="text-transform: uppercase;">{{$row->tsc_value}}</td>
                                <td style="text-transform: uppercase;">{{$row->TGS_SHIFTDATEFROM}} TO {{$row->TGS_SHIFTDATETO}}</td>
                                <td style="text-transform: uppercase;">{{$row->VALIDITY_START}} TO {{$row->VALIDITY_END}}</td>
                                <td style="text-transform: uppercase;">{{$row->RLI_LOCATIONAME}}</td>
                                <td style="width: 15%;">
                                    <div class="row">
                                        @if($row->ACTIVE_FLAG == 1)


                                        <a id=edit vals="{{$row->TGS_SHIFTID}}" class="btn btn-info" data-toggle="modal" data-target="#modal-edit-shift"><i class="fa fa-edit text-white"></i></a>&nbsp;
                                        <a id=deact vals="{{$row->TGS_SHIFTID}}" class="btn btn-purple" data-toggle="tooltip" title="Deactive"><i class="fa fa-ban text-white"></i></a>
                                        @else
                                        <a id=act vals="{{$row->TGS_SHIFTID}}" class="btn btn-success" data-toggle="tooltip" title="Activate"><i class="fa fa-redo text-white"></i></a>&nbsp;

                                        @endif

                                    </div>

                                </td>
                                <td hidden>{{$row->VALIDITY_START_E}}</td>
                                <td hidden>{{$row->VALIDITY_END_E}}</td>
                                <td hidden>{{$row->TGS_LOCATIONID}}</td>
                                <td hidden>{{$row->FULLNAME}}</td>
                                <td hidden>{{$row->RAT_TYPE}}</td>
                                

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
                    {{--<h4 class="modal-title">Add Document</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>--}}
                </div>
                <div class="modal-body">
                    <fieldset>
                        <div class="note note-with-left-icon m-b-15">
                            <div class="note-icon"><i class="fa fa-briefcase"></i></div>
                            <div class="note-content text-left">
                                <h4><b>IMPORT SCHEDULE</b></h4>
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

    <div class="modal fade" id="modal-add-shift">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">ADD NEW SHIFT</h4>
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
                                    <label>&nbsp;Name <span class="required">*</span></label>
                                    <select name="guard_id" class="form-control" style="width:100%" id="guard_id">
                                        @foreach($guards as $row)
                                        <option value="{{$row->RAI_ACCOUNTID}}" >{{$row->RAI_FIRSTNAME}} {{$row->RAI_MIDDLENAME}} {{$row->RAI_LASTNAME}}</option>
                                        @endforeach
                                    </select><br><br>
                                    <label>&nbsp;Location <span class="required">*</span></label>
                                    <select id=guard_location name="guard_location" class="form-control" style="width:100%">
                                        @foreach($location as $row)
                                        <option value="{{$row->RLI_LOCATIONID}}">{{$row->RLI_LOCATIONAME}}</option>
                                        @endforeach
                                    </select><br><br>
                                    <label>&nbsp;Shift <span class="required">*</span></label>
                                    <select name="guard_shift" class="form-control" style="text-transform: uppercase; height: 40px">
                                        @foreach($shifts as $row)
                                        <option value="{{$row->tsc_config}}">{{$row->tsc_value}}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>


                        </div><br>

                        <div class="row">
                            <div class="col-lg-6 col-md-12">
                                <div class="stats-content">
                                    <label>Shift Validity Start Date <span class="required">*</span></label>
                                    <input class="form-control txt_start_a" style="height: 40px;" type="date" id="txt_start" />

                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="stats-content">
                                    <label>Shift Validity End Date <span class="required">*</span></label>
                                    <input class="form-control txt_end_a" style="height: 40px;" type="date" id="txt_end" />

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

    <div class="modal fade" id="modal-edit-shift">
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
                        </div><br>
                        <select id=guard_location_e name="guard_location_e" class="form-control" style="width:100%; ">
                            @foreach($location as $row)
                            <option value="{{$row->RLI_LOCATIONID}}">{{$row->RLI_LOCATIONAME}}</option>
                            @endforeach
                        </select><br>
                        <select id=guard_shift_e name="guard_shift_e" class="form-control" style="display:none;">
                            @foreach($shifts as $row)
                            <option value="{{$row->tsc_config}}">{{$row->tsc_value}}</option>
                            @endforeach
                        </select><br>



                        <div class="row">
                            <div class="col-lg-6 col-md-12">
                                <div class="stats-content">
                                    <label>Shift Validity Start Date <span class="required">*</span></label>
                                    <input class="form-control txt_start_e" style="height: 40px;" type="date" id="txt_start" />

                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="stats-content">
                                    <label>Shift Validity End Date <span class="required">*</span></label>
                                    <input class="form-control txt_end_e" style="height: 40px;" type="date" id="txt_end" />

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

</div>
<!-- end #content -->

@section('extra-js')


<!-- ================== BEGIN PAGE LEVEL JS ================== -->
<script src="{{ asset('assets/plugins/DataTables/media/js/jquery.dataTables.js')}}"></script>
<script src="{{ asset('assets/plugins/DataTables/media/js/dataTables.bootstrap.min.js')}}"></script>
<script src="{{ asset('assets/plugins/DataTables/extensions/Responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{ asset('assets/js/demo/table-manage-default.demo.min.js')}}"></script>
<!-- ================== END PAGE LEVEL JS ================== -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    $(document).ready(function() {

        $.fn.modal.Constructor.prototype.enforceFocus = function() {};
        $('#guard_id').select2({
            dropdownParent: $('#modal-add-shift')
        });
        $('#guard_location').select2({
            dropdownParent: $('#modal-add-shift')
        });
        $('#guard_location_e').select2({
            dropdownParent: $('#modal-edit-shift')
        });
        
        
        // $('#guard_id option').each(function(){
        //     $(this).text($(this).text().toUpperCase());
        // });
        
        App.init();
        //DashboardV2.init();
        $('#data-table-default').DataTable({
            'paging': true,
            'searching': true,
            'ordering': true,
        });
        $('.loading').hide();
    });

    $('#btnRegister').click(function() {

        var form_data = new FormData();
        form_data.append("file", document.getElementById('inMainDocument').files[0]);
        form_data.append("_token", "{{csrf_token()}}");

        var button = $(this);
        button.closest(".modal").modal('hide');
        var url = "{{route('import_student')}}";
        import_excel(form_data,url,"");
        

    });

    var id = "";
    $('#data-table-default').on('click', '#deact', function() {

        id = $(this).attr('vals');
        url = "{{route('guard_shift_crud')}}";
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
        url = "{{route('guard_shift_crud')}}";
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

        start = $(row.find("td")[6]).text();
        end = $(row.find("td")[7]).text();
        shift = $(row.find("td")[1]).text();
        loc = $(row.find("td")[8]).text();
        full_name = $(row.find("td")[9]).text();
        type = $(row.find("td")[10]).text();
        

        $('.txt_start_e').val(start);
        $('.txt_end_e').val(end);

        //selectElement('guard_shift_e', shift);
        selectElement('guard_location_e', loc);

        $('#header_txt').text(full_name + " (" + shift + ")")
    });

    function selectElement(id, valueToSelect) {    
        $('#'+id).val(valueToSelect);
        $('#'+id).trigger('change'); 
    }

    // function selectElement(id, valueToSelect) {    
    //     let element = document.getElementById(id);
    //     element.value = valueToSelect;
    // }

    //var st = start.split(" ");
        // var en = end.split(" ");
        

        // var final_s = st[0] ;
        // var final_e = en[0] + "T" + cte[0] + ":" + cte[1] + ":" + cte[2];
    // var cd = st[0].split("-");
    // var ct = st[1].split(":");

    // var ce = en[0].split("-");
    // var cte = en[1].split(":");
    $('#btnAdd').click(function() {

        

        // var start = $('.txt_start').val().replace('T', ' ');
        // var end = $('.txt_end').val().replace('T', ' ');
        var guard_id = $('select[name=guard_id] option:selected').val();
        var guard_location = $('select[name=guard_location] option:selected').val();
        var shift_id = $('select[name=guard_shift] option:selected').val();
        var txt_start_a = $('.txt_start_a').val();
        var txt_end_a = $('.txt_end_a').val();
                    
        var button = $(this);
        button.closest(".modal").modal('hide');
        $.ajax({
            url: "{{route('validate_shift')}}"
            , method: "post"
            , _token: "{{csrf_token()}}"
            , data: {guard_id: guard_id, shift_id: shift_id, guard_location:guard_location,_token: "{{csrf_token()}}"}
            , success:function(response) {
                if(response['count'][0]['SCHED_COUNT'] > 0) {
                    $('.alert_div').show();
                }
                else {

                    
                    url = "{{route('guard_shift_crud')}}";
                    status = "add";
                    data = {
                        _token: "{{csrf_token()}}",
                        status: status,
                        guard_id: guard_id,
                        guard_location: guard_location,
                        shift_id: shift_id,
                        start: txt_start_a,
                        end: txt_end_a

                    }

                    
                    update(data, url, status);
                    
                }
            }
        });
        
    });

    $('#btnUpdate').click(function() {


        var shift_id = $('select[name=guard_shift_e] option:selected').val();
        var guard_location = $('select[name=guard_location_e] option:selected').val();
        var txt_start_e = $('.txt_start_e').val();
        var txt_end_e = $('.txt_end_e').val();

        url = "{{route('guard_shift_crud')}}";
        status = "normal";
        data = {
            _token: "{{csrf_token()}}",
            status: status,
            id: id,
            shift_id: shift_id,
            guard_location: guard_location,
            start: txt_start_e,
            end: txt_end_e
        }

        var button = $(this);
        button.closest(".modal").modal('hide');
        update(data, url, status);
    });
</script>

@endsection
@endsection