@extends('layouts.main')
@section('title','Reports')
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
           
        
            <!-- LIST OF CHED TDP GRANTEES ACADEMIC YEAR 2020-2021 -->

            <div class="panel-body">
              
                <div class="note note-secondary ">
                    <div class="note-icon"><i class="fa fa-magic"></i></div>
                    <div class="note-content">
                        <h4><b>Note!</b></h4>
                        <p id=note_txt></p>
                        
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-3 col-md-12">
                        <div class="stats-content">
                            <label>&nbsp;Incident Start Date <span class="required"></span></label>
                            <input class="form-control txt_start_e"  style="height: 40px;" type="date"  />

                        </div>
                    </div>
                    <div class="col-lg-3 col-md-12">
                        <div class="stats-content">
                            <label>&nbsp;Incident End Date <span class="required"></span></label>
                            <input class="form-control txt_end_e"  style="height: 40px;" type="date"  />

                        </div>
                    </div>

                    <div class="col-lg-3 col-md-12">
                        <div class="stats-content">
                        <br>
                        <button type="button" style="background-color: #8ad4eb; color: white; height: 38px; margin-top:8px" class="btn filter_btn">
                                        <i class="fas fa-magic text-white"></i>&nbsp; Filter</button>

                        </div>
                    </div>


                    

                </div><br>
                

                
                <table id="data-table-default" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th class="text-nowrap">Full Name</th>
                            <th class="text-nowrap">Job Role</th>
                            {{--<th class="text-nowrap">Shift</th>--}}
                            <th class="text-nowrap">Location</th>
                            <th class="text-nowrap">Action</th>

                        </tr>

                    </thead>
                    <tbody>
                        @foreach($guards as $row)
                        <tr>
                            <td style="text-align: left; text-transform: uppercase;">{{$row->FULLNAME}}</td>
                            <td style="text-align: left; text-transform: uppercase;">{{$row->RAT_TYPE}}</td>
                            {{--<td style="text-align: left; text-transform: uppercase;">{{$row->tsc_value}}</td>--}}
                            <td style="text-align: left; text-transform: uppercase;">{{$row->RLI_LOCATIONAME}}</td>




                            <form method="POST" action="{{route('print_incidents')}}">
                                {{ csrf_field() }}
                                <td style="text-align: left;">
                                    <input type="text" name="guard_id" value="{{$row->TGS_GUARDID}}" hidden>
                                    <input type="text" name="fullname" value="{{$row->FULLNAME}}" hidden>
                                    <input type="text" name="job_role" value="{{$row->RAT_TYPE}}" hidden>
                                    <input type="text" name="start"  class="start_p" hidden>
                                    <input type="text" name="end"  class="end_p" hidden>
                                    <button type="submit" style="background-color: #cc4946!important; color: white" class="btn">
                                        <i class="fas fa-list-alt text-white"></i>&nbsp;Print logs</button>
                                </td>
                            </form>
                        </tr>

                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
        <!-- END panel -->

    </div>


    <div class="modal modal-message fade" id="modal-add">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">

                </div>
                <div class="modal-body">
                    <fieldset>
                        <div class="note note-danger note-with-left-icon m-b-15">
                            <div class="note-icon"><i class="fa fa-briefcase"></i></div>
                            <div class="note-content text-left">
                                <h4><b>IMPORT LOCATION</b></h4>
                                <p>

                                </p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6  col-md-12">
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
    var text = "";
    $(document).ready(function() {
        App.init();
        //DashboardV2.init();
        TableManageDefault.init();
        $('#loading').hide();
        text = ` You can filter data by selecting incident start date, end date and click filter button.`;
        
        $('#note_txt').html(`${text}`);
        
    });

    $('.filter_btn').click(function(){
        var start = $('.txt_start_e').val();
        var end = $('.txt_end_e').val();

        if(start === "" && end === "") {
            $('#note_txt').html(`${text}<br>No start date or end date selected.`);
        } 
        
        else {

            if(start != "" && end == "") {
                $('.start_p').val(start);
                $('#note_txt').html(`${text}<br>You set incident log date (${start}) .`);
            }
            else {
                $('.start_p').val(start);
                $('.end_p').val(end);
                $('#note_txt').html(`${text}<br>You set incident log start date from (${start}) to (${end}) .`);
            }
        }

    });


    $('form').submit(function(e) {

        $('.txt_start_e').val('');
        $('.txt_end_e').val('');
        $('#modal-loading').modal('show');
    });


    $('#btnRegister').click(function() {

        var form_data = new FormData();
        form_data.append("file", document.getElementById('inMainDocument').files[0]);
        form_data.append("_token", "{{csrf_token()}}");

        $('#loading').show();

        setTimeout(function() {


            $.ajax({
                url: "{{route('import_location')}}",
                type: 'post',
                processData: false,
                contentType: false,
                dataType: 'json',
                async: false,
                data: form_data,
                success: function(data) {
                    console.log(data)
                },
                error: function(error) {
                    console.log(error)
                }
            });

            window.location.reload();


        }, 2000);

    });
</script>

@endsection
@endsection